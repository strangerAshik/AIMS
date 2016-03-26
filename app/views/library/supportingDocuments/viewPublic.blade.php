@extends('welcome.welcomeLayout')
@section('content')
  <div class="col-xs-12">
                            

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title text-center text-primary">Supporting Documents</h3>
                                </div><!-- /.box-header -->
                                 <div class="content">
            
                                </div>
                                <div class="box-body table-responsive">
                                                            
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                             <tr>
                                                <th>Type</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Published Year</th>
                                                 <th>Other Infos</th>        
                                                <th>Docs</th>
                                                   
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                        @foreach ($allDocs as $info)
                                           <tr>
                                                <td>{{$info->doc_type}} </td>
                                                <td>{{$info->doc_title}}</td>
                                                <td>
                                                     {{nl2br($info->doc_authors)}}
                                                </td>
                                                <td>{{$info->doc_published_year}}</td>
                                                <td>
                                                 @if($info->doc_isbn)
                                                ISBN: {{$info->doc_isbn}} <br/>
                                                @endif
                                                @if($info->doc_series)
                                                Series:  {{$info->doc_series}}<br/>
                                                @endif
                                                @if($info->doc_edition)
                                                Edition:  {{$info->doc_edition}}<br/>
                                                @endif
                                                @if($info->doc_part)
                                                Part : {{$info->doc_part}}<br/>
                                                @endif
                                                @if($info->doc_volume)
                                                Volume :  {{$info->doc_volume}}<br/>
                                                @endif
                                                @if($info->doc_amendment)
                                                Amendment:  {{$info->doc_amendment}}<br/>       
                                                @endif
                                                @if($info->doc_tags)
                                                Tags: {{nl2br($info->doc_tags)}}
                                                @endif
                                    </td>
                                                <td>@if($info->doc_url)
                                                Supporting Website(s): <a target="_blank" href="http://{{$info->doc_url}}" >Link</a></br>
                                                @endif
                                                Supported Doc:                              
                                                    @if($info->doc_upload!='Null'){{HTML::link('files/lib_supporting_docs/'.$info->doc_upload,'Document',array('target'=>'_blank'))}}
                                                    @else
                                                        {{HTML::link('#','No Document Provided')}}
                                                    @endif
                                                    </br></td>
                                                
                                           </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                             <tr>
                                               <th>Type</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Published Year</th>
                                                 <th>Other Infos</th>        
                                                <th>Docs</th>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                      
        </div>
@stop