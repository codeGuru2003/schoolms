<!DOCTYPE html>
<html lang="en">
@php
    $system = App\Models\GlobalSetting::first();
@endphp
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @if ($system->system_name != null)
        <title>{{ $title }} | {{ $system->system_name }}</title>
    @else
        <title>Home | Smart School Systems</title>
    @endif
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="shortcut icon" href="{{ asset( 'storage/' . $system->system_logo) }}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />

    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<style>
    @keyframes shake {
        0%, 100% {
            transform: translateX(0);
        }
        10%, 30%, 50%, 70%, 90% {
            transform: translateX(-10px);
        }
        20%, 40%, 60%, 80% {
            transform: translateX(10px);
        }
    }

    .shake {
        animation: shake 2s;
    }
</style>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ url('home') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('storage/'. $system->system_logo) }}" alt="Logo">
        <span class="d-none d-lg-block">{{ $system->system_name }}</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="search-bar text-center">
        @php
            $currentTerm = App\Models\Term::with('year')->where('is_active', true)->first();
        @endphp
      <span><i><b>Current School Term {{ $currentTerm->name .' ('. $currentTerm->year->name.')' }}</b></i></span>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->
        @if (Auth::user())
        <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                {{-- <img src="<?php echo asset("storage/" . Auth::user()->image)?>"></img> --}}
                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile" class="rounded-circle">
                <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
            </a><!-- End Profile Image Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <h6>{{ Auth::user()->name }}</h6>
                    <!-- Assuming 'role' is a field in your user model -->
                    @php
                        $role = App\Models\Role::find(Auth::user()->role_id)
                    @endphp
                    <span>{{ $role->name }}</span>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                {{-- <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('user.profile') }}">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('change.password') }}">
                        <i class="bi bi-lock"></i>
                        <span>Change Password</span>
                    </a>
                </li> --}}
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                </li>
            </ul><!-- End Profile Dropdown Items -->
        </li>
        @endif<!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ url('home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Student</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('students.default') }}">
              <i class="bi bi-circle"></i><span>Manage Students</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Activate Students</span>
            </a>
          </li>
          <li>
          <li>
            <a href="components-carousel.html">
              <i class="bi bi-circle"></i><span>Assign Student Parents</span>
            </a>
          </li>
            <a href="components-badges.html">
              <i class="bi bi-circle"></i><span>Export Academic Report</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Faculty</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('faculties.index') }}">
              <i class="bi bi-circle"></i><span>Manage Faculty</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Activate Faculty</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Grades Entry</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Export Academic Reports</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Export Bulk Academic Reports</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-currency-dollar"></i><span>Finance</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>Paid Students</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Indebted Students</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Export Financial Records</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cash"></i><span>Payments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Pay Fees</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>Payment Approval</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>Payment Reversal</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bank"></i><span>Payroll</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#school-settings-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-building-gear"></i><span>School Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="school-settings-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('years.index') }}">
                  <i class="bi bi-circle"></i><span>Years</span>
                </a>
            </li>
            <li>
                <a href="{{ route('terms.index') }}">
                  <i class="bi bi-circle"></i><span>Terms</span>
                </a>
            </li>
            <li>
                <a href="{{ route('academicclasses.index') }}">
                <i class="bi bi-circle"></i><span>Classes</span>
                </a>
            </li>
            <li>
                <a href="{{ route('schools.index') }}">
                <i class="bi bi-circle"></i><span>Schools</span>
                </a>
            </li>
            <li>
                <a href="{{ route('sections.index') }}">
                <i class="bi bi-circle"></i><span>Sections</span>
                </a>
            </li>
            <li>
                <a href="{{ route('subjects.index') }}">
                <i class="bi bi-circle"></i><span>Subjects</span>
                </a>
            </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i><span>System Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="settings-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('globalsettings.index') }}">
                <i class="bi bi-circle"></i><span>Manage System</span>
                </a>
            </li>
            <li>
                <a href="{{ route('leveltypes.index') }}">
                <i class="bi bi-circle"></i><span>Manage Levels</span>
                </a>
            </li>
            <li>
                <a href="{{ route('account.users') }}">
                <i class="bi bi-circle"></i><span>Manage Users</span>
                </a>
            </li>
            <li>
                <a href="{{ route('roles.index') }}">
                <i class="bi bi-circle"></i><span>Manage Roles</span>
                </a>
            </li>
        </ul>
      </li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="container-fluid">
        @if(session('msg'))
            <div id="delete-success-alert" class="alert alert-success alert-dismissible fade show shake" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var alertElement = document.getElementById('delete-success-alert');
                    setTimeout(function() {
                        alertElement.classList.add('fade');
                        alertElement.classList.remove('show', 'shake');
                        alertElement.addEventListener('transitionend', function() {
                            alertElement.remove();
                        });
                    }, 5000);
                });
            </script>
        @endif
        @if (session()->has('error'))
            <div id="delete-success-alert" class="alert alert-danger alert-dismissible fade show shake" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var alertElement = document.getElementById('delete-success-alert');
                    setTimeout(function() {
                        alertElement.classList.add('fade');
                        alertElement.classList.remove('show', 'shake');
                        alertElement.addEventListener('transitionend', function() {
                            alertElement.remove();
                        });
                    }, 5000);
                });
            </script>
        @endif
    </div>

    {{-- @if(session('msg'))
        <div id="delete-success-toast" class="toast align-items-center text-dark bg-light border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('msg') }}
                </div>
                <button type="button" class="btn-close me-2 m-auto text-dark" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var toast = new bootstrap.Toast(document.getElementById('delete-success-toast'));
                toast.show();
            });
        </script>
    @endif --}}
    @yield('content')
  </main>
  <footer id="footer" class="footer">
    <div class="copyright">
      {{ $system->footer_text }}
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset("vendor/chart.js/chart.umd.js") }}"></script>
  <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
  {{-- <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script> --}}
  <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
