<?php

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
        /** @var \Illuminate\Database\Eloquent\Model $model */
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
