<?php

class AdminTrackingController extends \BaseController {
//Default Start 
		public function main(){
		//return "Hello";
		return View::make('adminTracking/main')
		->with('PageName','Admin control')
		->with('personnel',parent::getPersonnelInfo());
	}

//Default End 
	public function entry(){
		$today=date("d F Y");
		$dates=parent::dates();
		$months=parent::months();
		$years=parent::years_from();		
		$id = Auth::user()->emp_id();
		//R-Open
		$rOpen1=COUNT(DB::table('admin_trackings')
                    ->where('completion_status','R-Open')
                    ->where('initial_risk','H-High Risk')
                    ->get());
		$rOpen2=COUNT(DB::table('admin_trackings')
                    ->where('completion_status', '=','R-Open')
                    ->where('initial_risk', '=','M-Medium Risk')
                    ->get());
		$rOpen3=COUNT(DB::table('admin_trackings')
                    ->where('completion_status', '=','R-Open')
                    ->where('initial_risk', '=','L-Low Risk')
                    ->get());
		$rOpen4=COUNT(DB::table('admin_trackings')
                    ->where('completion_status', '=','R-Open')
                    ->where('initial_risk', '=','N-No Risk')
                    ->get());
		//A-All Ready In Progress
		$aAll1=COUNT(DB::table('admin_trackings')
                    ->where('completion_status', '=','A-All Ready In Progress')
                    ->where('initial_risk', '=','H-High Risk')
                    ->get());
		$aAll2=COUNT(DB::table('admin_trackings')
                    ->where('completion_status', '=','A-All Ready In Progress')
                    ->where('initial_risk', '=','M-Medium Risk')
                    ->get());
		$aAll3=COUNT(DB::table('admin_trackings')
                    ->where('completion_status', '=','A-All Ready In Progress')
                    ->where('initial_risk', '=','L-Low Risk')
                    ->get());
		$aAll4=COUNT(DB::table('admin_trackings')
                    ->where('completion_status', '=','A-All Ready In Progress')
                    ->where('initial_risk', '=','N-No Risk')
                    ->get());
		
		
		return View::make('adminTracking/entry')
		->with('PageName','Admin Tracking Entry')
		->with('dates',$dates)
		->with('toDay',$today)
		->with('months',$months)
		->with('year',$years)
		->with('personnel',parent::getPersonnelInfo())
		
		->with('OH',$rOpen1)
		->with('OM',$rOpen2)
		->with('OL',$rOpen3)
		->with('ON',$rOpen4)
		
		->with('AH',$aAll1)
		->with('AM',$aAll2)
		->with('AL',$aAll3)
		->with('AN',$aAll4);
	}
	public function issuedList(){
		//return 'Hello';
		$today=date("d F Y");
		$dates=parent::dates();
		$months=parent::months();
		$years=parent::years_from();		
		$id = Auth::user()->emp_id();
		//query for getting list sorted by Corrective Status
		$displayQuery=DB::table('admin_trackings')
                    ->where('initial_risk','!=','R-Resolved')
                    ->where('initial_risk','!=','X-Cancelled')                  
					->orderBy('id','desc')
                    ->get();
		//print_r($displayQuery);
		return View::make('adminTracking/issuedListl')
		->with('PageName','Admin Tracking List')
		->with('sl','0')
		->with('dates',$dates)
		->with('toDay',$today)
		->with('months',$months)
		->with('year',$years)
		->with('infos',$displayQuery)
		->with('personnel',parent::getPersonnelInfo());
	}
	public function save(){
		DB::table('admin_trackings')->insert(array(
		
		'user_id' => Input::get('user_id'),
		'admin_track' => Input::get('admin_track'),
		'initial_risk' => Input::get('initial_risk'),
		'completion_status' => Input::get('completion_status'),
		'assigned_to' =>Input::get('assigned_to'),
		
		'start_date' => Input::get('start_date'),
		'start_month' => Input::get('start_month'),
		'start_year' => Input::get('start_year'),
		
		'target_date' => Input::get('target_date'),
		'target_month' => Input::get('target_month'),
		'target_year' => Input::get('target_year'),
		
		'complete_date' => Input::get('complete_date'),
		'complete_month' => Input::get('complete_month'),
		'complete_year' => Input::get('complete_year'),
		
		'organization' => Input::get('organization'),
		
		'pel_number' => Input::get('pel_number'),
		
		'aircraft_registration' => Input::get('aircraft_registration'),
		'other_entry' => Input::get('other_entry'),
		'tracking_for' => Input::get('tracking_for'),
		'action_taken' => Input::get('action_taken'),
		'record_id' => Input::get('record_id'),
		
		'created_at' => time(),
		'updated_at' =>time()		
		));
			
		return Redirect::to('admin/entry')->with('message', 'Successfully Saved!!');
	}
	public function update(){
		$id=Input::get('id');
		DB::table('admin_trackings')
		->where('id',$id)
		->update(array(
		'user_id' => Input::get('user_id'),
		'admin_track' => Input::get('admin_track'),
		'initial_risk' => Input::get('initial_risk'),
		'completion_status' => Input::get('completion_status'),
		'assigned_to' =>Input::get('assigned_to'),
		
		'start_date' => Input::get('start_date'),
		'start_month' => Input::get('start_month'),
		'start_year' => Input::get('start_year'),
		
		'target_date' => Input::get('target_date'),
		'target_month' => Input::get('target_month'),
		'target_year' => Input::get('target_year'),
		
		'complete_date' => Input::get('complete_date'),
		'complete_month' => Input::get('complete_month'),
		'complete_year' => Input::get('complete_year'),
		
		'organization' => Input::get('organization'),
		
		'pel_number' => Input::get('pel_number'),
		
		'aircraft_registration' => Input::get('aircraft_registration'),
		'other_entry' => Input::get('other_entry'),
		'tracking_for' => Input::get('tracking_for'),
		'action_taken' => Input::get('action_taken'),
		'record_id' => Input::get('record_id'),
		'updated_at' =>time()		
		));
			
		return Redirect::to('admin/issuedList')->with('message', 'Successfully Update!!');
	}
}