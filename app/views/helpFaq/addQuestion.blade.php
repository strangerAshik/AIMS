@extends('layout')

@section('content')
<section class="content contentWidth">
	<div class="row">
		 <p class="text-center col-md-12">
						<button class="btn btn-primary btn-block"  data-toggle="modal" data-target="#askQuestion">Add Question</button>
		</p>
	</div>


 <div class="row">
                        <div class="col-xs-12">
                            

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Recent Added Questions </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                               
                                                <th class="col-md-1">Date</th>
                                                <th class="col-md-2">Category</th>
                                                <th>Questions</th>
                                                <th class="col-md-1">Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($recentQuestion as $info) 
                                      
                                            <tr>
                                                                                             
                                                <td class="col-md-2">{{date('d F Y',strtotime($info->created_at))}}</td>
                                                <td class="col-md-3">
                                                    @if($categories=CommonFunction::updateMultiSelection('help_faq_question', 'id',$info->id,'category'))
                                                    <?php $i=0;$itemNum=count($categories);?>
                                                        @foreach($categories as $key=>$value)
                                                            {{$value}}@if(++$i!=$itemNum),&nbsp @endif
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>{{$info->question}}</td>
                                                
                                                <td><a  class="btn btn-primary" href="singleQuestionAnsware/{{$info->id}}">View</a></td>
                                                
                                            </tr>
                                     
                                            @endforeach
                                       
                                        </tbody>
                                      
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div> 
                    
</section>
@include('helpFaq.entryForm')
@yield('askQuestion')

@stop