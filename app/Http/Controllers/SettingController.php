<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        return view('settings.edit');
    }
    public function update(Request $request)
    {
        $request->validate([

            'sit_name' => 'required|string',
            'facebook' => 'required|url',
            'linkedin' => 'required|url',
            'youtube' => 'required|url',
            'instagram' => 'required|url',
            'twitter' => 'required|url',
            'about_us_content' => 'required|string|max:1000'
        ]);

        $data =   Setting::first();
        $data->sit_name = $request->sit_name;
        $data->facebook = $request->facebook;
        $data->youtube = $request->youtube;
        $data->linkedin = $request->linkedin;
        $data->twitter =$request->twitter ;
        $data->instagram =$request->instagram ;
        $data->about_us_content = nl2br($request->about_us_content);

        $data->save();
        return back()->with('success','data updated successfully');
    }
}
