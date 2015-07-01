<?php

class SessionsController extends \BaseController {
    
    
    public function create(){
    
        if(Auth::check()){
            return Redirect::to('/backend/');
        }
        
        $error = Session::get('error', '');
        return View::make('backend.sessions.create',array(
            'error' => $error
        ));
    }
    
    public function store(){
        if(Auth::attempt(Input::only('email','password'))){
            //return "Bienvenue ".Auth::user()->username;
            return Redirect::to('/backend/');
        }
        
        return Redirect::back()->withInput()->with(array('error'=>'Email ou Mot de passe inconnu'));
        
    }
    
    public function destroy(){
        Auth::logout();
        
        return Redirect::to('/backend/login');
    }
}