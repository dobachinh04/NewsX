@extends('client.layouts.master')

@section('title')
    {{ $author->name }}
@endsection

@section('content')
    <!-- ##### Catagory Featured Area Start ##### -->
    <div class="catagory-featured-post bg-overlay clearfix" style="background-image: url(/newsbox-master/img/bg-img/23.jpg)">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-lg-9">
                    <!-- Post Content -->
                    <div class="post-content">
                        <p class="tag"><span>{{ $author->name }}</span></p>
                        <a href="#" class="post-title">Tin Của Tác Giả: {{ $author->name }}
                            {{-- <br>Summer Festivals</a>
                        <p>Nullam lacinia ex eleifend orci porttitor, suscipit interdum augue condimentum. Etiam pretium
                            turpis eget nibh laoreet iaculis. Proin ac urna at lectus volutpat lobortis. Vestibulum
                            venenatis iaculis diam vitae lobortis. Donec tincidunt viverra elit, sed consectetur est pr
                            etium ac. Mauris nec mauris tellus. </p>
                        <span class="post-date">June 20, 2018</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Catagory Featured Area End ##### -->

    <!-- ##### Intro News Area Start ##### -->
    <section class="intro-news-area section-padding-100-0 mb-70">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Intro News Tabs Area -->
                <div class="col-12 col-lg-8">
                    <div class="intro-news-tab">

                        <!-- Intro News Filter -->
                        <div class="intro-news-filter d-flex justify-content-between">
                            <h6>Danh Mục Tin - {{ $author->name }}</h6>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav1" data-toggle="tab" href="#nav-1"
                                        role="tab" aria-controls="nav-1" aria-selected="true">Mới Nhất</a>
                                    <a class="nav-item nav-link" id="nav2" data-toggle="tab" href="#nav-2"
                                        role="tab" aria-controls="nav-2" aria-selected="false">Hot Nhất</a>
                                    <a class="nav-item nav-link" id="nav3" data-toggle="tab" href="#nav-3"
                                        role="tab" aria-controls="nav-3" aria-selected="false">Cũ Nhất</a>
                                    <a class="nav-item nav-link" id="nav4" data-toggle="tab" href="#nav-4"
                                        role="tab" aria-controls="nav-4" aria-selected="false">Nhiều Bình Luận Nhất</a>
                                </div>
                            </nav>
                        </div>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav1">
                                <div class="row">
                                    <!-- Single News Area -->
                                    {{-- <div class="col-12">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/24.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Elon Musk: Tesla worker admitted to
                                                    sabotage</a>
                                                <a href="#" class="post-author mb-30">By Michael Smith</a>
                                                <p>Nullam lacinia ex eleifend orci porttitor, suscipit interdum augue
                                                    condimentum. Etiam pretium turpis eget nibh laoreet iaculis. Proin ac
                                                    urna at lectus volutpat lobortis. Vestibulum venenatis iaculis diam
                                                    vitae lobortis. Donec tincidunt viverra elit, sed consectetur est pr
                                                    etium ac. Mauris nec mauris tellus. </p>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <!-- Single News Area -->
                                    @foreach ($posts as $post)
                                    <div class="col-12 col-sm-6 mb-4">
                                        <div class="single-blog-post style-2">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="{{ route('client.show', ['id' => $post->id]) }}">
                                                    <img src="{{ asset('storage/images/' . $post->image) }}"
                                                         style="width: 350px; height: 240px; object-fit: cover;" alt="">
                                                </a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">{{ $post->created_at->format('F d, Y') }}</span>
                                                <a href="{{ route('client.show', ['id' => $post->id]) }}"
                                                   class="post-title">{{ $post->title }}</a>
                                                <a href="{{ route('client.author', ['id' => $post->author->id]) }}"
                                                   class="post-author">Tác Giả: {{ $post->author->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav2">
                                <div class="row">
                                    <!-- Single News Area -->
                                    <div class="col-12">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/25.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Elon Musk: Tesla worker admitted to
                                                    sabotage</a>
                                                <a href="#" class="post-author mb-30">By Michael Smith</a>
                                                <p>Nullam lacinia ex eleifend orci porttitor, suscipit interdum augue
                                                    condimentum. Etiam pretium turpis eget nibh laoreet iaculis. Proin ac
                                                    urna at lectus volutpat lobortis. Vestibulum venenatis iaculis diam
                                                    vitae lobortis. Donec tincidunt viverra elit, sed consectetur est pr
                                                    etium ac. Mauris nec mauris tellus. </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/14.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Elon Musk: Tesla worker admitted to
                                                    sabotage</a>
                                                <a href="#" class="post-author">By Michael Smith</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/15.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Rachel Sm ith breaks down while
                                                    discussing border crisis</a>
                                                <a href="#" class="post-author">By Michael Smith</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/4.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Elon Musk: Tesla worker admitted to
                                                    sabotage</a>
                                                <a href="#" class="post-author">By Michael Smith</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/5.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Rachel Sm ith breaks down while
                                                    discussing border crisis</a>
                                                <a href="#" class="post-author">By Michael Smith</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav3">
                                <div class="row">
                                    <!-- Single News Area -->
                                    <div class="col-12">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/26.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Elon Musk: Tesla worker admitted to
                                                    sabotage</a>
                                                <a href="#" class="post-author mb-30">By Michael Smith</a>
                                                <p>Nullam lacinia ex eleifend orci porttitor, suscipit interdum augue
                                                    condimentum. Etiam pretium turpis eget nibh laoreet iaculis. Proin ac
                                                    urna at lectus volutpat lobortis. Vestibulum venenatis iaculis diam
                                                    vitae lobortis. Donec tincidunt viverra elit, sed consectetur est pr
                                                    etium ac. Mauris nec mauris tellus. </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/14.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Elon Musk: Tesla worker admitted to
                                                    sabotage</a>
                                                <a href="#" class="post-author">By Michael Smith</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/15.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Rachel Sm ith breaks down while
                                                    discussing border crisis</a>
                                                <a href="#" class="post-author">By Michael Smith</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/4.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Elon Musk: Tesla worker admitted to
                                                    sabotage</a>
                                                <a href="#" class="post-author">By Michael Smith</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/5.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Rachel Sm ith breaks down while
                                                    discussing border crisis</a>
                                                <a href="#" class="post-author">By Michael Smith</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav4">
                                <div class="row">
                                    <!-- Single News Area -->
                                    <div class="col-12">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/27.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Elon Musk: Tesla worker admitted to
                                                    sabotage</a>
                                                <a href="#" class="post-author mb-30">By Michael Smith</a>
                                                <p>Nullam lacinia ex eleifend orci porttitor, suscipit interdum augue
                                                    condimentum. Etiam pretium turpis eget nibh laoreet iaculis. Proin ac
                                                    urna at lectus volutpat lobortis. Vestibulum venenatis iaculis diam
                                                    vitae lobortis. Donec tincidunt viverra elit, sed consectetur est pr
                                                    etium ac. Mauris nec mauris tellus. </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/14.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Elon Musk: Tesla worker admitted to
                                                    sabotage</a>
                                                <a href="#" class="post-author">By Michael Smith</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/15.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Rachel Sm ith breaks down while
                                                    discussing border crisis</a>
                                                <a href="#" class="post-author">By Michael Smith</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/4.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Elon Musk: Tesla worker admitted to
                                                    sabotage</a>
                                                <a href="#" class="post-author">By Michael Smith</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="#"><img src="/newsbox-master/img/bg-img/5.jpg"
                                                        alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">June 20, 2018</span>
                                                <a href="#" class="post-title">Rachel Sm ith breaks down while
                                                    discussing border crisis</a>
                                                <a href="#" class="post-author">By Michael Smith</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="sidebar-area">

                        <!-- Newsletter Widget -->
                        @include('client.components.subscribe')

                        <!-- Latest News Widget -->
                        <div class="single-widget-area news-widget mb-30">
                            @include('client.components.latest-news')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Intro News Area End ##### -->

    <!-- ##### Add Area Start ##### -->
    <div class="big-add-area">
        <div class="container-fluid">
            <a href="#"><img src="/newsbox-master/img/bg-img/add4.png" alt=""></a>
        </div>
    </div>
    <!-- ##### Add Area End ##### -->

    <!-- ##### News Area Start ##### -->
    <div class="news-area section-padding-100-70">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-9">

                    <!-- Single News Area -->
                    <div class="single-blog-post d-flex flex-wrap style-5 mb-30">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="/newsbox-master/img/bg-img/28.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">June 20, 2018</span>
                            <a href="#" class="post-title">Rachel Sm ith breaks down while discussing border
                                crisis</a>
                            <a href="#" class="post-author">By Michael Smith</a>
                            <p>Nullam lacinia ex eleifend orci porttitor, suscipit interdum augue condimentum. Etiam pretium
                                turpis eget nibh laoreet iaculis. Proin ac urna at lectus.</p>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="single-blog-post d-flex flex-wrap style-5 mb-30">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="/newsbox-master/img/bg-img/29.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">June 20, 2018</span>
                            <a href="#" class="post-title">Romantic retreats: 11 resorts worth crossing the Pacific
                                for</a>
                            <a href="#" class="post-author">By Michael Smith</a>
                            <p>Lacinia ex eleifend orci porttitor, suscipit interdum augue condimentum. Etiam pretium turpis
                                eget nibh laoreet iaculis. Proin ac urna at lectus volutpat lobortis.</p>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="single-blog-post d-flex flex-wrap style-5 mb-30">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="/newsbox-master/img/bg-img/30.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">June 20, 2018</span>
                            <a href="#" class="post-title">Europe will hit US products with tariffs starting
                                Friday</a>
                            <a href="#" class="post-author">By Michael Smith</a>
                            <p>Lacinia ex eleifend orci porttitor, suscipit interdum augue condimentum. Etiam pretium turpis
                                eget nibh laoreet iaculis. Proin ac urna at lectus volutpat lobortis.</p>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-4 col-lg-3">

                    <!-- Single News Area -->
                    <div class="single-blog-post style-6 mb-30">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="/newsbox-master/img/bg-img/11.jpg" alt=""></a>
                            <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">June 20, 2018</span>
                            <p class="post-title">Viral Video</p>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="single-blog-post style-6 mb-30">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="/newsbox-master/img/bg-img/12.jpg" alt=""></a>
                            <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">June 20, 2018</span>
                            <p class="post-title">Viral Video</p>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="single-blog-post style-6 mb-30">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="/newsbox-master/img/bg-img/13.jpg" alt=""></a>
                            <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">June 20, 2018</span>
                            <p class="post-title">Viral Video</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ##### News Area End ##### -->
@endsection
