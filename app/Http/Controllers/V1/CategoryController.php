<?php

namespace App\Http\Controllers\V1;

use App\DTO\CategoryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateCategoryRequestUpdate;
use App\Repositories\Contracts\CategoryRepository;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(CategoryRepository $categories)
    {
        return $categories->getAll();
    }

    public function show(CategoryRepository $categories, int $id)
    {
        $category = $categories->get($id);

        return $category;
    }

    public function store(
        Request $request,
        ValidateCategoryRequestUpdate $categoryRequestUpdate,
        CategoryService $categoryService
    ) {
        $categoryDTO = new CategoryDTO($request->only(['title']));

        return $categoryService->add($categoryDTO);
    }

    public function update(
        Request $request,
        ValidateCategoryRequestUpdate $categoryRequestUpdate,
        CategoryService $categoryService,
        CategoryRepository $categories,
        int $id
    ) {
        $categoryDTO = new CategoryDTO($request->only(['title']));
        $categoryService->update($id, $categoryDTO);

        return $categories->get($id);
    }

    public function delete(CategoryService $categoryService, $id)
    {
        $categoryService->delete($id);
    }
}
