<?php

namespace App\Repositories;

use Nahid\QArray\Clause;
use Nahid\QArray\Exceptions\InvalidNodeException;

class ProductRepository extends RepositoryAbstract
{
    public const PRODUCT_KEY = 'products';

    /**
     * @throws InvalidNodeException
     */
    public function findByCategoryAndPriceLess(string $category = null, string $priceLessThan = null): array
    {
        $collection = $this->collection();

        if ($category) {
            $collection->where('category', '=', $category);
        }

        if ($priceLessThan) {
            $collection->where('price.original', '<=', $priceLessThan);
        }

        return $collection->get()->result();
    }

    protected function getDataFileName(): string
    {
        return self::PRODUCT_KEY;
    }

    /**
     * @throws InvalidNodeException
     */
    private function collection(): Clause
    {
        return $this->builder->from(self::PRODUCT_KEY);
    }
}
