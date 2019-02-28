<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

abstract class AbstractRepository
{
    protected $modelClassName;

    final public function __construct() {
        $shortClassName = (new \ReflectionClass(static::class))->getShortName();
        $modelClassName = str_replace('Repository', '', $shortClassName);
        $modelClassName = "App\Models\\$modelClassName";
        $this->modelClassName = $modelClassName;
    }

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

    public function getPage(Builder $query, $page = 0) {
        if($page == 0) {
            return $query->get();
        }
        return $query->simplePaginate(config('pagination.per_page'));
    }

    public function buildFromObject($object) {
        return $this->_cast($this->modelClassName, $object);
    }

    protected function _cast($className, $object) {
        return unserialize(sprintf(
            'O:%d:"%s"%s',
            \strlen($className),
            $className,
            strstr(strstr(serialize($object), '"'), ':')
        ));
    }
}