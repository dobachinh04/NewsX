<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function displayLogin()
    {
        // Lấy các danh mục để hiển thị trên dropdown menu header
        $categories = Category::all();

        return view('client.login', [
            'categories' => $categories

        ]);
    }

    public function displayRegister()
    {
        // Lấy các danh mục để hiển thị trên dropdown menu header
        $categories = Category::all();

        return view('client.register', [
            'categories' => $categories
        ]);
    }

    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string',
        ]);

        // Xác thực người dùng
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Nếu xác thực thành công, lưu thông tin người dùng vào session
            $request->session()->put('user', Auth::user());

            // Chuyển hướng về trang chủ hoặc trang mong muốn
            return redirect()->route('client.home')->with('success', 'Đăng nhập thành công');
        } else {
            // Nếu xác thực thất bại, quay lại trang đăng nhập với thông báo lỗi
            return redirect()->route('client.login')->withErrors(['error' => 'Sai thông tin đăng nhập']);
        }
    }


    public function register(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // Xác nhận mật khẩu
        ]);

        // Tạo người dùng mới
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Mã hóa mật khẩu
            'role_id' => 0,
        ]);

        // Đăng nhập ngay sau khi đăng ký
        Auth::attempt($request->only('email', 'password'));

        // Lưu thông tin người dùng vào session
        $request->session()->put('user', Auth::user());

        // Chuyển hướng về trang chủ hoặc trang mong muốn
        return redirect()->route('client.home')->with('success', "Đăng ký thành công");
    }

    public function logout(Request $request)
    {
        // Xóa session đăng nhập
        $request->session()->forget('user');

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Chuyển hướng về trang đăng nhập
        return redirect()->route('client.login');
    }
}
