<?php

namespace App\Http\Controllers;
use App\Mail\CustomEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Userappointment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AppointmentController
{

public function create(Request $request)
{

    // Validate the incoming request
    $validator = Validator::make($request->all(), [
        'user_id' => 'required|exists:users,id', // Ensure user exists
        'start-date' => 'required|string|max:50',
        'concern' => 'required|string|max:50',
    ]);

    if($validator->fails()){
         return back()->withErrors($validator);
    }


     // Check if the user already has an appointment on the specified date
    $existingAppointment = Userappointment::where('user_id', $request->user_id)
        ->where('start', $request->input('start-date'))
        ->first();

    if ($existingAppointment) {
        return back()->withErrors(['start-date' => 'You already have an appointment on this date.']);
    }


    // Create a new appointment
    $appointment = Userappointment::create([
        'user_id' => $request->user_id,
        'title'=> 'Appointment', 
        'start' => $request->input('start-date'), 
        'concern' => $request->concern,
        'status' => 'Pending'
    ]);

    $username = Auth::user();
    

     $data = [
        'name' => $username->name,
        'appointment_date' => $request->input('start-date'),
        'status' => 'Pending'
    ];
    //send email to authenticated user
    Mail::to($username->email)->send(new CustomEmail($data));

    //*return back sa book route
    return redirect()->route('book')->with('success', 'Appointment created successfully.');
}



//!ito nalang fetching ng slots for specific date
    public function showSlots($date) {
    try {
        $count = Userappointment::select(Userappointment::raw('COUNT(start) as count, start'))
            ->where('start', $date)
            ->groupBy('start')
            ->get();

        return response()->json($count);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


    
    public function userAppointments(){
        try{

            $userId = Auth::user()->id;
            $existingAppointment = Userappointment::where('user_id', $userId)->get();
            return response()->json($existingAppointment);
            
        }catch(Exception $e){
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }
}