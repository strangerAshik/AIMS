
@section('PrimaryInfoForm')

{{-- @new_aircraft.blade.php--}}
@stop

@section('TCIForm')
<div class="modal fade" id="TCIForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">TCI Entry Form</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/saveTCI','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}

					{{Form::hidden('aircraft_MM',$primary->aircraft_MM)}}
					{{Form::hidden('aircraft_MSN',$primary->aircraft_MSN)}}
					<div class="form-group required">
                                           
											{{Form::label('tc_number','TC Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_number','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_type_approval_date', 'Type Approval Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('tc_type_approval_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('tc_type_approval_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('tc_type_approval_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_validation_date', 'Validation date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('tc_validation_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('tc_validation_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('tc_validation_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('tc_type_acceptance_date', 'Type Acceptance Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('tc_type_acceptance_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('tc_type_acceptance_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('tc_type_acceptance_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_control_number', 'Control Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_control_number','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_AFM_approval_date', 'AFM Approval Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('tc_AFM_approval_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('tc_AFM_approval_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('tc_AFM_approval_year',$years,'0',array('class'=>'form-control'))}}
														</div>
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_AFM_revision', 'AFM Revision', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_AFM_revision','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_state_of_design', 'State Of Design ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_state_of_design','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_state_of_manufacturing', 'State Of Manufacturing ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_state_of_manufacturing','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
			
					
					<div class="form-group ">
                                           
											{{Form::label('tc_power_plant_model', 'Power Plant Model ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_power_plant_model','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('tc_power_plant_tds_number', 'Power Plant TDS Number ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_power_plant_tds_number','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					
					
					<div class="form-group">
                                           
											{{Form::label('tc_propeller_model', 'Propeller Model', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_propeller_model','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('tc_propeller_tds_number', 'Propeller TDS Number ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tc_propeller_tds_number','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('tcds_no', 'TCDS No', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tcds_no','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('tcds_revision_date', 'TCDS Revision Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('tcds_revision_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('tcds_revision_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('tcds_revision_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('tcds_revision_no', 'TCDS Revision No', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tcds_revision_no','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('tdcs_link', 'TCDS Link', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tdcs_link','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					
					
					
					<div class="form-group ">
                                           
											{{Form::label('tc_upload', 'Upload Document ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('tc_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
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
@stop
@section('STCForm')
<div class="modal fade" id="STCForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Aircraft STC Entry Form</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/saveSTC','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
				
					{{Form::hidden('aircraft_MM',$primary->aircraft_MM)}}
					{{Form::hidden('aircraft_MSN',$primary->aircraft_MSN)}}
					
					<div class="form-group required">
                                           
											{{Form::label('stc_number','STC Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('stc_number','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('validation_date', 'Issuance date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('stc_validation_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('stc_validation_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('stc_validation_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('afm_revision', 'AFM Revision Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('stc_afm_revision','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('stc_AFM_revision_number', 'AFM Revision Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('stc_AFM_revision_number','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('stc_AFM_approval_date', 'AFM Approval Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('stc_AFM_approval_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('stc_AFM_approval_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('stc_AFM_approval_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('stc_state_of_design', 'State Of Design ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('stc_state_of_design','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('SOD_notified', 'SOD Notified ', array('class' => 'col-xs-4 control-label'))}}
								 <div class="col-xs-6">
										<div class="radio">
									 
											  <label> <label> {{ Form::radio('stc_SOD_notified', 'Yes',true) }} &nbsp  Yes</label>
											 <label> {{ Form::radio('stc_SOD_notified', 'No') }} &nbsp  No</label>
										</div>
									
								</div>
											
                    </div>
                    
					<div class="form-group ">
                                           
											{{Form::label('STC_purpose', 'Purpose', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('stc_purpose','', array('class' => 'form-control','placeholder'=>'','size'=>'4x3'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('STC_control_number', 'Control Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('stc_control_number','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('stc_upload', 'Upload Document ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('stc_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
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

@stop
@section('exemptionForm')
<div class="modal fade" id="exemptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Aircraft Exemption Entry Form</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/saveExemption','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}

					
					{{Form::hidden('aircraft_MM',$primary->aircraft_MM)}}
					{{Form::hidden('aircraft_MSN',$primary->aircraft_MSN)}}
					<div class="form-group required">
                                           
											{{Form::label('exemption_number','Exemption Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('exemption_number','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('regulation','Regulation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('regulation','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('effective_date', 'Effective Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('effective_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('effective_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('effective_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('exemption_control_number', 'Control Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('exemption_control_number','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					
					
					<div class="form-group ">
                                           
											{{Form::label('basis', 'Basis', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('basis','', array('class' => 'form-control','placeholder'=>'','size'=>'4x3'))}}
											</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('exemption_upload', 'Upload Document ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('exemption_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
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
@stop
@section('registrationInfoForm')
<div class="modal fade" id="registrationInfoForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Aircraft Registration Entry Form</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/saveRegistrationInfo','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}

					
					{{Form::hidden('aircraft_MM',$primary->aircraft_MM)}}
					{{Form::hidden('aircraft_MSN',$primary->aircraft_MSN)}}
					<div class="form-group required">
                                           
											{{Form::label('registration_number','Registration Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('registration_number','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('reg_effective_date', 'Effective Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('reg_effective_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('reg_effective_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('reg_effective_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('state_of_registration','State Of Registration', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('state_of_registration','', array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('activation_control_number', 'Activation Control Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('activation_control_number','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('reg_expiration_date', 'Expiration Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('reg_expiration_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('reg_expiration_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('reg_expiration_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('registry_number', 'Registry Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('registry_number','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('de_registration_date', 'De-Registration Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('de_registration_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('de_registration_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('de_registration_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('de_regisration_control_number', 'De-Registration Control#', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('de_regisration_control_number','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('de_regisration_basis', 'De-Registration Basis', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('de_regisration_basis','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('previous_state_registration', 'Previous State Registration', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('previous_state_registration','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('status_memo', 'Status Memo', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('reg_status_memo','', array('class' => 'form-control','placeholder'=>'','size'=>'4x3'))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('registration_upload', 'Upload Document ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('registration_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
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
@stop
@section('ACForm')
<div class="modal fade" id="ACForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Aircraft C of A Entry Form</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/saveAC','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
					
					{{Form::hidden('aircraft_MM',$primary->aircraft_MM)}}
					{{Form::hidden('aircraft_MSN',$primary->aircraft_MSN)}}
					
					
					<div class="form-group required">
                                           
											{{Form::label('ac_effective_date', 'Effective Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('ac_effective_date', $dates,'0',array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('ac_effective_month',$months,'0',array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('ac_effective_year',$years,'0',array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('ac_cofa_type','CofA Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">{{Form::select('ac_cofa_type',array(''=>'--Select--','Standard'=>'Standard','Provisional'=>'Provisional','Experimental'=>'Experimental','Ferry'=>'Ferry','Export'=>'Export','No Choice'=>'No Choice'),'0',array('class'=>'form-control'))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('ac_category', 'Category', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('ac_category','', array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('ac_activation_control_number', 'Activation Control#', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('ac_activation_control_number','', array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('c_of_a_number', 'C of A Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('c_of_a_number','', array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('ac_expiration_date', 'Expiration Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('ac_expiration_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('ac_expiration_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('ac_expiration_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('max_gross_take_off_weight', 'Max Gross Take-off Weight', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('max_gross_take_off_weight','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('max_pax_seating_capacity', 'Max Pax Seating Capacity', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('max_pax_seating_capacity','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('mode_s_code', 'Mode S Code', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('mode_s_code','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('ac_deactivation_date', 'Deactivation Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('ac_deactivation_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('ac_deactivation_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('ac_deactivation_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('ac_deactivation_basis', 'Deactivation Basis', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('ac_deactivation_basis','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('ac_deactivation_control_number', 'Deactivation Control Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('ac_deactivation_control_number','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('system_of_airwothiness', 'System Of Airworthiness', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('system_of_airwothiness','', array('class' => 'form-control','placeholder'=>'','size'=>'4x3'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('ac_status_memo', 'Status Memo', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('ac_status_memo','', array('class' => 'form-control','placeholder'=>'','size'=>'4x3'))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('ac_exemption', 'Exemption', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('ac_exemption','', array('class' => 'form-control','placeholder'=>'','size'=>'4x3'))}}
											</div>
											
                    </div>

					<div class="form-group ">
                                           
											{{Form::label('ac_upload', 'Upload Document ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('ac_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
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
@stop
@section('approvalForm')
<div class="modal fade" id="approvalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Aircraft CAA Approval Entry Form</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->{{Form::open(array('url'=>'aircraft/saveApproval','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
					
					
					{{Form::hidden('aircraft_MM',$primary->aircraft_MM)}}
					{{Form::hidden('aircraft_MSN',$primary->aircraft_MSN)}}
					
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
											),'0',array('class'=>'form-control','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('approval_effective_date', 'Effective Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('approval_effective_date', $dates,'0',array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('approval_effective_month',$months,'0',array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('approval_effective_year',$years,'0',array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
					
					
					
					
					<div class="form-group ">
                                           
											{{Form::label('approval_control_number', 'Control Number#', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('approval_control_number','', array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
				
					
					<div class="form-group ">
                                           
											{{Form::label('rescinded_date', 'Date Rescinded', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('rescinded_date', $dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('rescinded_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('rescinded_year',$years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('rescinded_control_number', 'Rescinded Control Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('rescinded_control_number','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('limiting_factor', 'Limiting Factor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('limiting_factor','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('terms_of_approval_memo', 'Terms Of Approval Memo', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('terms_of_approval_memo','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('approval_upload', 'Upload Document ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('approval_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
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
@stop
@section('ownerForm')
<div class="modal fade" id="ownerForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Aircraft Owner Entry Form</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/saveOwner','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
						
						
					{{Form::hidden('aircraft_MM',$primary->aircraft_MM)}}
					{{Form::hidden('aircraft_MSN',$primary->aircraft_MSN)}}
				
					
					
					
					
					
					<div class="form-group  required">
                                           
											{{Form::label('owner_name', 'Owner', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_name','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('owner_effective_date', 'Effective Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('owner_effective_date', $dates,'0',array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('owner_effective_month',$months,'0',array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('owner_effective_year',$years,'0',array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('owner_address1', 'Address 1', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('owner_address1','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('owner_address2', 'Address 2', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('owner_address2','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('owner_phone', 'Phone', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_phone','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('owner_fax', 'Fax', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_fax','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('owner_email', 'Email', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_email','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('owner_city', 'City', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_city','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('owner_state_or_province', 'State/ Province', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_state_or_province','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('owner_postal_code', 'Postal Code', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_postal_code','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('owner_country', 'Country', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_country','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					
					<div class="form-group ">
                                           
											{{Form::label('owner_lessor', 'Lessor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('owner_lessor','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('owner_upload', 'Upload Document ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('owner_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
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
@stop
@section('lesseeForm')
<div class="modal fade" id="lesseeForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Aircraft Lessee Entry Form</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/saveLessee','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}

				
					
					{{Form::hidden('aircraft_MM',$primary->aircraft_MM)}}
					{{Form::hidden('aircraft_MSN',$primary->aircraft_MSN)}}
					
					
					
					
					<div class="form-group  required">
                                           
											{{Form::label('lessee', 'Lessee', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('lessee_effective_date', 'Effective Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('lessee_effective_date', $dates,'0',array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('lessee_effective_month',$months,'0',array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('lessee_effective_year',$years,'0',array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('lessee_address1', 'Address 1', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('lessee_address1','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('lessee_address2', 'Address 2', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('lessee_address2','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('lessee_phone', 'Phone', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee_phone','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('lessee_fax', 'Fax', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee_fax','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('lessee_email', 'Email', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee_email','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('lessee_city', 'City', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee_city','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('lessee_state_or_province', 'State/ Province', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee_state_or_province','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('lessee_postal_code', 'Postal Code', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee_postal_code','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('lessee_country', 'Country', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lessee_country','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('lesse_upload', 'Upload Document ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('lesse_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
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
@stop
@section('insurerForm')
<div class="modal fade" id="insurerForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Aircraft Insurer Entry Form</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/saveInsurer','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}

					
					{{Form::hidden('aircraft_MM',$primary->aircraft_MM)}}
					{{Form::hidden('aircraft_MSN',$primary->aircraft_MSN)}}					
					
					
					
					
					<div class="form-group  ">
                                           
											{{Form::label('insurer_name', 'Insurer Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_name','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group  ">
                                           
											{{Form::label('name_insured', 'Name Insured', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('name_insured','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
				    <div class="form-group ">
                                           
											{{Form::label('insurer_address1', 'Address 1', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('insurer_address1','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_address2', 'Address 2', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('insurer_address2','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_phone', 'Phone', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_phone','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_fax', 'Fax', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_fax','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_email', 'Email', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_email','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('insurer_city', 'City', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_city','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_state_or_province', 'State/ Province', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_state_or_province','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_postal_code', 'Postal Code', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_postal_code','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('insurer_country', 'Country', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_country','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_liability_amount', 'Liability Amount', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('insurer_liability_amount','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_effective_date', 'Effective Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('insurer_effective_date', $dates,'0',array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('insurer_effective_month',$months,'0',array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('insurer_effective_year',$years,'0',array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurer_expiration_date', 'Expiration Date', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('insurer_expiration_date', $dates,'0',array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('insurer_expiration_month',$months,'0',array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('insurer_expiration_year',$years,'0',array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('insurer_upload', 'Upload Document ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('insurer_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
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
@stop
@section('equipmentReviewForm')
<div class="modal fade" id="equipmentReviewForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Aircraft Equipment Review Entry Form</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/saveEquipmentReview','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}

					
					{{Form::hidden('aircraft_MM',$primary->aircraft_MM)}}
					{{Form::hidden('aircraft_MSN',$primary->aircraft_MSN)}}
					
					<div class="form-group ">
                                           
											{{Form::label('review_date', 'Date of Review', array('class' => 'col-xs-4 control-label'))}}
											
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('review_date', $dates,'0',array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('review_month',$months,'0',array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('review_year',$years,'0',array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
											
                    </div>
					
					<div class="form-group required">
                                           
											{{Form::label('review_active', 'Active', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('review_active', 'Yes',true) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('review_active', 'No') }} &nbsp  No</label>
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
												),'0',array('class'=>'form-control','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required ">
                                           
											{{Form::label('location', 'Location', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('location','',array('class' => 'form-control','placeholder'=>''))}}
											{{--Form::select('location',array(
									''=>'--Select--',
									'KBHM-Birmingham International'=>'KBHM-Birmingham International',
									'KATL-Atlanta-Harts-field International'=>'KATL-Atlanta-Harts-field International',
									'KCHA-Chattanooga'=>'KCHA-Chattanooga',
									'KMIA- Miami International'=>'KMIA- Miami International'
													),'0',array('class'=>'form-control','required'=>''))--}}
											</div>
											
                    </div>
					
					<div class="form-group  required">
                                           
											{{Form::label('airframe_hours', 'Airframe Hours', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('airframe_hours','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					
				    <div class="form-group ">
                                           
											{{Form::label('engine1_hours', 'Engine #1 Hours', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('engine1_hours','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('engine2_hours', 'Engine #2 Hours', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('engine2_hours','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('engine1_TSO', 'Engine #1 TSO', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('engine1_TSO','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('engine2_TSO', 'Engine #2 TSO', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('engine2_TSO','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('engine1_MMS', 'Engine #1 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('engine1_MMS','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('engine2_MMS', 'Engine #2 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('engine2_MMS','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('prop_rotor1_MMS', 'Prop Rotor #1 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('prop_rotor1_MMS','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('prop_rotor2_MMS', 'Prop Rotor #2 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('prop_rotor2_MMS','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('governor1_MMS', 'Governor #1 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('governor1_MMS','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('governor2_MMS', 'Governor #2 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('governor2_MMS','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('nav1_MMS', 'Nav #1 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('nav1_MMS','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('nav2_MMS', 'Nav #2 MMS', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('nav2_MMS','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('gps_mm', 'GPS MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('gps_mm','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('adf_mm', 'ADF MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('adf_mm','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('ils_mm', 'ILS MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('ils_mm','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('vnav_mm', 'VNAV MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('vnav_mm','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('comm1_mm', 'Comm #1 MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('comm1_mm','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('comm2_mm', 'Comm #2 MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('comm2_mm','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
					
				    <div class="form-group ">
                                           
											{{Form::label('lr_comm_mm', 'LR Comm  MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('lr_comm_mm','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('tcas_mm', 'TCAS  MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('tcas_mm','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('transponder_mm', 'Transponder  MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('transponder_mm','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
					
				    <div class="form-group ">
                                           
											{{Form::label('transponder_mode', 'Transponder  Mode', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('transponder_mode','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('fdr_mm', 'FDR MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('fdr_mm','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('fdr_mode', 'FDR Mode', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('fdr_mode','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('fdr_pinger_type', 'FDR Pinger Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('fdr_pinger_type','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('cvr_mm', 'CVR MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('cvr_mm','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('elt_mm', 'ELT MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('elt_mm','', array('class' => 'form-control','placeholder'=>''))}}
											</div>											
                    </div>
				    <div class="form-group ">
                                           
											{{Form::label('note', 'Note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('note','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>											
                    </div>
					
					
					<div class="form-group ">
                                           
											{{Form::label('equip_upload', 'Upload Document ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('equip_upload',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
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
@stop