<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Facades\File;
class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin_layout.brand.index',compact('brands'));
    }
    public function create()
    {
        $categories  = Category::where('status','0')->get();
        return view('admin_layout.brand.create',compact('categories'));  
    } 
    public function insert(BrandRequest $request)
    {
        $validated_data  =$request->validated();
        $brand = new Brand;
        $brand->name = $validated_data['brand_name'];
        $brand->slug = Str::slug( $validated_data['brand_slug'] );
        $brand->status = $request['brand_status'] == true ?'1':'0';
        $brand->category_id = $request['product_category'];

        if( $request->hasFile('brand_image') )
        {
            $file = $request->file('brand_image');
            $ext = $file->getClientOriginalExtension();
            $file_name = time()."." .$ext;
            $file->move('uploads/brands/',$file_name);
            $brand->image = "uploads/brands/$file_name";
        }
        $brand->save();
        return redirect('admin/brand')->with('message','Brand Added');
    }
    public function edit($id)
    {
       $brand = Brand::find($id);
       if($brand)
       {
            $categories  = Category::where('status','0')->get();
            return view('admin_layout.brand.edit',compact('brand','categories'));
       }
    }
    public function update( BrandRequest $request,$id )
    {
        
        $brand = Brand::find( $id );
        $validated_data = $request->validated();
        $brand->name = $validated_data['brand_name'];
        $brand->slug = Str::slug( $validated_data['brand_slug'] );
        $brand->status = $request['brand_status'] == true ?'1':'0';
        $brand->category_id = $request['product_category'];

            if( $request->hasFile('brand_image'))
            {
                
                $path = 'uploads/brands/'.$brand->image;
                if( $brand->image && File::exists($path) )
                {
                    File::delete($path);
                }
                
                $file = $request->file('brand_image');
            $ext = $file->getClientOriginalExtension();
            $file_name = time()."." .$ext;
            $file->move('uploads/brands/',$file_name);
            $brand->image = "uploads/brands/$file_name";
            }
           

        $brand->save();
        return redirect('admin/brand')->with('message','Brand Update');
    }
    public function delete( $id )
    {
        $brand = Brand::find( $id );
        if( $brand )
        {
                $brand->delete();
                return redirect('admin/brand')->with('message', 'Brand Deleted');
        }
    }
}
