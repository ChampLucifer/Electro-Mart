<?php

namespace App\Http\Livewire\User\Checkout;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Str;
use App\Models\OrderItem;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Mail;
class CheckoutShow extends Component
{
    public $carts,$total_amount;
    public $first_name,$last_name,$email,$address,$city,$state,$pincode,$phone,$order_notes,$payment_mode=NULL,$payment_id=NULL;
    protected $listeners=[
        'validation_for_all'
    ];
    public function rules()
    {
        return[
            'first_name'=>'required|string|max:100',
            'last_name'=>'required|string|max:100',
            'email'=>'required|email',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'pincode'=>'required',
            'phone'=>'required|integer|min:10'
        ];
    }
    public function validation_for_all()
    {
        $this->validate();
    }
    public function place_order()
    {
        $this->validate();
        if( session()->has('user_id') )
        {
            $user_id = session()->get('user_id');  
            $order = Order::create([
                'user_id'=> $user_id ,
                'tracking_no'=>'e-mart'.Str::random(10),
                'first_name'=>$this->first_name,
                'last_name'=>$this->last_name,
                'email'=>$this->email,
                'address'=> $this->address,
                'city'=>$this->city,
                'state'=>$this->state,
                'pincode'=>$this->pincode,
                'phone'=>$this->phone,
                'order_notes'=>$this->order_notes,
                'status_message'=>'In Progress',
                'payment_mode'=>$this->payment_mode,
                'payment_id'=>$this->payment_id
               ]);

               foreach ($this->carts as $cart_item) 
                {
                    $order_items = OrderItem::create([
                        'order_id'=>$order->id,
                        'product_id'=>$cart_item->product_id,
                        'product_color_id'=>$cart_item->product_color_id,
                        'quantity'=>$cart_item->quantity,
                        'price'=>$cart_item->product->selling_price
                       ]);

                       if ($cart_item->product_color_id !=NULL)
                        {
                            $cart_item->product_color()->where('id',$cart_item->product_color_id)->decrement('quantity',$cart_item->quantity);
                       } 
                       else
                        {
                            $cart_item->product()->where('id',$cart_item->product_id)->decrement('quantity',$cart_item->quantity);
                        }
                       
                }

                return $order;
        }
     else
     {
        return false;
     }
    }
    public function cod_order()
    {
      $this->payment_mode= 'COD';
        $cod_order = $this->place_order();
        if( $cod_order )
        {
            $user_id = session()->get('user_id');
            Cart::where('user_id',$user_id)->delete();

            try{

                $order= Order::findOrfail( $cod_order->id );
                $mailable = new PlaceOrderMailable($order); // Pass the necessary arguments to the constructor
         
                Mail::to( $order->email )->send( $mailable );
            }
            catch(\Exception $e)
            {

            }
            session()->flash('message', 'Order Placed');
            return redirect()->to('user/thank-you');   
        }
        else
        {
            session()->flash('message', 'Something Went Wrong');
            return false;
        }
    }
    public function total_amount()
    {
        if( session()->has('user_id') )
        {
            $this->total_amount =0;
            $user_id = session()->get('user_id');
            $this->carts = Cart::where('user_id',$user_id)->get();
            foreach ($this->carts as $cart_item) {
                $this->total_amount += $cart_item->product->selling_price * $cart_item->quantity;
            }
            return $this->total_amount;
        }
        else
        {
            return false;
        }
    }
    public function render()
    {
        if (session()->has('user_email') && session()->has('user_name')) {
            $email = session()->get('user_email');
            $name = session()->get('user_name');
            $this->email = $email;
            $this->first_name = $name;
        }
        $this->total_amount = $this->total_amount();
        return view('livewire.user.checkout.checkout-show',[
            'total_amount'=>$this->total_amount,
        ]);
    }
}
