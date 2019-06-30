<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<meta name="keywords" content= "" />
    
    <meta name="description" content="" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('images/zalu-nua-favicon.png') }}" type="image/x-icon">

	<title>Zalu-Nua</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,700" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" />

	<link rel="stylesheet" href="{{ asset('css/linearicon.css') }}" />

	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" />



	<link rel="stylesheet" href="{{ asset('css/style-links.css') }}">

	<link rel="stylesheet" href="{{ asset('themes/default/default.css') }}" />

	<link rel="stylesheet" href="{{ asset('css/ubislider.min.css') }}">

	<link rel="stylesheet" href="{{ asset('css/styles.css') }}?v=<?php echo time() ?>">

	<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
	<link rel="stylesheet" href="style.css">
</head>
<body>

@include('includes.header')

<main>
	
@yield('content')

</main>

@include('includes.footer')

</body>
</html>
