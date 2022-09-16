<!DOCTYPE html>
<html lang="zxx">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="MarvisLab" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ShopCashing | Online Cash Back Stores, Up To 50% Off</title>
		 
        <!-- Custom CSS -->
        <link href="assets/css/styles.css" rel="stylesheet">
		
    </head>
	
    <body>

        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
		
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
									<h1 class="banner_title mb-4">Coupon Page</h1>
									<p class="font-lg mb-4">Get the best deals for all online purchase.</p>
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


			<section class="min">
				<div class="container">
					


				<div class="row justify-content-center">
					<div class="col-lg-7 col-md-8">
						<div class="sec-heading center">
							<h2>Top & Featured <span class="theme-cl">Products & Offers</span></h2>
							<p class="mb-5 mt-3">We give you updated list of coupon and best deals online. Explore our store to save more.</p>
						</div>
					</div>
				</div>
				
				<div class="row justify-content-center">
				
					<div class="col-12 mb-5">
						<label>Number of items to display:</label>
						<select class="bg-dark p-1 text-white">
							<option></option>
							<option>50</option>
							<option>100</option>
							<option>200</option>
						</select>
					</div>

					@foreach ($coupons as $coupon)
					<!-- Single Item -->
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="prd_grid_box">
							<div class="prd_grid_thumb pt-4 mb-2 text-center">
								<a href="#"><img src="{{ catcheFile( 
									public_path('images/upload/store/' . $coupon->image_path), 
									'/images/upload/store/' . $coupon->image_path ) }}" class="img-fluid" width="100" alt=""></a>
							</div>
							<div class="prd_grid_caption pt-4">
								<div class="prd_center_capt">							
									<div class="prd_title coupon_link"><h4><a href="{{ $coupon->coupon_url }}" target="_blank">{{ $coupon->store_name }}<h6 class="mt-1">Buy now</h6></a></h4></div>
									<p class="d-none">Get upto 20% off the original price</p>
									<p class="mt-4"><a 
										href="{{ route('user.submit_coupon') }}?store_id={{$coupon->store_id}}&coupon_code={{$coupon->coupon_code}}" 
										class="">Submit coupon <i class="fa fa-arrow-right"></i></a></p>
								</div>
								<div class="prd_bot_capt">
									<div class="input-group">
										<input type="text" class="form-control" readonly="true" value="{{ $coupon->coupon_code }}">
										<div class="input-group-append">
											<button type="button" class="btn btn-primary" onclick="getText(this);"><i class="far fa-copy"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach

					<!-- Single Item -->
					<div class="d-none col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="prd_grid_box">
							<div class="prd_grid_thumb pt-4 mb-2 text-center">
								<a href="#"><img src="assets/img/whogohost.png" class="img-fluid" width="100" alt=""></a>
							</div>
							<div class="prd_grid_caption pt-4">
								<div class="prd_center_capt">										
									<div class="prd_title"><h4>Whogohost</h4></div>
									<p>Get 20% off the original price</p>
									<p><a>Get to store</a></p>
								</div>
								<div class="prd_bot_capt">
									<div class="input-group">
										<input type="text" class="form-control" readonly="true" value="WHO202202">
										<div class="input-group-append">
											<button class="btn btn-primary" onclick="getText(this);"><i class="far fa-copy"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Single Item -->
					<div class="d-none col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="prd_grid_box">
							<div class="prd_grid_thumb pt-4 mb-2 text-center">
								<a href="#"><img src="assets/img/aliexpress.png" class="img-fluid" width="100" alt=""></a>
							</div>
							<div class="prd_grid_caption pt-4">
								<div class="prd_center_capt">										
									<div class="prd_title"><h4>Aliexpress</h4></div>
									<p>Get 15% off the original price</p>
									<p><a href="">Get to store</a></p>
								</div>
								<div class="prd_bot_capt">
									<div class="input-group">
										<input type="text" class="form-control" readonly="true" value="ALE-193-R4Z">
										<div class="input-group-append">
											<button class="btn btn-primary"><i class="far fa-copy"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Single Item -->
					<div class="d-none col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="prd_grid_box">
							<div class="prd_grid_thumb pt-4 mb-2 text-center">
								<a href="#"><img src="assets/img/whogohost.png" class="img-fluid" width="100" alt=""></a>
							</div>
							<div class="prd_grid_caption pt-4">
								<div class="prd_center_capt">										
									<div class="prd_title"><h4>Whogohost</h4></div>
									<p>Get 20% off the original price</p>
									<p><a>Get to store</a></p>
								</div>
								<div class="prd_bot_capt">
									<div class="input-group">
										<input type="text" class="form-control" readonly="true" value="WHO202202">
										<div class="input-group-append">
											<button class="btn btn-primary"><i class="far fa-copy"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Single Item -->
					<div class="d-none col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="prd_grid_box">
							<div class="prd_grid_thumb pt-4 mb-2 text-center">
								<a href="#"><img src="assets/img/aliexpress.png" class="img-fluid" width="100" alt=""></a>
							</div>
							<div class="prd_grid_caption pt-4">
								<div class="prd_center_capt">										
									<div class="prd_title"><h4>Aliexpress</h4></div>
									<p>Get 15% off the original price</p>
									<p><a href="">Get to store</a></p>
								</div>
								<div class="prd_bot_capt">
									<div class="input-group">
										<input type="text" class="form-control" readonly="true" value="ALE-193-R4Z">
										<div class="input-group-append">
											<button class="btn btn-primary"><i class="far fa-copy"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Single Item -->
					<div class="d-none col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="prd_grid_box">
							<div class="prd_grid_thumb pt-4 mb-2 text-center">
								<a href="#"><img src="assets/img/whogohost.png" class="img-fluid" width="100" alt=""></a>
							</div>
							<div class="prd_grid_caption pt-4">
								<div class="prd_center_capt">										
									<div class="prd_title"><h4>Whogohost</h4></div>
									<p>Get 20% off the original price</p>
									<p><a>Get to store</a></p>
								</div>
								<div class="prd_bot_capt">
									<div class="input-group">
										<input type="text" class="form-control" readonly="true" value="WHO202202">
										<div class="input-group-append">
											<button class="btn btn-primary"><i class="far fa-copy"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Single Item -->
					<div class="d-none col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="prd_grid_box">
							<div class="prd_grid_thumb pt-4 mb-2 text-center">
								<a href="#"><img src="assets/img/aliexpress.png" class="img-fluid" width="100" alt=""></a>
							</div>
							<div class="prd_grid_caption pt-4">
								<div class="prd_center_capt">										
									<div class="prd_title"><h4>Aliexpress</h4></div>
									<p>Get 15% off the original price</p>
									<p><a href="">Get to store</a></p>
								</div>
								<div class="prd_bot_capt">
									<div class="input-group">
										<input type="text" class="form-control" readonly="true" value="ALE-193-R4Z">
										<div class="input-group-append">
											<button class="btn btn-primary"><i class="far fa-copy"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Single Item -->
					<div class="d-none col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="prd_grid_box">
							<div class="prd_grid_thumb pt-4 mb-2 text-center">
								<a href="#"><img src="assets/img/whogohost.png" class="img-fluid" width="100" alt=""></a>
							</div>
							<div class="prd_grid_caption pt-4">
								<div class="prd_center_capt">										
									<div class="prd_title"><h4>Whogohost</h4></div>
									<p>Get 20% off the original price</p>
									<p><a>Get to store</a></p>
								</div>
								<div class="prd_bot_capt">
									<div class="input-group">
										<input type="text" class="form-control" readonly="true" value="WHO202202">
										<div class="input-group-append">
											<button class="btn btn-primary"><i class="far fa-copy"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Single Item -->
					<div class="d-none col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="prd_grid_box">
							<div class="prd_grid_thumb pt-4 mb-2 text-center">
								<a href="#"><img src="assets/img/aliexpress.png" class="img-fluid" width="100" alt=""></a>
							</div>
							<div class="prd_grid_caption pt-4">
								<div class="prd_center_capt">										
									<div class="prd_title"><h4>Aliexpress</h4></div>
									<p>Get 15% off the original price</p>
									<p><a href="">Get to store</a></p>
								</div>
								<div class="prd_bot_capt">
									<div class="input-group">
										<input type="text" class="form-control" readonly="true" value="ALE-193-R4Z">
										<div class="input-group-append">
											<button class="btn btn-primary"><i class="far fa-copy"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Single Item -->
					<div class="d-none col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="prd_grid_box">
							<div class="prd_grid_thumb pt-4 mb-2 text-center">
								<a href="#"><img src="assets/img/whogohost.png" class="img-fluid" width="100" alt=""></a>
							</div>
							<div class="prd_grid_caption pt-4">
								<div class="prd_center_capt">										
									<div class="prd_title"><h4>Whogohost</h4></div>
									<p>Get 20% off the original price</p>
									<p><a>Get to store</a></p>
								</div>
								<div class="prd_bot_capt">
									<div class="input-group">
										<input type="text" class="form-control" readonly="true" value="WHO202202">
										<div class="input-group-append">
											<button class="btn btn-primary"><i class="far fa-copy"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Single Item -->
					<div class="d-none col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="prd_grid_box">
							<div class="prd_grid_thumb pt-4 mb-2 text-center">
								<a href="#"><img src="assets/img/aliexpress.png" class="img-fluid" width="100" alt=""></a>
							</div>
							<div class="prd_grid_caption pt-4">
								<div class="prd_center_capt">										
									<div class="prd_title"><h4>Aliexpress</h4></div>
									<p>Get 15% off the original price</p>
									<p><a href="">Get to store</a></p>
								</div>
								<div class="prd_bot_capt">
									<div class="input-group">
										<input type="text" class="form-control" readonly="true" value="ALE-193-R4Z">
										<div class="input-group-append">
											<button class="btn btn-primary"><i class="far fa-copy"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="col-12 mt-5 mb-5 text-center">
						<a class="btn btn-danger text-white btn-sm disabled">1</a>
						<a class="btn btn-danger text-white btn-sm">2</a>
						<a class="btn btn-danger text-white btn-sm">3</a>
						<a class="btn btn-danger text-white btn-sm">4</a>
						<a class="btn btn-danger text-white btn-sm">5</a>
					</div>
				
				</div>
			</section>

			
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

		<script>
		
		function successPopup(title, msg)
		{
			const myNotification = window.createNotification({
				// options here
			});

			myNotification({ 
				title: title,
				message: msg 
			});

			myNotification({ 
				// close on click
				closeOnClick: true,
				// displays close button
				displayCloseButton: false,
				// nfc-top-left
				// nfc-bottom-right
				// nfc-bottom-left
				positionClass: 'nfc-top-right',
				// callback
				onclick: false,
				// timeout in milliseconds
				showDuration: 3500,
				// success, info, warning, error, and none
				theme: 'success'    
			});    
		}


		function getText(el)
		{
			var elem = $(el).parent().prev();
			elem.select();
			document.execCommand('copy');

			successPopup('Copy', 'Coupon was copied successfully.') 
		}
		</script>

	</body>
</html>