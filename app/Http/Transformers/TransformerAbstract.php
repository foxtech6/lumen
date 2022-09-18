<?php

namespace App\Http\Transformers;

abstract class TransformerAbstract
{
    protected const COLLECTION_SIZE = null;

    public function transform(array $collection): array
    {
        if (static::COLLECTION_SIZE) {
            $collection = array_slice($collection, 0 , static::COLLECTION_SIZE);
        }

        return array_map([$this, 'getItemStructure'], $collection);
    }

    abstract protected function getItemStructure(array $item): array;
}
