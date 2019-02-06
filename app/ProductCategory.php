<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $product_id
 * @property int $category_id
 * @property int $created_at
 * @property int $updated_at
 */
class ProductCategory extends Model
{
    /** @var string */
    protected $table = 'product_category';

    /**
     * @var string[]
     */
    protected $fillable = ['product_id', 'category_id'];
}
