@extends('layouts.main')

@section('title', 'Post ' . $post->title)

@section('meta-description', '✍ Noticia sobre ' . $post->title)

@section('content')
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <div class="blog-list blog-detail">
                        <h1 class="title"><a href="#">{{ $post->title }}</a></h1>
                        <div class="social">
                            <span class="date">{{ $post->created_at->format('d') }}
                                <span>{{ $post->created_at->format('M') }}</span></span>
                            <a href="#"><i class="fa fa-heart-o"></i><span>{{ $post->like }}</span></a>
                            <a href="#"><i class="fa fa-eye"></i><span>{{ $post->view }}</span></a>
                        </div>
                        <div class="image">
                            <img src="{{ asset('blog/images/787x255-' .$post->photo) }}" alt="{{ $post->title }}" title="Guía Celíaca"
                                 class="img-responsive"/>
                        </div>
                        <p style="color: yellow;">¿Te gusto la noticia?<a href="{{ route('post.like', $post) }}"> <i
                                        class="fa fa-heart-o fa-2x" style="color: red;"></i></a></p>
                        <div style="margin-top: 5%">
                            {!! $post->body !!}
                        </div>
                    </div>

                </div>
                @include('web.parts.blog._asideBlog')
            </div>
        </div>

    </section>
@endsection