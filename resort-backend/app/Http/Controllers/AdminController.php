<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function transactions()
    {
        $transactions = Reservation::with(['user', 'cottage', 'room', 'payment'])->get();
        return response()->json($transactions);
    }
}

