@extends('layoutTable')
@section('content')
<section class='content widthController' >

         <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									
                                    <h3 class="box-title">Organization List</h3>
									
                                </div><!-- /.box-header -->
                                <div class="box-body">
								
                                    <table  id="example1" class="table table-bordered table-striped">
										<thead>
										
											<tr>
												<th>Org. Name</th>
												<th>Org. Number</th>											
												<th>Active?</th>											
												<th>Last Updated</th>
												<th>Updated By</th>
												<th>Details</th>											
											</tr>
										</thead>
									   
										{{--All View--}}
										<tbody >
											@foreach($infos as $info)
											
											<tr>
											 <td>{{$info->org_name}}</td><td>{{$info->org_number}}</td><td>{{$info->active}}</td>
											 <td>{{$num=OrgCommonFunction::lastUpdateDate($info->org_number)}}</td>
											 <td>{{$updater=OrgCommonFunction::lastUpdator($info->org_number)}}</td>
											 <td>{{ HTML::linkAction('organizationController@singleOrganization', ' Details',array('orgNum'=>$info->org_number ), array('class' => '','target'=>'_blank')) }}</td>	
											</tr>
											
											@endforeach
										</tbody>
										{{--End View All--}}
										
									</table>
									
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
      </div>    
	
	<script>

	function active(){
	 $('#active').show();
	 $('#inactive').hide();
	 $('#allView').hide();
	};
	function inactive(){
     $('#active').hide();
	 $('#inactive').show();
	 $('#allView').hide();
	}
	function allView(){
	 $('#active').hide();
	 $('#inactive').hide();
	 $('#allView').show();
	}
	
</script>
                           
</section>
@stop