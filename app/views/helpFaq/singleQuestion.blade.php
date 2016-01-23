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
									
									
                                 
                                      @foreach($question as $info)
                                        <tr>               
										<th colspan='2' style='color:#72C2E6'>Question
										<span class="hidden-print">
											@if('true'==CommonFunction::hasPermission('help_faq_ask_question',Auth::user()->emp_id(),'par_delete'))
												{{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('help_faq_question',$info->id,$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
											 @endif
											 @if('true'==CommonFunction::hasPermission('help_faq_ask_question',Auth::user()->emp_id(),'sof_delete'))
												{{ HTML::linkAction('BaseController@softDelete', 'S.D',array('help_faq_question',$info->id,$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
											 @endif
												
											
											 @if('true'==CommonFunction::hasPermission('help_faq_ask_question',Auth::user()->emp_id(),'update'))
												 <a data-toggle="modal" data-target="#updateQuestion{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
													<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
												</a>
											 @endif
										</span>

										</th>
										
						   				 </tr> 
                                        <tr>
                                           
                                            <td class="col-md-4">Category</td>
                                            <td >
													   @if($categories=CommonFunction::updateMultiSelection('help_faq_question', 'id',$info->id,'category'))
                                                    <?php $i=0;$itemNum=count($categories);?>
                                                        @foreach($categories as $key=>$value)
                                                            {{$value}}@if(++$i!=$itemNum),&nbsp @endif
                                                        @endforeach
                                                    @endif
                                            </td>
                                            
                                        </tr>
                                      	<tr>
                                           
                                            <td class="col-md-4">Question</td>
                                            <td >{{$info->question}}</td>
                                            
                                        </tr>
                                      	
                                        <tr>
                                            <td>Document</td>
                                            <td>
						                    @if($info->file!='Null'){{HTML::link('files/helpFaq/'.$info->file,'Document',array('target'=>'_blank'))}}
		                                    @else
		                                        {{HTML::link('#','No Document Provided')}}
		                                    @endif
											</td>
                                        </tr>
                                       @endforeach
                                        <?php $num=0;?>
										@if($ans)
                          				@foreach($ans as $info)
										<tr>
                                           <th colspan='2' style='color:green'>Answer #{{++$num}}
                                           <span class="hidden-print">
												@if('true'==CommonFunction::hasPermission('help_faq_answer',Auth::user()->emp_id(),'par_delete'))
													{{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('help_faq_ans',$info->id,$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
												 @endif
												 @if('true'==CommonFunction::hasPermission('help_faq_answer',Auth::user()->emp_id(),'sof_delete'))
													{{ HTML::linkAction('BaseController@softDelete', 'S.D',array('help_faq_ans',$info->id,$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
												 @endif
													
												
												 @if('true'==CommonFunction::hasPermission('help_faq_answer',Auth::user()->emp_id(),'update'))
													 <a data-toggle="modal" data-target="#updateAns{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
														<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
													</a>
												 @endif
											</span>
										 </th>
                                        </tr>
										<tr>
                                            <td>Answer</td>
                                            <td>{{$info->ans}}</td>
                                        </tr>
										
										<tr>
                                            <td>Document</td>
                                            <td>
				                            @if($info->file!='Null'){{HTML::link('files/helpFaq/'.$info->file,'Document',array('target'=>'_blank'))}}
		                                    @else
		                                        {{HTML::link('#','No Document Provided')}}
		                                    @endif
											</td>
                                        </tr>
                                        @endforeach
                                        @else

                                      
										
												<tr> <td colspan='2' style="color:red;text-align:center">Not Answered Yet!!</td></tr>
											    
												
											 @if('true'==CommonFunction::hasPermission('help_faq_answer',Auth::user()->emp_id(),'entry'))
													<tr> <td colspan='2' style="color:red;text-align:center"><button class="btn btn-primary" data-toggle="modal" data-target="#answare">Answer The Question</button></td></tr>
											 @endif
												
										@endif
										
                                    </tbody></table>
								
                                </div><!-- /.box-body -->
                            </div>    
                             @include('common')
                  			  @yield('print')  
                            </div> 
                              
</div>   

</section>
@include('helpFaq.entryForm')
@yield('answare')

@include('helpFaq.editForm')
@yield('updateQuestion')
@yield('updateAns')

@stop