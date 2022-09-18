<?php

namespace App\Http\Transformers;

abstract class TransformerAbstract
{
    public function transform(array $collection): array
    {
        return array_map([$this, 'getItemStructure'], $collection);
    }

    abstract protected function getItemStructure(array $item): array;
}
