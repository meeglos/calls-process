<?php

namespace Calls\Entities;

use Illuminate\Foundation\Auth\Call as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = [
        'call_date', 'client_id', 'call_lapse', 'comment', 'user_id'
    ];
}
