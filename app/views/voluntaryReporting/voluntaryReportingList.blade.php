@extends('layoutTable')
@section('content')
<section class="content contentWidth">
	<div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									<div class="col-md-6 ">
                                    <h3 class="box-title">Voluntary Report List</h3>
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
												<th>Title</th>
												<th>Action Status</th>
												<th>Aproval Status</th>
												<th>View Details</th>
											</tr>
										</thead>
										
										<tbody>
										
											 <tr>
												<td class='text-centre'>1</td>
												<td class='text-centre'>01 January 2015</td>
												<td class='text-centre'>test@gmail.com</td>
												<td class='text-centre'>Test Test</td>
												<td class='text-centre'>Action Taken</td>
												<td class='text-centre'>Approved</td>
												 <td><a  class="btn btn-primary" href="singleReport/id">Details</a></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

		
</section>
@stop