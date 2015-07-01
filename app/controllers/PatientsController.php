<?php

//AW: pour les delete on peut passer par https://github.com/Ifnot/RestfulizerJs


class PatientsController extends \BaseController {

	/**
	 * Display a listing of patients
	 *
	 * @return Response
	 */
	public function index()
	{
		$patients = Patient::all();

		return View::make('backend.patients.index', compact('patients'));
	}

	/**
	 * Show the form for creating a new patient
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backend.patients.create');
	}

	/**
	 * Store a newly created patient in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Patient::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Patient::create($data);

		return Redirect::route('backend.patients.index');
	}

	/**
	 * Display the specified patient.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$patient = Patient::findOrFail($id);

		return View::make('backend.patients.show', compact('patient'));
	}

	/**
	 * Show the form for editing the specified patient.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$patient = Patient::find($id);

		return View::make('backend.patients.edit', compact('patient'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$patient = Patient::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Patient::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$patient->update($data);

		return Redirect::route('backend.patients.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Patient::destroy($id);

		return Redirect::route('backend.patients.index');
	}

}