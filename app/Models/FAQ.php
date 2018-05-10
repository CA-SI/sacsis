<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    public $table = "f_a_qs";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'category',
		'question',
		'anwser',
    
];

    public static $rules = [
        // create rules
    ];
    // FAQ 
}
