<?php

class DashboardController extends \BaseController {

	
	public function index(){
		return View::make('dashboard')
		->with('PageName','Dashboard')
		->with('active','dashboard')
		->with('personnel',parent::getPersonnelInfo());
	}

}