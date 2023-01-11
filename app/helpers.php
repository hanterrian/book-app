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
