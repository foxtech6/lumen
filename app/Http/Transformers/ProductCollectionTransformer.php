<?php

namespace App\Http\Transformers;

use JetBrains\PhpStorm\ArrayShape;

class ProductCollectionTransformer extends TransformerAbstract
{
    public const PRODUCTS_SIZE_RESPONSE = 5;

    #[ArrayShape(['sku' => "string", 'name' => "string", 'category' => "string", 'price' => "int"])]
    protected function getItemStructure(array $product): array
    {
        return [
            'sku' => $product['sku'],
            'name' => $product['name'],
            'category' => $product['category'],
            'price' => $product['price']['final'],
        ];
    }
}
