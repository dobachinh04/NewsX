<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Lấy 8 bài viết mới nhất và tác giả
        $posts = Post::with('author')->take(8)->get();

        // Chia dữ liệu thành hai nhóm
        $latestPosts = $posts->take(2); // 2 bài viết mới nhất
        $otherPosts = $posts->slice(2);  // 6 bài viết còn lại

        // Lấy các danh mục để hiển thị trên dropdown menu header
        $categories = Category::all();

        // Lấy 3 bài viết có lượt xem nhiều nhất để hiện thị lên slide
        $slidePosts = Post::orderBy('view', 'desc')->take(3)->get();

        // Lấy danh mục từ các bài viết
        $slideCategories = Category::whereIn('id', $slidePosts->pluck('category_id'))->get();

        // Phân loại bài viết
        $largePost = $slidePosts->shift(); // Lấy bài viết đầu tiên (bài lớn nhất)
        $smallPosts = $slidePosts; // Hai bài viết còn lại

        // Lấy 3 bài viết có lượt xem nhiều nhất
        $trendingPosts = Post::orderBy('view', 'desc')->take(3)->get();

        // Trả dữ liệu đến view 'home'
        return view('client.home', [
            'categories' => $categories,
            'latestPosts' => $latestPosts,
            'otherPosts' => $otherPosts,
            'trendingPosts' => $trendingPosts,
            'slideCategories' => $slideCategories,
            'largePost' => $largePost,
            'smallPosts' => $smallPosts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('author')->findOrFail($id);

        // category này lấy ra category theo id để hiển thị
        $category = Category::findOrFail($id);

        // categories để foreach ra các danh mục
        $categories = Category::all();

        $latestPostsComponent = Post::orderBy('created_at', 'desc')->take(5)->get();

        return view('client.single-post', [
            'post' => $post,
            'category' => $category,
            'categories' => $categories,
            'latestPostsComponent' => $latestPostsComponent,
        ]);
    }

    public function categories(string $id)
    {
        // category này lấy ra category theo id để hiển thị
        $category = Category::findOrFail($id);

        // categories để foreach ra các danh mục
        $categories = Category::all();

        // Lấy các bài viết thuộc danh mục này
        $posts = Post::where('category_id', $id)->get();

        $latestPostsComponent = Post::orderBy('created_at', 'desc')->take(5)->get();

        return view('client.category', [
            'category' => $category,
            'categories' => $categories,
            'posts' => $posts,
            'latestPostsComponent' => $latestPostsComponent,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
