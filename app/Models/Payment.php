<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Payment extends Model
{
    use HasApiTokens ,HasFactory;
    
    public $table = 'payments';
    
    protected $fillable=['customer_id','bookingID','property_id','transection_id','receipt_url','price','currency','status'];
}
