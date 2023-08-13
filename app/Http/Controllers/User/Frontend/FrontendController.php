<?php

namespace App\Http\Controllers\User\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;


class FrontendController extends Controller
{
  public function index()
  {
    $sliders  = Slider::where('status','0')->get();
    $trendings = Product::latest()->take(15)->get();
    $top_sellings = OrderItem::select('product_id', \DB::raw('COUNT(*) as total'))
    ->with('product')
    ->groupBy('product_id')
    ->get();
    return view('user_layout.home_page',compact('sliders','trendings','top_sellings'));
  }

  public function categories()
  {
    $categories  = Category::where('status','0')->get();
    return view('user_layout.collection.category.index',compact('categories'));
  }

  public function products( $category_slug )
  {
    $category = Category::where('slug',$category_slug)->first();
   
    if( $category )
    {
      $categories  = Category::where('status','0')->get();
      return view('user_layout.collection.product.index',compact('category','categories'));
 
    }
    else
    {
      return redirect()->back();
    }
  }
  public function product_view( string $category_slug, string $product_slug )
  {
    $category  = Category::where('slug',$category_slug)->first();

    if( $category )
    {
      $product = $category->products->where('slug',$product_slug)->where('status','0')->first();
        if( $product )
        {
          return view('user_layout.collection.product.view',compact('category','product')); 
        }
        else
        {
          return redirect()->back();
        }
    }
    else
    {
      return redirect()->back();
    }
  }

  public function brands()
  {
    $brands  = Brand::where('status','0')->get();
    return view('user_layout.collection.brand.index',compact('brands'));
  }









  public function thank_you()
  {
    return view('user_layout.collection.check_out.thank-you');
  }

  public function search_products( Request $request)
  {
    if( $request->search )
    {
      $search_products = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(10);
      if( $search_products )
      {
        
if ($search_products->isEmpty()) {
  $search_products = Product::whereHas('category', function ($query) use ($request) {
      $query->where('name', 'LIKE', '%' . $request->search . '%');
  })->orWhereHas('brand', function ($query) use ($request) {
      $query->where('name', 'LIKE', '%' . $request->search . '%');
  })->latest()->paginate(2);
}
      
      return view('user_layout.pages.search', compact('search_products'));
    }
    else
    {
      return redirect()->back()->with('message','Empty Search');
    }
  
  }}
}

