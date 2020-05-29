@extends('layouts.main')

@section('title', '📑 Recetas creadas por otros celíacos')

@section('meta-description','👉 Recetas para celíacos faciles de preparar y creadas totalmente por la comunidad 👍')


@section('content')
    <section id="grid-content" style="margin-top: 10%;">
        <div class="container">
            @if(!Request()->cookie('login'))
                @include('web.parts._registerIndex')
            @endif
            <br>
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

@section('scrip')
    <script>
        $(document).ready(function () {
            var $title, $content;
            var $selector = $('.accordion').selector;
            var $title = $($selector + ' .title');
            var $content = $($selector + ' .text-container');
            var $close = function () {
                $title.removeClass('active');
                $content.slideUp(500).removeClass('open');
            }
            $($selector).find('.title').on('click', function (e) {
                var $idTarget = $(this).data('target');
                var currentAttrValue = $(this).attr('href');
                if ($(e.target).is('.active')) {
                    $($idTarget).css({'display': 'block'});
                    $close();
                } else {
                    $($idTarget).css({'display': 'none'});
                    $close();
                    $(this).addClass('active');
                    $($idTarget).slideDown(400).addClass('open');
                }
                e.preventDefault();
            });
        });
    </script>
@endsection