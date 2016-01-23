@extends('layout')



@section('content')

<section class="content contentWidth">

	<div class="row" >
                 <div class="col-md-12">
                            <!-- general form elements -->
                                <div class="box box-primary ">
							 <div class="box-header  table_toggle expand"> 								

									<div class="man pull-right" >-</div>								

									<span class="box-title">

									<h3 class="box-title">Assigned Courses</h3>								

									</span>

							  </div>

						<h4>   &nbsp <i>Employee Name : {{CommonFunction::getEmployeeName($emp_tracker)}} </i> </h4>
						<h4>   &nbsp <i>Employee Specialty : {{CommonFunction::getEmployeeSpeciality($emp_tracker)}} </i> </h4>

                <!-- /.box-header -->

					

					

					<div class="box-body table-responsive">

					

                   

             <table  class="table table-bordered table-striped">

                    <thead>

                    	<tr>

                    		<th class="text-center">Formal Course</th>
                    		<th class="text-center">OJT Task</th>
                    		<th class="text-center">Level-1</th>
                    		<th class="text-center">Level-2</th>
                    		<th class="text-center">Level-3</th>
                    		<th class="text-center">OJTD</th>
                    		<th class="text-center">Details</th>

                    	</tr>

                    </thead>

									 

					   <tbody>	

					   @if($assingedFormalCourses)

						@foreach($assingedFormalCourses as $info)

						<!--Get All The Job tasks of this Course-->

						<?php $ojtTasks=CommonFunction::getOjtTask($info->its_course_number);$num=count($ojtTasks);?>



						  <tr class="text-center" id="{{$info->its_course_number}}">
						  	<td rowspan="{{$num+1}}" class="text-center" >
						  	{{ HTML::linkAction('itsOjtController@singleFormalCourse',$info->its_course_number,array($info->itscn), array('class' => 'hidden-print','title'=>$info->its_course_title,'target'=>'_blink')) }}
						  	<!--Only for print-->
						  	<span class="visible-print-block"><h5>{{$info->its_course_number}}</h5></span>
						  	<br>
						<!--This employee's - this formal course  status  -->
						<?php $formalStatus=CommonFunction::formalCourseStatus($info->its_course_number,$emp_tracker);?>
                    		 <?php $validityFormal=0;?> 
                    		@if(!$formalStatus)
	                    		<button class="btn btn-primary" data-toggle="modal" data-target="#updateFormalCourseStatus{{$info->id}}">Update Status</button>                   		                		
                    		@else 

                    			@foreach($formalStatus as $status)

										<?php $validityFormal= time() - strtotime($status->validity_date)?>

										@if($validityFormal<0)

										<i>Validity Till : </i>{{$status->validity_date}}	<br>

										<i>Manager : </i>{{$status->manager}}  <br>

										@else 

										 <?php $validityFormal=1;?> 

										<span class="due">

										<i>Validity Expired : </i>{{$status->validity_date}}	<br>

										<i>Manager Was: </i>{{$status->manager}}  <br>

										</span>

										<button class="btn btn-primary" data-toggle="modal" data-target="#updateFormalCourseStatus{{$info->id}}">Update Status</button>

										@endif

									

                    			@endforeach

                    		@endif

                    		<br><br>

                    		{{link_to_action('BaseController@permanentDelete', 'Remove Course', $parameters = array('itsojt_assign_course_ojt',$info->assignId,$info->assignId), $attributes = array( 'style'=>"color:red",'class'=>'hidden-print'));}}

                    		



						  	</td>



						  	@foreach($ojtTasks as $task)

					    	<tr>

							

						    <td class="text-center" >{{ HTML::linkAction('itsOjtController@singleOjtCourse',$task->its_job_task_no,array($task->its_job_task_no), array('class' => 'hidden-print','title'=>$task->title,'target'=>'_blink')) }}
							<!--Only for print-->
						    <span class="visible-print-block"><h5>{{$task->its_job_task_no}}</h5></span>

						    </td>

						    <td class="text-center" >
						      <!--This employee's - this formal course, this ojt level1 status  -->

					    <?php $ojtL1=CommonFunction::ojtCourseStatus($info->its_course_number,$task->its_job_task_no,$emp_tracker,'L1')?>

							<?php $validityLevel1=0;?>

                    		@if(!$ojtL1)

	                    		Not Done 

	                    		</br>

	                    		<button class="btn btn-primary" data-toggle="modal" data-target="#level1{{$task->id}}">Update Level-1</button>

	                    	@else 

                    			@foreach($ojtL1 as $status)

										

										<?php $validityLevel1= time() - strtotime($status->validity_date)?>

										@if($validityLevel1<0)

										<i>Validity Till : </i>{{$status->validity_date}}	<br>

										<i>Manager : </i>{{$status->manager}}  <br>

										@else 

										<?php $validityLevel1=1;?>

										<span class="due">

										<i>Validity Expired : </i>{{$status->validity_date}}	<br>

										<i>Manager Was: </i>{{$status->manager}}  <br>

										</span>

										<button class="btn btn-primary" data-toggle="modal" data-target="#level1{{$task->id}}">Update Level-1</button>

										@endif

										

                    			@endforeach

                    		@endif



						    </td>						    

						    <td class="text-center" >
						    <!--This employee's - this formal course, this ojt level2 status  -->

						<?php $ojtL2=CommonFunction::ojtCourseStatus($info->its_course_number,$task->its_job_task_no,$emp_tracker,'L2');?>

						<?php $validityLevel2=0;?>

                    		@if(!$ojtL2)

		                    		@if($ojtL1)

			                    		 Not Done

			                    		</br>

			                    		<button class="btn btn-primary" data-toggle="modal" data-target="#level2{{$task->id}}">Update Level-2</button>

			                    	@else 

			                    		 Not Done

			                    		</br>

			                    		<button class="btn btn-primary" data-toggle="modal" disabled="" data-target="#">Update Level-2</button>

			                    	@endif

	                    	@else 

                    			@foreach($ojtL2 as $status)

										

										<?php $validityLevel2= time() - strtotime($status->validity_date)?>

										@if($validityLevel2<0)

										<i>Validity Till : </i>{{$status->validity_date}}	<br>

										<i>Manager : </i>{{$status->manager}}  <br>

										@else 

										<?php $validityLevel2=1;?>

										<span class="due">

										<i>Validity Expired : </i>{{$status->validity_date}}	<br>

										<i>Manager Was: </i>{{$status->manager}}  <br>

										</span>

										

										<b<button class="btn btn-primary" data-toggle="modal" data-target="#level2{{$task->id}}">Update Level-2</button>

										@endif

										

                    			@endforeach

                    		@endif

						    </td>						    

						    <td class="text-center" >



                    		  

						<!--This employee's - this formal course, this ojt level3 status  -->

						<?php $ojtL3=CommonFunction::ojtCourseStatus($info->its_course_number,$task->its_job_task_no,$emp_tracker,'L3');?>

                    		<?php $validityLevel3=0;?>

                    		@if(!$ojtL3)

                    			@if($ojtL2 )

	                    		Not Done

	                    		</br>

	                    		<button class="btn btn-primary" data-toggle="modal" data-target="#level3{{$task->id}}">Update Level-3</button>

	                    		@else 

								Not Done

	                    		</br>

	                    		<button class="btn btn-primary" data-toggle="modal" disabled="" data-target="#">Update Level-3</button>

	                    		@endif

                    		@else 

                    			@foreach($ojtL3 as $status)

										

											<?php $validityLevel3= time() - strtotime($status->validity_date)?>

										@if($validityLevel3<0)

										<i>Validity Till : </i>{{$status->validity_date}}	<br>

										<i>Manager : </i>{{$status->manager}}  <br>

										@else 

										<?php $validityLevel3=1;?>

										<span class="due">

										<i >Validity Expired : </i>{{$status->validity_date}}	<br>

										<i>Manager Was: </i>{{$status->manager}}  <br>

										

										</span>

										

										<button class="btn btn-primary" data-toggle="modal" data-target="#level3{{$task->id}}">Update Level-3</button>

										@endif

										

                    			@endforeach

                    		@endif

						    </td>						    

						   				    

						    <td class="text-center">
						    <?php $speciality=CommonFunction::getEmployeeSpeciality($emp_tracker)?>
						    @if($speciality=='ANS-AGA')
								@if($validityFormal<0 && $validityLevel1<0)
									<span class="inspector"><?php $ojtd='i';?>Inspector</span>
								@elseif($validityFormal==0 || $validityLevel1==0)
									<span class="trainee"><?php $ojtd='iii';?>Trainee</span>
								@else 
									<span class="due"><?php $ojtd='ii';?>Refresher Due</span>
								@endif
							@else 
								@if($validityFormal<0 && $validityLevel1<0 && $validityLevel2<0 && $validityLevel3<0)
								 <span class="inspector"><?php $ojtd='i';?>Inspector</span>
								@elseif($validityFormal==0 || $validityLevel1==0 || $validityLevel2==0 || $validityLevel3==0 )
								 <span class="trainee"><?php $ojtd='iii';?>Trainee</span>
								@else
								<span class="due"><?php $ojtd='ii';?>Refresher Due</span>
								@endif
						    @endif

							

							
						  </td>	
						  <td>
						  	  {{ HTML::linkAction('itsOjtController@trineeSingleOjtCourse', 'View',array($info->its_course_number,$task->its_job_task_no,$emp_tracker,$ojtd), array('class' => '')) }}
						  </td>

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

@include('common')
@yield('print')

						</div>	





				

		

		

@include('itsOjt/entryForm')

@yield('courseUpdate')

<!--Level 1-->



@foreach($assingedOjt as $info)



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

											  <label> {{Form::radio('completion_status', 'Yes',true)}} &nbsp  Passed</label>

											 <label> {{Form::radio('completion_status', 'No')}} &nbsp  Failed</label>

										</div>

											</div>

											

                    </div>		

                    <div class="form-group ">

                                           

											{{Form::label('upload_certificate', 'Upload Certificate', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::file('certificate',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}

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

<!--Level2-->

<div class="modal fade" id="level2{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">Update Level 2 Status</h4>

            </div>



            <div class="modal-body"> 

                              

				{{Form::open(array('url'=>'itsOjt/updateFormalOjtStatus','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}

				{{Form::hidden('emp_tracker',$emp_tracker)}}

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

											  <label> {{Form::radio('completion_status', 'Yes',true)}} &nbsp  Passed</label>

											 <label> {{Form::radio('completion_status', 'No')}} &nbsp  Failed</label>

										</div>

											</div>

											

                    </div>		

                    <div class="form-group ">

                                           

											{{Form::label('upload_certificate', 'Upload Certificate', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::file('certificate',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}

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

											{{Form::file('certificate',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}

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



@endforeach




</section>







@stop