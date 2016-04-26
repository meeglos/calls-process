@extends('admin_template')

@section('content')

    <table class="table table-striped">

        @foreach($calls as $call)

            <tr>
                <td>{{ $call->call_date }}</td>
                <td>{{ $call->client_id }}</td>
                <td>{{ $call->call_lapse }}</td>
                <td>{{ $call->comment }}</td>
            </tr>

        @endforeach

    </table>

@endsection