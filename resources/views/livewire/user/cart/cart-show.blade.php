
<div>

    <div class="section">
    
        <div class="container py-5">
          @if ( session()->has('message') )
          <div class="row">
            <div class="col-12 alert alert-success">
              <span style="padding: 10px" class="w-100 float-right">{{ session('message') }}</span>
            </div>
          </div>
          @endif
            <h1 class="mb-4">Your Cart</h1>
        
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col">Remove</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($cart as $cart_item)
                    @if ( $cart_item->product )
                    <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            @if ( $cart_item->product->productImages->count()>0 )
                            <img  class="product-image"src="{{ asset( $cart_item->product->productImages[0]->image ) }}" alt="{{ $cart_item->product->name  }}">
                        @endif
                        <a href="{{ url('user/collection/'.$cart_item->product->category->slug.'/'.$cart_item->product->slug) }}">
                            <span>{{  $cart_item->product->name }}
                            @if ($cart_item->product_color )
                                <span style="font-weight:bold;color:{{ $cart_item->product_color->color->name }}">({{ $cart_item->product_color->color->name  }})</span>
                            @endif
                            </span></a>
                          </div>
                        </td>
                        <td>{{ $cart_item->product->selling_price }}</td>
                        <td style="width:177px" >
                          <div class="add-to-cart " style="width:92px">
                                  <div class="input-number">
                                      <input class="w-25" readonly type="number" value="{{ $cart_item->quantity }}">
                                      <button type="submit" wire:loading.attr="disabled" class="qty-up"  wire:click="cart_increment_quantity( {{ $cart_item->id }} )">+</button>
                                      <button type="submit"  wire:loading.attr="disabled"  wire:click="cart_decrement_quantity( {{ $cart_item->id }} )" class="qty-down">-</button>
                                  </div>
                          </div>
                        </td>
                        <td>{{ $cart_item->product->selling_price*$cart_item->quantity }} </td>
                        @php
                            $total_price+= $cart_item->product->selling_price*$cart_item->quantity
                        @endphp
                        <td><button type="button" wire:loading.attr="disabled"  wire:click="cart_item_remove( {{ $cart_item->id }} )" class="btn btn-danger">Remove</button></td>
                    </tr>
                    @endif
             

                @empty
                    <div>Cart Is Empty</div>
                @endforelse
               
              </tbody>
            </table>
        
            <div class="text-start ">
              <h3>Total:{{ $total_price }}</h3>
            </div>
        
            <div class="text-end mt-4">
              <button class="btn btn-primary">Continue Shopping</button>
              <a href="{{ url('user/checkout') }}" class="btn btn-success">Checkout</a>
            </div>
        
          </div>
        
    
    </div>

</div>
