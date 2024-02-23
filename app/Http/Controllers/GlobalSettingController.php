<?php

namespace App\Http\Controllers;

use App\Models\GlobalSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function update($id, Request $request){
        $globalsetting = GlobalSetting::find($id);

        Storage::disk('public')->delete($globalsetting->system_logo);
        $newPath = $request->file('system_logo')->store('images','public');
        $globalsetting->system_logo = $newPath;
        $globalsetting->system_name = $request->input('system_name');
        $globalsetting->system_email = $request->input('system_email');
        $globalsetting->contact = $request->input('contact');
        $globalsetting->footer_text = $request->input('footer_text');
        $globalsetting->created_by = Auth::user()->name;
        $globalsetting->save();
        return redirect()->back()->with('msg', 'Configuration saved successfully.');
    }
}
