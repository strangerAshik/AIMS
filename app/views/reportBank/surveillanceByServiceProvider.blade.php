@section('surveillanceByServicePrvider')
<!--Surveillance by Service Provider-->
        <div class="box box-primary">
            <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title"></h3>

            </div>
            <div class="box-body chart-responsive">
                 
                  <div id="service_providers" style="min-width: 310px; height: 400px; min-width: 600px; margin: 0 auto"></div>
             </div><!-- /.box-body -->
        </div><!-- /.box -->

 <div class="disNon">
<?php 
$locationList=CommonFunction::getList($fromDate,$toDate,'date','sia_action','organization','organization');
$locaNumber=CommonFunction::getListNumber($fromDate,$toDate,'date','sia_action','organization','organization');
echo json_encode($locaNumber,JSON_PRETTY_PRINT);

?>
</div>      

<script type="text/javascript">
    $(function () {
    $('#service_providers').highcharts({

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

        title: {
            text: 'Surveillance by Service Provider'
        },

        xAxis: {
            categories: {{json_encode($locationList,JSON_PRETTY_PRINT)}}
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
            name: 'SIA',
            data: {{json_encode($locaNumber,JSON_PRETTY_PRINT)}},
            stack: 'male'
        }]
    });
});


</script>

@stop