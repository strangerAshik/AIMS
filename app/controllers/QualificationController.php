<?php

class QualificationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function main(){
		//return "Hello";
		return View::make('qualification/main')
		->with('PageName','Main')
		->with('active','employee')
		->with('personnel',parent::getPersonnelInfo());
	}
	//report
	public function report(){
		return App::make('SurveillanceController')->report('qualification');
	}
	public function reportByDateToDate(){
		return App::make('SurveillanceController')->reportByDateToDate('qualification');
	}
	public function employees(){
		 $query=DB::table('qualification_personal')
            ->leftJoin('users', 'users.emp_id', '=', 'qualification_personal.emp_id')
            ->select('qualification_personal.emp_id','users.role','users.email', 'qualification_personal.first_name','qualification_personal.middle_name','qualification_personal.last_name', 'qualification_personal.mobile_no')
            ->get();
			
		return View::make('qualification.index')
		->with('PageName','Employee List')
		->with('active','employee')
		->with('emps',$query)
		->with('personnel', parent::getPersonnelInfo());
	}
	public function trainingArchive(){
		$trainings=DB::table('users')
					->Join('qualification_training_ojt','users.id','=','qualification_training_ojt.emp_id')
					->get();
	    //$trainings=DB::table('qualification_training_ojt')->get();
		return View::make('qualification.trainingArchive')
				->with('PageName','Training Archive')
				->with('active','employee')
				->with('trainings',$trainings)
				;
	}
	public function singleTrainingArchive($id){
		$trainings=DB::table('users')
					->Join('qualification_training_ojt','users.id','=','qualification_training_ojt.emp_id')
					->where('qualification_training_ojt.id',$id)
					->first();
	    //$trainings=DB::table('qualification_training_ojt')->get();
		return View::make('qualification.singleTraining')
				->with('PageName','Single Training')
				->with('active','employee')
				->with('trainings',$trainings)
				;
	}
	public function personnel()
	{
		$id = Auth::user()->emp_id();
		$query=DB::table('qualification_personal')->where('emp_id', '=', $id )->get();
		return View::make('qualification/personnel')
		->with('PageName','Personnel')
		->with('active','employee')
		->with('personnel', parent::getPersonnelInfo())
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		->with('infos',$query);
	}
	public function education()
	{	
		$years=parent::years();
		$id = Auth::user()->emp_id();
		$query1=DB::table('qualification_edu_accademic')->where('emp_id', '=', $id)->orderBy('pussing_year','desc')->get();
		$query2=DB::table('qualification_edu_thesis')->where('emp_id', '=', $id)->orderBy('id','desc')->get();
		return View::make('qualification/education')
		->with('PageName','Education')
		->with('active','employee')
		->with('personnel',parent::getPersonnelInfo())
		->with('a_sl','0')
		->with('t_sl','0')
		->with('year',$years)
		->with('accas',$query1)
		->with('thesis',$query2)
		;
	}
	public function employment()
	{
		$id = Auth::user()->emp_id();
		
		$query=DB::table('qualification_emplyment')->where('emp_id', '=', $id)->get();
		
		return View::make('qualification/employment')
		->with('PageName','employment')
		->with('active','employee')
		->with('personnel',parent::getPersonnelInfo())
		->with('a_sl','0')
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		->with('infos',$query)
		;
	}
	public function pro_degree()
	{	
		$id = Auth::user()->emp_id();
		$dates=parent::dates();
		$months=parent::months();
		$years=parent::years();
		$query=DB::table('qualification_pro_degree')->where('emp_id', '=', $id)->get();
		
		return View::make('qualification/pro_degree')
		->with('PageName','pro_degree')
		->with('active','employee')
		->with('personnel',parent::getPersonnelInfo())
		->with('a_sl','0')
		->with('year',$years)
		->with('infos',$query)
		;
	}
	public function taining_work_ojt()
	{
		$id = Auth::user()->emp_id();
		$query=DB::table('qualification_training_ojt')->where('emp_id', '=', $id)->get();
		return View::make('qualification/taining_work_ojt')
		->with('PageName','Training/ Workshop/ OJT')
		->with('active','employee')
		->with('personnel',parent::getPersonnelInfo())
		->with('a_sl','0')
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		->with('infos',$query)		
		;
	}
	public function language()
	{
		$id = Auth::user()->emp_id();
		$query=DB::table('qualification_language')->where('emp_id', '=', $id)->get();
		return View::make('qualification/language')
		->with('PageName','Language')
		->with('active','employee')
		->with('personnel',parent::getPersonnelInfo())
		->with('a_sl','0')
		->with('infos',$query)	
		;
	}
	public function technical_licence()
	{
		$dates=parent::dates();
		$months=parent::months();
		$years=parent::years();
		
		$id = Auth::user()->emp_id();
		$query=DB::table('qualification_technical_licence')->where('emp_id', '=', $id)->get();
		
		return View::make('qualification/technical_licence')
		->with('PageName','Technical Licence')
		->with('active','employee')
		->with('personnel',parent::getPersonnelInfo())
		->with('a_sl','0')
		->with('dates',$dates)
		->with('months',$months)
		->with('years',$years)
		->with('years_from',parent::years_from())
		->with('infos',$query)	
		;
	}
	public function aircraft_qualification()
	{
		$dates=parent::dates();
		$months=parent::months();
		$years=parent::years();
		
		$id = Auth::user()->emp_id();
		$query=DB::table('qualification_aircraft')->where('emp_id', '=', $id)->get();
		
		return View::make('qualification/aircraft_qualification')
				->with('PageName','Aircraft Qualification')
				->with('active','employee')
				->with('personnel',parent::getPersonnelInfo())
				->with('a_sl','0')
				->with('dates',$dates)
				->with('months',$months)
				->with('years',$years)
				->with('infos',$query)	
				;
	}
	public function reference()
	{	
		$id = Auth::user()->emp_id();
		$query=DB::table('qualification_reference')->where('emp_id', '=', $id)->get();
		return View::make('qualification/reference')
		->with('personnel',parent::getPersonnelInfo())
		->with('PageName','Reference')
		->with('active','employee')
		->with('a_sl','0')
		->with('infos',$query)	
		;
	}
	public function emp_verification()
	{
		$id = Auth::user()->emp_id();
		$query=DB::table('qualification_employee_verification')->where('emp_id', '=', $id)->orderBy('id','desc')->get();
		
		return View::make('qualification/emp_verification')
		->with('PageName','Employee Verification')
		->with('active','employee')
		->with('personnel',parent::getPersonnelInfo())
		->with('a_sl','0')
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		->with('infos',$query)	
		
		;
	}
	public function other()
	{
		//$image=Qualification_personal::getPhoto();
		//return $image;
		
		$id = Auth::user()->emp_id();
		$query1=DB::table('qualification_others_publication')->where('emp_id', '=', $id)->get();
		$query2=DB::table('qualification_others_membership')->where('emp_id', '=', $id)->get();
		
		return View::make('qualification/other')
		->with('PageName','other')
		->with('active','employee')
		->with('personnel',parent::getPersonnelInfo())
		->with('a_sl','0')
		->with('t_sl','0')
		->with('pubs',$query1)
		->with('membs',$query2);
	}
	public function comp_view($id)
	{
	    //$id = Auth::user()->emp_id();		
		$query1=DB::table('qualification_personal')->where('emp_id', '=', $id )->get();
		$query2=DB::table('qualification_edu_accademic')->where('emp_id', '=', $id)->orderBy('pussing_year','desc')->get();
		$query3=DB::table('qualification_edu_thesis')->where('emp_id', '=', $id)->get();
		$query4=DB::table('qualification_emplyment')->where('emp_id', '=', $id)->get();
		$query5=DB::table('qualification_pro_degree')->where('emp_id', '=', $id)->get();
		$query6=DB::table('qualification_training_ojt')->where('emp_id', '=', $id)->get();
		$query7=DB::table('qualification_language')->where('emp_id', '=', $id)->get();
		$query8=DB::table('qualification_technical_licence')->where('emp_id', '=', $id)->get();
		$query9=DB::table('qualification_aircraft')->where('emp_id', '=', $id)->get();
		$query10=DB::table('qualification_reference')->where('emp_id', '=', $id)->get();
		$query11=DB::table('qualification_employee_verification')->where('emp_id', '=', $id)->get();
		$query12=DB::table('qualification_others_publication')->where('emp_id', '=', $id)->get();
		$query13=DB::table('qualification_others_membership')->where('emp_id', '=', $id)->get();
		
		return View::make('qualification/comp_view')
		->with('PageName','Comprehensive View')
		->with('active','employee')
		->with('personnel',parent::getPersonnelInfo())
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		->with('years_from',parent::years_from())
		->with('sl1','0')
		->with('sl2','0')
		->with('sl3','0')
		->with('sl4','0')
		->with('sl5','0')
		->with('sl6','0')
		->with('sl7','0')
		->with('sl8','0')
		->with('sl9','0')
		->with('sl10','0')
		->with('sl11','0')
		->with('sl12','0')
		->with('ev','0')
		->with('personnel',$query1)
		->with('accademic',$query2)
		->with('thesis',$query3)
		->with('emplyment',$query4)
		->with('pro_degree',$query5)
		->with('training_ojt',$query6)
		->with('language',$query7)
		->with('technical_licence',$query8)
		->with('aircraft',$query9)
		->with('reference',$query10)
		->with('verification',$query11)
		->with('publication',$query12)
		->with('membership',$query13);
	}
	public function comp_view_per()
	{
	    $id = Auth::user()->emp_id();		
		$query1=DB::table('qualification_personal')->where('emp_id', '=', $id )->get();
		$query2=DB::table('qualification_edu_accademic')->where('emp_id', '=', $id)->get();
		$query3=DB::table('qualification_edu_thesis')->where('emp_id', '=', $id)->get();
		$query4=DB::table('qualification_emplyment')->where('emp_id', '=', $id)->get();
		$query5=DB::table('qualification_pro_degree')->where('emp_id', '=', $id)->get();
		$query6=DB::table('qualification_training_ojt')->where('emp_id', '=', $id)->get();
		$query7=DB::table('qualification_language')->where('emp_id', '=', $id)->get();
		$query8=DB::table('qualification_technical_licence')->where('emp_id', '=', $id)->get();
		$query9=DB::table('qualification_aircraft')->where('emp_id', '=', $id)->get();
		$query10=DB::table('qualification_reference')->where('emp_id', '=', $id)->get();
		$query11=DB::table('qualification_employee_verification')->where('emp_id', '=', $id)->get();
		$query12=DB::table('qualification_others_publication')->where('emp_id', '=', $id)->get();
		$query13=DB::table('qualification_others_membership')->where('emp_id', '=', $id)->get();
		
		return View::make('qualification/comp_view')
		->with('PageName','Comprehensive View')
		->with('active','employee')
		->with('personnel',parent::getPersonnelInfo())
		->with('dates',parent::dates())
		->with('months',parent::months())
		->with('years',parent::years())
		->with('years_from',parent::years_from())
		->with('sl1','0')
		->with('sl2','0')
		->with('sl3','0')
		->with('sl4','0')
		->with('sl5','0')
		->with('sl6','0')
		->with('sl7','0')
		->with('sl8','0')
		->with('sl9','0')
		->with('sl10','0')
		->with('sl11','0')
		->with('sl12','0')
		->with('ev','0')
		->with('personnel',$query1)
		->with('accademic',$query2)
		->with('thesis',$query3)
		->with('emplyment',$query4)
		->with('pro_degree',$query5)
		->with('training_ojt',$query6)
		->with('language',$query7)
		->with('technical_licence',$query8)
		->with('aircraft',$query9)
		->with('reference',$query10)
		->with('verification',$query11)
		->with('publication',$query12)
		->with('membership',$query13);
	}
	public function pdf()
		{
			$id = Auth::user()->emp_id();		
			$personnel=DB::table('qualification_personal')->where('emp_id', '=', $id )->get();
			$html = '<html><body>'
			
            .'<p>Put your html here, or generate it with your favourite '
            . 'templating system.</p>'
            . '</body></html>'; ;
			return PDF::load($html, 'A4', 'portrait')->show();
		}
	
	//Insert data
	public function savePersonnel(){		
		//image upload
		if($file = Input::file('photo')){
		$destinationPath = 'img/PersonnelPhoto';
		//$filename = $file->getClientOriginalName();
		$filename = time().'_'.Auth::user()->emp_id().'.'.$file->getClientOriginalExtension();
		$upload_success = Input::file('photo')->move($destinationPath, $filename);
		}
		else{
			$filename='Null';
		}
		//image upload end  
		
		DB::table('qualification_personal')->insert(array(
		'emp_id' => Auth::user()->emp_id(),
		'caa_id' => Input::get('caa_id',' '),
		'title' => Input::get('title',' '),
		'first_name' => Input::get('first_name',' '),
		'middle_name' =>Input::get('middle_name',' ') ,
		'last_name' => Input::get('last_name',' '),
		'mother_name' => Input::get('mother_name',' '),
		'father_name' => Input::get('father_name',' '),
		'mailing_address' => Input::get('mailing_address',' '),
		'parmanent_address' => Input::get('parmanent_address',' '),
		'telephone_work' => Input::get('telephone_work',' '),
		'telephone_residence' => Input::get('telephone_residence',' '),
		'mobile_no' => Input::get('mobile_no',' '),
		'nationality' => Input::get('nationality',' '),
		'national_id' => Input::get('national_id',' '),
		'sex' => Input::get('sex',' '),
		'blood_group' => Input::get('blood_group',' '),
		'date_of_birth' => Input::get('date_of_birth',' '),
		'month_of_birth' => Input::get('month_of_birth',' '),
		'year_of_birth' => Input::get('year_of_birth',' '),
		'photo' =>$filename,
		'verify' =>'1',
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')		
		));
			
		return Redirect::to('qualification/personnel')->with('message', 'Successfully Saved!!');
		
	}
	public function editPersonnel(){
		
		$old_photo=Input::get('old_photo');
		//image upload
		if($file = Input::file('photo')){
		$destinationPath = 'img/PersonnelPhoto';
		//$filename = $file->getClientOriginalName();
		$filename = time().'_'.Auth::user()->getId().'.'.$file->getClientOriginalExtension();
		$upload_success = Input::file('photo')->move($destinationPath, $filename);
		File::delete('img/PersonnelPhoto/'.$old_photo);
		}
		else{
			$filename=$old_photo;
		}
		//image upload end  
		//get the row id form hidden field
		$id= Input::get('id');
		
		DB::table('qualification_personal')
            ->where('id', $id)
            ->update(array(
			
		'caa_id' => Input::get('caa_id',' '),
		'title' => Input::get('title',' '),
		'first_name' => Input::get('first_name',' '),
		'middle_name' =>Input::get('middle_name',' ') ,
		'last_name' => Input::get('last_name',' '),
		'mother_name' => Input::get('mother_name',' '),
		'father_name' => Input::get('father_name',' '),
		'mailing_address' => Input::get('mailing_address',' '),
		'parmanent_address' => Input::get('parmanent_address',' '),
		'telephone_work' => Input::get('telephone_work',' '),
		'telephone_residence' => Input::get('telephone_residence',' '),
		'mobile_no' => Input::get('mobile_no',' '),
		'nationality' => Input::get('nationality',' '),
		'national_id' => Input::get('national_id',' '),
		'sex' => Input::get('sex',' '),
		'blood_group' => Input::get('blood_group',' '),
		'date_of_birth' => Input::get('date_of_birth',' '),
		'month_of_birth' => Input::get('month_of_birth',' '),
		'year_of_birth' => Input::get('year_of_birth',' '),
		'photo' =>$filename,
		
		'updated_at' =>date('Y-m-d H:i:s')
			
			
			));
			
			return Redirect::back()->with('message', 'Successfully Saved!!');
	}

	public function saveAccademic(){
		$certificate=parent::fileUpload('certificate','employee');
		DB::table('qualification_edu_accademic')->insert(array(
		'emp_id' => Auth::user()->emp_id(),
		'level' => Input::get('level',' '),
		'name_of_degree' => Input::get('name_of_degree',' '),
		'discipline' =>Input::get('discipline',' ') ,
		'specialization' => Input::get('specialization',' '),
		'institute' => Input::get('institute',' '),
		'pussing_year' => Input::get('pussing_year',' '),
		'standard' => Input::get('standard',' '),
		'grade_division' => Input::get('grade_division',' '),
		'certificate' => $certificate,
		'out_of' => Input::get('out_of',false),		
		'verify' =>'1',		
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')	
			
		));
			
		return Redirect::to('qualification/education')->with('message', 'Successfully Saved!!');
	}
	public function saveThesis(){
		
		DB::table('qualification_edu_thesis')->insert(array(
		'emp_id' => Auth::user()->emp_id(),
		'level' => Input::get('level',' '),
		'type' => Input::get('type',' '),
		'title' => Input::get('title',' '),
		'institute' =>Input::get('institute',' ') ,
		'duration' => Input::get('duration',' '),	
		'verify' =>'1',
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')	
		));
		return Redirect::to('qualification/education')->with('message', 'Successfully Saved!!');
	}
	public function saveEmploymentHistory(){		
		DB::table('qualification_emplyment')->insert(array(
		'emp_id' => Auth::user()->emp_id(),
		'organisation_name' => Input::get('organisation_name',' '),
		'organisation_type' => Input::get('organisation_type',' '),
		'organisation_address' => Input::get('organisation_address','Not Provided'),
		'designation' =>Input::get('designation',' ') ,
		'responsibility' => Input::get('responsibility',' '),	
		'start_date' => Input::get('start_date',' '),	
		'start_month' => Input::get('start_month',' '),	
		'start_year' => Input::get('start_year',' '),
		'end_date' => Input::get('end_date',' '),	
		'end_month' => Input::get('end_month',' '),	
		'end_year' => Input::get('end_year',' '),	
		'supervisor_name' => Input::get('supervisor_name',' '),	
		'supervisor_phone' => Input::get('supervisor_phone',' '),	
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')
		));
		return Redirect::to('qualification/employment')->with('message', 'Successfully Saved!!');
	}
    public function proDegree(){
	
	DB::table('qualification_pro_degree')->insert(array(
		'emp_id' => Auth::user()->emp_id(),
		'pro_degree_name' => Input::get('pro_degree_name',' '),
		'pro_degree_institute' => Input::get('pro_degree_institute',' '),
		'pro_degree_duration' => Input::get('pro_degree_duration',' '),
		'pro_degree_grade' =>Input::get('pro_degree_grade',' ') ,
		'pro_degree_major_area' => Input::get('pro_degree_major_area',' '),	
		
		'pro_degree_year' => Input::get('pro_degree_year',' '),	
		'verify' =>'1',
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')	
		));
	   return Redirect::to('qualification/pro_degree')->with('message', 'Successfully Saved!!');
   }
   
   public function saveTrainingWorkOJT(){

   		$start_date=Input::get('start_date').' '.Input::get('start_month').' '.Input::get('start_year');
		$timestamp = strtotime($start_date);
		$start_date =date('Y-m-d', $timestamp);

		$end_date=Input::get('end_date').' '.Input::get('end_month').' '.Input::get('end_year');
		$timestamp = strtotime($end_date);
		$end_date =date('Y-m-d', $timestamp);
	   //pdf upload
		if($file = Input::file('pdf')){
		$destinationPath = 'files/TrainingWorkshopOJT';
		//$filename = $file->getClientOriginalName();
		$filename = time().'_'.Auth::user()->emp_id().'.'.$file->getClientOriginalExtension();
		$upload_success = Input::file('pdf')->move($destinationPath, $filename);
		}
		else{
			$filename='Null';
		}
		//pdf upload end  
		DB::table('qualification_training_ojt')->insert(array(
		'emp_id' => Auth::user()->emp_id(),
		'category' => Input::get('category',' '),
		//training
		'type_of_training' => Input::get('type_of_training',' '),
		'training_course' => Input::get('training_course',' '),
		'subject' => Input::get('subject',' '),
		//ojt
		'training_task' => Input::get('training_task',' '),
		//workshop
		'topic' => Input::get('topic',' '),		
		
		'major_area' => Input::get('major_area',' '),
		'instructor' => Input::get('instructor',' '),
		'institute' =>Input::get('institute',' ') ,
		'location' => Input::get('location',' '),			
		'proof' => Input::get('proof',' '),	
		'certification' => Input::get('certification',' '),	
		'start_date' => $start_date,	
		'end_date' => $end_date,
		'pdf' => $filename,	
		'verify' =>'1',
		//'duration' => Input::get('duration',' '),			
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')	
		));
	    return Redirect::to('qualification/taining_work_ojt')->with('message', 'Successfully Saved!!');
   }
   public function saveLanguage(){
	   DB::table('qualification_language')->insert(array(
	   'emp_id' => Auth::user()->emp_id(),
	  // 'mother_tounge' =>Input::get('mother_tounge'),
	   'language' =>Input::get('language',' '),
	   'lang_speak' =>Input::get('lang_speak',' '),
	   'lang_understanding' =>Input::get('lang_understanding',' '),
	   'lang_reading' =>Input::get('lang_reading',' '),
	   'lang_writing' =>Input::get('lang_writing',' '),	  
	   'verify' =>'1', 
	   'created_at' =>date('Y-m-d H:i:s'),
	   'updated_at' =>date('Y-m-d H:i:s')
	   ));
	   return Redirect::to('qualification/language')->with('message', 'Successfully Saved!!');
   }
   public function saveTechnicalLicence(){
	 
	   DB::table('qualification_technical_licence')->insert(array(
	   'emp_id' => Auth::user()->emp_id(),
	   'active' =>Input::get('active',' '),
	   'licence_no' =>Input::get('licence_no',' '),
	   'licence_type' =>Input::get('licence_type',' '),
	   'issue_date' =>Input::get('issue_date',' '),
	   'issue_month' =>Input::get('issue_month',' '),
	   'issue_year' =>Input::get('issue_year',' '),
	   'expiration_date' =>Input::get('expiration_date',' '),	   
	   'expiration_month' =>Input::get('expiration_month',' '),	   
	   'expiration_year' =>Input::get('expiration_year',' '),	   
	   'rating' =>Input::get('rating',' '),	   
	   'verify' =>'1',
	   'created_at' =>date('Y-m-d H:i:s'),
	   'updated_at' =>date('Y-m-d H:i:s')	
	   ));
	   return Redirect::to('qualification/technical_licence')->with('message', 'Successfully Saved!!');
   }
   public function saveAircraftQualification(){
	  
	     //pdf upload
		if($file = Input::file('pdf')){
		$destinationPath = 'files/AircraftQualification';
		$filename = time().'_'.Auth::user()->emp_id().'.'.$file->getClientOriginalExtension();
		$upload_success = Input::file('pdf')->move($destinationPath, $filename);
		}
		else{
			$filename='Null';
		}
		//pdf upload end 
		
		DB::table('qualification_aircraft')->insert(array(
	   'emp_id' => Auth::user()->emp_id(),
	   'active' =>Input::get('active'),
	   'qualification_type' =>Input::get('qualification_type',' '),
	   'total_hours' =>Input::get('total_hours',' '),
	   'aircraft_mm' =>Input::get('aircraft_mm',' '),
	   'aircraft_msm' =>Input::get('aircraft_msm',' '),
	   'completion_date' =>Input::get('completion_date',' '),
	   'completion_month' =>Input::get('completion_month',' '),	   
	   'completion_year' =>Input::get('completion_year',' '),	   
	   //'status' =>Input::get('status',' '),	   
	   'institute' =>Input::get('institute',' '),	  
	   'instructor' =>Input::get('instructor',' '),	  
	   'proof' =>Input::get('proof',' '),	  
	   'pdf' =>$filename,	  
	   'verify' =>'1',
	  // 'certification' =>Input::get('certification',' '),	  
	   'created_at' =>date('Y-m-d H:i:s'),
	   'updated_at' =>date('Y-m-d H:i:s')	
	   ));
	   return Redirect::to('qualification/aircraft_qualification')->with('message', 'Successfully Saved!!');
   }
   public function saveReference(){
	  
	   DB::table('qualification_reference')->insert(array(
	   'emp_id' => Auth::user()->emp_id(),
	   'referee_type' =>Input::get('referee_type',' '),
	   'name' =>Input::get('name',' '),
	   'designation' =>Input::get('designation',' '),
	   'address' =>Input::get('address',' '),
	   'telephone' =>Input::get('telephone',' '),
	   'years_acquainted' =>Input::get('years_acquainted',' '),
	   'email_address' =>Input::get('email_address',' '),	   
	   //'completion_year' =>Input::get('completion_year'),	   
	   'may_we_request' =>Input::get('may_we_request',' '), 
	   'verify' =>'1',
	   //'certification' =>Input::get('certification'),	  
	   'created_at' =>date('Y-m-d H:i:s'),
	   'updated_at' =>date('Y-m-d H:i:s')
	   ));
	   return Redirect::back()->with('message', 'Successfully Saved!!');
   }
   public function EmpVerification(){
	   if(Input::get('termination_date')){
	   	 $active="No";
	   }
	   else{
	   	$active='Yes';
	   }
	    
	    DB::table('qualification_employee_verification')->insert(array(
	   'emp_id' => Auth::user()->emp_id(),
	   'name' =>Input::get('name',' '),
	   'entry_date' =>Input::get('entry_date',' '),
	   'entry_month' =>Input::get('entry_month',' '),
	   'entry_year' =>Input::get('entry_year',' '),
	   'active' =>$active,
	   'termination_date' =>Input::get('termination_date',' '),
	   'termination_month' =>Input::get('termination_month',' '),
	   'termination_year' =>Input::get('termination_year',' '),
	   'position' =>Input::get('position',' '),
	   'assigned_task' =>Input::get('assigned_task',' '),	     
	   'assigned_by' =>Input::get('assigned_by',' '),	     
	   'note' =>Input::get('note',' '),	  
	   'verify' =>'1',   
	   'created_at' =>date('Y-m-d H:i:s'),
	   'updated_at' =>date('Y-m-d H:i:s')
	   ));
	  return Redirect::to('qualification/emp_verification')->with('message', 'Successfully Saved!!');
   }
   public function savePublication(){
	   DB::table('qualification_others_publication')->insert(array(
	   'emp_id' => Auth::user()->emp_id(),
	   'title' =>Input::get('title',' '),
	   'description' =>Input::get('description',' '),  
	   'verify' =>'1',   
	   'created_at' =>date('Y-m-d H:i:s'),
	   'updated_at' =>date('Y-m-d H:i:s')	
	   ));
	  return Redirect::to('qualification/other')->with('message', 'Successfully Saved!!');
   } 
   public function saveMembership(){
	   DB::table('qualification_others_membership')->insert(array(
	   'emp_id' => Auth::user()->emp_id(),
	   'title' =>Input::get('title',' '),
	   'description' =>Input::get('description',' '),   
	   'verify' =>'1',  
	   'created_at' =>date('Y-m-d H:i:s'),
	   'updated_at' =>date('Y-m-d H:i:s')	
	   ));
	  return Redirect::to('qualification/other')->with('message', 'Successfully Saved!!');
   }
   /******************Start Update Area **********************/
   public function updateAccademic(){
	   $id= Input::get('id');
		$certificate=parent::updateFileUpload('old_certificate','certificate','employee');	
		DB::table('qualification_edu_accademic')
            ->where('id', $id)
            ->update(array(
				'level' => Input::get('level'),
				'name_of_degree' => Input::get('name_of_degree'),
				'discipline' =>Input::get('discipline') ,
				'specialization' => Input::get('specialization'),
				'institute' => Input::get('institute'),
				'pussing_year' => Input::get('pussing_year'),
				'standard' => Input::get('standard'),
				'grade_division' => Input::get('grade_division'),
				'certificate' =>$certificate,
				'out_of' => Input::get('out_of',false),		
				'updated_at' =>date('Y-m-d H:i:s')
			));
			
		return Redirect::back()->with('message', 'Successfully Updated!!');
   }
   public function updateThesis(){
	 $id= Input::get('idThesis');
		
		DB::table('qualification_edu_thesis')
            ->where('id',$id)
            ->update(array(
				'level' =>Input::get('level'),
				'type' => Input::get('type'),
				'title' => Input::get('title'),
				'institute' =>Input::get('institute') ,
				'duration' => Input::get('duration'),
				'updated_at' =>date('Y-m-d H:i:s')
			));
			
 	return Redirect::back()->with('message', 'Successfully Updated!!');
   }
   public function updateEmployment(){
	    $id= Input::get('id');
	   	DB::table('qualification_emplyment')
            ->where('id',$id)
            ->update(array(
				'organisation_name' => Input::get('organisation_name'),
				'organisation_type' => Input::get('organisation_type'),
				'organisation_address' => Input::get('organisation_address'),
				'designation' =>Input::get('designation') ,
				'responsibility' => Input::get('responsibility'),	
				'start_date' => Input::get('start_date'),	
				'start_month' => Input::get('start_month'),	
				'start_year' => Input::get('start_year'),
				'end_date' => Input::get('end_date'),	
				'end_month' => Input::get('end_month'),	
				'end_year' => Input::get('end_year'),	
				'supervisor_name' => Input::get('supervisor_name'),	
				'supervisor_phone' => Input::get('supervisor_phone'),	
				'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
   }
   public function updatePro_degree(){
	    $id= Input::get('id');
			DB::table('qualification_pro_degree')
            ->where('id',$id)
            ->update(array(
				'pro_degree_name' => Input::get('pro_degree_name'),
				'pro_degree_institute' => Input::get('pro_degree_institute'),
				'pro_degree_duration' => Input::get('pro_degree_duration'),
				'pro_degree_grade' =>Input::get('pro_degree_grade') ,
				'pro_degree_major_area' => Input::get('pro_degree_major_area'),
				'pro_degree_year' => Input::get('pro_degree_year'),	
				'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
   }
  public function updateTrainingWorkOJT(){
		
		$start_date=Input::get('start_date').' '.Input::get('start_month').' '.Input::get('start_year');
		$timestamp = strtotime($start_date);
		$start_date =date('Y-m-d', $timestamp);

		$end_date=Input::get('end_date').' '.Input::get('end_month').' '.Input::get('end_year');
		$timestamp = strtotime($end_date);
		$end_date =date('Y-m-d', $timestamp);


	   //pdf upload
		$old_file=Input::get('old_file');
		if($file = Input::file('pdf')){
		$destinationPath = 'files/TrainingWorkshopOJT';
		//$filename = $file->getClientOriginalName();
		$filename = time().'_'.Auth::user()->emp_id().'.'.$file->getClientOriginalExtension();
		$upload_success = Input::file('pdf')->move($destinationPath, $filename);
		File::delete('files/TrainingWorkshopOJT/'.$old_file);
		}
		else{
			$filename=$old_file;
		}
		//pdf upload end  
	$id= Input::get('id');
	DB::table('qualification_training_ojt')
            ->where('id',$id)
            ->update(array(
			  'category' => Input::get('category'),
				//training
				'type_of_training' => Input::get('type_of_training'),
				'training_course' => Input::get('training_course'),
				'subject' => Input::get('subject'),
				//ojt
				'training_task' => Input::get('training_task'),
				//workshop
				'topic' => Input::get('topic'),		
				
				'major_area' => Input::get('major_area'),
				'instructor' => Input::get('instructor'),
				'institute' =>Input::get('institute') ,
				'location' => Input::get('location'),			
				'proof' => Input::get('proof'),	
				'certification' => Input::get('certification'),	
				'start_date' => $start_date,	
				'end_date' => $end_date,	
				'pdf' => $filename,	
				//'duration' => Input::get('duration'),
				'updated_at' =>date('Y-m-d H:i:s')	
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
  }
  public function updateLanguage(){
	  $id= Input::get('id');
	  DB::table('qualification_language')
            ->where('id',$id)
            ->update(array(
			   'language' =>Input::get('language'),
			   'lang_speak' =>Input::get('lang_speak'),
			   'lang_understanding' =>Input::get('lang_understanding'),
			   'lang_reading' =>Input::get('lang_reading'),
			   'lang_writing' =>Input::get('lang_writing'),	
			   'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
	  
  }
  public function updateTechnicalLicence(){
	  $id= Input::get('id');
	  DB::table('qualification_technical_licence')
            ->where('id',$id)
            ->update(array(
			   'active' =>Input::get('active'),
			   'licence_no' =>Input::get('licence_no'),
			   'licence_type' =>Input::get('licence_type'),
			   'issue_date' =>Input::get('issue_date'),
			   'issue_month' =>Input::get('issue_month'),
			   'issue_year' =>Input::get('issue_year'),
			   'expiration_date' =>Input::get('expiration_date'),	   
			   'expiration_month' =>Input::get('expiration_month'),	   
			   'expiration_year' =>Input::get('expiration_year'),	   
			   'rating' =>Input::get('rating'),	
			   'updated_at' =>date('Y-m-d H:i:s')	
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
	  
  }
  public function updateAircraftQualification(){
	  
	  //pdf upload
		$old_file=Input::get('old_file');
		if($file = Input::file('pdf')){
		$destinationPath = 'files/AircraftQualification';
		//$filename = $file->getClientOriginalName();
		$filename = time().'_'.Auth::user()->emp_id().'.'.$file->getClientOriginalExtension();
		$upload_success = Input::file('pdf')->move($destinationPath, $filename);
		File::delete('files/AircraftQualification/'.$old_file);
		}
		else{
			$filename=$old_file;
		}
		//pdf upload end  
	$id= Input::get('id');
	  DB::table('qualification_aircraft')
            ->where('id',$id)
            ->update(array(
			   'active' =>Input::get('active'),
			   'qualification_type' =>Input::get('qualification_type'),
			   'total_hours' =>Input::get('total_hours'),
			   'aircraft_mm' =>Input::get('aircraft_mm'),
			   'aircraft_msm' =>Input::get('aircraft_msm'),
			   'completion_date' =>Input::get('completion_date'),
			   'completion_month' =>Input::get('completion_month'),	   
			   'completion_year' =>Input::get('completion_year'),	   
			   //'status' =>Input::get('status'),	   
			   'institute' =>Input::get('institute'),	  
			   'instructor' =>Input::get('instructor'),	  
			   'proof' =>Input::get('proof'),	  
			   'pdf' =>$filename,	  
			  // 'certification' =>Input::get('certification'),	
			   'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
	  
  }
  public function updateReference(){
	  $id= Input::get('id');
	  DB::table('qualification_reference')
            ->where('id',$id)
            ->update(array(
			   'referee_type' =>Input::get('referee_type'),
			   'name' =>Input::get('name'),
			   'designation' =>Input::get('designation'),
			   'address' =>Input::get('address'),
			   'telephone' =>Input::get('telephone'),
			   'years_acquainted' =>Input::get('years_acquainted'),
			   'email_address' =>Input::get('email_address'),	    
			   'may_we_request' =>Input::get('may_we_request'), 
			   'updated_at' =>date('Y-m-d H:i:s')	
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
	  
  }
  public function updateEmpVerification(){
	  $id= Input::get('id');
	   if(Input::get('termination_date')){
	   	 $active="No";
	   }
	   else{
	   	$active='Yes';
	   }
	  DB::table('qualification_employee_verification')
            ->where('id',$id)
            ->update(array(
			   'name' =>Input::get('name'),
			   'entry_date' =>Input::get('entry_date'),
			   'entry_month' =>Input::get('entry_month'),
			   'entry_year' =>Input::get('entry_year'),
			   'active' =>$active,
			   'termination_date' =>Input::get('termination_date'),
			   'termination_month' =>Input::get('termination_month'),
			   'termination_year' =>Input::get('termination_year'),
			   'position' =>Input::get('position'),
			   'assigned_task' =>Input::get('assigned_task'),
			   'assigned_by' =>Input::get('assigned_by'),
			   'note' =>Input::get('note'),	
			   'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
	  
  }
  public function updatePublication(){
	  $id= Input::get('id');
	  DB::table('qualification_others_publication')
            ->where('id',$id)
            ->update(array(
			  'title' =>Input::get('title'),
			  'description' =>Input::get('description'), 
			  'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
	  
  }
  public function updateMembership(){
	  $id= Input::get('id');
	  DB::table('qualification_others_membership')
            ->where('id',$id)
            ->update(array(
			  'title' =>Input::get('title'),
			  'description' =>Input::get('description'), 
			  'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message', 'Successfully Updated!!');
	  
  }
   /******************End Update Area **********************/
   /******************Delete Area **********************/
   public function deletePersonnel($id){
		DB::table('qualification_personal')->where('id', '=', $id)->delete();
		return Redirect::back()->with('message', 'Successfully Deleted!!');
		
		}
   public function deleteAccademic($id){
		DB::table('qualification_edu_accademic')->where('id', '=', $id)->delete();
		return Redirect::back()->with('message', 'Successfully Deleted!!');
		
		}
   public function deleteThesis($id){
		DB::table('qualification_edu_thesis')->where('id', '=', $id)->delete();
		return Redirect::back()->with('message', 'Successfully Deleted!!');
		
		}
   public function deleteEmployment($id){
		DB::table('qualification_emplyment')->where('id', '=', $id)->delete();
		return Redirect::back()->with('message', 'Successfully Deleted!!');
		
		}
   public function deleteProDegree($id){
		DB::table('qualification_pro_degree')->where('id', '=', $id)->delete();
		return Redirect::back()->with('message', 'Successfully Deleted!!');
		
		}
   public function deleteTraining($id){
		DB::table('qualification_training_ojt')->where('id', '=', $id)->delete();
		return Redirect::back()->with('message', 'Successfully Deleted!!');
		
		}
   public function deleteLanguage($id){
		DB::table('qualification_language')->where('id', '=', $id)->delete();
		return Redirect::back()->with('message', 'Successfully Deleted!!');
		
		}
   public function deleteTechlicence($id){
		DB::table('qualification_technical_licence')->where('id', '=', $id)->delete();
		return Redirect::back()->with('message', 'Successfully Deleted!!');
		
		}
   public function deleteAirQualification($id){
		DB::table('qualification_aircraft')->where('id', '=', $id)->delete();
		return Redirect::back()->with('message', 'Successfully Deleted!!');
		
		}
   public function deleteReference($id){
		DB::table('qualification_reference')->where('id', '=', $id)->delete();
		return Redirect::back()->with('message', 'Successfully Deleted!!');
		
		}
   public function deleteEnpVeri($id){
		DB::table('qualification_employee_verification')->where('id', '=', $id)->delete();
		return Redirect::back()->with('message', 'Successfully Deleted!!');
		
		}
    public function deleteMembership($id){
		DB::table('qualification_others_membership')->where('id', '=', $id)->delete();
		return Redirect::back()->with('message', 'Successfully Deleted!!');
		
		}
	public function deletePublication($id){
		DB::table('qualification_others_publication')->where('id', '=', $id)->delete();
		return Redirect::back()->with('message', 'Successfully Deleted!!');
		
		}
   /******************End Delete Area **********************/
   /******************Approve data **********************/
   public function approve($table,$id,$pageId=''){
   	$pageId=$id;
	     DB::table($table)
            ->where('id',$id)
            ->update(array(
			   'verify' =>'1',
			   'updated_at'=>date('Y-m-d H:i:s')
			));
	  // return Redirect::back()->with('message', 'Data Approved !!');
	    return Redirect::to(URL::previous() . "#$pageId")->with('message', 'Approval Info Updated!!');
   } 
   public function notApprove($table,$id,$pageId=''){
   	$pageId=$id;
	     DB::table($table)
            ->where('id',$id)
            ->update(array(
			   'verify' =>'0',
			   'updated_at'=>date('Y-m-d H:i:s')
			));
	   //return Redirect::back()->with('message', 'Data Approved !!');
	    return Redirect::to(URL::previous() . "#$pageId")->with('message', 'Approval Info Updated!!');
   }
   /******************End Approve data **********************/
	

	}

