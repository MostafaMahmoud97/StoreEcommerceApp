<?php
namespace App\service\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminService{
    public function showProfile(){
        $user = Auth::user();
        return view('admin.profile',compact('user'));
    }

    public function editUser($request){
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->to('');
    }
}
