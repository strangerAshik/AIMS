@extends('layoutTable')
@section('content')
 <div class="row">
    <div class="col-xs-12">

	<div class="box">
	    <div class="box-header">
	        <h3 class="box-title text-center text-primary">Traning Archive</h3>
	</div><!-- /.box-header -->
 <div class="box-body table-responsive">
 		<table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Emp. Name</th>
                                                <th>Category</th>
                                                <th>Subject / Specialization</th>
                                                <th>Training Course / Number</th>
                                                <th>Instructor(s) Name</th>
                                                <th>Location</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>

                                      	@foreach($trainings as $info)
                                      		<tr>
                                      			<td>{{++$num}}</td>
                                      			<td>{{$info->name}}</td>
                                      			<td>{{$info->category}}</td>
                                      			<td>{{$info->subject}}</td>
                                      			<td>{{$info->training_course}}</td>
                                      			<td>{{$info->instructor}}</td>
                                      			<td>{{$info->location}}</td>
                                      			
                                      			<td><a href="{{URL::to('qualification/singleTrainingArchive/'.$info->id)}}">view</a></td>
                                      		</tr>
                                      	@endforeach
                                      		
                                        </tbody>
                                       
        </table>
  </div>
  </div>
  </div>

@stop