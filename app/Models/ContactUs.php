<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    use HasFactory;
    
    public $table = "contact";
    
    protected $fillable=['title', 'description','phone', 'address','email','background_image','map','footer_title','footer_description','copyright','logo'];
}
