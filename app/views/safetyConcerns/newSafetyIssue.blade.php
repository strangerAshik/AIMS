@extends('layout')
@section('content')

<div class='content' style="max-width:760px;margin:0 auto;">

@include('safetyConcerns/menu')
@yield('menuIssueSafetyConcern')

@include('safetyConcerns/entryForm')
@yield('issueSafety')
</div>

	
@stop