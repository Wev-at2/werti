<?php
// Template Name: Fale conosco
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <main class="anac-contact" id="anac-contact">
      <section class="contact-main">
        <div class="contact-main__container container">
          <div class="contact-main__content grid__container">
            <div class="grid__item--top">
              <h2 class="contact-main__title title title--main">
                <!-- <?php the_title(); ?> -->
                <?php the_field('main_title'); ?>
              </h2>
            </div>
            <div class="grid__item--left">
              <h1 class="contact-main__subtitle subtitle subtitle--giant">
                <?php the_field('main_subtitle'); ?>
              </h1>
            </div>
            <div class="grid__item--right">
              <p class="contact-main__description description">
                <?php the_field('main_description'); ?>
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="contact-form bg-blue">
        <div class="contact-form__container container">
          <h3 class="contact-form__subtitle subtitle"> Envie sua mensagem</h3>
          <form class="flex-container" id="contact-form" action="">
            <div class="contact-form__row row">
              <label class="contact-form__label description" for="name">Nome: </label>
              <input class="contact-form__input" id="name" type="text" name="name" placeholder="Digite seu nome aqui..." required>
            </div>
            <div class="contact-form__row row">
              <label class="contact-form__label description" for="phone">Telefone: </label>
              <input class="contact-form__input" id="phone" type="tel" name="phone" placeholder="Digite seu número de telefone aqui..." required>
            </div>
            <div class="contact-form__row row">
              <label class="contact-form__label description" for="email">E-mail: </label>
              <input class="contact-form__input" id="email" type="email" name="email" placeholder="Digite seu e-mail aqui..." required>
            </div>
            <div class="contact-form__row row">
              <label class="contact-form__label description" for="message">Mensagem:</label>
              <textarea class="contact-form__textarea" id="message" name="message  " rows="6" placeholder="Digite sua mensagem aqui..." required></textarea>
            </div>
            <div class="contact-form__row row">
              <button class="contact-form__submit button submit-btn btn" type="submit">Enviar</button>
            </div>
          </form>
        </div>
      </section>
      <section class="contact-location">
        <div class="contact-location__container container flex-container">
          <h2 class="contact-location__title title"> Nossa localização</h2>
          <h3 class="contact-location__subtitle subtitle"> Venha nos visitar!</h3>
          <div class="grid__container">
            <div class="contact-location__content">
              <div class="grid__item">
                <p class="contact-location__description description"> Rua Caravelas, 527 – Vila Mariana – São Paulo/SP – CEP 04012-060<br> Horário: Segunda a sexta-feira, das 8h00 às 16:00 hs.<br><a class="contact-location__link link description" href="tel:+551155790609" target="_blank"> Tel. +55 (11) 5579–0609</a></p>
              </div>
            </div>
            <div class="contact-location__maps">
              <div class="grid__item">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14626.277243310577!2d-46.651309!3d-23.583907!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce598d3573ba95%3A0x66d540f5921f256b!2sR.%20Caravelas%2C%20527%20-%20Vila%20Mariana%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2004012-060!5e0!3m2!1spt-BR!2sbr!4v1709053810895!5m2!1spt-BR!2sbr" width="530" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
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