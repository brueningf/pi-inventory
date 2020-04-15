<?php


use Illuminate\Support\Str;

if (!function_exists('classRouteName')) {
    function modelRouteName($model)
    {
        return Str::plural(Str::kebab(class_basename($model)));
    }
}
