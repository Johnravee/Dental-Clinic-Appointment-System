<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userappointment;
class UserAppointments
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

    public function index(Request $request){
    
    }

    public function create(Request $request){
        $appointment = Userappointment::create($request->all());
        dd($appointment);
    }

}