<?php

class itsOjtController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function main()
	{
		return View::make('itsOjt/main')
		->with('PageName','ITS OJT Main')
		->with('active','its')
		;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function addCourse()
	{
		$formalCourses=DB::table('itsojt_course_formal')->orderBy('id','desc')->where('soft_delete','<>','1')->limit(5)->get();
		$ojtCourses=DB::table('itsojt_course_ojt')->orderBy('id','desc')->where('soft_delete','<>','1')->limit(5)->get();
		$formalCourseList=['' => '--Select Formal Course--'] +DB::table('itsojt_course_formal')->where('soft_delete','<>','1')->orderBy('its_course_number')->lists('its_course_number','its_course_number');
		return View::make('itsOjt/addCourse')
		->with('PageName','Add Course')
		->with('active','its')
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		->with('formalCourses',$formalCourses)
		->with('ojtCourses',$ojtCourses)
		->with('formalCourseList',$formalCourseList)
		;
	}
	public function courseList()
	{
		$formalCourses=DB::table('itsojt_course_formal')->where('soft_delete','<>','1')->orderBy('its_course_number')->get();
		$ojtCourses=DB::table('itsojt_course_ojt')->where('soft_delete','<>','1')->orderBy('its_course_number')->orderBy('its_job_task_no')->get();
		return View::make('itsOjt/courseList')
		->with('PageName','Course List')
		->with('active','its')
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		->with('formalCourses',$formalCourses)
		->with('ojtCourses',$ojtCourses)
		;
	}
	public function assignCourseAndOjt()
	{
		//$select=array('','--Select Tranee--');
		$traineeList=['' => '--Select Trainee--'] +DB::table('itsojt_trainee')->where('soft_delete','<>','1')->lists('employee_name','emp_tracker');
		//$traineeList=array_merge($select,$traineeList);

		$formalCourseList=['' => '--Select Formal Course--'] +DB::table('itsojt_course_formal')->where('soft_delete','<>','1')->orderBy('its_course_number')->lists('its_course_number','its_course_number');

		$formalCourses=DB::table('itsojt_course_formal')->where('soft_delete','<>','1')->orderBy('its_course_number')->get();
		$ojtCourses=DB::table('itsojt_course_ojt')->where('soft_delete','<>','1')->get();
		
		return View::make('itsOjt/assignCourseAndOjt')
		->with('PageName','Assign Course and OJT')
		->with('active','its')
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		->with('formalCourses',$formalCourses)
		->with('ojtCourses',$ojtCourses)
		->with('traineeList',$traineeList)
		->with('formalCourseList',$formalCourseList)
		;
	}
	public function saveAssignCourseAndojt(){
		$getImpName=DB::table('itsojt_trainee')->where('emp_tracker',Input::get('emp_tracker',' '))->pluck('employee_name');
		if (!Input::has('job_task_no'))
								{
									$job_task_no='0';
								}
	   else $job_task_no=Input::get('job_task_no');
		DB::table('itsojt_assign_course_ojt')->insert(
					array(
							'itscn'=>Input::get('itscn',' '),
							
							 'job_task_no'=>$job_task_no,
							
							
							'formal_or_ojt'=>Input::get('formal_or_ojt',' '),
							'emp_tracker'=>Input::get('emp_tracker',' '),
							
							
							'row_creator'=>Auth::user()->getName(),
							'row_updator'=>Auth::user()->getName(),
							'soft_delete'=>'0',
							'approve'=>'1',
							'warning'=>'0',
							'soft_delete'=>'0',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		return Redirect::back()->with('message','Course '.Input::get('itscn',' ').' is Assigned to '.$getImpName );
	
	}

	public function singleFormalCourse($its_course_number)
	{
		$courseDetails=DB::table('itsojt_course_formal')->where('soft_delete','<>','1')->where('its_course_number',$its_course_number)->get();
		return View::make('itsOjt/singleFormalCourse')
		->with('PageName','Single Formal Course')
		->with('active','its')
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		->with('courseDetails',$courseDetails)		
		;
	}

	public function singleOjtCourse($its_job_task_no)
	{
		$formalCourseList=['' => '--Select Formal Course--'] +DB::table('itsojt_course_formal')->where('soft_delete','<>','1')->orderBy('its_course_number')->lists('its_course_number','its_course_number');
		$courseDetails=DB::table('itsojt_course_ojt')->where('soft_delete','<>','1')->where('its_job_task_no',$its_job_task_no)->get();
		return View::make('itsOjt/singleOjtCourse')
		->with('PageName','Single OJT Course')
		->with('active','its')
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		->with('courseDetails',$courseDetails)		
		->with('formalCourseList',$formalCourseList)		
		;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function addFormalCourse()
	{
		$date=Input::get('revision_date').' '.Input::get('revision_month').' '.Input::get('revision_year');
		$timestamp = strtotime($date);
		$revision_date =date('Y-m-d', $timestamp);

		DB::table('itsojt_course_formal')->insert(
					array(
							'its_course_number'=>Input::get('its_course_number',' '),
							'its_course_title'=>Input::get('its_course_title',' '),
							'training_profile'=>Input::get('training_profile',' '),
							'training_category'=>Input::get('training_category',' '),
							'sequence'=>Input::get('sequence',' '),
							'course_length'=>Input::get('course_length',' '),
							'course_objective'=>Input::get('course_objective',' '),
							'course_description'=>Input::get('course_description',' '),
							'course_content'=>Input::get('course_content',' '),
							'prerequisites'=>Input::get('prerequisites',' '),
							'revision_date'=>$revision_date,
							'course_manager'=>Input::get('course_manager',' '),
							'phone'=>Input::get('phone',' '),
							'associated_caa_training_courses'=>Input::get('associated_caa_training_courses',' '),
							
							'row_creator'=>Auth::user()->getName(),
							'row_updator'=>Auth::user()->getName(),
							'soft_delete'=>'0',
							'approve'=>'1',
							'warning'=>'0',
							'soft_delete'=>'0',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		return Redirect::back()->with('message','Course Saved!');
	
	}
	public function editFormalCourse($id)
	{
		$date=Input::get('revision_date').' '.Input::get('revision_month').' '.Input::get('revision_year');
		$timestamp = strtotime($date);
		$revision_date =date('Y-m-d', $timestamp);

		$id=Input::get('id');

		DB::table('itsojt_course_formal')->where('id',$id)->update(
					array(
							'its_course_number'=>Input::get('its_course_number',' '),
							'its_course_title'=>Input::get('its_course_title',' '),
							'training_profile'=>Input::get('training_profile',' '),
							'training_category'=>Input::get('training_category',' '),
							'sequence'=>Input::get('sequence',' '),
							'course_length'=>Input::get('course_length',' '),
							'course_objective'=>Input::get('course_objective',' '),
							'course_description'=>Input::get('course_description',' '),
							'course_content'=>Input::get('course_content',' '),
							'prerequisites'=>Input::get('prerequisites',' '),
							'revision_date'=>$revision_date,
							'course_manager'=>Input::get('course_manager',' '),
							'phone'=>Input::get('phone',' '),
							'associated_caa_training_courses'=>Input::get('associated_caa_training_courses',' '),
							
						
							'row_updator'=>Auth::user()->getName(),
						
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		return Redirect::back()->with('message','Course Updated!');
	
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function addOjtCourse()
	{
		$date=Input::get('approval_date').' '.Input::get('approval_month').' '.Input::get('approval_year');
		$timestamp = strtotime($date);
		$approval_date =date('Y-m-d', $timestamp);

		DB::table('itsojt_course_ojt')->insert(
					array(
							'its_course_number'=>Input::get('its_course_number',' '),
							'its_job_task_no'=>Input::get('its_job_task_no',' '),
							'title'=>Input::get('title',' '),
							'approval_date'=>$approval_date,
							'comments'=>Input::get('comments',' '),
							'inspector_type'=>Input::get('inspector_type',' '),
							'training_category'=>Input::get('training_category',' '),
							'frequency'=>Input::get('frequency',' '),
							'associative_faa_job_task_no'=>Input::get('associative_faa_job_task_no',' '),
							'regulation_reference'=>Input::get('regulation_reference',' '),
							'caa_forms'=>Input::get('caa_forms',' '),
							'guidance_materials_referance'=>Input::get('guidance_materials_referance',' '),
							'task_description'=>Input::get('task_description',' '),
							'job_performance_subtasks'=>Input::get('job_performance_subtasks',' '),
							'job_performance_subtasks'=>Input::get('job_performance_subtasks',' '),
							
							'row_creator'=>Auth::user()->getName(),
							'row_updator'=>Auth::user()->getName(),
							'soft_delete'=>'0',
							'approve'=>'1',
							'warning'=>'0',
							'soft_delete'=>'0',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		return Redirect::back()->with('message','Course Saved!');
	}

	public function editOjtCourse($id)
	{
		$date=Input::get('approval_date').' '.Input::get('approval_month').' '.Input::get('approval_year');
		$timestamp = strtotime($date);
		$approval_date =date('Y-m-d', $timestamp);
		$id=Input::get('id');

		DB::table('itsojt_course_ojt')->where('id',$id)->update(
					array(
							'its_course_number'=>Input::get('its_course_number',' '),
							'its_job_task_no'=>Input::get('its_job_task_no',' '),
							'title'=>Input::get('title',' '),
							'approval_date'=>$approval_date,
							'comments'=>Input::get('comments',' '),
							'inspector_type'=>Input::get('inspector_type',' '),
							'training_category'=>Input::get('training_category',' '),
							'frequency'=>Input::get('frequency',' '),
							'associative_faa_job_task_no'=>Input::get('associative_faa_job_task_no',' '),
							'regulation_reference'=>Input::get('regulation_reference',' '),
							'caa_forms'=>Input::get('caa_forms',' '),
							'guidance_materials_referance'=>Input::get('guidance_materials_referance',' '),
							'task_description'=>Input::get('task_description',' '),
							'job_performance_subtasks'=>Input::get('job_performance_subtasks',' '),
							'job_performance_subtasks'=>Input::get('job_performance_subtasks',' '),
							
							
							'row_updator'=>Auth::user()->getName(),
							
						
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		return Redirect::back()->with('message','Course Updated!');
	}
	


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function addTrainee()
	{
		$trainees=DB::table('itsojt_trainee')->where('soft_delete','<>','1')->orderBy('id','desc')->get();
		return View::make('itsOjt/addTrainee')
			->with('PageName','Add Trainee')
			->with('active','its')
			->with('dates',parent::dates())
			->with('months',parent::months())
			->with('years',parent::years())
			->with('trainees',$trainees)
			;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function saveTrainee()
	{
		

		$date=Input::get('hire_date').' '.Input::get('hire_month').' '.Input::get('hire_year');
		$timestamp = strtotime($date);
		$hire_date =date('Y-m-d', $timestamp);

		$rule=array(
        	'employee_id' => 'required|unique:itsojt_trainee',       
    	);
		$inputData=	array(
							'emp_tracker'=>Input::get('emp_tracker',' '),
							'employee_id'=>trim(Input::get('employee_id',' ')),
							'employee_name'=>Input::get('employee_name',' '),
							'employees_speciality'=>Input::get('employees_speciality',' '),
							'hire_date'=>$hire_date,
							'hiring_criteria'=>Input::get('hiring_criteria',' '),
							'current_position'=>Input::get('current_position',' '),
							'position_description'=>Input::get('position_description',' '),

							'row_creator'=>Auth::user()->getName(),
							'row_updator'=>Auth::user()->getName(),
							'soft_delete'=>'0',
							'approve'=>'1',
							'warning'=>'0',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s'),
						);
		$validator = Validator::make($inputData,$rule);
		if ($validator->fails()){
		    return Redirect::back()->withErrors($validator)->withInput();
		}
		else{
			DB::table('itsojt_trainee')->insert($inputData);
			return Redirect::back()->with('message','Trainee Added!');
			}
	}
	public function editTrainee()
	{
		$id=Input::get('id');

		$date=Input::get('hire_date').' '.Input::get('hire_month').' '.Input::get('hire_year');
		$timestamp = strtotime($date);
		$hire_date =date('Y-m-d', $timestamp);

		DB::table('itsojt_trainee')->where('id',$id)->update(
					array(
			

							'employee_id'=>Input::get('employee_id'),
							'employee_name'=>Input::get('employee_name'),
							'employees_speciality'=>Input::get('employees_speciality'),
							'hire_date'=>$hire_date,
							'hiring_criteria'=>Input::get('hiring_criteria'),
							'current_position'=>Input::get('current_position'),
							'position_description'=>Input::get('position_description'),

							
							'row_updator'=>Auth::user()->getName(),
							
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		return Redirect::back()->with('message','Trainee Info Updated!');
	}

	public function singleTrainee($emp_tracker){
		$traineeInfo=DB::table('itsojt_trainee')->where('soft_delete','<>','1')->where('emp_tracker',$emp_tracker)->get();

		return View::make('itsOjt/singleTrainee')
					->with('PageName','Single Trainee')
					->with('active','its')
					->with('dates',parent::dates())
					->with('months',parent::months())
					->with('years',parent::years())
					->with('traineeInfo',$traineeInfo);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function addTrainingOjt()
	{
		$trainees=DB::table('itsojt_trainee')->where('soft_delete','<>','1')->orderBy('id','desc')->get();
		return View::make('itsOjt/addTrainingOjt')
			->with('PageName','Add Traingin OJT')
			->with('active','its')
			->with('trainees',$trainees)
			;
	}
	public function individualTrainingOjt($emp_tracker)
	{
		//$formalCourses=DB::table('itsojt_course_formal')->get();
		
		//$assingedFormalCourses=DB::table('itsojt_assign_course_ojt')
		//	->where('emp_tracker',$emp_tracker)
		//	->where('formal_or_ojt','formal')


		$assingedFormalCourses=DB::table('itsojt_course_formal')->orderBy('its_course_number')
        ->join('itsojt_assign_course_ojt', function($join) use ($emp_tracker)
        {
            $join->on('itsojt_course_formal.its_course_number', '=', 'itsojt_assign_course_ojt.itscn')
                 ->where('itsojt_assign_course_ojt.emp_tracker', '=', $emp_tracker)
                 ->where('itsojt_assign_course_ojt.job_task_no', '=', '0');
        })
        ->select('itsojt_assign_course_ojt.id as assignId','itsojt_course_formal.id','itsojt_course_formal.its_course_number','itsojt_course_formal.its_course_title','itsojt_assign_course_ojt.itscn')
        ->get();

		$assingedOjt=DB::table('itsojt_course_ojt')->join('itsojt_assign_course_ojt', function($join) use ($emp_tracker)
        {
            $join->on('itsojt_course_ojt.its_course_number', '=', 'itsojt_assign_course_ojt.itscn')
                 ->where('itsojt_assign_course_ojt.emp_tracker', '=', $emp_tracker);
        })
        ->select('itsojt_course_ojt.id','itsojt_course_ojt.its_course_number', 'itsojt_course_ojt.its_job_task_no')
        ->get();

       // $allJobTask=DB::table('itsojt_course_ojt')->get();

		return View::make('itsOjt/individualTrainingOjt')
			->with('PageName','Individual Training OJT')
			->with('active','its')
			->with('dates',parent::dates())
			->with('months',parent::months())
			->with('years',parent::years())
			->with('assingedFormalCourses',$assingedFormalCourses)
			->with('assingedOjt',$assingedOjt)
			->with('emp_tracker',$emp_tracker)
			//->with('allJobTask',$allJobTask)
			
			;
	}
//may be not requered
	public function singleTrainingOjt($its_course_number,$emp_tracker)
	{
		$formal=DB::table('itsojt_formal_ojt_course_status')
				->where('soft_delete','<>','1')
                ->where('itscn',$its_course_number)
                ->where('emp_tracker',$emp_tracker)
                ->where('level','formal')
              	->get();

        $getCourseName=DB::table('itsojt_course_formal')
        		->where('soft_delete','<>','1')
                ->where('its_course_number',$its_course_number)
                 ->pluck('its_course_title');

		
		$level1=DB::table('itsojt_formal_ojt_course_status')
		        ->where('soft_delete','<>','1')
                ->where('itscn',$its_course_number)
                ->where('emp_tracker',$emp_tracker)
                ->where('level','L1')

              	->get();
		$level2=DB::table('itsojt_formal_ojt_course_status')
				->where('soft_delete','<>','1')
                ->where('itscn',$its_course_number)
                ->where('emp_tracker',$emp_tracker)
                ->where('level','L2')
              	->get();
		$level3=DB::table('itsojt_formal_ojt_course_status')
				->where('soft_delete','<>','1')
                ->where('itscn',$its_course_number)
                ->where('emp_tracker',$emp_tracker)
                ->where('level','L3')
              	->get();


         $assoOjts=DB::table('itsojt_assign_course_ojt')
         			->where('soft_delete','<>','1')
        			->where('emp_tracker',$emp_tracker)
        			->where('itscn',$its_course_number)
        			->where('itscn',$its_course_number)
        			->where('formal_or_ojt','ojt')
        			->get();
		
		
		return View::make('itsOjt/singleTrainingOjt')
			->with('PageName','Single Training OJT')
			->with('active','its')
			->with('dates',parent::dates())
			->with('months',parent::months())
			->with('years',parent::years())
			->with('formal',$formal)
			->with('level1',$level1)
			->with('level2',$level2)
			->with('level3',$level3)
			->with('getCourseName',$getCourseName)
			->with('its_course_number',$its_course_number)
			->with('emp_tracker',$emp_tracker)
			->with('assoOjts',$assoOjts)
			
			;
	}

	public function traineeSingleFormalCourse($its_course_number,$emp_tracker)
	{
		

        $getCourseName=DB::table('itsojt_course_formal')
        		->where('soft_delete','<>','1')        		
                ->where('its_course_number',$its_course_number)
                 ->pluck('its_course_title');
       
        $formal=DB::table('itsojt_formal_ojt_course_status')
        		->where('soft_delete','<>','1')
                ->where('itscn',$its_course_number)
                ->where('emp_tracker',$emp_tracker)
                ->where('level','formal')
                ->orderBy('id','desc')
              	->get();

		return View::make('itsOjt/trineeSingleFormalCourse')
			->with('PageName','Trainee Single Formal Course')
			->with('active','its')
			->with('dates',parent::dates())
			->with('months',parent::months())
			->with('years',parent::years())
			
			->with('formal',$formal)
			->with('getCourseName',$getCourseName)
			->with('its_course_number',$its_course_number)
			->with('emp_tracker',$emp_tracker)
			
			
			;
	}
	public function trineeSingleOjtCourse($its_course_number,$its_job_task_no,$emp_tracker,$ojtd)
	{
		

        $getCourseName=DB::table('itsojt_course_formal')
        		->where('soft_delete','<>','1')        		
                ->where('its_course_number',$its_course_number)
                 ->pluck('its_course_title');
        $getOjtTitle=DB::table('itsojt_course_ojt') 
        		->where('soft_delete','<>','1')       		
                ->where('its_job_task_no',$its_job_task_no)
                 ->pluck('title');

        $formal=DB::table('itsojt_formal_ojt_course_status')
        		->where('soft_delete','<>','1')
                ->where('itscn',$its_course_number)
                ->where('emp_tracker',$emp_tracker)
                ->where('level','formal')
                ->orderBy('id','desc')
              	->get();

		$level1=DB::table('itsojt_formal_ojt_course_status')
				->where('soft_delete','<>','1')
                ->where('ojt_task_no',$its_job_task_no)
                ->where('emp_tracker',$emp_tracker)
                ->where('level','L1')
                ->orderBy('id','desc')
              	->get();
		$level2=DB::table('itsojt_formal_ojt_course_status')
		        ->where('soft_delete','<>','1')
                ->where('ojt_task_no',$its_job_task_no)
                ->where('emp_tracker',$emp_tracker)
                ->where('level','L2')
                ->orderBy('id','desc')
              	->get();
		$level3=DB::table('itsojt_formal_ojt_course_status')
				->where('soft_delete','<>','1')
                ->where('ojt_task_no',$its_job_task_no)
                ->where('emp_tracker',$emp_tracker)
                ->where('level','L3')
                ->orderBy('id','desc')
              	->get();
		
		return View::make('itsOjt/trineeSingleOjtCourse')
			->with('PageName','Trainee Single Training OJT')
			->with('active','its')
			->with('dates',parent::dates())
			->with('months',parent::months())
			->with('years',parent::years())
			
			->with('formal',$formal)
			->with('level1',$level1)
			->with('level2',$level2)
			->with('level3',$level3)
			->with('getCourseName',$getCourseName)
			->with('getOjtTitle',$getOjtTitle)
			->with('its_job_task_no',$its_job_task_no)
			->with('its_course_number',$its_course_number)
			->with('emp_tracker',$emp_tracker)
			->with('ojtd',$ojtd)
			
			;
	}

	public function updateFormalOjtStatus(){

		$certificate=parent::fileUpload('certificate','itsOjt');
		//$doc_upload=parent::updateFileUpload('old_doc_upload','doc_upload','lib_supporting_docs');

		$start_date=Input::get('start_date').' '.Input::get('start_month').' '.Input::get('start_year');
		$timestamp = strtotime($start_date);
		$start_date =date('Y-m-d', $timestamp);

		$completion_date=Input::get('completion_date').' '.Input::get('completion_month').' '.Input::get('completion_year');
		$timestamp = strtotime($completion_date);
		$completion_date =date('Y-m-d', $timestamp);

		$validity_date=Input::get('validity_date').' '.Input::get('validity_month').' '.Input::get('validity_year');
		$timestamp = strtotime($validity_date);
		$validity_date =date('Y-m-d', $timestamp);

		$level=Input::get('level',' ');

		if(!Input::has('itscn')){
			$itscn=0;
		}
		else
			$itscn=Input::get('itscn');
		
		if(!Input::has('ojt_task_no')){
			$ojt_task_no=0;
		}
		else
			$ojt_task_no=Input::get('ojt_task_no');


		 DB::table('itsojt_formal_ojt_course_status')->insert(
					array(
							'itscn'=>$itscn,
							'ojt_task_no'=>$ojt_task_no,
							'emp_tracker'=>Input::get('emp_tracker',' '),
							'level'=>$level,
							'instructor'=>Input::get('instructor',' '),
							'supervisor'=>Input::get('supervisor',' '),
							'manager'=>Input::get('manager',' '),
							'start_date'=>$start_date,
							'completion_date'=>$completion_date,
							'validity_date'=>$validity_date,
							'certificate'=>$certificate,
							'completion_status'=>Input::get('completion_status',' '),
							'notes'=>Input::get('notes'),
							//'review_comment'=>Input::get('review_comment'),

							'row_creator'=>Auth::user()->getName(),
							'row_updator'=>Auth::user()->getName(),
							'soft_delete'=>'0',
							'approve'=>'1',
							'warning'=>'0',
							'soft_delete'=>'0',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		 
		  return Redirect::to(URL::previous() . "#$level")->with('message', 'Status Updated!!');
		//return Redirect::back()->with('message','Status Updated!');
	}



	public function editUpdateFormalOjtStatus(){
		$id=Input::get('id');
		$pageId=Input::get('pageId');
		$certificate=parent::updateFileUpload('old_certificate','certificate','itsOjt');
		//$certificate=parent::fileUpload('certificate','itsOjt');
		//$doc_upload=parent::updateFileUpload('old_doc_upload','doc_upload','lib_supporting_docs');

		$start_date=Input::get('start_date').' '.Input::get('start_month').' '.Input::get('start_year');
		$timestamp = strtotime($start_date);
		$start_date =date('Y-m-d', $timestamp);

		$completion_date=Input::get('completion_date').' '.Input::get('completion_month').' '.Input::get('completion_year');
		$timestamp = strtotime($completion_date);
		$completion_date =date('Y-m-d', $timestamp);

		$validity_date=Input::get('validity_date').' '.Input::get('validity_month').' '.Input::get('validity_year');
		$timestamp = strtotime($validity_date);
		$validity_date =date('Y-m-d', $timestamp);

		


		DB::table('itsojt_formal_ojt_course_status')->where('id',$id)->update(
					array(
							
							'instructor'=>Input::get('instructor'),
							'supervisor'=>Input::get('supervisor'),
							'manager'=>Input::get('manager'),
							'start_date'=>$start_date,
							'completion_date'=>$completion_date,
							'validity_date'=>$validity_date,
							'certificate'=>$certificate,
							'completion_status'=>Input::get('completion_status'),
							'notes'=>Input::get('notes'),
							//'review_comment'=>Input::get('review_comment'),

							
							'row_updator'=>Auth::user()->getName(),
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		return Redirect::to(URL::previous() . "#{$pageId}");
	}


	public function centralSearch(){
		

        $itsAssignedFormal=DB::table('itsojt_assign_course_ojt')->where('soft_delete','<>','1')->select('itscn','emp_tracker')->limit(100)->get();
      //$itsAssignedFormal=array_unique($itsAssignedFormal);

		return View::make('itsOjt/centralSearch')
			->with('PageName','Individual Training OJT')
			->with('active','its')
			->with('dates',parent::dates())
			->with('months',parent::months())
			->with('years',parent::years())
			//->with('assingedFormalCourses',$assingedFormalCourses)
			//->with('assingedOjt',$assingedOjt)
			->with('itsAssignedFormal',$itsAssignedFormal)
			//->with('allJobTask',$allJobTask)
			
			;

	}
	public function itsRecords(){
		
		$id = Auth::user()->emp_id();
		 $emp_tracker=DB::table('itsojt_trainee')->where('employee_id',$id)->pluck('emp_tracker');
        $itsAssignedFormal=DB::table('itsojt_assign_course_ojt')
        ->where('emp_tracker',$emp_tracker)
        ->where('soft_delete','<>','1')
        ->select('itscn','emp_tracker')->get();
      //$itsAssignedFormal=array_unique($itsAssignedFormal);

		return View::make('itsOjt/itsRecords')
			->with('PageName','Individual ITS Records')
			->with('active','its')
			->with('dates',parent::dates())
			->with('months',parent::months())
			->with('years',parent::years())
			//->with('assingedFormalCourses',$assingedFormalCourses)
			//->with('assingedOjt',$assingedOjt)
			->with('itsAssignedFormal',$itsAssignedFormal)
			//->with('allJobTask',$allJobTask)
			
			;

	}
	public function report(){
		return View::make('itsOjt.report')
					->with('PageName','Report Main')
			        ->with('active','its');
	}
	public function itsOjtRecordProvider(){
		$traineeList=DB::table('itsojt_trainee')->select('emp_tracker','employee_id','employee_name')->get();
		$itsManager=DB::table('users')->where('role','10')->select('name','role')->get();

		return View::make('itsOjt.report.itsOjtRecordProvider')
					->with('PageName','ITSOJT Record Provider')
			        ->with('active','its')
			        ->with('traineeList',$traineeList)
			        ->with('itsManager',$itsManager)
			        ;
	}


}
