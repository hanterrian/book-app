<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ProductComment
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $product_comment_id
 * @property string $comment
 * @property string|null $attachment
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|ProductComment[] $children
 * @property-read int|null $children_count
 * @property-read ProductComment $parent
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ProductCommentFactory factory(...$parameters)
 * @method static Builder|ProductComment isActive()
 * @method static Builder|ProductComment newModelQuery()
 * @method static Builder|ProductComment newQuery()
 * @method static \Illuminate\Database\Query\Builder|ProductComment onlyTrashed()
 * @method static Builder|ProductComment query()
 * @method static Builder|ProductComment whereAttachment($value)
 * @method static Builder|ProductComment whereComment($value)
 * @method static Builder|ProductComment whereCreatedAt($value)
 * @method static Builder|ProductComment whereDeletedAt($value)
 * @method static Builder|ProductComment whereId($value)
 * @method static Builder|ProductComment whereIsActive($value)
 * @method static Builder|ProductComment whereProductCommentId($value)
 * @method static Builder|ProductComment whereProductId($value)
 * @method static Builder|ProductComment whereUpdatedAt($value)
 * @method static Builder|ProductComment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|ProductComment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProductComment withoutTrashed()
 * @mixin \Eloquent
 */
class ProductComment extends Model
{
    use HasFactory, SoftDeletes;

    public function scopeIsActive(): ProductComment|Builder
    {
        return $this->where('is_active', true);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProductComment::class, 'product_comment_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(ProductComment::class, 'product_comment_id');
    }
}
