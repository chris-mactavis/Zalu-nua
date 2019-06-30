<?php
$keywords = '';
$description = '';

include('includes/header.php');
?>


<main>
	
	<div class="container">
		
		<section id="grid_box" class="pt20">
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">
					<div class="big_box">
						<div class="banner">
				            <div class="slider-wrapper theme-default">
				                <div id="slider" class="nivoSlider">
				                    <img src="<?php echo SITE_URL ?>assets/images/banner01.jpg" />
				                    <img src="<?php echo SITE_URL ?>assets/images/banner02.jpg" />
				                    <img src="<?php echo SITE_URL ?>assets/images/banner03.jpg" />
				                </div>
				            </div>
						</div>
					</div>

					<div class="article_section">
						<h5 class="caps light spaced_text">Latest Articles</h5>

						<div class="row">
							<div class="col-md-6">
								<div class="articles">
									<div class="article_img"><img src="<?php echo SITE_URL ?>assets/images/small-banner01.jpg" alt="" /></div>
									<h4>Lorem ipsum tallis</h4>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidid 
									</p>
									<div class="btn_wrap">
										<a href="#" class="">Read more</a>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="articles">
									<div class="article_img"><img src="<?php echo SITE_URL ?>assets/images/small-banner02.jpg" alt="" /></div>
									<h4>Lorem ipsum tallis</h4>
									<p>
										Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea   
									</p>
									<div class="btn_wrap">
										<a href="#" class="">Read more</a>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="articles">
									<div class="article_img"><img src="<?php echo SITE_URL ?>assets/images/small-banner03.jpg" alt="" /></div>
									<h4>Lorem ipsum tallis</h4>
									<p>
										in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur except  
									</p>
									<div class="btn_wrap">
										<a href="#" class="">Read more</a>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="articles">
									<div class="article_img"><img src="<?php echo SITE_URL ?>assets/images/small-banner04.jpg" alt="" /></div>
									<h4>Lorem ipsum tallis</h4>
									<p>
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum irure dolor aliqua 
									</p>
									<div class="btn_wrap">
										<a href="#" class="">Read more</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="product_category">
						<h3 class="caps mb20 light">Hot jewelry to buy now</h3>

						<div class="prdt_cat">
							<div class="prdt_cat_itm">
								<div class="prdt_cat_itm_img"><img src="<?php echo SITE_URL ?>uploads/neck-pieces02.jpg" /></div>
								<h4 class="light">Unique neck pieces for special ocassions</h4>
								<div class="btn_wrap">
									<a href="#" class="">See them all</a>
								</div>
							</div>

							<div class="prdt_cat_itm">
								<div class="prdt_cat_itm_img"><img src="<?php echo SITE_URL ?>uploads/earings02.jpg" /></div>
								<h4 class="light">Classy earings</h4>
								<div class="btn_wrap">
									<a href="#" class="">See them all</a>
								</div>
							</div>

							<div class="prdt_cat_itm">
								<div class="prdt_cat_itm_img"><img src="<?php echo SITE_URL ?>uploads/bracelets01.jpg" /></div>
								<h4 class="light">Bracelets</h4>
								<div class="btn_wrap">
									<a href="#" class="">See them all</a>
								</div>
							</div>

							<div class="prdt_cat_itm">
								<div class="prdt_cat_itm_img"><img src="<?php echo SITE_URL ?>uploads/rings02.jpg" /></div>
								<h4 class="light">Rings for that special someone</h4>
								<div class="btn_wrap">
									<a href="#" class="">See them all</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


		<section id="index_products" class="p50">
			<h5 class="caps light spaced_text">Our Featured Products</h5>

			<div class="index_product_wrap">
				<div id="product_slider" class="owl-carousel">
					
					<div class="prdt_itm">
						<div class="prdt_itm_img">
							<img src="<?php echo SITE_URL ?>uploads/product01.jpg">
						</div>
						<p class="name">Veronica Beads</p>
						<p class="price">N25,000</p>
					</div>
				
					<div class="prdt_itm">
						<div class="prdt_itm_img">
							<img src="<?php echo SITE_URL ?>uploads/product02.jpg">
						</div>
						<p class="name">Veronica Beads</p>
						<p class="price">N25,000</p>
					</div>
				
					<div class="prdt_itm">
						<div class="prdt_itm_img">
							<img src="<?php echo SITE_URL ?>uploads/product04.jpg">
						</div>
						<p class="name">Veronica Beads</p>
						<p class="price">N25,000</p>
					</div>
				
					<div class="prdt_itm">
						<div class="prdt_itm_img">
							<img src="<?php echo SITE_URL ?>uploads/product05.jpg">
						</div>
						<p class="name">Veronica Beads</p>
						<p class="price">N25,000</p>
					</div>

				</div>
			</div>
		</section>

	</div>

</main>


<?php
include('includes/footer.php');
?>