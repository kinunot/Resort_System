<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['user_id', 'cottage_id', 'room_id', 'check_in', 'check_out', 'status'];
//
}
