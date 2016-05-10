@extends('admin_template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            Phone log data. The format of the **.txt file must be of 4 columns in the following order:[date-time] [client-id] [duration] [user-id] [comments]
        </div>
    </div>
    <div class="row">
        {!! Form::open(['route' => 'calls.store', 'method' => 'POST'], array('class' => 'form-horizontal')) !!}
            <div class="form-group">
                {!! Form::label('details', 'Enter a maximun of 70 lines, otherwise they\'ll be cropped to that number os lines.', array('class' => 'col-sm-2 control-label fright')) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('details', null, [
                                'rows' => 15,
                                'class' => 'form-control',
                                'placeholder' => 'Copy & paste the data'
                            ])
                        !!}
                    </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::button('Enviar', ['class' => 'btn btn-primary tmargin10', 'type' => 'submit']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection