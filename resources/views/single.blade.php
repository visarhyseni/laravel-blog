@extends('layouts.frontend')

@section('content')
    <div class="content-wrapper">

        <!-- Stunning Header -->

        <div class="stunning-header stunning-header-bg-lightviolet">
            <div class="stunning-header-content">
                <h1 class="stunning-header-title">{{ $post->title }}</h1>
            </div>
        </div>

        <!-- End Stunning Header -->

        <!-- Post Details -->


        <div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    <div class="post-thumb">
                        <img src="{{ asset($post->featured) }}" alt="seo">
                    </div>

                    <div class="post__content">


                        <div class="post-additional-info">

                            <div class="post__author author vcard">
                                Posted by

                                <div class="post__author-name fn">
                                    <a href="#" class="post__author-link">{{ $post->user->name }}</a>
                                </div>

                            </div>

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{ $post->created_at->toFormattedDateString() }}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('category', ['id'=>$post->category->id]) }}">{{ $post->category->name }}</a>
                            </span>

                        </div>

                        <div class="post__content-info">

                            {!! $post->content !!}

                            <div class="widget w-tags">
                                <div class="tags-wrap">
                                    @foreach($post->tag as $tag)
                                    <a href="{{ route('tag',['id'=>$tag->id]) }}" class="w-tags-item">{{ $tag->tag }}</a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="socials">Share:
                        <a href="#" class="social__item">
                            <i class="seoicon-social-facebook"></i>
                        </a>
                        <a href="#" class="social__item">
                            <i class="seoicon-social-twitter"></i>
                        </a>
                        <a href="#" class="social__item">
                            <i class="seoicon-social-linkedin"></i>
                        </a>
                        <a href="#" class="social__item">
                            <i class="seoicon-social-google-plus"></i>
                        </a>
                        <a href="#" class="social__item">
                            <i class="seoicon-social-pinterest"></i>
                        </a>
                    </div>

                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        <img src="{{ asset($post->user->profile->avatar)}}" alt="Author" height="110" width="110">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{ $post->user->name }}</h5>
                            <p class="author-info">{{ $post->user->email }}</p>
                        </div>
                        <p class="text">{{ $post->user->profile->about }}</p>
                        <div class="socials">

                            <a href="{{ asset($post->user->profile->facebook) }}" class="social__item">
                                <img src="{{ asset('app/svg/circle-facebook.svg') }}" alt="facebook">
                            </a>

                            <a href="{{ asset($post->user->profile->youtube) }}" class="social__item">
                                <img src="{{ asset('app/svg/youtube.svg')}}" alt="youtube">
                            </a>

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">
                    @if($next)
                        <a href="{{ route('single.post', ['slug' => $next->slug]) }}" class="btn-next-wrap">
                            <div class="btn-content">
                                <div class="btn-content-title">Next Post</div>
                                <p class="btn-content-subtitle">{{ $next->title }}</p>
                            </div>
                            <svg class="btn-next">
                                <use xlink:href="#arrow-right"></use>
                            </svg>
                        </a>
                    @endif

                    @if($prev)
                        <a href="{{ route('single.post', ['slug' => $prev->slug]) }}" class="btn-prev-wrap">
                            <svg class="btn-prev">
                                    <use xlink:href="#arrow-left"></use>
                            </svg>
                            <div class="btn-content">
                                <div class="btn-content-title">Previous Post</div>
                                <p class="btn-content-subtitle">{{ $prev->title }}</p>
                            </div>
                        </a>
                    @endif
                </div>

                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="media">
                        @foreach($post->comments as $comment)
                            <div class="media-body">
                                <h5 class="mt-0">by: {{$comment->user->name}}</h5>
                                {{ $comment->comment }}
                            </div>
                        @endforeach
                        <div>
                            @if(Auth::user())
                                <form action="{{ asset('admin/comments/store') }}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <input type="textarea" name="comment" class="form-control border" placeholder="comment" >
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>


            </div>

            <!-- End Post Details -->

            <!-- Sidebar-->

            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div  class="widget w-tags">
                        <div class="heading text-center">
                            <h4 class="heading-title">ALL BLOG TAGS</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">
                            @foreach($all_tags as $tag)
                                <a href="{{ route('tag', ['id'=>$tag->id]) }}" class="w-tags-item">{{ $tag->tag }}</a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>

            <!-- End Sidebar-->

        </main>
    </div>
    </div>


@endsection