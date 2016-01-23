@extends('layoutTable')
@section('content')
<style type="text/css">
    #question input{width:400px!important;}
    #view input{ color: blue}
</style>
<section class="content contentWidth">
	 <div class="row">
                        <div class="col-xs-12">
                            

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">FAQ Bank</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                               
                                                <th class="col-md-1">Date</th>
                                                <th class="col-md-2">Category</th>
                                                <th id="question">Questions</th>
                                                <th >Name</th>
                                                <th>Status</th>
                                                <th class="col-md-1" id="view" disabled >Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                      @foreach($question as $info)
                                            <tr>
                                                                                             
                                                <td>{{date('d F Y',strtotime($info->created_at))}}</td>
                                                <td>
                                                    @if($categories=CommonFunction::updateMultiSelection('help_faq_question', 'id',$info->id,'category'))
                                                    <?php $i=0;$itemNum=count($categories);?>
                                                        @foreach($categories as $key=>$value)
                                                            {{ $value }}@if(++$i!=$itemNum),<br> @endif
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>{{$info->question}}</td>
                                                <td>{{$info->row_creator}}</td>
                                                <td>
                                                    @if($info->ans)
                                                        <span style="color:green">Answered</span>
                                                    @else 
                                                         <span style="color:red">Not Given</span>
                                                    @endif
                                                </td>
                                                
                                                <td class="text-center"><a  class="btn btn-primary " href="singleQuestionAnsware/{{$info->id}}">View</a></td>
                                                
                                            </tr>
                                      @endforeach
                                           
                                        </tbody>
                                       <tfoot>
                                            <tr>
                                               
                                                <th class="col-md-1">Date</th>
                                                <th class="col-md-2">Category</th>
                                                <th>Questions</th>
                                                <th>Status</th>
                                                <th class="col-md-1">Details</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div> 

</section>

@stop