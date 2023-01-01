<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int $product_category_id
 * @property int|null $product_id
 * @property string $title
 * @property string $slug
 * @property string|null $main_image
 * @property string|null $description
 * @property float|null $price
 * @property int $is_stockable
 * @property int $in_stock
 * @property int $is_group
 * @property int $is_subscribe
 * @property int $is_active
 * @property int $position
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProductCategory|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductComment[] $comments
 * @property-read int|null $comments_count
 * @property-read Product|null $group
 * @property-read \Illuminate\Database\Eloquent\Collection|Product[] $groupItems
 * @property-read int|null $group_items_count
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDeletedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereInStock($value)
 * @method static Builder|Product whereIsActive($value)
 * @method static Builder|Product whereIsGroup($value)
 * @method static Builder|Product whereIsStockable($value)
 * @method static Builder|Product whereIsSubscribe($value)
 * @method static Builder|Product whereMainImage($value)
 * @method static Builder|Product wherePosition($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product whereProductCategoryId($value)
 * @method static Builder|Product whereProductId($value)
 * @method static Builder|Product whereSlug($value)
 * @method static Builder|Product whereTitle($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Product extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function groupItems(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(ProductComment::class);
    }
}
