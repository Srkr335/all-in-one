<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ContactUs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;





class AdminController extends Controller
{
    public function AdminDashboard(){
        $ContactUs = ContactUs::all();
        return view('admin.index',compact('ContactUs'));
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function AdminLogin(){
        return view('admin.admin_login');
    }
    public function AdminProfile(){ 
        $id =Auth::user()->id;
        $profileData =User::find($id);
        return view('admin.admin_profile_view',compact('profileData'));

    }
    public function AdminProfileStore(Request $request){
        $id =Auth::user()->id;
        $data =User::find($id);
        $data ->username = $request->username;
        $data ->name = $request->name;
        $data ->email = $request->email;
        $data ->phone = $request->phone;
        $data ->address = $request->address;

        if($request->file('photo')){

            $file =$request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] =$filename;

        }

        $data->save();
        $notification =array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with( $notification );
    }
    public function AdminChangePassword(){

        $id =Auth::user()->id;
        $profileData =User::find($id);
        return view('admin.admin_change_password',compact('profileData'));
    }
    public function AdminUpdatePassword(Request $request){
$request->validate([
    'old_password' =>'required',
    'new_password' =>'required|confirmed'
]);
if(!Hash::check($request->old_password, auth::user()->password )){
    $notification =array(
        'message' => 'Old Password Does Not Match!',
        'alert-type' => 'error'
    );
    return back()->with( $notification );

}
 User::whereId(auth()->user()->id)->update([
'password' =>Hash::make($request->new_password)
]);
$notification =array(
    'message' => ' Password Change Successfully!',
    'alert-type' => 'success'
);
return back()->with( $notification );
    }
    public function forgotPassword(){
        return view('auth.forgot-password');
    }
    public function doForgotPassword(){
       $user = user::where('email',request('email'))->first();
       $token = Str::random(120);
       $user->update(['password_reset_token'=>$token]);
       Mail::to(request('email'))->send(new PasswordResetMail($user,$token));
       return $token;
    }

}
