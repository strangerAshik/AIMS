@extends('layoutTable')
@section('content')
	<section class="width widthController">
		<div class="row">
			<div class="com-md-12">
			<div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">EDP : Approval Pending</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
					  <div class="box-body table-responsive">
	                              
	                                    <table id="example1" class="table table-bordered table-striped">
	                                        <thead>
	                                            <tr>
	                                                <th>No</th>
	                                                <th>SIA Number</th>    
	                                                <th>Organization</th>    
	                                                <th>Finding Number</th>
	                                                <th>Finding Title</th>
	                                                <th>EDP Number</th>
	                                                <th>EDP Title</th>
	                                                <th>Details</th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                        <?php $num=0;?>
                                    	    @foreach ($notApproveEdp as $info)  
                                    	    <?php $data=CommonFunction::getEdpNumberInfo($info);?>			
	                                        	<tr>
	                                        		<td>
	                                        			{{++$num}}
	                                        		</td>
	                                        		<td>{{$data->sia_number}}</td>
	                                        		<td>{{$data->org_name}}</td>
	                                        		<td>{{$data->finding_number}}</td>
	                                        		<td>{{$data->findingTitle}}</td>
	                                        		<td>{{$data->edp_number}}</td>
	                                        		<td>{{$data->edpTitle}}</td>
	                                        		
	                                        		<td><a href="{{URL::to('edp/singleEdp/'.$data->edp_number)}}">View</a></td>
	                                        	</tr>
	                                        @endforeach
	                                        </tbody>

	                                        
	                                    </table>
	                   </div>

				  </div>
				

		</div>
	</section>
@stop
