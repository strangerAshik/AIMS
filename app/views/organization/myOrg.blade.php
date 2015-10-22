@extends('layout')
@section('content')
<section class='content widthController' >

         <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									
                                    <h3 class="box-title">My Organization</h3>
									<div class="col-md-4 col-md-offset-3  position">
										<form action="" class="search-form">
											<div class="form-group has-feedback">
												<label for="search" class="sr-only">Search</label>
												<input type="text" class="form-control" name="search" id="search" placeholder="search">
												<span class="glyphicon glyphicon-search form-control-feedback"></span>
											</div>
										</form>
									</div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
								
                                    <table class="table table-bordered">
										<thead>
										<tr>
											<td colspan='8'>
											<button class='btn btn-success btn-sm'id="" onclick='active()'>Active</button>
											
											<button class='btn btn-danger  btn-sm'id="" onclick='inactive()'>Inactive</button>
											
											<button class='btn btn-primary btn-sm'id="" onclick='allView()'>All</button>
											</td>
										</tr>
											<tr>
												<th>Org. Name</th>
												<th>Org. Number</th>											
												<th>Active?</th>											
												<th>Last Updated</th>
												<th>Updated By</th>
												<th>Details</th>											
											</tr>
										</thead>
									    {{--Start Active--}}
										<tbody id='active'>
											@foreach($infos as $info)
											@if($info->active=='Yes')
											<tr>
											 <td>{{$info->org_name}}</td><td>{{$info->org_number}}</td><td>{{$info->active}}</td>
											 <td>{{$num=OrgCommonFunction::lastUpdateDate($info->org_number)}}</td>
											 <td>{{$updater=OrgCommonFunction::lastUpdator($info->org_number)}}</td>
											 <td>{{ HTML::linkAction('organizationController@singleOrganization', ' Details',array('orgNum'=>$info->org_number ), array('class' => '','target'=>'_blank')) }}</td>	
											</tr>
											@endif
											@endforeach
										</tbody>
										{{--End Active--}}
										
										{{--Inactive--}}
										<tbody id='inactive' class='disNon'>
										@foreach($infos as $info)
											@if($info->active=='No')
											<tr>
											  <td>{{$info->org_name}}</td><td>{{$info->org_number}}</td><td>{{$info->active}}</td>
											  <td>{{$num=OrgCommonFunction::lastUpdateDate($info->org_number)}}</td>
											 <td>{{$updater=OrgCommonFunction::lastUpdator($info->org_number)}}</td>
											  <td>{{ HTML::linkAction('organizationController@singleOrganization', ' Details',array('orgNum'=>$info->org_number ), array('class' => '','target'=>'_blank')) }}</td>	
											</tr>
											@endif
											@endforeach
										</tbody>
										{{--End Inactive--}}
									
										{{--All View--}}
										<tbody id='allView' class='disNon'>
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