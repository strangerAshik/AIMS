@extends('layoutTable')
@section('content')
	<section class="width widthController">
		<div class="row">
			<div class="com-md-12">
			<div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">SIA : SMS Approval Waiting List</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
					  <div class="box-body table-responsive">
	                              
	                                    <table id="example1" class="table table-bordered table-striped">
	                                        <thead>
	                                            <tr>
	                                                <th>No</th>
	                                                <th>SIA Number</th>                            
	                                                <th>Assessed Initial risk</th>                            
	                                                <th>Severity</th>                            
	                                                <th>Likelihood</th>                            
	                                                <th>Determined risk </th>                            
	                                                <th>LEI(%)</th>                            
	                                                <th>Details</th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                        <?php $num=0;?>
                                    	    @foreach ($smsApprovalPendingList as $info)  
                                    	    <?php $data=CommonFunction::getSmsInfo($info);?>			
	                                        	<tr>
	                                        		<td>
	                                        			{{++$num}}
	                                        		</td>
	                                        		<td>{{$data->sia_number}}</td>
	                                        		<td>{{$data->initial_risk}}</td>
	                                        		<td>{{$data->determine_severity}}</td>
	                                        		<td>{{$data->determine_likelihood}}</td>
	                                        		<td>{{$data->determine_risk}}</td>
	                                        		<td>{{$data->lack_of_effective_implementation}}</td>
	                                        		<td><a href="singleProgram/{{$info}}#SMSDetails">View</a></td>
	                                        	</tr>
	                                        @endforeach
	                                        </tbody>

	                                        
	                                    </table>
	                   </div>

				  </div>
				

		</div>
	</section>
@stop
