

<footer class="p30">
	<div class="container">
		 <div class="row">
		 	<div class="col-md-8 col-sm-12 col-xs-12">
		 		
		 		<div class="row">
		 			<div class="col-md-4 col-sm-6 col-xs-12">
		 				<div class="footer_itm_title">
				 			<h4 class="caps light">Our Stores</h4>
				 		</div>
				 		<div class="footer_itm">
		 					<ul>
		 						@foreach($stores as $store)
		 						<li>
			 						<a href="{{ route('products.department', ['department_url'=> $store->department_url]) }}">
										{{ $store->department_name }}
									</a>
								</li>
		 						@endforeach
		 					</ul>
		 				</div>
				 	</div>

		 			<div class="col-md-4">
		 				<div class="footer_itm_title">
				 			<h4 class="caps light">Suport</h4>
				 		</div>
		 				<div class="footer_itm">
		 					<ul>

		 						<li><a href="#">Contact Us</a></li>

		 						<li><a href="#">FAQs</a></li>

		 					</ul>
		 				</div>
		 			</div>

		 			<div class="col-md-4">
		 				<div class="footer_itm_title">
				 			<h4 class="caps light">Useful Links</h4>
				 		</div>
		 				<div class="footer_itm">
		 					<ul>
		 						
		 						@foreach($pages as $page)
		 						<li>
			 						<a href="{{ route('page', ['page_url'=> $page->page_url]) }}">
										{{ $page->page_title }}
									</a>
								</li>
		 						@endforeach

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

 					<div class="social">
 						<a href="https://www.facebook.com/zalunuajewellery/" target="_blank">
 							<i class="fa fa-facebook"></i>
 						</a>

 						<a href="https://twitter.com/NuaZalu" target="_blank">
 							<i class="fa fa-twitter"></i>
 						</a>

 						<a href="https://www.instagram.com/zalunua/" target="_blank">
 							<i class="fa fa-instagram"></i>
 						</a>
 					</div>
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

</div>

<script type="text/javascript" src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/jquery.nivo.slider.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/jquery.innerfade.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/aos.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/ubislider.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/owl.carousel.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/classie.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/uisearch.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/modernizr.custom.js') }}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/elevatezoom/3.0.8/jqueryElevateZoom.js"></script>


<script type="text/javascript">
	$(window).load(function() { // makes sure the whole site is loaded
	    $('#homeslider').nivoSlider();
	});
</script>


<script type="text/javascript">
    $(document).ready(function(){
    	
        $('.nav_trigger').click(function(){
		  $('#side_navigation').css({ width: "270px", display: "block" });
		  $("#main").css({ marginLeft: "270px" });
		});
		 
		$('.closebtn').click(function(){
		  $('#side_navigation').css({ width: "0px" });
		  $("#main").css({ marginLeft: "0px" });
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

    $('.cart_qty_plus').on('click', function() {
    	var val = parseInt($(this).prev('input').val());
    	$(this).prev('ipniut').val(val + 1).change();
    	return false;
    });

    $('.cart_qty_minus').on('click', function() {
    	var val = parseInt($(this).next('input').val());
    	if(val !== 1) {
    		$(this).next('ipniut').val(val - 1).change();
    	}
    	
    	return false;
    });

    function show1(){
	  document.getElementById('hidden_form').style.display ='none';
	}
	function show2(){
	  document.getElementById('hidden_form').style.display = 'block';
	}
</script>

<script>
	new UISearch( document.getElementById( 'sb-search' ) );
</script>
