<?php

namespace Calls\Entities;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Call as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = [
        'call_date',
        'client_id',
        'call_lapse',
        'comment',
        'user_id'
    ];

    protected $dates = ['call_date'];

    public function present()
    {
        return new CallPresenter($this);
    }
    public function getCallLapseAttribute($value)
    {
        $value = round($value);
        $myMin = floor($value / 60);
        $mySec = $value % 60;

        return ($myMin > 9 ? $myMin : '0' . $myMin) . "'" . ($mySec > 9 ? $mySec : '0' . $mySec);
    }
    public function getCallDateAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y H:i');
    }
}
