<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function register_auth() {
        return view('admin.custom_auth.register');
    }
    public function register(Request $request) {
        $this->validation($request);
        $data = $request->all();
        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();
        return Redirect('/register-auth')->with('message','Đăng ký thành công');
    }
    public function validation($request) {
        return $this->validate($request,[
            'admin_name' => 'required|min:5',
            'admin_phone' => 'required|min:11',
            'admin_email' => 'required|email|min:6',
            'admin_password' => 'required|min:6',
        ],[
            'admin_name.required' => 'Chưa nhập tên',
            'admin_name.min' => 'Tên quá ngắn, tối thiểu 5 ký tự',
            'admin_phone.required' => 'Chưa nhập số điện thoại',
            'admin_phone.min' => 'Số điện thoại không đúng, kiểm tra lại',
            'admin_email.required' => 'Chưa nhập Email',
            'admin_email.min' => 'Email quá ngắn',
            'admin_password.required' => 'Chưa nhập password',
        ]);
    }
    public function login_auth() {
        return view('admin.custom_auth.login_auth');
    }
    public function login(Request $request) {
        $request->validate([
            'admin_email' => 'required|email|max:255',
            'admin_password' => 'required|max:255',
        ]);
        // $data = $request->all();
        if(Auth::attempt(['admin_email' => $request->admin_email, 'admin_password' => $request->admin_password])){
           return redirect('/dashboard');
        }else{
           return redirect('/login-auth')->with('message','Tài khoản đăng nhập authentication không đúng');
        }
    }
    public function logout_auth(){
        Auth::logout();
        return redirect('/login-auth')->with('message','Đăng xuất authentication thành công');
    }
}
