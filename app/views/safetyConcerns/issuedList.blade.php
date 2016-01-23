@extends('layoutMT')
@section('content')
<section class='content widthController' >

         <div class="row">
                        <div class="col-md-12">
							
     
	   <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Safety Concern List</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                             <th>SIA Number</th>
												<th>Finding Number</th>
												<th>SC Number</th>
												<th>Finding Date</th>												
												<th>Place/Airport</th>
												<th>Target Date</th>
												<th>Approval</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                        @foreach ($infos as $info)
                                            <tr>
                                                <td>{{$info->sia_number}}</td>
												<td>{{$info->finding_number}}</td>
												<td>{{$info->safety_issue_number}}</td>
												<td>{{date('d F Y',strtotime($info->issue_finding_date))}}</td>
												<td>{{$info->place_or_airport}}</td>
												<td>{{date('d F Y',strtotime($info->target_date))}}</td>
												
												<td><?php $count=CommonFunction::isSafetyConsApproved($info->safety_issue_number);?>
							@if($count>0)
								Yes
							@else 
								No
							@endif</td>
                                                <td><a target="_blink" href="{{URL::to('safety/singlesafetyConcern/'.$info->safety_issue_number)}}">Details</a></td>
                                                
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               	<th>SIA Number</th>
												<th>Finding Number</th>
												<th>SC Number</th>
												<th>Finding Date</th>												
												<th>Place/Airport</th>
												<th>Target Date</th>
												<th>Approval</th>
                                                <th>Details</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->


                             </div>    
	
                           
</section>
@stop