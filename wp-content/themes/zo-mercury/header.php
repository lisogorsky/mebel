<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body <?php body_class(); ?>>
	<?php zo_mercury_get_page_loading(); ?>
	<div id="page">
		<div id="rightButton">
			<i class="fa fa-times" aria-hidden="true"></i>
			<div>
				<div class="title">Заказать обратный звонок</div>
				<a class="formPopUp">
					<span class="fa-stack fa-lg">
						<i class="fa fa-square-o fa-stack-2x"></i>
						<i class="fa fa-phone fa-stack-1x"></i>
					</span>
				</a>
			</div>
			<div>
				<div class="title">Написать нам письмо</div>
				<a href="mailto:olros1@yandex.ru?subject=Вопрос с сайта massiv-dk.ru" target="_blank">
					<span class="fa-stack fa-lg">
						<i class="fa fa-square-o fa-stack-2x"></i>
						<i class="fa fa-envelope-o fa-stack-1x"></i>
					</span>
				</a>
			</div>
			<div>
				<div class="title">Вызвать замерщика</div>
				<a class="formPopUp zamer">
					<span class="fa-stack fa-lg">
						<i class="fa fa-square-o fa-stack-2x"></i>
						<i class="fa fa-calculator fa-stack-1x"></i>
					</span>
				</a>
			</div>
		</div>
		<header id="masthead" class="site-header">
			<h2>ДВЕРИ ИЗ МАССИВА</h2>
			<a href="/"><div class="top-logo">
				<div>ДВЕРЬ</div>
				<div>КОМПЛЕКТ</div>
			</div></a>
			<div class="formPopUp guaranty">гарантия 3 года *</div>
			<div class="formPopUp sale">СКИДКИ И АКЦИИ <span>*</span> <i class="fa fa-gift fa-2x"></i></div>
			<div id="basket">
				<img src="/wp-content/themes/zo-mercury/assets/images/basket.jpg" alt="">
			</div>
			<div id="header-img">
				<div>
					<a href="#">
						<img src="/wp-content/themes/zo-mercury/assets/images/img-header-1.jpg" alt="">
						<p>ДВЕРИ МАССИВ ДУБА</p>
					</a>
				</div>
				<div>
					<a href="#">
						<img src="/wp-content/themes/zo-mercury/assets/images/img-header-2.jpg" alt="">
						<p>ДВЕРИ МАССИВ ОЛЬХИ</p>
					</a>
				</div>
				<div>
					<a href="#">
						<img src="/wp-content/themes/zo-mercury/assets/images/img-header-3.jpg" alt="">
						<p>ДВЕРИ МАССИВ СОСНЫ</p>
					</a>
				</div>
			</div>
			<?php zo_mercury_header(); ?>
		</header>
		<?php zo_mercury_page_title(); ?>
		<div id="main">