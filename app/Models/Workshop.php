<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    public $table = "workshops";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'idSpeaker',
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
    
	public function programacao() {
		return $this->hasOne(App\Programacao::class);
	}
	
	public function orador() {
		return $this->belongsTo(App\Orador::class);
	}
	
}
