@section('footer')

</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:9999">
   <div class="modal-dialog">
      <div class="modal-content">
	  <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               Log In
            </h4>
         </div>
         <form role="form" action="login" method="POST">
							
								<div class="row" style="margin-top:20px">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Email Address" name="email" type="text" autofocus>
											
											</div>
												{{$errors->first('email')}}
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Password" name="password" type="password" value="">
												
											</div>
											{{$errors->first('password')}}
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
										</div>
									</div>
								</div>
							
						</form>
      </div><!-- /.modal-content -->
</div><!-- /.modal -->
</div>

<div class='container-fluid' style='color:#fff;background:#357CA5;padding:5px;'  >
	<p style='padding:13px 0px 0px 99px;' ><span>Copywrite &copy; 2015 Soft Lab BD. All Right Reserved</span><span class="pull-right" style="padding-right:99px;"></span></p> 
</div>
<!-- Bootstrap -->
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>-->
<script src={{"js/bootstrap.js"}} type="text/javascript"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
        <!-- AdminLTE App -->
     
		<script src="{{URL::asset('js/AdminLTE/app.js')}}" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
      
		<script src="{{URL::asset('js/AdminLTE/demo.js')}}" type="text/javascript"></script>
<!-- Bootstrap -->

</body>
</html>
@stop