<?php
// Template Name: Blog
get_header(); ?>

<main class="wer-main wer-blog" id="wer-blog">
  <section class="blog-main section-main">
    <div class="blog-main__container container">
      <div class="blog-main__content main-content">
        <h2 class="blog-main__title title title--main">
          <figure class="title-figure display-flex-center">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_groups_2.svg">
          </figure>
          <?php the_field('main_title'); ?>
        </h2>
        <h1 class="blog-main__subtitle subtitle ">
          <?php the_field('main_subtitle'); ?>
        </h1>
        <p class="blog-main__description description">
          <?php the_field('main_description'); ?>
        </p>
      </div>
      <figure class="blog-main__banners main-banners grid__container" style="display:none!important">
        <?php
        $mainPageBanners = get_field('main_banner_page');
        if (!empty($mainPageBanners)) {
          echo '<figure class="blog-main__banners main-banners grid__container">';
          foreach ($mainPageBanners as $key => $mainPageBannersItem) { ?>
            <picture id="blog-main-banner<?php echo $key + 1; ?>">
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
  <section class="blog-posts">
    <div class="blog-posts__container container">
      <ul class="blog-posts__list list">
        <?php
        $query = new WP_Query(array(
          'post_type' => 'post',
          'posts_per_page' => 6
        ));
        if ($query->have_posts()):
          while ($query->have_posts()):
            $query->the_post();
            $post_date = get_post_meta(get_the_ID(), 'blog_data_publicacao', true);
            $post_date_formatted = date_i18n('j M Y', strtotime($post_date));
            ?>
            <li class="blog-posts__item display-flex">
              <a href="<?php the_permalink(); ?>">
                <figure class="blog-posts__figure display-flex-center">
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail(array(400, 300)); ?>
                  <?php endif; ?>
                </figure>
                <div class="blog-posts__text display-flex">
                  <span class="blog-posts__description description description-small post-date"><?php echo $post_date_formatted; ?></span>
                  <h4 class="subtitle"><?php echo wp_trim_words(get_the_title(), 6); ?></h4>
                  <p class="description description-small"><?php echo wp_trim_words(get_the_content(), 14); ?></p>
                  <strong class="blog-posts__link description">Ver artigo</strong>
                </div>
              </a>
            </li>
          <?php endwhile;
          wp_reset_postdata();
        else:
          echo '<p>Desculpe, nenhum post encontrado.</p>';
        endif;
        ?>
      </ul>
      <div class="blog-posts__more">
        <a class="blog-posts__more--btn btn" href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Ver mais</a>
      </div>
    </div>
  </section>
  <?php include('cta-section.php'); ?>
</main>

<?php get_footer(); ?>