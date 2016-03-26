@if($PageName=='Single Program')
@section('updateNewProgram')
@foreach ($programDetails as $info) 
<div class="modal fade" id="updateProgram{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update New SIA Program</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'surveillance/updateProgram','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  
				{{Form::hidden('id',$info->id)}}
				{{Form::hidden('sia_number',$info->sia_number)}}
					
                    <div class="form-group required">
                                           
											{{Form::label('org_name', 'Organization Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('organization_all');?>
											<select required id="organizations" name='org_name' class="demo-default" placeholder="Select  Org...">
												<option selected value="{{$info->org_name}}">{{$info->org_name}}</option>
												@foreach($options as $organization)
												<option value="{{$organization}}">{{$organization}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
                    <div class="form-group required">
                                           
											{{Form::label('event','Event On', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_Event');?>
											<select required id="event" name='event' class="demo-default" placeholder="Select Event Type...">
												<option selected value="{{$info->event}}">{{$info->event}}</option>
												@foreach($options as $option)
												<option value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
                     <div class="form-group ">
                                           
											{{Form::label('specific_purpose', 'Specific Purpose', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('specific_purpose',$info->specific_purpose, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
               
					 <div class="form-group required">
	                                           
												{{Form::label('date', 'Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
														<?php $date=CommonFunction::date($info->date); ?>
															<div class="col-xs-2">
															{{Form::select('date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
														<?php $month=CommonFunction::month($info->date); ?>
															<div class="col-xs-3">
															{{Form::select('month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<?php $year=CommonFunction::year($info->date); ?>
															<div class="col-xs-2">
																{{Form::select('year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>	
					 <div class="form-group required">
	                                           
												{{Form::label('date', 'End Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
														<?php $date=CommonFunction::date($info->date); ?>
															<div class="col-xs-2">
															{{Form::select('end_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
														<?php $month=CommonFunction::month($info->date); ?>
															<div class="col-xs-3">
															{{Form::select('end_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<?php $year=CommonFunction::year($info->date); ?>
															<div class="col-xs-2">
																{{Form::select('end_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>	
						
					<div class="form-group ">
                                           
											{{Form::label('time', 'Time ( LT )', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('time',$info->time, array('class' => 'form-control','placeholder'=>'In GMT'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('location', 'Location', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('locationd',$info->location, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('team_members', 'Team Members', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $inspectors=CommonFunction::getInspectorListWithId();?>
											
											<select   id="team_members"  multiple name="team_members[]" class="demo-default" >
												
												@if($teamMember=CommonFunction::updateMultiSelection('sia_program', 'id',$info->id,'team_members'))

												@foreach($teamMember as $key=>$value)
												<option selected='selected' value="{{$value}}">{{$value}}</option>
												@endforeach
												@endif

												@foreach($inspectors as $inspector)
												<option  value="{{$inspector->name.'-'.$inspector->emp_id}}">{{$inspector->name.'-'.$inspector->emp_id}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
					
					
					<div class="form-group ">
                                           
											{{Form::label('remarks', 'Remark', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('remarks',$info->remarks, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					
					<div class="form-group">
                       
                            <button type="submit" name='saveAndContinue' value='' class="btn btn-primary btn-lg btn-block">Save</button>
                       
                    </div>
					</div>
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function(){
	//$('#org_name').selectize();
	$('#event').selectize();
	$('#organizations').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
	//multiple selection from options
var eventHandler = function(name) {
					return function() {
						console.log(name, arguments);
						$('#log').append('<div><span class="name">' + name + '</span></div>');
					};
				};
	var $select = $('#team_members').selectize({
					create          : true,
					onChange        : eventHandler('onChange'),
					onItemAdd       : eventHandler('onItemAdd'),
					onItemRemove    : eventHandler('onItemRemove'),
					onOptionAdd     : eventHandler('onOptionAdd'),
					onOptionRemove  : eventHandler('onOptionRemove'),
					onDropdownOpen  : eventHandler('onDropdownOpen'),
					onDropdownClose : eventHandler('onDropdownClose'),
					onFocus         : eventHandler('onFocus'),
					onBlur          : eventHandler('onBlur'),
					onInitialize    : eventHandler('onInitialize'),
				});	
	});


           
           
</script>
@endforeach
@stop
@endif






@if($PageName=='Single Program')	
@section('updateApprovalForm')
@foreach($approvalInfo as $info)	
<div class="modal fade" id="approvalForm{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Approval Info.</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'surveillance/updateApprovalForm', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
				   {{Form::hidden('id',$info->id)}}							
					<div class="form-group required">
                                        
											{{Form::label('approved_by', 'Approved By', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('approved_by', $info->approved_by , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('designation', 'Designation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::text('designation', $info->designation , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                           
											{{Form::label('approval_date', 'Approval Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														<?php $date=CommonFunction::date($info->approval_date); ?>
														{{Form::select('approval_date', $dates ,$date,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														<?php $month=CommonFunction::month($info->approval_date); ?>
														{{Form::select('approval_month', $months , $month ,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
														<?php $year=CommonFunction::year($info->approval_date); ?>
															{{Form::select('approval_year', $years ,$year ,array('class'=>'form-control','required'=>''))}}
														</div>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('approval_note', 'Note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('approval_note',$info->approval_note, array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
											</div>
											
                    </div>
					
                    <div class="form-group">
                      
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                    
					{{Form::close()}}
            </div>
        </div>
    </div>
	</div>
	</div>
	@endforeach
	<script>
$(document).ready(function(){

});
</script>
@stop
@endif


@if($PageName=='Single Program')	
@section('sms')
@foreach($sms as $info)	
<div class="modal fade" id="updateSms{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">SMS Information Update</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
					{{Form::open(array('url' => 'surveillance/updateSms', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>'true'))}}
					 {{Form::hidden('id',$info->id)}}		
					
                    

					<div class="form-group ">
	                                    
											{{Form::label('hazard_identification', 'Hazard Identification', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												{{Form::text('hazard_identification',$info->hazard_identification, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
	                </div>
                
	                <div class="form-group ">
	                                           
												{{Form::label('initial_risk','Asses Initial risk', array('class' => 'col-xs-4 control-label'))}}
												<div class="col-xs-6">
												{{Form::text('initial_risk',$info->initial_risk, array('class' => 'form-control','placeholder'=>''))}}
												</div>
												
	                    </div>
	           		
	                	<div class="form-group ">
	                                           
												{{Form::label('determine_severity','Determine Severity', array('class' => 'col-xs-4 control-label'))}}
												<div class="col-xs-6">

												<?php $options=CommonFunction::getOptions('SIA_Determine_Severity','Select Severity');?>
												{{Form::select('determine_severity', $options ,$info->determine_severity ,array('class'=>'form-control'))}}

												</div>
												
	                    </div>
               			 <div class="form-group ">
                                           
											{{Form::label('determine_likelyhood','Determine Likelihood', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_Likelihood','Select Likelihood');?>

											{{Form::select('determine_likelihood', $options ,$info->determine_likelihood ,array('class'=>'form-control'))}}

											</div>
											
                    	</div>

						<div class="form-group ">
                                       
										{{Form::label('determine_risk','Determine risk [risk matrix] ', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
										<?php $options=CommonFunction::getOptions('SIA_Risk_Matrix','Select Risk');?>

										{{Form::select('determine_risk', $options ,$info->determine_risk ,array('class'=>'form-control'))}}

										
										</div>
										
                		</div>
						<div class="form-group ">
                                    
										{{Form::label('violation_of_safety_standard', 'Violation Of Safety Standard', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
											{{Form::text('violation_of_safety_standard',$info->violation_of_safety_standard, array('class' => 'form-control','placeholder'=>''))}}
										</div>
										
		                </div>
						<div class="form-group ">
                                    
										{{Form::label('safety_risk_management', 'Safety Risk Management', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
											{{Form::text('safety_risk_management',$info->safety_risk_management, array('class' => 'form-control','placeholder'=>''))}}
										</div>
										
		                </div>
		                <div class="form-group ">
                                    
										{{Form::label('risk_statement ', 'Final Risk Statement', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
											{{Form::textarea('risk_statement',$info->risk_statement, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
										</div>
										
		                </div>
						<div class="form-group ">
                                    
										{{Form::label('safety_performance_indicator ', 'Safety performance indicator(SPI) ', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
											{{Form::text('safety_performance_indicator',$info->safety_performance_indicator, array('class' => 'form-control','placeholder'=>''))}}
										</div>
										
		                </div>
						
		                <div class="form-group ">
                                    
										{{Form::label('safety_performance_target ', 'Safety performance target (SPT)', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
											{{Form::text('safety_performance_target',$info->safety_performance_target, array('class' => 'form-control','placeholder'=>''))}}
										</div>
										
		                </div>
		                <div class="form-group ">
                                    
										{{Form::label('lack_of_effective_implementation', 'LEI(%)', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
											{{Form::text('lack_of_effective_implementation',$info->lack_of_effective_implementation, array('class' => 'form-control','placeholder'=>''))}}
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
	</div>
	@endforeach
	
@stop
@endif


@if($PageName=='Single Program')	
@section('updateAction')
@foreach($actionDetails as $info)	
<div class="modal fade" id="updateAction{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Executed Program</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
					{{Form::open(array('url' => 'surveillance/updateAction', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}
					 {{Form::hidden('id',$info->id)}}		
					
                    

                    <div class="form-group question ">
                                        
						{{Form::label('objective', 'Objective ', array('class' => 'col-xs-4 control-label',"title"=>"Objective Defecation"))}}

											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_objective');?>
											
											{{ Form::select('objective',$options,$info->objective, ['class' => 'demo-default','id'=>'objective','placeholder'=>'Select objective']) }}

											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('iats_code','ISWC', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_IATS_Code');?>
											<select id="iats_code" name='iats_code' class="demo-default" placeholder="Select ISWC...">
												<option value="{{$info->iats_code}}">{{$info->iats_code}}</option>
												@foreach($options as $option)
												<option value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
                    
                     <div class="form-group ">
	                                           
												{{Form::label('date', 'Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															<?php $date=CommonFunction::date($info->date) ;?>
															{{Form::select('date', $dates,date('d'),array('class'=>'form-control',''=>''))}}
															</div>
															<div class="col-xs-2">
															<?php $month=CommonFunction::month($info->date) ;?>
															{{Form::select('month',$months,$month,array('class'=>'form-control',''=>''))}}
												
																
															</div>
															<div class="col-xs-2">
															<?php $year=CommonFunction::year($info->date) ;?>
																{{Form::select('year',$years,$year,array('class'=>'form-control',''=>''))}}
															</div>
														</div>
												
	                    </div>	
						
					<div class="form-group ">
                                           
											{{Form::label('time', 'Time ( LT )', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('time',$info->time, array('class' => 'form-control','placeholder'=>'Local TIme',''=>''))}}
											</div>
											
                    </div>

                    <div class="form-group ">
                                        
											{{Form::label('flight_number', 'Flight Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=SurveillanceCommon::flightNumber();?>

											{{ Form::select('flight_number',$options,$info->flight_number, ['class' => 'demo-default','id'=>'flight_number','placeholder'=>'i.e AA 123']) }}	
											
											</div>
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('departure_airfield ', 'Departure Airfield', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												{{Form::text('departure_airfield',$info->departure_airfield, array('class' => 'form-control','placeholder'=>'Use ICAO Code i.e VGHS'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('arrival_airfield ', 'Arrival Airfield', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												{{Form::text('arrival_airfield',$info->arrival_airfield, array('class' => 'form-control','placeholder'=>'Use ICAO Code i.e VGHS'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('aircraft_mms', 'Aircraft MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												<?php $options=CommonFunction::listsOfColumn('aircraft_primary_info','serial_number');?>
												{{ Form::select('aircraft_mms',$options,$info->aircraft_mms , ['class' => 'demo-default','id'=>'aircraft_mms_e','placeholder'=>'Select Or Add Aircraft MMS']) }}	
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('aircraft_registration_no', 'Aircraft Registration
No.', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												<?php $options=CommonFunction::listsOfColumn('sia_action','aircraft_registration_no');?>
											{{ Form::select('aircraft_registration_no',$options, $info->aircraft_registration_no, ['class' => 'demo-default','id'=>'aircraft_registration_no_e','placeholder'=>'Select Or Add Aircraft Registration No']) }}

											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('pic', 'PIC', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
											<?php $options=SurveillanceCommon::pilotInCommand();?>
											{{ Form::select('pic',$options, $info->pic, ['class' => 'demo-default','id'=>'pic','placeholder'=>'Select Or Add PIC']) }}
																						
											</div>
											
                    </div>

                     <div class="form-group ">
                                        
											{{Form::label('pel_num', 'PEL Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $pels=array();//CommonFunction::pelList(); ?>
											<select id="pel_num"  multiple name="pel_numbers[]" class="demo-default" >												
												<option value="">Select Team Lead First...</option>
												@if($teamMember=CommonFunction::updateMultiSelection('sia_action', 'id',$info->id,'pel_numbers'))
												@foreach($teamMember as $key=>$value)
												<option selected='selected' value="{{$value}}">{{$value}}</option>
												@endforeach
												@endif
												@foreach($pels as $pel)
												<option value="{{$pel->name.'-'.$pel->emp_id}}">{{$pel->name.'-'.$pel->emp_id}}</option>
												@endforeach
											
											</select>
											</div>
											
                    </div>

                    <div class="form-group ">
                                        
											{{Form::label('other_personal_inspected', 'Other personal Involved', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												{{Form::textarea('other_personal_inspected',$info->other_personal_inspected, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>

                    <div class="form-group ">
                                        
											{{Form::label('critical_element ', 'SIA by Critical Elements ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_Critical_Element');?>
											
											<select id="critical_element_sia"  multiple name="critical_element[]" class="demo-default" >
												@if($areas=CommonFunction::updateMultiSelection('sia_action', 'id',$info->id,'critical_element'))
												<option value="">Select Critical Elements...</option>
												@foreach($areas as $key=>$value)
												<option selected='selected' value="{{$value}}">{{$value}}</option>
												@endforeach
												@endif
												@foreach($options as $option)
												<option  value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
																						
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('sia_by_area ', 'SIA by Critical Area ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												<?php $options=CommonFunction::getOptions('SIA_By_Area');?>

											<select id="sia_by_area"  multiple name="sia_by_area[]" class="demo-default" >
											@if($areas=CommonFunction::updateMultiSelection('sia_action', 'id',$info->id,'sia_by_area'))
												<option value="">Select Critical Area...</option>
												@foreach($areas as $key=>$value)
												<option selected='selected' value="{{$value}}">{{$value}}</option>
												@endforeach
												@endif
												@foreach($options as $option)
												<option  value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
																						
											</div>
											
                    </div>
                    <div class="form-group ">
	                                           
												{{Form::label('has_finding', 'Has Finding?', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
											
			<div class="radio">									 
			 <label> {{ Form::radio('has_finding', 'Yes',Input::old('has_finding', $info->has_finding == 'Yes'),array()) }} &nbsp  Yes</label>
			 <label> {{ Form::radio('has_finding', 'No',Input::old('has_finding', $info->has_finding == 'No'),array()) }} &nbsp  No</label>
			</div>
										
									</div>
	                </div>
                    
                    <div class="form-group ">
                                        
											{{Form::label('result ', 'Result', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
												{{Form::select('result', array(''=>'--select--','Satisfactory'=>'Satisfactory','Unsatisfactory'=>'Unsatisfactory','Enforcement'=>'Enforcement','Follow Up'=>'Follow Up'),$info->result,array('class'=>'form-control'))}}

											</div>
											
                    </div>

				<div class="form-group ">
	                                           
												{{Form::label('has_edp', 'Has EDP?', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
										
			<div class="radio">									 
			 <label> {{ Form::radio('has_edp', 'Yes',Input::old('has_edp', $info->has_edp == 'Yes'),array()) }} &nbsp  Yes</label>
			 <label> {{ Form::radio('has_edp', 'No',Input::old('has_edp', $info->has_edp == 'No'),array()) }} &nbsp  No</label>
			</div>
										
									</div>
	            </div>
	        <div class="form-group ">
	                                           
												{{Form::label('has_saf_cons', 'Has Safety Concern?', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
            <div class="radio">									 
			 <label> {{ Form::radio('has_safety_concern', 'Yes',Input::old('has_safety_concern', $info->has_safety_concern == 'Yes'),array()) }} &nbsp  Yes</label>
			 <label> {{ Form::radio('has_safety_concern', 'No',Input::old('has_safety_concern', $info->has_safety_concern == 'No'),array()) }} &nbsp  No</label>
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
	</div>
	@endforeach
	<script>

$(document).ready(function(){
$('#lead_inspector').selectize();

$('#organizations_').selectize();
$('#iats_code').selectize();
//$('#sia_number').selectize();
$('#sia_number').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#critical_element').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#sia_by_area').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#aircraft_mms_e').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#aircraft_registration_no_e').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#task').selectize();
//$('#event_s').selectize();
//$('#initial_risk').selectize();

//$('#training').selectize();
$('#msn').selectize();

 $('[data-toggle="popover"]').popover();



//multiple selection from options
var eventHandler = function(name) {
					return function() {
						console.log(name, arguments);
						$('#log').append('<div><span class="name">' + name + '</span></div>');
					};
				};
var $select = $('#team_members_').selectize({
					create          : true,
					onChange        : eventHandler('onChange'),
					onItemAdd       : eventHandler('onItemAdd'),
					onItemRemove    : eventHandler('onItemRemove'),
					onOptionAdd     : eventHandler('onOptionAdd'),
					onOptionRemove  : eventHandler('onOptionRemove'),
					onDropdownOpen  : eventHandler('onDropdownOpen'),
					onDropdownClose : eventHandler('onDropdownClose'),
					onFocus         : eventHandler('onFocus'),
					onBlur          : eventHandler('onBlur'),
					onInitialize    : eventHandler('onInitialize'),
				});
var $select = $('#pel_num').selectize({
					create          : true,
					onChange        : eventHandler('onChange'),
					onItemAdd       : eventHandler('onItemAdd'),
					onItemRemove    : eventHandler('onItemRemove'),
					onOptionAdd     : eventHandler('onOptionAdd'),
					onOptionRemove  : eventHandler('onOptionRemove'),
					onDropdownOpen  : eventHandler('onDropdownOpen'),
					onDropdownClose : eventHandler('onDropdownClose'),
					onFocus         : eventHandler('onFocus'),
					onBlur          : eventHandler('onBlur'),
					onInitialize    : eventHandler('onInitialize'),
				});




var $select = $('#notify_other').selectize({
					create          : true,
					onChange        : eventHandler('onChange'),
					onItemAdd       : eventHandler('onItemAdd'),
					onItemRemove    : eventHandler('onItemRemove'),
					onOptionAdd     : eventHandler('onOptionAdd'),
					onOptionRemove  : eventHandler('onOptionRemove'),
					onDropdownOpen  : eventHandler('onDropdownOpen'),
					onDropdownClose : eventHandler('onDropdownClose'),
					onFocus         : eventHandler('onFocus'),
					onBlur          : eventHandler('onBlur'),
					onInitialize    : eventHandler('onInitialize'),
				});
var $select = $('#locations').selectize({
					create          : true,
					onChange        : eventHandler('onChange'),
					onItemAdd       : eventHandler('onItemAdd'),
					onItemRemove    : eventHandler('onItemRemove'),
					onOptionAdd     : eventHandler('onOptionAdd'),
					onOptionRemove  : eventHandler('onOptionRemove'),
					onDropdownOpen  : eventHandler('onDropdownOpen'),
					onDropdownClose : eventHandler('onDropdownClose'),
					onFocus         : eventHandler('onFocus'),
					onBlur          : eventHandler('onBlur'),
					onInitialize    : eventHandler('onInitialize'),
				});


	
});
	</script>
@stop
@endif


@if($PageName=='SIA Corrective Action')	
@section('updateCorrectiveIssue')
@foreach($correctiveActions as $action)
<div class="modal fade" id="updateCorrectiveIssue{{$action->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Corrective Action</h4>
            </div>

            <div class="modal-body">
                
               
				{{Form::open(array('url' => 'surveillance/updateCorrectiveAction', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}
					
						
								{{Form::hidden('id',$action->id)}}					
								{{Form::hidden('old_corrective_action_file',$action->corrective_action_file)}}					
						
					
						
					
					<div class="form-group required">
                                        
											{{Form::label('currective_action', 'Corrective Action Plan', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('currective_action',$action->currective_action, array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group">
                                           
											{{Form::label('revived_date', 'CAP Initiated On', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
											<?php $date=CommonFunction::date($action->revived_date); ?>
														<div class="col-xs-2">
														{{Form::select('revived_date', $dates,$date,array('class'=>'form-control',''=>''))}}
														</div>
											<?php $month=CommonFunction::month($action->revived_date); ?>
														<div class="col-xs-3">
														{{Form::select('revived_month',$months,$month,array('class'=>'form-control',''=>''))}}
											
															
														</div>
											<?php $year=CommonFunction::year($action->revived_date); ?>
														<div class="col-xs-2">
															{{Form::select('revived_year',$years,$year,array('class'=>'form-control',''=>''))}}
														</div>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('concern_authority_officer', 'Concern Authority Officer', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('concern_authority_officer',$action->concern_authority_officer, array('class' => 'form-control','placeholder'=>'',''=>''))}}
											</div>
											
                    </div>
					<div class="form-group  ">
                                        
											{{Form::label('regulation_mitigation', 'Regulation Mitigation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('regulation_mitigation',$action->regulation_mitigation, array('class' => 'form-control','placeholder'=>'','size'=>'4x1',''=>''))}}
											</div>
											
                    </div>
					
					
					<div class="form-group ">
                                           
											{{Form::label('regulation_mitigation_date', 'Regulation Mitigation Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
											<?php $date=CommonFunction::date($action->regulation_mitigation_date); ?>
														<div class="col-xs-2">
														{{Form::select('regulation_mitigation_date', $dates,$date,array('class'=>'form-control',''=>''))}}
														</div>
										    <?php $month=CommonFunction::month($action->regulation_mitigation_date); ?>
														<div class="col-xs-3">
														{{Form::select('regulation_mitigation_month',$months,$month,array('class'=>'form-control',''=>''))}}
											
															
														</div>
											 <?php $year=CommonFunction::year($action->regulation_mitigation_date); ?>
														<div class="col-xs-2">
															{{Form::select('regulation_mitigation_year',$years,$year,array('class'=>'form-control',''=>''))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
                                            
											 {{ Form::label('corrective_action_file', 'Uploaded Corrective Action File: ',array('class'=>'control-label col-xs-4')) }}
											 <div class="col-xs-6">
											 @if($action->corrective_action_file!='Null'){{HTML::link('files/sia_corrective_action_file/'.$action->corrective_action_file,'Document',array('target'=>'_blank'))}}
												@else
													{{HTML::link('#','No Document Provided')}}
												@endif
											
											 
											 
											 </div>
                    </div>
					<div class="form-group ">
                                           
                                            
											 {{ Form::label('corrective_action_file', 'Upload Updated Corrective Action File: ',array('class'=>'control-label col-xs-4')) }}
											 <div class="col-xs-6">
											  {{ Form::file('corrective_action_file',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
											 </div>
                    </div>
					
                    <div class="form-group">
                      
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                    
					{{Form::close()}}
					</div>
        </div>
    </div>
	</div>
	</div>
	<script>
	$(document).ready(function(){
$('#').selectize();
	
});
	</script>
@endforeach	
@stop
@endif

@if($PageName=='SIA Corrective Action')	
@section('updateFindings')
@foreach($findings as $info)
<div class="modal fade" id="updateFindings{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Finding</h4>
            </div>

            <div class="modal-body">          

               {{Form::open(array('url'=>'surveillance/updateFinding','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
				  
				
			    {{Form::hidden('id',$info->id)}}      
			    {{Form::hidden('upload_file_old',$info->upload_file)}}      
				
                    <div class="form-group required">
                                        
											{{Form::label('sia_number ', 'SIA/ Tracking Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::siaActionListedSiaNumber();?>
										{{Form::select('sia_number', $options, $info->sia_number ,array('class'=>'form-control','required'=>''))}}
											</div>
											
                    </div>
                     <div class="form-group required">
                                           
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',$info->title, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group required">
                                           
											{{Form::label('finding', 'Finding', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('finding',$info->finding, array('required'=>'','class' => 'form-control','placeholder'=>'',''=>'','size'=>'4x1'))}}
											
											
											</div>
											
                    </div>
                    
					 <div class="form-group required">
	                                           
												{{Form::label('date', 'Target Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															<?php $date=CommonFunction::date($info->target_date);?>
															{{Form::select('date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															<?php $month=CommonFunction::month($info->target_date);?>
															{{Form::select('month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
															<?php $year=CommonFunction::year($info->target_date);?>
																{{Form::select('year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>	
					
					
					
					<div class="form-group ">
                                           
											{{Form::label('corrective_action_plan', 'Correction Action Recommendation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('corrective_action_plan',$info->corrective_action_plan, array('class' => 'form-control','placeholder'=>'',''=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('upload_file', 'Upload Updated File', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('upload_file',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
											
                    </div>
                   
					
					<div class="form-group">
                       
                            <button type="submit" name='' value='' class="btn btn-primary btn-lg btn-block">Save</button>
                       
                    </div>
					</div>
					{{Form::close()}}
					</div>
            </div>
    </div>
	</div>
	</div>
	<script>

$(document).ready(function(){

$('#sia_number_u').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
	</script>
@endforeach	
@stop
@endif