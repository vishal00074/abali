<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Home_Property extends Model
{
    use HasApiTokens ,HasFactory;
    
    public $table = 'home_properties';
    
    protected $fillable=['property_id','type'];
}
