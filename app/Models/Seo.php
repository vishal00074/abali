<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Seo extends Model
{
    use HasApiTokens ,HasFactory;
    
    public $table = 'seo';
    
    protected $fillable=['seo_title','seo_keyword','seo_description','type'];
}
