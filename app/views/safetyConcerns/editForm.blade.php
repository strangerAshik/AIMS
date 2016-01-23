@if($PageName=='Single Inspection')
@section('inspectionPrimary')
@foreach($ins_primary_infos as $info)
<div class="modal fade" id="inspectionInfo{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Inspection Primary Information</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'safety/updatePrimaryInspection', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}

					{{Form::hidden('id',$info->id)}}
					<div class="form-group ">
                                        
											{{Form::label('inspection_number', 'Inspection Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('inspection_number',$info->inspection_number, array('class' => 'form-control','placeholder'=>'','disabled'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('inspection_title', 'Inspection Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('inspection_title',$info->inspection_title, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('lead_inspector', 'Lead Inspector', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select id='lead_inspector{{$info->id}}' name='lead_inspector' class="demo-default" placeholder="Select Lead Inspector">
												<option value="{{$info->lead_inspector}}">{{$info->lead_inspector}}</option>			
												@foreach($inspectors as $inspector)
												<option value="{{$inspector}}">{{$inspector}}</option>
												@endforeach 
											</select>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('team_members', 'Team Members', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">

											<select id="team_members{{$info->id}}"  multiple name="team_members[]" class="demo-default" >
											@if($teamMemmber=CommonFunction::updateMultiSelection('sc_primary_inspection', 'id',$info->id,'team_members'))
												@foreach($teamMemmber as $key=>$value)
												<option selected='selected' value="{{$value}}">{{$value}}</option>
												@endforeach
												@endif
												@foreach($inspectors as $inspector)
												<option value="{{$inspector}}">{{$inspector}}</option>
												@endforeach 
											</select>
											
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('type_of_inspection', 'Type Of Inspection', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select id='type_of_inspection{{$info->id}}' name='type_of_inspection' class="demo-default" placeholder="Select Lead Inspector">
												<option  value="">Select Type Of Inspection</option>
													<option selected='selected' value="{{$info->type_of_inspection}}">{{$info->type_of_inspection}}</option>
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
											<select id="against_organization{{$info->id}}" name='against_organization' class="demo-default" placeholder="Against Organization">
												<option value="">Against Organization</option>
												<option selected='selected' value="{{$info->against_organization}}">{{$info->against_organization}}</option>
												
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


$('#lead_inspector{{$info->id}}').selectize({
    create: true,
    sortField: {
        field: 'text',
        direction: 'asc'
    }
});
$('#type_of_inspection{{$info->id}}').selectize({
    create: true,
    sortField: {
        field: 'text',
        direction: 'asc'
    }
});
$('#against_organization{{$info->id}}').selectize({
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
var $select = $('#team_members{{$info->id}}').selectize({
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
@endforeach
	
@stop
@endif
@if($PageName=='Single Safety concern')	
@section('editIssueSafety')
	@foreach($safetyConcernDatas as $sc)
<div class="modal fade" id="editIssueSafety{{$sc->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Safety Concern</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'safety/updateSafetyConcern', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}
					
					{{Form::hidden('id',$sc->id)}}
					
					{{Form::hidden('old_upload_evidence',$sc->upload_evidence)}}
					{{Form::hidden('old_upload_checklist',$sc->upload_checklist)}}
					
					
                    <div class="form-group required">
                                        
											{{Form::label('finding_number', 'Finding Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getFindingListOfThisSia($sc->sia_number);?>
											
											{{ Form::select('finding_number',$options,$sc->finding_number, array('class'=>'form-control','required'=>'')) }}	

										
											</div>
											
                    </div>
                    <div class="form-group required">
                                           
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',$sc->title, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('inspector_observation', 'Inspector Observation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('inspector_observation',$sc->inspector_observation, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('safety_concern', 'Safety Concern', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('safety_concern',$sc->safety_concern, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('critical_element ', 'SIA by Critical Elements ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('SIA_Critical_Element');?>
											
									       <select id="critical_element"  multiple name="sc_critical_element[]" class="demo-default" >
												@if($areas=CommonFunction::updateMultiSelection('sc_safety_concern', 'id',$sc->id,'sc_critical_element'))
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
                                        
											{{Form::label('sc_area ', 'Critical Area ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
												<?php $options=CommonFunction::getOptions('SIA_By_Area');?>

											<select id="sia_by_area"  multiple name="sc_area[]" class="demo-default" >
											@if($areas=CommonFunction::updateMultiSelection('sc_safety_concern', 'id',$sc->id,'sc_area'))
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
					
                     <div class='form-group required'>
                    		{{Form::label('type_of_concern','Type Of Concern', array('class'=>'col-xs-4 control-label'))}}
                    		<div class="col-xs-6">
                    		{{Form::select('type_of_concern',array(
                    		''=>'--Select Concern Type--',
                    		'Safety Concern'=>'Safety Concern',
                    		'Non-Standard Issue'=>'Non-Standard Issue'
                    		), $sc->type_of_concern ,array('class'=>'form-control','id'=>'category','required'=>''))}}
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
										'Initial Investigation'=>'Initial Investigation','Any Others'=>'Any Others'),
										$sc->type_of_issue ,array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>                   
					
					<div class="form-group ">
                                        
											{{Form::label('best_practice', 'Violation of Regulation / Best Practice', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('best_practice',$sc->best_practice, array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>	
					<div class="form-group ">
                                        
											{{Form::label('poi_or_responsible', 'POI/PAI/Responsible', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('poi_or_responsible',$sc->poi_or_responsible, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>

					
					

					<div class="form-group required">
                                        
											{{Form::label('assigned_inspector', 'Assigned Inspector', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $inspectors=CommonFunction::getInspectorList();?>
											<select required id="assigned_inspector" name='assigned_inspector'class="demo-default" >
												<option value="{{$sc->assigned_inspector}}">{{$sc->assigned_inspector}}</option>
												@foreach($inspectors as $inspector)
												<option value="{{$inspector}}">{{$inspector}}</option>
												@endforeach 
											</select>
											</div>
											
                    </div>

					<div class="form-group required">
                                           
											{{Form::label('issue_finding_date', 'Finding Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														<?php $day=CommonFunction::date($sc->issue_finding_date); ?>
														{{Form::select('issue_finding_date', $dates,$day,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														<?php $month=CommonFunction::month($sc->issue_finding_date); ?>
														{{Form::select('issue_finding_month',$months,$month,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
														<?php $year=CommonFunction::year($sc->issue_finding_date); ?>
															{{Form::select('issue_finding_year',$years,$year,array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('issue_finding_local_time', 'Issue Finding Local Time', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('issue_finding_local_time',$sc->issue_finding_local_time, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('place_or_airport', 'Place/Airport', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('place_or_airport',$sc->place_or_airport, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('responsible_pels', 'Responsible PEL', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('responsible_pels',$sc->responsible_pels, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('aircraft_msn', 'Aircraft MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											<?php $options=CommonFunction::listsOfColumn('aircraft_primary_info','serial_number');?>
											{{ Form::select('aircraft_msn',$options, $sc->aircraft_msn , ['class' => 'demo-default','id'=>'aircraft_mmssce','placeholder'=>'Select Or Add Aircraft MMS']) }}

											{{--
											<select id="aircraft_msn" name='aircraft_msn' class="demo-default" placeholder="Select Aircraft MSN">
												<option value="">Select Aircraft MSN</option>
												@foreach($airMSMs as $airMSM)
												<option value="{{$airMSM}}">{{$airMSM}}</option>
												@endforeach
											</select>--}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                        
											{{Form::label('aircraft_rgistration_number', 'Aircraft Registration Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('aircraft_rgistration_number',$sc->aircraft_rgistration_number, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('corrective_priority', 'Corrective Priority', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('corrective_priority', array('' => '--Select Corrective Priority--','Safety of Flight Concern'=>'Safety of Flight Concern','Needs Priority Correction'=>'Needs Priority Correction','Needs Corrective Action'=>'Needs Corrective Action','Inspector Observation'=>'Inspector Observation'),$sc->corrective_priority,array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('target_date', 'Target Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														<?php $day=CommonFunction::date($sc->target_date);?>
														{{Form::select('target_date', $dates,$day,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														<?php $month=CommonFunction::month($sc->target_date);?>
														{{Form::select('target_month',$months, $month ,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
														<?php $year=CommonFunction::year($sc->target_date);?>
															{{Form::select('target_year',$years,$year,array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
                   

				     <div class="form-group ">
                                        
											{{Form::label('witness_statement', 'Witness Statement', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('witness_statement',$sc->witness_statement, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
				     <div class="form-group ">
                                        
											{{Form::label('upload_evidence', 'Upload Updated Evidence', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('upload_evidence',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
											
                    </div>
				     <div class="form-group ">
                                        
											{{Form::label('upload_checklist', 'Upload Updated Checklist', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('upload_checklist',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
											
                    </div>

					<div class="form-group ">
                                        
											{{Form::label('question', 'Question', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('question',$sc->question, array('class' => 'form-control','placeholder'=>'Separate Questions using comma (,) ','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('answer', 'Answer', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('answer',$sc->answer, array('class' => 'form-control','placeholder'=>'Synchronously Answer The questions and separate using comma','size'=>'4x2'))}}
											</div>
											
                    </div>					

                    <!--  Risk Analysis and Assessment-->
			    <div class="form-group " style="background: #D0F4B3">
					 <div class="form-group">
					    <label class="col-md-2 control-label"></label>
					    <div class="col-md-10">
					      <p class="form-control-static text-center">Risk Analysis and Assessment</p>
					    </div>
					</div>
                    <div class="form-group ">
                                        
											{{Form::label('risk_statement', 'Risk Statement', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('risk_statement',$sc->risk_statement, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
                    
                    <div class="form-group ">
                                        
											{{Form::label('risk_Probability', 'Risk Probability', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('risk_Probability', array('' => '--Select Risk Probability--','Frequent-5'=>'Frequent-5','Occasional-4'=>'Occasional-4','Remote-3'=>'Remote-3','Improbable-2'=>'Improbable-2','Extremely Improbable-1'=>'Extremely Improbable-1',),$sc->risk_Probability,array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('risk_severity', 'Risk Severity', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('risk_severity', array('' => '--Select Risk Severity--','Catastrophic-A'=>'Catastrophic-A','Hazardous-B'=>'Hazardous-B','Major-C'=>'Major-C','Minor-D'=>'Minor-D','Negligible-E'=>'Negligible-E'),$sc->risk_severity,array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>

   					<div class="form-group ">
                                        
											{{Form::label('cvr_statement', 'Severity Statement', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('cvr_statement',$sc->cvr_statement, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>

   					<div class="form-group ">
                                        
											{{Form::label('risk_assesment_from_matrix', 'Risk Assessment from Matrix Index ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('risk_assesment_from_matrix',$sc->risk_assesment_from_matrix, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                   					
                    <div class="form-group ">
                                        
											{{Form::label('risk_action', ' Determine Risk & Type of Action', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('risk_action', array('' => '--Select --','High risk- Legal Action'=>'High risk- Legal Action','Moderate Risk- Warning Letter'=>'Moderate Risk- Warning Letter','Lower Risk- Counseling'=>'Lower Risk- Counseling','No Risk'=>'No Risk'), $sc->risk_action ,array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('risk_management', 'Risk Management', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('risk_management',$sc->risk_management, array('class' => 'form-control','placeholder'=>''))}}
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
	@endforeach
		<script>
	$(document).ready(function(){

$('#type_of_issue').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#assigned_inspector').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
//$('#aircraft_msn').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#provided_to').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#final_regulation_inspector').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#final_regulation_method').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#trakingNumber').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#critical_element').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#sia_by_area').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#aircraft_mmssce').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#finding_number_sc').selectize();

	
});
	</script>

@stop
@section('editCorrectiveIssue')
@foreach($correctiveActions as $action)
<div class="modal fade" id="editCorrectiveIssue{{$action->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Corrective Issue</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'safety/updateCorrectiveAction', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}
					@if($PageName=='Single Safety concern')	
						@foreach($safetyConcernDatas as $sc)
							{{Form::hidden('safety_issue_number',$sc->safety_issue_number)}}							
						@endforeach
					@endif
					
					{{Form::hidden('id',$action->id)}}							
					{{Form::hidden('old_corrective_action_file',$action->corrective_action_file)}}							
						
					
					<div class="form-group required">
                                        
											{{Form::label('currective_action', 'Corrective Action', array('class' => 'col-xs-4 control-label','required'=>''))}}
											<div class="col-xs-6">
											{{Form::textarea('currective_action',$action->currective_action, array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                           
											{{Form::label('revived_date', 'Revived Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('revived_date', $dates, $action->revived_date ,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('revived_month',$months, $action->revived_month ,array('class'=>'form-control','required'=>''))}}									
															
														</div>
														<div class="col-xs-2">
															{{Form::select('revived_year',$years, $action->revived_year ,array('class'=>'form-control','required'=>''))}}
														</div>
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('concern_authority_officer', 'Concern Authority Officer', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('concern_authority_officer',$action->concern_authority_officer , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('regulation_mitigation', 'Regulation Mitigation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('regulation_mitigation',$action->regulation_mitigation, array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
											</div>
											
                    </div>
					
					
					<div class="form-group required">
                                           
											{{Form::label('regulation_mitigation_date', 'Regulation Mitigation Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('regulation_mitigation_date', $dates,$action->regulation_mitigation_date ,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('regulation_mitigation_month',$months, $action->regulation_mitigation_month ,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('regulation_mitigation_year',$years,$action->regulation_mitigation_year ,array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
                                            
											 {{ Form::label('corrective_action_file', 'Uploaded Corrective Action File: ',array('class'=>'control-label col-xs-4')) }}
											 <div class="col-xs-6">
											 @if($action->corrective_action_file!='Null'){{HTML::link('files/sc_corrective_action_file/'.$action->corrective_action_file,'Document',array('target'=>'_blank'))}}
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

@section('updateApprovalForm')
@foreach($approvalInfos as $info)
<div class="modal fade" id="editapprovalInfos{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Approval Info.</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'safety/updateApprovalForm', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
				  				
					
					{{Form::hidden('id',$info->id)}}							
					
					<div class="form-group required">
                                        
											{{Form::label('approved_by', 'Approved By', array('class' => 'col-xs-4 control-label','required'=>''))}}
											<div class="col-xs-6">
											{{Form::text('approved_by', $info->approved_by , array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('designation', 'Designation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('e_designation', $info->designation , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                           
											{{Form::label('approval_date', 'Approval Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('approval_date', $dates , $info->approval_date ,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('approval_month', $months , $info->approval_month ,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('approval_year', $years , $info->approval_year ,array('class'=>'form-control','required'=>''))}}
														</div>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('approval_note', 'Approval Note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('approval_note', $info->approval_note , array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
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
@endforeach
@stop


@section('updatefinzalization')
@foreach($finalization as $info)
<div class="modal fade" id="updatefinzalization{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Finalization Info.</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'safety/updatefinzalization', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
					{{Form::hidden('id',$info->id)}}							
					<div class="form-group required">
                                           
											{{Form::label('final_resolution_date', 'Final Resolution Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">

														<div class="col-xs-2">
														<?php $date=CommonFunction::date($info->final_resolution_date);?>
														{{Form::select('final_resolution_date', $dates , $date ,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														<?php $month=CommonFunction::month($info->final_resolution_date);?>
														{{Form::select('final_resolution_month', $months , $month ,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
														<?php $year=CommonFunction::year($info->final_resolution_date);?>
															{{Form::select('final_resolution_year', $years , $year ,array('class'=>'form-control','required'=>''))}}
														</div>
											</div>
											
                    </div>
                    <div class="form-group required">
                                        
											{{Form::label('final_inspector', 'Final Resolution Inspector', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select required id='final_inspector{{$info->id}}' name='final_inspector' class="demo-default" placeholder="Select  Inspector">
												<option selected value="{{$info->final_inspector}}">{{$info->final_inspector}}</option>
												@foreach($inspectors as $inspector)
												<option value="{{$inspector}}">{{$inspector}}</option>
												@endforeach 
											</select>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('final_method', 'Final Resolution Method', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('final_method',$info->final_method, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('residual_risk', 'Residual Risk', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('residual_risk',$info->residual_risk, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('residual_risk', 'Residual Risk', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('residual_risk',$info->residual_risk, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                        
											{{Form::label('status_result', 'Status/ Result', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('status_result',$info->status_result, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                        
											{{Form::label('edp_number', 'EDP Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $lists=CommonFunction::getEdpListOfThisSia($sia_number);?>
											<select  id='edp_number{{$info->id}}' name='edp_number' class="demo-default" placeholder="Select  EDP Number">
												<option selected value="{{$info->edp_number}}">{{$info->edp_number}}</option>
												@foreach($lists as $list)
												<option value="{{$list}}">{{$list}}</option>
												@endforeach 
											</select>
											</div>
											
                    </div>

					<div class="form-group ">
                                        
											{{Form::label('closing_note ', 'Closing Note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('closing_note',$info->closing_note, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
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


$('#edp_number{{$info->id}}').selectize();
$('#final_inspector{{$info->id}}').selectize();

});
</script>
@endforeach
@stop

@section('updateForwardingForm')
@foreach($forwardings as $forwarding)
<div class="modal fade" id="editForwardings{{$forwarding->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Forwarding</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'safety/updateForwardingInfo', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
									
					{{Form::hidden('id',$forwarding->id)}}							
					
					<div class="form-group required">
                                        
											{{Form::label('forwarding_to', 'Forwarding To', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select required e_forwarding_toid='e_forwarding_to' name='forwarding_to' class="demo-default" placeholder="Select  Inspector">
												<option value="">Select  Inspector</option>
												<option selected='selected' value="{{$forwarding->forwarding_to}}">{{$forwarding->forwarding_to}}</option>							
												<option value="Roman">Roman</option>
												{{--@foreach($roles as $role)
												<option value="{{$role}}">{{$role}}</option>
												@endforeach --}}
											</select>
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('designation', 'Designation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select required id='e_designation' name='designation' class="demo-default" placeholder="Select  Designation">
												<option value="">Select  Designation</option>
												<option selected='selected' value="{{$forwarding->designation}}">{{$forwarding->designation}}</option>
												<option value="Director">Director</option>
												
												
											</select>
											</div>
											
                    </div>
					
					<div class="form-group required">
                                        
											{{Form::label('forwarding_note', 'Forwarding note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('forwarding_note',$forwarding->forwarding_note, array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
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
$('#e_forwarding_to').selectize();
$('#e_designation').selectize();
});
</script>
@endforeach
@stop

@section('updatelegalOpenion')
@foreach($legalOpinions as $opinion)
<div class="modal fade" id="updatelegalOpenion{{$opinion->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Opinion Of Legal Department </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'safety/updateLegalOpinion', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
				  {{Form::hidden('id',$opinion->id)}}
				  
					<div class="form-group required">
                                        
											{{Form::label('legal_openion', 'Legal Opinion', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('legal_openion',$opinion->legal_openion, array('class' => 'form-control','placeholder'=>'','size'=>'4x3','required'=>''))}}
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


//$('#approved_by').selectize({create: true, sortField: {field: 'text',direction: 'asc' }});

});
</script>
@stop
@endif