
<!DOCTYPE HTML>
	<html <?php language_attributes();?>>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<meta name="autor" content="inperium.eu">
	<meta name="keywords" content="coś tam">
	<meta name="description" content="coś tam">
	<meta charset="<?php bloginfo( 'charset'); ?>"/>

	<?php
	function getScript_and_CSS ()
				{


					wp_enqueue_style(
					'stylesheet',
					get_template_directory_uri().'/style.css'
					);

					wp_register_script(
					'google-map',
					'https://maps.googleapis.com/maps/api/js?key=AIzaSyCaqnLM1SVrvL3kQshw_XDulLz383P6vig',
					false,
					true
				);

					wp_register_script(
						'google-map-api',
						get_template_directory_uri().'/JS/google_maps.js',
						false,
			      true
					);
					wp_enqueue_script('google-map', true);
					wp_enqueue_script('google-map-api',true);

				}

	add_action('wp_enqueue_scripts', 'getScript_and_CSS');


	?>
	       <!-- [if IE]>
    <style>
            @font-face
                {
                font-family: fontIE;
                src: url ("Fonts\fontIE.otf");
                }
            body,html
                {
                font-family: fontIE;
                }





    </style>

    <![endif] -->

	<title><?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>
<body id="bg_body">

<header class="header--width">

<?php getLogo(); ?>

				<nav class="navbar_sub">
				<ol class="hamburger_menu">
							<?php buildNav(); ?>

				</ol>
				</nav>

</header>
