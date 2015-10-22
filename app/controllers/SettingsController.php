<?php

class SettingsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /settings
	 *
	 * @return Response
	 */
	public function roles(){
		//$roles=DB::table('roles');
		$roles = Role::lists('role_name', 'role_name');

		return $roles;
	}
	public function permission(){

		//aircraft module update
		$i='10000';
		
	
			DB::table('module_user_permission')
			->where('user_id','0'.$i)
			->where('module_name','aircraft')
			->update(array(
					'access'=>'true',
					'entry'=>'false',
					'update'=>'false',
					'approve'=>'false',
					'worning'=>'false',
					'sof_delete'=>'false',
					'par_delete'=>'false'
					));	
			DB::table('module_user_permission')
			->where('user_id',$i)
			->where('module_name','organization')
			->update(array(
					'access'=>'true',
					'entry'=>'false',
					'update'=>'false',
					'approve'=>'false',
					'worning'=>'false',
					'sof_delete'=>'false',
					'par_delete'=>'false'
					));	
			DB::table('module_user_permission')
			->where('user_id',$i)
			->where('module_name','safety_concern')
			->update(array(
					'access'=>'true',
					'entry'=>'true',
					'update'=>'true',
					'approve'=>'false',
					'worning'=>'false',
					'sof_delete'=>'true',
					'par_delete'=>'false'
					));	
			DB::table('module_user_permission')
			->where('user_id',$i)
			->where('module_name','employee')
			->update(array(
					'access'=>'true',
					'entry'=>'true',
					'update'=>'true',
					'approve'=>'false',
					'worning'=>'false',
					'sof_delete'=>'true',
					'par_delete'=>'false'
					));	
			DB::table('module_user_permission')
			->where('user_id',$i)
			->where('module_name','e_library')
			->update(array(
					'access'=>'true',
					'entry'=>'true',
					'update'=>'true',
					'approve'=>'false',
					'worning'=>'false',
					'sof_delete'=>'true',
					'par_delete'=>'false'
					));	
			DB::table('module_user_permission')
			->where('user_id',$i)
			->where('module_name','settings')
			->update(array(
					'access'=>'true',
					'entry'=>'true',
					'update'=>'true',
					'approve'=>'false',
					'worning'=>'false',
					'sof_delete'=>'true',
					'par_delete'=>'false'
					));
			DB::table('module_user_permission')
			->where('user_id',$i)
			->where('module_name','sc_new_inspection')
			->update(array(
					'access'=>'true',
					'entry'=>'true',
					'update'=>'true',
					'approve'=>'false',
					'worning'=>'false',
					'sof_delete'=>'true',
					'par_delete'=>'false'
					));	
			DB::table('module_user_permission')
			->where('user_id',$i)
			->where('module_name','sc_issue_safety_concern')
			->update(array(
					'access'=>'true',
					'entry'=>'true',
					'update'=>'true',
					'approve'=>'false',
					'worning'=>'false',
					'sof_delete'=>'true',
					'par_delete'=>'false'
					));	
			DB::table('module_user_permission')
			->where('user_id',$i)
			->where('module_name','sc_safety_concerns_list')
			->update(array(
					'access'=>'true',
					'entry'=>'true',
					'update'=>'true',
					'approve'=>'false',
					'worning'=>'false',
					'sof_delete'=>'true',
					'par_delete'=>'false'
					));	
			DB::table('module_user_permission')
			->where('user_id',$i)
			->where('module_name','airaft_list')
			->update(array(
					'access'=>'true',
					'entry'=>'false',
					'update'=>'false',
					'approve'=>'false',
					'worning'=>'false',
					'sof_delete'=>'false',
					'par_delete'=>'false'
					));	
			DB::table('module_user_permission')
			->where('user_id',$i)
			->where('module_name','airaft_admin_list')
			->update(array(
					'access'=>'true',
					'entry'=>'false',
					'update'=>'false',
					'approve'=>'false',
					'worning'=>'false',
					'sof_delete'=>'false',
					'par_delete'=>'false'
					));	
			DB::table('module_user_permission')
			->where('user_id',$i)
			->where('module_name','org_admin_list')
			->update(array(
					'access'=>'true',
					'entry'=>'false',
					'update'=>'false',
					'approve'=>'false',
					'worning'=>'false',
					'sof_delete'=>'false',
					'par_delete'=>'false'
					));	
		

	//this is for updateing existing user permission entry to module_user_permission
		$i=0;
		$j=-1;
	for($i;$i<=$j;$i++){
			$userId=$i;
			DB::table('module_user_permission')
			->insert(array(
				array(
							'user_id'=>$userId,
							'module_name'=>'aircraft',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'organization',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'surveillance_inspection_audit',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'),
					array(
							'user_id'=>$userId,
							'module_name'=>'safety_concern',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'personnel_licensing',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'admin_tracking',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'document_control',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'employee',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'emp_admin_list',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'ans_aga_aerodrome_inspection',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'),
					array(
							'user_id'=>$userId,
							'module_name'=>'report',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'wild_life_strike',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'accident_&_incident_investigation',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'),
					array(
							'user_id'=>$userId,
							'module_name'=>'e_library',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'volunteer_reporting',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'notifications',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'settings',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'add_user',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'all_user',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'module',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'sc_new_inspection',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
							),
					array(
							'user_id'=>$userId,
							'module_name'=>'sc_issue_safety_concern',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
							),
					array(
							'user_id'=>$userId,
							'module_name'=>'sc_safety_concerns_list',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
						),
					array(
							'user_id'=>$userId,
							'module_name'=>'sc_report',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
							),
					array(
							'user_id'=>$userId,
							'module_name'=>'aircraft_add_new_aircraft',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
							),
					array(
							'user_id'=>$userId,
							'module_name'=>'airaft_list',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
							),
					array(
							'user_id'=>$userId,
							'module_name'=>'aircraft_report',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
							),
					array(
							'user_id'=>$userId,
							'module_name'=>'airaft_admin_list',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
							),
					array(
							'user_id'=>$userId,
							'module_name'=>'org_add_new',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
							),
					array(
							'user_id'=>$userId,
							'module_name'=>'org_admin_list',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
							),
					array(
							'user_id'=>$userId,
							'module_name'=>'org_my_org',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
							),
					array(
							'user_id'=>$userId,
							'module_name'=>'org_report',
							'access'=>'false',
							'entry'=>'false',
							'update'=>'false',
							'approve'=>'false',
							'worning'=>'false',
							'sof_delete'=>'false',
							'par_delete'=>'false'
							),
					
					
				));
	}
	}
	public function organizations(){
		//$roles=DB::table('roles');
		$organizations =DB::table('users')->lists('organization');

		return $organizations;
	}
	public function index()
	{
		$modules =DB::table('module_names')->orderBy('module_name')->lists('module_name');
		return View::make('settings/index')
		->with('PageName','Settings')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('year',parent::years_from())
		->with('roles',$this->roles())
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

	/**
	 * Show the form for creating a new resource.
	 * GET /settings/create
	 *
	 * @return Response
	 */
	public function viewUsers()
	{
		
		$users = DB::table('users')->orderBy('role')->get();
		$modules=DB::table('module_user_permission')->orderBy('module_name')->get();	
		
		$select['']='Select Module';
		$moduleNames =DB::table('module_names')->orderBy('module_name')->lists('module_name');
		$moduleNames =array_merge($select,$moduleNames);

		return View::make('settings/viewUsers')
		->with('PageName','View Users')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('year',parent::years_from())
		->with('personnel',parent::getPersonnelInfo())
		->with('roles',$this->roles())
		->with('organizations',$this->organizations())
		->with('users',$users)
		->with('modules',$modules)
		->with('moduleNames',$moduleNames)
		;
	}

	public function saveUser()
	{
		//return 'Hello ';
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
	/*Permission */
	$userId=Input::get('emp_id');
	$getModules=DB::table('module_names')->lists('module_name');
	foreach($getModules as $module){
		DB::table('module_user_permission')->insert(array(
							'user_id'=>$userId,
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
	}
			
			
			return Redirect::to('settings')->with('message','New User Added!');
		} else {
			 return Redirect::to('settings')->with('error', 'The following errors occurred')->withErrors($validator)->withInput();
		}
		
		
		
	}
	public function newModulePermissionupdate(){
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
	$getModules=DB::table('module_names')->lists('module_name');
	foreach($getModules as $module){
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
			}
		return Redirect::back()->with('message','Permission Updated.');
	
}
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
		$module->module_name=Input::get('module_name');
		$module->save();
		return Redirect::back()->with('message','Module Saved!');
	}
	public function updateModule(){
		DB::table('module_names')
		->where('id',Input::get('id'))
		->update(array(
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

/*
		$query="SELECT module_names.module_name FROM `module_names` LEFT JOIN module_user_permission ON module_names.module_name = module_user_permission.module_name AND module_user_permission.user_id=$emp_id WHERE module_user_permission.module_name IS NULL ";*/
		/* $moduleNames =DB::table('module_names')
		->select('module_names.module_name')
        ->leftJoin('module_user_permission', 'module_names.module_name', '=', 'module_user_permission.module_name','module_user_permission.user_id','=',$emp_id)
        ->where('module_user_permission.user_id','Null')
        ->get();*/


		$select['']='Select Module';
		$moduleNames =DB::table('module_names')->orderBy('module_name')->lists('module_name');
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