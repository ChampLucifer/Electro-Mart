 <!-- CATEGORIES -->
 <div class="aside">
    <h3 class="aside-title">Categories</h3>
    <div class="checkbox-filter">
        @forelse ($categories as $category)
        <div class="input-checkbox">
            <input  type="checkbox" value="{{ $category->slug }}" wire:model="category_inputs" id="category-{{ $category->id }}">
            <label for="category-{{ $category->id }}">
                <span></span>
                {{ $category->name }}
                <small>(120)</small>
            </label>
        </div>
        @empty
                        
        @endforelse
    </div>
</div>
<!-- /CATEGORIES END -->