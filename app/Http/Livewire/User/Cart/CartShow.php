<?php

namespace App\Http\Livewire\User\Cart;

use Livewire\Component;
use App\Models\Cart;
class CartShow extends Component
{
    public $cart,$total_price=0;
    public function cart_decrement_quantity( $cart_id )
    {
        if(session()->has('user_id'))
        {
            $user_id = session()->get('user_id');
            $cart_data = Cart::where('id',$cart_id)->where('user_id',$user_id)->first();
            if( $cart_data )
            {
                if( $cart_data->product_color()->where('id',$cart_data->product_color_id)->exists() )
                {
                    $productColor =  $cart_data->product_color()->where('id',$cart_data->product_color->id)->first();
                    if( $productColor->quantity > $cart_data->quantity )
                    {
                        $cart_data->decrement('quantity');
                        session()->flash('message', 'Cart Updated');
                    }
                    else
                    {
                        session()->flash('message', 'Only '.$productColor->quantity.' Quantity Available');
                        return false;
                    }
                }
                else
                {
                    if( $cart_data->product->quantity > $cart_data->quantity )
                    {
                        $cart_data->decrement('quantity');
                        session()->flash('message', 'Cart Updated');
                    }
                    else
                    {
                        session()->flash('message', 'Only '.$cart_data->product->quantityy.' Quantity Available');
                        return false;
                    }
                }
            }
            else
            {
                session()->flash('message', 'Something Went Wrong');
                return false;
            }
        }
    }

    public function cart_item_remove( $cart_id )
    {
        if(session()->has('user_id'))
        {
            $user_id = session()->get('user_id');
            $cart_data = Cart::where('id',$cart_id)->where('user_id',$user_id)->first();
            if( $cart_data )
            {
                $cart_data->delete();
                $this->emit('cart_added_updated');
                session()->flash('message', 'Product Remove From Cart');
            }
        }
    }
    public function cart_increment_quantity( $cart_id )
    {
        if(session()->has('user_id'))
        {
            $user_id = session()->get('user_id');
            $cart_data = Cart::where('id',$cart_id)->where('user_id',$user_id)->first();
            if( $cart_data )
            {
                if( $cart_data->product_color()->where('id',$cart_data->product_color_id)->exists() )
                {
                    $productColor =  $cart_data->product_color()->where('id',$cart_data->product_color->id)->first();
                    if( $productColor->quantity > $cart_data->quantity )
                    {
                        $cart_data->increment('quantity');
                        session()->flash('message', 'Cart Updated');
                    }
                    else
                    {
                        session()->flash('message', 'Only '.$productColor->quantity.' Quantity Available');
                        return false;
                    }
                }
                else
                {
                    if( $cart_data->product->quantity > $cart_data->quantity )
                    {
                        $cart_data->increment('quantity');
                        session()->flash('message', 'Cart Updated');
                    }
                    else
                    {
                        session()->flash('message', 'Only '.$cart_data->product->quantityy.' Quantity Available');
                        return false;
                    }
                }
            }
            else
            {
                session()->flash('message', 'Something Went Wrong');
                return false;
            }
        }
    }
    
    public function render()
    {
        if(session()->has('user_id'))
        {
            $user_id = session()->get('user_id');
        }
        $this->cart =Cart::where('user_id',$user_id)->get();
        return view('livewire.user.cart.cart-show',[
            'cart'=>$this->cart
        ]);
    }
}
