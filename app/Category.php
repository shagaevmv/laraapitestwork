<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $title
 * @property int $created_at
 * @property int $updated_at
 * Relations:
 * @property Product[] $products
 */
class Category extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['title'];

    public function Products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_category', 'category_id', 'product_id');
    }
}
