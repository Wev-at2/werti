<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php bloginfo('name'); ?> <?php wp_title('-'); ?></title>
	<meta name="description" content="<?php bloginfo('name'); ?> <?php wp_title('-'); ?>: <?php the_field('description_seo'); ?>">
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php bloginfo('name'); ?> <?php wp_title('-'); ?>" />
	<meta property="og:description" content="<?php bloginfo('name'); ?> <?php wp_title('-'); ?>: <?php the_field('description_seo'); ?>" />
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	<meta property="og:url" content="<?php bloginfo('url'); ?>" />
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/anac_logo_v1.png" />
	<meta name="keywords" content="Casa do Cardíaco, ANAC, ANACAR, instituição beneficente, assistência médica, tratamento hospitalar, apoio social, voluntariado, doação de Nota Fiscal Paulista, solidariedade, bem-estar social, acolhimento humanizado, contribuição social">
	<meta name="theme-color" content="#fff">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon.ico" type="image/x-icon">
	<link rel="icon" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-16x16.png" type="image/png">
	<link rel="icon" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-32x32.png" type="image/png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-precomposed.png">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="167x167" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-167x167.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-180x180.png">
	<link rel="apple-touch-icon" sizes="1024x1024" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-1024x1024.png">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
	<?php wp_head(); ?>
</head>

<body>
	<header class="header sticky">
		<div class="header__container">
			<div class="header__logo">
				<a class="header__logo-link" href="/">
					<figure class="header__logo-img">
						<svg>
							<use xlink:href="
							<?php echo get_stylesheet_directory_uri(); ?>/img/sprites/sprite.svg#anac_logo_v2">
							</use>
						</svg>
					</figure>
				</a>
			</div>
			<button class="header__menu--btn btn js-toggle-nav" id="btn-mobile" type="button" aria-label="Abrir menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
				<span class="header__menu-btn-icon" id="menu-burger_icon"></span>
			</button>
			<div class="header__links" id="header-nav">
				<nav class="header__menu header__menu_mobile" aria-label="Menu Principal">
					<?php
					$args = array(
						'menu' => 'principal',
						'container' => false
					);
					wp_nav_menu($args);
					?>
				</nav>
				<div class="header__cta">
					<a class="header__cta--btn btn btn_primary js-open-modal" href="
					<?php echo get_stylesheet_directory_uri(); ?>/doacoes"> Doar agora </a>
				</div>
			</div>
		</div>
		<?php
		$about = get_page_by_title('Sobre nós')->ID;
		?>

	</header>