@extends('admin_template')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $calls->total() }}</h3>

                    <p>Total calls</p>
                </div>
                <div class="icon">
                    <i class="fa fa-phone"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $myAvg }}<sup style="font-size: 20px">secs</sup></h3>

                    <p>Average time</p>
                </div>
                <div class="icon">
                    <i class="fa fa-clock-o"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $calls->max('call_lapse') }}<sup style="font-size: 20px">secs</sup></h3>

                    <p>Longest call</p>
                </div>
                <div class="icon">
                    <i class="fa fa-hourglass"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $calls->min('call_lapse') }}<inf style="font-size: 20px">secs</inf></h3>

                    <p>Shortest call</p>
                </div>
                <div class="icon">
                    <i class="fa fa-hourglass-o"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div><!-- /.row small box widget-->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="my-rangedate">Date range:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-left active" id="my-rangedate" placeholder="Seleccione fechas">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="topmargin-10">Hay un total de
                    <span class="label label-info">{{ $calls->total() }}</span>
                    llamadas registradas.
                    </h3>
                    <h4>Llamadas registradas desde el <b>23/10/2015</b>.</h4>
                </div>
            </div>
        </div>
    </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Resultados</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="borderbottom-orng">Fecha</th>
                            <th class="borderbottom-orng">Id cliente</th>
                            <th class="borderbottom-orng">Duracion</th>
                            <th class="borderbottom-orng">Comentario</th>
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
            </div>
        </div>
    {!!  $calls->render() !!}

@endsection