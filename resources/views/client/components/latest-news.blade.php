<h4 class="mb-2">Tin Mới Nhất</h4>

<!-- Single News Area -->
@foreach ($latestPostsComponent as $post)
    <div class="single-blog-post d-flex style-4 mb-30">
        <!-- Blog Thumbnail -->
        <div class="blog-thumbnail">
            <a href="{{ route('client.show', ['id' => $post->id]) }}"><img
                    src="{{ asset('storage/images/' . $post->image) }}"
                    style="width: 120px; height: 90px; object-fit: cover;" alt=""></a>
        </div>

        <!-- Blog Content -->
        <div class="blog-content">
            <span class="post-date">{{ $post->created_at->format('F d, Y') }}</span>
            <a href="#" class="post-title">{{ $post->title }}</a>
        </div>
    </div>
@endforeach
