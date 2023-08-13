<?php

namespace App\Http\Livewire\Admin\Product;
use App\Models\Product; 
use Livewire\WithPagination;
use Livewire\Component;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
   
    public function render()
    {
        $products = Product::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.product.index',['products'=>$products]);
    }
}
