@extends('layouts.site')
@section('content')

    <!-- ##### Hero Area Start ##### -->
    <section class="hero--area section-padding-80" style="padding-top: 20px !important;">
        <div class="container">
            <h3 class="title">جدیدترین ها</h3>
            <div class="row no-gutters">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="tab-content">
                        @foreach($posts as $post)
                            <div class="tab-pane fade {{$loop->iteration==1 ? 'show active' : ''}}"
                                 id="post-{{$loop->iteration}}" role="tabpanel"
                                 aria-labelledby="post-{{$loop->iteration}}-tab">
                                <!-- Single Feature Post -->
                                @if($post->is_video==0)
                                    <div class="single-feature-post video-post bg-img"
                                         style="background-image: url({{$post->url}});">
                                        <!-- Post Content -->
                                        <div class="post-content" style="overflow: auto">
                                            <a href="#" class="post-cata">{{$post->category->title}}</a>
                                            <a href="/post/{{$post->slug}}" class="post-title">
                                                {{$post->title}}
                                            </a>
                                            <div class="post-meta d-flex">
                                                <a href="#"><i class="fa fa-comments-o"
                                                               aria-hidden="true"></i> {{count($post->comments)}}</a>
                                                <a href="#"><i class="fa fa-eye"
                                                               aria-hidden="true"></i> {{$post->view_count}}</a>
                                                <a href="#"><i class="fa fa-thumbs-o-up"
                                                               aria-hidden="true"></i> {{$post->popularity}}</a>
                                            </div>
                                        </div>

                                    </div>
                                @else
                                    <div class="single-feature-post video-post bg-img">
                                        <video src="{{$post->url}}" controls style="width:100%;z-index: 1000;position: relative"></video>


                                        <!-- Post Content -->
                                        <div class="post-content" style="overflow: auto">
                                            <a href="#" class="post-cata">{{$post->category->title}}</a>
                                            <a href="/post/{{$post->slug}}" class="post-title">
                                                {{$post->title}}
                                            </a>
                                            <div class="post-meta d-flex">
                                                <a href="#"><i class="fa fa-comments-o"
                                                               aria-hidden="true"></i> {{count($post->comments)}}</a>
                                                <a href="#"><i class="fa fa-eye"
                                                               aria-hidden="true"></i> {{$post->view_count}}</a>
                                                <a href="#"><i class="fa fa-thumbs-o-up"
                                                               aria-hidden="true"></i> {{$post->popularity}}</a>
                                            </div>
                                        </div>

                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 col-md-5 col-lg-4">
                    <ul class="nav videomag-nav-tab" role="tablist">
                        @foreach($posts as $post)
                            <li class="nav-item">
                                <a class="nav-link {{$loop->iteration==1 ? 'active' :''}}"
                                   id="post-{{$loop->iteration}}-tab" data-toggle="pill"
                                   href="#post-{{$loop->iteration}}" role="tab"
                                   aria-controls="post-{{$loop->iteration}}" aria-selected="true">
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post style-2 d-flex align-items-center">
                                        <div class="post-thumbnail">
                                            @if($post->is_video==0)
                                                <img src="{{$post->url}}" alt="{{$post->title}}">
                                            @else
                                                <video src="{{$post->url}}" controls style="width:100%;z-index: 1000;position: relative"></video>
                                            @endif
                                        </div>
                                        <div class="post-content">
                                            <h6 class="post-title">{{$post->title}} </h6>
                                            <div class="post-meta d-flex justify-content-between">
                                                <span><i class="fa fa-comments-o" aria-hidden="true"></i> {{count($post->comments)}}</span>
                                                <span><i class="fa fa-eye" aria-hidden="true"></i> {{$post->view_count}}</span>
                                                <span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{$post->popularity}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

@stop