
@extends('layoutTable')
@section('content')
<div style='display:none'>
{{$role=Auth::User()->Role()}}
{{$org=Auth::User()->Organization()}}
{{$counter=0;}}
</div>


<section class='content widthController'>

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
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
										<thead>
											<tr>
												<th>No.</th>
												<th>Operator</th>
												<th>Serial Number </th>
												<th>Registration No# </th>
												<th>Aircraft MM </th>
												<th>Aircraft MSN </th>
												<th>Assigned Inspector</th>												
												<th>View Details</th>
											</tr>
										</thead>
										
										<tbody>
										
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
												<a  href="single/{{$aircraft->aircraft_MM.'/'.$aircraft->aircraft_MSN}}" >view Details</a>
												</td>
												
											</tr>											

										
										@endforeach
										
										
										</tbody>
										
									</table>
									
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
      </div> 
	  <!-- delete -->


   <!-- End delete User-->         
	</section>
	<script>
$(document).ready(function(){
  
$('#searching').selectize();
	
});
</script>
@stop