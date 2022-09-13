<?php
use App\Models\Profile;
use App\Models\JobRoleMaster;
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
              <div class=" rounded bg-white mt-2 mb-2">
                <div class="row">
                  <div class="justify-content-between align-items-center col-md-12 mt-5" >
                    <h4 class="text-center" style="font-size: 40px;color:#404040;">Employee</h4>
                    <table class="table table-striped table-responsive" style="display: inline-table!important;">
                      <thead>
                        <tr>
                          <th style="width:7%">Action</th>
                          <th style="width:4%">Sr. No.</th>
                          <th>Given Name</th>
                          <!-- <th>Family Name</th> -->
                          <!-- <th>DOB</th> -->
                          <th>Job Role</th>
                          <!-- <th>Education Qualification</th> -->
                          <!-- <th>Skills</th> -->
                          <!-- <th>Present Address</th> -->
                          <!-- <th>Permanent Address</th> -->
                          <th>Primary Contact Number</th>
                          <!-- <th>Secondary Contact Number</th> -->
                          <th>Working Location</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- {{$count=0}} -->
                        <!-- @define $count = 0 -->
                        
                        @php
                        $count = 0
                        @endphp
                        
                        @foreach($employees as $employee)
                          <tr>
                            <td>
                              <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('api_single_employee', $employee->id) }}" data-id="{{ $employee->id }}" title="View" style="cursor:pointer;color: blue;" >
                                <i class="fa fa-eye"></i>
                              </a>
                              <!-- <a data-toggle="employeemodal" id="employeeEditButton" data-target="#employeeEditModal" data-attr="{{ route('api_single_employee', $employee->id) }}" data-id="{{ $employee->id }}" title="Edit" style="margin-left: 10px;">
                                <i class="fa fa-edit"></i>
                              </a> -->
                              <a href="{{ route('single_profile_edit', $employee->id) }}" title="Edit" style="margin-left: 10px;color: green;text-decoration: none" >
                                <i class="fa fa-edit"></i>
                              </a>
                              <a onclick="return confirm('Are you sure Delete This Employee..?')"  href="{{ route('single_profile_delete', $employee->id) }}" title="Delete" style="margin-left: 10px;color: red;text-decoration: none" >
                                <i class="fa fa-trash-o"></i>
                              </a>
                            </td>
                            <td>{{++$count}}</td>
                            <td>{{$employee->given_name}}</td>
                            <!-- <td>{{$employee->family_name}}</td> -->
                            <!-- <td>{{$employee->dob}}</td> -->
                            <td>
                              @if($employee->job_role!=0)
                                {{$employee->job_role_name->name}}
                              @endif
                            </td>
                            <!-- <td>{{$employee->edu_qualification}}</td> -->
                            <!-- <td>{{$employee->skills}}</td> -->
                            <!-- <td>{{$employee->present_address}}</td> -->
                            <!-- <td>{{$employee->permanent_address}}</td> -->
                            <td>{{$employee->contact_number}}</td>
                            <!-- <td>{{$employee->contact_number_2}}</td> -->
                            <td>
                              @if($employee->working_location!=0)
                                {{$employee->working_location_name->name}}
                              @endif
                            </td>
                            <td>{{$employee->email}}</td>
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
          <h4 class="modal-title">Employee Details</h4>
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

<!-- Employee edit modal -->
<div class="modal fade" id="employeeEditModal" tabindex="-1" role="dialog" aria-labelledby="employeeEditModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Employee</h4>
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
  
</body>

</html>
<script>
  // display a modal (small modal)
  $(document).on('click', '#smallButton', function(event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    let id = $(this).attr('data-id');
    // console.log(href);
    $.ajax({
      url: href,
      beforeSend: function() {
        $('#loader').show();
      },
      // return the result
      success: function(result) {
        // console.log(result.employee);
        $('#smallModal').modal("show");
        var object = result.employee;
        var date    = new Date(object.dob),
        yr      = date.getFullYear(),
        month   = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth(),
        day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
        dob = day + '-' + month + '-' + yr;

        $(".modal-body").html(
          `<table class="table table-bordered">
            <tr><td colspan="2" style="text-align: center;" ><img src="${object.image_path}" style="width: 200px;height: 200px;" ></img></td></tr>
            <tr><td>Given Name : </td><td>${object.given_name}</td></tr>
            <tr><td>Family Name : </td><td>${object.family_name}</td></tr>
            <tr><td>DOB : </td><td>${dob}</td></tr>
            <tr><td>Job Role : </td><td>${object.job_role}</td></tr>
            <tr><td>Education Qualification : </td><td>${object.edu_qualification}</td></tr>
            <tr><td>Skills : </td><td>${object.skills}</td></tr>
            <tr><td>Present Address : </td><td>${object.present_address}</td></tr>
            <tr><td>Permanent Address : </td><td>${object.permanent_address}</td></tr>
            <tr><td>Primary Contact Number : </td><td>${object.contact_number}</td></tr>
            <tr><td>Secondary Contact Number : </td><td>${object.contact_number_2}</td></tr>
            <tr><td>Working Location : </td><td>${object.working_location}</td></tr>
            <tr><td>Email : </td><td>${object.email}</td></tr>
          </table>`
        );
        
        //$('#smallBody').html(result).show();
        //$("#given_name").prev().val(result.employee[given_name]);
        // $("#file").val(fileName);
      },
      complete: function() {
        $('#loader').hide();
      },
      error: function(jqXHR, testStatus, error) {
        console.log(error);                                                                                                                                  
        alert("Page " + href + " cannot open. Error:" + error);
        $('#loader').hide();
      },
      timeout: 8000
    })
  });

  $(document).on('click', '#employeeEditButton', function(event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    let id = $(this).attr('data-id');
    // console.log(href);
    $.ajax({
      url: href,
      beforeSend: function() {
        $('#loader').show();
      },
      // return the result
      success: function(result) {
        // console.log(result.employee);
        $('#employeeEditModal').modal("show");
        var object = result.employee;
        var pre_job_role = object.job_role;

        $(".modal-body").html(
          `<form action="{{ route('user_profile_update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row mt-2">  
              <div class="col-md-6">
                <label class="labels">Given Name<code>*</code></label>
                <input type="text" class="form-control" placeholder="Given Name" name="given_name" value="${object.given_name}">
                <span style="color:red">@error('given_name'){{$message}}@enderror</span>
              </div>
              <div class="col-md-6">
                <label class="labels">Family Name<code>*</code></label>
                <input type="text" class="form-control" name="family_name" placeholder="Family Name" value="${object.family_name}">
                <span style="color:red">@error('family_name'){{$message}}@enderror</span>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-6">
                <label class="labels">DOB</label>
                <input type="date" class="form-control" placeholder="Select DOB" name="dob" value="${object.dob}">
              </div>
              <div class="col-md-6">
                <label class="labels">Job Role</label>
                <input type="hidden" id="preJobRole" value="${object.job_role_id}">
                <select class="form-control" name="job_role">
                  <option value="0">Select Job Role</option>
                  @foreach($job_roles as $job_role)
                    @php
                    $pre_job_role=`$("#preJobRole").val(value);`;
                    echo $pre_job_role."aa";
                    @endphp
                    <option {{ ($pre_job_role == $job_role->id)?"selected":"" }} value="{{ $job_role->id }}">{{ $job_role->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-6">
                <label class="labels">Education Qualification</label>
                <textarea type="text" class="form-control" placeholder="enter Education Qualification" name="education_qualification" >${object.edu_qualification}
                </textarea>
              </div>
              <div class="col-md-6">
                <label class="labels">Skills</label>
                <textarea type="text" class="form-control" placeholder="enter Skills" name="skills"> ${object.skills}</textarea>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-6">
                <label class="labels">Present Address</label>
                <textarea type="text" class="form-control" placeholder="enter Present Address" name="present_address">${object.present_address}</textarea>
              </div>
              <div class="col-md-6">
                <label class="labels">Permanent Address</label>
                <textarea type="text" class="form-control" placeholder="enter Permanent Address" name="permanent_address">${object.permanent_address}</textarea>
              </div>
            </div>
            <div class="row mt-3">  
              <div class="col-md-6">
                <label class="labels">Primary Contact Number<code>*</code></label>
                <input type="text" class="form-control" placeholder="enter Primary Contact Number" name="contact_number" id="contact_number" value="${object.contact_number}">
                <span style="color:red">@error('contact_number'){{$message}}@enderror</span>
              </div>
              <div class="col-md-6">
                <label class="labels">Secondary Contact Number</label>
                <input type="text" class="form-control" placeholder="enter Secondary Contact Number" name="contact_number_2" value="${object.contact_number_2}">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-6">
                <label class="labels">Working Location</label>
                <select class="form-control" name="working_location">
                  <option value ="0">Select Working Location</option>
                  @foreach($working_locations as $working_location)
                    <option value="{{ $working_location->id }}">{{ $working_location->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label class="labels">Email<code>*</code></label>
                <input type="text" class="form-control" placeholder="enter Email" name="email" value="${object.email}">
                <span style="color:red">@error('email'){{$message}}@enderror</span>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-6">
                <div id="msg"></div>
                <label class="labels">Profile Photo</label>
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
                <img id="preview" class="img-thumbnail" src="${object.image_path}">
              </div>
            </div>
            <div class="mt-5 mb-5 text-center">
              <input type="hidden" id="profile_id" name="profile_id" value="${object.id}">
              <button class="btn btn-primary profile-button" type="submit" >Save Profile</button>
            </div>
          </form>`
        );
        
        //$('#smallBody').html(result).show();
        //$("#given_name").prev().val(result.employee[given_name]);
        // $("#file").val(fileName);
      },
      complete: function() {
        $('#loader').hide();
      },
      error: function(jqXHR, testStatus, error) {
        console.log(error);
        alert("Page " + href + " cannot open. Error:" + error);
        $('#loader').hide();
      },
      timeout: 8000
    })
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

