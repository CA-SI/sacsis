<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orador extends Model
{
    public $table = "oradors";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'name',
		'company',
		'cpf',
		'rg',
		'cellphone',
		'facebook',
		'twitter',
		'linkedin',
		'avatar',
    
];

    public static $rules = [
        // create rules
    ];
    
	public function palestras() {
		return $this->hasMany(App\Palestra::class);
	}
	
	public function workshops() {
		return $this->hasMany(App\Workshop::class);
	}
	
}
