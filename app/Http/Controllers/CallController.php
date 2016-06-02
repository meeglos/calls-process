<?php

namespace Calls\Http\Controllers;

use Illuminate\Http\Request;
use Calls\Entities\Call;
use Calls\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Collection as Collection;
class CallsController extends Controller
{
    public function latest()
    {
        $calls = Call::select(DB::raw('MONTHNAME(call_date) as mes,
                                        count(*) as total,
                                        min(call_lapse) as min,
                                        max(call_lapse) as max,
                                        round(avg(call_lapse)) as med'))
                            ->groupBy(DB::raw('MONTHNAME(call_date)'))
                            ->orderBy('call_date', 'DESC')
                            ->paginate(20);

        $myAvg = Call::select(DB::raw('ROUND(AVG(call_lapse)) AS avg,
                                        MAX(call_lapse) AS max,
                                        MIN(call_lapse) as min,
                                        COUNT(*) as tot'))
                                ->first();

//        dd($myAvg);
        $myAvg1 = $this->avgCast($myAvg);
//        dd($myAvg1);

        return view('calls/list', compact('calls', 'myAvg1'));
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
        if($_POST) {
            $mylog = $_POST['details'];
            $input = preg_replace("/((\r?\n)|(\r\n?))/", '**', $mylog);
            $pieces = explode('**', $input);
            $fields = array('call_date', 'client_id', 'call_lapse', 'user_id', 'comment');

            foreach ($pieces as $part) {

                $a = $this->mycast(explode(' ', $part));
                $b = array(2, 1, 1, 1);
                $i = 0;
                unset($output);

                foreach ($b as $num_elem) {
                    $output[] = rtrim(array_reduce(array_slice($a, $i, $num_elem), array($this, "myconcat")));
                    $i += $num_elem;
                }

                $output[] = rtrim(array_reduce(array_slice($a, array_sum($b), count($a)), array($this, "myconcat")));

                $result[] = array_combine($fields, $output);

            }

            DB::table('calls')->insert($result);

            return Redirect::route('calls.latest');
        }
    }

    public function myconcat($carry, $item)
    {
        $carry .= $item . ' ';
        return $carry;
    }

    private function mycast($value)
    {
        $test1 = $value[3];
        $test2 = explode("'", $test1);
        $value[3] = $test2[0]*60 + $test2[1];

        return $value;
    }

    private function avgCast($value)
    {
        $max = $value->max;
        $min = $value->min;
        $avg = (int)$value->avg;
        $tot = $value->tot;

        $myValues = array($max, $min, $avg, $tot);
        $myKeys = array('max', 'min', 'avg', 'tot');

        $values = array_combine($myKeys, array_map(array($this, "myFormat"), $myValues));
        $myColl = Collection::make($values);

//        dd($myColl);
        return $values;
    }

    private function myFormat($val)
    {
        $myMin = floor($val / 60);
        $mySec = $val % 60;

        $value = ($myMin > 9 ? $myMin : '0' . $myMin) . "'" . ($mySec > 9 ? $mySec : '0' . $mySec);

        return $value;
    }
}
