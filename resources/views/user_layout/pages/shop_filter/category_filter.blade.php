 <!-- CATEGORIES -->
 <div class="aside">
    <h3 class="aside-title">Categories</h3>
    <div class="checkbox-filter">
        @forelse ($categories as $category)
        <div class="input-checkbox">
            <input  type="checkbox" value="{{ $category->id }}" wire:model="category_inputs" id="category-{{ $category->id }}">
            <label for="category-{{ $category->id }}">
                <span></span>
                {{ $category->name }}
                <small></small>
            </label>
        </div>
        @empty
                        
        @endforelse
    </div>
</div>
<!-- /CATEGORIES END -->