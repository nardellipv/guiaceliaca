@extends('layouts.main')

@section('title', '📰 Noticias de interés en temas celíacos')

@section('meta-description','👉 Enterate de lo último en temas de celiaquia. Publicamos contenido semanalmente estes actualizados constantemente.')

@section('content')
    <section id="blog">

        <div class="container">
            @if(!Request()->cookie('login'))
                @include('web.parts._registerIndex')
            @endif

            @if(Request()->cookie('owner'))
                <div class="row">
                    <div class="col-md-6 col-lg-offset-3">
                        @include('web.parts._upgrade')
                    </div>
                </div>
            @endif
            <br>

            <div class="row">
                <div class="col-md-9">
                    @foreach($posts as $post)
                        <div class="row blog-list">
                            <div class="col-md-5">
                                <div class="social">
                                    <span class="date">{{ $post->created_at->format('d') }}
                                        <span>{{ $post->created_at->format('M') }}</span></span>
                                    <a href="#"><i class="fa fa-heart-o"></i><span>{{ $post->like }}</span></a>
                                    <a href="#"><i class="fa fa-eye"></i><span>{{ $post->view }}</span></a>
                                </div>
                                <div class="image image-fill">
                                    <img src="{{ asset('blog/images/360x239-' .$post->photo) }}"
                                         alt="{{ $post->title }}" title="{{ $post->title }}"/>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h2 class="title"><a href="{{ url('blog', $post->slug) }}">{{ $post->title }}</a></h2>
                                <div class="text">{!! Str::limit($post->body,300) !!}</div>
                                <a href="{{ url('blog', $post->slug) }}" type="button" class="btn btn-default">Leer
                                    más</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                @include('web.parts.blog._asideBlog')
            </div>
        </div>

        <div class="container" id="pagination">
            <div class="row">
                <div class="col-md-9 text-center">
                    <ul class="pagination">
                        {!! $posts->render() !!}
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

