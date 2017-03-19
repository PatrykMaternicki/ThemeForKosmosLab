
<!DOCTYPE HTML>
	<html lang="pl">
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
<body>

<header>

<?php getLogo(); ?>

				<nav class="navbar_sub">
				<ol id="nav" class='hamburger_menu'>
				<?php buildNav(); ?>

				</ol>
				</nav>

</header>
