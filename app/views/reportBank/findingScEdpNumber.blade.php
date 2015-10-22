@section('fin_sc_edp')
 
				
      <!--Findings-Safety Concern-EDP (By Month &Year)-->
        <div class="box box-primary">
            <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title"></h3>

            </div>
            <div class="box-body chart-responsive">              


                 
                 <div id="findingScEdpNumber" style="height: 400px"></div>
       		 </div><!-- /.box-body -->
  	    </div><!-- /.box -->   
<div class="disNon">                   
 <?php
  $list=CommonFunction::getMonthList($fromDate,$toDate) ;
  //getScEdpNumber($from,$to,$dateColunmName,$tableName)
  $getScNumber=CommonFunction::getScEdpNumber($fromDate,$toDate,'issue_finding_date','sc_safety_concern') ;
  $getEdpNumber=CommonFunction::getScEdpNumber($fromDate,$toDate,'date','edp_primary') ;
  $getFindingNumber=CommonFunction::getFindingNumberByMonth($fromDate,$toDate) ;

   echo json_encode($getFindingNumber,JSON_PRETTY_PRINT);
 ?>
 </div>

		         


<script type="text/javascript">
    $(function () {
    $('#findingScEdpNumber').highcharts({

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
       
        colors: ['#E04343', '#EA8A4A', '#ACACAC', '#B0B0B0', 
   '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a'],


        title: {
            text: 'Findings-Safety Concern-EDP (By Month &Year)'
        },

        xAxis: {
            categories: {{json_encode($list,JSON_PRETTY_PRINT)}}
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
            pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

        series: [
        {
            name: 'Enforcement',
            data: {{json_encode($getEdpNumber,JSON_PRETTY_PRINT)}},
            stack: 'fse'
        },
        {
            name: 'Safety Concern',
            data: {{json_encode($getScNumber,JSON_PRETTY_PRINT)}},
            stack: 'fse'
        },
        {
            name: 'Finding',
            data: {{json_encode($getFindingNumber,JSON_PRETTY_PRINT)}},
            stack: 'fse'
        }, ]
    });
});


        </script>
@stop