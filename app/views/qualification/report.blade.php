@extends('layout')
@section('content')
<section class='content'>
 <!--Tab-->
 <div class="container">
  <?php $module='employee';?>
  @include('commonReport')
  @yield('report')
  
 <!-- Main content -->

</section>


@stop