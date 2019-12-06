@extends('layouts.main')


@section('content')
    <section id="user-profile" style="margin-top: 10%">
        <div class="container">
            <div class="row">
                @include('web.parts.adminClient.profile._asideProfile')
                <div class="col-sm-9 col-md-9">
                    <div class="section-title line-style no-margin">
                        <h3 class="title">Listado de Mensajes</h3>
                    </div>
                    <div class="table-responsive property-list">
                        <table class="table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="hidden-xs">Nombre</th>
                                <th class="hidden-xs">Mensaje</th>
                                <th class="hidden-xs">Fecha</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ Str::limit($comment->name,30) }}</td>
                                    <td class="hidden-xs">{{ $comment->message }}</td>
                                    <td class="hidden-xs">{{ $comment->created_at->format('d/m/Y') }}</td>
                                    @if($comment->status == 'ACTIVE')
                                        <td><span class="label label-success">Activo</span></td>
                                        <td><a href="{{ route('comment.report', $comment) }}"><span
                                                        class="label label-info">Denunciar</span></a></td>
                                    @else
                                        <td><span class="label label-danger">Desactivo</span></td>
                                    @endif
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                    <div class="pagination-content">
                        <ul class="pagination">
                            {{ $comments->render() }}
                        </ul><!-- /.pagination -->
                    </div><!-- /.pagination-content -->
                </div>
            </div>
        </div>
    </section>
@endsection