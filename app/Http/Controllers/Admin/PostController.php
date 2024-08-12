<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::with(['category', 'author'])->get();

        return view('admin.posts.index', compact('data'));
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
    public function store(StorePostRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $dataPost = [
                    'title' => $request->title,
                    'category_id' => $request->category_id,
                    'content' => $request->content,
                    'author_id' => auth()->id(),
                    'view' => 0,
                ];

                // if ($request->hasFile('image')) {
                $dataPost['image'] = Storage::put('images/posts', $request->file('image'));
                // }

                // Tạo post mới
                Post::query()->create($dataPost);
            });

            return redirect()->route('admin.posts.index')->with('success', 'Thêm thành công');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
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
    public function update(UpdatePostRequest $request, Post $post)
    {
        // Lấy bài viết theo ID và cập nhật dữ liệu
        // $post = Post::findOrFail($id);

        try {
            DB::transaction(function () use ($request, $post) {
                $dataPost = [
                    'title' => $request->title,
                    'category_id' => $request->category_id,
                    'content' => $request->content,
                    'author_id' => auth()->id(),
                    'view' => 0,
                ];

                if ($request->hasFile('image')) {
                    $dataPost['image'] = Storage::put('images/posts', $request->file('image'));
                }

                // Tạo post mới
                Post::query()->update($dataPost);
            });

            return redirect()->route('admin.posts.index')->with('success', 'Cập nhật thành công');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
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
