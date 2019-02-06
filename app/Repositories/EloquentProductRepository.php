<?php

namespace App\Repositories;


use App\Product;
use App\Repositories\Contracts\ProductRepository;

class EloquentProductRepository implements ProductRepository
{
    public function get(int $id): Product
    {
        return Product::findOrFail($id);
    }

    public function save(Product $product): void
    {
        $product->saveOrFail();
    }

    public function delete(int $id): void
    {
        Product::where('id', $id)->delete();
    }
}
