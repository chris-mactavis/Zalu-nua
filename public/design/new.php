<?php
$keywords = '';
$description = '';

include('includes/header.php');
?>


<main>
	
	<div class="container">

		<section id="page_top">
			<div class="row">
				<div class="col-md-7">
					<h2 class="page_title">New Products</h2>
				</div>

				<div class="col-md-5">
					<div class="sort">
						<span class="title">Sort by:</span>
						<a href="#" class="item">New in</a>

						<a href="#" class="item">Price high to low</a>

						<a href="#" class="item">Price low to high</a>
					</div>
				</div>
			</div>
		</section>

		<section id="page_content">
			<div class="row">
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="sidebar">
						<div class="product_cat_title">
							<ul>
								<li><a href="">Earings</a></li>

								<li><a href="">Hoops</a></li>

								<li><a href="">Necklaces</a></li>

								<li><a href="">Pendants</a></li>

								<li><a href="">Bracelets</a></li>

								<li><a href="">Rings</a></li>

								<li><a href="">Watches</a></li>
							</ul>
						</div>

						<div class="filter">
							<h4>Colour</h4>
							<ul>
								<li><label><input type="checkbox"> Black</label></li>

								<li><label><input type="checkbox"> Blue</label></li>

								<li><label><input type="checkbox"> Red</label></li>

								<li><label><input type="checkbox"> Orange</label></li>

								<li><label><input type="checkbox"> Gold</label></li>

								<li><label><input type="checkbox"> Rose gold</label></li>

								<li><label><input type="checkbox"> Silver</label></li>

								<li><label><input type="checkbox"> Brown</label></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-9 col-sm-8 col-xs-12">
					<div class="content_area row">
						<div class="col-md-4">
							<div class="prdt_itm">
								<div class="prdt_itm_img">
									<img src="<?php echo SITE_URL ?>uploads/product01.jpg">
								</div>
								<p class="name">Veronica Beads</p>
								<p class="price">N25,000</p>
							</div>
						</div>

						<div class="col-md-4">
							<div class="prdt_itm">
								<div class="prdt_itm_img">
									<img src="<?php echo SITE_URL ?>uploads/product02.jpg">
								</div>
								<p class="name">Veronica Beads</p>
								<p class="price">N25,000</p>
							</div>
						</div>

						<div class="col-md-4">
							<div class="prdt_itm">
								<div class="prdt_itm_img">
									<img src="<?php echo SITE_URL ?>uploads/product03.jpg">
								</div>
								<p class="name">Veronica Beads</p>
								<p class="price">N25,000</p>
							</div>
						</div>

						<div class="col-md-4">
							<div class="prdt_itm">
								<div class="prdt_itm_img">
									<img src="<?php echo SITE_URL ?>uploads/product04.jpg">
								</div>
								<p class="name">Veronica Beads</p>
								<p class="price">N25,000</p>
							</div>
						</div>

						<div class="col-md-4">
							<div class="prdt_itm">
								<div class="prdt_itm_img">
									<img src="<?php echo SITE_URL ?>uploads/product05.jpg">
								</div>
								<p class="name">Veronica Beads</p>
								<p class="price">N25,000</p>
							</div>
						</div>

						<div class="col-md-4">
							<div class="prdt_itm">
								<div class="prdt_itm_img">
									<img src="<?php echo SITE_URL ?>uploads/product06.jpg">
								</div>
								<p class="name">Veronica Beads</p>
								<p class="price">N25,000</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>

</main>


<?php
include('includes/footer.php');
?>