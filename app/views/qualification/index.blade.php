
@extends('layoutTable')
@section('content')
<section class='content widthController'>

         <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									
                                    <h3 class="box-title">All Employees</h3>
								
                                </div><!-- /.box-header -->
                                <div class="box-body">
								
                                    <table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Emp ID</th>
												<th>Full Name</th>
												<th>Email</th>
												<th>Mobile</th>
												<th>Role</th>
												<th>View Details</th>
											</tr>
										</thead>
										
										<tbody>
										@foreach ($emps as $emp)
											<tr>
												<td class='text-centre'>{{$emp->emp_id}}</td>
												<td class='text-centre'>{{$emp->first_name.' '.$emp->middle_name.' '.$emp->last_name.' '}}</td>
												<td class='text-centre'>{{$emp->email}}</td>
												<td class='text-centre'>{{$emp->mobile_no}}</td>
												<td class='text-centre'>{{$emp->role}}</td>
												
												<td class='text-centre'>
												<a target="b_link" href="comp_view/{{$emp->emp_id}}">view Details</a>
												</td>
												
											</tr>
										@endforeach
										</tbody>
										
									</table>
									
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
      </div> 
	      
	</section>
@stop