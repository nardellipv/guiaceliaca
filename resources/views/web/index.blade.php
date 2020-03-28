@extends('layouts.main')

@section('content')
    @if(count($commercesPro) > 0)
        @include('web.parts._paidHome')
    @endif
    @include('web.parts.landing._recentListed')
    @include('web.parts.landing._featured')
    @include('web.parts.landing._commercesListed')
    @include('web.parts._services')
    @include('web.parts._submit')
    @include('web.parts.landing._lastNews')
    @include('web.parts._recommend')
@endsection