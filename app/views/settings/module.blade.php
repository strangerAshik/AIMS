@extends('layoutMT')
@section('content')
<style type="text/css">
	.modal-backdrop {
  z-index:0!important;
}
</style>
<section class='content widthController'>
<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#addModule">New Module</button>
	
</p>

         <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									
                                    <h3 class="box-title">All Module</h3>
									
                                </div><!-- /.box-header -->
                                <div class="box-body">
								<div style="display:none">
									{{$num=0;}}
								</div>
                                    <table id="example" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No.</th>
												<th>Label</th>
												<th>Module Name</th>
												<th>Update</th>
												<th>Permanent Delete</th>
												<th>Soft Delete</th>												
											</tr>
										</thead>
										
										<tbody>
										@foreach($modules as $module)
											<tr>
												<td>{{++$num}}</td>
												<td class='text-centre'>{{$module->label}}</td>
												<td class='text-centre'>{{$module->module_name}}</td>
																								
												<td class='text-centre'>
															<a data-toggle="modal" data-target="#updateModule{{$module->id}}" href='' style='color:green;float:right;padding:5px;'>
		                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
		                                    </a>
												</td>
												<td class='text-centre'>
													{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('module_names',$module->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
												</td>
												<td class='text-centre'>
													{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('module_names',$module->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
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
@include('settings.entryForm')
@yield('addModule')
@include('settings.editForm')
@yield('updateModule')

      @stop