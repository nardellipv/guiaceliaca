@extends('layouts.main')

@section('content')
    @include('web.parts.landing._recentListed')
    @include('web.parts.landing._featured')
    @include('web.parts._services')
    @include('web.parts.landing._lastNews')
@endsection