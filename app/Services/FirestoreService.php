<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Google\Auth\Credentials\ServiceAccountCredentials;
use Exception;

class FirestoreService
{
    protected $projectId;
    protected $credentialsPath;
    protected $maxBatchSize = 500;
    protected $defaultPageSize = 50;

    public function __construct()
    {
        $this->projectId = config('services.firebase.project_id');
        $this->credentialsPath = storage_path('app/firebase/firebase_credentials.json');
        
        if (!file_exists($this->credentialsPath)) {
            throw new Exception('Firebase credentials file not found: ' . $this->credentialsPath);
        }
    }

    protected function baseUrl()
    {
        return "https://firestore.googleapis.com/v1/projects/{$this->projectId}/databases/(default)/documents";
    }

    /*
    |--------------------------------------------------------------------------
    | Core CRUD Operations
    |--------------------------------------------------------------------------
    */

    /**
     * Create a new document with auto-generated ID
     */
    public function create($collection, $data)
    {
        try {
            $response = $this->request()->post(
                $this->baseUrl() . "/{$collection}",
                $this->format($data)
            );

            if ($response->failed()) {
                $this->handleError($response);
            }

            return $response->json();
        } catch (Exception $e) {
            Log::error('Firestore create error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Create a document with specific ID
     */
    public function createWithId($collection, $documentId, $data)
    {
        try {
            $response = $this->request()->post(
                $this->baseUrl() . "/{$collection}/{$documentId}",
                $this->format($data)
            );

            if ($response->failed()) {
                $this->handleError($response);
            }

            return $response->json();
        } catch (Exception $e) {
            Log::error('Firestore create with ID error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get all documents from a collection (paginated)
     */
    public function get($collection, $pageSize = null, $pageToken = null)
    {
        try {
            $pageSize = $pageSize ?? $this->defaultPageSize;
            $url = $this->baseUrl() . "/{$collection}";
            $params = ['pageSize' => $pageSize];
            
            if ($pageToken) {
                $params['pageToken'] = $pageToken;
            }

            $response = $this->request()->get($url, $params);

            if ($response->failed()) {
                $this->handleError($response);
            }

            $result = $response->json();
            
            return [
                'documents' => $result['documents'] ?? [],
                'nextPageToken' => $result['nextPageToken'] ?? null
            ];
        } catch (Exception $e) {
            Log::error('Firestore get error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get all documents from a collection (no pagination - use with caution!)
     */
    public function getAll($collection, $maxResults = 1000)
    {
        $allDocuments = [];
        $pageToken = null;
        $remaining = $maxResults;

        do {
            $pageSize = min($this->defaultPageSize, $remaining);
            $result = $this->get($collection, $pageSize, $pageToken);
            
            $allDocuments = array_merge($allDocuments, $result['documents']);
            $pageToken = $result['nextPageToken'];
            $remaining -= count($result['documents']);

        } while ($pageToken && $remaining > 0);

        return $allDocuments;
    }

    /**
     * Find a specific document by ID
     */
    public function find($collection, $documentId)
    {
        try {
            $response = $this->request()->get(
                $this->baseUrl() . "/{$collection}/{$documentId}"
            );

            if ($response->failed()) {
                if ($response->status() === 404) {
                    return null;
                }
                $this->handleError($response);
            }

            return $response->json();
        } catch (Exception $e) {
            Log::error('Firestore find error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Update a document
     */
    public function update($collection, $documentId, $data)
    {
        try {
            $response = $this->request()->patch(
                $this->baseUrl() . "/{$collection}/{$documentId}",
                $this->format($data)
            );

            if ($response->failed()) {
                $this->handleError($response);
            }

            return $response->json();
        } catch (Exception $e) {
            Log::error('Firestore update error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Delete a document
     */
    public function delete($collection, $documentId)
    {
        try {
            $response = $this->request()->delete(
                $this->baseUrl() . "/{$collection}/{$documentId}"
            );

            if ($response->failed() && $response->status() !== 404) {
                $this->handleError($response);
            }

            return $response->successful();
        } catch (Exception $e) {
            Log::error('Firestore delete error: ' . $e->getMessage());
            throw $e;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Query Operations
    |--------------------------------------------------------------------------
    */

    /**
     * Run a structured query with filters
     */
    public function query($collection, $filters = [], $limit = null, $pageToken = null)
    {
        try {
            $structuredQuery = [
                "structuredQuery" => [
                    "from" => [
                        ["collectionId" => $collection]
                    ]
                ]
            ];

            // Add filters if provided
            if (!empty($filters)) {
                $structuredQuery['structuredQuery']['where'] = $this->buildWhereClause($filters);
            }

            // Add limit if provided
            if ($limit) {
                $structuredQuery['structuredQuery']['limit'] = min($limit, 1000);
            }

            // Add order by if needed (optional)
            // $structuredQuery['structuredQuery']['orderBy'] = [...]

            $response = $this->request()
                ->post($this->baseUrl() . ":runQuery", $structuredQuery);

            if ($response->failed()) {
                $this->handleError($response);
            }

            $results = $response->json();
           
            $documents = collect($results)
                ->pluck('document')
                ->filter()
                ->map(function ($doc) {
                    return array_merge(
                        [
                            'id' => basename($doc['name']),
                            'createTime' => $doc['createTime'] ?? null,
                            'updateTime' => $doc['updateTime'] ?? null,
                        ],
                        $this->decodeFields($doc['fields'] ?? [])
                    );
                })
                ->values()
                ->all();

            return [
                'documents' => $documents,
                'nextPageToken' => $results['nextPageToken'] ?? null
            ];
        } catch (Exception $e) {
            Log::error('Firestore query error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Stream query results for large datasets
     */
    public function streamQuery($collection, $filters = [], $callback, $maxResults = null)
    {
        $pageToken = null;
        $resultsCount = 0;
        
        do {
            $remaining = $maxResults ? $maxResults - $resultsCount : null;
            $limit = $remaining ? min(500, $remaining) : 500;
            
            $result = $this->query($collection, $filters, $limit, $pageToken);
            
            foreach ($result['documents'] as $document) {
                $callback($document);
                $resultsCount++;
                
                if ($maxResults && $resultsCount >= $maxResults) {
                    break 2;
                }
            }
            
            $pageToken = $result['nextPageToken'];
            
        } while ($pageToken && (!$maxResults || $resultsCount < $maxResults));
        
        return $resultsCount;
    }

    /**
     * Query across subcollections (collection group query)
     */
    public function collectionGroupQuery($collectionId, $filters = [], $limit = null)
    {
        try {
            $structuredQuery = [
                "from" => [
                    ["collectionId" => $collectionId, "allDescendants" => true]
                ]
            ];

            if (!empty($filters)) {
                $structuredQuery['where'] = $this->buildWhereClause($filters);
            }

            if ($limit) {
                $structuredQuery['limit'] = min($limit, 1000);
            }

            $response = $this->request()
                ->withBody(json_encode(["structuredQuery" => $structuredQuery]), 'application/json')
                ->post($this->baseUrl() . '/documents:runQuery');

            if ($response->failed()) {
                $this->handleError($response);
            }

            $results = $response->json();
            
            return collect($results)
                ->pluck('document')
                ->filter()
                ->values()
                ->all();
        } catch (Exception $e) {
            Log::error('Firestore collection group query error: ' . $e->getMessage());
            throw $e;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Batch Operations (for large datasets)
    |--------------------------------------------------------------------------
    */

    /**
     * Batch write operations (max 500 per batch)
     */
    public function batchWrite($collection, $operations)
    {
        $writes = [];
        
        foreach ($operations as $op) {
            $write = [];
            
            if ($op['type'] === 'create') {
                $write['update'] = [
                    'name' => $this->baseUrl() . "/{$collection}/{$op['documentId']}",
                    'fields' => $this->format($op['data'])['fields']
                ];
                $write['currentDocument'] = ['exists' => false];
            } 
            elseif ($op['type'] === 'update') {
                $write['update'] = [
                    'name' => $this->baseUrl() . "/{$collection}/{$op['documentId']}",
                    'fields' => $this->format($op['data'])['fields']
                ];
            }
            elseif ($op['type'] === 'delete') {
                $write['delete'] = $this->baseUrl() . "/{$collection}/{$op['documentId']}";
            }
            
            $writes[] = $write;
        }
        
        // Split into batches of 500 (Firestore limit)
        $batches = array_chunk($writes, $this->maxBatchSize);
        $results = [];
        
        foreach ($batches as $batch) {
            $response = $this->request()
                ->post($this->baseUrl() . '/documents:commit', [
                    'writes' => $batch
                ]);
                
            if ($response->failed()) {
                $this->handleError($response);
            }
            
            $results[] = $response->json();
        }
        
        return $results;
    }

    /**
     * Bulk insert documents
     */
    public function bulkInsert($collection, $documents)
    {
        $operations = [];
        
        foreach ($documents as $id => $data) {
            $operations[] = [
                'type' => 'create',
                'documentId' => $id,
                'data' => $data
            ];
        }
        
        return $this->batchWrite($collection, $operations);
    }

    /*
    |--------------------------------------------------------------------------
    | Storage Operations
    |--------------------------------------------------------------------------
    */

    /**
     * Get Firebase Storage URL for a file
     */
    public function getStorageUrl(string $path): string
    {
        $bucket = config('services.firebase.storage_bucket');
        
        if (!$bucket) {
            throw new Exception('Firebase storage bucket not configured');
        }
        
        return "https://firebasestorage.googleapis.com/v0/b/{$bucket}/o/"
            . urlencode($path)
            . "?alt=media";
    }

    /*
    |--------------------------------------------------------------------------
    | HTTP Client with Authentication
    |--------------------------------------------------------------------------
    */

    protected function request()
    {
        return Http::withToken($this->getAccessToken())
            ->acceptJson()
            ->timeout(30)
            ->retry(3, 100);
    }

    protected function getAccessToken()
    {
        try {
            $credentials = new ServiceAccountCredentials(
                ['https://www.googleapis.com/auth/datastore'],
                json_decode(file_get_contents($this->credentialsPath), true)
            );

            $token = $credentials->fetchAuthToken();
            
            if (!isset($token['access_token'])) {
                throw new Exception('Failed to fetch access token');
            }
            
            return $token['access_token'];
        } catch (Exception $e) {
            Log::error('Firestore auth error: ' . $e->getMessage());
            throw new Exception('Failed to authenticate with Firebase: ' . $e->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Data Formatting
    |--------------------------------------------------------------------------
    */

    protected function format($data)
    {
        $fields = [];

        foreach ($data as $key => $value) {
            if ($value === null) {
                $fields[$key] = ['nullValue' => null];
            } else {
                $fields[$key] = $this->detectType($value);
            }
        }

        return ['fields' => $fields];
    }

    protected function detectType($value)
    {
        return match (true) {
            is_int($value) => ['integerValue' => $value],
            is_bool($value) => ['booleanValue' => $value],
            is_float($value) => ['doubleValue' => $value],
            is_array($value) => $this->isSequentialArray($value) 
                ? $this->encodeArrayValue($value)
                : $this->encodeMapValue($value),
            default => ['stringValue' => (string) $value],
        };
    }

    protected function isSequentialArray($array)
    {
        return array_keys($array) === range(0, count($array) - 1);
    }

    protected function encodeArrayValue($array)
    {
        return [
            'arrayValue' => [
                'values' => array_map([$this, 'detectType'], $array)
            ]
        ];
    }

    protected function encodeMapValue($map)
    {
        return [
            'mapValue' => [
                'fields' => $this->format($map)['fields']
            ]
        ];
    }

    protected function buildWhereClause($filters)
    {
        if (count($filters) === 1) {
            $filter = $filters[0];
            return [
                "fieldFilter" => [
                    "field" => ["fieldPath" => $filter['field']],
                    "op" => $this->mapOperator($filter['op']),
                    "value" => $this->encodeValue($filter['value'])
                ]
            ];
        }
        
        return [
            "compositeFilter" => [
                "op" => "AND",
                "filters" => array_map(function ($filter) {
                    return [
                        "fieldFilter" => [
                            "field" => ["fieldPath" => $filter['field']],
                            "op" => $this->mapOperator($filter['op']),
                            "value" => $this->encodeValue($filter['value'])
                        ]
                    ];
                }, $filters)
            ]
        ];
    }

    protected function mapOperator($op)
    {
        return match ($op) {
            '=', '==' => 'EQUAL',
            '!=' => 'NOT_EQUAL',
            '>' => 'GREATER_THAN',
            '>=' => 'GREATER_THAN_OR_EQUAL',
            '<' => 'LESS_THAN',
            '<=' => 'LESS_THAN_OR_EQUAL',
            'array-contains' => 'ARRAY_CONTAINS',
            'array-contains-any' => 'ARRAY_CONTAINS_ANY',
            'in' => 'IN',
            'not-in' => 'NOT_IN',
            default => throw new Exception("Unsupported operator: $op"),
        };
    }

    protected function encodeValue($value)
    {
        if (is_array($value)) {
            if ($this->isSequentialArray($value)) {
                return [
                    "arrayValue" => [
                        "values" => array_map([$this, 'encodeValue'], $value)
                    ]
                ];
            }
            
            return [
                "mapValue" => [
                    "fields" => collect($value)->map(function ($val, $key) {
                        return $this->encodeValue($val);
                    })->toArray()
                ]
            ];
        }

        if (is_bool($value)) {
            return ["booleanValue" => $value];
        }

        if (is_int($value)) {
            return ["integerValue" => $value];
        }
        
        if (is_float($value)) {
            return ["doubleValue" => $value];
        }
        
        if ($value === null) {
            return ["nullValue" => null];
        }

        return ["stringValue" => (string) $value];
    }

    /*
    |--------------------------------------------------------------------------
    | Error Handling
    |--------------------------------------------------------------------------
    */

    protected function handleError($response)
    {
        $error = $response->json();
        $errorMessage = $error['error']['message'] ?? 'Unknown Firestore error';
        $errorCode = $response->status();
        
        // Check for missing index
        if (str_contains($errorMessage, 'index')) {
            Log::warning('Missing Firestore index. Check Firebase console for index creation URL.');
        }
        
        throw new Exception("Firestore error ({$errorCode}): {$errorMessage}");
    }

    protected function decodeFields($fields)
    {
        $decoded = [];

        foreach ($fields as $key => $value) {
            $decoded[$key] = $this->decodeValue($value);
        }

        return $decoded;
    }

    protected function decodeValue($value)
    {
        if (isset($value['stringValue'])) {
            return $value['stringValue'];
        }

        if (isset($value['integerValue'])) {
            return (int) $value['integerValue'];
        }

        if (isset($value['doubleValue'])) {
            return (float) $value['doubleValue'];
        }

        if (isset($value['booleanValue'])) {
            return $value['booleanValue'];
        }

        if (isset($value['nullValue'])) {
            return null;
        }

        if (isset($value['arrayValue'])) {
            return collect($value['arrayValue']['values'] ?? [])
                ->map(fn($v) => $this->decodeValue($v))
                ->toArray();
        }

        if (isset($value['mapValue'])) {
            return $this->decodeFields($value['mapValue']['fields'] ?? []);
        }

        return null;
    }
}