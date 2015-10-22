@if($PageName=='Personal Info'||$PageName=='Com View')
@section('updatePersonalInfo')
@foreach($PersonalInfos as $info)
<div class="modal fade" id="pesonalInfo{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Personal Info. </h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/updatePesonalInfo', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					 <div class="box-body">
										{{Form::hidden('id', $info->id)}}
										{{Form::hidden('old_photo',$info->photo)}}
                                        <div class="form-group required">
                                           
											{{Form::label('', 'Title', array('class' => 'control-label col-xs-4 '))}}
											<div class="col-xs-6">
											{{Form::select('title', array('0' => '--Select--', 'Mr.' => 'Mr.','Ms.'=>'Ms.','Dr.'=>'Dr.','Prof.'=>'Prof.'), $info->title ,array('class'=>'form-control'))}}
											</div>
											
                                        </div>										
												
										
										
										<div class="form-group required ">
											{{Form::label('', 'First Name', array('class' => 'control-label col-xs-4 '))}}
											<div class="col-xs-6">
											{{Form::text('first_name',$info->first_name, array('class' => 'form-control','placeholder'=>''))}}
											</div>
										</div>
										<div class="form-group">
											{{Form::label('', 'Middle Name', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('middle_name',$info->middle_name, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'Last Name', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('last_name',$info->last_name, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group ">
											
											{{Form::label('', 'Mother\'s Name', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('mother_name',$info->mother_name, array('class' => 'form-control','placeholder'=>''))}}
											 </div>

										</div>
										<div class="form-group">
											{{Form::label('', 'Father\'s Name', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('father_name',$info->father_name, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required">											
											{{Form::label('', 'Mailing Address', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('mailing_address',$info->mailing_address, array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'Permanent Address', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('parmanent_address',$info->parmanent_address, array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											 </div>
										</div>
										
                                        <div class="form-group">
											{{Form::label('', 'Telephone (work)', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('telephone_work',$info->telephone_work, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group">
											{{Form::label('', 'Telephone (residence)', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('telephone_residence',$info->telephone_residence, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'Mobile no', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('mobile_no',$info->mobile_no, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'Nationality', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('nationality',$info->nationality, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'National ID', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('national_id',$info->national_id, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required ">
                                           
											{{Form::label('', 'Sex', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::select('sex', array('' => '--Select--', 'Male' => 'Male','Female'=>'Female','Others'=>'Others'), $info->sex,array('class'=>'form-control'))}}
											 </div>
											
                                        </div>
										<div class="form-group required">
                                           
											
											{{Form::label('', 'Blood Group', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::select('blood_group', array('0' => '--Select--', 'A+' => 'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','O+'=>'O+','O-'=>'O-','AB+'=>'AB+','AB-'=>'AB-','Unknown'=>'Unknown'), $info->blood_group ,array('class'=>'form-control'))}}
                                             </div>								
											
											
                                        </div>
										 
										<div class="form-group required">
												
													{{Form::label('', 'Date Of Birth', array('class' => 'control-label col-xs-4'))}}
													
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('date_of_birth', $dates ,$info->date_of_birth,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('month_of_birth',$months,$info->month_of_birth,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('year_of_birth',$years,$info->year_of_birth,array('class'=>'form-control'))}}
														</div>
													</div>
										</div>
                                        <div class="form-group required">
                                           
                                            
											 {{ Form::label('image', 'Upload New Photo: ',array('class'=>'control-label col-xs-4')) }}
											 <div class="col-xs-6">
											 {{ HTML::image('files/pelPhoto/'.$info->photo, 'Employee Photo', array('class' => 'img-thumbnail','width'=>'250','height'=>'250')) }}
											 {{ Form::file('photo') }}
											 
											 <p class="help-block">Photo size : 300px250px</p>
											 </div>
                                        </div>
                                      
                                    </div><!-- /.box-body -->

                                   <p class="text-center">
									<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#EmploymentDetails">Save</button>
	
									</p>
					{{Form::close()}}
					
				</div>
			</div>
		</div>
</div>	
@endforeach
@stop
@endif

@if($PageName=='Accademic Qali'||$PageName=='Com View')
@section('updateAccademicQali')
	@foreach($accas as $acca)
	<div class="modal fade" id="pelAccademy{{$acca->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Academic Qualification </h4>
                </div>
				 <div class="modal-body">
				 
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/updateAccademic', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
						{{Form::hidden('id', $acca->id)}}
						<div class="form-group required">
                                        
											{{Form::label('level', 'Level [highest degree first]', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('level', array('Null' => '--Select--', 'Post Doctorate or Equivalent' => 'Post Doctorate or Equivalent','Doctorate'=>'Doctorate','Masters or Equivalent'=>'Masters or Equivalent','Bachelors or Equivalent'=>'Bachelors or Equivalent','Diploma'=>'Diploma','H.S.C. or Equivalent'=>'H.S.C. or Equivalent','S.S.C. or Equivalent'=>'S.S.C. or Equivalent','Below S.S.C.'=>'Below S.S.C.'), $acca->level,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
                    </div>	
					<div class="form-group required">
                                        
											{{Form::label('', ' Name of degree', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('name_of_degree',$acca->name_of_degree, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('discipline', 'Discipline', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('discipline', array('Null' => '--Select--', 'Arts' => 'Arts','Science'=>'Science','Commerce'=>'Commerce','Biological Science'=>'Biological Science','Business Studies/ Administration'=>'Business Studies/ Administration','Engineering/ Technology/ Applied Science'=>'Engineering/ Technology/ Applied Science','Medical Science'=>'Medical Science','Social Science'=>'Social Science'), $acca->discipline,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('specialization', 'Specialization', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('specialization',$acca->specialization, array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('institute', 'Educational institute', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('institute',$acca->institute, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('pussing_year', ' Passing year', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('pussing_year', $year, $acca->pussing_year, array('class' => 'form-control','placeholder'=>'')) }}
											
											</div>
											
                    </div>
					<div class="form-group required">
					{{Form::label('', 'Result', array('class' => 'col-xs-4 control-label'))}}
					<div class="row">
														<div class="col-xs-3">
														{{Form::select('standard', array('Null' => '--Select--', 'Grade' => 'Grade','CGPA'=>'CGPA','Division'=>'Division','Class'=>'Class','Percentage'=>'Percentage'), $acca->standard,array('class'=>'form-control','id'=>'Standard','required'=>''))}}
														</div>
														<div class="col-xs-2">												
														{{Form::text('grade_division',$acca->grade_division, array('class' => 'form-control','placeholder'=>'grade or division','required'=>''))}}
														</div>
														<div class="col-xs-2">
															{{Form::text('out_of',$acca->out_of, array('class' => 'form-control','placeholder'=>'out of','id'=>'out_of'))}}
														</div>
													</div>
					</div>
					
					
					
                    

                    <div class="form-group">

                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                        
                    </div>
					
					{{Form::close()}}
					
				</div>
			</div>
		</div>
	</div>
	@endforeach

	<!--End Edit option For Academic Qualification-->
	<!-- Start Edit option For Thesis Qualification -->
	@foreach($thesis as $thes)
	<div class="modal fade" id="pelAccaThesis{{$thes->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Thesis/Project/Internship/Dissertation </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'pel/updateAccaThesis','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				

					{{Form::hidden('id', $thes->id)}}
					<div class="form-group required">
                                        
											{{Form::label('level', ' Degree level', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('level', array('Null' => '--Select--', 'Doctorate' => 'Doctorate','Masters or Equivalent'=>'Masters or Equivalent','Bachelors or Equivalent'=>'Bachelors or Equivalent'), $thes->level ,array('class'=>'form-control','id'=>'','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                        
											{{Form::label('type', 'Type ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('type', array('Null' => '--Select--', 'Thesis' => 'Thesis','Project'=>'Project','Internship'=>'Internship','Dissertation'=>'Dissertation'), $thes->type ,array('class'=>'form-control','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',$thes->title, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('institute', 'Institute', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('institute',$thes->institute, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					 
					<div class="form-group required">
                                           
											{{Form::label('duration', 'Duration', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('duration',$thes->duration, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					
					
					
                    

                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                
				{{Form::close()}}
            </div>
        </div>
    </div>
	</div>
	@endforeach
@stop
@endif
@if($PageName=='Language Proficiency'||$PageName=='Com View')
@section('updateLanguagePro')
	@foreach($languages as $info)
	 <div class="modal fade" id="pelLangProfe{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Language </h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					{{Form::open(array('url'=>'pel/updateLanguageProfeciency','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
					    {{Form::hidden('id',$info->id)}}
                        <div class="form-group required">
                                           
											{{Form::label('language', 'Language', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('language',$info->language, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                            </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_speak', 'Speaking ability', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_speak', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), $info->lang_speak,array('class'=>'form-control','id'=>'','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_understanding', 'Understanding', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_understanding', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), $info->lang_understanding,array('class'=>'form-control','id'=>'category','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_reading', 'Reading ability', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_reading', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), $info->lang_reading,array('class'=>'form-control','id'=>'category','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_writing', ' Writing ability', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_writing', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), $info->lang_writing,array('class'=>'form-control','id'=>'category','required'=>''))}}
							</div>
                        </div>
                       
                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                            
                        </div>
						{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
	</section>
	@endforeach
@stop
@endif
@if($PageName=='Designee Records' ||$PageName=='Com View')
@section('designeeRecordUpdate')
@foreach($designeeRecords as $info)
 <div class="modal fade" id="updateDesigneeRecords{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Designee Record </h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/updateDesigneeRecord', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">

						{{Form::hidden('id',$info->id)}}			  	
						{{Form::hidden('old_file',$info->file)}}			  	
				  		
						<div class="form-group required">
	                                           
												{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
												<div class="radio">									 
												 <label> {{ Form::radio('active', 'Yes',Input::old('active', $info->active == 'Yes'),array()) }} &nbsp  Yes</label>
												 <label> {{ Form::radio('active', 'No',Input::old('active', $info->active == 'No'),array()) }} &nbsp  No</label>
												</div>
										
									</div>
	                    </div>

	                     <div class="form-group required">
	                       
							{{Form::label('designation_type', 'Designation Type', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::select('designation_type', array(
									'' => '--Select--',
									'Line Check Airman' => 'Line Check Airman',
									'Proficiency Check Airman'=>'Proficiency Check Airman',
									'Designated Airworthiness Representative'=>'Designated Airworthiness Representative',
									'Examiner'=>'Examiner',
									'Competency Check Evaluator'=>'Competency Check Evaluator',
									'Training Center Evaluator'=>'Training Center Evaluator',
									'Knowledge & Skill Evaluator'=>'Knowledge & Skill Evaluator',
									'Air Traffic Controller'=>'Air Traffic Controller'

									), $info->designation_type ,array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>
	                     <div class="form-group required">
	                       
							{{Form::label('designation_category', 'Designation Category', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::select('designation_category', array(
									'' => '--Select--',
									'Training Device Only' => 'Training Device Only',
									'Simulator Only'=>'Simulator Only',
									'Aircraft Only'=>'Aircraft Only',
									'Simulator & Aircraft'=>'Simulator & Aircraft',
									'Line Check Only'=>'Line Check Only',
									'All Checks'=>'All Checks',
									'Oral Only'=>'Oral Only',
									'ATC Only'=>'ATC Only',
									'Not Applicable'=>'Not Applicable'

									), $info->designation_category,array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>		

						<div class="form-group  ">
							{{Form::label('business_address', 'Business Address', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::textarea('business_address',$info->business_address, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							</div>
						</div>
						<div class="form-group required">
	                       
							{{Form::label('organization', 'Organization', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::select('organization',$organizations,$info->organization,array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>
						<div class="form-group">
							{{Form::label('aircraft', 'Aircraft', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('aircraft',$info->aircraft, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group required">
	                                           
												{{Form::label('effective_date', 'Effective date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('effective_date', $dates,$info->effective_date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('effective_month',$months,$info->effective_month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('effective_year',$years,$info->effective_year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>

						<div class="form-group ">
	                                           
												{{Form::label('expiration_date', 'Expiration date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('expiration_date', $dates,$info->expiration_date,array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('expiration_month',$months,$info->expiration_month,array('class'=>'form-control'))}}												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('expiration_year',$years,$info->expiration_year,array('class'=>'form-control'))}}
															</div>
														</div>
												
	                    </div>	

						<div class="form-group  ">
							{{Form::label('function', 'Functions', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::textarea('function',$info->function, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							</div>
						</div>
						<div class="form-group">
							{{Form::label('limitation', 'Limitation', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::textarea('limitation',$info->limitation, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							</div>
						</div>
									
                        <div class="form-group ">
                        	{{ Form::label('file', 'Update File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							@if($info->file!='Null'){{HTML::link('files/pelDesigneeRecord/'.$info->file,'Document',array('target'=>'_blank'))}}
							@else
								{{HTML::link('#','No Document Provided')}}
							@endif
							 </div>
							<div class="col-xs-6">
							  {{ Form::file('file') }}
							</div>
                        </div>
                                      
                                    </div><!-- /.box-body -->

                                   
									<div class="form-group">
                           
										<button type="submit" class="btn btn-lg btn-block btn-primary">Save</button>
                           
									</div>
	
									
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
@endforeach

@stop
@endif


@if($PageName=='Medical Certification'||$PageName=='Com View')
@section('updateMedicalCertification')
@foreach($medicalCertifications as $info)
 <div class="modal fade" id="updateMedicalCertifications{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Medical Certification</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/updateMedicalCertification', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">
						{{Form::hidden('id',$info->id)}}			  	
						{{Form::hidden('old_file',$info->file)}}
						<div class="form-group required">
	                                           
												{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
											<div class="radio">										 
										 <label> {{ Form::radio('active', 'Yes',Input::old('active', $info->active == 'Yes'),array()) }} &nbsp  Yes</label>
												 <label> {{ Form::radio('active', 'No',Input::old('active', $info->active == 'No'),array()) }} &nbsp  No</label>
										</div>
										
									</div>
	                    </div>

	                     <div class="form-group required">
	                       
							{{Form::label('certificate_class', 'Certificate Class', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::select('certificate_class', array(
									'' => '--Select--',
									'Class 1' => 'Class 1',
									'Class 2' => 'Class 2',
									'Class 3' => 'Class 3',
									'Not Issued' => 'Not Issued',
									'Suspended' => 'Suspended'
									), $info->certificate_class,array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>
	                     <div class="form-group required">
	                       
							{{Form::label('basis_for_issuance', 'Basis for Issuance', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::select('basis_for_issuance', array(
									'' => '--Select--',
									'Flight Test' => 'Flight Test',
									'Medical Examination'=>'Medical Examination',
									'Oral Test'=>'Oral Test',
									'Personal Knowledge'=>'Personal Knowledge',
									'Validation'=>'Validation',
									'Written Test'=>'Written Test'
									), $info->basis_for_issuance,array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>	

						<div class="form-group required">
	                                           
												{{Form::label('effective_date', 'Effective date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('effective_date', $dates,$info->effective_date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('effective_month',$months,$info->effective_month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('effective_year',$years,$info->effective_year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>

						<div class="form-group ">
	                                           
												{{Form::label('expiration_date', 'Expiration date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('expiration_date', $dates,$info->expiration_date,array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('expiration_month',$months,$info->expiration_month,array('class'=>'form-control'))}}												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('expiration_year',$years,$info->expiration_year,array('class'=>'form-control'))}}
															</div>
														</div>
												
	                    </div>	
						<div class="form-group ">
	                                           
												{{Form::label('examination_date', 'Date of Examination', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('examination_date', $dates,$info->examination_date,array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('examination_month',$months,$info->examination_month,array('class'=>'form-control'))}}												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('examination_year',$years,$info->examination_year,array('class'=>'form-control'))}}
															</div>
														</div>
												
	                    </div>	

	


						<div class="form-group">
							{{Form::label('medical_examiner', 'Medical Examiner', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('medical_examiner',$info->medical_examiner, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group  ">
							{{Form::label('medical_limitation', 'Medical Limitation', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::textarea('medical_limitation',$info->medical_limitation, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							</div>
						</div>
 						<div class="form-group ">
                        	{{ Form::label('file', 'Update File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							@if($info->file!='Null'){{HTML::link('files/pelMedicalCertification/'.$info->file,'Document',array('target'=>'_blank'))}}
							@else
								{{HTML::link('#','No Document Provided')}}
							@endif
							 </div>
							<div class="col-xs-6">
							  {{ Form::file('file') }}
							</div>
                        </div>
                                      
                                    </div><!-- /.box-body -->

                                   
									<div class="form-group">
                           
										<button type="submit" class="btn btn-lg btn-block btn-primary">Save</button>
                           
									</div>
	
									
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>

@endforeach
@stop
@endif


@if($PageName=='License History'||$PageName=='Com View')
@section('updateLicenseHistory')
@foreach($licenseHistorys as $info)
 <div class="modal fade" id="updateLicenseHistory{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update License History</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/updateLicenseHistory', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">
							{{Form::hidden('id',$info->id)}}			  	
						{{Form::hidden('old_file',$info->file)}}
						<div class="form-group required">
	                                           
												{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
										<div class="radio">
											<label> {{ Form::radio('active', 'Yes',Input::old('active', $info->active == 'Yes'),array()) }} &nbsp  Yes</label>
											<label> {{ Form::radio('active', 'No',Input::old('active', $info->active == 'No'),array()) }} &nbsp  No</label>
										</div>
										
									</div>
	                    </div>


						<div class="form-group required">
	                                           
												{{Form::label('effective_date', 'Effective date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('effective_date', $dates,$info->effective_date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('effective_month',$months,$info->effective_month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('effective_year',$years,$info->effective_year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>

	                     <div class="form-group required">
	                       
							{{Form::label('certificate_type', 'Certificate Type', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::select('certificate_type', array(
									'' => '--Select--',
									'Approved/Acceptable' => 'Approved/Acceptable',
									'Needs Further Training' => 'Needs Further Training',
									'Suspension' => 'Suspension',
									'Revocation' => 'Revocation',
									'Rating Rescinded' => 'Rating Rescinded',
									'No Action' => 'No Action',
									), $info->certificate_type,array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>
	                     <div class="form-group required">
	                       
							{{Form::label('historical_event', 'Historical Event', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::select('historical_event', array(
									'' => '--Select--',
									'Written Exam' =>'Written Exam',
									'Oral Exam'=>'Oral Exam',
									'Practical Exam'=>'Practical Exam',
									'PIC Proficiency Check'=>'PIC Proficiency Check',
									'SIC Proficiency Check'=>'SIC Proficiency Check',
									'FA Competency Check'=>'FA Competency Check',
									'FO Competency Check'=>'FO Competency Check',
									'Other Proficiency/Competency Chek'=>'Other Proficiency/Competency Check',
									'PIC Line Check'=>'PIC Line Check',
									'Re-Examination'=>'Re-Examination',
									'Accident'=>'Accident',
									'Incident'=>'Incident',
									'Enforcement'=>'Enforcement',
									'Other Action'=>'Other Action',
									),  $info->historical_event,array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>	

	                     <div class="form-group required">
	                       
							{{Form::label('results', 'Results', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::select('results', array(
									'' => '--Select--',
									'Approved/Acceptable' => 'Approved/Acceptable',
									'Needs Further Training' => 'Needs Further Training',
									'Suspension' => 'Suspension',
									'Revocation' => 'Revocation',
									'Rating Rescinded' => 'Rating Rescinded',
									'No Action' => 'No Action',
									),$info->results,array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>
						
						<div class="form-group required">
	                       
							{{Form::label('organization', 'Organization', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::select('organization',$organizations,$info->organization,array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>
						<div class="form-group">
							{{Form::label('designation_number', 'Designation Number', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('designation_number',$info->designation_number, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('investigation_number', 'Investigation Number', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('investigation_number',$info->investigation_number, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group  ">
							{{Form::label('accident_number', 'Accident Number', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::text('accident_number',$info->accident_number, array('class' => 'form-control','placeholder'=>''))}}
							</div>
						</div>

						<div class="form-group  ">
							{{Form::label('memo_notes', 'Memo/Notes', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::textarea('memo_notes',$info->memo_notes, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							</div>
						</div>

                       
 						<div class="form-group ">
                        	{{ Form::label('file', 'Update File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							@if($info->file!='Null'){{HTML::link('files/pelLicenseHistory/'.$info->file,'Document',array('target'=>'_blank'))}}
							@else
								{{HTML::link('#','No Document Provided')}}
							@endif
							 </div>
							<div class="col-xs-6">
							  {{ Form::file('file') }}
							</div>
                        </div>
                                      
                                    </div><!-- /.box-body -->

                                   
									<div class="form-group">
                           
										<button type="submit" class="btn btn-lg btn-block btn-primary">Save</button>
                           
									</div>
	
									
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
@endforeach
@stop
@endif


@if($PageName=='Logbook Review'||$PageName=='Com View')
@section('updateLogbookReview')
@foreach($logbookRecords as $info)
<div class="modal fade" id="updateLogbookReview{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Logbook Review</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/updateLogbookReview', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">
						{{Form::hidden('id',$info->id)}}	
						<div class="form-group required">
	                                           
												{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
										<div class="radio">
											<label> {{ Form::radio('active', 'Yes',Input::old('active', $info->active == 'Yes'),array()) }} &nbsp  Yes</label>
											<label> {{ Form::radio('active', 'No',Input::old('active', $info->active == 'No'),array()) }} &nbsp  No</label>
										</div>
										
									</div>
	                    </div>


						<div class="form-group required">
	                                           
												{{Form::label('review_date', 'Date of Review', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('review_date', $dates,$info->review_date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('review_month',$months,$info->review_month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('review_year',$years,$info->review_year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>

	                     <div class="form-group required">
	                       
							{{Form::label('purpose_of_review', 'Purpose of Review', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::select('purpose_of_review', array(
									'' => '--Select--',
									'After Accident' => 'After Accident',
									'After Incident' => 'After Incident',
									'Annual Review' => 'Annual Review',
									'Flight Test' => 'Flight Test',
									'Inspection' => 'Inspection'
									), $info->purpose_of_review ,array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>
	                     
						
						<div class="form-group">
							{{Form::label('flight_time', 'Flight Time', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('flight_time',$info->flight_time, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						

						<div class="form-group  ">
							{{Form::label('memo_notes', 'Memo/Notes', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::textarea('memo_notes',$info->memo_notes, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							</div>
						</div>

                                      
                                    </div><!-- /.box-body -->

                                   
									<div class="form-group">
                           
										<button type="submit" class="btn btn-lg btn-block btn-primary">Save</button>
                           
									</div>
	
									
					{{Form::close()}}
				</div>
			</div>
		</div>
</div>
@endforeach
@stop
@endif


@if($PageName=='Simulator'||$PageName=='Com View')
@section('updateSimulator')
@foreach($simulatorHistorys as $info)
 <div class="modal fade" id="updateSimulator{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Simulator History</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/updateSimulator', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">

						{{Form::hidden('id',$info->id)}}	


						<div class="form-group required">
	                                           
												{{Form::label('date', 'Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date', $dates,$info->date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month',$months,$info->month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year',$years,$info->year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>

	                     
						
						<div class="form-group required">
							{{Form::label('model', 'Model', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('model',$info->model, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
							 </div>
						</div>
						<div class="form-group required">
							{{Form::label('registration', 'Registration', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('registration',$info->registration, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
							 </div>
						</div>
						<div class="form-group required">
							{{Form::label('location', 'Location', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('location',$info->location, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('other_crew_instructor', 'Other Crew / Instructor', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('other_crew_instructor',$info->other_crew_instructor, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('type_of_instruction', 'Type of Instruction', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::select('type_of_instruction', array(
									'' => '--Select--',									
									), $info->type_of_instruction,array('class'=>'form-control'))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('FFS_HR', 'FFS (HR)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('FFS_HR',$info->FFS_HR, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('FNPT_1_HR', 'FNPT-I(HR)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('FNPT_1_HR',$info->FNPT_1_HR, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('FNPT_II_HR', 'FNPT-II(HR)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('FNPT_II_HR',$info->FNPT_II_HR, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('CSS_HR', 'CSS(HR)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('CSS_HR',$info->CSS_HR, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('instruction_HR', 'Instruction (HR)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('instruction_HR',$info->instruction_HR, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('exam_HR', 'EXAM (HR)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('exam_HR',$info->exam_HR, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						
  
                                    </div><!-- /.box-body -->

                                   
									<div class="form-group">
                           
										<button type="submit" class="btn btn-lg btn-block btn-primary">Save</button>
                           
									</div>
	
									
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
@endforeach
@stop
@endif


@if($PageName=='PEL General'||$PageName=='Com View')
@section('updategeneralInfo')
@foreach($generalInfos as $info)
 <div class="modal fade" id="updateGeneralInfo{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update General Info.</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/updateGeneral', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">
					 {{Form::hidden('id',$info->id)}}
					 <div class="form-group required">
	                                           
							{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
												
	                        <div class="col-xs-6">
									<div class="radio">
								 
								<label> {{ Form::radio('active', 'Yes',Input::old('active', $info->active == 'Yes'),array()) }} &nbsp  Yes</label>
								<label> {{ Form::radio('active', 'No',Input::old('active', $info->active == 'No'),array()) }} &nbsp  No</label>
								</div>
								
							</div>
	                 </div>

                     <div class="form-group required">
	                       
							{{Form::label('license_type', 'License Type', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::select('license_type', array(
									'' => '--Select--',
									'Aircraft Dispatcher' => 'Aircraft Dispatcher',
									'Medical Certificate' => 'Medical Certificate',
									'Aircraft Medical Technician' => 'Aircraft Medical Technician',
									'Aviation Repair Specialist' => 'Aviation Repair Specialist',
									'Aeronautical Station Operator' => 'Aeronautical Station Operator',
									'Airline Transport Pilot' => 'Airline Transport Pilot',
									'Commercial Pilot' => 'Commercial Pilot',
									'Flight Attendent' => 'Flight Attendent',
									'Flight Engineer' => 'Flight Engineer',
									'Flight Instructor' => 'Flight Instructor',
									'Ground Instructor' => 'Ground Instructor',
									'Master Parachute Rigger' => 'Master Parachute Rigger',
									'Private Pilot' => 'Private Pilot',
									'Senior parachute Rigger' => 'Senior parachute Rigger',
									'Aircraft maintenance Engineer' => 'Aircraft maintenance Engineer',
									'Air traffic Controller' => 'Air traffic Controller',
									'Flight Operation Officer' => 'Flight Operation Officer',
									'CPL (H)' => 'CPL (H)',
									'PPL (A)' => 'PPL (A)',
									'PPL (H)' => 'PPL (H)',
									
									), $info->license_type,array('class'=>'form-control','required'=>''))}}
							</div>
						
                    </div> 
                     <div class="form-group required">
	                       
							{{Form::label('license_rating', 'License Rating', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::select('license_rating', array(
									'' => '--Select--',
									'Aircraft Dispatcher' => 'Aircraft Dispatcher',
									'Medical Certificate' => 'Medical Certificate',
									'Aircraft Medical Technician' => 'Aircraft Medical Technician',
									'Aviation Repair Specialist' => 'Aviation Repair Specialist',
									'Aeronautical Station Operator' => 'Aeronautical Station Operator',
									'Airline Transport Pilot' => 'Airline Transport Pilot',
									'Commercial Pilot' => 'Commercial Pilot',
									'Flight Attendent' => 'Flight Attendent',
									'Flight Engineer' => 'Flight Engineer',
									'Flight Instructor' => 'Flight Instructor',
									'Ground Instructor' => 'Ground Instructor',
									'Master Parachute Rigger' => 'Master Parachute Rigger',
									'Private Pilot' => 'Private Pilot',
									'Senior parachute Rigger' => 'Senior parachute Rigger',
									'Aircraft maintenance Engineer' => 'Aircraft maintenance Engineer',
									'Air traffic Controller' => 'Air traffic Controller',
									'Flight Operation Officer' => 'Flight Operation Officer',
									'CPL (H)' => 'CPL (H)',
									'PPL (A)' => 'PPL (A)',
									'PPL (H)' => 'PPL (H)',
									
									), $info->license_rating,array('class'=>'form-control','required'=>''))}}
							</div>
						
                    </div>               
						
						<div class="form-group required">
	                                           
												{{Form::label('issued_date', 'Issued date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('issued_date', $dates,$info->issued_date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('issued_month',$months,$info->issued_month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('issued_year',$years,$info->issued_year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>

						<div class="form-group ">
                               
								{{Form::label('expiration_date', 'Expiration date', array('class' => 'col-xs-4 control-label'))}}
								
										<div class="row">
											<div class="col-xs-2">
											{{Form::select('expiration_date', $dates,$info->expiration_date,array('class'=>'form-control'))}}
											</div>
											<div class="col-xs-3">
											{{Form::select('expiration_month',$months,$info->expiration_month,array('class'=>'form-control'))}}												
												
											</div>
											<div class="col-xs-2">
												{{Form::select('expiration_year',$years,$info->expiration_year,array('class'=>'form-control'))}}
											</div>
										</div>
												
	                    </div>	
						</div>
						<div class="form-group ">
							{{Form::label('old_certificate_number', 'Old Certificate Number', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('old_certificate_number',$info->old_certificate_number, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

	                    <div class="form-group ">
		                       
								{{Form::label('basis_for_issuance', 'Basis for Issuance', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('basis_for_issuance', array(
										'' => '--Select--',
										'Flight Test' => 'Flight Test',
										'Medical Examination' => 'Medical Examination',
										'Oral Test' => 'Oral Test',
										'Personal Knowledge' => 'Personal Knowledge',
										'Validation' => 'Validation',
										'Written Test' => 'Written Test',
										
										),$info->basis_for_issuance,array('class'=>'form-control'))}}
								</div>
							
	                    </div> 
	                    <div class="form-group ">
		                       
								{{Form::label('category', 'Category', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('category', array(
										'' => '--Select--',
										'Arpplane Single Engine Land' => 'Arpplane Single Engine Land',
										'Airplane Multi Engine Land' => 'Airplane Multi Engine Land'			
										),$info->category,array('class'=>'form-control'))}}
								</div>
							
	                    </div> 
						<div class="form-group ">
							{{Form::label('class', 'Class', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('class',$info->class, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('ratings', 'Ratings', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::textarea('ratings',$info->ratings, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('endorsement', 'Endorsement', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::textarea('endorsement',$info->endorsement, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('limitations', 'Limitations', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('limitations',$info->limitations, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						
  
                                    </div><!-- /.box-body -->

                                   
									<div class="form-group">
                           
										<button type="submit" class="btn btn-lg btn-block btn-primary">Save</button>
                           
									</div>
	
									
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
@endforeach
@stop
@endif


@if($PageName=='Trainging Details'||$PageName=='Com View')
@section('updatetrainingDetails')
@foreach($trainingDetails as $info)
 <div class="modal fade" id="updateTrainingDetails{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Training Details</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/updateTrainingDetails', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">
					
						{{Form::hidden('id',$info->id)}}			  	
						{{Form::hidden('old_file',$info->file)}}
						<div class="form-group required">
							{{Form::label('name_of_the_course', 'Name of The course', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('name_of_the_course',$info->name_of_the_course, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
							 </div>
						</div>  
						<div class="form-group required">
							{{Form::label('name_of_the_institute', 'Name Of The Institute', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('name_of_the_institute',$info->name_of_the_institute, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
							 </div>
						</div>     
						
						<div class="form-group required">
	                                           
												{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('start_date', $dates,$info->start_date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('start_month',$months,$info->start_month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('start_year',$years,$info->start_year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>	
						<div class="form-group required">
	                                           
												{{Form::label('end_date', 'End Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('end_date', $dates,$info->end_date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('end_month',$months,$info->end_month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('end_year',$years,$info->end_year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>
	
						</div>
						<div class="form-group ">
							{{Form::label('duration', 'Duration', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('duration',$info->duration, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group required">
	                                           
												{{Form::label('date_of_certificate_issue', 'Date Of Certificate Issue', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('certificate_issue_date', $dates,$info->certificate_issue_date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('certificate_issue_month',$months,$info->certificate_issue_month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('certificate_issue_year',$years,$info->certificate_issue_year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>

	                    <div class="form-group ">
	                                           
												{{Form::label('expiration_date', 'Expiration date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('expiration_date', $dates,$info->expiration_date,array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('expiration_month',$months,$info->expiration_month,array('class'=>'form-control'))}}												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('expiration_year',$years,$info->expiration_year,array('class'=>'form-control'))}}
															</div>
														</div>
												
	                    </div>	

 						<div class="form-group ">
                        	{{ Form::label('file', 'Update File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							@if($info->file!='Null'){{HTML::link('files/pelTrainingDetails/'.$info->file,'Document',array('target'=>'_blank'))}}
							@else
								{{HTML::link('#','No Document Provided')}}
							@endif
							 </div>
							<div class="col-xs-6">
							  {{ Form::file('file') }}
							</div>
                        </div>
						<div class="form-group">
							{{Form::label('approved_by', 'Approved By', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('approved_by',$info->approved_by, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						
  
                                    </div><!-- /.box-body -->

                                   
						<div class="form-group">
               
							<button type="submit" class="btn btn-lg btn-block btn-primary">Save</button>
               
						</div>
	
									
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>

@endforeach
@stop
@endif


@if($PageName=='AME Log Details'||$PageName=='Com View')
@section('updateameLogDetails')
@foreach($ameLogs as $info)
 <div class="modal fade" id="updateAmeLogDetails{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update AME Log Details</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/updateAmeDetails', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
						{{Form::hidden('id',$info->id)}}
					 <div class="box-body">
					
						
	                    <div class="form-group ">
		                       
								{{Form::label('index_number', 'Index Number', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('index_number', array(
										'' => '--Select--',
										'197' => '197',
										'2' => '2',		
										'3' => '3',			
										), $info->index_number,array('class'=>'form-control'))}}
								</div>
							
	                    </div>
						
	                    <div class="form-group ">
		                       
								{{Form::label('ata_chapter', 'ATA Chapter', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('ata_chapter', array(
										'' => '--Select--',
										'73' => '73',
										'74' => '74',			
										'75' => '75',			
										),$info->ata_chapter,array('class'=>'form-control'))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('part_66_module', 'Part-66 Module', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('part_66_module', array(
										'' => '--Select--',
										'14.1/15.11' => '14.1/15.11',
										'15.11' => '15.11',			
										'15.12' => '15.12',			
										
										), $info->part_66_module,array('class'=>'form-control'))}}
								</div>
						
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('task_competence_group_p_66', 'Task Competence Group (p-66)', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('task_competence_group_p_66', array(
										'' => '--Select--',
										'Gas Turbine Engine / Propulsion' => 'Gas Turbine Engine / Propulsion',
										'Piston Engine' => 'Piston Engine',			
										
										), $info->task_competence_group_p_66,array('class'=>'form-control'))}}
								</div>
						
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('task_competence_details_p_66', 'Task Competence Details (p-66)', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('task_competence_details_p_66', array(
										'' => '--Select--',
										'Perform a FADEC system test' => 'Perform a FADEC system test',
										'Describe fuel system layout and components' => 'Describe fuel system layout and components',			
										'Describe the layout and components of the bleed air system' => 'Describe the layout and components of the bleed air system',			
										
										), $info->task_competence_details_p_66,array('class'=>'form-control'))}}
								</div>
						
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('basic_skill_title', 'Basic Skill Title', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('basic_skill_title', array(
										'' => '--Select--',
										'General Aircraft Maintenance' => 'General Aircraft Maintenance',
										'Mechanical Fitting Practices (Common)' => 'Mechanical Fitting Practices (Common)',
										
										), $info->basic_skill_title ,array('class'=>'form-control'))}}
								</div>
						
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('basic_skill_task', 'Basic Skill Task', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('basic_skill_task', array(
										'' => '--Select--',
										'Awareness of hazards when working with aircraft – noise, heat' => 'Awareness of hazards when working with aircraft – noise, heat',
										'Safety precautions when using fluids, gasses and chemicals' => 'Safety precautions when using fluids, gasses and chemicals',
										
										), $info->basic_skill_task ,array('class'=>'form-control'))}}
								</div>
						
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('maintenance_task_title', 'Maintenance Task Title', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('maintenance_task_title', array(
										'' => '--Select--',
										'Time limits/Maintenance checks' => 'Time limits/Maintenance checks',
										'Dimensions/Areas' => 'Dimensions/Areas',
										'Lifting and Shoring' => 'Lifting and Shoring',
										
										), $info->maintenance_task_title,array('class'=>'form-control'))}}
								</div>
						
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('maintenance_task_details', 'Maintenance Task Details', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('maintenance_task_details', array(
										'' => '--Select--',
										'100 hour check (general aviation aircraft).' => '100 hour check (general aviation aircraft).',
										'“B” or “C” check (transport category aircraft)' => '“B” or “C” check (transport category aircraft)',
										
										), $info->maintenance_task_details,array('class'=>'form-control'))}}
								</div>
						
	                    </div>
                        
						<div class="form-group ">
							{{Form::label('aircraft_MSN', 'Aircraft MSN', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('aircraft_msn',$info->aircraft_msn, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>  


						<div class="form-group ">
							{{Form::label('workshop', 'Workshop', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::textarea('workshop',$info->workshop, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							 </div>
						</div>   

						<div class="form-group ">
							{{Form::label('work_order', 'Work Order', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::textarea('work_order',$info->work_order, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							 </div>
						</div>          

						
						<div class="form-group ">
							{{Form::label('supervisor_instructor_assessor_company', 'Supervisor/Instructor/ Assessor/Company', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('supervisor_instructor_assessor_company',$info->supervisor_instructor_assessor_company, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>  
						<div class="form-group ">
	                                           
												{{Form::label('date', 'Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date', $dates,$info->date,array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month',$months,$info->month,array('class'=>'form-control'))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year',$years,$info->year,array('class'=>'form-control'))}}
															</div>
														</div>
												
	                    </div>	

						<div class="form-group ">
							{{Form::label('hour_details', 'Hour Details', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('hour_details',$info->hour_details, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 
						            </div><!-- /.box-body -->

                                   
						<div class="form-group">
               
							<button type="submit" class="btn btn-lg btn-block btn-primary">Save</button>
               
						</div>
	
									
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
	@endforeach

@stop
@endif


@if($PageName=='Flying Details'||$PageName=='Com View')
@section('updateFlyingDetails')
@foreach($flyingDetails as $info )
 <div class="modal fade" id="updateFlyingDetails{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Flying Details</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/updateFlyingDetails', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">
					
						
	                   {{Form::hidden('id',$info->id)}}
						<div class="form-group ">
	                                           
												{{Form::label('date', 'Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
																{{Form::select('date', $dates,$info->date,array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
																{{Form::select('month',$months,$info->month,array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-2">
																{{Form::select('year',$years,$info->year,array('class'=>'form-control'))}}
															</div>
														</div>
												
	                    </div>	


						<div class="form-group ">
							{{Form::label('local_time', 'Local Time', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('local_time',$info->local_time, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 
						<div class="form-group ">
							{{Form::label('sun_rise', 'Sun Rise', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('sun_rise',$info->sun_rise, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 
						<div class="form-group ">
							{{Form::label('sun_set', 'Sun set', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('sun_set',$info->sun_set, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 
						<div class="form-group ">
							{{Form::label('flight_number', 'Flight Number', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('flight_number',$info->flight_number, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('pairing', 'Pairing', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('pairing',$info->pairing, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group ">
							{{Form::label('departure_airfield', 'Departure Airfield', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('departure_airfield',$info->departure_airfield, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('arrival_airfield', 'Arrival Airfield', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('arrival_airfield',$info->arrival_airfield, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('off_block', 'Off Block(Minute)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('off_block',$info->off_block, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('on_block', 'On Block(Minute)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('on_block',$info->on_block, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('flight', 'Flight(Minute)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('flight',$info->flight, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('pic_p1', 'PIC/P1', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('pic_p1',$info->pic_p1, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('co_pilot_p2', 'Co-Pilot/P2', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('co_pilot_p2',$info->co_pilot_p2, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group ">
							{{Form::label('relief_pilot_r', 'Relief Pilot/R', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('relief_pilot_r',$info->relief_pilot_r, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('dual', 'Dual', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('dual',$info->dual, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('instructor', 'Instructor', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('instructor',$info->instructor, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('examiner', 'Examiner', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('examiner',$info->examiner, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('night', 'Night', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('night',$info->night, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('ifr', 'IFR', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('ifr',$info->ifr, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group ">
							{{Form::label('sim_instructor', 'Sim Instructor', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('sim_instructor',$info->sim_instructor, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('cross_country', 'Cross Country', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('cross_country',$info->cross_country, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('approach_landing', 'Approach Landing', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::select('approach_landing', array(
										'' => '--Select--',
										'CAT-2' =>'CAT-2',
										'CAT-3' =>'CAT-3',
										'TACAN' => 'TACAN',			
										
										),$info->approach_landing,array('class'=>'form-control'))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('flight_time_view_only', 'Flight Time (view only)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::select('flight_time_view_only', array(
										'' => '--Day--',
										'7' =>'7',
										'30' =>'30',
										'90' => '90',			
										'180' => '180',			
										'365' => '365',			
										
										),$info->flight_time_view_only,array('class'=>'form-control'))}}
							 </div>
						</div> 
						
						<div class="form-group ">
	                                           
												{{Form::label('', 'Last 3 Flying Dates (View Only)', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date_1', $dates,$info->date_1,array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month_1',$months,$info->month_1,array('class'=>'form-control'))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year_1',$years,$info->year_1,array('class'=>'form-control'))}}
															</div>
														</div>
						</div>
						<div class="form-group ">
												{{Form::label('', '.', array('class' => 'col-xs-4 control-label'))}}
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date_2', $dates,$info->date_2,array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month_2',$months,$info->month_2,array('class'=>'form-control'))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year_2',$years,$info->year_2,array('class'=>'form-control'))}}
															</div>
														</div>
						</div>
						<div class="form-group ">

												{{Form::label('', '.', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date_3', $dates,$info->date_3,array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month_3',$months,$info->month_3,array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-2">
																{{Form::select('year_3',$years,$info->year_3,array('class'=>'form-control'))}}
															</div>
														</div>
						</div>
												
	                    

						<div class="form-group ">
							{{Form::label('flight_time_limits', 'Flight Time Limits', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::select('flight_time_limits', array(
										'' => '--Day--',
										'7' =>'7',
										'30' =>'30',
										'90' => '90',			
										'180' => '180',			
										'365' => '365',			
										
										), $info->flight_time_limits,array('class'=>'form-control'))}}
							 </div>
						</div> 

						
						<div class="form-group ">
							{{Form::label('aircraft_msn', 'Aircraft MSN', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('aircraft_msn',$info->aircraft_msn, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group ">
							{{Form::label('aircraft_registration_number', 'Aircraft Registration Number', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('aircraft_registration_number',$info->aircraft_registration_number, array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

					</div><!-- /.box-body -->

                                   
						<div class="form-group">
               
							<button type="submit" class="btn btn-lg btn-block btn-primary">Save</button>
               
						</div>
	
									
					{{Form::close()}}
				</div>
			</div>
		</div>
 </div>
 @endforeach
@stop
@endif