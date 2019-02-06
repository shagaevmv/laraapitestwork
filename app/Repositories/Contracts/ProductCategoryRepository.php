<?php

namespace App\Repositories\Contracts;

interface ProductCategoryRepository
{
    /**
     * @param int[] $categoryIds
     */
    public function add(int $productId, array $categoryIds): void;

    public function deleteByProductId(int $productId): void;

    public function deleteByCategoryId(int $categoryId): void;
}
