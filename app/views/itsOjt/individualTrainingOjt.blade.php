@extends('layoutTable')

@section('content')
<style type="text/css">
	

</style>
<section class="content contentWidth">
	<div class="row" >
                        	<?php

											$validityFormal=40;
											$validityLevel1=40;
											$validityLevel2=40;
											$validityLevel3=40;
											$ojtd='null';

							?>

                 <div class="col-md-12">
                            <!-- general form elements -->
                                <div class="box box-primary ">
							 <div class="box-header  table_toggle expand"> 
									
									<div class="man pull-right" >-</div>
									
									<span class="box-title">
									<h3 class="box-title">Assigned Courses</h3>
									<h4> &nbsp  &nbsp <i>Employee Name : {{CommonFunction::getEmployeeName($emp_tracker)}} </i> </h4>
									</span>

							  </div>

                <!-- /.box-header -->
					
					
					<div class="box-body">
					
                   
             <table {{-- id="example1" --}} class="table table-bordered table-striped">
                    <thead>
                    	<tr>
                    		
                    		<th class="text-center">Formal Course</th>
                    		<th class="text-center">OJT Task</th>
                    		<th class="text-center">Level-1</th>
                    		<th class="text-center">Level-2</th>
                    		<th class="text-center">Level-3</th>
                    		
                    		<th class="text-center">OJTD & Details</th>
                    		
                    	</tr>
                    </thead>
									 
					   <tbody>	
					   @if($assingedFormalCourses)
						@foreach($assingedFormalCourses as $info)
						<!--Get All The Job tasks of this Course-->
						<?php $ojtTasks=CommonFunction::getOjtTask($info->its_course_number);$num=count($ojtTasks);?>

						  <tr class="text-center">
						  	<td rowspan="{{$num+1}}" id={{$num}}>

						  	{{ HTML::linkAction('itsOjtController@singleFormalCourse',$info->its_course_number,array($info->itscn), array('class' => '','title'=>$info->its_course_title,'target'=>'_blink')) }}

						  	<br>
						<!--This employee's - this formal course  status  -->
						<?php $formalStatus=CommonFunction::formalCourseStatus($info->its_course_number,$emp_tracker);?>
                    		@if(!$formalStatus)
	                    		<button class="btn btn-primary" data-toggle="modal" data-target="#updateFormalCourseStatus{{$info->id}}">Update Status</button>
	                    		                    		
                    		@else 
                    			@foreach($formalStatus as $status)
										{{-- <span style="font-weight: bold;">Completion Date : </span>{{$status->completion_date}}	<br> --}}
									
										<?php $validityFormal= time() - strtotime($status->validity_date)?>
										@if($validityFormal<0)
										<i>Validity Till : </i>{{$status->validity_date}}	<br>
										<i>Manager : </i>{{$status->manager}}  <br>
										@else 
										<span class="due">
										<i>Validity Expired : </i>{{$status->validity_date}}	<br>
										<i>Manager Was: </i>{{$status->manager}}  <br>
										</span>
										<button class="btn btn-primary" data-toggle="modal" data-target="#updateFormalCourseStatus{{$info->id}}">Update Status</button>
										@endif
										{{-- <span style="font-weight: bold;">Instructor : </span>{{$status->instructor}} --}}
                    			@endforeach
                    		@endif
                    		<br><br>
                    		{{link_to_action('AircraftController@permanentDelete', 'Remove Course', $parameters = array('itsojt_assign_course_ojt',$info->id), $attributes = array( 'class'=>"btn btn-primary"));}}
						  	</td>

						  	@foreach($ojtTasks as $task)
					  
						  	<tr>

						    <td>{{ HTML::linkAction('itsOjtController@singleOjtCourse',$task->its_job_task_no,array($task->its_job_task_no), array('class' => '','title'=>$task->title,'target'=>'_blink')) }}</br>
						  
									
						    </td>
						    <td>
						      <!--This employee's - this formal course, this ojt level1 status  -->
					    <?php $ojtL1=CommonFunction::ojtCourseStatus($info->its_course_number,$task->its_job_task_no,$emp_tracker,'L1')?>
							
                    		@if(!$ojtL1)
	                    		Not Done 
	                    		</br>
	                    		<button class="btn btn-primary" data-toggle="modal" data-target="#level1{{$task->id}}">Update Level-1</button>
	                    	@else 
                    			@foreach($ojtL1 as $status)
										{{-- <span style="font-weight: bold;">Completion Date : </span>{{$status->completion_date}}	<br> --}}
										<?php $validityLevel1= time() - strtotime($status->validity_date)?>
										@if($validityLevel1<0)
										<i>Validity Till : </i>{{$status->validity_date}}	<br>
										<i>Manager : </i>{{$status->manager}}  <br>
										@else 
										<span class="due">
										<i>Validity Expired : </i>{{$status->validity_date}}	<br>
										<i>Manager Was: </i>{{$status->manager}}  <br>
										</span>
										<button class="btn btn-primary" data-toggle="modal" data-target="#level1{{$task->id}}">Update Level-1</button>
										@endif
										{{-- <span style="font-weight: bold;">Instructor : </span>{{$status->instructor}} --}}
                    			@endforeach
                    		@endif

						    </td>						    
						    <td>
						    <!--This employee's - this formal course, this ojt level2 status  -->
						<?php $ojtL2=CommonFunction::ojtCourseStatus($info->its_course_number,$task->its_job_task_no,$emp_tracker,'L2');?>
                    		@if(!$ojtL2)
		                    		@if($ojtL1)
			                    		Level-2 Not_Done
			                    		</br>
			                    		<button class="btn btn-primary" data-toggle="modal" data-target="#level2{{$task->id}}">Update Level-2</button>
			                    	@else 
			                    	Level-2 Not_Done
			                    		</br>
			                    		<button class="btn btn-primary" data-toggle="modal" disabled="" data-target="#">Update Level-2</button>
			                    	@endif
	                    	@else 
                    			@foreach($ojtL2 as $status)
										{{-- <span style="font-weight: bold;">Completion Date : </span>{{$status->completion_date}}	<br> --}}
										<?php $validityLevel2= time() - strtotime($status->validity_date)?>
										@if($validityLevel2<0)
										<i>Validity Till : </i>{{$status->validity_date}}	<br>
										<i>Manager : </i>{{$status->manager}}  <br>
										@else 
										<span class="due">
										<i>Validity Expired : </i>{{$status->validity_date}}	<br>
										<i>Manager Was: </i>{{$status->manager}}  <br>
										</span>
										
										<b<button class="btn btn-primary" data-toggle="modal" data-target="#level2{{$task->id}}">Update Level-2</button>
										@endif
										{{-- <span style="font-weight: bold;">Instructor : </span>{{$status->instructor}} --}}
                    			@endforeach
                    		@endif
						    </td>						    
						    <td>

                    		  
						<!--This employee's - this formal course, this ojt level3 status  -->
						<?php $ojtL3=CommonFunction::ojtCourseStatus($info->its_course_number,$task->its_job_task_no,$emp_tracker,'L3');?>
                    		
                    		@if(!$ojtL3)
                    			@if($ojtL2 )
	                    		Level-3 Not_Done
	                    		</br>
	                    		<button class="btn btn-primary" data-toggle="modal" data-target="#level3{{$task->id}}">Update Level-3</button>
	                    		@else 
								Level-3 Not_Done
	                    		</br>
	                    		<button class="btn btn-primary" data-toggle="modal" disabled="" data-target="#">Update Level-3</button>
	                    		@endif
                    		@else 
                    			@foreach($ojtL3 as $status)
										{{-- <span style="font-weight: bold;">Completion Date : </span>{{$status->completion_date}}	<br> --}}
											<?php $validityLevel3= time() - strtotime($status->validity_date)?>
										@if($validityLevel3<0)
										<i>Validity Till : </i>{{$status->validity_date}}	<br>
										<i>Manager : </i>{{$status->manager}}  <br>
										@else 
										<span class="due">
										<i >Validity Expired : </i>{{$status->validity_date}}	<br>
										<i>Manager Was: </i>{{$status->manager}}  <br>
										
										</span>
										
										<button class="btn btn-primary" data-toggle="modal" data-target="#level3{{$task->id}}">Update Level-3</button>
										@endif
										{{-- <span style="font-weight: bold;">Instructor : </span>{{$status->instructor}} --}}
                    			@endforeach
                    		@endif
						    </td>						    
						   				    
						    <td class="text-center">
						    OJTD :
							@if($validityFormal<0 && $validityLevel1<0 && $validityLevel2<0 && $validityLevel3<0)
							 <span class="inspector"><?php $ojtd='i'?>Inspector</span>
							@elseif($formalStatus && $ojtL1 && $ojtL2 && $ojtL3 )
							  <span class="due"><?php $ojtd='ii'?>Refresher Due</span>
							@else
							 <span class="trainee"><?php $ojtd='iii'?>Trainee</span>
							
							@endif
							
							</br>
						    {{ HTML::linkAction('itsOjtController@trineeSingleOjtCourse', 'View',array($info->its_course_number,$task->its_job_task_no,$emp_tracker,$ojtd), array('class' => '')) }}</td>	
						    </tr>
						    @endforeach					    
						  </tr>
						@endforeach
						@else <!--Check if any course assigned-->
							<tr class="text-center">
								<td colspan="6">No Course Assigned</td>
							</tr>
						@endif
                       
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