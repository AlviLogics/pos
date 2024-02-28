        <nav class="navbar fixed-top" style="background: url({{ asset('img/cards/nav-background.jpg')}}) no-repeat center center/cover;">
    
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg style="fill: color:#ffffff"; class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg style="fill: color:#ffffff"; class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>

            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg style="fill: color:#ffffff"; xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>

            <div class="search" data-search-path="Pages.Search.html?q=">
                <input placeholder="Search...">
                <span class="search-icon">
                    <i class="simple-icon-magnifier"></i>
                </span>
            </div>
        </div>

        <a class="navbar-logo" href="{{ route('dashboard') }}">
            @if(@Session::get('logo'))
            <span class="logo-user d-none d-xs-block" style="background:url(../img/brands/{{Session::get('logo')}}) no-repeat;"></span>
            @else
            <span class="logo d-none d-xs-block" style="background:url(../logos/black.svg) no-repeat;"></span>
            @endif
            <span class="logo-mobile d-block d-xs-none"></span>
        </a>

        <div class="navbar-right">
            <div class="header-icons d-inline-block align-middle">
                
                <div class="position-relative d-none d-sm-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="iconMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-grid text-white" id="counter" style="color:#ffffff !important"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3  position-absolute" id="iconMenuDropdown">
                        <a href="{{ route('dashboard') }}" class="icon-menu-item" style="color:#ffffff !important">
                            <i class="iconsminds-dashboard d-block"></i>
                            <span>Dashboard</span>
                        </a>

                        @can('User access')
                            <a href="{{ route('users.index') }}" class="icon-menu-item" style="color:#ffffff !important">
                                <i class="iconsminds-male-female d-block"></i>
                                <span>Users</span>
                            </a>
                        @endcan


                        <a href="{{ route('products.index') }}" class="icon-menu-item" style="color:#ffffff !important">
                            <i class="iconsminds-puzzle d-block"></i>
                            <span>Branches</span>
                        </a>

                        <a href="{{route('packings.index')}}" class="icon-menu-item" style="color:#ffffff !important">
                            <i class="iconsminds-bar-chart-4 d-block"></i>
                            <span>Incidents</span>
                        </a>

                        <a href="{{route('vendors.index')}}" class="icon-menu-item" style="color:#ffffff !important">
                            <i class="iconsminds-file d-block"></i>
                            <span>Surveys</span>
                        </a>


                    </div>
                </div>

                <div class="position-relative d-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="notificationButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-bell text-white" style="color:#ffffff !important"></i>
                        <span class="count text-white border-light" id="notificationcount" style="color:#ffffff !important">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                        <div class="scroll">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="{{ asset('img/profiles/l-2.jpg')}}" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                                </a>
                                <div class="pl-3">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1">Joisse Kaycee just sent a new comment!</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            @php
           
            @endphp
            <div class="user d-inline-block">
                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="name text-white" style="color:#ffffff !important">Hi {{ Auth::guard('web')->user()->name}}</span>
                        
                        @foreach(auth()->guard('web')->user()->roles as $role)
                        {{ @$role->name }}
                        @endforeach
                    <span>
                        <img alt="Profile Picture" src="{{ asset('img/profiles/')}}/{{Auth::guard('web')->user()->id}}-{{Auth::guard('web')->user()->id}}.png" />
                    </span>
                </button>
 
                <div class="dropdown-menu dropdown-menu-right mt-3">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Account</a>
                    <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <a class="dropdown-item" href="route('admin.logout')"onclick="event.preventDefault();
                    this.closest('form').submit();">Sign out</a>
                    </form>
                    </div>
            </div>
        </div>
    </nav>