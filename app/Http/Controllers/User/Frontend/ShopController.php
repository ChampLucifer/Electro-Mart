<?php

namespace App\Http\Controllers\User\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;


class ShopController extends Controller
{
    public function index()
    {
        // $products = Product::orderBy('created_at','DESC')->get();
        $categories  = Category::where('status','0')->get();
        $brands = Brand::where('status','0')->get();
        return view('user_layout.pages.shop',compact('categories','brands'));
    }
  
}
