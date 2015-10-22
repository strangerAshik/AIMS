@section('typeofEnforcement')
<div class="box box-primary">
            <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title"></h3>
            </div>
            <div class="box-body chart-responsive">              
                 <div id="typeofEnforcement" style="height: 400px"></div>
       		 </div><!-- /.box-body -->
</div>


<?php $jsonArray=CommonFunction::multiSelectionDataWithPercentage('date',$fromDate,$toDate,'edp_primary','type_of_action','type_of_action') ;
//print_r(json_encode($jsonArray,JSON_PRETTY_PRINT));

?>
<script type="text/javascript">
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

    // Build the chart
    $('#typeofEnforcement').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        credits: {
		      enabled: false
		  },
          
        title: {
            text: 'Type of Enforcement'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
               // showInLegend: true
            }
        },
        series: [{
            name: "Brands",
            data: {{json_encode($jsonArray, JSON_PRETTY_PRINT)}}
        }]
    });
});
</script>
@stop