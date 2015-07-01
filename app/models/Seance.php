<?php

class Seance extends \Eloquent {

    protected $table = 'seances';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['date','id_patient','commentaire','titre','lieu','tarif','duree'];
	
	public function patient(){
    	return $this->belongsTo('Patient','id_patient');
	}

}