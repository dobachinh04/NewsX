<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'author'])->get();

        return view(
            'admin.posts.index',
            [
                'posts' => $posts
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        // Lấy thông tin người dùng đang đăng nhập
        $user = Auth::user();

        return view(
            'admin.posts.create',
            [
                'categories' => $categories,
                'user' => $user,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imageName = basename($imagePath);
        } else {
            $imageName = null; // Set null nếu không có ảnh
        }

        // Tạo post mới
        Post::create([
            'title' => $request->input('title'),
            'image' => $imageName,
            'category_id' => $request->input('category_id'),
            'content' => $request->input('content'),
            // 'author_id' => auth()->id(),
            'author_id' => auth()->id(),
            'view' => 0,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Tìm bài viết theo ID
        $post = Post::with(['category', 'author'])->findOrFail($id);

        // Truyền bài viết đến view
        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Lấy bài viết cần chỉnh sửa theo ID
        $post = Post::findOrFail($id);

        // Lấy tất cả danh mục để chọn
        $categories = Category::all();

        return view('admin.posts.update', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image', // Xác thực ảnh nếu có
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'author_id' => 'nullable|exists:users,id',
        ]);

        // Lấy bài viết theo ID và cập nhật dữ liệu
        $post = Post::findOrFail($id);

        // Xử lý ảnh
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($post->image) {
                Storage::delete('public/images/' . $post->image);
            }

            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('public/images');
            $imageName = basename($imagePath);
        } else {
            // Nếu không có ảnh mới, giữ nguyên ảnh cũ
            $imageName = $post->image;
        }

        // Cập nhật bài viết
        $post->update([
            'title' => $request->input('title'),
            'image' => $imageName,
            'category_id' => $request->input('category_id'),
            'content' => $request->input('content'),
            'author_id' => $request->input('author_id') ?? $post->author_id, // Giữ nguyên author_id nếu không có thay đổi
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        // Xóa bài viết
        $post->delete();

        // Chuyển hướng về trang danh sách bài viết với thông báo thành công
        return redirect()->route('admin.posts.index')->with('success', 'Xóa thành công');
    }
}
