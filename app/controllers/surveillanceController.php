<?php

class SurveillanceController extends \BaseController {


	public function main()
	{
		return View::make('surveillance.main')
		->with('PageName','Action Main')
		->with('active','sia')
		;
	}
   public function centralSearch()
	{
		$actionList=DB::table('sia_action')->where('soft_delete','<>','1')->orderBy('id','desc')->get();
		return View::make('surveillance.centralSearch')
			->with('dates',parent::dates())
			->with('months',parent::months())
			->with('years',parent::years())
			->with('toDay',date("d F Y"))
			->with('years_from',parent::years_from())
			
		->with('actionList',$actionList)
		->with('PageName','Central Search')
		->with('active','sia')
		->with('from','1 January 2015')
		->with('to',date('d F Y'));
	}

	
	public function newActionEnrty($checklist='null')
	{
		$lastActions=DB::table('sia_action')->where('soft_delete','<>','1')->orderBy('id','desc')->paginate(5);
		$organizations=DB::table('users')->lists('organization');
		$inspectors=DB::table('users')->where('organization','CAAB')->orderBy('emp_id')->get();
		
		return View::make('surveillance.newActionEnrty')
		->with('PageName','New Action Entry')
		->with('active','sia')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('years_from',parent::years_from())
		->with('years',parent::years())
		->with('organizations',$organizations)
		->with('inspectors',$inspectors)
		//->with('toDayProgram',$toDayProgram)
		->with('checklist',$checklist)
		->with('lastActions',$lastActions)
		//->with('checklist_type','null')
		;
	}

	public function surveillanceList(){
		$actionList=DB::table('sia_action')->where('soft_delete','<>','1')->orderBy('id','desc')->get();
		return View::make('surveillance.surveillanceList')
		->with('PageName','Executed Program List')
		->with('active','sia')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('years_from',parent::years_from())
		->with('years',parent::years())
		->with('actionList',$actionList)
		->with('from','1 January 2015')
		->with('to',date('d F Y'))
		;

	}
	public function mySia(){
		$myOrg=Auth::User()->Organization();
		$actionList=DB::table('sia_action')->where('soft_delete','<>','1')->orderBy('id','desc')->where('organization',$myOrg)->get();

		return View::make('surveillance.mySia')
		->with('PageName','Executed Program List')
		->with('active','sia')
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
		->with('actionList',$actionList)
		;

	}
	public function mySiaListDateToDate(){
		$fromDate=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		$timestamp = strtotime($fromDate);
		$fromDate =date('Y-m-d', $timestamp);

		$toDate=Input::get('to_date').' '.Input::get('to_month').' '.Input::get('to_year');
		$timestamp = strtotime($toDate);
		$toDate =date('Y-m-d', $timestamp);

		$myOrg=Auth::User()->Organization();
		$actionList=DB::table('sia_action')->where('soft_delete','<>','1')->orderBy('id','desc')->where('organization',$myOrg)->whereBetween('date',array($fromDate,$toDate))->get();

		
	
		return View::make('surveillance.mySia')
		->with('PageName','Executed Program List DTD')
		->with('active','sia')
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
		
		->with('actionList',$actionList)
			;
		

			
	}
	public function actionListDateToDate(){
		//$from=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		$fromD=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		$from=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		$timestamp = strtotime($from);
		$from =date('Y-m-d', $timestamp);
		$to=Input::get('to_date').' '.Input::get('to_month').' '.Input::get('to_year');
		$toD=Input::get('to_date').' '.Input::get('to_month').' '.Input::get('to_year');
		$timestamp = strtotime($to);
		$to = date('Y-m-d', $timestamp);
		$actionList=DB::table('sia_action')->where('soft_delete','<>','1')->whereBetween('date',array($from,$to))->get();
		$rf=Input::get('rquerstFrom');	
		if($rf=='cs'){
		//go to central search 
		return View::make('surveillance.centralSearch')
			->with('PageName','Executed Program List DTD')
			->with('active','sia')
			->with('dates',parent::dates())
			->with('toDay',date("d F Y"))
			->with('months',parent::months())
			->with('years_from',parent::years_from())
			->with('years',parent::years())
			->with('actionList',$actionList)
			->with('from',$fromD)
			->with('to',$toD);
		}
		else
			{
		//go to Executed program list
		return View::make('surveillance.surveillanceList')
			->with('PageName','Executed Program List DTD')
			->with('active','sia')
			->with('dates',parent::dates())
			->with('toDay',date("d F Y"))
			->with('months',parent::months())
			->with('years_from',parent::years_from())
			->with('years',parent::years())
			->with('actionList',$actionList)
			->with('from',$fromD)
			->with('to',$toD);
		}

			;
				}
	public function todayTaskList(){
		$prgramList=DB::table('sia_program')->where('soft_delete','<>','1')->orderBy('created_at','desc')->where('date',date("Y-m-d"))->get();
		return View::make('surveillance.todayTaskList')
		->with('PageName','Today Task List')
		->with('active','sia')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('years_from',parent::years_from())
		->with('years',parent::years())
		->with('prgramList',$prgramList)
		;
	}
	public function inspectionCheckList(){
		return View::make('surveillance.inspectionCheckList')
		->with('PageName','Inspection Check List')
		->with('active','sia')
		;
	
	}
	public function checkList(){
		$filename = 'test.pdf';
		$path ='files/inspectionCheckList/'.$filename;

		return Response::make(file_get_contents($path), 200, [
		    'Content-Type' => 'application/pdf',
		    'Content-Disposition' => 'inline; '.$filename,
		]);
	}
	public function report($module='surveillance'){
		return View::make($module.'.report')
		->with('PageName','Report')
		->with('active','sia')
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
	public function reportByDateToDate($module='surveillance'){
		$fromDate=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		$timestamp = strtotime($fromDate);
		$fromDate =date('Y-m-d', $timestamp);

		$toDate=Input::get('to_date').' '.Input::get('to_month').' '.Input::get('to_year');
		$timestamp = strtotime($toDate);
		$toDate =date('Y-m-d', $timestamp);

		//$thisYear=Input::get('thisYear');
		return View::make($module.'.report')
		->with('PageName','Report')
		->with('active','sia')
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

	public function saveAction(){
		$date=Input::get('date').' '.Input::get('month').' '.Input::get('year');
		$timestamp = strtotime($date);
		$date =date('Y-m-d', $timestamp);

		$sia_number=Input::get('sia_number');

		$team_members=DB::table('sia_program')->where('sia_number',$sia_number)->pluck('team_members');
		$event=DB::table('sia_program')->where('sia_number',$sia_number)->pluck('event');
		$organization=DB::table('sia_program')->where('sia_number',$sia_number)->pluck('org_name');
		$location=DB::table('sia_program')->where('sia_number',$sia_number)->pluck('location');

		


		$pel_numbers=serialize(Input::get('pel_numbers'));
		$critical_element=serialize(Input::get('critical_element'));
		$sia_by_area=serialize(Input::get('sia_by_area'));
		//Check whether this action is already taken or not
		$existance=DB::table('sia_action')->where('sia_number',Input::get('sia_number'))->count();
		//Insert data
		if($existance==0){
		DB::table('sia_action')->insert(
					array(
							'program_type'=>Input::get('program_type',' '),
							'sia_number'=>Input::get('sia_number',' '),
							'team_members'=>$team_members,
							'event'=>$event,
							'objective'=>Input::get('objective',' '),
							'iats_code'=>Input::get('iats_code',' '),
							'organization'=>$organization,
							'location'=>$location,
							'date'=>$date,
							'time'=>Input::get('time',' '),
							'flight_number'=>Input::get('flight_number',' '),
							'departure_airfield'=>Input::get('departure_airfield',' '),
							'arrival_airfield'=>Input::get('arrival_airfield',' '),
							'aircraft_mms'=>Input::get('aircraft_mms',' '),
							'aircraft_registration_no'=>Input::get('aircraft_registration_no',' '),
							'pic'=>Input::get('pic',' '),
							'pel_numbers'=>$pel_numbers,
							'other_personal_inspected'=>Input::get('other_personal_inspected',' '),
							
							'critical_element'=>$critical_element,
							'sia_by_area'=>$sia_by_area,
							
							'has_finding'=>Input::get('has_finding',' '),
							//'findings'=>Input::get('findings'),
							'result'=>Input::get('result',' '),
							'has_edp'=>Input::get('has_edp',' '),
							'has_safety_concern'=>Input::get('has_safety_concern',' '),
							//'corrective_action_plan'=>Input::get('corrective_action_plan'),
							/*
							'hazard_identification'=>Input::get('hazard_identification',' '),
							'initial_risk'=>Input::get('initial_risk',' '),
							'determine_risk'=>Input::get('determine_risk',' '),

							'violation_of_safety_standard'=>Input::get('violation_of_safety_standard',' '),
							'safety_risk_management'=>Input::get('safety_risk_management',' '),

							'determine_severity'=>Input::get('determine_severity',' '),
							'determine_likelihood'=>Input::get('determine_likelihood',' '),
							'risk_statement'=>Input::get('risk_statement',' '),
							'has_safety_concern'=>Input::get('has_safety_concern',' '),
							
							'lack_of_effective_implementation'=>Input::get('lack_of_effective_implementation',' '),
							'safety_performance_indicator'=>Input::get('safety_performance_indicator',' '),
							'safety_performance_target'=>Input::get('safety_performance_target',' '),*/
							
							'row_creator'=>Auth::user()->getName(),
							'row_updator'=>Auth::user()->getName(),
							'approve'=>'1',
							'soft_delete'=>'0',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		//return Redirect::back()->with('message','Action is Saved!');
		return Redirect::to(URL::previous() . "#ActionDetails")->with('message', 'Action is Saved!');
		}
		else 
		return Redirect::to(URL::previous() . "#ActionDetails")->with('message', 'Action Already Noted!');
	}
	public function updateSms(){
		$id=Input::get('id');
		DB::table('sia_sms')->where('id',$id)->update(
					array(
							'hazard_identification'=>Input::get('hazard_identification'),
							'initial_risk'=>Input::get('initial_risk'),
							'determine_severity'=>Input::get('determine_severity'),
							'determine_likelihood'=>Input::get('determine_likelihood'),
							'determine_risk'=>Input::get('determine_risk'),
							'violation_of_safety_standard'=>Input::get('violation_of_safety_standard'),							
							'safety_risk_management'=>Input::get('safety_risk_management'),						
							'risk_statement'=>Input::get('risk_statement'),
							'safety_performance_indicator'=>Input::get('safety_performance_indicator',' '),
							'safety_performance_target'=>Input::get('safety_performance_target',' '),
							'lack_of_effective_implementation'=>Input::get('lack_of_effective_implementation'),

							'approve'=>'0',
							'row_updator'=>Auth::user()->getName(),
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		//return Redirect::back()->with('message','SMS Updated!');
		return Redirect::to(URL::previous() . "#SMSDetails")->with('message', 'SMS Updated!');
	}
	public function saveSms(){
		//$id=Input::get('id');
		DB::table('sia_sms')->insert(
					array(
							'sia_number'=>Input::get('sia_number'),
							'hazard_identification'=>Input::get('hazard_identification'),
							'initial_risk'=>Input::get('initial_risk'),
							'determine_severity'=>Input::get('determine_severity'),
							'determine_likelihood'=>Input::get('determine_likelihood'),
							'determine_risk'=>Input::get('determine_risk'),
							'violation_of_safety_standard'=>Input::get('violation_of_safety_standard'),							
							'safety_risk_management'=>Input::get('safety_risk_management'),						
							'risk_statement'=>Input::get('risk_statement'),
							'safety_performance_indicator'=>Input::get('safety_performance_indicator',' '),
							'safety_performance_target'=>Input::get('safety_performance_target',' '),
							'lack_of_effective_implementation'=>Input::get('lack_of_effective_implementation'),

							'row_creator'=>Auth::user()->getName(),
							'row_updator'=>Auth::user()->getName(),
							'approve'=>'0',
							'soft_delete'=>'0',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		//return Redirect::back()->with('message','SMS Updated!');
		return Redirect::to(URL::previous() . "#SMSDetails")->with('message', 'SMS Saved!');
	}

	public function updateAction(){
		$id=Input::get('id');
		$date=Input::get('date').' '.Input::get('month').' '.Input::get('year');
		$timestamp = strtotime($date);
		$date =date('Y-m-d', $timestamp);

		//$team_members=serialize(Input::get('team_members'));
		$pel_numbers=serialize(Input::get('pel_numbers'));
		$critical_element=serialize(Input::get('critical_element'));
		$sia_by_area=serialize(Input::get('sia_by_area'));

		DB::table('sia_action')->where('id',$id)->update(
					array(
							//'program_type'=>Input::get('program_type'),
							//'sia_number'=>Input::get('sia_number'),
							//'team_members'=>$team_members,
							//'event'=>Input::get('event'),
							'objective'=>Input::get('objective'),
							'iats_code'=>Input::get('iats_code'),
							//'organization'=>Input::get('organization'),
							'location'=>Input::get('location'),
							'date'=>$date,
							'time'=>Input::get('time'),
							'flight_number'=>Input::get('flight_number'),
							'departure_airfield'=>Input::get('departure_airfield'),
							'arrival_airfield'=>Input::get('arrival_airfield'),
							'aircraft_mms'=>Input::get('aircraft_mms'),
							'aircraft_registration_no'=>Input::get('aircraft_registration_no'),
							'pic'=>Input::get('pic'),
							'pel_numbers'=>$pel_numbers,
							'other_personal_inspected'=>Input::get('other_personal_inspected'),
							
							'critical_element'=>$critical_element,
							'sia_by_area'=>$sia_by_area,

							'has_finding'=>Input::get('has_finding'),
							//'findings'=>Input::get('findings'),
							'result'=>Input::get('result'),
							'has_edp'=>Input::get('has_edp'),
							'has_safety_concern'=>Input::get('has_safety_concern'),
							/*
							//'corrective_action_plan'=>Input::get('corrective_action_plan'),
							'hazard_identification'=>Input::get('hazard_identification'),
							'initial_risk'=>Input::get('initial_risk'),
							'determine_risk'=>Input::get('determine_risk'),

							'violation_of_safety_standard'=>Input::get('violation_of_safety_standard'),
							'safety_risk_management'=>Input::get('safety_risk_management'),

							'determine_severity'=>Input::get('determine_severity'),
							'determine_likelihood'=>Input::get('determine_likelihood'),
							'risk_statement'=>Input::get('risk_statement'),
							'has_safety_concern'=>Input::get('has_safety_concern'),
							
							'lack_of_effective_implementation'=>Input::get('lack_of_effective_implementation'),
							
							
							*/
							'row_updator'=>Auth::user()->getName(),
							
							
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		//return Redirect::back()->with('message','Action is Updated!');
		return Redirect::to(URL::previous() . "#ActionDetails")->with('message', 'Action is Updated!');
	}

	public function newProgram(){
		$organizations=DB::table('users')->lists('organization');
		$inspectors=DB::table('users')->where('organization','CAAB HQ')->orderBy('emp_id')->get();
		
		$prgramList=DB::table('sia_program')->where('soft_delete','<>','1')->orderBy('created_at','desc')->paginate(10);
		return View::make('surveillance.newProgram')
				->with('PageName','New Program')
				->with('active','sia')
				->with('organizations',$organizations)
				->with('dates',parent::dates())
				->with('toDay',date("d F Y"))
				->with('months',parent::months())
				->with('years_from',parent::years_from())
				->with('years',parent::years())
				->with('inspectors',$inspectors)
				->with('prgramList',$prgramList)
				;
	}
	public function saveProgram(){
		$date=Input::get('date').' '.Input::get('month').' '.Input::get('year');
		$timestamp = strtotime($date);
		$date = date('Y-m-d', $timestamp);

		$end_date=Input::get('end_date').' '.Input::get('end_month').' '.Input::get('end_year');
		$timestamp = strtotime($end_date);
		$end_date = date('Y-m-d', $timestamp);


		$team_members=serialize(Input::get('team_members'));
		$save=DB::table('sia_program')->insert(
					array(
							'sia_number'=>Input::get('sia_number',' '),
							'org_name'=>Input::get('org_name',' '),
							'event'=>Input::get('event',' '),
							'specific_purpose'=>Input::get('specific_purpose',' '),
							'date'=>$date,
							'end_date'=>$end_date,
							'location'=>Input::get('location',' '),
							'time'=>Input::get('time',' '),
							'team_members'=>$team_members,
							'remarks'=>Input::get('remarks',' '),
							
							'row_creator'=>Auth::user()->getName(),
							'row_updator'=>Auth::user()->getName(),
							'soft_delete'=>'0',
							'approve'=>'1',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		if($save==true)
		return Redirect::back()->with('message','Program Saved!');
		else
			return Redirect::back()->with('error','Program Not Saved!');
	}
	public function updateProgram(){
		$date=Input::get('date').' '.Input::get('month').' '.Input::get('year');
		$timestamp = strtotime($date);
		$date = date('Y-m-d', $timestamp);

		$end_date=Input::get('end_date').' '.Input::get('end_month').' '.Input::get('end_year');
		$timestamp = strtotime($end_date);
		$end_date = date('Y-m-d', $timestamp);

		$team_members=serialize(Input::get('team_members'));
		//update Program Information
		DB::table('sia_program')->where('id',Input::get('id'))->update(
					array(
							
							'org_name'=>Input::get('org_name'),
							'event'=>Input::get('event'),
							'date'=>$date,
							'end_date'=>$end_date,
							'location'=>Input::get('locationd',' '),
							'time'=>Input::get('time'),
							'team_members'=>$team_members,
							'remarks'=>Input::get('remarks'),
							
							
							'row_updator'=>Auth::user()->getName(),
							
							
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		//update in sia Action
		$sia_number=Input::get('sia_number');
		DB::table('sia_action')->where('sia_number',$sia_number)->update(
				array(
					'organization'=>Input::get('org_name'),
					'event'=>Input::get('event'),
					'location'=>Input::get('locationd'),
					'team_members'=>$team_members
					)
			);
		//return Redirect::back()->with('message','Program Updated!');
		return Redirect::to(URL::previous() . "#ProgramDetails")->with('message', 'Program Updated!');
	}

	public function programList(){
		//$from=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		//$to=Input::get('to_date').' '.Input::get('to_month').' '.Input::get('to_year');
		$prgramList=DB::table('sia_program')->where('soft_delete','<>','1')->orderBy('date')->get();
		return View::make('surveillance.programList')
			->with('PageName','Program List')
			->with('active','sia')
			->with('dates',parent::dates())
			->with('toDay',date("d F Y"))
			->with('months',parent::months())
			->with('years_from',parent::years_from())
			->with('years',parent::years())
			->with('prgramList',$prgramList)
			->with('from','1 January 2015')
			->with('to',date('d F Y'))
			->with('fdate','1')
			->with('fmonth','January')
			->with('fyear','2015')
			->with('tdate',date('d'))
			->with('tmonth',date('F'))
			->with('tyear',date('Y'))


		;
	}
	public function singleInspectorSia(){
			$prgramList=DB::table('sia_program')->where('soft_delete','<>','1')->orderBy('date')->get();
		return View::make('surveillance.singleInspectorSia')
			->with('PageName','Program List')
			->with('active','sia')
			->with('dates',parent::dates())
			->with('toDay',date("d F Y"))
			->with('months',parent::months())
			->with('years_from',parent::years_from())
			->with('years',parent::years())
			->with('prgramList',$prgramList)
			->with('from','1 January 2015')
			->with('to',date('d F Y'))
			->with('fdate','1')
			->with('fmonth','January')
			->with('fyear','2015')
			->with('tdate',date('d'))
			->with('tmonth',date('F'))
			->with('tyear',date('Y'));

	}
	public function programListDateToDate(){
		//$from=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		$from=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		$timestamp = strtotime($from);
		$from =date('Y-m-d', $timestamp);
		$to=Input::get('to_date').' '.Input::get('to_month').' '.Input::get('to_year');
		$timestamp = strtotime($to);
		$to = date('Y-m-d', $timestamp);
		 $prgramList=DB::table('sia_program')->where('soft_delete','<>','1')->whereBetween('date',array($from,$to))->get();
		return View::make('surveillance.programList')
			->with('PageName','Program List')
			->with('active','sia')
			->with('dates',parent::dates())
			->with('toDay',date("d F Y"))
			->with('months',parent::months())
			->with('years_from',parent::years_from())
			->with('years',parent::years())
			->with('prgramList',$prgramList)
			->with('from',$from)
			->with('to',$to)

			->with('fdate',Input::get('from_date'))
			->with('fmonth',Input::get('from_month'))
			->with('fyear',Input::get('from_year'))
			->with('tdate',Input::get('to_date'))
			->with('tmonth',Input::get('to_month'))
			->with('tyear',Input::get('to_year'));

				}
	public function singleInspectorSiaDateToDate(){
		//$from=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		$from=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		$timestamp = strtotime($from);
		$from =date('Y-m-d', $timestamp);
		$to=Input::get('to_date').' '.Input::get('to_month').' '.Input::get('to_year');
		$timestamp = strtotime($to);
		$to = date('Y-m-d', $timestamp);
		 $prgramList=DB::table('sia_program')->where('soft_delete','<>','1')->whereBetween('date',array($from,$to))->get();
		return View::make('surveillance.singleInspectorSia')
			->with('PageName','Program List')
			->with('active','sia')
			->with('dates',parent::dates())
			->with('toDay',date("d F Y"))
			->with('months',parent::months())
			->with('years_from',parent::years_from())
			->with('years',parent::years())
			->with('prgramList',$prgramList)
			->with('from',$from)
			->with('to',$to)

			->with('fdate',Input::get('from_date'))
			->with('fmonth',Input::get('from_month'))
			->with('fyear',Input::get('from_year'))
			->with('tdate',Input::get('to_date'))
			->with('tmonth',Input::get('to_month'))
			->with('tyear',Input::get('to_year'));

				}

	public function singleProgram($sia_number){

		$programDetails=DB::table('sia_program')->where('soft_delete','<>','1')->where('sia_number',$sia_number)->get();

		$actionDetails=DB::table('sia_action')->where('soft_delete','<>','1')->where('sia_number',$sia_number)->get();

		$safetyCons=DB::table('sc_safety_concern')->where('soft_delete','<>','1')->where('sia_number',$sia_number)->get();

		$edps=DB::table('edp_primary')->where('soft_delete','<>','1')->where('sia_number',$sia_number)->get();

		$approvalInfo=DB::table('sia_approval')->where('soft_delete','<>','1')->where('sia_number',$sia_number)->get();

		$inspectors=CommonFunction::InspectorListWithID();
		$organizations=CommonFunction::organizations();
		$findings=DB::table('sia_findings')->where('soft_delete','<>','1')->where('sia_number',$sia_number)->get();
		$sms=DB::table('sia_sms')->where('soft_delete','<>','1')->where('sia_number',$sia_number)->get();
		return View::make('surveillance.singleProgram')
					->with('PageName','Single Program')
					->with('active','sia')
					->with('dates',parent::dates())
					->with('toDay',date("d F Y"))
					->with('months',parent::months())
					->with('years_from',parent::years_from())
					->with('years',parent::years())
					->with('sia_number',$sia_number)
					->with('programDetails',$programDetails)
					->with('actionDetails',$actionDetails)
					->with('safetyCons',$safetyCons)
					->with('approvalInfo',$approvalInfo)
					->with('edps',$edps)
					->with('inspectors',$inspectors)
					->with('organizations',$organizations)
					->with('findings',$findings)
					->with('sms',$sms)
					;
	}
	public function correctiveAction($sia_number,$id=''){
		$findings=DB::table('sia_findings')->where('soft_delete','<>','1')->where('sia_number',$sia_number)->get();
		$correctiveActions=DB::table('sia_corrective_action')->where('soft_delete','<>','1')->where('sia_number','=',$sia_number)->get();
		return View::make('surveillance.correctiveAction')
					->with('PageName','SIA Corrective Action')
					->with('active','sia')
					->with('dates',parent::dates())
					->with('toDay',date("d F Y"))
					->with('months',parent::months())
					->with('years_from',parent::years_from())
					->with('years',parent::years())					
					->with('sia_number',$sia_number)
					->with('correctiveActions',$correctiveActions)
					->with('findings',$findings)
					->with('jump_to',$id)
					;
	}
	public function saveCorrectiveAction(){
		//CAP Initiated On==Revaiv Date
		$revived_date=Input::get('revived_date').' '.Input::get('revived_month').' '.Input::get('revived_year');
		$timestamp = strtotime($revived_date);
		$revived_date =date('Y-m-d', $timestamp);

		$regulation_mitigation_date=Input::get('regulation_mitigation_date').' '.Input::get('regulation_mitigation_month').' '.Input::get('regulation_mitigation_year');
		$timestamp = strtotime($regulation_mitigation_date);
		$regulation_mitigation_date = date('Y-m-d', $timestamp);

		$corrective_action_file=parent::fileUpload('corrective_action_file','sia_corrective_action_file');
		DB::table('sia_corrective_action')->insert(array(
				'finding_number'=>Input::get('finding_number',' '),
				'sia_number'=>Input::get('sia_number',' '),
				'currective_action'=>Input::get('currective_action',' '),
				'revived_date'=>$revived_date,
				'concern_authority_officer'=>Input::get('concern_authority_officer',' '),
				'regulation_mitigation'=>Input::get('regulation_mitigation',' '),
				'regulation_mitigation_date'=>$regulation_mitigation_date,
				'corrective_action_file'=>$corrective_action_file,

				'row_creator'=>Auth::user()->getName(),
				'row_updator'=>Auth::user()->getName(),
				'approve'=>'0',
				'warning'=>0,
				'soft_delete'=>0,
			));
		
		
		return Redirect::back()->with('message', 'Successfully Saved Corrective Action!!');
		
	}
	public function updateCorrectiveAction(){
		$revived_date=Input::get('revived_date').' '.Input::get('revived_month').' '.Input::get('revived_year');
		$timestamp = strtotime($revived_date);
		$revived_date =date('Y-m-d', $timestamp);

		$regulation_mitigation_date=Input::get('regulation_mitigation_date').' '.Input::get('regulation_mitigation_month').' '.Input::get('regulation_mitigation_year');
		$timestamp = strtotime($regulation_mitigation_date);
		$regulation_mitigation_date = date('Y-m-d', $timestamp);

		$corrective_action_file=parent::updateFileUpload('old_corrective_action_file','corrective_action_file','sia_corrective_action_file');
		
		DB::table('sia_corrective_action')->where('id',Input::get('id'))
		->update(array(				
				'currective_action'=>Input::get('currective_action'),
				'revived_date'=>$revived_date,
				'concern_authority_officer'=>Input::get('concern_authority_officer'),
				'regulation_mitigation'=>Input::get('regulation_mitigation'),
				'regulation_mitigation_date'=>$regulation_mitigation_date,
				'corrective_action_file'=>$corrective_action_file,				
				'row_updator'=>Auth::user()->getName()				
			));
		
		
		return Redirect::back()->with('message', 'Successfully Saved Corrective Action!!');
		
	}
	public function followUp($sia_number){
		$folloUpInfos=DB::table('sia_follow_up')->where('soft_delete','<>','1')->where('sia_number','=',$sia_number)->get();
		return View::make('surveillance.followUp')
					->with('PageName','SIA Follow Up')
					->with('active','sia')
					->with('sia_number',$sia_number)
					->with('folloUpInfos',$folloUpInfos)
					;
	}
	public function saveFollowUp(){
		$follow_up_file=parent::fileUpload('follow_up_file','sia_follow_up_file');
		DB::table('sia_follow_up')->insert(array(
			'sia_number'=>Input::get('sia_number',' '),
			'image'=>Employee::followUpPic(Auth::User()->emp_id()),
			'user_name'=>Auth::User()->getName(),
			'user_id'=>Auth::User()->emp_id(),
			'follow_up'=>Input::get('follow_up',' '),
			'follow_up_file'=>$follow_up_file,
			'chat_time'=>time('A',' '),
			'row_creator'=>Auth::user()->getName(),
			'soft_delete'=>0,
			));
				
		return Redirect::back();
	}
	public function saveApprovalForm(){
			$approval_date=Input::get('approval_date').' '.Input::get('approval_month').' '.Input::get('approval_year');
			$strtotime=strtotime($approval_date);
			$approval_date=date('Y-m-d',$strtotime);
			DB::table('sia_approval')->insert(array(
			'sia_number'=>Input::get('sia_number',' '),
			'approved_by'=>Input::get('approved_by',' '),
			'designation'=>Input::get('designation',' '),
			'approval_date'=>$approval_date,
			'approval_note'=>Input::get('approval_note',' '),
			'row_creator'=>Auth::User()->getName(),
			'row_updator'=>Auth::User()->getName(),
			'soft_delete'=>'0',			
			'approve'=>'1',			
			'created_at'=>date('Y-m-d H:i:s'),			
			'updated_at'=>date('Y-m-d H:i:s')			
			));

		//return Redirect::back()->with('message','Aproved!');
		return Redirect::to(URL::previous() . "#ApprovalInfo")->with('message', 'Aproved!');
	}
	public function updateApprovalForm(){
			$approval_date=Input::get('approval_date').' '.Input::get('approval_month').' '.Input::get('approval_year');
			$strtotime=strtotime($approval_date);
			$approval_date=date('Y-m-d',$strtotime);
			DB::table('sia_approval')->where('id',Input::get('id'))->update(array(
			
			'approved_by'=>Input::get('approved_by'),
			'designation'=>Input::get('designation'),
			'approval_date'=>$approval_date,
			'approval_note'=>Input::get('approval_note'),
			
			'row_updator'=>Auth::User()->getName(),
					
			'updated_at'=>date('Y-m-d H:i:s')			
			));

		//return Redirect::back()->with('message','Aproval Information Updated!');
		return Redirect::to(URL::previous() . "#ApprovalInfo")->with('message', 'Aproval Information Updated!');
	}

	public function saveFinding(){
		$target_date=Input::get('date').' '.Input::get('month').' '.Input::get('year');
		$strtotime=strtotime($target_date);
		$target_date=date('Y-m-d',$strtotime);
		//file upload 
		
		if (Input::file('upload_file'))
			{
			   $size =Input::file('upload_file')->getSize()/1024;
			}
		else
			{$size=-1;}
		//	return $size;
			
			if($size<250 || $size==-1){
				$upload_file=parent::fileUpload('upload_file','sia_finding');
				$data=DB::table('sia_findings')->insert(array(
				'finding_number'=>Input::get('finding_number',' '),
				'title'=>Input::get('title',' '),
				'sia_number'=>Input::get('sia_number',' '),
				'finding'=>Input::get('finding',' '),
				'target_date'=>$target_date,			
				'corrective_action_plan'=>Input::get('corrective_action_plan',' '),
				'upload_file'=>$upload_file,

				'row_creator'=>Auth::User()->getName(),
				'row_updator'=>Auth::User()->getName(),
				'soft_delete'=>'0',			
				//'approve'=>'1',			
				'created_at'=>date('Y-m-d H:i:s'),			
				'updated_at'=>date('Y-m-d H:i:s')			
				));		
				return Redirect::to(URL::previous() . "#Findings")->with('message', 'Finding Saved!');
			}
			return Redirect::back()->withInput()->with('error','No Data Saved!! File Size Should Be Bellow 250Kb.!!');
		



		

	}
	public function updateFinding(){
		$id=Input::get('id');
		$target_date=Input::get('date').' '.Input::get('month').' '.Input::get('year');
		$strtotime=strtotime($target_date);
		$target_date=date('Y-m-d',$strtotime);

		$upload_file=parent::updateFileUpload('upload_file_old','upload_file','sia_finding');

			DB::table('sia_findings')->where('id',$id)->update(array(
			'sia_number'=>Input::get('sia_number'),
			'title'=>Input::get('title'),
			'finding'=>Input::get('finding'),
			'target_date'=>$target_date,			
			'corrective_action_plan'=>Input::get('corrective_action_plan'),
			'upload_file'=>$upload_file,
			
			'row_updator'=>Auth::User()->getName(),
			'updated_at'=>date('Y-m-d H:i:s')			
			));

		return Redirect::back()->with('message','Finding Updated!');
		//return Redirect::to(URL::previous() . "#Findings")->with('message', 'Finding Updated!');
	}
	public function getChecklist(){
		  $checklist_name=Input::get('checklist_name');
		  $checklist_type=Input::get('checklist_type');
		  $checklist=DB::table('sia_checklists')
		  			->where('checklist_name',$checklist_name)
		  			->where('checklist_type',$checklist_type)
		  			->where('soft_delete','<>','1')
		  			->get();
		
		return $this->newActionEnrty($checklist);
		//return Redirect::back()->with('checklist',$checklist);
		//->with('checklist_type',$checklist_type);
	}
	
	public function getChecklistRecover(){
		return Redirect::to('surveillance/newActionEnrty');
	}
	public function saveChecklistAnswer(){
		DB::table('sia_checklist_answer')->insert(array(
			'checklist_number'=>Input::get('checklist_number',' '),
			'sia_number'=>Input::get('sia_number',' '),
			'finding'=>Input::get('finding',' '),
			'target_date'=>$target_date,			
			'corrective_action_plan'=>Input::get('corrective_action_plan',' '),

			'row_creator'=>Auth::User()->getName(),
			'row_updator'=>Auth::User()->getName(),
			'soft_delete'=>'0',			
			'approve'=>'1',			
			'created_at'=>date('Y-m-d H:i:s'),			
			'updated_at'=>date('Y-m-d H:i:s')			
			));

		return Redirect::back()->with('message','Finding Saved!');
	}
/*Notification board of SIA view page*/
	
	public function noticeBoard(){
		// Program : Execution Date Exceed
			 $totalSiaNumber=DB::table('sia_program')->where('date','<',date('Y-m-d'))->lists('sia_number');
			 $executedSiaNumber=DB::table('sia_action')->lists('sia_number');
			 $notExecuted=array_diff($totalSiaNumber,$executedSiaNumber);
			 $numberOfNotExecutedSia=count($notExecuted);
		//SIA : Finding Target Time Exceed
		 	//list of finding 
		 	  $findingList=DB::table('sia_findings')->lists('finding_number');

		 	//list finding corrective action
		 	  $findingCorrectiveActionList=DB::table('sia_corrective_action')->lists('finding_number');
		 	 
		 	//get diff of 2 array
		 	  $notGivenCorrAction=array_diff($findingList, $findingCorrectiveActionList);
		 	 
		 	//check the diff values whether they are target date exceed 
		 	  $exceedDateArray=[];
		 	  foreach ($notGivenCorrAction as $info) {
		 	  	 $exceedDate=DB::table('sia_findings')
		 	  			->where('target_date','<',date('Y-m-d'))
		 	  			->where('finding_number',$info)->pluck('finding_number');
			 	  	 if($exceedDate){
			 	  	 		$exceedDateArray[]=$exceedDate;
			 	  	 }
		 	  }
		 	 //count number 
		 	  $exceedDateFindingNumbers=count($exceedDateArray);
		
		//SC : Safety Concern Target Time Exceed
		 	  //safety concern list
		 	 	 $scList=DB::table('sc_safety_concern')->lists('safety_issue_number');
		 	 //Corrective Action sc list
		 	 	 $correctiveActionScList=DB::table('sc_corrective_action')->lists('safety_issue_number');
		 	 //diff number
		 	 	 $scExceedDateArray=[];
		 	 	 $notGivenCorrActionList=array_diff($scList,$correctiveActionScList);
		 	 	 foreach ($notGivenCorrActionList as $info) {
		 	 	 	$exceedDate=DB::table('sc_safety_concern')
		 	 	 		->where('target_date','<',date('Y-m-d'))
		 	  			->where('safety_issue_number',$info)->pluck('safety_issue_number');
			 	  	 if($exceedDate){
			 	  	 		$scExceedDateArray[]=$exceedDate;
			 	  	 }
		 	 	 }
		 	 	 $exceedDateScNumbers=count($scExceedDateArray);
		//EDP:Waiting for approval
		 	 	//EDP list of legal
		 	 	 $edpLegalList=DB::table('edp_legal_opinion')->lists('edp_number');
		 	 	//EDP list Approval
		 	 	 $edpLegalListApproval=DB::table('edp_approval')->lists('edp_number');
		 	 	//Not Approval EDP
		 	 	 $notApproveEdp=array_diff($edpLegalList, $edpLegalListApproval);

		 	 	 $pendingApproveEdpNumber=count($notApproveEdp);
		//SC:waiting for Approval
		 	 	 //Sc finalize list
		 	 	 	$scFinalizeList=DB::table('sc_finalization')->lists('safety_issue_number');
		 	 	 //Sc Approval list
		 	 	 	$scApproval=DB::table('sc_approval_info')->lists('safety_issue_number');
		 	 	 //Not Approval Sc List
		 	 	 	$notApprovalScList=array_diff($scFinalizeList,$scApproval);
		 	 	 	$pendingApprovalScNumber=count($notApprovalScList);

		//SIA:waiting for SIA Approval 	
				//SMS sia_number list
		 	 	 	$smsSiaNumberList=DB::table('sia_sms')->where('approve','1')->lists('sia_number');
				//Approval sia_number list
		 	 	 	$approvalSiaNumberList=DB::table('sia_approval')->lists('sia_number');
				//Not Approve Sia List
		 	 	 	$notApprovalSiaList=array_diff($smsSiaNumberList,$approvalSiaNumberList);
		 	 	  $pendingSiaApproval=count($notApprovalSiaList);

		//SIA:SMS waiting For Approval 	
				//SMS sia_number list
		 	 	 	$smsApprovalPendingList=DB::table('sia_sms')->where('approve','0')->lists('sia_number');
		 	 	    $pendingSmsApproval=count($smsApprovalPendingList);
		//Findign:finding corrective action waiting For Approval 	
				//corrective finding number list
		 	 	 	$pendingCorrectiveActionList=DB::table('sia_corrective_action')->where('approve','0')->lists('finding_number');
		 	 	    $pendingCorrectiveActionList=count($pendingCorrectiveActionList);

		return View::make('surveillance.noticeBoard')
		->with('PageName','SIA Board')
		->with('active','sia')
		->with('numberOfNotExecutedSia',$numberOfNotExecutedSia)
		->with('exceedDateFindingNumbers',$exceedDateFindingNumbers)
		->with('exceedDateScNumbers',$exceedDateScNumbers)
		->with('pendingSiaApproval',$pendingSiaApproval)
		->with('pendingApprovalScNumber',$pendingApprovalScNumber)
		->with('pendingApproveEdpNumber',$pendingApproveEdpNumber)
		->with('pendingSmsApproval',$pendingSmsApproval)
		->with('pendingCorrectiveActionList',$pendingCorrectiveActionList)
		
		;
	}
/*Execution date exceed of SIA Details page*/
	public function executionDateExceed(){
		// Program : Execution Date Exceed
			 $totalSiaNumber=DB::table('sia_program')->where('date','<',date('Y-m-d'))->lists('sia_number');
			 $executedSiaNumber=DB::table('sia_action')->lists('sia_number');
			 $notExecuted=array_diff($totalSiaNumber,$executedSiaNumber);
			// $numberOfNotExecutedSia=count($notExecuted);

		return View::make('surveillance.notiExecutionDateExceed')
						->with('PageName','Execution Date Exceed List')
						->with('active','sia')
						->with('notExecuted',$notExecuted)
						
				;
	}
/*Execution date exceed of Findings Details page*/
	public function findingTargetTimeExceed(){

			//SIA : Finding Target Time Exceed
		 	//list of finding 
		 	  $findingList=DB::table('sia_findings')->lists('finding_number');

		 	//list finding corrective action
		 	  $findingCorrectiveActionList=DB::table('sia_corrective_action')->lists('finding_number');
		 	 
		 	//get diff of 2 array
		 	  $notGivenCorrAction=array_diff($findingList, $findingCorrectiveActionList);
		 	 
		 	//check the diff values whether they are target date exceed 
		 	  $exceedDateArray=[];
		 	  foreach ($notGivenCorrAction as $info) {
		 	  	 $exceedDate=DB::table('sia_findings')
		 	  			->where('target_date','<',date('Y-m-d'))
		 	  			->where('finding_number',$info)->pluck('finding_number');
			 	  	 if($exceedDate){
			 	  	 		$exceedDateArray[]=$exceedDate;
			 	  	 }
		 	  }
		 	
		
	


		return View::make('surveillance.notiFindingTargetTimeExceed')
						->with('PageName','Finding Date Exceed List')
						->with('active','sia')
						->with('exceedDateArray',$exceedDateArray)
				;
	}
/*Execution date exceed of SC Details page*/
	public function scTargetTimeExceed(){

		//SC : Safety Concern Target Time Exceed
		 	  //safety concern list
		 	 	 $scList=DB::table('sc_safety_concern')->lists('safety_issue_number');
		 	 //Corrective Action sc list
		 	 	 $correctiveActionScList=DB::table('sc_corrective_action')->lists('safety_issue_number');
		 	 //diff number
		 	 	 $scExceedDateArray=[];
		 	 	 $notGivenCorrActionList=array_diff($scList,$correctiveActionScList);
		 	 	 foreach ($notGivenCorrActionList as $info) {
		 	 	 	$exceedDate=DB::table('sc_safety_concern')
		 	 	 		->where('target_date','<',date('Y-m-d'))
		 	  			->where('safety_issue_number',$info)->pluck('safety_issue_number');
			 	  	 if($exceedDate){
			 	  	 		$scExceedDateArray[]=$exceedDate;
			 	  	 }
		 	 	 }
		
		
		return View::make('surveillance.notiScTargetTimeExceed')
						->with('PageName','SC Date Exceed List')
						->with('active','sia')
						->with('scExceedDateArray',$scExceedDateArray)
				;
	}
/*SIA Waiting Details page*/
	public function siaAprovalWaiting(){
		
		
		//SIA:waiting for SIA Approval 	
				//SMS sia_number list
		 	 	 	$smsSiaNumberList=DB::table('sia_sms')->where('approve','1')->lists('sia_number');
				//Approval sia_number list
		 	 	 	$approvalSiaNumberList=DB::table('sia_approval')->lists('sia_number');
				//Not Approve Sia List
		 	 	 	$notApprovalSiaList=array_diff($smsSiaNumberList,$approvalSiaNumberList);


		return View::make('surveillance.notiSiaAprovalWaiting')
						->with('PageName','SIA Approval Wating List')
						->with('active','sia')
						->with('notApprovalSiaList',$notApprovalSiaList)
				;
	}
/*SC Waiting Details page*/
	public function scAprovalWaiting(){
		//SC:waiting for Approval
		 	 	 //Sc finalize list
		 	 	 	$scFinalizeList=DB::table('sc_finalization')->lists('safety_issue_number');
		 	 	 //Sc Approval list
		 	 	 	$scApproval=DB::table('sc_approval_info')->lists('safety_issue_number');
		 	 	 //Not Approval Sc List
		 	 	 	$notApprovalScList=array_diff($scFinalizeList,$scApproval);
		return View::make('surveillance.notiScAprovalWaiting')
						->with('PageName','SC Approval Wating List')
						->with('active','sia')
						->with('notApprovalScList',$notApprovalScList)
				;
	}
/*EDP Waiting Details page*/
	public function edpAprovalWaiting(){
		//EDP:Waiting for approval
		 	 	//EDP list of legal
		 	 	 $edpLegalList=DB::table('edp_legal_opinion')->lists('edp_number');
		 	 	//EDP list Approval
		 	 	 $edpLegalListApproval=DB::table('edp_approval')->lists('edp_number');
		 	 	//Not Approval EDP
		 	 	 $notApproveEdp=array_diff($edpLegalList, $edpLegalListApproval);
		
		return View::make('surveillance.notiEdpAprovalWaiting')
						->with('PageName','EDP Approval Wating List')
						->with('active','sia')
						->with('notApproveEdp',$notApproveEdp)
				;
	}
	
/*SMS pending approval list*/
	public function pendingSmsApproval(){
		//SMS sia_number list
		 	 	 	$smsApprovalPendingList=DB::table('sia_sms')->where('approve','0')->lists('sia_number');
		
		return View::make('surveillance.notiSmsApprovalwaiting')
						->with('PageName','SMS Approval Wating List')
						->with('active','sia')
						->with('smsApprovalPendingList',$smsApprovalPendingList)
				;
	}
/*SMS pending approval list*/
	public function pendingFindingCorrectiveActionList(){
		//corrective finding number list
		 	 	 	$pendingCorrectiveActionList=DB::table('sia_corrective_action')->where('approve','0')->lists('finding_number');
		return View::make('surveillance.notiFindingCorrectiveActionwaiting')
						->with('PageName','Finding Corrective Action Approval Wating List')
						->with('active','sia')
						->with('pendingCorrectiveActionList',$pendingCorrectiveActionList)
				;
	}
/*All edp */
	public function allEdp(){
		$data=DB::table('edp_primary')->orderBy('id','desc')->get();

		return View::make('surveillance.edpAll')
				->with('PageName','All EDP')
				->with('active','sia')
				->with('data',$data)
				;
	}

}

