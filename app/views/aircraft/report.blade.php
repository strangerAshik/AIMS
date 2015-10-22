@extends('layoutReport')
@section('content')
<section class='content widthController'>
 <!-- Main content -->
                <div class="content">

                    <div class="row col-md-12">
                       


              			
                    @include('reportBank.SiaFindingsScEdpByAircraftMms')
                            @yield('SiaFindingsScEdpByAircraftMms')
                    
		      	    </div>
		        </div><!-- /.content -->
</section>


@stop