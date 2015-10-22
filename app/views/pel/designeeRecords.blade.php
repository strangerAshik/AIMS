@extends('layout')
@section('content')

<section class="content widthController">

<div style="display: none">{{$num=0}}</div>       
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">Designee Records</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($designeeRecords)
					@foreach($designeeRecords as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                              <th colspan='2'>Designee Record{{++$num}}
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_designee_record',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_designee_record',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_designee_record',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_designee_record',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_designee_record',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('pel_designee_record',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#updateDesigneeRecords{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
							     
							  </span>
							  </th>
                            </tr>
                             @if($info->approve=='0')
							  <tr>
								<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($info)}}</th>	
							 </tr>
							 @endif
							 @if($info->warning=='1')
								 <tr  >
								 <th colspan='2'>{{AircraftPrimaryInfo::warning($info)}}	</th>
								 </tr>  
							 @endif
                            <tr>
                                <td>									
									Active
								</td>
                                <td>{{$info->active}}</td>
                            </tr>
                            <tr>
                                <td>Designation Type</td>
                                <td>{{$info->designation_type}}</td>
                            </tr>
                            <tr>
                                <td>Designation Category</td>
                                <td> {{$info->designation_category}}</td>
                            </tr>
                            <tr>
                                <td>Business Address</td>
                                <td>{{$info->business_address}}</td>
                            </tr>
                            <tr>
                                <td>Organization</td>
                                <td>{{$info->organization}}</td>
                            </tr>
							<tr>
                                <td>Aircraft</td>
                                <td>{{$info->aircraft}}</td>
                            </tr>
							<tr>
                                <td>Effective Date</td>
                                <td>{{$info->effective_date.' '.$info->effective_month.' '.$info->effective_year}}</td>
                            </tr>
							<tr>
                                <td>Expiration Date</td>
                                <td>{{$info->expiration_date.' '.$info->expiration_month.' '.$info->expiration_year}}</td>
                            </tr>
							<tr>
                                <td>Function</td>
                                <td>{{$info->function}}</td>
                            </tr>
							<tr>
                                <td>Limitation</td>
                                <td>{{$info->limitation}}</td>
                            </tr>
							<tr>
                                <td>File</td>
                                <td>@if($info->file!='Null'){{HTML::link('files/pelDesigneeRecord/'.$info->file,'File',array('target'=>'_blank'))}}
													@else
														{{HTML::link('#','No FIle  Is Provided')}}
													@endif</td>
                            </tr>
							
                        </tbody>
                    </table>
					@endforeach
					@else 
					<table class="table table-bordered">
					<tr><td>No Data Is Given Yet!!</td></tr>
					</table>
					@endif
                </div>
                <!-- /.box-body -->
                               
                            </div><!-- /.box -->
						</div>
						
</div>
				<!--Button for popup-->



<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#designeeRecords">Add Designee Record</button>
	
</p>

@include('pel.entryForm')
@yield('designeeRecordEntry')

@include('pel.editForm')
@yield('designeeRecordUpdate')
				

</section>
@stop