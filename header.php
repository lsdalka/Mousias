<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<title>Mousias | Lifestyle Magazine</title>
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
	
	<?php if (is_single()){ ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/single.css" type="text/css" media="screen" />
	<?php } else { ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<?php }; ?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	
</head>
<body>

<div id="wrapper">

	<div id="header-placeholder">
	<header id="header">
		<div id="header_wrap">
		
		<div id="logo">
			<div id="logopic">
				<img src="<?php bloginfo('template_directory'); ?>/img/Untitled2.png" />
			</div>
			<div id="logoname">
				<a href="<?php echo get_option('home'); ?>"/>MOUSIAS</a>
			</div>
		</div>
		
		<div id="search">
			<?php get_search_form(); ?>
		</div>
		
		<nav id="menu" role="navigation">
			<button id="mobilemenu"><img src="http://www.feroball.com/images/mobile_menu.png" /></button>
			<?php wp_nav_menu( array( 'theme_location' => 'in_header' ) ); ?>		
		</nav>

		
		<script>
		$(document).ready(function() {
			$("#mobilemenu").click(function() {
				if( $("#menu ul").css('display') == 'block') {
					$("#menu").css("width", "30px");
					$("#menu ul").css("display", "none");
					$("#logopic").css("display", "inline-block");
					$("#logoname").css("display", "inline-block");
				} 
				else {
					$("#menu").css("width", "100%");
					$("#menu ul").css("display", "block");
					$("#logopic").css("display", "none");
					$("#logoname").css("display", "none");
				};
			});
		});
		</script>
		
		<script>
		$(document).ready(function() {
			$("#search").focusin(function() {
				$("#menu").css("display","none");
				$(this).css("right", "625")
				$(".search-field").css("width", "655px")
			});
			$("#search").focusout(function() {
				$(".search-field").css("width", "30px")
				$(this).css("right", "5")
				$("#menu").css("display","inline-block");
			});
		});
		</script>
		
		
		</div>
	</header><!-- .header -->
	</div>