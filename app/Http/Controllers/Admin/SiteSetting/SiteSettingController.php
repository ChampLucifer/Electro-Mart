<?php

namespace App\Http\Controllers\Admin\SiteSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SettingFormRequest;
use App\Models\Setting;
class SiteSettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin_layout.site_setting.setting',compact('setting'));
    }
    public function insert( SettingFormRequest $request  )
    {
        $validated_data = $request->validated();
        $setting = Setting::first();
        if( $setting )
        {
            $setting->update([
                'website_name'=>$validated_data['website_name'],
                'website_url'=>$validated_data['website_url'],
                'page_title'=>$validated_data['page_title'],
                'meta_keyword'=>$request['meta_keyword'],
                'meta_description'=>$request['meta_description'],
                'phone1'=>$validated_data['phone1'],
                'phone2'=>$request['phone2'],
                'email'=>$validated_data['email1'],
                'email2'=>$request['email2'],
                'address'=>$validated_data['address'],
                'instagram'=>$request['instagram'],
                'whatsapp'=>$request['whatsapp'],
                'facebook'=>$request['facebook'],
                'twitter'=>$request['twitter']
            ]);
            return redirect('admin/settings')->with('message','Setting Updated');
       
        }
        else
        {
            Setting::create([
                'website_name'=>$validated_data['website_name'],
                'website_url'=>$validated_data['website_url'],
                'page_title'=>$validated_data['page_title'],
                'meta_keyword'=>$request['meta_keyword'],
                'meta_descripttion'=>$request['meta_descripttion'],
                'phone1'=>$validated_data['phone1'],
                'phone2'=>$request['phone2'],
                'email'=>$validated_data['email1'],
                'email2'=>$request['email2'],
                'address'=>$validated_data['address'],
                'instagram'=>$request['instagram'],
                'whatsapp'=>$request['whatsapp'],
                'facebook'=>$request['facebook'],
                'twitter'=>$request['twitter']
            ]);
            return redirect('admin/settings')->with('message','Setting Added');
        }
    }
}
