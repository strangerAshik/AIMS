<?php

class voluntaryReportingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function main()
	{
		return View::make('voluntaryReporting.main')
			->with('PageName','Voluntary Reporting');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function voluntaryReportingList()
	{
		return View::make('voluntaryReporting.voluntaryReportingList')
			->with('PageName','Voluntary Reporting List');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function singleReport($id)
	{
		return View::make('voluntaryReporting.singleReport')
			->with('PageName','Single Report')
			->with('dates',parent::dates())
			->with('months',parent::months())
			->with('years',parent::years_from())
		

			;
	}


	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
