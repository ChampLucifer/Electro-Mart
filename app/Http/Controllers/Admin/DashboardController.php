<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\User;
use App\Models\Order;
class DashboardController extends Controller
{
    public function index()
    {
        $total_products = Product::count();
        $total_categories = Category::count();
        $total_brands = Brand::count();
        $total_all_users = User::count();
        $total_user = User::where('user_role','0')->count();
        $total_admin = User::where('user_role','1')->count();

        $today_date = Carbon::now()->format('Y-m-d');
        $this_month = Carbon::now()->format('m');
        $this_year = Carbon::now()->format('Y');

        $total_orders = Order::count();
        $today_orders = Order::whereDate('created_at',$today_date)->count();
        $this_month_orders = Order::whereMonth('created_at',$this_month)->count();
        $this_year_orders = Order::whereYear('created_at',$this_year)->count();

        return view('admin_layout.home_page',compact(
            'total_products',
            'total_categories',
            'total_brands',
            'total_all_users',
            'total_user',
            'total_admin',
            'total_orders',
            'today_orders',
            'this_month_orders',
            'this_year_orders'
        ));
    }
}
