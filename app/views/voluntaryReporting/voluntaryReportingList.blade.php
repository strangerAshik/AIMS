@extends('layoutTable')
@section('content')
<section class="content contentWidth">
	<div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									<div class="col-md-6 ">
                                    <h3 class="box-title">Voluntary & Mandatory Report List</h3>
									</div>
									
									
                                </div><!-- /.box-header -->
                                <div style="display:none">{{$num=0}}</div>
                                <div class="box-body">
								
                                    <table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No.</th>
												<th>Date</th>
												<th>Email</th>
												<th>Category</th>
												<th>Title</th>
												<th>Action Status</th>
												<th>Aproval Status</th>
												<th>View Details</th>
											</tr>
										</thead>
										
										<tbody>
										<?php $num=0;?>
										@foreach($allReport as $info)
											 <tr>
												<td class='text-centre'>{{++$num}}</td>
												<td class='text-centre'>{{$info->created_at}}</td>
												<td class='text-centre'>{{$info->email}}</td>
												<td class='text-centre'>{{$info->category}}</td>
												<td class='text-centre'>{{$info->title}}</td>
												<td class='text-centre'>
													<?php $actionStatus=CommonFunction::actionStatus($info->id);?>
													@if($actionStatus)
														<span style="color:green">Taken</span>
													@else 
														<span style="color:red">Not Taken</span>
													@endif
												</td>
												<td class='text-centre'>
												<?php $approvalStatus=CommonFunction::approvalStatus($info->id);?>
												@if($approvalStatus)
													<span style="color:green">	Approved</span>
												@else 
													<span style="color:red">Not Approved</span>
												@endif
												</td>
												 <td><a  class="btn btn-primary" href="singleReport/{{$info->id}}">Details</a></td>
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>

		
</section>
@stop