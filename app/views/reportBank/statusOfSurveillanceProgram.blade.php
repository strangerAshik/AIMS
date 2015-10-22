@section('statusOfSurveillanceProgram')
  <div class="box box-primary">
            <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title"></h3>
            </div>
            <div class="box-body chart-responsive">              
                 <div id="statusOfSurveillanceProgram" style="height: 400px"></div>
       		 </div><!-- /.box-body -->
  	    </div><!-- /.box --> 
<div class="disNon">
{{$Programed=CommonFunction::numberOfProgram($fromDate,$toDate)}}
{{$Executed=CommonFunction::numberOfExecution($fromDate,$toDate)}}
{{$Closed=CommonFunction::numberOfClosedProgram($fromDate,$toDate)}}
</div>

  <script type="text/javascript">
  $(document).ready(function(){
  	$(function () {
    Highcharts.setOptions({
     colors: ['#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#ED7D31', '#FF9655', '#FFF263',      '#6AF9C4']
    });
    // Make monochrome colors and set them as default for all pies
    Highcharts.getOptions().plotOptions.pie.colors = (function () {
        var colors = [],
            base = Highcharts.getOptions().colors[4],
            i;

        for (i = 0; i < 10; i += 1) {
            // Start out with a darkened base color (negative brighten), and end
            // up with a much brighter color
            colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
        }
        return ['#FEC825', '#ED561B', '#000000', '#50B432', '#64E572', '#FF9655', '#FFF263','#6AF9C4'];
    }());

    $('#statusOfSurveillanceProgram').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        // colors: ['#24CBE5', '#ED561B', '#000000', '#50B432', '#64E572', '#FF9655', '#FFF263',      '#6AF9C4'],
        credits: {
		      enabled: false
		  },
        title: {
            text: 'Status of Surveillance Program'
        },
        subtitle: {
            text: ''
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45,
                showInLegend: true
            },
            //showInLegend: true
        },
        series: [{
            name: 'SSP',
            data: [
                ['Programed', {{$Programed}}],
                ['Executed', {{$Executed}}],
                ['Closed', {{$Closed}}]
            ]
        }]
    });
});
  });





  </script>    
@stop