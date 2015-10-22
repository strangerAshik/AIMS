<?php

class ActionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /action
	 *
	 * @return Response
	 */
	public function main()
	{
		return View::make('surveillance.main')
		->with('PageName','Action Main');
	}

	
	public function newActionEnrty()
	{
		return View::make('surveillance.newActionEnrty')
		->with('PageName','New Action Entry')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('years_from',parent::years_from())
		->with('years',parent::years());
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /action
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /action/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /action/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /action/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /action/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}