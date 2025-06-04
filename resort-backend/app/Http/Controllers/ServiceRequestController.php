<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function markComplete($id)
     {
         $task = ServiceRequest::findOrFail($id);
         $task->status = 'completed';
         $task->save();
     
         return response()->json(['message' => 'Marked as completed']);
     }     

     public function staffTasks(Request $request)
     {
         $user = $request->user();
     
         if ($user->role !== 'staff') {
             return response()->json(['message' => 'Unauthorized.'], 403);
         }
     
         // Assume staff are assigned via reservation_id (can be expanded)
         $tasks = ServiceRequest::with('reservation')->where('status', 'pending')->get();
     
         return response()->json($tasks);
     }
     
    
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
