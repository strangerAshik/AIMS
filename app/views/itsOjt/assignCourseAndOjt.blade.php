@extends('layoutTable')

@section('content')
<section class="content contentWidth">	
	<div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									<div class="col-md-6 ">
                                    <h3 class="box-title">Formal Courses</h3>
									</div>
									
									
                                </div><!-- /.box-header -->
                               
                                <div class="box-body">
								
                                    <table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>ITS Course Number</th>
												<th>ITS Course Title</th>
												<th>Training Category</th>
												<th>Course Length</th>
												<th>Prerequisites</th>
												<th>Revision Date </th>
												<th>Course Manager</th>											
												<th>Assign to Employee</th>
											</tr>
										</thead>
										
										<tbody>
										@if($formalCourses)
										@foreach ($formalCourses as $info) 
										<tr>
												<td>{{$info->its_course_number}}</td>
												<td>{{$info->its_course_title}}</td>
												<td>{{$info->training_category}}</td>
												<td>{{$info->course_length}}</td>
												<td>{{$info->prerequisites}}</td>
												<td>{{$info->revision_date}}</td>
												<td>{{$info->course_manager}}</td>
																					
											<td>
												<button class="btn btn-primary btn-block"  data-toggle="modal" data-target="#assignFormalCourse{{$info->id}}">Select</button>
											</td>
											
										</tr>
										@endforeach
										@endif

										</tbody>
										</table>
						    </div>
					</div>
				</div>
	       </div>
	       <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									<div class="col-md-6 ">
                                    <h3 class="box-title">OJT Courses</h3>
									</div>
									
									
                                </div><!-- /.box-header -->
                               
                                <div class="box-body">
								
                                    <table id="example3" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>ITS Job Task #</th>
												<th>Title</th>
												<th>Approval Date</th>
												<th>Inspector Type</th>
												<th>Training Category</th>
												<th>Associative FAA Job Task #</th>							
												<th>View Details</th>
											</tr>
										</thead>
										
										<tbody>
										@if($ojtCourses)
										@foreach ($ojtCourses as $info) 
										<tr>
												<td>{{$info->its_job_task_no}}</td>
												<td>{{$info->title}}</td>
												<td>{{$info->approval_date}}</td>
												<td>{{$info->inspector_type}}</td>
												<td>{{$info->training_category}}</td>
												<td>{{$info->associative_faa_job_task_no}}</td>
												
																					
												<td>
												<button class="btn btn-primary btn-block"  data-toggle="modal" data-target="#assignOjt{{$info->id}}">Select</button>
											</td>
										</tr>
										@endforeach
										@endif

										</tbody>
										</table>
						    </div>
					</div>
				</div>
	       </div>

</section>
@include('itsOjt/entryForm')
@yield('assignFormalCourse')
@yield('assignOjt')
@stop