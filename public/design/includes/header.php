<?php
require_once('lib/config.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<meta name="keywords" content= "<?php echo $keywords ?>" />
    
    <meta name="description" content="<?php echo $description ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="<?php echo SITE_URL ?>assets/images/zalu-nua-favicon.png" type="image/x-icon">

	<title>Zalu Nua</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,700" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />

	<link rel="stylesheet" type="text/css" href="assets/css/linearicon.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>assets/css/font-awesome.css" />



	<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>assets/css/style-links.css">

	<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>assets/themes/default/default.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>assets/css/ubislider.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>assets/css/styles.css?v=<?php echo time() ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>assets/css/responsive.css">

</head>
<body>

<header>
	<div id="header_top">
		<div class="container">
			<div class="top_notice">
				<div id="fading_text" class="text-center">
					<div class="text_itm">Shipping available worldwide</div>
				</div>
			</div>
		</div>
	</div>

	<div id="header_mid">
		<div class="container">
			<div class="logo_nav">
				<div class="logo">
					<a href="<?php echo SITE_URL ?>"><img src="<?php echo SITE_URL ?>assets/images/zalu-nua-logo.png" alt=""></a>
				</div>

				<div class="mid_nav">
					<ul>
						<li>
							<a href="#">
								<span class="lnr lnr-heart"></span>
							</a>
						</li>

						<li>
							<a href="<?php echo SITE_URL ?>cart.php">
								<span class="lnr lnr-cart"></span>
							</a>
						</li>

						<li>
							<a href="#">Register</a>
						</li>

						<li>
							<a href="#">Sign in</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="navigation">
		<div class="container">
			<nav>
				<ul>
					<li><a href="<?php echo SITE_URL ?>">Home</a></li>

					<li>
						<a href="<?php echo SITE_URL ?>products.php">The Collection</a>

					</li>

					<li><a href="<?php echo SITE_URL ?>new.php">What's New</a></li>

					<li><a href="<?php echo SITE_URL ?>sale.php">Sale</a></li>

					<li><a href="<?php echo SITE_URL ?>about.php">About</a></li>

					<li><a href="<?php echo SITE_URL ?>contact.php">Contact</a></li>

					<li><a href="#">blog</a></li>

					<li class="search_bar">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"></span>
							</form>
						</div>
					</li>
				</ul>
			</nav>
		</div>
	</div>

</header>