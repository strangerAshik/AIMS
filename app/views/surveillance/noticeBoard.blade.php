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
                                            <th class="col-md-5">Notifications Area</th>
                                            <th >Total Number</th>
                                            <th >Associated With Me</th>
                                            <th >View</th>
                                        </tr>
                                        <tr>
                                        	<td>1</td>
                                            <td>Program : Execution Date Exceeded</td>
                                            <td><span class="badge bg-red">{{$numberOfNotExecutedSia}}</span></td>
                                            <td><span class="badge bg-red">{{$myNoticeNumberOfNotExecutedSia}}</span></td>
                                             <td><a href="{{URL::to('surveillance/executionDateExceed')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                          <tr>
                                            <td>2</td>
                                            <td>Findings : Target Date Exceeded</td>           
                                            <td><span class="badge bg-red">{{$exceedDateFindingNumbers}}</span></td>
                                              <td><span class="badge bg-red">{{$myNoticeFindingDateExceed}}</span></td>
                                             <td><a href="{{URL::to('surveillance/findingTargetTimeExceed')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                        <tr>
                                          <td>3</td>
                                            <td>Findings : Corrective Action Approval Pending</td>           
                                            <td><span class="badge bg-red">{{$pendingCorrectiveActionList}}</span></td>
                                              <td><span class="badge bg-red">{{$myNoticePendingCorrApproval}}</span></td>
                                             <td><a href="{{URL::to('surveillance/pendingFindingCorrectiveActionList')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Safety Concern : Target Date Exceeded</td>           
                                            <td><span class="badge bg-red">{{$exceedDateScNumbers}}</span></td>
                                              <td><span class="badge bg-red">{{$myNoticeScDateExceed}}</span></td>
                                             <td><a href="{{URL::to('surveillance/scTargetTimeExceed')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr> 
                                        <!--  safety concern corrective action approval pending -->

                                        <tr>
                                          <td>5</td>
                                            <td>Safety Concern : corrective action approval pending</td>           
                                            <td><span class="badge bg-red">{{$totalScCorrApprovalPending}}</span></td>
                                              <td><span class="badge bg-red">{{$myNoticeScCorrPendignApproval}}</span></td>
                                             <td><a href="{{URL::to('surveillance/scCorrPendingAproval')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                        <tr>
                                          <td>6</td>
                                            <td>Safety Concern : Approval Pending</td>           
                                            <td><span class="badge bg-red">{{$pendingApprovalScNumber}}</span></td>
                                              <td><span class="badge bg-red">{{$myNoticeScWaitingForApproval}}</span></td>
                                             <td><a href="{{URL::to('surveillance/scAprovalWaiting')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                        <!-- EDP legal opinion pending   -->
                                        <tr>
                                            <td>7</td>
                                            <td>EDP : Legal Opinion Pending</td>           
                                            <td><span class="badge bg-red">{{$totalEdpLegalOpinionPending}}</span></td>
                                              <td><span class="badge bg-red">{{$myNoticeEdpPendingLegalOpinion}}</span></td>
                                             <td><a href="{{URL::to('surveillance/edpPendingLegalOpinion')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                        <tr>
                                            <td>8</td> 
                                            <td>EDP : Approval Pending</td>           
                                            <td><span class="badge bg-red">{{$pendingApproveEdpNumber}}</span></td>
                                              <td><span class="badge bg-red">{{$myNoticeEdpWaitingForApproval}}</span></td>
                                             <td><a href="{{URL::to('surveillance/edpAprovalWaiting')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                       
                                       
                                        <tr>
                                            <td>9</td>
                                            <td>SIA : SMS Approval Pending</td>           
                                            <td><span class="badge bg-red">{{$pendingSmsApproval}}</span></td>
                                              <td><span class="badge bg-red">{{$myNoticeSmsWaitingForApproval}}</span></td>
                                             <td><a href="{{URL::to('surveillance/pendingSmsApproval')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                        <tr>
                                          <td>10</td>
                                            <td>Surveillance : Approval Pending</td>           
                                            <td><span class="badge bg-red">{{$pendingSiaApproval}}</span></td>
                                              <td><span class="badge bg-red">{{$myNoticeSiaWaitingForApproval}}</span></td>
                                             <td><a href="{{URL::to('surveillance/siaAprovalWaiting')}}"><span class="label label-primary">View List</span></a></td>
                                        </tr>
                                       
                                      
                                        
                                       
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
        </div>
        </div>	
	</section>
@stop