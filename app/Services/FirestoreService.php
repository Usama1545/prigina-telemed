<?php

namespace App\Services;

use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\Facades\Log;
use Exception;

class FirestoreService
{
    protected $db;
    protected $defaultPageSize = 50;

    public function __construct()
    {
        $projectId = config('services.firebase.project_id');
        $credentialsPath = storage_path('app/firebase/firebase_credentials.json');

        if (!file_exists($credentialsPath)) {
            throw new Exception('Firebase credentials file not found: ' . $credentialsPath);
        }

        $this->db = new FirestoreClient([
            'projectId' => config('services.firebase.project_id'),
            'keyFile' => json_decode(
                file_get_contents(storage_path('app/firebase/firebase_credentials.json')),
                true
            ),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Core CRUD
    |--------------------------------------------------------------------------
    */

    public function create($collection, $data)
    {
        try {
            $docRef = $this->db->collection($collection)->add($data);
            return $docRef->snapshot()->data();
        } catch (Exception $e) {
            Log::error('Firestore create error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function createWithId($collection, $documentId, $data)
    {
        try {
            $this->db->collection($collection)
                ->document($documentId)
                ->set($data);

            return $this->find($collection, $documentId);
        } catch (Exception $e) {
            Log::error('Firestore createWithId error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function find($collection, $documentId)
    {
        try {
            $docRef = $this->db->collection($collection)->document($documentId);
            
            $snapshot = $docRef->snapshot();
            
            if (!$snapshot->exists()) {
                return null;
            }
            
            $data = $snapshot->data();
            
            foreach ($data as $key => $value) {
                if ($value instanceof \Google\Cloud\Firestore\Timestamp) {
                    $data[$key] = $value->get()->format('Y-m-d H:i:s');
                }
            }
            
            return $data;
            
        } catch (Exception $e) {
            Log::error('Firestore find error: ' . $e->getMessage());
            return null; // IMPORTANT
        }
    }

    public function update($collection, $documentId, $data)
    {
        try {
            $this->db->collection($collection)
                ->document($documentId)
                ->set($data, ['merge' => true]);

            return $this->find($collection, $documentId);
        } catch (Exception $e) {
            Log::error('Firestore update error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function delete($collection, $documentId)
    {
        try {
            $this->db->collection($collection)
                ->document($documentId)
                ->delete();

            return true;
        } catch (Exception $e) {
            Log::error('Firestore delete error: ' . $e->getMessage());
            throw $e;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Simple Get (Paginated)
    |--------------------------------------------------------------------------
    */

    public function get($collection, $limit = null)
    {
        try {
            $limit = $limit ?? $this->defaultPageSize;

            $documents = $this->db->collection($collection)
                ->limit($limit)
                ->documents();

            return collect($documents)->map(function ($doc) {
                return array_merge(['id' => $doc->id()], $doc->data());
            })->values()->all();

        } catch (Exception $e) {
            Log::error('Firestore get error: ' . $e->getMessage());
            throw $e;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Query (Replacement of your complex query())
    |--------------------------------------------------------------------------
    */

    public function query(
        $collection,
        $filters = [],
        $limit = null,
        $startAfter = null,
        $orderByField = 'createdAt',
        $orderByDirection = 'DESC'
    ) {
        try {
            $query = $this->db->collection($collection);

            // Apply filters
            foreach ($filters as $filter) {
                $query = $query->where(
                    $filter['field'],
                    $filter['op'],
                    $filter['value']
                );
            }

            // Order
            if ($orderByField) {
                $query = $query->orderBy(
                    $orderByField,
                    strtolower($orderByDirection) === 'desc' ? 'DESC' : 'ASC'
                );
            }

            // Pagination (cursor)
            if ($startAfter) {
                $query = $query->startAfter($startAfter);
            }

            // Limit
            if ($limit) {
                $query = $query->limit($limit);
            }

            $documents = $query->documents();

            $results = [];
            foreach ($documents as $doc) {
                $results[] = array_merge(['id' => $doc->id()], $doc->data());
            }

            $last = end($results);

            return [
                'documents' => $results,
                'nextCursor' => $last[$orderByField] ?? null,
                'hasMore' => count($results) === ($limit ?? 0),
            ];

        } catch (Exception $e) {
            Log::error('Firestore query error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function paginatedQuery(
        $collection,
        $filters = [],
        $limit = null,
        $startAfter = null,
        $orderByField = 'createdAt',
        $orderByDirection = 'DESC'
    ) {
        try {
            $query = $this->db->collection($collection);

            // Apply filters
            foreach ($filters as $filter) {
                $query = $query->where(
                    $filter['field'],
                    $filter['op'],
                    $filter['value']
                );
            }

            // Order by createdAt AND id for uniqueness
            if ($orderByField) {
                $query = $query->orderBy($orderByField, strtolower($orderByDirection) === 'desc' ? 'DESC' : 'ASC')
                            ->orderBy('id', strtolower($orderByDirection) === 'desc' ? 'DESC' : 'ASC');
            }

            // Pagination with composite cursor
            if ($startAfter && isset($startAfter[$orderByField]) && isset($startAfter['id'])) {
                $query = $query->startAfter([$startAfter[$orderByField], $startAfter['id']]);
            }

            // Limit
            if ($limit) {
                $query = $query->limit($limit);
            }

            $documents = $query->documents();

            $results = [];
            foreach ($documents as $doc) {
                $results[] = array_merge(['id' => $doc->id()], $doc->data());
            }

            $last = end($results);
            
            // Return composite cursor
            return [
                'documents' => $results,
                'nextCursor' => $last ? [
                    $orderByField => $last[$orderByField] ?? null,
                    'id' => $last['id'] ?? null
                ] : null,
                'hasMore' => count($results) === ($limit ?? 0),
            ];

        } catch (Exception $e) {
            Log::error('Firestore query error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function first(
        $collection,
        $filters = [],
        $orderByField = null,
        $orderByDirection = 'DESC'
    ) {
        try {
            $query = $this->db->collection($collection);

            // Apply filters
            foreach ($filters as $filter) {
                $query = $query->where(
                    $filter['field'],
                    $filter['op'],
                    $filter['value']
                );
            }

            // Optional ordering
            if ($orderByField) {
                $query = $query->orderBy(
                    $orderByField,
                    strtolower($orderByDirection) === 'desc' ? 'DESC' : 'ASC'
                );
            }

            // Only 1 document
            $documents = $query->limit(1)->documents();

            foreach ($documents as $doc) {
                if (!$doc->exists()) {
                    return null;
                }

                return array_merge(['id' => $doc->id()], $doc->data());
            }

            return null;

        } catch (Exception $e) {
            Log::error('Firestore first error: ' . $e->getMessage());
            throw $e;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Count
    |--------------------------------------------------------------------------
    */

    public function count($collection, $filters = [])
    {
        try {
            $query = $this->db->collection($collection);

            foreach ($filters as $filter) {
                $query = $query->where(
                    $filter['field'],
                    $filter['op'],
                    $filter['value']
                );
            }

            return count(iterator_to_array($query->documents()));
        } catch (Exception $e) {
            Log::error('Firestore count error: ' . $e->getMessage());
            return 0;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Batch Insert
    |--------------------------------------------------------------------------
    */

    public function bulkInsert($collection, $documents)
    {
        try {
            $batch = $this->db->batch();

            foreach ($documents as $id => $data) {
                $docRef = $this->db->collection($collection)->document($id);
                $batch->set($docRef, $data);
            }

            $batch->commit();

            return true;
        } catch (Exception $e) {
            Log::error('Firestore bulkInsert error: ' . $e->getMessage());
            throw $e;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Storage URL
    |--------------------------------------------------------------------------
    */

    public function getStorageUrl(string $path): string
    {
        $bucket = config('services.firebase.storage_bucket');

        return "https://firebasestorage.googleapis.com/v0/b/{$bucket}/o/"
            . urlencode($path)
            . "?alt=media";
    }
}