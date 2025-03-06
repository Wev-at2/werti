<?php
// Template Name: Call to Action
?>
<?php
// Obtém o ID da página da CTA pelo título
$cta_page = get_page_by_title('Call to Action');
if ($cta_page) {
	$cta_id = $cta_page->ID;

	// Obtém os campos personalizados usando o ID da página da CTA
	$cta_subtitle = get_post_meta($cta_id, 'cta_subtitle', true);
	$cta_description = get_post_meta($cta_id, 'cta_description', true);
	$cta_title = get_post_meta($cta_id, 'cta_title', true);
	$cta_client_img1 = get_post_meta($cta_id, 'cta_client_img1', true);
	$cta_client_img2 = get_post_meta($cta_id, 'cta_client_img2', true);
	$cta_client_img3 = get_post_meta($cta_id, 'cta_client_img3', true);
	$cta_button_link = get_post_meta($cta_id, 'cta_button_link', true);
	$cta_button_text = get_post_meta($cta_id, 'cta_button_text', true);
}
?>

<section class="cta" id="cta">
	<div class="cta__container container display-grid">
		<div class="cta__content cta__content--left">
			<h3 class="cta__subtitle subtitle">
				<?php echo $cta_subtitle; ?>
			</h3>
			<p class="cta__description description">
				<?php echo $cta_description; ?>
			</p>
		</div>
		<div class="cta__content cta__content--right">
			<h2 class="cta__title title title-basic">
				<figure class="cta__figure title-figure title-figure--client">
					<img id="client-img1" src="<?php echo $cta_client_img1; ?>" alt="Cliente" title="Cliente">
					<img id="client-img2" src="<?php echo $cta_client_img2; ?>" alt="Cliente" title="Cliente">
					<img id="client-img3" src="<?php echo $cta_client_img3; ?>" alt="Cliente" title="Cliente">
				</figure>
				<?php echo $cta_title; ?>
			</h2>
			<a class="cta__link btn" href="<?php echo $cta_button_link; ?>">
				<?php echo $cta_button_text; ?>
			</a>
		</div>
	</div>
</section>