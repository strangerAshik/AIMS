@extends('layoutReport')
@section('content')
<section class='content widthController'>
 <!-- Main content -->
                <div class="content">

                    <div class="row col-md-12">
                       


              			
                            
                    @include('reportBank.SiaFindingsScEdpByAircraftMms')
                            @yield('SiaFindingsScEdpByAircraftMms')
                    
                    @include('reportBank.findingScEdpNumber')
              			@yield('fin_sc_edp')

              			@include('reportBank.surveillanceByServiceProvider')
              			@yield('surveillanceByServicePrvider')

              			@include('reportBank.surveillanceByCriticalElement')
              			@yield('surveillanceByCriticalElement')
						
        						@include('reportBank.ScAssociatedRiskAndTypeOfAction')
                      			@yield('ScAssociatedRiskAndTypeOfAction')
                      		
        						@include('reportBank.statusOfSurveillanceProgram')
                      			@yield('statusOfSurveillanceProgram')

        						{{--@include('reportBank.typeofEnforcement')
                      			@yield('typeofEnforcement')--}}

        						{{--@include('reportBank.surveillanceByCriticalArea')
                      			@yield('surveillanceByCriticalArea')--}}

        						@include('reportBank.siaExecutedRisk')
                      			@yield('siaExecutedRisk')

                            
                    @include('reportBank.siaFindingScEdpByOperator')
                            @yield('siaFindingScEdpByOperator')
              
                            
                    @include('reportBank.programExecutionByEvent')
                            @yield('programExecutionByEvent')
                      			
                    @include('reportBank.programmeExecutionByLocation')
                            @yield('programmeExecutionByLocation')
              

                   @include('reportBank.typeofSafetyIssue')
                                  @yield('typeofSafetyIssue')
              			

             

		      	    </div>
		        </div><!-- /.content -->
</section>


@stop