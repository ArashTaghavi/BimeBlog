@extends('layouts.site')
@section('content')
    <!-- ##### Post Details Area Start ##### -->
    <br>
    <section class="post-details-area mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="post-details-thumb mb-50">
                        @if($post->is_video==0)
                            <img src="{{$post->url}}" alt="{{$post->title}}" style="max-width: 75%">
                        @else
                            <video src="{{$post->url}}" controls
                                   style="width:100%"></video>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="post-details-content">
                        <!-- Blog Content -->
                        <div class="blog-content">

                            <!-- Post Content -->
                            <div class="post-content mt-0">
                                <a href="#" class="post-cata cata-sm cata-danger">
                                    {{$post->category->title}}
                                </a>
                                <a href="single-post.html" class="post-title mb-2">
                                    {{$post->title}}
                                </a>

                                <div class="d-flex justify-content-between mb-30">
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-author">توسط: تیم محتوا</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date">
                                            {{jdate($post->created_at)}}
                                        </a>
                                    </div>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o"
                                                       aria-hidden="true"></i> {{count($post->comments)}}</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$post->view_count}}
                                        </a>
                                        <a href="#"><i class="fa fa-thumbs-o-up"
                                                       aria-hidden="true"></i> {{$post->popularity}}</a>
                                    </div>
                                </div>
                            </div>
                            <p style="overflow: auto;text-align: justify">
                                {{$post->description}}
                            </p>

                            <!-- Post Tags -->
                            <div class="post-tags mt-30">
                                <ul>
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="/category/{{$category->slug}}">{{$category->title}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>


                            <!-- Comment Area Start -->
                            <div class="comment_area clearfix mb-50">

                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>نظرات</h4>
                                    <div class="line"></div>
                                </div>

                                <ul>
                                @foreach($post->comments as $comment)
                                    <!-- Single Comment Area -->
                                        <li class="single_comment_area">
                                            <!-- Comment Content -->
                                            <div class="comment-content d-flex">
                                                <!-- Comment Author -->
                                                <!-- Comment Meta -->
                                                <div class="comment-meta">
                                                    <a href="#" class="comment-date">
                                                        {{jdate($comment->created_at)}}
                                                    </a>
                                                    <h6>{{$comment->full_name}}</h6>
                                                    <p>
                                                        {{$comment->description}}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Post A Comment Area -->
                            <div class="post-a-comment-area">

                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>نظر خود را ارسال کنید</h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Reply Form -->
                                <div class="contact-form-area">
                                    <form class="comment-form" method="POST"
                                          id="form"
                                          action="{{route('post.store-comment',$post->id)}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <input type="text" class="form-control" id="full_name" name="full_name"
                                                       placeholder="نام شما*">
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <input type="email" class="form-control" id="email"
                                                       name="email"
                                                       placeholder="ایمیل شما">
                                            </div>
                                            <div class="col-12">
                                                <textarea name="description" class="form-control" id="description"
                                                          placeholder="پیام*"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn videomag-btn mt-30" type="submit">ارسال نظر</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="sidebar-area">

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget share-post-widget mb-50">
                            <p>اشتراک گذاری</p>
                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> فیسبوک</a>
                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> توئیتر</a>
                            <a href="#" class="telegram"><i class="fa fa-paper-plane" aria-hidden="true"></i> تلگرام</a>
                        </div>

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget p-0 author-widget">
                            <div class="authors--meta-data d-flex">
                                <p>تعداد نظرات<span class="counter">{{count($post->comments)}}</span></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->
@stop