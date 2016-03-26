@extends('layoutMT')

@section('content')
<section class="content contentWidth">	
	
	       <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									<div class="col-md-6 ">
                                    <h3 class="box-title">Assigned Course</h3>
									</div>


									
									
                                </div><!-- /.box-header -->
                        <h4>   &nbsp <i>Employee Name : {{CommonFunction::getEmployeeName($emp_tracker)}} </i> </h4>
						<h4>   &nbsp <i>Employee Specialty : {{CommonFunction::getEmployeeSpeciality($emp_tracker)}} </i> </h4>
                               
                                <div class="box-body">
								
                                    <table id="example3" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>ITSCN</th>
												<th>ITS Job Task #</th>
												<th>Title</th>
												<th>Level-1</th>
												<th>Level-2</th>
												<th>Level-3</th>
												<th>Designation</th>							
												<th>Update This OJT</th>
											</tr>
										</thead>
										
								<tbody>
								 @if($assingedFormalCourses)

									@foreach($assingedFormalCourses as $data)

									<!--Get All The Job tasks of this Course-->

									<?php $ojtTasks=CommonFunction::getOjtTask($data->its_course_number);?>
									@foreach ($ojtTasks as $info)
									<tr>
								<!--Formal Course -->
										<td >
										{{'['.$info->its_course_number.'] ' .$data->its_course_title}} |
										<?php $formalStatus=CommonFunction::formalCourseStatus($data->its_course_number,$emp_tracker);?>
                    		 <?php $validityFormal=0;?> 
                    		@if(!$formalStatus)
	                    		Not Done                   		                		
                    		@else 

                    			@foreach($formalStatus as $status)

										<?php $validityFormal= time() - strtotime($status->validity_date)?>

										@if($validityFormal<0)
										<span style="color:#FFF">

										<i>Validity Till : </i>{{$status->validity_date}}	|

										<i>Manager : </i>{{$status->manager}}  <br>
										</span>

										@else 

										 <?php $validityFormal=1;?> 

										<span style="color:#FFF">


										<i style="color:red">Validity Expired : </i>{{$status->validity_date}}	|

										<i>Manager Was: </i>{{$status->manager}}  <br>

										</span>
										@endif

									

                    			@endforeach

                    		@endif
                    		<span>
										<br>	
										{{link_to_action('BaseController@permanentDelete', 'Remove Course', $parameters = array('itsojt_assign_course_ojt',$data->assignId,$data->assignId), $attributes = array( 'style'=>"color:red",'onclick'=>" return confirm('Wanna Remove?')"));}}
										
							</span>

								<span class='pull-right'>
											{{ HTML::linkAction('itsOjtController@traineeSingleFormalCourse', 'Update Course',array($data->its_course_number,$emp_tracker), array('class' => '','style'=>'color:#fff')) }}
										
								</span>




							
										</td>
										<!--ITS Course-->
										<td>{{$info->its_job_task_no}}</td>
										<td>{{$info->title}}</td>
										<!--Level -1-->
										<td class="text-center" >
						      <!--This employee's - this formal course, this ojt level1 status  -->

					    <?php $ojtL1=CommonFunction::ojtCourseStatus($data->its_course_number,$info->its_job_task_no,$emp_tracker,'L1')?>

							<?php $validityLevel1=0;?>

                    		@if(!$ojtL1)

	                    		Not Done 

	                    		</br>


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
										@endif

										

                    			@endforeach

                    		@endif



						    </td>						    

										<!--Level -2-->
										  <td class="text-center" >
						    <!--This employee's - this formal course, this ojt level2 status  -->

						<?php $ojtL2=CommonFunction::ojtCourseStatus($data->its_course_number,$info->its_job_task_no,$emp_tracker,'L2');?>

						<?php $validityLevel2=0;?>

                    		@if(!$ojtL2)

		                    		@if($ojtL1)

			                    		 Not Done

			                    	
			                    	@else 

			                    		 Not Done



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

										
										@endif

										

                    			@endforeach

                    		@endif

						    </td>						    
										<!--Level -3-->
										
						    <td class="text-center" >



                    		  

						<!--This employee's - this formal course, this ojt level3 status  -->

						<?php $ojtL3=CommonFunction::ojtCourseStatus($data->its_course_number,$info->its_job_task_no,$emp_tracker,'L3');?>

                    		<?php $validityLevel3=0;?>

                    		@if(!$ojtL3)

                    			@if($ojtL2 )

	                    		Not Done

	                    		

	                    		@else 

								Not Done

	                    		
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

									

										@endif

										

                    			@endforeach

                    		@endif

						    </td>						    

										   <td class="text-center">
						   
								@if($validityFormal<0 && $validityLevel1<0 && $validityLevel2<0 && $validityLevel3<0)
								 <span class="inspector"><?php $ojtd='i';?>Inspector</span>
								@elseif($validityFormal==0 || $validityLevel1==0 || $validityLevel2==0 || $validityLevel3==0 )
								 <span class="trainee"><?php $ojtd='iii';?>Trainee</span>
								@else
								<span class="due"><?php $ojtd='ii';?>Refresher Due</span>
								@endif
						   

							

							
						  </td>	
										<td>

											{{ HTML::linkAction('itsOjtController@trineeSingleOjtCourse', 'Update OJT',array($data->its_course_number,$info->its_job_task_no,$emp_tracker,$ojtd), array('class' => '')) }}
										</td>
									</tr>
									@endforeach
									@endforeach
								@else 
										<tr class="text-center">

											<td colspan="6">No Course Assigned</td>

										</tr>
								@endif


								</tbody>
										</table>
						    </div>
					</div>
				</div>
	       </div>
<style type="text/css">
	tr.group,
	tr.group:hover {
	    background-color: #0F4C61 !important;
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {
    var table = $('#example3').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 0 }
        ],
        "order": [[ 0, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(0, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="7" style="background-color: #5EBAC9 !important; color:#FFF;font-weight:bold">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#example3 tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 0 && currentOrder[1] === 'asc' ) {
            table.order( [ 0, 'desc' ] ).draw();
        }
        else {
            table.order( [ 0, 'asc' ] ).draw();
        }
    } );
 

} );
</script>
<script type="text/javascript">
    
    var deleteLinks = document.querySelectorAll('.delete');

    for (var i = 0; i < deleteLinks.length; i++) {
      deleteLinks[i].addEventListener('click', function(event) {
          event.preventDefault();

          var choice = confirm(this.getAttribute('data-confirm'));

          if (choice) {
            window.location.href = this.getAttribute('href');
          }
      });
}
</script>
</section>
@stop