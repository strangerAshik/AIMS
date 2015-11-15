@extends('layoutTable')

@section('content')
<section class="content contentWidth">
	<div class="row" >
                        

                 <div class="col-md-12">
                            <!-- general form elements -->
                                <div class="box box-primary ">
							 <div class="box-header  table_toggle expand">
									<h3 class="box-title">Assigned Formal Course</h3>
									<div class="man pull-right" >-</div>
							  </div>
                <!-- /.box-header -->
					
					
					<div class="box-body">
					
                   
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    	<tr>
                    		
                    		<th class="text-center">Course Title</th>
                    		<th class="text-center" >Formal Course Status</th>
                    		<th class="text-center" >Update Status</th>
                    		
                    		
                    		<th>Details</th>
                    	</tr>
                    </thead>
									 
					   <tbody>	
						@foreach($assingedFormalCourses as $info)
                        
						<tr>
                    	
                    		<td>
                    				
								{{ HTML::linkAction('itsOjtController@singleFormalCourse',$info->its_course_number.' : '.$info->its_course_title,array($info->itscn), array('class' => '')) }}
							

                    		</td>

                    		<td>
                    		<?php $formalStatus=CommonFunction::formalCourseStatus($info->its_course_number,$emp_tracker);?>
                    		@if(!$formalStatus)
	                    		<button class="btn btn-primary" data-toggle="modal" data-target="#updateFormalCourseStatus{{$info->id}}">Update Status</button>
	                    		                    		
                    		@else 
                    			@foreach($formalStatus as $status)
										<span style="font-weight: bold;">Completion Date : </span>{{$status->completion_date}}	|
										<span style="font-weight: bold;">Validity Till : </span>{{$status->validity_date}}	<br>
										<span style="font-weight: bold;">Manager : </span>{{$status->manager}}  |
										<span style="font-weight: bold;">Instructor : </span>{{$status->instructor}}
                    			@endforeach
                    		@endif
                    		</td>

                    		<td>
                    		@if(!$formalStatus)
                    			<button class="btn btn-primary" data-toggle="modal" data-target="#updateFormalCourseStatus{{$info->id}}">Update Status</button>
                    		@else 
								<button class="btn btn-primary" disabled="" data-toggle="modal" data-target="#updateFormalCourseStatus{{$info->id}}">Update Status</button>
                    		@endif
                    		</td>

							

							<td>{{ HTML::linkAction('itsOjtController@singleTrainingOjt', 'View',array($info->its_course_number,$emp_tracker), array('class' => '')) }}</td>
                    	</tr>

						
						
						@endforeach
                       
                        </tbody>
						
					
                    </table>
					
                </div>
				
					
						
					</div>

				
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>	<div class="row" >
                        

                 <div class="col-md-12">
                            <!-- general form elements -->
                          
                                <div class="box box-primary ">
							 <div class="box-header  table_toggle expand">
									<h3 class="box-title">Assigned OJT</h3>
									<div class="man pull-right" >-</div>
							  </div>
							 
                <!-- /.box-header -->
					
					
					<div class="box-body">
					
                   
                <table id="example3" class="table table-bordered table-striped">
                    <thead>
                    	<tr>
                    		
                    		<th class="text-center">OJT Task Title</th>
                    		<th colspan="3" class="text-center">OJT Status</th>
                    		<th class="text-center">CD</th>
                    		<th>Details</th>
                    	</tr>
                    </thead>
									 
					   <tbody>	
						@foreach($assingedOjt as $info)
                        
						<tr>
							<td>
								
								{{ HTML::linkAction('itsOjtController@singleOjtCourse',$info->its_job_task_no.' : '.$info->title,array($info->job_task_no), array('class' => '')) }}
							</td>
                    	

                    	
                    		

                    		<td>

                    		<?php $ojtL1=CommonFunction::ojtCourseStatus($info->its_course_number,$info->job_task_no,$emp_tracker,'L1')?>
                    		@if(!$ojtL1)
	                    		Level-1 Not Done
	                    		</br>
	                    		<button class="btn btn-primary" data-toggle="modal" data-target="#level1{{$info->id}}">Update Level-1</button>
	                    	@else 
                    			@foreach($ojtL1 as $status)
										<span style="font-weight: bold;">Completion Date : </span>{{$status->completion_date}}	<br>
										<span style="font-weight: bold;">Validity Till : </span>{{$status->validity_date}}	<br>
										<span style="font-weight: bold;">Manager : </span>{{$status->manager}}  <br>
										<span style="font-weight: bold;">Instructor : </span>{{$status->instructor}}
                    			@endforeach
                    		@endif
                    		</td>

                    		<td>
                    		<?php $ojtL2=CommonFunction::ojtCourseStatus($info->its_course_number,$info->job_task_no,$emp_tracker,'L2');?>
                    		@if(!$ojtL2)
		                    		@if($ojtL1)
			                    		Level-2 Not_Done
			                    		</br>
			                    		<button class="btn btn-primary" data-toggle="modal" data-target="#level2{{$info->id}}">Update Level-2</button>
			                    	@else 
			                    	Level-2 Not_Done
			                    		</br>
			                    		<button class="btn btn-primary" data-toggle="modal" disabled="" data-target="#">Update Level-2</button>
			                    	@endif
	                    	@else 
                    			@foreach($ojtL2 as $status)
										<span style="font-weight: bold;">Completion Date : </span>{{$status->completion_date}}	<br>
										<span style="font-weight: bold;">Validity Till : </span>{{$status->validity_date}}	<br>
										<span style="font-weight: bold;">Manager : </span>{{$status->manager}}  <br>
										<span style="font-weight: bold;">Instructor : </span>{{$status->instructor}}
                    			@endforeach
                    		@endif
                    		</td>

                    		<td>
                    		<?php $ojtL3=CommonFunction::ojtCourseStatus($info->its_course_number,$info->job_task_no,$emp_tracker,'L3');?>
                    			<?php $formalStatus=CommonFunction::formalCourseStatus($info->its_course_number,$emp_tracker);?>
                    		@if(!$ojtL3)
                    			@if($ojtL2 && $formalStatus)
	                    		Level-3 Not_Done
	                    		</br>
	                    		<button class="btn btn-primary" data-toggle="modal" data-target="#level3{{$info->id}}">Update Level-3</button>
	                    		@else 
								Level-3 Not_Done
	                    		</br>
	                    		<button class="btn btn-primary" data-toggle="modal" disabled="" data-target="#">Update Level-3</button>
	                    		@endif
                    		@else 
                    			@foreach($ojtL3 as $status)
										<span style="font-weight: bold;">Completion Date : </span>{{$status->completion_date}}	<br>
										<span style="font-weight: bold;">Validity Till : </span>{{$status->validity_date}}	<br>
										<span style="font-weight: bold;">Manager : </span>{{$status->manager}} <br>
										<span style="font-weight: bold;">Instructor : </span>{{$status->instructor}}
                    			@endforeach
                    		@endif
                    		</td>

							<td>
									@if($formalStatus&&$ojtL3)
									<span style="color: green">Inspector</span>
								@else 
									<span style="color: red">Trainee</span>
								@endif
							</td>

								<td>{{ HTML::linkAction('itsOjtController@trineeSingleOjtCourse', 'View',array($info->its_course_number,$info->its_job_task_no,$emp_tracker), array('class' => '')) }}</td>
                    	</tr>

						
						
						@endforeach
                       
                        </tbody>
						
					
                    </table>
					
                </div>
				
					
						
					</div>

				
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>

		
		

</section>
@include('itsOjt/entryForm')
@yield('courseUpdate')


@stop