@extends('layoutTable')
@section('content')
<section class='content widthController'>
   <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									
                                    <h3 class="box-title">All Users</h3>
								
                                </div><!-- /.box-header -->
                    
                    <div style="display:none">{{$num=0}}</div>
                      
                    <div class="box-body">						
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Photo</th>
                        <th>Description</th>
                        <th>View Details</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                   
                @foreach($users as $info)
                    <tr>
                      <td>
                        {{++$num}}
                      </td>
                      <td>
                        <div class="icon">
                                    <a href="{{'singleUser/'.$info->emp_id}}"> <i > @if($info->photo)
                            {{HTML::image('files/userPhoto/'.$info->photo,'User',array('class'=>'img-thumbnail','width'=>'60px','height'=>'60px'))}}
                          @else
                            {{HTML::image('img/PersonnelPhoto/'.'anonymous.png','User',array('class'=>'img-thumbnail','width'=>'60px','height'=>'60px'))}}
                          @endif</i></a>
                                </div>
                      </td>
                      <td>
                        <div class="inner">
                                    <h6 class='title'>
                                      {{$info->name}}
                                    </h6>
                                    Role:{{$info->role}}</br>
                                    Emp Id:{{$info->emp_id}}</br>
                                    Org:{{$info->organization}}
                                   
                        </div> 
                      </td>
                      <td>
                         <a class="small-box-footer" target="_blink" href="{{'singleUser/'.$info->emp_id}}" >
                                   View Details <i class="fa fa-arrow-circle-right"></i>
                                </a>
                      </td>
                    </tr>
                        
               @endforeach
               </tbody>
               </table>
									
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
      </div>  

               
</section>

@stop