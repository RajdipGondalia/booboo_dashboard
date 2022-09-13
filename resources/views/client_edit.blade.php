<?php
use App\Http\Controllers\DashboardController;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  
  <!-- <link rel="stylesheet" href="{{ asset('/feather/feather.css') }}"> -->
  <!-- <link rel="stylesheet" href="/mdi/css/materialdesignicons.min.css"> -->
  <!-- <link rel="stylesheet" href="/ti-icons/css/themify-icons.css"> -->
  <!-- <link rel="stylesheet" href="/typicons/typicons.css"> -->
  <!-- <link rel="stylesheet" href="/simple-line-icons/css/simple-line-icons.css"> -->
  <!-- <link rel="stylesheet" href="/css/vendor.bundle.base.css"> -->
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- <link rel="stylesheet" href="/datatables.net-bs4/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="../../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 

  <!-- endinject -->
  <style>
    .file {
      visibility: hidden;
      position: absolute;
    }
  </style>
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="../../images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="../../images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-nfunction  d-lg-block ms-0">
            <!-- <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">John Doe</span></h1>
            <h3 class="welcome-sub-text">Your performance summary this week </h3> -->
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all_employees') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Employee</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('time_tracker') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Time Tracker</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all_tasks') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Employee Task</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('todolist') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Employee To-Do List</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all_client') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Clients</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all_projects') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Projects</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all_users') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="#sectionA" class="nav-link active" data-toggle="tab">Section A</a>
          </li>
          <li class="nav-item">
              <a href="#sectionB" class="nav-link" data-toggle="tab">Section B</a>
          </li>

          <li class="nav-item nav-category">UI Elements</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                  <div class="justify-content-between align-items-center col-md-12 mt-5" >
                    <h4 class="text-center" style="font-size: 40px;color:#404040;">Edit Client</h4>
                  </div>
                  
                  <form action="{{ route('client_update', $client->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row mt-2">
                      <div class="col-md-12">
                        <label class="labels">Company Name<code>*</code></label>
                        <input type="text" class="form-control" placeholder="Company Name" name="company_name" value="{{$client->company_name}}">
                        <span style="color:red">@error('company_name'){{$message}}@enderror</span>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-6">
                        <label class="labels">First Name<code>*</code></label>
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{$client->first_name}}">
                        <span style="color:red">@error('first_name'){{$message}}@enderror</span>
                      </div>
                      <div class="col-md-6">
                        <label class="labels">Last Name<code>*</code></label>
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{$client->last_name}}">
                        <span style="color:red">@error('last_name'){{$message}}@enderror</span>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-12">
                        <label class="labels">Email<code>*</code></label>
                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{$client->email}}">
                        <span style="color:red">@error('email'){{$message}}@enderror</span>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-12">
                        <label class="labels">Address</label>
                        <textarea type="text" class="form-control" placeholder="Address" name="address"> {{$client->address}}</textarea>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-4">
                        <label class="labels">Category<code>*</code></label>
                        <select class="form-control" name="client_category_id" id="client_category_id">
                          <option value="">Select Client Category</option>
                          @foreach($client_categories as $client_category)
                          <option {{ ($client->client_category_id == $client_category->id)?"selected":"" }}  value="{{ $client_category->id }}">{{ $client_category->name }}</option>
                          @endforeach
                        </select>
                        <span style="color:red">@error('client_category_id'){{$message}}@enderror</span>
                      </div>
                    </div>
                    <div class="mt-5 mb-5 text-center">
                        <input type="hidden" id="client_id" name="client_id" value="{{$client->id}}">
                        <button class="btn btn-primary profile-button" type="submit" >Save</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <!-- <script src="/js/vendor.bundle.base.js"></script> -->
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- <script src="/chart.js/Chart.min.js"></script> -->
  <!-- <script src="/bootstrap-datepicker/bootstrap-datepicker.min.js"></script> -->
  <!-- <script src="/progressbar.js/progressbar.min.js"></script> -->

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <!-- <script src="js/off-canvas.js"></script> -->
  <!-- <script src="js/hoverable-collapse.js"></script> -->
  <!-- <script src="js/template.js"></script> -->
  <!-- <script src="js/settings.js"></script> -->
  <!-- <script src="js/todolist.js"></script> -->
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- <script src="js/jquery.cookie.js" type="text/javascript"></script> -->
  <!-- <script src="js/dashboard.js"></script> -->
  <!-- <script src="js/Chart.roundedBarCharts.js"></script> -->
  <!-- End custom js for this page-->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js" integrity="sha512-xIPqqrfvUAc/Cspuj7Bq0UtHNo/5qkdyngx6Vwt+tmbvTLDszzXM0G6c91LXmGrRx8KEPulT+AfOOez+TeVylg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  

</body>

</html>
<script>
  // $("#assign_to").select2();
  // $("#assign_to").fselect();
    $(document).on("click", ".browse", function() {
    var file = $(this).parents().find(".file");
    file.trigger("click");
    });
    $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
    });
    // $('#startButton').on('click', function(){
    //   console.log("Function called");
    //   var user_id = `{{Auth::user()->id}}`;
    //   let id = $(this).attr('data-id');
    //   task_start(user_id,id);

    // })
    function task_start(id){

      var user_id = `{{Auth::user()->id}}`;
      var tdate = new Date();
      var dd = tdate.getDate(); //yields day
      var MM = tdate.getMonth(); //yields month
      var yyyy = tdate.getFullYear(); //yields year
      var hh = tdate.getHours();
      var ii = tdate.getMinutes();
      var ss = tdate.getSeconds();

      var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

      var url = `{{ route('task_start') }}`;

      // console.log("Function called",date);
      // console.log("Task Id",id);
      const form_data = new FormData();
      form_data.append("id",id);
      form_data.append("user_id",user_id);
      form_data.append("start_time",date);

      axios.post(url,form_data).then(response => {
        
        console.log(response);
        // `{{ route('time_tracker') }}`;
        // window.location.href(`{{ route('time_tracker') }}`);
        location.reload();
      }).catch(error=>{
        // console.log(error);
      });
    }
    function task_stop(id){
      var user_id = `{{Auth::user()->id}}`;
      var tdate = new Date();
      var dd = tdate.getDate(); //yields day
      var MM = tdate.getMonth(); //yields month
      var yyyy = tdate.getFullYear(); //yields year
      var hh = tdate.getHours();
      var ii = tdate.getMinutes();
      var ss = tdate.getSeconds();

      var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

      var url = `{{ route('task_stop') }}`;
      // console.log("Function called",date);
      // console.log("User Id",user_id);
      const form_data = new FormData();
      form_data.append("id",id);
      form_data.append("user_id",user_id);
      form_data.append("stop_time",date);
      axios.post(url,form_data).then(response => {
        // console.log(response);
        // `{{ route('time_tracker') }}`;
        // window.location.href(`{{ route('time_tracker') }}`);
        location.reload();
      }).catch(error=>{
        // console.log(error);
      });
      }

      function task_complete(id){
        var user_id = `{{Auth::user()->id}}`;
        var tdate = new Date();
        var dd = tdate.getDate(); //yields day
        var MM = tdate.getMonth(); //yields month
        var yyyy = tdate.getFullYear(); //yields year
        var hh = tdate.getHours();
        var ii = tdate.getMinutes();
        var ss = tdate.getSeconds();

        var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

        var url = `{{ route('task_complete') }}`;
        // console.log("Function called",date);
        // console.log("User Id",user_id);
        const form_data = new FormData();
        form_data.append("id",id);
        form_data.append("user_id",user_id);
        form_data.append("complete_time",date);
        axios.post(url,form_data).then(response => {
          // console.log(response);
          // `{{ route('time_tracker') }}`;
          // window.location.href(`{{ route('time_tracker') }}`);
          location.reload();
        }).catch(error=>{
          // console.log(error);
        });
      }

      function task_cancel(id)
      {
        var user_id = `{{Auth::user()->id}}`;
        var tdate = new Date();
        var dd = tdate.getDate(); //yields day
        var MM = tdate.getMonth(); //yields month
        var yyyy = tdate.getFullYear(); //yields year
        var hh = tdate.getHours();
        var ii = tdate.getMinutes();
        var ss = tdate.getSeconds();

        var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

        var url = `{{ route('task_cancel') }}`;
        // console.log("Function called",date);
        // console.log("User Id",user_id);
        const form_data = new FormData();
        form_data.append("id",id);
        form_data.append("user_id",user_id);
        form_data.append("cancel_time",date);
        axios.post(url,form_data).then(response => {
          // console.log(response);
          // `{{ route('time_tracker') }}`;
          // window.location.href(`{{ route('time_tracker') }}`);
          location.reload();
        }).catch(error=>{
          // console.log(error);
        });
      }
  $(document).ready(function (){
    // console.log("Page Loaded");
    
    // $('#stopButton').on('click', function(){
    //   var user_id = `{{Auth::user()->id}}`;
    //   task_stop(user_id);
    // })
    // $('#completeButton').on('click', function(){
    //   var user_id = `{{Auth::user()->id}}`;
    //   task_complete(user_id);
    // })
    // $('#cancelButton').on('click', function(){
    //   var user_id = `{{Auth::user()->id}}`;
    //   task_cancel(user_id);
    // })
    
    
  });
</script>

