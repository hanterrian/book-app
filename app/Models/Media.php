<?php

namespace App\Models;

use FilamentCurator\Models\Media as BaseMedia;

/**
 * App\Models\Media
 *
 * @property int $id
 * @property string|null $public_id
 * @property string $filename
 * @property string|null $ext
 * @property string|null $type
 * @property string|null $alt
 * @property string|null $title
 * @property string|null $description
 * @property string|null $caption
 * @property int|null $width
 * @property int|null $height
 * @property string $disk
 * @property string|null $directory
 * @property int|null $size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read bool $has_sizes
 * @property-read string $medium_url
 * @property-read string $size_for_humans
 * @property-read string $thumbnail_url
 * @property-read string $url
 * @property-read string $large_url
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCaption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereDirectory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media wherePublicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereWidth($value)
 * @mixin \Eloquent
 */
class Media extends BaseMedia
{

}
