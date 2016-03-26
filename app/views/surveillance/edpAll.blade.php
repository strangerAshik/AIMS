@extends('layoutMT')
@section('content')
<section class='content widthController' >

         <div class="row">
                        <div class="col-md-12">
							
     
	   <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">EDP List</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example" class="table table-bordered table-striped">
                                    <?php $num=0;?>
                                    <thead>
                                         <tr>
                        <th>No.</th>
                        <th>EDP</th>                       
                        <th>Finding</th>
                        <th>SC Number</th>
                        <th>Legal Opinion</th>
                        <th>Approval</th>
                        <th class='hidden-print'>Details</th>
                     </tr>
                                    </thead>
                                        <tbody>
                    
                     @if($data)
                     @foreach ($data as $info) 
                     <tr>
                        <td>{{++$num}}</td>
                        <td>{{$info->title}} [{{$info->edp_number}}]</td>
                        
                        <td>{{CommonFunction::findingTitle($info->finding_number)}} [{{$info->finding_number}}] </td>

                        <td>
                        @if($info->sc_number)
                           {{CommonFunction::safetyTitle($info->sc_number)}} [{{$info->sc_number}}]
                        @endif
                        </td>
                        <td>
                           <?php $count=CommonFunction::isEdpLegalOpenionGiven($info->edp_number);?>
                           @if($count>0)
                           Given
                           @else 
                           Not Given
                           @endif
                        </td>
                        <td>
                           <?php $count=CommonFunction::isEdpApproved($info->edp_number);?>
                           @if($count>0)
                           Approved
                           @else 
                           Not Approved
                           @endif
                        </td>
                        <td class='hidden-print'><a href="{{URL::to('edp/singleEdp/'.$info->edp_number)}}">Details</a></td>
                     </tr>
                     @endforeach
                     @else 
                     <tr>
                        <td colspan="4">
                           No EDP Found Yet!!                       
                        </td>
                     </tr>
                     @endif
                  </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->


                             </div>    
	
                           
</section>
@stop