<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $setting->name ?? 'Clinic Management System' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-table.css')}}" rel="stylesheet">
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/all.css')}}" rel="stylesheet">
    <!-- <link href="{{ asset('css/nepali.datepicker.min.css')}}" rel="stylesheet"> -->
    <link href="{{ asset('css/datatable.css')}}" rel="stylesheet">
    <link href="{{ asset('css/buttons.dataTables.css')}}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/timepicker.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/numpad.css')}}" rel="stylesheet">
    <link rel="favicon" sizes="32x32" href="/favicon-32x32.png">
    <link rel="favicon" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--Icons-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{asset('js/lumino.glyphs.js')}}"></script>
    <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/easypiechart.js')}}"></script>
    <script src="{{asset('js/easypiechart-data.js')}}"></script>
    <script src="{{asset('js/bootstrap-table.js')}}"></script>
    <script src="{{asset('js/nepali.datepicker.min.js')}}"></script>
    <script src="{{asset('js/datatable.js')}}"></script>
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/buttonPrint.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/timepicker.min.js')}}"></script>
    <script src="{{asset('js/numpad.js')}}"></script>
  
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>



    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
        $('.example').DataTable();
        $('.datepicker').datepicker();
        $('.datepicker1').datepicker({

            format: "mm/dd/yyyy",
            todayHighlight:true,
            autoclose: true,
        });
        $('.datepicker').change(function(){
            $(".datepicker").datepicker('hide');
        });
        $('.datepicker1').change(function(){
            $(".datepicker1").datepicker('hide')
        });
} );
</script>
    <script>
    $(document).ready(function(){

        $('input.timepicker').timepicker({dropdown: true,
    scrollbar: true});
        
        $('#nepaliDateD').nepaliDatePicker({
            disableBefore: '12/08/2073',
            disableAfter: '12/20/2073'
        });
        $('#nepaliDateD1').nepaliDatePicker({
            disableDaysBefore: '10',
            disableDaysAfter: '10'
        });

        $('#nepaliDate5').nepaliDatePicker({
            npdMonth: true,
            npdYear: true,


        });
        $('#nepaliDate').nepaliDatePicker({
            onFocus: false,
            npdMonth: true,
            npdYear: true,
            ndpEnglishInput: 'englishDate',
            ndpTriggerButtonText: 'Date',
            ndpTriggerButtonClass: 'btn btn-primary btn-sm'
        });
        $('#nepaliDate1').nepaliDatePicker({
            onChange: function(){
                alert($('#nepaliDate1').val());
            }
        });
        $('#nepaliDate2').nepaliDatePicker();
        $('#nepaliDate3').nepaliDatePicker({
            onFocus: false,
            npdMonth: true,
            npdYear: true,
            ndpTriggerButton: true,
            ndpTriggerButtonText: 'Date',
            ndpTriggerButtonClass: 'btn btn-primary btn-sm'
        });

        $('#englishDate').change(function(){
            $('#nepaliDate').val(AD2BS($('#englishDate').val()));
        });

        $('#englishDate9').change(function(){
            $('#nepaliDate9').val(AD2BS($('#englishDate9').val()));
        });

        $('#nepaliDate9').change(function(){
            $('#englishDate9').val(BS2AD($('#nepaliDate9').val()));
        });
    });
</script>
    <script type="text/javascript">
         $(document).ready(function() {
  $(".select2").select2();

});
    </script>
    <script type="text/javascript">
$(document).ready(function() {
  $(".select").select2();
});
</script>


    @yield('script')
    <style type="text/css">
       body {
           font-family: 'Inter', sans-serif !important;
           background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
           color: #333;
           min-height: 100vh;
           padding-top: 60px; /* Space for fixed header */
       }
       /* Top Header */
       .navbar-inverse {
           background: rgba(255, 255, 255, 0.95) !important;
           backdrop-filter: blur(10px);
           border-color: transparent !important;
           box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
           position: fixed;
           width: 100%;
           top: 0;
           z-index: 1000;
           height: 60px;
       }
       .navbar-inverse .navbar-brand {
           color: #2c3e50 !important;
           font-weight: 700;
           font-size: 20px;
           line-height: 30px;
       }
       .navbar-inverse .navbar-nav>li>a {
           color: #2c3e50 !important;
           font-weight: 600;
       }
       /* Sidebar */
       .sidebar {
           position: fixed;
           top: 60px;
           bottom: 0;
           left: 0;
           z-index: 1000;
           display: block;
           padding: 20px;
           overflow-x: hidden;
           overflow-y: auto;
           background-color: #1a252f;
           box-shadow: inset -1px 0 0 rgba(0,0,0,.1);
           transition: all 0.3s;
       }
       .sidebar .nav>li>a {
           color: #b8c7ce;
           font-weight: 500;
           padding: 12px 15px;
           border-radius: 8px;
           margin-bottom: 5px;
           transition: all 0.2s;
       }
       .sidebar .nav>li>a:hover, .sidebar .nav>li.active>a {
           color: #fff;
           background-color: #3498db;
       }
       .sidebar .nav>li>a i {
           margin-right: 10px;
           width: 20px;
           text-align: center;
       }
       /* Sidebar Dropdown (Nested nav) */
       .sidebar .nav .nav {
           margin-left: 15px;
           margin-bottom: 10px;
       }
       /* Main Content */
       .main-content {
           padding: 20px;
       }
       /* Panels and general UI */
       .panel {
           border-radius: 12px;
           border: none;
           box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
           transition: transform 0.2s ease-in-out;
       }
       .panel:hover {
           transform: translateY(-2px);
       }
       .panel-heading {
           border-top-left-radius: 12px !important;
           border-top-right-radius: 12px !important;
           background-color: #ffffff !important;
           font-weight: 700;
           color: #2c3e50 !important;
           border-bottom: 1px solid #edf2f7;
       }
       .btn {
           border-radius: 8px;
           font-weight: 500;
       }
       .table>tbody>tr>td {
           vertical-align: middle;
       }
       .table-hover>tbody>tr:hover {
           background-color: #f8fafc;
       }
    </style>
<body>

<!-- TOP HEADER -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('dashboard.index')}}"><i class="fas fa-clinic-medical"></i> {{ $setting->name ?? 'Clinic Management System' }}</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        @auth
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a id="password_change"><i class="fas fa-key"></i> Change Password</a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
        @else
        <li><a href="{{ route('login') }}">Login</a></li>
        @endauth
    </ul>
  </div>
</nav>

<!-- SIDEBAR -->
@auth
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar collapse">
    <ul class="nav nav-sidebar">
        <li class="{{ request()->is('/*') ? 'active' : '' }}"><a href="{{route('dashboard.index')}}"><i class="fas fa-home"></i> Dashboard</a></li>
        
        @permission('department.index')
        <li class="{{ request()->is('department*') || request()->is('service*') || request()->is('package') || request()->is('employee*') || request()->is('doctor*') || request()->is('invoice/report') ? 'active' : '' }}">
            <a data-toggle="collapse" href="#sub-admin"><i class="fas fa-users-cog"></i> Admin <span class="caret"></span></a>
            <ul class="nav collapse {{ request()->is('department*') || request()->is('service*') || request()->is('package') || request()->is('employee*') || request()->is('doctor*') || request()->is('invoice/report') ? 'in' : '' }}" id="sub-admin">
                <li><a href="{{route('department.index')}}"><i class="fas fa-angle-right"></i> Departments</a></li>
                <li><a href="{{route('service.index')}}"><i class="fas fa-angle-right"></i> Services</a></li>
                <li><a href="{{route('package.index')}}"><i class="fas fa-angle-right"></i> Package</a></li>
                <li><a href="{{route('employee.index')}}"><i class="fas fa-angle-right"></i> Employees</a></li>
                <li><a href="{{route('doctor.index')}}"><i class="fas fa-angle-right"></i> Doctor OPD</a></li>
                <li><a href="{{route('invoice.report')}}"><i class="fas fa-angle-right"></i> Invoice Report</a></li>
            </ul>
        </li>
        @endpermission

        @permission('patient.index')
        <li class="{{ request()->is('patient*') || request()->is('appointment*') ? 'active' : '' }}">
            <a data-toggle="collapse" href="#sub-patient"><i class="fas fa-hospital-user"></i> Patient <span class="caret"></span></a>
            <ul class="nav collapse {{ request()->is('patient*') || request()->is('appointment*') ? 'in' : '' }}" id="sub-patient">
                <li><a href="{{route('patient.index')}}"><i class="fas fa-angle-right"></i> Patient</a></li>
                <li><a href="{{route('appointment.index')}}"><i class="fas fa-angle-right"></i> Appointment</a></li>
            </ul>
        </li>
        @endpermission

        @permission('invoice.report')
        <li class="{{ request()->is('account/*') ? 'active' : '' }}">
            <a data-toggle="collapse" href="#sub-report"><i class="fas fa-file-medical-alt"></i> Report <span class="caret"></span></a>
            <ul class="nav collapse {{ request()->is('account/*') ? 'in' : '' }}" id="sub-report">
                <li><a href="{{route('account.service')}}"><i class="fas fa-angle-right"></i> Service Sale Report</a></li>
                <li><a href="{{route('account.opd')}}"><i class="fas fa-angle-right"></i> Opd Sale Report</a></li>
                <li><a href="{{route('account.package')}}"><i class="fas fa-angle-right"></i> Package Sale Report</a></li>
            </ul>
        </li>
        @endpermission

        <li class="{{ request()->is('invoice*') || request()->is('opd*') || request()->is('package/sale') || request()->is('search/invoice') ? 'active' : '' }}">
            <a data-toggle="collapse" href="#sub-invoice"><i class="fas fa-receipt"></i> Invoice/Bill <span class="caret"></span></a>
            <ul class="nav collapse {{ request()->is('invoice*') || request()->is('opd*') || request()->is('package/sale') || request()->is('search/invoice') ? 'in' : '' }}" id="sub-invoice">
                <li><a href="{{route('invoice.index')}}"><i class="fas fa-angle-right"></i> Service Bill</a></li>
                <li><a href="{{route('opd.index')}}"><i class="fas fa-angle-right"></i> OPD Bill</a></li>
                <li><a href="{{url('package/sale')}}"><i class="fas fa-angle-right"></i> Package Bill</a></li>
                @permission('search.invoice')
                <li><a href="{{route('search.invoice')}}"><i class="fas fa-angle-right"></i> Invoice Report</a></li>
                @endpermission
            </ul>
        </li>

        @permission('test.index')
        <li class="{{ request()->is('test') || request()->is('reference') || request()->is('haematology') || request()->is('biochemistry') || request()->is('immunology') || request()->is('microbiology') || request()->is('examination') || request()->is('stain') || request()->is('report')  ? 'active' : '' }}">
            <a data-toggle="collapse" href="#sub-lab"><i class="fas fa-flask"></i> Lab Test <span class="caret"></span></a>
            <ul class="nav collapse {{ request()->is('test') || request()->is('reference') || request()->is('haematology') || request()->is('biochemistry') || request()->is('immunology') || request()->is('microbiology') || request()->is('examination') || request()->is('stain') || request()->is('report') ? 'in' : '' }}" id="sub-lab">
                <li><a href="{{route('test.index')}}"><i class="fas fa-angle-right"></i> Manage Test</a></li>
                <li><a href="{{route('reference.index')}}"><i class="fas fa-angle-right"></i> Test References </a> </li>
                <li><a href="{{route('haematology.index')}}"><i class="fas fa-angle-right"></i> Haematology Report </a> </li>
                <li><a href="{{route('biochemistry.index')}}"><i class="fas fa-angle-right"></i> Biochemistry Report </a> </li>
                <li><a href="{{route('immunology.index')}}"><i class="fas fa-angle-right"></i> Immunology Report </a> </li>
                <li><a href="{{route('microbiology.index')}}"><i class="fas fa-angle-right"></i> Microbiology Report </a> </li>
                <li><a href="{{route('examination.index')}}"><i class="fas fa-angle-right"></i> Examination Report </a> </li>
                <li><a href="{{route('stain.index')}}"><i class="fas fa-angle-right"></i> Stain Report </a> </li>
                <li><a href="{{route('report.index')}}"><i class="fas fa-angle-right"></i> Report</a></li>
            </ul>
        </li>
        @endpermission

        @permission('hospital.setting')
        <li class="{{ request()->is('user*') || request()->is('role*') || request()->is('setting') || request()->is('backup') ? 'active' : '' }}">
            <a data-toggle="collapse" href="#sub-setting"><i class="fas fa-tools"></i> Setting <span class="caret"></span></a>
            <ul class="nav collapse {{ request()->is('user*') || request()->is('role*') || request()->is('setting') || request()->is('backup') ? 'in' : '' }}" id="sub-setting">
                @permission('user.index')
                <li><a href="{{route('user.index')}}"><i class="fas fa-angle-right"></i> Users</a></li>
                @endpermission
                @permission('role.index')
                <li><a href="{{route('role.index')}}"><i class="fas fa-angle-right"></i> Roles</a></li>
                @endpermission
                <li><a href="{{ route('hospital.setting')}}"><i class="fas fa-angle-right"></i> Settings</a></li>
                <li><a href="{{ route('hospital.backup')}}"><i class="fas fa-angle-right"></i> Backup</a></li>
            </ul>
        </li>
        @endpermission
    </ul>
</div><!--/.sidebar-->
@endauth

<!-- MAIN CONTENT -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main-content" style="@guest margin-left: 0; width: 100%; @endguest">
    @if (count($errors))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        @foreach($errors->all() as $error)
            <strong>{{ $error }}</strong>
        @endforeach
    </div>
    @endif
    @include('change')

    @yield('content')

    <footer style="margin-top: 50px; padding: 20px; text-align: center; border-top: 1px solid #e2e8f0; color: #718096; font-size: 14px;">
        &copy; {{ date('Y') }} {{ $setting->name ?? 'Clinic Management System' }}. Developed by Hashim siraj | Version=1
    </footer>
</div>

</body>
</html>
