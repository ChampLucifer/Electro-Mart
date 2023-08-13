<?php

namespace App\Http\Livewire\User\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    public $category;
    public $categories;
    public $brand_inputs = [];
    public $category_inputs = [];
    public $price_input;

    protected $queryString = [
        'brand_inputs' => ['except' => '', 'as' => 'brand'],
        'price_input' => ['except' => '', 'as' => 'price'],
        'category_inputs' => ['except' => '', 'as' => 'category']
    ];

    public function mount($category, $categories)
    {
        $this->category = $category;
        $this->categories = $categories;
    }

    public function render()
    {
        $products = Product::where('category_id', $this->category->id)
            ->when($this->brand_inputs, function ($query) {
                $query->whereIn('brand', $this->brand_inputs);
            })
            ->when($this->price_input, function ($query) {
                $query->when($this->price_input == "High-to-Low", function ($query_2) {
                    $query_2->orderBy('selling_price', 'DESC');
                })
                ->when($this->price_input == "Low-to-High", function ($query_2) {
                    $query_2->orderBy('selling_price', 'ASC');
                });
            })
            ->where('status', '0')
            ->get(); // Adjust the number of products per page as per your requirement

        return view('livewire.user.product.index', [
            'products' => $products,
            'category' => $this->category,
            'categories' => $this->categories
        ]);
    }

    public function filterByBrand()
    {
        // Code for filtering products by brand
    }
}
