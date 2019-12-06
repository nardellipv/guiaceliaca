@extends('layouts.main')

@section('title', '📑 Recetas creadas por otros celíacos')

@section('meta-description','👉 Recetas para celíacos faciles de preparar y creadas totalmente por la comunidad 👍')


@section('content')
    <section id="grid-content" style="margin-top: 10%;">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <div class="row">
                        @foreach($recipes as $recipe)
                            <div class="col-sm-6 col-md-4">
                                <div class="box-ads box-grid">
                                    <a href="{{ route('recipes', $recipe->slug) }}" class="hover-effect image image-fill">
                                        <span class="cover"></span>
                                        @if (!$recipe->photos)
                                            <img alt="guía celiaca"
                                                 src="{{ asset('images/img-logo-grande.png') }}" class="img-responsive">
                                        @else
                                            <img alt="{{ $recipe->name }}"
                                                 src="{{ asset('users/images/'. $recipe->user_id . '/receta/260x180-' . $recipe->photos ) }}">
                                        @endif
                                        <h3 class="title">{{ $recipe->name }}</h3>
                                    </a>
                                    <span class="price"></span>
                                    <span class="address">{{ $recipe->category->name }}
                                        <span class="description">{!! Str::limit($recipe->steps, 100) !!}</span>
                                    <dl class="detail">
                                        {!! Str::limit($recipe->ingredients,100) !!}
                                    </dl>
                                    <div class="footer">
                                        <a href="{{ route('recipes', $recipe->slug) }}" class="btn btn-default">Leer Receta</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @include('web.parts.recipe._asideRecipe')
            </div>
        </div>

        <div class="container" id="pagination">
            <div class="row">
                <div class="col-md-9">
                    {!! $recipes->render() !!}
                </div>
            </div>
        </div>

    </section>
@endsection