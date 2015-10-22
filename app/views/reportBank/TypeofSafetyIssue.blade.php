@section('typeofSafetyIssue')
<div class="box box-primary">
            <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title"></h3>
            </div>
            <div class="box-body chart-responsive">              
                 <div id="typeofSafetyIssue" style="height: 400px"></div>
       		 </div><!-- /.box-body -->
</div>
<div class="disNon">
<?php 
$info=CommonFunction::piSingleColumnDataProcessWithPersentageJason('issue_finding_date',$fromDate,$toDate,'sc_safety_concern','type_of_issue','type_of_issue');
 print_r(json_encode($info, JSON_PRETTY_PRINT));
?>
</div>
<script type="text/javascript">
	$(function () {

   

    // Make monochrome colors and set them as default for all pies
    Highcharts.getOptions().plotOptions.pie.colors = (function () {
        var colors = [],
            base = Highcharts.getOptions().colors[0],
            i;

        for (i = 0; i < 10; i += 1) {
            // Start out with a darkened base color (negative brighten), and end
            // up with a much brighter color
            colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
        }
        return ['#FEC825', '#ED561B', '#000000', '#50B432', '#64E572', '#FF9655', '#FFF263','#6AF9C4'];
    }());

    // Build the chart
    $('#typeofSafetyIssue').highcharts({
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
            text: 'Type of  Safety Issue'
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
                }
            }
        },
        series: [{
            name: "Brands",
            data: {{json_encode($info, JSON_PRETTY_PRINT)}}
        }]
    });
});
</script>
@stop