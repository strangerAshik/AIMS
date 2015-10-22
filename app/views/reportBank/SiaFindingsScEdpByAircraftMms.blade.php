@section('SiaFindingsScEdpByAircraftMms')
<div class="box box-primary">
            <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title"></h3>

            </div>
            <div class="box-body chart-responsive">
               <div id="SiaFindingsScEdpByAircraftMms" style="height: 400px"></div>
             </div><!-- /.box-body -->
</div><!-- /.box -->
<div class="disNon">
<?php 
$listOfMms=CommonFunction::listOfMms($fromDate,$toDate);
$siaNumberMms=CommonFunction::siaNumberMms($fromDate,$toDate);
$finding=CommonFunction::findingEdpOfMms('sia_findings',$fromDate,$toDate);
$sc=CommonFunction::scMms($fromDate,$toDate);
$edp=CommonFunction::findingEdpOfMms('edp_primary',$fromDate,$toDate);
//echo json_encode($listOfMms,JSON_PRETTY_PRINT);
?>
</div>

    <script type="text/javascript">
    $(function () {
    $('#SiaFindingsScEdpByAircraftMms').highcharts({

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
         colors: ['#FEC825', '#70A7D8', '#ED8D4D', '#B0B0B0', 
   '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a'],

        title: {
            text: 'SIA-Findings-SC-EDP By Aircraft MMS'
        },

        xAxis: {
            categories: {{json_encode($listOfMms,JSON_PRETTY_PRINT)}}
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Unit'
            }
        },

        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} '
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

        series: [{
            name: 'SIA',
            data: {{json_encode($siaNumberMms,JSON_PRETTY_PRINT)}},
            stack: 'sia'
        }, {
            name: 'Finding',
            data: {{json_encode($finding,JSON_PRETTY_PRINT)}},
            stack: 'findingScEdp'
        }, {
            name: 'Safety Concern',
            data: {{json_encode($sc,JSON_PRETTY_PRINT)}},
            stack: 'findingScEdp'
        }, {
            name: 'Enforcement',
            data: {{json_encode($edp,JSON_PRETTY_PRINT)}},
            stack: 'findingScEdp'
        }]
    });
});


    </script>
@stop