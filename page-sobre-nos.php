<?php
// Template Name: Sobre nós
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <main class="anac-about" id="anac-about">

      <section class="about-main">
        <div class="about-main__container container">
          <div class="about-main__content grid__container">
            <div class="grid__item--top">
              <h2 class="about-main__title title title--main">
                <!-- <?php the_title(); ?> -->
                <?php the_field('main_title'); ?>
              </h2>
            </div>
            <div class="grid__item--left">
              <h1 class="about-main__subtitle subtitle subtitle--giant">
                <?php the_field('main_subtitle'); ?>
              </h1>
            </div>
            <div class="grid__item--right">
              <p class="about-main__description description">
                <?php the_field('main_description'); ?>
              </p>
            </div>
          </div>
          <figure class="about-main__banners main-banners grid__container">
            <?php
            $mainPageBanners = get_field('main_banner_page');
            if (!empty($mainPageBanners)) {
              echo '<figure class="about-main__banners main-banners grid__container">';
              foreach ($mainPageBanners as $key => $mainPageBannersItem) { ?>
                <picture id="main-banner<?php echo $key + 1; ?>">
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

      <section class="about-history" id="about-history">
        <div class="about-history__container container">
          <div class="about-history__content content">
            <h2 class="about-history__title title not-before">
              <?php the_field('about_history_title'); ?>
            </h2>
            <h3 class="about-history__subtitle subtitle">
              <?php the_field('about_history_subtitle'); ?>
            </h3>
            <p class="about-history__description description">
              <?php the_field('about_history_description'); ?>
            </p>
          </div>
        </div>
      </section>

      <section class="about-mission bg-blue" id="about-mission">
        <div class="about-mission__container container">
          <div class="about-mission__content content">
            <h2 class="about-mission__title title">
              <?php the_field('about_mission_title'); ?>
            </h2>
            <h3 class="about-mission__subtitle subtitle">
              <?php the_field('about_mission_subtitle'); ?>
            </h3>
            <ul class="about-mission__list">
              <li class="about-mission__item">
                <h4 class="about-mission__subtitle subtitle">
                  <?php the_field('about_mission_title_mission'); ?>
                </h4>
                <p class="about-mission__description description">
                  <?php the_field('about_mission_description_mission'); ?>
                </p>
              </li>
              <li class="about-mission__item centered">
                <h4 class="about-mission__subtitle subtitle">
                  <?php the_field('about_mission_title_vision'); ?>
                </h4>
                <p class="about-mission__description description">
                  <?php the_field('about_mission_description_vision'); ?>
                </p>
              </li>
              <li class="about-mission__item">
                <h4 class="about-mission__subtitle subtitle">
                  <?php the_field('about_mission_title_value'); ?>
                </h4>
                <p class="about-mission__description description">
                  <?php the_field('about_mission_description_value'); ?>
                </p>
              </li>
            </ul>
          </div>
        </div>
      </section>

      <section class="about-numbers" id="about-numbers">
        <div class="about-numbers__container container">
          <div class="about-numbers__content content">
            <h2 class="about-numbers__title title not-before">
              <?php the_field('about_numbers_title'); ?>
            </h2>
            <h3 class="about-numbers__subtitle subtitle">
              <?php the_field('about_numbers_subtitle'); ?>
            </h3>
          </div>
          <div class="about-numbers__content">
            <div class="about-numbers__content">
              <select class="about-numbers__select header__menu-item-link description" id="yearSelect">
                <option value="2023">2023</option>
                <option value="2022">2022</option>
              </select>
              <table class="about-numbers__table" id="table2023" border="1">
                <caption class="about-numbers__subtitle subtitle subtitle--big">
                  <?php the_field('about_numbers_list_subtitle_first'); ?>
                </caption>
                <tbody>
                  <?php
                  $aboutSectionNumbers = get_field('about_numbers_list');
                  if (isset($aboutSectionNumbers)) {
                    foreach ($aboutSectionNumbers as $aboutSectionNumbersItem) { ?>
                      <tr class="about-numbers__table--row">
                        <td class="about-numbers__table--data description description--bold">
                          <?php echo $aboutSectionNumbersItem['about_numbers_list_qty']; ?>
                        </td>
                        <td class="about-numbers__table--data description">
                          <?php echo $aboutSectionNumbersItem['about_numbers_list_description']; ?>
                        </td>
                      </tr>
                    <?php }
                  } ?>
                  <!-- <tr class="about-numbers__table--row">
                    <td class="about-numbers__table--data description description--bold">579</td>
                    <td class="about-numbers__table--data description">Atendimentos na ANAC – Casa de Acolhimento</td>
                  </tr>
                  <tr class="about-numbers__table--row">
                    <td class="about-numbers__table--data description description--bold">301</td>
                    <td class="about-numbers__table--data description">Pacientes atendidos na ANAC – Casa de Acolhimento</td>
                  </tr>
                  <tr class="about-numbers__table--row">
                    <td class="about-numbers__table--data description description--bold">296</td>
                    <td class="about-numbers__table--data description">Acompanhantes de Pacientes Internado/acompanhantes recebidos na ANAC – Casa de Acolhimento</td>
                  </tr>
                  <tr class="about-numbers__table--row">
                    <td class="about-numbers__table--data description description--bold">10.334</td>
                    <td class="about-numbers__table--data description">Refeições oferecidas na ANAC – Casa de Acolhimento</td>
                  </tr>
                  <tr class="about-numbers__table--row">
                    <td class="about-numbers__table--data description description--bold">3.204</td>
                    <td class="about-numbers__table--data description">Pernoites na ANAC – Casa de Acolhimento</td>
                  </tr>
                  <tr class="about-numbers__table--row">
                    <td class="about-numbers__table--data description description--bold">15</td>
                    <td class="about-numbers__table--data description">Dias – tempo médio – de permanência dos Pacientes na ANAC – Casa de Acolhimento</td>
                  </tr> -->
                </tbody>
              </table>
              <table class="about-numbers__table" id="table2022" border="1" style="display:none;">
                <caption class="about-numbers__subtitle subtitle subtitle--big">Resumo de acolhimento 2022</caption>
                <tbody>
                  <tr class="about-numbers__table--row">
                    <td class="about-numbers__table--data description description--bold">497</td>
                    <td class="about-numbers__table--data description">Atendimentos na ANAC – Casa de Acolhimento</td>
                  </tr>
                  <tr class="about-numbers__table--row">
                    <td class="about-numbers__table--data description description--bold">267</td>
                    <td class="about-numbers__table--data description">Pacientes atendidos na ANAC – Casa de Acolhimento</td>
                  </tr>
                  <tr class="about-numbers__table--row">
                    <td class="about-numbers__table--data description description--bold">230</td>
                    <td class="about-numbers__table--data description">Acompanhantes de Pacientes Internado/acompanhantes recebidos na ANAC – Casa de Acolhimento</td>
                  </tr>
                  <tr class="about-numbers__table--row">
                    <td class="about-numbers__table--data description description--bold">12.172</td>
                    <td class="about-numbers__table--data description">Refeições oferecidas na ANAC – Casa de Acolhimento</td>
                  </tr>
                  <tr class="about-numbers__table--row">
                    <td class="about-numbers__table--data description description--bold">3.230</td>
                    <td class="about-numbers__table--data description">Pernoites na ANAC – Casa de Acolhimento</td>
                  </tr>
                  <tr class="about-numbers__table--row">
                    <td class="about-numbers__table--data description description--bold">16</td>
                    <td class="about-numbers__table--data description">Dias – tempo médio – de permanência dos Pacientes na ANAC – Casa de Acolhimento</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="about-numbers__content">
              <div class="table-responsive">
                <table class="about-numbers__table about-numbers__table--last-years" id="last-years" border="1">
                  <caption class="about-numbers__subtitle subtitle subtitle--big">Registro de acolhimentos nos últimos 10 anos</caption>
                  <thead>
                    <th>ANO</th>
                    <th>2023</th>
                    <th>2022</th>
                    <th>2021</th>
                    <th>2020</th>
                    <th>2019</th>
                    <th>2018</th>
                    <th>2017</th>
                    <th>2016</th>
                    <th>2015</th>
                    <th>2014</th>
                  </thead>
                  <tbody>
                    <tr class="about-numbers__table--row">
                      <td class="about-numbers__table--data description">Número de beneficiados</td>
                      <td class="about-numbers__table--data description">880</td>
                      <td class="about-numbers__table--data description">764</td>
                      <td class="about-numbers__table--data description">500</td>
                      <td class="about-numbers__table--data description">293</td>
                      <td class="about-numbers__table--data description">529</td>
                      <td class="about-numbers__table--data description">541</td>
                      <td class="about-numbers__table--data description">488</td>
                      <td class="about-numbers__table--data description">808</td>
                      <td class="about-numbers__table--data description">827</td>
                      <td class="about-numbers__table--data description">910</td>
                    </tr>
                    <tr class="about-numbers__table--row">
                      <td class="about-numbers__table--data description">Diárias</td>
                      <td class="about-numbers__table--data description">3.204</td>
                      <td class="about-numbers__table--data description">3.230</td>
                      <td class="about-numbers__table--data description">4.051</td>
                      <td class="about-numbers__table--data description">2.425</td>
                      <td class="about-numbers__table--data description">4.553</td>
                      <td class="about-numbers__table--data description">1.952</td>
                      <td class="about-numbers__table--data description">1.397</td>
                      <td class="about-numbers__table--data description">2.449</td>
                      <td class="about-numbers__table--data description">2.412</td>
                      <td class="about-numbers__table--data description">2.061</td>
                    </tr>
                    <tr class="about-numbers__table--row">
                      <td class="about-numbers__table--data description">Refeições servidas</td>
                      <td class="about-numbers__table--data description">10.334</td>
                      <td class="about-numbers__table--data description">12.172</td>
                      <td class="about-numbers__table--data description">12.668</td>
                      <td class="about-numbers__table--data description">8456</td>
                      <td class="about-numbers__table--data description">17.336</td>
                      <td class="about-numbers__table--data description">7.808</td>
                      <td class="about-numbers__table--data description">5.588</td>
                      <td class="about-numbers__table--data description">9.796</td>
                      <td class="about-numbers__table--data description">9.648</td>
                      <td class="about-numbers__table--data description">8.244</td>
                    </tr>
                  </tbody>
                </table>
                <div class="scroll-arrow"></div>
              </div>
              <div class="table-resume">
                <div class="table-resume__content">
                  <p class="table-resume__description description"><span class="about-numbers__table--data description description--bold">8.977 </span>Beneficiados</p>
                  <p class="table-resume__description description"><span class="about-numbers__table--data description description--bold">27.734 </span>Diárias</p>
                  <p class="table-resume__description description"><span class="about-numbers__table--data description description--bold">102.050 </span>Refeições servidas</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="about-team" id="about-team">
        <div class="about-team__container container">
          <div class="about-team__content flex-container">
            <h2 class="about-team__title title">
              <?php the_field('about_team_title'); ?>
            </h2>
            <h3 class="about-team__subtitle subtitle">
              <?php the_field('about_team_subtitle'); ?>
            </h3>
          </div>
          <div class="about-team__content">
            <h4 class="about-team__subtitle subtitle subtitle--big">
              <?php the_field('about_team_list_one_title'); ?>
            </h4>
            <div class="about-team__list">
              <?php
              $aboutTeamListOne = get_field('about_team_list_one');
              if (isset($aboutTeamListOne)) {
                foreach ($aboutTeamListOne as $aboutTeamListOneItem) { ?>
                  <div class="about-team__item">
                    <p class="about-team__name">
                      <?php echo $aboutTeamListOneItem['about_team_list_one_name']; ?>
                    </p>
                    <span class="about-team__position">
                      <?php echo $aboutTeamListOneItem['about_team_list_one_position']; ?>
                  </div>
                <?php }
              } ?>
            </div>
          </div>
          <div class="about-team__content">
            <h4 class="about-team__subtitle subtitle subtitle--big">
              <?php the_field('about_team_list_two_title'); ?>
            </h4>
            <div class="about-team__list">
              <?php
              $aboutTeamListTwo = get_field('about_team_list_two');
              if (isset($aboutTeamListTwo)) {
                foreach ($aboutTeamListTwo as $aboutTeamListTwoItem) { ?>
                  <div class="about-team__item">
                    <p class="about-team__name">
                      <?php echo $aboutTeamListTwoItem['about_team_list_two_name']; ?>
                    </p>
                    <span class="about-team__position">
                      <?php echo $aboutTeamListTwoItem['about_team_list_two_position']; ?>
                  </div>
                <?php }
              } ?>
            </div>
          </div>
          <div class="about-team__content">
            <h4 class="about-team__subtitle subtitle subtitle--big">
              <?php the_field('about_team_list_three_title'); ?>
            </h4>
            <div class="about-team__list">
              <?php
              $aboutTeamListThree = get_field('about_team_list_three');
              if (isset($aboutTeamListThree)) {
                foreach ($aboutTeamListThree as $aboutTeamListThreeItem) { ?>
                  <div class="about-team__item">
                    <p class="about-team__name">
                      <?php echo $aboutTeamListThreeItem['about_team_list_three_name']; ?>
                    </p>
                    <span class="about-team__position">
                      <?php echo $aboutTeamListThreeItem['about_team_list_three_position']; ?>
                  </div>
                <?php }
              } ?>
            </div>
          </div>
          <div class="about-team__content">
            <h4 class="about-team__subtitle subtitle subtitle--big">
              <?php the_field('about_team_list_four_title'); ?>
            </h4>
            <div class="about-team__list">
              <?php
              $aboutTeamListFour = get_field('about_team_list_four');
              if (isset($aboutTeamListFour)) {
                foreach ($aboutTeamListFour as $aboutTeamListFourItem) { ?>
                  <div class="about-team__item">
                    <p class="about-team__name">
                      <?php echo $aboutTeamListFourItem['about_team_list_four_name']; ?>
                    </p>
                    <span class="about-team__position">
                      <?php echo $aboutTeamListFourItem['about_team_list_four_position']; ?>
                  </div>
                <?php }
              } ?>
            </div>
          </div>
          <div class="about-team__content">
            <h4 class="about-team__subtitle subtitle subtitle--big">
              <?php the_field('about_team_list_five_title'); ?>
            </h4>
            <div class="about-team__list">
              <?php
              $aboutTeamListFive = get_field('about_team_list_five');
              if (isset($aboutTeamListFive)) {
                foreach ($aboutTeamListFive as $aboutTeamListFiveItem) { ?>
                  <div class="about-team__item">
                    <p class="about-team__name">
                      <?php echo $aboutTeamListFiveItem['about_team_list_five_name']; ?>
                    </p>
                    <span class="about-team__position">
                      <?php echo $aboutTeamListFiveItem['about_team_list_five_position']; ?>
                  </div>
                <?php }
              } ?>
            </div>
          </div>
          <div class="about-team__content">
            <h4 class="about-team__subtitle subtitle subtitle--big">
              <?php the_field('about_team_list_six_title'); ?>
            </h4>
            <div class="about-team__list">
              <?php
              $aboutTeamListSix = get_field('about_team_list_six');
              if (isset($aboutTeamListSix)) {
                foreach ($aboutTeamListSix as $aboutTeamListSixItem) { ?>
                  <div class="about-team__item">
                    <p class="about-team__name">
                      <?php echo $aboutTeamListSixItem['about_team_list_six_name']; ?>
                    </p>
                    <span class="about-team__position">
                      <?php echo $aboutTeamListSixItem['about_team_list_six_position']; ?>
                  </div>
                <?php }
              } ?>
            </div>
          </div>
          <div class="about-team__content">
            <h4 class="about-team__subtitle subtitle subtitle--big">
              <?php the_field('about_team_list_seven_title'); ?>
            </h4>
            <div class="about-team__list">
              <?php
              $aboutTeamListSeven = get_field('about_team_list_seven');
              if (isset($aboutTeamListSeven)) {
                foreach ($aboutTeamListSeven as $aboutTeamListSevenItem) { ?>
                  <div class="about-team__item">
                    <p class="about-team__name">
                      <?php echo $aboutTeamListSevenItem['about_team_list_seven_name']; ?>
                    </p>
                    <span class="about-team__position">
                      <?php echo $aboutTeamListSevenItem['about_team_list_seven_position']; ?>
                  </div>
                <?php }
              } ?>
            </div>
          </div>
        </div>
      </section>

    </main>

    <section class="cta" id="cta">
      <div class="cta__container">
        <h3 class="cta__subtitle subtitle"> Você pode contribuir para tornar que a nossa casa de apoio se torne um lugar ainda melhor para pessoas com necessidades especiais!</h3><a class="cta__link btn" href="./v2024/doacoes"> Doe agora</a>
      </div>
    </section>

  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>