<?php
$keywords = '';
$description = '';

include('includes/header.php');
?>


<main>
	
	<section id="product_detail">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="detail_img">
						<!-- Product image gallery goes here -->
						<div class="ubislider-image-container left" data-ubislider="#slider" id="imageSlider"></div>
		                <div id="slider" class="ubislider left">
		                    <a class="arrow prev"></a>
		                    <a class="arrow next"></a>
		                    <ul id="gal1" class="ubislider-inner">
		                    	<li> 
		                    		<a> 
		                    			<img class="product-v-img" src="uploads/product01.jpg"> 
		                    		</a> 
		                    	</li>
		                    	<li> 
		                    		<a> 
		                    			<img class="product-v-img" src="uploads/product02.jpg"> 
		                    		</a> 
		                    	</li>
		                    	<li> 
		                    		<a> 
		                    			<img class="product-v-img" src="uploads/product03.jpg"> 
		                    		</a> 
		                    	</li>
		                    	<li> 
		                    		<a> 
		                    			<img class="product-v-img" src="uploads/product04.jpg"> 
		                    		</a> 
		                    	</li>
		                    	
		                    </ul>
		                </div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="detail_content">
						<h2 class="product_name">Veronica Beads</h2>
						
						<p class="short_desc">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
						</p>
						
						<p class="product_price">
							N25,000
						</p>
						
						<p class="product_code">
							Product code: 107342
						</p>

						<div class="product_btns">
							<a href="" class="add_to_cart">Add to Cart</a>

							<a href="" class="add_to_wishlist">Add to Wishlist</a>
						</div>

						<div class="product_long_desc">
							<h4></h4>
							<p>
								
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section id="additional">
		<div class="container">
			<div class="product_wrap row">
				<div class="col-md-3">
					<div class="prdt_itm">
						<div class="prdt_itm_img">
							<img src="<?php echo SITE_URL ?>uploads/product03.jpg">
						</div>
						<p class="name">Veronica Beads</p>
						<p class="price">N25,000</p>
					</div>
				</div>

				<div class="col-md-3">
					<div class="prdt_itm">
						<div class="prdt_itm_img">
							<img src="<?php echo SITE_URL ?>uploads/product04.jpg">
						</div>
						<p class="name">Veronica Beads</p>
						<p class="price">N25,000</p>
					</div>
				</div>

				<div class="col-md-3">
					<div class="prdt_itm">
						<div class="prdt_itm_img">
							<img src="<?php echo SITE_URL ?>uploads/product05.jpg">
						</div>
						<p class="name">Veronica Beads</p>
						<p class="price">N25,000</p>
					</div>
				</div>

				<div class="col-md-3">
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
	</section>

</main>


<?php
include('includes/footer.php');
?>