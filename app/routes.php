<?php

use \TwanooLib\FormPlus;

//FRONTEND

//Route::get('users','UsersController@liste');
//Route::get('users/{login}','UsersController@show');

Route::get('/','SimplePageController@home');
Route::get('pathologie/{nom_patho}','SimplePageController@pathologie');
Route::get('methodologie/{nom_metho}','SimplePageController@methodologie');
Route::get('contact','SimplePageController@contact');
Route::get('cgu','SimplePageController@cgu');





//BACKEND

Route::group(array('prefix' => 'backend'), function()
{
    //partie protégé par mot de passe 
    Route::group(array('before'=>'backend_auth'), function() { 
    
        Route::resource('users','UsersController');
        Route::resource('patients','PatientsController');

        
        Route::resource('seances','SeancesController');
        Route::get('/','BackEndController@home');
        
    });
    

    //partie accesible au invités
    Route::get('/login','SessionsController@create');
    Route::get('/logout','SessionsController@destroy');
    Route::resource('sessions','SessionsController');
        
    /*Route::get('backend/patient/list','PatientController@list');
    Route::get('backend/patient/new','PatientController@new');
    Route::get('backend/patient/store','PatientController@store');
    */
    
    Route::get('test',function(){
      $form = new FormPlus();
      return $form->TEST;  
    });
    
    
});




//TEST POUR LE DEV ( à commenter en prod ) 



//Fonction permettant de crypter le mot de passe d'un compte de test
Route::get('crypte_user/{id}',function($id){
    $users = User::all();
    $user = $users->find($id);
    if($user){
        $user->password = Hash::make($user->password);
        $user->save();
        return 'ok';
    }
    return 'fail';
});

//Fonction permettant d'obtenir la liste des routes
Route::get('routes',function(){
    $mesroutes = '';
    $routeCollection = Route::getRoutes();

    foreach ($routeCollection as $value) {
        $mesroutes .= $value->getPath()/*." ".$value->getMethods()*/." ".$value->getName()." <br/>" ;
    }

     return $mesroutes;
});

Route::get('info', function()
{
    phpinfo();
});
    
    
