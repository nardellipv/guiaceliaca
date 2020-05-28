@section('style')
    <link href="{{ asset('styleAdmin/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('styleAdmin/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}"
          rel="stylesheet">
@endsection
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Usuarios Registrados</h3>
    </div>
    <div class="panel-body">
        <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nombre y Apellido</th>
                <th>Email</th>
                <th class="min-tablet">Tipo</th>
                <th class="min-tablet">Estado</th>
                <th class="min-tablet">Fecha</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }} {{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>
                    <td>{{ $user->status }}</td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('admin.userEdit', $user) }}" class="btn btn-default btn-icon btn-circle icon-lg fa fa-user"></a>
                        @if($user->status == 'DESACTIVE')
                            <button class="btn btn-mint btn-icon btn-circle icon-lg fa fa-thumbs-up"></button>
                        @else
                            <button class="btn btn-danger btn-icon btn-circle icon-lg fa fa-times"></button>
                        @endif
                        <button class="btn btn-pink btn-icon btn-circle icon-lg fa fa-envelope"></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@section('script')
    <script src="{{ asset('styleAdmin/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('styleAdmin/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('styleAdmin/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('styleAdmin/js/demo/tables-datatables.js') }}"></script>
@endsection