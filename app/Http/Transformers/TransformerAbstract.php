<?php

namespace App\Http\Transformers;

abstract class TransformerAbstract
{
    private ?int $collectionSize = null;

    public function transform(array $collection): array
    {
        $transformCollection = array_map([$this, 'getItemStructure'], $collection);

        if ($this->collectionSize) {
            $transformCollection = array_slice($transformCollection, 0 , $this->collectionSize);
        }

        return $transformCollection;
    }

    public function setLimit(int $collectionSize): self
    {
        $this->collectionSize = $collectionSize;

        return $this;
    }

    abstract protected function getItemStructure(array $item): array;
}
