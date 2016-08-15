@include('welcome/header')
@yield('header')

    <div class="container ">
    <div class="row">
                        <!-- left column -->
                        <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h4 class="box-title text-center">Voluntary & Mandatory Reporting</h4>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                             
                {{Form::open(array('url'=>'voluntary/saveReport','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter email (Optional)">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input name="title" class="form-control" id="voluntary_email" placeholder="Title Of Report ">
                                        </div>
                                        <div class="form-group required">
                                            <label for="exampleInputEmail1" style="color:red">Category</label>
                                            <select class="form-control" name="category" required>
                                                <option value="">Select Reporting Type.....</option>
                                                <option value="Voluntary Reporting">Voluntary Reporting</option>
                                                <option value="Mandatory Reporting">Mandatory Reporting</option>
                                            </select>
                                        </div>
                                       <div class="form-group">
                                            <label style="color:red">Reporting Details</label>
                                            <textarea name="report" class="form-control" rows="3" placeholder="" required=""></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" name="file"id="exampleInputFile">
                                        </div>
                                       
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                         {{Form::close()}}
                            </div><!-- /.box -->
                        </div>
                      
    </div>



</div>
@include('welcome/footer')
@yield('footer')