<?php

namespace App\Repositories;

use Nahid\JsonQ\Jsonq;
use Nahid\QArray\Clause;
use Nahid\QArray\Exceptions\InvalidNodeException;

class ProductRepository
{
    public const PRODUCT_KEY = 'products';

    private Jsonq $builder;

    public function __construct()
    {
        $this->builder = new Jsonq('/var/www/html/database/data/products.json');
    }

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

    /**
     * @throws InvalidNodeException
     */
    private function collection(): Clause
    {
        return $this->builder->from(self::PRODUCT_KEY);
    }
}
