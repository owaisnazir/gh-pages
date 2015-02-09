<!DOCTYPE html>
<!--[if lt IE 8]>         	<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         		<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>			<!--> <html class="no-js "> <!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link rel="icon" type="image/ico" href="<?php bloginfo('template_directory') ?>/assets/images/favicon.ico" />
	
	<title><?php
        echo empty($GLOBALS['title_override']) ? wp_title('&raquo;',false,'right') : $GLOBALS['title_override'];
    ?></title>
	
	<!--[if IE 8]>
		<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/ie.css" />
	<![endif]-->
	<!--[if !(IE 8) ]><!-->
		<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/style.css" />
	<!--<![endif]-->

	<!--[if (gte IE 6)&(lte IE 8)]> <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/assets/js/vendor/selectivizr-1.0.2.min.js"></script> <![endif]-->
    <script src="<?php bloginfo('template_directory') ?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    
    <script src="<?php bloginfo('template_directory') ?>/assets/js/vendor/jquery-1.11.1.min.js"></script>

	<script>
		// Place Google Analytics code here

		// Set up site configuration
		window.config = window.config || {};

		// The base URL for the WordPress theme
		window.config.baseUrl = "<?php bloginfo('url')?>";

		// Empty default Gravity Forms spinner function
		var gformInitSpinner = function() {};
	</script>

	<?php wp_head();?>

</head>
<body <?php body_class(); ?>  id="<?php echo get_template_name(); ?>">
<!--[if lt IE 8]> <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p> <![endif]-->


<div id="top">

    <header id="header">

        <div class="top-navbar">

            <div class="wrapper">

                <nav class="utility-nav">

                    <?php wp_nav_menu( array('theme_location' => 'utility' )); ?>

                </nav>

                <nav class="social-nav">

                    <ul class="menu">
                        <li class="sn-facebook"><a href="<?php the_field('facebook_url', 'option') ?>">Facebook</a></li>
                        <li class="sn-twitter"><a href="<?php the_field('twitter_url', 'option') ?>">Twitter</a></li>
                        <li class="sn-linkedin"><a href="<?php the_field('linkedin_url', 'option') ?>">Linked In</a></li>
                        <li class="sn-youtube"><a href="<?php the_field('youtube_url', 'option') ?>">You Tube</a></li>
                    </ul>

                </nav>

            </div><!-- .wrapper -->

        </div><!-- .top-navbar -->

        <div class="wrapper">

            <h1 class="branding"><a href="<?php bloginfo('url') ?>"><img src="<?php bloginfo('template_directory') ?>/images/macelree_logo.png" alt="MacElree Harvey" /></a></h1>

            <nav class="global-nav">

                <div class="container">

                    <a class="toggle" href="#"><span class="visually-hidden">Menu</span><span aria-hidden="true" class="icon-menu icon"></span></a>


                    <?php wp_nav_menu( array('theme_location' => 'primary' )); ?>

                </div><!-- .container -->

            </nav>

        </div><!-- .wrapper -->

    </header><!-- #header -->