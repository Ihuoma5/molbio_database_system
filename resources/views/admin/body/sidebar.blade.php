 <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="{{ route('dashboard') }}" class="waves-effect">
                                    <i class="ri-dashboard-line"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-database-line"></i>
                    <span>Machine Page</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('machine.all') }}">All Machines</a></li>
                    <li><a href="{{ route('machine.add') }}">Add Machine</a></li>
                </ul>
            </li>
            <li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
    <i class="ri-account-box-line"></i>
        <span>Engineer Page</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('engineers.all') }}">All Engineers</a></li>
        <li><a href="{{ route('engineers.add') }}">Add Engineer</a></li>
    </ul>
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
    <i class="ri-booklet-line"></i>
        <span>Report Page</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('reports.all') }}">All  Report</a></li>
        <li><a href="{{ route('reports.add') }}">Add Report</a></li>
    </ul>
</li>




                           

                            
                         

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>