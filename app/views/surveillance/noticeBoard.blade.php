@extends('layout')
@section('content')
	<section class="content contentWidth">
		<div class="row">
        <div class="col-md-12">
			  <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">SIA Notifications</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered table-striped">
                                        <tr>                                            
                                            <th>#</th>
                                            <th>Notifications Area</th>
                                            <th class="col-md-4">Number</th>
                                            <th class="col-md-2">View</th>
                                        </tr>
                                        <tr>
                                        	<td>1</td>
                                            <td>Program : Execution Date Exceed</td>
                                            <td><span class="badge bg-red">{{$numberOfNotExecutedSia}}</span></td>
                                             <td><a href="{{URL::to('surveillance/executionDateExceed')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                          <tr>
                                            <td>2</td>
                                            <td>Finding : Target Date Exceed</td>           
                                            <td><span class="badge bg-red">{{$exceedDateFindingNumbers}}</span></td>
                                             <td><a href="{{URL::to('surveillance/findingTargetTimeExceed')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Safety Concern : Target Date Exceed</td>           
                                            <td><span class="badge bg-red">{{$exceedDateScNumbers}}</span></td>
                                             <td><a href="{{URL::to('surveillance/scTargetTimeExceed')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr> 
                                       
                                        <tr>
                                        	<td>4</td>
                                            <td>Surveillance : Approval Pending</td>           
                                            <td><span class="badge bg-red">{{$pendingSiaApproval}}</span></td>
                                             <td><a href="{{URL::to('surveillance/siaAprovalWaiting')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                        <tr>
                                        	<td>5</td>
                                            <td>Safety Concern : Approval Pending</td>           
                                            <td><span class="badge bg-red">{{$pendingApprovalScNumber}}</span></td>
                                             <td><a href="{{URL::to('surveillance/scAprovalWaiting')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>EDP : Approval Pending</td>           
                                            <td><span class="badge bg-red">{{$pendingApproveEdpNumber}}</span></td>
                                             <td><a href="{{URL::to('surveillance/edpAprovalWaiting')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>SIA : SMS Approval Pending</td>           
                                            <td><span class="badge bg-red">{{$pendingSmsApproval}}</span></td>
                                             <td><a href="{{URL::to('surveillance/pendingSmsApproval')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                        <tr>
                                        	<td>8</td>
                                            <td>Finding : Corrective Action Approval Pending</td>           
                                            <td><span class="badge bg-red">{{$pendingCorrectiveActionList}}</span></td>
                                             <td><a href="{{URL::to('surveillance/pendingFindingCorrectiveActionList')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                      
                                        
                                       
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
        </div>
        </div>	
	</section>
@stop