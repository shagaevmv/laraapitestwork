<?php

namespace App\Repositories;

use App\ProductCategory;
use App\Repositories\Contracts\ProductCategoryRepository;

class EloquentProductCategoryRepository implements ProductCategoryRepository
{
    /**
     * @param int[] $categoryIds
     */
    public function add(int $productId, array $categoryIds): void
    {
        $arrayForInsert = [];
        foreach ($categoryIds as $categoryId) {
            $arrayForInsert[] = [
                'category_id' => $categoryId,
                'product_id' => $productId
            ];
        }

        ProductCategory::insert($arrayForInsert);
    }

    public function deleteByProductId(int $productId): void
    {
        ProductCategory::where('product_id', $productId)->delete();
    }

    public function deleteByCategoryId(int $categoryId): void
    {
        ProductCategory::where('category_id', $categoryId)->delete();
    }
}
