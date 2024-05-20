<?php
// Template Name: Doações
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>
    <main class="anac-main anac-donations" id="anac-donations">

      <section class="donations-main">
        <div class="donations-main__container container">
          <div class="donations-main__content main-content grid__container">
            <div class="grid__item--top">
              <h2 class="donations-main__title title title--main">
                <!-- <?php the_title(); ?> -->
                <?php the_field('main_title'); ?>
              </h2>
            </div>
            <div class="grid__item--left grid__item--top">
              <h1 class="donations-main__subtitle subtitle subtitle--giant">
                <?php the_field('main_subtitle'); ?>
              </h1>
            </div>
          </div>
          <figure class="donations-main__banners main-banners grid__container">
            <?php
            $mainPageBanners = get_field('main_banner_page');
            if (!empty($mainPageBanners)) {
              echo '<figure class="donations-main__banners main-banners grid__container">';
              foreach ($mainPageBanners as $key => $mainPageBannersItem) { ?>
                <picture id="donations-main-banner<?php echo $key + 1; ?>">
                  <source srcset="<?php echo $mainPageBannersItem['main_banner_page_mobile']; ?>" media="(max-width: 767px)">
                  <img src="<?php echo $mainPageBannersItem['main_banner_page_desktop']; ?>" alt="Banner <?php echo $key + 1; ?>" title="Banner <?php echo $key + 1; ?>">
                </picture>
              <?php }
              echo '</figure>';
            }
            ?>
          </figure>
        </div>
      </section>

      <section class="donations-qrcodePix">
        <div class="donations-qrcodePix__container container grid__container">
          <div class="grid__item--left">
            <figure class="donations-qrcodePix__figure qr-figure">
              <svg>
                <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites/sprite.svg#anac_qrcode_pix"></use>
              </svg>
            </figure>
          </div>
          <div class="grid__item--right donations-qrcodePix__content">
            <h2 class="donations-qrcodePix__subtitle subtitle">
              <?php the_field('doacoes_pix_subtitle'); ?>
            </h2>
            <p class="donations-qrcodePix__description description">
              <?php the_field('doacoes_pix_description'); ?>
            </p>
            <div class="donations-qrcodePix__data">
              <p class="donations-qrcodePix__description description description--bold" id="qrcode-link">
                00020126360014br.gov.bcb.pix0114625698350001145204000053039865802BR5925ASSOCIACAO NACIONAL DE AS6008BRASILIA62070503***6304F909
              </p>
              <button class="donations-qrcodePix__btn btn" id="copy-link-btn">
                <figure class="donations-qrcodePix__btn-icon">
                  <svg>
                    <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites/sprite.svg#icon_copy"></use>
                  </svg>
                </figure>
                <span>Copiar Link</span>
              </button>
            </div>
          </div>
        </div>
      </section>

      <section class="donations-materials">
        <div class="donations-materials__container container flex-container">
          <h2 class="donations-materials__title title not-before">
            <?php the_field('doacoes_materials_title'); ?>
          </h2>
          <h3 class="donations-materials__subtitle subtitle">
            <?php the_field('doacoes_materials_subtitle'); ?>
          </h3>
          <ul class="donations-materials__card-list grid__container">
            <li class="donations-materials__card-item item-first bg-blue">
              <h4 class="title not-before not-after">
                <?php the_field('doacoes_materiais_list_title_first'); ?>
              </h4>
              <p class="donations-materials__description description">
                <?php the_field('doacoes_materiais_list_description_first'); ?>
              </p>
            </li>
            <li class="donations-materials__card-item item-second">
              <h4 class="title not-before not-after">
                <?php the_field('doacoes_materiais_list_title_second'); ?>
              </h4>
              <p class="donations-materials__description description">
                <?php the_field('doacoes_materiais_list_description_second'); ?>
              </p>
            </li>
            <li class="donations-materials__card-item item-third">
              <h4 class="title not-before not-after">
                <?php the_field('doacoes_materiais_list_title_third'); ?>
              </h4>
              <p class="donations-materials__description description">
                <?php the_field('doacoes_materiais_list_description_third'); ?>
              </p>
            </li>
            <li class="donations-materials__card-item item-fourth bg-blue">
              <h4 class="title not-before not-after">
                <?php the_field('doacoes_materiais_list_title_fourth'); ?>
              </h4>
              <p class="donations-materials__description description">
                <?php the_field('doacoes_materiais_list_description_fourth'); ?>
              </p>
            </li>
          </ul>
        </div>
      </section>

    </main>

  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>