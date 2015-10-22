@extends('layout')
@section('content')

<section class='content widthController' style='margin: 0 auto; max-width: 1000px;'>

<div class='row col-md-12'>
		
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block " data-toggle="modal" data-target="#primaryInfo">New SIA Execution</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block "  data-toggle="modal" data-target="#finding">Add Finding</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block"  data-toggle="modal" data-target="#issueSafety">Add Safety Concern</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block"  data-toggle="modal"  data-target="#edp">Add EDP</button>
				</p>
				<p class="text-center col-md-12 disNon">
				<button class="btn btn-primary btn-block"  data-toggle="modal" data-target="#checkList">Check List</button>
				</p>
</div>

               <div class="col-md-12">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Recent Executed SIA Program</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-primary">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        
                                                    </a>
                                                </h4>
                                            </div>
                                          <div class="disNon">{{$num=0;}}</div>
                                            <table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>SIA Number</th>
												<th>Organization</th>
												<th>Finding(s)</th>
												<th>Safety Concern(s)</th>								
												<th>EDP</th>
												<th>Status</th>
												<th>View Details</th>
											</tr>
										</thead>
										@foreach($lastActions as $info)
											@if($info->sia_number!=null)
											<tr>
												<td>{{++$num}}</td>
												<td>{{$info->sia_number}}</td>
												<td>{{$info->organization}}</td>
												
												<td>
													<?php $fNum=CommonFunction::findingCount($info->sia_number);?>
													@if($fNum!=0)
													{{$fNum}} Finding(s) Listed
													@else
														No Finding Listed Yet
													@endif

												</td>
												<td>
												<?php $sNum=CommonFunction::saftyConsCount($info->sia_number) ?>
												@if($sNum!=0)
													{{$sNum}} SC Listed
												@else
													No SC Listed Yet
												@endif

												</td>
												<td>
													<?php $edpNum=CommonFunction::edpCount($info->sia_number);?>
													@if($edpNum!=0)
													{{$edpNum}} EDP(s) Listed
													@else
														No EDP Listed Yet
													@endif

												</td>
												<td>
													<?php $status=CommonFunction::programStatus($info->sia_number);?>
													@if($status!=0)
														<span style="color:green">Close</span>
													@else 
														<span style="color:red">Open</span>
													@endif
												</td>
												<td><a target="_blink" href="{{URL::to('surveillance/singleProgram/'.$info->sia_number)}}">Details</a></td>
											</tr>
											@endif

										@endforeach
										<tbody>
										
										</tbody>
										
									</table>
               
				
				</div>
				</div>
				</div>
				</div>
				</div>
				<?php echo $lastActions->links(); ?>




 @include('safetyConcerns/entryForm')
	@yield('issueSafety')
	@yield('edp')
	@yield('riskMartix')
@include('surveillance/entryForm')
	@yield('primaryInfo')
	@yield('finding')
	@yield('checkList')


	
{{--Password Change Check --}}

@if($checklist!='null')

	<style>
.modal-headerontest {
    padding:9px 15px;
    border-bottom:1px solid #FCD209;
    background-color: #FCD209;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
 }
</style>
<!-- Modal -->

<div class="modal fade" id="singalChecklist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:9999">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Get Checklist</h4>
            </div>

            <div class="modal-body"> 
        
				{{Form::open(array('url'=>'surveillance/saveChecklistAnswer','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  {{Form::hidden('checklist_number','CL'.'_'.date('d').'_'.date('m').'_'.date('Y').'_'.time())}}
				<div class="form-group ">
                                        
											{{Form::label('checklist_number', 'Checklist Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('checklist_number_NA','CL'.'_'.date('d').'_'.date('m').'_'.date('Y').'_'.time(), array('class' => 'form-control','placeholder'=>'','required'=>'','disabled'=>''))}}
											</div>
											
                </div>
				<div class="form-group ">
                                        
											{{Form::label('sia_number ', 'SIA/ Tracking Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::siaActionListedSiaNumber();?>
											{{ Form::select('sia_number',$options,null, ['class' => 'demo-default','id'=>'checklist_sia_number','placeholder'=>'Select SIA/ Tracking Number']) }}
											</div>
											
                </div>
					
            @foreach($checklist as $info)
                    <div class="form-group ">
                                           
											{{Form::label('question', $info->question, array('class' => 'col-xs-4 col-md-4 control-label'))}}<br/>
											<div class="col-xs-6 col-md-6 ">
												<div class="radio">
											 	 <label> {{ Form::radio('answer', 'Yes',true) }} &nbsp  YES</label>
												 <label> {{ Form::radio('answer', 'No') }} &nbsp  NO</label>
												 <label> {{ Form::radio('answer', 'NA') }} &nbsp  NA</label>
												 <label> {{ Form::radio('answer', 'NC') }} &nbsp  NC</label>
												</div>
											</div>
											
                    </div>
              @endforeach
                    
					<div class="form-group">
                       
                            <button type="submit" name='' value='' class="btn btn-primary btn-lg btn-block">Save</button>
                       
                    </div>
					</div>
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>


<script>
	$(document).ready(function(){
	//$('#org_name').selectize();
	$('#check_list_name').selectize();
	$('#check_list_type').selectize();
	$('#checklist_sia_number').selectize();
	//$('#findings').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
	//multiple selection from options
var eventHandler = function(name) {
					return function() {
						console.log(name, arguments);
						$('#log').append('<div><span class="name">' + name + '</span></div>');
					};
				};
	var $select = $('#team_members').selectize({
					create          : true,
					onChange        : eventHandler('onChange'),
					onItemAdd       : eventHandler('onItemAdd'),
					onItemRemove    : eventHandler('onItemRemove'),
					onOptionAdd     : eventHandler('onOptionAdd'),
					onOptionRemove  : eventHandler('onOptionRemove'),
					onDropdownOpen  : eventHandler('onDropdownOpen'),
					onDropdownClose : eventHandler('onDropdownClose'),
					onFocus         : eventHandler('onFocus'),
					onBlur          : eventHandler('onBlur'),
					onInitialize    : eventHandler('onInitialize'),
				});	
	});


</script>
<script>
   $(function () { $('#singalChecklist').modal({
      keyboard: true
   })});
</script>
<!------End ON TEST MODAL--------->

	{{--End Password Change--}}
@endif
	


	</section>

@stop