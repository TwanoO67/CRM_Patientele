<?php

//use Illuminate\Auth\UserInterface;
//use Illuminate\Auth\Reminders\RemindableInterface;

class Slide extends Eloquent /*implements UserInterface, RemindableInterface*/ {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 

	protected $table = 'home_slides';
	
	//donnée que l'on peut injecter par post
	//protected $fillable = ['login','password','nom','prenom'];
	
	
	/*public static $rules = [
    	    'nom' => 'required',
    	    'prenom' => 'required',
    	    'password' => 'required'
	    ];
	    
    public function isValid(){
    
        $validation = Validator::make($this->attributes, static::$rules );
	    
	    if($validation->passes()){
    	    return true;
	    }
	    else{
	        $this->errors = $validation->messages();
    	    return false;
	    }

    }*/
	
    

}
