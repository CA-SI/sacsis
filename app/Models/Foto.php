<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    public $table = "fotos";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'url',
		'description',
    
];

    public static $rules = [
        // create rules
    ];
    // Foto 
}
