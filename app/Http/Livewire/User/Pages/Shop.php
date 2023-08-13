<?php

namespace App\Http\Livewire\User\Pages;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;

    public $category;
    public $brands;
    public $categories;
    public $brand_inputs = [];
    public $category_inputs = [];
    public $price_input;
public $products;
    protected $queryString = [
        'brand_inputs' => ['except' => '', 'as' => 'brand'],
        'price_input' => ['except' => '', 'as' => 'price'],
        'category_inputs' => ['except' => '', 'as' => 'category']
    ];

 
    public function mount( $categories,$brands)
    {
     
        $this->categories = $categories;
        $this->brands = $brands;
    }
    public function render()
    {
        $this->products = Product::when($this->brand_inputs, function ($query) {
            $query->whereIn('brand', $this->brand_inputs);
        })
        ->when($this->price_input, function ($query) {
            $query->when($this->price_input == "High-to-Low", function ($query_2) {
                $query_2->orderBy('selling_price', 'DESC');
            })
            ->when($this->price_input == "Low-to-High", function ($query_2) {
                $query_2->orderBy('selling_price', 'ASC');
            })
            ->when($this->category_inputs,function ( $query ){
                $query->whereIn('category_id', $this->category_inputs);
            });
        })
        ->where('status', '0')
        ->get();
    
//    dd( $this->category_inputs );
    
        return view('livewire.user.pages.shop', [
            'products' => $this->products,
            'categories' => $this->categories,
            'brands' => $this->brands 
        ]);
    }
    
   
    
}
