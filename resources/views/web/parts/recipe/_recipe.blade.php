@extends('layouts.main')

@section('title', 'Receta ' . $recipe->name)

@section('meta-description', '✍ Receta' . $recipe->name)

@section('og:url', 'https://guiaceliaca.com.ar/recetas/' . $recipe->slug)
@section('og:title', $recipe->name)
@section('og:description', 'Consulta muchas más recetas en Guía Celíaca')
@section('og:image', 'https://guiaceliaca.com.ar/users/images/3/receta/718x415-' .$recipe->photos)

@section('style')
    <link rel="stylesheet" href="{{ asset('style/css/shareButton.css') }}">
@endsection

@section('content')
    <section id="blog">
        <div class="container">
            @if(!Request()->cookie('login'))
                @include('web.parts._registerIndex')
            @endif
            <br>
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <div class="blog-list blog-detail">
                        <h1 class="title"><a href="#">{{ $recipe->name }}</a></h1>
                        <div class="social">
                            <span class="date">{{ $recipe->created_at->format('d') }}
                                <span>{{ $recipe->created_at->format('M') }}</span></span>
                            <a href="#"><i class="fa fa-heart-o"></i><span>{{ $recipe->likes }}</span></a>
                        </div>
                        <div class="image">
                            <img src="{{ asset('users/images/'. $recipe->user_id . '/receta/718x415-' . $recipe->photos ) }}"
                                 alt="{{ $recipe->name }}"
                                 title="Guía Celíaca Recetas" class="img-responsive"/>
                        </div>
                        <p style="color: yellow;">¿Te gusto la receta?<a href="{{ route('recipe.like', $recipe) }}"> <i
                                        class="fa fa-heart-o fa-2x" style="color: red;"></i></a></p>

                        <h3 class="subtitle" style="margin-top: 5%">Ingredientes</h3>
                        <div>
                            {!! $recipe->ingredients !!}
                        </div>
                        <br><br>
                        <h3 class="subtitle">Pasos</h3>
                        <div>
                            {!! $recipe->steps !!}
                        </div>

                        <!-- Sharingbutton Facebook -->
                        <a class="resp-sharing-button__link"
                           href="https://facebook.com/sharer/sharer.php?u=https://guiaceliaca.com.ar/recetas/{{$recipe->slug}}"
                           target="_blank" rel="noopener" aria-label="Share on Facebook">
                            <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--large">
                                <div aria-hidden="true"
                                     class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/>
                                    </svg>
                                </div>
                                Compartir en Facebook
                            </div>
                        </a>

                        <!-- Sharingbutton Twitter -->
                        <a class="resp-sharing-button__link"
                           href="https://twitter.com/intent/tweet/?text=Consulta muchas mas recetas en guiaceliaca.com.ar&amp;url=https://guiaceliaca.com.ar/recetas/{{$recipe->slug}}"
                           target="_blank" rel="noopener" aria-label="Share on Twitter">
                            <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--large">
                                <div aria-hidden="true"
                                     class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/>
                                    </svg>
                                </div>
                                Compartir en Twitter
                            </div>
                        </a>

                        <!-- Sharingbutton Pinterest -->
                        <a class="resp-sharing-button__link"
                           href="https://pinterest.com/pin/create/button/?url=https://guiaceliaca.com.ar/recetas/{{$recipe->slug}}&amp;media=https://guiaceliaca.com.ar/recetas/{{$recipe->slug}}&amp;description=Consulta muchas mas recetas en guiaceliaca.com.ar"
                           target="_blank" rel="noopener" aria-label="Share on Pinterest">
                            <div class="resp-sharing-button resp-sharing-button--pinterest resp-sharing-button--large">
                                <div aria-hidden="true"
                                     class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M12.14.5C5.86.5 2.7 5 2.7 8.75c0 2.27.86 4.3 2.7 5.05.3.12.57 0 .66-.33l.27-1.06c.1-.32.06-.44-.2-.73-.52-.62-.86-1.44-.86-2.6 0-3.33 2.5-6.32 6.5-6.32 3.55 0 5.5 2.17 5.5 5.07 0 3.8-1.7 7.02-4.2 7.02-1.37 0-2.4-1.14-2.07-2.54.4-1.68 1.16-3.48 1.16-4.7 0-1.07-.58-1.98-1.78-1.98-1.4 0-2.55 1.47-2.55 3.42 0 1.25.43 2.1.43 2.1l-1.7 7.2c-.5 2.13-.08 4.75-.04 5 .02.17.22.2.3.1.14-.18 1.82-2.26 2.4-4.33.16-.58.93-3.63.93-3.63.45.88 1.8 1.65 3.22 1.65 4.25 0 7.13-3.87 7.13-9.05C20.5 4.15 17.18.5 12.14.5z"/>
                                    </svg>
                                </div>
                                Compartir en Pinterest
                            </div>
                        </a>


                    </div>

                </div>
                @include('web.parts.recipe._asideRecipe')
            </div>
        </div>

    </section>
@endsection