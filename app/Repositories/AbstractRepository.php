<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    abstract public function create($data);

    public function createWithCallback($data, Callable $callback) {
        $newEntity = $this->create($data);
        $callback($newEntity);

        return $newEntity;
    }

    abstract public function find($id);

    public function update(Model $entity, $data) {
        return $entity->update($data);
    }
}