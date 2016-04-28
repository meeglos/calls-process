@extends('admin_template')

@section('content')
    <div id="form" class="result">
        <form class="form-horizontal" id="phone-log" name="phone-log" method="post">
            <div class="form-group">
                <label for="inputTextarea1" class="col-sm-2 control-label">Phone log data.<br>Enter a maximun of 50 lines, otherwise they'll be cropped to that line.</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="inputTextarea1" name="inputTextarea1" rows="15"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection