@section('siaFindingScEdpByOperator')
   <div class="box box-primary">
            <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title"></h3>

            </div>
            <div class="box-body chart-responsive">
               <div id="siaFindingScEdpByOperator" style="height: 400px"></div>
             </div><!-- /.box-body -->
    </div><!-- /.box -->
<?php 
$operatorList=CommonFunction::getOperatorList($fromDate,$toDate);
$getSiaArray=CommonFunction::getSiaArray($fromDate,$toDate);
$getFindingArray=CommonFunction::getFindingScEdpArray('sia_findings',$fromDate,$toDate);
$getScArray=CommonFunction::getFindingScEdpArray('sc_safety_concern',$fromDate,$toDate);
$getEdpArray=CommonFunction::getFindingScEdpArray('edp_primary',$fromDate,$toDate);
//echo json_encode($getEdpArray,JSON_PRETTY_PRINT);
?>
<script type="text/javascript">
$(function () {
    $('#siaFindingScEdpByOperator').highcharts({

        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 5,
                beta: 10,
                viewDistance: 25,
                depth: 40
            },
            marginTop: 80,
            marginRight: 40
        },
        credits: {
              enabled: false
          },
         colors: ['#FEC825', '#70A7D8', '#ED8D4D', '#B0B0B0', 
   '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a'],

        title: {
            text: 'SIA , Finding-Safety Concern-EDP By Operator'
        },

        xAxis: {
            categories: {{json_encode($operatorList,JSON_PRETTY_PRINT)}}

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
            data: {{json_encode($getSiaArray,JSON_PRETTY_PRINT)}},
            stack: 'sia'
        },
        {
            name: 'EDP',
            data: {{json_encode($getEdpArray,JSON_PRETTY_PRINT)}},
            stack: 'findingScEdp'
        },
         {
            name: 'Safety Concern',
            data: {{json_encode($getScArray,JSON_PRETTY_PRINT)}},
            stack: 'findingScEdp'
        },
        {
            name: 'Finding',
            data: {{json_encode($getFindingArray,JSON_PRETTY_PRINT)}},
            stack: 'findingScEdp'
        }
        ]
    });
});


</script>
@stop