@extends('layouts.admin')

@section('style')
    <link href="{{ asset('styleAdmin/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('styleAdmin/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}"
          rel="stylesheet">
@endsection

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Usuarios Registrados</h3>
        </div>
        <div class="panel-body">
            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Body</th>
                    <th class="min-tablet">Estado</th>
                    <th class="min-tablet">Vistas</th>
                    <th class="min-tablet">Likes</th>
                    <th class="min-tablet">Enviado</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->body, 50) }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->view }}</td>
                        <td>{{ $post->like }}</td>
                        <td>{{ $post->send }}</td>
                        <td>
                            @if($post->status == 'DESACTIVE')
                                <a href="{{ route('admin.activeBlog', $post) }}" class="btn btn-primary btn-icon btn-circle icon-lg fa fa-thumbs-up"></a>
                            @else
                                <a href="{{ route('admin.desactiveBlog', $post) }}" class="btn btn-danger btn-icon btn-circle icon-lg fa fa-times"></a>
                            @endif
                            <a href="{{ route('admin.viewBlog', $post->id) }}" class="btn btn-warning btn-icon btn-circle icon-lg fa fa-edit"></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('styleAdmin/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('styleAdmin/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('styleAdmin/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('styleAdmin/js/demo/tables-datatables.js') }}"></script>
@endsection