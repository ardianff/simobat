<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ url('assets/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ url('assets/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="/">
                <svg class="nav-icon">
                    <use xlink:href="{{ url('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('medicine.index') }}">
                <i class="nav-icon fa-regular fa-pills"></i>
                Daftar Obat</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">
                <i class="nav-icon fa-regular fa-users"></i>
                Users</a></li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
