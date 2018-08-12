<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;
use App\Logo;
use App\SeoConfig;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function __construct()
	{
		$MenuCategories = Category::where('is_active',1)->get();
		view()->share(['MenuCategories'=>$MenuCategories]);
	}
}
