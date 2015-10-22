<?php

class SurveillanceController extends \BaseController {


	public function main()
	{
		return View::make('surveillance.main')
		->with('PageName','Action Main');
	}
public function centralSearch()
	{
		$actionList=DB::table('sia_action')->orderBy('id','desc')->get();
		return View::make('surveillance.centralSearch')
		->with('dates',parent::dates())
			->with('toDay',date("d F Y"))
			->with('months',parent::months())
			->with('years_from',parent::years_from())
			->with('years',parent::years())
		->with('actionList',$actionList)
		->with('PageName','Central Search')
		->with('from','1 January 2015')
		->with('to',date('d F Y'));
	}

	
	public function newActionEnrty($checklist='null')
	{
		$lastActions=DB::table('sia_action')->orderBy('id','desc')->paginate(5);
		$organizations=DB::table('users')->lists('organization');
		$inspectors=DB::table('users')->where('role','Inspector')->get();
		
		//$undefineSurveillance=array('70000'.time()=>'70000-'.time().' if Unbdefine Program');
		//$toDayProgram=DB::table('sia_program')->where('date',date('Y-m-d'))->lists('sia_number');
		//$toDayProgram=array_merge($undefineSurveillance,$toDayProgram);
		return View::make('surveillance.newActionEnrty')
		->with('PageName','New Action Entry')
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
		$actionList=DB::table('sia_action')->orderBy('id','desc')->get();
		return View::make('surveillance.surveillanceList')
		->with('PageName','Executed Program List')
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
		$actionList=DB::table('sia_action')->orderBy('id','desc')->where('organization',$myOrg)->get();

		return View::make('surveillance.mySia')
		->with('PageName','Executed Program List')
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
		$actionList=DB::table('sia_action')->orderBy('id','desc')->where('organization',$myOrg)->whereBetween('date',array($fromDate,$toDate))->get();

		
	
		return View::make('surveillance.mySia')
		->with('PageName','Executed Program List DTD')
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
		$actionList=DB::table('sia_action')->whereBetween('date',array($from,$to))->get();
		$rf=Input::get('rquerstFrom');	
		if($rf=='cs'){
		
		return View::make('surveillance.centralSearch')
			->with('PageName','Executed Program List DTD')
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
		return View::make('surveillance.surveillanceList')
			->with('PageName','Executed Program List DTD')
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
		$prgramList=DB::table('sia_program')->orderBy('created_at','desc')->where('date',date("Y-m-d"))->get();
		return View::make('surveillance.todayTaskList')
		->with('PageName','Today Task List')
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
		;
		/*
		*/
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
		$team_members=serialize(Input::get('team_members'));
		$pel_numbers=serialize(Input::get('pel_numbers'));
		$sia_by_area=serialize(Input::get('sia_by_area'));
		DB::table('sia_action')->insert(
					array(
							'program_type'=>Input::get('program_type'),
							'sia_number'=>Input::get('sia_number'),
							'team_members'=>$team_members,
							'event'=>Input::get('event'),
							'objective'=>Input::get('objective'),
							'iats_code'=>Input::get('iats_code'),
							'organization'=>Input::get('organization'),
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
							
							'critical_element'=>Input::get('critical_element'),
							'sia_by_area'=>$sia_by_area,
							
							'has_finding'=>Input::get('has_finding'),
							//'findings'=>Input::get('findings'),
							'result'=>Input::get('result'),
							'has_edp'=>Input::get('has_edp'),
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
							'safety_performance_indicator'=>Input::get('safety_performance_indicator'),
							'safety_performance_target'=>Input::get('safety_performance_target'),
							
							'row_creator'=>Auth::user()->getName(),
							'row_updator'=>Auth::user()->getName(),
							'soft_delete'=>'0',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		return Redirect::back()->withInput()->with('message','Action is Saved!');
	}
	public function updateAction(){
		$id=Input::get('id');
		$date=Input::get('date').' '.Input::get('month').' '.Input::get('year');
		$timestamp = strtotime($date);
		$date =date('Y-m-d', $timestamp);

		$team_members=serialize(Input::get('team_members'));
		$pel_numbers=serialize(Input::get('pel_numbers'));
		$sia_by_area=serialize(Input::get('sia_by_area'));

		DB::table('sia_action')->where('id',$id)->update(
					array(
							'program_type'=>Input::get('program_type'),
							'sia_number'=>Input::get('sia_number'),
							'team_members'=>$team_members,
							'event'=>Input::get('event'),
							'objective'=>Input::get('objective'),
							'iats_code'=>Input::get('iats_code'),
							'organization'=>Input::get('organization'),
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
							
							'critical_element'=>Input::get('critical_element'),
							'sia_by_area'=>$sia_by_area,

							'has_finding'=>Input::get('has_finding'),
							//'findings'=>Input::get('findings'),
							'result'=>Input::get('result'),
							'has_edp'=>Input::get('has_edp'),
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
							
							
							
							'row_updator'=>Auth::user()->getName(),
							
							
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		return Redirect::back()->with('message','Action is Updated!');
	}

	public function newProgram(){
		$organizations=DB::table('users')->lists('organization');
		$inspectors=DB::table('users')->where('role','Inspector')->get();
		$prgramList=DB::table('sia_program')->orderBy('created_at','desc')->paginate(10);
		return View::make('surveillance.newProgram')
				->with('PageName','New Program')
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
		$team_members=serialize(Input::get('team_members'));
		DB::table('sia_program')->insert(
					array(
							'sia_number'=>Input::get('sia_number'),
							'org_name'=>Input::get('org_name'),
							'event'=>Input::get('event'),
							'specific_purpose'=>Input::get('specific_purpose'),
							'date'=>$date,
							'time'=>Input::get('time'),
							'team_members'=>$team_members,
							'remarks'=>Input::get('remarks'),
							
							'row_creator'=>Auth::user()->getName(),
							'row_updator'=>Auth::user()->getName(),
							'soft_delete'=>'0',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		return Redirect::back()->with('message','Program Saved!');
	}
	public function updateProgram(){
		$date=Input::get('date').' '.Input::get('month').' '.Input::get('year');
		$timestamp = strtotime($date);
		$date = date('Y-m-d', $timestamp);
		$team_members=serialize(Input::get('team_members'));
		DB::table('sia_program')->where('id',Input::get('id'))->update(
					array(
							
							'org_name'=>Input::get('org_name'),
							'event'=>Input::get('event'),
							'date'=>$date,
							'time'=>Input::get('time'),
							'team_members'=>$team_members,
							'remarks'=>Input::get('remarks'),
							
							
							'row_updator'=>Auth::user()->getName(),
							
							
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		return Redirect::back()->with('message','Program Updated!');
	}

	public function programList(){
		//$from=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		//$to=Input::get('to_date').' '.Input::get('to_month').' '.Input::get('to_year');
		$prgramList=DB::table('sia_program')->get();
		return View::make('surveillance.programList')
			->with('PageName','Program List')
			->with('dates',parent::dates())
			->with('toDay',date("d F Y"))
			->with('months',parent::months())
			->with('years_from',parent::years_from())
			->with('years',parent::years())
			->with('prgramList',$prgramList)
			->with('from','1 January 2015')
			->with('to',date('d F Y'))

		;
	}
	public function programListDateToDate(){
		//$from=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		$from=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		$timestamp = strtotime($from);
		$from =date('Y-m-d', $timestamp);
		$to=Input::get('to_date').' '.Input::get('to_month').' '.Input::get('to_year');
		$timestamp = strtotime($to);
		$to = date('Y-m-d', $timestamp);
		 $prgramList=DB::table('sia_program')->whereBetween('date',array($from,$to))->get();
		return View::make('surveillance.programList')
			->with('PageName','Program List')
			->with('dates',parent::dates())
			->with('toDay',date("d F Y"))
			->with('months',parent::months())
			->with('years_from',parent::years_from())
			->with('years',parent::years())
			->with('prgramList',$prgramList)
			->with('from',$from)
			->with('to',$to)
			;
				}

	public function singleProgram($sia_number){
		$programDetails=DB::table('sia_program')->where('sia_number',$sia_number)->get();
		$actionDetails=DB::table('sia_action')->where('sia_number',$sia_number)->get();
		$safetyCons=DB::table('sc_safety_concern')->where('sia_number',$sia_number)->get();
		$edps=DB::table('edp_primary')->where('sia_number',$sia_number)->get();
		$approvalInfo=DB::table('sia_approval')->where('sia_number',$sia_number)->limit(1)->get();
		$inspectors=CommonFunction::InspectorListWithID();
		$organizations=CommonFunction::organizations();
		$findings=DB::table('sia_findings')->where('sia_number',$sia_number)->get();
		return View::make('surveillance.singleProgram')
					->with('PageName','Single Program')
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
					;
	}
	public function correctiveAction($sia_number){
		$findings=DB::table('sia_findings')->where('sia_number',$sia_number)->get();
		$correctiveActions=DB::table('sia_corrective_action')->where('sia_number','=',$sia_number)->get();
		return View::make('surveillance.correctiveAction')
					->with('PageName','SIA Corrective Action')
					->with('dates',parent::dates())
					->with('toDay',date("d F Y"))
					->with('months',parent::months())
					->with('years_from',parent::years_from())
					->with('years',parent::years())					
					->with('sia_number',$sia_number)
					->with('correctiveActions',$correctiveActions)
					->with('findings',$findings)
					;
	}
	public function saveCorrectiveAction(){
		$revived_date=Input::get('revived_date').' '.Input::get('revived_month').' '.Input::get('revived_year');
		$timestamp = strtotime($revived_date);
		$revived_date =date('Y-m-d', $timestamp);

		$regulation_mitigation_date=Input::get('regulation_mitigation_date').' '.Input::get('regulation_mitigation_month').' '.Input::get('regulation_mitigation_year');
		$timestamp = strtotime($regulation_mitigation_date);
		$regulation_mitigation_date = date('Y-m-d', $timestamp);

		$corrective_action_file=parent::fileUpload('corrective_action_file','sia_corrective_action_file');
		DB::table('sia_corrective_action')->insert(array(
				'finding_number'=>Input::get('finding_number'),
				'sia_number'=>Input::get('sia_number'),
				'currective_action'=>Input::get('currective_action'),
				'revived_date'=>$revived_date,
				'concern_authority_officer'=>Input::get('concern_authority_officer'),
				'regulation_mitigation'=>Input::get('regulation_mitigation'),
				'regulation_mitigation_date'=>$regulation_mitigation_date,
				'corrective_action_file'=>$corrective_action_file,

				'row_creator'=>Auth::user()->getName(),
				'row_updator'=>Auth::user()->getName(),
				'approve'=>0,
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

				
				'row_updator'=>Auth::user()->getName(),
				
			));
		
		
		return Redirect::back()->with('message', 'Successfully Saved Corrective Action!!');
		
	}
	public function followUp($sia_number){
		$folloUpInfos=DB::table('sia_follow_up')->where('sia_number','=',$sia_number)->get();
		return View::make('surveillance.followUp')
					->with('PageName','SIA Follow Up')
					->with('sia_number',$sia_number)
					->with('folloUpInfos',$folloUpInfos)
					;
	}
	public function saveFollowUp(){
		$follow_up_file=parent::fileUpload('follow_up_file','sia_follow_up_file');
		DB::table('sia_follow_up')->insert(array(
			'sia_number'=>Input::get('sia_number'),
			'image'=>Employee::followUpPic(Auth::User()->emp_id()),
			'user_name'=>Auth::User()->getName(),
			'user_id'=>Auth::User()->emp_id(),
			'follow_up'=>Input::get('follow_up'),
			'follow_up_file'=>$follow_up_file,
			'chat_time'=>time('A'),
			'row_creator'=>Auth::user()->getName(),
			'soft_delete'=>0,
			));
				
		return Redirect::back()->with('message', '');
	}
	public function saveApprovalForm(){
			$approval_date=Input::get('approval_date').' '.Input::get('approval_month').' '.Input::get('approval_year');
			$strtotime=strtotime($approval_date);
			$approval_date=date('Y-m-d',$strtotime);
			DB::table('sia_approval')->insert(array(
			'sia_number'=>Input::get('sia_number'),
			'approved_by'=>Input::get('approved_by'),
			'designation'=>Input::get('designation'),
			'approval_date'=>$approval_date,
			'approval_note'=>Input::get('approval_note'),
			'row_creator'=>Auth::User()->getName(),
			'row_updator'=>Auth::User()->getName(),
			'soft_delete'=>'0',			
			'created_at'=>date('Y-m-d H:i:s'),			
			'updated_at'=>date('Y-m-d H:i:s')			
			));

		return Redirect::back()->with('message','Aproved!');
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

		return Redirect::back()->with('message','Aproval Information Updated!');
	}

	public function saveFinding(){
		$target_date=Input::get('date').' '.Input::get('month').' '.Input::get('year');
		$strtotime=strtotime($target_date);
		$target_date=date('Y-m-d',$strtotime);

		$upload_file=parent::fileUpload('upload_file','sia_finding');

			DB::table('sia_findings')->insert(array(
			'finding_number'=>Input::get('finding_number'),
			'sia_number'=>Input::get('sia_number'),
			'finding'=>Input::get('finding'),
			'target_date'=>$target_date,			
			'corrective_action_plan'=>Input::get('corrective_action_plan'),
			'upload_file'=>$upload_file,

			'row_creator'=>Auth::User()->getName(),
			'row_updator'=>Auth::User()->getName(),
			'soft_delete'=>'0',			
			'created_at'=>date('Y-m-d H:i:s'),			
			'updated_at'=>date('Y-m-d H:i:s')			
			));

		return Redirect::back()->with('message','Finding Saved!');
	}
	public function updateFinding(){
		$id=Input::get('id');
		$target_date=Input::get('date').' '.Input::get('month').' '.Input::get('year');
		$strtotime=strtotime($target_date);
		$target_date=date('Y-m-d',$strtotime);

		$upload_file=parent::updateFileUpload('upload_file_old','upload_file','sia_finding');

			DB::table('sia_findings')->where('id',$id)->update(array(
			'sia_number'=>Input::get('sia_number'),
			'finding'=>Input::get('finding'),
			'target_date'=>$target_date,			
			'corrective_action_plan'=>Input::get('corrective_action_plan'),
			'upload_file'=>$upload_file,
			
			'row_updator'=>Auth::User()->getName(),
			'updated_at'=>date('Y-m-d H:i:s')			
			));

		return Redirect::back()->with('message','Finding Updated!');
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
			'checklist_number'=>Input::get('checklist_number'),
			'sia_number'=>Input::get('sia_number'),
			'finding'=>Input::get('finding'),
			'target_date'=>$target_date,			
			'corrective_action_plan'=>Input::get('corrective_action_plan'),

			'row_creator'=>Auth::User()->getName(),
			'row_updator'=>Auth::User()->getName(),
			'soft_delete'=>'0',			
			'created_at'=>date('Y-m-d H:i:s'),			
			'updated_at'=>date('Y-m-d H:i:s')			
			));

		return Redirect::back()->with('message','Finding Saved!');
	}
	

}