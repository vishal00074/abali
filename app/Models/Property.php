<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable =['landholder_id', 'is_admin', 'name', 'email', 'phone', 'address', 'primary_image', 'secondary_images', 'description', 'bedroom', 'bathroom', 'outdoor_area', 'net_area', 'gross_area', 'price', 'amenities', 'capacity'];
}
