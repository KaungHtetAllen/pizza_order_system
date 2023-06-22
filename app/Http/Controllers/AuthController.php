<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //login page
    public function loginPage(){
        return view('login');
    }

    //register page
    public function registerPage(){
        return view('register');
    }

    //direct dashboard
    public function dashboard(){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('category#list');
        }
        else {
            return redirect()->route('user#home');
        }
    }

    //change password page
    public function changePasswordPage(){
        return view('admin.password.changePassword');
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


    //password validation
    private function passwordValidationCheck($request){
        Validator::make($request->all(), [
            'oldPassword' => 'required | min:6',
            'newPassword' => 'required | min:6',
            'confirmPassword' => 'required | min:6 | same:newPassword'
        ])->validate();
    }
}
