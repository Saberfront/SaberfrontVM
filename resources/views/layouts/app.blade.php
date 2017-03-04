@php
use App\CustomLoadout;
use App\User;
use Carbon\Carbon;
if (Auth::user()){
$notification_feed = FeedManager::getNotificationFeed(Auth::user()->id);

$nfeed = $notification_feed->getActivities(0,25)['results'];
}
function getContent($act){
  switch($act->type){
  case "loadout":
  return $act->display_name;
  break;
  case "comment":
  return $act->content;
  break;
  }
}
function getTimeFromActType($actType,$act){
  switch($actType){
    case "loadout":
      return CustomLoadout::find((int)substr($act->object,strpos($act->object,":")+1))->created_at;
      break;
  }
}
@endphp
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

                <script src="{{ asset('js/jquery.toolbar.js') }}"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/skins/_all-skins.css') }}" rel="stylesheet">
        <script src="{{ asset('js/chartjs-plugin-annotations.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
<script src="//js.pusher.com/3.0/pusher.min.js"></script>

<!-- Downloaded in step 1 -->
<script src="{{asset('js/PusherChatWidget.js')}}"></script>
<link href="{{asset('js/pusher-chat-widget.css')}}" rel="stylesheet" />
         <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js"></script>
<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
   <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
   

    <script src="{{ asset('plugins/ckeditor/adapters/jquery.js') }}"></script>

      <script src="{{ asset('plugins/ckeditor/config.js') }}"></script>


            <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet">
             <link href="{{ asset('css/alt/AdminLTE-select2.min.css') }}" rel="stylesheet">
            <link href="{{ asset('js/jquery.toolbar.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        // Global jQuery jobs
$(function(){

   $(".weaponSelector").select2({
     placeholder: "Select your weapon of choice",
     allowClear: true,
     minimumResultsForSearch: 2
   });
   @if (Auth::user() != null)
   @if (Request::is('users/' . Auth::user()->id ))
    tinymce.init({ selector:'#inputBlurb' ,
      plugins: "autosave save spellchecker contextmenu charmap",
          toolbar: 'save | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | forecolor backcolor emoticons | charmap spellchecker',
            contextmenu: "spellchecker",
  contextmenu_never_use_native: true,

 browser_spellcheck: true,
   contextmenu: true,

      menubar: true,  // removes the menubar
 spellchecker_callback: function(method, text, success, failure) {
    var words = text.match(this.getWordCharPattern());
    if (method == "spellcheck") {
      var suggestions = {};
      for (var i = 0; i < words.length; i++) {
        suggestions[words[i]] = ["Hello", "World"];
      }
      success(suggestions);
    }
  }
});
   @endif
   @endif
   @if(Request::is('loadouts/delete/*'))
     $(".deleteLoadout").modal();
   
   @endif
});

    </script>
    @yield('css')
</head>
@if (Auth::guest())
<body class="hold-transition login-page">
@else
<body class="hold-transition skin-red sidebar-mini ">
@endif
    <div class='wrapper' id="app">
    @if (Auth::guest())

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
 <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">{{(!empty($nfeed)) ? count(json_decode(json_encode($nfeed[0]))->activities) : 0}}</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have {{(!empty($nfeed)) ? count(json_decode(json_encode($nfeed[0]))->activities) : 0}} notifications</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
@php 
$note_literal = (!empty($nfeed)) ? json_decode(json_encode($nfeed[0])) : array();
@endphp
@if (count($note_literal) > 0)
@foreach ($note_literal->activities as $act)

                <li>
                  <a href="#">
                    <i class="ion ion-ios-people info"></i> 
                    {{ User::getNotificationNoun((int) substr($act->actor,strpos($act->actor,":")+1)) . " " . strtolower($act->verb) . " " . getContent($act) . " " . Carbon::parse(getTimeFromActType($act->type,$act))->diffForHumans()}}
                  </a>
                </li>
                @endforeach
                @endif
              </ul>
            </li>
           
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li>
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
                <a href="{{ url('/users/' . Auth::user()->id)}}" class="btn btn-default btn-flat">Profile</a>
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
                             <li><a  data-toggle="control-sidebar"><i class="fa fa-cogs"></i></a></li>
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
        <input type="text" name="q" class="form-control" placeholder="Search Users...">
        <span class="input-group-btn">
          <button type="submit"  id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form><!-- /.sidebar-form -->
    <form action="{{ url('/loadouts/search')}}" method="get" class="sidebar-form">
                     
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search Loadouts...">
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
            <li><a href="{{ url('developer/dash') }}"><i class="fa fa-code"></i><span>Developer Dashboard</span></a></li>

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
<!-- The Right Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
        @php 
$note_literal = (!empty($nfeed)) ? json_decode(json_encode($nfeed[0])) : array();
@endphp
@if (count($note_literal) > 0)
@foreach ($note_literal->activities as $act)
      @if($act->type == "loadout")
          <li>

            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-crosshairs bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">{{ $act->verb . " " .$act->display_name}}</h4>

                <p>Contains a {{CustomLoadout::find(substr($act->object,strpos($act->object,':')+1))->weapon_name}} and a {{CustomLoadout::find(substr($act->object,strpos($act->object,':')+1))->secondary_name}}</p>
              </div>
            </a>
          </li>
          @elseif ($act->type == "comment")
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-comment-o bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">{{ User::getNotificationNoun((int) substr($act->actor,strpos($act->actor,":")+1)) . " " . strtolower($act->verb) . " on your content. " . Carbon::parse(getTimeFromActType($act->type,$act))->diffForHumans()}}</h4>

                <p>{{$act->content}}</p>
              </div>
            </a>
          </li>
          
          
          @endif
          @endforeach
          @endif
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
<!-- The sidebar's background -->
<!-- This div must placed right after the sidebar for it to work-->
<div class="control-sidebar-bg"></div>
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
@yield('js')
</body>
</html>
