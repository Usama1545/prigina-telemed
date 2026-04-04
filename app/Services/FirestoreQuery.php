<?php

namespace App\Services;

class FirestoreQuery
{
    protected $collection;
    protected $filters = [];
    protected $limit = null;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    public function where($field, $op, $value = null)
    {
        if ($value === null) {
            $value = $op;
            $op = '==';
        }

        $this->filters[] = compact('field', 'op', 'value');

        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function get()
    {
        $service = app(\App\Services\FirestoreService::class);
        $model = app(\App\Models\Firestore\Doctor::class); // we’ll improve later

        $docs = $service->query($this->collection, $this->filters, $this->limit);

        return collect($docs)
            ->map(fn($doc) => $model->mapDocument($doc))
            ->values();
    }
}