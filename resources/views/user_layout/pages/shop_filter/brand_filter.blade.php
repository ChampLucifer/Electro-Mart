             <!-- aside Widget -->
             <div class="aside">
                <h3 class="aside-title">Brand</h3>
                <div class="checkbox-filter">
                    @forelse ($brands as $brand)
                        <div class="input-checkbox">
                            <input  type="checkbox"   wire:model="brand_inputs" value="{{ $brand->id }}" id="brand-{{ $brand->name }}">
                            <label for="brand-{{ $brand->name }}">
                                <span></span>
                                {{ $brand->name }}
                                <small>(578)</small>
                            </label>
                        </div> 
                    @empty
                        
                    @endforelse
                </div>
            </div>
            <!-- /aside Widget -->