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
                    <th>Email</th>
                    <th>Creado</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($newsLetters as $newsLetter)
                    <tr>
                        <td>{{ $newsLetter->email }}</td>
                        <td>{{ $newsLetter->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.deleteNewsLetter', $newsLetter) }}" class="btn btn-warning btn-icon btn-circle icon-lg fa fa-trash"></a>
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