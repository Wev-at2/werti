<?php
// Template Name: Call to Action
?>
<?php
// Obtém o ID da página da CTA pelo título
$cta_page = get_page_by_title('Call to Action');
if ($cta_page) {
	$cta_id = $cta_page->ID;

	// Obtém os campos personalizados usando o ID da página da CTA
	$cta_description = get_post_meta($cta_id, 'cta_description', true);
	$cta_button_link = get_post_meta($cta_id, 'cta_button_link', true);
	$cta_button_text = get_post_meta($cta_id, 'cta_button_text', true);
}
?>

<section class="cta" id="cta">
	<div class="cta__container">
		<h3 class="cta__subtitle subtitle">
			<?php echo $cta_description; ?>
		</h3>
		<a class="cta__link btn" href="<?php echo $cta_button_link; ?>">
			<?php echo $cta_button_text; ?>
		</a>
	</div>
</section>



<!-- <section class="cta" id="cta">
	<div class="cta__container">
		<h3 class="cta__subtitle subtitle">
			<?php the_field('cta_description'); ?>
		</h3>
		<a class="cta__link btn" href="<?php the_field('cta_button_link'); ?>">
			<?php the_field('cta_button_text'); ?>
		</a>
	</div>
</section> -->