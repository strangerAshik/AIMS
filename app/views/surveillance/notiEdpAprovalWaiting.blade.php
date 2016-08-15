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
	                                               
	                                                <th>Finding Title</th>
	                                               
	                                                <th>EDP Title</th>
	                                                <th>Details</th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                             <?php
                                        //check whether user has full access notification
                                         $fullAccess=CommonFunction::hasPermission('sia_notification_full',Auth::user()->emp_id(),'access');?>

	                                        <?php $num=0;?>
                                    	    @foreach ($notApproveEdp as $info)  
                                    	    <?php $data=CommonFunction::getEdpNumberInfo($info);?>		
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
	                                        		<td>{{++$num}}</td>
	                                        		<td>
	                                        		 <a href="{{URL::to('surveillance/singleProgram/'.$data->sia_number)}}">{{$data->sia_number}}</a>
	                                        		
	                                        		</td>
	                                        		<td>
	                                        			{{$org=CommonFunction::orgNameUsingSiaNumber($data->sia_number)}}
	                                        		</td>
	                                        		
	                                        		<td>{{$findingTitle=CommonFunction::findingTitle($data->finding_number)}} [{{$data->finding_number}}]</td>
	                                        		
	                                        		<td>{{$data->title}} [{{$data->edp_number}}]</td>
	                                        		
	                                        		<td><a href="{{URL::to('edp/singleEdp/'.$data->edp_number)}}">View</a></td>
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
