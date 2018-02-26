<header id="header-container" class="fixed fullwidth dashboard">
	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">
			<!-- Left Side Content -->
			<div class="left-side">
				<!-- Logo -->
				<div id="logo">
					<a href="{{route('index')}}" class="dashboard-logo"><img src="{{asset('assets/img/logo-footer.png')}}" alt=""></a>
				</div>
				<!-- Mobile Navigation -->
				<div class="menu-responsive">
					<i class="fa fa-reorder menu-trigger"></i>
				</div>
				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">
						<li><a href="#">Home</a>
							<ul>
								<li><a href="index-2.html">Home 1</a></li>
								<li><a href="index-3.html">Home 2</a></li>
								<li><a href="index-4.html">Home 3</a></li>
								<li><a href="index-5.html">Home 4</a></li>
							</ul>
						</li>
						<li><a href="#">Listings</a>
							<ul>
								<li><a href="#">List Layout</a>
									<ul>
										<li><a href="listings-list-with-sidebar.html">With Sidebar</a></li>
										<li><a href="listings-list-full-width.html">Full Width</a></li>
									</ul>
								</li>
								<li><a href="#">Grid Layout</a>
									<ul>
										<li><a href="listings-grid-with-sidebar-1.html">With Sidebar 1</a></li>
										<li><a href="listings-grid-with-sidebar-2.html">With Sidebar 2</a></li>
										<li><a href="listings-grid-full-width.html">Full Width</a></li>
									</ul>
								</li>
								<li><a href="#">Half Screen Map</a>
									<ul>
										<li><a href="listings-half-screen-map-list.html">List Layout</a></li>
										<li><a href="listings-half-screen-map-grid-1.html">Grid Layout 1</a></li>
										<li><a href="listings-half-screen-map-grid-2.html">Grid Layout 2</a></li>
									</ul>
								</li>
								<li><a href="listings-single-page.html">Single Listing</a></li>
							</ul>
						</li>
						<li><a class="current" href="#">User Panel</a>
							<ul>
								<li><a href="dashboard.html">Dashboard</a></li>
								<li><a href="dashboard-messages.html">Messages</a></li>
								<li><a href="dashboard-my-listings.html">My Listings</a></li>
								<li><a href="dashboard-reviews.html">Reviews</a></li>
								<li><a href="dashboard-bookmarks.html">Bookmarks</a></li>
								<li><a href="dashboard-add-listing.html">Add Listing</a></li>
								<li><a href="dashboard-my-profile.html">My Profile</a></li>
								<li><a href="dashboard-invoice.html">Invoice</a></li>
							</ul>
						</li>
						<li><a href="#">Pages</a>
							<ul>
								<li><a href="pages-blog.html">Blog</a>
									<ul>
										<li><a href="pages-blog.html">Blog</a></li>
										<li><a href="pages-blog-post.html">Blog Post</a></li>
									</ul>
								</li>
								<li><a href="pages-contact.html">Contact</a></li>
								<li><a href="pages-elements.html">Elements</a></li>
								<li><a href="pages-pricing-tables.html">Pricing Tables</a></li>
								<li><a href="pages-typography.html">Typography</a></li>
								<li><a href="pages-404.html">404 Page</a></li>
								<li><a href="pages-icons.html">Icons</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
			</div>
			<!-- Left Side Content / End -->
			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Header Widget -->
				<div class="header-widget">
					<!-- User Menu -->
					<div class="user-menu">
						<div class="user-name"><span><img src="{{asset(Auth::user()->img)}}" alt=""></span>{{Auth::user()->name}}</div>
						<ul>
							<li><a href="dashboard.html"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
							<li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> Messages</a></li>
							<li><a href="{{route('user.profile')}}"><i class="sl sl-icon-user"></i> My Profile</a></li>
							<li><a href="{{route('user.logout')}}"><i class="sl sl-icon-power"></i> Logout</a></li>
						</ul>
					</div>
					<a href="dashboard-add-listing.html" class="button border with-icon">Add Listing <i class="sl sl-icon-plus"></i></a>
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->
		</div>
	</div>
	<!-- Header / End -->
</header>
