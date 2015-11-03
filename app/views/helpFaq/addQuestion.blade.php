@extends('layout')

@section('content')
<section class="content contentWidth">
	<div class="row">
		 <p class="text-center col-md-12">
						<button class="btn btn-primary btn-block"  data-toggle="modal" data-target="#newProgram">Add Question</button>
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
                                                <th class="col-md-1">Answare</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                      
                                            <tr>
                                                                                             
                                                <td>{{date('d F Y',strtotime('01-07-2015'))}}</td>
                                                <td>category</td>
                                                <td>Question?</td>
                                                
                                                <td><a  class="btn btn-primary" href="singleQuestionAnsware/id">See Answare</a></td>
                                                
                                            </tr>
                                            <tr>
                                                                                             
                                                <td>{{date('d F Y',strtotime('01-07-2015'))}}</td>
                                                <td>category</td>
                                                <td>Question?</td>

                                                <td><a  class="btn btn-primary" href="singleQuestionAnsware/id">See Answare</a></td>
                                                
                                            </tr>
                                       
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