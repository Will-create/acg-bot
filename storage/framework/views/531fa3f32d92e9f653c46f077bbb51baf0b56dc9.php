
<?php $__env->startSection('css'); ?>
		<!-- INTERNAL  FILE UPLODE CSS -->
		<link href="<?php echo e(URL::asset('assets/plugins/fileuploads/css/fileupload.css')); ?>" rel="stylesheet" type="text/css" />

		<!-- INTERNAL SELECT2 CSS -->
		<link href="<?php echo e(URL::asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />

		<!-- INTERNAL BOOTSTRAP-DATERANGEPICKER CSS -->
		<link rel="stylesheet" href="<?php echo e(URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')); ?>">

		<!-- INTERNAL  TIME PICKER CSS -->
		<link href="<?php echo e(URL::asset('assets/plugins/time-picker/jquery.timepicker.css')); ?>" rel="stylesheet" />

		<!-- INTERNAL  DATE PICKER CSS-->
		<link href="<?php echo e(URL::asset('assets/plugins/date-picker/spectrum.css')); ?>" rel="stylesheet" />

		<!-- INTERNAL  MULTI SELECT CSS -->
		<link rel="stylesheet" href="<?php echo e(URL::asset('assets/plugins/multipleselect/multiple-select.css')); ?>">

		<!-- INTERNAL TELEPHONE CSS-->
		<link rel="stylesheet" href="<?php echo e(URL::asset('assets/plugins/telephoneinput/telephoneinput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
			<!-- PAGE-HEADER -->
			<div class="page-header">
				<div>
					<h1 class="page-title">Form Elements</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Forms</a></li>
						<li class="breadcrumb-item active" aria-current="page">Form Elements</li>
					</ol>
				</div>
				<div class="ml-auto pageheader-btn">
					<a href="#" class="btn btn-primary btn-icon text-white mr-2">
						<span>
							<i class="fe fe-shopping-cart"></i>
						</span> Add Order
					</a>
					<a href="#" class="btn btn-secondary btn-icon text-white">
						<span>
							<i class="fe fe-plus"></i>
						</span> Add User
					</a>
				</div>
			</div>
			<!-- PAGE-HEADER END -->
			<?php $__env->stopSection(); ?>
			<?php $__env->startSection('content'); ?>
			<!-- ROW-1 OPEN -->
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h3 class="mb-0 card-title">Default forms</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" name="input" placeholder="Enter Your Name">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="example-disabled-input" placeholder="Read Only Text area." readonly="">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="example-disabled-input" placeholder="Disabled text area.." disabled="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<input type="text" class="form-control is-valid state-valid" name="example-text-input-valid" placeholder="Valid Email..">
									</div>
									<div class="form-group  has-danger">
										<input type="text" class="form-control is-invalid state-invalid" name="example-text-input-invalid" placeholder="Invalid feedback">
									</div>
									<div class="form-group">
										<input type="password" class="form-control" name="example-password-input" placeholder="Password..">
									</div>
								</div>
								<div class="col-md-12">
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write a large text here ..."></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<h3 class="mb-0 card-title">Default forms with labels</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Enter Name</label>
										<input type="text" class="form-control" name="example-text-input" placeholder="Name">
									</div>
									<div class="form-group">
										<label class="form-label">Disabled</label>
										<input type="text" class="form-control" name="example-disabled-input" placeholder="Disabled text area.." value="" disabled="">
									</div>
									<div class="form-group">
										<label class="form-label">Readonly</label>
										<input type="text" class="form-control" name="example-disabled-input" placeholder="Read Only Text area." readonly="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Valid Email</label>
										<input type="text" class="form-control is-valid state-valid" name="example-text-input-valid" placeholder="Valid Email..">
									</div>
									<div class="form-group m-0">
										<label class="form-label">Invalid Number</label>
										<input type="text" class="form-control is-invalid state-invalid" name="example-text-input-invalid" placeholder="Invalid Number..">
										<div class="invalid-feedback">Invalid feedback</div>
									</div>
									<div class="form-group">
										<label class="form-label">Password</label>
										<input type="password" class="form-control" name="example-password-input" placeholder="Password..">
									</div>
								</div>
								<div class="col-md-12 ">
									<div class="form-group mb-0">
										<label class="form-label">Message</label>
										<textarea class="form-control" name="example-textarea-input" rows="4" placeholder="text here.."></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- COL END -->
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Input Forms</h3>
						</div>
						<div class="card-body">

							<div class="form-group">
								<label class="form-label">Text</label>
								<input type="text" class="form-control" name="example-text-input" placeholder="Text..">
							</div>

							<div class="form-group">
								<label class="form-label">Country</label>
								<select name="country" id="select-countries" class="form-control custom-select">
									<option value="br" data-data="{&quot;image&quot;: &quot;<?php echo e(URL::asset('assets/images/flags/br.svg&quot;')); ?>}">Brazil</option>
									<option value="cz" data-data="{&quot;image&quot;: &quot;<?php echo e(URL::asset('assets/images/flags/cz.svg&quot;')); ?>}">Czech Republic</option>
									<option value="de" data-data="{&quot;image&quot;: &quot;<?php echo e(URL::asset('assets/images/flags/de.svg&quot;')); ?>}">Germany</option>
									<option value="pl" data-data="{&quot;image&quot;: &quot;<?php echo e(URL::asset('assets/images/flags/pl.svg&quot;')); ?>}" selected="">Poland</option>
								</select>
							</div>
							<div class="form-group">
								<label class="form-label">Input group</label>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-append">
										<button class="btn btn-primary" type="button">Go!</button>
									</span>
								</div>
							</div>
							<div class="form-group mb-0">
								<label class="form-label">Input group buttons</label>
								<div class="input-group">
									<input type="text" class="form-control">
									<div class="input-group-append">
										<button type="button" class="btn btn-primary">Action</button>
										<button data-toggle="dropdown" type="button" class="btn btn-primary dropdown-toggle"></button>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="javascript:void(0)">News</a>
											<a class="dropdown-item" href="javascript:void(0)">Messages</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="javascript:void(0)">Edit Profile</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- COL END -->
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Input Forms</h3>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label class="form-label">Separated inputs</label>
								<div class="row gutters-xs">
									<div class="col">
										<input type="text" class="form-control" placeholder="Search for...">
									</div>
									<span class="col-auto">
										<button class="btn btn-primary" type="button"><i class="fe fe-search"></i></button>
									</span>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">ZIP Code</label>
								<div class="row gutters-sm">
									<div class="col">
										<input type="text" class="form-control" placeholder="Search for...">
									</div>
									<span class="col-auto align-self-center">
										<span class="form-help" data-toggle="popover" data-placement="top" data-content="<p>ZIP Code must be US or CDN format. You can use an extended ZIP+4 code to determine address more accurately.</p>
																<p class='mb-0'><a href=''>USP ZIP codes lookup tools</a></p>
																" data-original-title="" title="">?</span>
									</span>
								</div>
							</div>
							<div class="form-group">
								<div class="form-label">Bootstrap's Custom File Input</div>
								<div class="input-group file-browser">
									<input type="text" class="form-control border-right-0 browse-file" placeholder="choose" readonly>
									<label class="input-group-btn">
										<span class="btn btn-primary">
											Browse <input type="file" style="display: none;" multiple>
										</span>
									</label>
								</div>
							</div>
							<div class="form-group m-0">
								<label class="form-label">Date of birth</label>
								<div class="row gutters-xs">
									<div class="col-5">
										<select name="user[month]" class="form-control custom-select select2">
											<option value="">Month</option>
											<option value="1">January</option>
											<option value="2">February</option>
											<option value="3">March</option>
											<option value="4">April</option>
											<option value="5">May</option>
											<option selected="selected" value="6">June</option>
											<option value="7">July</option>
											<option value="8">August</option>
											<option value="9">September</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
										</select>
									</div>
									<div class="col-3">
										<select name="user[day]" class="form-control custom-select select2">
											<option value="">Day</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option selected="selected" value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
										</select>
									</div>
									<div class="col-4">
										<select name="user[year]" class="form-control custom-select select2">
											<option value="">Year</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
											<option value="2011">2011</option>
											<option value="2010">2010</option>
											<option value="2009">2009</option>
											<option value="2008">2008</option>
											<option value="2007">2007</option>
											<option value="2006">2006</option>
											<option value="2005">2005</option>
											<option value="2004">2004</option>
											<option value="2003">2003</option>
											<option value="2002">2002</option>
											<option value="2001">2001</option>
											<option value="2000">2000</option>
											<option value="1999">1999</option>
											<option value="1998">1998</option>
											<option value="1997">1997</option>
											<option value="1996">1996</option>
											<option value="1995">1995</option>
											<option value="1994">1994</option>
											<option value="1993">1993</option>
											<option value="1992">1992</option>
											<option value="1991">1991</option>
											<option value="1990">1990</option>
											<option selected="selected" value="1989">1989</option>
											<option value="1988">1988</option>
											<option value="1987">1987</option>
											<option value="1986">1986</option>
											<option value="1985">1985</option>
											<option value="1984">1984</option>
											<option value="1983">1983</option>
											<option value="1982">1982</option>
											<option value="1981">1981</option>
											<option value="1980">1980</option>
											<option value="1979">1979</option>
											<option value="1978">1978</option>
											<option value="1977">1977</option>
											<option value="1976">1976</option>
											<option value="1975">1975</option>
											<option value="1974">1974</option>
											<option value="1973">1973</option>
											<option value="1972">1972</option>
											<option value="1971">1971</option>
											<option value="1970">1970</option>
											<option value="1969">1969</option>
											<option value="1968">1968</option>
											<option value="1967">1967</option>
											<option value="1966">1966</option>
											<option value="1965">1965</option>
											<option value="1964">1964</option>
											<option value="1963">1963</option>
											<option value="1962">1962</option>
											<option value="1961">1961</option>
											<option value="1960">1960</option>
											<option value="1959">1959</option>
											<option value="1958">1958</option>
											<option value="1957">1957</option>
											<option value="1956">1956</option>
											<option value="1955">1955</option>
											<option value="1954">1954</option>
											<option value="1953">1953</option>
											<option value="1952">1952</option>
											<option value="1951">1951</option>
											<option value="1950">1950</option>
											<option value="1949">1949</option>
											<option value="1948">1948</option>
											<option value="1947">1947</option>
											<option value="1946">1946</option>
											<option value="1945">1945</option>
											<option value="1944">1944</option>
											<option value="1943">1943</option>
											<option value="1942">1942</option>
											<option value="1941">1941</option>
											<option value="1940">1940</option>
											<option value="1939">1939</option>
											<option value="1938">1938</option>
											<option value="1937">1937</option>
											<option value="1936">1936</option>
											<option value="1935">1935</option>
											<option value="1934">1934</option>
											<option value="1933">1933</option>
											<option value="1932">1932</option>
											<option value="1931">1931</option>
											<option value="1930">1930</option>
											<option value="1929">1929</option>
											<option value="1928">1928</option>
											<option value="1927">1927</option>
											<option value="1926">1926</option>
											<option value="1925">1925</option>
											<option value="1924">1924</option>
											<option value="1923">1923</option>
											<option value="1922">1922</option>
											<option value="1921">1921</option>
											<option value="1920">1920</option>
											<option value="1919">1919</option>
											<option value="1918">1918</option>
											<option value="1917">1917</option>
											<option value="1916">1916</option>
											<option value="1915">1915</option>
											<option value="1914">1914</option>
											<option value="1913">1913</option>
											<option value="1912">1912</option>
											<option value="1911">1911</option>
											<option value="1910">1910</option>
											<option value="1909">1909</option>
											<option value="1908">1908</option>
											<option value="1907">1907</option>
											<option value="1906">1906</option>
											<option value="1905">1905</option>
											<option value="1904">1904</option>
											<option value="1903">1903</option>
											<option value="1902">1902</option>
											<option value="1901">1901</option>
											<option value="1900">1900</option>
											<option value="1899">1899</option>
											<option value="1898">1898</option>
											<option value="1897">1897</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- COL END -->
			</div>
			<!-- ROW-1 CLOSED -->

			<!-- ROW-2 OPEN -->
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Inputs Heights</h3>
						</div>
						<div class=" card-body">
							<input class="form-control input-lg" type="text" placeholder="input-lg">
							<br>
							<input class="form-control" type="text" placeholder="Default input">
							<br>
							<input class="form-control input-sm" type="text" placeholder="input-sm"><br>
							<h3 class="card-title">Select Inputs Heights</h3>
							<div class="form-group">
								<select name="options" id="options" class="form-control select-lg custom-select">
									<option value="1" selected="">Select input-lg</option>
									<option value="2">option1</option>
									<option value="3">option2</option>
									<option value="4">option3</option>
								</select>
							</div>
							<div class="form-group">
								<select name="options" id="options1" class="form-control custom-select">
									<option value="1" selected="">Select Defalut-input</option>
									<option value="2">option1</option>
									<option value="3">option2</option>
									<option value="4">option3</option>
								</select>
							</div>
							<div class="form-group">
								<select name="options" id="options2" class="form-control select-sm custom-select">
									<option value="1" selected="">Select input-sm</option>
									<option value="2">option1</option>
									<option value="3">option2</option>
									<option value="4">option3</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<form method="post" class="card">
						<div class="card-header">
							<h3 class="card-title">Toggles& Switches & Radios and Checkboxes</h3>
						</div>
						<div class=" card-body">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<div class="form-label">Toggle switch single</div>
										<label class="custom-switch">
											<input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
											<span class="custom-switch-indicator"></span>
											<span class="custom-switch-description">I agree with terms and conditions</span>
										</label>
									</div>
									<div class="form-group ">
										<label class="form-label">Your skills</label>
										<div class="selectgroup selectgroup-pills">
											<label class="selectgroup-item">
												<input type="checkbox" name="value" value="HTML" class="selectgroup-input" checked="">
												<span class="selectgroup-button">HTML</span>
											</label>
											<label class="selectgroup-item">
												<input type="checkbox" name="value" value="CSS" class="selectgroup-input">
												<span class="selectgroup-button">CSS</span>
											</label>
											<label class="selectgroup-item">
												<input type="checkbox" name="value" value="PHP" class="selectgroup-input">
												<span class="selectgroup-button">PHP</span>
											</label>
											<label class="selectgroup-item">
												<input type="checkbox" name="value" value="JavaScript" class="selectgroup-input">
												<span class="selectgroup-button">JavaScript</span>
											</label>
											<label class="selectgroup-item">
												<input type="checkbox" name="value" value="Angular" class="selectgroup-input">
												<span class="selectgroup-button">Angular</span>
											</label>
											<label class="selectgroup-item">
												<input type="checkbox" name="value" value="Java" class="selectgroup-input">
												<span class="selectgroup-button">Java</span>
											</label>
											<label class="selectgroup-item">
												<input type="checkbox" name="value" value="C++" class="selectgroup-input">
												<span class="selectgroup-button">C++</span>
											</label>
										</div>
									</div>
									<div class="form-group m-0">
										<label class="form-label">Select Color</label>
										<div class="row gutters-xs">
											<div class="col-auto">
												<label class="colorinput">
													<input name="color" type="checkbox" value="azure" class="colorinput-input" checked />
													<span class="colorinput-color bg-azure"></span>
												</label>
											</div>
											<div class="col-auto">
												<label class="colorinput">
													<input name="color" type="checkbox" value="indigo" class="colorinput-input" />
													<span class="colorinput-color bg-indigo"></span>
												</label>
											</div>
											<div class="col-auto">
												<label class="colorinput">
													<input name="color" type="checkbox" value="purple" class="colorinput-input" />
													<span class="colorinput-color bg-purple"></span>
												</label>
											</div>
											<div class="col-auto">
												<label class="colorinput">
													<input name="color" type="checkbox" value="pink" class="colorinput-input" />
													<span class="colorinput-color bg-pink"></span>
												</label>
											</div>
											<div class="col-auto">
												<label class="colorinput">
													<input name="color" type="checkbox" value="red" class="colorinput-input" />
													<span class="colorinput-color bg-red"></span>
												</label>
											</div>
											<div class="col-auto">
												<label class="colorinput">
													<input name="color" type="checkbox" value="orange" class="colorinput-input" />
													<span class="colorinput-color bg-orange"></span>
												</label>
											</div>
											<div class="col-auto">
												<label class="colorinput">
													<input name="color" type="checkbox" value="yellow" class="colorinput-input" />
													<span class="colorinput-color bg-yellow"></span>
												</label>
											</div>
											<div class="col-auto">
												<label class="colorinput">
													<input name="color" type="checkbox" value="lime" class="colorinput-input" />
													<span class="colorinput-color bg-lime"></span>
												</label>
											</div>
											<div class="col-auto">
												<label class="colorinput">
													<input name="color" type="checkbox" value="green" class="colorinput-input" />
													<span class="colorinput-color bg-green"></span>
												</label>
											</div>
											<div class="col-auto">
												<label class="colorinput">
													<input name="color" type="checkbox" value="teal" class="colorinput-input" />
													<span class="colorinput-color bg-teal"></span>
												</label>
											</div>
										</div>
									</div>
								</div><!-- COL END -->
								<div class="col-md-6 col-lg-6">
									<div class="form-group form-elements">
										<div class="form-label">Radios</div>
										<div class="custom-controls-stacked">
											<label class="custom-control custom-radio">
												<input type="radio" class="custom-control-input" name="example-radios" value="option1" checked>
												<span class="custom-control-label">Option 1</span>
											</label>
											<label class="custom-control custom-radio">
												<input type="radio" class="custom-control-input" name="example-radios" value="option2">
												<span class="custom-control-label">Option 2</span>
											</label>
											<label class="custom-control custom-radio">
												<input type="radio" class="custom-control-input" name="example-radios" value="option3" disabled>
												<span class="custom-control-label">Option Disabled</span>
											</label>
											<label class="custom-control custom-radio">
												<input type="radio" class="custom-control-input" name="example-radios2" value="option4" disabled checked>
												<span class="custom-control-label">Option Disabled Checked</span>
											</label>
										</div>
									</div>
									<div class="form-group form-elements m-0">
										<div class="form-label">Checkboxes</div>
										<div class="custom-controls-stacked">
											<label class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked>
												<span class="custom-control-label">Option 1</span>
											</label>
											<label class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
												<span class="custom-control-label">Option 2</span>
											</label>
											<label class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" name="example-checkbox3" value="option3" disabled>
												<span class="custom-control-label">Option Disabled</span>
											</label>
											<label class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" name="example-checkbox4" value="option4" checked disabled>
												<span class="custom-control-label">Option Disabled Checked</span>
											</label>
										</div>
									</div>
								</div><!-- COL END -->
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- ROW-2 CLOSED -->

			<!-- ROW-3 OPEN -->
			<div class="row">
				<div class="col-lg-6">
					<div class="card shadow">
						<div class="card-header">
							<h3 class="mb-0 card-title">File upload</h3>
						</div>
						<div class="card-body">
							<input type="file" class="dropify" data-height="300" />
						</div>
					</div>
				</div><!-- COL END -->
				<div class="col-lg-6">
					<div class="card shadow">
						<div class="card-header">
							<h3 class="mb-0 card-title">File Upload with Default Image</h3>
						</div>
						<div class="card-body">
							<input type="file" class="dropify" data-default-file="<?php echo e(URL::asset('assets/images/media/1.jpg')); ?>" data-height="300" />
						</div>
					</div>
				</div><!-- COL END -->
			</div>
			<!-- ROW-3 CLOSED -->

			<!-- ROW-4 OPEN -->
			<div class="row">
				<div class="col-lg-6">
					<div class="card shadow">
						<div class="card-header">
							<h3 class="mb-0 card-title">Disabled File Upload</h3>
						</div>
						<div class="card-body">
							<input type="file" class="dropify" disabled="disabled" />
						</div>
					</div>
				</div><!-- COL END -->
				<div class="col-lg-6">
					<div class="card shadow">
						<div class="card-header">
							<h3 class="mb-0 card-title">File Upload with limit size of 1M</h3>
						</div>
						<div class="card-body">
							<input type="file" class="dropify" data-max-file-size="1M" />
						</div>
					</div>
				</div><!-- COL END -->
			</div>
			<!-- ROW-4 CLOSED -->

			<!-- ROW-5 OPEN -->
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">MutipleSelect Styles</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Basic MutipleSelect</label>
										<select multiple="multiple" class="multi-select">
											<option value="1">January</option>
											<option value="2">February</option>
											<option value="3">March</option>
											<option value="4">April</option>
											<option value="5">May</option>
											<option value="6">June</option>
											<option value="7">July</option>
											<option value="8">August</option>
											<option value="9">September</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
										</select>
									</div>
									<div class="form-group">
										<label>Disabled MutipleSelect</label>
										<select multiple="multiple" class="multi-select" disabled="disabled">
											<option value="1">January</option>
											<option value="2">February</option>
											<option value="3">March</option>
											<option value="4">April</option>
											<option value="5">May</option>
											<option value="6">June</option>
											<option value="7">July</option>
											<option value="8">August</option>
											<option value="9">September</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
										</select>
									</div>
									<div class="form-group">
										<label>Single Group Disabled MutipleSelect</label>
										<select multiple="multiple" class="multi-select">
											<optgroup label="Group 1" disabled="disabled">
												<option value="1">Option 1</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
												<option value="4">Option 4</option>
												<option value="5">Option 5</option>
											</optgroup>
											<optgroup label="Group 2">
												<option value="1">Option 1</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
												<option value="4">Option 4</option>
												<option value="5">Option 5</option>
												<option value="6">Option 6</option>
												<option value="7">Option 7</option>
												<option value="8">Option 8</option>
											</optgroup>
											<optgroup label="Group 3">
												<option value="1">Option 1</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
												<option value="4">Option 4</option>
												<option value="5">Option 5</option>
												<option value="6">Option 6</option>
												<option value="7">Option 7</option>
												<option value="8">Option 8</option>
												<option value="9">Option 9</option>
											</optgroup>
										</select>
									</div>
									<div class="form-group">
										<label>Multiple Items With Group-Option</label>
										<select multiple="multiple" class="optmulti-select">
											<optgroup label="Group 1">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</optgroup>
											<optgroup label="Group 2">
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
											</optgroup>
											<optgroup label="Group 3">
												<option value="11">11</option>
												<option value="12">12</option>
												<option value="13">13</option>
												<option value="14">14</option>
												<option value="15">15</option>
											</optgroup>
										</select>
									</div>
									<div class="form-group mb-0">
										<label>Group-Option Filter</label>
										<select multiple="multiple" class="group-filter">
											<optgroup label="Group 1">
												<option value="1">Option 1</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
												<option value="4">Option 4</option>
												<option value="5">Option 5</option>
											</optgroup>
											<optgroup label="Group 2">
												<option value="1">Option 1</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
												<option value="4">Option 4</option>
												<option value="5">Option 5</option>
												<option value="6">Option 6</option>
												<option value="7">Option 7</option>
												<option value="8">Option 8</option>
											</optgroup>
											<optgroup label="Group 3">
												<option value="1">Option 1</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
												<option value="4">Option 4</option>
												<option value="5">Option 5</option>
												<option value="6">Option 6</option>
												<option value="7">Option 7</option>
												<option value="8">Option 8</option>
												<option value="9">Option 9</option>
											</optgroup>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Group-Option MutipleSelect</label>
										<select multiple="multiple" class="multi-select">
											<optgroup label="Group 1">
												<option value="1">Option 1</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
												<option value="4">Option 4</option>
												<option value="5">Option 5</option>
											</optgroup>
											<optgroup label="Group 2">
												<option value="1">Option 1</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
												<option value="4">Option 4</option>
												<option value="5">Option 5</option>
												<option value="6">Option 6</option>
												<option value="7">Option 7</option>
												<option value="8">Option 8</option>
											</optgroup>
											<optgroup label="Group 3">
												<option value="1">Option 1</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
												<option value="4">Option 4</option>
												<option value="5">Option 5</option>
												<option value="6">Option 6</option>
												<option value="7">Option 7</option>
												<option value="8">Option 8</option>
												<option value="9">Option 9</option>
											</optgroup>
										</select>
									</div>

									<div class="form-group">
										<label>Multiple Items</label>
										<select multiple="multiple" class="multiselect">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
										</select>
									</div>
									<div class="form-group">
										<label>Hide SelectAll</label>
										<select multiple="multiple" class="hide-select">
											<option value="1">First</option>
											<option value="2">Second</option>
											<option value="3">Third</option>
											<option value="4">Fourth</option>
										</select>
									</div>
									<div class="form-group">
										<label>Select Filter</label>
										<select multiple="multiple" class="filter-multi">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
										</select>
									</div>
									<div class="form-group mb-0">
										<label>Custom Style</label>
										<select multiple="multiple" class="custom-multiselect">
											<option value="1">January</option>
											<option value="2">February</option>
											<option value="3">March</option>
											<option value="4">April</option>
											<option value="5">May</option>
											<option value="6">June</option>
											<option value="7">July</option>
											<option value="8">August</option>
											<option value="9">September</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ROW-5 CLOSED -->

			<!-- ROW-6 OPEN -->
			<div class="row">
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Telephone Input</h3>
						</div>
						<div class=" card-body">
							<p class="fs-12 text-muted">A JavaScript plugin for entering and validating international telephone numbers. It adds a flag dropdown to any input, detects the user's country, displays a relevant placeholder and provides formatting/validation methods.</p>
							<div class="input-group w-100">
								<input class="form-control" id="phone" name="phone" type="tel">
								<span class="input-group-append">
									<button class="btn btn-primary" type="button">Submit</button>
								</span>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<div class="card-title">Switches </div>
						</div>
						<div class="card-body">
							<ul class="list-group">
								<li class="list-group-item">
									Bootstrap Switch Default
									<div class="material-switch pull-right">
										<input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox" />
										<label for="someSwitchOptionDefault" class="label-default"></label>
									</div>
								</li>
								<li class="list-group-item">
									Bootstrap Switch Primary
									<div class="material-switch pull-right">
										<input id="someSwitchOptionPrimary" name="someSwitchOption001" type="checkbox" />
										<label for="someSwitchOptionPrimary" class="label-primary"></label>
									</div>
								</li>
								<li class="list-group-item">
									Bootstrap Switch Success
									<div class="material-switch pull-right">
										<input id="someSwitchOptionSuccess" name="someSwitchOption001" type="checkbox" />
										<label for="someSwitchOptionSuccess" class="label-success"></label>
									</div>
								</li>
								<li class="list-group-item">
									Bootstrap Switch Info
									<div class="material-switch pull-right">
										<input id="someSwitchOptionInfo" name="someSwitchOption001" type="checkbox" />
										<label for="someSwitchOptionInfo" class="label-info"></label>
									</div>
								</li>
								<li class="list-group-item">
									Bootstrap Switch Warning
									<div class="material-switch pull-right">
										<input id="someSwitchOptionWarning" name="someSwitchOption001" type="checkbox" />
										<label for="someSwitchOptionWarning" class="label-warning"></label>
									</div>
								</li>
								<li class="list-group-item">
									Bootstrap Switch Danger
									<div class="material-switch pull-right">
										<input id="someSwitchOptionDanger" name="someSwitchOption001" type="checkbox" />
										<label for="someSwitchOptionDanger" class="label-danger"></label>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div><!-- COL END -->
				<div class="col-lg-6">
					<form method="post" class="card">
						<div class="card-header">
							<h3 class="card-title">Select2 elements</h3>
						</div>
						<div class="card-body ">
							<p class="text-muted">Select2 gives you a customizable select box many other highly used options.</p>
							<div class="form-group ">
								<label class="form-label mt-0">Beast</label>
								<select class="form-control select2 custom-select" data-placeholder="Choose one">
									<option label="Choose one">
									</option>
									<option value="1">Chuck Testa</option>
									<option value="2">Sage Cattabriga-Alosa</option>
									<option value="3">Nikola Tesla</option>
									<option value="4">Cattabriga-Alosa</option>
									<option value="5">Nikola Alosa</option>
								</select>
							</div>
							<div class="form-group ">
								<label class="form-label mt-0">Disabled</label>
								<select class="form-control select2 custom-select" disabled="disabled">
									<option label="Choose one">
									</option>
									<option value="1">Chuck Testa</option>
									<option value="2">Sage Cattabriga-Alosa</option>
									<option value="3">Nikola Tesla</option>
									<option value="4">Cattabriga-Alosa</option>
									<option value="5">Nikola Alosa</option>
								</select>
							</div>
							<div class="form-group">
								<label class="form-label">Basic Select2</label>
								<select class="form-control select2" data-placeholder="Choose one (with optgroup)">
									<optgroup label="Mountain Time Zone">
										<option value="AZ">Arizona</option>
										<option value="CO">Colorado</option>
										<option value="ID">Idaho</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NM">New Mexico</option>
										<option value="ND">North Dakota</option>
										<option value="UT">Utah</option>
										<option value="WY">Wyoming</option>
									</optgroup>
									<optgroup label="Central Time Zone">
										<option value="AL">Alabama</option>
										<option value="AR">Arkansas</option>
										<option value="IL">Illinois</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="OK">Oklahoma</option>
										<option value="SD">South Dakota</option>
										<option value="TX">Texas</option>
										<option value="TN">Tennessee</option>
										<option value="WI">Wisconsin</option>
									</optgroup>
								</select>
							</div>
							<div class="form-group">
								<label class="form-label"> Select2 with search box</label>
								<select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
									<optgroup label="Mountain Time Zone">
										<option value="AZ">Arizona</option>
										<option value="CO">Colorado</option>
										<option value="ID">Idaho</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NM">New Mexico</option>
										<option value="ND">North Dakota</option>
										<option value="UT">Utah</option>
										<option value="WY">Wyoming</option>
									</optgroup>
									<optgroup label="Central Time Zone">
										<option value="AL">Alabama</option>
										<option value="AR">Arkansas</option>
										<option value="IL">Illinois</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="OK">Oklahoma</option>
										<option value="SD">South Dakota</option>
										<option value="TX">Texas</option>
										<option value="TN">Tennessee</option>
										<option value="WI">Wisconsin</option>
									</optgroup>
								</select>
							</div>
							<div class="form-group">
								<label class="form-label"> Select2 with Country</label>
								<select class="form-control select2-flag-search" data-placeholder="Select Contry">
									<option value="AF">Afghanistan</option>
									<option value="AL">Albania</option>
									<option value="AD">Andorra</option>
									<option value="AG">Antigua and Barbuda</option>
									<option value="AU">Australia</option>
									<option value="AM">Armenia</option>
									<option value="AO">Angola</option>
									<option value="AR">Argentina</option>
									<option value="AT">Austria</option>
									<option value="AZ">Azerbaijan</option>
									<option value="BA">Bosnia and Herzegovina</option>
									<option value="BB">Barbados</option>
									<option value="BD">Bangladesh</option>
									<option value="BE">Belgium</option>
									<option value="BF">Burkina Faso</option>
									<option value="BG">Bulgaria</option>
									<option value="BH">Bahrain</option>
									<option value="BJ">Benin</option>
									<option value="BN">Brunei</option>
									<option value="BO">Bolivia</option>
									<option value="BT">Bhutan</option>
									<option value="BY">Belarus</option>
									<option value="CD">Congo</option>
									<option value="CA">Canada</option>
									<option value="CF">Central African Republic</option>
									<option value="CI">Cote d'Ivoire</option>
									<option value="CL">Chile</option>
									<option value="CM">Cameroon</option>
									<option value="CN">China</option>
									<option value="CO">Colombia</option>
									<option value="CU">Cuba</option>
									<option value="CV">Cabo Verde</option>
									<option value="CY">Cyprus</option>
									<option value="DJ">Djibouti</option>
									<option value="DK">Denmark</option>
									<option value="DM">Dominica</option>
									<option value="DO">Dominican Republic</option>
									<option value="EC">Ecuador</option>
									<option value="EE">Estonia</option>
									<option value="ER">Eritrea</option>
									<option value="ET">Ethiopia</option>
									<option value="FI">Finland</option>
									<option value="FJ">Fiji</option>
									<option value="FR">France</option>
									<option value="GA">Gabon</option>
									<option value="GD">Grenada</option>
									<option value="GE">Georgia</option>
									<option value="GH">Ghana</option>
									<option value="GH">Ghana</option>
									<option value="HN">Honduras</option>
									<option value="HT">Haiti</option>
									<option value="HU">Hungary</option>
									<option value="ID">Indonesia</option>
									<option value="IE">Ireland</option>
									<option value="IL">Israel</option>
									<option value="IN">India</option>
									<option value="IQ">Iraq</option>
									<option value="IR">Iran</option>
									<option value="IS">Iceland</option>
									<option value="IT">Italy</option>
									<option value="JM">Jamaica</option>
									<option value="JO">Jordan</option>
									<option value="JP">Japan</option>
									<option value="KE">Kenya</option>
									<option value="KG">Kyrgyzstan</option>
									<option value="KI">Kiribati</option>
									<option value="KW">Kuwait</option>
									<option value="KZ">Kazakhstan</option>
									<option value="LA">Laos</option>
									<option value="LB">Lebanons</option>
									<option value="LI">Liechtenstein</option>
									<option value="LR">Liberia</option>
									<option value="LS">Lesotho</option>
									<option value="LT">Lithuania</option>
									<option value="LU">Luxembourg</option>
									<option value="LV">Latvia</option>
									<option value="LY">Libya</option>
									<option value="MA">Morocco</option>
									<option value="MC">Monaco</option>
									<option value="MD">Moldova</option>
									<option value="ME">Montenegro</option>
									<option value="MG">Madagascar</option>
									<option value="MH">Marshall Islands</option>
									<option value="MK">Macedonia (FYROM)</option>
									<option value="ML">Mali</option>
									<option value="MM">Myanmar (formerly Burma)</option>
									<option value="MN">Mongolia</option>
									<option value="MR">Mauritania</option>
									<option value="MT">Malta</option>
									<option value="MV">Maldives</option>
									<option value="MW">Malawi</option>
									<option value="MX">Mexico</option>
									<option value="MZ">Mozambique</option>
									<option value="NA">Namibia</option>
									<option value="NG">Nigeria</option>
									<option value="NO">Norway</option>
									<option value="NP">Nepal</option>
									<option value="NR">Nauru</option>
									<option value="NZ">New Zealand</option>
									<option value="OM">Oman</option>
									<option value="PA">Panama</option>
									<option value="PF">Paraguay</option>
									<option value="PG">Papua New Guinea</option>
									<option value="PH">Philippines</option>
									<option value="PK">Pakistan</option>
									<option value="PL">Poland</option>
									<option value="QA">Qatar</option>
									<option value="RO">Romania</option>
									<option value="RU">Russia</option>
									<option value="RW">Rwanda</option>
									<option value="SA">Saudi Arabia</option>
									<option value="SB">Solomon Islands</option>
									<option value="SC">Seychelles</option>
									<option value="SD">Sudan</option>
									<option value="SE">Sweden</option>
									<option value="SG">Singapore</option>
									<option value="TG">Togo</option>
									<option value="TH">Thailand</option>
									<option value="TJ">Tajikistan</option>
									<option value="TL">Timor-Leste</option>
									<option value="TM">Turkmenistan</option>
									<option value="TN">Tunisia</option>
									<option value="TO">Tonga</option>
									<option value="TR">Turkey</option>
									<option value="TT">Trinidad and Tobago</option>
									<option value="TW">Taiwan</option>
									<option value="UA">Ukraine</option>
									<option value="UG">Uganda</option>
									<option value="UM">United States of America</option>
									<option value="UY">Uruguay</option>
									<option value="UZ">Uzbekistan</option>
									<option value="VA">Vatican City (Holy See)</option>
									<option value="VE">Venezuela</option>
									<option value="VN">Vietnam</option>
									<option value="VU">Vanuatu</option>
									<option value="YE">Yemen</option>
									<option value="ZM">Zambia</option>
									<option value="ZW">Zimbabwe</option>
								</select>
							</div>
							<div class="form-group">
								<label class="form-label">Multiple Select with Pre-Filled Input</label>
								<select class="form-control select2" data-placeholder="Choose Browser" multiple>
									<option value="Firefox">
										Firefox
									</option>
									<option value="Chrome selected">
										Chrome
									</option>
									<option value="Safari">
										Safari
									</option>
									<option selected value="Opera">
										Opera
									</option>
									<option value="Internet Explorer">
										Internet Explorer
									</option>
								</select>
							</div>
						</div>
					</form>
				</div><!-- COL END -->
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Time Picker</h3>
						</div>
						<div class=" card-body">
							<label>Default Time Picker:</label>
							<div class="wd-150 mg-b-30">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
										</div>
									</div><!-- input-group-prepend -->
									<input class="form-control" id="tpBasic" placeholder="Set time" type="text">
								</div>
							</div><!-- wd-150 -->
							<label class="mt-4">Set the scroll position to local time if no value selected:</label>
							<div class="wd-150 mg-b-30">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
										</div><!-- input-group-text -->
									</div><!-- input-group-prepend -->
									<input class="form-control" id="tp2" placeholder="Set time" type="text">
								</div>
							</div><!-- wd-150 -->
							<label class="mt-4 ">Dynamically set the time using a Javascript Date object:</label>
							<div class="d-flex">
								<div class="input-group wd-150">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
										</div><!-- input-group-text -->
									</div><!-- input-group-prepend -->
									<input class="form-control" id="tp3" placeholder="Set time" type="text">
									<button class="btn btn btn-primary br-tl-0 br-bl-0" id="setTimeButton">Set Current Time</button>
								</div><!-- input-group -->
							</div>
						</div>
					</div>
				</div><!-- COL END -->
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Color Picker</h3>
						</div>
						<div class=" card-body">
							<p class=" mb-1">A simple component to select color in the same way you select color in Adobe Photoshop.</p><input id="colorpicker" type="text">
							<p class="mt-3  mb-1">You can allow alpha transparency selection. Check out these example.</p><input id="showAlpha" type="text">
							<p class="mt-4 mb-1">Show pallete only. If you'd like, spectrum can show the palettes you specify, and nothing else.</p><input id="showPaletteOnly" type="text">
						</div>
					</div>
				</div><!-- COL END -->
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Date Range Picker</div>
						</div>
						<div class="card-body">
							<div class="input-group">
								<div class="input-group-text">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control pull-right" id="reservation">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Single Month Display Date Picker</div>
						</div>
						<div class="card-body">
							<p class="mg-b-20 mg-sm-b-40">The datepicker is tied to a standard form input field. Click on the input to open an interactive calendar in a small overlay. If a date is chosen, feedback is shown as the input's value.</p>
							<div class="wd-200 mg-b-30">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
										</div>
									</div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text">
								</div>
							</div>
						</div>
					</div>
				</div><!-- COL END -->
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Multiple Months Display Date Picker</div>
						</div>
						<div class="card-body">
							<p class="mg-b-20 mg-sm-b-40">The datepicker is tied to a standard form input field. Click on the input to open an interactive calendar in a small overlay. If a date is chosen, feedback is shown as the input's value.</p>
							<div class="wd-200 mg-b-30">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
										</div>
									</div><input class="form-control" id="datepickerNoOfMonths" placeholder="MM/DD/YYYY" type="text">
								</div>
							</div>
						</div>
					</div>
				</div><!-- COL END -->
			</div>
			<!-- ROW-6 CLOSED -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
		<!-- INTERNAL  FILE UPLOADES JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/fileuploads/js/fileupload.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/fileuploads/js/file-upload.js')); ?>"></script>

		<!-- INTERNAL SELECT2 JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>

		<!-- INTERNAL BOOTSTRAP-DATERANGEPICKER JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/bootstrap-daterangepicker/moment.min.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>

		<!-- INTERNAL  TIMEPICKER JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/time-picker/jquery.timepicker.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/time-picker/toggles.min.js')); ?>"></script>

		<!-- INTERNAL DATEPICKER JS-->
		<script src="<?php echo e(URL::asset('assets/plugins/date-picker/spectrum.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/date-picker/jquery-ui.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/input-mask/jquery.maskedinput.js')); ?>"></script>

		<!-- INTERNAL MULTI SELECT JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/multipleselect/multiple-select.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/multipleselect/multi-select.js')); ?>"></script>

		<!--INTERNAL  FORMELEMENTS JS -->
		<script src="<?php echo e(URL::asset('assets/js/form-elements.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/js/select2.js')); ?>"></script>

		<!-- INTERNAL TELEPHONE JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/telephoneinput/telephoneinput.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Switch Maker\criminalite\resources\views\pages\backoffice\form-elements.blade.php ENDPATH**/ ?>