<?php

namespace App\Http\Controllers\User\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
 public function index()
 {
    return view('user_layout.collection.check_out.index');
 }
}
