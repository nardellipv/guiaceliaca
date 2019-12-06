@extends('layouts.main')


@section('content')
    <section id="new-property" style="margin-top: 10%">
        <div class="container">
            <div class="row">
                @include('web.parts.adminClient.profile._asideProfile')
                <form method="post" action="{{ route('product.create') }}" enctype="multipart/form-data"
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
                                    <select class="dropdown" name="category_id" data-settings='{"cutOff": 5}' required>
                                        <option value="">-- Categorías --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                <textarea name="description" id="description" class="form-control description"
                                          placeholder="Descripción" required>{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="info-block" id="price">
                            <div class="section-title line-style">
                                <h3 class="title">Precio</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-4 space-form">
                                    <input class="form-control" type="number" name="price" id="price"
                                           placeholder="Precio" value="{{ old('price') }}" required/>
                                </div>
                                <div class="col-md-4 space-form">
                                    <input class="form-control" type="number" name="offer" id="offer"
                                           placeholder="Oferta" value="{{ old('offer') }}"/>
                                </div>
                            </div>
                        </div>

                        <div class="info-block" id="price">
                            <div class="section-title line-style">
                                <h3 class="title">Estado</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-4 space-form">
                                    <input class="labelauty" type="radio" data-labelauty="Producto Activo"
                                           name="available"
                                           value="YES" checked required>
                                </div>
                                <div class="col-md-4 space-form">
                                    <input class="labelauty" type="radio" data-labelauty="Producto Pausado"
                                           name="available"
                                           value="NO">
                                </div>
                            </div>
                        </div>

                        <div class="info-block" id="price">
                            <div class="section-title line-style">
                                <h3 class="title">Imágen</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-4 space-form">
                                    <input name="photo" type="file">
                                    <span class="text">Imagenes jpg, png. Menos de 1MB.</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 space-form">
                                <button type="submit" class="btn btn-default select-button" style="margin-top: 5%"><i
                                            class="icon fa fa-cart-arrow-down"></i> Crear Producto
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                @include('web.parts.adminClient.profile._asideRigthProduct')
            </div>
        </div>
    </section>
@endsection