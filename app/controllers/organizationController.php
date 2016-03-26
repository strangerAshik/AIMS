<?php

class OrganizationController extends \BaseController {

	
	
	/*
	This function track all kind of changes in a module. 
	This is made specially for Organization module
	*/
	protected  function updateTracking($tableName,$orgNum){
	DB::table('org_update_tracking')->insert(array(
				'table_name'=>$tableName,
				'updater'=>Auth::user()->getName(),
				'date_time'=>date('d  F  Y '),
				//'date_time'=>time(),
				'org_number'=>$orgNum,
		 	));
	}
	public function main()
	{
		return View::make('organization.main')
		->with('PageName','Organization Dashbord')
		->with('active','organization')

		;
	}
public function organizationList(){

$infos=DB::table('org_primary')			
			->where('soft_delete','<>','1')
			->get();
	return View::make('organization.listOrg')
		->with('PageName','Organization List')
		->with('active','organization')
		->with('infos',$infos);
}
public function myOrganization(){

$infos=DB::table('org_primary')			
			->where('soft_delete','<>','1')
			->where('org_name','=',Auth::user()->Organization())
			->get();
	return View::make('organization.myOrg')
		->with('PageName','My Organization')
		->with('active','organization')
		->with('infos',$infos);
}


	public function newOrganization()
	{
		$organizations =DB::table('users')->lists('organization');
		return View::make('organization.newOrg')
		->with('organizations',$organizations)
		->with('PageName','New Organization')
		->with('active','organization')
		;
	}
 

	public function singleOrganization($orgNum){
$organizations =DB::table('users')->lists('organization');
$orgPrimary=DB::table('org_primary')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_business_name=DB::table('org_business_name')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_certificates=DB::table('org_certificates')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_base_location=DB::table('org_base_location')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_management_contacts=DB::table('org_management_contacts')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_caa_contacts=DB::table('org_caa_contacts')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_exemptions_divinations=DB::table('org_exemptions_divinations')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_aircraft_listings=DB::table('org_aircraft_listings')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_policy_menual_approvals=DB::table('org_policy_menual_approvals')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_complexity_reviews=DB::table('org_complexity_reviews')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_aerial_work_approvals=DB::table('org_aerial_work_approvals')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_non_certificated_operations=DB::table('org_non_certificated_operations')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_flight_operation_approvals=DB::table('org_flight_operation_approvals')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_fleet_operation_approvals=DB::table('org_fleet_operation_approvals')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_fleet_maintanance_approvals=DB::table('org_fleet_maintanance_approvals')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_airport_auth=DB::table('org_airport_auth')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_leasing_arrangment=DB::table('org_leasing_arrangment')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->get();
$org_contracted_services=DB::table('org_contracted_services')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_amo_approvals=DB::table('org_amo_approvals')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_ato_approvals=DB::table('org_ato_approvals')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_aoc_approvals_areas=DB::table('org_aoc_approvals_areas')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_aoc_approval_routes=DB::table('org_aoc_approval_routes')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_aoc_maintenance_arrangement=DB::table('org_aoc_maintenance_arrangement')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_aoc_training_arrangement=DB::table('org_aoc_training_arrangement')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_approval_simulators=DB::table('org_approval_simulators')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_financial_status=DB::table('org_financial_status')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_operations_specifications=DB::table('org_operations_specifications')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_aoc_certificate=DB::table('org_aoc_certificate')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
$org_docs=DB::table('org_document_list')
			->where('org_number','=',$orgNum)
			->where('soft_delete','<>','1')
			->orderBy('id','desc')
			->get();
		return View::make('organization.singleOrg')
		->with('PageName','Single Organization')
		->with('active','organization')
		->with('orgPrimary',$orgPrimary)
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		->with('years_from',parent::years_from())
		->with('org_business_name',$org_business_name)
		->with('org_certificates',$org_certificates)
		->with('org_base_location',$org_base_location)
		->with('org_management_contacts',$org_management_contacts)
		->with('org_caa_contacts',$org_caa_contacts)
		->with('org_exemptions_divinations',$org_exemptions_divinations)
		->with('org_aircraft_listings',$org_aircraft_listings)
		->with('org_policy_menual_approvals',$org_policy_menual_approvals)
		->with('org_complexity_reviews',$org_complexity_reviews)
		->with('org_aerial_work_approvals',$org_aerial_work_approvals)
		->with('org_non_certificated_operations',$org_non_certificated_operations)
		->with('org_flight_operation_approvals',$org_flight_operation_approvals)
		->with('org_fleet_operation_approvals',$org_fleet_operation_approvals)
		->with('org_fleet_maintanance_approvals',$org_fleet_maintanance_approvals)
		->with('org_airport_auth',$org_airport_auth)
		->with('org_leasing_arrangment',$org_leasing_arrangment)
		->with('org_leasing_arrangment',$org_leasing_arrangment)
		->with('org_contracted_services',$org_contracted_services)
		->with('org_amo_approvals',$org_amo_approvals)
		->with('org_ato_approvals',$org_ato_approvals)
		->with('org_aoc_approvals_areas',$org_aoc_approvals_areas)
		->with('org_aoc_approval_routes',$org_aoc_approval_routes)
		->with('org_aoc_maintenance_arrangement',$org_aoc_maintenance_arrangement)
		->with('org_aoc_training_arrangement',$org_aoc_training_arrangement)
		->with('org_approval_simulators',$org_approval_simulators)
		->with('org_financial_status',$org_financial_status)
		->with('org_operations_specifications',$org_operations_specifications)
		->with('org_aoc_certificate',$org_aoc_certificate)
		->with('org_docs',$org_docs)
		->with('organizations',$organizations)
		;
	}

	public function saveOrgPrimary()
	{
		$validation=Validator::make(Input::all(),OrgCommonFunction::$OrgPrimaryRule);
		if($validation->fails())
			{
				return Redirect::back()->with('error', 'Organization Number Should Be Unique!!');
			}
		$org=new OrgPrimary;    

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->org_type=Input::get('org_type');
		$org->active=Input::get('active');

		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_primary',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::to('organization/singleOrganization/'.Input::get('org_number'));


	}
	public function updateOrgPrimary(){
		$id=Input::get('id');
		DB::table('org_primary')
		->where('id',$id)
		->update(array(

		'org_number' => Input::get('org_number'),		
		'org_name' => Input::get('org_name'),
		'org_type' => Input::get('org_type'),
		'active' => Input::get('active'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_primary',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Org Primary Data Updated ');
	}

	public function saveOrgbusinessName(){
		$org=new OrgBusinessName;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_business_name=Input::get('org_business_name');
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_business_name_note=Input::get('org_business_name_note');
		


		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_business_name',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Business Name Saved');
	}
	public function updateOrgbusinessName(){
		 $id=Input::get('id');
		 DB::table('org_business_name')
		->where('id',Input::get('id'))
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),
		'org_business_name' => Input::get('org_business_name'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_business_name_note' => Input::get('org_business_name_note'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_business_name',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	public function saveOrgCertificate(){
		$org=new OrgCertificate;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_certificate_type=Input::get('org_certificate_type');

		$org->org_issued_date=Input::get('org_issued_date');
		$org->org_issued_month=Input::get('org_issued_month');
		$org->org_issued_year=Input::get('org_issued_year');

		$org->org_expiration_date=Input::get('org_expiration_date');
		$org->org_expiration_month=Input::get('org_expiration_month');
		$org->org_expiration_year=Input::get('org_expiration_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->org_control_number=Input::get('org_control_number');
		$org->org_basis_note=Input::get('org_basis_note');


		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_certificates',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Certificate Information Saved');

	}
	public function updateOrgCertificate(){
		$id=Input::get('id');
		 DB::table('org_certificates')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_certificate_type' => Input::get('org_certificate_type'),

		'org_issued_date' => Input::get('org_issued_date'),
		'org_issued_month' => Input::get('org_issued_month'),
		'org_issued_year' => Input::get('org_issued_year'),

		'org_expiration_date' => Input::get('org_expiration_date'),
		'org_expiration_month' => Input::get('org_expiration_month'),
		'org_expiration_year' => Input::get('org_expiration_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'org_control_number' => Input::get('org_control_number'),
		'org_basis_note' => Input::get('org_basis_note'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_certificates',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}

	public function saveOrgBaseLocation(){
		
		$org=new OrgBaseLocation;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_location_type=Input::get('org_location_type');
		$org->contract_person=Input::get('contract_person');
		$org->org_telephone_number=Input::get('org_telephone_number');
		$org->org_fax_number=Input::get('org_fax_number');
		$org->org_lecation=Input::get('org_lecation');
		$org->org_address=Input::get('org_address');
		$org->org_city=Input::get('org_city');
		$org->org_state_province=Input::get('org_state_province');
		$org->org_postal_code=Input::get('org_postal_code');
		$org->org_country=Input::get('org_country');
		$org->memo_note=Input::get('memo_note');

		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_base_location',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Base Location Saved');
	}
	public function updateOrgBaseLocation(){
		$id=Input::get('id');
		 DB::table('org_base_location')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		
		'org_location_type' => Input::get('org_location_type'),
		'contract_person' => Input::get('contract_person'),
		'org_telephone_number' => Input::get('org_telephone_number'),
		'org_fax_number' => Input::get('org_fax_number'),
		'org_lecation' => Input::get('org_lecation'),
		'org_address' => Input::get('org_address'),
		'org_city' => Input::get('org_city'),
		'org_state_province' => Input::get('org_state_province'),
		'org_postal_code' => Input::get('org_postal_code'),
		'org_country' => Input::get('org_country'),
		'memo_note' => Input::get('memo_note'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_base_location',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}

	public function saveOrgManagementContact(){
		$org=new OrgManagementContact;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->management_position=Input::get('management_position');
		$org->first_name=Input::get('first_name');
		$org->last_name=Input::get('last_name');
		$org->actual_title=Input::get('actual_title');
		$org->work_phone=Input::get('work_phone');
		$org->cell_number=Input::get('cell_number');
		$org->fax_number=Input::get('fax_number');
		$org->location=Input::get('location');
		$org->email=Input::get('email');
		$org->address=Input::get('address');
		$org->city=Input::get('city');
		$org->state_province=Input::get('state_province');
		$org->postal_code=Input::get('postal_code');
		$org->country=Input::get('country');
		$org->control_number=Input::get('control_number');
		$org->memo_note=Input::get('memo_note');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_management_contacts',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Management Contact Saved');
	}
	public function updateOrgManagementContact(){
		$id=Input::get('id');
		 DB::table('org_management_contacts')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'management_position' => Input::get('management_position'),
		'first_name' => Input::get('first_name'),
		'last_name' => Input::get('last_name'),
		'actual_title' => Input::get('actual_title'),
		'work_phone' => Input::get('work_phone'),
		'cell_number' => Input::get('cell_number'),
		'fax_number' => Input::get('fax_number'),
		'location' => Input::get('location'),
		'email' => Input::get('email'),
		'address' => Input::get('address'),
		'city' => Input::get('city'),
		'state_province' => Input::get('state_province'),
		'postal_code' => Input::get('postal_code'),
		'country' => Input::get('country'),
		'control_number' => Input::get('control_number'),
		'memo_note' => Input::get('memo_note'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_management_contacts',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}

	public function saveOrgCAAContact(){
		$org=new OrgCAAContact;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->inspector_position=Input::get('inspector_position');
		$org->first_name=Input::get('first_name');
		$org->last_name=Input::get('last_name');
		$org->actual_title=Input::get('actual_title');
		$org->work_phone=Input::get('work_phone');
		$org->cell_number=Input::get('cell_number');
		$org->fax_number=Input::get('fax_number');
		$org->location=Input::get('location');
		$org->email=Input::get('email');
		$org->address=Input::get('address');
		$org->city=Input::get('city');
		$org->state_province=Input::get('state_province');
		$org->postal_code=Input::get('postal_code');
		$org->country=Input::get('country');
		$org->control_number=Input::get('control_number');
		$org->basis_note=Input::get('basis_note');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_caa_contacts',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','CAA Contact Saved');
	}
	public function updateOrgCAAContact(){
		$id=Input::get('id');
		 DB::table('org_caa_contacts')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'inspector_position' => Input::get('inspector_position'),
		'first_name' => Input::get('first_name'),
		'last_name' => Input::get('last_name'),
		'actual_title' => Input::get('actual_title'),
		'work_phone' => Input::get('work_phone'),
		'cell_number' => Input::get('cell_number'),
		'fax_number' => Input::get('fax_number'),
		'location' => Input::get('location'),
		'email' => Input::get('email'),
		'address' => Input::get('address'),
		'city' => Input::get('city'),
		'state_province' => Input::get('state_province'),
		'postal_code' => Input::get('postal_code'),
		'country' => Input::get('country'),
		'control_number' => Input::get('control_number'),
		'basis_note' => Input::get('basis_note'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_caa_contacts',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}

	public function saveOrgExemptionsDivination(){
		$org=new OrgExemptionsDivination;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->type=Input::get('type');
		$org->assigned_number=Input::get('assigned_number');
		$org->regulation=Input::get('regulation');
		$org->control_number=Input::get('control_number');
		$org->basis_note=Input::get('basis_note');

		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_exemptions_divinations',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Exemptions Divination Saved');
	}
	public function updateOrgExemptionsDivination(){
		$id=Input::get('id');
		 DB::table('org_exemptions_divinations')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'type' => Input::get('type'),
		'assigned_number' => Input::get('assigned_number'),
		'regulation' => Input::get('regulation'),
		'control_number' => Input::get('control_number'),
		'basis_note' => Input::get('basis_note'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_exemptions_divinations',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}

	public function saveOrgAircraftListing(){
		$org=new OrgAircraftListing;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->aircraft_mms=Input::get('aircraft_mms');
		$org->registration_number=Input::get('registration_number');
		$org->control_number=Input::get('control_number');
		$org->rvsm=Input::get('rvsm');
		$org->parts_pool=Input::get('parts_pool');
		$org->reliability=Input::get('reliability');
		$org->lease_acceptable=Input::get('lease_acceptable');
		$org->interchange=Input::get('interchange');
		$org->note=Input::get('note');

		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_aircraft_listings',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Aircraft Listing Saved');
	}
	public function updateOrgAircraftListing(){
		$id=Input::get('id');
		 DB::table('org_aircraft_listings')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'aircraft_mms' => Input::get('aircraft_mms'),
		'registration_number' => Input::get('registration_number'),
		'control_number' => Input::get('control_number'),
		'rvsm' => Input::get('rvsm'),
		'parts_pool' => Input::get('parts_pool'),
		'reliability' => Input::get('reliability'),
		'lease_acceptable' => Input::get('lease_acceptable'),
		'interchange' => Input::get('interchange'),
		'note' => Input::get('note'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_aircraft_listings',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	public function saveOrgPolicyMenualApproval(){
		$org=new OrgPolicyMenualApproval;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->type_of_approval=Input::get('type_of_approval');
		$org->revision_number=Input::get('revision_number');
		$org->control_number=Input::get('control_number');
		$org->basis_note=Input::get('basis_note');

		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_policy_menual_approvals',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Policy Menual Approval Saved');
	}
	public function updateOrgPolicyMenualApproval(){
		$id=Input::get('id');
		 DB::table('org_policy_menual_approvals')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'type_of_approval' => Input::get('type_of_approval'),
		'revision_number' => Input::get('revision_number'),
		'control_number' => Input::get('control_number'),
		'basis_note' => Input::get('basis_note'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_policy_menual_approvals',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	public function saveOrgComplexityReview(){
		$file=parent::fileUpload('organogram_upload','org_organogram');
		$org=new OrgComplexityReview;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_review_date=Input::get('org_review_date');
		$org->org_review_month=Input::get('org_review_month');
		$org->org_review_year=Input::get('org_review_year');

		$org->purpose_of_review=Input::get('purpose_of_review');
		$org->total_employees=Input::get('total_employees');
		$org->total_flt_ops_employees=Input::get('total_flt_ops_employees');
		$org->total_pilots=Input::get('total_pilots');
		$org->total_check_airmen=Input::get('total_check_airmen');
		$org->total_flight_attendants=Input::get('total_flight_attendants');
		$org->total_aircraft_dispatchers=Input::get('total_aircraft_dispatchers');
		$org->flight_followers=Input::get('flight_followers');
		$org->total_load_controllers=Input::get('total_load_controllers');
		$org->total_maint_employees=Input::get('total_maint_employees');
		$org->total_av_maint_technicians=Input::get('total_av_maint_technicians');
		$org->total_av_repair_specialists=Input::get('total_av_repair_specialists');
		$org->total_quality_assurance=Input::get('total_quality_assurance');

		$org->organogram_upload=$file;

		$org->note=Input::get('note');

		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_complexity_reviews',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Complexity Review Saved');
	}
	public function updateOrgComplexityReview(){
		$file=parent::updateFileUpload('old_organogram_upload','organogram_upload','org_organogram');
		$id=Input::get('id');
		 DB::table('org_complexity_reviews')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_review_date' => Input::get('org_review_date'),
		'org_review_month' => Input::get('org_review_month'),
		'org_review_year' => Input::get('org_review_year'),

		'purpose_of_review' => Input::get('purpose_of_review'),
		'total_employees' => Input::get('total_employees'),
		'total_flt_ops_employees' => Input::get('total_flt_ops_employees'),
		'total_pilots' => Input::get('total_pilots'),
		'total_check_airmen' => Input::get('total_check_airmen'),
		'total_flight_attendants' => Input::get('total_flight_attendants'),
		'total_aircraft_dispatchers' => Input::get('total_aircraft_dispatchers'),
		'flight_followers' => Input::get('flight_followers'),
		'total_load_controllers' => Input::get('total_load_controllers'),
		'total_maint_employees' => Input::get('total_maint_employees'),
		'total_av_maint_technicians' => Input::get('total_av_maint_technicians'),
		'total_av_repair_specialists' => Input::get('total_av_repair_specialists'),
		'total_quality_assurance' => Input::get('total_quality_assurance'),
		'organogram_upload' =>$file,
		'note' => Input::get('note'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_complexity_reviews',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	public function saveOrgAerialWorkApproval(){

		$org=new OrgAerialWorkApproval;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->type_of_approval=Input::get('type_of_approval');
		$org->revision_number=Input::get('revision_number');
		$org->aircraft_mms=Input::get('aircraft_mms');
		$org->control_number=Input::get('control_number');
		$org->method=Input::get('method');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_aerial_work_approvals',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Aerial Work Approval Saved');
	}
	public function updateOrgAerialWorkApproval(){
		$id=Input::get('id');
		 DB::table('org_aerial_work_approvals')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'type_of_approval' => Input::get('type_of_approval'),
		'revision_number' => Input::get('revision_number'),
		'aircraft_mms' => Input::get('aircraft_mms'),
		'control_number' => Input::get('control_number'),
		'method' => Input::get('method'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_aerial_work_approvals',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	public function saveOrgNonCertificatedOperation(){

		$org=new OrgNonCertificatedOperation;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->operations_type=Input::get('operations_type');
		$org->revision_number=Input::get('revision_number');
		$org->aircraft_mms=Input::get('aircraft_mms');
		$org->limiting_factor=Input::get('limiting_factor');
		$org->control_number=Input::get('control_number');
		$org->method=Input::get('method');
		$org->basis_notes=Input::get('basis_notes');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_non_certificated_operations',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Non Certificated Operation Saved');
	}
	public function updateOrgNonCertificatedOperation(){
		$id=Input::get('id');
		 DB::table('org_non_certificated_operations')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'operations_type' => Input::get('operations_type'),
		'revision_number' => Input::get('revision_number'),
		'aircraft_mms' => Input::get('aircraft_mms'),
		'limiting_factor' => Input::get('limiting_factor'),
		'limiting_factor' => Input::get('limiting_factor'),
		'control_number' => Input::get('control_number'),
		'method' => Input::get('method'),
		'basis_notes' => Input::get('basis_notes'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_non_certificated_operations',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	public function saveOrgFlightOperationsApproval(){

		$org=new OrgFlightOperationsApproval;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->type_of_approval=Input::get('type_of_approval');
		$org->revision_number=Input::get('revision_number');
		$org->limiting_factor=Input::get('limiting_factor');
		$org->control_number=Input::get('control_number');
		$org->method=Input::get('method');
		$org->basis_notes=Input::get('basis_notes');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_flight_operation_Approvals',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Flight Operations Approval Saved');
	}
	public function updateOrgFlightOperationsApproval(){
		$id=Input::get('id');
		 DB::table('org_flight_operation_approvals')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'type_of_approval' => Input::get('type_of_approval'),
		'revision_number' => Input::get('revision_number'),
		'limiting_factor' => Input::get('limiting_factor'),
		'control_number' => Input::get('control_number'),
		'method' => Input::get('method'),
		'basis_notes' => Input::get('basis_notes'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_flight_operation_Approvals',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	public function saveOrgFleetOperationApproval(){

		$org=new OrgFleetOperationApproval;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->type_of_approval=Input::get('type_of_approval');
		$org->revision_number=Input::get('revision_number');
		$org->limiting_factor=Input::get('limiting_factor');
		$org->aircraft_mms=Input::get('aircraft_mms');
		$org->control_number=Input::get('control_number');
		$org->equipment=Input::get('equipment');
		$org->method=Input::get('method');
		$org->basis_note=Input::get('basis_note');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_fleet_operation_approvals',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Fleet Operation Approval Saved');
	}
	public function updateOrgFleetOperationApproval(){
		$id=Input::get('id');
		 DB::table('org_fleet_operation_approvals')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'type_of_approval' => Input::get('type_of_approval'),
		'revision_number' => Input::get('revision_number'),
		'limiting_factor' => Input::get('limiting_factor'),
		'aircraft_mms' => Input::get('aircraft_mms'),
		'control_number' => Input::get('control_number'),
		'equipment' => Input::get('equipment'),
		'method' => Input::get('method'),
		'basis_note' => Input::get('basis_note'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_fleet_operation_approvals',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	
	public function saveOrgFleetMaintananceApproval(){

		$org=new OrgFleetMaintananceApproval;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->type_of_approval=Input::get('type_of_approval');
		$org->revision_number=Input::get('revision_number');
		$org->limiting_factor=Input::get('limiting_factor');
		$org->aircraft_mms=Input::get('aircraft_mms');
		$org->control_number=Input::get('control_number');
		$org->equipment=Input::get('equipment');
		$org->method=Input::get('method');
		$org->basis_note=Input::get('basis_note');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_fleet_maintanance_approvals',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Fleet Maintanance Approval Information Saved');
	}
	public function updateOrgFleetMaintananceApproval(){
		$id=Input::get('id');
		 DB::table('org_fleet_maintanance_approvals')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'type_of_approval' => Input::get('type_of_approval'),
		'revision_number' => Input::get('revision_number'),
		'limiting_factor' => Input::get('limiting_factor'),
		'aircraft_mms' => Input::get('aircraft_mms'),
		'control_number' => Input::get('control_number'),
		'equipment' => Input::get('equipment'),
		'method' => Input::get('method'),
		'basis_note' => Input::get('basis_note'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_fleet_maintanance_approvals',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	public function saveOrgAirportAuth(){

		$org=new OrgAirportAuth;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->location=Input::get('location');
		$org->type_of_approval=Input::get('type_of_approval');
		$org->revision_number=Input::get('revision_number');
		$org->limiting_factor=Input::get('limiting_factor');
		
		$org->aircraft_mms=Input::get('aircraft_mms');
		$org->control_number=Input::get('control_number');
		$org->note=Input::get('note');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_airport_auth',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Airport Auth. Information Saved');
	}
	public function updateOrgAirportAuth(){
		$id=Input::get('id');
		 DB::table('org_airport_auth')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'location' => Input::get('location'),
		'type_of_approval' => Input::get('type_of_approval'),
		'revision_number' => Input::get('revision_number'),
		'limiting_factor' => Input::get('limiting_factor'),
		'aircraft_mms' => Input::get('aircraft_mms'),
		'control_number' => Input::get('control_number'),
		'note' => Input::get('note'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_airport_auth',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	public function saveOrgLeasingArrangment(){

		$org=new OrgLeasingArrangment;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->arrangement=Input::get('arrangement');
		$org->revision_number=Input::get('revision_number');
		$org->other=Input::get('other');
		$org->control_number=Input::get('control_number');
		$org->notes=Input::get('notes');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_leasing_arrangment',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Leasing Arrangment Information Saved');
	}
	public function updateOrgLeasingArrangment(){
		
		$id=Input::get('id');
		 DB::table('org_leasing_arrangment')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'arrangement' => Input::get('arrangement'),
		'revision_number' => Input::get('revision_number'),
		'other' => Input::get('other'),
		'control_number' => Input::get('control_number'),
		'notes' => Input::get('notes'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_leasing_arrangment',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	public function saveOrgContractedService(){

		$org=new OrgContractedService;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');
		
		$org->issued_date=Input::get('issued_date');
		$org->issued_month=Input::get('issued_month');
		$org->issued_year=Input::get('issued_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->type_of_approval=Input::get('type_of_approval');
		$org->revision_number=Input::get('revision_number');
		$org->aircraft_mms=Input::get('aircraft_mms');
		$org->limiting_factor=Input::get('limiting_factor');
		$org->control_number=Input::get('control_number');
		$org->basis_note=Input::get('basis_note');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_contracted_services',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Contracted Service Information Saved');
	}

	public function updateOrgContractedService(){
		$id=Input::get('id');
		 DB::table('org_contracted_services')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'issued_date' => Input::get('issued_date'),
		'issued_month' => Input::get('issued_month'),
		'issued_year' => Input::get('issued_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'type_of_approval' => Input::get('type_of_approval'),
		'revision_number' => Input::get('revision_number'),
		'aircraft_mms' => Input::get('aircraft_mms'),
		'limiting_factor' => Input::get('limiting_factor'),
		'control_number' => Input::get('control_number'),		
		'basis_note' => Input::get('basis_note'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_contracted_services',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}

	public function saveOrgAmoApproval(){

		$org=new OrgAmoApproval;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');		
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->category_rating=Input::get('category_rating');
		$org->class_rating=Input::get('class_rating');
		$org->rating_description=Input::get('rating_description');
		$org->revision_number=Input::get('revision_number');
		$org->contractor=Input::get('contractor');
		$org->control_number=Input::get('control_number');
		$org->specific_equipment=Input::get('specific_equipment');
		$org->available_method=Input::get('available_method');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_amo_approvals',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','AMO Approval Information Saved');
	}
	public function updateOrgAmoApproval(){
		$id=Input::get('id');
		 DB::table('org_amo_approvals')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'category_rating' => Input::get('category_rating'),
		'class_rating' => Input::get('class_rating'),
		'rating_description' => Input::get('rating_description'),
		'revision_number' => Input::get('revision_number'),
		'contractor' => Input::get('contractor'),		
		'control_number' => Input::get('control_number'),
		'specific_equipment' => Input::get('specific_equipment'),
		'available_method' => Input::get('available_method'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_amo_approvals',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}

	public function saveOrgAtoApproval(){

		$org=new OrgAtoApproval;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');		
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->ato_category=Input::get('ato_category');
		$org->ato_curriculums=Input::get('ato_curriculums');
		$org->revision_number=Input::get('revision_number');
		$org->control_number=Input::get('control_number');
		$org->approved_training_equipment=Input::get('approved_training_equipment');
		$org->approved_method=Input::get('approved_method');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_ato_approvals',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','ATO Approval Information Saved');
	}
	public function updateOrgAtoApproval(){
		$id=Input::get('id');
		 DB::table('org_ato_approvals')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'ato_category' => Input::get('ato_category'),
		'ato_curriculums' => Input::get('ato_curriculums'),
		'revision_number' => Input::get('revision_number'),	
		'control_number' => Input::get('control_number'),
		'approved_training_equipment' => Input::get('approved_training_equipment'),
		'approved_method' => Input::get('approved_method'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_ato_approvals',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	
	public function saveOrgAocApprovalArea(){

		$org=new OrgAocApprovalArea;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');		
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->approved_areas_of_operation=Input::get('approved_areas_of_operation');		
		$org->revision_number=Input::get('revision_number');
		$org->control_number=Input::get('control_number');
		$org->aircraft_authorized=Input::get('aircraft_authorized');
		$org->special_authorizations=Input::get('special_authorizations');
		$org->limitations=Input::get('limitations');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_aoc_approvals_areas',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Aoc Approval Area Information Saved');
	}
	public function updateOrgAocApprovalArea(){
		
		$id=Input::get('id');
		 DB::table('org_aoc_approvals_areas')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'approved_areas_of_operation' => Input::get('approved_areas_of_operation'),
		'revision_number' => Input::get('revision_number'),	
		'control_number' => Input::get('control_number'),
		'aircraft_authorized' => Input::get('aircraft_authorized'),
		'special_authorizations' => Input::get('special_authorizations'),
		'limitations' => Input::get('limitations'),

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_aoc_approvals_areas',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	
	public function saveOrgAocApprovalRoute(){

		$org=new OrgAocApprovalRoute;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');		
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->origination_city=Input::get('origination_city');
		$org->destination_city=Input::get('destination_city');
		$org->revision_number=Input::get('revision_number');
		$org->control_number=Input::get('control_number');
		$org->special_route=Input::get('special_route');
		$org->operational_limitations=Input::get('operational_limitations');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_aoc_approval_routes',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Aoc Approval Route Information Saved');
	}
	public function updateOrgAocApprovalRoute(){
		
		$id=Input::get('id');
		 DB::table('org_aoc_approval_routes')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'origination_city' => Input::get('origination_city'),
		'destination_city' => Input::get('destination_city'),	
		'revision_number' => Input::get('revision_number'),	
		'control_number' => Input::get('control_number'),
		'special_route' => Input::get('special_route'),
		'operational_limitations' => Input::get('operational_limitations'),
		

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_aoc_approval_routes',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	public function saveOrgAocMaintenanceArrangement(){

		$org=new OrgAocMaintenanceArrangement;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');		
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		$org->type_of_approval=Input::get('type_of_approval');
		$org->location=Input::get('location');
		$org->service_provider=Input::get('service_provider');
		$org->control_number=Input::get('control_number');
		$org->applicable_aircraft=Input::get('applicable_aircraft');
		$org->specific_authorizations=Input::get('specific_authorizations');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_aoc_maintenance_arrangement',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','AOC Maintenance Arrangement Information Saved');
	}
	public function updateOrgAocMaintenanceArrangement(){
		$id=Input::get('id');
		 DB::table('org_aoc_maintenance_arrangement')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'type_of_approval' => Input::get('type_of_approval'),
		'location' => Input::get('location'),	
		'service_provider' => Input::get('service_provider'),	
		'control_number' => Input::get('control_number'),
		'applicable_aircraft' => Input::get('applicable_aircraft'),
		'specific_authorizations' => Input::get('specific_authorizations'),
		

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_aoc_maintenance_arrangement',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	public function saveOrgAocTrainingArrangement(){

		$org=new OrgAocTrainingArrangement;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');		
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->org_terminated_date=Input::get('org_terminated_date');
		$org->org_terminated_month=Input::get('org_terminated_month');
		$org->org_terminated_year=Input::get('org_terminated_year');

		
		$org->location=Input::get('location');
		$org->service_provider=Input::get('service_provider');
		$org->control_number=Input::get('control_number');
		$org->authorized_training=Input::get('authorized_training');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_aoc_training_arrangement',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','AOC Training Arrangement Information Saved');
	}
	public function updateOrgAocTrainingArrangement(){
		$id=Input::get('id');
		 DB::table('org_aoc_training_arrangement')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'org_terminated_date' => Input::get('org_terminated_date'),
		'org_terminated_month' => Input::get('org_terminated_month'),
		'org_terminated_year' => Input::get('org_terminated_year'),

		'location' => Input::get('location'),	
		'service_provider' => Input::get('service_provider'),	
		'control_number' => Input::get('control_number'),
		'authorized_training' => Input::get('authorized_training'),
		

		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_aoc_training_arrangement',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}
	
	public function saveOrgApprovalSimulator(){

		$org=new OrgApprovalSimulator;

		$org->org_number=Input::get('org_number');
		$org->org_name=Input::get('org_name');
		$org->active=Input::get('active');
		//$org->org_identifier=Input::get('org_identifier');		
		
		$org->org_effective_date=Input::get('org_effective_date');
		$org->org_effective_month=Input::get('org_effective_month');
		$org->org_effective_year=Input::get('org_effective_year');

		$org->aircraft_mms=Input::get('aircraft_mms');
		$org->assigned_level=Input::get('assigned_level');
		$org->location=Input::get('location');
		$org->simulator_number=Input::get('simulator_number');
		$org->simulator_provider=Input::get('simulator_provider');
		$org->control_number=Input::get('control_number');
		$org->authorized_purpose=Input::get('authorized_purpose');
		
		$org->row_creator=Auth::user()->getName();
		$org->row_updator=Auth::user()->getName();
		$org->approve=0;
		$org->warning=0;
		$org->soft_delete=0;
		$org->save();
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_approval_simulators',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Approval Simulator Information Saved');
	}
	public function updateOrgApprovalSimulator(){
		$id=Input::get('id');
		 DB::table('org_approval_simulators')
		->where('id',$id)
		->update(array(
		'active' => Input::get('active'),
		//'org_identifier' => Input::get('org_identifier'),

		'org_effective_date' => Input::get('org_effective_date'),
		'org_effective_month' => Input::get('org_effective_month'),
		'org_effective_year' => Input::get('org_effective_year'),

		'aircraft_mms' => Input::get('aircraft_mms'),
		'assigned_level' => Input::get('assigned_level'),	
		'location' => Input::get('location'),	
		'simulator_number' => Input::get('simulator_number'),	
		'simulator_provider' => Input::get('simulator_provider'),	
		'control_number' => Input::get('control_number'),
		'authorized_purpose' => Input::get('authorized_purpose'),
	
		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,		
		'updated_at' =>time()		
		));
		/*Tracking quary*/		
			 $callTrackingFunction=$this->updateTracking('org_approval_simulators',Input::get('org_number'));
		/*End Tracking quary*/
		return Redirect::back()->with('message','Data Updated !!');
	}

	public function saveOrgFinancialStatus(){
		
		$effectivedate=Input::get('effective_date').' '.Input::get('effective_month').' '.Input::get('effective_year');
		$timestamp = strtotime($effectivedate);
		$effectivedate =date('Y-m-d', $timestamp);

		$review_date=Input::get('review_date').' '.Input::get('review_month').' '.Input::get('review_year');
		$timestamp = strtotime($review_date);
		$review_date =date('Y-m-d', $timestamp);

		DB::table('org_financial_status')->insert(array(
				'org_number'=>Input::get('org_number'),
				'org_name'=>Input::get('org_name'),
				
				'effective_date'=>$effectivedate,
				'paid_up_capital'=>Input::get('paid_up_capital'),
				'authorized_capital'=>Input::get('authorized_capital'),
				'asset_during_last_audit'=>Input::get('asset_during_last_audit'),
				'caab_charges_License_fee'=>Input::get('caab_charges_License_fee'),
				'caab_charges_renewal_fee'=>Input::get('caab_charges_renewal_fee'),
				'outstanding_charge'=>Input::get('outstanding_charge'),
				'aeronautical_charge'=>Input::get('aeronautical_charge'),
				'nonaeronautical_charge'=>Input::get('nonaeronautical_charge'),
				'review_date'=>$review_date,
				
				'row_creator'=>Auth::user()->getName(),
				'row_updator'=>Auth::user()->getName(),
				'approve'=>'0',
				'warning'=>'0',
				'soft_delete'=>'0',
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s')
			));

		return Redirect::back()->with('message','Financial Status Saved.');
	}

	public function UpdateOrgFinancialStatus(){
		
		$effectivedate=Input::get('effective_date').' '.Input::get('effective_month').' '.Input::get('effective_year');
		$timestamp = strtotime($effectivedate);
		$effectivedate =date('Y-m-d', $timestamp);

		$review_date=Input::get('review_date').' '.Input::get('review_month').' '.Input::get('review_year');
		$timestamp = strtotime($review_date);
		$review_date =date('Y-m-d', $timestamp);
		$id=Input::get('id');
		DB::table('org_financial_status')->where('id',$id)->update(array(
				
				
				'effective_date'=>$effectivedate,
				'paid_up_capital'=>Input::get('paid_up_capital'),
				'authorized_capital'=>Input::get('authorized_capital'),
				'asset_during_last_audit'=>Input::get('asset_during_last_audit'),
				'caab_charges_License_fee'=>Input::get('caab_charges_License_fee'),
				'caab_charges_renewal_fee'=>Input::get('caab_charges_renewal_fee'),
				'outstanding_charge'=>Input::get('outstanding_charge'),
				'aeronautical_charge'=>Input::get('aeronautical_charge'),
				'nonaeronautical_charge'=>Input::get('nonaeronautical_charge'),
				'review_date'=>$review_date,
				
				
				'row_updator'=>Auth::user()->getName(),
				'approve'=>'0',
				'updated_at'=>date('Y-m-d H:i:s')
			));

		return Redirect::back()->with('message','Financial Status Updated.');
	}
	public function saveOrgOpsSpec(){
		
		$isuue_date=Input::get('isuue_date').' '.Input::get('isuue_month').' '.Input::get('isuue_year');
		$timestamp = strtotime($isuue_date);
		$isuue_date =date('Y-m-d', $timestamp);

		

		DB::table('org_operations_specifications')->insert(array(
				'org_number'=>Input::get('org_number'),
				'org_name'=>Input::get('org_name'),
				
				'isuue_date'=>$isuue_date,
				'aircraft_model'=>Input::get('aircraft_model'),
				'registration_mark'=>Input::get('registration_mark'),
				'type_class_of_ops'=>Input::get('type_class_of_ops'),
				'category'=>Input::get('category'),
				'area_of_operation'=>Input::get('area_of_operation'),
				//'outstanding_charge'=>Input::get('outstanding_charge'),
				'special_limitations'=>Input::get('special_limitations'),

				'dangerous_goods'=>Input::get('dangerous_goods'),
				'dangerous_goods_sa'=>Input::get('dangerous_goods_sa'),
				'dangerous_goods_remarks'=>Input::get('dangerous_goods_remarks'),

				'low_visibility_operations'=>Input::get('low_visibility_operations'),
				'low_visibility_operations_sa'=>Input::get('low_visibility_operations_sa'),
				'low_visibility_operations_remarks'=>Input::get('low_visibility_operations_remarks'),

				'approach_and_landing'=>Input::get('approach_and_landing'),
				'approach_and_landing_sa'=>Input::get('approach_and_landing_sa'),
				'approach_and_landing_remarks'=>Input::get('approach_and_landing_remarks'),

				'take_off'=>Input::get('take_off'),
				'take_off_sa'=>Input::get('take_off_sa'),
				'take_off_remarks'=>Input::get('take_off_remarks'),

				'rvsm'=>Input::get('rvsm'),
				'rvsm_sa'=>Input::get('rvsm_sa'),
				'rvsm_remarks'=>Input::get('rvsm_remarks'),

				'etops'=>Input::get('etops'),
				'etops_sa'=>Input::get('etops_sa'),
				'etops_remarks'=>Input::get('etops_remarks'),

				'mnps'=>Input::get('mnps'),
				'mnps_sa'=>Input::get('mnps_sa'),
				'mnps_remarks'=>Input::get('mnps_remarks'),

				'navigation_specification_for_pbn_ops'=>Input::get('navigation_specification_for_pbn_ops'),
				'navigation_specification_for_pbn_ops_sa'=>Input::get('navigation_specification_for_pbn_ops_sa'),
				'navigation_specification_for_pbn_ops_remarks'=>Input::get('navigation_specification_for_pbn_ops_remarks'),

				'continuing_airworthiness'=>Input::get('continuing_airworthiness'),
				'continuing_airworthiness_sa'=>Input::get('continuing_airworthiness_sa'),
				'continuing_airworthiness_remarks'=>Input::get('continuing_airworthiness_remarks'),

				'other'=>Input::get('other'),
				'other_sa'=>Input::get('other_sa'),
				'other_remarks'=>Input::get('other_remarks'),

				
				
				'row_creator'=>Auth::user()->getName(),
				'row_updator'=>Auth::user()->getName(),
				'approve'=>'0',
				'warning'=>'0',
				'soft_delete'=>'0',
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s')
			));

		return Redirect::back()->with('message','Operation Specifications Saved.');
	}

	public function updateOrgOpsSpec(){
		
		$isuue_date=Input::get('isuue_date').' '.Input::get('isuue_month').' '.Input::get('isuue_year');
		$timestamp = strtotime($isuue_date);
		$isuue_date =date('Y-m-d', $timestamp);

		$id=Input::get('id');

		DB::table('org_operations_specifications')->where('id',$id)->update(array(
				
				'isuue_date'=>$isuue_date,
				'aircraft_model'=>Input::get('aircraft_model'),
				'registration_mark'=>Input::get('registration_mark'),
				'type_class_of_ops'=>Input::get('type_class_of_ops'),
				'category'=>Input::get('category'),
				'area_of_operation'=>Input::get('area_of_operation'),
				//'outstanding_charge'=>Input::get('outstanding_charge'),
				'special_limitations'=>Input::get('special_limitations'),

				'dangerous_goods'=>Input::get('dangerous_goods'),
				'dangerous_goods_sa'=>Input::get('dangerous_goods_sa'),
				'dangerous_goods_remarks'=>Input::get('dangerous_goods_remarks'),

				'low_visibility_operations'=>Input::get('low_visibility_operations'),
				'low_visibility_operations_sa'=>Input::get('low_visibility_operations_sa'),
				'low_visibility_operations_remarks'=>Input::get('low_visibility_operations_remarks'),

				'approach_and_landing'=>Input::get('approach_and_landing'),
				'approach_and_landing_sa'=>Input::get('approach_and_landing_sa'),
				'approach_and_landing_remarks'=>Input::get('approach_and_landing_remarks'),

				'take_off'=>Input::get('take_off'),
				'take_off_sa'=>Input::get('take_off_sa'),
				'take_off_remarks'=>Input::get('take_off_remarks'),

				'rvsm'=>Input::get('rvsm'),
				'rvsm_sa'=>Input::get('rvsm_sa'),
				'rvsm_remarks'=>Input::get('rvsm_remarks'),

				'etops'=>Input::get('etops'),
				'etops_sa'=>Input::get('etops_sa'),
				'etops_remarks'=>Input::get('etops_remarks'),

				'mnps'=>Input::get('mnps'),
				'mnps_sa'=>Input::get('mnps_sa'),
				'mnps_remarks'=>Input::get('mnps_remarks'),

				'navigation_specification_for_pbn_ops'=>Input::get('navigation_specification_for_pbn_ops'),
				'navigation_specification_for_pbn_ops_sa'=>Input::get('navigation_specification_for_pbn_ops_sa'),
				'navigation_specification_for_pbn_ops_remarks'=>Input::get('navigation_specification_for_pbn_ops_remarks'),

				'continuing_airworthiness'=>Input::get('continuing_airworthiness'),
				'continuing_airworthiness_sa'=>Input::get('continuing_airworthiness_sa'),
				'continuing_airworthiness_remarks'=>Input::get('continuing_airworthiness_remarks'),

				'other'=>Input::get('other'),
				'other_sa'=>Input::get('other_sa'),
				'other_remarks'=>Input::get('other_remarks'),
			    
			    'row_updator'=>Auth::user()->getName(),
				'soft_delete'=>'0',
				'updated_at'=>date('Y-m-d H:i:s')
			));

		return Redirect::back()->with('message','Operation Specifications Updated.');
	}

	public function saveOrgAocCertificate(){
		
		$issued_date=Input::get('issued_date').' '.Input::get('issued_month').' '.Input::get('issued_year');
		$timestamp = strtotime($issued_date);
		$issued_date =date('Y-m-d', $timestamp);

		$initial_issued_date=Input::get('initial_issued_date').' '.Input::get('initial_issued_month').' '.Input::get('initial_issued_year');
		$timestamp = strtotime($initial_issued_date);
		$initial_issued_date =date('Y-m-d', $timestamp);

		$expiration_date=Input::get('expiration_date').' '.Input::get('expiration_month').' '.Input::get('expiration_year');
		$timestamp = strtotime($expiration_date);
		$expiration_date =date('Y-m-d', $timestamp);

		

		DB::table('org_aoc_certificate')->insert(array(
				'org_number'=>Input::get('org_number'),
				'org_name'=>Input::get('org_name'),

				'active'=>Input::get('active'),
				'aoc_certificate_type'=>Input::get('aoc_certificate_type'),
				'aoc_no'=>Input::get('aoc_no'),
				'certify_by'=>Input::get('certify_by'),
				'certificate_for'=>Input::get('certificate_for'),
				'points_of_contact_name_address'=>Input::get('points_of_contact_name_address'),

				'issued_date'=>$issued_date,
				'initial_issued_date'=>$initial_issued_date,
				'expiration_date'=>$expiration_date,
				

				'certificate_issued_by'=>Input::get('certificate_issued_by'),
				'remarks'=>Input::get('remarks'),
				
				
				'row_creator'=>Auth::user()->getName(),
				'row_updator'=>Auth::user()->getName(),
				'approve'=>'0',
				'warning'=>'0',
				'soft_delete'=>'0',
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s')
			));

}
	
	public function updateOrgAocCertificate(){
		
		$issued_date=Input::get('issued_date').' '.Input::get('issued_month').' '.Input::get('issued_year');
		$timestamp = strtotime($issued_date);
		$issued_date =date('Y-m-d', $timestamp);

		$initial_issued_date=Input::get('initial_issued_date').' '.Input::get('initial_issued_month').' '.Input::get('initial_issued_year');
		$timestamp = strtotime($initial_issued_date);
		$initial_issued_date =date('Y-m-d', $timestamp);

		$expiration_date=Input::get('expiration_date').' '.Input::get('expiration_month').' '.Input::get('expiration_year');
		$timestamp = strtotime($expiration_date);
		$expiration_date =date('Y-m-d', $timestamp);

		$id=Input::get('id');

		DB::table('org_aoc_certificate')->where('id',$id)->update(array(
				
				'active'=>Input::get('active'),
				'aoc_certificate_type'=>Input::get('aoc_certificate_type'),
				'aoc_no'=>Input::get('aoc_no'),
				'certify_by'=>Input::get('certify_by'),
				'certificate_for'=>Input::get('certificate_for'),
				'points_of_contact_name_address'=>Input::get('points_of_contact_name_address'),

				'issued_date'=>$issued_date,
				'initial_issued_date'=>$initial_issued_date,
				'expiration_date'=>$expiration_date,
				

				'certificate_issued_by'=>Input::get('certificate_issued_by'),
				'remarks'=>Input::get('remarks'),
				
				
				
				'row_updator'=>Auth::user()->getName(),
				'approve'=>'0',
				'updated_at'=>date('Y-m-d H:i:s')
			));

		return Redirect::back()->with('message','Certificate Info Update.');
	}

	public function saveOrgDocument(){
		$file_name=parent::fileUpload('file_name','org_document');

		$effective_date=Input::get('effective_date').' '.Input::get('effective_month').' '.Input::get('effective_year');
		$timestamp = strtotime($effective_date);
		$effective_date =date('Y-m-d', $timestamp);

		$renewal_date=Input::get('renewal_date').' '.Input::get('renewal_month').' '.Input::get('renewal_year');
		$timestamp = strtotime($renewal_date);
		$renewal_date =date('Y-m-d', $timestamp);

		

		DB::table('org_document_list')->insert(array(
				'org_number'=>Input::get('org_number'),
				'org_name'=>Input::get('org_name'),

				'active'=>Input::get('active'),
				'title'=>Input::get('title'),
				'effective_date'=>$effective_date,
				'category'=>Input::get('category'),
				'file_name'=>$file_name,
				'renewal_date'=>$renewal_date,
				'doc_note'=>Input::get('doc_note'),

				'row_creator'=>Auth::user()->getName(),
				'row_updator'=>Auth::user()->getName(),
				'approve'=>'0',
				'warning'=>'0',
				'soft_delete'=>'0',
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s')
			));
return Redirect::back()->with('message','Document Saved');
}
	
	

}