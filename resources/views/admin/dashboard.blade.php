@extends('layouts.admin')

@section('content')
    @include('admin.parts._widget')
    @include('admin.parts._sendNotify')
    @include('admin.parts._sendJobsMail')
    @include('admin.parts._exports')
    @include('admin.parts._users')
@endsection