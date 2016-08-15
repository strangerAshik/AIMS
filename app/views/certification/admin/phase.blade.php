@extends('layout')
@section('content')
<section class="content contentWidth">

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-primary">          
            <div class="box-body">
            <?php $phaseInfo=CommonFunction::phaseInfo($phaseId);?>
               <span>{{$phaseInfo->title}}: {{$phaseInfo->subtitle}}</span> 
            </div>
        </div>
    </div>    
</div>

	<div class="row">
		<div class="col-md-4">
                <!-- small box -->
            <div class="small-box bg-aqua " >
                <div class="inner">
                    <h4 style='font-weight:bold;'>Timeline & Sample Template Management</h4>
                </div>
                
                <a class="small-box-footer" href="{{URL::to('certification/timeline/'.$phaseId);}}">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
		<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                <!-- small box -->
            <div class="small-box bg-aqua " >
                <div class="inner">
                    <h4 style='font-weight:bold;'>Form Managment</h4>
                </div>
                
                <a class="small-box-footer" href="{{URL::to('certification/document/'.$phaseId);}}">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
	</div>
</section>
@stop