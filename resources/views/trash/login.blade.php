
		@include('inc.nav')

			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			<!-- ============================ Login Wrap ================================== -->
			<section>
				<div class="container">
					<div class="row justify-content-center">
					
						<div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
							<form  action="{{ route('login') }}" method="post">
								@csrf
								<div class="crs_log_wrap">
									<div class="crs_log__thumb">
										<img src="assets/img/top.png" class="img-fluid" alt="" />
									</div>
									<div class="crs_log__caption">
										<div class="rcs_log_123">
											<div class="rcs_ico"><i class="fas fa-lock"></i></div>
										</div>

										<div class="rcs_log_124">
											<div class="Lpo09"><h4>Login Your Account</h4></div>
											
											@if(Session::has('success'))
												<div class="alert alert-success">{{Session::get('success')}}</div>
											@endif
											@if(Session::has('fail'))
												<div class="alert alert-danger">{{Session::get('fail')}}</div>
											@endif

											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control" placeholder="Enter email" name="email" />
											</div>
											<div class="form-group">
												<label>Password</label>
												<input type="password" class="form-control" placeholder="*******" name="password" />
											</div>
											
											<div class="form-group">
												<button type="submit" class="btn full-width btn-md theme-bg text-white">Login</button>
											</div>
										</div>
										<div class="rcs_log_125">
											<span>Or Login with Social Info</span>
										</div>
										<div class="rcs_log_126">
											<ul class="social_log_45 row">
												<li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-facebook text-info"></i>Facebook</a></li>
												<li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-google text-danger"></i>Google</a></li>
												<li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-twitter theme-cl"></i>Twitter</a></li>
											</ul>
										</div>
									</div>
									<div class="crs_log__footer d-flex justify-content-between">
										<div class="fhg_45"><p class="musrt">Don't have account? <a href="signup" class="theme-cl">SignUp</a></p></div>
										<div class="fhg_45"><p class="musrt"><a href="forgot_password" class="text-danger">Forgot Password?</a></p></div>
									</div>
								</div>
							</form>
						</div>

					</div>
				</div>
			</section>
			<!-- ============================ Login Wrap ================================== -->
			
			<!-- ============================ Footer Start ================================== -->
			
			@include('inc.footer')

			<!-- ============================ Footer End ================================== -->
			
			<!-- Log In Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
				<div class="modal-dialog modal-xl login-pop-form" role="document">
					<div class="modal-content overli" id="loginmodal">
						<div class="modal-header">
							<h5 class="modal-title">Login Your Account</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
							</button>
						  </div>
						<div class="modal-body">
							<div class="login-form">
								<form  action="{{ route('login') }}" method="post">
									@csrf
									<div class="crs_log_wrap">
										<div class="crs_log__thumb">
											<img src="assets/img/top.png" class="img-fluid" alt="" />
										</div>
										<div class="crs_log__caption">
											<div class="rcs_log_123">
												<div class="rcs_ico"><i class="fas fa-lock"></i></div>
											</div>
	
											<div class="rcs_log_124">
												<div class="Lpo09"><h4>Login Your Account</h4></div>
												
												@if(Session::has('success'))
													<div class="alert alert-success">{{Session::get('success')}}</div>
												@endif
												@if(Session::has('fail'))
													<div class="alert alert-danger">{{Session::get('fail')}}</div>
												@endif
	
												<div class="form-group">
													<label>Email</label>
													<input type="email" class="form-control" placeholder="Enter email" name="email" />
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="password" class="form-control" placeholder="*******" name="password" />
												</div>
												
												<div class="form-group">
													<button type="submit" class="btn full-width btn-md theme-bg text-white">Login</button>
												</div>
											</div>
											<div class="rcs_log_125">
												<span>Or Login with Social Info</span>
											</div>
											<div class="rcs_log_126">
												<ul class="social_log_45 row">
													<li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-facebook text-info"></i>Facebook</a></li>
													<li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-google text-danger"></i>Google</a></li>
													<li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-twitter theme-cl"></i>Twitter</a></li>
												</ul>
											</div>
										</div>
										<div class="crs_log__footer d-flex justify-content-between">
											<div class="fhg_45"><p class="musrt">Don't have account? <a href="signup" class="theme-cl">SignUp</a></p></div>
											<div class="fhg_45"><p class="musrt"><a href="forgot_password" class="text-danger">Forgot Password?</a></p></div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="crs_log__footer d-flex justify-content-between mt-0">
							<div class="fhg_45"><p class="musrt">Don't have account? <a href="signup" class="theme-cl">SignUp</a></p></div>
							<div class="fhg_45"><p class="musrt"><a href="forgot_password" class="text-danger">Forgot Password?</a></p></div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

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