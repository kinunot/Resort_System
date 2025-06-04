<?php

namespace App\Http\Controllers;

use App\Models\Cottage;
use Illuminate\Http\Request;

class CottageController extends Controller
{
    public function index()
    {
        return Cottage::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
        ]);

        return Cottage::create($data);
    }

    public function show(Cottage $cottage)
    {
        return $cottage;
    }

    public function update(Request $request, Cottage $cottage)
    {
        $data = $request->validate([
            'name' => 'sometimes|string',
            'description' => 'nullable|string',
            'price' => 'sometimes|numeric',
            'capacity' => 'sometimes|integer',
        ]);

        $cottage->update($data);
        return $cottage;
    }

    public function destroy(Cottage $cottage)
    {
        $cottage->delete();
        return response()->noContent();
    }
}


