<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="{{ url('/') }}">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo"><img src="{{ asset('assets/static/images/logo.png') }}" alt=""></div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">JMCommunity</h5></div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item ml-2 mt-3">
                <small>PERSONAL AREA</small>
            </li>
            <li class="nav-item actived">
                <a class="sidebar-link" href="{{ url('dashboard') }}">
                    <span class="icon-holder"><i class="c-blue-500 ti-home"></i> </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item actived">
                <a class="sidebar-link" href="{{ url('profile') }}">
                    <span class="icon-holder"><i class="c-orange-300 ti-user"></i> </span>
                    <span class="title">Profile</span>
                </a>
            </li>
            <li class="nav-item actived">
                <a class="sidebar-link" href="{{ url('bonus') }}">
                    <span class="icon-holder"><i class="c-red-500 ti-pulse"></i> </span>
                    <span class="title">Bonus</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="c-brown-500 ti-layout-list-thumb"></i> </span>
                    <span class="title">Referrals</span> <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ url('myreferrals') }}">My Referrals</a></li>
                    <li><a class="sidebar-link" href="{{ url('pending_activation') }}">Pending Activation</a></li>
                </ul>
            </li>
            {{-- <?= dd();?> --}}
            @if(Auth::user()->role()->where('nm_role', 'Admin')->exists())
            <hr>
            <li class="nav-item ml-2">
                <small>ADMIN AREA</small>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="{{ url('all_member') }}">
                    <span class="icon-holder"><i class="c-green-500 ti-user"></i> </span>
                    <span class="title">All Member</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="{{ url('reward') }}">
                    <span class="icon-holder"><i class="c-red-500 ti-medall"></i> </span>
                    <span class="title">Reward</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="{{ url('pending') }}">
                    <span class="icon-holder"><i class="c-indigo-500 ti-timer"></i> </span>
                    <span class="title">Pending</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="c-orange-500 ti-desktop"></i> </span>
                    <span class="title">Management User</span> <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ url('reset_password') }}">Reset Password</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ url('user_admin') }}">User/Admin</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ url('log_user') }}">Log User</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="c-cyan-500 ti-harddrives"></i> </span>
                    <span class="title">Master Data</span> <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ url('masterbank') }}">Data Bank</a></li>
                </ul>
                @if(Auth::id()==1)
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ url('masterjoin') }}">Data Join</a></li>
                </ul>
                @endif
            </li>
            @endif
            <hr>
            <li class="nav-item">
                <a class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form-side').submit();">
                    <span class="icon-holder"><i class="c-pink-500 ti-power-off"></i> </span>
                    <span class="title">Logout</span>
                </a>
                <form id="logout-form-side" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            {{-- <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-teal-500 ti-view-list-alt"></i> </span><span class="title">Multiple Levels</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown"><a href="javascript:void(0);"><span>Menu Item</span></a></li>
                    <li class="nav-item dropdown"><a href="javascript:void(0);"><span>Menu Item</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0);">Menu Item</a></li>
                            <li><a href="javascript:void(0);">Menu Item</a></li>
                        </ul>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>