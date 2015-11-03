
@if($PageName=='Single Report')	
@section('approvalForm')
<div class="modal fade" id="approvalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Approval Form</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'safety/saveApprovalForm', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
				  
					
					
					
					
					<div class="form-group required">
                                        
											{{Form::label('approved_by', 'Approved By', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('approved_by', Auth::User()->getName() , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('designation', 'Designation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::text('designation', Auth::User()->Role() , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                           
											{{Form::label('approval_date', 'Approval Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('approval_date', $dates , date('d') ,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('approval_month', $months , date('F') ,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('approval_year', $years , date('Y') ,array('class'=>'form-control','required'=>''))}}
														</div>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('approval_note', 'Note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('approval_note','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
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
	<script>
$(document).ready(function(){


//$('#approved_by').selectize({create: true, sortField: {field: 'text',direction: 'asc' }});

});
</script>
@stop
@endif