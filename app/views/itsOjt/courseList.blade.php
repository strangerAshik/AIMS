@extends('layoutMT')

@section('content')
<section class="content contentWidth">	
	
	       <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									<div class="col-md-6 ">
                                    <h3 class="box-title">ITS Course List</h3>
									</div>
									
									
                                </div><!-- /.box-header -->
                               
                                <div class="box-body">
								
                                    <table id="example3" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>ITSCN</th>
												<th>ITS Job Task #</th>
												<th>Title</th>
												<th>Approval Date</th>
												<th>Inspector Type</th>
												<th>Training Category</th>
												<th>Associative CAA Job Task #</th>							
												<th>View Details</th>
											</tr>
										</thead>
										
										<tbody>
										@if($ojtCourses)
										@foreach ($ojtCourses as $info) 
										<tr>
												<td>
												<?php $name=CommonFunction::getFormalCourseTitle($info->its_course_number);?>
													{{ HTML::linkAction('itsOjtController@singleFormalCourse',$info->its_course_number.' : ' . $name,array($info->its_course_number), array('class' => '','title'=>$name,'target'=>'_blink','style'=>'color:#FFF!important')) }}
													
												</td>
												<td>{{$info->its_job_task_no}}</td>
												<td>{{$info->title}}</td>
												<td>{{$info->approval_date}}</td>
												<td>{{$info->inspector_type}}</td>
												<td>{{$info->training_category}}</td>
												<td>{{$info->associative_faa_job_task_no}}</td>
												
																					
												<th>{{ HTML::linkAction('itsOjtController@singleOjtCourse',"Details",array($info->its_job_task_no), array('class' => '','title'=>$info->title)) }}</th>
										</tr>
										@endforeach
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
</section>
@stop