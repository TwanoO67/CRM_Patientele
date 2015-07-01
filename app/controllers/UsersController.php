<?php

class UsersController extends \BaseController {

    protected $user;
    
    public function __construct(User $user){
        $this->user = $user;
    }



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$users = DB::table('users')->where('nom','LIKE','WEBER%')->get();
    	//create  save  new  delete    orderBy  take ...
    	$users = User::all();
    	
    	//password Hash::make($pass)
    	
    	return View::make('backend.users.list', ['users' => $users]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	    $user = $this->user->whereId($id)->first();
        return View::make('backend.users.show', ['user' => $user]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backend.users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    $input = Input::all();	
        //je recuperer les données post, remplis l'object, puis test
	    if( ! $this->user->fill($input)->isValid() ){
    	    return Redirect::back()->withInput()->withErrors($this->user->errors);
	    }
	
        //si la validation passe on sauvegarde
		$this->user->save();
		
		return Redirect::route('backend.users.index');
		//return Redirect::to('users/index');
		
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->user->whereId($id)->first();
        return View::make('backend.users.edit', ['user' => $user]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($data);

		return Redirect::route('backend.users.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
