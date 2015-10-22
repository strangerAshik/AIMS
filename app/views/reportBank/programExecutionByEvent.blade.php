@section('programExecutionByEvent')

<div class="box box-primary">
            <div class="box-header">
            <i class="fa fa-bar-chart-o"></i>
             <h3 class="box-title"></h3>
            </div>
            <div class="box-body chart-responsive">
                 
                 <div id="programExecutionByEvent" style="min-width: 310px; height: 400px; min-width: 600px; margin: 0 auto"></div>
             </div><!-- /.box-body -->
</div><!-- /.box -->
<div class="disNon">
<?php 
//getList($from,$to,$dateCloumName,$tableName,$where,$listBy)
$eventList=CommonFunction::getList($fromDate,$toDate,'date','sia_action','event','event');
$eventNumber=CommonFunction::getListNumber($fromDate,$toDate,'date','sia_action','event','event');
//echo json_encode($eventList,JSON_PRETTY_PRINT);
//echo json_encode($eventList,JSON_PRITY_PRINT);
//$=CommonFunction::getEventNumber($fromDate,$toDate);
?>
 </div>
<script type="text/javascript">
	$(function () {
    $('#programExecutionByEvent').highcharts({

        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 4,
                beta: 0,
                viewDistance: 25,
                depth: 40
            },
            marginTop: 80,
            marginRight: 40
        },
       colors: ['#70A7D8'],
        title: {
            text: 'Program Execution By Event'
        },

        xAxis: {
            categories: {{json_encode($eventList,JSON_PRETTY_PRINT)}}
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'unit'
            }
        },

        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y}'
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

        series: [{
            name: 'Event',
            data: {{json_encode($eventNumber,JSON_PRETTY_PRINT)}},
            stack: 'male'
        }]
    });
});


</script>

@stop