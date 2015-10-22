@extends('layout')
@section('content')
	<section class="content">
		<div class="row">
			<p class="text-center col-md-6">
                <button class="btn btn-primary btn-block "  data-toggle="modal" data-target="#pqPrimary">PQ Primary Info</button>
             </p>
             <p class="text-center col-md-6">
                <button class="btn btn-primary btn-block "  data-toggle="modal" data-target="#addCC">Add CC</button>
              </p>
		</div>	
	</section>
	@include('usoapCma/entryForm')
	@yield('pqPrimary')
	@yield('addCC')
@stop