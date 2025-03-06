<?php
// Template Name: Soluções
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <main class="wer-main wer-services" id="wer-services">

      <section class="services-main section-main">
        <div class="services-main__container container">
          <div class="services-main__content main-content">
            <div class="grid__item--top">
              <h2 class="services-main__title title title--main">
                <!-- <?php the_title(); ?> -->
                <?php the_field('main_title'); ?>
              </h2>
            </div>
            <div class="grid__item--left">
              <h1 class="services-main__subtitle subtitle ">
                <?php the_field('main_subtitle'); ?>
              </h1>
            </div>
            <div class="grid__item--right">
              <p class="services-main__description description">
                <?php the_field('main_description'); ?>
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="services-items">
        <div class="services-items__container container">
          <div class="services-items__content content">
            <ul class="services-items__list list">
              <li class="services-items__item">
                <div class="services-items__head">
                  <figure class="services-items__icon icon-bg display-flex-center">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_services-tendencias_das_redes.svg">
                  </figure>
                  <h4 class="services-items__subtitle subtitle subtitle--big">
                    <?php the_field('services_item_title_first'); ?>
                  </h4>
                </div>
                <div class="services-items__content">
                  <p class="services-items__description description">
                    <?php the_field('services_item_description_first'); ?>
                  </p>
                </div>
              </li>
              <li class="services-items__item">
                <div class="services-items__head">
                  <figure class="services-items__icon icon-bg display-flex-center">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_services-consolidacao_infraestrutura.svg">
                  </figure>
                  <h4 class="services-items__subtitle subtitle subtitle--big">
                    <?php the_field('services_item_title_second'); ?>
                  </h4>
                </div>
                <div class="services-items__content">
                  <p class="services-items__description description">
                    <?php the_field('services_item_description_second'); ?>
                  </p>
                </div>
              </li>
              <li class="services-items__item">
                <div class="services-items__head">
                  <figure class="services-items__icon icon-bg display-flex-center">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_services-flexibilidade_estrutura.svg">
                    </svg>
                  </figure>
                  <h4 class="services-items__subtitle subtitle subtitle--big">
                    <?php the_field('services_item_title_third'); ?>
                  </h4>
                </div>
                <div class="services-items__content">
                  <p class="services-items__description description">
                    <?php the_field('services_item_description_third'); ?>
                  </p>
                </div>
              </li>
              <li class="services-items__item" id="item-transporte">
                <div class="services-items__head">
                  <figure class="services-items__icon icon-bg display-flex-center">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_services-gerenciamento_espaco.svg">
                  </figure>
                  <h4 class="services-items__subtitle subtitle subtitle--big">
                    <?php the_field('services_item_title_fourth'); ?>
                  </h4>
                </div>
                <div class="services-items__content">
                  <p class="services-items__description description">
                    <?php the_field('services_item_description_fourth'); ?>
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </section>

      <section class="services-oficinas " style="display: none!important">
        <div class="services-oficinas__container container">
          <div class="services-oficinas__content content">
            <h2 class="services-oficinas__title title not-after"> OFICINAS</h2>
            <h3 class="services-oficinas__subtitle subtitle"> Veja nossas oficinas disponíveis:</h3>
            <div class="grid__container">
              <figure class="services-oficinas__image">
                <picture>
                  <source srcset="https://www.anacar.org.br/wp-content/uploads/2024/03/BANNER_mobile_oficinas1.webp" media="(max-width: 767px)"><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/BANNER_mobile_oficinas1.webp" alt="Banner de oficina: Culinária" title="Culinária">
                </picture>
                <figcaption class="services-oficinas__legend"> Culinária</figcaption>
              </figure>
              <figure class="services-oficinas__image">
                <picture>
                  <source srcset="https://www.anacar.org.br/wp-content/uploads/2024/03/BANNER_mobile_oficinas2.webp" media="(max-width: 767px)"><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/BANNER_mobile_oficinas2.webp" alt="Banner de oficina: Artesanal" title="Artesanal">
                </picture>
                <figcaption class="services-oficinas__legend"> Artesanal</figcaption>
              </figure>
              <figure class="services-oficinas__image">
                <picture>
                  <source srcset="https://www.anacar.org.br/wp-content/uploads/2024/03/BANNER_mobile_oficinas3.webp" media="(max-width: 767px)"><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/BANNER_mobile_oficinas3.webp" alt="Banner de oficina: Atividade de apoio" title="Atividade de apoio">
                </picture>
                <figcaption class="services-oficinas__legend"> Atividade de apoio</figcaption>
              </figure>
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