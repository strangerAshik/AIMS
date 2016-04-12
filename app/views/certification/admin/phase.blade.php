@extends('layout')
@section('content')
<section class="content contentWidth">
	<div class="row">
		<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                <!-- small box -->
            <div class="small-box bg-aqua " >
                <div class="inner">
                    <h4 style='font-weight:bold;'>Timeline Managment</h4>
                </div>
                
                <a class="small-box-footer" href="{{URL::to('certification/timeline/1');}}">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
		<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                <!-- small box -->
            <div class="small-box bg-aqua " >
                <div class="inner">
                    <h4 style='font-weight:bold;'>Document Managment</h4>
                </div>
                
                <a class="small-box-footer" href="{{URL::to('certification/document/1');}}">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
	</div>
</section>
@stop