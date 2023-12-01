<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    
    public $table = "bookings";
    
    protected $fillable=['bookingID','property_id','customer_id','check_in','check_out','guests','price','payment_method','status'];
}
