@if($PageName=='Add Course')
@section('formalCourse')
<div class="modal fade" id="formalCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Formal Course</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/addFormalCourse','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  
                    <div class="form-group ">
                                           
											{{Form::label('its_course_number', 'ITS Course Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('its_course_number','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('its_course_title', 'ITS Course Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('its_course_title','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('training_profile', 'Training Profile', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('training_profile','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('training_category', 'Training Category', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('training_category','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('sequence', 'Sequence', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('sequence','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('course_length', 'Course Length', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('course_length','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('course_objective', 'Course Objective', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('course_objective','', array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('course_description', 'Course Description', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('course_description','', array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('course_content', 'Course Content', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('course_content','', array('class' => 'form-control','placeholder'=>'','size'=>'6x4','width'=>'400','height'=>'300'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('prerequisites', 'Prerequisites', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('prerequisites','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
	                                           
												{{Form::label('revision_date', 'Revision Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('revision_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('revision_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('revision_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group ">
                                           
											{{Form::label('course_manager', 'Course Manager', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('course_manager','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('phone', 'Phone', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('phone','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('associated_caa_training_courses', 'Associated CAA training Courses', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('associated_caa_training_courses','', array('class' => 'form-control','placeholder'=>''))}}
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
@stop
@endif
@if($PageName=='Add Course')
@section('ojtCourse')
<div class="modal fade" id="ojtCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New OJT Course</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/addOjtCourse','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  <div class="form-group required">
                                           
											{{Form::label('its_course_number', 'ITS Course Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('its_course_number','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('its_job_task_no', 'ITS Job Task #', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('its_job_task_no','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group required">
	                                           
												{{Form::label('approval_date', 'Approval Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('approval_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('approval_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('approval_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>	
                   
                    <div class="form-group ">
                                           
											{{Form::label('comments', 'Comments', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('comments','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('inspector_type', 'Inspector Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('inspector_type','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('training_category', 'Training Category', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('training_category','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('frequency', 'Frequency', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('frequency','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('associative_faa_job_task_no', 'Associative FAA Job Task #', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('associative_faa_job_task_no','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('regulation_reference', 'Regulation Reference', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('regulation_reference','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('caa_forms', 'CAA Forms', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('caa_forms','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('guidance_materials_referance', 'Guidance Material Reference', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('guidance_materials_referance','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('task_description', 'Task Description', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('task_description','', array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('job_performance_subtasks', 'Job Performance Subtasks', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('job_performance_subtasks','', array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
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
@stop
@endif
@if($PageName=='Add Trainee')
@section('addTrainee')
<div class="modal fade" id="addTrainee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Trainee</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/saveTrainee','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				{{Form::hidden('emp_tracker',time())}}
				  <div class="form-group">
                                           
											{{Form::label('employee_id', 'Employee ID', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('employee_id','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div> <div class="form-group required">
                                           
											{{Form::label('employee_name', 'Employee Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('employee_name','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
				  <div class="form-group required">
                                           
											{{Form::label('employees_speciality', 'Employee\'s Speciality', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('employees_speciality',[''=>'--  Select Speciality  --','OPS'=>'OPS','AIR'=>'AIR'],'0',array('class'=>'form-control','required'=>''))}}
											</div>
											
                    </div>
                     <div class="form-group required">
	                                           
												{{Form::label('hire_date', 'Hire Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('hire_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('hire_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('hire_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>	
                    <div class="form-group required">
                                           
											{{Form::label('current_position', 'Current Position', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('current_position','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
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
@stop
@endif
@if($PageName=='Assign Course and OJT')
@section('assignFormalCourse')
@foreach($formalCourses as $info)
<div class="modal fade" id="assignFormalCourse{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Select Trainee</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/saveAssignCourseAndojt','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				
				{{Form::hidden('itscn',$info->its_course_number)}}				 
				{{Form::hidden('formal_or_ojt','formal')}}				 
				  <div class="form-group required">
                                           
											{{Form::label('emp_tracker', 'Employee Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('emp_tracker',$traineeList,'0',array('class'=>'form-control','required'=>''))}}
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

@if($PageName=='Assign Course and OJT')
@section('assignOjt')
@foreach($ojtCourses as $info)
<div class="modal fade" id="assignOjt{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Select Trainee</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/saveAssignCourseAndojt','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				
				{{Form::hidden('itscn',$info->its_course_number)}}		
				{{Form::hidden('job_task_no',$info->its_job_task_no)}}	
				{{Form::hidden('formal_or_ojt','ojt')}}			

				  <div class="form-group required">
                                           
											{{Form::label('emp_tracker', 'Employee Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('emp_tracker',$traineeList,'0',array('class'=>'form-control','required'=>''))}}
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




@if($PageName=='Individual Training OJT')
@section('courseUpdate')
@foreach($assingedFormalCourses as $info)
<!--Formal Course-->
<div class="modal fade" id="updateFormalCourseStatus{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Formal Course Status</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/updateFormalOjtStatus','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
				{{Form::hidden('emp_tracker',$emp_tracker)}}
				{{Form::hidden('itscn',$info->its_course_number)}}
				{{Form::hidden('level','formal')}}
				  <div class="form-group required">
                                           
											{{Form::label('instructor', 'Instructor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('instructor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                     <div class="form-group required">
                                           
											{{Form::label('supervisor', 'Supervisor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('supervisor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                   				
                     <div class="form-group required">
                                           
											{{Form::label('manager', 'Manager', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('manager','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group required">
	                                           
												{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('start_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('start_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('start_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('completion_date', 'Completion Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('completion_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('completion_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('completion_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('validity_date', 'Validity', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('validity_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('validity_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('validity_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
	                 <div class="form-group required">
                                           
											{{Form::label(' completion_status', ' Completion Status', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<div class="radio">									 
											  <label> {{ Form::radio('completion_status', 'Yes',true) }} &nbsp  Passed</label>
											 <label> {{ Form::radio('completion_status', 'No') }} &nbsp  Failed</label>
										</div>
											</div>
											
                    </div>		
                    <div class="form-group ">
                                           
											{{Form::label('upload_certificate', 'Upload Certificate', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('certificate')}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('comment', 'Comment', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('notes','',array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
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
@foreach($allJobTask as $info)
<div class="modal fade" id="level1{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Level-1 Status</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/updateFormalOjtStatus','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
				{{Form::hidden('emp_tracker',$emp_tracker)}}
				{{Form::hidden('itscn',$info->its_course_number)}}
				{{Form::hidden('ojt_task_no',$info->its_job_task_no)}}
				{{Form::hidden('level','L1')}}
				  <div class="form-group required">
                                           
											{{Form::label('instructor', 'Instructor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('instructor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                     <div class="form-group required">
                                           
											{{Form::label('supervisor', 'Supervisor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('supervisor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                   				
                     <div class="form-group required">
                                           
											{{Form::label('manager', 'Manager', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('manager','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group required">
	                                           
												{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('start_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('start_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('start_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('completion_date', 'Completion Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('completion_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('completion_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('completion_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('validity_date', 'Validity', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('validity_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('validity_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('validity_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
	                 <div class="form-group required">
                                           
											{{Form::label(' completion_status', ' Completion Status', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<div class="radio">									 
											  <label> {{ Form::radio('completion_status', 'Yes',true) }} &nbsp  Passed</label>
											 <label> {{ Form::radio('completion_status', 'No') }} &nbsp  Failed</label>
										</div>
											</div>
											
                    </div>		
                    <div class="form-group ">
                                           
											{{Form::label('upload_certificate', 'Upload Certificate', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('certificate')}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('comment', 'Comment', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('notes','',array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
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
<!--Level 2-->
<div class="modal fade" id="level2{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Level 2 Status</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/updateFormalOjtStatus','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
				{{Form::hidden('emp_tracker',$emp_tracker)}}\
				{{Form::hidden('itscn',$info->its_course_number)}}
				{{Form::hidden('ojt_task_no',$info->its_job_task_no)}}
				{{Form::hidden('level','L2')}}
				  <div class="form-group required">
                                           
											{{Form::label('instructor', 'Instructor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('instructor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                     <div class="form-group required">
                                           
											{{Form::label('supervisor', 'Supervisor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('supervisor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                   				
                     <div class="form-group required">
                                           
											{{Form::label('manager', 'Manager', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('manager','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group required">
	                                           
												{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('start_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('start_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('start_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('completion_date', 'Completion Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('completion_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('completion_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('completion_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('validity_date', 'Validity', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('validity_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('validity_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('validity_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
	                 <div class="form-group required">
                                           
											{{Form::label(' completion_status', ' Completion Status', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<div class="radio">									 
											  <label> {{ Form::radio('completion_status', 'Yes',true) }} &nbsp  Passed</label>
											 <label> {{ Form::radio('completion_status', 'No') }} &nbsp  Failed</label>
										</div>
											</div>
											
                    </div>		
                    <div class="form-group ">
                                           
											{{Form::label('upload_certificate', 'Upload Certificate', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('certificate')}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('comment', 'Comment', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('notes','',array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
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
<!--Level 3-->
<div class="modal fade" id="level3{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Level 3 Status</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/updateFormalOjtStatus','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
				{{Form::hidden('emp_tracker',$emp_tracker)}}
				{{Form::hidden('itscn',$info->its_course_number)}}
				{{Form::hidden('ojt_task_no',$info->its_job_task_no)}}
				{{Form::hidden('level','L3')}}
				  <div class="form-group required">
                                           
											{{Form::label('instructor', 'Instructor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('instructor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                     <div class="form-group required">
                                           
											{{Form::label('supervisor', 'Supervisor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('supervisor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                   				
                     <div class="form-group required">
                                           
											{{Form::label('manager', 'Manager', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('manager','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group required">
	                                           
												{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('start_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('start_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('start_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('completion_date', 'Completion Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('completion_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('completion_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('completion_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('validity_date', 'Validity', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('validity_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('validity_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('validity_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
	                 <div class="form-group required">
                                           
											{{Form::label(' completion_status', ' Completion Status', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<div class="radio">									 
											  <label> {{ Form::radio('completion_status', 'Yes',true) }} &nbsp  Passed</label>
											 <label> {{ Form::radio('completion_status', 'No') }} &nbsp  Failed</label>
										</div>
											</div>
											
                    </div>		
                    <div class="form-group ">
                                           
											{{Form::label('upload_certificate', 'Upload Certificate', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('certificate')}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('comment', 'Comment', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('notes','',array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
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

