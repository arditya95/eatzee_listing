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
							<span class="listing-tag" > {{$response_resto->category[0]->category_resto}} </span>
							@if ($response_resto->status_delivery ==  true && $response_resto->status_delivery_only == false)
								<a href="#"><span class="listing-online"><i class="sl sl-icon-check"></i> Online Order</span></a>
							@elseif ($response_resto->status_reservation ==  true && $response_resto->status_delivery_only == false)
								<a href="#booking"><span class="listing-online"><i class="sl sl-icon-check"></i> Open Table</span></a>
							@elseif ($response_resto->status_delivery_only == true)
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
                <h3 class="listing-desc-headline">Resto Facilities</h3>
                <ul class="listing-features checkboxes margin-top-0">
                  <li>Elevator in building</li>
                  <li>Friendly workspace</li>
                  <li>Instant Book</li>
                  <li>Wireless Internet</li>
                  <li>Free parking on premises</li>
                  <li>Free parking on street</li>
                </ul>
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
														<a target="_blank" href="{{ asset($product->image) }}">
															<img src="{{ 'https://eatzee-resto.herokuapp.com' . $product->image }}" alt="image" width="600" height="400">
														</a>
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
				<div class="listing-share margin-top-80 margin-bottom-30 no-border">
					<button class="like-button"><span class="like-icon"></span> Bookmark This Listing</button>
					<a href="#" class="button medium border"><i class="sl sl-icon-pin"></i>Check in</a>
					<span>159 people check in here</span>
					<hr>
					<div class="clearfix"></div>
				</div>
				<!-- Book Now -->
				<div class="boxed-widget" id="booking">
					<h3><i class="fa fa-calendar-check-o "></i> Book a Table</h3>
					<div class="row with-forms  margin-top-0">
						<div class="col-lg-6 col-md-12">
							<input type="text" id="booking-date" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020">
						</div>
						<div class="col-lg-6 col-md-12">
							<input type="text" id="booking-time" value="9:00 am">
						</div>
					</div>
					<button class="progress-button button fullwidth margin-top-5"><span>Open Table</span></button>
				</div>
				<!-- Book Now / End -->
				<!-- Opening Hours -->
				<div class="boxed-widget opening-hours margin-top-35">
					<div class="listing-badge now-open">Now Open</div>
					<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
					<ul>
						@foreach ($response_resto->open as $time)
							@if ($time->status == false)
								<li>{{$time->day}} <span>close</span></li>
							@else
								<li>{{$time->day}} <span>{{date('H:i', strtotime($time->open))}} - {{date('H:i', strtotime($time->close))}}</span></li>
							@endif
						@endforeach
					</ul>
				</div>
				<!-- Opening Hours / End -->
				<!-- Contact -->
				<div class="boxed-widget margin-top-35">
					<h3><i class="sl sl-icon-pin"></i> Contact</h3>
					<ul class="listing-details-sidebar">
						<li><i class="sl sl-icon-phone"></i> {{$response_resto->info[0]->contact_us}}</li>
						<li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li>
						<li><i class="fa fa-envelope-o"></i> <a href="#"><span class="__cf_email__" data-cfemail="9bf2f5fdf4dbfee3faf6ebf7feb5f8f4f6">[email&#160;protected]</span></a></li>
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
				<div class="boxed-widget margin-top-35">
					<h3><i class="sl sl-icon-link"></i> Connect with us</h3>
					<ul class="social-icons rounded">
						<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
						<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
						<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
						<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
						<li><a class="instagram" href="#"><i class="icon-instagram"></i></a></li>
						<li><a class="youtube" href="#"><i class="icon-youtube"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
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
  <script>$('#booking-date').dateDropper();</script>

  <script src="{{ URL::to('assets/scripts/timedropper.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/plugins/timedropper.css') }}">
  <script>
	this.$('#booking-time').timeDropper({
		setCurrentTime: false,
		meridians: true,
		primaryColor: "#f91942",
		borderColor: "#f91942",
		minutesInterval: '15'
	});

	var $clocks = $('.td-input');
  </script>
@endsection
