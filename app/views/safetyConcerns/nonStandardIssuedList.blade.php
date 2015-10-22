@extends('layout')
@section('content')
<section class='content widthController' >

         <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									
                                    <h3 class="box-title">Non Standard Issue List</h3>
									<div class="col-md-4 col-md-offset-3  position">
										<form action="" class="search-form">
											<div class="form-group has-feedback">
												<label for="search" class="sr-only">Search</label>
												<input type="text" class="form-control" name="search" id="search" placeholder="search">
												<span class="glyphicon glyphicon-search form-control-feedback"></span>
											</div>
										</form>
									</div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
								
                                    <table class="table table-bordered">
										<thead>
										<tr>
											<td colspan='8'>
											<button class='btn btn-warning btn-sm'id="" onclick='openIssue()'>Open</button>
											
											<button class='btn btn-success btn-sm'id="" onclick='resolved()'>Resolved</button>
											<button class='btn btn-default btn-sm'id="" onclick='cancelled()'>Cancelled</button>
											<button class='btn btn-primary btn-sm'id="" onclick='allView()'>All</button>
											</td>
										</tr>
											<tr>
												<th>Ins No. & Title</th>
												<th>SC No.  & Title</th>
												
												<th>Corrective Status</th>
												<th>Initial Risk Analysis</th>
												<th>Corrective Priority</th>
												
												
											</tr>
										</thead>
									    {{--Start Open--}}
										<tbody id='open'>
											@foreach($infos as $info)
											@if($info->corrective_satatus=='Open')
											<tr>
											   @if($info->inspection_number!='')
												<td class='text-centre'>
												Title : {{$info->inspection_title}}</br>
												Ins No : {{$info->inspection_number}}</br>												
												{{ HTML::linkAction('safetyConcernsController@singleInspection', 'View Inspection Details',array('ins_num'=>$info->inspection_number ), array('class' => '','target'=>'_blank')) }}
												</td>
												@else
												 <td>
													No Inspection Number 
												 </td>
												@endif
												<td class='text-centre'>
												Title : {{$info->safety_issue_title}}</br>
												SC No. : {{$info->safety_issue_number }}</br>
												{{ HTML::linkAction('safetyConcernsController@singlesafetyConcern', 'View Safety Concern Details',array('sc_num'=>$info->safety_issue_number ), array('class' => '','target'=>'_blank')) }}
												</td>
												
												
												{{--Start Corrective Status--}}
													@if($info->corrective_satatus=='Resolved')
													<td class='text-centre ' style='color:#008D4C'>{{$info->corrective_satatus	}}</td>
													@elseif($info->corrective_satatus=='Open')
													<td class='text-centre'  style='color:#FF851B'>{{$info->corrective_satatus	}}</td>
													@elseif($info->corrective_satatus=='Cancelled')
													<td class='text-centre' style='color:#DDD'>{{$info->corrective_satatus	}}</td>
													@else
													<td class='text-centre primary'>{{$info->corrective_satatus	}}</td>
													@endif
												{{--End Corrective Status--}}
												
											    {{--Start Initial Risk Analysis--}}
													@if($info->initial_risk_analysis=='High Risk')
													<td class='text-centre ' style='color:#F4543C'>{{$info->initial_risk_analysis}}</td>
													@elseif($info->initial_risk_analysis=='Medium Risk')
													<td class='text-centre' style='color:#FF851B'>{{$info->initial_risk_analysis}}</td>
													@elseif($info->initial_risk_analysis=='Low Risk')
													<td class='text-centre' style='color:#F4B400'>{{$info->initial_risk_analysis}}</td>
													@elseif($info->initial_risk_analysis=='No Risk')
													<td class='text-centre' style='color:#008D4C'>{{$info->initial_risk_analysis}}</td>
													@else
													<td class='text-centre'>{{$info->initial_risk_analysis}}</td>
													@endif												
												{{--End Initial Risk Analysis--}}
												
												<td class='text-centre'>{{$info->corrective_priority}}</td>
												
												
											</tr>
											@endif
											@endforeach
										</tbody>
										{{--End Open--}}
										
										{{--Resolved--}}
										<tbody id='resolved' class='disNon'>
											@foreach($infos as $info)
											@if($info->corrective_satatus=='Resolved')
											<tr>
												 @if($info->inspection_number!='')
												<td class='text-centre'>
												Title : {{$info->inspection_title}}</br>
												Ins No : {{$info->inspection_number}}</br>												
												{{ HTML::linkAction('safetyConcernsController@singleInspection', 'View Inspection Details',array('ins_num'=>$info->inspection_number ), array('class' => '','target'=>'_blank')) }}
												</td>
												@else
												 <td>
													No Inspection Number 
												 </td>
												@endif
												<td class='text-centre'>
												Title : {{$info->safety_issue_title}}</br>
												SC No. : {{$info->safety_issue_number }}</br>
												{{ HTML::linkAction('safetyConcernsController@singlesafetyConcern', 'View Safety Concern Details',array('sc_num'=>$info->safety_issue_number ), array('class' => '','target'=>'_blank')) }}
												</td>
												
												{{--Start Corrective Status--}}
													@if($info->corrective_satatus=='Resolved')
													<td class='text-centre ' style='color:#008D4C'>{{$info->corrective_satatus	}}</td>
													@elseif($info->corrective_satatus=='Open')
													<td class='text-centre'  style='color:#FF851B'>{{$info->corrective_satatus	}}</td>
													@elseif($info->corrective_satatus=='Cancelled')
													<td class='text-centre' style='color:#DDD'>{{$info->corrective_satatus	}}</td>
													@else
													<td class='text-centre primary'>{{$info->corrective_satatus	}}</td>
													@endif
												{{--End Corrective Status--}}
												
											    {{--Start Initial Risk Analysis--}}
													@if($info->initial_risk_analysis=='High Risk')
													<td class='text-centre ' style='color:#F4543C'>{{$info->initial_risk_analysis}}</td>
													@elseif($info->initial_risk_analysis=='Medium Risk')
													<td class='text-centre' style='color:#FF851B'>{{$info->initial_risk_analysis}}</td>
													@elseif($info->initial_risk_analysis=='Low Risk')
													<td class='text-centre' style='color:#F4B400'>{{$info->initial_risk_analysis}}</td>
													@elseif($info->initial_risk_analysis=='No Risk')
													<td class='text-centre' style='color:#008D4C'>{{$info->initial_risk_analysis}}</td>
													@else
													<td class='text-centre'>{{$info->initial_risk_analysis}}</td>
													@endif												
												{{--End Initial Risk Analysis--}}
												
												<td class='text-centre'>{{$info->corrective_priority}}</td>
												
											</tr>
											@endif
											@endforeach
										</tbody>
										{{--End Resolved--}}
										{{--Cancelled--}}
										<tbody id='cancelled' class='disNon'>
											@foreach($infos as $info)
											@if($info->corrective_satatus=='Cancelled')
											<tr>
												 @if($info->inspection_number!='')
												<td class='text-centre'>
												Title : {{$info->inspection_title}}</br>
												Ins No : {{$info->inspection_number}}</br>												
												{{ HTML::linkAction('safetyConcernsController@singleInspection', 'View Inspection Details',array('ins_num'=>$info->inspection_number ), array('class' => '','target'=>'_blank')) }}
												</td>
												@else
												 <td>
													No Inspection Number 
												 </td>
												@endif
												<td class='text-centre'>
												Title : {{$info->safety_issue_title}}</br>
												SC No. : {{$info->safety_issue_number }}</br>
												{{ HTML::linkAction('safetyConcernsController@singlesafetyConcern', 'View Safety Concern Details',array('sc_num'=>$info->safety_issue_number ), array('class' => '','target'=>'_blank')) }}
												</td>
												
												{{--Start Corrective Status--}}
													@if($info->corrective_satatus=='Resolved')
													<td class='text-centre ' style='color:#008D4C'>{{$info->corrective_satatus	}}</td>
													@elseif($info->corrective_satatus=='Open')
													<td class='text-centre'  style='color:#FF851B'>{{$info->corrective_satatus	}}</td>
													@elseif($info->corrective_satatus=='Cancelled')
													<td class='text-centre' style='color:#DDD'>{{$info->corrective_satatus	}}</td>
													@else
													<td class='text-centre primary'>{{$info->corrective_satatus	}}</td>
													@endif
												{{--End Corrective Status--}}
												
											    {{--Start Initial Risk Analysis--}}
													@if($info->initial_risk_analysis=='High Risk')
													<td class='text-centre ' style='color:#F4543C'>{{$info->initial_risk_analysis}}</td>
													@elseif($info->initial_risk_analysis=='Medium Risk')
													<td class='text-centre' style='color:#FF851B'>{{$info->initial_risk_analysis}}</td>
													@elseif($info->initial_risk_analysis=='Low Risk')
													<td class='text-centre' style='color:#F4B400'>{{$info->initial_risk_analysis}}</td>
													@elseif($info->initial_risk_analysis=='No Risk')
													<td class='text-centre' style='color:#008D4C'>{{$info->initial_risk_analysis}}</td>
													@else
													<td class='text-centre'>{{$info->initial_risk_analysis}}</td>
													@endif												
												{{--End Initial Risk Analysis--}}
												
												<td class='text-centre'>{{$info->corrective_priority}}</td>
												
											</tr>
											@endif
											@endforeach
										</tbody>
										{{--End Cancelled--}}
										{{--All View--}}
										<tbody id='allView' class='disNon'>
											@foreach($infos as $info)
											
											<tr>
												 @if($info->inspection_number!='')
												<td class='text-centre'>
												Title : {{$info->inspection_title}}</br>
												Ins No : {{$info->inspection_number}}</br>												
												{{ HTML::linkAction('safetyConcernsController@singleInspection', 'View Inspection Details',array('ins_num'=>$info->inspection_number ), array('class' => '','target'=>'_blank')) }}
												</td>
												@else
												 <td>
													No Inspection Number 
												 </td>
												@endif
												<td class='text-centre'>
												Title : {{$info->safety_issue_title}}</br>
												SC No. : {{$info->safety_issue_number }}</br>
												{{ HTML::linkAction('safetyConcernsController@singlesafetyConcern', 'View Safety Concern Details',array('sc_num'=>$info->safety_issue_number ), array('class' => '','target'=>'_blank')) }}
												</td>
												
												{{--Start Corrective Status--}}
													@if($info->corrective_satatus=='Resolved')
													<td class='text-centre ' style='color:#008D4C'>{{$info->corrective_satatus	}}</td>
													@elseif($info->corrective_satatus=='Open')
													<td class='text-centre'  style='color:#FF851B'>{{$info->corrective_satatus	}}</td>
													@elseif($info->corrective_satatus=='Cancelled')
													<td class='text-centre' style='color:#DDD'>{{$info->corrective_satatus	}}</td>
													@else
													<td class='text-centre primary'>{{$info->corrective_satatus	}}</td>
													@endif
												{{--End Corrective Status--}}
												
											    {{--Start Initial Risk Analysis--}}
													@if($info->initial_risk_analysis=='High Risk')
													<td class='text-centre ' style='color:#F4543C'>{{$info->initial_risk_analysis}}</td>
													@elseif($info->initial_risk_analysis=='Medium Risk')
													<td class='text-centre' style='color:#FF851B'>{{$info->initial_risk_analysis}}</td>
													@elseif($info->initial_risk_analysis=='Low Risk')
													<td class='text-centre' style='color:#F4B400'>{{$info->initial_risk_analysis}}</td>
													@elseif($info->initial_risk_analysis=='No Risk')
													<td class='text-centre' style='color:#008D4C'>{{$info->initial_risk_analysis}}</td>
													@else
													<td class='text-centre'>{{$info->initial_risk_analysis}}</td>
													@endif												
												{{--End Initial Risk Analysis--}}
												
												<td class='text-centre'>{{$info->corrective_priority}}</td>
												
												
											</tr>
											
											@endforeach
										</tbody>
										{{--End View All--}}
										
									</table>
									
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
      </div>    
	
	<script>

	function openIssue(){
	 $('#open').show();
	 $('#resolved').hide();
	 $('#cancelled').hide();
	 $('#allView').hide();
	};
	function resolved(){
     $('#open').hide();
	 $('#resolved').show();
	 $('#cancelled').hide();
	 $('#allView').hide();
	}
	function cancelled(){
     $('#open').hide();
	 $('#resolved').hide();
	 $('#cancelled').show();
	 $('#allView').hide();
	}
	function allView(){
	 $('#open').hide();
	 $('#resolved').hide();
	 $('#cancelled').hide();
	 $('#allView').show();
	}
</script>
                           
</section>
@stop