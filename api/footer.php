<footer class="footer">
	<div class="footer__container container">
		<div class="footer__content display-grid">
			<div class="footer__logo">
				<a class="footer__logo--link" href="/">
					<figure class="footer__logo--img img">
						<svg>
							<use xlink:href="
							<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_logo.svg#wer_logo_white">
							</use>
						</svg>
						<figcaption class="footer__logo--figcap" hidden><?php bloginfo('name'); ?></figcaption>
					</figure>
				</a>
			</div>
			<div class="footer__links footer__links--desktop">
				<nav class="footer__menu" aria-label="Menu Principal">
					<?php
					$args = array(
						'menu' => 'principal',
						'container' => false
					);
					wp_nav_menu($args);
					?>
				</nav>
			</div>
		</div>
		<div class="footer__content display-grid">
			<div class="footer__socials">
				<ul class="footer__socials--list footer__list list">
					<li class="footer__socials--item">
						<a class="footer__socials--link footer__link display-flex" href="">
							<figure class="display-flex-center">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/social-facebook-1.svg">
							</figure>
						</a>
					</li>
					<li class="footer__socials--item">
						<a class="footer__socials--link footer__link display-flex" href="">
							<figure class="display-flex-center">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/social-instagram.svg">
							</figure>
						</a>
					</li>
					<li class="footer__socials--item">
						<a class="footer__socials--link footer__link display-flex" href="https://www.linkedin.com/company/wer-casa-do-cardíaco/about/">
							<figure class="display-flex-center">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/social-linkedin-1.svg">
							</figure>
						</a>
					</li>
					<li class="footer__socials--item">
						<a class="footer__socials--link footer__link display-flex" href="https://www.x.com/">
							<figure class="display-flex-center">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/social-twitterx.svg">
							</figure>
						</a>
					</li>
				</ul>
			</div>
			<div class="footer__links footer__links--mobile">
				<nav class="footer__menu" aria-label="Menu Principal">
					<?php
					$args = array(
						'menu' => 'principal',
						'container' => false
					);
					wp_nav_menu($args);
					?>
				</nav>
			</div>
			<div class="footer__rightReserved">
				<p class="footer__rightReserved--text footer__text">
					<a class="footer__rightReserved--link footer__link" href="">
						&nbsp;<?php bloginfo('name'); ?>
					</a> &copy; <?php echo date('Y'); ?> - Todos os direitos reservados.
				</p>
			</div>
		</div>
		<div class="footer__content footer__content--end">
			<div class="footer__development">
				<p class="footer__development--text footer__text">Desenvolvido por:</p>
				<a class="footer__development--link" href="https://wevertoncosta.com.br" title="Weverton Costa | UI/UX Developer" target="_blank">
					<figure class="footer__development--img">
						<svg>
							<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites/sprite.svg#wc_logo_white">
							</use>
						</svg>
						<figcaption class="footer__development--figcap" hidden> Weverton Costa | UI/UX Developer</figcaption>
					</figure>
				</a>
			</div>
		</div>
	</div>
</footer>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js"></script>
<?php wp_footer(); ?>
</body>

</html>