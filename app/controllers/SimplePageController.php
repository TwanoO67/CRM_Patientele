<?php

class SimplePageController extends BaseController {

    public function __construct(){
        View::share('body_class', '');
    }
	
	//Affichage de la home
	public function home(){
	    //appel des composants en base
    	$headings = Heading::all();
    	$slides = Slide::all();
    	$featurets = Featuret::all();
    	
    	//retour de la vue
    	return View::make('home', array(
        	'headings' => $headings,
        	'slides' => $slides,
        	'featurets' => $featurets
    	));
	}
	
	//affichade des pages pathologie
	public function pathologie($nom_patho){
	
	    $patho = (object) array(
            'titre' => 'Pathologie inconnue',
            'texte' => "La pathologie demandée n'a pas été trouvée"
        );
	    
	    if($nom_patho != ''){
    	    $obj = Pathologie::find($nom_patho);
    	    if($obj != null){
        	    $patho = $obj;
    	    }
	    }
	    
	    $featurets = Featuret::all();
	
    	return View::make('pathologie', compact( 'patho','featurets') );
	}
	
	
	//affichage des pages methodologie
	public function methodologie($nom_metho){
    	$metho = (object) array(
            'titre' => 'Methodologie inconnue',
            'texte' => "La page de méthodologie demandée n'a pas été trouvée"
        );
	    
	    if($nom_metho != ''){
    	    $obj = Methodologie::find($nom_metho);
    	    if($obj != null){
        	    $metho = $obj;
    	    }
	    }
	
    	return View::make('methodologie', array( 'metho' => $metho));
	}
	
	//affichage page contact
	public function contact(){
    	return View::make('contact',array(
        	//'body_class' => 'fond_gris'
    	));
	}
	
	public function cgu(){
        return View::make('cgu');
    }
	

}
