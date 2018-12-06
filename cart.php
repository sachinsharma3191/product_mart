<?php
$TITLE="Cart";
require_once "header.php";
include "storescripts/connect_to_mysql.php";
?>
<?php

?>
<!doctype html>
<html lang="en">
<title>Cart</title>
	<!--================Header Menu Area =================-->

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Shopping Cart</h2>
					<div class="page_link">
						<a href="index.php">Home</a>
						<a href="cart.php">Cart</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Cart Area =================-->
	<section class="cart_area">
		<div class="container">
			<div class="cart_inner">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product Name</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql =
							  "
							  SELECT * FROM productmart.cart, productmart.products
								where cart.ProductID = products.ProductID
							  and 1=1
							  ";
							$result = mysqli_query($con, $sql);
							if (mysqli_num_rows($result) > 0) {
									// output data of each row
									while($row = mysqli_fetch_assoc($result)) {
									        $imagefile=$row["ProductImage"];
													$cartTotal = $row["Price"]*$row["quantity"] + $cartTotal;
										echo "
										<tr>
										<td> <div class='media'>
											<div class='d-flex'>
												<img src='/productimages/$imagefile'" . $row["ProductImage"] . "alt=''>
											</div>" . $row["ProductName"] . "</td>
										<td>" . $row["Price"] . "</td>
										<td>" . $row["quantity"] . "</td>
										<td>" . $row["Price"]*$row["quantity"] . "</td>
										<td><form name='frmDelete' action='deleteCart.php' method='post'><input type='hidden' name='CartID' value=" . $row["CartID"] . "><input type='submit' name='dlteBtn' value='Delete'></form></td>
										</tr>";
									}
									}
									else {
										echo "error";
									}

							echo "<tr class='bottom_button'>
								<td>
									<a class='gray_btn' href='#'>Update Cart</a>
								</td>
								<td>

								</td>
								<td>

								</td>
								<td>
									<div class='cupon_text'>
										<input type='text' placeholder='Coupon Code'>
										<a class='main_btn' href='#'>Apply</a>
										<a class='gray_btn' href='#'>Close Coupon</a>
									</div>
								</td>
							</tr>
							<tr>
								<td>

								</td>
								<td>

								</td>
								<td>
									<h5>Subtotal</h5>
								</td>
								<td>
									<div class='cupon_text'>
									<h5 class='carttotal'>" . $cartTotal . "
									</h5>
									</div>
									</td>
							</tr>"
							?>
							<tr class="shipping_area">
								<td>

								</td>
								<td>

								</td>
								<td>
									<h5>Shipping</h5>
								</td>
								<td>
									<div class="shipping_box">
										<ul class="list">
											<li>
												<a href="#">Flat Rate: $5.00</a>
											</li>
											<li>
												<a href="#">Free Shipping</a>
											</li>
											<li>
												<a href="#">Flat Rate: $10.00</a>
											</li>
											<li class="active">
												<a href="#">Local Delivery: $2.00</a>
											</li>
										</ul>
										<h6>Calculate Shipping
											<i class="fa fa-caret-down" aria-hidden="true"></i>
										</h6>
										<select class="shipping_select">
											<option value="1">Bangladesh</option>
											<option value="2">India</option>
											<option value="4">Pakistan</option>
										</select>
										<select class="shipping_select">
											<option value="1">Select a State</option>
											<option value="2">Select a State</option>
											<option value="4">Select a State</option>
										</select>
										<input type="text" placeholder="Postcode/Zipcode">
										<a class="gray_btn" href="#">Update Details</a>
									</div>
								</td>
							</tr>
							<tr class="out_button_area">
								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td>
									<div class="checkout_btn_inner">
										<a class="gray_btn" href="#">Continue Shopping</a>
										<!--a class="main_btn" method="post" href="http://www.usproductmart.com/storescripts/my_ipn.php" >Proceed to checkout</a-->
										<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

						          <!-- Identify your business so that you can collect the payments. -->
						          <input type="hidden" name="business" value="subroto.bisiness@edeves.com">

						          <!-- Specify a Buy Now button. -->
						          <input type="hidden" name="cmd" value="_xclick">

						          <!-- Specify details about the item that buyers will purchase. -->
						          <input type="hidden" name="item_name" value="Hot Sauce-12oz. Bottle">
						          <input type="hidden" name="amount" value="100">
						          <input type="hidden" name="currency_code" value="USD">
						          <input type="hidden" name="return" value="http://www.edeves.com/paypal/thank-you.php">
						          <input type="hidden" name="cancel_return" value="http://edeves.com/paypal/cancle.php">
						          <input type="hidden" name="notify_url" value="http://www.edeves.com/paypal/update-record.php">

						          <!-- Display the payment button. -->

						          <input class="main_btn" type="image" name="submit" border="0"
						          src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png"
						          alt="Buy Now">
						          <img alt="" border="0" width="1" height="1"
						          src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

						        </form>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Cart Area =================-->

	<!--================ Subscription Area ================-->
	<section class="subscription-area section_gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<h2>Subscribe for Our Newsletter</h2>
						<span>We won’t send any kind of spam</span>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div id="mc_embed_signup">
						<form target="_blank" novalidate action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01"
						 method="get" class="subscription relative">
							<input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
							 required="">
							<!-- <div style="position: absolute; left: -5000px;">
									<input type="text" name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="">
								</div> -->
							<button type="submit" class="newsl-btn">Get Started</button>
							<div class="info"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Subscription Area ================-->

	<!--================ start footer Area  =================-->
	<?php
	require_once "footer.php";
	?>

</html>
