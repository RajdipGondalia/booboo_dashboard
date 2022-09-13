<?php
use App\Http\Controllers\DashboardController;
use App\Models\TimeTracker;
use Illuminate\Http\Request;
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
  <style>
    .date-main{
      display: flex;
      flex-direction: column;
      width: 12.5rem;
      height: 7.5rem;
      border: 1px solid #ececec;
      background-color: #2a2a2a;
      color: white;
      border-radius: 12px;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
    }
    .date-title{
      font-size: 1.25rem;
      font-weight: bold;
      color: antiquewhite;
    }
    .date-details{
      color: khaki;
      font-size: 1.5rem;
      font-weight: bold;
    }
  </style>
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
                    <div class="row">
                      <div class="col-md-9">
                        @php
                        $user_id=1;
                        @endphp
                        @if($user_last_flag=="stop")
                          <button type="button" class="btn btn-info mb-5" style="margin-left:35px;" id="TimeStart">Start</button>
                        @elseif($user_last_flag=="start")
                          <button type="button" class="btn btn-danger mb-5" style="margin-left:35px;" id="TimeStop">Stop</button>  
                        @else
                          <button type="button" class="btn btn-info mb-5" style="margin-left:35px;" id="TimeStart">Start</button>
                        @endif
                      </div>
                      <div class="col-md-3">
                        @php
                          $days = floor($total_seconds/86400);
                          $hours = floor(($total_seconds - $days*86400) / 3600);
                          $minutes = floor(($total_seconds / 60) % 60);
                          $seconds = floor($total_seconds % 60);
                        @endphp
                        <div class="date-main">
                          <div class="date-title">{{date("d-m-Y")}}</div>
                          <div class="date-title"> Today's Total Time</div>
                          <div class="date-details">{{$hours}}:{{$minutes}}:{{$seconds}}</div>
                        </div>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class=" rounded bg-white mt-2 mb-2">
                <div class="row">
                  <div class="justify-content-between align-items-center col-md-12 mt-5" >
                    <h4 class="text-center" style="font-size: 40px;color:#404040;">Time Tracker List</h4>
                    <table class="table table-striped table-responsive" style="display: inline-table!important;">
                      <thead>
                        <tr>
                          <th style="width:5%">Action</th>
                          <th style="width:5%">Sr. No.</th>
                          <th>Start/Stop</th>
                          <th>Date & Time</th>
                          <th>User Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- {{$count=0}} -->
                        <!-- @define $count = 0 -->
                        
                        @php
                        $count = 0
                        
                        @endphp
                        @foreach($time_trackers as $time_tracker)
                          @php
                          $current_time = date("d-m-Y h:i:s A",strtotime($time_tracker->current_time));
                          @endphp
                          <tr>
                            <td>
                              <a onclick="return confirm('Are you sure Delete This Time Tracker..?')"  href="{{ route('single_time_tracker_delete', $time_tracker->id) }}" title="Delete" style="margin-left: 10px;color: red;text-decoration: none" >
                                <i class="fa fa-trash-o"></i>
                              </a>
                            </td>
                            <td>{{++$count}}</td>
                            <td>{{$time_tracker->flag}}</td>
                            <td>{{$current_time}}</td>
                            <td>{{$time_tracker->user_name->name}}</td>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js" integrity="sha512-xIPqqrfvUAc/Cspuj7Bq0UtHNo/5qkdyngx6Vwt+tmbvTLDszzXM0G6c91LXmGrRx8KEPulT+AfOOez+TeVylg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  


</body>

</html>
<script>

  $(document).ready(function (){
    $('#TimeStart').on('click', function(){
      var user_id = `{{Auth::user()->id}}`;
      time_start(user_id);
    })
    $('#TimeStop').on('click', function(){
      var user_id = `{{Auth::user()->id}}`;
      time_stop(user_id);
    })
    function time_start(user_id){

      var tdate = new Date();
      var dd = tdate.getDate(); //yields day
      var MM = tdate.getMonth(); //yields month
      var yyyy = tdate.getFullYear(); //yields year
      var hh = tdate.getHours();
      var ii = tdate.getMinutes();
      var ss = tdate.getSeconds();

      var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

      var url = `{{ route('time_start') }}`;
      // console.log("Function called",date);
      // console.log("User Id",user_id);
      const form_data = new FormData();
      form_data.append("user_id",user_id);
      form_data.append("start_time",date);
      axios.post(url,form_data).then(response => {
        // console.log(response);
        // `{{ route('time_tracker') }}`;
        // window.location.href(`{{ route('time_tracker') }}`);
        location.reload();
      }).catch(error=>{
        // console.log(error);
      });
    }
    function time_stop(user_id){

      var tdate = new Date();
      var dd = tdate.getDate(); //yields day
      var MM = tdate.getMonth(); //yields month
      var yyyy = tdate.getFullYear(); //yields year
      var hh = tdate.getHours();
      var ii = tdate.getMinutes();
      var ss = tdate.getSeconds();

      var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

      var url = `{{ route('time_stop') }}`;
      // console.log("Function called",date);
      // console.log("User Id",user_id);
      const form_data = new FormData();
      form_data.append("user_id",user_id);
      form_data.append("start_time",date);
      axios.post(url,form_data).then(response => {
        // console.log(response);
        // `{{ route('time_tracker') }}`;
        // window.location.href(`{{ route('time_tracker') }}`);
        location.reload();
      }).catch(error=>{
        // console.log(error);
      });
      }
  });
  // display a modal (small modal)
  
    


      // $date="date(Y-m-d h:i:s)";
      // //dd($request->all());
      // // dd($request->img[0]);
      // $time_start = new TimeTracker;
      // $time_start->flag = 'start';
      // $time_start->user_id = '1';
      // $time_start->current_time = $date;


      // $time_start->save();

      // if($time_start){
      //     return redirect()->route('all_employees');
      // }else{
      //     $message = 'Data not Saved';
      //     Session('message',$message);
      // }
    // }
</script>

