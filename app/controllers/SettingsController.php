<?php

class SettingsController extends \BaseController {

/*
*This class is for settings.
*/

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
		->with('active','settings')
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
					->with('active','settings')
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
		->with('active','settings')
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

 		

 		$rules_user_registration= array(
		    'name'=>'required|min:2',
		    'emp_id'=>'required|min:2|unique:users',
		    'email'=>'required|email|unique:users',
		    'designation'=>'required',
		    'password'=>'required|alpha_num|between:5,30|confirmed',
		    'password_confirmation'=>'required|alpha_num|between:5,30'
		    );

		
		$validator = Validator::make(Input::all(), $rules_user_registration);

		if ($validator->passes()) {
			//return Input::get('password');
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

			//pull all privilege area of role form role_privilege_details
				 $designation=Input::get('designation');
				 $privileges=DB::table('role_privilege_details')->where('role_id',trim($designation))->get();//('role_privillege_area');

				foreach ($privileges as $area) {
							DB::table('module_user_permission')							
									->insert(array(
										'user_id'=>$emp_id,
										'module_name'=>$area->role_privilege_area,
										'access'=>$area->access,
										'entry'=>$area->entry,
										'update'=>$area->update,	
										'approve'=>$area->approve,
										'worning'=>$area->worning,
										'sof_delete'=>$area->sof_delete,
										'par_delete'=>$area->par_delete,
										'report'=>$area->report
										));
						}
					//end of privilage	
					return Redirect::to('settings')->with('message',"Emp Id <a href=singleUser/".$emp_id.">".$emp_id."( ".$name." )</a> holder is Now Getting Privilege of ".CommonFunction::roleName($role));
				}
				else {
					return Redirect::to('settings')->with('error', 'The following errors occurred')->withErrors($validator)->withInput();
				}
			
			
			
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

		$name=Input::get('name');
		 $emp_id=Input::get('emp_id');
		 $role=Input::get('role');
		
		

	//delete all privilege info of this user
		DB::table('module_user_permission')->where('user_id',$emp_id)->delete();
	
	//privilege update 
		//pull all privilege area of role form role_privilege_details
				 $designation=$role;
				 $privileges=DB::table('role_privilege_details')->where('role_id',trim($designation))->get();//('role_privillege_area');

				foreach ($privileges as $area) {
							DB::table('module_user_permission')							
									->insert(array(
										'user_id'=>$emp_id,
										'module_name'=>$area->role_privilege_area,
										'access'=>$area->access,
										'entry'=>$area->entry,
										'update'=>$area->update,	
										'approve'=>$area->approve,
										'worning'=>$area->worning,
										'sof_delete'=>$area->sof_delete,
										'par_delete'=>$area->par_delete,
										'report'=>$area->report
										));
						}
					//end of privilage	
		
		return Redirect::back()->with('message','User Profile Updated!!');

   }
 public function privilageUpdateToAllOfThisRole($roleId){
 	//Get all same roled user
 	 $users=DB::table('users')->where('role',$roleId)->lists('emp_id');
 	//return count($users);
 	foreach ($users as $emp_id) {
 		
 
	//delete all privilege info of this user
		DB::table('module_user_permission')->where('user_id',$emp_id)->delete();
	
	//privilege update 
		//pull all privilege area of role form role_privilege_details
				// $designation=$role;
				 $privileges=DB::table('role_privilege_details')->where('role_id',trim($roleId))->get();//('role_privillege_area');

				foreach ($privileges as $area) {
							DB::table('module_user_permission')							
									->insert(array(
										'user_id'=>$emp_id,
										'module_name'=>$area->role_privilege_area,
										'access'=>$area->access,
										'entry'=>$area->entry,
										'update'=>$area->update,	
										'approve'=>$area->approve,
										'worning'=>$area->worning,
										'sof_delete'=>$area->sof_delete,
										'par_delete'=>$area->par_delete,
										'report'=>$area->report
										));
						}
					//end of privilage	
		}

 	return Redirect::back()->with('message','Role Updated for All');
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
		$rule_changePass=array(
	'password'=>'required|alpha_num|between:5,30|confirmed',
    'password_confirmation'=>'required|alpha_num|between:5,30'
	);

		$validator = Validator::make(Input::all(), $rule_changePass);
 
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
		->with('active','settings')
		->with('modules',$modules)

		;
	}

	public function moduleInstruction($id){

		$details=DB::table('module_details')->where('module_id',$id)->get();
		$moduleName=DB::table('module_names')->where('id',$id)->pluck('label');
		
		return View::make('settings.moduleInstructions')
		->with('PageName','Module Details')
		->with('active','settings')
		->with('moduleId',$id)
		->with('details',$details)
		->with('moduleName',$moduleName)
		;
	}
	public function moduleInstructionManagment($moduleName){
		//module id get by module name
		$id=DB::table('module_names')->where('module_name',$moduleName)->pluck('id');

		$details=DB::table('module_details')->where('module_id',$id)->get();
		$moduleName=DB::table('module_names')->where('id',$id)->pluck('label');
		
		return View::make('settings.moduleInstructions')
		->with('PageName','Module Details')
		->with('active','settings')
		->with('moduleId',$id)
		->with('details',$details)
		->with('moduleName',$moduleName)
		;
	}
	public function moduleRepors($id){

		$details=DB::table('module_reports')->where('module_id',$id)->get();
		$moduleName=DB::table('module_names')->where('id',$id)->pluck('label');
		
		return View::make('settings.moduleRepors')
		->with('PageName','Module Details')
		->with('active','settings')
		->with('moduleId',$id)
		->with('details',$details)
		->with('moduleName',$moduleName)
		;
	}
	public function moduleReporManage($moduleName){
		$id=DB::table('module_names')->where('module_name',$moduleName)->pluck('id');
		$details=DB::table('module_reports')->where('module_id',$id)->get();
		$moduleName=DB::table('module_names')->where('id',$id)->pluck('label');
		
		return View::make('settings.moduleRepors')
		->with('PageName','Module Details')
		->with('active','settings')
		->with('moduleId',$id)
		->with('details',$details)
		->with('moduleName',$moduleName)
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

	public function saveModuleInstruction(){
		 $id=Input::get('id');
		 if($id=='new'){
		 $moduleId=Input::get('module_id');
		 //module details 
		  $moduleDetails=DB::table('module_names')->where('id',$moduleId)->first();
		 //Save to module_details 
		 DB::table('module_details')->insert(array(
		 	'module_id'=>$moduleId,
		 	'module_lable'=>$moduleDetails->label,
		 	'module_name'=>$moduleDetails->module_name,
		 	'order'=>Input::get('order','0'),
		 	'title'=>Input::get('title',' '),
		 	'description'=>Input::get('description',' '),

		 	'width'=>Input::get('width',' '),
		 	'collapse'=>Input::get('collapse',' '),
		 	'background'=>Input::get('background',' '),
		 	'active'=>Input::get('active',' '),

		 	'row_creator'=>Auth::user()->getName(),
			'row_updator'=>Auth::user()->getName(),
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
		 	)) ;

		 return Redirect::back()->with('message','Instruction Saved');
		}
		else{
			//return Input::get('width',' ');
			 $moduleId=Input::get('module_id');
		 //module details 
		  $moduleDetails=DB::table('module_names')->where('id',$moduleId)->first();
		 //Save to module_details 
		 DB::table('module_details')->where('id',$id)->update(array(
		 	'module_id'=>$moduleId,
		 	'module_lable'=>$moduleDetails->label,
		 	'module_name'=>$moduleDetails->module_name,
		 	'order'=>Input::get('order','0'),
		 	'title'=>Input::get('title',' '),
		 	'description'=>Input::get('description',' '),

		 	'width'=>Input::get('width',' '),
		 	'collapse'=>Input::get('collapse',' '),
		 	'background'=>Input::get('background',' '),
		 	'active'=>Input::get('active',' '),

		 	//'row_creator'=>Auth::user()->getName(),
			'row_updator'=>Auth::user()->getName(),
			//'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
		 	)) ;

		 return Redirect::back()->with('message','Instruction Updated');
		}


	}
	public function saveModuleReports(){
		 $id=Input::get('id');
		 if($id=='new'){
		 $moduleId=Input::get('module_id');
		 //module details 
		  $moduleDetails=DB::table('module_names')->where('id',$moduleId)->first();
		 //Save to module_details 
		 DB::table('module_reports')->insert(array(
		 	'module_id'=>$moduleId,
		 	'module_lable'=>$moduleDetails->label,
		 	'module_name'=>$moduleDetails->module_name,
		 	'order'=>Input::get('order','0'),
		 	'title'=>Input::get('title',' '),
		 	'description'=>Input::get('description',' '),

		 	'url'=>Input::get('url','#'),
		 	'category'=>Input::get('category',' '),

		 	'active'=>Input::get('active',' '),

		 	'row_creator'=>Auth::user()->getName(),
			'row_updator'=>Auth::user()->getName(),
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
		 	)) ;

		 return Redirect::back()->with('message','Report Saved');
		}
		else{
			//return Input::get('width',' ');
			 $moduleId=Input::get('module_id');
		 //module details 
		  $moduleDetails=DB::table('module_names')->where('id',$moduleId)->first();
		 //Save to module_details 
		 DB::table('module_reports')->where('id',$id)->update(array(
		 	'module_id'=>$moduleId,
		 	'module_lable'=>$moduleDetails->label,
		 	'module_name'=>$moduleDetails->module_name,
		 	'order'=>Input::get('order','0'),
		 	'title'=>Input::get('title',' '),
		 	'description'=>Input::get('description',' '),

		 	'url'=>Input::get('url','#'),
		 	'category'=>Input::get('category',' '),
		 	
		 	'active'=>Input::get('active',' '),

		 	//'row_creator'=>Auth::user()->getName(),
			'row_updator'=>Auth::user()->getName(),
			//'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
		 	)) ;

		 return Redirect::back()->with('message','Report Updated');
		}


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
				->with('active','settings')
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
			->with('active','settings')
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
				->with('active','settings')
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
			->with('active','settings')
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
				->with('active','settings')
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

public function userDelete($id){
	$deleteUser=DB::table('users')->where('emp_id',$id)->delete();
	$deletePermission=DB::table('module_user_permission')->where('user_id',$id)->delete();
	return Redirect::to('viewUsers')->with('message','User Deleted.');



}
public function roleManagment(){
	$roles=DB::table('role_names')->orderBy('role_name')->get();
	return View::make('settings.roleAdd')
		->with('PageName','Module Names')
		->with('active','settings')
		->with('roles',$roles)
		;
}
public function saveRole(){
	DB::table('role_names')->insert(array(

			'role_name'=>Input::get('role_name'),

			'row_creator'=>Auth::user()->getName(),
			'row_updator'=>Auth::user()->getName(),
			
			'soft_delete'=>'0',
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s')
		));
	return Redirect::back()->with('message','Role Saved!!');
}
public function editRole(){
	$id=Input::get('id');
	DB::table('role_names')
	->where('id',$id)
	->update(array(
			'role_name'=>Input::get('role_name'),
			'row_updator'=>Auth::user()->getName(),
			'updated_at'=>date('Y-m-d H:i:s')
		));
	return Redirect::back()->with('message','Role Name Updated!!');
}
public function roleNameDelete($id){
	DB::table('role_names')->where('id',$id)->delete();
	DB::table('role_privileges')->where('role_id',$id)->delete();
	DB::table('role_privilege_details')->where('role_id',$id)->delete();

	return Redirect::back()->with('message','Role Deleted');
}
public function rolePrivillage($roleId){
	$modules=DB::table('module_names')->orderBy('module_name')->lists('module_name','module_name');
	$privilege_area=DB::table('role_privilege_details')->where('role_id',$roleId)->get();
	$privilageMain=DB::table('role_privileges')->where('role_id',$roleId)->first();
	return View::make('settings.rolePivillage')
		->with('PageName','Module Names')
		->with('active','settings')
		->with('roleId',$roleId)
		->with('modules',$modules)
		->with('privilege_area',$privilege_area)
		->with('privilageMain',$privilageMain)
		;
}
public function saveRolePrivileges(){
	$role_id=Input::get('role_id');
	$privilege_areas=Input::get('privilege_area');
	$role_name_serialize=serialize($privilege_areas);
	$access=Input::get('access','false');
	$entry=Input::get('entry','false');
	$update=Input::get('update','false');
	$approve=Input::get('approve','false');
	$worning=Input::get('worning','false');
	$sof_delete=Input::get('sof_delete','false');
	$par_delete=Input::get('par_delete','false');
	$report=Input::get('report','false');
	//return $role_name;
	//Save at role_privillege
	$created_at=date('Y-m-d H:i:s');
	DB::table('role_privileges')->insert(array(
			'role_id'=>$role_id,
			'role_privilege_all'=>$role_name_serialize,

			'access'=>$access,
			'entry'=>$entry,
			'update'=>$update,
			'approve'=>$approve,
			'worning'=>$worning,
			'sof_delete'=>$sof_delete,
			'par_delete'=>$par_delete,
			'report'=>$report,

			'row_creator'=>Auth::user()->getName(),
			'row_updator'=>Auth::user()->getName(),
			
			'soft_delete'=>'0',
			'created_at'=>$created_at,
			'updated_at'=>date('Y-m-d H:i:s')
		));

	$role_privilage_id=DB::table('role_privileges')		
		->where('role_id',$role_id)
		->where('created_at',$created_at)
		->pluck('id');

	//Save at role_privillage_details
	foreach ($privilege_areas as $area) {
		DB::table('role_privilege_details')->insert(array(
			'role_id'=>$role_id,
			'role_privilege_id'=>$role_privilage_id,
			'role_privilege_area'=>$area,
			'access'=>$access,
			'entry'=>$entry,
			'update'=>$update,
			'approve'=>$approve,
			'worning'=>$worning,
			'sof_delete'=>$sof_delete,
			'par_delete'=>$par_delete,
			'report'=>$report,
		));
	}
	return Redirect::back()->with('message','Privilege area added!');
	
}
public function editRolePrivileges(){
	$id=Input::get('id');
	$oldPrivilege=DB::table('role_privileges')->where('id',$id)->select('role_privilege_all')->first();		

	
	$role_id=Input::get('role_id');
	$privilege_areas=Input::get('privilege_area');
	$role_name_serialize=serialize($privilege_areas);
	$access=Input::get('access','false');
	$entry=Input::get('entry','false');
	$update=Input::get('update','false');
	$approve=Input::get('approve','false');
	$worning=Input::get('worning','false');
	$sof_delete=Input::get('sof_delete','false');
	$par_delete=Input::get('par_delete','false');
	$report=Input::get('report','false');
	//return $role_name;
	//Save at role_privillege
	$created_at=date('Y-m-d H:i:s');
	

	$role_privilage_id=$id;

	$privilege_areas=Input::get('privilege_area');
	$oldNum=count(unserialize($oldPrivilege->role_privilege_all));
	$old=unserialize($oldPrivilege->role_privilege_all);
	$newNum=count($privilege_areas);
	$new=$privilege_areas;
	if(!is_array($new)&&!is_array($old)){
	return Redirect::back()->with('message','Privilege area update failed!');
	}
	DB::table('role_privileges')
		->where('id',$id)
		->update(array(
			
			'role_privilege_all'=>$role_name_serialize,

			'row_updator'=>Auth::user()->getName(),
			'updated_at'=>date('Y-m-d H:i:s')
		));
	if($oldNum>$newNum){
		 $reductHappen=array_diff($old,$new);
		foreach ($reductHappen as $area) {
			DB::table('role_privilege_details')
			->where('role_privilege_id',$id)
			->where('role_privilege_area',trim($area))
			->delete();
		}
		return Redirect::back()->with('message','Privilege area deduct!');
	}
	else{
		
		$additionHappen=array_diff($new,$old);

	
	//Save at role_privillage_details
	foreach ($additionHappen as $area) {
		DB::table('role_privilege_details')->insert(array(
			'role_id'=>$id,
			'role_privilege_id'=>$role_privilage_id,
			'role_privilege_area'=>$area,
			'access'=>$access,
			'entry'=>$entry,
			'update'=>$update,
			'approve'=>$approve,
			'worning'=>$worning,
			'sof_delete'=>$sof_delete,
			'par_delete'=>$par_delete,
			'report'=>$report,
		));
	}
	return Redirect::back()->with('message','Privilege area Added!');
		
	}//end else
	
}
public function removeIndividualPrivilegeArea($id){
	//remove form role_privilege_details
	
	$keep=DB::table('role_privilege_details')->where('id',$id)->first();
	DB::table('role_privilege_details')->where('id',$id)->delete();
	//remove from role_privilege
	$mainPrivilege=DB::table('role_privileges')->where('id',$keep->role_privilege_id)->pluck('role_privilege_all');
	 $old=unserialize($mainPrivilege);
	 $diduct=array($keep->role_privilege_area);
	 if(is_array($old)&& is_array($diduct)){
	 $newPrivilege=array_diff($old,$diduct);

	 $newPrivilegeSerialize=serialize($newPrivilege);
	 //update at role_privileges
	 DB::table('role_privileges')
	 ->where('id',$keep->role_privilege_id)
	 ->update(array(
	 	'role_privilege_all'=>$newPrivilegeSerialize,
	 	));
   return Redirect::back()->with('message','Privilege Removed!!');
	}//endif 
	return Redirect::back()->with('message','Privilege Removed Failed!!');

}
public function rolePrivillageDetails($roleId,$id){

	$privilleges=DB::table('role_privilege_details')
			->where('id',$id)
			->first();
	
	return View::make('settings.rolePrivillageDetails')
		->with('PageName','Module Names')
		->with('active','settings')
		->with('privilleges',$privilleges)
		
		;
}
public function updatePrivilegeAreaPermission(){
	$id=Input::get('id');
	DB::table('role_privilege_details')->where('id',$id)->update(array(
			'access'=>Input::get('access','false'),
			'entry'=>Input::get('entry','false'),
			'update'=>Input::get('update','false'),
			'approve'=>Input::get('approve','false'),
			'worning'=>Input::get('worning','false'),
			'sof_delete'=>Input::get('sof_delete','false'),
			'par_delete'=>Input::get('par_delete','false'),
			'report'=>Input::get('report','false'),
		));
	return Redirect::back()->with('message','Permission Updated!!');
}

	
}