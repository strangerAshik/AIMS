@if($PageName=='New Program')
@section('newProgram')
<div class="modal fade" id="newProgram" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Program</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'surveillance/saveProgram','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  
					{{Form::hidden('sia_number','SIA'.'_'.time())}}
					<div class="form-group required">
                                           
											{{Form::label('sia_number', 'SIA / Tracking Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('sia_number','SIA'.'_'.time(), array('class' => 'form-control','placeholder'=>'','required'=>'','disabled'=>''))}}
											</div>
											
                    </div>
                     
                    <div class="form-group required">
                                           
											{{Form::label('org_name', 'Organization Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('organization_all');?>
											<select required id="organizations" name='org_name' class="demo-default" placeholder="Select  Org...">
												<option value="">Select  Org...</option>
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
												<option value="">Select Event Type...</option>
												@foreach($options as $option)
												<option value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('specific_purpose', 'Specific Purpose', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('specific_purpose','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
               
					 <div class="form-group required">
	                                           
												{{Form::label('date', 'Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>	
						
					<div class="form-group ">
                                           
											{{Form::label('time', 'Time ( LT )', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('time','', array('class' => 'form-control','placeholder'=>'Local Time'))}}
											</div>
											
                    </div>
                    
                    <div class="form-group ">
                                        
											{{Form::label('team_members', 'Team Members', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											<select   id="team_members"  multiple name="team_members[]" class="demo-default" >
												<option value="">Select Team Lead First...</option>
												@foreach($inspectors as $inspector)
												<option  value="{{$inspector->name.'-'.$inspector->emp_id}}">{{$inspector->name.'-'.$inspector->emp_id}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
					
					
					<div class="form-group ">
                                           
											{{Form::label('remark', 'Remark', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('remarks','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
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
@stop
@endif

@if($PageName=='New Action Entry')
@section('primaryInfo')
<div class="modal fade" id="primaryInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Execute Programe</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url' => 'surveillance/saveAction', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}
					
					<div class="form-group required">
                                        
											{{Form::label('program_type', 'SIA Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												{{ Form::select('program_type', array(''=>'--select--','Planned'=>'Planned','Not Planned'=>'Not Planned'),null, ['class' => 'demo-default','id'=>'program_type','placeholder'=>'Select Program Type','required'=>'']) }}

											

											</div>
											
                    </div>
              
					
                    <div class="form-group required">
                                        
											{{Form::label('sia_number ', 'SIA/ Tracking Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::listOfProgarm();?>
											<select required='' id="sia_number"  name='sia_number' class="demo-default" placeholder="Select SIA/ Tracking Number">
												<option value="">Select SIA/ Tracking Number</option>
												@foreach($options as $option)
												<option value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
                     <div class="form-group ">
                                        
											{{Form::label('team_members', 'Team Members', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											<select id="team_members"  multiple name="team_members[]" class="demo-default" >
												<option value="">Select Team Lead First...</option>
												@foreach($inspectors as $inspector)
												<option  value="{{$inspector->name.'-'.$inspector->emp_id}}">{{$inspector->name.'-'.$inspector->emp_id}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('event','Type of SIA (Event)', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_Event');?>
											{{ Form::select('event',$options,null, ['class' => 'demo-default','id'=>'event','placeholder'=>'Select Event Type']) }}
											</div>
											
                    </div>
                    

                    <div class="form-group  ">
                                        
						{{Form::label('objective', 'Objective ', array('class' => 'col-xs-4 control-label',"title"=>"Objective Defecation"))}}

											
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_objective');?>
											
											{{ Form::select('objective',$options,null, ['class' => 'demo-default','id'=>'objective','placeholder'=>'Select objective']) }}

											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('iats_code','ISWC', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_IATS_Code');?>
											{{ Form::select('iats_code',$options,null, ['class' => 'demo-default','id'=>'iats_code','placeholder'=>'Select ISWC..']) }}
											
											</div>
											
                    </div>

                    <div class="form-group ">
                                           
											{{Form::label('org_name', 'Organization Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php  $options=CommonFunction::getOptions('organization_all');//$options=CommonFunction::organizations();?>
											{{ Form::select('organization',$options,null, ['class' => 'demo-default','id'=>'organizations','placeholder'=>'Select Or Add Organization']) }}
											</div>
											
                    </div>
                     <div class="form-group ">
                                        
											{{Form::label('location', 'Location', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=SurveillanceCommon::location();?>
											{{ Form::select('location',$options,null, ['class' => 'demo-default','id'=>'location','placeholder'=>'Select Or Add Location']) }}
										    </div>
											
                    </div>
                     <div class="form-group ">
	                                           
												{{Form::label('date', 'Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date', $dates,date('d'),array('class'=>'form-control',''=>''))}}
															</div>
															<div class="col-xs-2">
															{{Form::select('month',$months,date('F'),array('class'=>'form-control',''=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year',$years,date('Y'),array('class'=>'form-control',''=>''))}}
															</div>
														</div>
												
	                    </div>	
						
					<div class="form-group ">
                                           
											{{Form::label('time', 'Time ( LT )', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=SurveillanceCommon::time();?>
											{{ Form::select('time',$options,null, ['class' => 'demo-default','id'=>'time','placeholder'=>'Local Time']) }}
											</div>
											
                    </div>

                    <div class="form-group ">
                                        
											{{Form::label('flight_number', 'Flight Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=SurveillanceCommon::flightNumber();?>

											{{ Form::select('flight_number',$options,null, ['class' => 'demo-default','id'=>'flight_number','placeholder'=>'Select Or Add Flight Number']) }}	
											
											</div>
											
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('departure_airfield ', 'Departure Airfield', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=SurveillanceCommon::departureAirfield();?>
											{{ Form::select('departure_airfield',$options,null, ['class' => 'demo-default','id'=>'departure_airfield','placeholder'=>'Select Or Add Departure Airfield']) }}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('arrival_airfield ', 'Arrival Airfield', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=SurveillanceCommon::arrivalAirfield();?>
											{{ Form::select('arrival_airfield',$options,null, ['class' => 'demo-default','id'=>'arrival_airfield','placeholder'=>'Select Or Add Arrival Airfield']) }}	
																						
											</div>
											
                    </div>
					
					<div class="form-group ">
                                        
											{{Form::label('aircraft_mms', 'Aircraft MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												<?php $options=CommonFunction::listsOfColumn('sia_action','aircraft_mms');?>
												{{ Form::select('aircraft_mms',$options,null, ['class' => 'demo-default','id'=>'aircraft_mms','placeholder'=>'Select Or Add Aircraft MMS']) }}	
																						
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('aircraft_registration_no', 'Aircraft Registration
No.', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">
											<?php $options=CommonFunction::listsOfColumn('sia_action','aircraft_registration_no');?>
											{{ Form::select('aircraft_registration_no',$options, 'null', ['class' => 'demo-default','id'=>'aircraft_registration_no','placeholder'=>'Select Or Add Aircraft Registration No']) }}

											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('pic', 'PIC', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=SurveillanceCommon::pilotInCommand();?>
											{{ Form::select('pic',$options, null, ['class' => 'demo-default','id'=>'pic','placeholder'=>'Select Or Add PIC']) }}
																						
											</div>
											
                    </div>

                     <div class="form-group ">
                                        
											{{Form::label('pel_num', 'PEL Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $pels=array();//CommonFunction::pelList(); ?>
											<select id="pel_num"  multiple name="pel_numbers[]" class="demo-default" >
												<option value="">Select Team Lead First...</option>
												@foreach($pels as $pel)
												<option  value="{{$pel->name.'-'.$pel->emp_id}}">{{$pel->name.'-'.$pel->emp_id}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>

                    <div class="form-group ">
                                        
											{{Form::label('other_personal_inspected', 'Any Other personal
Inspected ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												{{Form::textarea('other_personal_inspected','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
                  <div class="form-group ">
                                        
											{{Form::label('critical_element ', 'SIA by Critical Elements ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_Critical_Element');?>
											
											{{ Form::select('critical_element',$options,null, ['class' => 'demo-default','id'=>'critical_element_e','placeholder'=>'Select Or Add CE']) }}	
																						
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('sia_by_area ', 'SIA by Critical Area ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_By_Area');?>
											
											

											<select id="sia_by_area_e"  multiple name="sia_by_area[]" class="demo-default" >
												<option value="">Select Critical Area</option>
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
										 
										  <label> <label> {{ Form::radio('has_finding', 'Yes') }} &nbsp  Yes</label>
										 <label> {{ Form::radio('has_finding', 'No',true) }} &nbsp  No</label>
										</div>
										
									</div>
	                </div>
	                <div class="form-group ">
                                        
											{{Form::label('result ', 'Result', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
												{{Form::select('result', array(''=>'--select--','Satisfactory'=>'Satisfactory','Unsatisfactory'=>'Unsatisfactory','Enforcement'=>'Enforcement','Follow Up'=>'Follow Up'),'',array('class'=>'form-control'))}}

											</div>
											
                    </div>
                     <div class="form-group ">
	                                           
												{{Form::label('has_edp', 'Has EDP?', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
										<div class="radio">
										  <label> <label> {{ Form::radio('has_edp', 'Yes') }} &nbsp  Yes</label>
										  <label> {{ Form::radio('has_edp', 'No',true) }} &nbsp  No</label>
										</div>										
									</div>
	                </div>
	                <div class="form-group ">
	                                           
												{{Form::label('has_saf_cons', 'Has Safety Concern?', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
										<div class="radio">										 
										  <label> {{ Form::radio('has_safety_concern', 'Yes') }} &nbsp  Yes</label>
										  <label> {{ Form::radio('has_safety_concern', 'No',true) }} &nbsp  No</label>
										</div>
										
									</div>
	                </div>
                    <div class="form-group " style="background: #D0F4B3">
                    <div class="form-group ">
                                        
											{{Form::label('', '', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												{{Form::label('', 'SMS Area', array('class' => 'col-xs-4 control-label'))}}
											</div>
											
                    </div>                  
                    

				<div class="form-group ">
                                    
										{{Form::label('hazard_identification', 'Hazard Identification', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
											{{Form::text('hazard_identification','', array('class' => 'form-control','placeholder'=>''))}}
										</div>
										
                </div>
                
                <div class="form-group ">
                                           
											{{Form::label('initial_risk','Asses Initial risk', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('initial_risk','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
           		
                <div class="form-group ">
                                           
											{{Form::label('determine_severity','Determine Severity', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_Determine_Severity');?>
											<select id="determine_severity" name='determine_severity' class="demo-default" placeholder="Select ...">
												<option value="">Select ...</option>
												@foreach($options as $option)
												<option value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
                <div class="form-group ">
                                           
											{{Form::label('determine_likelyhood','Determine Likelihood', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_Likelihood');?>
											<select id="determine_likelyhood" name='determine_likelihood' class="demo-default" placeholder="Select ...">
												<option value="">Select ...</option>
												@foreach($options as $option)
												<option value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>

				<div class="form-group ">
                                       
										{{Form::label('determine_risk','Determine risk [risk matrix] ', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
										<?php $options=CommonFunction::getOptions('SIA_Risk_Matrix');?>
										<select id="determination_risk" name='determine_risk' class="demo-default" placeholder="Select ...">
											<option value="">Select ...</option>
											@foreach($options as $option)
											<option value="{{$option}}">{{$option}}</option>
											@endforeach
										</select>
										</div>
										
                </div>
				<div class="form-group ">
                                    
										{{Form::label('violation_of_safety_standard', 'Violation Of Safety Standard', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
											{{Form::text('violation_of_safety_standard','', array('class' => 'form-control','placeholder'=>''))}}
										</div>
										
                </div>
				<div class="form-group ">
                                    
										{{Form::label('safety_risk_management', 'Safety Risk Management', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
											{{Form::text('safety_risk_management','', array('class' => 'form-control','placeholder'=>''))}}
										</div>
										
                </div>
                <div class="form-group ">
                                    
										{{Form::label('risk_statement ', 'Final Risk Statement', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
											{{Form::textarea('risk_statement','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
										</div>
										
                </div>

			
                <div class="form-group ">
                                    
										{{Form::label('safety_performance_indicator ', 'Safety performance indicator(SPI) ', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
											{{Form::text('safety_performance_indicator','', array('class' => 'form-control','placeholder'=>''))}}
										</div>
										
                </div>
				
                <div class="form-group ">
                                    
										{{Form::label('safety_performance_target ', 'Safety performance target (SPT)', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
											{{Form::text('safety_performance_target','', array('class' => 'form-control','placeholder'=>''))}}
										</div>
										
                </div>

				<div class="form-group ">
                                    
										{{Form::label('lack_of_effective_implementation', 'LEI(%)', array('class' => 'col-xs-4 control-label'))}}
										<div class="col-xs-6">
											{{Form::text('lack_of_effective_implementation','', array('class' => 'form-control','placeholder'=>''))}}
										</div>
										
                </div>
				
	                               
  					</div><!-- Green SMS end -->	
					
					<div class="form-group">
                       
                            <button type="submit"  value='' class="btn btn-primary btn-lg btn-block">Save</button>
                       
                    </div>
					</div>

					{{Form::close()}}
            </div>
        </div>
    </div>
</div>

<script>
	
	$(document).ready(function(){

$('#program_type').selectize();
$('#lead_inspector').selectize();
//$('#location').selectize();
$('#organizations').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#iats_code').selectize();
//$('#sia_number').selectize();
$('#sia_number').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#objective').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#departure_airfield').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#arrival_airfield').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#aircraft_mms').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#aircraft_registration_no').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#location').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#pic').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#flight_number').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#time').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#critical_element_e').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
//$('#sia_by_area_e').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#task').selectize();
$('#event').selectize();
//$('#initial_risk').selectize();
$('#determination_risk').selectize();
$('#determine_severity').selectize();
$('#determine_likelyhood').selectize();
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

var $select = $('#sia_by_area_e').selectize({
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

@if($PageName=='New Action Entry')
@section('newActionEntry')
<div class="modal fade" id="newActionEntry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Action Entry</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'organization/saveOrgPrimary','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  
				{{Form::hidden('sia_number','SIA'.'_'.date('d').'_'.date('m').'_'.date('Y').'_'.time())}}
					<div class="form-group required">
                                           
											{{Form::label('sia_number', 'SIA / Tracking Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('sia_number','SIA'.'_'.date('d').'_'.date('m').'_'.date('Y').'_'.time(), array('class' => 'form-control','placeholder'=>'','required'=>'','disabled'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('org_name', 'Organization Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select id="organizations" name='org_name' class="demo-default" placeholder="Select  Org...">
												<option value="">Select  Org...</option>
												@foreach($organizations as $organization)
												<option value="{{$organization}}">{{$organization}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('event','Event', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('org29_primaryOrg_type');?>
											<select id="event" name='event' class="demo-default" placeholder="Select Event Type...">
												<option value="">Select Event Type...</option>
												@foreach($options as $option)
												<option value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
                   
					 <div class="form-group required">
	                                           
												{{Form::label('date', 'Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>	
						
					<div class="form-group ">
                                           
											{{Form::label('time', 'Time ( In GMT )', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('time','', array('class' => 'form-control','placeholder'=>'In GMT',''=>''))}}
											</div>
											
                    </div>
                    
                    <div class="form-group ">
                                        
											{{Form::label('team_members', 'Team Members', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											<select id="team_members"  multiple name="team_members[]" class="demo-default" >
												<option value="">Select Team Lead First...</option>
												@foreach($inspectors as $inspector)
												<option  value="{{$inspector->name.'-'.$inspector->emp_id}}">{{$inspector->name.'-'.$inspector->emp_id}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
					
					
					<div class="form-group ">
                                           
											{{Form::label('remark', 'Remark', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('remark','', array('class' => 'form-control','placeholder'=>'',''=>'','size'=>'4x1'))}}
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
@stop
@endif

@if($PageName=='New Action Entry')
@section('finding')
<div class="modal fade" id="finding" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Finding</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'surveillance/saveFinding','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
				  
				{{Form::hidden('finding_number','FN'.'_'.time())}}
			
					<div class="form-group required">
	                                       
											{{Form::label('finding_number', 'Finding  Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('finding_number_NR','FN'.'_'.time(), array('class' => 'form-control','placeholder'=>'','required'=>'','disabled'=>''))}}
											</div>
											
	                </div>
                
                    <div class="form-group required">
                                        
											{{Form::label('sia_number ', 'SIA/ Tracking Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::siaActionListedSiaNumber();?>
											{{ Form::select('sia_number',$options,null, ['class' => 'demo-default','id'=>'sc_sia_number_finding','placeholder'=>'Select SIA/ Tracking Number','required'=>'']) }}
											</div>
											
                    </div>
                    <div class="form-group required">
                                           
											{{Form::label('finding', 'Finding', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('finding','', array('required'=>'','class' => 'form-control','placeholder'=>'',''=>'','size'=>'4x1'))}}
											
											
											</div>
											
                    </div>
                    
					 <div class="form-group required">
	                                           
												{{Form::label('date', 'Target Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>	
					
					
					
					<div class="form-group ">
                                           
											{{Form::label('corrective_action_plan', 'Corrective Action Plan', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('corrective_action_plan','', array('class' => 'form-control','placeholder'=>'',''=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('upload_file', 'Upload File', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('upload_file')}}
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


<script>
	$(document).ready(function(){
	//$('#org_name').selectize();
	$('#sc_sia_number_finding').selectize();
	$('#findings').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
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
@stop
@endif

@if($PageName=='New Action Entry')
@section('checkList')
<div class="modal fade" id="checkList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Get Checklist</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'surveillance/getChecklist','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  
				{{Form::hidden('sia_number','SIA'.'_'.date('d').'_'.date('m').'_'.date('Y').'_'.time())}}
					
            
                    <div class="form-group ">
                                           
											{{Form::label('check_list_name', 'Check List Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select id="check_list_name" name='checklist_name' class="demo-default" placeholder="">
											<?php $options=CommonFunction::getChecklistName();?>
												<option value="">Select Checklist Name..</option>
												@foreach($options as $option)
												<option value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('check_list_type', 'Check List Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select id="check_list_type" name='checklist_type' class="demo-default" placeholder="">
											<?php $options=CommonFunction::getChecklistType();?>
												<option value="">Select Check List Type..</option>
												@foreach($options as $option)
												<option value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
					
					<div class="form-group">
                       
                            <button type="submit" name='' value='' class="btn btn-primary btn-lg btn-block">Get Check List</button>
                       
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
	$('#check_list_name').selectize();
	$('#check_list_type').selectize();
	//$('#findings').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
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
@stop
@endif

@if($PageName=='SIA Corrective Action')	
@section('correctiveIssue')
@foreach($findings as $info)								
<div class="modal fade" id="correctiveIssue{{$info->finding_number}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Corrective Action</h4>
            </div>

            <div class="modal-body">
                
               
				{{Form::open(array('url' => 'surveillance/saveCorrectiveAction', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}
					
						
								{{Form::hidden('sia_number',$sia_number)}}					
								{{Form::hidden('finding_number',$info->finding_number)}}					
						
					
						
					
					<div class="form-group required ">
                                        
											{{Form::label('currective_action', 'Corrective Action', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('currective_action','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('revived_date', 'Revived Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('revived_date', $dates,'0',array('class'=>'form-control',''=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('revived_month',$months,'0',array('class'=>'form-control',''=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('revived_year',$years,'0',array('class'=>'form-control',''=>''))}}
														</div>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('concern_authority_officer', 'Concern Authority Officer', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('concern_authority_officer','', array('class' => 'form-control','placeholder'=>'',''=>''))}}
											</div>
											
                    </div>
					<div class="form-group  ">
                                        
											{{Form::label('regulation_mitigation', 'Regulation Mitigation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('regulation_mitigation','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1',''=>''))}}
											</div>
											
                    </div>
					
					
					<div class="form-group ">
                                           
											{{Form::label('regulation_mitigation_date', 'Regulation Mitigation Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('regulation_mitigation_date', $dates,'0',array('class'=>'form-control',''=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('regulation_mitigation_month',$months,'0',array('class'=>'form-control',''=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('regulation_mitigation_year',$years,'0',array('class'=>'form-control',''=>''))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
                                            
											 {{ Form::label('corrective_action_file', 'Upload Corrective Action File: ',array('class'=>'control-label col-xs-4')) }}
											 <div class="col-xs-6">
											 {{ Form::file('corrective_action_file') }}
											 
											 
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

@if($PageName=='Single Program')	
@section('approvalForm')
<div class="modal fade" id="approvalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Approval Form</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'surveillance/saveApprovalForm', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
				  
						
							{{Form::hidden('sia_number',$sia_number)}}							
						
				
					
					
					
					<div class="form-group required">
                                        
											{{Form::label('approved_by', 'Approved By', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('approved_by', Auth::User()->getName() , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('designation', 'Designation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::text('designation', Auth::User()->Role() , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                           
											{{Form::label('approval_date', 'Approval Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('approval_date', $dates , date('d') ,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('approval_month', $months , date('F') ,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('approval_year', $years , date('Y') ,array('class'=>'form-control','required'=>''))}}
														</div>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('approval_note', 'Note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('approval_note','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
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

});
</script>
@stop
@endif