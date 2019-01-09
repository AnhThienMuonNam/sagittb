<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function __construct()
	{
		$MenuCategories = Category::select('id','name','alias','image')->where('is_active',1)->where('is_deleted',0)->get();
		view()->share(['MenuCategories'=>$MenuCategories]);
	}
}
