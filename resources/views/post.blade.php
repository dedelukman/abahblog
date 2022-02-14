@extends('main_layouts.master')

@section('title', 'Blog')

@section('content')

<div class="colorlib-classes">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row row-pb-lg">
                    <div class="col-md-12 animate-box">
                        <div class="classes class-single">
                            <div class="classes-img" style="background-image: url({{asset($post->image->path)}});">
                            </div>
                            <div class="desc desc2">
                                <h3><a href="#">{{$post->title}}</a></h3>
                                {!! $post->body !!}
                                <p><a href="#" class="btn btn-primary btn-outline btn-lg">Live Preview</a> or <a href="#" class="btn btn-primary btn-lg">Download File</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-pb-lg animate-box">
                    <div class="col-md-12">
                        <h2 class="colorlib-heading-2">{{$post->comment->count()}} Comments</h2>
                        @foreach ( $post->comment as $comment )
                          <div id="comment_{{$comment->id}}" class="review">
                                <div class="user-img" style="background-image: url({{asset($comment->user->image->path)}})"></div>
                                <div class="desc">
                                    <h4>
                                        <span class="text-left">{{$comment->user->name}}</span>
                                        <span class="text-right">{{$comment->created_at->diffforhumans()}}</span>
                                    </h4>
                                    <p>{{$comment->the_comment}}</p>
                                    <p class="star">
                                        <span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="row animate-box">
                    <div class="col-md-12">
                        <x-blog.message :status="'success'"/>
                        <h2 class="colorlib-heading-2">Say something</h2>
                        <form action="#" method="POST" action="{{ route('post.addcomment', $post)}}">
                            @csrf

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <!-- <label for="message">Message</label> -->
                                    <textarea name="the_comment" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- SIDEBAR: start -->
            <div class="col-md-4 animate-box">
                <div class="sidebar">
                    <x-blog.side-categories :categories="$categories"/>
                    <x-blog.side-recentpost :recentposts="$recentposts"/>
                    <x-blog.side-tag :tags="$tags"/>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
