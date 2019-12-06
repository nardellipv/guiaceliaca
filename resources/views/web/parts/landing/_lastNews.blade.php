<section id="recent-news">
    <div class="section-detail">
        <h1>Últimas Noticias</h1>
        @if(!$device)
            <h2 style="padding: 10px 110px 0px 110px;">Mantente actualizado con nuestro blog celíaco, en donde puedes
                encontrar e informarte sobre, síntomas,
                comidas, investigaciones, sintomas y mucho más.</h2>
        @endif
    </div>
    <div class="container" id="blog">
        <div class="row">
            @foreach($lastNews as $lastNew)
                <div class="col-md-4">
                    <div class="blog-list masonry-post">
                        <div class="image">
                            <img class="img-responsive" alt="Image Sample"
                                 src="{{ asset('blog/images/384x255-' .$lastNew->photo) }}">
                            <div class="social">
                                <span class="date">{{ $lastNew->created_at->format('d') }}
                                    <span>{{ $lastNew->created_at->format('M') }}</span></span>
                                <a href="#"><i class="fa fa-heart-o"></i><span>{{ $lastNew->like }}</span></a>
                                <a href="#"><i class="fa fa-eye"></i><span>{{ $lastNew->view }}</span></a>
                            </div>
                        </div>
                        <div class="text">
                            <h3 class="subtitle">{{ $lastNew->title }}</h3>
                            {!! Str::limit($lastNew->body, 150) !!}
                        </div>
                        <a href="{{ route('post.blog', $lastNew->slug) }}" class="btn btn-default button-read">Leer
                            más</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>