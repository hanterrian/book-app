<?php

if (!function_exists('checkUrl')) {
    function checkUrl(string $route): bool
    {
        return url()->full() == $route;
    }
}
