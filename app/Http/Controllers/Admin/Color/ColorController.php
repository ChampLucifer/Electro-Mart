<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Http\Requests\ColorFormRequest;
class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin_layout.color.index',compact('colors'));
    }
    public function create()
    {
        return view('admin_layout.color.create');
    }
    public function insert(ColorFormRequest $request)
    {
        $validated_data = $request->validated();
        $color = new Color;
        $color->name = $validated_data['color_name'];
        $color->code = $validated_data['color_code'];
        $color->status = $request['color_status']==true?'1':'0';
        $color->save();
        return redirect('admin/color')->with('message','Color Added');
    }
    public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('admin_layout.color.edit',compact('color'));
    }
    public function update(ColorFormRequest $request,$id)
    {
        $color = Color::findorFail($id);
        $validated_data = $request->validated();
        $color->name = $validated_data['color_name'];
        $color->code = $validated_data['color_code'];
        $color->status = $request->color_status==true?'1':'0';
        $color->save();
        return redirect('admin/color')->with('message','Color Updated');
   }
}
