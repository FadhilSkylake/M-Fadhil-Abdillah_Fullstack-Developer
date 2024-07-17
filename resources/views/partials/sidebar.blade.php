<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="text-nowrap">
        <h1>HOSPITAL</h1>
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">User</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url('/users') }}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Profile</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Data</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url('/pasien') }}" aria-expanded="false">
              <span>
                <i class="ti ti-article"></i>
              </span>
              <span class="hide-menu">Pasien</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url('/riwayat') }}" aria-expanded="false">
              <span>
                <i class="ti ti-alert-circle"></i>
              </span>
              <span class="hide-menu">Riwayat Medis</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url('/spesialisasi') }}" aria-expanded="false">
              <span>
                <i class="ti ti-cards"></i>
              </span>
              <span class="hide-menu">Spesialisasi</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url('/dokter') }}" aria-expanded="false">
              <span>
                <i class="ti ti-file-description"></i>
              </span>
              <span class="hide-menu">Dokter</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ url('/jadwal-periksa') }}" aria-expanded="false">
              <span>
                <i class="ti ti-file-description"></i>
              </span>
              <span class="hide-menu">Jadwal Periksa</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  