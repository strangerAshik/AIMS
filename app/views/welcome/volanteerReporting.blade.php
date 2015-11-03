@include('welcome/header')
@yield('header')

    <div class="container ">
    <div class="row">
                        <!-- left column -->
                        <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h4 class="box-title text-center">Voluntary Reporting</h4>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="voluntary_email" placeholder="Enter email (Optional)">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="email" class="form-control" id="voluntary_email" placeholder="Title Of Report ">
                                        </div>
                                       <div class="form-group">
                                            <label>Reporting Details</label>
                                            <textarea class="form-control" rows="3" placeholder=""></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" name="reporting_details"id="exampleInputFile">
                                        </div>
                                       
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div>
                      
    </div>



</div>
@include('welcome/footer')
@yield('footer')