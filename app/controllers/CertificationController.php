<?php

class CertificationController extends \BaseController {


	public function certificationMain()
	{
		return View::make('certification.certificationMain')
				->with('PageName','Certifiction Main')
				->with('active','organization')
				;
	}

	public function mycertification()
	{
		return View::make('certification.myCertification')
				->with('PageName','My Certifiction')
				->with('active','organization')
				;
	}

	public function singleCertification($cerNo)
	{

		return View::make('certification.singleCertification')
				->with('PageName','Single Certifiction')
				->with('active','organization')
				;
	}

	public function singleDocs($docNo)
	{
		return View::make('certification.singleDoc')
				->with('PageName','Single Document')
				->with('active','organization')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())

				;
	}
	public function singleFinding($fn)
	{
		return View::make('certification.singleFinding')
				->with('PageName','Single Finding')
				->with('active','organization')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())

				;
	}
	public function followup($cerNo)
	{
		return View::make('certification.followup')
				->with('PageName','Follow up')
				->with('active','organization')

				;
	}
	public function allPhases(){
		return View::make('certification.allPhases')
				->with('PageName','All Phases')
				->with('active','organization')
				;
	}
	public function phase1(){
		return View::make('certification.phase1')
				->with('PageName','Phase One')
				->with('active','organization')
				;
	}
	public function timelines(){
		return View::make('certification.timelines')
				->with('PageName','Phase One')
				->with('active','organization')
				;
	}



}