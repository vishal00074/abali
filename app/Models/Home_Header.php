<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Home_Header extends Model
{
    use HasApiTokens ,HasFactory;
    
    public $table = 'home_header';
    
    protected $fillable=['title','sub_title','background_image'];
}
