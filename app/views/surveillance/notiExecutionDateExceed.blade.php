@extends('layoutTable')
@section('content')
	<section class="width widthController">
		<div class="row">
			<div class="com-md-12">
			<div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Program : Execution Date Exceed</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
					  <div class="box-body table-responsive">
	                              
	                                    <table id="example1" class="table table-bordered table-striped">
	                                        <thead>
	                                            <tr>
	                                                <th>No</th>
	                                                <th>Date</th>    
	                                                <th>Organization</th>
	                                                <th>Event On</th>
	                                                <th>Team Member</th>
	                                                <th>Location</th>
	                                                <th>SIA Number</th>
	                                                <th>Details</th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                        <?php $num=0;?>

	                                    <?php
	                                    //check whether user has full access notification
	                                     $fullAccess=CommonFunction::hasPermission('sia_notification_full',Auth::user()->emp_id(),'access');?>

	                                    
                                    	    @foreach ($notExecuted as $info)  
                                	    <?php $data=CommonFunction::getSiaNumberInfo($info);?>			 <?php 
                                	    if($fullAccess=='true')
                                	    	$imTeamMember='true';

                                	    else{

											   //getting member in an array 
											    $members=CommonFunction::updateMultiSelection('sia_program', 'sia_number',$info,'team_members');
											   //checking whether member or not 
											   $imTeamMember=CommonFunction::isItMe($members,Auth::user()->emp_id());
											   }
										 ?>
										 @if($imTeamMember=='true')
	                                        	<tr>
	                                        		<td>
	                                        			{{++$num}}
	                                        		</td>
	                                        		<td>{{$data->date}}</td>
	                                        		<td>{{$data->org_name}}</td>
	                                        		<td>{{$data->event}}</td>
	                                        		<td>
											<?php 
	                                        $members=CommonFunction::updateMultiSelection('sia_program', 'sia_number',$info,'team_members');
	                                      
	                                        ?>
                                               @if($members)
                                               @if($members!=null)
                                                    @foreach($members as $key=>$value)
                                                        {{$value}},
                                                    @endforeach
                                               
                                                @endif
                                                @else
                                                    No Members Added!!
                                                @endif
	                                        		</td>
	                                        		<td>{{$data->location}}</td>
	                                        		<td><a href="{{URL::to('surveillance/singleProgram/'.$data->sia_number)}}">{{$data->sia_number}}</a></td>
	                                        		<td><a href="{{URL::to('surveillance/singleProgram/'.$data->sia_number)}}">View</a></td>
	                                        	</tr>
	                                        	@endif
	                                        @endforeach
	                                        </tbody>

	                                        
	                                    </table>
	                   </div>

				  </div>
				

		</div>
	</section>
@stop
