<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\service\Admin\Settings\SettingsService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $service;
    public function __construct(SettingsService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function showSettingPage(){
        return $this->service->showSettingPage();
    }

    public function updateSetting(Request $request,$id){
        return $this->service->updateSetting($request,$id);
    }
}
