@extends('layoutTable')
@section('content')
<section class="content contentWidth">
	
	<div class="row">
		 <p class="text-center col-md-12">
						<button class="btn btn-primary btn-block"  data-toggle="modal" data-target="#addTrainee">Add Trainee</button>
		</p>
	</div>
<div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									<div class="col-md-6 ">
                                    <h3 class="box-title">Recent Added Trainees</h3>
									</div>
									
									
                                </div><!-- /.box-header -->
                               
                                <div class="box-body">
								
                                    <table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												
												<th>Employee Name</th>
												<th>Employee ID</th>
												<th>Employee's Speciality</th>
												<th>Hire Date</th>
												<th>Current Position</th>
												<th>View Details</th>
											</tr>
										</thead>
										
										<tbody>
										@if($trainees)
										@foreach ($trainees as $info) 
										<tr>
												
												<td>{{$info->employee_name}}</td>
												<td>{{$info->employee_id}}</td>
												<td>{{$info->employees_speciality}}</td>
												<td>{{$info->hire_date}}</td>
												<td>{{$info->current_position}}</td>
																					
												<th><a class="btn btn-primary"href={{'singleTrainee/'.$info->emp_tracker}}>Details</a></th>
										</tr>
										@endforeach
										@endif

										</tbody>
										</table>
						    </div>
					</div>
				</div>
	       </div>
	

	@include('itsOjt/entryForm')
	@yield('addTrainee')

</section>
@stop