<?php
// Template Name: Pagina Inicial
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <main class="anac-main anac-home" id="anac-home">

      <section class="home-main">
        <div class="home-main__banner--container container">

          <?php
          $mainHomeBanners = get_field('main_banners');
          if (isset($mainHomeBanners)) {
            foreach ($mainHomeBanners as $key => $mainHomeBanner) { ?>
              <li>
                <figure class="home-main__banner--figure figure" id="banner<?php echo $key + 1; ?>">
                  <picture>
                    <source srcset="<?php echo $mainHomeBanner['main_banner_image_mobile']; ?>" media="(max-width: 576px)">
                    <img src="<?php echo $mainHomeBanner['main_banner_image_desktop']; ?>" alt="Banner <?php echo $key + 1; ?>" title="Banner <?php echo $key + 1; ?>">
                  </picture>
                  <figcaption class="home-main__banner--content content">
                    <h2 class="home-main__banner--title title" style="color:<?php echo $mainHomeBanner['main_banner_fontcolor_title']; ?>">
                      <?php echo $mainHomeBanner['main_banner_title']; ?>
                    </h2>
                    <h1 class="home-main__banner--subtitle subtitle subtitle--giant" style="color:<?php echo $mainHomeBanner['main_banner_fontcolor_subtitle']; ?>">
                      <?php echo $mainHomeBanner['main_banner_subtitle']; ?>
                    </h1>
                    <div class="home-main__cta">
                      <ul class="home-main__cta--list">
                        <?php if ($key !== 0) { // Verifica se não é o primeiro banner ?>
                          <li class="home-main__cta--item">
                            <a class="home-main__cta--link btn" href="<?php echo $mainHomeBanner['main_banner_cta_link']; ?>">
                              <?php echo $mainHomeBanner['main_banner_cta_text']; ?>
                            </a>
                          </li>
                        <?php } else { ?>
                          <li class="home-main__cta--item">
                            <a class="home-main__cta--link has-figure" href="https://www.facebook.com/casadocardiaco.anac.7">
                              <figure>
                                <svg>
                                  <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites/sprite.svg#facebook"></use>
                                </svg>
                              </figure>
                            </a>
                          </li>
                          <li class="home-main__cta--item">
                            <a class="home-main__cta--link has-figure" href="https://www.instagram.com/anac_casadocardiaco/">
                              <figure>
                                <svg>
                                  <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites/sprite.svg#instagram"></use>
                                </svg>
                              </figure>
                            </a>
                          </li>
                          <li class="home-main__cta--item">
                            <a class="home-main__cta--link has-figure" href="https://www.linkedin.com/company/anac-casa-do-cardíaco/about/">
                              <figure>
                                <svg>
                                  <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites/sprite.svg#linkedin"></use>
                                </svg>
                              </figure>
                            </a>
                          </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </figcaption>
                </figure>
              </li>
            <?php }
          } ?>

        </div>
      </section>

      <section class="home-about-us">
        <div class="home-about-us__container container">
          <figure class="home-about-us__image">
            <source srcset="<?php the_field('home_about_image_mobile'); ?>" media="(max-width: 767px)">
            <img src="<?php the_field('home_about_image_desktop'); ?>" alt="Banner Sobre Nós" title="Banner Sobre Nós">
          </figure>
          <article class="home-about-us__content">
            <h2 class="home-about-us__title title not-before">
              <?php the_field('home_about_title'); ?>
            </h2>
            <h3 class="home-about-us__subtitle subtitle">
              <?php the_field('home_about_subtitle'); ?>
            </h3>
            <p class="home-about-us__description description">
              <?php the_field('home_about_description'); ?>
            </p>
            <a class="home-about-us__link btn" href="<?php echo get_stylesheet_directory_uri(); ?>/sobre-nos">
              <?php the_field('home_about_link'); ?>
            </a>
          </article>
        </div>
      </section>

      <section class="home-services">
        <div class="home-services__container flex">
          <h2 class="home-services__title title">
            <?php the_field('home_services_title'); ?>
          </h2>
          <h3 class="home-services__subtitle subtitle">
            <?php the_field('home_services_subtitle'); ?>
          </h3>
          <p class="home-services__description description">
            <?php the_field('home_services_description'); ?>
          </p>
          <ul class="home-services__container--grid">
            <li class="home-services__item">
              <figure class="home-services__icon">
                <svg>
                  <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites/sprite.svg#anac_icon-hospedagem"></use>
                </svg>
              </figure>
              <h4 class="home-services__subtitle subtitle subtitle--big">
                <?php the_field('home_services_one_title'); ?>
              </h4>
              <p class="home-services__description description">
                <?php the_field('home_services_one_description'); ?>
              </p>
            </li>
            <li class="home-services__item">
              <figure class="home-services__icon">
                <svg>
                  <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites/sprite.svg#anac_icon-alimentacao"></use>
                </svg>
              </figure>
              <h4 class="home-services__subtitle subtitle subtitle--big">
                <?php the_field('home_services_two_title'); ?>
              </h4>
              <p class="home-services__description description">
                <?php the_field('home_services_two_description'); ?>
              </p>
            </li>
            <li class="home-services__item">
              <figure class="home-services__icon">
                <svg>
                  <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites/sprite.svg#anac_icon-servicos_sociais"></use>
                </svg>
              </figure>
              <h4 class="home-services__subtitle subtitle subtitle--big">
                <?php the_field('home_services_three_title'); ?>
              </h4>
              <p class="home-services__description description">
                <?php the_field('home_services_three_description'); ?>
              </p>
            </li>
            <li class="home-services__item" style="display: none!important">
              <figure class="home-services__icon">
                <svg>
                  <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites/sprite.svg#anac_icon-transporte"></use>
                </svg>
              </figure>
              <h4 class="services__subtitle subtitle subtitle--big">
                <?php the_field('home_services_four_title'); ?>
              </h4>
              <p class="services__description description">
                <?php the_field('home_services_four_description'); ?>
              </p>
            </li>
          </ul>
        </div>
      </section>

      <section class="home-donation bg-blue">
        <div class="home-donation__container grid">
          <div class="grid__left">
            <h2 class="home-donation__title title not-after">
              <?php the_field('home_donations_title'); ?>
            </h2>
            <h3 class="home-donation__subtitle subtitle">
              <?php the_field('home_donations_subtitle'); ?>
            </h3>
            <h3 class="home-donation__description description">
              <?php the_field('home_donations_description'); ?>
            </h3>
            <div class="legend-container"></div>
          </div>

          <?php
          $homeDonationsChart = get_field('home_donations_chart');

          if ($homeDonationsChart) {
            $labelsDonations = [];
            $valuesDonations = [];
            $colorsDonations = [];

            // Iterar sobre os grupos de campos
            foreach ($homeDonationsChart as $homeDonationsChartItem) {
              // Recuperar os valores dos campos
              $labelsDonations[] = $homeDonationsChartItem['home_donations_chart_label'];
              $valuesDonations[] = $homeDonationsChartItem['home_donations_chart_value'];
              $colorsDonations[] = $homeDonationsChartItem['home_donations_chart_color'];
            }
            ?>
            <div class="grid__right">
              <div class="home-donation__chart-container">
                <canvas id="anacDonations"></canvas>
              </div>
              <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
              <script>
                document.addEventListener('DOMContentLoaded', function () {
                  const ctx = document.getElementById('anacDonations');
                  const labelsDonations = <?php echo json_encode($labelsDonations); ?>;
                  const valuesDonations = <?php echo json_encode($valuesDonations); ?>;
                  const colorsDonations = <?php echo json_encode($colorsDonations); ?>;
                  const chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                      labels: labelsDonations,
                      datasets: [{
                        label: 'Divisão em porcentagem',
                        data: valuesDonations,
                        borderWidth: 1,
                        backgroundColor: colorsDonations
                      }]
                    },
                    options: {
                      plugins: {
                        legend: {
                          display: false
                        }
                      },
                      scales: {
                        y: {
                          display: false,
                          beginAtZero: true
                        }
                      }
                    }
                  });

                  // Função para criar a legenda na div .legend-container
                  function createLegend() {
                    const legendContainer = document.querySelector('.legend-container');
                    const legendItems = chart.data.labels.map((label, index) => {
                      const backgroundColor = chart.data.datasets[0].backgroundColor[index];
                      const valuesLegends = chart.data.datasets[0].data[index];
                      return `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              <div class="legend-item">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  <div class="legend-color" style="background-color: ${backgroundColor}"></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  <span class="legend-label">${valuesLegends}% ${label}</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              </div>`;
                    });
                    legendContainer.innerHTML = legendItems.join('');
                  }

                  // Atualiza a legenda quando o gráfico é inicializado
                  createLegend();

                  // Adiciona evento de clique na legenda para ocultar/mostrar o conjunto de dados correspondente
                  document.querySelector('.legend-container').addEventListener('click', function (e) {
                    if (e.target.classList.contains('legend-label')) {
                      const index = Array.from(e.target.parentNode.parentNode.children).indexOf(e.target.parentNode);
                      const meta = chart.getDatasetMeta(0);
                      meta.data[index].hidden = !meta.data[index].hidden;
                      chart.update();
                    }
                  });
                });
              </script>
            </div>
            <?php
          } ?>

        </div>
      </section>

      <section class="home-employees">
        <div class="home-employees__container">
          <h2 class="home-employees__title title">
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

      <section class="home-instagram bg-blue">
        <div class="home-instagram__container">
          <h2 class="home-instagram__title title">
            <?php the_field('home_instagram_title'); ?>
          </h2>
          <h3 class="home-instagram__subtitle subtitle">
            <?php the_field('home_instagram_subtitle'); ?>
          </h3>
          <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
          <div class="elfsight-app-06b3c6ba-2a2d-4618-b3e3-96cf6597205b" data-elfsight-app-lazy></div>
        </div>
      </section>

    </main>

    <?php include ('cta-section.php'); ?>

  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>