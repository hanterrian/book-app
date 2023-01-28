<?php

namespace App\Models;

use Database\Factories\PageFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $layout
 * @property array $blocks
 * @property bool $is_active
 * @property bool $searchable
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Database\Factories\PageFactory factory(...$parameters)
 * @method static Builder|Page hasSlug(string $slug)
 * @method static Builder|Page isActive()
 * @method static Builder|Page newModelQuery()
 * @method static Builder|Page newQuery()
 * @method static \Illuminate\Database\Query\Builder|Page onlyTrashed()
 * @method static Builder|Page query()
 * @method static Builder|Page whereBlocks($value)
 * @method static Builder|Page whereCreatedAt($value)
 * @method static Builder|Page whereDeletedAt($value)
 * @method static Builder|Page whereId($value)
 * @method static Builder|Page whereIsActive($value)
 * @method static Builder|Page whereLayout($value)
 * @method static Builder|Page whereSearchable($value)
 * @method static Builder|Page whereSlug($value)
 * @method static Builder|Page whereTitle($value)
 * @method static Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Page withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Page withoutTrashed()
 * @mixin Eloquent
 */
class Page extends Model
{
    use HasFactory, SoftDeletes, HasSlug, Searchable;

    protected $fillable = [
        'title',
        'slug',
        'blocks',
        'layout',
        'is_active',
        'searchable',
    ];

    protected $casts = [
        'blocks' => 'array',
        'is_active' => 'bool',
        'searchable' => 'bool',
    ];

    protected $attributes = [
        'is_active' => true,
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
            'blocks' => $this->blocks,
        ];
    }

    public function scopeIsActive(): Page|Builder
    {
        return $this->where('is_active', true);
    }

    public function scopeHasSlug(Builder $query, string $slug): Page|Builder
    {
        return $query->where('slug', $slug);
    }
}
