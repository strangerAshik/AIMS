@extends('layoutTable')
@section('content')
  <!-- Right side column. Contains the navbar and content of the page -->
            
                    <div class="row">
                        <div class="col-xs-12">
                            

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Today's Task List</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                               <!--  <th>Date[Y-M-D]</th> -->
                                                <th>SIA/Tracking No</th>
                                                <th>Event</th>
                                                
                                                <th>Time</th>
                                                <th>Team Members</th>
                                                 <th>Location</th>
                                                <th>Accomplishment Status</th>
                                               
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                        @foreach ($prgramList as $program)
                                            <tr>
                                                <td>{{++$num}}</td>                                                
                                                <!-- <td>{{$program->date}}</td> -->
                                                <td>{{$program->sia_number}}</td>
                                                <td>{{$program->event}}</td>
                                                <td>{{$program->time}}</td>
                                                <td>
                                               @if($authors=CommonFunction::updateMultiSelection('sia_program', 'id',$program->id,'team_members'))
                                               @if($authors!=null)
                                                    @foreach($authors as $key=>$value)
                                                        {{$value}},
                                                    @endforeach
                                               
                                                @endif
                                                @else
                                                    No Members Added!!
                                                @endif</td>
                                               
                                                <td>{{$program->location}}</td>

                                                 <td>@if($insNum=CommonFunction::inspectionHappend($program->sia_number)>0) 
                                                    Yes
                                                    @else
                                                    No
                                                    @endif
                                                 </td>
                                                <td><a  href="{{URL::to('surveillance/singleProgram/'.$program->sia_number)}}">Details</a></td>
                                                
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <!-- <th>Date[Y-M-D]</th> -->
                                                <th>SIA/Tracking No</th>
                                                <th>Event</th>
                                                
                                                <th>Time</th>
                                                <th>Team Members</th>
                                                <th>Location</th>
                                                <th>Accomplishment Status </th>
                                                
                                                <th>Details</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                

@stop