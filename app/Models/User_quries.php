<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User_quries extends Model
{
    use HasApiTokens ,HasFactory;
    
    public $table = 'user_quries';
    
    protected $fillable=['name','email','phone','subject','message'];
}
