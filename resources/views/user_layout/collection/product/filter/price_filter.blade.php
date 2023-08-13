<!-- aside Widget -->
<div class="aside">
    <h3 class="aside-title">Price</h3>
    <div class="price-filter">
        {{-- <div id="price-slider"></div> --}}
        <div class="input-number price-min">
            <label for="min">Low To High</label>
            <input id="price-min" type="radio" id="min"value="High-to-Low" name="price_input" wire:model="price_input">
            {{-- <span class="qty-up">+</span>
            <span class="qty-down">-</span> --}}
        </div>
        {{-- <span>-</span> --}}
        <div class="input-number price-max">
            <label for="max">High To Low</label>
            <input id="price-max" type="radio" id="max" value="Low-to-High"  name="price_input" wire:model="price_input">
            {{-- <span class="qty-up">+</span>
            <span class="qty-down">-</span> --}}
        </div>
    </div>
</div>
<!-- /aside Widget -->
{{-- @section('script') --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Listen for changes in the price inputs
        $('#price-min').on('input', function() {
            var minPrice = $(this).val();
            // Do something with the minimum price value
            // For example, update a variable or trigger a function
            console.log('Minimum price:', minPrice);
        });

        $('#price-max').on('input', function() {
            var maxPrice = $(this).val();
            // Do something with the maximum price value
            // For example, update a variable or trigger a function
            console.log('Maximum price:', maxPrice);
        });
    });
</script> --}}
{{-- 

@endsection --}}
