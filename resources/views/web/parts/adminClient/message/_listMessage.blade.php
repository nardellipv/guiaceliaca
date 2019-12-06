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
                            @foreach($messages as $message)
                                <tr>
                                    <td><a href="{{ route('message.read', $message) }}">{{ Str::limit($message->name,30) }}</a> </td>
                                    <td class="hidden-xs">{{ Str::limit($message->messageText, 50) }}</td>
                                    <td class="hidden-xs">{{ $message->created_at->format('d/m/Y') }}</td>
                                    @if($message->read == 'YES')
                                        <td><span class="label label-success">Leído</span></td>
                                    @else
                                        <td><span class="label label-danger">No Leído</span></td>
                                    @endif
                                    <td><a href="{{ route('message.delete', $message) }}"><i class="icon fa fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-content">
                        <ul class="pagination">
                           {{ $messages->render() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection