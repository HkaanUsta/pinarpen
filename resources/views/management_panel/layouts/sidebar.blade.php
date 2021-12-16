
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin/dashboard')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item @if(Request::segment(2)=='dashboard') active @endif">
            <a class="nav-link" href="{{url('admin/dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->

        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2)=='portfolios') in @else collapsed @endif" href="#" data-toggle="collapse" data-target="#portfoliosCollapse"
               aria-expanded="true" aria-controls="portfoliosCollapse">
                <i class="far fa-newspaper"></i>
                <span>Portfolios</span>
            </a>
            <div id="portfoliosCollapse" class="collapse @if(Request::segment(2)=='portfolios') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Portfolios Event:</h6>
                    <a class="collapse-item @if(Request::segment(2)=='portfolios' and !Request::segment(3)) active @endif" href="{{url("/admin/portfolios/")}}">All portfolios</a>
                    <a class="collapse-item @if(Request::segment(2)=='portfolios' and Request::segment(3)=='create') active @endif" href="{{url("/admin/portfolios/create")}}">Create portfolios</a>
                </div>
            </div>

        </li>

        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2)=='services') in @else collapsed @endif" href="#" data-toggle="collapse" data-target="#servicesCollapse"
               aria-expanded="true" aria-controls="servicesCollapse">
                <i class="fas fa-car-side"></i>
                <span>Services</span>
            </a>
            <div id="servicesCollapse" class="collapse @if(Request::segment(2)=='services') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Services Event:</h6>
                    <a class="collapse-item @if(Request::segment(2)=='services' and !Request::segment(3)) active @endif" href="{{url("/admin/services")}}">All Services</a>
                    <a class="collapse-item @if(Request::segment(2)=='services' and Request::segment(3)=='create') active @endif" href="{{url("/admin/services/create")}}">Create Services</a>
                </div>
            </div>

        </li>

    </ul>
