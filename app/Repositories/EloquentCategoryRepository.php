<?php

namespace App\Repositories;


use App\Category;
use App\Repositories\Contracts\CategoryRepository;

class EloquentCategoryRepository implements CategoryRepository
{
    public function get(int $id): Category
    {
        /** @var Category $category */
        $category = Category::findOrFail($id);
        $category->load('products');

        return $category;
    }

    public function getAll(): iterable
    {
        return Category::all();
    }

    public function save(Category $category): void
    {
        $category->saveOrFail();
    }

    public function delete(int $id): void
    {
        Category::where('id', $id)->delete();
    }
}
