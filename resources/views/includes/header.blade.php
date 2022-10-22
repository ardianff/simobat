<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="{{ url('vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
        </button><a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ url('assets/brand/coreui.svg#full') }}"></use>
            </svg></a>
        <ul class="header-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="javascript:void(0)">
                    {{ salam() . ', ' . Auth::user()->name }}
                </a></li>
        </ul>
        <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                    role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md"><img class="avatar-img" src="{{ url('assets/img/avatars/2.jpg') }}"
                            alt="user@email.com"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Settings</div>
                    </div>
                    <a class="dropdown-item" href="{{ route('password.request') }}">
                        <i class="fa-regular fa-unlock icon me-2"></i>Lupa Password</a>
                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item ">
                        @csrf
                        <i class="fa-light fa-arrow-right-from-bracket"></i>
                        <button type="submit" class="btn-out icon me-2">Keluar</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>
