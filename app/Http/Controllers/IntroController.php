<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class IntroController extends Controller
{
  
    //shop trang suc
    public function aboutUs()
    {
        return view('page2.intro.about_us');
    }

    public function shippingPolicy()
    {
        return view('page2.intro.shipping_policy');
    }

    public function guaranteePolicy()
    {
        return view('page2.intro.guarantee_policy');
    }

     public function jewelleryCare()
    {
        return view('page2.intro.jewellery_care');
    }


}