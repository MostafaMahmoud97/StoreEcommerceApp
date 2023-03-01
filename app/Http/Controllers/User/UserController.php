<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\service\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $service;
    public function __construct(UserService $service)
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
