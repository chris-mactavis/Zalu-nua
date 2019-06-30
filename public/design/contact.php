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
					<h2 class="page_title">Contact us</h2>
				</div>

				<div class="col-md-5">
					
				</div>
			</div>
		</section>

		<section id="page_content" class="pt30 pd50">
			<div class="row">
				<div class="col-md-4">
					<div class="contact_info">
						<div class="info_itm">
							<div class="info_itm_icon"><span class="lnr lnr-home"></span></div>
							<div class="info_itm_txt">134 Awolowo road, Ikoyi, Lagos</div>
						</div>

						<div class="info_itm">
							<div class="info_itm_icon"><span class="lnr lnr-envelope"></span></div>
							<div class="info_itm_txt">info@zalu-nua.com</div>
						</div>

						<div class="info_itm">
							<div class="info_itm_icon"><span class="lnr lnr-phone"></span></div>
							<div class="info_itm_txt">+234 1 726 5555, +234 909 234 5678</div>
						</div>
					</div>
				</div>

				<div class="col-md-7 col-md-offset-1">
					<div class="contact_form">
						<form action="<?php echo $_SERVER[PHP_SELF] ?>" method="post">
							<div class="form-group">
							    <input type="text" name="full_name" class="form-control input-lg" id="name" aria-describedby="Name" 
							    placeholder="Full Name">
							</div>

							<div class="form-group">
							    <input type="email" name="email" class="form-control input-lg" id="email" aria-describedby="Email" 
							    placeholder="Email">
							</div>

							<div class="form-group">
							    <input type="text" name="phone" class="form-control input-lg" id="phone" aria-describedby="Phone" 
							    placeholder="Phone">
							</div>

							<div class="form-group">
							    <input type="text" name="subject" class="form-control input-lg" id="subject" aria-describedby="Subject" 
							    placeholder="Subject">
							</div>

							<div class="form-group">
								<textarea name="comment" class="form-control" rows="8" placeholder="Comment..."></textarea>
							</div>

							<p>
								<input type="submit" name="submit" class="btn btn-success" value="Submit">
							</p>
						</form>
					</div>
				</div>
			</div>
		</section>

	</div>

</main>


<?php
include('includes/footer.php');
?>