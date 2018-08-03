<div id="footer" class="sticky-footer">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="images/logo-footer.png" alt="">
				<br><br>
				<p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
			</div>
			<div class="col-md-4 col-sm-6 ">
				<h4>Helpful Links</h4>
				<ul class="footer-links">
					@if (Auth::check())
						<li><a href="{{route('user.profile')}}">My Account</a></li>
					@else
						<li><a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim">Login</a></li>
						<li><a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim">Sign Up</a></li>
					@endif
					<li><a href="#">Add Listing</a></li>
					<li><a href="#">Pricing</a></li>
					<li><a href="#">Privacy Policy</a></li>
				</ul>
				<ul class="footer-links">
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Our Partners</a></li>
					<li><a href="#">How It Works</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-3  col-sm-12">
				<h4>Contact Us</h4>
				<div class="text-widget">
					<span>Jl. Ratna No 68 G Tonja - Denpasar</span> <br>
					Phone: <span>(0361) 4457 362 </span><br>
					E-Mail:<span> <a href="#"><span class="__cf_email__" data-cfemail="412e2727282224012439202c312d246f222e2c">[email&#160;protected]</span></a> </span><br>
				</div>
				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
				</ul>
			</div>
		</div>
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2018 Eatzee. Powered by Ganeshcom Studio.</div>
			</div>
		</div>
	</div>
</div>
