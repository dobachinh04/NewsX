<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->get();

        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();

        return view('admin.users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed', // Sử dụng confirmed để kiểm tra re-password
            'role_id' => 'required|exists:roles,id',
            'image' => 'nullable|image', // Giới hạn dung lượng và chỉ chấp nhận file ảnh
        ]);

        // Xử lý upload ảnh nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imageName = basename($imagePath);
        } else {
            $imageName = null; // Nếu không có ảnh thì đặt null
        }

        // Tạo người dùng mới
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), // Băm mật khẩu trước khi lưu
            'role_id' => $request->input('role_id'),
            'image' => $imageName,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Thêm thành công');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('role')->findOrFail($id);

        return view(
            'admin.users.show',
            [
                'user' => $user
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('role')->findOrFail($id);

        $roles = Role::get();

        return view(
            'admin.users.update',
            [
                'user' => $user,
                'roles' => $roles,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            // 'password' => 'required|confirmed',
            'role_id' => 'required',
            'image' => 'nullable|image',
        ]);

        $user = User::findOrFail($id);

        // Xử lý ảnh
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($user->image) {
                Storage::delete('public/images/' . $user->image);
            }

            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('public/images');
            $imageName = basename($imagePath);
        } else {
            // Nếu không có ảnh mới, giữ nguyên ảnh cũ
            $imageName = $user->image;
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // 'password' => $request->input('password'),
            'role_id' => $request->input('role_id') ?? $user->role_id,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Xóa thành công');
    }
}
