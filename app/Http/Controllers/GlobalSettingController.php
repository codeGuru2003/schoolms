<?php

namespace App\Http\Controllers;

use App\Models\GlobalSetting;
use Illuminate\Http\Request;

class GlobalSettingController extends Controller
{
    public function index(){
        $global_setting = GlobalSetting::first();

        return view('globalsettings.index',[
            'title' => 'Global Settings',
            'globalsetting' => $global_setting,
        ]);
    }

    public function create(Request $request){
        $path = $request->file('system_logo')->store('images','public');

        $global_setting = new GlobalSetting([
            'system_name' => $request->input('system_name'),
            'system_email' => $request->input('system_email'),
            'contact' => $request->input('contact'),
            'footer_text' => $request->input('footer_text'),
            'system_logo' => $path,
            'created_by' => 'system'
        ]);

        $global_setting->save();
        return redirect()->back()->with('msg', 'Configuration saved successfully.');
    }
}
