<?php
$TITLE="Registration";
require_once "header.php";
?>

<!doctype html>
<html lang="en">
<title>Registration</title>

 	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Login/Register</h2>
					<div class="page_link">
						<a href="index.php">Home</a>
						<a href="registration.php">Register</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->
 	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="main_btn" href="#">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
					<h3>Create an Account</h3>
						<form class="row login_form" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="user_name" name="name" placeholder="Name">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="user_email" name="email" placeholder="Email Address">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="user_password" name="password" placeholder="Password">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="confirm_password" name="pass" placeholder="Confirm password">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" id="registerButton" class="btn submit_btn">Register</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
 	<!--================ start footer Area  =================-->
	<?php
	require_once "footer.php";
	?>
	<!--================ End footer Area  =================-->
 	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="users/registration.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="vendors/isotope/isotope-min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="vendors/jquery-ui/jquery-ui.js"></script>
	<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendors/counter-up/jquery.counterup.js"></script>
	<script src="js/theme.js"></script>
</body>
