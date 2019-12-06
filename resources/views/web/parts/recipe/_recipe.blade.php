@extends('layouts.main')

@section('title', 'Receta ' . $recipe->name)

@section('meta-description', '✍ Receta' . $recipe->name)

@section('content')
    <section id="blog">
        <div class="container">
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
                            <img src="{{ asset('users/images/'. $recipe->user_id . '/receta/718x415-' . $recipe->photos ) }}" alt="{{ $recipe->name }}"
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
                    </div>

                </div>
                @include('web.parts.recipe._asideRecipe')
            </div>
        </div>

    </section>
@endsection