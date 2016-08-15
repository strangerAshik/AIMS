<?php

class ReportController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /report
	 *
	 * @return Response
	 */
	//report
	public function report(){
		return App::make('SurveillanceController')->report('report');
	}
	public function reportChartByDateToDate(){
		//return 'Hello';
		$fromDate=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		$timestamp = strtotime($fromDate);
		$fromDate =date('Y-m-d', $timestamp);

		$toDate=Input::get('to_date').' '.Input::get('to_month').' '.Input::get('to_year');
		$timestamp = strtotime($toDate);
		$toDate =date('Y-m-d', $timestamp);
        $fileName=Input::get('fileName');
        $active=Input::get('active');
		//$thisYear=Input::get('thisYear');
		return View::make('reportBankChart/'.$fileName)
		->with('PageName','Chart Report')
		->with('fileName',$fileName)
		->with('active',$active)
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('years_from',parent::years_from())
		->with('years',parent::years())

		->with('from',$fromDate)
		->with('to',$toDate)

		->with('from_Date',Input::get('from_date'))
		->with('fromMonth',Input::get('from_month'))
		->with('fromYear',Input::get('from_year'))

		->with('to_Date',Input::get('to_date'))
		->with('toMonth',Input::get('to_month'))
		->with('toYear',Input::get('to_year'))

		->with('fromDate',$fromDate)
		->with('toDate',$toDate)

		;
	}

	public function reportByModuel($moduleName)
	{
		return View::make('report.report')
		->with('PageName','Report')
		->with('active',$moduleName)
		->with('module',$moduleName)
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('years_from',parent::years_from())
		->with('years',parent::years())

		->with('from','1 January '.date('Y'))
		->with('to',date('d F Y'))

		->with('from_Date','1')
		->with('fromMonth','January')
		->with('fromYear', date('Y'))

		->with('to_Date',date('d'))
		->with('toMonth',date('F'))
		->with('toYear',date('Y'))

		->with('fromDate',date('Y').'-01-01')
		->with('toDate',date('Y-m-d'))

		;
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /report/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /report
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /report/{id}
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
	 * GET /report/{id}/edit
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
	 * PUT /report/{id}
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
	 * DELETE /report/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}