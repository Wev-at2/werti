<?php get_header(); ?>

<main class="wer-main single-blog" id="wer-single">
  <?php
  if (have_posts()):
    while (have_posts()):
      the_post();
      ?>

      <section class="single-blog__head">
        <div class="single-blog__container container">
          <div class="back-to-blogs">
            <a class="back-to-blogs__link title" href="<?php echo get_permalink(get_page_by_path('blog')); ?>">&#8617; Voltar</a>
          </div>
          <div class="single-blog__content content">
            <h1 class="single-blog__subtitle subtitle">
              <?php the_title(); ?>
            </h1>
            <p class="single-blog__description description description-small">
              <?php the_field('blog_texto_repetido'); ?>
            </p>
          </div>
          <div class="single-blog__content content display-flex blog-author">
            <div class="blog-author__container flex-item display-flex">
              <figure class="blog-author__figure display-flex-center">
                <img src="<?php the_field('blog_autor_foto'); ?>">
              </figure>
              <p class="blog-author__desciption single-blog__description description">
                <span>
                  <?php the_field('blog_autor_nome'); ?>
                </span>
                <strong class="post-date description-small">
                  <?php
                  $raw_date = get_post_meta(get_the_ID(), 'blog_data_publicacao', true); // Pega a data bruta do campo personalizado
                  $formatted_date = date_i18n('j M Y', strtotime($raw_date)); // Formata a data no formato brasileiro
                  echo $formatted_date; // Exibe a data formatada
                  ?>
                </strong>
              </p>
            </div>
            <div class="flex-item">
              <ul class="share-buttons__list list display-flex">
                <li>
                  <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>">
                    <figure class="display-flex-center">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/social-linkedin-1.svg">
                    </figure>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/share?url=<?php the_permalink(); ?>">
                    <figure class="display-flex-center">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/social-twitterx.svg">
                    </figure>
                  </a>
                </li>
                <li>
                  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
                    <figure class="display-flex-center">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/social-facebook-1.svg">
                    </figure>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section class="single-blog__main-content">
        <div class="single-blog__container container">
          <div class="single-blog__post-content">
            <?php the_content(); ?>
          </div>
        </div>
      </section>

      <section class="related-posts">
        <!-- Você Pode Gostar Também -->
        <div class="related-posts__container container">
          <h3 class="related-posts__subtitle subtitle">Você pode gostar também</h3>
          <ul class="blog-posts__list display-flex list">
            <?php
            $related_posts = new WP_Query(array(
              'post_type' => 'post',
              'posts_per_page' => 3,
              'post__not_in' => array(get_the_ID()),
            ));

            if ($related_posts->have_posts()):
              while ($related_posts->have_posts()):
                $related_posts->the_post();
                $related_date = get_post_meta(get_the_ID(), 'blog_data_publicacao', true);
                $related_date_formatted = date_i18n('j M Y', strtotime($related_date));
                ?>

                <li class="blog-posts__item display-flex">
                  <a href="<?php the_permalink(); ?>">
                    <figure class="blog-posts__figure display-flex-center">
                      <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail(array(400, 300)); ?>
                      <?php endif; ?>
                    </figure>
                    <div class="blog-posts__text display-flex">
                      <span class="blog-posts__description description description-small post-date"><?php echo $related_date_formatted; ?></span>
                      <h4 class="subtitle"><?php echo wp_trim_words(get_the_title(), 6); ?></h4>
                      <p class="description description-small"><?php echo wp_trim_words(get_the_content(), 14); ?></p>
                      <strong class="blog-posts__link description">Ver artigo</strong>
                    </div>
                  </a>
                </li>
              <?php endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </ul>

        </div>
      </section>

      <?php
    endwhile;
  endif;
  ?>

</main>

<?php get_footer(); ?>