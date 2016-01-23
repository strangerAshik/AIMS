@extends('layoutTable')
@section('content')
    <section class="width widthController">
        <div class="row">
            <div class="com-md-12">
            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">FIndings : Target Date Exceed</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                      <div class="box-body table-responsive">
                                  
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>SIA Number</th>    
                                                    <th>Finding Number</th>
                                                    <th>Title</th>
                                                    <th>Target Date</th>
                                                    <th>Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $num=0;?>
                                            @foreach ($exceedDateArray as $info)  
                                            <?php $data=CommonFunction::getFindingInfo($info);?>          
                                                <tr>
                                                    <td>
                                                        {{++$num}}
                                                    </td>
                                                    <td>{{$data->sia_number}}</td>
                                                    <td>{{$data->finding_number}}</td>
                                                    <td>{{$data->title}}</td>
                                                    <td>{{$data->target_date}}</td>
                                                    <td><a href="{{URL::to('surveillance/correctiveAction/'.$data->sia_number.'#'.$data->id)}}">View</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                            
                                        </table>
                       </div>

                  </div>
                

        </div>
    </section>
@stop
