<?php

namespace App\Http\Controllers;

use App\Models\Userappointment;
use Exception;
use Illuminate\Http\Request;

class AppointmentController
{
//     public function getScheduledDates()
// {
//     $dates = YourModel::all()->map(function($event) {
//         return [
//             'title' => $event->title, // or any other field
//             'start' => $event->date->toISOString(), // ensure it's in ISO format
//             // 'end' => $event->end_date->toISOString(), // if you have an end date
//         ];
//     });
//     return response()->json($dates);
// }

//     public function index(Request $request){
    
//     }



//!PAGE EXPIRED ERROR PAKI FIX NALANG FOR APPOINTMENT INSERTIONS
public function create(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'user_id' => 'required|exists:users,id', // Ensure user exists
        'start-date' => 'required|date',
        'concern' => 'required|string|max:255',
    ]);

    // Create a new appointment
    $appointment = Userappointment::create([
        'user_id' => $request->user_id,
        'start_date' => $request->input('start-date'), // Adjust to match your database column name
        'concern' => $request->concern,
        'status' => 'Pending'
    ]);

    // Return a success response
    return response()->json([
        'success' => true,
        'message' => 'Appointment created successfully.',
        'data' => $appointment,
    ], 201); // 201 Created
}


// Create the appointment
// $appointment = Userappointment::create($request->all());
    public function showSlots($date){
    
    try{
        $count = Userappointment::whereDate('start', $date)->count();

        return response()->json($count);
    }catch (Exception $e){

        return $e->getMessage();
    }

}
}