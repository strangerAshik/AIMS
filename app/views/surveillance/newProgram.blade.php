@extends('layout')
@section('content')
<section class='content widthController' >
<div class="row">
 <p class="text-center col-md-12">
				<button class="btn btn-primary btn-block"  data-toggle="modal" data-target="#newProgram">Add New SIA Program</button>
</p>
</div>
 <div class="row">
                        <div class="col-xs-12">
                            

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Recent Added SIA Program List </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                               
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>SIA/Tracking No</th>
                                                <th>Team Leader</th>
                                                <th>Organization</th>
                                                <th>Event</th>                                              
                                                <th>Execution Status</th>
                                              
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        @if($prgramList)
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                        @foreach ($prgramList as $program)
                                            <tr>
                                                                                             
                                                <td>{{date('d F Y',strtotime($program->date))}}</td>
                                                <td>{{$program->time}}</td>
                                                <td>{{$program->sia_number}}</td>
                                                <td> 
                                                   @if($authors=CommonFunction::updateMultiSelection('sia_program', 'id',$program->id,'team_members'))
                                                                                   @if($authors!=null)
                                                                                        @foreach($authors as $key=>$value)
                                                                                            {{$value; break}}
                                                                                        @endforeach
                                                                                   
                                                                                    @endif
                                                    @else
                                                        No Members Added!!
                                                    @endif</td>                                                
                                                <td>{{$program->org_name}}</td>
                                                <td>{{$program->event}}</td>
                                             
                                                <td>@if($insNum=CommonFunction::inspectionHappend($program->sia_number)>0) 
                                                    <span style="color:green">Done</span>
                                                    @else
                                                   <span style="color:#FFC200"> Action Not Taken</span>
                                                    @endif
                                                 </td>
                                                
                                                <td><a  href="{{URL::to('surveillance/singleProgram/'.$program->sia_number)}}">Details</a></td>
                                                
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        @else 
                                         <tbody>
                                            <tr><td colspan="8">No Program Designed Yet!!</td></tr>
                                         </tbody>
                                        @endif
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
 </div> 
 <?php echo $prgramList->links(); ?>
</section>

@include('surveillance.entryForm')
@yield('newProgram')

@stop