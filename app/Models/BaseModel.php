<?php

namespace App\Models;

use App\Services\FirestoreService;
use Illuminate\Support\Facades\Auth;

abstract class BaseModel
{
    protected FirestoreService $firestore;
    protected string $collection;

    public function __construct()
    {
        $this->firestore = app(FirestoreService::class);
    }

    // -------------------------
    // CRUD METHODS
    // -------------------------

    public function create(array $data)
    {
        $this->authorize('create', $data);

        $response = $this->firestore->create($this->collection, $data);

        return $this->mapDocument($response);
    }

    public function find(string $id)
    {
        $doc = $this->firestore->find($this->collection, $id);

        $this->authorize('view', $doc);

        return $this->mapDocument($doc);
    }

    public function all(array $filters = [])
    {
        $documents = $this->firestore->get($this->collection);

        return collect($documents)
            ->map(fn($doc) => $this->mapDocument($doc))
            ->filter(fn($doc) => $this->authorize('view', $doc, false))
            ->values();
    }

    public function update(string $id, array $data)
    {
        $existing = $this->find($id);

        $this->authorize('update', $existing);

        $updated = $this->firestore->update($this->collection, $id, $data);

        return $this->mapDocument($updated);
    }

    public function delete(string $id)
    {
        $existing = $this->find($id);

        $this->authorize('delete', $existing);

        return $this->firestore->delete($this->collection, $id);
    }

    // -------------------------
    // MAPPING (Firestore → PHP)
    // -------------------------

    protected function mapDocument($doc)
    {
        if (!$doc) return null;

        // Already normalized by FirestoreService
        return $doc;
    }

    // -------------------------
    // AUTHORIZATION LAYER
    // -------------------------

    protected function authorize(string $action, array $data = null, bool $throw = true)
    {
        $user = Auth::user();

        if (!$user && $action === 'view') {
            return true;
        }

        if (!$user) {
            if ($throw) abort(401, 'Unauthorized');
            return false;
        }

        $allowed = $this->checkAccess($user, $action, $data);

        if (!$allowed && $throw) {
            abort(403, 'Forbidden');
        }

        return $allowed;
    }

    /**
     * Override this in child models
     */
    protected function checkAccess($user, string $action, ?array $data): bool
    {
        return true;
    }

    public static function query()
    {
        return new \App\Services\FirestoreQuery(
            app(static::class)->collection
        );
    }
}