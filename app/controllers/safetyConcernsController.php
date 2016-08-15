<?php

class SafetyConcernsController extends \BaseController {

	
	public function main(){
		//return "Hello";
		return View::make('safetyConcerns/main')
		->with('PageName','Safety Concerns')
		->with('active','sia')
		->with('personnel',parent::getPersonnelInfo());
	}

	//report
	public function report(){
		return App::make('SurveillanceController')->report('safetyConcerns');
	}
	public function reportByDateToDate(){
		return App::make('SurveillanceController')->reportByDateToDate('safetyConcerns');
	}

	public function newSafetyConcern(){
		
		//$id = Auth::user()->emp_id();
		$undefineSurveillance=array('70000'.time()=>'70000-'.time().' if Unbdefine Program');
		$toDayProgram=DB::table('sia_program')->where('date',date('Y-m-d'))->lists('sia_number');
		$toDayProgram=array_merge($undefineSurveillance,$toDayProgram);
		
		$select=array(''=>'--Select--');
		$inspectors=DB::table('users')->where('role','=','Inspector')->lists('name','name');
		//$inspectors=array_merge($select,$inspectors);
		
		$airMSMs=DB::table('aircraft_primary_info')->lists('aircraft_MSN');
		
		return View::make('safetyConcerns/newSafetyIssue')
		->with('PageName','New Safety Concern')
		->with('active','sia')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('years',parent::years_from())
		->with('inspectors',$inspectors)
		->with('airMSMs',$airMSMs) 
		->with('toDayProgram',$toDayProgram) 
		;
	}
	public function issuedList(){
		
		$id = Auth::user()->emp_id();
		//query for getting list sorted by Corrective Status
		/*$displayQuery=DB::table('sc_safety_concern')
					->orderBy('id', 'desc')
                    ->get();*/
		$displayQuery=DB::table('sc_safety_concern')->where('soft_delete','<>','1')->get();
		//print_r($query);
		return View::make('safetyConcerns/issuedList')
		->with('PageName','Safety Concerns List')
		->with('active','sia')
		->with('sl','0')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('year',parent::years_from())
		->with('infos',$displayQuery)
		->with('personnel',parent::getPersonnelInfo());
	}
	public function nonStandardIssuedList(){
		
		$id = Auth::user()->emp_id();
		//query for getting list sorted by Corrective Status
		/*$displayQuery=DB::table('sc_safety_concern')
					->orderBy('id', 'desc')
                    ->get();*/
		$displayQuery=DB::table('sc_safety_concern')
        ->leftJoin('sc_primary_inspection', 'sc_safety_concern.inspection_number', '=', 'sc_primary_inspection.inspection_number')
        ->where('sc_safety_concern.type_of_concern', '=','Non-Standard Issue')
        ->get();
		//print_r($query);
		return View::make('safetyConcerns/nonStandardIssuedList')
		->with('PageName','Non Standard Issued List')
		->with('active','sia')
		->with('sl','0')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('year',parent::years_from())
		->with('infos',$displayQuery)
		->with('personnel',parent::getPersonnelInfo());
	}
	
	public function newInspection(){
		$select=array(''=>'--Select--');
		$inspectors=DB::table('users')->where('role','=','Inspector')->lists('name','name');
		$inspectors=array_merge($select,$inspectors);
		
		$organizations=DB::table('users')->orderBy('organization')->lists('organization','organization');
		$organizations=array_merge($select,$organizations);

		return View::make('safetyConcerns.new-inspection')
		->with('PageName','New Inspection')
		->with('active','sia')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('years',parent::years_from())
		->with('inspectors',$inspectors)
		->with('organizations',$organizations)
		;
		
	}
	public function singleInspection($ins_num){
		$select=array(''=>'--Select--');

		$inspectors=DB::table('users')->where('role','=','Inspector')->lists('name','name');
		
		$organizations=DB::table('users')->orderBy('organization')->lists('organization','organization');
		$airMSMs=DB::table('aircraft_primary_info')->lists('aircraft_MSN');
		

		$ins_primary_infos=DB::table('sc_primary_inspection')
		->where('inspection_number','=',$ins_num)
		->get();
		$safety_concerns=DB::table('sc_safety_concern')
		
		->where('inspection_number','=',$ins_num)
		->get();
		
		return View::make('safetyConcerns.singleInspection')
		->with('PageName','Single Inspection')
		->with('active','sia')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('years',parent::years_from())
		->with('safety_concerns',$safety_concerns)		
		->with('ins_primary_infos',$ins_primary_infos)
		->with('inspectors',$inspectors)
		->with('airMSMs',$airMSMs)
		->with('organizations',$organizations)
		;
		
	}
	public function singlesafetyConcern($sc_num){
		$airMSMs=DB::table('aircraft_primary_info')->lists('aircraft_MSN');
		$designations=DB::table('users')->where('organization','CAAB')->lists('role');
		$inspectors=DB::table('users')->where('role','=','Inspector')->lists('name','name');
		 $safetyConcernDatas=DB::table('sc_safety_concern')
		->where('safety_issue_number','=',$sc_num)
		->where('soft_delete','<>','1')
		->get();
		$correctiveActions=DB::table('sc_corrective_action')
		->where('safety_issue_number','=',$sc_num)
		->where('soft_delete','<>','1')
		->get();
		$approvalInfos=DB::table('sc_approval_info')
		->where('safety_issue_number','=',$sc_num)
		->where('soft_delete','<>','1')
		->get();
		 $forwardings=DB::table('sc_forwarding')
		->where('safety_issue_number','=',$sc_num)
		->where('soft_delete','<>','1')
		->get();
		 $legalOpinions=DB::table('sc_legal_openion')
		->where('safety_issue_number','=',$sc_num)
		->where('soft_delete','<>','1')
		->get();
		//last Assigned person
		  $lastAssignedPerson=DB::table('sc_forwarding')
		->where('safety_issue_number','=',$sc_num)
		->where('soft_delete','<>','1')
		->orderBy('id', 'desc')->first();
		//finalization info
		  $finalization=DB::table('sc_finalization')
		->where('safety_issue_number','=',$sc_num)
		->where('soft_delete','<>','1')
		->orderBy('id', 'desc')->get();
		
		//return parent::dDays('25','April','2015');
		
		return View::make('safetyConcerns.single-safety-concern')
		->with('PageName','Single Safety concern')
		->with('active','sia')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('years_from',parent::years_from())
		->with('years',parent::years())
		->with('safetyConcernDatas',$safetyConcernDatas)
		->with('approvalInfos',$approvalInfos)
		->with('forwardings',$forwardings)
		->with('legalOpinions',$legalOpinions)
		->with('lastAssignedPerson',$lastAssignedPerson)
		->with('correctiveActions',$correctiveActions)
		->with('inspectors',$inspectors)
		->with('airMSMs',$airMSMs)
		->with('designations',$designations)
		->with('finalization',$finalization)
		->with('sc_number',$sc_num)
		;
	}
	public function followUp($sc_num){
		$folloUpInfos=DB::table('sc_follow_up')->where('safety_issue_number','=',$sc_num)->get();
		return View::make('safetyConcerns.follow-up')
		->with('PageName','Single Inspection')
		->with('active','sia')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('years_from',parent::years_from())
		->with('years',parent::years())
		->with('sc_num',$sc_num)
		->with('folloUpInfos',$folloUpInfos);
	
	}
	public function savePrimaryInspection(){
		/*Multiple Selection*/
		$team_members =Input::get('team_members');
		$team_members= serialize($team_members);
		/*End Multiple Selection*/
		

		$sc=new SCPrimaryInspection;		
		
		$sc->inspection_number=Input::get('inspection_number');
		$sc->inspection_title=Input::get('inspection_title');
		$sc->lead_inspector=Input::get('lead_inspector');
		
		$sc->team_members=$team_members;
		
		$sc->type_of_inspection=Input::get('type_of_inspection');
		$sc->against_organization=Input::get('against_organization');
		
		$sc->row_creator=Auth::user()->getName();
		$sc->approve=0;
		$sc->warning=0;
		$sc->soft_delete=0;
		$sc->save();
		$ins_num=Input::get('inspection_number');
		return Redirect::to('safety/singleInspection/'.$ins_num)->with('message', 'Successfully Saved Inspection Primary Data!!');
		
	}
	public function updatePrimaryInspection(){
		$id= Input::get('id');
		/*Multiple Selection*/
		$team_members =Input::get('team_members');
		$team_members= serialize($team_members);
		/*End Multiple Selection*/

			$update=DB::table('sc_primary_inspection')
            ->where('id','=',$id)
            ->update(array(
				'inspection_title' => Input::get('inspection_title'),
				'lead_inspector' => Input::get('lead_inspector'),
				'team_members' =>$team_members,
				'type_of_inspection' => Input::get('type_of_inspection'),
				'against_organization' => Input::get('against_organization'),
				
				'row_updator' => Auth::user()->getName(),					
				'updated_at' =>time()	
			));
			if($update)
				return Redirect::back()->with('message', 'Successfully Updated!!');
				return Redirect::back()->with('message', 'Not Updated!!');
	}
	public function saveSafetyConcern(){
		//return 'hello';
		//$eir_file=parent::fileUpload('eir_file','sc_eir_file');
		$upload_evidence=parent::fileUpload('upload_evidence','safety_consern');
		$upload_checklist=parent::fileUpload('upload_checklist','safety_consern');
		
		$target_date=Input::get('target_date').' '.Input::get('target_month').' '.Input::get('target_year');
		$timestamp = strtotime($target_date);
		$target_date =date('Y-m-d', $timestamp);

		$issue_finding_date=Input::get('issue_finding_date').' '.Input::get('issue_finding_month').' '.Input::get('issue_finding_year');
		$timestamp = strtotime($issue_finding_date);
		$issue_finding_date =date('Y-m-d', $timestamp);

		$sc_critical_element=serialize(Input::get('sc_critical_element'));
		$sc_area=serialize(Input::get('sc_area'));
		
		DB::table('sc_safety_concern')->insert(array(
			'safety_issue_number'=>Input::get('safety_issue_number',' '),
			'title'=>Input::get('title',' '),
			'sia_number'=>Input::get('sia_number',' '),
			'finding_number'=>Input::get('finding_number',' '),
			'inspector_observation'=>Input::get('inspector_observation',' '),
			'safety_concern'=>Input::get('safety_concern',' '),

			'sc_critical_element'=>$sc_critical_element,
			'sc_area'=>$sc_area,

			'witness_statement'=>Input::get('witness_statement',' '),
			'upload_evidence'=>$upload_evidence,
			'upload_checklist'=>$upload_checklist,
			'question'=>Input::get('question',' '),
			'answer'=>Input::get('answer',' '),
			'type_of_concern'=>Input::get('type_of_concern',' '),
			'type_of_issue'=>Input::get('type_of_issue',' '),
			'best_practice'=>Input::get('best_practice',' '),
			'poi_or_responsible'=>Input::get('poi_or_responsible',' '),
			'assigned_inspector'=>Input::get('assigned_inspector',' '),
			'issue_finding_date'=>$issue_finding_date,
			'issue_finding_local_time'=>Input::get('issue_finding_local_time',' '),
			'place_or_airport'=>Input::get('place_or_airport',' '),
			'responsible_pels'=>Input::get('responsible_pels',' '),
			'aircraft_msn'=>Input::get('aircraft_msn',' '),
			'aircraft_rgistration_number'=>Input::get('aircraft_rgistration_number',' '),
			'corrective_priority'=>Input::get('corrective_priority',' '),
			'target_date'=>$target_date,
			'risk_statement'=>Input::get('risk_statement',' '),
			'risk_Probability'=>Input::get('risk_Probability',' '),
			'risk_severity'=>Input::get('risk_severity',' '),
			'cvr_statement'=>Input::get('cvr_statement',' '),
			'risk_assesment_from_matrix'=>Input::get('risk_assesment_from_matrix',' '),
			'risk_action'=>Input::get('risk_action',' '),
			'risk_management'=>Input::get('risk_management',' '),

			'row_creator'=>Auth::user()->getName(),
			'row_updator'=>Auth::user()->getName(),
			'soft_delete'=>'0',
			'approve'=>'1',
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s')
			));
		//return Redirect::back()->with('message', 'Successfully Saved safety Concern!!');
		return Redirect::to(URL::previous() . "#SafetyConcern")->with('message', 'Successfully Saved safety Concern!!');
		
	}
    public function updateSafetyConcern(){

		$upload_evidence=parent::updateFileUpload('old_upload_evidence','upload_evidence','safety_consern');
		$upload_checklist=parent::updateFileUpload('old_upload_checklist','upload_checklist','safety_consern');
		
		$target_date=Input::get('target_date').' '.Input::get('target_month').' '.Input::get('target_year');
		$timestamp = strtotime($target_date);
		$target_date =date('Y-m-d', $timestamp);

		$issue_finding_date=Input::get('issue_finding_date').' '.Input::get('issue_finding_month').' '.Input::get('issue_finding_year');
		$timestamp = strtotime($issue_finding_date);
		$issue_finding_date =date('Y-m-d', $timestamp);

		
		$sc_critical_element=serialize(Input::get('sc_critical_element'));
		$sc_area=serialize(Input::get('sc_area'));

		$id= Input::get('id');
			DB::table('sc_safety_concern')
            ->where('id','=',$id)
            ->update(array(
				
			//'safety_issue_number'=>Input::get('safety_issue_number'),
			//'sia_number'=>Input::get('sia_number'),
            'title'=>Input::get('title'),
			'finding_number'=>Input::get('finding_number'),
			'inspector_observation'=>Input::get('inspector_observation'),
			'safety_concern'=>Input::get('safety_concern'),

			'sc_critical_element'=>$sc_critical_element,
			'sc_area'=>$sc_area,

			'witness_statement'=>Input::get('witness_statement'),
			'upload_evidence'=>$upload_evidence,
			'upload_checklist'=>$upload_checklist,
			'question'=>Input::get('question'),
			'answer'=>Input::get('answer'),
			'type_of_concern'=>Input::get('type_of_concern'),
			'type_of_issue'=>Input::get('type_of_issue'),
			'best_practice'=>Input::get('best_practice'),
			'poi_or_responsible'=>Input::get('poi_or_responsible'),
			'assigned_inspector'=>Input::get('assigned_inspector'),
			'issue_finding_date'=>$issue_finding_date,
			'issue_finding_local_time'=>Input::get('issue_finding_local_time'),
			'place_or_airport'=>Input::get('place_or_airport'),
			'responsible_pels'=>Input::get('responsible_pels'),
			'aircraft_msn'=>Input::get('aircraft_msn'),
			'aircraft_rgistration_number'=>Input::get('aircraft_rgistration_number'),
			'corrective_priority'=>Input::get('corrective_priority'),
			'target_date'=>$target_date,
			'risk_statement'=>Input::get('risk_statement'),
			'risk_Probability'=>Input::get('risk_Probability'),
			'risk_severity'=>Input::get('risk_severity'),
			'cvr_statement'=>Input::get('cvr_statement'),
			'risk_assesment_from_matrix'=>Input::get('risk_assesment_from_matrix'),
			'risk_action'=>Input::get('risk_action'),
			'risk_management'=>Input::get('risk_management'),

			
			'row_updator'=>Auth::user()->getName(),
			
			
			'updated_at'=>date('Y-m-d H:i:s')
			));
		//return Redirect::back()->with('message', 'Successfully Updated!!');
		return Redirect::to(URL::previous() . "#scDescription")->with('message', 'Successfully Updated!!');
		
	}
	public function saveCorrectiveAction(){
		$corrective_action_file=parent::fileUpload('corrective_action_file','sc_corrective_action_file');
		
		$sc=new SCCorrectiveAction;		
		
		$sc->safety_issue_number=Input::get('safety_issue_number',' ');
		$sc->currective_action=Input::get('currective_action',' ');
		$sc->revived_date=Input::get('revived_date',' ');
		$sc->revived_month=Input::get('revived_month',' ');
		$sc->revived_year=Input::get('revived_year',' ');
		$sc->concern_authority_officer=Input::get('concern_authority_officer',' ');
		$sc->regulation_mitigation=Input::get('regulation_mitigation',' ');
		$sc->regulation_mitigation_date=Input::get('regulation_mitigation_date',' ');
		$sc->regulation_mitigation_month=Input::get('regulation_mitigation_month',' ');
		$sc->regulation_mitigation_year=Input::get('regulation_mitigation_year',' ');
		$sc->corrective_action_file=$corrective_action_file;
		
		$sc->row_creator=Auth::user()->getName();
		$sc->row_updator=Auth::user()->getName();
		$sc->approve=0;
		$sc->warning=0;
		$sc->soft_delete=0;
		$sc->save();
		
		//return Redirect::back()->with('message', 'Successfully Saved Corrective Action!!');
		return Redirect::to(URL::previous() . "#correctiveAction")->with('message', 'Successfully Saved Corrective Action!!');
		
	}
	public function updateCorrectiveAction(){
		$corrective_action_file=parent::updateFileUpload('old_corrective_action_file','corrective_action_file','sc_corrective_action_file');
		
		$id= Input::get('id');
			$update=DB::table('sc_corrective_action')
            ->where('id','=',$id)
            ->update(array(
				'currective_action' => Input::get('currective_action'),
				'revived_date' => Input::get('revived_date'),
				'revived_month' => Input::get('revived_month'),
				'revived_year' => Input::get('revived_year'),
				'concern_authority_officer' => Input::get('concern_authority_officer'),
				'regulation_mitigation' => Input::get('regulation_mitigation'),
				'regulation_mitigation_date' => Input::get('regulation_mitigation_date'),
				'regulation_mitigation_month' => Input::get('regulation_mitigation_month'),
				'regulation_mitigation_year' => Input::get('regulation_mitigation_year'),
				'corrective_action_file' => $corrective_action_file,
				'row_updator' => Auth::user()->getName(),					
				'updated_at' =>time()	
			));
			if($update)
				//return Redirect::back()->with('message', 'Successfully Updated!!');
				return Redirect::to(URL::previous() . "#correctiveAction")->with('message', 'Successfully Updated!!');
				//return Redirect::back()->with('message', 'Not Updated!!');
				return Redirect::to(URL::previous() . "#correctiveAction")->with('message', 'Not Updated!!');
	}
	
	public function saveFollowUp(){
		$follow_up_file=parent::fileUpload('follow_up_file','sc_follow_up_file');
		
		$sc=new SCFollowUp;		
		
		$sc->safety_issue_number=Input::get('sc_num',' ');
		
		$sc->user_name=Auth::User()->getName();
		$sc->user_id=Auth::User()->emp_id();
		$sc->follow_up=Input::get('follow_up',' ');
		$sc->follow_up_file=$follow_up_file;
		$sc->chat_time=time('A');	
	
		
		$sc->row_creator=Auth::user()->getName();
	
		$sc->soft_delete=0;
		$sc->save();
		
		return Redirect::to(URL::previous() . "#approval")->with('message', 'SC Approved!!');
		//return Redirect::back()->with('message', '');
		
	}
	public function saveApprovalForm(){
		
		
		$sc=new SCApprovalInfo;		
		
		$sc->safety_issue_number=Input::get('safety_issue_number',' ');
		$sc->approved_by=Input::get('approved_by',' ');
		$sc->designation=Input::get('designation',' ');
		$sc->approval_date=Input::get('approval_date',' ');
		$sc->approval_month=Input::get('approval_month',' ');
		$sc->approval_year=Input::get('approval_year',' ');
		$sc->approval_note=Input::get('approval_note',' ');
		
		
		
	
		
		$sc->row_creator=Auth::user()->getName();
		$sc->row_updator=Auth::user()->getName();
	
		$sc->soft_delete=0;
		$sc->save();
		return Redirect::to(URL::previous() . "#approval")->with('message', 'Approval Info Updated!!');
		//return Redirect::back()->with('message', 'Approved!!');
		
	}
	public function updateApprovalForm(){		
		
		$id= Input::get('id');
			$update=DB::table('sc_approval_info')
            ->where('id','=',$id)
            ->update(array(
			
				'approved_by' => Input::get('approved_by'),
				'designation' => Input::get('e_designation'),
				'approval_date' => Input::get('approval_date'),
				'approval_month' => Input::get('approval_month'),
				'approval_year' => Input::get('approval_year'),
				'approval_note' => Input::get('approval_note'),
				
				'row_updator' => Auth::user()->getName(),					
				'updated_at' =>time()	
			));
			if($update)
				return Redirect::to(URL::previous() . "#approval")->with('message', 'Approval Info Updated!!');
				return Redirect::back()->with('message', 'Not Updated!!');
	}
	public function saveForwardingInfo(){
		
		
		$sc=new SCForwarding;		
		
		$sc->safety_issue_number=Input::get('safety_issue_number',' ');
		
		$sc->forwarding_to=Input::get('forwarding_to',' ');
		$sc->designation=Input::get('designation',' ');
		$sc->forwarding_note=Input::get('forwarding_note',' ');	
		$sc->forwarding_date=date('d F Y');	
		
		$sc->row_creator=Auth::user()->getName();
		$sc->row_updator=Auth::user()->getName();
	
		$sc->soft_delete=0;
		$sc->save();
		
		return Redirect::back()->with('message', 'Forwarded!!');
		
	}
	public function updateForwardingInfo(){		
		$id= Input::get('id');
			$update=DB::table('sc_forwarding')
            ->where('id','=',$id)
            ->update(array(
			
				'forwarding_to' => Input::get('forwarding_to'),
				'designation' => Input::get('designation'),
				'forwarding_note' => Input::get('forwarding_note'),
				
				'row_updator' => Auth::user()->getName(),					
				'updated_at' =>time()	
			));
			if($update)
				return Redirect::back()->with('message', 'Successfully Updated!!');
				return Redirect::back()->with('message', 'Not Updated!!');

	}
	public function saveLegalOpinion(){
		$sc=new SCLegalOpenion;		
		
		$sc->safety_issue_number=Input::get('safety_issue_number',' ');
		
		$sc->legal_openion=Input::get('legal_openion',' ');
		
		$sc->row_creator=Auth::user()->getName();
		$sc->creator_emp_id=Auth::user()->emp_id();
		$sc->row_updator=Auth::user()->getName();
		$sc->updater_emp_id=Auth::user()->emp_id();
	
		$sc->soft_delete=0;
		$sc->save();
		
		return Redirect::back()->with('message', 'Legal Opinion Saved!!');
	}
	public function updateLegalOpinion(){
		$id= Input::get('id');
			$update=DB::table('sc_legal_openion')
            ->where('id','=',$id)
            ->update(array(
			
				'legal_openion' => Input::get('legal_openion'),
				
				'row_updator' => Auth::user()->getName(),					
				'updater_emp_id' => Auth::user()->emp_id(),					
				'updated_at' =>time()	
			));
			if($update)
				return Redirect::back()->with('message', 'Successfully Updated!!');
				return Redirect::back()->with('message', 'Not Updated!!');
	}
    public function saveFinzalization(){
		$final_resolution_date=Input::get('final_resolution_date').' '.Input::get('final_resolution_month').' '.Input::get('final_resolution_year');
			$timestamp = strtotime($final_resolution_date);
			$final_resolution_date =date('Y-m-d', $timestamp);

		DB::table('sc_finalization')->insert(array(
				'safety_issue_number'=>Input::get('safety_issue_number',' '),
				'final_resolution_date'=>$final_resolution_date,
				'final_inspector'=>Input::get('final_inspector',' '),
				'final_method'=>Input::get('final_method',' '),
				'residual_risk'=>Input::get('residual_risk',' '),
				'status_result'=>Input::get('status_result',' '),
				'edp_number'=>Input::get('edp_number',' '),
				'closing_note'=>Input::get('closing_note',' '),

				'row_creator'=>Auth::user()->getName(),
				'row_updator'=>Auth::user()->getName(),
				'soft_delete'=>'0',
				'approve'=>'1',
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s')
			));
	//	return Redirect::back()->with('message', 'Successfully Saved!!');
		return Redirect::to(URL::previous() . "#finalization")->with('message', 'Successfully Saved!!');
   }

	public function updatefinzalization(){

		$id=Input::get('id');
		$final_resolution_date=Input::get('final_resolution_date').' '.Input::get('final_resolution_month').' '.Input::get('final_resolution_year');
			$timestamp = strtotime($final_resolution_date);
			$final_resolution_date =date('Y-m-d', $timestamp);

		DB::table('sc_finalization')->where('id',$id)->update(array(

				'final_resolution_date'=>$final_resolution_date,
				'final_inspector'=>Input::get('final_inspector'),
				'final_method'=>Input::get('final_method'),
				'residual_risk'=>Input::get('residual_risk'),
				'status_result'=>Input::get('status_result'),
				'edp_number'=>Input::get('edp_number'),
				'closing_note'=>Input::get('closing_note'),


				'row_updator'=>Auth::user()->getName(),


				'updated_at'=>date('Y-m-d H:i:s')
			));
		//return Redirect::back()->with('message', 'Successfully Updated!!');
		return Redirect::to(URL::previous() . "#finalization")->with('message', 'Successfully Updated!!');
	}

}