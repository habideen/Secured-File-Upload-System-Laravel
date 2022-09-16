
		@include('inc.nav')

			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			
			<!-- ============================ Hero Banner  Start================================== -->
			<div class="hero_banner image-cover" style="background:#1e03b9 url(assets/img/top.png) no-repeat;" data-overlay="5">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-xl-6 col-lg-7 col-md-8 col-sm-12">
							<div class="simple-search-wrap text-left">
								<div class="hero_search-2">
									<div class="elsio_tag">Up to 50% discounts</div>
									<h1 class="banner_title mb-4">Up to 4500 Stores Cashback Offers</h1>
									<p class="font-lg mb-4">Join Today to start your lifetime savings</p>
									<div class="input-group simple_search">
										<i class="fa fa-search ico"></i>
										<input type="text" class="form-control" placeholder="Search top stores deals">
										<div class="input-group-append">
											<button class="btn theme-bg" type="button">Search</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Hero Banner End ================================== -->
			
			<!-- ================================ Tag Award ================================ -->
			<section class="p-0">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="crp_box fl_color ovr_top">
								<div class="row align-items-center">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
										<div class="dro_140">
											<div class="dro_141 de"><i class="fas fa-search-dollar"></i></div>
											<div class="dro_142">
												<h6>Search for Coupon</h6>
												<p>Search our coupon code store to get the best deal ever.</p>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
										<div class="dro_140">
											<div class="dro_141 de"><i class="fas fa-copy"></i></div>
											<div class="dro_142">
												<h6>Use Coupon</h6>
												<p>Copy coupon to the online store to use. Supply at checkout time</p>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
										<div class="dro_140">
											<div class="dro_141 de"><i class="fas fa-coins"></i></div>
											<div class="dro_142">
												<h6>Get Paid</h6>
												<p>Login to your dashboard then submit the coupon for cashback. It's very simple.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>
			</section>
			<!-- ================================ Tag Award ================================ -->
			
			<!-- ============================ Latest Coupons Start ================================== -->
			<section class="mi---n">
				<div class="contain--er">
					
            <!-- ============================ Top/featured deals/ Products ================================== -->


			@include('featured-deals')
			
	
			<!-- ============================ Top Products ================================== -->
					
				</div>
			</section>
			<!-- ============================ Latest Coupons End ================================== -->


			<!-- ============================ Top Categories Start ================================== -->
			
				@include('top-brands')

			<!-- ============================ Top Categories End ================================== -->
			

			<!-- ============================ Call To Action ================================== -->
			<section class="theme-bg call_action_wrap-wrap">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							
							<div class="call_action_wrap">
								<div class="call_action_wrap-head">
									<h3>Do You Have Questions ?</h3>
									<span>We'll help you to grow your career and growth.</span>
								</div>
								<a href="contact" class="btn btn-call_action_wrap">Contact Us Today</a>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Call To Action End ================================== -->
			
			<!-- ============================ Footer Start ================================== -->
			
			@include('inc.footer')

			<!-- ============================ Footer End ================================== -->
			
		

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		
		@include('inc.foot-script')
		
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

		@include('script.general')
		
	</body>
</html>