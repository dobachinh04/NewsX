<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::with(['category', 'author', 'tags'])->get();

        return view('admin.posts.index', compact('data'));
    }

    public function create()
    {
        // Lấy tất cả danh mục để chọn
        $categories = Category::pluck('name', 'id')->all();

        $tags = Tag::pluck('name', 'id')->all();

        // Lấy thông tin người dùng đang đăng nhập
        $user = Auth::user();

        return view('admin.posts.create', compact('categories', 'tags', 'user'));
    }

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

                if ($request->hasFile('image')) {
                    $dataPost['image'] = Storage::put('images/posts', $request->file('image'));
                }

                $post = Post::query()->create($dataPost);


                foreach ($request->galleries as $image) {
                    Gallery::query()->create([
                        'post_id' => $post->id,
                        'image' => Storage::put('images/galleries', $image),
                    ]);
                }

                $post->tags()->attach($request->tags);
            });

            return redirect()->route('admin.posts.index')->with('success', 'Thêm thành công');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function show(Post $post)
    {
        $post->load(['category', 'author', 'tags']);

        // Tìm bài viết theo ID
        // $post = Post::with(['category', 'author'])->findOrFail($id);

        // Truyền bài viết đến view
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $post->load(['category', 'author', 'tags']);

        // Lấy bài viết cần chỉnh sửa theo ID
        // $post = Post::findOrFail($id);

        $categories = Category::pluck('name', 'id')->all();

        $tags = Tag::pluck('name', 'id')->all();

        $postTags = $post->tags->pluck('id')->all();

        $user = Auth::user();

        return view('admin.posts.update', compact('post', 'categories', 'tags', 'postTags', 'user'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            DB::transaction(function () use ($request, $post) {
                $dataPost = [
                    'title' => $request->title,
                    'category_id' => $request->category_id,
                    'content' => $request->content,
                    'author_id' => auth()->id(),
                ];

                // Cập nhật ảnh nếu có
                if ($request->hasFile('image')) {
                    // Xóa ảnh cũ nếu cập nhật
                    if ($post->image && Storage::exists($post->image)) {
                        Storage::delete($post->image);
                    }

                    // Cập nhật ảnh mới
                    $dataPost['image'] = Storage::put('images/posts', $request->file('image'));
                }

                $post->update($dataPost);

                $post->tags()->sync($request->tags);
            });

            return redirect()->route('admin.posts.index')->with('success', 'Cập nhật thành công');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function destroy(Post $post)
    {
        try {
            DB::transaction(function () use ($post) {
                // Xóa bài viết
                $post->delete();
            });

            // Xóa ảnh
            if ($post->image && Storage::exists($post->image)) {
                Storage::delete($post->image);
            }

            return redirect()->route('admin.posts.index')->with('success', 'Xóa thành công');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }
}
