@extends('layoutMT')

@section('content')
<style type="text/css">
	.trainee{color:red;}
	.inspector{color:#87C540;}
	.due{color:#E7701F;}

</style>
<section class="content contentWidth">
<div class="row" >
	<?php

											$validityFormal=40;
											$validityLevel1=40;
											$validityLevel2=40;
											$validityLevel3=40;

							?>
  <div class="col-md-12">
            <!-- general form elements -->
        <div class="box box-primary ">
			 <div class="box-header  table_toggle expand"> 	
					<div class="man pull-right" >-</div>	
					<h3 class="box-title">ITS Central Search</h3>
			  </div>

<!-- /.box-header -->
	
					
		<div class="box-body table-responsive">					
                   
             <table id="example" class="table table-bordered table-striped display nowrap"  cellspacing="0" width="100%">
                  
                    <thead>
                    	
                        <tr>
                        	
                    		<th class="text-center">Emp. Name</th>
                    		<th class="text-center">Speciality</th>
                    		<th class="text-center">Formal Course</th>
                    		<th class="text-center">OJT Task</th>
                    		<th class="text-center">Level-1</th>
                    		<th class="text-center">Level-2</th>
                    		<th class="text-center">Level-3</th>                    		
                    		<th class="text-center">OJTD & Details</th>                      		
                    	</tr>
                    	<tr id="filterrow">    
                    	               		
                    		<th class="text-center">Emp. Name</th>
                    		<th class="text-center">Speciality</th>
                    		<th class="text-center">Formal Course</th>
                    		<th class="text-center">OJT Task</th>
                    		<th class="text-center">Level-1</th>
                    		<th class="text-center">Level-2</th>
                    		<th class="text-center">Level-3</th>                    		
                    		<th class="text-center">OJTD & Details</th>                      		
                    	</tr>
                    	
                    
                    </thead>
                    <tfoot>
                    	<tr>
                    		
                    		<th class="text-center">Emp. Name</th>
                    		<th class="text-center">Speciality</th>
                    		<th class="text-center">Formal Course</th>
                    		<th class="text-center">OJT Task</th>
                    		<th class="text-center">Level-1</th>
                    		<th class="text-center">Level-2</th>
                    		<th class="text-center">Level-3</th>
                    		
                    		<th class="text-center">OJTD & Details</th>
                    		
                    	</tr>
                    </tfoot>
									 
					<tbody>

							   @foreach($itsAssignedFormal as $info)
							   <!--itscn,emp_tracker-->
							   <?php $allJobTask=CommonFunction::getOjtTask($info->itscn);?>					   <!--job task-->
							   <!--info(itscn,emp_tracker),job task-->
								   @foreach ($allJobTask as $task)
								   <?php $name=CommonFunction::getEmployeeName($info->emp_tracker); ?>
								   @if($name)
								   <tr>
								        
								   		<td class="text-center"><!--Emp Name-->
								   		
								   			
								   			
								   				 {{$name }}
								   			
								   	    </td> 
								   	    <td class="text-center"> {{$speciality=CommonFunction::getEmployeeSpeciality($info->emp_tracker)}}</td>

								   		<td class="text-center"><!--Course No-->
								   			{{ HTML::linkAction('itsOjtController@singleFormalCourse',$info->itscn,array($info->itscn), array('class' => '','title'=>CommonFunction::getFormalCourseTitle($info->itscn),'target'=>'_blink')) }}
											</br>
								   			<!--This employee's - this formal course  status  -->
									<?php $formalStatus=CommonFunction::formalCourseStatus($info->itscn,$info->emp_tracker);?>
			                    		@if(!$formalStatus)
				                    		Not Done
			                    		@else 
			                    			@foreach($formalStatus as $status)
													{{-- <span style="font-weight: bold;">Completion Date : </span>{{$status->completion_date}}	<br> --}}
												
													<?php $validityFormal= time() - strtotime($status->validity_date)?>
													@if($validityFormal<0)
													<i>Validity Till : </i><br>{{$status->validity_date}}	<br>
													<i>Manager : </i><br>{{$status->manager}}  <br>
													@else 
													<span class="due">
													<i>Validity Expired : </i><br>{{$status->validity_date}}	<br>
													<i>Manager Was: </i><br>{{$status->manager}}  <br>
													</span>
												
													@endif
													{{-- <span style="font-weight: bold;">Instructor : </span>{{$status->instructor}} --}}
			                    			@endforeach
			                    		@endif
								   		</td>
								   		
								   		<td class="text-center"><!--JOb Task No-->
								   		{{ HTML::linkAction('itsOjtController@singleOjtCourse',$task->its_job_task_no,array($task->its_job_task_no), array('class' => '','title'=>CommonFunction::getOjtTitle($task->its_job_task_no),'target'=>'_blink')) }}</td>
								   		<td><!--Level 1-->
								   			    <!--This employee's - this formal course, this ojt level1 status  -->
									    <?php $ojtL1=CommonFunction::ojtCourseStatus($info->itscn,$task->its_job_task_no,$info->emp_tracker,'L1')?>
											
				                    		@if(!$ojtL1)
					                    		Not Done 
					                    		<?php $validityLevel1=40;?>
					                    		
					                    	@else 
				                    			@foreach($ojtL1 as $status)
													
														<?php $validityLevel1= time() - strtotime($status->validity_date)?>
														@if($validityLevel1<0)
														<i>Validity Till : </i><br>{{$status->validity_date}}	<br>
														<i>Manager : </i><br>{{$status->manager}}  <br>
														@else 
														<span class="due">
														<i>Validity Expired : </i><br>{{$status->validity_date}}	<br>
														<i>Manager Was: </i><br>{{$status->manager}}  <br>
														</span>
														
														@endif
														{{-- <span style="font-weight: bold;">Instructor : </span>{{$status->instructor}} --}}
				                    			@endforeach
				                    		@endif

								   		</td>
								   		<td><!--Level 2-->
								   			
											    <!--This employee's - this formal course, this ojt level2 status  -->
								<?php $ojtL2=CommonFunction::ojtCourseStatus($info->itscn,$task->its_job_task_no,$info->emp_tracker,'L2');?>
		                    		@if(!$ojtL2)
				                    		
					                    		Not Done
					                    		<?php $validityLevel2=40;?>
					                    	
			                    	@else 
		                    			@foreach($ojtL2 as $status)
												{{-- <span style="font-weight: bold;">Completion Date : </span>{{$status->completion_date}}	<br> --}}
												<?php $validityLevel2= time() - strtotime($status->validity_date)?>
												@if($validityLevel2<0)
												<i>Validity Till : </i><br><br>{{$status->validity_date}}	<br>
												<i>Manager : </i><br>{{$status->manager}}  <br>
												@else 
												<span class="due">
												<i>Validity Expired : </i><br>{{$status->validity_date}}	<br>
												<i>Manager Was: </i><br>{{$status->manager}}  <br>
												</span>
												
												@endif
												{{-- <span style="font-weight: bold;">Instructor : </span>{{$status->instructor}} --}}
		                    			@endforeach
		                    		@endif

								   		</td>
								   		<td><!--Level 3-->
								   			
										<!--This employee's - this formal course, this ojt level3 status  -->
								<?php $ojtL3=CommonFunction::ojtCourseStatus($info->itscn,$task->its_job_task_no,$info->emp_tracker,'L3');?>
		                    		
		                    		@if(!$ojtL3)                    			
			                    		 Not Done
			                    		 <?php $validityLevel3=40;?>
		                    		@else 
		                    			@foreach($ojtL3 as $status)
												{{-- <span style="font-weight: bold;">Completion Date : </span>{{$status->completion_date}}	<br> --}}
													<?php $validityLevel3= time() - strtotime($status->validity_date)?>
												@if($validityLevel3<0)
												<i>Validity Till : </i><br>{{$status->validity_date}}	<br>
												<i>Manager : </i><br>{{$status->manager}}  <br>
												@else 
												<span class="due">
												<i >Validity Expired :<br> </i>{{$status->validity_date}}	<br>
												<i>Manager Was: </i><br>{{$status->manager}}  <br>
												
												</span>
												
												@endif
												{{-- <span style="font-weight: bold;">Instructor : </span>{{$status->instructor}} --}}
		                    			@endforeach
		                    		@endif

								   		</td>
								   		<td class="text-center">
								   		 OJTD :
								 <?php $speciality=CommonFunction::getEmployeeSpeciality($info->emp_tracker);?>
								
								   	
								   			@if($validityFormal<0 && $validityLevel1<0 && $validityLevel2<0 && $validityLevel3<0)
											 <span class="inspector"><?php $ojtd='i'?>Inspector</span>
											@elseif($formalStatus && $ojtL1 && $ojtL2 && $ojtL3 )
											  <span class="due"><?php $ojtd='ii'?>Refresher Due</span>
											@else
											 <span class="trainee"><?php $ojtd='iii'?>Trainee</span>
											@endif
								   		
											
											

											</br>
								   			{{ HTML::linkAction('itsOjtController@trineeSingleOjtCourse', 'View Details',array($info->itscn,$task->its_job_task_no,$info->emp_tracker,$ojtd), array('class' => '')) }}

								   		</td>
								   </tr>
								   @endif	
								   @endforeach
							   @endforeach
							  
                       
                    </tbody>
					
					
                    </table>
					
               </div>
				
		</div>
	</div>

</div>
<script type="text/javascript">

</script>
</section>
						
				



@stop