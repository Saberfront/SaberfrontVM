
<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Saberfront DB2') }}</title>

    <!-- Styles -->
                <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/skins/_all-skins.css') }}" rel="stylesheet">
        <script src="{{ asset('js/chartjs-plugin-annotations.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
 

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        
    </script>
</head>
@if (Auth::guest())
<body class="hold-transition login-page">
@else
<body class="hold-transition skin-red sidebar-mini ">
@endif
    <div class='wrapper' id="app">
    @if (Auth::guest())
        You are not authorized
    @else
    <header class="main-header">
       <a href="{{ url('/') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>DB2</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Saberfront</b>DB2</span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">

                    <!-- Collapsed Hamburger -->
                   <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

                

                    <!-- Left Side Of Navbar -->
                    
    <div class="navbar-custom-menu">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                         <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">{{ Auth::user()->newMessages() }}</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have {{ Auth::user()->newMessages() }} {{ (Auth::user()->newMessages() == 1) ? 'message' : 'messages' }}</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
              @foreach(Auth::user()->newMessagesLiteral() as $msg)
                <li><!-- start message -->
                  <a href="#">
                    <div class="pull-left">
                      <img src="{{ ($msg->owner()->robloxUserId != null) ? 'https://www.roblox.com/headshot-thumbnail/image?userId='.$msg->owner()->robloxUserId.'&width=420&height=420&format=png' : 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $msg->owner()->email ) ) ) . '?d=' . urlencode( 'mm' ) . '&s=' . 80 }}" class="img-circle" >
                    </div>
                    <h4>
                      {{ $msg->owner()->name}}
                      <small><i class="fa fa-clock-o"></i>{{ $msg->created_at->diffForHumans() }}</small>
                    </h4>
                    <p>{{ substr($msg->body,0,20) . '...' }}</p>
                  </a>
                </li><!-- end message -->
                @endforeach
              </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
          </ul>
        </li>
                             <li class="dropdown user user-menu">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                           <img src="{{ (Auth::user()->robloxUserId != null) ? 'https://www.roblox.com/headshot-thumbnail/image?userId='.Auth::user()->robloxUserId.'&width=420&height=420&format=png' : 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( Auth::user()->email ) ) ) . '?d=' . urlencode( 'mm' ) . '&s=' . 80 }}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{ Auth::user()->name }}</span>
          </a>
                                

                                <ul class="dropdown-menu">
                                <li class="user-header">
              <img src="{{ (Auth::user()->robloxUserId != null) ? 'https://www.roblox.com/headshot-thumbnail/image?userId='.Auth::user()->robloxUserId.'&width=420&height=420&format=png' : 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( Auth::user()->email ) ) ) . '?d=' . urlencode( 'mm' ) . '&s=' . 80 }}" class="img-circle" alt="User Image">
              <p>
                {{Auth::user()->name}} - {{ (Auth::user()->isAdmin()) ? 'Data Admin' : 'Player/Member' }}
                <small>Member since {{date('M Y', strtotime(Auth::user()->created_at))}}</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Sales</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
              </div>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                 <a href="{{ route('logout') }}" class='btn btn-default btn-flat'
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
              </div>
            </li>

                                   
                                </ul>
                            </li>
                        @endif
                    </ul>
            </div>
        </nav>
        </header>
        <div class="main-sidebar">
  <!-- Inner sidebar -->
  <div class="sidebar">
    <!-- user panel (Optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ (Auth::user()->robloxUserId != null) ? 'https://www.roblox.com/headshot-thumbnail/image?userId='.Auth::user()->robloxUserId.'&width=420&height=420&format=png' : 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( Auth::user()->email ) ) ) . '?d=' . urlencode( 'mm' ) . '&s=' . 80 }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>

        <a href="#"><i class="fa fa-circle text-success"></i>{{ Auth::user()->active ? "Online - Active" : "Online - Inactive"}}</a>
      </div>
    </div><!-- /.user-panel -->

    <!-- Search Form (Optional) -->
    <form action="{{ url('/users/search')}}" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit"  id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form><!-- /.sidebar-form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      
      <li><a href="#"><span>Another Link</span></a></li>
      @if (Auth::user()->isAdmin())
      <li class="treeview">
        <a href="#"><i class="fa fa-lock" aria-hidden="true"></i><span>Admin Interfaces</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
      <li class="active"><a href="{{ url('/regimentAttributes') }}"><i class="fa fa-star-o"></i><span>All Regiment Attributes</span></a><</li>
      <li><a href="{{ url('/inventories') }}"><i class="ion ion-ios-pricetag-outline"></i><span>Secondary Inventories</span></a></li>
            <li><a href="developer/dash"><i class="fa fa-code"></i><span>Developer Dashboard</span></a></li>

        </ul>
      </li>
      @endif
       <li class="treeview">
        <a href="#"><i class="fa fa-unlock-alt" aria-hidden="true"></i><span>User Interfaces</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
      <li class="active"><a href="{{ url('/regimentAttributes') }}"><i class="fa fa-star-o"></i><span>My Regiment's Attributes.</span></a><</li>
      <li><a href="{{ url('/inventory/' . Auth::user()->tankInventoryId) }}"><i class="ion ion-ios-pricetag-outline"></i><span>Secondary Inventories</span></a></li>
        </ul>
      </li>
    </ul><!-- /.sidebar-menu -->

  </div><!-- /.sidebar -->
</div>

    @endif
        

        @yield('content')
         @if (!Auth::guest())
        <footer class="main-footer">
  <div class="pull-right hidden-xs">
          <b>Version</b> 1.0a
        </div>
        <strong>Copyright &copy; 2017 Saberfront Studios.</strong> All rights reserved.
</footer>

    </div>
    @endif

    <!-- Scripts -->
   <script src="{{ asset('js/bootstrap.js') }}"></script>
      <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
            <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/app-jq.js') }}"></script>
                <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/app.min.js') }}"></script>

</body>
</html>
