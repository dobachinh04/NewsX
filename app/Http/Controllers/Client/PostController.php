<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Lấy 8 bài viết mới nhất và tác giả
        $posts = Post::orderBy('created_at', 'desc')->with('author')->take(8)->get();

        // Chia dữ liệu thành hai nhóm
        $latestPosts = $posts->take(2); // 2 bài viết mới nhất
        $otherPosts = $posts->slice(2);  // 6 bài viết còn lại

        // Lấy bài viết có lượt xem nhiều nhất
        $most2ViewedPost = Post::orderBy('view', 'desc')->take(2)->get();

        // Lấy 6 bài viết có lượt xem nhiều nhất, bỏ qua 2 bài đã lấy ở trên
        $most6ViewedPost = Post::orderBy('view', 'desc')->skip(2)->take(6)->get();

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

        // Lấy bài viết có lượt xem nhiều nhất
        $most1ViewedPost = Post::orderBy('view', 'desc')->take(1)->get();

        // Lấy 5 bài viết ngẫu nhiên
        $random5Posts = Post::inRandomOrder()->take(5)->get();

        // Lấy 9 bài viết ngẫu nhiên
        $random9Posts = Post::inRandomOrder()->take(9)->get();

        // Trả dữ liệu đến view 'home'
        return view(
            'client.home',
            compact(
                'categories',
                'latestPosts',
                'otherPosts',
                'trendingPosts',
                'slideCategories',
                'largePost',
                'smallPosts',
                'most1ViewedPost',
                'most2ViewedPost',
                'most6ViewedPost',
                'random5Posts',
                'random9Posts'
            )
        );
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
        $post = Post::with('author', 'category')->findOrFail($id);

        // Tăng số lượt xem
        $post->increment('view');

        // category này lấy ra category theo id để hiển thị
        $category = $post->category;

        // categories để foreach ra các danh mục
        $categories = Category::all();

        $latestPostsComponent = Post::orderBy('created_at', 'desc')->take(5)->get();

        return view('client.single-post', compact('post', 'category', 'categories', 'latestPostsComponent', ));
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

    public function author(string $id)
    {
        // Lấy thông tin tác giả
        $author = User::findOrFail($id);

        // Lấy tất cả các danh mục để hiển thị
        $categories = Category::all();

        // Lấy các bài viết thuộc về tác giả này
        $posts = Post::where('author_id', $id)->get();

        // Lấy 5 bài viết mới nhất để hiển thị
        $latestPostsComponent = Post::orderBy('created_at', 'desc')->take(5)->get();

        return view('client.author', [
            'author' => $author,
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
