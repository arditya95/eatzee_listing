<header id="header-container">
  <!-- Header -->
  <div id="header">
    <div class="container">
      <!-- Left Side Content -->
      <div class="left-side">
        <!-- Logo -->
        <div id="logo">
          <a href="{{ route('index') }}"><img src="{{ asset('assets/img/logo.png')}}" alt=""></a>
        </div>
      </div>
      <!-- Left Side Content / End -->
      <!-- Right Side Content / End -->
      <div class="right-side">
        <div class="header-widget">
          <!-- User Menu -->
          @if (Auth::check())
            <div class="user-menu">
              <div class="user-name"><span><img src="#" alt=""></span>Doni Agustina</div>
              <ul>
                <li><a href="#"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                <li><a href="#"><i class="sl sl-icon-envelope-open"></i> Messages</a></li>
                <li><a href="#"><i class="sl sl-icon-user"></i> My Profile</a></li>
                <li><a href="{{route('user.logout')}}"><i class="sl sl-icon-power"></i> Logout</a></li>
              </ul>
            </div>
          @else
            <a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Sign In</a>
          @endif
          <a href="#" class="button border with-icon">Add Listing <i class="sl sl-icon-plus"></i></a>
        </div>
      </div>
      <!-- Right Side Content / End -->
      <!-- Sign In Popup -->
      <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
        <div class="small-dialog-header">
          <h3>Sign In</h3>
        </div>
        <!--Tabs -->
        <div class="sign-in-form style-1">
          <ul class="tabs-nav">
            <li class=""><a href="#tab1">Log In</a></li>
            <li><a href="#tab2">Register</a></li>
          </ul>
          <div class="tabs-container alt">
            <!-- Login -->
            <div class="tab-content" id="tab1" style="display: none;">
              <form method="post" action="{{ route('user.signin') }}" class="login">
                <p class="form-row form-row-wide">
                  <label for="username">Username:
                    <i class="im im-icon-Male"></i>
                    <input type="text" class="input-text" name="username" id="username" value="" />
                  </label>
                </p>
                <p class="form-row form-row-wide">
                  <label for="password">Password:
                    <i class="im im-icon-Lock-2"></i>
                    <input class="input-text" type="password" name="password" id="password"/>
                  </label>
                  {{-- <span class="lost_password">
                    <a href="#" >Lost Your Password?</a>
                  </span> --}}
                </p>
                <div class="form-row">
                  {{csrf_field()}}
                  <input type="submit" class="button border margin-top-5" name="login" value="Login" />
                  {{-- <div class="checkboxes margin-top-10">
                    <input id="remember-me" type="checkbox" name="check">
                    <label for="remember-me">Remember Me</label>
                  </div> --}}
                </div>
              </form>
            </div>
            <!-- Register -->
            <div class="tab-content" id="tab2" style="display: none;">
              <form method="post" action="{{ route('user.signup') }}" class="register">
                <p class="form-row form-row-wide">
                  <label for="name">Name:
                    <i class="im im-icon-Male"></i>
                    <input type="text" class="input-text" name="name" id="name" value="" />
                  </label>
                </p>
                <p class="form-row form-row-wide">
                  <label for="username">Username:
                    <i class="im im-icon-Male"></i>
                    <input type="text" class="input-text" name="username" id="username" value="" />
                  </label>
                </p>
                <p class="form-row form-row-wide">
                  <label for="email">Email Address:
                    <i class="im im-icon-Mail"></i>
                    <input type="email" class="input-text" name="email" id="email" value="" />
                  </label>
                </p>
                <p class="form-row form-row-wide">
                  <label for="password">Password:
                    <i class="im im-icon-Lock-2"></i>
                    <input class="input-text" type="password" name="password" id="password"/>
                  </label>
                </p>
                {{-- <p class="form-row form-row-wide">
                  <label for="password2">Repeat Password:
                    <i class="im im-icon-Lock-2"></i>
                    <input class="input-text" type="password" name="password2" id="password2"/>
                  </label>
                </p> --}}
                {{csrf_field()}}
                <input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Sign In Popup / End -->
    </div>
  </div>
<!-- Header / End -->
</header>
