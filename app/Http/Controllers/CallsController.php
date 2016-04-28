<?php

namespace Calls\Http\Controllers;

use Illuminate\Http\Request;
use Calls\Entities\Call;
use Calls\Http\Requests;
use DB;

class CallsController extends Controller
{
    public function latest()
    {
        $calls = Call::orderBy('call_date', 'DESC')->paginate(10);

        return view('calls/list', compact('calls'));
    }

    public function shortest()
    {
        dd('llamadas de menor duracion');
    }

    public function longest()
    {
        dd('llamadas de mayor duracion');
    }

    public function details($id)
    {
        dd('Call details: ' . $id);
    }
    public function insert()
    {
        return view('calls.insert');
    }
}
