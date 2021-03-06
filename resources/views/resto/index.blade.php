@extends('template.master')

@section('title')
	Resto Page
@endsection

@section('content')
  <div class="listing-slider mfp-gallery-container margin-bottom-0">
    <a href="images/single-listing-01.jpg" data-background-image="images/single-listing-01.jpg" class="item mfp-gallery" title="Title 1"></a>
    <a href="images/single-listing-02.jpg" data-background-image="images/single-listing-02.jpg" class="item mfp-gallery" title="Title 3"></a>
    <a href="images/single-listing-03.jpg" data-background-image="images/single-listing-03.jpg" class="item mfp-gallery" title="Title 2"></a>
    <a href="images/single-listing-04.jpg" data-background-image="images/single-listing-04.jpg" class="item mfp-gallery" title="Title 4"></a>
  </div>

  <div class="container">
    <div class="row sticky-wrapper">
      <div class="col-lg-9 col-md-9 padding-right-30">
        <!-- Titlebar -->
        <div id="titlebar" class="listing-titlebar">
          <div class="listing-titlebar-title">
            <h2>{{$response_resto->resto_name}}</h2>
						<br>
						<div class="row">
							@if ($response_resto->category != null)
								<span class="listing-tag" > {{$response_resto->category[0]->category_resto}} </span>
							@endif

							@if ($response_resto->status_delivery ==  true && $response_resto->status_delivery_only == false)
								<a href="#"><span class="listing-online"><i class="sl sl-icon-check"></i> Online Order</span></a>
							@endif

							@if ($response_resto->status_reservation ==  true && $response_resto->status_delivery_only == false)
								<a href="#"><span class="listing-online"><i class="sl sl-icon-check"></i> Reservation</span></a>
							@endif

							@if ($response_resto->status_delivery_only == true)
								<span class="listing-catering"><i class="sl sl-icon-check"></i> Delivery Only</span>
							@endif
						</div>
            <span>
              <a href="#listing-location" class="listing-address">
                <i class="fa fa-map-marker"></i>
                {{$response_resto->info[0]->address_in_map}}
              </a>
            </span>
						<div class="star-rating" data-rating="5">
							<div class="rating-counter"><a href="#listing-reviews">(31 reviews)</a></div>
						</div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="style-2">
            <!-- Tabs Navigation -->
            <ul class="tabs-nav">
              <li class="active"><a href="#overview"><i class="sl sl-icon-eye"></i> Overview</a></li>
              <li class=""><a href="#menus"><i class="sl sl-icon-notebook"></i> Menus</a></li>
              <li class=""><a href="#feeds"><i class="sl sl-icon-feed"></i> Promo</a></li>
              <li class=""><a href="#photos"><i class="sl sl-icon-picture"></i> Photos (10)</a></li>
              <li class=""><a href="#review"><i class="sl sl-icon-speech"></i> Review</a></li>
            </ul>
            <!-- Tabs Content -->
            <div class="tabs-container">
              <div class="tab-content" id="overview" style="display: inline-block;">
                <!-- Description -->
								<h3 class="listing-desc-headline margin-top-20 margin-bottom-20">Resto Description</h3>
								{!!$response_resto->description!!}

                <!-- Amenities -->
								{{-- @if ($response_resto->resto_facility != null)
									<h3 class="listing-desc-headline">Resto Facilities</h3>
									<ul class="listing-features checkboxes margin-top-0">
										@foreach ($response_resto->resto_facility as $facility)
											@if ($facility != null)
												<li>{{$facility->facilities}}</li>
											@endif
										@endforeach
									</ul>
								@endif --}}
                <hr>
                <mark class=""><b>Discover Tag:</b>
									{{-- @foreach ($response_resto as $discover) --}}
										@if ($response_resto->discover != null)
											<i>{{$response_resto->discover}}</i>
										@else
											<i>Discover belum tersedia</i>
										@endif
									{{-- @endforeach --}}
								</mark>
                <br>
                <mark class=""><b>Meal Avaibility:</b>
									{{-- @foreach ($response_resto as $discover) --}}
										@if ($response_resto->type != null)
											<i>{{$response_resto->type}}</i>
										@else
											<i>Meal belum tersedia</i>
										@endif
									{{-- @endforeach --}}
								</mark>
                <hr>
                <!-- Location -->
                <h3 class="listing-desc-headline">Get Direction</h3>
								<iframe src="https://maps.google.com/maps?q={{$response_resto->info[0]->latitude}},{{$response_resto->info[0]->longitude}}&hl=es;z=14&amp;output=embed" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>

              <div class="tab-content" id="menus" style="display: none;">
                <!-- Food Menu -->
                <!-- Sorting - Filtering Section -->
                <div class="row margin-bottom-5 margin-top-10">
                  <div class="col-md-6">
                    <input type="text" placeholder="Search for food or drink..." value="">
                  </div>
                  <div class="col-md-6">
                    <div class="fullwidth-filters">
                      <!-- Sort by -->
                      <div class="sort-by">
                        <div class="sort-by-select">
                          <select class="chosen-select-no-single">
                            <option>Default Order</option>
                            <option>Highest Rated</option>
                            <option>Most Reviewed</option>
                            <option>Newest Listings</option>
                            <option>Oldest Listings</option>
                          </select>
                        </div>
                      </div>
                      <!-- Sort by / End -->
                    </div>
                  </div>
                </div>
                <!-- Sorting - Filtering Section / End -->
                <div class="show-more">
                  <div class="pricing-list-container">
                    <hr>
										@foreach (array_chunk($response_product, 3) as $productChunk)
										<div class="row">
											@foreach ($productChunk as $product)
												<div class="col-md-4">
													<div class="gallery-menu">
														@if ($product->image != null)
															<a target="_blank" href="{{ asset($product->image) }}">
																<img src="{{ 'https://eatzee-resto.herokuapp.com' . $product->image }}" alt="image" width="600" height="400">
															</a>
														@else
															<a target="_blank" href="{{ asset('icon/no_image.png') }}">
																<img src="{{ asset('icon/no_image.png') }}" alt="image" width="600" height="400">

																{{-- <img src="{{ 'https://eatzee-resto.herokuapp.com' . 'icon/no_image.png' }}" alt="image" width="600" height="400"> --}}
															</a>
														@endif
														<div class="desc">
															<h5>{{$product->name}}</h5>
															{{$product->description}}
														</div>
														<div class="price">{{$product->price}}</div>
													</div>
												</div>
											@endforeach
										</div>
										@endforeach
                  </div>
                </div>
                <a href="#" class="show-more-button" data-more-title="Show More" data-less-title="Show Less"><i class="fa fa-angle-down"></i></a>
                <!-- Food Menu / End -->
              </div>

              <div class="tab-content" id="feeds" style="display: none;">
                <h2>Read our new feeds</h2>
                <p>Find an information and promotion post.</p>
                <div class="widget margin-top-20">
                  <ul class="widget-tabs">
                    <!-- Post -->
										@foreach ($response_feed as $feed)
											<li>
												<div class="widget-content">
													<div class="widget-thumb">
														<a href="pages-blog-post.html"><img src="#"></a>
													</div>
													<div class="widget-text">
														<h5><a href="#">{{$feed->promotion_name}}</a></h5>
														<mark><b>Category :</b>
															@if ($feed->category == 'E')
																<i>{{'Event'}}</i>
															@elseif ($feed->category == 'P')
																<i>{{'Promotion'}}</i>
															@else
																<i>{{'News'}}</i>
															@endif
														</mark>
														<span>{{$feed->created_at}}</span>
													</div>
													<div class="clearfix"></div>
												</div>
											</li>
										@endforeach
                  </ul>
                </div>

                <!-- Pagination -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12">
                    <!-- Pagination -->
                    <div class="pagination-container margin-top-20 margin-bottom-40">
                      <nav class="pagination">
                        <ul>
                          <li><a href="#" class="current-page">1</a></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
                <!-- Pagination / End -->
              </div>
              <div class="tab-content" id="photos" style="display: none;">
                <h3 class="listing-desc-headline margin-top-20 margin-bottom-20">Gallery</h3>
                <div class="review-images mfp-gallery-container">
                  <a href="images/review-image-02.jpg" class="mfp-gallery"><img src="images/review-image-02.jpg" alt=""></a>
                  <a href="images/review-image-03.jpg" class="mfp-gallery"><img src="images/review-image-03.jpg" alt=""></a>
                </div>
              </div>
              <div class="tab-content" id="review" style="display: none;">
                <h3 class="listing-desc-headline margin-top-30 margin-bottom-20">Reviews</h3>
                <div class="clearfix"></div>
                <!-- Reviews -->
								<div id="disqus_thread"></div>
								<script>
									(function() {var d = document, s = d.createElement('script');
									s.src = 'https://bakso.disqus.com/embed.js';
									s.setAttribute('data-timestamp', +new Date());
									(d.head || d.body).appendChild(s);})();
								</script>
								<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
								<div class="clearfix"></div>
								<!-- / End -->
							</div>
							<br>
						</div>
					</div>
				</div>
			</div>
			<!-- Sidebar-->
			<div class="col-lg-3 col-md-3 margin-top-75 sticky">
				<!-- Share / Like -->
				@if (Auth::check())
					<div id="bookmark" class="listing-share margin-top-80 margin-bottom-30 no-border">
						<div v-if="bookmark == 'true' || bookmark == 1">
							<button v-on:click="bookmarkClik" class="like-button liked"><span class="like-icon liked"></span> Bookmark This Listing</button>
						</div>
						<div v-else>
							<button v-on:click="bookmarkClik" class="like-button"><span class="like-icon"></span> Bookmark This Listing</button>
						</div>
						<a href="#" class="button medium border"><i class="sl sl-icon-pin"></i>Check in</a>
						<span>159 people check in here</span>
						<hr>
						<div class="clearfix"></div>
					</div>
				@endif
				<!-- Book Now -->
				@if ($response_resto->status_reservation ==  true && $response_resto->status_delivery_only == false)
					<div class="boxed-widget" id="booking">
						<h3><i class="fa fa-calendar-check-o "></i> Book a Table</h3>
						{{-- <div class="row with-forms  margin-top-0">
							<div class="col-md-12">
								<input type="text" id="booking-date" data-lang="en" data-large-mode="true" data-min-year="2018" data-max-year="2050">
							</div>
						</div>
						<div class="row with-forms  margin-top-0">
							<div class="col-md-12">
								<input type="text" id="booking-time" value="9:00 am">
							</div>
						</div> --}}
						<button href="#booking-dialog" class="progress-button button fullwidth margin-top-5 sign-in popup-with-zoom-anim"><span>Reservation</span></button>
					</div>

					<!-- Modal Reservation -->
					<div id="booking-dialog" class="zoom-anim-dialog mfp-hide">
						<div class="small-dialog-header">
							<h3>Reservation</h3>
						</div>
						<div class="sign-in-form style-1">
							<div class="tabs-container alt">
								{{-- <form method="post" action="https://eatzee-resto.herokuapp.com/api/reservation"> --}}
								<form method="post">

									<div class="row">
										<div class="col-md-12">
											<label for="customer_name">Name:
												<i class="im im-icon-Male"></i>
												<input type="hidden" class="input-text" name="admin_name" value="online" v-model="admin_name"/>
												<input type="text" class="input-text" name="customer_name" value="" v-model="customer_name" required/>
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label for="telp">Phone:
												<i class="im im-icon-Old-Telephone"></i>
												<input type="text" class="input-text" name="telp" value="" v-model="telp" required/>
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label for="email">Email:
												<i class="im im-icon-Email"></i>
												<input type="email" class="input-text" name="email" value="" v-model="email" required/>
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label for="date">Date:
												<i class="im im-icon-Calendar"></i>
												<input type="date" name="date" v-model="date" data-lang="en" data-large-mode="true" data-min-year="2018" data-max-year="2050">
											</label>
										</div>
										<div class="col-md-6">
											<label for="time">Time:
												<i class="im im-icon-Timer"></i>
												<input type="time" name="time" v-model="time" value="9:00">
											</label>
										</div>
									</div>
									{{-- <div class="row">
										<div class="col-md-6">
											<label for="date">Date:
												<i class="im im-icon-Timer"></i>
												<input type="text" id="booking-date" name="date" v-model="date" data-lang="en" data-large-mode="true" data-min-year="2018" data-max-year="2050">
											</label>
										</div>
										<div class="col-md-6">
											<label for="time">Time:
												<i class="im im-icon-Timer"></i>
												<input type="text" id="booking-time" name="time" v-model="time" value="9:00 am">
											</label>
										</div>
									</div> --}}
									<div class="row">
										<div class="col-md-6">
											<label for="pax">Pax:
												<i class="im im-icon-MaleFemale"></i>
												<input min="1" type="number" class="input-text" name="pax" value="" v-model="pax" required/>
											</label>
										</div>
										{{-- <div class="col-md-6">
											<label for="datetime_reservation">Date:
												<i class="im im-icon-Timer"></i>
												<input type="text" class="input-text" name="datetime_reservation" value="" required/>
											</label>
										</div> --}}
									</div>
									<div class="row">
										<div class="col-md-12">
											<label for="note">Note:
												{{-- <i class="im im-icon-Notepad"></i> --}}
												<textarea name="note" rows="4" cols="80" class="input-text" v-model="note"></textarea>
												{{-- <input type="text" class="input-text" name="note"/> --}}
											</label>
										</div>
									</div>

									<div class="form-row">
										{{-- {{csrf_field()}} --}}
										<input type="submit" class="button border margin-top-5" v-on:click.prevent="store()"/>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- Modal Reservation -->

				@endif
				<!-- Book Now / End -->
				<!-- Opening Hours -->
				@if ($response_resto->open != null)
					<div class="boxed-widget opening-hours margin-top-35">
						<div class="listing-badge now-open">Now Open</div>
						<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
						<ul>
							@foreach ($response_resto->open as $time)
								@if ($time->status == false)
									<li>{{$time->day}} <span>Close</span></li>
								@else
									<li>{{$time->day}} <span>{{date('H:i', strtotime($time->open))}} - {{date('H:i', strtotime($time->close))}}</span></li>
								@endif
							@endforeach
						</ul>
					</div>
				@endif
				<!-- Opening Hours / End -->
				<!-- Contact -->
				<div class="boxed-widget margin-top-35">
					<h3><i class="sl sl-icon-pin"></i> Contact</h3>
					<ul class="listing-details-sidebar">
						<li><i class="sl sl-icon-phone"></i> {{$response_resto->info[0]->contact_us}}</li>
						<li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li>
						<li><i class="fa fa-envelope-o"></i> <a href="#"><span class="__cf_email__" data-cfemail="9bf2f5fdf4dbfee3faf6ebf7feb5f8f4f6">{{$response_resto->info[0]->email}}</span></a></li>
					</ul>
					<!-- Reply to review popup -->
					<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
						<div class="small-dialog-header">
							<h3>Send Message</h3>
						</div>
						<div class="message-reply margin-top-0">
							<textarea cols="40" rows="3" placeholder="Your message to Burger House"></textarea>
							<button class="button fullwidth margin-top-5">Send Message</button>
						</div>
					</div>
					<a href="#small-dialog" class="send-message-to-owner button fullwidth popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a>
				</div>
				<!-- Contact / End-->
				<!-- Social Account -->
				@if ($response_resto->info[0] != null)
					<div class="boxed-widget margin-top-35">
						<h3><i class="sl sl-icon-link"></i> Connect with us</h3>
						<ul class="social-icons rounded">
							@if ($response_resto->info[0]->twitter != null)
								<li><a target="_blank" class="twitter" href="{{$response_resto->info[0]->twitter}}"><i class="icon-twitter"></i></a></li>
							@endif
							@if ($response_resto->info[0]->facebook != null)
								<li><a target="_blank" class="facebook" href="{{$response_resto->info[0]->facebook}}"><i class="icon-facebook"></i></a></li>
							@endif
							@if ($response_resto->info[0]->linkedin != null)
								<li><a target="_blank" class="linkedin" href="{{$response_resto->info[0]->linkedin}}"><i class="icon-linkedin"></i></a></li>
							@endif
							@if ($response_resto->info[0]->google != null)
								<li><a target="_blank" class="gplus" href="{{$response_resto->info[0]->google}}"><i class="icon-gplus"></i></a></li>
							@endif
							@if ($response_resto->info[0]->instagram != null)
								<li><a target="_blank" class="instagram" href="{{$response_resto->info[0]->instagram}}"><i class="icon-instagram"></i></a></li>
							@endif
							@if ($response_resto->info[0]->youtube != null)
								<li><a target="_blank" class="youtube" href="{{$response_resto->info[0]->youtube}}"><i class="icon-youtube"></i></a></li>
							@endif
						</ul>
						<div class="clearfix"></div>
					</div>
				@endif
				<!-- Social account / End-->
				<!-- Share Buttons -->
				<ul class="share-buttons margin-top-40 margin-bottom-0">
					<li><a class="fb-share" onClick="window.open('{{route('facebook', ['resto' => $response_resto->resto_name])}}', width=600, height=300);" ><i class="fa fa-facebook"></i> Share</a></li>
					<li><a class="twitter-share" onClick="window.open('{{route('twitter', ['resto' => $response_resto->resto_name])}}', width=600, height=300);"><i class="fa fa-twitter"></i> Tweet</a></li>
					<li><a class="gplus-share" onClick="window.open('{{route('gplus', ['resto' => $response_resto->resto_name])}}', width=600, height=300);"><i class="fa fa-google-plus"></i> Share</a></li>
					<!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
				</ul>
				<div class="clearfix"></div>
				<br>
				<br>
			</div>
			<!-- Sidebar / End -->
		</div>
	</div>
@endsection

@section('scripts')
	<script id="dsq-count-scr" src="//bakso.disqus.com/count.js" async></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>

  <script type="text/javascript" src="{{ URL::to('assets/scripts/infobox.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::to('assets/scripts/markerclusterer.js') }}"></script>
  <script type="text/javascript" src="{{ URL::to('assets/scripts/maps.js') }}"></script>

  <link href="{{ URL::to('assets/css/plugins/datedropper.css') }}" rel="stylesheet" type="text/css">
  <script src="{{ URL::to('assets/scripts/datedropper.js') }}"></script>
  <script src="{{ URL::to('assets/scripts/timedropper.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/plugins/timedropper.css') }}">

	{{-- <script>$('#booking-date').dateDropper();</script>
	<script>
		this.$('#booking-time').timeDropper({
			setCurrentTime: false,
			meridians: true,
			primaryColor: "#f91942",
			borderColor: "#f91942",
			minutesInterval: '15'
		});

		var $clocks = $('.td-input');
	</script> --}}

{{-- <script type="text/javascript">
	var vue = new Vue({
		el: '#bookmark',
		data:{
			bookmarkStatus: 1
		},
		methods:{
			bookmarkClik: function() {
				var self = this;
				axios({
					url: '{{ action('FollowController@FollowResto') }}',
					method: 'POST',
					dataType: "json",
					data: {_token : "{{ csrf_token() }}", id_resto : {{$response_resto->id_resto}}, id_user : {{Auth::user()->id_user}}, status : 1},
					error: function (error) {
						console.log(error);
					}
				}).then( function(response){
					// console.log(response);
					self.bookmarkStatus = response;
				});
			}
		}
	});
</script> --}}

<script type="text/javascript">
	var vue = new Vue({
		el: '#booking-dialog',
		data: {
			admin_name: 'online',
			customer_name: '',
			telp: '',
			email: '',
			pax: '',
			date: '',
			time: '',
			note: '',
			errors: ''
		},
		// mounted: function () {
		// 	$('#booking-date').dateDropper();
		//
		// 	$('#booking-time').timeDropper({
		// 		setCurrentTime: false,
		// 		meridians: true,
		// 		primaryColor: "#f91942",
		// 		borderColor: "#f91942",
		// 		minutesInterval: '15'
		// 	});
		// },
		methods: {
			store: function(){
				var self = this;
				axios.post('https://eatzee-resto.herokuapp.com/api/reservation', {
					admin_name: 'online',
					customer_name: this.customer_name,
					telp: this.telp,
					email: this.email,
					pax: this.pax,
					date: this.date,
					time: this.time,
					note: this.note,
					_token : "{{ csrf_token() }}"
				}).then(function (response) {
					self.modalClose('#booking-dialog');
				}).catch(function (error) {
					self.errors = error.response.data.errors;
				});
			}
		}
	});
</script>
@endsection
