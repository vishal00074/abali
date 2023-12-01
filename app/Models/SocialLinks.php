<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLinks extends Model
{
    use HasFactory;
    
    public $table = "sociallinks";
    
    protected $fillable=['facebook', 'twitter','youtube', 'instagram','pinterest'];
}
