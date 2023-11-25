<?php

if (!function_exists('current_theme_path')) {
    function current_theme_path()
    {
        return  '/mercury/assets/themes/' . config()->get('main.theme');
    }
}

if (!function_exists('global_theme_path')) {
    function global_theme_path()
    {
        return '/mercury/assets/themes/global';
    }
}
