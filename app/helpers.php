<?php

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;

if (!function_exists('checkUrl')) {
    function checkUrl(string $route): bool
    {
        return url()->full() == $route;
    }
}

if (!function_exists('subFolder')) {
    function subFolder(int $id, ?string $file = null): string
    {
        $subFolder = $id / 1000;
        $subFolder = (int) floor($subFolder);

        return is_null($file) ? $subFolder : "{$subFolder}/{$file}";
    }
}

if (!function_exists('getNextId')) {
    function getNextId(string $model): ?int
    {
        /** @var Model $model */
        $model = new $model();

        $statement = DB::select("SHOW TABLE STATUS LIKE '{$model->getTable()}'");
        return $statement[0]?->Auto_increment;
    }
}

if (!function_exists('merge')) {
    function merge(array &$target, array $items): void
    {
        $target = array_merge($target, $items);
    }
}

if (!function_exists('media')) {
    function media(int|string|array|null|Media $id, string $field = 'image'): ?Media
    {
        if (!$id) {
            return null;
        }

        if ($id instanceof Media) {
            return $id;
        }

        if (is_array($id)) {
            $id = $id[$field];
        }

        return Media::whereId($id)->first();
    }
}
