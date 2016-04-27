@extends('admin_template')

@section('content')

    <h3>Hay un total de
        <span class="label label-info">{{ $calls->total() }}</span>
        llamadas registradas.
    </h3>
    <hr>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Id cliente</th>
                <th>Duración</th>
                <th>Comentario</th>
            </tr>
        </thead>
        <tbody>
        @foreach($calls as $call)

            <tr>
                <td>{{ $call->call_date }}</td>
                <td>{{ $call->client_id }}</td>
                <td>{{ $call->call_lapse }}</td>
                <td>{{ $call->comment }}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
    {!!  $calls->render() !!}
@endsection