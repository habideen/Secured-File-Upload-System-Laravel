			<section class="min" id="featured">
				<div class="container">
					
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8 mb-4">
							<div class="sec-heading center">
								<h2>Top & Featured <span class="theme-cl">Products & Offers</span></h2>
								<p class="mt-4 h5 font-bold-light">Get upto 20% on products</p>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
						
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
						
					</div>
				
					<div class="text-center mt-4 pt-4">
						<a href="top-stores.php" class="btn btn-danger btn-md"> All coupons</a>
					</div>

				</div>
			</section>