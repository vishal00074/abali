<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Facilities extends Model
{
    use HasApiTokens ,HasFactory;
    
    public $table = 'facilities';
    
    protected $fillable=['title','description','image'];
}
