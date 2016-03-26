@extends('layout')
@section('content')
<section class="content contentWidth">
<div class="row">
	<p class="text-left col-md-11">
									&nbsp &nbsp &nbsp <a class="btn btn-primary glyphicon glyphicon-retweet" href="{{URL::to('certification/timelines')}}">&nbspTimeline</a>
									</p>
	 <div class="col-md-12 " style="/*position: fixed; z-index: 999999*/">

         &nbsp &nbsp <a  class="hidden-print" href="#primaryInfo" style="color:green" >[ Phase Primary Info] </a> 
         &nbsp &nbsp <a  class="hidden-print" href="#ORGPRIMARYRECORDS" style="color:green" >[ ORG PRIMARY RECORDS ] </a>
         &nbsp &nbsp <a  class="hidden-print" href="#BUSINESSNAMES" style="color:green" >[ BUSINESS NAMES ] </a> 
         &nbsp &nbsp <a  class="hidden-print" href="#FINANCIALSTATUS" style="color:green" >[ FINANCIAL STATUS ] </a> 
         &nbsp &nbsp <a  class="hidden-print" href="#PROJECTDOCUMENT" style="color:green" >[ PROJECT DOCUMENT ] </a> 
         &nbsp &nbsp <a  class="hidden-print" href="#CAACONTACTS" style="color:green" >[ CAA CONTACTS ] </a> 
         &nbsp &nbsp <a  class="hidden-print" href="#SVCPROVIDERRECORDS" style="color:green" >[ SVC PROVIDER RECORDS ] </a> 
      </div>

</div>
<div class="row">
<div class="col-md-12">
	  <!--Primary Info-->
   <div class="row" id="primaryInfo">
      <!-- left column -->
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header table_toggle expand">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Phase Primary Info</h3>
               <span class='hidden-print man pull-right'>-</span>
            </div>
             &nbsp &nbsp <a  class="hidden-print" href="#" style="color:green" >[ Phase Primary Info] </a> 
            <!-- /.box-header -->
            <div class="box-body">
               <div class='disNon'> 
                  {{$num=0}}
               </div>
               <table class="table table-bordered">
                  <tbody>
                  	<tr>
                  		<th>Head</th>
                  		<td>Details</td>
                  	</tr>
                  </tbody>
               </table>
              
            </div>
         </div>
      </div>
   </div>
</div>
<div class="col-md-12">
	  <!--Primary Info-->
   <div class="row" id="ORGPRIMARYRECORDS">
      <!-- left column -->
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header table_toggle expand">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;' >ORG PRIMARY RECORDS</h3>
               <span class='hidden-print man pull-right'>-</span>
            </div>

             &nbsp &nbsp <a  class="hidden-print" href="#" style="color:green" >[ Add ORG PRIMARY RECORDS] </a> 
            <!-- /.box-header -->
            <div class="box-body">
               <div class='disNon'> 
                  {{$num=0}}
               </div>
               <table class="table table-bordered">
                  <tbody>
                  	<tr>
                  		<th>Head</th>
                  		<td>Details</td>
                  	</tr>
                  </tbody>
               </table>
              
            </div>
         </div>
      </div>
   </div>
</div>
<div class="col-md-12">
	  <!--BUSINESS NAMES-->
   <div class="row" id="BUSINESSNAMES">
      <!-- left column -->
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header table_toggle expand">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;' >BUSINESS NAMES</h3>
               <span class='hidden-print man pull-right'>-</span>
            </div>

             &nbsp &nbsp <a  class="hidden-print" href="#" style="color:green" >[ Add BUSINESS NAMES ] </a> 
            <!-- /.box-header -->
            <div class="box-body">
               <div class='disNon'> 
                  {{$num=0}}
               </div>
               <table class="table table-bordered">
                  <tbody>
                  	<tr>
                  		<th>Head</th>
                  		<td>Details</td>
                  	</tr>
                  </tbody>
               </table>
              
            </div>
         </div>
      </div>
   </div>
</div>
<div class="col-md-12">
	  <!--FINANCIAL STATUS-->
   <div class="row" id="FINANCIALSTATUS">
      <!-- left column -->
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header table_toggle expand">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;' >FINANCIAL STATUS</h3>
               <span class='hidden-print man pull-right'>-</span>
            </div>

             &nbsp &nbsp <a  class="hidden-print" href="#" style="color:green" >[ Add FINANCIAL STATUS ] </a>
            <!-- /.box-header -->
            <div class="box-body">
               <div class='disNon'> 
                  {{$num=0}}
               </div>
               <table class="table table-bordered">
                  <tbody>
                  	<tr>
                  		<th>Head</th>
                  		<td>Details</td>
                  	</tr>
                  </tbody>
               </table>
              
            </div>
         </div>
      </div>
   </div>
</div>
<div class="col-md-12">
	  <!--PROJECT DOCUMENT-->
   <div class="row" id="PROJECTDOCUMENT">
      <!-- left column -->
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header table_toggle expand">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;' >PROJECT DOCUMENT</h3>
               <span class='hidden-print man pull-right'>-</span>
            </div>

             &nbsp &nbsp <a  class="hidden-print" href="#" style="color:green" >[ ADD PROJECT DOCUMENT ] </a>
            <!-- /.box-header -->
            <div class="box-body">
               <div class='disNon'> 
                  {{$num=0}}
               </div>
               <table class="table table-bordered">
                  <tbody>
                  	<tr>
                  		<th>Head</th>
                  		<td>Details</td>
                  	</tr>
                  </tbody>
               </table>
              
            </div>
         </div>
      </div>
   </div>
</div>
<div class="col-md-12">
	  <!--CAA CONTACTS-->
   <div class="row" id="CAACONTACTS">
      <!-- left column -->
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header table_toggle expand">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;' >CAA CONTACTS</h3>
               <span class='hidden-print man pull-right'>-</span>
            </div>

             &nbsp &nbsp <a  class="hidden-print" href="#" style="color:green" >[ ADD CAA CONTACTS ] </a>
            <!-- /.box-header -->
            <div class="box-body">
               <div class='disNon'> 
                  {{$num=0}}
               </div>
               <table class="table table-bordered">
                  <tbody>
                  	<tr>
                  		<th>Head</th>
                  		<td>Details</td>
                  	</tr>
                  </tbody>
               </table>
              
            </div>
         </div>
      </div>
   </div>
</div>
<div class="col-md-12">
	  <!--SVC PROVIDER RECORDS-->
   <div class="row" id="SVCPROVIDERRECORDS">
      <!-- left column -->
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header table_toggle expand">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;' >SVC PROVIDER RECORDS</h3>
               <span class='hidden-print man pull-right'>-</span>
            </div>
             &nbsp &nbsp <a  class="hidden-print" href="#" style="color:green" >[ ADD SVC PROVIDER RECORDS ] </a>
            <!-- /.box-header -->
            <div class="box-body">
               <div class='disNon'> 
                  {{$num=0}}
               </div>
               <table class="table table-bordered">
                  <tbody>
                  	<tr>
                  		<th>Head</th>
                  		<td>Details</td>
                  	</tr>
                  </tbody>
               </table>
              
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</section>
@stop