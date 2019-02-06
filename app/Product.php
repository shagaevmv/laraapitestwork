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
 * @property Category[] $categories
 */
class Product extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['title'];

    /**
     * @var string[]
     */
    protected $hidden = ['pivot'];

    public function Categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }
}
