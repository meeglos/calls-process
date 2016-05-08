<?php

namespace Calls\Http\Controllers;

use Illuminate\Http\Request;
use Calls\Entities\Call;
use Calls\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;

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

    public function store(Request $request)
    {
        $table = "calls";

        if($_POST) {
            $mylog = $_POST['details'];
            $input = preg_replace("/((\r?\n)|(\r\n?))/", '**', $mylog);
            $pieces = explode('**', $input);
            $fields = array('call_date', 'client_id', 'call_lapse', 'comment');

            foreach ($pieces as $part) {

                $a = explode(' ', $part);
                $b = array(2, 1, 1);
                $i = 0;
                unset($output);

                foreach ($b as $num_elem) {
                    $output[] = rtrim(array_reduce(array_slice($a, $i, $num_elem), array($this, "myconcat")));
                    $i += $num_elem;
                }

                $output[] = rtrim(array_reduce(array_slice($a, array_sum($b), count($a)), array($this, "myconcat")));

                $result[] = array_combine($fields, $output);
            }

            $sqlSt = "INSERT INTO `" . $table . "`(" . implode(",", $fields) . ") VALUES ";

            foreach ($result as $row) {
                $sqlSt .= "('" . $row['call_date'] . "', ";
                $sqlSt .= $row['client_id'] . ", ";
                $sqlSt .= $row['call_lapse'] . ", ";
                $sqlSt .= $row['comment'] . ", '1'),";
            }
            $sqlSt = rtrim($sqlSt,-1);
            dd($sqlSt);

            Call::create($sqlSt);

            return Redirect::route('calls.latest');
        }
    }
    public function myconcat($carry, $item)
    {
        $carry .= $item . ' ';
        return $carry;
    }
}
