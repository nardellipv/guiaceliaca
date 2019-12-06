@extends('layouts.admin')

{{--@section('style')
    <link href="{{ asset('styleAdmin/plugins/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection--}}

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Agregar Post</h3>
        </div>
        <form method="post" action="{{ route('admin.storeBlog') }}" enctype="multipart/form-data">
            @csrf
        <div class="panel-body">
            <div class="form-group">
                <label for="demo-vs-definput" class="control-label">Título</label>
                <input type="text" name="title" class="form-control">
            </div>
            <textarea id="summernote" name="editordata"></textarea>
                <div class="fallback">
                    <input name="photo" type="file" />
                </div>
            <br>
            <button type="submit" class="btn btn-block btn-info">
                Enviar Post
            </button>
        </div>
        </form>
    </div>
@endsection

@section('script')
    {{--<script src="{{ asset('styleAdmin/plugins/dropzone/dropzone.min.js') }}"></script>--}}
    <script src="{{ asset('styleAdmin/plugins/ion-rangeslider/ion.rangeSlider.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                tabsize: 2,
                height: 200
            });
        });
    </script>
@endsection