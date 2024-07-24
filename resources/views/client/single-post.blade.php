@extends('client.layouts.master')

@section('title')
    {{ $post->title }} - FlashNews
@endsection

@section('content')
    <!-- ##### Post Details Title Area Start ##### -->
    <div class="post-details-title-area bg-overlay clearfix" style="background-image: url(/newsbox-master/img/bg-img/22.jpg)">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-lg-8">
                    <!-- Post Content -->
                    <div class="post-content">
                        <p class="tag"><span>{{ $category->name }}</span></p>
                        <p class="post-title">{{ $post->title }}</p>
                        <div class="d-flex align-items-center">
                            <span class="post-date mr-30">{{ $post->created_at->format('F d, Y') }}</span>
                            <a href="{{ route('client.author', ['id' => $post->id]) }}"><span class="post-date">Tác Giả:
                                    {{ $post->author->name }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Post Details Title Area End ##### -->

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-news-area section-padding-100-0 mb-70">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8">
                    <div class="post-details-content mb-100">
                        <p>{{ $post->content }}</p>

                        <img class="mb-30" src="{{ asset('storage/images/' . $post->image) }}" alt="">
                        <p>Nullam lacinia ex eleifend orci porttitor, suscipit interdum augue condimentum. Etiam pretium
                            turpis eget nibh laoreet iaculis. Proin ac urna at lectus volutpat lobortis. Vestibulum
                            venenatis iaculis diam vitae lobortis. Donec tincidunt viverra elit, sed consectetur est pr
                            etium ac.</p>
                        <p>Mauris nec mauris tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elit nisl,
                            faucibus eu tempus vel, imperdiet at felis. Sed sed nibh et augue feugiat pharetra. Praesent
                            ultrices nec tortor et gravida. Sed id rhoncus est. Interdum et malesuada fames ac ante ipsum
                            primis in faucibus. Curabitur vitae luctus turpis. Maecenas diam ex, mattis vel dolor ut,
                            fermentum consectetur ex. </p>
                        <h5 class="mb-30">A good news after all</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elit nisl, faucibus eu tempus vel,
                            imperdiet at felis. Sed sed nibh et augue feugiat pharetra. Praesent ultrices nec tortor et
                            gravida. Sed id rhoncus est. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                            Curabitur vitae luctus turpis. Maecenas diam ex, mattis vel dolor ut, fermentum consectetur ex.
                        </p>
                    </div>

                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix mb-100">
                        <h4 class="mb-50">Bình Luận</h4>

                        <ol>
                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <div class="comment-author">
                                        <img src="/newsbox-master/img/bg-img/32.jpg" alt="author">
                                    </div>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <div class="d-flex">
                                            <a href="#" class="post-author">Maria Williams</a>
                                            <a href="#" class="post-date">June 23, 2018 </a>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                        <p>Consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla
                                            placerat, tinci dunt mi. Nullam vel orci dui. Su spendisse sit amet laoreet
                                            neque. Fusce sagittis sus cipit sem a consequat.</p>
                                    </div>
                                </div>
                                <ol class="children">
                                    <li class="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content d-flex">
                                            <!-- Comment Author -->
                                            <div class="comment-author">
                                                <img src="/newsbox-master/img/bg-img/33.jpg" alt="author">
                                            </div>
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <div class="d-flex">
                                                    <a href="#" class="post-author">Christian Williams</a>
                                                    <a href="#" class="post-date">April 15, 2018</a>
                                                    <a href="#" class="reply">Reply</a>
                                                </div>
                                                <p>Consectetur adipiscing elit. Praesent vel tortor facilisis, Nullam vel
                                                    orci dui. Su spendisse sit amet laoreet neque.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </li>

                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <div class="comment-author">
                                        <img src="/newsbox-master/img/bg-img/32.jpg" alt="author">
                                    </div>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <div class="d-flex">
                                            <a href="#" class="post-author">Lisa Moore</a>
                                            <a href="#" class="post-date">June 23, 2018</a>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor
                                            facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Su
                                            spendisse sit amet laoreet neque. Fusce sagittis suscipit.</p>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>

                    <div class="post-a-comment-area mb-30 clearfix">
                        <h4 class="mb-50">Nhập Bình Luận</h4>

                        <!-- Reply Form -->
                        <div class="contact-form-area">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control" id="name" placeholder="Name*">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="email" class="form-control" id="email" placeholder="Email*">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="subject" placeholder="Website">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn newsbox-btn mt-30" type="submit">Submit Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="sidebar-area">

                        @include('client.components.subscribe')

                        <!-- Latest News Widget -->
                        <div class="single-widget-area news-widget mb-30">
                            @include('client.components.latest-news')
                        </div>

                        <!-- Single Widget Area -->
                        <div class="single-widget-area">

                            <!-- Single News Area -->
                            <div class="single-blog-post style-2 mb-5">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="#"><img src="/newsbox-master/img/bg-img/14.jpg" alt=""></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">June 20, 2018</span>
                                    <a href="#" class="post-title">Elon Musk: Tesla worker admitted to sabotage</a>
                                    <a href="#" class="post-author">By Michael Smith</a>
                                </div>
                            </div>

                            <!-- Single News Area -->
                            <div class="single-blog-post style-2 mb-5">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="#"><img src="/newsbox-master/img/bg-img/15.jpg" alt=""></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">June 20, 2018</span>
                                    <a href="#" class="post-title">Rachel Sm ith breaks down while discussing border
                                        crisis</a>
                                    <a href="#" class="post-author">By Michael Smith</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->
@endsection
