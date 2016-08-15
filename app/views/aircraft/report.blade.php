@extends('layout')
@section('content')
<section class='content'>
 <!--Tab-->
 <div class="container">
  <?php $module='aircraft';?>
  @include('commonReport')
  @yield('report')
  
 <!-- Main content -->

</section>


@stop