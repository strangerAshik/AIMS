@extends('layout')
@section('content')
 
<section class="content contentWidth">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Employee Assignment </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
					
					</div>
					<div class="box-body">
					@if($tasks)
					@foreach($tasks as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                                <td>Active</td>
                                <td> 
                                	
										{{$info->active}}
                                	
                                </td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Name Of Assigned Task</td>
                                <td >{{$info->name}}</td>
                            </tr>
                            <tr>
                                <td>Details of Task </td>
                                <td>{{$info->assigned_task}}</td>
                           
                            <tr>
                            <tr>
                                <td>Assigned By </td>
                                <td>{{$info->assigned_by}}</td>
                            </tr>
                                <td>Date of Assigning</td>
                                <td>{{$info->entry_date." ".$info->entry_month." ".$info->entry_year}}</td>
                            </tr>
							
                            <tr>
                                <td>Date of Completion</td>
                                  <td>{{$info->termination_date." ".$info->termination_month." ".$info->termination_year}}</td>
                            </tr>
                            <tr>
                                <td>Position </td>
                                <td>{{$info->position}}</td>
                            </tr>
							
                            </tr>

							<tr>
                                <td>Note </td>
                                <td>{{$info->note}}
								</td>
                            </tr>
							
                        </tbody>
                    </table>
					@endforeach
					@else 
					<tr> 
						<td colspan="2">No Task Added By Employee</td>
					</tr>
					@endif
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

	<!--------------------End Update Pop up area--------------------------->
    <script>
$(document).ready(function(){
  
 
  
});
</script>



@stop