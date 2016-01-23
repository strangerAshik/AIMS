@if($PageName=='New Inspection')	
@section('primaryInspection')
<div class="modal fade" id="inspectionInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Inspection Primary Information</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'safety/savePrimaryInspection', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					{{Form::hidden('inspection_number','Inspection_'.date('d').'_'.date('m').'_'.date('y').'_'.time())}}
					<div class="form-group ">
                                        
											{{Form::label('inspection_number', 'Inspection Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('inspection_number','Inspection_'.date('d').'_'.date('m').'_'.date('y').'_'.time(), array('class' => 'form-control','placeholder'=>'','disabled'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('inspection_title', 'Inspection Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('inspection_title','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('lead_inspector', 'Lead Inspector', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select id='lead_inspector' name='lead_inspector' class="demo-default" placeholder="Select Lead Inspector">
												<option value="">Select Lead Inspector</option>									
												@foreach($inspectors as $inspector)
												<option value="{{$inspector}}">{{$inspector}}</option>
												@endforeach 
											</select>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('team_members', 'Team Members', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											<select id="team_members"  multiple name="team_members[]" class="demo-default" >
												<option value="">Select Team Members...</option>
												@foreach($inspectors as $inspector)
												<option value="{{$inspector}}">{{$inspector}}</option>
												@endforeach 
											</select>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('type_of_inspection', 'Type Of Inspection', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select id='type_of_inspection' name='type_of_inspection' class="demo-default" placeholder="Select Lead Inspector">
												<option  value="">Select Type Of Inspection</option>
												<?php $lists=CommonFunction::listsOfColumn('sc_primary_inspection','type_of_inspection');?>
												@foreach($lists as $list)
												<option value="{{$list}}">{{$list}}</option>
												@endforeach 
											</select>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('against_organization', 'Against Organization', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select id="against_organization" name='against_organization' class="demo-default" placeholder="Against Organization">
												<option value="">Against Organization</option>
												@foreach($organizations as $organization)
												<option value="{{$organization}}">{{$organization}}</option>
												@endforeach 
											</select>
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


$('#lead_inspector').selectize({
    create: true,
    sortField: {
        field: 'text',
        direction: 'asc'
    }
});
$('#type_of_inspection').selectize({
    create: true,
    sortField: {
        field: 'text',
        direction: 'asc'
    }
});
$('#against_organization').selectize({
    create: true,
    sortField: {
        field: 'text',
        direction: 'asc'
    }
});

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
//end multiple selection from options	
});
</script>
@stop
@endif

@if($PageName=='New Safety Concern'||$PageName=='Single Inspection'||$PageName=='New Action Entry'||$PageName=='Single Program')	
@section('issueSafety') 
<div class="modal fade" id="issueSafety" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Issue New Concern</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'safety/saveSafetyConcern', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}
					
					{{Form::hidden('safety_issue_number','SC_'.time())}}
					<div class="form-group ">
                                        
											{{Form::label('safety_issue_number', 'Safety Issue Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('safety_issue_number','SC_'.time(), array('class' => 'form-control','placeholder'=>'','disabled'=>''))}}
											</div>
											
                    </div>

                	<div class="form-group required">
                                           
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					@if($PageName=='Single Program')

	                    {{Form::hidden('sia_number',$sia_number)}}
	                    <div class="form-group required">
	                                        
												{{Form::label('finding_number', 'Finding Number', array('class' => 'col-xs-4 control-label'))}}
												<div class="col-xs-6">
												<?php $options=CommonFunction::getFindingListOfThisSia($sia_number);?>

												{{Form::select('finding_number',$options, '0', array('class' => 'form-control demo-default','id'=>'finding_number_sc','placeholder'=>'Select Finding Number','required'=>''))}}
												</div>
												
	                    </div>
	                @else
						  <div class="form-group required">
	                                        
												{{Form::label('sia_number ', 'SIA/ Tracking Number', array('class' => 'col-xs-4 control-label'))}}
												<div class="col-xs-6">
												<?php $options=CommonFunction::siaActionListedSiaNumber();?>
												<select required id="trakingNumber"  name='sia_number' class="demo-default" placeholder="" title="SIA Number Cant be Null">
													<option value="">Select SIA Number</option>
													@foreach($options as $option)
													<option value="{{$option}}">{{$option}}</option>
													@endforeach
												</select>
												</div>
												
	                    </div>
	                    <div class="form-group required">
	                                        
												{{Form::label('finding_number', 'Finding Number', array('class' => 'col-xs-4 control-label'))}}
												<div class="col-xs-6">
												<?php $options=CommonFunction::getFindingList();?>
												
												{{Form::select('finding_number',array(''=>'Select SIA Number Frist'), '', array('class' => 'form-control demo-default','id'=>'finding_number_sc','placeholder'=>'Select Finding Number','required'=>''))}}
												</div>
												
	                    </div>
	                @endif


					<div class="form-group ">
                                        
											{{Form::label('inspector_observation', 'Inspector Observation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('inspector_observation','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('safety_concern', 'Safety Concern', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('safety_concern','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
                     <div class="form-group ">
                                        
											{{Form::label('critical_element ', 'SIA by Critical Elements ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_Critical_Element');?>
											
											<select id="critical_elements"  multiple name="sc_critical_element[]" class="demo-default" >
												<option value="">Select Critical Element</option>
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
											
											<select id="sia_by_areas"  multiple name="sc_area[]" class="demo-default" >
												<option value="">Select Critical Area</option>
												@foreach($options as $option)
												<option  value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
																						
											</div>
											
                    </div>
                    

                    <div class='form-group '>
                    		{{Form::label('type_of_concern','Type Of Concern', array('class'=>'col-xs-4 control-label'))}}
                    		<div class="col-xs-6">
                    		{{Form::select('type_of_concern',array(
                    		'--Select Concern Type--'=>'--Select Concern Type--',
                    		'Safety Concern'=>'Safety Concern',
                    		'Non-Standard Issue'=>'Non-Standard Issue'
                    		),'--Select Concern Type--',array('class'=>'form-control','id'=>'category'))}}
                    		</div>
                    </div>

					<div class="form-group ">
                                        
											{{Form::label('type_of_issue', 'Type Of Issue', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::select('type_of_issue', array(
											'' => '--Select Type Of Issue--', 
										'Non-Conformance: State Law' => 'Non-Conformance: State Law',
										'Non-Conformance: State Regulations'=>'Non-Conformance: State Regulations',
										'Non-Adherence: Published Standard'=>'Non-Adherence: Published Standard',
										'Non-Adherence: Relevant Safety Practice'=>'Non-Adherence: Relevant Safety Practice',
										'Non-Adherence: CAA Guidance'=>'Non-Adherence: CAA Guidance',
										'Non-Conformance: ICAO Standard'=>'Non-Conformance: ICAO Standard',
										'Inadequate System Function'=>'Inadequate System Function',
										'Initial Investigation'=>'Initial Investigation','Any Others'=>'Any Others',), '',array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>                   
					
					<div class="form-group ">
                                        
											{{Form::label('best_practice', 'Violation of Regulation / Best Practice', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('best_practice','', array('class' => 'form-control','placeholder'=>'Synchronously Answer The questions and separate using comma','size'=>'4x2'))}}
											</div>
											
                    </div>	
					<div class="form-group ">
                                        
											{{Form::label('poi_or_responsible', 'POI/PAI/Responsible', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('poi_or_responsible','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>

					
					

					<div class="form-group ">
                                        
											{{Form::label('assigned_inspector', 'Assigned Inspector', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $inspectors=CommonFunction::getInspectorList();?>
											<select  id="assigned_inspector" name='assigned_inspector'class="demo-default" >
												<option value="">Select Assigned Inspector</option>
												@foreach($inspectors as $inspector)
												<option  value="{{$inspector}}">{{$inspector}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('issue_finding_date', 'Finding Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('issue_finding_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('issue_finding_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('issue_finding_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('issue_finding_local_time', 'Issue Finding Local Time', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('issue_finding_local_time','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('place_or_airport', 'Place/Airport', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('place_or_airport','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('responsible_pels', 'Responsible PEL', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('responsible_pels','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('aircraft_msn', 'Aircraft MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::listsOfColumn('aircraft_primary_info','serial_number');?>
											{{ Form::select('aircraft_msn',$options,null, ['class' => 'demo-default','id'=>'aircraft_mmssc','placeholder'=>'Select Or Add Aircraft MMS']) }}

											
											</div>
											
                    </div>
					
					<div class="form-group ">
                                        
											{{Form::label('aircraft_rgistration_number', 'Aircraft Registration Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('aircraft_rgistration_number','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('corrective_priority', 'Corrective Priority', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('corrective_priority', array('' => '--Select Corrective Priority--','Safety of Flight Concern'=>'Safety of Flight Concern','Needs Priority Correction'=>'Needs Priority Correction','Needs Corrective Action'=>'Needs Corrective Action','Inspector Observation'=>'Inspector Observation'), '',array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('target_date', 'Target Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('target_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('target_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('target_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>

				     <div class="form-group ">
                                        
											{{Form::label('witness_statement', 'Witness Statement', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('witness_statement','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
				     <div class="form-group ">
                                        
											{{Form::label('upload_evidence', 'Upload Evidence', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('upload_evidence',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
											
                    </div>
				     <div class="form-group ">
                                        
											{{Form::label('upload_checklist', 'Upload Checklist', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('upload_checklist',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
											
                    </div>

					<div class="form-group ">
                                        
											{{Form::label('question', 'Question', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('question','', array('class' => 'form-control','placeholder'=>'Separate Questions using comma (,) ','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('answer', 'Answer', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('answer','', array('class' => 'form-control','placeholder'=>'Synchronously Answer The questions and separate using comma','size'=>'4x2'))}}
											</div>
											
                    </div>					

                    <!--  Risk Analysis and Assessment-->
			    <div class="form-group smsBackground">
					 <div class="form-group">
					    <label class="col-md-2 control-label"></label>
					    <div class="col-md-10">
					      <p class="form-control-static text-center"><strong>Risk Analysis and Assessment</strong></p>
						</div>
					</div>
			    
			    
					 <div class="form-group">
					    <label class="col-md-5 control-label"></label>
					    <div class="col-md-7">
					      <p><a class="form-control-static text-center"  href="#" data-toggle="modal"  data-target="#riskMartix">Quick View of Risk Matrix</a></p>
						 
						</div>
					</div>
			    
                    <div class="form-group ">
                                        
											{{Form::label('risk_statement', 'Risk Statement', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('risk_statement','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
                    
                    <div class="form-group ">
                                        
											{{Form::label('risk_Probability', 'Risk Probability', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_Determine_Severity','Select Severity');?>
											{{Form::select('risk_Probability', array('' => '--Select Risk Probability--','Frequent-5'=>'Frequent-5','Occasional-4'=>'Occasional-4','Remote-3'=>'Remote-3','Improbable-2'=>'Improbable-2','Extremely Improbable-1'=>'Extremely Improbable-1',), '',array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('risk_severity', 'Risk Severity', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_Likelihood','Select Likelihood');?>
											{{Form::select('risk_severity', array('' => '--Select Risk Severity--','Catastrophic-A'=>'Catastrophic-A','Hazardous-B'=>'Hazardous-B','Major-C'=>'Major-C','Minor-D'=>'Minor-D','Negligible-E'=>'Negligible-E'), '',array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>

   					<div class="form-group ">
                                        
											{{Form::label('cvr_statement', 'Severity Statement', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('cvr_statement','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>

   					<div class="form-group ">
                                        
											{{Form::label('risk_assesment_from_matrix', 'Risk Assessment from Matrix Index ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('risk_assesment_from_matrix','', array('class' => 'form-control','placeholder'=>'i.e 5A'))}}
											</div>
											
                    </div>
                   					
                    <div class="form-group ">
                                        
											{{Form::label('risk_action', 'Risk Tolerability & Type of Action', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('risk_action', array('' => '--Select --','Extreme risk- Stop Operation'=>'Extreme risk- Stop Operation','High risk- Legal Action'=>'High risk- Legal Action','Moderate Risk- Warning Letter'=>'Moderate Risk- Warning Letter','Lower Risk- Counseling'=>'Lower Risk- Counseling','Negligible Risk- Acceptable'=>'Negligible Risk- Acceptable'), '',array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('risk_management', 'Risk Management', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('risk_management','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
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
 $('[data-toggle="tooltip"]').tooltip();
$('#type_of_issue').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#assigned_inspector').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
//$('#aircraft_msn').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#provided_to').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#final_regulation_inspector').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#final_regulation_method').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#trakingNumber').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#finding_number_jkgfjkfd').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#aircraft_mmssc').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});

//multiple selection from options
var eventHandler = function(name) {
					return function() {
						console.log(name, arguments);
						$('#log').append('<div><span class="name">' + name + '</span></div>');
					};
				};
var $select = $('#critical_elements').selectize({
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

var $select = $('#sia_by_areas').selectize({
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

@if($PageName=='New Safety Concern'||$PageName=='Single Program'||$PageName=='New Action Entry')	
@section('edp') 
<div class="modal fade" id="edp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Issue New EDP</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'edp/saveEdpPrimary', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}
					{{Form::hidden('edp_number','EDP_'.time())}}
					<div class="form-group ">
                                        
											{{Form::label('edp_number', 'EDP Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('edp_number_show_only','EDP_'.time(), array('class' => 'form-control','placeholder'=>'','disabled'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group required">
                                           
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                     <div class="form-group required">
	                                           
												{{Form::label('date', 'Enforcment Impose Date', array('class' => 'col-xs-4 control-label'))}}
												
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
	                    
	                   
	                    @if($PageName=='Single Program')
						 {{Form::hidden('sia_number',$sia_number)}}
						 <div class="form-group required">
	                                        
												{{Form::label('finding_number', 'Finding Number', array('class' => 'col-xs-4 control-label'))}}
												<div class="col-xs-6">
												<?php $options=CommonFunction::getFindingListOfThisSia($sia_number);?>

												{{Form::select('finding_number',$options, '0', array('class' => 'form-control demo-default','id'=>'finding_number_sc','placeholder'=>'Select Finding Number','required'=>''))}}
												</div>
												
	                    </div>
	                    <div class="form-group ">
	                                        
											{{Form::label('sc_number ', 'SC Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
												
											<?php $options=CommonFunction::getScListOfThisSia($sia_number);?>
																						
											{{Form::select('sc_number',$options, '0', array('class' => 'form-control demo-default','id'=>'sc_number_edp','placeholder'=>'Select Sc Number',))}}
											</div>
											
	                    </div>
	                    @else
                       <div class="form-group required">
                                        
											{{Form::label('sia_number ', 'SIA/ Tracking Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
										<?php $options=CommonFunction::siaActionListedSiaNumber();?>
											<select required id="sia_edp"  name='sia_number' class="demo-default" placeholder="--Select SIA Number--">
											<option value='' selected="">--Select SIA Number--</option>
												@foreach($options as $option)
												<option value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
	                    </div>
	                    <div class="form-group required">
	                                        
												{{Form::label('finding_number', 'Finding Number', array('class' => 'col-xs-4 control-label'))}}
												<div class="col-xs-6">
												<?php $options=CommonFunction::getFindingList();?>
												
												{{Form::select('finding_number',$options, 'null', array('class' => 'form-control demo-default','id'=>'finding_number_edp','placeholder'=>'Select Finding Number','required'=>''))}}
												</div>
												
	                    </div>
	                    <div class="form-group ">
	                                        
											{{Form::label('sc_number ', 'SC Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
												
											<?php $options=CommonFunction::listsOfColumn('sc_safety_concern','safety_issue_number');?>
																						
											{{Form::select('sc_number',[null=>'--select Safety Concern Number--']+$options, '0', array('class' => 'form-control demo-default','id'=>'sc_number_edp','placeholder'=>'Select Sc Number',))}}
											</div>
											
	                    </div>
	                    @endif
						<div class="form-group ">
                                        
											{{Form::label('severity_level', 'Severity Level', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">											
												{{Form::select('severity_level', array(''=>'--select Severity Level--','Catastrophic'=>'Catastrophic','Critical'=>'Critical','Marginal'=>'Marginal','Negligible'=>'Negligible'),'',array('class'=>'form-control'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('severity_explanation', 'Explanation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('severity_explanation','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('likelihood_level', 'Likelihood Level', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">											
												{{Form::select('likelihood_level', array(''=>'--select--','Frequent'=>'Frequent','Occasional'=>'Occasional','Remote'=>'Remote'),'',array('class'=>'form-control'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('likelihood_explanation', 'Explanation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('likelihood_explanation','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('level_of_risk', 'Level Of Risk Selected', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('level_of_risk', array(''=>'--select--','High Risk'=>'High Risk','Moderate Risk'=>'Moderate Risk','Low Risk'=>'Low Risk'),'',array('class'=>'form-control'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('type_of_action', 'Type Of Action Selected', array('class' => 'col-xs-4 control-label'))}}
											<?php $options=CommonFunction::getOptions('edp_type_of_action_selected')?>
											<div class="col-xs-6">
											<select  id="type_of_action"  multiple name="type_of_action[]" class="demo-default" >
												<option value="">Select Type ...</option>
													@foreach($options as $option)
												<option value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>          

                    <div class="form-group ">
	                                           
												{{Form::label('deviation_procedure', 'Has Deviation/ Exemption Procedure?', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
											<div class="radio">
										 
										  <label> {{ Form::radio('deviation_procedure', 'Yes') }} &nbsp  Yes</label>
										 <label> {{ Form::radio('deviation_procedure', 'No',true) }} &nbsp  No</label>
										</div>
										
									</div>
	                </div>
					           
					<div class="form-group ">
                                        
											{{Form::label('if_yes_explain_deviation_procedure', 'If Yes Explain(Deviation/Exemption Procedure)', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('if_yes_explain_deviation_procedure','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>            
					<div class="form-group ">
                                        
											{{Form::label('remedial_action', 'Remedial Action', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('remedial_action','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>  
					<div class="form-group ">
                                        
											{{Form::label('written_explanation', 'Written Explanation For Admin Action', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('written_explanation','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>              
					<div class="form-group ">
                                        
											{{Form::label('recommendation_for_legal_enf', 'Recommendation For Legal Enforcement (If Appropriate)', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('recommendation_for_legal_enf','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>                    
					
                    <div class="form-group ">
	                                           
												{{Form::label('edp_peocess_outcome_requested', 'EDP Process Outcome Requested', array('class' => 'col-xs-4 control-label'))}}
												
	                                <div class="col-xs-6">
											<div class="radio">
										 
										  <label> {{ Form::radio('edp_peocess_outcome_requested', 'Yes') }} &nbsp  Yes</label>
										 <label> {{ Form::radio('edp_peocess_outcome_requested', 'No',true) }} &nbsp  No</label>
										</div>
										
									</div>
	                </div>
					           
					<div class="form-group ">
                                        
											{{Form::label('if_yes_explain_outcome_requested', 'If Yes Explain & Justification', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('if_yes_explain_outcome_requested','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>  

					<div class="form-group ">
                                        
											{{Form::label('remedial_measure', 'Remedial Measure', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('remedial_measure','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>  

                    <div class="form-group ">
                                        
											{{Form::label('enforcement_decision_outcome', 'Enforcement Decision Outcome', array('class' => 'col-xs-4 control-label'))}}
											<?php $options=CommonFunction::getOptions('edp_enforcement_decision_outcome');?>
											<div class="col-xs-6">											
												{{Form::select('enforcement_decision_outcome',$options,'',array('class'=>'form-control'))}}
											</div>
											
                    </div>

					<div class="form-group ">
                                        
											{{Form::label('enforcement_action', 'Enforcement Action', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('enforcement_action','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div> 
					<div class="form-group ">
                                        
											{{Form::label('file', 'File Upload (Enforcement Action)', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												{{Form::file('enforcement_action_file',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
											
                    </div>  
                    <div class="form-group ">
                                        
											{{Form::label('admin_opinion', 'Admin Opinion', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('admin_opinion','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div> 

					<div class="form-group ">
                                        
											{{Form::label('file', 'File Upload (Admin Opinion)', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												{{Form::file('admin_opinion_file',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
											
                    </div> 
                    <div class="form-group ">
                                        
											{{Form::label('legal_opinion', 'Legal Opinion', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('legal_opinion','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div> 

					<div class="form-group ">
                                        
											{{Form::label('file', 'File Upload (Legal Opinion)', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												{{Form::file('legal_opinion_file',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
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

$('#sia_edp').selectize();
$('#type_of_issue').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#assigned_inspector').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
//$('#aircraft_msn').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#provided_to').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#final_regulation_inspector').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#final_regulation_method').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#finding_number').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});

//multiple selection from options
var eventHandler = function(name) {
					return function() {
						console.log(name, arguments);
						$('#log').append('<div><span class="name">' + name + '</span></div>');
					};
				};
var $select = $('#type_of_action').selectize({
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

var $select = $('#sc_number').selectize({
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
//end multiple selection from options
	
});
	</script>
@stop
@endif

@if($PageName=='Single Safety concern')	
@section('correctiveIssue')
<div class="modal fade" id="correctiveIssue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Corrective Action</h4>
            </div>

            <div class="modal-body">
                
               
				{{Form::open(array('url' => 'safety/saveCorrectiveAction', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}
					
						@foreach($safetyConcernDatas as $sc)
							{{Form::hidden('safety_issue_number',$sc->safety_issue_number)}}							
						@endforeach
					
						
					
					<div class="form-group required ">
                                        
											{{Form::label('currective_action', 'Corrective Action', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('currective_action','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                           
											{{Form::label('revived_date', 'Revived Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('revived_date', $dates,'0',array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('revived_month',$months,'0',array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('revived_year',$years,'0',array('class'=>'form-control','required'=>''))}}
														</div>
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('concern_authority_officer', 'Concern Authority Officer', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('concern_authority_officer','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required ">
                                        
											{{Form::label('regulation_mitigation', 'Regulation Mitigation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('regulation_mitigation','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
											</div>
											
                    </div>
					
					
					<div class="form-group required">
                                           
											{{Form::label('regulation_mitigation_date', 'Regulation Mitigation Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('regulation_mitigation_date', $dates,'0',array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('regulation_mitigation_month',$months,'0',array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('regulation_mitigation_year',$years,'0',array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
                                            
											 {{ Form::label('corrective_action_file', 'Upload Corrective Action File: ',array('class'=>'control-label col-xs-4')) }}
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
	
@stop
@endif
@if($PageName=='Single Safety concern')	
@section('forwardingForm')
<div class="modal fade" id="forwardingForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forwarding Form</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'safety/saveForwardingInfo', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
					
						@foreach($safetyConcernDatas as $sc)
							{{Form::hidden('safety_issue_number',$sc->safety_issue_number)}}							
						@endforeach
					
					
					
					<div class="form-group required">
                                        
											{{Form::label('forwarding_to', 'Forwarding To', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select require id='forwarding_to' name='forwarding_to' class="demo-default" placeholder="Select  Inspector">
												<option value="">Select  Inspector</option>
												@foreach($inspectors as $inspector)
												<option value="{{$inspector}}">{{$inspector}}</option>
												@endforeach 
											</select>
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('designation', 'Designation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select required id='designation' name='designation' class="demo-default" placeholder="Select  Designation">
												<option value="">Select  Designation</option>
												@foreach($designations as $designation)
												<option value="{{$designation}}">{{$designation}}</option>
												@endforeach 
												
												
											</select>
											</div>
											
                    </div>
					
					<div class="form-group required">
                                        
											{{Form::label('forwarding_note', 'Forwarding note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('forwarding_note','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
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


$('#forwarding_to').selectize();
$('#designation').selectize();

});
</script>
@stop
@endif

@if($PageName=='Single Safety concern')	
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
               
				{{Form::open(array('url' => 'safety/saveApprovalForm', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
				  
						@foreach($safetyConcernDatas as $sc)
							{{Form::hidden('safety_issue_number',$sc->safety_issue_number)}}							
						@endforeach
				
					
					
					
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


//$('#approved_by').selectize({create: true, sortField: {field: 'text',direction: 'asc' }});

});
</script>
@stop
@endif

@if($PageName=='Single Safety concern')	
@section('legalOpenion')
<div class="modal fade" id="legalOpenion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Opinion Of Legal Department </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'safety/saveLegalOpinion', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
				  
						@foreach($safetyConcernDatas as $sc)
							{{Form::hidden('safety_issue_number',$sc->safety_issue_number)}}							
						@endforeach
				
					
					<div class="form-group required">
                                        
											{{Form::label('legal_openion', 'Legal Openion', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('legal_openion','', array('class' => 'form-control','placeholder'=>'','size'=>'4x3','required'=>''))}}
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


//$('#approved_by').selectize({create: true, sortField: {field: 'text',direction: 'asc' }});

});
</script>

@stop
@endif
@if($PageName=='Single Safety concern')	
@section('finzalization')
<div class="modal fade" id="finzalization" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Finzalization</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'safety/saveFinzalization', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
				  
						@foreach($safetyConcernDatas as $sc)
							{{Form::hidden('safety_issue_number',$sc->safety_issue_number)}}							
						@endforeach
				




      
                    
					<div class="form-group required ">
                                           
											{{Form::label('final_resolution_date', 'Final Resolution Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('final_resolution_date', $dates , date('d') ,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('final_resolution_month', $months , date('F') ,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('final_resolution_year', $years , date('Y') ,array('class'=>'form-control','required'=>''))}}
														</div>
											</div>
											
                    </div>
                    <div class="form-group required">
                                        
											{{Form::label('final_inspector', 'Final Resolution Inspector', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $inspectors=CommonFunction::getInspectorList() ?>
											<select  required id='final_inspector' name='final_inspector' class="demo-default" placeholder="Select  Inspector">
												<option value="">Select  Inspector</option>
												@foreach($inspectors as $inspector)
												<option value="{{$inspector}}">{{$inspector}}</option>
												@endforeach 
											</select>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('final_method', 'Final Resolution Method', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('final_method','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                        
											{{Form::label('residual_risk', 'Residual Risk', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('residual_risk','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                        
											{{Form::label('status_result', 'Status/ Result', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('status_result','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('edp_number', 'EDP Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $infos=CommonFunction::getEdpListOfThisSia($sia_number);?>
											<select  id='edp_number' name='edp_number' class="demo-default" placeholder="Select  EDP Number">
												<option value="">Select  EDP</option>
												@foreach($infos as $info)
												<option value="{{$info}}">{{$info}}</option>
												@endforeach 
											</select>
											</div>
											
                    </div>

					<div class="form-group ">
                                        
											{{Form::label('closing_note ', 'Closing Note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('closing_note','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
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


$('#edp_number').selectize();
$('#final_inspector').selectize();

});
</script>

@stop
@endif

@if($PageName=='New Action Entry' || $PageName=='Single Program')	
@section('riskMartix')

<div class="modal fade" id="riskMartix" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Risk Matrix</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
				<div class="row">
						<div class="col-md-6">
							  {{HTML::image('img/sc/mat-1.jpg','User',array('class'=>'img-thumbnail'))}}			
						</div>
						<div class="col-md-6">
							  {{HTML::image('img/sc/mat-2.jpg','User',array('class'=>'img-thumbnail'))}}
						</div>

				</div>
               
               

               
            </div>
        </div>
    </div>
	</div>
	</div>

	@stop
@endif