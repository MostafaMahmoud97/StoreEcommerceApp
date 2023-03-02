<?php

namespace App\service\Admin\Settings;

use App\Models\Setting;
use App\Traits\GeneralFileService;

class SettingsService{
    use GeneralFileService;

    public function showSettingPage(){
        return view('admin.setting.setting_dashboard');
    }

    public function updateSetting($request,$id){
        $setting = Setting::find($id);
        if (!$setting){
            return redirect()->back()->with(['status' => 'error','message' => 'this setting not found']);
        }

        $file_path = "/ImageSetting";
        if ($request->file('logo_val')){
            $LogoPath = $this->SaveFile($request->logo_val,$file_path);
            $request->merge([
                'logo' => $LogoPath
            ]);
        }

        if ($request->file('favicon_val')){
            $FavIconePath = $this->SaveFile($request->favicon_val,$file_path);
            $request->merge([
                'favicon' => $FavIconePath
            ]);
        }


        $setting->update($request->all());
        return redirect()->back()->with(['status' => 'success','message' => 'setting has been updated']);
    }
}
