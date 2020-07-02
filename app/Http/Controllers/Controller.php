<?php

namespace App\Http\Controllers;

use App\Category;
use App\ItemCase;
use App\Manufacturer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        View::share('manufacturers', Manufacturer::orderBy('name')->get());
        View::share('availableCategories', Category::orderBy('name')->get());
        View::share('itemCases', ItemCase::orderBy('name')->get());
        View::share('categories', Category::whereNull('parent_id')->get());
    }
}
