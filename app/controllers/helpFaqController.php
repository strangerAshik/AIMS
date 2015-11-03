<?php

class helpFaqController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function main()
	{
		return View::make('helpFaq.main')
		->with('PageName','Help And FAQ')
		;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function askQuestion()
	{
		//return "hello";
		return View::make('helpFaq.addQuestion')
		->with('PageName','Ask Question');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function singleQuestionAnsware($id)
	{
		return View::make('helpFaq.singleQuestion')
		->with('PageName','Single Question')
		->with('id',$id)
		;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function answaredQuestionList()
	{
		return View::make('helpFaq.questionAnswerList')
		->with('PageName','Answered Question List')
		
		;
		
	}
	public function pendingQuestionList()
	{
		return View::make('helpFaq.pendingQuestionList')
		->with('PageName','Pending Question List')
		
		;
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function report()
	{
		return App::make('SurveillanceController')->report('helpFaq');
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
	public function hello($id)
	{
		//
	}


}
