<?php
// Template Name: Doações Nota Fiscal
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <main class="anac-main anac-donationsNF" id="anac-donationsNF">
      <section class="donationsNF-main">
        <div class="donationsNF-main__container container">
          <div class="donationsNF-main__content main-content grid__container">
            <div class="grid__item--top">
              <h2 class="donationsNF-main__title title title--main">
                <!-- <?php the_title(); ?> -->
                <?php the_field('main_title'); ?>
              </h2>
            </div>
            <div class="grid__item--left grid__item--top">
              <h1 class="donationsNF-main__subtitle subtitle subtitle--giant">
                <?php the_field('main_subtitle'); ?>
              </h1>
            </div>
          </div>
          <figure class="donationsNF-main__banners main-banners grid__container">
            <?php
            $mainPageBanners = get_field('main_banner_page');
            if (!empty($mainPageBanners)) {
              echo '<figure class="donationsNF-main__banners main-banners grid__container">';
              foreach ($mainPageBanners as $key => $mainPageBannersItem) { ?>
                <picture id="donationsNF-main-banner<?php echo $key + 1; ?>">
                  <source srcset="<?php echo $mainPageBannersItem['main_banner_page_mobile']; ?>" media="(max-width: 767px)">
                  <img src="<?php echo $mainPageBannersItem['main_banner_page_desktop']; ?>" alt="Banner <?php echo $key + 1; ?>" title="Banner <?php echo $key + 1; ?>">
                </picture>
              <?php }
              echo '</figure>';
            }
            ?>
        </div>
      </section>

      <section class="donationsNF-stepByStep">

        <div class="donationsNF-stepByStep__container container">
          <div class="donationsNF-stepByStep__content">
            <h2 class="donationsNF-stepByStep__subtitle subtitle">
              <?php the_field('doacoesNf_comoDoar_subtitle'); ?>
            </h2>
            <p class="donationsNF-stepByStep__description description">
              <?php the_field('doacoesNf_comoDoar_description'); ?>
            </p>
          </div>
        </div>

        <div class="donationsNF-stepByStep__container bg-blue">
          <div class="donationsNF-stepByStep__content container grid__container">
            <div class="grid__item">
              <h2 class="donationsNF-stepByStep__subtitle subtitle text-align-left">Pelo aplicativo</h2>
              <ol class="donactionsNF-stepByStep__list list">
                <?php
                $doacoesNfListApp = get_field('doacoesNf_list_app');
                if (isset($doacoesNfListApp)) {
                  foreach ($doacoesNfListApp as $key => $doacoesNfListAppItem) { ?>
                    <li class="donationsNF-stepByStep__item description text-align-left">
                      <?php echo $doacoesNfListAppItem['doacoesNf_list_app_item']; ?>
                    </li>
                  <?php }
                }
                ?>
              </ol>
            </div>
            <div class="grid__item">
              <h2 class="donationsNF-stepByStep__subtitle subtitle text-align-left">Pelo site na nota fiscal</h2>
              <ol class="donactionsNF-stepByStep__list list">
                <?php
                $doacoesNfListSite = get_field('doacoesNf_list_site');
                if (isset($doacoesNfListSite)) {
                  foreach ($doacoesNfListSite as $key => $doacoesNfListSiteItem) { ?>
                    <li class="donationsNF-stepByStep__item description text-align-left">
                      <?php echo $doacoesNfListSiteItem['doacoesNf_list_site_item']; ?>
                    </li>
                  <?php }
                }
                ?>
              </ol>
            </div>
          </div>
        </div>

      </section>

    </main>

  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>