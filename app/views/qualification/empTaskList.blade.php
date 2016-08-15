@extends('layoutTable')
@section('content')
 <div class="row">
    <div class="col-xs-12">

	<div class="box">
	    <div class="box-header">
	        <h3 class="box-title text-center text-primary">Task List</h3>
	</div><!-- /.box-header -->
 <div class="box-body table-responsive">
 		<table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                               
                                                <th>Name</th>
                                                <th>Task Title</th>
                                                <th>Active</th>                 
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                          @foreach($emps as $info)
                                          <?php $name=CommonFunction::empNameByEmpId($info->emp_id);?>
                                          @if($name)
                                            <tr>
                                                <td>{{++$num}}</td>
                                               
                                                <td>
                                                  {{$name}}
                                                </td>
                                                <td>{{$info->name}}</td>
                                                <td>{{$info->active}}</td>
                                                <td><a href="{{URL::to('qualification/comp_view/'.$info->emp_id.'#'.'task_'.$info->id)}}">View</a></td>
                                            </tr>
                                          @endif
                                            
                                          @endforeach
                                      	
                                        </tbody>
                                       
        </table>
  </div>
  </div>
  </div>

@stop