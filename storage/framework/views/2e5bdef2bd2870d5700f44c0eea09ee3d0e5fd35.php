

<?php $__env->startSection('content'); ?>
		

			<!-- Row -->
			<div class="row">
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row mb-1">
								<div class="col">
									<p class="mb-1">Product Sold</p>
									<h3 class="mb-0 number-font">57,865</h3>
								</div>
								<div class="col-auto mb-0">
									<div class="dash-icon text-orange">
										<i class="bx bxs-shopping-bags"></i>
									</div>
								</div>
							</div>
							<span class="fs-12 text-muted"> <strong>2.6%</strong><i class="mdi mdi-arrow-up"></i> <span class="text-muted fs-12 ml-0 mt-1">than last week</span></span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row mb-1">
								<div class="col">
									<p class="mb-1">Total Balance</p>
									<h3 class="mb-0 number-font">$2,156</h3>
								</div>
								<div class="col-auto mb-0">
									<div class="dash-icon text-secondary1">
										<i class="bx bxs-wallet"></i>
									</div>
								</div>
							</div>
							<span class="fs-12 text-muted"> <strong>0.06%</strong><i class="mdi mdi-arrow-down"></i> <span class="text-muted fs-12 ml-0 mt-1">than last week</span></span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row mb-1">
								<div class="col">
									<p class="mb-1">Sales Profit</p>
									<h3 class="mb-0 number-font">$12,105</h3>
								</div>
								<div class="col-auto mb-0">
									<div class="dash-icon text-secondary">
										<i class="bx bxs-badge-dollar"></i>
									</div>
								</div>
							</div>
							<span class="fs-12 text-muted"> <strong>0.15%</strong><i class="mdi mdi-arrow-down"></i> <span class="text-muted fs-12 ml-0 mt-1">than last week</span></span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row mb-1">
								<div class="col">
									<p class="mb-1">Total Expenses</p>
									<h3 class="mb-0 number-font">$4,673</h3>
								</div>
								<div class="col-auto mb-0">
									<div class="dash-icon text-warning">
										<i class="bx bxs-credit-card-front"></i>
									</div>
								</div>
							</div>
							<span class="fs-12 text-muted"> <strong>1.05%</strong><i class="mdi mdi-arrow-up"></i> <span class="text-muted fs-12 ml-0 mt-1">than last week</span></span>
						</div>
					</div>
				</div>
			</div>
			<!-- Row-1 End -->

			<!-- ROW-2 -->
			<div class="row">
				<div class="col-lg-4 col-md-12 col-sm-12 col-xl-3">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Sales By Category</h3>
						</div>
						<div class="card-body">
							<div class="">
								<canvas id="canvasDoughnut" class="chartsh"></canvas>
							</div>
							<div class="mt-5 fs-12">
								<div class="float-left mr-3"><span class="dot-label bg-primary mr-1"></span><span class="">Mens</span></div>
								<div class="float-left mr-3"><span class="dot-label bg-secondary mr-1"></span><span class="">Womens</span></div>
								<div class="float-left mr-3"><span class="dot-label bg-secondary1 mr-1"></span><span class="">Kids</span></div>
								<div class="float-left mr-3"><span class="dot-label bg-canvas1 mr-1"></span><span class="">Electronics</span></div>
								<div class="float-left"><span class="dot-label bg-canvas2 mr-1"></span><span class="">Home & Furniture</span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-12 col-sm-12 col-xl-9">
					<div class="card overflow-hidden">
						<div class="card-header">
							<h3 class="card-title">Monthly Sales Statistics</h3>
						</div>
						<div class="card-body">
							<div id="sales" class=""></div>
						</div>
					</div>
				</div>
			</div>
			<!-- ROW-2 END -->

			<!-- Row-3 -->
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
					<div class="card overflow-hidden">
						<div class="card-body pb-0">
							<div class="">
								<div class="d-flex">
									<div class="">
										<p class="mb-1">Monthly Sales</p>
										<h2 class="mb-1  number-font">42,567</h2>
										<p class="text-muted  mb-0"><span class="text-muted fs-13 mr-2">(+43%)</span> than Last week</p>
									</div>
									<div class="ml-auto">
										<i class="bx bxs-dollar-circle fs-40 text-secondary"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="chart-wrapper">
							<canvas id="widgetChart1" class=""></canvas>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
					<div class="card overflow-hidden">
						<div class="card-header">
							<h3 class="card-title">Sales Overview</h3>
						</div>
						<div class="card-body">
							<div class="mb-5">
								<p class="mb-2">Total Profit<span class="float-right"><b>51,234</b><span class="text-muted ml-1">(80%)</span></span></p>
								<div class="progress h-2">
									<div class="progress-bar bg-primary w-80 " role="progressbar"></div>
								</div>
							</div>
							<div class="mb-5">
								<p class="mb-2">Total Income<span class="float-right"><b>12,786</b><span class="text-muted ml-1">(50%)</span></span></p>
								<div class="progress h-2">
									<div class="progress-bar bg-secondary w-50 " role="progressbar"></div>
								</div>
							</div>
							<div class="mb-0">
								<p class="mb-2">Total Expenses<span class="float-right"><b>32,167</b><span class="text-muted ml-1">(60%)</span></span></p>
								<div class="progress h-2">
									<div class="progress-bar bg-secondary1 w-60 " role="progressbar"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-body">
							<div class="">
								<p class="mb-1">Your Current Balance</p>
								<h2 class="mb-1  number-font">$32745.00</h2>
							</div>
							<div class="mt-5">
								<p class="mb-1 d-flex">
									<span class=""><i class="fa fa-money text-muted mr-2 mt-1 fs-16"></i></span>
									<span class="fs-13 font-weight-normal text-muted mr-2">Received Amount </span> : <span class="ml-auto fs-14">+ 1,50,500</span>
								</p>
								<p class="mb-1 d-flex">
									<span class=""><i class="fa fa-credit-card mr-2 mt-1 fs-16 text-muted"></i></span>
									<span class="fs-13 font-weight-normal text-muted mr-2">Sent Amount </span> : <span class="ml-auto fs-14">- 25,500</span>
								</p>
								<p class="d-flex">
									<span class=""><i class="fa fa-university mr-2 fs-16 text-muted"></i></span>
									<span class="fs-13 font-weight-normal text-muted mr-2">Total Amount </span> : <span class="ml-auto font-weight-bold fs-15">$ 1,00,500</span>
								</p>
							</div>
							<div class="row mt-3">
								<div class="col-6">
									<a class="btn btn-primary btn-block btn-rounded" href="">Transfer</a>
								</div>
								<div class="col-6">
									<a class="btn btn-secondary btn-rounded btn-block" href="">Receive</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Row-3 End -->

			<!-- ROW-4 -->
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Recent Orders</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover text-nowrap mb-0">
									<thead>
										<tr>
											<th>Customer</th>
											<th>Invoice ID</th>
											<th>Category</th>
											<th>Date</th>
											<th>Price</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<img src="<?php echo e(URL::asset('assets/images/users/3.jpg')); ?>" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
												Vashti Riccio
											</td>
											<td>#89345</td>
											<td>Sport Shooes</td>
											<td>07-02-2020</td>
											<td class="font-weight-semibold fs-15">$893</td>
											<td>
												<a href="#" class="badge badge-danger">Pending</a>
											</td>
										</tr>
										<tr>
											<td>
												<img src="<?php echo e(URL::asset('assets/images/users/4.jpg')); ?>" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
												Harriett Lauver
											</td>
											<td>#39281</td>
											<td>T-Shirt</td>
											<td>12-01-2020</td>
											<td class="font-weight-semibold fs-15">$254</td>
											<td>
												<a href="#" class="badge badge-primary">Delivered</a>
											</td>
										</tr>
										<tr>
											<td>
												<img src="<?php echo e(URL::asset('assets/images/users/5.jpg')); ?>" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
												Darci Faw
											</td>
											<td>#35825</td>
											<td>Hand Bag</td>
											<td>15-01-2020</td>
											<td class="font-weight-semibold fs-15">$352</td>
											<td>
												<a href="#" class="badge badge-primary">Delivered</a>
											</td>
										</tr>
										<tr>
											<td>
												<img src="<?php echo e(URL::asset('assets/images/users/6.jpg')); ?>" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
												Jamie Norville
											</td>
											<td>#62391</td>
											<td>Lather Watch</td>
											<td>10-01-2020</td>
											<td class="font-weight-semibold fs-15">$643</td>
											<td>
												<a href="#" class="badge badge-danger">Pending</a>
											</td>
										</tr>
										<tr>
											<td>
												<img src="<?php echo e(URL::asset('assets/images/users/7.jpg')); ?>" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
												Danae Kaba
											</td>
											<td>#92481</td>
											<td>Laptop</td>
											<td>07-01-2020</td>
											<td class="font-weight-semibold fs-15">$392</td>
											<td>
												<a href="#" class="badge badge-primary">Completed</a>
											</td>
										</tr>
										<tr>
											<td>
												<img src="<?php echo e(URL::asset('assets/images/users/8.jpg')); ?>" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
												Jeromy Tricarico
											</td>
											<td>#29381</td>
											<td>Office Chair</td>
											<td>31-02-2020</td>
											<td class="font-weight-semibold fs-15">$295</td>
											<td>
												<a href="#" class="badge badge-danger">Pending</a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Recent Activity</h3>
						</div>
						<div class="card-body">
							<div class="activity-block">
								<ul class="task-list user-tasks">
									<li>
										<span class="avatar avatar-md brround cover-image task-icon1" data-image-src="<?php echo e(URL::asset('assets/images/users/1.jpg')); ?>"></span>
										<h6>Successful Purchase<small class="float-right text-muted tx-11">29 Mar 2020</small></h6>
										<span class="text-muted tx-12">Order ID: #4567</span>
									</li>
									<li>
										<span class="avatar avatar-md brround cover-image task-icon1" data-image-src="<?php echo e(URL::asset('assets/images/users/2.jpg')); ?>"></span>
										<h6>New Registered Seller<small class="float-right text-muted tx-11">25 Mar 2020</small></h6>
										<span class="text-muted tx-12">User ID: #8976</span>
									</li>
									<li>
										<span class="avatar avatar-md brround cover-image task-icon1 bg-pink">H</span>
										<h6>Order Verification<small class="float-right text-muted tx-11">14 Feb 2020</small></h6>
										<span class="text-muted tx-12">Order ID: #6290</span>
									</li>
									<li>
										<span class="avatar avatar-md brround cover-image task-icon1" data-image-src="<?php echo e(URL::asset('assets/images/users/8.jpg')); ?>"></span>
										<h6>New Item Added<small class="float-right text-muted tx-11">02 Feb 2020</small></h6>
										<span class="text-muted tx-12">Item ID: #0235</span>
									</li>
									<li>
										<span class="avatar avatar-md brround cover-image task-icon1" data-image-src="<?php echo e(URL::asset('assets/images/users/9.jpg')); ?>"></span>
										<h6>Purchase Cancellation<small class="float-right text-muted tx-11">28 Jan 2020</small></h6>
										<span class="text-muted tx-12">Order ID: #1905</span>
									</li>
									<li class="mb-0">
										<span class="avatar avatar-md brround cover-image task-icon1 bg-success">M</span>
										<h6>Overdue Shipments<small class="float-right text-muted tx-11">25 Jan 2020</small></h6>
										<span class="text-muted tx-12">Order ID: #8902</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ROW-4 END -->

			<!-- ROW-5 -->
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">New Customers</h3>
						</div>
						<div class="customer-scroll">
							<div class="list-group-item d-flex  align-items-center border-top-0 border-left-0 border-right-0">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo e(URL::asset('assets/images/users/1.jpg')); ?>"></span>
								</div>
								<div class="">
									<div class="font-weight-semibold">Mozelle Belt</div>
									<small class="text-muted">Web Designer
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm btn-default">View</a>
								</div>
							</div>
							<div class="list-group-item d-flex  align-items-center border-left-0 border-right-0">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo e(URL::asset('assets/images/users/13.jpg')); ?>"></span>
								</div>
								<div class="">
									<div class="font-weight-semibold">Thomos</div>
									<small class="text-muted">Web Designer
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm btn-default">View</a>
								</div>
							</div>
							<div class="list-group-item d-flex  align-items-center border-left-0 border-right-0">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo e(URL::asset('assets/images/users/14.jpg')); ?>"></span>
								</div>
								<div class="">
									<div class="font-weight-semibold">Harry Dyer</div>
									<small class="text-muted">Administrator</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm btn-default">View</a>
								</div>
							</div>
							<div class="list-group-item d-flex  align-items-center border-left-0 border-right-0">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo e(URL::asset('assets/images/users/6.jpg')); ?>"></span>
								</div>
								<div class="">
									<div class="font-weight-semibold">Steven Fraser</div>
									<small class="text-muted">Manager
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm btn-default">View</a>
								</div>
							</div>
							<div class="list-group-item d-flex  align-items-center border-left-0 border-right-0">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo e(URL::asset('assets/images/users/3.jpg')); ?>"></span>
								</div>
								<div class="">
									<div class="font-weight-semibold">Jane Clark</div>
									<small class="text-muted">App Designer
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm btn-default">View</a>
								</div>
							</div>
							<div class="list-group-item d-flex  align-items-center border-left-0 border-right-0">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo e(URL::asset('assets/images/users/7.jpg')); ?>"></span>
								</div>
								<div class="">
									<div class="font-weight-semibold">Nicola Parsons</div>
									<small class="text-muted">Web Developer
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm btn-default">View</a>
								</div>
							</div>
						</div>
					</div>
				</div><!-- COL END -->
				<div class="col-lg-8 col-md-12 col-sm-12 col-xl-8">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Top Selling Products</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table card-table border table-vcenter text-nowrap align-items-center">
									<thead class="">
										<tr>
											<th>Product Name</th>
											<th>Category</th>
											<th>Price</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<img src="<?php echo e(URL::asset('assets/images/pngs/1.png')); ?>" alt="img" class="h-7 w-7">
												<p class="d-inline-block align-middle mb-0 ml-1">
													<a href="" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">Arm Chair</a>
													<br>
													<span class="text-muted fs-13">Office Chair</span>
												</p>
											</td>
											<td>Home Accessories</td>
											<td class="font-weight-semibold fs-15">$59.00</td>
											<td><span class="badge badge-danger-light badge-md">Sold</span></td>
											<td>
												<a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
												<a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
											</td>
										</tr>
										<tr>
											<td>
												<img src="<?php echo e(URL::asset('assets/images/pngs/2.png')); ?>" alt="img" class="h-7 w-7">
												<p class="d-inline-block align-middle mb-0 ml-1">
													<a href="" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">Arm Chair</a>
													<br>
													<span class="text-muted fs-13">T-Shirt</span>
												</p>
											</td>
											<td>Mens Wear</td>
											<td class="font-weight-semibold fs-15">$45.00</td>
											<td><span class="badge badge-danger-light badge-md">Sold</span></td>
											<td>
												<a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
												<a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
											</td>
										</tr>
										<tr>
											<td>
												<img src="<?php echo e(URL::asset('assets/images/pngs/3.png')); ?>" alt="img" class="h-7 w-7">
												<p class="d-inline-block align-middle mb-0 ml-1">
													<a href="" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">Arm Chair</a>
													<br>
													<span class="text-muted fs-13">Watch</span>
												</p>
											</td>
											<td>Men Accessories</td>
											<td class="font-weight-semibold fs-15">$123.00</td>
											<td><span class="badge badge-danger-light badge-md">Sold</span></td>
											<td>
												<a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
												<a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
											</td>
										</tr>
										<tr>
											<td>
												<img src="<?php echo e(URL::asset('assets/images/pngs/4.png')); ?>" alt="img" class="h-7 w-7">
												<p class="d-inline-block align-middle mb-0 ml-1">
													<a href="" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">Arm Chair</a>
													<br>
													<span class="text-muted fs-13">Hand Bag</span>
												</p>
											</td>
											<td>Women Accessories</td>
											<td class="font-weight-semibold fs-15">$98.00</td>
											<td><span class="badge badge-danger-light badge-md">Sold</span></td>
											<td>
												<a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
												<a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ROW-5 END -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
		<!-- INTERNAL CHARTJS CHART JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/chart/Chart.bundle.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/chart/utils.js')); ?>"></script>

		<!-- INTERNAL PIETY CHART JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/peitychart/jquery.peity.min.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/peitychart/peitychart.init.js')); ?>"></script>
		<!-- INTERNAL APEXCHART JS -->
		<script src="<?php echo e(URL::asset('assets/js/apexcharts.js')); ?>"></script>

		<!--INTERNAL  INDEX JS -->
		<script src="<?php echo e(URL::asset('assets/js/index1.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Switch Maker\criminalite\resources\views\pages\backoffice\index.blade.php ENDPATH**/ ?>