<?php

class BackEndController extends BaseController {
	
	//Affichage de la home du backend
	public function home(){
	
	
	    if(Auth::guest()){
            return Redirect::to('/login');
        }
        
	    //appel des composants en base
    	$nb_patients_total = Patient::all()->count();
    	$nb_seances_total = Seance::all()->count();
    	$nb_patients_semaine = Patient::where('created_at','>=', time() - (7*24*60*60) )->count();
    	$nb_seances_semaine = Seance::where('date','>=', time() - (7*24*60*60) )->count();
    	
    	//retour de la vue
    	return View::make('backend.home', compact(
        	'nb_patients_total',
        	'nb_seances_total',
        	'nb_patients_semaine',
        	'nb_seances_semaine'
    	));
	}
	
	public function patientList(){
	    //appel des composants en base
    	$patients = Patient::all();
    	
    	//retour de la vue
    	return View::make('backend.patient.list', compact('patients'));
	}
	
	public function patientNew(){
	    //retour de la vue
    	return View::make('backend.patient.new');
	}

    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function patientStore()
	{
	    $input = Input::all();	
        //je recuperer les données post, remplis l'object, puis test
	    /*if( ! $this->user->fill($input)->isValid() ){
    	    return Redirect::back()->withInput()->withErrors($this->user->errors);
	    }*/
	
        //si la validation passe on sauvegarde
		$this->user->save();
		
		return Redirect::route('backend.list');
		//return Redirect::to('users/index');
		
		
	}

}
