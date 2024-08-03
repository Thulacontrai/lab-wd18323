<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function formLogin()
    {
        return view('clien.login');
    }
    public function subLogin(Request $request)
    {
        // dd(request()->all());
        ///đăng nhập vào hệ thống

        $user = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = request()->only('email', 'password');
        if (Auth::attempt($user)) {
            // dd(Auth::user());
            $user = Auth::user();
            if ($user->active == 1) {
                if (Auth::user()->role == 'admin') {
                    return redirect()->route('admin.home');
                } else {
                    return redirect()->route('profile');
                }
            }else{
                return redirect()->route('login')->with('errorLogin', 'Tài khoản đã bị vô hiệu hóa');

            }
        }
        // dd($data)
        // Auth::login($user);





    }
    public function formRegister()
    {
        return view('clien.register');
    }
    public function subRegister(Request $request)
    {
        // dd(request()->all());
        // đăng ký người dùng vào hệ thống
        $data = request()->validate([
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
//            'password' => 'required',
            'avatar' => 'required',
        ]);
        $data = request()->except('avatar');
        // nếu user ko nhập ảnh
        $data['avatar'] = '';
        //nếu user nhập ảnh
        if (request()->hasFile('avatar')) {
            $path_img = request()->file('avatar')->store('avatar');
            $data['avatar'] = $path_img;
        }
        // dd($data);

        //thêm user vào db

        User::create($data);

        return redirect()->route('login')->with('msg', 'Đăng ký thành công');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('msg', 'Đăng xuất thành công');
    }

    public function showProfile(User $user)
    {
        // dd($user);
        // dd(Auth::user());
        $user=Auth::user();
        return view('clien.profile',compact('user'));

    }
    public function editProfile(User $user) {

        return view('clien.editProfile',compact('user'));
    }

    public function subProfile(Request $request){
            // dd(request()->all());
            //  dd($user->avatar);
        $user=Auth::user();
        $data = request()->validate([
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
//            'password' => 'required',
//            'avatar' => 'required',
        ]);

        $data = request()->except('avatar');
        $old_avatar=$user->avatar;
        $data['avatar']=$old_avatar;
        if($request->hasFile('avatar')){
            $path_img=$request->file('avatar')->store('avatar');
            $data['avatar']=$path_img;
        }

        if(isset($path_img)){
            if(file_exists('storage/'.$old_avatar)){
                unlink('storage/'.$old_avatar);
            }
        }
        // dd($data);
        $user->update($data);
        // dd($user);
         return redirect()->back()->with('msg','Cập nhật thành công');


    }

}
