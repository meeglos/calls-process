<?php

namespace Calls\Http\Controllers;

use Illuminate\Http\Request;

use Calls\Http\Requests;

class CallsController extends Controller
{
    public function latest()
    {
        dd('latest');
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
        return view('insert');
    }
}
