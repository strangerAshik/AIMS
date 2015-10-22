@extends('layoutTable')
	@section('content')
		<section class="content">
		<h2>PQ List</h2>
			 <div class="box-body table-responsive">
                               
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>PQ No.</th>
                                                <th>PQ</th>
                                                <th>Audit Area</th>
                                                <th>PQ Type</th>
                                                
                                                <th>Number of CC</th>
                                                <th>NCMC Approval</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
											@foreach ($pqList as $info)
                                            <tr>
                                                <td>{{$info->pq_number}}</td>
                                                <td>{{$info->pq}}</td>
                                                <td>{{$info->audit_area}}</td>
                                                <td>{{$info->pq_type}}</td>
                                                
                                                <td>{{$info->number_of_cc}}</td>
                                                <td>
												@if($info->ncmc_approval=='1')
													Yes
												@else
													No

												@endif
                                                </td>
                                                <td><a href="">Detail</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                 <th>PQ No.</th>
                                                <th>PQ</th>
                                                <th>Audit Area</th>
                                                <th>PQ Type</th>
                                                
                                                <th>Number of CC</th>
                                                <th>NCMC Approval</th>
                                                <th>Details</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
		</section>
	
	@stop