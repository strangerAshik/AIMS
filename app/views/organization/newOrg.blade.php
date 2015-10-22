@extends('layout')
@section('content')
<section class="content widthController">
@include('organization.menu')
@yield('orgMenuPrimary')
@include('organization.entryForm')
@yield('orgPrimaryForm')
</section>
@stop
