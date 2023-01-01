<?php

namespace App\Models;

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
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment newQuery()
 * @method static \Illuminate\Database\Query\Builder|ProductComment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereProductCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|ProductComment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProductComment withoutTrashed()
 * @mixin \Eloquent
 */
class ProductComment extends Model
{
    use HasFactory, SoftDeletes;

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
