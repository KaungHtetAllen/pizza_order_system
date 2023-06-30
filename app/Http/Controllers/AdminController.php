<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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


     //update account
     public function update($id,Request $request){
        $this->accountValidationCheck($request);
        $data = $this->getUserData($request);

        if($request->hasFile('image')){
            $dbImage = User::where('id', $id)->first()->image;

            if($dbImage != null){
                Storage::delete('public/' . $dbImage);
            }
            }

        $fileName = uniqid() . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public', $fileName);


        $data['image'] = $fileName;

        User::where('id', $id)->update($data);
        return redirect()->route("admin#details")->with(['updateSuccess'=>'Admin account Updated']);
     }

    //password validation
    private function passwordValidationCheck($request){
        Validator::make($request->all(), [
            'oldPassword' => 'required | min:6',
            'newPassword' => 'required | min:6',
            'confirmPassword' => 'required | min:6 | same:newPassword'
        ])->validate();
    }


    //request user data
    private function getUserData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone
        ];
    }


    //account validation check
    private function accountValidationCheck($request){
         Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'image' =>'required| mimes:png,jpeg,jpg|file'
        ])->validate();
    }
}
