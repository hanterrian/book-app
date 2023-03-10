<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\ProductCategory
 *
 * @property int $id
 * @property int|null $product_category_id
 * @property string $title
 * @property string $slug
 * @property \App\Models\Media|null $image
 * @property bool $is_active
 * @property int $position
 * @property bool $searchable
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|ProductCategory[] $children
 * @property-read int|null $children_count
 * @property-read ProductCategory|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\ProductCategoryFactory factory(...$parameters)
 * @method static Builder|ProductCategory hasSlug(string $slug)
 * @method static Builder|ProductCategory isActive()
 * @method static Builder|ProductCategory newModelQuery()
 * @method static Builder|ProductCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|ProductCategory onlyTrashed()
 * @method static Builder|ProductCategory query()
 * @method static Builder|ProductCategory whereCreatedAt($value)
 * @method static Builder|ProductCategory whereDeletedAt($value)
 * @method static Builder|ProductCategory whereId($value)
 * @method static Builder|ProductCategory whereImage($value)
 * @method static Builder|ProductCategory whereIsActive($value)
 * @method static Builder|ProductCategory wherePosition($value)
 * @method static Builder|ProductCategory whereProductCategoryId($value)
 * @method static Builder|ProductCategory whereSearchable($value)
 * @method static Builder|ProductCategory whereSlug($value)
 * @method static Builder|ProductCategory whereTitle($value)
 * @method static Builder|ProductCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ProductCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProductCategory withoutTrashed()
 * @mixin \Eloquent
 */
class ProductCategory extends Model
{
    use HasFactory, SoftDeletes, HasSlug, Searchable;

    protected $fillable = [
        'product_category_id',
        'title',
        'slug',
        'image',
        'is_active',
        'position',
        'searchable',
    ];

    protected $casts = [
        'is_active' => 'bool',
        'position' => 'int',
        'searchable' => 'bool',
    ];

    protected $attributes = [
        'is_active' => true,
        'position' => 0,
        'searchable' => true,
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function searchable(): bool
    {
        return $this->is_active || $this->searchable;
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
        ];
    }

    public function scopeIsActive(): ProductCategory|Builder
    {
        return $this->where('is_active', true);
    }

    public function scopeHasSlug(Builder $query, string $slug): ProductCategory|Builder
    {
        return $query->where('slug', $slug);
    }

    public function image(): HasOne
    {
        return $this->hasOne(Media::class, 'id', 'image');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(ProductCategory::class, 'product_category_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }
}
