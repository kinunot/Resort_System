<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = ['reservation_od', 'service_type', 'notes', 'status'];
//
}
