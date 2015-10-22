@extends('layout')
@section('content')
<section class="content widthController">
<p class="text-center">
    <a class="btn btn-primary btn-block" target="_blink" href="{{URL::to('surveillance/checkList');}}">Check List</a>	
</p>
</section>
@stop