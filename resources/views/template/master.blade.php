<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
  <!-- CSS Global-->
  <link href="{{ URL::to('assets/css/style4963.css?ver=1.1') }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::to('assets/css/colors/main.css') }}" id="colors" rel="stylesheet" type="text/css">
	<!-- /CSS Global-->
	<!-- JS Global-->
	<script type="text/javascript" src="{{ URL::to('js/vue.js')}}"></script>
	<script type="text/javascript" src="{{ URL::to('js/axios.js')}}"></script>
	<script type="text/javascript" src="{{ URL::to('assets/scripts/jquery-2.2.0.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::to('assets/scripts/jquery-ui.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::to('assets/scripts/jpanelmenu.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::to('assets/scripts/chosen.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::to('assets/scripts/slick.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::to('assets/scripts/rangeslider.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::to('assets/scripts/magnific-popup.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::to('assets/scripts/waypoints.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::to('assets/scripts/counterup.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::to('assets/scripts/tooltips.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::to('assets/scripts/custom.js') }}"></script>
  <!-- /JS Global-->
	@yield('styles')
</head>

<body class="sidebar-xs">
  @include('template.master-navbar')
  <!-- Page container -->
  <div class="page-container">
    <!-- Page content -->
    <div class="page-content">
      {{-- @include('template.master-sidebar') --}}
      <!-- Main content -->
      <div class="content-wrapper">
        @yield('content')
      </div>
      <!-- /main content -->
    </div>
    <!-- /page content -->
  </div>
  <!-- /page container -->
  <!-- JS Global-->

  <!-- JS Global-->
  @yield('scripts')
</body>
</html>
