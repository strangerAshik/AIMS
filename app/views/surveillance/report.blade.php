@extends('layoutTable')
@section('content')
<section class='content'>
 <!--Tab-->
 <div class="container">
  <?php $module='sia';?>
  @include('commonReport')
  @yield('report')
  
 <!-- Main content -->

</section>


@stop