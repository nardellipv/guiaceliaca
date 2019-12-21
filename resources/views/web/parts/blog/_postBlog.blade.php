@extends('layouts.main')

@section('title', 'Post ' . $post->title)

@section('meta-description', '✍ Noticia sobre ' . $post->title)

@section('og:url', 'https://guiaceliaca.com.ar/blog/' . $post->slug)
@section('og:title',  $post->title)
@section('og:image', 'https://guiaceliaca.com.ar/blog/images/301x160-' .$post->photo)

@section('style')
    <link rel="stylesheet" href="{{ asset('style/css/shareButton.css') }}">
@endsection

@section('content')
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    @if(!Request()->cookie('login'))
                        @include('web.parts._registerIndex')
                    @endif
                    <br>
                    <div class="blog-list blog-detail">
                        <h1 class="title"><a href="#">{{ $post->title }}</a></h1>
                        <div class="social">
                            <span class="date">{{ $post->created_at->format('d') }}
                                <span>{{ $post->created_at->format('M') }}</span></span>
                            <a href="#"><i class="fa fa-heart-o"></i><span>{{ $post->like }}</span></a>
                            <a href="#"><i class="fa fa-eye"></i><span>{{ $post->view }}</span></a>
                        </div>
                        <div class="image">
                            <img src="{{ asset('blog/images/787x255-' .$post->photo) }}" alt="{{ $post->title }}"
                                 title="Guía Celíaca"
                                 class="img-responsive"/>
                        </div>
                        <p style="color: yellow;">¿Te gusto la noticia?<a href="{{ route('post.like', $post) }}"> <i
                                        class="fa fa-heart-o fa-2x" style="color: red;"></i></a></p>
                        <div style="margin-top: 5%">
                            {!! $post->body !!}
                        </div>
                    </div>

                    <!-- Sharingbutton Facebook -->
                    <a class="resp-sharing-button__link"
                       href="https://facebook.com/sharer/sharer.php?u=https://guiaceliaca.com.ar/blog/{{$post->slug}}"
                       target="_blank" rel="noopener" aria-label="Share on Facebook">
                        <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--large">
                            <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/>
                                </svg>
                            </div>
                            Compartir en Facebook
                        </div>
                    </a>

                </div>
                @include('web.parts.blog._asideBlog')
            </div>
        </div>
    </section>
@endsection

@section('scrip')
<script>
    $(document).ready(function() {
        var $title, $content;
        var $selector = $('.accordion').selector;
        var $title    = $($selector + ' .title');
        var $content  = $($selector + ' .text-container');
        var $close = function(){
            $title.removeClass('active');
            $content.slideUp(500).removeClass('open');
        }
        $($selector).find('.title').on('click', function(e) {
            var $idTarget = $(this).data('target');
            var currentAttrValue = $(this).attr('href');
            if($(e.target).is('.active')) {
                $($idTarget).css({'display':'block'});
                $close();
            }else {
                $($idTarget).css({'display':'none'});
                $close();
                $(this).addClass('active');
                $($idTarget).slideDown(400).addClass('open');
            }
            e.preventDefault();
        });
    });
</script>
@endsection