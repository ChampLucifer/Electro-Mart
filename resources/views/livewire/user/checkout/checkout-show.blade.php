<div>
    {{-- {{ dd(session()->all()) }} --}}

	<!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">

            @if ( $this->total_amount != 0 )
                  <!-- row -->
                    <div class="row">
                        @if ( session()->has('message') )
                        <div class="row">
                        <div class="col-12 alert alert-success">
                            <span style="padding: 10px" class="w-100 float-right">{{ session('message') }}</span>
                        </div>
                        </div>
                        @endif
                        <div class="col-md-7">
                            <!-- Billing Details -->
                            <div class="billing-details">
                                <div class="section-title">
                                    <h3 class="title">Billing address</h3>
                                </div>
                                <div class="form-group">
                                    <input class="input"  id="first_name" value="{{ old('first_name') }}" type="text" wire:model.defer="first_name" placeholder="First Name">
                                    @error('first_name')<span class="text text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input class="input" id="last_name" value="{{ old('last_name') }}" type="text" wire:model.defer="last_name" placeholder="Last Name">
                                    @error('last_name')<span class="text text-danger">{{ $message }}</span>@enderror
                            </div>
                                <div class="form-group">
                                    <input class="input" id="email" type="email" wire:model.defer="email" placeholder="Email">
                                    @error('email')<span class="text text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input class="input" id="address" value="{{ old('address') }}" type="text" wire:model.defer="address" placeholder="Address">
                                    @error('address')<span class="text text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input class="input" id="city" value="{{ old('city') }}" type="text" wire:model.defer="city" placeholder="City">
                                    @error('city')<span class="text text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input class="input"  id="state" type="text" value="{{ old('state') }}" wire:model.defer="state" placeholder="State">
                                    @error('state')<span class="text text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input class="input" id="pincode" type="text" value="{{ old('pincode') }}" wire:model.defer="pincode" placeholder="Pincode">
                                    @error('pincode')<span class="text text-danger">{{ $message }}</span>@enderror
                            </div>
                                <div class="form-group">
                                    <input class="input" id="phone" value="{{ old('phone') }}"   type="tel" wire:model.defer="phone" placeholder="Phone">
                                    @error('phone')<span class="text text-danger">{{ $message }}</span>@enderror
                            </div>
                                {{-- <div class="form-group">
                                    <div class="input-checkbox">
                                        <input type="checkbox" id="create-account">
                                        <label for="create-account">
                                            <span></span>
                                            Create Account?
                                        </label>
                                        <div class="caption">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                            <input class="input" type="password" name="password" placeholder="Enter Your Password">
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- /Billing Details -->

                            <!-- Shiping Details -->
                            <div class="shiping-details">
                                <div class="section-title">
                                    <h3 class="title">Shiping address</h3>
                                </div>
                                {{-- <div class="input-checkbox">
                                    <input type="checkbox" id="shiping-address">
                                    <label for="shiping-address">
                                        <span></span>
                                        Ship to a diffrent address?
                                    </label>
                                    <div class="caption">
                                        <div class="form-group">
                                            <input class="input" type="text" name="first-name" placeholder="First Name">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="text" name="last-name" placeholder="Last Name">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="text" name="address" placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="text" name="city" placeholder="City">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="text" name="country" placeholder="Country">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="tel" name="tel" placeholder="Telephone">
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- /Shiping Details -->

                            <!-- Order notes -->
                            <div class="order-notes">
                                <textarea class="input" id="order_notes"  wire:model.defer="order_notes" value="{{ old('order_notes') }}" placeholder="Order Notes">{{ old('order_notes') }} </textarea>
                            </div>
                            <!-- /Order notes -->
                        </div>

                        <!-- Order Details -->
                        <div class="col-md-5 order-details" wire.ignore>
                            <div class="section-title text-center">
                                <h3 class="title">Your Order</h3>
                            </div>
                            <div class="order-summary">
                                <div class="order-col">
                                    <div><strong>PRODUCT</strong></div>
                                    <div><strong>TOTAL</strong></div>
                                </div>
                                <div class="order-products">
                                    <div class="order-col">
                                        <div>1x Product Name Goes Here</div>
                                        <div>$980.00</div>
                                    </div>
                                    <div class="order-col">
                                        <div>2x Product Name Goes Here</div>
                                        <div>$980.00</div>
                                    </div>
                                </div>
                                <div class="order-col">
                                    <div>Shiping</div>
                                    <div><strong>FREE</strong></div>
                                </div>
                                <div class="order-col">
                                    <div><strong>TOTAL</strong></div>
                                    <div><strong class="order-total">{{ $this->total_amount }}</strong></div>
                                </div>
                            </div>
                            <div class="payment-method" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="button" wire:loading.attr="disabled" wire:click="cod_order" style="font-size: 13px" class="primary-btn order-submit">
                                            <span wire:loading.remove  wire:target="cod_order">Cash On Delivery</span>
                                            <span wire:loading  wire:target="cod_order">Placing Order</span>
                                        </button>
                                    </div>
                                    <div class="col-lg-6">
                                        <button style="font-size: 13px;background:#eea236" class="primary-btn order-submit">Online Payment</button>
                                            <div style="padding: 10px" >
                                                <div  id="paypal-button-container"></div>
                                            </div>
                                    </div>
                                </div>
                            
                                {{-- <div class="input-radio">
                                    <input type="radio" name="payment" id="payment-1">
                                    <label for="payment-1">
                                        <span></span>
                                        Direct Bank Transfer
                                    </label>
                                    <div class="caption">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div> --}}
                                {{-- <div class="input-radio">
                                    <input type="radio" name="payment" id="payment-2">
                                    <label for="payment-2">
                                        <span></span>
                                        Cash On Delivery
                                    </label>
                                    <div class="caption">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="payment" id="payment-3">
                                    <label for="payment-3">
                                        <span></span>
                                        Paypal System
                                    </label>
                                    <div class="caption">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="terms">
                                <label for="terms">
                                    <span></span>
                                    I've read and accept the <a href="#">terms & conditions</a>
                                </label>
                            </div>
                            {{-- <a href="#" class="primary-btn order-submit">Place order</a> --}}
                        </div>
                        <!-- /Order Details -->
                    </div>
                <!-- /row -->
            @else
                <div class="card card-body shadow text-center p-5">
                    <h4>No Items In Cart To Checkout</h4>
                    <a href="{{ url('/') }}" class="btn btn-warning">Shop Now</a>
                </div>
            @endif
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


</div>

@push('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AelJrUZVmUd1yF1JC1i6uEtO7FszYGNp96TvAKVx_3-C72pC4v4Ae8xxL9xjfvH9RyU28z2cGYKd1TXR&currency=USD"></script>
<script>
    paypal.Buttons({
      onClick: function() {
        // Show a validation error if the required fields are not filled
        if (
          !document.getElementById('first_name').value ||
          !document.getElementById('last_name').value ||
          !document.getElementById('email').value ||
          !document.getElementById('address').value ||
          !document.getElementById('city').value ||
          !document.getElementById('state').value ||
          !document.getElementById('pincode').value ||
          !document.getElementById('phone').value
        ) {
          Livewire.emit('validation_for_all');
          return false;
        } else {
          @this.set('first_name', document.getElementById('first_name').value);
          @this.set('last_name', document.getElementById('last_name').value);
          @this.set('email', document.getElementById('email').value);
          @this.set('address', document.getElementById('address').value);
          @this.set('city', document.getElementById('city').value);
          @this.set('state', document.getElementById('state').value);
          @this.set('pincode', document.getElementById('pincode').value);
          @this.set('phone', document.getElementById('phone').value);
          @this.set('order_notes', document.getElementById('order_notes').value);
        }
      },
      createOrder: function(data, actions) {
        // Calculate the total amount
        var totalAmount = {{ $this->total_amount }}; // Replace this with the actual total amount from your backend or calculated value
    
        // Send the total amount along with other order information
        return actions.order.create({
          purchase_units: [
            {
              amount: {
                value: totalAmount.toFixed(2),
              },
              items: [
                {
                  sku: 'YOUR_PRODUCT_STOCK_KEEPING_UNIT',
                  quantity: 'YOUR_PRODUCT_QUANTITY',
                },
              ],
            },
          ],
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {
          // Handle the captured order data
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          const transaction = orderData.purchase_units[0].payments.captures[0];
          alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
        });
      },
    }).render('#paypal-button-container');
  </script>
  
@endpush