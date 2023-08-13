<?php

namespace App\Http\Controllers\User\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartModel;
class CartController extends Controller
{
  public function index()
  {
    return view('user_layout.collection.cart.index');
  }
}
