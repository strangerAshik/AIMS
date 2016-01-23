<?php

class SettingsController extends \BaseController {

/*
*This class is for settings.
*/

/*Using this method all the privillage of a roll can be updated*/ 
	public function permissionUpdate(){
		$n=0;
		$role='Employee';
		$emp_ids=DB::table('users')->where('role',$role)->lists('emp_id');
		$moduleArray=array(
		    	//setting
						'add_user',
						'all_user',
						'dropdown_management',
						//'module',
						'settings',
				//Aircraft
						'aircraft',
						'aircraft_add_new_aircraft',
						'airaft_admin_list',
						'aircraft_my_list',
						//'aircraft_report',
				//library
						'e_library',
						'library_add_new_supporitng_docs',
						//'library_report',
						'library_supporting_docs',


				//EDP
						'edp',
						'edp_approval',
						'edp_legal_opinion',

				//Employee
						'employee',
						'emp_admin_list',
						//'employee_report',

				//SIA
						'sia',
						'sia_board',
						'my_sia',
						'sia_program',
						'sia_program_list',
						'sia_inspector_associate_sia',				
						'sia_action',
						'sia_approval',
						'sia_central_search',
						'sia_corrective_action',
						'sia_followup',
						'execute_sia_program',
						'executed_sia_programs',
						'sia_today_task',
						'sia_sms',
						'sia_add_finding',
						//'sia_report',
				//Help And FAQ		
						'help_faq',
						'help_faq_answer',
						'help_faq_ask_question',
						'help_faq_bank',
						//'help_faq_report',

				//ITS
						'its',
						'its_my_its_records',
						'its_add_trainee',
						'its_assign_course_and_ojt',
						'its_central_search',
						'its_course_ojt_list',
						'its_formal_course_and_job_task',
						'its_review_update_tasks_and_course',				
						//'its_report',
						
				//Notification		
						'notifications',
				//Safety Concern
						'safety_concern',
						'sc_approval',
						'sc_corrective_action',
						'sc_finalization',
						'sc_followup',
						//'sc_forwarding',
						'sc_issue_safety_concern',
						//'sc_new_inspection',
						'sc_safety_concerns_list',				
						//'sc_report',
				//Voluntary Reporitng
						'voluntary_reporting',
						'voluntary_reporting_action_details',
						'voluntary_reporting_approval',
						'voluntary_reporting_list',
						);

		
		foreach ($emp_ids as $emp_id) {
			//Deleting Previous data
				DB::table('module_user_permission')->where('user_id',$emp_id)->delete();
			//Initializing Privillage
				foreach ($moduleArray as $moduleName) {
							DB::table('module_user_permission')
									->insert(array(
										'user_id'=>$emp_id,
										'module_name'=>$moduleName,
										'access'=>'false',
										'entry'=>'false',
										'update'=>'false',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false',
									));
						}
			//giving role privillage 
					
				
				//setting 
					$settings=array(
								//'add_user',
								//'all_user',
								//'dropdown_management',
								//'module',
								'settings',
						);
					foreach ($settings as $moduleName) {
						DB::table('module_user_permission')
								->where('user_id',$emp_id)
								->where('module_name',$moduleName)
								->update(array(
									'access'=>'true',
									'entry'=>'true',
									'update'=>'true',
									'approve'=>'false',
									'worning'=>'false',
									'sof_delete'=>'false',
									'par_delete'=>'false',
									'report'=>'false'
								));
					}
				//aircraft
					$aircrafts=array(
								//'aircraft',
								//'aircraft_add_new_aircraft',
								//'airaft_admin_list',
								//'aircraft_my_list',
								//'aircraft_report',
						); 
					foreach ($aircrafts as $aircraft) {
						DB::table('module_user_permission')
								->where('user_id',$emp_id)
								->where('module_name',$aircraft)
								->update(array(
									'access'=>'true',
									'entry'=>'true',
									'update'=>'true',
									'approve'=>'false',
									'worning'=>'false',
									'sof_delete'=>'false',
									'par_delete'=>'false',
									'report'=>'false'
								));
					}
				//libraries
					$libraries=array(
								'e_library',
								'library_add_new_supporitng_docs',
								//'library_report',
								'library_supporting_docs',				
								);
					foreach ($libraries as $moduleName) {
						DB::table('module_user_permission')
								->where('user_id',$emp_id)
								->where('module_name',$moduleName)
								->update(array(
									'access'=>'true',
									'entry'=>'true',
									'update'=>'true',
									'approve'=>'false',
									'worning'=>'false',
									'sof_delete'=>'false',
									'par_delete'=>'false',
									'report'=>'false'
								));
					}
				//edps
					$edps=[
					'edp',
					//'edp_approval',
					//'edp_legal_opinion'
					];
					foreach ($edps as $moduleName) {
						DB::table('module_user_permission')
								->where('user_id',$emp_id)
								->where('module_name',$moduleName)
								->update(array(
									'access'=>'true',
									'entry'=>'true',
									'update'=>'true',
									'approve'=>'false',
									'worning'=>'false',
									'sof_delete'=>'false',
									'par_delete'=>'false',
									'report'=>'false'
								));
					}
				//employees
					$employees=array(
								'employee',
								//'emp_admin_list',
								//'employee_report',		
						);
					foreach ($employees as $moduleName) {
						DB::table('module_user_permission')
								->where('user_id',$emp_id)
								->where('module_name',$moduleName)
								->update(array(
									'access'=>'true',
									'entry'=>'true',
									'update'=>'true',
									'approve'=>'false',
									'worning'=>'false',
									'sof_delete'=>'false',
									'par_delete'=>'false',
									'report'=>'false'
								));
					}	
				//sia
					$sia=array(
								'sia',
								//'sia_board',
								//'my_sia',//----[Note:service Provider]
								//'sia_program',
								//'sia_program_list',
								'sia_inspector_associate_sia',				
								'sia_action',
								//'sia_approval',
								//'sia_central_search',
								//'sia_corrective_action',
								'sia_followup',
								//'execute_sia_program',
								//'executed_sia_programs',
								'sia_today_task',
								//'sia_sms',
								'sia_add_finding',
								//'sia_report',	
						);
					foreach ($sia as $moduleName) {
						DB::table('module_user_permission')
								->where('user_id',$emp_id)
								->where('module_name',$moduleName)
								->update(array(
									'access'=>'true',
									'entry'=>'true',
									'update'=>'true',
									'approve'=>'false',
									'worning'=>'false',
									'sof_delete'=>'false',
									'par_delete'=>'false',
									'report'=>'false'
								));
					}
				//faqs	
					$faqs=array(
								'help_faq',
								'help_faq_answer',
								'help_faq_ask_question',
								'help_faq_bank',
								//'help_faq_report',
						);
					foreach ($faqs as $moduleName) {
						DB::table('module_user_permission')
								->where('user_id',$emp_id)
								->where('module_name',$moduleName)
								->update(array(
									'access'=>'true',
									'entry'=>'true',
									'update'=>'false',
									'approve'=>'false',
									'worning'=>'false',
									'sof_delete'=>'false',
									'par_delete'=>'false',
									'report'=>'false'
								));
					}	
				//its
					$its=array(
								'its',
								'its_my_its_records',
								// 'its_add_trainee',
								// 'its_assign_course_and_ojt',
								// 'its_central_search',
								// 'its_course_ojt_list',
								// 'its_formal_course_and_job_task',
								// 'its_review_update_tasks_and_course',				
								//'its_report',
						);
					foreach ($its as $moduleName) {
						DB::table('module_user_permission')
								->where('user_id',$emp_id)
								->where('module_name',$moduleName)
								->update(array(
									'access'=>'true',
									'entry'=>'true',
									'update'=>'true',
									'approve'=>'true',
									'worning'=>'false',
									'sof_delete'=>'false',
									'par_delete'=>'false',
									'report'=>'false'
								));
					}
				//notifications
					$notifications=array(
							//'notifications',		
						);
					foreach ($notifications as $moduleName) {
						DB::table('module_user_permission')
								->where('user_id',$emp_id)
								->where('module_name',$moduleName)
								->update(array(
									'access'=>'true',
									'entry'=>'true',
									'update'=>'true',
									'approve'=>'true',
									'worning'=>'true',
									'sof_delete'=>'true',
									'par_delete'=>'true',
									'report'=>'false'
								));
					}
				//safeties
					$safeties=array(
								'safety_concern',
								//'sc_approval',
								//'sc_corrective_action',
								'sc_finalization',
								//'sc_followup',
								//'sc_forwarding',
								'sc_issue_safety_concern',
								//'sc_new_inspection',
								//'sc_safety_concerns_list',				
								//'sc_report',		
						);
					foreach ($safeties as $moduleName) {
						DB::table('module_user_permission')
								->where('user_id',$emp_id)
								->where('module_name',$moduleName)
								->update(array(
									'access'=>'true',
									'entry'=>'true',
									'update'=>'true',
									'approve'=>'true',
									'worning'=>'false',
									'sof_delete'=>'false',
									'par_delete'=>'false',
									'report'=>'false'
								));
					}
				//voluntary reporting
					$voluntaryReportings=array(
								// 'voluntary_reporting',
								// 'voluntary_reporting_action_details',
								// 'voluntary_reporting_approval',
								// 'voluntary_reporting_list'								
								);
					foreach ($voluntaryReportings as $moduleName) {
						DB::table('module_user_permission')
								->where('user_id',$emp_id)
								->where('module_name',$moduleName)
								->update(array(
									'access'=>'true',
									'entry'=>'true',
									'update'=>'true',
									'approve'=>'true',
									'worning'=>'false',
									'sof_delete'=>'false',
									'par_delete'=>'false',
									'report'=>'false'
								));
					}
			
			$n++;	
		}
		return $n.' People Updated As '.$role;
		
		
	}
/*Using this method all the pass try to change but failed*/
	public function changeAllPassword(){
		//$userIdArray=[]
		
		$password='123';
		$userIdArray=DB::table('users')->lists('emp_id');
		$num=0;
		foreach ($userIdArray as $emp_id) {
			//echo $info;
			$password=Hash::make($password);
			//$success = User::where('emp_id', '=', $emp_id)->update(array('password' =>$password,'pass_change'=>0));
			 $suss=DB::table('users')
			 ->where('emp_id',$emp_id)
			 ->update(array(
					'password'=>$password,
					'pass_change'=>'1'
				));
			
			$num++;
		}
		return $num. " All Password is Changed to ".$password;
		
	}
/*Using this method privillage of a prticular id holder can be updated*/
   public function permission($emp_id){
	//delete prev access info
	 DB::table('module_user_permission')->where('user_id',$emp_id)->delete();
	//installing new module 
	 $mainModuleArray=array(
	           //setting
						'add_user',
						'all_user',
						'dropdown_management',
						//'module',
						'settings',
				//Aircraft
						'aircraft',
						'aircraft_add_new_aircraft',
						'airaft_admin_list',
						'aircraft_my_list',
						//'aircraft_report',
				//library
						'e_library',
						'library_add_new_supporitng_docs',
						//'library_report',
						'library_supporting_docs',
				//Employee
						'employee',
						'emp_admin_list',
						//'employee_report',
				

				//EDP
						'edp',
						'edp_approval',
						'edp_legal_opinion',

				//SIA
						'sia',
						'my_sia',
						'sia_board',
						'sia_program',
						'sia_program_list',
						'sia_inspector_associate_sia',				
						'sia_action',
						'sia_approval',
						'sia_central_search',
						'sia_corrective_action',
						'sia_followup',
						'execute_sia_program',
						'executed_sia_programs',
						'sia_today_task',
						'sia_sms',
						'sia_add_finding',
						//'sia_report',
				//Help And FAQ		
						'help_faq',
						'help_faq_answer',
						'help_faq_ask_question',
						'help_faq_bank',
						//'help_faq_report',

				//ITS
						'its',
						'its_my_its_records',
						'its_add_trainee',
						'its_assign_course_and_ojt',
						'its_central_search',
						'its_course_ojt_list',
						'its_formal_course_and_job_task',
						'its_review_update_tasks_and_course',				
						//'its_report',
						
				//Notification		
						'notifications',
				//Safety Concern
						'safety_concern',
						'sc_approval',
						'sc_corrective_action',
						'sc_finalization',
						'sc_followup',
						//'sc_forwarding',
						'sc_issue_safety_concern',
						//'sc_new_inspection',
						'sc_safety_concerns_list',				
						//'sc_report',
				//Voluntary Reporitng
						'voluntary_reporting',
						'voluntary_reporting_action_details',
						'voluntary_reporting_approval',
						'voluntary_reporting_list',
				//ANS AGA
					'ans_aga_aerodrome_inspection',
				//Report
					'report',
				//Wild life
					'wild_life_strike',
				//Environment 
					'environment',
				//Accident & Incident 
					'accident_&_incident_investigation',
				//organization
					'organization',
					'org_admin_list',
					'org_my_org',
					'org_add_new',
					'org_report',
					
				//pel
					'personnel_licensing',
					'pel_list',
					'pel_flying_details',
					'pel_simulator',
					'pel_ame_log_details',
					'pel_atc_log_details',

	);
	
	//Giving Privillage 
	foreach ($mainModuleArray as $moduleName) {
				DB::table('module_user_permission')
						->where('user_id',$emp_id)
						->where('module_name',$moduleName)
						->update(array(
							'access'=>'true',
							'entry'=>'true',
							'update'=>'true',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false',
							'report'=>'false'
						));
			}
		return'Emp Id '.$emp_id.' holder is Now Getting Privilege of '.$role;

	}
/* Return the organization list of user listed*/
 public function organizations(){
		//$roles=DB::table('roles');
		$organizations =DB::table('users')->lists('organization');

		return $organizations;
	}

 public function index()
	{
		$modules =DB::table('module_names')->where('soft_delete','<>','1')->orderBy('module_name')->lists('module_name');
		return View::make('settings/index')
		->with('PageName','Settings')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('year',parent::years_from())
		//->with('roles',$this->roles())
		->with('organizations',$this->organizations())
		->with('personnel',parent::getPersonnelInfo())
		->with('modules',$modules)
		;
	}
 public function myProfile(){
		$userInfos=DB::table('users')
		->where('id',Auth::user()->getId())->get();
		return View::make('settings/myProfile')
					->with('PageName','My Profile')
					->with('userInfos',$userInfos)
					;
	}
 public function login(){
		//dd(Input::all());
		$validation=Validator::make(Input::all(),User::$auth_rules);
		if($validation->fails()){
			return Redirect::to('/')->with('Warning', 'Email/Password is wrong!!');
		}
		$email=Input::get('email');
		$password=Input::get('password');
		if (Auth::attempt(array('email' => $email, 'password' => $password)))
			{
				return Redirect::to('dashboard');
			}
		
		return Redirect::to('/')->with('Warning', 'Email/Password is wrong!!');
		
   }
	
 public function logout(){
		session_unset();
		if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
		}
		//session_destroy();
		Auth::logout();
		Session::flush();
		
	return Redirect::to('/')->with('message', 'Successfully Log Out!!');
	}

	
 public function viewUsers(){
		
		$users = DB::table('users')->orderBy('emp_id')->get();
		$modules=DB::table('module_user_permission')->where('soft_delete','<>','1')->orderBy('module_name')->get();	
		
		$select['']='Select Module';
		$moduleNames =DB::table('module_names')->where('soft_delete','<>','1')->orderBy('module_name')->lists('module_name');
		$moduleNames =array_merge($select,$moduleNames);

		return View::make('settings/viewUsers')
		->with('PageName','View Users')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('year',parent::years_from())
		->with('personnel',parent::getPersonnelInfo())
		//->with('roles',$this->roles())
		->with('organizations',$this->organizations())
		->with('users',$users)
		->with('modules',$modules)
		->with('moduleNames',$moduleNames)
		;
	}
/* SAve User For CAAB*/
 public function saveUser(){
		
		$validator = Validator::make(Input::all(), User::$rules_user_registration);

		if ($validator->passes()) {
		$user=new User;
		$user->name= Input::get('name');
		$user->emp_id= Input::get('emp_id');
		$user->email= Input::get('email');
		$user->role= Input::get('designation');
		$user->organization= Input::get('organization');
		$user->password= Hash::make(Input::get('password'));
		 
		$user->save();

		$name=Input::get('name');
		$emp_id=Input::get('emp_id');
		$role=Input::get('designation');
		//User Initialization 
			$moduleArray=array(
			    	//setting
							'add_user',
							'all_user',
							'dropdown_management',
							//'module',
							'settings',
					//Aircraft
							'aircraft',
							'aircraft_add_new_aircraft',
							'airaft_admin_list',
							'aircraft_my_list',
							//'aircraft_report',
					//library
							'e_library',
							'library_add_new_supporitng_docs',
							//'library_report',
							'library_supporting_docs',


					//EDP
							'edp',
							'edp_approval',
							'edp_legal_opinion',

					//Employee
							'employee',
							'emp_admin_list',
							//'employee_report',

					//SIA
							'sia',
							'my_sia',
							'sia_board',
							'sia_program',
							'sia_program_list',
							'sia_inspector_associate_sia',				
							'sia_action',
							'sia_approval',
							'sia_central_search',
							'sia_corrective_action',
							'sia_followup',
							'execute_sia_program',
							'executed_sia_programs',
							'sia_today_task',
							'sia_sms',
							'sia_add_finding',
							//'sia_report',
					//Help And FAQ		
							'help_faq',
							'help_faq_answer',
							'help_faq_ask_question',
							'help_faq_bank',
							//'help_faq_report',

					//ITS
							'its',
							'its_my_its_records',
							'its_add_trainee',
							'its_assign_course_and_ojt',
							'its_central_search',
							'its_course_ojt_list',
							'its_formal_course_and_job_task',
							'its_review_update_tasks_and_course',				
							//'its_report',
							
					//Notification		
							'notifications',
					//Safety Concern
							'safety_concern',
							'sc_approval',
							'sc_corrective_action',
							'sc_finalization',
							'sc_followup',
							//'sc_forwarding',
							'sc_issue_safety_concern',
							//'sc_new_inspection',
							'sc_safety_concerns_list',				
							//'sc_report',
					//Voluntary Reporitng
							'voluntary_reporting',
							'voluntary_reporting_action_details',
							'voluntary_reporting_approval',
							'voluntary_reporting_list',
							);

			foreach ($moduleArray as $moduleName) {
							DB::table('module_user_permission')
									->insert(array(
										'user_id'=>$emp_id,
										'module_name'=>$moduleName,
										'access'=>'false',
										'entry'=>'false',
										'update'=>'false',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false',
									));
						}

		//giving Privilage 
				$dbAdmin='DB Admin';
				$chiefAdmin='Chief Admin';
				$inspectorOpsAirworthiness='Inspector OPS,Airworthiness';
				$inspectorAnsAga='Inspector ANS-AGA';
				$inspectorLegal='Inspector Legal';
				$itsManager='ITS Manager';
				$programeManager='Program Manager';
				$voluntaryReportingManager='Voluntary Reporting Manager';
				$serviceProviderAoc='Service Provider-AOC';
				$serviceProviderAirport='Service Provider-Airport';
				$employee='Employee';

				if ($role==$employee) 
				{
					//setting 
						$settings=array(
									//'add_user',
									//'all_user',
									//'dropdown_management',
									//'module',
									'settings',
							);
						foreach ($settings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//aircraft
						$aircrafts=array(
									//'aircraft',
									//'aircraft_add_new_aircraft',
									//'airaft_admin_list',
									//'aircraft_my_list',
									//'aircraft_report',
							); 
						foreach ($aircrafts as $aircraft) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$aircraft)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//libraries
						$libraries=array(
									'e_library',
									'library_add_new_supporitng_docs',
									//'library_report',
									'library_supporting_docs',				
									);
						foreach ($libraries as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//edps
						$edps=[
						'edp',
						//'edp_approval',
						//'edp_legal_opinion'
						];
						foreach ($edps as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//employees
						$employees=array(
									'employee',
									//'emp_admin_list',
									//'employee_report',		
							);
						foreach ($employees as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//sia
						$sia=array(
									'sia',
									//'sia_board',
									//'my_sia',//----[Note:service Provider]
									//'sia_program',
									//'sia_program_list',
									'sia_inspector_associate_sia',				
									'sia_action',
									//'sia_approval',
									//'sia_central_search',
									//'sia_corrective_action',
									'sia_followup',
									//'execute_sia_program',
									//'executed_sia_programs',
									'sia_today_task',
									//'sia_sms',
									'sia_add_finding',
									//'sia_report',	
							);
						foreach ($sia as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//faqs	
						$faqs=array(
									'help_faq',
									'help_faq_answer',
									'help_faq_ask_question',
									'help_faq_bank',
									//'help_faq_report',
							);
						foreach ($faqs as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'false',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//its
						$its=array(
									'its',
									'its_my_its_records',
									// 'its_add_trainee',
									// 'its_assign_course_and_ojt',
									// 'its_central_search',
									// 'its_course_ojt_list',
									// 'its_formal_course_and_job_task',
									// 'its_review_update_tasks_and_course',				
									//'its_report',
							);
						foreach ($its as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//notifications
						$notifications=array(
								//'notifications',		
							);
						foreach ($notifications as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//safeties
						$safeties=array(
									'safety_concern',
									//'sc_approval',
									//'sc_corrective_action',
									'sc_finalization',
									//'sc_followup',
									//'sc_forwarding',
									'sc_issue_safety_concern',
									//'sc_new_inspection',
									//'sc_safety_concerns_list',				
									//'sc_report',		
							);
						foreach ($safeties as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//voluntary reporting
						$voluntaryReportings=array(
									// 'voluntary_reporting',
									// 'voluntary_reporting_action_details',
									// 'voluntary_reporting_approval',
									// 'voluntary_reporting_list'								
									);
						foreach ($voluntaryReportings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
				
				}
				elseif ($role==$dbAdmin) 
				{
					//setting 
						$settings=array(
									'add_user',
									'all_user',
									'dropdown_management',
									//'module',
									'settings',
							);
						foreach ($settings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//aircraft
						$aircrafts=array(
									'aircraft',
									'aircraft_add_new_aircraft',
									'airaft_admin_list',
									'aircraft_my_list',
									//'aircraft_report',
							); 
						foreach ($aircrafts as $aircraft) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$aircraft)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//libraries
						$libraries=array(
									' ',
									'e_library',
									'library_add_new_supporitng_docs',
									//'library_report',
									'library_supporting_docs',				
									' '
							);
						foreach ($libraries as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//edps
						$edps=['edp','edp_approval','edp_legal_opinion'];
						foreach ($edps as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//employees
						$employees=array(
									'employee',
									'emp_admin_list',
									//'employee_report',		
							);
						foreach ($employees as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}	
					//sia
						$sia=array(
									'sia',
									//'sia_board',
									'my_sia',//Note:service Provider
									'sia_program',
									'sia_program_list',
									'sia_inspector_associate_sia',				
									'sia_action',
									'sia_approval',
									'sia_central_search',
									'sia_corrective_action',
									'sia_followup',
									'execute_sia_program',
									'executed_sia_programs',
									'sia_today_task',
									'sia_sms',
									'sia_add_finding',
									//'sia_report',	
							);
						foreach ($sia as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//faqs	
						$faqs=array(
									'help_faq',
									'help_faq_answer',
									'help_faq_ask_question',
									'help_faq_bank',
									//'help_faq_report',
							);
						foreach ($faqs as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}	
					//its
						$its=array(
									'its',
									'its_my_its_records',
									'its_add_trainee',
									'its_assign_course_and_ojt',
									'its_central_search',
									'its_course_ojt_list',
									'its_formal_course_and_job_task',
									'its_review_update_tasks_and_course',				
									'its_report',
							);
						foreach ($its as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//notifications
						$notifications=array(
								//'notifications',		
							);
						foreach ($notifications as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//safeties
						$safeties=array(
									'safety_concern',
									'sc_approval',
									'sc_corrective_action',
									'sc_finalization',
									//'sc_followup',
									//'sc_forwarding',
									'sc_issue_safety_concern',
									//'sc_new_inspection',
									'sc_safety_concerns_list',				
									//'sc_report',		
							);
						foreach ($safeties as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//voluntary reporting
						$voluntaryReportings=array(

									'voluntary_reporting',
									'voluntary_reporting_action_details',
									'voluntary_reporting_approval',
									'voluntary_reporting_list'
									
									);
						foreach ($voluntaryReportings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
				}
				elseif ($role==$chiefAdmin) 
				{

					//setting 
						$settings=array(
									//'add_user',
									//'all_user',
									//'dropdown_management',
									//'module',
									'settings',
							);
						foreach ($settings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'false',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//aircraft
						$aircrafts=array(
									'aircraft',
									//'aircraft_add_new_aircraft',
									'airaft_admin_list',
									//'aircraft_my_list',
									//'aircraft_report',
							); 
						foreach ($aircrafts as $aircraft) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$aircraft)
									->update(array(
										'access'=>'true',
										'entry'=>'false',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//libraries
						$libraries=array(
									'e_library',
									'library_add_new_supporitng_docs',
									//'library_report',
									'library_supporting_docs',				
									);
						foreach ($libraries as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//edps
						$edps=[
						'edp',
						'edp_approval',
						//'edp_legal_opinion'
						];
						foreach ($edps as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'false',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//employees
						$employees=array(
									'employee',
									'emp_admin_list',
									//'employee_report',		
							);
						foreach ($employees as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'false',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//sia
						$sia=array(
									'sia',
									//'sia_board',
									//Note:service Provider
									//'my_sia',
									'sia_program',
									'sia_program_list',
									'sia_inspector_associate_sia',				
									'sia_action',
									'sia_approval',
									'sia_central_search',
									'sia_corrective_action',
									'sia_followup',
									'execute_sia_program',
									'executed_sia_programs',
									'sia_today_task',
									'sia_sms',
									'sia_add_finding',
									//'sia_report',	
							);
						foreach ($sia as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//faqs	
						$faqs=array(
									'help_faq',
									'help_faq_answer',
									'help_faq_ask_question',
									'help_faq_bank',
									//'help_faq_report',
							);
						foreach ($faqs as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//its
						$its=array(
									'its',
									'its_my_its_records',
									'its_add_trainee',
									'its_assign_course_and_ojt',
									'its_central_search',
									'its_course_ojt_list',
									'its_formal_course_and_job_task',
									'its_review_update_tasks_and_course',				
									'its_report',
							);
						foreach ($its as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//notifications
						$notifications=array(
								//'notifications',		
							);
						foreach ($notifications as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//safeties
						$safeties=array(
									'safety_concern',
									'sc_approval',
									'sc_corrective_action',
									'sc_finalization',
									//'sc_followup',
									//'sc_forwarding',
									'sc_issue_safety_concern',
									//'sc_new_inspection',
									'sc_safety_concerns_list',				
									//'sc_report',		
							);
						foreach ($safeties as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//voluntary reporting
						$voluntaryReportings=array(
									'voluntary_reporting',
									'voluntary_reporting_action_details',
									'voluntary_reporting_approval',
									'voluntary_reporting_list'								
									);
						foreach ($voluntaryReportings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
				}
				elseif ($role==$inspectorOpsAirworthiness) 
				{

					//setting 
						$settings=array(
									//'add_user',
									//'all_user',
									//'dropdown_management',
									//'module',
									'settings',
							);
						foreach ($settings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//aircraft
						$aircrafts=array(
									'aircraft',
									//'aircraft_add_new_aircraft',
									'airaft_admin_list',
									//'aircraft_my_list',
									//'aircraft_report',
							); 
						foreach ($aircrafts as $aircraft) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$aircraft)
									->update(array(
										'access'=>'true',
										'entry'=>'false',
										'update'=>'false',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//libraries
						$libraries=array(
									'e_library',
									'library_add_new_supporitng_docs',
									//'library_report',
									'library_supporting_docs',				
									);
						foreach ($libraries as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//edps
						$edps=[
						'edp',
						//'edp_approval',
						//'edp_legal_opinion'
						];
						foreach ($edps as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//employees
						$employees=array(
									'employee',
									//'emp_admin_list',
									//'employee_report',		
							);
						foreach ($employees as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//sia
						$sia=array(
									'sia',
									//'sia_board',
									//Note:service Provider
									//'my_sia',
									'sia_program',
									//'sia_program_list',
									'sia_inspector_associate_sia',				
									'sia_action',
									//'sia_approval',
									//'sia_central_search',
									//'sia_corrective_action',
									'sia_followup',
									'execute_sia_program',
									//'executed_sia_programs',
									'sia_today_task',
									//'sia_sms',
									'sia_add_finding',
									//'sia_report',	
							);
						foreach ($sia as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//faqs	
						$faqs=array(
									'help_faq',
									'help_faq_answer',
									'help_faq_ask_question',
									'help_faq_bank',
									//'help_faq_report',
							);
						foreach ($faqs as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//its
						$its=array(
									'its',
									'its_my_its_records',
									//'its_add_trainee',
									//'its_assign_course_and_ojt',
									//'its_central_search',
									//'its_course_ojt_list',
									//'its_formal_course_and_job_task',
									//'its_review_update_tasks_and_course',				
									//'its_report',
							);
						foreach ($its as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//notifications
						$notifications=array(
								//'notifications',		
							);
						foreach ($notifications as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//safeties
						$safeties=array(
									'safety_concern',
									//'sc_approval',
									//'sc_corrective_action',
									'sc_finalization',
									//'sc_followup',
									//'sc_forwarding',
									'sc_issue_safety_concern',
									//'sc_new_inspection',
									'sc_safety_concerns_list',				
									//'sc_report',		
							);
						foreach ($safeties as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//voluntary reporting
						$voluntaryReportings=array(
									//'voluntary_reporting',
									//'voluntary_reporting_action_details',
									//'voluntary_reporting_approval',
									//'voluntary_reporting_list'								
									);
						foreach ($voluntaryReportings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
				}
				elseif ($role==$inspectorAnsAga) 
				{

					//setting 
						$settings=array(
									//'add_user',
									//'all_user',
									//'dropdown_management',
									//'module',
									'settings',
							);
						foreach ($settings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//aircraft
						$aircrafts=array(
									//'aircraft',
									//'aircraft_add_new_aircraft',
									//'airaft_admin_list',
									//'aircraft_my_list',
									//'aircraft_report',
							); 
						foreach ($aircrafts as $aircraft) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$aircraft)
									->update(array(
										'access'=>'true',
										'entry'=>'false',
										'update'=>'false',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//libraries
						$libraries=array(
									'e_library',
									'library_add_new_supporitng_docs',
									//'library_report',
									'library_supporting_docs',				
									);
						foreach ($libraries as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//edps
						$edps=[
						'edp',
						//'edp_approval',
						//'edp_legal_opinion'
						];
						foreach ($edps as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//employees
						$employees=array(
									'employee',
									//'emp_admin_list',
									//'employee_report',		
							);
						foreach ($employees as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//sia
						$sia=array(
									'sia',
									'sia_board',
									//Note:service Provider
									//'my_sia',
									'sia_program',
									//'sia_program_list',
									'sia_inspector_associate_sia',				
									'sia_action',
									//'sia_approval',
									//'sia_central_search',
									//'sia_corrective_action',
									'sia_followup',
									'execute_sia_program',
									//'executed_sia_programs',
									'sia_today_task',
									'sia_sms',
									'sia_add_finding',
									//'sia_report',	
							);
						foreach ($sia as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//faqs	
						$faqs=array(
									'help_faq',
									'help_faq_answer',
									'help_faq_ask_question',
									'help_faq_bank',
									//'help_faq_report',
							);
						foreach ($faqs as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//its
						$its=array(
									'its',
									'its_my_its_records',
									//'its_add_trainee',
									//'its_assign_course_and_ojt',
									//'its_central_search',
									//'its_course_ojt_list',
									//'its_formal_course_and_job_task',
									//'its_review_update_tasks_and_course',				
									//'its_report',
							);
						foreach ($its as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//notifications
						$notifications=array(
								//'notifications',		
							);
						foreach ($notifications as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//safeties
						$safeties=array(
									'safety_concern',
									//'sc_approval',
									//'sc_corrective_action',
									'sc_finalization',
									//'sc_followup',
									//'sc_forwarding',
									'sc_issue_safety_concern',
									//'sc_new_inspection',
									'sc_safety_concerns_list',				
									//'sc_report',		
							);
						foreach ($safeties as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//voluntary reporting
						$voluntaryReportings=array(
									//'voluntary_reporting',
									//'voluntary_reporting_action_details',
									//'voluntary_reporting_approval',
									//'voluntary_reporting_list'								
									);
						foreach ($voluntaryReportings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
				}
				elseif ($role==$inspectorLegal) 
				{
					//setting 
						$settings=array(
									//'add_user',
									//'all_user',
									//'dropdown_management',
									//'module',
									'settings',
							);
						foreach ($settings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//aircraft
						$aircrafts=array(
									//'aircraft',
									//'aircraft_add_new_aircraft',
									//'airaft_admin_list',
									//'aircraft_my_list',
									//'aircraft_report',
							); 
						foreach ($aircrafts as $aircraft) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$aircraft)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//libraries
						$libraries=array(
									'e_library',
									'library_add_new_supporitng_docs',
									//'library_report',
									'library_supporting_docs',				
									);
						foreach ($libraries as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//edps
						$edps=[
						'edp',
						//'edp_approval',
						'edp_legal_opinion'
						];
						foreach ($edps as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//employees
						$employees=array(
									'employee',
									//'emp_admin_list',
									//'employee_report',		
							);
						foreach ($employees as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//sia
						$sia=array(
									'sia',
									//'sia_board',
									//'my_sia',//----[Note:service Provider]
									//'sia_program',
									//'sia_program_list',
									'sia_inspector_associate_sia',				
									'sia_action',
									//'sia_approval',
									//'sia_central_search',
									//'sia_corrective_action',
									'sia_followup',
									//'execute_sia_program',
									//'executed_sia_programs',
									'sia_today_task',
									//'sia_sms',
									'sia_add_finding',
									//'sia_report',	
							);
						foreach ($sia as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//faqs	
						$faqs=array(
									'help_faq',
									'help_faq_answer',
									'help_faq_ask_question',
									'help_faq_bank',
									//'help_faq_report',
							);
						foreach ($faqs as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'false',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//its
						$its=array(
									'its',
									'its_my_its_records',
									// 'its_add_trainee',
									// 'its_assign_course_and_ojt',
									// 'its_central_search',
									// 'its_course_ojt_list',
									// 'its_formal_course_and_job_task',
									// 'its_review_update_tasks_and_course',				
									//'its_report',
							);
						foreach ($its as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//notifications
						$notifications=array(
								//'notifications',		
							);
						foreach ($notifications as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//safeties
						$safeties=array(
									'safety_concern',
									//'sc_approval',
									//'sc_corrective_action',
									'sc_finalization',
									//'sc_followup',
									//'sc_forwarding',
									'sc_issue_safety_concern',
									//'sc_new_inspection',
									//'sc_safety_concerns_list',				
									//'sc_report',		
							);
						foreach ($safeties as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//voluntary reporting
						$voluntaryReportings=array(
									// 'voluntary_reporting',
									// 'voluntary_reporting_action_details',
									// 'voluntary_reporting_approval',
									// 'voluntary_reporting_list'								
									);
						foreach ($voluntaryReportings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
				
				}
				elseif ($role==$itsManager) 
				{
					//setting 
						$settings=array(
									//'add_user',
									//'all_user',
									//'dropdown_management',
									//'module',
									'settings',
							);
						foreach ($settings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//aircraft
						$aircrafts=array(
									//'aircraft',
									//'aircraft_add_new_aircraft',
									//'airaft_admin_list',
									//'aircraft_my_list',
									//'aircraft_report',
							); 
						foreach ($aircrafts as $aircraft) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$aircraft)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//libraries
						$libraries=array(
									'e_library',
									'library_add_new_supporitng_docs',
									//'library_report',
									'library_supporting_docs',				
									);
						foreach ($libraries as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//edps
						$edps=[
						'edp',
						//'edp_approval',
						//'edp_legal_opinion'
						];
						foreach ($edps as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//employees
						$employees=array(
									'employee',
									//'emp_admin_list',
									//'employee_report',		
							);
						foreach ($employees as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//sia
						$sia=array(
									'sia',
									//'sia_board',
									//'my_sia',//----[Note:service Provider]
									//'sia_program',
									//'sia_program_list',
									'sia_inspector_associate_sia',				
									'sia_action',
									//'sia_approval',
									//'sia_central_search',
									//'sia_corrective_action',
									'sia_followup',
									//'execute_sia_program',
									//'executed_sia_programs',
									'sia_today_task',
									//'sia_sms',
									'sia_add_finding',
									//'sia_report',	
							);
						foreach ($sia as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//faqs	
						$faqs=array(
									'help_faq',
									'help_faq_answer',
									'help_faq_ask_question',
									'help_faq_bank',
									//'help_faq_report',
							);
						foreach ($faqs as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'false',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//its
						$its=array(
									 'its',
									 'its_my_its_records',
									 'its_add_trainee',
									 'its_assign_course_and_ojt',
									 'its_central_search',
									 'its_course_ojt_list',
									 'its_formal_course_and_job_task',
									 'its_review_update_tasks_and_course',				
									//'its_report',
							);
						foreach ($its as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//notifications
						$notifications=array(
								//'notifications',		
							);
						foreach ($notifications as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//safeties
						$safeties=array(
									'safety_concern',
									//'sc_approval',
									//'sc_corrective_action',
									'sc_finalization',
									//'sc_followup',
									//'sc_forwarding',
									'sc_issue_safety_concern',
									//'sc_new_inspection',
									//'sc_safety_concerns_list',				
									//'sc_report',		
							);
						foreach ($safeties as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//voluntary reporting
						$voluntaryReportings=array(
									// 'voluntary_reporting',
									// 'voluntary_reporting_action_details',
									// 'voluntary_reporting_approval',
									// 'voluntary_reporting_list'								
									);
						foreach ($voluntaryReportings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
				}
				elseif ($role==$programeManager) 
				{
					//setting 
						$settings=array(
									//'add_user',
									//'all_user',
									//'dropdown_management',
									//'module',
									'settings',
							);
						foreach ($settings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//aircraft
						$aircrafts=array(
									//'aircraft',
									//'aircraft_add_new_aircraft',
									//'airaft_admin_list',
									//'aircraft_my_list',
									//'aircraft_report',
							); 
						foreach ($aircrafts as $aircraft) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$aircraft)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//libraries
						$libraries=array(
									'e_library',
									'library_add_new_supporitng_docs',
									//'library_report',
									'library_supporting_docs',				
									);
						foreach ($libraries as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//edps
						$edps=[
						'edp',
						//'edp_approval',
						//'edp_legal_opinion'
						];
						foreach ($edps as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//employees
						$employees=array(
									'employee',
									//'emp_admin_list',
									//'employee_report',		
							);
						foreach ($employees as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//sia
						$sia=array(
									'sia',
									//'sia_board',
									//'my_sia',//----[Note:service Provider]
									'sia_program',
									'sia_program_list',
									'sia_inspector_associate_sia',				
									'sia_action',
									//'sia_approval',
									//'sia_central_search',
									//'sia_corrective_action',
									'sia_followup',
									//'execute_sia_program',
									//'executed_sia_programs',
									'sia_today_task',
									//'sia_sms',
									'sia_add_finding',
									//'sia_report',	
							);
						foreach ($sia as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//faqs	
						$faqs=array(
									'help_faq',
									'help_faq_answer',
									'help_faq_ask_question',
									'help_faq_bank',
									//'help_faq_report',
							);
						foreach ($faqs as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'false',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//its
						$its=array(
									'its',
									'its_my_its_records',
									// 'its_add_trainee',
									// 'its_assign_course_and_ojt',
									// 'its_central_search',
									// 'its_course_ojt_list',
									// 'its_formal_course_and_job_task',
									// 'its_review_update_tasks_and_course',				
									//'its_report',
							);
						foreach ($its as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//notifications
						$notifications=array(
								//'notifications',		
							);
						foreach ($notifications as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//safeties
						$safeties=array(
									'safety_concern',
									//'sc_approval',
									//'sc_corrective_action',
									'sc_finalization',
									//'sc_followup',
									//'sc_forwarding',
									'sc_issue_safety_concern',
									//'sc_new_inspection',
									//'sc_safety_concerns_list',				
									//'sc_report',		
							);
						foreach ($safeties as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//voluntary reporting
						$voluntaryReportings=array(
									// 'voluntary_reporting',
									// 'voluntary_reporting_action_details',
									// 'voluntary_reporting_approval',
									// 'voluntary_reporting_list'								
									);
						foreach ($voluntaryReportings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
				
				}
				elseif ($role==$voluntaryReportingManager) 
				{

					//setting 
						$settings=array(
									//'add_user',
									//'all_user',
									//'dropdown_management',
									//'module',
									'settings',
							);
						foreach ($settings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//aircraft
						$aircrafts=array(
									//'aircraft',
									//'aircraft_add_new_aircraft',
									//'airaft_admin_list',
									//'aircraft_my_list',
									//'aircraft_report',
							); 
						foreach ($aircrafts as $aircraft) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$aircraft)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//libraries
						$libraries=array(
									'e_library',
									'library_add_new_supporitng_docs',
									//'library_report',
									'library_supporting_docs',				
									);
						foreach ($libraries as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//edps
						$edps=[
						'edp',
						//'edp_approval',
						//'edp_legal_opinion'
						];
						foreach ($edps as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//employees
						$employees=array(
									'employee',
									//'emp_admin_list',
									//'employee_report',		
							);
						foreach ($employees as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//sia
						$sia=array(
									'sia',
									//'sia_board',
									//'my_sia',//----[Note:service Provider]
									//'sia_program',
									//'sia_program_list',
									'sia_inspector_associate_sia',				
									'sia_action',
									//'sia_approval',
									//'sia_central_search',
									//'sia_corrective_action',
									'sia_followup',
									//'execute_sia_program',
									//'executed_sia_programs',
									'sia_today_task',
									//'sia_sms',
									'sia_add_finding',
									//'sia_report',	
							);
						foreach ($sia as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//faqs	
						$faqs=array(
									'help_faq',
									'help_faq_answer',
									'help_faq_ask_question',
									'help_faq_bank',
									//'help_faq_report',
							);
						foreach ($faqs as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'false',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//its
						$its=array(
									'its',
									'its_my_its_records',
									// 'its_add_trainee',
									// 'its_assign_course_and_ojt',
									// 'its_central_search',
									// 'its_course_ojt_list',
									// 'its_formal_course_and_job_task',
									// 'its_review_update_tasks_and_course',				
									//'its_report',
							);
						foreach ($its as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//notifications
						$notifications=array(
								//'notifications',		
							);
						foreach ($notifications as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//safeties
						$safeties=array(
									'safety_concern',
									//'sc_approval',
									//'sc_corrective_action',
									'sc_finalization',
									//'sc_followup',
									//'sc_forwarding',
									'sc_issue_safety_concern',
									//'sc_new_inspection',
									//'sc_safety_concerns_list',				
									//'sc_report',		
							);
						foreach ($safeties as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//voluntary reporting
						$voluntaryReportings=array(
										'voluntary_reporting',
										'voluntary_reporting_action_details',
										//'voluntary_reporting_approval',
										'voluntary_reporting_list'								
									);
						foreach ($voluntaryReportings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
				}
				elseif ($role==$serviceProviderAoc) 
				{

					//setting 
						$settings=array(
									//'add_user',
									//'all_user',
									//'dropdown_management',
									//'module',
									'settings',
							);
						foreach ($settings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//aircraft
						$aircrafts=array(
									'aircraft',
									'aircraft_add_new_aircraft',
									//'airaft_admin_list',
									'aircraft_my_list',
									//'aircraft_report',
							); 
						foreach ($aircrafts as $aircraft) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$aircraft)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//libraries
						$libraries=array(
									'e_library',
									//'library_add_new_supporitng_docs',
									//'library_report',
									'library_supporting_docs',				
									);
						foreach ($libraries as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'false',
										'update'=>'false',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//edps
						$edps=[
						'edp',
						//'edp_approval',
						//'edp_legal_opinion'
						];
						foreach ($edps as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'false',
										'update'=>'false',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//employees
						$employees=array(
									//'employee',
									//'emp_admin_list',
									//'employee_report',		
							);
						foreach ($employees as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//sia
						$sia=array(
									'sia',
									//'sia_board',
									//Note:service Provider
									'my_sia',
									//'sia_program',
									//'sia_program_list',
									//'sia_inspector_associate_sia',				
									//'sia_action',
									//'sia_approval',
									//'sia_central_search',
									'sia_corrective_action',
									'sia_followup',
									//'execute_sia_program',
									//'executed_sia_programs',
									//'sia_today_task',
									'sia_sms',
									//'sia_add_finding',
									//'sia_report',	
							);
						foreach ($sia as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//faqs	
						$faqs=array(
									'help_faq',
									//'help_faq_answer',
									'help_faq_ask_question',
									'help_faq_bank',
									//'help_faq_report',
							);
						foreach ($faqs as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'false',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//its
						$its=array(
									// 'its',
									// 'its_my_its_records',
									// 'its_add_trainee',
									// 'its_assign_course_and_ojt',
									// 'its_central_search',
									// 'its_course_ojt_list',
									// 'its_formal_course_and_job_task',
									// 'its_review_update_tasks_and_course',				
									//'its_report',
							);
						foreach ($its as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//notifications
						$notifications=array(
								//'notifications',		
							);
						foreach ($notifications as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//safeties
						$safeties=array(
									//'safety_concern',
									//'sc_approval',
									'sc_corrective_action',
									//'sc_finalization',
									//'sc_followup',
									//'sc_forwarding',
									//'sc_issue_safety_concern',
									//'sc_new_inspection',
									//'sc_safety_concerns_list',				
									//'sc_report',		
							);
						foreach ($safeties as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//voluntary reporting
						$voluntaryReportings=array(
									// 'voluntary_reporting',
									// 'voluntary_reporting_action_details',
									// 'voluntary_reporting_approval',
									// 'voluntary_reporting_list'								
									);
						foreach ($voluntaryReportings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
				}
				elseif ($role==$serviceProviderAirport) 
				{

					//setting 
						$settings=array(
									//'add_user',
									//'all_user',
									//'dropdown_management',
									//'module',
									'settings',
							);
						foreach ($settings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//aircraft
						$aircrafts=array(
									//'aircraft',
									//'aircraft_add_new_aircraft',
									//'airaft_admin_list',
									//'aircraft_my_list',
									//'aircraft_report',
							); 
						foreach ($aircrafts as $aircraft) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$aircraft)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//libraries
						$libraries=array(
									'e_library',
									//'library_add_new_supporitng_docs',
									//'library_report',
									'library_supporting_docs',				
									);
						foreach ($libraries as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'false',
										'update'=>'false',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//edps
						$edps=[
						'edp',
						//'edp_approval',
						//'edp_legal_opinion'
						];
						foreach ($edps as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'false',
										'update'=>'false',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//employees
						$employees=array(
									//'employee',
									//'emp_admin_list',
									//'employee_report',		
							);
						foreach ($employees as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//sia
						$sia=array(
									'sia',
									//'sia_board',
									//[Note:service Provider]
									'my_sia',
									//'sia_program',
									//'sia_program_list',
									//'sia_inspector_associate_sia',				
									//'sia_action',
									//'sia_approval',
									//'sia_central_search',
									'sia_corrective_action',
									'sia_followup',
									//'execute_sia_program',
									//'executed_sia_programs',
									//'sia_today_task',
									'sia_sms',
									//'sia_add_finding',
									//'sia_report',	
							);
						foreach ($sia as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//faqs	
						$faqs=array(
									'help_faq',
									//'help_faq_answer',
									'help_faq_ask_question',
									'help_faq_bank',
									//'help_faq_report',
							);
						foreach ($faqs as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'false',
										'approve'=>'false',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}	
					//its
						$its=array(
									// 'its',
									// 'its_my_its_records',
									// 'its_add_trainee',
									// 'its_assign_course_and_ojt',
									// 'its_central_search',
									// 'its_course_ojt_list',
									// 'its_formal_course_and_job_task',
									// 'its_review_update_tasks_and_course',				
									//'its_report',
							);
						foreach ($its as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//notifications
						$notifications=array(
								//'notifications',		
							);
						foreach ($notifications as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'true',
										'sof_delete'=>'true',
										'par_delete'=>'true',
										'report'=>'false'
									));
						}
					//safeties
						$safeties=array(
									//'safety_concern',
									//'sc_approval',
									'sc_corrective_action',
									//'sc_finalization',
									//'sc_followup',
									//'sc_forwarding',
									//'sc_issue_safety_concern',
									//'sc_new_inspection',
									//'sc_safety_concerns_list',				
									//'sc_report',		
							);
						foreach ($safeties as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
					//voluntary reporting
						$voluntaryReportings=array(
									// 'voluntary_reporting',
									// 'voluntary_reporting_action_details',
									// 'voluntary_reporting_approval',
									// 'voluntary_reporting_list'								
									);
						foreach ($voluntaryReportings as $moduleName) {
							DB::table('module_user_permission')
									->where('user_id',$emp_id)
									->where('module_name',$moduleName)
									->update(array(
										'access'=>'true',
										'entry'=>'true',
										'update'=>'true',
										'approve'=>'true',
										'worning'=>'false',
										'sof_delete'=>'false',
										'par_delete'=>'false',
										'report'=>'false'
									));
						}
				}
				

				//end of privilage	
					return Redirect::to('settings')->with('message',"Emp Id <a href=singleUser/".$emp_id.">".$emp_id."( ".$name." )</a> holder is Now Getting Privilege of ".$role);
				}
				else {
					return Redirect::to('settings')->with('error', 'The following errors occurred')->withErrors($validator)->withInput();
				}
			
			
			
	}
 public function newModulePermissionupdate(){
		//return Input::get('entry');
		if(Input::get('module_name')!='Select Module'){
		DB::table('module_user_permission')->insert(
				array(
							'user_id'=>Input::get('id'),
							'module_name'=>Input::get('module_name'),
							'access'=>Input::get('access'),
							'entry'=>Input::get('entry'),
							'update'=>Input::get('update'),
							'approve'=>Input::get('approve'),
							'worning'=>Input::get('worning'),
							'sof_delete'=>Input::get('sof_delete'),
							'par_delete'=>Input::get('par_delete')
					)
			);
		return Redirect::back()->with('message','Permission Added');
		}
		else return Redirect::back()->with('error','Select Module!!!');
	}
	public function updateUserPermission(){
		//Module update start from here
	 $empId=Input::get('emp_id');
	// return Input::get('admin_tracking_access');
	 $module=Input::get('module_name');
	//$getModules=DB::table('module_names')->lists('module_name');
	//foreach($getModules as $module){
		DB::table('module_user_permission')
			->where('user_id',$empId)
			->where('module_name',$module)
			->update(array(
							'module_name'=>$module,
							'access'=>Input::get($module.'_access'),
							'entry'=>Input::get($module.'_entry'),
							'update'=>Input::get($module.'_update'),
							'approve'=>Input::get($module.'_approve'),
							'worning'=>Input::get($module.'_worning'),
							'sof_delete'=>Input::get($module.'_sof_delete'),
							'par_delete'=>Input::get($module.'_par_delete'),
							'report'=>Input::get($module.'_report')
			));
		//	}
			return Redirect::to(URL::previous() . "#$module")->with('message', 'Permission Updated!!');
		//return Redirect::to()->with('message','Permission Updated.');
	
 }
/*Update user information form Admin*/
 public function update()
	{
		
		$validator = Validator::make(Input::all(), User::$rules_user_update);
 
		if ($validator->passes()) {
			$id=Input::get('id');
			
			$user = User::find($id); 
			$user->name= Input::get('name');
			$user->emp_id= Input::get('emp_id');
			$user->email= Input::get('email');
			$user->role= Input::get('designation');
			$user->organization= Input::get('organization');
			
			
			if ( Input::get("password") != ""){
				$user->password= Hash::make(Input::get('password'));
			}
			
			$user->save();
		
			/**/
			$old=Input::get('old_organization');
			$new=Input::get('organization');
			//if User Org Changed then org and aircraft org/operator should change because they are dependent to each other
			if($old!=$new){
				DB::table('org_primary')->where('org_name',$old)->update(array(
					'org_name' =>$new,
					'row_updator' =>Auth::user()->getName(),
					'soft_delete' =>0,		
					'updated_at' =>time()		
					));
				DB::table('aircraft_primary_info')->where('aircraft_operator',$old)->update(array(
					'aircraft_operator' =>$new,					
					'soft_delete' =>0,		
					'updated_at' =>time()		
					));
			}
			
					
			
			return Redirect::to('viewUsers')->with('message','Updated!');
		} else {
			 return Redirect::to('viewUsers')->with('error', 'The following errors occurred')->withErrors($validator)->withInput();
		}
		
		
		
	}

/*Change the password of individual id holder*/
 public function changePasswordIndividual($userId)
	{
		$validator = Validator::make(Input::all(), User::$rule_changePass);
 
		if ($validator->passes()) {		
			$id = $userId;
			$password=Hash::make(Input::get('password'));
			$success = User::where('emp_id', '=', $id)->update(array('password' =>$password,'pass_change'=>1));
			if($success)
				return Redirect::back()->with('message','Password Changed!');
			return Redirect::back()->with('message','Password Not Changed!');
			
		} else {
			 return Redirect::back()->with('error', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

	public function changePassword()
	{
		$validator = Validator::make(Input::all(), User::$rule_changePass);
 
		if ($validator->passes()) {		
			$id = Auth::user()->getId();
			$password=Hash::make(Input::get('password'));
			$success = User::where('id', '=', $id)->update(array('password' =>$password,'pass_change'=>1));
			if($success)
				return Redirect::to('settings')->with('message','Password Changed!');
			return Redirect::to('settings')->with('message','Password Not Changed!');
			
		} else {
			 return Redirect::back()->with('error', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}


	public function updateMyProfile(){
		//$validator = Validator::make(Input::all(), User::$rule_changePass);
		$photo_upload=parent::updateFileUpload('old_photo','photo','userPhoto');
		
		$id=Input::get('id');
		//if ($validator->passes()) {		
		DB::table('users')
		->where('id',$id)
		->update(array(
		'name' => Input::get('name'),
		'email' => Input::get('email'),
		'photo' => $photo_upload
				
		));
	
	
		/*}
		else{
			return Redirect::to('settings')->with('error', 'The following errors occurred')->withErrors($validator)->withInput();
		}*/
		return Redirect::back()->with('message','Profile Updated!!');
	}
	public function delete()
	{
		$id=Input::get('id');
		$user = User::find($id); 
		$user->delete();
		return Redirect::to('viewUsers')->with('message','User Successfully Deleted!!');
	}

	public function viewModule(){
		$modules=DB::table('module_names')
		->where('soft_delete','<>','1')
		->orderBy('module_name')
		->get();
		return View::make('settings.module')
		->with('PageName','Module Names')
		->with('modules',$modules)

		;
	}
	public function saveModule(){
		$module= new Module;
		$module->label=Input::get('label');
		$module->module_name=Input::get('module_name');
		$module->save();
		return Redirect::back()->with('message','Module Saved!');
	}
	public function updateModule(){
		DB::table('module_names')
		->where('id',Input::get('id'))
		->update(array(
			'label'=>Input::get('label'),
			'module_name'=>Input::get('module_name')
			));
		DB::table('module_user_permission')
		->where('module_name',Input::get('old_module_name'))
		->update(array(
			'module_name'=>Input::get('module_name')
			));
		return Redirect::back()->with('message','Module Name Updated!');
	}
   public function updateUserProfileAdmin(){

   	    $photo_upload=parent::updateFileUpload('old_photo','photo','userPhoto');
		
		$id=Input::get('id');
		
		//if ($validator->passes()) {		
		DB::table('users')
		->where('id',$id)
		->update(array(
		'emp_id' => Input::get('emp_id'),
		'name' => Input::get('name'),
		'email' => Input::get('email'),
		'role' => Input::get('role'),
		'organization' => Input::get('organization'),
		'photo' => $photo_upload
				
		));
	
	
		/*}
		else{
			return Redirect::to('settings')->with('error', 'The following errors occurred')->withErrors($validator)->withInput();
		}*/
		return Redirect::back()->with('message','User Profile Updated!!');

   }

	public function singleUser($emp_id){
		$userInfos = DB::table('users')->where('emp_id',$emp_id)->get();
		$modules=DB::table('module_user_permission')
					->where('user_id',$emp_id)
					->orderBy('module_name')
					->get();	


		$select['']='Select Module';
		$moduleNames =DB::table('module_names')->where('soft_delete','<>','1')->orderBy('module_name')->lists('module_name');
		$moduleNames =array_merge($select,$moduleNames);
		$roles=DB::table('users')->orderBy('role')->lists('role');
		$organizations=DB::table('users')->orderBy('organization')->lists('organization');
		return View::make('settings.singleUser')
				->with('PageName','Single User')
				->with('userInfos',$userInfos)
				->with('modules',$modules)
				->with('moduleNames',$moduleNames)
				->with('empId',$emp_id)
				->with('roles',$roles)
				->with('organizations',$organizations)
				;
	}
	public function dropdownManagement(){
		$dropdownList=DB::table('dropdown_option_management')
				->select('dropdown_names','core_module_names')
				->where('soft_delete','<>','1')
				->orderBy('dropdown_names')
				->distinct()
				->get();
		return View::make('settings.dropDownManagement')
			->with('PageName','Drop-down Mangement')
			->with('dropdownList',$dropdownList)
			;
	}
	
	public function saveDropDownOption(){
		$dropDownName=Input::get('dropdown_names');
		$coreModuleName=Input::get('core_module_names');
		 $options=Input::get('mytext');
		//$options= serialize($options);
		foreach($options as $value){
			DB::table('dropdown_option_management')->insert(
					array(
							'dropdown_names'=>$dropDownName,
							'core_module_names'=>$coreModuleName,
							'options'=>$value,

							'row_creator'=>Auth::user()->getName(),
							'row_updator'=>Auth::user()->getName(),
							'soft_delete'=>'0',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s'),


						)
				);
		}
		return Redirect::back()->with('message','Inserted!!');
	}
	public function singleDropdown($dropdown_names,$core_module_names){
		$getOptions=DB::table('dropdown_option_management')
					->select('id','options')
					->where('soft_delete','<>','1')
					->where('dropdown_names',$dropdown_names)
					->where('core_module_names',$core_module_names)
					->get()
					;
		//$getOptions=DB::table('dropdown_option_management')->get();
		return View::make('settings.singleDropdown')
				->with('PageName','Single Dropdown')
				->with('getOptions',$getOptions)
				->with('dropdown_names',$dropdown_names)
				->with('core_module_names',$core_module_names)
				;
	}

	public function updateOption(){
		DB::table('dropdown_option_management')
		->where('id',Input::get('id'))
		->update(
			array(

					'options'=>Input::get('options'),

					'row_updator'=>Auth::user()->getName(),
					'updated_at'=>date('Y-m-d H:i:s'),
				)
			);
		return Redirect::back()->with('message','Option Updated!!');
	}
/*Depricated Pass change function*/
 public function checkListManagement(){
		$checklists=DB::table('sia_checklists')
				->select('checklist_name','checklist_type')
				->where('soft_delete','<>','1')
				->orderBy('checklist_name')
				->distinct()
				->get();
		return View::make('settings.checkListManagement')
			->with('PageName','Checklist Mangement')
			->with('checklists',$checklists)
			;
	}

/*This three function of bellow is for checklist.*/
 public function saveChecklistQuestion(){
		$checklist_name=Input::get('checklist_name');
		$checklist_type=Input::get('checklist_type');
		$section=Input::get('section');
		 $questions=Input::get('questions');
		//$options= serialize($options);
		foreach($questions as $value){
			DB::table('sia_checklists')->insert(
					array(
							'checklist_name'=>$checklist_name,
							'checklist_type'=>$checklist_type,
							'section'=>$section,
							'question'=>$value,

							'row_creator'=>Auth::user()->getName(),
							'row_updator'=>Auth::user()->getName(),
							'soft_delete'=>'0',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s'),


						)
				);
		}
		return Redirect::back()->with('message','Inserted!!');
	}
 public function singleChecklist($name,$type){
		$questions=DB::table('sia_checklists')
					//->select('id','question','')
					->where('soft_delete','<>','1')
					->where('checklist_name',$name)
					->where('checklist_type',$type)
					->get()
					;
		//$getOptions=DB::table('dropdown_option_management')->get();
		return View::make('settings.singleChecklist')
				->with('PageName','Single Checklist')
				->with('questions',$questions)
				->with('checklist_name',$name)
				->with('checklist_type',$type)
				;
	}

 public function saveQuestion(){
		$checklist_name=Input::get('checklist_name');
		$checklist_type=Input::get('checklist_type');
		$section=Input::get('section');
		$questions=Input::get('questions');
		
		foreach($questions as $value){
			DB::table('sia_checklists')->insert(
					array(
							'checklist_name'=>$checklist_name,
							'checklist_type'=>$checklist_type,
							'section'=>$section,
							'question'=>$value,

							'row_creator'=>Auth::user()->getName(),
							'row_updator'=>Auth::user()->getName(),
							'soft_delete'=>'0',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s'),
						)
				);
		}
		return Redirect::back()->with('message','Questions added!!');

		
	}
	
}