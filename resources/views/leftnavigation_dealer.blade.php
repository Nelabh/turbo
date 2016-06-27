<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                </span>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->customer_code}}</strong>
                    </span> <span class="text-muted text-xs block"></span> </span> </a>
                    
                </div>
                <div class="logo-element">
                    TURBO                </div>
                </li>   @if(Request::path() == 'dashboard')

            <li class="active">
                <a href="{{URL::route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            @else

            <li >
                <a href="{{URL::route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            @endif
            
                @if(Request::path() == 'devices')
            <li class = "active" >
                <a href="{{URL::route('devices')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Devices</span></a>
            </li>
            @else
            <li >
                <a href="{{URL::route('devices')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Devices</span></a>
            </li>
            @endif
                @if(Request::path() == 'offers')
            <li class = "active" >
                <a href="{{URL::route('offers')}}"><i class="fa fa-gift"></i> <span class="nav-label">Offers</span></a>
            </li>
            @else
            <li >
                <a href="{{URL::route('offers')}}"><i class="fa fa-gift"></i> <span class="nav-label">Offers</span></a>
            </li>
            @endif
            </ul>

        </div>
    </nav>
