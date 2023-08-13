@extends('admin_layout.comman.main')
@section('title','Product Edit')
@section('admin-section')
<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Update Product</h5>
                        {{-- <small class="text-muted float-end">Default label</small> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/product/'.$product->id) }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            @method('put')

                            {{-- NAV TABS --}}
                            <ul class="nav nav-tabs">

                                <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#product_detail">Product Details</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#product_price">Product Price </a>
                                </li> 

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#seo_tags">SEO Tags</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#extra_details">Extra Details</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#color">Color</a>
                                </li>

                            </ul>
                            {{-- TABS END --}}

                            {{-- TABS SECTION --}}
                            <div class="tab-content px-0">

                                <div class="tab-pane container active" id="product_detail">
                                    <div class="mb-3 row">
                                        <div class="col-6">
                                            <label class="form-label" for="name">Product Name</label>
                                            <input type="text" value="{{ $product->name }}" name="product_name" class="form-control" id="name" >
                                            <span class="text-danger"> @error('product_name'){{ $message }} @enderror</span>
                                        </div>  
                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="slug">Product Slug</label>
                                            <input type="text" value="{{ $product->slug }}" name="product_slug" class="form-control" id="slug" >
                                            <span class="text-danger"> @error('product_slug'){{ $message }} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-6">
                                            <label for="category" class="form-label">category</label>
                                            <select id="category"value="{{ $product->category_id }}" name="product_category" class="form-select">
                                                <option value="">Select Category</option>
                                                @foreach ( $categories as $category )
                                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ?'selected':'' }} >{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        <span class="text-danger"> @error('product_category'){{ $message }} @enderror</span>
                                        </div>  
                                        <div class="mb-3 col-6">
                                            <label for="brand" class="form-label">brand</label>
                                            <select id="brand" value="{{ $product->brand }}" name="product_brand" class="form-select">
                                                <option value="">Select Brand</option>
                                                @foreach ( $brands as $brand )
                                                    <option value="{{ $brand->id }}" {{ $brand->id == $product->brand ?'selected':'' }}>{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger"> @error('product_brand'){{ $message }} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="long_descripttion" class="form-label">Long Description</label>
                                        <textarea class="form-control" value="{{ $product->description }}" name="long_descripttion" id="long_descripttion" rows="3">{{ $product->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="short_descripttion" class="form-label">Short Description</label>
                                        <textarea class="form-control"  value="{{ $product->small_description }}" name="short_descripttion" id="short_descripttion" rows="3"> {{ $product->small_description }}</textarea>
                                    </div>
                                </div>

                                <div class="tab-pane container fade" id="product_price">
                                    <div class="mb-3 row">
                                        <div class="col-4">
                                            <label class="form-label" for="og_price">Product Orignal Price</label>
                                            <input type="number"  value="{{ $product->orignal_price }}" name="product_og_price" class="form-control" id="og_price" >
                                            <span class="text-danger"> @error('product_og_price'){{ $message }} @enderror</span>
                                        </div>  
                                        <div class="mb-3 col-4">
                                            <label class="form-label" for="product_selling_price">Product Selling Price</label>
                                            <input type="number" value="{{ $product->selling_price }}" name="product_selling_price" class="form-control" id="product_selling_price" >
                                            <span class="text-danger"> @error('product_selling_price'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="mb-3 col-4">
                                            <label class="form-label" for="product_quantity">Product Quantity</label>
                                            <input type="number" value="{{ $product->quantity }}"  name="product_quantity" class="form-control" id="product_quantity" >
                                            <span class="text-danger"> @error('product_quantity'){{ $message }} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="tab-pane container fade" id="seo_tags">
                                    <div class="mb-3 row">
                                        <div class="col-6">
                                            <label class="form-label" for="product_meta_title">Meta Title</label>
                                            <input type="text" value="{{ $product->meta_title }}"  name="product_meta_title" class="form-control" id="product_meta_title" >
                                            <span class="text-danger"> @error('product_meta_title'){{ $message }} @enderror</span>
                                        </div>  
                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="product_meta_keyword">Meta Keyword</label>
                                            <input type="text"  value="{{ $product->meta_keyword }}"  name="product_meta_keyword" class="form-control" id="product_meta_keyword" >
                                            <span class="text-danger"> @error('product_meta_keyword'){{ $message }} @enderror</span>
                                        </div>
                                    </div> 
                                    <div class="mb-3">
                                        <label for="product_meta_descripttion" class="form-label">Meta Description</label>
                                        <textarea class="form-control" value="{{ $product->meta_description }}" name="product_meta_descripttion" id="product_meta_descripttion" rows="3">{{ $product->meta_description }}</textarea>
                                    </div>
                                </div>

                                <div class="tab-pane container fade" id="extra_details">
                                    <div class="mb-3 row">
                                        <div class="col-6">
                                            <div class="form-check form-switch mb-2">
                                                <input value="{{ $product->status }}" {{ $product->status =='1'?'checked':'' }} class="form-check-input" name ="product_status" type="checkbox" id="status" >
                                                <label class="form-check-label" for="status"><h5>Status</h5></label>
                                            </div>
                                                <span class="text-danger"> @error('product_status'){{ $message }} @enderror</span>
                                        </div>  
                                        <div class="mb-3 col-6">
                                            <div class="form-check form-switch mb-2">
                                                {{-- <input class="form-check-input" value="{{ $product->trending }}" {{ $product->trending =='1'?'checked':'' }} name ="product_trending" type="checkbox" id="trending" > --}}
                                                <input class="form-check-input" value="{{ $product->trending }}" {{ $product->trending == '1' ? 'checked' : '' }} name="product_trending" type="checkbox" id="trending">
                                                  <label class="form-check-label" for="trending"><h5>Trending</h5></label>
                                            </div>
                                            <span class="text-danger"> @error('product_trending'){{ $message }} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="product_images" class="form-label">Product Images</label>
                                                <input class="form-control mb-2"  name="product_images[]" type="file" id="product_images" multiple="">
                                            @if ($product->productImages)
                                                @foreach ( $product->productImages as $image )
                                                    <a href="{{ url('admin/product/image/'.$image->id) }}" onclick="return confirm('Are you sure you want to delete this item?');"><img class="m-2"src="{{ asset($image->image) }}" style="width: 100px;height:100px;border:1px solid"></a>
                                                @endforeach
                                            @endif
                                                <span class="text-danger"> @error('product_images[]'){{ $message }} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </div>

                                <div class="tab-pane container fade" id="color">
                                    <div class="mb-3 row">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <div class="row">
                                                        @forelse ($colors as $color)
                                                            <div class="col-md-3 m-3 p-3" style="border: 1px solid ">
                                                                <input class="form-check-input" value="{{ $color->id }}" name="product_colors[{{ $color->id }}]" type="checkbox" id="color_check">
                                                                {{ $color->name }}
                                                                <br>
                                                                Quantity:<input type="number" name="product_color_quantity[{{ $color->id }}]" id="" style="width:70px">
                                                            </div>
                                                        @empty
                                                            <div class="col-md-12">
                                                                <h1>No Colors Available</h1>
                                                            </div>
                                                        @endforelse
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="table-responsive text-nowrap">
                                                                <table class="table">
                                                                  <thead>
                                                                    <tr>
                                                                      <th>ID</th>
                                                                      <th>Color</th>
                                                                      <th>Quantity</th>
                                                                      <th>Delete</th>
                                                                    </tr>
                                                                  </thead>
                                                                  <tbody class="table-border-bottom-0">
                                                                    @foreach( $product->productColors as $color )
                                                                    <tr class="product-color-tr">
                                                                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $color->id }}</strong></td>
                                                                      <td>{{ $color->color->name }}</td>
                                                                      <td>
                                                                        <div class="input-group w-50">
                                                                            <input type="number" name ="product_color_quantity" class="form-control product_color_quantity" value="{{ $color->quantity }}"  aria-label="" aria-describedby="color_quantity">
                                                                            <button class="btn btn-outline-primary product_color_update" value="{{ $color->id }}" type="button" id="color_quantity">Update</button>
                                                                          </div>
                                                                      </td>
                                                                      <td><button class="btn btn-danger product_color_delete" value="{{ $color->id }}">Delete</button></td>
                                                                    
                                                                    </tr>
                                                                    @endforeach
                                                                  </tbody>
                                                                </table>
                                                              </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>

                            </div>
                            {{-- TABS SECTION END --}}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        // CODE FOR EDIT COLOR QUANTITY
        $(document).on('click','.product_color_update',function(e){

            e.preventDefault();
            var product_id  ="{{ $product->id }}";
            var product_color_id = $(this).val();
            var qty = $(this).closest('.product-color-tr').find('.product_color_quantity').val();

            if( qty<=0 )
            {
                alert('Quantity Is Required');
                return false;
            }
    
            var data ={
                'product_id':product_id,
                'qty':qty
            };

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                type: "POST",
                url: "/admin/product-color/"+product_color_id,
                data: data,
                success: function (response)
                {
                    alert( response.message );
                }
            });

        });
        // CODE FOR EDIT COLOR QUANTITY END

        // // CODE FOR DELETE COLOR QUANTITY
        $(document).on('click','.product_color_delete',function(e){
           
            e.preventDefault();
            product_color_id = $(this).val();
            var thisClick = $(this);

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                type: "GET",
                url: "/admin/product-color-delete/"+product_color_id,
                success: function (response)
                 {
                   thisClick.closest('.product-color-tr').remove();
                    alert(response.message);
                }
            });
        })
        // // CODE FOR DELETE COLOR QUANTITY END
    });  
</script>
@endsection