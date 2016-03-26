<?php

class EdpController extends \BaseController {
	public function singleEdp($edpNumber){
		$edpDetails=DB::table('edp_primary')->where('edp_number',$edpNumber)->where('soft_delete','<>','1')->get();
		$approvalInfos=DB::table('edp_approval')->where('edp_number',$edpNumber)->get();
		$legalOpinions=DB::table('edp_legal_opinion')->where('edp_number',$edpNumber)->get();

		$undefineSurveillance=array('70000'.time()=>'70000-'.time().' if Unbdefine Program');
		$toDayProgram=DB::table('sia_program')->lists('sia_number');
		$toDayProgram=array_merge($undefineSurveillance,$toDayProgram);

		return View::make('edp.singleEpd')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('years_from',parent::years_from())
		->with('years',parent::years())
		->with('PageName','Single EDP')
		->with('active','sia')

		->with('edpDetails',$edpDetails)
		->with('edpNumber',$edpNumber)
		->with('approvalInfos',$approvalInfos)
		->with('legalOpinions',$legalOpinions)
		->with('toDayProgram',$toDayProgram)

		;
	}
	public function saveEdpPrimary(){
		$type_of_action =Input::get('type_of_action');
		$type_of_action= serialize($type_of_action);

		$enforcement_action_file=parent::fileUpload('enforcement_action_file','edp_enforcement_action_file');

		$admin_opinion_file=parent::fileUpload('admin_opinion_file','edp_legal_admin_opinion_file');
		$legal_opinion_file=parent::fileUpload('legal_opinion_file','edp_legal_admin_opinion_file');


		$date=Input::get('date').' '.Input::get('month').' '.Input::get('year');
		$timestamp = strtotime($date);
		$date =date('Y-m-d', $timestamp);

		DB::table('edp_primary')->insert(array(
			'edp_number'=>Input::get('edp_number',''),
			'title'=>Input::get('title',' '),
			'date'=>$date,
			'sia_number'=>Input::get('sia_number',' '),

			'finding_number'=>Input::get('finding_number',' '),
			'sc_number'=>Input::get('sc_number',' '),

			'severity_level'=>Input::get('severity_level',' '),
			'severity_explanation'=>Input::get('severity_explanation',' '),
			'likelihood_level'=>Input::get('likelihood_level',' '),
			'likelihood_explanation'=>Input::get('likelihood_explanation',' '),
			'level_of_risk'=>Input::get('level_of_risk',' '),
			'type_of_action'=>$type_of_action,
			'deviation_procedure'=>Input::get('deviation_procedure',' '),
			'if_yes_explain_deviation_procedure'=>Input::get('if_yes_explain_deviation_procedure',' '),

			'remedial_action'=>Input::get('remedial_action',' '),

			'written_explanation'=>Input::get('written_explanation',' '),
			'recommendation_for_legal_enf'=>Input::get('recommendation_for_legal_enf',' '),
			'edp_peocess_outcome_requested'=>Input::get('edp_peocess_outcome_requested',' '),

			'remedial_measure'=>Input::get('remedial_measure',' '),
			
			'if_yes_explain_outcome_requested'=>Input::get('if_yes_explain_outcome_requested',' '),
			'enforcement_decision_outcome'=>Input::get('enforcement_decision_outcome',' '),
			'enforcement_action'=>Input::get('enforcement_action',' '),
			'enforcement_action_file'=>$enforcement_action_file,

			'admin_opinion'=>Input::get('admin_opinion',' '),
			'admin_opinion_file'=>$admin_opinion_file,

			'legal_opinion'=>Input::get('legal_opinion',' '),
			'legal_opinion_file'=>$legal_opinion_file,

			'row_creator'=>Auth::user()->getName(),
			'row_updator'=>Auth::user()->getName(),
			'soft_delete'=>0,
			'approve'=>'1',
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s')
			));
	//return Redirect::back()->with('message','EDP Saved !');
	return Redirect::to(URL::previous() . "#EDP")->with('message', 'EDP Saved !');
	}
	public function updateEdpPrimary(){
		
		$date=Input::get('date').' '.Input::get('month').' '.Input::get('year');
		$timestamp = strtotime($date);
		$date =date('Y-m-d', $timestamp);
		

		$type_of_action =Input::get('type_of_action');
		$type_of_action= serialize($type_of_action);

		$id=Input::get('id');

		$old_enforcement_action_file=Input::get('old_enforcement_action_file');
		$old_legal_admin_opinion_file=Input::get('old_legal_admin_opinion_file');

		$enforcement_action_file=parent::updateFileUpload('old_enforcement_action_file','enforcement_action_file','edp_enforcement_action_file');

		$admin_opinion_file=parent::updateFileUpload('old_admin_opinion_file','admin_opinion_file','edp_legal_admin_opinion_file');
		$legal_opinion_file=parent::updateFileUpload('old_legal_opinion_file','legal_opinion_file','edp_legal_admin_opinion_file');
		


		DB::table('edp_primary')->where('id',$id)->update(array(
			
			'sia_number'=>Input::get('sia_number'),
			'title'=>Input::get('title'),
			'date'=>$date,

			'finding_number'=>Input::get('finding_number'),
			'sc_number'=>Input::get('sc_number'),

			'severity_level'=>Input::get('severity_level'),
			'severity_explanation'=>Input::get('severity_explanation'),
			'likelihood_level'=>Input::get('likelihood_level'),
			'likelihood_explanation'=>Input::get('likelihood_explanation'),
			'level_of_risk'=>Input::get('level_of_risk'),
			'type_of_action'=>$type_of_action,
			'deviation_procedure'=>Input::get('deviation_procedure'),
			'if_yes_explain_deviation_procedure'=>Input::get('if_yes_explain_deviation_procedure'),

			'remedial_action'=>Input::get('remedial_action'),

			'written_explanation'=>Input::get('written_explanation'),
			'recommendation_for_legal_enf'=>Input::get('recommendation_for_legal_enf'),
			'edp_peocess_outcome_requested'=>Input::get('edp_peocess_outcome_requested'),

			'remedial_measure'=>Input::get('remedial_measure'),

			'if_yes_explain_outcome_requested'=>Input::get('if_yes_explain_outcome_requested'),
			'enforcement_decision_outcome'=>Input::get('enforcement_decision_outcome'),
			'enforcement_action'=>Input::get('enforcement_action'),
			'enforcement_action_file'=>$enforcement_action_file,
			
		
			'admin_opinion'=>Input::get('admin_opinion'),
			'admin_opinion_file'=>$admin_opinion_file,

			'legal_opinion'=>Input::get('legal_opinion'),
			'legal_opinion_file'=>$legal_opinion_file,
			
			'row_updator'=>Auth::user()->getName(),
			'updated_at'=>date('Y-m-d H:i:s')
			
			));
	return Redirect::back()->with('message','EDP Updated !');
	}
	public function saveLegalOpinion(){
		DB::table('edp_legal_opinion')->insert(array(
			'edp_number'=>Input::get('edp_number'),

			'legal_openion'=>Input::get('legal_openion'),

			'row_creator'=>Auth::user()->getName(),
			'creator_emp_id'=>Auth::user()->getId(),
			'row_updator'=>Auth::user()->getName(),
			'updater_emp_id'=>Auth::user()->getId(),
			'soft_delete'=>0,
			
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),	
			));
		//file upload
		//getting mother id
		 $motherId=DB::table('edp_legal_opinion')->orderBy('id','desc')->first();
		 $upload_file=parent::fileUpload('doc','documents');
		//Save to document table
			DB::table('documents')->insert(array(
				
				'table_name'=>'edp_legal_opinion',
				'mother_id'=>$motherId->id,
				'calling_id'=>$upload_file,
				
				
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				));

		return Redirect::back()->with('message','Leagal Opinion Saved !');
	}
	public function updateLegalOpinion(){
		DB::table('edp_legal_opinion')->where('id',Input::get('id'))->update(array(
			
			'legal_openion'=>Input::get('legal_openion'),

			
			'row_updator'=>Auth::user()->getName(),
			'updater_emp_id'=>Auth::user()->getId(),
			'updated_at'=>date('Y-m-d H:i:s'),	
			));
		//document update
		//mother id
		$motherId=Input::get('id');
		$document=parent::updateFileUpload('old_doc','doc','documents');
		//update to document table
			DB::table('documents')
			->where('table_name','edp_legal_opinion')
			->where('mother_id',$motherId)
			->update(array(
				'calling_id'=>$document,
				'updated_at'=>date('Y-m-d H:i:s'),
				));

			
		return Redirect::back()->with('message','Leagal Opinion Updated !');
	}
	public function saveApproval(){
		$approval_date=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		$timestamp = strtotime($approval_date);
		$approval_date =date('Y-m-d', $timestamp);

		DB::table('edp_approval')->insert(array(
			'edp_number'=>Input::get('edp_number'),

			
			'approved_by'=>Input::get('approved_by'),
			'designation'=>Input::get('designation'),
			'approval_date'=>$approval_date,
			'approval_note'=>Input::get('approval_note'),

			'row_creator'=>Auth::user()->getName(),
			'row_updator'=>Auth::user()->getName(),
			'soft_delete'=>0,	
			//'approve'=>'1',	
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),		
			));
		return Redirect::back()->with('message','Approved !!');
	}
	public function updateApproval(){
		$approval_date=Input::get('from_date').' '.Input::get('from_month').' '.Input::get('from_year');
		$timestamp = strtotime($approval_date);
		$approval_date =date('Y-m-d', $timestamp);

		DB::table('edp_approval')->where('id',Input::get('id'))->update(array(
		
			'approved_by'=>Input::get('approved_by'),
			'designation'=>Input::get('designation'),
			'approval_date'=>$approval_date,
			'approval_note'=>Input::get('approval_note'),

			
			'row_updator'=>Auth::user()->getName(),
			'updated_at'=>date('Y-m-d H:i:s'),		
			));
		return Redirect::back()->with('message','Approval Info Updated !!');
	}


}