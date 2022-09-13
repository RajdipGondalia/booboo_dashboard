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
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
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
                        <h4 class="text-center" style="font-size: 40px;color:#404040;">Edit Profile</h4>
                        </div>
                        <form action="{{ route('user_profile_update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            @php
                              if($profile->image_path!="" && $profile->image_path!="null" )
                              {
                                $image = asset('images/profile')."/".$profile->image_path;
                                  
                              }
                              else
                              {
                                $image = asset('images')."/default.png";
                              }
                            @endphp

                            <div class="row mt-2">
                              <div class="col-md-6">
                                <label class="labels">Given Name<code>*</code></label>
                                <input type="text" class="form-control" placeholder="Given Name" name="given_name"  value="{{$profile->given_name}}">
                                <span style="color:red">@error('given_name'){{$message}}@enderror</span>
                              </div>
                              <div class="col-md-6">
                                <label class="labels">Family Name<code>*</code></label>
                                <input type="text" class="form-control" name="family_name" placeholder="Family Name" value="{{$profile->family_name}}">
                                <span style="color:red">@error('family_name'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="col-md-6">
                                <label class="labels">DOB</label>
                                <input type="date" class="form-control" placeholder="Select DOB" name="dob" value="{{$profile->dob}}">
                              </div>
                              <div class="col-md-6">
                                <label class="labels">Job Role</label>
                                <select class="form-control" name="job_role">
                                  <option value="0">Select Job Role</option>
                                  @foreach($job_roles as $job_role)
                                    <option {{ ($profile->job_role == $job_role->id)?"selected":"" }}  value="{{ $job_role->id }}" >{{ $job_role->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="col-md-6">
                                <label class="labels">Education Qualification</label>
                                <textarea type="text" class="form-control" placeholder="enter Education Qualification" name="education_qualification"> {{$profile->edu_qualification}}
                                </textarea>
                              </div>
                              <div class="col-md-6">
                                <label class="labels">Skills</label>
                                <textarea type="text" class="form-control" placeholder="enter Skills" name="skills">{{$profile->skills}}</textarea>
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="col-md-6">
                                <label class="labels">Present Address</label>
                                <textarea type="text" class="form-control" placeholder="enter Present Address" name="present_address">{{$profile->present_address}}</textarea>
                              </div>
                              <div class="col-md-6">
                                <label class="labels">Permanent Address</label>
                                <textarea type="text" class="form-control" placeholder="enter Permanent Address" name="permanent_address">{{$profile->permanent_address}}</textarea>
                              </div>
                            </div>
                            <div class="row mt-3">  
                              <div class="col-md-6">
                                <label class="labels">Primary Contact Number<code>*</code></label>
                                <input type="text" class="form-control" placeholder="enter Primary Contact Number" name="contact_number" id="contact_number"  value="{{$profile->contact_number}}">
                                <span style="color:red">@error('contact_number'){{$message}}@enderror</span>
                              </div>
                              <div class="col-md-6">
                                <label class="labels">Secondary Contact Number</label>
                                <input type="text" class="form-control" placeholder="enter Secondary Contact Number" name="contact_number_2" value="{{$profile->contact_number_2}}">
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="col-md-6">
                                <label class="labels">Working Location</label>
                                <select class="form-control" name="working_location">
                                  <option value ="0">Select Working Location</option>
                                  @foreach($working_locations as $working_location)
                                    <option {{ ($profile->working_location == $working_location->id)?"selected":"" }} value="{{ $working_location->id }}">{{ $working_location->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-6">
                                <label class="labels">Email<code>*</code></label>
                                <input type="text" class="form-control" placeholder="enter Email" name="email" value="{{$profile->email}}">
                                <span style="color:red">@error('email'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="col-md-6">
                                <div id="msg"></div>
                                <label class="labels">Profile Photo</label>
                                <input type="hidden" name="image_path" value="" >
                                <input type="file" name="image_path" class="file" >
                                <div class="input-group my-3">
                                  <input type="text" class="form-control" disabled placeholder="Upload File" id="file" name="image_path" >
                                  <div class="input-group-append">
                                    <button type="button" class="browse btn btn-primary">Browse...</button>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                              </div>
                              <div class="col-md-6">
                                <img  id="preview" class="img-thumbnail" src="{{$image}}" style="width: 300px;">
                              </div>
                            </div>
                            <div class="mt-5 mb-5 text-center">
                              <input type="hidden" id="profile_id" name="profile_id" value="{{$profile->id}}">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/numeric/1.2.6/numeric.js"></script>
  


</body>

</html>
<script>
  // $(document).ready(function(){
  //     $("#contact_number").numeric();
  // });
  $('input[name="contact_number"]').keyup(function(e)
  {
    if (/\D/g.test(this.value))
    {
      // Filter non-digits from input value.
      this.value = this.value.replace(/\D/g, '');
    }
  });
  $('input[name="contact_number_2"]').keyup(function(e)
  {
    if (/\D/g.test(this.value))
    {
      // Filter non-digits from input value.
      this.value = this.value.replace(/\D/g, '');
    }
  });
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
</script>

