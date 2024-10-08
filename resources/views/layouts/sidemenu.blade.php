<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('dashboard') }}" class="app-brand-link">
      <span class="app-brand-logo">
        <img
          width="62"
          height="32"
          src="{{asset('admin/assets/img/branding/logo-hr.png')}}"
          class=""
        />
      </span>
      <span class="app-brand-text demo menu-text fw-bold">HRIS-BTJ🌳</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">    

    <!-- Apps & Pages -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Homepage</span>
    </li>
    <li class="{{ request()->is('dashboard') ? 'menu-item active' : 'menu-item' }}">
      <a href="{{ route('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-dashboard"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>
    <!-- Master -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Master</span>
    </li>
    <li class="{{ request()->is('users') ? 'menu-item active' : 'menu-item' }}">
      <a href="{{ route('users') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-users"></i>
        <div data-i18n="Users">Users</div>
      </a>
    </li>
    <li class="{{ request()->is('siteHris') ? 'menu-item active' : 'menu-item' }}">
      <a href="{{ route('siteHris') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-basket"></i>
        <div data-i18n="Site">Site</div>
      </a>
    </li>
    <li class="{{ request()->is('departmentHris') ? 'menu-item active' : 'menu-item' }}">
      <a href="{{ route('departmentHris') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div data-i18n="Department">Department</div>
      </a>
    </li>
    <li class="{{ request()->is('positionHris') ? 'menu-item active' : 'menu-item' }}">
      <a href="{{ route('positionHris') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-medal"></i>
        <div data-i18n="Position">Position</div>
      </a>
    </li>
    <li class="{{ request()->is('emailReceiverHris') ? 'menu-item active' : 'menu-item' }}">
      <a href="{{ route('emailReceiverHris') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-mail"></i>
        <div data-i18n="Email Receiver">Email</div>
      </a>
    </li>

    <!-- Forms Inputs -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Forms &amp; Input</span>
    </li>
    <!-- Forms -->
    <li class="{{ request()->is('employeeHris','employeeHris_add','employeeHris/*') ? 'menu-item active' : 'menu-item' }}">
      <a href="{{ route('employeeHris') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-friends"></i>
        <div data-i18n="Employee">Employee</div>
      </a>
    </li> 

  </ul>
</aside>