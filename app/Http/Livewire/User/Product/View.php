<?php

namespace App\Http\Livewire\User\Product;
use Livewire\Component;
use App\Models\WishList;
use App\Models\Cart;
class View extends Component
{
    public $category,$product,$quantity_count=1,$product_color_quantity,$product_color_id;

    // ADD TO WISHLIST CODE SECTION
    public function add_to_wishlist( $product_id )
    {
        if(session()->has('user_id'))
        {
            $user_id = session()->get('user_id');
            if( WishList::where('user_id',$user_id)->where('product_id',$product_id)->exists() )
            {
                session()->flash('message','Product Already In Your WishList');
                return false;
            }
            else
            {
                WishList::create([
                    'user_id'=>$user_id,
                    'product_id'=>$product_id
                ]); 
                session()->flash('message','WishList Added');
            }
        }
        else
        {
            session()->flash('message','Please Login To Continue');
            return false;
        }
    }
    //  ADD TO WISHLIST CODE SECTION END 
    
    public function mount()
    {
        $category = $this->category;
        $product = $this->product;
    }
    public function render()
    {
        return view('livewire.user.product.view',[
            'category'=>$this->category,
            'product'=>$this->product
        ]);
    }

    // ADD TO CART SECTION
    public function increment_quantity()
    {
        if( $this->quantity_count <10 )
        {
            $this->quantity_count++;
        }
    }
    public function decrement_quantity()
    {
        if( $this->quantity_count >1 )
        {
        $this->quantity_count--;
        }
    }
    public function selectedColor($color_id)
    {
        $this->product_color_id = $color_id;
        $product_color= $this->product->productColors()->where('id',$color_id)->first();
        $this->product_color_quantity = $product_color->quantity;
        if( $this->product_color_quantity ==0 )
        {
           $this-> product_color_quantity="OOS";  //OOS = OUT OF STOCK
        }
    }
 
    public function add_to_cart($product_id)
{
    if (!session()->has('user_id')) {
        session()->flash('message', 'Please Login To Continue');
        return false;
    }

    $user_id = session()->get('user_id');
    $product = $this->product->find($product_id);

    if (!$product) {
        session()->flash('message', 'Product Not Found');
        return false;
    }

    $cartExists = Cart::where('user_id', $user_id)
        ->where('product_id', $product_id)
        ->exists();

    if ($cartExists) {
        session()->flash('message', 'Product Already In Your Cart');
        return false;
    }

    if ($product->status != 0) {
        session()->flash('message', 'Product Not Available');
        return false;
    }

    if ($product->productColors()->count() > 0) {
        if ($this->product_color_id === null) {
            session()->flash('message', 'Please Select Color');
            return false;
        }

        $product_color = $product->productColors()
            ->where('id', $this->product_color_id)
            ->first();

        if (!$product_color) {
            session()->flash('message', 'Invalid Color');
            return false;
        }

        if ($product_color->quantity == 0) {
            session()->flash('message', 'Out Of Stock');
            return false;
        }

        if ($product_color->quantity < $this->quantity_count) {
            session()->flash('message', 'Only ' . $product_color->quantity . ' Product Available');
            return false;
        }
    } else {
        if ($product->quantity == 0) {
            session()->flash('message', 'Out Of Stock');
            return false;
        }

        if ($product->quantity < $this->quantity_count) {
            session()->flash('message', 'Only ' . $product->quantity . ' Product Available');
            return false;
        }
    }

    Cart::create([
        'user_id' => $user_id,
        'product_id' => $product_id,
        'product_color_id' => $this->product_color_id,
        'quantity' => $this->quantity_count
    ]);

    $this->emit('cart_added_updated');
    session()->flash('message', 'Product Added To Cart');
}

    // ADD TO CART SECTION END
   
}
