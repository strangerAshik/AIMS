<?php

class AircraftController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /aircraft
	 *
	 * @return Response
	 */
 //include('SurveillanceController.php');

	public function main()
	{
		return View::make('aircraft/main')
		->with('PageName','Aircraft')
		->with('personnel', parent::getPersonnelInfo())
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		;
	}
	//report
	public function report(){
		return App::make('SurveillanceController')->report('aircraft');
	}
	public function reportByDateToDate(){
		return App::make('SurveillanceController')->reportByDateToDate('aircraft');
	}
	//Start Save data
	public function savePrimary(){	
	DB::table('aircraft_primary_info')->insert(array(
			'aircraft_MM'=>Input::get('aircraft_MM',' '),
			'aircraft_MSN'=>Input::get('aircraft_MSN',' '),
			'assigned_inspector'=>Input::get('assigned_inspector',' '),
			'serial_number'=>Input::get('serial_number',' '),
			'state_registration'=>Input::get('state_registration',' '),
			'registration_no'=>Input::get('registration_no',' '),
			'aircraft_operator'=>Input::get('aircraft_operator',' '),
			'active'=>Input::get('active',' '),
			'registration'=>Input::get('registration',false),
			'cofa'=>Input::get('cofa',false),
			'stcs'=>Input::get('stcs',false),
			'current_exemptions'=>Input::get('current_exemptions',false),
			'insurance'=>Input::get('insurance',false),
			'currently_leased'=>Input::get('currently_leased',false),
			'memo'=>Input::get('memo',' '),
			'approve'=>'1',
			'warning'=>'0',
			'soft_delete'=>'0',

			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s')
		));
		return Redirect::to('aircraft/single/'.Input::get('aircraft_MM').'/'.Input::get('aircraft_MSN'));
		
	}
	public function editPrimary(){		
	   $id= Input::get('id');
			DB::table('aircraft_primary_info')
            ->where('id','=',$id)
            ->update(array(
				'assigned_inspector' => Input::get('assigned_inspector'),
				'serial_number' => Input::get('serial_number'),
				'registration_no' => Input::get('registration_no'),
				'aircraft_operator' => Input::get('aircraft_operator'),
				'active' =>Input::get('active') ,
				'state_registration'=>Input::get('state_registration'),	
				'registration' =>Input::get('registration') ,	
				'cofa' =>Input::get('cofa') ,	
				'stcs' =>Input::get('stcs') ,	
				'current_exemptions' =>Input::get('current_exemptions') ,	
				'insurance' =>Input::get('insurance') ,	
				'currently_leased' =>Input::get('currently_leased') ,	
				'memo' =>Input::get('memo') ,	
				
				'updated_at'=>date('Y-m-d H:i:s')	
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
		
		
	}
	public function saveTCI(){
		$tc_type_approval_date=Input::get('tc_type_approval_date').' '.Input::get('tc_type_approval_month').' '.Input::get('tc_type_approval_year');
		$strtotime=strtotime($tc_type_approval_date);
		$tc_type_approval_date=date('d F Y',$strtotime);

		$tc_type_acceptance_date=Input::get('tc_type_acceptance_date').' '.Input::get('tc_type_acceptance_month').' '.Input::get('tc_type_acceptance_year');
		$strtotime=strtotime($tc_type_acceptance_date);
		$tc_type_acceptance_date=date('d F Y',$strtotime);

		$tcds_revision_date=Input::get('tcds_revision_date').' '.Input::get('tcds_revision_month').' '.Input::get('tcds_revision_year');
		$strtotime=strtotime($tcds_revision_date);
		$tcds_revision_date=date('d F Y',$strtotime);
		//return Input::get('tc_upload');
		$tc_upload=parent::fileUpload('tc_upload','air_tc_upload');

		$aircraft=new AircrafTCInfo;
		
		$aircraft->aircraft_MM=Input::get('aircraft_MM',' ');
		$aircraft->aircraft_MSN=Input::get('aircraft_MSN',' ');
		
		$aircraft->tc_number=Input::get('tc_number',' ');
		
		$aircraft->tc_validation_date=Input::get('tc_validation_date',' ');
		$aircraft->tc_validation_month=Input::get('tc_validation_month',' ');
		$aircraft->tc_validation_year=Input::get('tc_validation_year',' ');
		$aircraft->tc_control_number=Input::get('tc_control_number',' ');
		$aircraft->tc_AFM_approval_date=Input::get('tc_AFM_approval_date',' ');
		$aircraft->tc_AFM_approval_month=Input::get('tc_AFM_approval_month',' ');
		$aircraft->tc_AFM_approval_year=Input::get('tc_AFM_approval_year',' ');
		$aircraft->tc_AFM_revision=Input::get('tc_AFM_revision',' ');
		$aircraft->tc_state_of_design=Input::get('tc_state_of_design',' ');
		$aircraft->tc_power_plant_model=Input::get('tc_power_plant_model',' ');
		$aircraft->tc_power_plant_tds_number=Input::get('tc_power_plant_tds_number',' ');
		$aircraft->tc_propeller_model=Input::get('tc_propeller_model',' ');
		$aircraft->tc_propeller_tds_number=Input::get('tc_propeller_tds_number',' ');

		$aircraft->tc_type_approval_date=$tc_type_approval_date;
		$aircraft->tc_type_acceptance_date=$tc_type_acceptance_date;
		$aircraft->tc_state_of_manufacturing=Input::get('tc_state_of_manufacturing',' ');
		$aircraft->tcds_no=Input::get('tcds_no',' ');
		$aircraft->tcds_revision_date=$tcds_revision_date;
		$aircraft->tcds_revision_no=Input::get('tcds_revision_no',' ');
		$aircraft->tdcs_link=Input::get('tdcs_link',' ');

		
		$aircraft->tc_upload=$tc_upload;
		
		$aircraft->approve='1';
		$aircraft->warning='0';
		$aircraft->soft_delete='0';
		$aircraft->created_at=date('Y-m-d H:i:s');
		$aircraft->updated_at=date('Y-m-d H:i:s');

		
		$aircraft->save();
		return Redirect::back()->with('massage','Information Added Successfully!');
	}
	public function editTCI(){	
		$tc_type_approval_date=Input::get('tc_type_approval_date').' '.Input::get('tc_type_approval_month').' '.Input::get('tc_type_approval_year');
		$strtotime=strtotime($tc_type_approval_date);
		$tc_type_approval_date=date('d F Y',$strtotime);

		$tc_type_acceptance_date=Input::get('tc_type_acceptance_date').' '.Input::get('tc_type_acceptance_month').' '.Input::get('tc_type_acceptance_year');
		$strtotime=strtotime($tc_type_acceptance_date);
		$tc_type_acceptance_date=date('d F Y',$strtotime);

		$tcds_revision_date=Input::get('tcds_revision_date').' '.Input::get('tcds_revision_month').' '.Input::get('tcds_revision_year');
		$strtotime=strtotime($tcds_revision_date);
		$tcds_revision_date=date('d F Y',$strtotime);
		//update Upload
		$tc_upload=parent::updateFileUpload('old_tc_upload','tc_upload','air_tc_upload');

	   $id= Input::get('id');
			DB::table('aircraft_tc_info')
            ->where('id','=',$id)
            ->update(array(
				'tc_number' => Input::get('tc_number'),
				
				'tc_validation_date' => Input::get('tc_validation_date'),
				'tc_validation_month' => Input::get('tc_validation_month'),
				'tc_validation_year' => Input::get('tc_validation_year'),
				'tc_control_number' => Input::get('tc_control_number'),
				'tc_AFM_approval_date' => Input::get('tc_AFM_approval_date'),
				'tc_AFM_approval_month' => Input::get('tc_AFM_approval_month'),
				'tc_AFM_approval_year' => Input::get('tc_AFM_approval_year'),
				'tc_AFM_revision' => Input::get('tc_AFM_revision'),
				'tc_state_of_design' => Input::get('tc_state_of_design'),				
				'tc_power_plant_model' => Input::get('tc_power_plant_model'),
				'tc_power_plant_tds_number' => Input::get('tc_power_plant_tds_number'),
				'tc_propeller_model' => Input::get('tc_propeller_model'),
				'tc_propeller_tds_number' => Input::get('tc_propeller_tds_number'),

				'tc_type_approval_date' => $tc_type_approval_date,
				'tc_type_acceptance_date' => $tc_type_acceptance_date,
				'tcds_revision_date' => $tcds_revision_date,
				'tc_state_of_manufacturing' => Input::get('tc_state_of_manufacturing'),
				'tcds_no' => Input::get('tcds_no'),
				'tcds_revision_no' => Input::get('tcds_revision_no'),
				'tdcs_link' => Input::get('tdcs_link'),
				'tc_upload' => $tc_upload,

				'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
		
		
	}
	public function saveSTC(){
		$aircraft=new AircraftSTCInfo;		
		
		$aircraft->aircraft_MM=Input::get('aircraft_MM',' ');
		$aircraft->aircraft_MSN=Input::get('aircraft_MSN',' ');
		
		$aircraft->stc_number=Input::get('stc_number',' ');
		$aircraft->stc_validation_date=Input::get('stc_validation_date',' ');
		$aircraft->stc_validation_month=Input::get('stc_validation_month',' ');
		$aircraft->stc_validation_year=Input::get('stc_validation_year',' ');
		$aircraft->stc_control_number=Input::get('stc_control_number',' ');
		$aircraft->stc_afm_revision=Input::get('stc_afm_revision',' ');
		$aircraft->stc_state_of_design=Input::get('stc_state_of_design',' ');
		$aircraft->stc_SOD_notified=Input::get('stc_SOD_notified',' ');
		$aircraft->stc_AFM_revision_number=Input::get('stc_AFM_revision_number',' ');
		$aircraft->stc_AFM_approval_date=Input::get('stc_AFM_approval_date',' ');
		$aircraft->stc_AFM_approval_month=Input::get('stc_AFM_approval_month',' ');
		$aircraft->stc_AFM_approval_year=Input::get('stc_AFM_approval_year',' ');
		$aircraft->stc_purpose=Input::get('stc_purpose',' ');

		$stc_upload=parent::fileUpload('stc_upload','air_stc_upload');
		$aircraft->stc_upload=$stc_upload;

		$aircraft->approve='1';
		$aircraft->warning='0';
		$aircraft->soft_delete='0';
		$aircraft->created_at=date('Y-m-d H:i:s');
		$aircraft->updated_at=date('Y-m-d H:i:s');
				
		$aircraft->save();
		return Redirect::back()->with('massage','Information Added Successfully!');
		
	}
	
	public function editSTC(){		
		//update Upload
		$stc_upload=parent::updateFileUpload('old_stc_upload','stc_upload','air_stc_upload');

	   $id= Input::get('id');
			DB::table('aircraft_stc_info')
            ->where('id','=',$id)
            ->update(array(
				'stc_number' => Input::get('stc_number'),				
				'stc_validation_date' => Input::get('stc_validation_date'),				
				'stc_validation_month' => Input::get('stc_validation_month'),				
				'stc_validation_year' => Input::get('stc_validation_year'),				
				'stc_control_number' => Input::get('stc_control_number'),				
				'stc_afm_revision' => Input::get('stc_afm_revision'),				
				'stc_state_of_design' => Input::get('stc_state_of_design'),				
				'stc_SOD_notified' => Input::get('stc_SOD_notified'),				
				'stc_AFM_revision_number' => Input::get('stc_AFM_revision_number'),				
				'stc_AFM_approval_date' => Input::get('stc_AFM_approval_date'),				
				'stc_AFM_approval_month' => Input::get('stc_AFM_approval_month'),				
				'stc_AFM_approval_year' => Input::get('stc_AFM_approval_year'),				
				'stc_purpose' => Input::get('stc_purpose'),

				'stc_upload' =>$stc_upload,				
					
				'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
		
		
	}
	public function saveExemption(){
		$aircraft=new AircraftExemptionInfo;
		
		$aircraft->aircraft_MM=Input::get('aircraft_MM',' ');
		$aircraft->aircraft_MSN=Input::get('aircraft_MSN',' ');
		
		$aircraft->exemption_number=Input::get('exemption_number',' ');
		$aircraft->regulation=Input::get('regulation',' ');
		$aircraft->effective_date=Input::get('effective_date',' ');
		$aircraft->effective_month=Input::get('effective_month',' ');
		$aircraft->effective_year=Input::get('effective_year',' ');
		$aircraft->exemption_control_number=Input::get('exemption_control_number',' ');
		$aircraft->basis=Input::get('basis',' ');
		
		$exemption_upload=parent::fileUpload('exemption_upload','air_exemption_upload');
		$aircraft->exemption_upload=$exemption_upload;

		$aircraft->approve='1';
		$aircraft->warning='0';
		$aircraft->soft_delete='0';

		$aircraft->created_at=date('Y-m-d H:i:s');
		$aircraft->updated_at=date('Y-m-d H:i:s');
		
		$aircraft->save();
		return Redirect::back()->with('massage','Information Added Successfully!');
		
	}
	
	public function editExemption(){	
	//update Upload
		$exemption_upload=parent::updateFileUpload('old_exemption_upload','exemption_upload','air_exemption_upload');	
	   $id= Input::get('id');
			DB::table('aircraft_exemption_info')
            ->where('id','=',$id)
            ->update(array(
				'exemption_number' =>Input::get('exemption_number'),				
				'regulation' =>Input::get('regulation'),				
				'effective_date' =>Input::get('effective_date'),				
				'effective_month' =>Input::get('effective_month'),				
				'effective_year' =>Input::get('effective_year'),				
				'exemption_control_number' =>Input::get('exemption_control_number'),				
				'basis' =>Input::get('basis'),				
				'exemption_upload' =>$exemption_upload,								
					
				'updated_at' =>date('Y-m-d H:i:s')	
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
		
		
	}
	public function saveRegistrationInfo(){
		$aircraft=new AircraftRegistrationInfo;
		
		$aircraft->aircraft_MM=Input::get('aircraft_MM',' ');
		$aircraft->aircraft_MSN=Input::get('aircraft_MSN',' ');
		
		$aircraft->registration_number=Input::get('registration_number',' ');
		$aircraft->reg_effective_date=Input::get('reg_effective_date',' ');
		$aircraft->reg_effective_month=Input::get('reg_effective_month',' ');
		$aircraft->reg_effective_year=Input::get('reg_effective_year',' ');
		$aircraft->state_of_registration=Input::get('state_of_registration',' ');
		$aircraft->activation_control_number=Input::get('activation_control_number',' ');
		$aircraft->reg_expiration_date=Input::get('reg_expiration_date',' ');
		$aircraft->reg_expiration_month=Input::get('reg_expiration_month',' ');
		$aircraft->reg_expiration_year=Input::get('reg_expiration_year',' ');
		$aircraft->registry_number=Input::get('registry_number',' ');
		$aircraft->de_registration_date=Input::get('de_registration_date',' ');
		$aircraft->de_registration_month=Input::get('de_registration_month',' ');
		$aircraft->de_registration_year=Input::get('de_registration_year',' ');
		$aircraft->de_regisration_control_number=Input::get('de_regisration_control_number',' ');
		$aircraft->de_regisration_basis=Input::get('de_regisration_basis',' ');
		$aircraft->previous_state_registration=Input::get('previous_state_registration',' ');
		$aircraft->reg_status_memo=Input::get('reg_status_memo',' ');
		
		$registration_upload=parent::fileUpload('registration_upload','air_registration_upload');
		$aircraft->registration_upload=$registration_upload;

		$aircraft->approve='1';
		$aircraft->warning='0';
		$aircraft->soft_delete='0';

		$aircraft->created_at=date('Y-m-d H:i:s');
		$aircraft->updated_at=date('Y-m-d H:i:s');
		
		$aircraft->save();
		return Redirect::back()->with('massage','Information Added Successfully!');
		
	}
	public function editRegistrationInfo(){		
		
		$registration_upload=parent::updateFileUpload('old_registration_upload','registration_upload','air_registration_upload');	
	   $id= Input::get('id');
			DB::table('aircraft_registration_info')
            ->where('id','=',$id)
            ->update(array(
				'registration_number' => Input::get('registration_number'),				
				'reg_effective_date' => Input::get('reg_effective_date'),				
				'reg_effective_month' => Input::get('reg_effective_month'),				
				'reg_effective_year' => Input::get('reg_effective_year'),				
				'state_of_registration' => Input::get('state_of_registration'),				
				'activation_control_number' => Input::get('activation_control_number'),				
				'reg_expiration_date' => Input::get('reg_expiration_date'),				
				'reg_expiration_month' => Input::get('reg_expiration_month'),				
				'reg_expiration_year' => Input::get('reg_expiration_year'),				
				'registry_number' => Input::get('registry_number'),				
				'de_registration_date' => Input::get('de_registration_date'),				
				'de_registration_month' => Input::get('de_registration_month'),				
				'de_registration_year' => Input::get('de_registration_year'),				
				'de_regisration_control_number' => Input::get('de_regisration_control_number'),				
				'de_regisration_basis' => Input::get('de_regisration_basis'),				
				'previous_state_registration' => Input::get('previous_state_registration'),				
				'reg_status_memo' => Input::get('reg_status_memo'),									
				'registration_upload' =>$registration_upload,									
					
				'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
		
		
	}
	public function saveAC(){
		$aircraft=new AircraftAirworthinessInfo;
		
		$aircraft->aircraft_MM=Input::get('aircraft_MM',' ');
		$aircraft->aircraft_MSN=Input::get('aircraft_MSN',' ');
		
		$aircraft->ac_effective_date=Input::get('ac_effective_date',' ');
		$aircraft->ac_effective_month=Input::get('ac_effective_month',' ');
		$aircraft->ac_effective_year=Input::get('ac_effective_year',' ');
		$aircraft->ac_cofa_type=Input::get('ac_cofa_type',' ');
		$aircraft->ac_category=Input::get('ac_category',' ');
		$aircraft->ac_activation_control_number=Input::get('ac_activation_control_number',' ');
		$aircraft->c_of_a_number=Input::get('c_of_a_number',' ');
		$aircraft->ac_expiration_date=Input::get('ac_expiration_date',' ');
		$aircraft->ac_expiration_month=Input::get('ac_expiration_month',' ');
		$aircraft->ac_expiration_year=Input::get('ac_expiration_year',' ');
		$aircraft->max_gross_take_off_weight=Input::get('max_gross_take_off_weight',' ');
		$aircraft->max_pax_seating_capacity=Input::get('max_pax_seating_capacity',' ');
		$aircraft->mode_s_code=Input::get('mode_s_code',' ');
		$aircraft->ac_deactivation_date=Input::get('ac_deactivation_date',' ');
		$aircraft->ac_deactivation_month=Input::get('ac_deactivation_month',' ');
		$aircraft->ac_deactivation_year=Input::get('ac_deactivation_year',' ');
		$aircraft->ac_deactivation_basis=Input::get('ac_deactivation_basis',' ');
		$aircraft->ac_deactivation_control_number=Input::get('ac_deactivation_control_number',' ');
		$aircraft->system_of_airwothiness=Input::get('system_of_airwothiness',' ');
		$aircraft->ac_status_memo=Input::get('ac_status_memo',' ');
		$aircraft->ac_exemption=Input::get('ac_exemption',' ');

		$ac_upload=parent::fileUpload('ac_upload','air_ac_upload');
		$aircraft->ac_upload=$ac_upload;
		
		$aircraft->approve='1';
		$aircraft->warning='0';
		$aircraft->soft_delete='0';

		$aircraft->created_at=date('Y-m-d H:i:s');
		$aircraft->updated_at=date('Y-m-d H:i:s');
		
		$aircraft->save();
		return Redirect::back()->with('massage','Information Added Successfully!');
	}
	public function editAC(){
	$ac_upload=parent::updateFileUpload('old_ac_upload','ac_upload','air_ac_upload');			
	   $id= Input::get('id');
			DB::table('aircraft_airworthiness_info')
            ->where('id','=',$id)
            ->update(array(
				'ac_effective_date' => Input::get('ac_effective_date'),				
				'ac_effective_month' => Input::get('ac_effective_month'),				
				'ac_effective_year' => Input::get('ac_effective_year'),				
				'ac_cofa_type' => Input::get('ac_cofa_type'),				
				'ac_category' => Input::get('ac_category'),				
				'ac_activation_control_number' => Input::get('ac_activation_control_number'),				
				'c_of_a_number' => Input::get('c_of_a_number'),				
				'ac_expiration_date' => Input::get('ac_expiration_date'),				
				'ac_expiration_month' => Input::get('ac_expiration_month'),				
				'ac_expiration_year' => Input::get('ac_expiration_year'),				
				'max_gross_take_off_weight' => Input::get('max_gross_take_off_weight'),				
				'max_pax_seating_capacity' => Input::get('max_pax_seating_capacity'),				
				'mode_s_code' => Input::get('mode_s_code'),				
				'ac_deactivation_date' => Input::get('ac_deactivation_date'),				
				'ac_deactivation_month' => Input::get('ac_deactivation_month'),				
				'ac_deactivation_year' => Input::get('ac_deactivation_year'),				
				'ac_deactivation_basis' => Input::get('ac_deactivation_basis'),				
				'ac_deactivation_control_number' => Input::get('ac_deactivation_control_number'),				
				'system_of_airwothiness' => Input::get('system_of_airwothiness'),				
				'ac_status_memo' => Input::get('ac_status_memo'),				
				'ac_exemption' => Input::get('ac_exemption'),

				'ac_upload' =>$ac_upload,				
											
					
				'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
		
		
	}
	public function saveApproval(){
		$aircraft=new AircraftCAAApprovalInfo;
		
		$aircraft->aircraft_MM=Input::get('aircraft_MM',' ');
		$aircraft->aircraft_MSN=Input::get('aircraft_MSN',' ');
		
		$aircraft->type_of_approval=Input::get('type_of_approval');
		$aircraft->approval_effective_date=Input::get('approval_effective_date');
		$aircraft->approval_effective_month=Input::get('approval_effective_month');
		$aircraft->approval_effective_year=Input::get('approval_effective_year');
		$aircraft->approval_control_number=Input::get('approval_control_number');
		$aircraft->rescinded_date=Input::get('rescinded_date');
		$aircraft->rescinded_month=Input::get('rescinded_month');
		$aircraft->rescinded_year=Input::get('rescinded_year');
		$aircraft->rescinded_control_number=Input::get('rescinded_control_number');
		$aircraft->limiting_factor=Input::get('limiting_factor');
		$aircraft->terms_of_approval_memo=Input::get('terms_of_approval_memo');
		

		$approval_upload=parent::fileUpload('approval_upload','air_approval_upload');
		$aircraft->approval_upload=$approval_upload;

		$aircraft->approve='1';
		$aircraft->warning='0';
		$aircraft->soft_delete='0';

		$aircraft->created_at=date('Y-m-d H:i:s');
		$aircraft->updated_at=date('Y-m-d H:i:s');
		
		$aircraft->save();
		return Redirect::back()->with('massage','Information Added Successfully!');
		
	}
	public function editApproval(){		
	$approval_upload=parent::updateFileUpload('old_approval_upload','approval_upload','air_approval_upload');
	   $id= Input::get('id');
			DB::table('aircraft_caa_approval_info')
            ->where('id','=',$id)
            ->update(array(
				'type_of_approval' => Input::get('type_of_approval'),				
				'approval_effective_date' => Input::get('approval_effective_date'),				
				'approval_effective_month' => Input::get('approval_effective_month'),				
				'approval_effective_year' => Input::get('approval_effective_year'),				
				'approval_control_number' => Input::get('approval_control_number'),				
				'rescinded_date' => Input::get('rescinded_date'),				
				'rescinded_month' => Input::get('rescinded_month'),				
				'rescinded_year' => Input::get('rescinded_year'),				
				'rescinded_control_number' => Input::get('rescinded_control_number'),				
				'limiting_factor' => Input::get('limiting_factor'),				
				'terms_of_approval_memo' => Input::get('terms_of_approval_memo'),	

				'approval_upload' =>$approval_upload,				
				
					
				'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
		
		
	}
	public function saveOwner(){
		$aircraft=new AircraftOwnerInfo;
		
		$aircraft->aircraft_MM=Input::get('aircraft_MM');
		$aircraft->aircraft_MSN=Input::get('aircraft_MSN');
		
		$aircraft->owner_name=Input::get('owner_name');
		$aircraft->owner_effective_date=Input::get('owner_effective_date');
		$aircraft->owner_effective_month=Input::get('owner_effective_month');
		$aircraft->owner_effective_year=Input::get('owner_effective_year');
		$aircraft->owner_address1=Input::get('owner_address1');
		$aircraft->owner_address2=Input::get('owner_address2');
		$aircraft->owner_phone=Input::get('owner_phone');
		$aircraft->owner_fax=Input::get('owner_fax');
		$aircraft->owner_email=Input::get('owner_email');
		$aircraft->owner_city=Input::get('owner_city');
		$aircraft->owner_state_or_province=Input::get('owner_state_or_province');
		$aircraft->owner_postal_code=Input::get('owner_postal_code');
		$aircraft->owner_country=Input::get('owner_country');
		$aircraft->owner_lessor=Input::get('owner_lessor');
		

		$owner_upload=parent::fileUpload('owner_upload','air_owner_upload');
		$aircraft->owner_upload=$owner_upload;

		$aircraft->approve='1';
		$aircraft->warning='0';
		$aircraft->soft_delete='0';

		$aircraft->created_at=date('Y-m-d H:i:s');
		$aircraft->updated_at=date('Y-m-d H:i:s');
		
		$aircraft->save();
		return Redirect::back()->with('massage','Information Added Successfully!');
		
	}
	public function editOwner(){	
	$owner_upload=parent::updateFileUpload('old_owner_upload','owner_upload','air_owner_upload');	
	   $id= Input::get('id');
			DB::table('aircraft_owner_info')
            ->where('id','=',$id)
            ->update(array(
				'owner_name' => Input::get('owner_name'),				
				'owner_effective_date' => Input::get('owner_effective_date'),				
				'owner_effective_month' => Input::get('owner_effective_month'),				
				'owner_effective_year' => Input::get('owner_effective_year'),				
				'owner_address1' => Input::get('owner_address1'),				
				'owner_address2' => Input::get('owner_address2'),				
				'owner_phone' => Input::get('owner_phone'),				
				'owner_fax' => Input::get('owner_fax'),				
				'owner_email' => Input::get('owner_email'),				
				'owner_city' => Input::get('owner_city'),				
				'owner_state_or_province' => Input::get('owner_state_or_province'),				
				'owner_postal_code' => Input::get('owner_postal_code'),				
				'owner_country' => Input::get('owner_country'),				
				'owner_lessor' => Input::get('owner_lessor'),		
				'owner_upload' =>$owner_upload,		
					
				'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
		
		
	}
	public function saveLessee(){
		$aircraft=new AircraftLesseeInfo;
		
		$aircraft->aircraft_MM=Input::get('aircraft_MM');
		$aircraft->aircraft_MSN=Input::get('aircraft_MSN');
		
		$aircraft->lessee=Input::get('lessee');
		$aircraft->lessee_effective_date=Input::get('lessee_effective_date');
		$aircraft->lessee_effective_month=Input::get('lessee_effective_month');
		$aircraft->lessee_effective_year=Input::get('lessee_effective_year');
		$aircraft->lessee_address1=Input::get('lessee_address1');
		$aircraft->lessee_address2=Input::get('lessee_address2');
		$aircraft->lessee_phone=Input::get('lessee_phone');
		$aircraft->lessee_fax=Input::get('lessee_fax');
		$aircraft->lessee_email=Input::get('lessee_email');
		$aircraft->lessee_city=Input::get('lessee_city');
		$aircraft->lessee_state_or_province=Input::get('lessee_state_or_province');
		$aircraft->lessee_postal_code=Input::get('lessee_postal_code');
		$aircraft->lessee_country=Input::get('lessee_country');
		
		$lesse_upload=parent::fileUpload('lesse_upload','air_lesse_upload');
		$aircraft->lesse_upload=$lesse_upload;



		$aircraft->approve='1';
		$aircraft->warning='0';
		$aircraft->soft_delete='0';	

		$aircraft->created_at=date('Y-m-d H:i:s');		
		$aircraft->updated_at=date('Y-m-d H:i:s');		
		
		$aircraft->save();
		return Redirect::back()->with('massage','Information Added Successfully!');
		
	}
	public function editLessee(){	
	$lesse_upload=parent::updateFileUpload('old_lesse_upload','lesse_upload','air_lesse_upload');	
	   $id= Input::get('id');
			DB::table('aircraft_lessee_info')
            ->where('id','=',$id)
            ->update(array(
				'lessee' => Input::get('lessee'),				
				'lessee_effective_date' => Input::get('lessee_effective_date'),				
				'lessee_effective_month' => Input::get('lessee_effective_month'),				
				'lessee_effective_year' => Input::get('lessee_effective_year'),				
				'lessee_address1' => Input::get('lessee_address1'),				
				'lessee_address2' => Input::get('lessee_address2'),				
				'lessee_phone' => Input::get('lessee_phone'),				
				'lessee_fax' => Input::get('lessee_fax'),				
				'lessee_email' => Input::get('lessee_email'),				
				'lessee_city' => Input::get('lessee_city'),				
				'lessee_state_or_province' => Input::get('lessee_state_or_province'),				
				'lessee_postal_code' => Input::get('lessee_postal_code'),				
				'lessee_country' => Input::get('lessee_country'),

				'lesse_upload' =>$lesse_upload,				
				
					
				'updated_at' =>date('Y-m-d H:i:s')	
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
		
		
	}
	public function saveInsurer(){
		$aircraft=new AircraftInsurerInfo;
		
		$aircraft->aircraft_MM=Input::get('aircraft_MM');
		$aircraft->aircraft_MSN=Input::get('aircraft_MSN');
		
		$aircraft->insurer_name=Input::get('insurer_name');
		$aircraft->name_insured=Input::get('name_insured');
		$aircraft->insurer_address1=Input::get('insurer_address1');
		$aircraft->insurer_address2=Input::get('insurer_address2');
		$aircraft->insurer_phone=Input::get('insurer_phone');
		$aircraft->insurer_fax=Input::get('insurer_fax');
		$aircraft->insurer_email=Input::get('insurer_email');
		$aircraft->insurer_city=Input::get('insurer_city');
		$aircraft->insurer_state_or_province=Input::get('insurer_state_or_province');
		$aircraft->insurer_postal_code=Input::get('insurer_postal_code');
		$aircraft->insurer_country=Input::get('insurer_country');
		$aircraft->insurer_liability_amount=Input::get('insurer_liability_amount');
		$aircraft->insurer_effective_date=Input::get('insurer_effective_date');
		$aircraft->insurer_effective_month=Input::get('insurer_effective_month');
		$aircraft->insurer_effective_year=Input::get('insurer_effective_year');
		$aircraft->insurer_expiration_date=Input::get('insurer_expiration_date');
		$aircraft->insurer_expiration_month=Input::get('insurer_expiration_month');
		$aircraft->insurer_expiration_year=Input::get('insurer_expiration_year');
		
		$insurer_upload=parent::fileUpload('insurer_upload','air_insurer_upload');
		$aircraft->insurer_upload=$insurer_upload;
		


		$aircraft->approve='1';
		$aircraft->warning='0';
		$aircraft->soft_delete='0';		

		$aircraft->created_at=date('Y-m-d H:i:s');		
		$aircraft->updated_at=date('Y-m-d H:i:s');		
		
		$aircraft->save();
		return Redirect::back()->with('massage','Information Added Successfully!');
		
	}
	public function editInsurer(){		
	   $insurer_upload=parent::updateFileUpload('old_insurer_upload','insurer_upload','air_insurer_upload');
	   $id= Input::get('id');
			DB::table('aircraft_insurer_info')
            ->where('id','=',$id)
            ->update(array(
				'insurer_name' => Input::get('insurer_name'),				
				'name_insured' => Input::get('name_insured'),				
				'insurer_address1' => Input::get('insurer_address1'),				
				'insurer_address2' => Input::get('insurer_address2'),				
				'insurer_phone' => Input::get('insurer_phone'),				
				'insurer_fax' => Input::get('insurer_fax'),				
				'insurer_email' => Input::get('insurer_email'),				
				'insurer_city' => Input::get('insurer_city'),				
				'insurer_state_or_province' => Input::get('insurer_state_or_province'),				
				'insurer_country' => Input::get('insurer_country'),				
				'insurer_liability_amount' => Input::get('insurer_liability_amount'),				
				'insurer_effective_date' => Input::get('insurer_effective_date'),				
				'insurer_effective_month' => Input::get('insurer_effective_month'),				
				'insurer_effective_month' => Input::get('insurer_effective_month'),				
				'insurer_effective_year' => Input::get('insurer_effective_year'),				
				'insurer_expiration_date' => Input::get('insurer_expiration_date'),				
				'insurer_expiration_month' => Input::get('insurer_expiration_month'),				
				'insurer_expiration_year' => Input::get('insurer_expiration_year'),
				'insurer_upload' =>$insurer_upload,		
					
				'updated_at' =>date('Y-m-d H:i:s')	
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
		
		
	}
	public function saveEquipmentReview(){
		$aircraft=new AircraftEquipmentReviewInfo;
		
		$aircraft->aircraft_MM=Input::get('aircraft_MM');
		$aircraft->aircraft_MSN=Input::get('aircraft_MSN');
		
		$aircraft->review_date=Input::get('review_date');
		$aircraft->review_month=Input::get('review_month');
		$aircraft->review_year=Input::get('review_year');
		$aircraft->review_active=Input::get('review_active');
		$aircraft->purpose_of_review=Input::get('purpose_of_review');
		$aircraft->location=Input::get('location');
		$aircraft->airframe_hours=Input::get('airframe_hours');
		$aircraft->engine1_hours=Input::get('engine1_hours');
		$aircraft->engine2_hours=Input::get('engine2_hours');
		$aircraft->engine1_TSO=Input::get('engine1_TSO');
		$aircraft->engine2_TSO=Input::get('engine2_TSO');
		$aircraft->engine1_MMS=Input::get('engine1_MMS');
		$aircraft->engine2_MMS=Input::get('engine2_MMS');
		$aircraft->prop_rotor1_MMS=Input::get('prop_rotor1_MMS');
		$aircraft->prop_rotor2_MMS=Input::get('prop_rotor2_MMS');
		$aircraft->governor1_MMS=Input::get('governor1_MMS');
		$aircraft->governor2_MMS=Input::get('governor2_MMS');
		$aircraft->nav1_MMS=Input::get('nav1_MMS');
		$aircraft->nav2_MMS=Input::get('nav2_MMS');
		$aircraft->gps_mm=Input::get('gps_mm');
		$aircraft->adf_mm=Input::get('adf_mm');
		$aircraft->ils_mm=Input::get('ils_mm');
		$aircraft->vnav_mm=Input::get('vnav_mm');
		$aircraft->comm1_mm=Input::get('comm1_mm');
		$aircraft->comm2_mm=Input::get('comm2_mm');
		$aircraft->lr_comm_mm=Input::get('lr_comm_mm');
		$aircraft->tcas_mm=Input::get('tcas_mm');
		$aircraft->transponder_mm=Input::get('transponder_mm');
		$aircraft->transponder_mode=Input::get('transponder_mode');
		$aircraft->fdr_mm=Input::get('fdr_mm');
		$aircraft->fdr_mode=Input::get('fdr_mode');
		$aircraft->fdr_pinger_type=Input::get('fdr_pinger_type');
		$aircraft->cvr_mm=Input::get('cvr_mm');
		$aircraft->elt_mm=Input::get('elt_mm');
		$aircraft->note=Input::get('note');
		
		$equip_upload=parent::fileUpload('equip_upload','air_equip_upload');
		$aircraft->equip_upload=$equip_upload;
		
		$aircraft->approve='1';
		$aircraft->warning='0';
		$aircraft->soft_delete='0';		

		$aircraft->created_at=date('Y-m-d H:i:s');		
		$aircraft->updated_at=date('Y-m-d H:i:s');		
		
		$aircraft->save();
		return Redirect::back()->with('massage','Information Added Successfully!');
		
	}
	public function editEquipmentReview(){	
	$equip_upload=parent::updateFileUpload('old_equip_upload','equip_upload','air_equip_upload');	
	   $id= Input::get('id');
			DB::table('aircraft_equipment_review_info')
            ->where('id','=',$id)
            ->update(array(
				'review_date' => Input::get('review_date'),				
				'review_month' => Input::get('review_month'),				
				'review_year' => Input::get('review_year'),				
				'review_active' => Input::get('review_active'),				
				'purpose_of_review' => Input::get('purpose_of_review'),				
				'location' => Input::get('location'),				
				'airframe_hours' => Input::get('airframe_hours'),				
				'engine1_hours' => Input::get('engine1_hours'),				
				'engine2_hours' => Input::get('engine2_hours'),				
				'engine1_TSO' => Input::get('engine1_TSO'),				
				'engine2_TSO' => Input::get('engine2_TSO'),				
				'engine1_MMS' => Input::get('engine1_MMS'),				
				'engine2_MMS' => Input::get('engine2_MMS'),				
				'prop_rotor1_MMS' => Input::get('prop_rotor1_MMS'),				
				'prop_rotor2_MMS' => Input::get('prop_rotor2_MMS'),				
				'governor1_MMS' => Input::get('governor1_MMS'),				
				'governor2_MMS' => Input::get('governor2_MMS'),				
				'nav1_MMS' => Input::get('nav1_MMS'),				
				'nav2_MMS' => Input::get('nav2_MMS'),				
				'gps_mm' => Input::get('gps_mm'),				
				'adf_mm' => Input::get('adf_mm'),				
				'ils_mm' => Input::get('ils_mm'),				
				'vnav_mm' => Input::get('vnav_mm'),				
				'comm1_mm' => Input::get('comm1_mm'),				
				'comm2_mm' => Input::get('comm2_mm'),				
				'lr_comm_mm' => Input::get('lr_comm_mm'),				
				'tcas_mm' => Input::get('tcas_mm'),				
				'transponder_mm' => Input::get('transponder_mm'),				
				'transponder_mode' => Input::get('transponder_mode'),				
				'fdr_mm' => Input::get('fdr_mm'),				
				'fdr_mode' => Input::get('fdr_mode'),				
				'fdr_pinger_type' => Input::get('fdr_pinger_type'),				
				'cvr_mm' => Input::get('cvr_mm'),				
				'elt_mm' => Input::get('elt_mm'),				
				'note' => Input::get('note'),	

				'equip_upload' =>$equip_upload,				
				
					
				'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
		
		
	}
	//End Save Data
	//Approve
	public function approve($table,$id,$pageId=''){
		 DB::table($table)
            ->where('id',$id)
            ->update(array(
			   'approve' =>'1',
			   'updated_at' =>time()	
			));
	   return Redirect::back()->with('message', 'Approval Information Updated !!');
	}
	public function notApprove($table,$id,$pageId=''){
		 DB::table($table)
            ->where('id',$id)
            ->update(array(
			   'approve' =>'0',
			   'updated_at' =>time()	
			));
	   return Redirect::back()->with('message', 'Approval Information Updated !!');
	}
	//End Approve
	//warning
	public function warning($table,$id,$pageId=''){
		 DB::table($table)
            ->where('id',$id)
            ->update(array(
			   'warning' =>'1',
			   'updated_at' =>time()	
			));
	   return Redirect::back()->with('message', 'Warning Data updated!!');
	}
	public function removeWarning($table,$id,$pageId=''){
		 DB::table($table)
            ->where('id',$id)
            ->update(array(
			   'warning' =>'0',
			   'updated_at' =>time()	
			));
	   return Redirect::back()->with('message', 'Warning Data updated!!');
	}
	//End warning
	//soft delete
	public function softDelete($table,$id,$pageId=''){
		 DB::table($table)
            ->where('id',$id)
            ->update(array(
			   'soft_delete' =>'1',
			   'updated_at' =>time()	
			));
	   return Redirect::back()->with('message', 'Data Deleted Softly !!');
	}
	public function undoSoftDelete($table,$id,$pageId=''){
		 DB::table($table)
            ->where('id',$id)
            ->update(array(
			   'soft_delete' =>'0',
			   'updated_at' =>time()	
			));
	   return Redirect::back()->with('message', 'Data Approved !!');
	}
	//End soft delete
	//Permanent delete
	public function permanentDelete($table,$id,$pageId=''){
		 DB::table($table)
            ->where('id',$id)
            ->delete();
	   return Redirect::back()->with('message', 'Data Deleted Permanently !!');
	}
	//End Permanent delete
	public function aircraftSingle($mm,$msn){
	
	$primaryData=DB::table('aircraft_primary_info')->where('aircraft_MM', '=',$mm)->where('aircraft_MSN', '=',$msn)->where('soft_delete', '=','0')->get();
	$tcData=DB::table('aircraft_tc_info')->where('aircraft_MM', '=',$mm)->where('aircraft_MSN', '=',$msn)->where('soft_delete', '=','0')->get();
	$stcData=DB::table('aircraft_stc_info')->where('aircraft_MM', '=',$mm)->where('aircraft_MSN', '=',$msn)->where('soft_delete', '=','0')->get();
	$exemptionData=DB::table('aircraft_exemption_info')->where('aircraft_MM', '=',$mm)->where('aircraft_MSN', '=',$msn)->where('soft_delete', '=','0')->get();
	$registrationData=DB::table('aircraft_registration_info')->where('aircraft_MM', '=',$mm)->where('aircraft_MSN', '=',$msn)->where('soft_delete', '=','0')->get();
	$airworthinessData=DB::table('aircraft_airworthiness_info')->where('aircraft_MM', '=',$mm)->where('aircraft_MSN', '=',$msn)->where('soft_delete', '=','0')->get();
	$approvalData=DB::table('aircraft_caa_approval_info')->where('aircraft_MM', '=',$mm)->where('aircraft_MSN', '=',$msn)->where('soft_delete', '=','0')->get();
	$ownerData=DB::table('aircraft_owner_info')->where('aircraft_MM', '=',$mm)->where('aircraft_MSN', '=',$msn)->where('soft_delete', '=','0')->get();
	$lesseeData=DB::table('aircraft_lessee_info')->where('aircraft_MM', '=',$mm)->where('aircraft_MSN', '=',$msn)->where('soft_delete', '=','0')->get();
	$insurerData=DB::table('aircraft_insurer_info')->where('aircraft_MM', '=',$mm)->where('aircraft_MSN', '=',$msn)->where('soft_delete', '=','0')->get();
	$equipmentData=DB::table('aircraft_equipment_review_info')->where('aircraft_MM', '=',$mm)->where('aircraft_MSN', '=',$msn)->where('soft_delete', '=','0')->get();
	$organizations =DB::table('users')->lists('organization');
	
	$select=array(''=>'--Select--');
	$inspectors=DB::table('users')->where('role','=','Inspector')->lists('name','name');
	$inspectors=array_merge($select,$inspectors);
	
		return View::make('aircraft/aircraft-single')
		->with('PageName','Aircraft Info.')
		->with('personnel', parent::getPersonnelInfo())
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		->with('primaryData',$primaryData)
		->with('tcData',$tcData)
		->with('stcData',$stcData)
		->with('exemptionData',$exemptionData)
		->with('registrationData',$registrationData)
		->with('airworthinessData',$airworthinessData)
		->with('approvalData',$approvalData)
		->with('ownerData',$ownerData)
		->with('lesseeData',$lesseeData)
		->with('insurerData',$insurerData)
		->with('equipmentData',$equipmentData)
		->with('organizations',$organizations)
		->with('inspectors',$inspectors)
		->with('ND',0)
		
		;
	}

	public function addNewAircraft(){
		$organizations =DB::table('users')->lists('organization');
		$select=array(''=>'--Select--');
		$inspectors=DB::table('users')->where('role','=','Inspector')->lists('name','name');
		$inspectors=array_merge($select,$inspectors);
		return View::make('aircraft/new_aircraft')
		->with('PageName','Aircraft')
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		->with('organizations',$organizations)
		->with('inspectors',$inspectors);
	}
	public function aircraftList(){
		$aircrafts=DB::table('aircraft_primary_info')
					->where('soft_delete','<>','1')
					->orderBy('aircraft_operator')
					->get();
		return View::make('aircraft.index')
		->with('PageName','Aircraft List')
		->with('aircrafts',$aircrafts);
	}
	public function myAircraftList(){
	$org=Auth::User()->Organization();
		 $aircrafts=DB::table('aircraft_primary_info')
					->where('aircraft_operator','=',$org)
					->where('soft_delete','<>','1')
					->orderBy('aircraft_operator')
					->get();
		return View::make('aircraft.myAircraftList')
		->with('PageName','My Aircraft List')
		->with('aircrafts',$aircrafts);
	}
}