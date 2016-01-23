

@if($PageName=='Single Report')	
@section('updateApprovalForm')
@foreach($approvalInfo as $info)	
<div class="modal fade" id="approvalForm{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Approval Info.</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'voluntary/updateApprovalForm', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
				   {{Form::hidden('id',$info->id)}}							
					<div class="form-group required">
                                        
											{{Form::label('approved_by', 'Approved By', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('approved_by', $info->approved_by , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('designation', 'Designation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::text('designation', $info->designation , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                           
											{{Form::label('approval_date', 'Approval Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														<?php $date=CommonFunction::date($info->approval_date); ?>
														{{Form::select('approval_date', $dates ,$date,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														<?php $month=CommonFunction::month($info->approval_date); ?>
														{{Form::select('approval_month', $months , $month ,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
														<?php $year=CommonFunction::year($info->approval_date); ?>
															{{Form::select('approval_year', $years ,$year ,array('class'=>'form-control','required'=>''))}}
														</div>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('approval_note', 'Note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('approval_note',$info->approval_note, array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
											</div>
											
                    </div>
					
                    <div class="form-group">
                      
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                    
					{{Form::close()}}
            </div>
        </div>
    </div>
	</div>
	</div>
	@endforeach
	<script>
$(document).ready(function(){

});
</script>
@stop
@endif

@if($PageName=='Single Report')	
@section('updateAction')
@foreach($reportAction as $info)
<div class="modal fade" id="action{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Action Details</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'voluntary/updateAction', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>'true'))}}
					
				  {{Form::hidden('id',$info->id)}}
				  {{Form::hidden('old_file',$info->file)}}
					<div class="form-group ">
                                        
											{{Form::label('action_details', 'Action Details', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('action_details',$info->action_details, array('class' => 'form-control','placeholder'=>'','size'=>'4x2','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group">
                    	{{Form::label('file', 'Document', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											@if($info->file!='Null'){{HTML::link('files/voluntaryReporting/'.$info->file,'Document',array('target'=>'_blank'))}}
		                                    @else
		                                        {{HTML::link('#','No Certificate Provided')}}
		                                    @endif</br>
											{{Form::file('file',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
                    </div>
                
                    <div class="form-group">
                      
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                     </div>
                    
					{{Form::close()}}
            
        </div>
    </div>
	</div>
	</div>
	<script>
$(document).ready(function(){


//$('#approved_by').selectize({create: true, sortField: {field: 'text',direction: 'asc' }});

});
</script>
@endforeach
@stop

@endif