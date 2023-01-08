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
        $subFolder = floor($subFolder);

        return implode("/", array_filter([$subFolder, $file]));
    }
}
