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
  <link rel="stylesheet" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- endinject -->
  <style>
    .file {
      visibility: hidden;
      position: absolute;
    }
  </style>
  <link rel="shortcut icon" href="../images/favicon.png" />
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
            <img src="../images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="../images/logo-mini.svg" alt="logo" />
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
                        <h4 class="text-center" style="font-size: 40px;color:#404040;">Add User</h4>
                    </div>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('user_add') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Type -->
                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">Type<code>*</code></label>
                            <select class="form-control" name="type" id="type" >
                              <option value="">Select Type</option>
                              <option value="1">Admin</option>
                              <option value="2">Senior Employee</option>
                              <option value="3">Employee</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-6">
                            <!-- Name -->
                            <label class="labels">Name<code>*</code></label>
                            <x-input  id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus />
                          </div>
                        </div>
                        <!-- Email Address -->
                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">Email<code>*</code></label>
                            <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-6">
                            <!-- Password -->
                            <label class="labels">Password<code>*</code></label>
                            <x-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-6">
                            <!-- Confirm Password -->
                            <label class="labels">Confirm Password<code>*</code></label>
                            <x-input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required />
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-md-6">
                            <div id="msg"></div>
                            <label class="labels">User Photo</label>
                            <input type="hidden" name="image_path" value="" >
                            <input type="file" name="image_path" class="file" >
                            <div class="input-group my-3">
                              <input type="text" class="form-control" disabled placeholder="Upload File" id="file" name="image_path">
                              <div class="input-group-append">
                                <button type="button" class="browse btn btn-primary">Browse...</button>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                          </div>
                          <div class="col-md-6">
                            <img  id="preview" class="img-thumbnail">
                          </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                          <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900 " href="{{ route('login') }}">
                              {{ __('Already registered?') }}
                          </a> -->
                          <x-button class="ml-4 btn btn-primary profile-button">
                            Save
                          </x-button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class=" rounded bg-white mt-2 mb-2">
                <div class="row">
                  <div class="justify-content-between align-items-center col-md-12 mt-5 " >
                    <h4 class="text-center" style="font-size: 40px;color:#404040;">User List</h4>
                    <div class="table-responsive">
                      <table class="table" style="display: inline-table!important;">
                        <thead>
                          <tr>
                            <th style="width:7%">Action</th>
                            <th style="width:5%">Sr. No.</th>
                            <th>Photo</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Email</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- {{$count=0}} -->
                          <!-- @define $count = 0 -->
                          @php
                          $count = 0
                          @endphp
                          @foreach($users as $user)
                            @php
                              if($user->image_path!="" && $user->image_path!="null" )
                              {
                                $image = asset('images/user')."/".$user->image_path;
                              }
                              else
                              {
                                $image = asset('images')."/default.png";
                              }
                            @endphp
                            <tr>
                              <td>
                                <a href="{{ route('single_user_edit', $user->id) }}" title="Edit" style="color: green;text-decoration: none" >
                                  <i class="fa fa-edit"></i>
                                </a>
                                <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-id="{{ $user->id }}" title="Change Password" style="margin-left: 10px;cursor:pointer;color: blue;" >
                                  <i class="fa fa-key"></i>
                                </a>
                                <a onclick="return confirm('Are you sure Delete This User..?')"  href="{{ route('single_user_delete', $user->id) }}" title="Delete" style="margin-left: 10px;color: red;text-decoration: none" >
                                  <i class="fa fa-trash-o"></i>
                                </a>
                              </td>
                              <td>{{++$count}}</td>
                              <td><img src="{{$image}}" style="width: 50px;height: 50px;" class="img-circle" ></img></td>
                              <td>
                                @php
                                  $TypeArray = array(0=>"","1"=>"Admin","2"=>"Senior Employee","3"=>"Employee");
                                @endphp
                                {{$TypeArray[$user->type]}}
                              </td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
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
  <!-- small modal -->
  <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Change Password</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- the result to be displayed apply here -->
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
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
  $(document).on('click', '#smallButton', function(event) {
    event.preventDefault();
    let id = $(this).attr('data-id');
    // console.log(href);
    // return the result
    // console.log(result.employee);
    $('#smallModal').modal("show");

    $(".modal-body").html(
      `<form action="{{ route('user_change_password') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row mt-2">
          <div class="col-md-12">
            <!-- Password -->
            <label class="labels">Password<code>*</code></label>
            <x-input id="password" class="block mt-1 w-full form-control" type="password" name="password"  autocomplete="new-password" required minlength="8" />
            <span style="color:red">@error('password'){{$message}}@enderror</span>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-md-12">
            <!-- Confirm Password -->
            <label class="labels">Confirm Password<code>*</code></label>
            <x-input id="password_confirmation" class="block mt-1 w-full form-control " type="password" name="password_confirmation" required minlength="8"  />
          </div>
        </div>
        <div class="mt-5 mb-5 text-center">
          <input type="hidden" id="user_id" name="user_id" value="${id}">
          <button class="btn btn-primary profile-button" type="submit" >Change Password</button>
        </div>
      </form>`
    );
  });
</script>

