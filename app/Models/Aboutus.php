<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    use HasFactory;
    
    public $table = "about";
    
    protected $fillable=['title', 'description','image', 'image1'];
}
