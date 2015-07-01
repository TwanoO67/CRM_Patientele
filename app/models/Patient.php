<?php

class Patient extends Eloquent  {


	protected $table = 'patients';
	
	//donnée que l'on peut injecter par post
	protected $fillable = [
	    'nom',
	    'prenom',
	    'date_naissance',
	    'telephone',
	    'adresse',
	    'email',
	    'motif',
	    'attente',
	    'objectif',
	    'entourage',
	    'traitement'];
	
	public static $rules = [
	    'nom' => 'required',
	    'prenom' => 'required'
    ];
    
    public function seances(){
        return $this->hasMany('Seance','id_patient');
    }

	//protected $hidden = array('password');

}
