<?php
namespace App\service\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService{
    public function showProfile(){
        $user = Auth::user();
        return view('user.profile',compact('user'));
    }

    public function editUser($request){
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with(['status' => 'success','message' => 'update user has been success']);
    }
}
