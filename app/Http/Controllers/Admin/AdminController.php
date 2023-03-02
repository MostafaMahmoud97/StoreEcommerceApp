<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\service\Admin\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $service;
    public function __construct(AdminService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function showProfile(){
        return $this->service->showProfile();
    }

    public function editUser(UserRequest $request){
        return $this->service->editUser($request);
    }
}
