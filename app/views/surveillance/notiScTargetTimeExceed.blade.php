@extends('layoutTable')
@section('content')
	<section class="width widthController">
		<div class="row">
			<div class="com-md-12">
			<div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Safety Concern : Target Date Exceed</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
					  <div class="box-body table-responsive">
	                              
	                                    <table id="example1" class="table table-bordered table-striped">
	                                        <thead>
	                                            <tr>
	                                                <th>No</th>
	                                                <th>SIA Number</th>    
	                                                <th>Team Meamber(s)</th>    
	                                                <th>Organization</th>    
	                                                
	                                                <th>Finding Title</th>
	                                               
	                                                <th>SC Title</th>
	                                                <th>Target Date</th>
	                                                <th>Risk Assesment (From Matrix)</th>
	                                                <th>Details</th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                        <?php $num=0;?>
	                                        <?php
                                        //check whether user has full access notification
                                         $fullAccess=CommonFunction::hasPermission('sia_notification_full',Auth::user()->emp_id(),'access');?>
                                    	    @foreach ($scExceedDateArray as $info)  
                                    	    <?php $data=CommonFunction::getScNumberInfo($info);?>	
                                    	    <?php 
                                        if($fullAccess=='true')
                                            $imTeamMember='true';

                                        else{

                                               //getting member in an array 
                                                $members=CommonFunction::updateMultiSelection('sia_program', 'sia_number',$data->sia_number,'team_members');
                                               //checking whether member or not 
                                               $imTeamMember=CommonFunction::isItMe($members,Auth::user()->emp_id());
                                               }
                                         ?>
                                         @if($imTeamMember=='true')   
	                                        	<tr>
	                                        		<td>
	                                        			{{++$num}}
	                                        		</td>
	                                        		<td><a href="{{URL::to('surveillance/singleProgram/'.$data->sia_number)}}">{{$data->sia_number}}</a></td>
	                                        		<td>
														<?php 
	                                        $members=CommonFunction::updateMultiSelection('sia_program', 'sia_number',$data->sia_number,'team_members');
	                                      
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
	                                        		<td>{{CommonFunction::orgNameUsingSiaNumber($data->sia_number)}}</td>
	                                        		
	                                        		<td>{{CommonFunction::findingTitle($data->finding_number)}}[{{$data->finding_number}}]</td>
	                                        		
	                                        		<td>{{CommonFunction::safetyTitle($data->safety_issue_number)}} [{{$data->safety_issue_number}}]</td>
	                                        		<td>{{$data->target_date}}</td>
	                                        		<td>{{$data->risk_assesment_from_matrix}}</td>
	                                        		<td><a href="{{URL::to('safety/singlesafetyConcern/'.$data->safety_issue_number)}}">View</a></td>
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
