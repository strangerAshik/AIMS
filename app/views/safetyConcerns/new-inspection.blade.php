@extends('layout')
@section('content')
<span style='display:none'>
{{$role=Auth::User()->Role()}}
</span>
<div class='content' style="max-width:760px;margin:0 auto;">
@include('safetyConcerns/menu')
@yield('menuNewInspection')
</div>

{{--Entry form --}}
@include('safetyConcerns.entryForm')
@yield('primaryInspection')
{{--End Entry form --}}

@stop