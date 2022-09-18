<?php

namespace App\Actions;

use App\Tasks\ListProductTask;
use Nahid\QArray\Exceptions\InvalidNodeException;

class ListProductsAction extends ActionAbstract
{
    public function __construct(private ListProductTask $listProductTask) {}

    /**
     * @throws InvalidNodeException
     */
    public function run(string $category = null, string $priceLessThan = null): array
    {
        return $this->listProductTask->run($category, $priceLessThan);
    }
}
