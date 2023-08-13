<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\ProductImage;
use App\Http\Requests\ProdcutFormRequest;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin_layout.product.index',compact('products'));
   }
   public function create()
   {
    $categories = Category::all();
    $brands = Brand::all();
    $colors  = Color::where('status','0')->get();
    return view('admin_layout.product.create',compact('categories','brands','colors'));
   }
   public function insert(ProdcutFormRequest $request)
   {
        $validated_data = $request->validated();
        $product_status = boolval($request->product_status); 
        $product_trending = boolval( $request->product_trending );
        $category = Category::findOrFail($validated_data['product_category']);
        $product = $category->products()->create([
            'category_id'=>$validated_data['product_category'],
            'name'=>$validated_data['product_name'],
            'slug'=>Str::slug( $validated_data['product_slug'] ),
            'brand'=>$validated_data['product_brand'],
            'small_description'=>$validated_data['short_descripttion'],
            'description'=>$validated_data['long_descripttion'],
            'orignal_price'=>$validated_data['product_og_price'],
            'selling_price'=>$validated_data['product_selling_price'],
            'quantity'=>$validated_data['product_quantity'],
            'trending'=>$product_trending?'1':'0',
            'status' =>$product_status ? '1' : '0',
            'meta_title'=>$validated_data['product_meta_title'],
            'meta_keyword'=>$validated_data['product_meta_keyword'],
            'meta_description'=>$validated_data['product_meta_descripttion'],
        ]);

        if( $request->hasFile( 'product_images' ) )
        {
            $uploadPath = 'uploads/products/';
            $i=1;
            foreach( $request->file('product_images') as  $imageFile ) {
                $extention = $imageFile->getClientOriginalExtension();
                $file_name = time().$i++."." .$extention;
                $imageFile->move($uploadPath,$file_name);
                $final_image_path =$uploadPath.$file_name;
                $product->productImages()->create([
                    'product_id'=>$product->id,
                    'image'=>$final_image_path,
                 ]);
            }
        }

        if( $request->product_colors )
        {
            foreach ( $request->product_colors as $key => $product_color )
             {
                $product->productColors()->create([
                    'product_id'=>$product->id,
                    'color_id'=>$product_color,
                    'quantity'=>$request->product_color_quantity[$key] ?? 0
                ]);
            }
        }

       return redirect('admin/product')->With('message','Product Added');
   }
   public function edit($id)
   {
    $categories = Category::all();
    $brands = Brand::all();
    $product = Product::findOrFail($id);
    $product_color = $product->productColors->pluck('color_id')->toArray();
    $colors = Color::whereNotIn('id',$product_color)->where('status','0')->get();
    return view('admin_layout.product.edit',compact('categories','brands','product','colors'));
  
   }
   public function update( ProdcutFormRequest $request,$id )
   {
  
        $validated_data = $request->validated();
        $product_status = boolval($request->product_status); 
        $product_trending = boolval( $request->product_trending );
    
        $product = Category::findOrFail($validated_data['product_category'])->products()->where('id',$id)->first();
        if($product)
        {
            
            $product->update([
                'category_id'=>$validated_data['product_category'],
                'name'=>$validated_data['product_name'],
                'slug'=>Str::slug( $validated_data['product_slug'] ),
                'brand'=>$validated_data['product_brand'],
                'small_description'=>$validated_data['short_descripttion'],
                'description'=>$validated_data['long_descripttion'],
                'orignal_price'=>$validated_data['product_og_price'],
                'selling_price'=>$validated_data['product_selling_price'],
                'quantity'=>$validated_data['product_quantity'],
                'trending'=>$product_trending ? '1' : '0',
                'status' =>$product_status ? '1' : '0',
                'meta_title'=>$validated_data['product_meta_title'],
                'meta_keyword'=>$validated_data['product_meta_keyword'],
                'meta_description'=>$validated_data['product_meta_descripttion'],
            ]);

            if( $request->hasFile( 'product_images' ) )
            {
                $uploadPath = 'uploads/products/';
                $i=1;
                foreach( $request->file('product_images') as  $imageFile ) {
                    $extention = $imageFile->getClientOriginalExtension();
                    $file_name = time().$i++."." .$extention;
                    $imageFile->move($uploadPath,$file_name);
                    $final_image_path =$uploadPath.$file_name;
                    $product->productImages()->create([
                        'product_id'=>$product->id,
                        'image'=>$final_image_path,
                    ]);
                }
            }

            if( $request->product_colors )
            {
                foreach ( $request->product_colors as $key => $product_color )
                 {
                    $product->productColors()->create([
                        'product_id'=>$product->id,
                        'color_id'=>$product_color,
                        'quantity'=>$request->product_color_quantity[$key] ?? 0
                    ]);
                }
            }
            
            return redirect('admin/product')->with('message','Product Updated');
       }
        else
        {
            return redirect('admin/product')->with('message','No Such Product Id Found');
        }
   }
   public function delete_image($id)
   {
    $product_image = ProductImage::findOrFail($id);
    if(File::exists( $product_image->image ))
    {
        File::delete($product_image);
    }
    $product_image->delete();
    return redirect()->back()->with('message','Image Deleted');
   }
   public function delete( $id )
   {
        $product = Product::findOrFail( $id );
        if( $product->product_image )
        {
            foreach ($$product->product_image as $image ) {
                if( File::exists($image->image))
                {
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect('admin/product')->with('message','Product Deleted');
   }

   public function update_product_color_qty(Request $request,$id)
    {
         $product_color_data = Product::findOrFail( $request->product_id )->productColors()->where('id',$id)->first();

        $product_color_data->update([
        'quantity'=>$request->qty
        ]);
        
        return response()->json(['message'=>"Done"]);
    }

    public function delete_product_color_qty($id)
    {
        $product_color_data = ProductColor::findOrFail( $id );
        $product_color_data->delete();
        return response()->json(['message'=>"Done"]);
    }
}
