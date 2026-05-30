<?php

namespace App\Services;

use Exception;
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\Timestamp;
use Illuminate\Support\Facades\Log;

class FirestoreService
{
    protected $db;

    protected $defaultPageSize = 50;

    protected array $cache = [];

    protected static ?FirestoreClient $client = null;

    protected static ?array $credentials = null;

    public function __construct()
    {
        $this->db = self::client();
    }

    protected static function client(): FirestoreClient
    {
        if (self::$client) {
            return self::$client;
        }

        return self::$client = new FirestoreClient([
            'projectId' => config('services.firebase.project_id'),
            'keyFile' => self::credentials(),
        ]);
    }

    protected static function credentials(): array
    {
        if (self::$credentials !== null) {
            return self::$credentials;
        }

        $credentialsPath = storage_path('app/firebase/firebase_credentials.json');
        if (! file_exists($credentialsPath)) {
            throw new Exception('Firebase credentials file not found: '.$credentialsPath);
        }

        return self::$credentials = json_decode(file_get_contents($credentialsPath), true);
    }

    protected function cacheKey(string $method, array $parts): string
    {
        return $method.':'.md5(json_encode($parts));
    }

    protected function remember(string $method, array $parts, callable $callback)
    {
        $key = $this->cacheKey($method, $parts);

        if (array_key_exists($key, $this->cache)) {
            return $this->cache[$key];
        }

        return $this->cache[$key] = $callback();
    }

    protected function flushCollectionCache(string $collection): void
    {
        $this->cache = [];
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
            $this->flushCollectionCache($collection);

            return $docRef->snapshot()->data();
        } catch (Exception $e) {
            Log::error('Firestore create error: '.$e->getMessage());
            throw $e;
        }
    }

    public function createWithId($collection, $documentId, $data)
    {
        try {
            $this->db->collection($collection)
                ->document($documentId)
                ->set($data);

            $this->flushCollectionCache($collection);

            return $this->find($collection, $documentId);
        } catch (Exception $e) {
            Log::error('Firestore createWithId error: '.$e->getMessage());
            throw $e;
        }
    }

    public function find($collection, $documentId)
    {
        try {
            return $this->remember('find', [$collection, $documentId], function () use ($collection, $documentId) {
                $docRef = $this->db->collection($collection)->document($documentId);

                $snapshot = $docRef->snapshot();

                if (! $snapshot->exists()) {
                    return null;
                }

                $data = $snapshot->data();

                foreach ($data as $key => $value) {
                    if ($value instanceof Timestamp) {
                        $data[$key] = $value->get()->format('Y-m-d H:i:s');
                    }
                }

                return $data;
            });

        } catch (Exception $e) {
            Log::error('Firestore find error: '.$e->getMessage());

            return null; // IMPORTANT
        }
    }

    public function update($collection, $documentId, $data)
    {
        try {
            $this->db->collection($collection)
                ->document($documentId)
                ->set($data, ['merge' => true]);

            $this->flushCollectionCache($collection);

            return $this->find($collection, $documentId);
        } catch (Exception $e) {
            Log::error('Firestore update error: '.$e->getMessage());
            throw $e;
        }
    }

    public function delete($collection, $documentId)
    {
        try {
            $this->db->collection($collection)
                ->document($documentId)
                ->delete();

            $this->flushCollectionCache($collection);

            return true;
        } catch (Exception $e) {
            Log::error('Firestore delete error: '.$e->getMessage());
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

            return $this->remember('get', [$collection, $limit], function () use ($collection, $limit) {
                $documents = $this->db->collection($collection)
                    ->limit($limit)
                    ->documents();

                return collect($documents)->map(function ($doc) {
                    return array_merge(['id' => $doc->id()], $doc->data());
                })->values()->all();
            });

        } catch (Exception $e) {
            Log::error('Firestore get error: '.$e->getMessage());
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
            return $this->remember('query', [
                $collection,
                $filters,
                $limit,
                $startAfter,
                $orderByField,
                $orderByDirection,
            ], function () use ($collection, $filters, $limit, $startAfter, $orderByField, $orderByDirection) {
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
                    'nextCursor' => $orderByField ? ($last[$orderByField] ?? null) : null,
                    'hasMore' => count($results) === ($limit ?? 0),
                ];
            });

        } catch (Exception $e) {
            Log::error('Firestore query error: '.$e->getMessage());
            throw $e;
        }
    }

    public function paginatedQuery(
        $collection,
        $filters = [],
        $limit = 10,
        ?string $cursorDocId = null,
        $orderByField = 'createdAt',
        $orderByDirection = 'DESC'
    ) {
        try {
            $query = $this->db->collection($collection);

            foreach ($filters as $filter) {
                $query = $query->where($filter['field'], $filter['op'], $filter['value']);
            }

            if ($orderByField) {
                $query = $query->orderBy(
                    $orderByField,
                    strtolower($orderByDirection) === 'desc' ? 'DESC' : 'ASC'
                );
            }

            // Use a document snapshot as the cursor so Timestamp/complex field
            // types are handled by Firestore directly — no serialization needed.
            if ($cursorDocId) {
                $snapshot = $this->db->collection($collection)->document($cursorDocId)->snapshot();
                if ($snapshot->exists()) {
                    $query = $query->startAfter($snapshot);
                }
            }

            $query = $query->limit($limit);

            $documents = $query->documents();

            $results = [];
            $lastDocId = null;

            foreach ($documents as $doc) {
                $results[] = array_merge($doc->data(), ['documentId' => $doc->id()]);
                $lastDocId = $doc->id();
            }

            return [
                'documents' => $results,
                'nextCursor' => $lastDocId,
                'hasMore'    => count($results) === $limit,
            ];
        } catch (Exception $e) {
            Log::error('Firestore paginatedQuery error: '.$e->getMessage());
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
            return $this->remember('first', [
                $collection,
                $filters,
                $orderByField,
                $orderByDirection,
            ], function () use ($collection, $filters, $orderByField, $orderByDirection) {
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
                    if (! $doc->exists()) {
                        return null;
                    }

                    return array_merge(['id' => $doc->id()], $doc->data());
                }

                return null;
            });

        } catch (Exception $e) {
            Log::error('Firestore first error: '.$e->getMessage());
            throw $e;
        }
    }

    public function queryOffset(
        $collection,
        $filters = [],
        $limit = 30,
        $offset = 0,
        $orderByField = 'createdAt',
        $orderByDirection = 'DESC'
    ) {
        try {
            return $this->remember('queryOffset', [
                $collection,
                $filters,
                $limit,
                $offset,
                $orderByField,
                $orderByDirection,
            ], function () use ($collection, $filters, $limit, $offset, $orderByField, $orderByDirection) {
                $query = $this->db->collection($collection);

                foreach ($filters as $filter) {
                    $query = $query->where(
                        $filter['field'],
                        $filter['op'],
                        $filter['value']
                    );
                }

                if ($orderByField) {
                    $query = $query->orderBy(
                        $orderByField,
                        strtolower($orderByDirection) === 'desc' ? 'DESC' : 'ASC'
                    );
                }

                if ($offset > 0) {
                    $query = $query->offset($offset);
                }

                $documents = $query->limit($limit)->documents();

                $results = [];
                foreach ($documents as $doc) {
                    $results[] = array_merge(['id' => $doc->id()], $doc->data());
                }

                return $results;
            });

        } catch (Exception $e) {
            Log::error('Firestore queryOffset error: '.$e->getMessage());
            throw $e;
        }
    }

    /**
     * Fetch a page of documents using a document-ID cursor so the caller can
     * iterate through an entire collection in chunks without a hard limit.
     * Returns docs with the 'id' key (consistent with get() / find()).
     */
    public function getCursorPage(
        string $collection,
        int $limit = 500,
        ?string $afterDocId = null,
        ?string $orderByField = null,
        string $orderByDirection = 'DESC'
    ): array {
        try {
            $query = $this->db->collection($collection);

            if ($orderByField) {
                $query = $query->orderBy(
                    $orderByField,
                    strtolower($orderByDirection) === 'desc' ? 'DESC' : 'ASC'
                );
            }

            if ($afterDocId) {
                $snapshot = $this->db->collection($collection)->document($afterDocId)->snapshot();
                if ($snapshot->exists()) {
                    $query = $query->startAfter($snapshot);
                }
            }

            $query = $query->limit($limit);

            $documents = $query->documents();
            $results   = [];
            $lastDocId = null;
            $count     = 0;

            foreach ($documents as $doc) {
                $results[] = array_merge(['id' => $doc->id()], $doc->data());
                $lastDocId = $doc->id();
                $count++;
            }

            return [
                'documents'  => $results,
                'nextCursor' => $lastDocId,
                'hasMore'    => $count === $limit,
            ];
        } catch (Exception $e) {
            Log::error('Firestore getCursorPage error: '.$e->getMessage());
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
            return $this->remember('count', [$collection, $filters], function () use ($collection, $filters) {
                $query = $this->db->collection($collection);

                foreach ($filters as $filter) {
                    $query = $query->where(
                        $filter['field'],
                        $filter['op'],
                        $filter['value']
                    );
                }

                return count(iterator_to_array($query->documents()));
            });
        } catch (Exception $e) {
            Log::error('Firestore count error: '.$e->getMessage());

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
            Log::error('Firestore bulkInsert error: '.$e->getMessage());
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
            .urlencode($path)
            .'?alt=media';
    }
}
