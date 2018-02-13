@extends('template.profile')

@section('title')
	My Profile
@endsection

@section('content')
  <div class="dashboard-content">
    <div class="row">
      <!-- Profile -->
      <div class="col-lg-6 col-md-12">
        <div class="dashboard-list-box margin-top-0">
          <h4 class="gray">Profile Details</h4>
          <div class="dashboard-list-box-static">
						<!-- Form -->
						<form class="" action="{{route('user.profile')}}" method="post" enctype="multipart/form-data">
							<!-- Avatar -->
							<div class="edit-profile-photo">
								<div class="text-center">
									@if (Auth::user()->img != null)
										<img src="{{asset(Auth::user()->img)}}">
									@else
										<img src="{{asset('assets/img/user.png')}}">
									@endif
								</div>
								<div class="text-center">
									<input type="file" name="img" class="button border">
								</div>
							</div>
							<!-- Details -->
							<div class="my-profile">
								<label>Your Name</label>
								<input type="hidden" value="{{Auth::user()->id_user}}" name="id">
								<input placeholder="Name" type="text" value="{{Auth::user()->name}}" name="name">
								<label>Email</label>
								<input placeholder="email@example.com" type="text" value="{{Auth::user()->email}}" name="email">
								<label><i class="fa fa-twitter"></i> Twitter</label>
								@if (Auth::user()->twitter != null)
									<input placeholder="https://www.twitter.com/" type="text" value="{{Auth::user()->twitter}}" name="twitter">
								@else
									<input placeholder="https://www.twitter.com/" type="text" name="twitter">
								@endif
								<label><i class="fa fa-facebook-square"></i> Facebook</label>
								@if (Auth::user()->facebook != null)
									<input placeholder="https://www.facebook.com/" type="text" value="{{Auth::user()->facebook}}" name="facebook">
								@else
									<input placeholder="https://www.facebook.com/" type="text" name="facebook">
								@endif
								<label><i class="fa fa-google-plus"></i> Google+</label>
								@if (Auth::user()->google != null)
									<input placeholder="https://www.google.com/" type="text" value="{{Auth::user()->google}}" name="google">
								@else
									<input placeholder="https://www.google.com/" type="text" name="google">
								@endif
							</div>
							{{csrf_field()}}
							<button type="submit" class="button margin-top-15">Save Changes</button>
						</form>
          </div>
        </div>
      </div>
      <!-- Change Password -->
      <div class="col-lg-6 col-md-12">
        <div class="dashboard-list-box margin-top-0">
          <h4 class="gray">Change Password</h4>
          <div class="dashboard-list-box-static">
						@if (count($errors)>0)
							<div class="alert alert-danger">
								@foreach ($errors->all() as $error)
									<p>{{$error}}</p>
								@endforeach
							</div>
						@endif
						<!-- Form -->
						<form class="" action="#" method="post">
							<!-- Change Password -->
							<div class="my-profile">
								<input type="hidden" value="{{Auth::user()->id_user}}" name="id">
								<label class="margin-top-0">Current Password</label>
								<input type="password" name="password">
								<label>New Password</label>
								<input type="password" name="password1">
								<label>Confirm New Password</label>
								<input type="password" name="password2">
								<button type="submit" class="button margin-top-15">Change Password</button>
							</div>
						</form>
          </div>
        </div>
      </div>
			@include('template.footer')
    </div>
  </div>
@endsection
