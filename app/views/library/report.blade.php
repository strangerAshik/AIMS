@extends('layout')
@section('content')
<section class='content'>
 <!--Tab-->
 <div class="container">
  <?php $module='e_library';?>
  @include('commonReport')
  @yield('report')
  
 <!-- Main content -->

</section>


@stop