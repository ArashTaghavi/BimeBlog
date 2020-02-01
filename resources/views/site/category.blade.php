@extends('layouts.site')
@section('content')
    <br>
    <div class="videomag-grid-posts-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <!-- Archive Catagory & View Options -->
                    <div class="archive-catagory-view mb-50 d-flex align-items-center justify-content-between">
                        <!-- Catagory -->
                        <div class="archive-catagory">
                            <h4><i class="fa fa-trophy" aria-hidden="true"></i> {{$title}}</h4>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Single Blog Post -->
                        @foreach($posts as $post)
                            <div class="col-12 col-md-6">
                                <div class="single-post-area mb-50">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        @if($post->is_video==0)
                                            <img src="{{$post->url}}" alt="{{$post->title}}">
                                        @else
                                            <video src="{{$post->url}}" controls
                                                   style="width:100%"></video>
                                        @endif
                                    </div>

                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="/post/{{$post->slug}}" class="post-title">
                                            {{$post->title}}
                                        </a>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{count($post->comments)}}</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$post->view_count}}</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{$post->popularity}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop