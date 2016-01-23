
@extends('layoutMT')
@section('content')

<section class='content contentWidth'>

         <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									<div class="col-md-6 ">
                                    <h3 class="box-title">All Aircrafts</h3>
									</div>
									
									
                                </div><!-- /.box-header -->
                                <div style="display:none">{{$num=0}}</div>
                               <div class="box-body table-responsive">
                                   <table id="example" class="display nowrap table table-bordered table-striped table-responsive" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No.</th>
												<th>Operator</th>
												<th>Serial Number </th>
												<th>Registration No# </th>
												<th>Aircraft MM </th>
												<th>Aircraft MSN </th>
												<th>Assigned Inspector</th>												
												<th>Details</th>
											</tr>
										</thead>
										
										<tbody>
										@if($aircrafts)
										@foreach ($aircrafts as $aircraft)
											
											 <tr>
												<td class='text-centre'>{{++$num}}</td>
												<td class='text-centre'>{{$aircraft->aircraft_operator}}</td>
												<td class='text-centre'>{{$aircraft->serial_number}}</td>
												<td class='text-centre'>{{$aircraft->registration_no}}</td>
												<td class='text-centre'>{{$aircraft->aircraft_MM}}</td>
												<td class='text-centre'>{{$aircraft->aircraft_MSN}}</td>
												<td class='text-centre'>{{$aircraft->assigned_inspector}}</td>
												
												
												<td class='text-centre'>
												<a  href="single/{{$aircraft->aircraft_MM.'/'.$aircraft->aircraft_MSN}}">Details</a>
												</td>
												
											</tr>
											
										@endforeach
										
										@else
							            <tr><td colspan="8">No Aircraft Added Yet!! </td></tr>
										
										@endif
										</tbody>
										
									</table>
									
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
      </div> 
	  <!-- delete -->


   <!-- End delete User-->         
	</section>

@stop