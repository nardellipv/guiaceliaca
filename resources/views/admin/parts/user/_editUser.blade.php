@extends('layouts.admin')

@section('content')
    <section id="page-content">
        <div class="row">
            <div class="col-lg-9 col-lg-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Agregar nuevo usuario</h3>
                    </div>
                    <form method="post" action="{{ route('admin.userStore') }}" class="panel-body form-horizontal" enctype="multipart/form-data">
                        @csrf
                       {{-- <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Nombre"
                                       name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Apellido"
                                       name="lastname">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Email"
                                       name="email">
                            </div>
                        </div>
                        <div class="form-group pad-ver-5">
                            <label class="col-md-3 control-label">Tipo de usuario</label>
                            <div class="col-md-9">
                                <div class="radio">
                                    <label class="form-radio form-icon btn btn-default form-text">
                                        <input type="radio" name="type" value="CLIENT" checked> Client
                                    </label>
                                    <label class="form-radio form-icon btn btn-default form-text">
                                        <input type="radio" name="type" value="OWNER"> Owner
                                    </label>
                                    <label class="form-radio form-icon btn btn-default form-text">
                                        <input type="radio" name="type" value="ADMIN"> Admin
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Password"
                                       name="password">
                            </div>
                        </div>--}}
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos Comercio</h3>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Nombre"
                                       name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Dirección"
                                       name="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Teléfono"
                                       name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                    <textarea id="demo-textarea-input" name="about" class="form-control"
                                              placeholder="Sobre Nosotros"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Positivos"
                                       name="votes_positive">
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="demo-text-input" class="form-control"
                                       placeholder="Votos Negativos"
                                       name="votes_negative">
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Visitas"
                                       name="visit">
                            </div>
                        </div>
                       {{-- <div class="form-group">
                            <label class="control-label col-md-4">Relación Usuario </label>
                            <div class="col-md-6">
                                <select name="user_id">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->id }} -- {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>--}}
                       {{-- <div class="form-group">
                            <label class="control-label col-md-4">Provincia </label>
                            <div class="col-md-6">
                                <select name="province_id">
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->id }} -- {{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>--}}
                        <div class="fallback">
                            <input name="photo" type="file" />
                        </div>
                        <button type="submit" class="btn btn-block btn-warning">
                            Agregar usuario
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection