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
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>Emp. id</th>
                                                <th>Emp. Name</th>
                                                <th>Email</th>                                
                                                <th>Organization</th>                                
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                          @foreach($emps as $info)
                                            <tr>
                                                <td>{{++$num}}</td>
                                                <td class="col-md-1">
                                                  {{ HTML::image('img/PersonnelPhoto/'.$info->photo, 'Photo Missing('.$info->photo.')', array('class' => 'img-thumbnail','width'=>'100','height'=>'250')) }}

                                                </td>
                                                <td>{{$info->emp_id}}</td>
                                                <td>{{$info->name}}</td>
                                                <td>{{$info->email}}</td>
                                                <td>{{$info->organization}}</td>
                                                <td><a href="{{URL::to('qualification/singleEmpTask/'.$info->emp_id)}}">View</a></td>
                                            </tr>
                                            
                                          @endforeach
                                      	
                                        </tbody>
                                       
        </table>
  </div>
  </div>
  </div>

@stop