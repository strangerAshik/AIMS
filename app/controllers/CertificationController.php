<?php

class CertificationController extends \BaseController {


	public function certificationMain()
	{
		return View::make('certification.certificationMain')
				->with('PageName','Certifiction Main')
				->with('active','service_provider_certification')
				;
	}

	public function mycertification()
	{
		$certificates=DB::table('certificate_pin')->orderBy('id','desc')->get();
		return View::make('certification.myCertification',compact('certificates'))
				->with('PageName','My Certifiction')
				->with('active','service_provider_certification')
				;
	}

	public function singleCertification($cerNo)
	{

		return View::make('certification.singleCertification')
				->with('PageName','Single Certifiction')
				->with('active','service_provider_certification')
				;
	}

	public function singleDocs($docNo)
	{
		return View::make('certification.singleDoc')
				->with('PageName','Single Document')
				->with('active','service_provider_certification')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())

				;
	}
	public function singleFinding($fn)
	{
		return View::make('certification.singleFinding')
				->with('PageName','Single Finding')
				->with('active','service_provider_certification')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())

				;
	}
	public function followup($cerNo)
	{
		return View::make('certification.followup')
				->with('PageName','Follow up')
				->with('active','service_provider_certification')

				;
	}
	public function allPhases(){
		return View::make('certification.allPhases')
				->with('PageName','All Phases')
				->with('active','service_provider_certification')
				;
	}
	public function phaseDetails($certificateId,$category){
		//return 'Hello';
		$certificateInfo=DB::table('certificate_pin')->where('id',$certificateId)->first();
		$phases=DB::table('phase')->where('category_id',$category)->orderBy('order')->get();

		//$forms=DB::table('forms')->where('phase_id',$phaseId)->orderBy('order')->get();
		return View::make('certification.phaseDetails',compact('phases','certificateInfo','certificateId'))
				->with('PageName','Phase One')
				->with('active','service_provider_certification')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())
				;
	}
	public function eventDetails($certificateId,$eventId){
		$recors=DB::table('certi_event_timeline')->where('certificate_id',$certificateId)->where('event_id',$eventId)->orderBy('id','desc')->get();
		$eventStatus=DB::table('certi_event_status')
			->where('certificate_id',$certificateId)
			->where('event_id',$eventId)
			->first();
			
		return View::make('certification.singleEvent')
				->with('PageName','Single Event')
				->with('active','service_provider_certification')
				->with('dates',parent::dates())
				->with('months',parent::months())
				->with('years',parent::years())
				->with('certificateId',$certificateId)
				->with('eventId',$eventId)
				->with('eventStatus',$eventStatus)
				->with('recors',$recors)
				;

	}
	public function timelines(){
		return View::make('certification.timelines')
				->with('PageName','Phase One')
				->with('active','service_provider_certification')
				;
	}

	//Admin
	public function addPhase(){
		$allPhases=DB::table('phase')->orderBy('category_id')->orderBy('order')->get();
		return View::make('certification.admin.addPhase',compact('allPhases'))
					->with('PageName','Add Phase')
					->with('active','service_provider_certification');
	}
	public function savePhase(){
		$id=Input::get('id');
		if($id=='new'){
		$save=DB::table('phase')->insert(array(
				'title'=>Input::get('title'),
				'subtitle'=>Input::get('subtitle'),
				'category_id'=>Input::get('category_id'),
				'total_day'=>Input::get('total_day'),
				'total_day'=>Input::get('total_day'),
				'order'=>Input::get('order'),

				'row_creator'=>Auth::user()->getName(),
				'row_updator'=>Auth::user()->getName(),				
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s')

			));
		return Redirect::back()->with('message','Phase Successfully Saved!');
		}
		else{
		$save=DB::table('phase')
				->where('id',$id)
		        ->update(array(
				'title'=>Input::get('title'),
				'subtitle'=>Input::get('subtitle'),
				'category_id'=>Input::get('category_id'),
				'total_day'=>Input::get('total_day'),
				'total_day'=>Input::get('total_day'),
				'order'=>Input::get('order'),

				
				'row_updator'=>Auth::user()->getName(),				
				
				'updated_at'=>date('Y-m-d H:i:s')

			));
		return Redirect::back()->with('message','Phase Successfully Update!');
		}
	}
	public function phase($phaseId){
		return View::make('certification.admin.phase',compact('phaseId'))
					->with('PageName','Phase')
					->with('active','service_provider_certification');
	}
	public function timeline($phaseId){
		$timelines=DB::table('timeline')->where('phase_id',$phaseId)->orderBy('order')->get();
		return View::make('certification.admin.timeline',compact('phaseId','timelines'))
					->with('PageName','Timeline')
					->with('active','service_provider_certification');
	}
	public function saveTimeline(){
		$id=Input::get('id');
		if($id=='new'){
		$created_at=date('Y-m-d H:i:s');
		$save=DB::table('timeline')->insert(array(
				'phase_id'=>Input::get('phase_id'),
				'event'=>Input::get('event'),
				'duration'=>Input::get('duration'),
				'order'=>Input::get('order'),
				//'docs'=>Input::get('docs'),
			
				'row_creator'=>Auth::user()->getName(),
				'row_updator'=>Auth::user()->getName(),				
				'created_at'=>$created_at,
				'updated_at'=>$created_at,

			));

		//Get Mother Id
		$motherId=DB::table('timeline')
				->where('created_at',$created_at)
				->where('event',Input::get('event'))->pluck('id');

		//Call docsUpload function
		$tableName='timeline';
		$motherId=$motherId;
		$fieldName='docs';
		$docType='pdf';
		 
		// return Input::hasFile($fieldName);

		CommonFunction::docsUpload($tableName,$motherId,$fieldName,$docType);

		return Redirect::back()->with('message','Event Successfully Saved!');	
	}
	else{

		$created_at=date('Y-m-d H:i:s');
		$save=DB::table('timeline')
		->where('id',$id)
		->update(array(
				
				'event'=>Input::get('event'),
				'duration'=>Input::get('duration'),
				'order'=>Input::get('order'),
				//'docs'=>Input::get('docs'),
			
				
				'row_updator'=>Auth::user()->getName(),				
				
				'updated_at'=>$created_at,

			));

		//Get Mother Id
		$motherId=$id;

		//Call docsUpload function
		$tableName='timeline';
		$motherId=$motherId;
		$fieldName='docs';
		$docType='pdf';
		 
		// return Input::hasFile($fieldName);

		CommonFunction::docsUpload($tableName,$motherId,$fieldName,$docType);

		return Redirect::back()->with('message','Event Successfully Updated!');	

	}
	}
	
	public function document($phaseId){
		$forms=DB::table('forms')->where('phase_id',$phaseId)->orderBy('order')->get();
		return View::make('certification.admin.document',compact('phaseId','forms'))
					->with('PageName','Timeline')
					->with('active','service_provider_certification');
	}
	public function saveForm(){
		$id=Input::get('id');
		if($id=='new'){

				$save=DB::table('forms')->insert(array(

				'phase_id'=>Input::get('phase_id'),
				'order'=>Input::get('order'),
				'form_name'=>Input::get('form_name'),
			
				'row_creator'=>Auth::user()->getName(),
				'row_updator'=>Auth::user()->getName(),				
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),

			));
		return Redirect::back()->with('message','Form Name Saved');	
		}
		else{


			$save=DB::table('forms')
			->where('id',$id)
			->update(array(

				
				'order'=>Input::get('order'),
				'form_name'=>Input::get('form_name'),
			
				
				'row_updator'=>Auth::user()->getName(),				
				
				'updated_at'=>date('Y-m-d H:i:s'),

			));
		return Redirect::back()->with('message','Form Name Updated');	

		}

	}
	public function documentField($phaseId,$formId){
		$fields=DB::table('form_fields')
					->where('phase_id',$phaseId)
					->where('form_id',$formId)
					->orderBy('order')
					->get();
		return View::make('certification.admin.documentField',compact('phaseId','formId','fields'))
					->with('PageName','Form Field')
					->with('active','service_provider_certification');
	}
	public function saveFormField(){

		$id=Input::get('id');
		if($id=='new'){

			$save=DB::table('form_fields')->insert(array(

				'phase_id'=>Input::get('phase_id'),
				'form_id'=>Input::get('form_id'),

				'order'=>Input::get('order'),
				'field_name'=>Input::get('field_name'),
				'placeholder'=>Input::get('placeholder'),
				'type'=>Input::get('type'),
				'required'=>Input::get('required'),
			
				'row_creator'=>Auth::user()->getName(),
				'row_updator'=>Auth::user()->getName(),				
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),

			));

		return Redirect::back()->with('message','Field Name Saved');	
		}
		else{


			$save=DB::table('form_fields')
			->where('id',$id)
			->update(array(

				
				'order'=>Input::get('order'),
				'field_name'=>Input::get('field_name'),
				'placeholder'=>Input::get('placeholder'),
				'type'=>Input::get('type'),
				'required'=>Input::get('required'),
			
				
				'row_updator'=>Auth::user()->getName(),				
				
				'updated_at'=>date('Y-m-d H:i:s'),

			));

		return Redirect::back()->with('message','Field Name Updated');	

		}
	}
	public function documentFieldOption($phaseId,$formId,$fieldId){
		$options=DB::table('dorpdown_options')
					->where('phase_id',$phaseId)
					->where('form_id',$formId)
					->where('field_id',$fieldId)
					->orderBy('order')
					->get();
		return View::make('certification.admin.documentFieldOption',compact('phaseId','formId','fieldId','options'))
					->with('PageName','Doc Field Option')
					->with('active','service_provider_certification');
	}
	public function saveOption(){

		$id=Input::get('id');
		//new add
		if($id=='new'){
		$save=DB::table('dorpdown_options')->insert(array(

				'phase_id'=>Input::get('phase_id'),
				'form_id'=>Input::get('form_id'),
				'field_id'=>Input::get('field_id'),

				'order'=>Input::get('order'),
				'option'=>Input::get('option'),
			
				'row_creator'=>Auth::user()->getName(),
				'row_updator'=>Auth::user()->getName(),				
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),

			));
		return Redirect::back()->with('message','Option Saved');
		}
		//update
		else{
			$save=DB::table('dorpdown_options')
			->where('id',$id)
			->update(array(
				'order'=>Input::get('order'),
				'option'=>Input::get('option'),
			
				
				'row_updator'=>Auth::user()->getName(),				
				
				'updated_at'=>date('Y-m-d H:i:s'),

			));
		return Redirect::back()->with('message','Option Updated');
		}

	}

	public function saveCertificationInit(){

		$id=Input::get('id');
		if($id=='new'){
		$save=DB::table('certificate_pin')->insert(array(
			
			'title'=>Input::get('title',' '),
			'organization'=>Input::get('organization',' '),
			'category'=>Input::get('category',' '),
			'category'=>Input::get('category',' '),
			'date'=>Input::get('date',' '),
			'renewal_date'=>Input::get('renewal_date',' '),

			'row_creator'=>Auth::user()->getName(),
			'row_updator'=>Auth::user()->getName(),				
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),

			));
		return Redirect::back()->with('message','Data Saved!');
		}
		//edit
		else{

		$save=DB::table('certificate_pin')
		->where('id',$id)
		->update(array(			
			'title'=>Input::get('title'),
			'organization'=>Input::get('organization'),
			'category'=>Input::get('category'),
			'category'=>Input::get('category'),
			'date'=>Input::get('date'),
			'renewal_date'=>Input::get('renewal_date'),


			
			'row_updator'=>Auth::user()->getName(),				
			
			'updated_at'=>date('Y-m-d H:i:s'),
			));
		return Redirect::back()->with('message','Data Saved!');
		}

	}



	public function saveFormValue(){

		$id=Input::get('id');
		if($id=='new'){
		
				$formId=Input::get('form_id');
				$getFieldIds=DB::table('form_fields')->where('form_id',$formId)->orderBy('order')->get();//+['-1'=>'-1'];
				
				$certificateId=Input::get('certificate_id') ;
				$phaseId=Input::get('phase_id') ;
				$formId=Input::get('form_id') ;
				
				$createdAt=date('Y-m-d H:i:s');
				//save in certi_form_input
				DB::table('certi_form_input')->insert(array(
						'certi_id'=>$certificateId,
						'phase_id'=>$phaseId,
						'form_id'=>$formId,

						'row_creator'=>Auth::user()->getName(),
						'row_updator'=>Auth::user()->getName(),				
						'created_at'=>$createdAt,
						'updated_at'=>date('Y-m-d H:i:s'),

					));
				//get certi_form_input_id 
				$certiFormInputId=DB::table('certi_form_input')
				              ->where('certi_id',$certificateId)
				              ->where('phase_id',$phaseId)
				              ->where('form_id',$formId)
				              ->where('created_at',$createdAt)
				              ->pluck('id');

				//Insert Values 
				foreach ($getFieldIds as $info) {

					$created_at=date('Y-m-d H:i:s');
					
					$fieldValue= Input::get($info->id);
					if($info->type=='multiFile'){$fieldValue='file';}
					DB::table('certi_form_value')->insert(array(
						'certificate_id'=>$certificateId,
						'phase_id'=>$phaseId,
						'form_id'=>$formId,
						'field_id'=>$info->id,
						'certi_form_input_id'=>$certiFormInputId,
						'value'=>$fieldValue,

						'row_creator'=>Auth::user()->getName(),
						'row_updator'=>Auth::user()->getName(),				
						'created_at'=>$created_at,
						'updated_at'=>date('Y-m-d H:i:s'),
					));
					if($info->type=='multiFile'  && Input::hasFile('file_'.$info->id)){
						
							//Call docsUpload function
							$tableName='certi_form_value';
							//$motherId=$motherId;
							$fieldName='file_'.$info->id;
							$files=Input::file('file_'.$info->id);
							$docType='pdf';
							$num=0;
							$motherId=DB::table('certi_form_value')
									->where('created_at',$created_at)
									->where('value','file')->pluck('id');

								$destinationPath = 'files/documents';
						   
								foreach ($files as $file) {
									$orginalName=$file->getClientOriginalName();
									$filename =$orginalName.'-'.time().'.'.$file->getClientOriginalExtension();
		                     		$upload_success = $file->move($destinationPath, $filename);
		                     		
		                     		 DB::table('documents')->insert(array(
		                            'table_name'=>$tableName,
		                            'mother_id'=>$motherId,
		                            'calling_id'=>$filename,
		                            'field_name'=>$fieldName,
		                            'doc_type'=>$docType,
		                            'doc_name'=>$orginalName,

		                            'created_at'=>date('Y-m-d H:i:s'),
		                            'updated_at'=>date('Y-m-d H:i:s'),
		                        ));
								}
							
					}

				}
			
				return Redirect::back()->with('message','Successfully Saved');

		}
		else{

				$formId=Input::get('form_id');
				$getFieldIds=DB::table('form_fields')->where('form_id',$formId)->orderBy('order')->get();//+['-1'=>'-1'];
				
				$certificateId=Input::get('certificate_id') ;
				$phaseId=Input::get('phase_id') ;
				$formId=Input::get('form_id') ;
				
				$createdAt=date('Y-m-d H:i:s');
				//save in certi_form_input
				DB::table('certi_form_input')
				->where('id',$id)
				->update(array(			
						'row_updator'=>Auth::user()->getName(),								
						'updated_at'=>date('Y-m-d H:i:s'),
					));
				//get certi_form_input_id 
				$certiFormInputId=$id;

				//Insert Values 
				foreach ($getFieldIds as $info) {
					//check whether new or old
					$isNew=DB::table('certi_form_value')
					           ->where('certificate_id',$certificateId)
					           ->where('phase_id',$phaseId)
					           ->where('form_id',$formId)
					           ->where('field_id',$info->id)
					           ->where('certi_form_input_id',$certiFormInputId)
					           ->count();
					 if($isNew==0){

					$created_at=date('Y-m-d H:i:s');
					
					$fieldValue= Input::get($info->id);
					if($info->type=='multiFile'){$fieldValue='file';}
					DB::table('certi_form_value')->insert(array(
						'certificate_id'=>$certificateId,
						'phase_id'=>$phaseId,
						'form_id'=>$formId,
						'field_id'=>$info->id,
						'certi_form_input_id'=>$certiFormInputId,
						'value'=>$fieldValue,

						'row_creator'=>Auth::user()->getName(),
						'row_updator'=>Auth::user()->getName(),				
						'created_at'=>$created_at,
						'updated_at'=>date('Y-m-d H:i:s'),
					));
					if($info->type=='multiFile'  && Input::hasFile('file_'.$info->id)){
						
							//Call docsUpload function
							$tableName='certi_form_value';
							//$motherId=$motherId;
							$fieldName='file_'.$info->id;
							$files=Input::file('file_'.$info->id);
							$docType='pdf';
							$num=0;
							$motherId=DB::table('certi_form_value')
									->where('created_at',$created_at)
									->where('value','file')->pluck('id');

								$destinationPath = 'files/documents';
						   
								foreach ($files as $file) {
									$orginalName=$file->getClientOriginalName();
									$filename =$orginalName.'-'.time().'.'.$file->getClientOriginalExtension();
		                     		$upload_success = $file->move($destinationPath, $filename);
		                     		
		                     		 DB::table('documents')->insert(array(
		                            'table_name'=>$tableName,
		                            'mother_id'=>$motherId,
		                            'calling_id'=>$filename,
		                            'field_name'=>$fieldName,
		                            'doc_type'=>$docType,
		                            'doc_name'=>$orginalName,

		                            'created_at'=>date('Y-m-d H:i:s'),
		                            'updated_at'=>date('Y-m-d H:i:s'),
		                        ));
								}
							
						}
					}
					else {
						$created_at=date('Y-m-d H:i:s');
					
					$fieldValue= Input::get($info->id);
					if($info->type=='multiFile'){$fieldValue='file';}
					DB::table('certi_form_value')
				       ->where('certificate_id',$certificateId)
			           ->where('phase_id',$phaseId)
			           ->where('form_id',$formId)
			           ->where('field_id',$info->id)
			           ->where('certi_form_input_id',$certiFormInputId)
					->update(array(				
						'value'=>$fieldValue,				
						'row_updator'=>Auth::user()->getName(),								
						'updated_at'=>$created_at,
					));
					if($info->type=='multiFile' && Input::hasFile('file_'.$info->id)){


						
							//Call docsUpload function
							$tableName='certi_form_value';
							//$motherId=$motherId;
							$fieldName='file_'.$info->id;
							$files=Input::file('file_'.$info->id);
							$docType='pdf';
							$num=0;
							$motherId=DB::table('certi_form_value')
								       ->where('certificate_id',$certificateId)
							           ->where('phase_id',$phaseId)
							           ->where('form_id',$formId)
							           ->where('field_id',$info->id)
							           ->where('certi_form_input_id',$certiFormInputId)
							           ->pluck('id');

								$destinationPath = 'files/documents';
						   
								foreach ($files as $file) {
									$orginalName=$file->getClientOriginalName();
									$filename =$orginalName.'-'.time().'.'.$file->getClientOriginalExtension();
		                     		$upload_success = $file->move($destinationPath, $filename);
		                     		
		                     		 DB::table('documents')->insert(array(
		                            'table_name'=>$tableName,
		                            'mother_id'=>$motherId,
		                            'calling_id'=>$filename,
		                            'field_name'=>$fieldName,
		                            'doc_type'=>$docType,
		                            'doc_name'=>$orginalName,

		                            'created_at'=>date('Y-m-d H:i:s'),
		                            'updated_at'=>date('Y-m-d H:i:s'),
		                        ));
								}
							
						}

					}

				}
			
				return Redirect::back()->with('message','Successfully Updated');

		}

	}
	public function formDelete($certiFormInputId){
		//return $certiFormInputId;
		//delete input field
		$deleteFields=DB::table('certi_form_value')->where('certi_form_input_id',$certiFormInputId)->delete();
		//Delete Document 
		//Delete certi_form_input
		$delete=DB::table('certi_form_input')->where('id',$certiFormInputId)->delete();
		return Redirect::back()->with('message','Successfully Data deleted.');
	}


public function saveEventRecord(){
	$id=Input::get('id');
	if($id=='new'){
		$phaseId=DB::table('timeline')->where('id',Input::get('event_id'))->pluck('phase_id');

	$created_at=date('Y-m-d H:i:s');

	//add data to certi_event_timeline
	DB::table('certi_event_timeline')->insert(array(
			'certificate_id'=>Input::get('certificate_id'),
			'phase_id'=>$phaseId,
			'event_id'=>Input::get('event_id'),
			'title'=>Input::get('title'),
			'note'=>Input::get('doc_description'),

			'creator'=>Auth::user()->getName(),
            'updater'=>Auth::user()->getName(),
            'created_at'=>$created_at,
            'updated_at'=>date('Y-m-d H:i:s'),
		));

	//add data to document 

	//add status to certi_event_status
	DB::table('certi_event_status')->insert(array(
			'certificate_id'=>Input::get('certificate_id'),
			'phase_id'=>$phaseId,
			'event_id'=>Input::get('event_id'),
			'status'=>'Submitted',
			//'note'=>Input::get('note'),

			'row_creator'=>Auth::user()->getName(),
            'row_updator'=>Auth::user()->getName(),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
		));


	//return 'hello world';
	$tableName='certi_event_timeline';
	$motherId=DB::table('certi_event_timeline')->where('created_at',$created_at)->where('certificate_id',Input::get('certificate_id'))->pluck('id');
	$fieldName='record';
	$docType='pdf';
		 
	       if($files = Input::hasFile($fieldName))
            {
           //   die('mara kha');
                $files = Input::file($fieldName);
                $destinationPath = 'files/documents';
                foreach ($files as $file) {
                     $orginalName=$file->getClientOriginalName();
                     $filename =$orginalName.'-'.time().'.'.$file->getClientOriginalExtension();
                     $upload_success = $file->move($destinationPath, $filename);
                     //insert in document table
                     DB::table('documents')->insert(array(
                            
                            'table_name'=>$tableName,
                            'mother_id'=>$motherId,
                            'calling_id'=>$filename,
                            'field_name'=>$fieldName,
                            'doc_type'=>$docType,
                            'doc_name'=>$orginalName,
                            //'doc_description'=>Input::get('doc_description'),

                            'creator'=>Auth::user()->getName(),
                            'updater'=>Auth::user()->getName(),
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s'),
                        ));
                }          
             }
       return Redirect::back()->with('message','Record(s) Saved');
       }
       else{


	$created_at=date('Y-m-d H:i:s');

	//add data to certi_event_timeline
	DB::table('certi_event_timeline')
	->where('id',$id)
	->update(array(
			
			'title'=>Input::get('title'),
			'note'=>Input::get('doc_description'),

			
            'updater'=>Auth::user()->getName(),
            
            'updated_at'=>date('Y-m-d H:i:s'),
		));

	//add data to document 


	//return 'hello world';
	$tableName='certi_event_timeline';
	$motherId=$id;
	$fieldName='record';
	$docType='pdf';
		 
	       if($files = Input::hasFile($fieldName))
            {
           //   die('mara kha');
                $files = Input::file($fieldName);
                $destinationPath = 'files/documents';
                foreach ($files as $file) {
                     $orginalName=$file->getClientOriginalName();
                     $filename =$orginalName.'-'.time().'.'.$file->getClientOriginalExtension();
                     $upload_success = $file->move($destinationPath, $filename);
                     //insert in document table
                     DB::table('documents')->insert(array(
                            
                            'table_name'=>$tableName,
                            'mother_id'=>$motherId,
                            'calling_id'=>$filename,
                            'field_name'=>$fieldName,
                            'doc_type'=>$docType,
                            'doc_name'=>$orginalName,
                            //'doc_description'=>Input::get('doc_description'),

                            'creator'=>Auth::user()->getName(),
                            'updater'=>Auth::user()->getName(),
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s'),
                        ));
                }          
             }
       return Redirect::back()->with('message','Record(s) updated');

       }
}

public function saveRecordFinding(){
	$id=Input::get('id');
	if($id=='new'){
	DB::table('certi_event_record_finding')->insert(array(
				'certificate_id'=>Input::get('certificate_id'),
				'event_id'=>Input::get('event_id'),
				'record_id'=>Input::get('record_id'),
				'finding'=>Input::get('finding'),
				'note'=>Input::get('note'),
				
				'row_creator'=>Auth::user()->getName(),
                'row_updator'=>Auth::user()->getName(),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
			));
	return Redirect::back()->with('message','Findign Successfully Added..');
	}
	else{
		DB::table('certi_event_record_finding')
		->where('id',$id)
		->update(array(
				
				'finding'=>Input::get('finding'),
				'note'=>Input::get('note'),
				
				
                'row_updator'=>Auth::user()->getName(),
                
                'updated_at'=>date('Y-m-d H:i:s'),
			));
	return Redirect::back()->with('message','Findign Successfully Updated..');
	}
}
public function updateStatus(){
	$certificateId=Input::get('certificate_id');
	$eventId=Input::get('event_id');

	$given=DB::table('certi_event_status')->where('certificate_id',$certificateId)->where('event_id',$eventId)->count();
	//if exist
	if($given>0){
		DB::table('certi_event_status')
		->where('certificate_id',$certificateId)->where('event_id',$eventId)
		->update(array(
				'status'=>Input::get('status'),
				 'row_updator'=>Auth::user()->getName(),
				  'updated_at'=>date('Y-m-d H:i:s'),
			));

	}

	//If new
	else{
	DB::table('certi_event_status')->insert(array(
			'certificate_id'=>$certificateId,
			'phase_id'=>Input::get('phase_id'),
			'event_id'=>$eventId,
			'status'=>Input::get('status'),
			//'note'=>Input::get('note'),

			'row_creator'=>Auth::user()->getName(),
            'row_updator'=>Auth::user()->getName(),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
		));
}

	return Redirect::back()->with('message','Status Update!');
}

public function saveNewDuration(){
	//return 'hello';
	DB::table('certi_update_timeline_duration')->insert(array(
			'certificate_id'=>Input::get('certificate_id'),
			'event_id'=>Input::get('event_id'),
			'duration'=>Input::get('duration'),
			'note'=>Input::get('note'),

			'row_creator'=>Auth::user()->getName(),
            'row_updator'=>Auth::user()->getName(),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
		));
	return Redirect::back()->with('message','Duration updated at this event in this certification');
	
}






}