
@section('editPrimaryInfoForm')

<div class="modal fade" id="editPrimaryInfoForm{{$primary->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Primary Data Of A New Aircraft </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/editPrimary','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
					{{Form::hidden('id',$primary->id)}}
					<div class="form-group required">
                                           
											{{Form::label('assigned_inspector', 'Assigned Inspector ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $inspector=CommonFunction::getInspectorList();?>
											{{Form::select('assigned_inspector', $inspector,$primary->assigned_inspector,array('class'=>'form-control'))}}
											</div>
											
                    </div><div class="form-group required">
                                           
											{{Form::label('serial_number', 'Serial Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('serial_number',$primary->serial_number, array('class' => 'form-control','placeholder'=>'i.e Boeing-737NG-123456','required'=>''))}}
											</div>
											
                    </div>

					<div class="form-group required">
                                           
											{{Form::label('state_registration', 'State Of Registration', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select id="state_registration" name='state_registration' class="demo-default" placeholder="Select  State Of Registration...">
												<?php $options=CommonFunction::stateOfReg();?>
												<option value="{{$primary->state_registration}}">{{$primary->state_registration}}</option>
												@foreach($options as $option)
												<option value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('registration_no', 'Registration No#', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('registration_no',$primary->registration_no, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('aircraft_MM', 'Aircraft MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('aircraft_MM',$primary->aircraft_MM, array('class' => 'form-control','placeholder'=>'','required'=>'','disabled'=>'disabled'))}}
											</div>
											
                    </div>
		<div class="form-group required">
                                        
											{{Form::label('aircraft_MSN', 'Aircraft MSN', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('aircraft_MSN',$primary->aircraft_MSN, array('class' => 'form-control','placeholder'=>'','required'=>'','disabled'=>'disabled'))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('aircraft_operator', 'Aircraft Operator', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select id="organizations" name='aircraft_operator' class="demo-default" placeholder="Select  Operator...">
												<option value="{{$primary->aircraft_operator}}">{{$primary->aircraft_operator}}</option>
												@foreach($organizations as $organization)
												<option value="{{$organization}}">{{$organization}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('active', 'Yes',Input::old('active', $primary->active == 'Yes'),array()) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('active', 'No',Input::old('active', $primary->active == 'No'),array()) }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('registration', 'Registration ?', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('registration', 'Yes',Input::old('registration', $primary->registration == 'Yes'),array()) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('registration', 'No',Input::old('registration', $primary->registration == 'No'),array()) }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('cofa', 'CofA?', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('cofa', 'Yes',Input::old('cofa', $primary->cofa == 'Yes'),array()) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('cofa', 'No',Input::old('cofa', $primary->cofa == 'No'),array()) }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('stcs', 'STCs?', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('stcs', 'Yes',Input::old('stcs', $primary->stcs == 'Yes'),array()) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('stcs', 'No',Input::old('stcs', $primary->stcs == 'No'),array()) }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('current_exemptions', 'Current Exemptions?', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> {{ Form::radio('current_exemptions', 'Yes',Input::old('current_exemptions', $primary->current_exemptions == 'Yes'),array()) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('current_exemptions', 'No',Input::old('current_exemptions', $primary->current_exemptions == 'No'),array()) }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurance', 'Insurance?', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('insurance', 'Yes',Input::old('insurance', $primary->insurance == 'Yes'),array()) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('insurance', 'No',Input::old('insurance', $primary->insurance == 'No'),array()) }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('currently_leased', 'Currently Leased?', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('currently_leased', 'Yes',Input::old('currently_leased', $primary->currently_leased == 'Yes')) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('currently_leased', 'No',Input::old('currently_leased', $primary->currently_leased == 'No')) }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('memo', 'Memo', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('memo',$primary->memo, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					

                  
					<div class="form-group">
                       
                            <button type="submit" name='saveAndContinue' value='saveAndContinue' class="btn btn-primary btn-lg btn-block">Update</button>
                       
                    </div>
					
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
$('#organizations').selectize();	
$('#state_registration').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});	

});
</script>

@stop

@section('editTCIForm')
@foreach($tcData as $tc)	
<div class="modal fade" id="editTCIForm{{$tc->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update TCI </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/editTCI','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}

					{{Form::hidden('id',$tc->id)}}
					<div class="form-group required">
                                           
											{{Form::label('tc_number','TC Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_number',$tc->tc_number, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('tc_type_approval_date', 'Type Approval Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
											{{Form::select('tc_type_approval_date', $dates,CommonFunction::date($tc->tc_type_approval_date),array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('tc_type_approval_month',$months,CommonFunction::month($tc->tc_type_approval_date),array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('tc_type_approval_year',$years,CommonFunction::year($tc->tc_type_approval_date),array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_validation_date', 'Validation date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('tc_validation_date', $dates,$tc->tc_validation_date,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('tc_validation_month',$months,$tc->tc_validation_month,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('tc_validation_year',$years,$tc->tc_validation_year,array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('tc_type_acceptance_date', 'Type Acceptance Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('tc_type_acceptance_date', $dates,CommonFunction::date($tc->tc_type_acceptance_date),array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('tc_type_acceptance_month',$months,CommonFunction::month($tc->tc_type_acceptance_date),array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('tc_type_acceptance_year',$years,CommonFunction::year($tc->tc_type_acceptance_date),array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_control_number', 'Control Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_control_number',$tc->tc_control_number, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_AFM_approval_date', 'AFM Approval Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('tc_AFM_approval_date', $dates,$tc->tc_AFM_approval_date,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('tc_AFM_approval_month',$months,$tc->tc_AFM_approval_month,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('tc_AFM_approval_year',$years,$tc->tc_AFM_approval_year,array('class'=>'form-control'))}}
														</div>
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_AFM_revision', 'AFM Revision', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_AFM_revision',$tc->tc_AFM_revision, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_state_of_design', 'State Of Design ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_state_of_design',$tc->tc_state_of_design, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('tc_state_of_manufacturing', 'State Of Manufacturing ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_state_of_manufacturing',$tc->tc_state_of_manufacturing, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_power_plant_model', 'Power Plant Model ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_power_plant_model',$tc->tc_power_plant_model, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_power_plant_tds_number', 'Power Plant TDS Number ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_power_plant_tds_number',$tc->tc_power_plant_tds_number, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					
					
					<div class="form-group">
                                           
											{{Form::label('tc_propeller_model', 'Propeller Model', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_propeller_model',$tc->tc_propeller_model, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('tc_propeller_tds_number', 'Propeller TDS Number ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_propeller_tds_number',$tc->tc_propeller_tds_number, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>

					<div class="form-group">
                                           
											{{Form::label('tcds_no', 'TCDS No', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tcds_no',$tc->tcds_no, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('tcds_revision_date', 'TCDS Revision Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('tcds_revision_date', $dates,CommonFunction::date($tc->tcds_revision_date),array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('tcds_revision_month',$months,CommonFunction::month($tc->tcds_revision_date),array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('tcds_revision_year',$years,CommonFunction::year($tc->tcds_revision_date),array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('tcds_revision_no', 'TCDS Revision No', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tcds_revision_no',$tc->tcds_revision_no, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('tdcs_link', 'TCDS Link', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tdcs_link',$tc->tdcs_link, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					{{Form::hidden('old_tc_upload',$tc->tc_upload)}}
					<div class="form-group ">
                        	{{ Form::label('file', 'Update File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							@if($tc->tc_upload!='Null'){{HTML::link('files/air_tc_upload/'.$tc->tc_upload,'Document',array('target'=>'_blank'))}}
							@else
								{{HTML::link('#','No Document Provided')}}
							@endif
							 </div>
							<div class="col-xs-6">
							  {{ Form::file('tc_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
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
@stop
@section('editSTCForm')
	 @foreach($stcData as $stc)
<div class="modal fade" id="editSTCForm{{$stc->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Aircraft STC</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/editSTC','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
				
					{{Form::hidden('id',$stc->id)}}
					
					<div class="form-group required">
                                           
											{{Form::label('stc_number','STC Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('stc_number',$stc->stc_number, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('validation_date', 'Issuance date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('stc_validation_date', $dates,$stc->stc_validation_date,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('stc_validation_month',$months,$stc->stc_validation_month,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('stc_validation_year',$years,$stc->stc_validation_year,array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('afm_revision', 'AFM Revision Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('stc_afm_revision',$stc->stc_afm_revision, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>


					<div class="form-group ">
                                           
											{{Form::label('stc_AFM_revision_number', 'AFM Revision Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('stc_AFM_revision_number',$stc->stc_AFM_revision_number, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('stc_AFM_approval_date', 'AFM Approval Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('stc_AFM_approval_date', $dates,$stc->stc_AFM_approval_date,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('stc_AFM_approval_month',$months,$stc->stc_AFM_approval_month,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('stc_AFM_approval_year',$years,$stc->stc_AFM_approval_year,array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('stc_state_of_design', 'State Of Design ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('stc_state_of_design',$stc->stc_state_of_design, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('SOD_notified', 'SOD Notified ', array('class' => 'col-xs-4 control-label'))}}
											 <div class="col-xs-6">
										<div class="radio">
									 
									 <label> {{ Form::radio('stc_SOD_notified', 'Yes',Input::old('stc_SOD_notified', $stc->stc_SOD_notified == 'Yes'),array()) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('stc_SOD_notified', 'No',Input::old('stc_SOD_notified', $stc->stc_SOD_notified == 'No'),array()) }} &nbsp  No</label>
									 </div>
									 </div>
					</div>
					
					<div class="form-group ">
                                           
											{{Form::label('STC_purpose', 'Purpose', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('stc_purpose',$stc->stc_purpose, array('class' => 'form-control','placeholder'=>'','size'=>'4x3'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('STC_control_number', 'Control Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('stc_control_number',$stc->stc_control_number, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
                    {{Form::hidden('old_stc_upload',$stc->stc_upload)}}
                    <div class="form-group ">
                        	{{ Form::label('file', 'Update File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							@if($stc->stc_upload!='Null'){{HTML::link('files/air_stc_upload/'.$stc->stc_upload,'Document',array('target'=>'_blank'))}}
							@else
								{{HTML::link('#','No Document Provided')}}
							@endif
							 </div>
							<div class="col-xs-6">
							  {{ Form::file('stc_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
							</div>
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
@stop
@section('editExemptionForm')
 @foreach($exemptionData as $exemption)
<div class="modal fade" id="editExemptionForm{{$exemption->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Aircraft Exemption</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/editExemption','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
					{{Form::hidden('id',$exemption->id)}}
					<div class="form-group required">
                                           
											{{Form::label('exemption_number','Exemption Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('exemption_number',$exemption->exemption_number, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('regulation','Regulation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('regulation',$exemption->regulation, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('effective_date', 'Effective Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('effective_date', $dates,$exemption->effective_date,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('effective_month',$months,$exemption->effective_month,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('effective_year',$years,$exemption->effective_year,array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('exemption_control_number', 'Control Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('exemption_control_number',$exemption->exemption_control_number, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					
					
					<div class="form-group ">
                                           
											{{Form::label('basis', 'Basis', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('basis',$exemption->basis, array('class' => 'form-control','placeholder'=>'','size'=>'4x3'))}}
											</div>
											
                    </div>
					
                    <div class="form-group ">
                        	{{ Form::label('file', 'Update File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							@if($exemption->exemption_upload!='Null'){{HTML::link('files/air_exemption_upload/'.$exemption->exemption_upload,'Document',array('target'=>'_blank'))}}
							@else
								{{HTML::link('#','No Document Provided')}}
							@endif
							 </div>
							<div class="col-xs-6">
							  {{ Form::file('exemption_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
							</div>
                    </div>
                    {{Form::hidden('old_exemption_upload',$exemption->exemption_upload)}}
					<div class="form-group">
                       
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                       
                    </div>
					
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>
 @endforeach
@stop
@section('editRegistrationInfoForm')
 @foreach($registrationData as $registration)
<div class="modal fade" id="editRegistrationInfoForm{{$registration->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Aircraft Registration</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/editRegistrationInfo','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}

					{{Form::hidden('id',$registration->id)}}
					<div class="form-group required">
                                           
											{{Form::label('registration_number','Registration Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('registration_number',$registration->registration_number, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('reg_effective_date', 'Effective Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('reg_effective_date', $dates,$registration->reg_effective_date,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('reg_effective_month',$months,$registration->reg_effective_month,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('reg_effective_year',$years,$registration->reg_effective_year,array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('state_of_registration','State Of Registration', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('state_of_registration',$registration->state_of_registration, array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('activation_control_number', 'Activation Control Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('activation_control_number',$registration->activation_control_number, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('reg_expiration_date', 'Expiration Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('reg_expiration_date', $dates,$registration->reg_expiration_date,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('reg_expiration_month',$months,$registration->reg_expiration_month,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('reg_expiration_year',$years,$registration->reg_expiration_year,array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('registry_number', 'Registry Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('registry_number',$registration->registry_number, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('de_registration_date', 'De-Registration Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('de_registration_date', $dates,$registration->de_registration_date,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('de_registration_month',$months,$registration->de_registration_month,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('de_registration_year',$years,$registration->de_registration_year,array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('de_regisration_control_number', 'De-Registration Control#', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('de_regisration_control_number',$registration->de_regisration_control_number, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('de_regisration_basis', 'De-Registration Basis', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('de_regisration_basis',$registration->de_regisration_basis, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('previous_state_registration', 'Previous State Registration', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('previous_state_registration',$registration->previous_state_registration, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('status_memo', 'Status Memo', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('reg_status_memo',$registration->reg_status_memo, array('class' => 'form-control','placeholder'=>'','size'=>'4x3'))}}
											</div>
											
                    </div>
					{{Form::hidden('old_registration_upload',$registration->registration_upload)}}
                    <div class="form-group ">
                        	{{ Form::label('file', 'Update File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							@if($registration->registration_upload!='Null'){{HTML::link('files/air_registration_upload/'.$registration->registration_upload,'Document',array('target'=>'_blank'))}}
							@else
								{{HTML::link('#','No Document Provided')}}
							@endif
							 </div>
							<div class="col-xs-6">
							  {{ Form::file('registration_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
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
@stop
@section('editACForm')
 @foreach($airworthinessData as $airworthiness)
<div class="modal fade" id="editACForm{{$airworthiness->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Aircraft C of A</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/editAC','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
					{{Form::hidden('id',$airworthiness->id)}}
					<div class="form-group required">
                                           
											{{Form::label('ac_effective_date', 'Effective Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('ac_effective_date', $dates,$airworthiness->ac_effective_date,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('ac_effective_month',$months,$airworthiness->ac_effective_month,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('ac_effective_year',$years,$airworthiness->ac_effective_year,array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('ac_cofa_type','CofA Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">{{Form::select('ac_cofa_type',array(''=>'--Select--','Standard'=>'Standard','Provisional'=>'Provisional','Experimental'=>'Experimental','Ferry'=>'Ferry','Export'=>'Export','No Choice'=>'No Choice'),$airworthiness->ac_cofa_type,array('class'=>'form-control'))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('ac_category', 'Category', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('ac_category',$airworthiness->ac_category, array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('ac_activation_control_number', 'Activation Control#', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('ac_activation_control_number',$airworthiness->ac_activation_control_number, array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('c_of_a_number', 'C of A Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('c_of_a_number',$airworthiness->c_of_a_number, array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('ac_expiration_date', 'Expiration Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('ac_expiration_date', $dates,$airworthiness->ac_expiration_date,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('ac_expiration_month',$months,$airworthiness->ac_expiration_month,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('ac_expiration_year',$years,$airworthiness->ac_expiration_year,array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('max_gross_take_off_weight', 'Max Gross Take-off Weight', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('max_gross_take_off_weight',$airworthiness->max_gross_take_off_weight, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('max_pax_seating_capacity', 'Max Pax Seating Capacity', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('max_pax_seating_capacity',$airworthiness->max_pax_seating_capacity, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('mode_s_code', 'Mode S Code', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('mode_s_code',$airworthiness->mode_s_code, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('ac_deactivation_date', 'Deactivation Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('ac_deactivation_date', $dates,$airworthiness->ac_deactivation_date,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('ac_deactivation_month',$months,$airworthiness->ac_deactivation_month,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('ac_deactivation_year',$years,$airworthiness->ac_deactivation_year,array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('ac_deactivation_basis', 'Deactivation Basis', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('ac_deactivation_basis',$airworthiness->ac_deactivation_basis, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('ac_deactivation_control_number', 'Deactivation Control Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('ac_deactivation_control_number',$airworthiness->ac_deactivation_control_number, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('system_of_airwothiness', 'System Of Airworthiness', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('system_of_airwothiness',$airworthiness->system_of_airwothiness, array('class' => 'form-control','placeholder'=>'','size'=>'4x3'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('ac_status_memo', 'Status Memo', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('ac_status_memo',$airworthiness->ac_status_memo, array('class' => 'form-control','placeholder'=>'','size'=>'4x3'))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('ac_exemption', 'Exemption', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('ac_exemption',$airworthiness->ac_exemption, array('class' => 'form-control','placeholder'=>'','size'=>'4x3'))}}
											</div>
											
                    </div>
					 {{Form::hidden('old_ac_upload',$airworthiness->ac_upload)}}
                    <div class="form-group ">
                        	{{ Form::label('file', 'Update File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							@if($airworthiness->ac_upload!='Null'){{HTML::link('files/air_ac_upload/'.$airworthiness->ac_upload,'Document',array('target'=>'_blank'))}}
							@else
								{{HTML::link('#','No Document Provided')}}
							@endif
							 </div>
							<div class="col-xs-6">
							  {{ Form::file('ac_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
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
@stop
@section('editApprovalForm')
 @foreach($approvalData as $approval)
<div class="modal fade" id="editApprovalForm{{$approval->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Aircraft CAA Approval</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->{{Form::open(array('url'=>'aircraft/editApproval','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
					{{Form::hidden('id',$approval->id)}}
					
					<div class="form-group required">
                                           
											{{Form::label('type_of_approval','Type Of Approval', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">{{Form::select('type_of_approval',array(''=>'--Select--',
											'AOC Operations'=>'AOC Operations',
											'Approved Passengers'=>'Approved Passengers',
											'Approved Payload'=>'Approved Payload',
											'Area Navigation'=>'Area Navigation',
											'AWC Operations'=>'AWC Operations',
											'Cargo System'=>'Cargo System',
											'CAT II Approaches'=>'CAT II Approaches',
											'CAT III Approaches'=>'CAT III Approaches',
											'Continuous Airworthiness'=>'Continuous Airworthiness',
											'GPS Vertical Navigation'=>'GPS Vertical Navigation',
											'Instrument Flight Rules'=>'Instrument Flight Rules',
											'Landing Gross Weight'=>'Landing Gross Weight',
											'MNPS Airspace'=>'MNPS Airspace',
											'NORPAC Airspace'=>'NORPAC Airspace',
											'RVSM'=>'RVSM',
											'Take-off Gross Weight'=>'Take-off Gross Weight',
											'Visual Flight Rules'=>'Visual Flight Rules',
											'No Choice'=>'No Choice'
											),$approval->type_of_approval,array('class'=>'form-control','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('approval_effective_date', 'Effective Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('approval_effective_date', $dates,$approval->approval_effective_date,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('approval_effective_month',$months,$approval->approval_effective_month,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('approval_effective_year',$years,$approval->approval_effective_year,array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
					
					
					
					
					<div class="form-group ">
                                           
											{{Form::label('approval_control_number', 'Control Number#', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('approval_control_number',$approval->approval_control_number, array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
				
					
					<div class="form-group ">
                                           
											{{Form::label('rescinded_date', 'Date Rescinded', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('rescinded_date', $dates,$approval->rescinded_date,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('rescinded_month',$months,$approval->rescinded_month,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('rescinded_year',$years,$approval->rescinded_year,array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('rescinded_control_number', 'Rescinded Control Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('rescinded_control_number',$approval->rescinded_control_number, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('limiting_factor', 'Limiting Factor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('limiting_factor',$approval->limiting_factor, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('terms_of_approval_memo', 'Terms Of Approval Memo', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('terms_of_approval_memo',$approval->terms_of_approval_memo, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					{{Form::hidden('old_approval_upload',$approval->approval_upload)}}
                    <div class="form-group ">
                        	{{ Form::label('file', 'Update File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							@if($approval->approval_upload!='Null'){{HTML::link('files/air_approval_upload/'.$approval->approval_upload,'Document',array('target'=>'_blank'))}}
							@else
								{{HTML::link('#','No Document Provided')}}
							@endif
							 </div>
							<div class="col-xs-6">
							  {{ Form::file('approval_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
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
@stop
@section('editOwnerForm')
 @foreach($ownerData as $owner)
<div class="modal fade" id="editOwnerForm{{$owner->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Aircraft Owner Information</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/editOwner','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
						{{Form::hidden('id',$owner->id)}}
					
					<div class="form-group  required">
                                           
											{{Form::label('owner_name', 'Owner', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_name',$owner->owner_name, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('owner_effective_date', 'Effective Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('owner_effective_date', $dates,$owner->owner_effective_date,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('owner_effective_month',$months,$owner->owner_effective_month,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('owner_effective_year',$years,$owner->owner_effective_year,array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('owner_address1', 'Address 1', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('owner_address1',$owner->owner_address1, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('owner_address2', 'Address 2', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('owner_address2',$owner->owner_address2, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('owner_phone', 'Phone', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_phone',$owner->owner_phone, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('owner_fax', 'Fax', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_fax',$owner->owner_fax, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('owner_email', 'Email', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_email',$owner->owner_email, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('owner_city', 'City', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_city',$owner->owner_city, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('owner_state_or_province', 'State/ Province', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_state_or_province',$owner->owner_state_or_province, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('owner_postal_code', 'Postal Code', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_postal_code',$owner->owner_postal_code, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('owner_country', 'Country', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_country',$owner->owner_country, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					
					<div class="form-group ">
                                           
											{{Form::label('owner_lessor', 'Lessor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_lessor',$owner->owner_lessor, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					{{Form::hidden('old_owner_upload',$owner->owner_upload)}}
                    <div class="form-group ">
                        	{{ Form::label('file', 'Update File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							@if($owner->owner_upload!='Null'){{HTML::link('files/air_owner_upload/'.$owner->owner_upload,'Document',array('target'=>'_blank'))}}
							@else
								{{HTML::link('#','No Document Provided')}}
							@endif
							 </div>
							<div class="col-xs-6">
							  {{ Form::file('owner_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
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
@stop
@section('editLesseeForm')
 @foreach($lesseeData as $lessee)
<div class="modal fade" id="editLesseeForm{{$lessee->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Aircraft Lessee</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/editLessee','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
					{{Form::hidden('id',$lessee->id)}}
					<div class="form-group  required">
                                           
											{{Form::label('lessee', 'Lessee', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee',$lessee->lessee, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('lessee_effective_date', 'Effective Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('lessee_effective_date', $dates,$lessee->lessee_effective_date,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('lessee_effective_month',$months,$lessee->lessee_effective_month,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('lessee_effective_year',$years,$lessee->lessee_effective_year,array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('lessee_address1', 'Address 1', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('lessee_address1',$lessee->lessee_address1, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('lessee_address2', 'Address 2', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('lessee_address2',$lessee->lessee_address2, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('lessee_phone', 'Phone', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee_phone',$lessee->lessee_phone, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('lessee_fax', 'Fax', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee_fax',$lessee->lessee_fax, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('lessee_email', 'Email', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee_email',$lessee->lessee_email, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('lessee_city', 'City', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee_city',$lessee->lessee_city, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('lessee_state_or_province', 'State/ Province', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee_state_or_province',$lessee->lessee_state_or_province, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('lessee_postal_code', 'Postal Code', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee_postal_code',$lessee->lessee_postal_code, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('lessee_country', 'Country', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee_country',$lessee->lessee_country, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    {{Form::hidden('old_lesse_upload',$lessee->lesse_upload)}}
					<div class="form-group ">
                        	{{ Form::label('file', 'Update File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							@if($lessee->lesse_upload!='Null'){{HTML::link('files/air_lesse_upload/'.$lessee->lesse_upload,'Document',array('target'=>'_blank'))}}
							@else
								{{HTML::link('#','No Document Provided')}}
							@endif
							 </div>
							<div class="col-xs-6">
							  {{ Form::file('lesse_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
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
@stop
@section('editInsurerForm')
 @foreach($insurerData as $insurer)
<div class="modal fade" id="editInsurerForm{{$insurer->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Aircraft Insurer </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/editInsurer','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
					{{Form::hidden('id',$insurer->id)}}
					<div class="form-group  ">
                                           
											{{Form::label('insurer_name', 'Insurer Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_name',$insurer->insurer_name, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group  ">
                                           
											{{Form::label('name_insured', 'Name Insured', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('name_insured',$insurer->name_insured, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
				    <div class="form-group ">
                                           
											{{Form::label('insurer_address1', 'Address 1', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('insurer_address1',$insurer->insurer_address1, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_address2', 'Address 2', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('insurer_address2',$insurer->insurer_address2, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_phone', 'Phone', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_phone',$insurer->insurer_phone, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_fax', 'Fax', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_fax',$insurer->insurer_fax, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_email', 'Email', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_email',$insurer->insurer_email, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('insurer_city', 'City', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_city',$insurer->insurer_city, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_state_or_province', 'State/ Province', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_state_or_province',$insurer->insurer_state_or_province, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_postal_code', 'Postal Code', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_postal_code',$insurer->insurer_postal_code, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('insurer_country', 'Country', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_country',$insurer->insurer_country, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_liability_amount', 'Liability Amount', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_liability_amount',$insurer->insurer_liability_amount, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_effective_date', 'Effective Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('insurer_effective_date', $dates,$insurer->insurer_effective_date,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('insurer_effective_month',$months,$insurer->insurer_effective_month,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('insurer_effective_year',$years,$insurer->insurer_effective_year,array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_expiration_date', 'Expiration Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('insurer_expiration_date', $dates,$insurer->insurer_expiration_date,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('insurer_expiration_month',$months,$insurer->insurer_expiration_month,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('insurer_expiration_year',$years,$insurer->insurer_expiration_year,array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
                    {{Form::hidden('old_insurer_upload',$insurer->insurer_upload)}}
					<div class="form-group ">
                        	{{ Form::label('file', 'Update File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							@if($insurer->insurer_upload!='Null'){{HTML::link('files/air_insurer_upload/'.$insurer->insurer_upload,'Document',array('target'=>'_blank'))}}
							@else
								{{HTML::link('#','No Document Provided')}}
							@endif
							 </div>
							<div class="col-xs-6">
							  {{ Form::file('insurer_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
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
@stop
@section('editEquipmentReviewForm')
 @foreach($equipmentData as $equipment)
<div class="modal fade" id="editEquipmentReviewForm{{$equipment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Aircraft Equipment Review </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/editEquipmentReview','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
					{{Form::hidden('id',$equipment->id)}}
					<div class="form-group ">
                                           
											{{Form::label('review_date', 'Date of Review', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('review_date', $dates,$equipment->review_date,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('review_month',$months,$equipment->review_month,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('review_year',$years,$equipment->review_year,array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
					
					<div class="form-group required">
                                           
											{{Form::label('review_active', 'Active', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('review_active', 'Yes',Input::old('review_active', $equipment->review_active == 'Yes'),array()) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('review_active', 'No',Input::old('review_active', $equipment->review_active == 'No'),array()) }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					
					<div class="form-group required ">
                                           
											{{Form::label('purpose_of_review', 'Purpose Of Review', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::select('purpose_of_review',array(
												''=>'--Select--',
												'After Accident'=>'After Accident',
												'After Incident'=>'After Incident',
												'Annual Inspection'=>'Annual Inspection',
												'Issue CofA'=>'Issue CofA'												
												),$equipment->purpose_of_review,array('class'=>'form-control','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required ">
                                           
											{{Form::label('location', 'Location', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('location',$equipment->location,array('class' => 'form-control','placeholder'=>''))}}
											{{--Form::select('location',array(
									''=>'--Select--',
									'KBHM-Birmingham International'=>'KBHM-Birmingham International',
									'KATL-Atlanta-Harts-field International'=>'KATL-Atlanta-Harts-field International',
									'KCHA-Chattanooga'=>'KCHA-Chattanooga',
									'KMIA- Miami International'=>'KMIA- Miami International'
													),$equipment->location,array('class'=>'form-control','required'=>''))--}}
											</div>
											
                    </div>
					
					<div class="form-group  required">
                                           
											{{Form::label('airframe_hours', 'Airframe Hours', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('airframe_hours',$equipment->airframe_hours, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					
				    <div class="form-group ">
                                           
											{{Form::label('engine1_hours', 'Engine #1 Hours', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('engine1_hours',$equipment->engine1_hours, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('engine2_hours', 'Engine #2 Hours', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('engine2_hours',$equipment->engine2_hours, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('engine1_TSO', 'Engine #1 TSO', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('engine1_TSO',$equipment->engine1_TSO, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('engine2_TSO', 'Engine #2 TSO', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('engine2_TSO',$equipment->engine2_TSO, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('engine1_MMS', 'Engine #1 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('engine1_MMS',$equipment->engine1_MMS, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('engine2_MMS', 'Engine #2 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('engine2_MMS',$equipment->engine2_MMS, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('prop_rotor1_MMS', 'Prop Rotor #1 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('prop_rotor1_MMS',$equipment->prop_rotor1_MMS, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('prop_rotor2_MMS', 'Prop Rotor #2 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('prop_rotor2_MMS',$equipment->prop_rotor2_MMS, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('governor1_MMS', 'Governor #1 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('governor1_MMS',$equipment->governor1_MMS, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('governor2_MMS', 'Governor #2 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('governor2_MMS',$equipment->governor2_MMS, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('nav1_MMS', 'Nav #1 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('nav1_MMS',$equipment->nav1_MMS, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('nav2_MMS', 'Nav #2 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('nav2_MMS',$equipment->nav2_MMS, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('gps_mm', 'GPS MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('gps_mm',$equipment->gps_mm, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('adf_mm', 'ADF MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('adf_mm',$equipment->adf_mm, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('ils_mm', 'ILS MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('ils_mm',$equipment->ils_mm, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('vnav_mm', 'VNAV MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('vnav_mm',$equipment->vnav_mm, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('comm1_mm', 'Comm #1 MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('comm1_mm',$equipment->comm1_mm, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('comm2_mm', 'Comm #2 MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('comm2_mm',$equipment->comm2_mm, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
					
				    <div class="form-group ">
                                           
											{{Form::label('lr_comm_mm', 'LR Comm  MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lr_comm_mm',$equipment->lr_comm_mm, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('tcas_mm', 'TCAS  MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tcas_mm',$equipment->tcas_mm, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('transponder_mm', 'Transponder  MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('transponder_mm',$equipment->transponder_mm, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
					
				    <div class="form-group ">
                                           
											{{Form::label('transponder_mode', 'Transponder  Mode', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('transponder_mode',$equipment->transponder_mode, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('fdr_mm', 'FDR MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('fdr_mm',$equipment->fdr_mm, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('fdr_mode', 'FDR Mode', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('fdr_mode',$equipment->fdr_mode, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('fdr_pinger_type', 'FDR Pinger Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('fdr_pinger_type',$equipment->fdr_pinger_type, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('cvr_mm', 'CVR MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('cvr_mm',$equipment->cvr_mm, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('elt_mm', 'ELT MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('elt_mm',$equipment->elt_mm, array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('note', 'Note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('note',$equipment->note, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>											
                    </div>
					{{Form::hidden('old_equip_upload',$equipment->equip_upload)}}
					<div class="form-group ">
                        	{{ Form::label('file', 'Update File: ',array('class'=>'control-label col-xs-4')) }}
							 <div class="col-xs-6">
							@if($equipment->equip_upload!='Null'){{HTML::link('files/air_equip_upload/'.$equipment->equip_upload,'Document',array('target'=>'_blank'))}}
							@else
								{{HTML::link('#','No Document Provided')}}
							@endif
							 </div>
							<div class="col-xs-6">
							  {{ Form::file('equip_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
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
@stop