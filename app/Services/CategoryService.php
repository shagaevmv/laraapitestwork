<?php

namespace App\Services;

use App\Category;
use App\DTO\CategoryDTO;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\ProductCategoryRepository;
use App\Services\Exceptions\ServiceException;
use Illuminate\Support\Facades\DB;
use Throwable;

class CategoryService
{
    /** @var CategoryRepository */
    private $categories;

    /** @var ProductCategoryRepository */
    private $productCategories;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductCategoryRepository $productCategoryRepository
    ) {
        $this->categories = $categoryRepository;
        $this->productCategories = $productCategoryRepository;
    }

    public function add(CategoryDTO $categoryDTO): Category
    {
        DB::beginTransaction();

        try {
            $category = new Category(['title' => $categoryDTO->title]);
            $this->categories->save($category);

            DB::commit();

            return $category;
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new ServiceException('CategoryService::add internal error');
        }
    }

    public function update(int $categoryId, CategoryDTO $categoryDTO): void
    {
        DB::beginTransaction();

        try {
            $category = $this->categories->get($categoryId);
            $category->title = $categoryDTO->title;

            $this->categories->save($category);

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();

            throw new ServiceException('CategoryService::update internal error');
        }
    }

    public function delete(int $categoryId): void
    {
        DB::beginTransaction();

        try {
            $this->categories->delete($categoryId);
            $this->productCategories->deleteByCategoryId($categoryId);
            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();

            throw new ServiceException('CategoryService::delete internal error');
        }
    }
}
