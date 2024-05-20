<?php
// Template Name: Estrutura
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>
    <main class="anac-main anac-structure" id="anac-structure">

      <section class="structure-main">
        <div class="structure-main__container container">
          <div class="structure-main__content main-content grid__container">
            <div class="grid__top">
              <h2 class="structure-main__title title title--main">
                <!-- <?php the_title(); ?> -->
                <?php the_field('main_title'); ?>
              </h2>
            </div>
            <div class="grid__left grid__top">
              <h1 class="structure-main__subtitle subtitle subtitle--giant">
                <?php the_field('main_subtitle'); ?>
              </h1>
            </div>
          </div>
          <figure class="structure-main__banners main-banners grid__container">
            <?php
            $mainPageBanners = get_field('main_banner_page');
            if (!empty($mainPageBanners)) {
              echo '<figure class="structure-main__banners main-banners grid__container">';
              foreach ($mainPageBanners as $key => $mainPageBannersItem) { ?>
                <picture id="structure-main-banner<?php echo $key + 1; ?>">
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

      <section class="structure-supportHouse" style="display: none!important">
        <div class="structure-supportHouse__container container">
          <div class="structure-supportHouse__content grid__container">
            <div class="grid__item flex-container">
              <h2 class="structure-supportHouse__title title not-before">
                <?php the_field('structure_supportHouse_title'); ?>
              </h2>
              <h3 class="structure-supportHouse__subtitle subtitle">
                <?php the_field('structure_supportHouse_subtitle'); ?>
              </h3>
              <a class="structure-supportHouse__link link description" href="<?php the_field('structure_supportHouse_description_address_link'); ?>" target="_blank">
                <?php the_field('structure_supportHouse_description_address_text'); ?>
              </a>
              <a class="structure-supportHouse__link link description" href="<?php the_field('structure_supportHouse_description_phone_link'); ?>" target="_blank">
                <?php the_field('structure_supportHouse_description_phone_text'); ?>
              </a>
              <div class="structure-supportHouse__maps">
                <?php the_field('structure_headquarters_description_maps'); ?>
              </div>
            </div>
            <div class="grid__item">
              <div class="structure-supportHouse__list list structure__slick">
                <?php
                $estructureSupportHouseImages = get_field('structure_supportHouse_image_list');
                if (isset($estructureSupportHouseImages)) {
                  foreach ($estructureSupportHouseImages as $estructureSupportHouseImage) { ?>
                    <div class="structure-headquarters__item">
                      <figure>
                        <img src="<?php echo $estructureSupportHouseImage['structure_supportHouse_item_file']; ?>" alt="Imagem da casa de repouso: Entrada" title="Imagem da sede Caravelas: Entrada">
                      </figure>
                    </div>
                  <?php }
                } ?>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="structure-headquarters bg-blue">
        <div class="structure-headquarters__container container">
          <div class="structure-headquarters__content grid__container">
            <div class="grid__item grid-row-2">
              <div class="structure-headquarters__list list structure__slick">
                <?php
                $estructureHeadquartersImages = get_field('structure_headquarters_image_list');
                if (isset($estructureHeadquartersImages)) {
                  foreach ($estructureHeadquartersImages as $estructureHeadquartersImage) { ?>
                    <div class="structure-headquarters__item">
                      <figure>
                        <img src="<?php echo $estructureHeadquartersImage['structure_headquarters_item_file']; ?>" alt="Imagem da sede Caravelas: Entrada" title="Imagem da sede Caravelas: Entrada">
                      </figure>
                    </div>
                  <?php }
                } ?>
              </div>
            </div>
            <div class="grid__item flex-container">
              <h2 class="structure-headquarters__title title not-after">
                <?php the_field('structure_headquarters_title'); ?>
              </h2>
              <h3 class="structure-headquarters__subtitle subtitle">
                <?php the_field('structure_headquarters_subtitle'); ?>
              </h3>
              <div class="structure-headquarters__description description">
                <a class="structure-headquarters__link link description" href="<?php the_field('structure_headquarters_description_address_link'); ?>" target="_blank">
                  <?php the_field('structure_headquarters_description_address_text'); ?>
                </a>
                <a class="structure-headquarters__link link description" href="<?php the_field('structure_headquarters_description_phone_link'); ?>" target="_blank">
                  <?php the_field('structure_headquarters_description_phone_text'); ?>
                </a>
                <div class="structure-headquarters__maps">
                  <?php the_field('structure_headquarters_description_maps'); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <?php include ('cta-section.php'); ?>

  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>