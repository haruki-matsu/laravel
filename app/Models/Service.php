<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service'; 

    protected $fillable = [
        'line_up',
        'service_name',
        'price',
        'img_path' 
    ];


}


