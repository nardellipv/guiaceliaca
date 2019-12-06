@extends('layouts.main')

@section('content')
    <section id="new-property" style="margin-top: 10%">
        <div class="container">
            <div class="row">
                @include('web.parts.adminClient.profile._asideProfile')
                <form method="post" action="{{ route('create.recipes') }}" enctype="multipart/form-data"
                      class="grey-color">
                    @csrf
                    <div class="col-sm-9 col-md-9">
                        <div class="info-block" id="basic">
                            <div class="section-title line-style no-margin">
                                <h3 class="title">Crear Receta</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-5 space-form">
                                    <input id="name" class="form-control" type="text" placeholder="Nombre" name="name">
                                </div>
                                <div class="col-md-7 space-form">
                                    <select class="dropdown" name="category_id" data-settings='{"cutOff": 5}'>
                                        <option value="">-- Categoría --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <label>Ingredientes</label>
                            <textarea name="ingredients" id="body" rows="4"
                                      cols="4">{{ old('ingredients') }}</textarea>
                            <br>
                            <label>Pasos</label>
                            <textarea name="steps" id="steps" rows="4" cols="4">{{ old('steps') }}</textarea>
                        </div>
                        <div class="info-block" id="images">
                            <br>
                            <label>Imagen de la receta
                                <small>Opcional</small>
                            </label>
                            <input id="input-upload-img1" name="photo" type="file" class="file"
                                   data-preview-file-type="text">
                            <small id="" class="form-text text-muted">
                                La imagen no debe superar los 2MB. Formatos admitidos jpg, png
                            </small>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-warning">Enviar Receta</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('scrip')
    <script src="https://cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>

    <script>

        CKEDITOR.replace('body', {
            toolbar: [
                {name: 'basicstyles', items: ['Bold', 'Italic']},
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                    items: ['NumberedList', 'BulletedList']
                },
            ]
        });
        CKEDITOR.replace('steps', {
            toolbar: [
                {name: 'basicstyles', items: ['Bold', 'Italic']},
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                    items: ['NumberedList', 'BulletedList']
                },
            ]
        });

    </script>
@endsection