<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    public $table = "participantes";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'name',
		'company',
		'institution',
		'entryYear',
		'cpf',
		'rg',
		'cellphone',
		'facebook',
		'twitter',
		'linkedin',
		'avatar',
		'organizer',
    
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
