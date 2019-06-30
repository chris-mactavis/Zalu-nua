<footer class="p30">
	<div class="container">
		 <div class="row">
		 	<div class="col-md-8 col-sm-12 col-xs-12">
		 		<div class="footer_itm_title">
		 			<h4 class="caps light">Useful Links</h4>
		 		</div>
		 		<div class="row">
		 			<div class="col-md-4">
		 				<div class="footer_itm">
		 					<ul>
		 						<li><a href-"#">Delivery</a></li>

		 						<li><a href-"#">Exchanges & returns</a></li>

		 						<li><a href-"#">Payments</a></li>

		 						<li><a href-"#">FAQ</a></li>

		 						<li><a href-"#">About Us</a></li>
		 					</ul>
		 				</div>
		 			</div>

		 			<div class="col-md-4">
		 				<div class="footer_itm">
		 					<ul>
		 						<li><a href-"#">Careers</a></li>

		 						<li><a href-"#">Terms & Conditions</a></li>

		 						<li><a href-"#">Privacy policy</a></li>

		 						<li><a href-"#">Cookie policy</a></li>
		 					</ul>
		 				</div>
		 			</div>

		 			<div class="col-md-4 col-sm-6 col-xs-12">
				 		<div class="footer_itm">
		 					<ul>
		 						<li><a href-"#">Earings</a></li>

		 						<li><a href-"#">Hoops</a></li>

		 						<li><a href-"#">Necklaces</a></li>

		 						<li><a href-"#">Pendants</a></li>

		 						<li><a href-"#">Bracelets</a></li>

		 						<li><a href-"#">Rings</a></li>

		 						<li><a href-"#">Watches</a></li>
		 					</ul>
		 				</div>
				 	</div>
		 		</div>
		 	</div>

				 	

		 	<div class="col-md-4 col-sm-6 col-xs-12">
		 		<div class="footer_itm_title">
		 			<h4 class="caps light">Stay in Touch</h4>
		 		</div>
		 		<div class="footer_itm">
 					<div class="subscribe_form">
 						<input type="text" name="subcribe_email" class="subscribe_text" placeholder="Sign up for updates">
 						<button type="submit" class="subscribe_btn"><span class="lnr lnr-chevron-rgt"></span></button>
 					</div>

 					<div class="social"></div>
 				</div>
		 	</div>

		 </div>

		 <div class="row">
		 	<div class="col-md-12">
		 		<div class="copyright text-center">
		 			<p>&copy; <?php echo date('Y') ?> Zalu Nua</p>
		 		</div>
		 	</div>
		 </div>
	</div>

</footer>

<script type="text/javascript" src="<?php echo SITE_URL ?>assets/js/jquery-1.10.2.min.js"></script>

<script type="text/javascript" src="<?php echo SITE_URL ?>assets/js/jquery.nivo.slider.js"></script>

<script type="text/javascript" src="<?php echo SITE_URL ?>assets/js/jquery.easing.1.3.js"></script>

<script type="text/javascript" src="<?php echo SITE_URL ?>assets/js/jquery.innerfade.js"></script>

<script type="text/javascript" src="<?php echo SITE_URL ?>assets/js/aos.js"></script>

<script type="text/javascript" src="<?php echo SITE_URL ?>assets/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo SITE_URL ?>assets/js/ubislider.min.js"></script>

<script type="text/javascript" src="<?php echo SITE_URL ?>assets/js/owl.carousel.js"></script>

<script type="text/javascript" src="<?php echo SITE_URL ?>assets/js/classie.js"></script>

<script type="text/javascript" src="<?php echo SITE_URL ?>assets/js/uisearch.js"></script>

<script type="text/javascript" src="<?php echo SITE_URL ?>assets/js/modernizr.custom.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/elevatezoom/3.0.8/jqueryElevateZoom.js"></script>


<script type="text/javascript">
	$(window).load(function() { // makes sure the whole site is loaded
	    $('#slider').nivoSlider();
	});
</script>


<script type="text/javascript">
    $(document).ready(function(){
    	$('.nav_trig').click(function(){
            $('nav').slideToggle(500);
        });

        $('.close_nav').click(function(){
        	$('nav').hide(500);
        });

        $('#fading_text').innerfade({
            speed: 'slow',
            timeout: 6000,
            type: 'random'
        });

        $("#product_slider").owlCarousel({
            autoPlay : 5000,
            autoPlay : true,
            items : 4,
            autoWidth:true,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [980,3],
            itemsTablet: [768,2],
            itemsMobile : [479,1],
            slideSpeed : 500,
            paginationSpeed : 500,
            rewindSpeed : 500,
            baseClass : "owl-carousel",
            theme : "owl-theme",
            addClassActive: true,
            navigation : true,
            stopOnHover : false,
            pagination : false,
            scrollPerPage:true,
            navigationText : ["", ""]
            //afterMove: nextslide,
            //afterInit: nextslide,
        });

        $('#notice').html(' ');

        if($('.add_to_cart').length > 0){
            $('.add_to_cart').click(function() {
                var trig = $(this);
                var product_id = trig.attr("rel");
                var dataString = 'product_id='+product_id;
                $.ajax({
                    type:'post',
                    url:'<?php echo SITE_URL ?>process_cart.php',
                    data: dataString,
                    success: function(data) {
                        $('.cart_count').html(data);
                        $('#notice').html('<div class="cart_success">Item was added successfully to cart. <a href="<?php echo SITE_URL ?>cart">View Your Cart</div> </div>');
                    }
                });
            })
            return false;
        };


        $("#cart_form").submit(function(e) {
            
            e.preventDefault(); // avoid to execute the actual submit of the form.

            $.ajax({
               type: "POST",
               url: '<?php echo SITE_URL ?>process_cart.php',
               data: $(this).serialize(), // serializes the form's elements.

               beforeSend: function() {                    
                    $empty = $('#cart_form').find("input").filter(function() {
                        return this.value === "";
                    });
                    if($empty.length) {
                        alert('You must fill out all fields');
                        return false;
                    }else{
                        return true;
                    };
                },
               success: function(data)
               {
                    $('.cart_count').html(data);
                    $('#notice').html('<div class="cart_success">Item was added successfully to cart. <a href="<?php echo SITE_URL ?>cart">View Your Cart</div> </div>');
               }
             });

        });

    });
</script>


<script type="text/javascript">
	AOS.init({
		offset: 100,
		disable: 'mobile'
	});

	$('#slider').ubislider({
        arrowsToggle: false,
        type: 'ecommerce',
        hideArrows: true,
        autoSlideOnLastClick: true,
        position: 'vertical',
        modalOnClick: true,
        onTopImageChange: function(){
        	$('#imageSlider img').elevateZoom();
        }
    }); 
</script>

<script>
	new UISearch( document.getElementById( 'sb-search' ) );
</script>


</body>
</html>