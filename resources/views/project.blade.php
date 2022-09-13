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
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js" integrity="sha512-xIPqqrfvUAc/Cspuj7Bq0UtHNo/5qkdyngx6Vwt+tmbvTLDszzXM0G6c91LXmGrRx8KEPulT+AfOOez+TeVylg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                    <h4 class="text-center" style="font-size: 40px;color:#404040;">Add Project</h4>
                  </div>
                  
                  <form action="{{ route('project_add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row mt-2">
                      <div class="col-md-12">
                        <label class="labels">Title<code>*</code></label>
                        <input type="text" class="form-control" placeholder="Title" name="title">
                        <span style="color:red">@error('title'){{$message}}@enderror</span>
                      </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Client</label>
                            <select class="form-control" name="client_id" id="client_id">
                                <option value="0">Select Client</option>
                                @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                          <label class="labels">Start Date</label>
                          <input type="date" class="form-control" placeholder="Start Date" name="start_date" id="start_date">
                        </div>
                        <div class="col-md-3">
                          <label class="labels">Due Date</label>
                          <input type="date" class="form-control" placeholder="Due Date" name="due_date" id="due_date">
                        </div>

                    </div>
                    <div class="row mt-2">
                      <div class="col-md-6">
                        <label class="labels">Assign To<code>*</code></label>
                        <select class="form-control" name="assign_to[]" id="assign_to" multiple="multiple">
                          <option value="">Select Assign To</option>
                          @foreach($users as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                        </select>
                        <span style="color:red">@error('assign_to'){{$message}}@enderror</span>
                      </div>
                      <div class="col-md-6">
                        <label class="labels">Project Manager</label>
                        <select class="form-control" name="project_manager" id="project_manager">
                            <option value="0">Select Project Manager</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="mt-5 mb-5 text-center">
                      <button class="btn btn-primary profile-button" type="submit" >Save</button>
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
                  <div class="justify-content-between align-items-center col-md-12 mt-5" >
                    <h4 class="text-center" style="font-size: 40px;color:#404040;">Project List</h4>
                    <table class="table table-striped table-responsive" style="display: inline-table!important;">
                      <thead>
                        <tr>
                          <th style="width:5%" >Action</th>
                          <th style="width:5%" >Sr. No.</th>
                          <th>Title</th>
                          <th>Client</th>
                          <th>Assign To</th>
                          <th>Project Manager</th>
                          <th>Start Date</th>
                          <th>Due Date</th>
                          <th>Project Created By</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $count = 0;
                        @endphp
                        @foreach($projects as $project)
                          <tr>
                            <td>
                              <a href="{{ route('single_project_edit', $project->id) }}" title="Edit" style="margin-left: 10px;color: green;text-decoration: none" >
                                <i class="fa fa-edit"></i>
                              </a>
                              <a onclick="return confirm('Are you sure Delete This Project..?')"  href="{{ route('single_project_delete', $project->id) }}" title="Delete" style="margin-left: 10px;color: red;text-decoration: none" >
                                <i class="fa fa-trash-o"></i>
                              </a>
                              </br></br>
                              @if($project->status==0 || $project->status==2)
                                <button id="startButton" data-id="{{$project->id}}" title="Start" class="btn btn-sm btn-info" type="button" onClick="project_start({{$project->id}})">Start</button>
                              @endif
                              @if(($project->status==1) && (Auth::user()->type==1 || Auth::user()->type==2 ))
                                <button id="holdButton" data-id="{{$project->id}}" title="Hold" class="btn btn-sm btn-secondary"  type="button" onClick="project_hold({{$project->id}})">Hold</button>
                              @endif
                              <button class='clickable-row btn btn-sm btn-info' data-href="{{ route('project_details', $project->id) }}" style="cursor: pointer;" title="Project Details" >
                                <i class="fa fa-arrows-alt"></i>
                              </button>
                              </br></br>
                              @if($project->status!=4 && $project->status!=3 && $project->status!=0 && (Auth::user()->type==1 || Auth::user()->type==2 ))
                              <button id="completeButton" data-id="{{$project->id}}"  title="Complete" class="btn btn-sm btn-success" type="button" onClick="project_complete({{$project->id}})">Complete
                              </button>
                              @endif
                              @if($project->status!=4 && $project->status!=3 && (Auth::user()->type==1 || Auth::user()->type==2 ))
                              <button id="cancelButton" data-id="{{$project->id}}" title="Cancel" class="btn btn-sm btn-danger" type="button" onClick="project_cancel({{$project->id}})">Cancel
                              </button>
                              @endif
                              
                            </td>
                            <td><a href="{{ route('project_details', $project->id) }}">{{++$count}}</a></td>
                            <td>{{$project->title}}</td>
                            <td>
                              @if($project->client_id!=0)
                                {{$project->client_name->company_name}}
                              @endif
                            </td>
                            <td>
                              @php
                                $assign_to_ids = $project->assign_to;
                                $assign_to_ids_arrays = (explode(",",$assign_to_ids));
                              @endphp
                              @foreach($assign_to_ids_arrays as $assign_to_ids_array)
                                @php
                                  $result = app('app\Http\Controllers\DashboardController')->get_assignto_names_from_ids($assign_to_ids_array);
                                  $json_toArray = json_decode($result,true);
                                  $array_names = array_map(function ($array) {return $array['name'];}, $json_toArray);
                                  $assign_to_names = (implode(",",$array_names));
                                @endphp
                                {{$assign_to_names}}<br>
                              @endforeach
                            </td>
                            <td>
                              @if($project->project_manager!=0)
                                {{$project->project_manager_name->name}}
                              @endif
                            </td>
                            <td>
                              @php
                                $startdate=$project->start_date;
                                if($startdate!="" && $startdate!="NULL" && $startdate!="0000-00-00"  && $startdate!="1970-01-01")
                                {
                                echo date("d-m-Y",strtotime($startdate));
                                }
                              @endphp
                            </td>
                            <td>
                              @php
                                $duedate=$project->due_date;
                                if($duedate!="" && $duedate!="NULL" && $duedate!="0000-00-00"  && $duedate!="1970-01-01")
                                {
                                echo date("d-m-Y",strtotime($duedate));
                                }
                              @endphp
                            </td>
                            <td>{{$project->user_name->name}}</td>
                            <td>
                              @php
                                $StatuaArray = array("0"=>"Not Started","1"=>"In Progress","2"=>"On Hold","3"=>"Completed","4"=>"Cancel");
                              @endphp
                              {{$StatuaArray[$project->status]}}
                            </td>
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
  jQuery(document).ready(function($) {
      $(".clickable-row").click(function() {
          window.location = $(this).data("href");
      });
  });

  function project_start(id){

    var user_id = `{{Auth::user()->id}}`;
    var tdate = new Date();
    var dd = tdate.getDate(); //yields day
    var MM = tdate.getMonth(); //yields month
    var yyyy = tdate.getFullYear(); //yields year
    var hh = tdate.getHours();
    var ii = tdate.getMinutes();
    var ss = tdate.getSeconds();

    var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

    var url = `{{ route('project_start') }}`;

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
  function project_hold(id){

    var user_id = `{{Auth::user()->id}}`;
    var tdate = new Date();
    var dd = tdate.getDate(); //yields day
    var MM = tdate.getMonth(); //yields month
    var yyyy = tdate.getFullYear(); //yields year
    var hh = tdate.getHours();
    var ii = tdate.getMinutes();
    var ss = tdate.getSeconds();

    var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

    var url = `{{ route('project_hold') }}`;

    // console.log("Function called",date);
    // console.log("Task Id",id);
    const form_data = new FormData();
    form_data.append("id",id);
    form_data.append("user_id",user_id);
    form_data.append("hold_time",date);

    axios.post(url,form_data).then(response => {
      
      console.log(response);
      // `{{ route('time_tracker') }}`;
      // window.location.href(`{{ route('time_tracker') }}`);
      location.reload();
    }).catch(error=>{
      // console.log(error);
    });
  }
  
  function project_complete(id){

    var user_id = `{{Auth::user()->id}}`;
    var tdate = new Date();
    var dd = tdate.getDate(); //yields day
    var MM = tdate.getMonth(); //yields month
    var yyyy = tdate.getFullYear(); //yields year
    var hh = tdate.getHours();
    var ii = tdate.getMinutes();
    var ss = tdate.getSeconds();

    var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

    var url = `{{ route('project_complete') }}`;

    // console.log("Function called",date);
    // console.log("Task Id",id);
    const form_data = new FormData();
    form_data.append("id",id);
    form_data.append("user_id",user_id);
    form_data.append("complete_time",date);

    axios.post(url,form_data).then(response => {
      
      console.log(response);
      // `{{ route('time_tracker') }}`;
      // window.location.href(`{{ route('time_tracker') }}`);
      location.reload();
    }).catch(error=>{
      // console.log(error);
    });
  }
  
  function project_cancel(id){

    var user_id = `{{Auth::user()->id}}`;
    var tdate = new Date();
    var dd = tdate.getDate(); //yields day
    var MM = tdate.getMonth(); //yields month
    var yyyy = tdate.getFullYear(); //yields year
    var hh = tdate.getHours();
    var ii = tdate.getMinutes();
    var ss = tdate.getSeconds();

    var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

    var url = `{{ route('project_cancel') }}`;

    // console.log("Function called",date);
    // console.log("Task Id",id);
    const form_data = new FormData();
    form_data.append("id",id);
    form_data.append("user_id",user_id);
    form_data.append("cancel_time",date);

    axios.post(url,form_data).then(response => {
      
      console.log(response);
      // `{{ route('time_tracker') }}`;
      // window.location.href(`{{ route('time_tracker') }}`);
      location.reload();
    }).catch(error=>{
      // console.log(error);
    });
  }
</script>