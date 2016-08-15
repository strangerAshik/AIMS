@extends('layout')
@section('content')
<div style='display:none'>
{{$role=Auth::User()->Role()}}
</div>
	<section class="content" style="max-width:800px;margin:0 auto;">
	
		@include('aircraft/menu')
		@yield('aircraftMenuPrimary')
	</section>
	
<div class="modal fade" id="PrimaryInfoForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Primary Data Of A New Aircraft </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'aircraft/savePrimary','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				   
					<div class="form-group ">
                                           
											{{Form::label('assigned_inspector', 'Assigned Inspector', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $inspector=CommonFunction::getInspectorList();?>
											{{Form::select('assigned_inspector[]', $inspector,'0',array('class'=>'','multiple'=>'multiple','id'=>'assigned_inspector',))}}
											</div>
											
                    </div>
				  
					<div class="form-group required">
                                           
											{{Form::label('serial_number', 'Serial Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('serial_number','', array('class' => 'form-control','placeholder'=>'i.e Boeing-737NG-123456','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                           
											{{Form::label('state_registration', 'State Of Registration', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<select id="state_registration" name='state_registration' class="demo-default" placeholder="Select  State Of Registration...">
												<?php $options=CommonFunction::stateOfReg();?>
												<option value="">Select  State Of Registration...</option>
												@foreach($options as $option)
												<option value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('registration_no', 'Registration No#', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('registration_no','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('aircraft_MM', 'Aircraft MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
{{Form::text('aircraft_MM','', array('class' => 'form-control','placeholder'=>"Don't use '/' or '\' among words",'required'=>'','pattern'=>"[^/\^\\x22]+", 'title'=>"Invalid input : can't use / "))}}
											</div>
											
                    </div>
		<div class="form-group required">
                                        
											{{Form::label('aircraft_MSN', 'Aircraft MSN', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
{{Form::text('aircraft_MSN','', array('class' => 'form-control','placeholder'=>"Don't use '/' or '\' among words",'pattern'=>"[^/\^\\x22]+",'required'=>'','title'=>"Invalid input : can't use /"))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('aircraft_operator', 'Aircraft Operator', array('class' => 'col-xs-4 control-label'))}}
											
											<div class="col-xs-6">											
											<select id="organizations" name='aircraft_operator' class="demo-default" placeholder="Select  Operator...">
												<option value="">Select  Operator...</option>
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
									 
									  <label> <label> {{ Form::radio('active', 'Yes',true) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('active', 'No') }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('registration', 'Registration ?', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('registration', 'Yes') }} &nbsp  Yes</label>
									 <label> {{ Form::radio('registration', 'No',true) }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('cofa', 'CofA?', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('cofa', 'Yes') }} &nbsp  Yes</label>
									 <label> {{ Form::radio('cofa', 'No',true) }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('stcs', 'STCs?', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('stcs', 'Yes') }} &nbsp  Yes</label>
									 <label> {{ Form::radio('stcs', 'No',true) }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('current_exemptions', 'Current Exemptions?', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('current_exemptions', 'Yes') }} &nbsp  Yes</label>
									 <label> {{ Form::radio('current_exemptions', 'No',true) }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('insurance', 'Insurance?', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('insurance', 'Yes') }} &nbsp  Yes</label>
									 <label> {{ Form::radio('insurance', 'No',true) }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('currently_leased', 'Currently Leased?', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('currently_leased', 'Yes') }} &nbsp  Yes</label>
									 <label> {{ Form::radio('currently_leased', 'No',true) }} &nbsp  No</label>
									</div>
									
								</div>
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('memo', 'Memo', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('memo','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					
					

                  
					<div class="form-group">
                       
                            <button type="submit" name='saveAndContinue' value='saveAndContinue' class="btn btn-primary btn-lg btn-block">Save And Continue</button>
                       
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
$('#assigned_inspector').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
	
});
</script>	
@stop