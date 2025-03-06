<?php
// Template Name: Sobre nós
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <main class="wer-main wer-about" id="wer-about">

      <section class="about-main section-main">
        <div class="about-main__container container">
          <div class="about-main__content main-content content">
            <h2 class="about-main__title title title--main">
              <figure class="title-figure display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_groups_2.svg">
              </figure>
              <?php the_field('main_title'); ?>
            </h2>
            <h1 class="about-main__subtitle subtitle ">
              <?php the_field('main_subtitle'); ?>
            </h1>
            <p class="about-main__description description">
              <?php the_field('main_description'); ?>
            </p>
          </div>
          <figure class="about-main__banners main-banners grid__container">
            <?php
            $mainPageBanners = get_field('main_banner_page');
            if (!empty($mainPageBanners)) {
              echo '<figure class="about-main__banners main-banners grid__container">';
              foreach ($mainPageBanners as $key => $mainPageBannersItem) { ?>
                <picture id="about-main-banner<?php echo $key + 1; ?>">
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

      <section class="about-mission " id="about-mission">
        <div class="about-mission__container container">
          <div class="about-mission__content content">
            <h2 class="about-mission__title title">
              <figure class="title-figure display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_approval_delegation.svg">
              </figure>
              <?php the_field('about_mission_title'); ?>
            </h2>
            <h3 class="about-mission__subtitle subtitle">
              <?php the_field('about_mission_subtitle'); ?>
            </h3>
          </div>
          <ul class="about-mission__list list">
            <li class="about-mission__item">
              <figure class="about-mission__icon icon-bg display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_rocket_launch.svg">
              </figure>
              <h4 class="about-mission__subtitle subtitle">
                <?php the_field('about_mission_title_mission'); ?>
              </h4>
              <p class="about-mission__description description">
                <?php the_field('about_mission_description_mission'); ?>
              </p>
            </li>
            <li class="about-mission__item centered">
              <figure class="about-mission__icon icon-bg display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_target.svg">
              </figure>
              <h4 class="about-mission__subtitle subtitle">
                <?php the_field('about_mission_title_vision'); ?>
              </h4>
              <p class="about-mission__description description">
                <?php the_field('about_mission_description_vision'); ?>
              </p>
            </li>
            <li class="about-mission__item">
              <figure class="about-mission__icon icon-bg display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_work.svg">
              </figure>
              <h4 class="about-mission__subtitle subtitle">
                <?php the_field('about_mission_title_value'); ?>
              </h4>
              <p class="about-mission__description description">
                <?php the_field('about_mission_description_value'); ?>
              </p>
            </li>
          </ul>
        </div>
      </section>

      <section class="about-team" id="about-team">
        <div class="about-team__container container">
          <div class="about-team__content content">
            <h2 class="about-team__title title">
              <figure class="title-figure display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_group.svg">
              </figure>
              <?php the_field('about_team_title'); ?>
            </h2>
            <h3 class="about-team__subtitle subtitle">
              <?php the_field('about_team_subtitle'); ?>
            </h3>
            <h4 class="about-team__description description ">
              <?php the_field('about_team_description'); ?>
            </h4>
          </div>
          <div class="about-team__content content">
            <div class="about-team__list">
              <?php
              $aboutTeamList = get_field('about_team_list');
              if (isset($aboutTeamList)) {
                foreach ($aboutTeamList as $aboutTeamListItem) { ?>
                  <div class="about-team__item">
                    <figure class="home-about-us__image">
                      <img src="<?php echo $aboutTeamListItem['about_team_list_photo']; ?>" alt="Foto do integrante da equipe" title="Foto do integrante da equipe">
                    </figure>
                    <p class="about-team__name description">
                      <?php echo $aboutTeamListItem['about_team_list_name']; ?>
                    </p>
                    <span class="about-team__position description">
                      <?php echo $aboutTeamListItem['about_team_list_position']; ?>
                  </div>
                <?php }
              } ?>
            </div>
          </div>
        </div>
      </section>

    </main>

    <?php include('cta-section.php'); ?>

  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>