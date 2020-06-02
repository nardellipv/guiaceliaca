@extends('layouts.main')

@section('content')
    <section id="new-property" style="margin-top: 10%">
        <div class="container">
            <div class="row">
                @include('web.parts.adminClient.profile._asideProfile')
                <form method="post" action="{{ route('store.promotion') }}" enctype="multipart/form-data"
                      class="grey-color">
                    @csrf
                    <div class="col-sm-7 col-md-7">
                        <div class="info-block" id="basic">
                            <div class="section-title line-style no-margin">
                                <h3 class="title">Información Básica</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-5 space-form">
                                    <input id="title" class="form-control" type="text" placeholder="Nombre" name="name"
                                           value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-7 space-form">
                                    <input id="title" class="form-control" type="text" placeholder="descripción"
                                           name="text"
                                           value="{{ old('text') }}" required>
                                </div>
                            </div>
                        </div>


                        <div class="info-block" id="price">
                            <div class="section-title line-style">
                                <h3 class="title">Descuento <small>Opcional</small></h3>
                            </div>
                            <div class="row">
                                <div class="col-md-4 space-form">
                                    <input class="form-control" type="number" name="percentage" id="price"
                                           placeholder="Porcentaje Descuento" value="{{ old('percentage') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="info-block" id="price">
                            <div class="section-title line-style">
                                <h3 class="title">Fecha Fin</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-4 space-form">
                                    <input class="form-control" type="date" name="end_date" id="date"
                                           placeholder="Fecha Fin" value="{{ old('end_date') }}" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 space-form">
                                <button type="submit" class="btn btn-default select-button" style="margin-top: 5%"><i
                                            class="icon fa fa-ticket"></i> Crear Promoción
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                @include('web.parts.adminClient.promotion._asideRigthPromotion')
            </div>
        </div>
    </section>
@endsection
