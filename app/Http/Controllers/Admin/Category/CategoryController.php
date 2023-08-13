<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;   
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
       return view('admin_layout.category.index',['categories'=>$categories]);
    }
    public function create()
    {
        return view('admin_layout.category.create');
    }
    public function insert(CategoryFormRequest $request)
    {
       $validated_data = $request->validated();
       $category = new Category;    
       $category->name = $validated_data['category_name'];
       $category->slug =Str::slug($validated_data['category_slug']);
       $category->description = $request['category_description'];
       
       if($request->hasFile('category_image'))
       {
        $file = $request->file('category_image');
        $ext = $file->getClientOriginalExtension();
        $file_name = time()."." .$ext;
        $file->move('uploads/category/',$file_name);
        $category->image = "uploads/category/$file_name";
       }
      
       $category->meta_title = $validated_data['meta_title'];
       $category->meta_keyword = $validated_data['meta_keyword'];
       $category->meta_description = $request['meta_description'];
       $category->status = $request->category_status ==true ? '1':'0';
    $category->save();
    return redirect('admin/category')->with('message','Category Added');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        if($category)
        {
            return view('admin_layout.category.edit',compact('category'));
        }
        else
        {

        }
    }
    // public function update(CategoryFormRequest $request,$id)
    // {
    //     $category = Category::find($id);
    //     // echo"<pre>";print_r($category);die;
    //     $validated_data = $request->validated();
    //     $category = new Category;    
    //     $category->name = $validated_data['category_name'];
    //     $category->slug =Str::slug($validated_data['category_slug']);
    //     $category->description = $request['category_description'];
        
    //     if($request->hasFile('category_image'))
    //     {
    //         $path = 'uploads/category/'.$category->image;
    //         if(File::exists($path))
    //         {
    //             File::delete($path);
    //         }

    //      $file = $request->file('category_image');
    //      $ext = $file->getClientOriginalExtension();
    //      $file_name = time()."" .$ext;
    //      $file->move('uploads/category/',$file_name);
    //      $category->image = $file_name;
    //     }
       
    //     $category->meta_title = $validated_data['meta_title'];
    //     $category->meta_keyword = $validated_data['meta_keyword'];
    //     $category->meta_description = $request['meta_description'];
    //     $category->status = $request->category_status ==true ? '1':'0';
    // //   echo"<pre>"; var_dump($category);
    //      $category->update();
    //    return redirect('admin/category/')->with('message','Category Updated');
     
    // }
    public function update(CategoryFormRequest $request, $id)
{
    $category = Category::find($id);
    
    $validated_data = $request->validated();
    
    $category->name = $validated_data['category_name'];
    $category->slug = Str::slug($validated_data['category_slug']);
    $category->description = $request['category_description'];
    
    if ($request->hasFile('category_image')) {
        $path = 'uploads/category/' . $category->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        $file = $request->file('category_image');
        $ext = $file->getClientOriginalExtension();
        $file_name = time() . "" . $ext;
        $file->move('uploads/category/', $file_name);
        $category->image = "uploads/category/$file_name";
    }

    $category->meta_title = $validated_data['meta_title'];
    $category->meta_keyword = $validated_data['meta_keyword'];
    $category->meta_description = $request['meta_description'];
    $category->status = $request->category_status == true ? '1' : '0';

    $category->save();

    return redirect('admin/category/')->with('message', 'Category Updated');
}
public function delete($id)
{
$category = Category::find($id);
if($category)
{
    $category->delete();
    return redirect('admin/category/')->with('message', 'Category Deleted');
}
}
}
