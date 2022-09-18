<?php

namespace App\Tasks;

use App\Repositories\ProductRepository;
use Nahid\QArray\Exceptions\InvalidNodeException;

class ListProductTask extends TaskAbstract
{
    public function __construct(private ProductRepository $repository) {}

    /**
     * @throws InvalidNodeException
     */
    public function run(string $category = null, string $priceLessThan = null): array
    {
        return $this->repository->findByCategoryAndPriceLess($category, $priceLessThan);
    }
}
