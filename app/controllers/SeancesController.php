<?php

class SeancesController extends \BaseController {

	/**
	 * Display a listing of seances
	 *
	 * @return Response
	 */
	public function index()
	{
		$seances = Seance::orderBy('date', 'DESC')->get();
		
		return View::make('backend.seances.index', compact('seances'));
	}

	/**
	 * Show the form for creating a new seance
	 *
	 * @return Response
	 */
	public function create()
	{
	    $liste_patients = Patient::all();
		$patients = array();
		foreach($liste_patients as $pat ){
    		$patients[$pat->id] = strtoupper($pat->nom)." ".ucwords($pat->prenom);
		}
		return View::make('backend.seances.create',compact('patients'));
	}

	/**
	 * Store a newly created seance in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Seance::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Seance::create($data);

		return Redirect::route('backend.seances.index');
	}

	/**
	 * Display the specified seance.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$seance = Seance::findOrFail($id);

		return View::make('backend.seances.show', compact('seance'));
	}

	/**
	 * Show the form for editing the specified seance.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$seance = Seance::find($id);
		$liste_patients = Patient::all();
		$patients = array();
		foreach($liste_patients as $pat ){
    		$patients[$pat->id] = strtoupper($pat->nom)." ".ucwords($pat->prenom);
		}

		return View::make('backend.seances.edit', compact('seance','patients'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$seance = Seance::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Seance::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$seance->update($data);

		return Redirect::route('backend.seances.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Seance::destroy($id);

		return Redirect::route('backend.seances.index');
	}

}