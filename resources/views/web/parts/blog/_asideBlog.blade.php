<div class="col-md-3" style="margin-top: -40px;">
    <div class="section-title line-style">
        <h3 class="title">Más Leídos</h3>
    </div>

    @foreach($mostRead as $read)
        <div class="recent-post">
            <a class="image image-fill" href="#">
                <img alt="Image Sample" src="{{ asset('blog/images/301x160-' .$read->photo) }}">
            </a>
            <div class="body">
                <span class="title">{{ $read->title }}</span>
                <span class="date"><i class="fa fa-calendar"></i> {{ $read->created_at->format('d-M-Y') }} <i
                            class="fa fa-eye"></i> {{ $read->view }} Vistas</span>
                <div class="text">
                    <p>{!! Str::limit($read->body, 100) !!}</p>
                </div>
                <a href="{{ url('blog', $read->slug) }}" type="button" class="button-read button-read btn btn-default">Leer
                    más</a>
            </div>
        </div>
    @endforeach

    {{--<div class="section-title line-style">
        <h3 class="title">Publicidad</h3>
    </div>--}}

</div>