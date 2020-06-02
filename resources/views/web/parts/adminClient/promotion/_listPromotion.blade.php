@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('style/css/vendor/labelauty/labelauty.css')}}">
    <link rel="stylesheet" href="{{ asset('style/css/vendor/magnific-popup/magnific-popup.css') }}">
@endsection

@section('content')
    <section id="user-profile" style="margin-top: 10%">
        <div class="container">
            <div class="row">
                @include('web.parts.adminClient.profile._asideProfile')
                <div class="col-sm-7 col-md-7">
                    <div class="section-title line-style no-margin">
                        <h3 class="title">Listado de promotionos activos</h3>
                    </div>
                    <div class="table-responsive property-list">
                        <table class="table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Imágen</th>
                                <th class="hidden-xs">Nombre</th>
                                <th class="hidden-xs">Descripción</th>
                                <th class="hidden-xs">Porcentaje</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($promotions as $promotion)
                                <tr>
                                    <td>
                                        <a href="{{ asset('users/images/' . Auth::user()->id . '/voucher/' . $promotion->percentage .'-'. $promotion->end_date .'.jpg') }}">
                                        <span class="image image-fill">
                                            <img alt="Image Sample"
                                                 src="{{ asset('users/images/' . Auth::user()->id . '/voucher/' . $promotion->percentage .'-'. $promotion->end_date .'.jpg') }}">
                                            </span>
                                        </a>
                                    </td>
                                    <td>{{ Str::limit($promotion->name,30) }}</td>
                                    <td class="hidden-xs">{{ $promotion->text }}</td>
                                    <td class="hidden-xs">{{ $promotion->percentage }}%</td>
                                    <td><a href="{{ route('delete.promotion', $promotion) }}"><i
                                                    class="icon fa fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                    <div class="pagination-content">
                        <ul class="pagination">
                            {{ $promotions->render() }}
                        </ul><!-- /.pagination -->
                    </div><!-- /.pagination-content -->
                </div>
                @include('web.parts.adminClient.promotion._asideRigthPromotion')
            </div>
        </div>
    </section>
@endsection

@section('scrip')
    <script>
        var groups = {};
        $('.galleryItem').each(function () {
            var id = parseInt($(this).attr('data-group'), 10);
            if (!groups[id]) {
                groups[id] = [];
            }
            groups[id].push(this);
        });
        $.each(groups, function () {
            $(this).magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                removalDelay: 300,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true
                }
            })
        });
    </script>
@endsection