<?php
session_start();
$TITLE="USProductMart";
require_once "header.php";
?>
<!doctype html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="products/load_products.js"></script>
</head>
<title>Category</title>
	<!--================Header Menu Area =================-->

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Shop Category Page</h2>
					<div class="page_link">
						<a href="index.php">Home</a>
						<a href="category.php">Category</a>
						<a href="category.php">Women Fashion</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Category Product Area =================-->
	<section class="cat_product_area section_gap">
		<div class="container-fluid">
			<div class="row flex-row-reverse">
				<div class="col-lg-9">
					<div class="product_top_bar">
						<div class="left_dorp">
							<select class="sorting">
								<option value="1">Default sorting</option>
								<option value="2">Default sorting 01</option>
								<option value="4">Default sorting 02</option>
							</select>
							<select class="show">
								<option value="1">Show 12</option>
								<option value="2">Show 14</option>
								<option value="4">Show 16</option>
							</select>
						</div>
						<div class="right_page ml-auto">
							<nav class="cat_page" aria-label="Page navigation example">
								<ul class="pagination">
									<li class="page-item">
										<a class="page-link" href="#">
											<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
										</a>
									</li>
									<li class="page-item active">
										<a class="page-link" href="#">1</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">2</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">3</a>
									</li>
									<li class="page-item blank">
										<a class="page-link" href="#">...</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">6</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">
											<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<form method="get" action="test.php">
					<div class="latest_product_inner row">
					<?php
					$servername = "localhost";
					$username = "adminhema";
					$password = "password123";
					$database = "productmart";
					$connect = mysqli_connect($servername, $username, $password,$database);
                 			$query = "SELECT * FROM products ";
					$result = mysqli_query($connect, $query);
					if((mysqli_num_rows($result) == 0))
					echo "no products found";
	                  if(mysqli_num_rows($result) > 0)
	                  {
		                while($row = mysqli_fetch_array($result))
		              {
		        	?>
					<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="f_p_item">
								<div class="f_p_img">
                                    <img class="img-fluid" src="<?php echo "productimages/".$row["ProductImage"]; ?>" height="250" width = "200" alt="">
									<div class="p_icon">
										<a href="#">
											<i class="lnr lnr-heart"></i>
										</a>
										<button name="addToCart" type="button" id="addToCart" class="addToCart btn" value="<?php echo $row["ProductID"];?>">
											<i class="lnr lnr-cart"></i>
										</button>
				
									</div>
								</div>
									    <a href="#">
									    <h4><?php echo $row["ProductName"]; ?></h4>
								        </a>
								    <a href="#">
								    <h5>$ <?php echo $row["Price"]; ?></h5>
								    </a>
							</div>
						</div>
							<?php
					        }
					        }
					        ?>
					</div>         
                 </div>

				<div class="col-lg-3">
					<div class="left_sidebar_area">
						<aside class="left_widgets cat_widgets">
							<div class="l_w_title">
								<h3>Browse Categories</h3>
							</div>
							<div class="widgets_inner">
								<ul class="list">
									<li>
										<a href="#">Medicines</a>
									</li>
									<li>
										<a href="#">Properties</a>
										<ul class="list">
											<li>
												<a href="#">Frozen Fish</a>
											</li>
											<li>
												<a href="#">Dried Fish</a>
											</li>
											<li>
												<a href="#">Fresh Fish</a>
											</li>
											<li>
												<a href="#">Meat Alternatives</a>
											</li>
											<li>
												<a href="#">Meat</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="#">Cooking</a>
										<ul class="list">
											<li>
												<a href="#">Frozen Fish</a>
											</li>
											<li>
												<a href="#">Dried Fish</a>
											</li>
											<li>
												<a href="#">Fresh Fish</a>
											</li>
											<li>
												<a href="#">Meat Alternatives</a>
											</li>
											<li>
												<a href="#">Meat</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="#">Beverages</a>
										<ul class="list">
											<li>
												<a href="#">Frozen Fish</a>
											</li>
											<li>
												<a href="#">Dried Fish</a>
											</li>
											<li>
												<a href="#">Fresh Fish</a>
											</li>
											<li>
												<a href="#">Meat Alternatives</a>
											</li>
											<li>
												<a href="#">Meat</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="#">Home and Cleaning</a>
									</li>
								</ul>
							</div>
						</aside>
						<aside class="left_widgets p_filter_widgets">
							<div class="l_w_title">
								<h3>Product Filters</h3>
							</div>
							<div class="widgets_inner">
								<h4>Brand</h4>
								<ul class="list">
									<li>
										<a href="#">Apple</a>
									</li>
									<li>
										<a href="#">Asus</a>
									</li>
									<li class="active">
										<a href="#">Gionee</a>
									</li>
									<li>
										<a href="#">Micromax</a>
									</li>
									<li>
										<a href="#">Samsung</a>
									</li>
								</ul>
							</div>
							<div class="widgets_inner">
								<h4>Color</h4>
								<ul class="list">
									<li>
										<a href="#">Black</a>
									</li>
									<li>
										<a href="#">Black Leather</a>
									</li>
									<li class="active">
										<a href="#">Black with red</a>
									</li>
									<li>
										<a href="#">Gold</a>
									</li>
									<li>
										<a href="#">Spacegrey</a>
									</li>
								</ul>
							</div>
							<div class="widgets_inner">
								<h4>Price</h4>
								<div class="range_item">
									<div id="slider-range"></div>
									<div class="row m0">
										<label for="amount">Price : </label>
										<input type="text" id="amount" readonly>
									</div>
								</div>
							</div>
						</aside>
					</div>
				</div>
			</div>

			<div class="row">
				<nav class="cat_page mx-auto" aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" href="#">
								<i class="fa fa-chevron-left" aria-hidden="true"></i>
							</a>
						</li>
						<li class="page-item active">
							<a class="page-link" href="#">01</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">02</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">03</a>
						</li>
						<li class="page-item blank">
							<a class="page-link" href="#">...</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">09</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</section>
	<!--================End Category Product Area =================-->

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
 <!--================ end footer Area  =================-->
</html>
