@if($PageName=='Single Formal Course')
@section('formalEdit')
@foreach($courseDetails as $info)
<div class="modal fade" id="formalEdit{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Formal Course</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/editFormalCourse/'.$info->id,'method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				   {{Form::hidden('id',$info->id)}}
                    <div class="form-group required">
                                           
											{{Form::label('its_course_number', 'ITS Course Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('its_course_number',$info->its_course_number, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('its_course_title', 'ITS Course Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('its_course_title',$info->its_course_title, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('training_profile', 'Training Profile', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('training_profile',$info->training_profile, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('training_category', 'Training Category', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('training_category',$info->training_category, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('sequence', 'Sequence', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('sequence',$info->sequence, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('course_length', 'Course Length', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('course_length',$info->course_length, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('course_objective', 'Course Objective', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('course_objective',$info->course_objective, array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('course_description', 'Course Description', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('course_description',nl2br($info->course_description), array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('course_content', 'Course Content', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('course_content',$info->course_content, array('class' => 'form-control','placeholder'=>'','size'=>'6x4'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('prerequisites', 'Prerequisites', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('prerequisites',$info->prerequisites, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
	                                           
												{{Form::label('revision_date', 'Revision Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															<?php $date=CommonFunction::date($info->revision_date); ?>
															{{Form::select('revision_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															<?php $month=CommonFunction::month($info->revision_date); ?>
															{{Form::select('revision_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
															<?php $year=CommonFunction::year($info->revision_date); ?>
																{{Form::select('revision_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group ">
                                           
											{{Form::label('course_manager', 'Course Manager', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('course_manager',$info->course_manager, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('phone', 'Phone', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('phone',$info->phone, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('associated_caa_training_courses', 'Associated CAA training Courses', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('associated_caa_training_courses',$info->associated_caa_training_courses, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
               
					
						
					
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
@if($PageName=='Single OJT Course')
@section('ojtEdit')
@foreach($courseDetails as $info)
<div class="modal fade" id="ojtEdit{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit OJT Course</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/editOjtCourse/'.$info->id,'method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  {{Form::hidden('id',$info->id)}}
				  <div class="form-group required">
                                           
											{{Form::label('its_course_number', 'ITS Course Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::select('its_course_number',$formalCourseList,$info->its_course_number,array('class'=>'form-control','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group required">
                                           
											{{Form::label('its_job_task_no', 'ITS Job Task #', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('its_job_task_no',$info->its_job_task_no, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',$info->title, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group required">
	                                           
												{{Form::label('approval_date', 'Approval Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															<?php $date=CommonFunction::date($info->approval_date); ?>
															{{Form::select('approval_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															<?php $month=CommonFunction::month($info->approval_date); ?>
															{{Form::select('approval_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
															<?php $year=CommonFunction::year($info->approval_date); ?>
																{{Form::select('approval_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>	
                   
                    <div class="form-group ">
                                           
											{{Form::label('comments', 'Comments', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('comments',$info->comments, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('inspector_type', 'Inspector Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('inspector_type',$info->inspector_type, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('training_category', 'Training Category', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('training_category',$info->training_category, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('frequency', 'Frequency', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('frequency',$info->frequency, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('associative_faa_job_task_no', 'Associative CAA Job Task #', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('associative_faa_job_task_no',$info->associative_faa_job_task_no, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('regulation_reference', 'Regulation Reference', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('regulation_reference',$info->regulation_reference, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('caa_forms', 'CAA Forms', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('caa_forms',$info->caa_forms, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('guidance_materials_referance', 'Guidance Material Reference', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('guidance_materials_referance',$info->guidance_materials_referance, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('task_description', 'Task Description', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('task_description',$info->task_description, array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('job_performance_subtasks', 'Job Performance Subtasks', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('job_performance_subtasks',$info->job_performance_subtasks, array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
               
					 
						
					
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
<!--Course Info Update-->


@if($PageName=='Single Training OJT'||$PageName=='Trainee Single Training OJT')
@section('updateCourseUpdate')

<!--Formal Course-->
@foreach($formal as $info)

<div class="modal fade" id="editFormal{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Formal Course Status</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/editUpdateFormalOjtStatus','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
				{{Form::hidden('id',$info->id)}}
				{{Form::hidden('old_certificate',$info->certificate)}}
				{{Form::hidden('pageId','formal'.$info->id)}}
				
				  <div class="form-group required">
                                           
											{{Form::label('instructor', 'Instructor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('instructor',$info->instructor, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                     <div class="form-group required">
                                           
											{{Form::label('supervisor', 'Supervisor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('supervisor',$info->supervisor, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                   				
                     <div class="form-group required">
                                           
											{{Form::label('manager', 'Manager', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('manager',$info->manager, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group required">
	                                           
												{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															<?php $date=CommonFunction::date($info->start_date); ?>
															{{Form::select('start_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															<?php $month=CommonFunction::month($info->start_date); ?>
															{{Form::select('start_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
															<?php $year=CommonFunction::year($info->start_date); ?>
																{{Form::select('start_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('completion_date', 'Completion Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
														<?php $date=CommonFunction::date($info->completion_date); ?>
														<?php $month=CommonFunction::month($info->completion_date); ?>
														<?php $year=CommonFunction::year($info->completion_date); ?>
															<div class="col-xs-2">
															
															{{Form::select('completion_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															
															{{Form::select('completion_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
															
																{{Form::select('completion_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('validity_date', 'Validity', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
														<?php $date=CommonFunction::date($info->validity_date); ?>
														<?php $month=CommonFunction::month($info->validity_date); ?>
														<?php $year=CommonFunction::year($info->validity_date); ?>
															<div class="col-xs-2">
															{{Form::select('validity_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('validity_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('validity_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
	                 <div class="form-group required">
                                           
											{{Form::label(' completion_status', ' Completion Status', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<div class="radio">									 
											 <label> {{ Form::radio('completion_status', 'Yes',Input::old('completion_status', $info->completion_status == 'Yes'),array()) }} &nbsp  Yes</label>
											 <label> {{ Form::radio('completion_status', 'No',Input::old('completion_status', $info->completion_status == 'No'),array()) }} &nbsp  No</label>
											</div>
			
											</div>
											
                    </div>		
                    <div class="form-group ">
                                           
											{{Form::label('upload_certificate', 'Updated Certificate', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">

											@if($info->certificate!='Null'){{HTML::link('files/itsOjt/'.$info->certificate,'Certificate',array('target'=>'_blank'))}}
		                                    @else
		                                        {{HTML::link('#','No Certificate Provided')}}
		                                    @endif</br>
											{{Form::file('certificate',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('comment', 'Comment', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('notes',$info->notes,array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
                   
                   
                   
					 
						
					
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
<!--Level 1-->
@foreach($level1 as $info)
<div class="modal fade" id="editLevel1{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Level-1 Status</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/editUpdateFormalOjtStatus','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
				{{Form::hidden('id',$info->id)}}
				{{Form::hidden('old_certificate',$info->certificate)}}
				{{Form::hidden('pageId','L1'.$info->id)}}
				
				  <div class="form-group required">
                                           
											{{Form::label('instructor', 'Instructor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('instructor',$info->instructor, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                     <div class="form-group required">
                                           
											{{Form::label('supervisor', 'Supervisor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('supervisor',$info->supervisor, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                   				
                     <div class="form-group required">
                                           
											{{Form::label('manager', 'Manager', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('manager',$info->manager, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group required">
	                                           
												{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															<?php $date=CommonFunction::date($info->start_date); ?>
															{{Form::select('start_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															<?php $month=CommonFunction::month($info->start_date); ?>
															{{Form::select('start_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
															<?php $year=CommonFunction::year($info->start_date); ?>
																{{Form::select('start_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('completion_date', 'Completion Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
														<?php $date=CommonFunction::date($info->completion_date); ?>
														<?php $month=CommonFunction::month($info->completion_date); ?>
														<?php $year=CommonFunction::year($info->completion_date); ?>
															<div class="col-xs-2">
															
															{{Form::select('completion_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															
															{{Form::select('completion_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
															
																{{Form::select('completion_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('validity_date', 'Validity', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
														<?php $date=CommonFunction::date($info->validity_date); ?>
														<?php $month=CommonFunction::month($info->validity_date); ?>
														<?php $year=CommonFunction::year($info->validity_date); ?>
															<div class="col-xs-2">
															{{Form::select('validity_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('validity_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('validity_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
	                 <div class="form-group required">
                                           
											{{Form::label(' completion_status', ' Completion Status', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<div class="radio">									 
											 <label> {{ Form::radio('completion_status', 'Yes',Input::old('completion_status', $info->completion_status == 'Yes'),array()) }} &nbsp  Yes</label>
											 <label> {{ Form::radio('completion_status', 'No',Input::old('completion_status', $info->completion_status == 'No'),array()) }} &nbsp  No</label>
											</div>
			
											</div>
											
                    </div>		
                    <div class="form-group ">
                                           
											{{Form::label('upload_certificate', 'Updated Certificate', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											@if($info->certificate!='Null'){{HTML::link('files/itsOjt/'.$info->certificate,'Certificate',array('target'=>'_blank'))}}
		                                    @else
		                                        {{HTML::link('#','No Certificate Provided')}}
		                                    @endif</br>
											{{Form::file('certificate',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('comment', 'Comment', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('notes',$info->notes,array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
                   
                   
                   
					 
						
					
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

<!--Level 2-->

@foreach($level2 as $info)
<div class="modal fade" id="editLevel2{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Level 2 Status</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/editUpdateFormalOjtStatus','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
				{{Form::hidden('id',$info->id)}}
				{{Form::hidden('old_certificate',$info->certificate)}}
				{{Form::hidden('pageId','L2'.$info->id)}}
				
				  <div class="form-group required">
                                           
											{{Form::label('instructor', 'Instructor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('instructor',$info->instructor, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                     <div class="form-group required">
                                           
											{{Form::label('supervisor', 'Supervisor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('supervisor',$info->supervisor, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                   				
                     <div class="form-group required">
                                           
											{{Form::label('manager', 'Manager', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('manager',$info->manager, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group required">
	                                           
												{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															<?php $date=CommonFunction::date($info->start_date); ?>
															{{Form::select('start_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															<?php $month=CommonFunction::month($info->start_date); ?>
															{{Form::select('start_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
															<?php $year=CommonFunction::year($info->start_date); ?>
																{{Form::select('start_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('completion_date', 'Completion Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
														<?php $date=CommonFunction::date($info->completion_date); ?>
														<?php $month=CommonFunction::month($info->completion_date); ?>
														<?php $year=CommonFunction::year($info->completion_date); ?>
															<div class="col-xs-2">
															
															{{Form::select('completion_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															
															{{Form::select('completion_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
															
																{{Form::select('completion_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('validity_date', 'Validity', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
														<?php $date=CommonFunction::date($info->validity_date); ?>
														<?php $month=CommonFunction::month($info->validity_date); ?>
														<?php $year=CommonFunction::year($info->validity_date); ?>
															<div class="col-xs-2">
															{{Form::select('validity_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('validity_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('validity_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
	                 <div class="form-group required">
                                           
											{{Form::label(' completion_status', ' Completion Status', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<div class="radio">									 
											 <label> {{ Form::radio('completion_status', 'Yes',Input::old('completion_status', $info->completion_status == 'Yes'),array()) }} &nbsp  Yes</label>
											 <label> {{ Form::radio('completion_status', 'No',Input::old('completion_status', $info->completion_status == 'No'),array()) }} &nbsp  No</label>
											</div>
			
											</div>
											
                    </div>		
                    <div class="form-group ">
                                           
											{{Form::label('upload_certificate', 'Updated Certificate', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											@if($info->certificate!='Null'){{HTML::link('files/itsOjt/'.$info->certificate,'Certificate',array('target'=>'_blank'))}}
		                                    @else
		                                        {{HTML::link('#','No Certificate Provided')}}
		                                    @endif</br>
											{{Form::file('certificate',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('comment', 'Comment', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('notes',$info->notes,array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
                   
                   
                   
					 
						
					
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
<!--Level 3-->
@foreach($level3 as $info)

<div class="modal fade" id="editLevel3{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Level 3 Status</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/editUpdateFormalOjtStatus','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
				{{Form::hidden('id',$info->id)}}
				{{Form::hidden('old_certificate',$info->certificate)}}
				{{Form::hidden('pageId','L3'.$info->id)}}
				
				  <div class="form-group required">
                                           
											{{Form::label('instructor', 'Instructor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('instructor',$info->instructor, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                     <div class="form-group required">
                                           
											{{Form::label('supervisor', 'Supervisor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('supervisor',$info->supervisor, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                   				
                     <div class="form-group required">
                                           
											{{Form::label('manager', 'Manager', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('manager',$info->manager, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group required">
	                                           
												{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															<?php $date=CommonFunction::date($info->start_date); ?>
															{{Form::select('start_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															<?php $month=CommonFunction::month($info->start_date); ?>
															{{Form::select('start_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
															<?php $year=CommonFunction::year($info->start_date); ?>
																{{Form::select('start_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('completion_date', 'Completion Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
														<?php $date=CommonFunction::date($info->completion_date); ?>
														<?php $month=CommonFunction::month($info->completion_date); ?>
														<?php $year=CommonFunction::year($info->completion_date); ?>
															<div class="col-xs-2">
															
															{{Form::select('completion_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															
															{{Form::select('completion_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
															
																{{Form::select('completion_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('validity_date', 'Validity', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
														<?php $date=CommonFunction::date($info->validity_date); ?>
														<?php $month=CommonFunction::month($info->validity_date); ?>
														<?php $year=CommonFunction::year($info->validity_date); ?>
															<div class="col-xs-2">
															{{Form::select('validity_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('validity_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('validity_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
	                 <div class="form-group required">
                                           
											{{Form::label(' completion_status', ' Completion Status', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<div class="radio">									 
											 <label> {{ Form::radio('completion_status', 'Yes',Input::old('completion_status', $info->completion_status == 'Yes'),array()) }} &nbsp  Yes</label>
											 <label> {{ Form::radio('completion_status', 'No',Input::old('completion_status', $info->completion_status == 'No'),array()) }} &nbsp  No</label>
											</div>
			
											</div>
											
                    </div>		
                    <div class="form-group ">
                                           
											{{Form::label('upload_certificate', 'Updated Certificate', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											@if($info->certificate!='Null'){{HTML::link('files/itsOjt/'.$info->certificate,'Certificate',array('target'=>'_blank'))}}
		                                    @else
		                                        {{HTML::link('#','No Certificate Provided')}}
		                                    @endif</br>
											{{Form::file('certificate',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('comment', 'Comment', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('notes',$info->notes,array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
                   
                   
                   
					 
						
					
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

@if($PageName=='Single Trainee')
@section('editTrainee')
@foreach($traineeInfo as $info)
<div class="modal fade" id="editTainee{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Trainee</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/editTrainee','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				{{Form::hidden('id',$info->id)}}
				  <div class="form-group">
                                           
											{{Form::label('employee_id', 'Employee ID', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('employee_id',$info->employee_id, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div> <div class="form-group required">
                                           
											{{Form::label('employee_name', 'Employee Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('employee_name',$info->employee_name, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
				  <div class="form-group required">
                                           
											{{Form::label('employees_speciality', 'Employee\'s Speciality', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('employees_speciality',[''=>'--  Select Speciality  --','OPS'=>'OPS','AIR'=>'AIR','ANS-AGA'=>'ANS-AGA','Others'=>'Others'],$info->employees_speciality,array('class'=>'form-control','required'=>''))}}
											</div>
											
                    </div>
                     <div class="form-group required">
                  									   <?php $date=CommonFunction::date($info->hire_date); ?>
														<?php $month=CommonFunction::month($info->hire_date); ?>
														<?php $year=CommonFunction::year($info->hire_date); ?>
	                                           
												{{Form::label('hire_date', 'Hire Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('hire_date', $dates,$date,array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('hire_month',$months,$month,array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('hire_year',$years,$year,array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>	
                    <div class="form-group ">
                                           
											{{Form::label('hiring_criteria', 'Hiring Criteria', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('hiring_criteria',$info->hiring_criteria, array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
                    <div class="form-group required">
                                           
											{{Form::label('current_position', 'Current Position', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('current_position',$info->current_position, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('position_description', 'Position Description', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('position_description',$info->position_description, array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
                   
                   
                   
					 
						
					
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


