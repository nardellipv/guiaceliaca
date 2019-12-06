@extends('layouts.main')

@section('content')
    <section id="user-profile" style="margin-top: 10%">
        <div class="container">
            <div class="row">
                @include('web.parts.adminClient.profile._asideProfile')
                <div class="col-sm-9 col-md-9">
                    <div class="section-title line-style no-margin">
                        <h3 class="title">Mensaje de {{ $message->name }}</h3>
                    </div>
                    <p>{{ $message->messageText }}</p>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-9 col-md-9">
                                <div class="info-block" id="basic">
                                    <div class="section-title line-style no-margin">
                                        <h3 class="title">Responder mensaje</h3>
                                    </div>
                                    <form method="post" action="{{ route('respondToClient') }}"
                                          enctype="multipart/form-data"
                                          class="grey-color">
                                        @csrf
                                        <textarea name="description" id="description"
                                                  class="form-control description"
                                                  placeholder="Mensaje"
                                                  required>{{ old('description') }}</textarea>
                                        <div class="row">
                                            <div class="col-md-4 space-form">
                                                <button type="submit" class="btn btn-default select-button"
                                                        style="margin-top: 5%"><i
                                                            class="icon fa fa-send"></i> Enviar Mensaje
                                                </button>
                                                <a href="{{ route('message.list') }}" class="btn btn-reverse select-button"
                                                        style="margin-top: 5%"><i
                                                            class="icon fa fa-level-up"></i> Volver
                                                </a>
                                            </div>
                                        </div>
                                        <input name="clientMail" value="{{ $message->email }}" hidden readonly>
                                        <input name="name" value="{{ $message->name }}" hidden readonly>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection