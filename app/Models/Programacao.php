<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programacao extends Model
{
    public $table = "programacaos";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'name',
		'description',
		'date',
		'startSchedule',
		'endSchedule',
		'local',
    
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
