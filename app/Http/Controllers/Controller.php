<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'Welcome to MYTHERESA API',
            'routes' => [
                'products' => [
                    'list' => '/products',
                    'example' => '/products?category=boots&priceLessThan=100000',
                    'attributes' => [
                        'category' => 'Can be filtered by category as a query string parameter',
                        'priceLessThan' => 'Can be filtered by priceLessThan as a query string parameter, '
                            . 'this filter applies before discounts are applied and will show products with prices '
                            . 'lesser than or equal the value provided',
                    ],
                ]
            ]
        ]);
    }
}
