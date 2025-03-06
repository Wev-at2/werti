<?php
// Template Name: Contato
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>
    <main class="wer-main wer-contact" id="wer-contact">
      <?php include('contact-section.php'); ?>

      <section class="faq ">
        <div class="faq__container container display-grid">
          <div class="faq__item faq__item display-flex">
            <h2 class="faq__title title">
              <?php the_field('faq_title'); ?>
            </h2>
            <h3 class="faq__subtitle subtitle">
              <?php the_field('faq_subtitle'); ?>
            </h3>
            <p class="faq__description description">
              <?php the_field('faq_description'); ?>
            </p>
          </div>
          <div class="faq__item faq__item--questions">
            <div class="faq__content">
              <?php
              $faqList = get_field('faq_list');
              if (isset($faqList)) {
                foreach ($faqList as $faqItem) { ?>
                  <details class="faq__details">
                    <summary class="faq__summary">
                      <h4 class="faq__question subtitle">
                        <?php echo $faqItem['faq_item_question']; ?>
                      </h4>
                    </summary>
                    <p class="faq__answer description">
                      <?php echo $faqItem['faq_item_answer']; ?>
                    </p>
                  </details>
                <?php }
              } ?>
            </div>
          </div>
        </div>
      </section>

      <?php include('cta-section.php'); ?>
    </main>
  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>