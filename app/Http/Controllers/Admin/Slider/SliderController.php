<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\SliderFormRequest;
use Illuminate\Support\Facades\File;
class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin_layout.slider.index',compact('sliders'));
    }
    public function create()
    {
        $brands = Brand::where('status','0')->get();
        $categories = Category::where('status','0')->get();
        return view('admin_layout.slider.create',compact( 'brands','categories' ));  
    }

    public function insert( SliderFormRequest $request)
    {
        $validated_data = $request->validated();

        if( $request->hasFile('slider_image') )
        {
            $file = $request->file('slider_image');
            $ext = $file->getClientOriginalExtension();
            $file_name = time().".".$ext;
            $file->move('uploads/slider/',$file_name);
            $validated_data['slider_image'] = "uploads/slider/$file_name";
        }

            $validated_data['slider_status'] = $request->slider_status ==true ? '1':'0';

        Slider::create([
            'title'=> $validated_data['slider_title'],
            'description'=>$request['slider_description'],
            'image'=>$validated_data['slider_image'],
            'status'=>$validated_data['slider_status'],
            'category_id'=>$request['product_category'],
            'brand'=>$request['product_brand']
        ]);
        return redirect('admin/slider')->with('message','Slider Added');
    }

    public function edit(Slider $slider)
    {
        $brands = Brand::where('status','0')->get();
        $categories = Category::where('status','0')->get();
        return view('admin_layout.slider.edit',compact( 'slider','brands','categories' ));  

    }

    public function update( SliderFormRequest $request , Slider $slider )
    {
        $validated_data = $request->validated();

        if( $request->hasFile('slider_image') )
        {
            $destination = $slider->image;
            if( File::exists( $destination) )
            {
                File::delete( $destination );
            }
            $file = $request->file('slider_image');
            $ext = $file->getClientOriginalExtension();
            $file_name = time().".".$ext;
            $file->move('uploads/slider/',$file_name);
            $validated_data['slider_image'] = "uploads/slider/$file_name";
        }

            $validated_data['slider_status'] = $request->slider_status ==true ? '1':'0';

        Slider::where('id',$slider->id)->update([
            'title'=> $validated_data['slider_title'],
            'description'=>$request['slider_description'],
            'image'=>$validated_data['slider_image']??$slider->image,
            'category_id'=>$request['product_category'],
            'brand'=>$request['product_brand'],
            'status'=>$validated_data['slider_status']
        ]);
        return redirect('admin/slider')->with('message','Slider Updated');
   
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        if( $slider )
        {
            $slider->delete();
            return redirect('admin/slider/')->with('message', 'Slider Deleted');
        }
    }
}
