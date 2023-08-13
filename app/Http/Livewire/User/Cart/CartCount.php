<?php

namespace App\Http\Livewire\User\Cart;

use Livewire\Component;
use App\Models\Cart;

class CartCount extends Component
{
    public  $cart_count;
    protected $listeners =['cart_added_updated'=>'check_cart_count'];
    public function check_cart_count()
    {
        if( session()->has('user_id') )
        {
            $user_id = session()->get('user_id');
            return $this->cart_count =Cart::where('user_id',$user_id)->count();
        }
        else
        {
            session()->flash('message', 'Please Login To Continue');
            return false;
        }
    }
    public function render()
    {
        $this->cart_count = $this->check_cart_count();
        return view('livewire.user.cart.cart-count',[
            'cart_count'=>$this->cart_count,
        ]);
    }
}
