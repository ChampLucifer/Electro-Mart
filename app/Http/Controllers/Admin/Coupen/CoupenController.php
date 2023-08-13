<?php

namespace App\Http\Controllers\Admin\Coupen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupen;
class CoupenController extends Controller
{
 public function index()
 {
    return view('admin_layout.coupen.index');
 }

 public function create()
 {
    return view('admin_layout.coupen.create');
 }
}
