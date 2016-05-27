<?php

namespace Calls\Http\Controllers;

use Illuminate\Http\Request;
use Calls\Entities\User;
use Calls\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'DESC')->paginate(20);

        return view('users.index', compact('users'));
    }
}
