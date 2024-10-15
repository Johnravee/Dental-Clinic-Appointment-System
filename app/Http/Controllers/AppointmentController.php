<?php

namespace App\Http\Controllers;

use App\Models\Userappointment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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




public function create(Request $request)
{

    // dd($request->all());
    // Validate the incoming request
    $validator = Validator::make($request->all(), [
        'user_id' => 'required|exists:users,id', // Ensure user exists
        'start-date' => 'required|string|max:50',
        'concern' => 'required|string|max:50',
    ]);

    if($validator->fails()){
         return back()->withErrors($validator);
    }



    // Create a new appointment
    $appointment = Userappointment::create([
        'user_id' => $request->user_id,
        'title'=> 'Appointment', 
        'start' => $request->input('start-date'), 
        'concern' => $request->concern,
        'status' => 'Pending'
    ]);

    return redirect()->route('book')->with('success', 'Appointment created successfully.');
}



//*ito nalang fetching ng slots for specific date
    public function showSlots(){
    
    try{
         $count = Userappointment::selectRaw('COUNT(*) as count, start')
        ->groupBy('start')
        ->get();

        return response()->json($count);
    }catch (Exception $e){

        return $e->getMessage();
    }

}
}