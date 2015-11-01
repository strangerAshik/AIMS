@include('welcome/header')
@yield('header')

    <div class="container ">
        <div class="page-header">
  <h1 class="text-center">Volantary Reporting</h1>
</div>
        <div class="row">

            
            <p class="text-center col-md-6">
                <button class="btn btn-primary btn-block "  data-toggle="modal" data-target="#EmploymentDetails">ATC</button>
                </p>
            <p class="text-center col-md-6">
                <button class="btn btn-primary btn-block "  data-toggle="modal" data-target="#EmploymentDetails">CABIN</button>
                </p>
            <p class="text-center col-md-6">
                <button class="btn btn-primary btn-block "  data-toggle="modal" data-target="#EmploymentDetails">GENERAL</button>
                </p>
            <p class="text-center col-md-6">
                <button class="btn btn-primary btn-block "  data-toggle="modal" data-target="#EmploymentDetails">MAINTENANCE</button>
                </p>
            <p class="text-center col-md-12">
                <button class="btn btn-primary btn-block " data-toggle="modal" data-target="#EmploymentDetails">Other</button>
                </p>
        </div>
        
    </div>




</div>
@include('welcome/footer')
@yield('footer')