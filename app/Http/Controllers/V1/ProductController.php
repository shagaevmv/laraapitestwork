<?php

namespace App\Http\Controllers\V1;

use App\DTO\ProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateProductRequestUpdate;
use App\Repositories\Contracts\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(
        Request $request,
        ValidateProductRequestUpdate $validateProductSave,
        ProductService $productService
    ) {
        $productDTO = new ProductDTO($request->only(['title', 'categories']));
        return $productService->add($productDTO);
    }

    public function update(
        Request $request,
        ValidateProductRequestUpdate $validateProductSave,
        ProductService $productService,
        ProductRepository $products,
        int $id
    ) {
        $productDTO = new ProductDTO($request->only(['title', 'categories']));
        $productService->update($id, $productDTO);

        return $products->get($id);
    }

    public function delete(ProductService $productService, int $id)
    {
        $productService->delete($id);
    }
}
