<?php
// Template Name: Pagina Inicial
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <main class="wer-main wer-home" id="wer-home">

      <section class="home-main">
        <div class="home-main--container container display-flex-center">
          <div class="home-main--content content display-flex-center">
            <h2 class="home-main--title title title-basic">
              <figure class="home-main__title__figure title-figure title-figure--client">
                <img id="client-img1" src="<?php the_field('maintitle_client_img1'); ?>" alt="Cliente" title="Cliente">
                <img id="client-img2" src="<?php the_field('maintitle_client_img2'); ?>" alt="Cliente" title="Cliente">
                <img id="client-img3" src="<?php the_field('maintitle_client_img3'); ?>" alt="Cliente" title="Cliente">
              </figure>
              <?php the_field('main_home_title'); ?>
            </h2>
            <h1 class="home-main--subtitle subtitle subtitle--giant">
              <?php the_field('main_home_subtitle'); ?>
            </h1>
            <p class="home-main--description description description--giant" style="color:<?php the_field('home_about_subtitle'); ?>">
              <?php the_field('main_home_description'); ?>
            </p>
            <div class="home-main__cta">
              <ul class="home-main__cta--list list">
                <li class="home-main__cta--item">
                  <a class="home-main__cta--link btn" href="<?php echo $mainHomeBanner['main_home_cta_link']; ?>">
                    <?php the_field('main_home_cta_text'); ?>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section class="home-employees">
        <div class="home-employees__container container">
          <h2 class="home-employees__title title title-basic">
            <?php the_field('home_employees_title'); ?>
          </h2>
          <h3 class="home-employees__subtitle subtitle">
            <?php the_field('home_employees_subtitle'); ?>
          </h3>
          <div class="home-employees__list">
            <?php
            $homeSectionEmployeesList = get_field('home_employees_list');
            if (isset($homeSectionEmployeesList)) {
              foreach ($homeSectionEmployeesList as $homeSectionEmployeesItem) { ?>
                <div class="home-employees__item">
                  <figure>
                    <img src="<?php echo $homeSectionEmployeesItem['home_employees_item_imagem']; ?>" alt="<?php echo $homeSectionEmployeesItem['home_employees_item_description']; ?>" title="<?php echo $homeSectionEmployeesItem['home_employees_item_description']; ?>">

                    <figcaption class="home-employees__figcap description" hidden>
                      <?php echo $homeSectionEmployeesItem['home_employees_item_description']; ?>
                    </figcaption>
                  </figure>
                </div>
              <?php }
            } ?>
          </div>
        </div>
      </section>

      <section class="home-about-us">
        <div class="home-about-us__container container">
          <article class="home-about-us__content content">
            <h2 class="home-about-us__title title ">
              <figure class="title-figure display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_about-us.svg">
              </figure>
              <?php the_field('home_about_title'); ?>
            </h2>
            <h3 class="home-about-us__subtitle subtitle">
              <?php the_field('home_about_subtitle'); ?>
            </h3>
            <p class="home-about-us__description description">
              <?php the_field('home_about_description'); ?>
            </p>
            <figure class="home-about-us__image">
              <img src="<?php the_field('home_about_image_desktop'); ?>" alt="Banner Sobre Nós" title="Banner Sobre Nós">
            </figure>
            <ul class="home-about-us__link-list list display-flex">
              <li class="home-about-us__link-item">
                <a class="home-about-us__link btn" href="<?php echo $mainHomeBanner['home_about_cta1_link']; ?>">
                  <?php the_field('home_about_cta1_texto'); ?>
                </a>
              </li>
              <li class="home-about-us__link-item">
                <a class="home-about-us__link btn btn-secondary" href="<?php echo $mainHomeBanner['home_about_cta2_link']; ?>">
                  <?php the_field('home_about_cta2_texto'); ?>
                </a>
              </li>
            </ul>
          </article>
          <figure class="home-about-us__image">
            <img src="<?php the_field('home_about_image_desktop'); ?>" alt="Banner Sobre Nós" title="Banner Sobre Nós">
          </figure>
        </div>
      </section>

      <section class="home-services">
        <div class="home-services__container container display-flex">
          <div class="home-services__content content">
            <h2 class="home-services__title title">
              <figure class="title-figure display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_services.svg">
              </figure>
              <?php the_field('home_services_title'); ?>
            </h2>
            <h3 class="home-services__subtitle subtitle">
              <?php the_field('home_services_subtitle'); ?>
            </h3>
          </div>
          <ul class="home-services__list list">
            <li class="home-services__item item">
              <figure class="home-services__icon icon-bg display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_services-tendencias_das_redes.svg">
              </figure>
              <h4 class="home-services__subtitle subtitle ">
                <?php the_field('home_services_one_title'); ?>
              </h4>
              <p class="home-services__description description">
                <?php the_field('home_services_one_description'); ?>
              </p>
            </li>
            <li class="home-services__item">
              <figure class="home-services__icon icon-bg display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_services-consolidacao_infraestrutura.svg">
              </figure>
              <h4 class="home-services__subtitle subtitle ">
                <?php the_field('home_services_two_title'); ?>
              </h4>
              <p class="home-services__description description">
                <?php the_field('home_services_two_description'); ?>
              </p>
            </li>
            <li class="home-services__item">
              <figure class="home-services__icon icon-bg display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_services-flexibilidade_estrutura.svg">
              </figure>
              <h4 class="home-services__subtitle subtitle ">
                <?php the_field('home_services_three_title'); ?>
              </h4>
              <p class="home-services__description description">
                <?php the_field('home_services_three_description'); ?>
              </p>
            </li>
            <li class="home-services__item">
              <figure class="home-services__icon icon-bg display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_services-gerenciamento_espaco.svg">
              </figure>
              <h4 class="home-services__subtitle subtitle ">
                <?php the_field('home_services_four_title'); ?>
              </h4>
              <p class="home-services__description description">
                <?php the_field('home_services_four_description'); ?>
              </p>
            </li>
          </ul>
        </div>
      </section>

      <section class="home-security">
        <div class="home-security__container container">
          <figure class="home-security__image">
            <source srcset="<?php the_field('home_security_image_mobile'); ?>" media="(max-width: 767px)">
            <img src="<?php the_field('home_security_image_desktop'); ?>" alt="Banner Sobre Nós" title="Banner Sobre Nós">
          </figure>
          <article class="home-security__content content">
            <h2 class="home-security__title title ">
              <figure class="title-figure display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_security.svg">
              </figure>
              <?php the_field('home_security_title'); ?>
            </h2>
            <h3 class="home-security__subtitle subtitle">
              <?php the_field('home_security_subtitle'); ?>
            </h3>
            <p class="home-security__description description">
              <?php the_field('home_security_description'); ?>
            </p>
            <ul class="home-security__link-list list display-flex">
              <li class="home-security__link-item">
                <a class="home-security__link btn" href="<?php echo $mainHomeBanner['home_security_cta_link']; ?>">
                  <?php the_field('home_security_cta_text'); ?>
                </a>
              </li>
            </ul>
          </article>
        </div>
      </section>

      <section class="home-whyus ">
        <div class="home-whyus__container container">
          <div class="home-whyus__content content">
            <h2 class="home-whyus__title title">
              <figure class="title-figure display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_whyus.svg">
              </figure>
              <?php the_field('home_whyus_title'); ?>
            </h2>
            <h3 class="home-whyus__subtitle subtitle">
              <?php the_field('home_whyus_subtitle'); ?>
            </h3>
          </div>
          <ul class="home-whyus__list list">
            <li class="home-whyus__item">
              <figure class="home-whyus__icon icon-bg display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_whyus-military_tech.svg">
              </figure>
              <h4 class="home-whyus__subtitle subtitle ">
                <?php the_field('home_whyus1_subtitle'); ?>
              </h4>
              <p class="home-whyus__description description">
                <?php the_field('home_whyus1_description'); ?>
              </p>
            </li>
            <li class="home-whyus__item">
              <figure class="home-whyus__icon icon-bg display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_whyus-nearby.svg">
              </figure>
              <h4 class="home-whyus__subtitle subtitle ">
                <?php the_field('home_whyus2_subtitle'); ?>
              </h4>
              <p class="home-whyus__description description">
                <?php the_field('home_whyus2_description'); ?>
              </p>
            </li>
            <li class="home-whyus__item">
              <figure class="home-whyus__icon icon-bg display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_whyus-handshake.svg">
              </figure>
              <h4 class="home-whyus__subtitle subtitle ">
                <?php the_field('home_whyus3_subtitle'); ?>
              </h4>
              <p class="home-whyus__description description">
                <?php the_field('home_whyus3_description'); ?>
              </p>
            </li>
            <li class="home-whyus__item">
              <figure class="home-whyus__icon icon-bg display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_whyus-storage.svg">
              </figure>
              <h4 class="home-whyus__subtitle subtitle ">
                <?php the_field('home_whyus4_subtitle'); ?>
              </h4>
              <p class="home-whyus__description description">
                <?php the_field('home_whyus4_description'); ?>
              </p>
            </li>
            <li class="home-whyus__item">
              <figure class="home-whyus__icon icon-bg display-flex-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_whyus-eco.svg">
              </figure>
              <h4 class="home-whyus__subtitle subtitle ">
                <?php the_field('home_whyus5_subtitle'); ?>
              </h4>
              <p class="home-whyus__description description">
                <?php the_field('home_whyus5_description'); ?>
              </p>
            </li>
          </ul>
        </div>
      </section>

      <?php include('contact-section.php'); ?>
      <?php include('cta-section.php'); ?>

    </main>

  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>