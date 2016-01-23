<?php

class CertificationController extends \BaseController {


	public function certificationMain()
	{
		return View::make('certification.certificationMain')
				->with('PageName','Certifiction Main')
				;
	}

	public function mycertification()
	{
		return View::make('certification.myCertification')
				->with('PageName','My Certifiction')
				;
	}

	public function singleCertification($cerNo)
	{

		return View::make('certification.singleCertification')
				->with('PageName','Single Certifiction')
				;
	}

	public function singleDocs($docNo)
	{
		return View::make('certification.singleDoc')
				->with('PageName','Single Document')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())

				;
	}
	public function singleFinding($fn)
	{
		return View::make('certification.singleFinding')
				->with('PageName','Single Finding')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())

				;
	}
	public function followup($cerNo)
	{
		return View::make('certification.followup')
				->with('PageName','Follow up')

				;
	}



}