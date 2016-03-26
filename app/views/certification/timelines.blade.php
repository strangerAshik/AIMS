@extends('layoutTable')
@section('content')
<section class="content contentWidth">
<div class="row">
 <div class="box">
    <div class="box-header">
        <h3 class="box-title text-center text-primary">Phase One Timelines</h3>
    </div><!-- /.box-header -->
       <div class="content">
           <div class="box-body table-responsive">
                                &nbsp &nbsp &nbsp <a class="btn btn-primary glyphicon glyphicon-retweet" href="{{URL::to('certification/timelines')}}">&nbspCustom Timeline</a>
                              
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Event</th>
                                                <th>Date & Day</th>
                                                <th>Timeline</th>
                                                <th>Status</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                 			<tr>
                                 				<td>1</td>
                                 				<td>Issuance of AOC Application</td>
                                 				<td>02 Feb 15 Mon</td>
                                 				<td>(D Day)</td>
                                 				<td>Issued</td>
                                 				<td><a href="{{URL::to('certification/singleDocs/DOC_43243')}}" class="badge bg-green">Details</a></td>
                                 			</tr>
                                 			<tr>
                                 				<td>2</td>
                                 				<td>Submission of AOC Application</td>
                                 				<td>09 Feb 15 Mon</td>
                                 				<td>(D+7)</td>
                                 				<td>Accepted</td>
                                 				<td><a href="" class="badge bg-green">Details</a></td>
                                 			</tr>
                                        </tbody>
                                       
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
</div>
</section>
@stop