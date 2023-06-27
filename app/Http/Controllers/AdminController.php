<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
     //change password page
    public function changePasswordPage(){
        return view('admin.account.changePassword');
    }

    //change password function
    public function changePassword(Request $request){
        $this->passwordValidationCheck($request);

        $data = User::select('password')->where('id', Auth::user()->id)->first();
        $dbHashPassword = ($data->password);

        if(Hash::check($request->oldPassword, $dbHashPassword)){
            $data = ['password' => Hash::make($request->newPassword)];

            User::where('id', Auth::user()->id)->update($data);

            // Auth::logout();
            return redirect()->route('category#list')->with(['passwordChangeSuccess'=> 'Your password have changed!']);
        }

        else{
            return back()->with(['notMatch'=> 'The Old password is not matched! Try again']);
        }
     }

     //direct admin details page
     public function details(){
        return view('admin.account.details');
     }


     //direct admin profile page
     public function edit(){
        return view('admin.account.edit');
     }


    //password validation
    private function passwordValidationCheck($request){
        Validator::make($request->all(), [
            'oldPassword' => 'required | min:6',
            'newPassword' => 'required | min:6',
            'confirmPassword' => 'required | min:6 | same:newPassword'
        ])->validate();
    }
}
