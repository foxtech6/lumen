<?php

namespace Tests;

use App\Http\Transformers\ProductCollectionTransformer;
use App\Repositories\ProductRepository;

class ProductTest extends TestCase
{
    public function test_that_products_list_endpoint_returns_a_successful_response()
    {
        $this->get('/products');

        self::assertEquals(200, $this->response->getStatusCode());

        $repo = new ProductRepository();
        $transformer = new ProductCollectionTransformer();

        self::assertEquals(
            json_encode($transformer->transform($repo->findByCategoryAndPriceLess())),
            $this->response->getContent()
        );
    }
}
