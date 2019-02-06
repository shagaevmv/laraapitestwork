<?php

namespace App\Repositories\Contracts;

use App\Product;

interface ProductRepository
{
    public function get(int $id): Product;

    public function save(Product $product): void;

    public function delete(int $productId): void;

}
