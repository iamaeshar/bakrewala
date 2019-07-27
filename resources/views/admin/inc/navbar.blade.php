<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="nav-spacer"></div>
    <button class="btn bg-transparent text-primary">
        <i class="fas fa-bars"></i>
    </button>
    <h4 class="mb-0">@yield('page-title')</h4>
</nav>

<div class="main-container d-flex">
    <div id="sidebar" class="bg-primary pt-3">
        <ul class="nav flex-column">
            <li class="nav-item border-bottom d-flex align-items-center justify-content-center" style="height: 100px">
                <h3 class="text-white">Logo</h3>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin/dashboard"><i
                        class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;&nbsp;Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin/order"><i
                        class="fas fa-briefcase"></i>&nbsp;&nbsp;&nbsp;Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin/product"><i
                        class="fas fa-briefcase"></i>&nbsp;&nbsp;&nbsp;Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin/breed"><i
                        class="fas fa-clipboard-list"></i>&nbsp;&nbsp;&nbsp; Breed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin/event"><i class="fab fa-elementor"></i>&nbsp;&nbsp;&nbsp;
                    Event</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin/query"><i
                        class="fab fa-elementor"></i>&nbsp;&nbsp;&nbsp;Query</a>
            </li>
            <li class="dropdown-divider"></li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i
                        class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp; Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <div class="nav-spacer"></div>
    <main class="w-100">
        @include('admin.inc.message')
        @yield('content')
    </main>
</div>