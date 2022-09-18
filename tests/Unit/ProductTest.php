<?php

namespace Tests\Unit;

use App\Repositories\ProductRepository;
use Tests\TestCase;

class ProductTest extends TestCase
{
    private static array $nativeProducts = [];

    private ?ProductRepository $repo = null;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        self::$nativeProducts = json_decode(file_get_contents(sprintf(
            '/var/www/html/tests/Fixtures/products.json',
        )), true);
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->repo = (new ProductRepository())->buildPath('tests/Fixtures')->build();
    }

    public function tearDown(): void
    {
        $this->repo = null;
    }

    public function test_get_all_products()
    {
        self::assertEquals($this->repo->findByCategoryAndPriceLess(), self::$nativeProducts['products']);
    }

    public function test_get_products_by_category()
    {
        $filteredProducts = [];

        foreach (self::$nativeProducts['products'] as $key => $nativeProduct) {
            if ($nativeProduct['category'] === 'boots') {
                $filteredProducts[$key] = $nativeProduct;
            }
        }

        self::assertEquals($this->repo->findByCategoryAndPriceLess('boots'), $filteredProducts);
    }

    public function test_get_products_by_priceLessThen()
    {
        $filteredProducts = [];

        foreach (self::$nativeProducts['products'] as $key => $nativeProduct) {
            if ($nativeProduct['price']['original'] <= 89001) {
                $filteredProducts[$key] = $nativeProduct;
            }
        }

        self::assertEquals(
            $this->repo->findByCategoryAndPriceLess(null, 89001),
            $filteredProducts
        );
    }
}
