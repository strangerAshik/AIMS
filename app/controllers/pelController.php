<?php

class PelController extends \BaseController {

	public function main()
	{
		return View::make('pel.main')
					->with('PageName','PEL Main')
					;
	}
	public function pelList(){
		$pels=DB::table('pel_personal_info')
            ->leftJoin('users', 'users.emp_id', '=', 'pel_personal_info.emp_id')
            ->select('pel_personal_info.emp_id','users.role','users.email', 'pel_personal_info.first_name','pel_personal_info.middle_name','pel_personal_info.last_name', 'pel_personal_info.mobile_no')
            ->get();

        return View::make('pel.pelList')
        		->with('PageName','PEL List')
        		->with('pels',$pels)
        		;
	}
	
	public function personalInfo(){

		$id = Auth::user()->emp_id();
		$PersonalInfos =DB::table('pel_personal_info')
		->where('soft_delete','<>','1')
		->where('emp_id', '=', $id )->get();

		return View::make('pel.personalInfo')
					->with('PageName','Personal Info')
					->with('dates',parent::dates())
					->with('months',parent::months())
					->with('years',parent::years())
					->with('PersonalInfos',$PersonalInfos )
					;
	}
	public function accademicQali(){

		$id = Auth::user()->emp_id();
		$accas=DB::table('pel_accademy')
		->where('soft_delete','<>','1')
		->where('emp_id', '=', $id)->get();
		$thesis=DB::table('pel_acca_thesis')
		->where('soft_delete','<>','1')
		->where('emp_id', '=', $id)->get();
		return View::make('pel.academicQualification')
					->with('PageName','Accademic Qali')
					->with('year',parent::years())
					->with('accas',$accas)
					->with('thesis',$thesis)
					;
	}

	public function savePersonalInfo(){
		
		$photo=parent::fileUpload('photo','pelPhoto');
		
		 DB::table('pel_personal_info')->insert(array(
		'emp_id' => Auth::user()->emp_id(),
		'title' => Input::get('title'),
		'first_name' => Input::get('first_name'),
		'middle_name' =>Input::get('middle_name') ,
		'last_name' => Input::get('last_name'),
		'mother_name' => Input::get('mother_name'),
		'father_name' => Input::get('father_name'),
		'mailing_address' => Input::get('mailing_address'),
		'parmanent_address' => Input::get('parmanent_address'),
		'telephone_work' => Input::get('telephone_work'),
		'telephone_residence' => Input::get('telephone_residence'),
		'mobile_no' => Input::get('mobile_no'),
		'nationality' => Input::get('nationality'),
		'national_id' => Input::get('national_id'),
		'sex' => Input::get('sex'),
		'blood_group' => Input::get('blood_group'),
		'date_of_birth' => Input::get('date_of_birth'),
		'month_of_birth' => Input::get('month_of_birth'),
		'year_of_birth' => Input::get('year_of_birth'),
		'photo' =>$photo,

		'row_creator' =>Auth::user()->getName(),
		'approve' =>0,
		'warning' =>0,
		'soft_delete' =>0,
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')		
		));
		
		return Redirect::back()->with('message','Personal Info saved!');
	}
	public function updatePesonalInfo(){
		
		$photo=parent::updateFileUpload('old_photo','photo','pelPhoto');

			$id=Input::get('id');

			DB::table('pel_personal_info')
			->where('id',$id)
			->update(array(
			'title' => Input::get('title'),
			'first_name' => Input::get('first_name'),
			'middle_name' =>Input::get('middle_name') ,
			'last_name' => Input::get('last_name'),
			'mother_name' => Input::get('mother_name'),
			'father_name' => Input::get('father_name'),
			'mailing_address' => Input::get('mailing_address'),
			'parmanent_address' => Input::get('parmanent_address'),
			'telephone_work' => Input::get('telephone_work'),
			'telephone_residence' => Input::get('telephone_residence'),
			'mobile_no' => Input::get('mobile_no'),
			'nationality' => Input::get('nationality'),
			'national_id' => Input::get('national_id'),
			'sex' => Input::get('sex'),
			'blood_group' => Input::get('blood_group'),
			'date_of_birth' => Input::get('date_of_birth'),
			'month_of_birth' => Input::get('month_of_birth'),
			'year_of_birth' => Input::get('year_of_birth'),
			'photo' =>$photo,

			'row_updator' =>Auth::user()->getName(),			
			'updated_at' =>date('Y-m-d H:i:s')	
			));
		return Redirect::back()->with('message','Personal Info Updated!');
	}

	public function saveAccademic(){
		
		$array=DB::table('pel_accademy')->insert(array(
				'emp_id' => Auth::user()->emp_id(),
				'level' => Input::get('level'),
				'name_of_degree' => Input::get('name_of_degree'),
				'discipline' =>Input::get('discipline') ,
				'specialization' => Input::get('specialization'),
				'institute' => Input::get('institute'),
				'pussing_year' => Input::get('pussing_year'),
				'standard' => Input::get('standard'),
				'grade_division' => Input::get('grade_division'),
				'out_of' => Input::get('out_of',false),	

				'row_creator' =>Auth::user()->getName(),
				'approve' =>0,
				'warning' =>0,
				'soft_delete' =>0,
				'created_at' =>date('Y-m-d H:i:s')	,
				'updated_at' =>date('Y-m-d H:i:s')	
			));
		

		return Redirect::back()->with('message','Academic saved!');
	}

	public function updateAccademic(){
		
	 
		
		DB::table('pel_accademy')
           ->where('id',Input::get('id'))
            ->update(array(
				'emp_id' => Auth::user()->emp_id(),
				'level' => Input::get('level'),
				'name_of_degree' => Input::get('name_of_degree'),
				'discipline' =>Input::get('discipline') ,
				'specialization' => Input::get('specialization'),
				'institute' => Input::get('institute'),
				'pussing_year' => Input::get('pussing_year'),
				'standard' => Input::get('standard'),
				'grade_division' => Input::get('grade_division'),
				'out_of' => Input::get('out_of',false),	

				'row_updator' =>Auth::user()->getName(),			
				'updated_at' =>date('Y-m-d H:i:s')	
			));
		

		return Redirect::back()->with('message','Academic Info Update!');
	}

	public function saveAccaThesis(){
		DB::table('pel_acca_thesis')->insert(array(
		'emp_id' => Auth::user()->emp_id(),
		'level' => Input::get('level'),
		'type' => Input::get('type'),
		'title' => Input::get('title'),
		'institute' =>Input::get('institute') ,
		'duration' => Input::get('duration'),	
		
		'row_creator' =>Auth::user()->getName(),
		'approve' =>0,
		'warning' =>0,
		'soft_delete' =>0,
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')
		));
		return Redirect::back()->with('message','Thesis/Project/Internship/Dissertation Info saved!!');
	}

public function updateAccaThesis(){
		
		DB::table('pel_acca_thesis')
            ->where('id',Input::get('id'))
            ->update(array(
				'level' => Input::get('level'),
				'type' => Input::get('type'),
				'title' => Input::get('title'),
				'institute' =>Input::get('institute') ,
				'duration' => Input::get('duration'),	
				
				'row_updator' =>Auth::user()->getName(),			
				'updated_at' =>date('Y-m-d H:i:s')
				));
		return Redirect::back()->with('message','
Thesis/Project/Internship/Dissertation Info Updated!!
');
	}

	public function languageProficiency(){
		$id = Auth::user()->emp_id();
		$languages=DB::table('pel_laguage_profeciancy')
				->where('soft_delete','<>','1')
				->where('emp_id', '=', $id)->get();
		return View::make('pel.languageProficiency')
		->with('PageName','Language Proficiency')
		->with('languages',$languages)	;
	}

	public function saveLanguageProfeciency(){
		DB::table('pel_laguage_profeciancy')->insert(array(	  
	   'emp_id' => Auth::user()->emp_id(),
	   'language' =>Input::get('language'),
	   'lang_speak' =>Input::get('lang_speak'),
	   'lang_understanding' =>Input::get('lang_understanding'),
	   'lang_reading' =>Input::get('lang_reading'),
	   'lang_writing' =>Input::get('lang_writing'),	   
	   
	   'row_creator' =>Auth::user()->getName(),
		'approve' =>0,
		'warning' =>0,
		'soft_delete' =>0,
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')
	   ));
	   return Redirect::back()->with('message', 'Language Successfully Saved!!');
	}
	public function updateLanguageProfeciency(){
		

		DB::table('pel_laguage_profeciancy')
		->where('id',Input::get('id'))
        ->update(array(	  
	   
	   'language' =>Input::get('language'),
	   'lang_speak' =>Input::get('lang_speak'),
	   'lang_understanding' =>Input::get('lang_understanding'),
	   'lang_reading' =>Input::get('lang_reading'),
	   'lang_writing' =>Input::get('lang_writing'),	   
	   
	   'row_updator' =>Auth::user()->getName(),			
		'updated_at' =>date('Y-m-d H:i:s')
	   ));
	   return Redirect::back()->with('message', 'Language Successfully Update!!');
	}
	public function designeeRecords(){
		$select=array(''=>'--Select Organization--');
		$organizations=DB::table('users')->orderBy('organization')->lists('organization','organization');
		$organizations=array_merge($select,$organizations);

		$designeeRecords=DB::table('pel_designee_record')
						->where('emp_id',Auth::user()->emp_id())
						->where('soft_delete','<>','1')
						->get();
	
		return View::make('pel.designeeRecords')
				->with('PageName','Designee Records')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())
				->with('organizations',$organizations)
				->with('designeeRecords',$designeeRecords)
				;
	}
	public function saveDesigneeRecord(){
		$file=parent::fileUpload('file','pelDesigneeRecord');
		DB::table('pel_designee_record')->insert(array(

		'emp_id'=>Auth::user()->emp_id(),
		'active'=>Input::get('active'),
		'designation_type'=>Input::get('designation_type'),
		'designation_category'=>Input::get('designation_category'),
		'business_address'=>Input::get('business_address'),
		'organization'=>Input::get('organization'),
		'aircraft'=>Input::get('aircraft'),
		
		'effective_date'=>Input::get('effective_date'),
		'effective_month'=>Input::get('effective_month'),
		'effective_year'=>Input::get('effective_year'),

		'expiration_date'=>Input::get('expiration_date'),
		'expiration_month'=>Input::get('expiration_month'),
		'expiration_year'=>Input::get('expiration_year'),

		'function'=>Input::get('function'),
		'limitation'=>Input::get('limitation'),
		'file'=>$file,

		'row_creator' =>Auth::user()->getName(),
		'approve' =>0,
		'warning' =>0,
		'soft_delete' =>0,
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','Designee Record Saved');
	}
	public function updateDesigneeRecord(){
		$file=parent::updateFileUpload('old_file','file','pelDesigneeRecord');
		
		DB::table('pel_designee_record')
		->where('id',Input::get('id'))
		->update(array(

		'active'=>Input::get('active'),
		'designation_type'=>Input::get('designation_type'),
		'designation_category'=>Input::get('designation_category'),
		'business_address'=>Input::get('business_address'),
		'organization'=>Input::get('organization'),
		'aircraft'=>Input::get('aircraft'),
		
		'effective_date'=>Input::get('effective_date'),
		'effective_month'=>Input::get('effective_month'),
		'effective_year'=>Input::get('effective_year'),

		'expiration_date'=>Input::get('expiration_date'),
		'expiration_month'=>Input::get('expiration_month'),
		'expiration_year'=>Input::get('expiration_year'),

		'function'=>Input::get('function'),
		'limitation'=>Input::get('limitation'),
		'file'=>$file,

		'row_updator' =>Auth::user()->getName(),			
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','Designee Record Updated');
	
	}
	public function medicalCertificate(){
		$medicalCertifications=DB::table('pel_medical_certification')
				->where('soft_delete','<>','1')
				->where('emp_id', '=', Auth::user()->emp_id())->get();
		return View::make('pel.medicalCertification')
				->with('PageName','Medical Certification')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())
				->with('medicalCertifications',$medicalCertifications)
				;
	}
	public function saveMedicalCertification(){
		$file=parent::fileUpload('file','pelMedicalCertification');
		DB::table('pel_medical_certification')->insert(array(

		'emp_id'=>Auth::user()->emp_id(),
		'active'=>Input::get('active'),

		'certificate_class'=>Input::get('certificate_class'),
		'basis_for_issuance'=>Input::get('basis_for_issuance'),
		
		'effective_date'=>Input::get('effective_date'),
		'effective_month'=>Input::get('effective_month'),
		'effective_year'=>Input::get('effective_year'),

		'expiration_date'=>Input::get('expiration_date'),
		'expiration_month'=>Input::get('expiration_month'),
		'expiration_year'=>Input::get('expiration_year'),

		'examination_date'=>Input::get('examination_date'),
		'examination_month'=>Input::get('examination_month'),
		'examination_year'=>Input::get('examination_year'),

		'medical_examiner'=>Input::get('medical_examiner'),
		'medical_limitation'=>Input::get('medical_limitation'),
		'file'=>$file,

		'row_creator' =>Auth::user()->getName(),
		'approve' =>0,
		'warning' =>0,
		'soft_delete' =>0,
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','Medical Certification Saved!!');
	}
	public function updateMedicalCertification(){
	
		$file=parent::updateFileUpload('old_file','file','pelMedicalCertification');
		DB::table('pel_medical_certification')
		->where('id',Input::get('id'))
		->update(array(
		'active'=>Input::get('active'),

		'certificate_class'=>Input::get('certificate_class'),
		'basis_for_issuance'=>Input::get('basis_for_issuance'),
		
		'effective_date'=>Input::get('effective_date'),
		'effective_month'=>Input::get('effective_month'),
		'effective_year'=>Input::get('effective_year'),

		'expiration_date'=>Input::get('expiration_date'),
		'expiration_month'=>Input::get('expiration_month'),
		'expiration_year'=>Input::get('expiration_year'),

		'examination_date'=>Input::get('examination_date'),
		'examination_month'=>Input::get('examination_month'),
		'examination_year'=>Input::get('examination_year'),

		'medical_examiner'=>Input::get('medical_examiner'),
		'medical_limitation'=>Input::get('medical_limitation'),
		'file'=>$file,

		'row_updator' =>Auth::user()->getName(),			
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','Medical Certification Update!!');
	}

	public function licenseHistory(){
		$organizations=DB::table('users')->orderBY('organization')->lists('organization','organization');
		$licenseHistorys=DB::table('pel_license_history')
		->where('emp_id',Auth::user()->emp_id())
		->where('soft_delete','<>','1')->get();
		return View::make('pel.licenseHistory')
				->with('PageName','License History')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())
				->with('organizations',$organizations)
				->with('licenseHistorys',$licenseHistorys)
				;
	}
	public function saveLicenseHistory(){
		$file=parent::fileUpload('file','pelLicenseHistory');
		DB::table('pel_license_history')->insert(array(
		'emp_id'=>Auth::user()->emp_id(),
		'active'=>Input::get('active'),

		'effective_date'=>Input::get('effective_date'),
		'effective_month'=>Input::get('effective_month'),
		'effective_year'=>Input::get('effective_year'),

		'certificate_type'=>Input::get('certificate_type'),
		'historical_event'=>Input::get('historical_event'),
		'results'=>Input::get('results'),
		'organization'=>Input::get('organization'),
		'designation_number'=>Input::get('designation_number'),
		'investigation_number'=>Input::get('investigation_number'),
		'accident_number'=>Input::get('accident_number'),
		'memo_notes'=>Input::get('memo_notes'),
		'file'=>$file,

		'row_creator' =>Auth::user()->getName(),
		'approve' =>0,
		'warning' =>0,
		'soft_delete' =>0,
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','License History Saved');
	}
	public function updateLicenseHistory(){
		$file=parent::updateFileUpload('old_file','file','pelLicenseHistory');
		DB::table('pel_license_history')
		->where('id',Input::get('id'))
		->update(array(
		'active'=>Input::get('active'),

		'effective_date'=>Input::get('effective_date'),
		'effective_month'=>Input::get('effective_month'),
		'effective_year'=>Input::get('effective_year'),

		'certificate_type'=>Input::get('certificate_type'),
		'historical_event'=>Input::get('historical_event'),
		'results'=>Input::get('results'),
		'organization'=>Input::get('organization'),
		'designation_number'=>Input::get('designation_number'),
		'investigation_number'=>Input::get('investigation_number'),
		'accident_number'=>Input::get('accident_number'),
		'memo_notes'=>Input::get('memo_notes'),
		'file'=>$file,

		'row_updator' =>Auth::user()->getName(),			
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','License History Update!!');
	}

	public function logbookReview(){
		$logbookRecords=DB::table('pel_logbook_review')
		->where('emp_id',Auth::user()->emp_id())
		->where('soft_delete','<>','1')->get();
		return View::make('pel.logbookReview')
				->with('PageName','Logbook Review')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())
				->with('logbookRecords',$logbookRecords)
				;
	}

	public function saveLogbookReview(){
		DB::table('pel_logbook_review')->insert(array(
		'emp_id'=>Auth::user()->emp_id(),
		'active'=>Input::get('active'),

		'review_date'=>Input::get('review_date'),
		'review_month'=>Input::get('review_month'),
		'review_year'=>Input::get('review_year'),

		'purpose_of_review'=>Input::get('purpose_of_review'),
		'flight_time'=>Input::get('flight_time'),
		'memo_notes'=>Input::get('memo_notes'),

		'row_creator' =>Auth::user()->getName(),
		'approve' =>0,
		'warning' =>0,
		'soft_delete' =>0,
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','Logbook Review Saved');
	}
	public function updateLogbookReview(){
		DB::table('pel_logbook_review')
		->where('id',Input::get('id'))
		->update(array(
		
		'active'=>Input::get('active'),

		'review_date'=>Input::get('review_date'),
		'review_month'=>Input::get('review_month'),
		'review_year'=>Input::get('review_year'),

		'purpose_of_review'=>Input::get('purpose_of_review'),
		'flight_time'=>Input::get('flight_time'),
		'memo_notes'=>Input::get('memo_notes'),

		'row_updator' =>Auth::user()->getName(),			
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','Logbook Review Update!');
	}

	public function licenseInfoMain(){

		return View::make('pel.licenseInfoMain')
				->with('PageName','License Info Main');
	}
	public function simulator(){
		$simulatorHistorys=DB::table('pel_simulator')
			->where('emp_id',Auth::user()->emp_id())
			->where('soft_delete','<>','1')
			->get();
		return View::make('pel.simulator')
				->with('PageName','Simulator')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())
				->with('simulatorHistorys',$simulatorHistorys)
				;
	}
	public function saveSimulator(){
		DB::table('pel_simulator')->insert(array(
		'emp_id'=>Auth::user()->emp_id(),

		'date'=>Input::get('date'),
		'month'=>Input::get('month'),
		'year'=>Input::get('year'),

		'model'=>Input::get('model'),
		'registration'=>Input::get('registration'),
		'location'=>Input::get('location'),
		'other_crew_instructor'=>Input::get('other_crew_instructor'),
		'type_of_instruction'=>Input::get('type_of_instruction'),
		'FFS_HR'=>Input::get('FFS_HR'),
		'FNPT_1_HR'=>Input::get('FNPT_1_HR'),
		'FNPT_II_HR'=>Input::get('FNPT_II_HR'),
		'CSS_HR'=>Input::get('CSS_HR'),
		'instruction_HR'=>Input::get('instruction_HR'),
		'exam_HR'=>Input::get('exam_HR'),

		'row_creator' =>Auth::user()->getName(),
		'approve' =>0,
		'warning' =>0,
		'soft_delete' =>0,
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','Simulator History Saved');
	
	}

	public function updateSimulator(){
		DB::table('pel_simulator')
		->where('id',Input::get('id'))
		->update(array(
		
		'date'=>Input::get('date'),
		'month'=>Input::get('month'),
		'year'=>Input::get('year'),

		'model'=>Input::get('model'),
		'registration'=>Input::get('registration'),
		'location'=>Input::get('location'),
		'other_crew_instructor'=>Input::get('other_crew_instructor'),
		'type_of_instruction'=>Input::get('type_of_instruction'),
		'FFS_HR'=>Input::get('FFS_HR'),
		'FNPT_1_HR'=>Input::get('FNPT_1_HR'),
		'FNPT_II_HR'=>Input::get('FNPT_II_HR'),
		'CSS_HR'=>Input::get('CSS_HR'),
		'instruction_HR'=>Input::get('instruction_HR'),
		'exam_HR'=>Input::get('exam_HR'),

		'row_updator' =>Auth::user()->getName(),			
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','Simulator History Update!!');
	
	}
	public function general(){
		$generalInfos=DB::table('pel_general_info')
			->where('emp_id',Auth::user()->emp_id())
			->where('soft_delete','<>','1')
			->get();
		return View::make('pel.general')
				->with('PageName','PEL General')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())
				->with('generalInfos',$generalInfos)
		;
	}
	public function saveGeneral(){
		DB::table('pel_general_info')->insert(array(

		'emp_id'=>Auth::user()->emp_id(),
		'active'=>Input::get('active'),

		'license_type'=>Input::get('license_type'),
		'license_rating'=>Input::get('license_rating'),
		
		'issued_date'=>Input::get('issued_date'),
		'issued_month'=>Input::get('issued_month'),
		'issued_year'=>Input::get('issued_year'),

		'expiration_date'=>Input::get('expiration_date'),
		'expiration_month'=>Input::get('expiration_month'),
		'expiration_year'=>Input::get('expiration_year'),


		'old_certificate_number'=>Input::get('old_certificate_number'),
		'basis_for_issuance'=>Input::get('basis_for_issuance'),
		'category'=>Input::get('category'),
		'class'=>Input::get('class'),
		'ratings'=>Input::get('ratings'),
		'endorsement'=>Input::get('endorsement'),
		'limitations'=>Input::get('limitations'),

		'row_creator' =>Auth::user()->getName(),
		'approve' =>0,
		'warning' =>0,
		'soft_delete' =>0,
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','General Info. Saved!!');
	}

	public function updateGeneral(){

		DB::table('pel_general_info')
		->where('id',Input::get('id'))
		->update(array(
		
		'active'=>Input::get('active'),

		'license_type'=>Input::get('license_type'),
		'license_rating'=>Input::get('license_rating'),
		
		'issued_date'=>Input::get('issued_date'),
		'issued_month'=>Input::get('issued_month'),
		'issued_year'=>Input::get('issued_year'),

		'expiration_date'=>Input::get('expiration_date'),
		'expiration_month'=>Input::get('expiration_month'),
		'expiration_year'=>Input::get('expiration_year'),


		'old_certificate_number'=>Input::get('old_certificate_number'),
		'basis_for_issuance'=>Input::get('basis_for_issuance'),
		'category'=>Input::get('category'),
		'class'=>Input::get('class'),
		'ratings'=>Input::get('ratings'),
		'endorsement'=>Input::get('endorsement'),
		'limitations'=>Input::get('limitations'),

		'row_updator' =>Auth::user()->getName(),			
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','General Info Update!!');
	
	}

	public function trainingDetails(){
		$trainingDetails=DB::table('pel_training_details')
			->where('emp_id',Auth::user()->emp_id())
			->where('soft_delete','<>','1')
			->get();
		return View::make('pel.trainingDetails')
			->with('PageName','Trainging Details')
			->with('dates',parent::dates())
			->with('months',parent::months())
			->with('years',parent::years())
			->with('trainingDetails',$trainingDetails)
			;
	}
	public function saveTrainingDetails(){
		$file=parent::fileUpload('file','pelTrainingDetails');
		DB::table('pel_training_details')->insert(array(

		'emp_id'=>Auth::user()->emp_id(),
		
		'name_of_the_course'=>Input::get('name_of_the_course'),
		'name_of_the_institute'=>Input::get('name_of_the_institute'),

		'start_date'=>Input::get('start_date'),
		'start_month'=>Input::get('start_month'),
		'start_year'=>Input::get('start_year'),

		'end_date'=>Input::get('end_date'),
		'end_month'=>Input::get('end_month'),
		'end_year'=>Input::get('end_year'),

		'certificate_issue_date'=>Input::get('certificate_issue_date'),
		'certificate_issue_month'=>Input::get('certificate_issue_month'),
		'certificate_issue_year'=>Input::get('certificate_issue_year'),

		'expiration_date'=>Input::get('expiration_date'),
		'expiration_month'=>Input::get('expiration_month'),
		'expiration_year'=>Input::get('expiration_year'),

		'duration'=>Input::get('duration'),
		'approved_by'=>Input::get('approved_by'),
		'file'=>$file,

		'row_creator' =>Auth::user()->getName(),
		'approve' =>0,
		'warning' =>0,
		'soft_delete' =>0,
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','Trainign Details Saved!!');
	}
	public function updateTrainingDetails(){
		$file=parent::updateFileUpload('old_file','file','pelTrainingDetails');
		DB::table('pel_training_details')
		->where('id',Input::get('id'))
		->update(array(
		
		'name_of_the_course'=>Input::get('name_of_the_course'),
		'name_of_the_institute'=>Input::get('name_of_the_institute'),

		'start_date'=>Input::get('start_date'),
		'start_month'=>Input::get('start_month'),
		'start_year'=>Input::get('start_year'),

		'end_date'=>Input::get('end_date'),
		'end_month'=>Input::get('end_month'),
		'end_year'=>Input::get('end_year'),

		'certificate_issue_date'=>Input::get('certificate_issue_date'),
		'certificate_issue_month'=>Input::get('certificate_issue_month'),
		'certificate_issue_year'=>Input::get('certificate_issue_year'),

		'expiration_date'=>Input::get('expiration_date'),
		'expiration_month'=>Input::get('expiration_month'),
		'expiration_year'=>Input::get('expiration_year'),

		'duration'=>Input::get('duration'),
		'approved_by'=>Input::get('approved_by'),
		'file'=>$file,

		'row_updator' =>Auth::user()->getName(),			
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','Training Details Updated!!');


	}
public function ameLogDetails(){
	$ameLogs=DB::table('pel_ame_log_details')
			->where('emp_id',Auth::user()->emp_id())
			->where('soft_delete','<>','1')
			->get();
	return View::make('pel.ameLogDetails')
				->with('PageName','AME Log Details')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())
				->with('ameLogs',$ameLogs)
				;
}

public function saveAmeDetails(){
		DB::table('pel_ame_log_details')->insert(array(

		'emp_id'=>Auth::user()->emp_id(),
		
		'index_number'=>Input::get('index_number'),
		'ata_chapter'=>Input::get('ata_chapter'),
		'part_66_module'=>Input::get('part_66_module'),

		'task_competence_group_p_66'=>Input::get('task_competence_group_p_66'),
		'task_competence_details_p_66'=>Input::get('task_competence_details_p_66'),
		'basic_skill_title'=>Input::get('basic_skill_title'),
		'basic_skill_task'=>Input::get('basic_skill_task'),
		'maintenance_task_title'=>Input::get('maintenance_task_title'),
		'maintenance_task_details'=>Input::get('maintenance_task_details'),
		'aircraft_msn'=>Input::get('aircraft_msn'),
		'workshop'=>Input::get('workshop'),
		'work_order'=>Input::get('work_order'),
		'supervisor_instructor_assessor_company'=>Input::get('supervisor_instructor_assessor_company'),

		'date'=>Input::get('date'),
		'month'=>Input::get('month'),
		'year'=>Input::get('year'),

		'hour_details'=>Input::get('hour_details'),

		'row_creator' =>Auth::user()->getName(),
		'approve' =>0,
		'warning' =>0,
		'soft_delete' =>0,
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','AME Log Details Saved!!');
	
}
public function updateAmeDetails(){
	DB::table('pel_ame_log_details')
		->where('id',Input::get('id'))
		->update(array(

		'index_number'=>Input::get('index_number'),
		'ata_chapter'=>Input::get('ata_chapter'),
		'part_66_module'=>Input::get('part_66_module'),

		'task_competence_group_p_66'=>Input::get('task_competence_group_p_66'),
		'task_competence_details_p_66'=>Input::get('task_competence_details_p_66'),
		'basic_skill_title'=>Input::get('basic_skill_title'),
		'basic_skill_task'=>Input::get('basic_skill_task'),
		'maintenance_task_title'=>Input::get('maintenance_task_title'),
		'maintenance_task_details'=>Input::get('maintenance_task_details'),
		'aircraft_msn'=>Input::get('aircraft_msn'),
		'workshop'=>Input::get('workshop'),
		'work_order'=>Input::get('work_order'),
		'supervisor_instructor_assessor_company'=>Input::get('supervisor_instructor_assessor_company'),

		'date'=>Input::get('date'),
		'month'=>Input::get('month'),
		'year'=>Input::get('year'),

		'hour_details'=>Input::get('hour_details'),
		
		'row_updator' =>Auth::user()->getName(),			
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','AME Log Details  Updated!!');

}

public function flyingDetails(){
	$flyingDetails=DB::table('pel_flying_details')
			->where('emp_id',Auth::user()->emp_id())
			->where('soft_delete','<>','1')
			->get();
	return View::make('pel.flyingDetails')
			->with('PageName','Flying Details')
			->with('dates',parent::dates())
			->with('months',parent::months())
			->with('years',parent::years())
			->with('flyingDetails',$flyingDetails)
			;
}

public function saveFlyingDetails(){

		DB::table('pel_flying_details')->insert(array(

		'emp_id'=>Auth::user()->emp_id(),
		
		
		'date'=>Input::get('date'),
		'month'=>Input::get('month'),
		'year'=>Input::get('year'),

		'local_time'=>Input::get('local_time'),
		'sun_rise'=>Input::get('sun_rise'),
		'sun_set'=>Input::get('sun_set'),
		'flight_number'=>Input::get('flight_number'),
		'pairing'=>Input::get('pairing'),
		'departure_airfield'=>Input::get('departure_airfield'),
		'arrival_airfield'=>Input::get('arrival_airfield'),
		'off_block'=>Input::get('off_block'),
		'on_block'=>Input::get('on_block'),
		'flight'=>Input::get('flight'),
		'pic_p1'=>Input::get('pic_p1'),
		'co_pilot_p2'=>Input::get('co_pilot_p2'),
		'relief_pilot_r'=>Input::get('relief_pilot_r'),
		'dual'=>Input::get('dual'),
		'instructor'=>Input::get('instructor'),
		'examiner'=>Input::get('examiner'),
		'night'=>Input::get('night'),
		'ifr'=>Input::get('ifr'),
		'sim_instructor'=>Input::get('sim_instructor'),
		'cross_country'=>Input::get('cross_country'),
		'approach_landing'=>Input::get('approach_landing'),
		'flight_time_view_only'=>Input::get('flight_time_view_only'),

		
		'date_1'=>Input::get('date_1'),
		'month_1'=>Input::get('month_1'),
		'year_1'=>Input::get('year_1'),
		
		'date_2'=>Input::get('date_2'),
		'month_2'=>Input::get('month_2'),
		'year_2'=>Input::get('year_2'),
		
		'date_3'=>Input::get('date_3'),
		'month_3'=>Input::get('month_3'),
		'year_3'=>Input::get('year_3'),

		'flight_time_limits'=>Input::get('flight_time_limits'),
		'aircraft_msn'=>Input::get('aircraft_msn'),
		'aircraft_registration_number'=>Input::get('aircraft_registration_number'),

		'row_creator' =>Auth::user()->getName(),
		'approve' =>0,
		'warning' =>0,
		'soft_delete' =>0,
		'created_at' =>date('Y-m-d H:i:s'),
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','Flying Details Saved!!');
	
}
public function updateFlyingDetails(){

		DB::table('pel_flying_details')
		->where('id',Input::get('id'))
		->update(array(

		
		
		
		'date'=>Input::get('date'),
		'month'=>Input::get('month'),
		'year'=>Input::get('year'),

		'local_time'=>Input::get('local_time'),
		'sun_rise'=>Input::get('sun_rise'),
		'sun_set'=>Input::get('sun_set'),
		'flight_number'=>Input::get('flight_number'),
		'pairing'=>Input::get('pairing'),
		'departure_airfield'=>Input::get('departure_airfield'),
		'arrival_airfield'=>Input::get('arrival_airfield'),
		'off_block'=>Input::get('off_block'),
		'on_block'=>Input::get('on_block'),
		'flight'=>Input::get('flight'),
		'pic_p1'=>Input::get('pic_p1'),
		'co_pilot_p2'=>Input::get('co_pilot_p2'),
		'relief_pilot_r'=>Input::get('relief_pilot_r'),
		'dual'=>Input::get('dual'),
		'instructor'=>Input::get('instructor'),
		'examiner'=>Input::get('examiner'),
		'night'=>Input::get('night'),
		'ifr'=>Input::get('ifr'),
		'sim_instructor'=>Input::get('sim_instructor'),
		'cross_country'=>Input::get('cross_country'),
		'approach_landing'=>Input::get('approach_landing'),
		'flight_time_view_only'=>Input::get('flight_time_view_only'),

		
		'date_1'=>Input::get('date_1'),
		'month_1'=>Input::get('month_1'),
		'year_1'=>Input::get('year_1'),
		
		'date_2'=>Input::get('date_2'),
		'month_2'=>Input::get('month_2'),
		'year_2'=>Input::get('year_2'),
		
		'date_3'=>Input::get('date_3'),
		'month_3'=>Input::get('month_3'),
		'year_3'=>Input::get('year_3'),

		'flight_time_limits'=>Input::get('flight_time_limits'),
		'aircraft_msn'=>Input::get('aircraft_msn'),
		'aircraft_registration_number'=>Input::get('aircraft_registration_number'),

		'row_updator' =>Auth::user()->getName(),			
		'updated_at' =>date('Y-m-d H:i:s')
			));
		return Redirect::back()->with('message','Flying Details Updated!!');
	
}
public function compView($empId){
	
	$PersonalInfos=DB::table('pel_personal_info')
		->where('soft_delete','<>','1')
		->where('emp_id', '=', $empId )->get();

	$accas=DB::table('pel_accademy')
		->where('soft_delete','<>','1')
		->where('emp_id', '=', $empId)->get();

	$thesis=DB::table('pel_acca_thesis')
		->where('soft_delete','<>','1')
		->where('emp_id', '=', $empId)->get();

	$languages=DB::table('pel_laguage_profeciancy')
		->where('soft_delete','<>','1')
		->where('emp_id', '=', $empId)->get();

	$designeeRecords=DB::table('pel_designee_record')
		->where('emp_id',$empId)
		->where('soft_delete','<>','1')->get();

	$medicalCertifications=DB::table('pel_medical_certification')
		->where('soft_delete','<>','1')
		->where('emp_id', '=', $empId)->get();

	$licenseHistorys=DB::table('pel_license_history')
		->where('emp_id',$empId)
		->where('soft_delete','<>','1')->get();

	$logbookRecords=DB::table('pel_logbook_review')
		->where('emp_id',$empId)
		->where('soft_delete','<>','1')->get();

	$generalInfos=DB::table('pel_general_info')
		->where('emp_id',$empId)
		->where('soft_delete','<>','1')->get();

	$simulatorHistorys=DB::table('pel_simulator')
			->where('emp_id',$empId)
			->where('soft_delete','<>','1')->get();

	$trainingDetails=DB::table('pel_training_details')
			->where('emp_id',$empId)
			->where('soft_delete','<>','1')->get();

	$ameLogs=DB::table('pel_ame_log_details')
			->where('emp_id',$empId)
			->where('soft_delete','<>','1')->get();

	$flyingDetails=DB::table('pel_flying_details')
			->where('emp_id',$empId)
			->where('soft_delete','<>','1')->get();
	$organizations=DB::table('users')->orderBy('organization')->lists('organization','organization');
	return View::make('pel.comprehensiveView')
			->with('PageName','Com View')
			->with('PersonalInfos',$PersonalInfos)
			->with('accas',$accas)
			->with('thesis',$thesis)
			->with('languages',$languages)
			->with('designeeRecords',$designeeRecords)
			->with('medicalCertifications',$medicalCertifications)
			->with('licenseHistorys',$licenseHistorys)
			->with('logbookRecords',$logbookRecords)
			->with('generalInfos',$generalInfos)
			->with('simulatorHistorys',$simulatorHistorys)
			->with('trainingDetails',$trainingDetails)
			->with('ameLogs',$ameLogs)
			->with('flyingDetails',$flyingDetails)
			->with('dates',parent::dates())
			->with('months',parent::months())
			->with('years',parent::years())
			->with('year',parent::years())
			->with('organizations',$organizations)
			;
}

public function atcLogDetails(){
	return View::make('pel.atcLogDetails')
			->with('PageName','ATC Log Details')
			->with('dates',parent::dates())
			->with('months',parent::months())
			->with('years',parent::years())
			->with('atcLogs','')			
			;
}


}