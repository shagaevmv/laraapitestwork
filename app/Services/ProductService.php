<?php

namespace App\Services;

use App\DTO\ProductDTO;
use App\Product;
use App\Repositories\Contracts\ProductCategoryRepository;
use App\Repositories\Contracts\ProductRepository;
use App\Services\Exceptions\ServiceException;
use Illuminate\Support\Facades\DB;
use Throwable;

class ProductService
{
    /** @var ProductRepository */
    private $products;

    /** @var ProductCategoryRepository */
    private $productCategories;

    public function __construct(
        ProductRepository $productRepository,
        ProductCategoryRepository $productCategoryRepository
    ) {
        $this->products = $productRepository;
        $this->productCategories = $productCategoryRepository;
    }

    public function add(ProductDTO $productDTO): Product
    {
        DB::beginTransaction();

        try {
            $product = new Product(['title' => $productDTO->title]);
            $this->products->save($product);
            $this->productCategories->add($product->id, $productDTO->categories);

            DB::commit();

            return $product;
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new ServiceException('ProductService::add internal error' . $exception->getMessage());
        }
    }

    public function update(int $productId, ProductDTO $productDTO): void
    {
        DB::beginTransaction();

        try {
            $product = $this->products->get($productId);
            $product->title = $productDTO->title;

            $this->products->save($product);
            $this->productCategories->deleteByProductId($product->id);
            $this->productCategories->add($product->id, $productDTO->categories);

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();

            throw new ServiceException('ProductService::update internal error');
        }
    }

    public function delete(int $productId): void
    {
        DB::beginTransaction();

        try {
            $this->products->delete($productId);
            $this->productCategories->deleteByProductId($productId);
            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();

            throw new ServiceException('ProductService::delete internal error');
        }
    }
}
