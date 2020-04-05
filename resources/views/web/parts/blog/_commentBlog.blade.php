<div id="comments" style="margin-top: 5%">
    <h2 class="title-comment">Comentarios <span class="total-comment">{{ $countCommentBlog }}</span></h2>
    <div class="medialist">
        @foreach($commentsPost as $commentPost)
            <div class="media">
                <div class="media-left">
                    @if (!$commentPost->user->picture)
                        <img alt="guía celiaca"
                             src="{{ asset('images/img-logo-grande.png') }}">
                    @else
                        <img alt="guía celiaca"
                             src="{{ asset('users/images/' . $commentPost->user->id . '/perfil/512x512-'. $commentPost->user->picture) }}">
                    @endif
                </div>
                <div class="media-body">
                    <div class="comment-line">
                        <h4 class="media-heading">
                            {{ $commentPost->user->name }}
                            <span class="date-comment">{{ $commentPost->created_at->diffForHumans() }}</span>
                        </h4>
                        <b>{{ $commentPost->message }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <h3 class="title-form"><i class="icon fa fa-comment"></i> Comentar noticia</h3>
    @if(Auth::check())
        {{--hacer--}}
        {{--probar cuando este logueado--}}
        <form method="post" action="{{ route('comment.post', $post->id) }}"
              class="form-large grey-color" role="form"
              data-toggle="validator">
            @csrf
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label for="name">Nombre</label>
                    <input type="text" class="margin-bottom form-control" id="name" name="name"
                           placeholder="Nombre" required>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label for="email">Email</label>
                    <input type="email" class="margin-bottom form-control" id="email"
                           name="email" placeholder="Email" value="{{ Auth::user()->email }}"
                           readonly required>
                    <sup>Tu email no se mostrará</sup>
                </div>
                <div class="col-md-12">
                    <label for="text-message">Comentario</label>
                    <textarea class="margin-bottom form-control" rows="4" id="text-message"
                              name="text-message" placeholder="Comentario" required></textarea>
                </div>
            </div>
            <input type="submit" value="Dejar Comentario" class="btn btn-default">
        </form>

    @else
        <h6>Necesita estar logueado para poder dejar comentarios.</h6>
        <a href="{{ url('login') }}" type="button"
           class="btn btn-reverse btn-xs">Ingresar</a>
        <a href="{{ url('register') }}" type="button"
           class="btn btn-reverse btn-xs">Registrarse</a>
    @endif
</div>