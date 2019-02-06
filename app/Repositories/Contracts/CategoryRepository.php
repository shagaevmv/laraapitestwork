<?php

namespace App\Repositories\Contracts;

use App\Category;

interface CategoryRepository
{
    public function get(int $id): Category;

    public function getAll(): iterable;

    public function save(Category $category): void;

    public function delete(int $id): void;
}
