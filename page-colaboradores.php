<?php
// Template Name: Colaboradores
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <main class="anac-main anac-employees" id="anac-employees">

      <section class="employees-main">
        <div class="employees-main__container container">
          <div class="employees-main__content main-content grid__container">
            <div class="grid__item--top flex-container">
              <h2 class="employees-main__title title title--main">
                <!-- <?php the_title(); ?> -->
                <?php the_field('main_title'); ?>
              </h2>
            </div>
            <div class="grid__item-left grid__item--top">
              <h1 class="employees-main__subtitle subtitle subtitle--giant">
                <?php the_field('main_subtitle'); ?>
              </h1>
            </div>
          </div>
        </div>
      </section>

      <section class="employees-items__container container">
        <div class="employees-items__list list employees-items__slick is-power_off">
          <?php
          $employeesList = get_field('employees_list');
          if (isset($employeesList)) {
            foreach ($employeesList as $employeesItem) { ?>
              <div class="employees-items__item">
                <a class="employees-items__link" href="<?php echo $employeesItem['employees_item_link']; ?>">
                  <figure>
                    <img src="<?php echo $employeesItem['employees_item_imagem']; ?>" alt="<?php echo $employeesItem['employees_item_description']; ?>" title="<?php echo $employeesItem['employees_item_description']; ?>">
                    <figcaption class="employees__figcap description" hidden>
                      <?php echo $employeesItem['employees_item_description']; ?>
                    </figcaption>
                  </figure>
                </a>
              </div>
            <?php }
          } ?>
        </div>
      </section>

    </main>

  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>