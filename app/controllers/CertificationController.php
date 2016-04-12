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

	//Admin
	public function addPhase(){
		return View::make('certification.admin.addPhase')
					->with('PageName','Add Phase')
					->with('active','organization');
	}
	public function phase($phaseId){
		return View::make('certification.admin.phase')
					->with('PageName','Phase')
					->with('active','organization');
	}
	public function timeline($phaseId){
		return View::make('certification.admin.timeline')
					->with('PageName','Timeline')
					->with('active','organization');
	}
	public function document($phaseId){
		return View::make('certification.admin.document')
					->with('PageName','Timeline')
					->with('active','organization');
	}
	public function documentField($phaseId,$docId){
		return View::make('certification.admin.documentField')
					->with('PageName','Doc Field')
					->with('active','organization');
	}
	public function documentFieldOption($phaseId,$docId,$optionId){
		return View::make('certification.admin.documentFieldOption')
					->with('PageName','Doc Field Option')
					->with('active','organization');
	}



}