<div class="header"> <!-- Header start -->
    <div class="header-left" style="background-color: #002c82;">
        <a href="{{route('dashboard')}}" class="logo">
            <img src="@if(isset(Auth::user()->userSetting->logo)){{asset('newSchool/logo/'.Auth::user()->userSetting->logo)}}@else{{asset('assets/img/logo.png')}}@endif" width="100%" height="40" alt="">
        </a>
    </div>
    <div class="page-title-box float-left">
      <h3 class="text-uppercase">Preschool</h3>
  </div>
  <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
  <ul class="nav user-menu float-right">
    <li class="nav-item dropdown d-none d-sm-block">
        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell"></i> <span class="badge badge-pill bg-primary float-right">3</span></a>
        <div class="dropdown-menu notifications">
            <div class="topnav-dropdown-header">
                <span>Notifications</span>
            </div>
            <div class="drop-scroll">
                <ul class="notification-list">
                    <li class="notification-message">
                        <a href="activities.html">
                            <div class="media">
                                <span class="avatar">
                                    <img alt="John Doe" src="assets/img/user.jpg" class="img-fluid rounded-circle">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">John Doe</span> is now following you </p>
                                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="activities.html">
                            <div class="media">
                                <span class="avatar">T</span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> sent you a message.</p>
                                    <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="activities.html">
                            <div class="media">
                                <span class="avatar">L</span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Misty Tison</span> like your photo.</p>
                                    <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="activities.html">
                            <div class="media">
                                <span class="avatar">G</span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Rolland Webber</span> booking appoinment for meeting.</p>
                                    <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="activities.html">
                            <div class="media">
                                <span class="avatar">T</span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> like your photo.</p>
                                    <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="topnav-dropdown-footer">
                <a href="activities.html">View all Notifications</a>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown d-none d-sm-block">
        <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment"></i> <span class="badge badge-pill bg-primary float-right">8</span></a>
    </li>
    <li class="nav-item dropdown has-arrow">
        <a href="javascript:;" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
           
            <span class="user-img"><img class="rounded-circle" src="@if(Auth::user()->images){{asset('images/staff/'.Auth::user()->images)}} @else assets/img/user.jpg @endif" width="40" alt="{{Auth::user()->name}}">
                <span class="status online"></span></span>
                <span>{{Auth::user()->name}}</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('admin.profile')}}">My Profile</a>
               <!--  <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                <a class="dropdown-item" href="settings.html">Settings</a> -->
                <a class="dropdown-item" href="javascript:;"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    <div class="dropdown mobile-user-menu float-right"> <!-- mobile menu -->
        <a href="javascript:;" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{route('admin.profile')}}">My Profile</a>
            <!-- <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
            <a class="dropdown-item" href="settings.html">Settings</a> -->
            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
        </div>
    </div>
</div>