@extends('layout')

@section('content')
<section class="content contentWidth">
	<div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Question-Answare</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
								
													
									
                                    <table class="table table-bordered">
                                    
									<tbody>
									
									
                                   <tr>               
								<th colspan='2' style='color:#72C2E6'>Question
									@if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sia_findings',''), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sia_findings',''), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
										
									
									 @if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#updateFindings" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif

								</th>
								
						    </tr> 
                                      
                                        <tr>
                                           
                                            <td class="col-md-4">Question</td>
                                            <td >Question?</td>
                                            
                                        </tr>
                                      	
                                        <tr>
                                            <td>Document</td>
                                            <td>
				                               Document
											</td>
                                        </tr>
                                        
										@if('true')
                          
										<tr>
                                           <th colspan='2' style='color:green'>Answare
									 @if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sia_corrective_action',''), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sia_corrective_action', ''), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
										
									
									 @if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#updateCorrectiveIssue" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
								</th>
                                        </tr>
										<tr>
                                            <td>Answare</td>
                                            <td>Answare</td>
                                        </tr>
										
										<tr>
                                            <td>Document</td>
                                            <td>
				                              Document
											</td>
                                        </tr>
                                      
										
												<tr> <td colspan='2' style="color:red;text-align:center">Not Answared Yet!!</td></tr>
											    
												
													<tr> <td colspan='2' style="color:red;text-align:center"><button class="btn btn-primary" data-toggle="modal" data-target="#answare">Answare The Question</button></td></tr>
												
										@endif
										
                                    </tbody></table>
								
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
</div>   

</section>
@include('helpFaq.entryForm')
@yield('answare')

@stop