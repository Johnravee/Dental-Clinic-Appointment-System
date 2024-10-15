<?php

//make appointments
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userappointment extends Model
{
    use HasFactory;

    protected $table = 'users_appointments';

}