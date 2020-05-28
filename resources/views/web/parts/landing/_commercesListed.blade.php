<section id="grid-content">
    <div class="container">
        <div class="list-box-title">
            <span><i class="icon fa fa-plus-square"></i>Comercios</span>
        </div>
        <div class="row">
            <div class="col-sm-8 col-md-9">
                <div class="row">
                    @foreach($commercesListed as $commerceList)
                        <div class="col-sm-6 col-md-4">
                            <div class="box-ads box-grid">
                                <a class="hover-effect image image-fill"
                                   href="{{ route('name.commerce', $commerceList->slug) }}">
                                    <span class="cover"></span>
                                    @if (!$commerceList->logo)
                                        <img alt="guía celiaca"
                                             src="{{ asset('images/img-logo-grande.png') }}" class="img-responsive">
                                    @else
                                        <img alt="{{ $commerceList->name }}"
                                             src="{{ asset('users/images/' . $commerceList->user->id . '/comercio/358x250-'. $commerceList->logo) }}">
                                    @endif
                                    <h3 class="title">{{ $commerceList->name }}</h3>
                                </a>
                                <span class="price"></span>
                                <span class="address"><i
                                            class="fa fa-map-marker"></i> {{--{{ $commerceList->region->name }}--}}
                                    {{ Str::limit($commerceList->province->name,20) }}</span>
                                <span class="description">{{ Str::limit($commerceList->about, 40)  }}</span>
                                <dl class="detail">
                                    <dt class="status">Visitas:</dt>
                                    <dd>{{ $commerceList->visit }}</dd>
                                    <dt class="area">Votos:</dt>
                                    <dd>
                                        @if($commerceList->votes_positive > 0)
                                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                                 aria-valuenow="60"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="width:{{($commerceList->votes_positive * 100)/ ($commerceList->votes_positive + $commerceList->votes_negative)}}%;height: 80%;">
                                                {{round(($commerceList->votes_positive * 100)/ ($commerceList->votes_positive + $commerceList->votes_negative)),0}}
                                                %
                                            </div>
                                        @else
                                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                                 aria-valuenow="60"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="width:0%;height: 80%;">0%
                                            </div>
                                        @endif
                                    </dd>
                                </dl>
                                <div class="footer">
                                    <a class="btn btn-reverse" href="{{ route('name.commerce', $commerceList->slug) }}"><i
                                                class="fa fa-search"></i> Ir al negocio</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @include('web.parts.searching._asideSearching')
        </div>
    </div>

    <div class="container" id="pagination">
        <div class="row">
            <div class="col-md-9">
                <ul class="pagination">
                    {{ $commercesListed->render() }}
                </ul>
            </div>
        </div>
    </div>

</section>

{{--snipper--}}
@include('external.snipperHome')

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


