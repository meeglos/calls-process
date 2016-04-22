<?php

namespace Calls\Http\Controllers;

use Illuminate\Http\Request;

use Calls\Http\Requests;

class TestController extends Controller
{
    public function index() {
        $data['tasks'] = [
            [
                'name'    =>  'Design New Dashboard',
                'progress' => '87',
                'color' => 'danger'
            ],
            [
                'name' => 'Create Home Page',
                'progress' => '76',
                'color' => 'warning'
            ],
            [
                'name' => 'Some Other Task',
                'progress' => '32',
                'color' => 'success'
            ],
            [
                'name' => 'Start Building Website',
                'progress' => '56',
                'color' => 'info'
            ],
            [
                'name' => 'Develop an Awesome Algorithm',
                'progress' => '10',
                'color' => 'success'
            ]
        ];
        $data['issues'] = [
            [
                'issue'    =>  'Design New Dashboard',
                'year' => '87',
                'status' => 'danger'
            ]
        ];

        return view('test')->with($data);

    }
}
