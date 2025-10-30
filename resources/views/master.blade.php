<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'App Pegawai')</title>

  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  @stack('styles')
</head>
<body>

  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="/" class="app-brand-link">
            <span class="app-brand-text demo fw-bold text-primary">App Pegawai</span>
          </a>
        </div>

        <ul class="menu-inner py-1">
          <li class="menu-item {{ request()->is('employees*') ? 'active' : '' }}">
            <a href="{{ route('employees.index') }}" class="menu-link">
              <i class="menu-icon bi bi-people"></i>
              <div>Pegawai</div>
            </a>
          </li>
          <li class="menu-item {{ request()->is('departments*') ? 'active' : '' }}">
            <a href="{{ route('departments.index') }}" class="menu-link">
              <i class="menu-icon bi bi-building"></i>
              <div>Departemen</div>
            </a>
          </li>
          <li class="menu-item {{ request()->is('positions*') ? 'active' : '' }}">
            <a href="{{ route('positions.index') }}" class="menu-link">
              <i class="menu-icon bi bi-briefcase"></i>
              <div>Jabatan</div>
            </a>
          </li>
          <li class="menu-item {{ request()->is('attendance*') ? 'active' : '' }}">
            <a href="{{ route('attendance.index') }}" class="menu-link">
              <i class="menu-icon bi bi-calendar-check"></i>
              <div>Absensi</div>
            </a>
          </li>
          <li class="menu-item {{ request()->is('salaries*') ? 'active' : '' }}">
            <a href="{{ route('salaries.index') }}" class="menu-link">
              <i class="menu-icon bi bi-cash-coin"></i>
              <div>Gaji</div>
            </a>
          </li>
        </ul>
      </aside>
=
      <div class="layout-page">
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached bg-navbar-theme">
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <h4 class="mb-0 ms-2">@yield('page-title', 'Dashboard')</h4>
          </div>
        </nav>

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            @yield('content')
          </div>

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex justify-content-between py-2 flex-md-row flex-column">
              <div>{{ date('Y') }}, ttd zahra</div>
            </div>
          </footer>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

  @stack('scripts')
</body>
</html>
