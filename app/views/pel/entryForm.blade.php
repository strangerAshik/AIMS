@if($PageName=='Designee Records')
@section('designeeRecordEntry')
 <div class="modal fade" id="designeeRecords" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Designee Record </h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/saveDesigneeRecord', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">

						<div class="form-group required">
	                                           
												{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
											<div class="radio">
										 
										 <label> {{ Form::radio('active', 'Yes',true) }} &nbsp  Yes</label>
										 <label> {{ Form::radio('active', 'No') }} &nbsp  No</label>
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

									), '0',array('class'=>'form-control','required'=>''))}}
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

									), '0',array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>		

						<div class="form-group  ">
							{{Form::label('business_address', 'Business Address', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::textarea('business_address','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							</div>
						</div>
						<div class="form-group required">
	                       
							{{Form::label('organization', 'Organization', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::select('organization',$organizations,'--Select Organization--',array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>
						<div class="form-group">
							{{Form::label('aircraft', 'Aircraft', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('aircraft','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group required">
	                                           
												{{Form::label('effective_date', 'Effective date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('effective_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('effective_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('effective_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>

						<div class="form-group ">
	                                           
												{{Form::label('expiration_date', 'Expiration date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('expiration_date', $dates,'0',array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('expiration_month',$months,'0',array('class'=>'form-control'))}}												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('expiration_year',$years,'0',array('class'=>'form-control'))}}
															</div>
														</div>
												
	                    </div>	

						<div class="form-group  ">
							{{Form::label('function', 'Functions', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::textarea('function','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							</div>
						</div>
						<div class="form-group">
							{{Form::label('limitation', 'Limitation', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::textarea('limitation','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							</div>
						</div>
									
                        <div class="form-group ">
                        	{{ Form::label('file', 'Upload File: ',array('class'=>'control-label col-xs-4')) }}
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

@stop
@endif

@if($PageName=='Medical Certification')
@section('medicalCertification')
 <div class="modal fade" id="medicalCertification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Medical Certification</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/saveMedicalCertification', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">

						<div class="form-group required">
	                                           
												{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
											<div class="radio">
										 
										 <label> {{ Form::radio('active', 'Yes',true) }} &nbsp  Yes</label>
										 <label> {{ Form::radio('active', 'No') }} &nbsp  No</label>
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
									), '0',array('class'=>'form-control','required'=>''))}}
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
									), '0',array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>	

						<div class="form-group required">
	                                           
												{{Form::label('effective_date', 'Effective date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('effective_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('effective_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('effective_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>

						<div class="form-group ">
	                                           
												{{Form::label('expiration_date', 'Expiration date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('expiration_date', $dates,'0',array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('expiration_month',$months,'0',array('class'=>'form-control'))}}												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('expiration_year',$years,'0',array('class'=>'form-control'))}}
															</div>
														</div>
												
	                    </div>	
						<div class="form-group ">
	                                           
												{{Form::label('examination_date', 'Date of Examination', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('examination_date', $dates,'0',array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('examination_month',$months,'0',array('class'=>'form-control'))}}												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('examination_year',$years,'0',array('class'=>'form-control'))}}
															</div>
														</div>
												
	                    </div>	

	


						<div class="form-group">
							{{Form::label('medical_examiner', 'Medical Examiner', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('medical_examiner','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group  ">
							{{Form::label('medical_limitation', 'Medical Limitation', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::textarea('medical_limitation','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							</div>
						</div>

                        <div class="form-group ">
                        	{{ Form::label('file', 'Upload File: ',array('class'=>'control-label col-xs-4')) }}
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

@stop
@endif

@if($PageName=='License History')
@section('licenseHistory')
 <div class="modal fade" id="licenseHistory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add License History</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/saveLicenseHistory', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">

						<div class="form-group required">
	                                           
												{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
											<div class="radio">
										 
										 <label> {{ Form::radio('active', 'Yes',true) }} &nbsp  Yes</label>
										 <label> {{ Form::radio('active', 'No') }} &nbsp  No</label>
										</div>
										
									</div>
	                    </div>


						<div class="form-group required">
	                                           
												{{Form::label('effective_date', 'Effective date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('effective_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('effective_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('effective_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
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
									), '0',array('class'=>'form-control','required'=>''))}}
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
									), '0',array('class'=>'form-control','required'=>''))}}
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
									), '0',array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>
						
						<div class="form-group required">
	                       
							{{Form::label('organization', 'Organization', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::select('organization',$organizations,'',array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>
						<div class="form-group">
							{{Form::label('designation_number', 'Designation Number', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('designation_number','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('investigation_number', 'Investigation Number', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('investigation_number','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group  ">
							{{Form::label('accident_number', 'Accident Number', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::text('accident_number','', array('class' => 'form-control','placeholder'=>''))}}
							</div>
						</div>

						<div class="form-group  ">
							{{Form::label('memo_notes', 'Memo/Notes', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::textarea('memo_notes','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							</div>
						</div>

                        <div class="form-group ">
                        	{{ Form::label('file', 'Upload File: ',array('class'=>'control-label col-xs-4')) }}
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

@stop
@endif

@if($PageName=='Logbook Review')
@section('logbookReview')
 <div class="modal fade" id="logbookReview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Logbook Review</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/saveLogbookReview', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">

						<div class="form-group required">
	                                           
												{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
											<div class="radio">
										 
										 <label> {{ Form::radio('active', 'Yes',true) }} &nbsp  Yes</label>
										 <label> {{ Form::radio('active', 'No') }} &nbsp  No</label>
										</div>
										
									</div>
	                    </div>


						<div class="form-group required">
	                                           
												{{Form::label('review_date', 'Date of Review', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('review_date', $dates,'',array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('review_month',$months,'',array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('review_year',$years,'',array('class'=>'form-control','required'=>''))}}
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
									), '0',array('class'=>'form-control','required'=>''))}}
							</div>
							
	                    </div>
	                     
						
						<div class="form-group">
							{{Form::label('flight_time', 'Flight Time', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('flight_time','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						

						<div class="form-group  ">
							{{Form::label('memo_notes', 'Memo/Notes', array('class' => 'control-label col-xs-4 '))}}
							<div class="col-xs-6">
							{{Form::textarea('memo_notes','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
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

@stop
@endif

@if($PageName=='Simulator')
@section('simulator')
 <div class="modal fade" id="simulator" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Simulator History</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/saveSimulator', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">

						


						<div class="form-group required">
	                                           
												{{Form::label('date', 'Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date', $dates,'',array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month',$months,'',array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year',$years,'',array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>

	                     
						
						<div class="form-group required">
							{{Form::label('model', 'Model', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('model','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
							 </div>
						</div>
						<div class="form-group required">
							{{Form::label('registration', 'Registration', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('registration','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
							 </div>
						</div>
						<div class="form-group required">
							{{Form::label('location', 'Location', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('location','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('other_crew_instructor', 'Other Crew / Instructor', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('other_crew_instructor','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('type_of_instruction', 'Type of Instruction', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::select('type_of_instruction', array(
									'' => '--Select--',									
									), '0',array('class'=>'form-control'))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('FFS_HR', 'FFS (HR)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('FFS_HR','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('FNPT_1_HR', 'FNPT-I(HR)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('FNPT_1_HR','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('FNPT_II_HR', 'FNPT-II(HR)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('FNPT_II_HR','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('CSS_HR', 'CSS(HR)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('CSS_HR','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('instruction_HR', 'Instruction (HR)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('instruction_HR','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('exam_HR', 'EXAM (HR)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('exam_HR','', array('class' => 'form-control','placeholder'=>''))}}
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

@stop
@endif

@if($PageName=='PEL General')
@section('generalInfo')
 <div class="modal fade" id="generalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add General Info.</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/saveGeneral', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">
					 <div class="form-group required">
	                                           
							{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
												
	                        <div class="col-xs-6">
									<div class="radio">
								 
								 <label> {{ Form::radio('active', 'Yes',true) }} &nbsp  Yes</label>
								 <label> {{ Form::radio('active', 'No') }} &nbsp  No</label>
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
									
									), '0',array('class'=>'form-control','required'=>''))}}
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
									
									), '0',array('class'=>'form-control','required'=>''))}}
							</div>
						
                    </div>               
						
						<div class="form-group required">
	                                           
												{{Form::label('issued_date', 'Issued date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('issued_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('issued_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('issued_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>

						<div class="form-group ">
                               
								{{Form::label('expiration_date', 'Expiration date', array('class' => 'col-xs-4 control-label'))}}
								
										<div class="row">
											<div class="col-xs-2">
											{{Form::select('expiration_date', $dates,'0',array('class'=>'form-control'))}}
											</div>
											<div class="col-xs-3">
											{{Form::select('expiration_month',$months,'0',array('class'=>'form-control'))}}												
												
											</div>
											<div class="col-xs-2">
												{{Form::select('expiration_year',$years,'0',array('class'=>'form-control'))}}
											</div>
										</div>
												
	                    </div>	
						</div>
						<div class="form-group ">
							{{Form::label('old_certificate_number', 'Old Certificate Number', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('old_certificate_number','', array('class' => 'form-control','placeholder'=>''))}}
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
										
										), '0',array('class'=>'form-control'))}}
								</div>
							
	                    </div> 
	                    <div class="form-group ">
		                       
								{{Form::label('category', 'Category', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('category', array(
										'' => '--Select--',
										'Arpplane Single Engine Land' => 'Arpplane Single Engine Land',
										'Airplane Multi Engine Land' => 'Airplane Multi Engine Land'			
										), '0',array('class'=>'form-control'))}}
								</div>
							
	                    </div> 
						<div class="form-group ">
							{{Form::label('class', 'Class', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('class','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('ratings', 'Ratings', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::textarea('ratings','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('ratings', 'Ratings', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::textarea('ratings','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('endorsement', 'Endorsement', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::textarea('endorsement','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							 </div>
						</div>
						<div class="form-group">
							{{Form::label('limitations', 'Limitations', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('limitations','', array('class' => 'form-control','placeholder'=>''))}}
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

@stop
@endif

@if($PageName=='Trainging Details')
@section('trainingDetails')
 <div class="modal fade" id="trainingDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Training Details</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/saveTrainingDetails', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">
					

                        
						<div class="form-group required">
							{{Form::label('name_of_the_course', 'Name of The course', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('name_of_the_course','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
							 </div>
						</div>  
						<div class="form-group required">
							{{Form::label('name_of_the_institute', 'Name Of The Institute', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('name_of_the_institute','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
							 </div>
						</div>          
						
						<div class="form-group required">
	                                           
												{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('start_date', $dates,'0',array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('start_month',$months,'0',array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('start_year',$years,'0',array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>	
						<div class="form-group required">
	                                           
												{{Form::label('end_date', 'End Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('end_date', $dates,'0',array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('end_month',$months,'0',array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('end_year',$years,'0',array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>
	
						</div>
						<div class="form-group ">
							{{Form::label('duration', 'Duration', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('duration','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group required">
	                                           
												{{Form::label('date_of_certificate_issue', 'Date Of Certificate Issue', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('certificate_issue_date', $dates,'0',array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('certificate_issue_month',$months,'0',array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('certificate_issue_year',$years,'0',array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>

	                    <div class="form-group ">
	                                           
												{{Form::label('expiration_date', 'Expiration date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('expiration_date', $dates,'0',array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('expiration_month',$months,'0',array('class'=>'form-control'))}}												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('expiration_year',$years,'0',array('class'=>'form-control'))}}
															</div>
														</div>
												
	                    </div>	

                        <div class="form-group ">
                        	{{ Form::label('file', 'Upload File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							 {{ Form::file('file') }}
							 </div>
                        </div>
						<div class="form-group">
							{{Form::label('approved_by', 'Approved By', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('approved_by','', array('class' => 'form-control','placeholder'=>''))}}
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

@stop
@endif

@if($PageName=='AME Log Details')
@section('ameLogDetails')
 <div class="modal fade" id="ameLogDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add AME Log Details</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/saveAmeDetails', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">
					
						
	                    <div class="form-group ">
		                       
								{{Form::label('index_number', 'Index Number', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('index_number', array(
										'' => '--Select--',
										'197' => '197',
										'2' => '2',		
										'3' => '3',			
										), '0',array('class'=>'form-control'))}}
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
										), '0',array('class'=>'form-control'))}}
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
										
										), '0',array('class'=>'form-control'))}}
								</div>
						
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('task_competence_group_p_66', 'Task Competence Group (p-66)', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('task_competence_group_p_66', array(
										'' => '--Select--',
										'Gas Turbine Engine / Propulsion' => 'Gas Turbine Engine / Propulsion',
										'Piston Engine' => 'Piston Engine',			
										
										), '0',array('class'=>'form-control'))}}
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
										
										), '0',array('class'=>'form-control'))}}
								</div>
						
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('basic_skill_title', 'Basic Skill Title', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('basic_skill_title', array(
										'' => '--Select--',
										'General Aircraft Maintenance' => 'General Aircraft Maintenance',
										'Mechanical Fitting Practices (Common)' => 'Mechanical Fitting Practices (Common)',
										
										), '0',array('class'=>'form-control'))}}
								</div>
						
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('basic_skill_task', 'Basic Skill Task', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('basic_skill_task', array(
										'' => '--Select--',
										'Awareness of hazards when working with aircraft – noise, heat' => 'Awareness of hazards when working with aircraft – noise, heat',
										'Safety precautions when using fluids, gasses and chemicals' => 'Safety precautions when using fluids, gasses and chemicals',
										
										), '0',array('class'=>'form-control'))}}
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
										
										), '0',array('class'=>'form-control'))}}
								</div>
						
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('maintenance_task_details', 'Maintenance Task Details', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('maintenance_task_details', array(
										'' => '--Select--',
										'100 hour check (general aviation aircraft).' => '100 hour check (general aviation aircraft).',
										'“B” or “C” check (transport category aircraft)' => '“B” or “C” check (transport category aircraft)',
										
										), '0',array('class'=>'form-control'))}}
								</div>
						
	                    </div>
                        
						<div class="form-group ">
							{{Form::label('aircraft_MSN', 'Aircraft MSN', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('aircraft_msn','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>  


						<div class="form-group ">
							{{Form::label('workshop', 'Workshop', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::textarea('workshop','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							 </div>
						</div>   

						<div class="form-group ">
							{{Form::label('work_order', 'Work Order', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::textarea('work_order','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
							 </div>
						</div>          

						
						<div class="form-group ">
							{{Form::label('supervisor_instructor_assessor_company', 'Supervisor/Instructor/ Assessor/Company', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('supervisor_instructor_assessor_company','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>  
						<div class="form-group ">
	                                           
												{{Form::label('date', 'Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date', $dates,'0',array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month',$months,'0',array('class'=>'form-control'))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year',$years,'0',array('class'=>'form-control'))}}
															</div>
														</div>
												
	                    </div>	

						<div class="form-group ">
							{{Form::label('hour_details', 'Hour Details', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('hour_details','', array('class' => 'form-control','placeholder'=>''))}}
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
@stop
@endif

@if($PageName=='ATC Log Details')
@section('atcObservation')
 <div class="modal fade" id="atcObservation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Observation Details</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/saveAmeDetails', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">
					
						
	                    <div class="form-group ">
		                       
								{{Form::label('today', 'Date', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('radio_navigation_aids',date('d F Y'), array('class' => 'form-control','placeholder'=>'','disabled'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('radio_navigation_aids', 'Radio & Navigation Aids', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('radio_navigation_aids','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
						
	                    <div class="form-group ">
		                       
								{{Form::label('take_over_time', 'Take Over Time', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('take_over_time','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('fire_fighting_vehicle', 'Fire Fighting Vehicle ( Number )', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('fire_fighting_vehicle','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('ambulance', 'Ambulance ( Number )', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('fire_fighting_vehicle','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('mtd', 'MTD', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('mtd','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('surface_wind', 'Surface Wind', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('surface_wind','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('visibility_range', 'Visibility Range', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('visibility_range','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('visibility_condition', 'Visibility Condition', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('visibility_condition', array(
										'' => '--Select--',		
										), '0',array('class'=>'form-control'))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('runway_usage', 'Runway Usage', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('runway_usage', array(
										'' => '--Select--',		
										), '0',array('class'=>'form-control'))}}
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
@stop
@endif
@if($PageName=='ATC Log Details')
@section('atcWatchHandover')
 <div class="modal fade" id="atcWatchHandover" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Handover Details</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/saveAmeDetails', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">
					
						
	                   <div class="form-group ">
		                       
								{{Form::label('hand_over_to', 'Hand Over To', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('hand_over_to', array(
										'' => '--Select--',		
										), '0',array('class'=>'form-control'))}}
								</div>
							
	                    </div>
						
	                    <div class="form-group ">
		                       
								{{Form::label('hand_over_time', 'Hand Over Time( UTC )', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('hand_over_time','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('remark_of_sato', 'Remark Of SATO', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								
								{{Form::textarea('remark_of_sato','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
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
@stop
@endif

@if($PageName=='ATC Log Details')
@section('atcAircraftMovement')
 <div class="modal fade" id="atcAircraftMovement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Aircraft Movement Details</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/saveAmeDetails', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">
					
						
	                   
						
	                    <div class="form-group ">
		                       
								{{Form::label('call_sign', 'Call Sign', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('call_sign','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('aircraft_registration', 'Aircraft Registration', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('aircraft_registration','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('aircraft_mms', 'Aircraft MMS', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('aircraft_mms','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('departure_from', 'Departure From', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('departure_from','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('departure_to', 'Departure To', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('departure_to','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('departure_time', 'Departure Time', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('departure_time','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('arrival_time', 'Arrival Time', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('arrival_time','', array('class' => 'form-control','placeholder'=>''))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('runway_designator', 'Runway Designator', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::select('runway_designator', array(
										'' => '--Select--',		
										), '0',array('class'=>'form-control'))}}
								</div>
							
	                    </div>
	                    <div class="form-group ">
		                       
								{{Form::label('remark', 'Remark', array('class' => 'control-label col-xs-4 '))}}
								<div class="col-xs-6">
								{{Form::text('remark','', array('class' => 'form-control','placeholder'=>''))}}
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
@stop
@endif

@if($PageName=='Flying Details')
@section('flyingDetails')
 <div class="modal fade" id="flyingDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Flying Details</h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/saveFlyingDetails', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					 <div class="box-body">
					
						
	                   
						<div class="form-group ">
	                                           
												{{Form::label('date', 'Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date', $dates,'0',array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month',$months,'0',array('class'=>'form-control'))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year',$years,'0',array('class'=>'form-control'))}}
															</div>
														</div>
												
	                    </div>	


						<div class="form-group ">
							{{Form::label('local_time', 'Local Time', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('local_time','', array('class' => 'form-control','placeholder'=>''))}}
							
							 </div>

						</div> 
						        <!--<div class="input-append bootstrap-timepicker">
            <input id="timepicker1" type="text" class="input-small">
            <span class="add-on"><i class="glyphicon glyphicon-time"></i></span>
        </div>-->
						<div class="form-group ">
							{{Form::label('sun_rise', 'Sun Rise', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('sun_rise','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 
						<div class="form-group ">
							{{Form::label('sun_set', 'Sun set', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('sun_set','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 
						<div class="form-group ">
							{{Form::label('flight_number', 'Flight Number', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('flight_number','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('pairing', 'Pairing', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('pairing','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group ">
							{{Form::label('departure_airfield', 'Departure Airfield', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('departure_airfield','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('arrival_airfield', 'Arrival Airfield', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('arrival_airfield','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('off_block', 'Off Block(Minute)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('off_block','', array('class' => 'form-control','placeholder'=>'In Minute'))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('on_block', 'On Block(Minute)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('on_block','', array('class' => 'form-control','placeholder'=>'In Minute'))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('flight', 'Flight(Minute)', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('flight','', array('class' => 'form-control','placeholder'=>'In Minute'))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('pic_p1', 'PIC/P1', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('pic_p1','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('co_pilot_p2', 'Co-Pilot/P2', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('co_pilot_p2','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group ">
							{{Form::label('relief_pilot_r', 'Relief Pilot/R', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('relief_pilot_r','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('dual', 'Dual', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('dual','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('instructor', 'Instructor', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('instructor','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('examiner', 'Examiner', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('examiner','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('night', 'Night', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('night','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('ifr', 'IFR', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('ifr','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group ">
							{{Form::label('sim_instructor', 'Sim Instructor', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('sim_instructor','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div> 

						<div class="form-group ">
							{{Form::label('cross_country', 'Cross Country', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('cross_country','', array('class' => 'form-control','placeholder'=>''))}}
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
										
										), '0',array('class'=>'form-control'))}}
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
										
										), '0',array('class'=>'form-control'))}}
							 </div>
						</div> 
						
						<div class="form-group ">
	                                           
												{{Form::label('', 'Last 3 Flying Dates (View Only)', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date_1', $dates,'0',array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month_1',$months,'0',array('class'=>'form-control'))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year_1',$years,'0',array('class'=>'form-control'))}}
															</div>
														</div>
						</div>
						<div class="form-group ">
												{{Form::label('', '.', array('class' => 'col-xs-4 control-label'))}}
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date_2', $dates,'0',array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month_2',$months,'0',array('class'=>'form-control'))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year_2',$years,'0',array('class'=>'form-control'))}}
															</div>
														</div>
						</div>
						<div class="form-group ">

												{{Form::label('', '.', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date_3', $dates,'0',array('class'=>'form-control'))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month_3',$months,'0',array('class'=>'form-control'))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year_3',$years,'0',array('class'=>'form-control'))}}
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
										
										), '0',array('class'=>'form-control'))}}
							 </div>
						</div> 

						
						<div class="form-group ">
							{{Form::label('aircraft_msn', 'Aircraft MSN', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('aircraft_msn','', array('class' => 'form-control','placeholder'=>''))}}
							 </div>
						</div>

						<div class="form-group ">
							{{Form::label('aircraft_registration_number', 'Aircraft Registration Number', array('class' => 'control-label col-xs-4'))}}
							<div class="col-xs-6">
							{{Form::text('aircraft_registration_number','', array('class' => 'form-control','placeholder'=>''))}}
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
 <script type="text/javascript">
            $('#timepicker1').timepicker();
 </script>
@stop
@endif