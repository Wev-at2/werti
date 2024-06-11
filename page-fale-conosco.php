<?php
// Template Name: Fale conosco
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <main class="anac-main anac-contact" id="anac-contact">

      <section class="contact-main">
        <div class="contact-main__container container">
          <div class="contact-main__content main-content grid__container">
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
          <h3 class="contact-form__subtitle subtitle">Envie sua mensagem</h3>
          <form class="flex-container" id="contact-form">
            <div class="contact-form__row row">
              <label class="contact-form__label description" for="name">Nome:</label>
              <input class="contact-form__input" id="name" type="text" name="name" placeholder="Digite seu nome aqui..." required>
            </div>
            <div class="contact-form__row row">
              <label class="contact-form__label description" for="phone">Telefone:</label>
              <input class="contact-form__input" id="phone" type="tel" name="phone" placeholder="Digite seu número de telefone aqui..." required>
            </div>
            <div class="contact-form__row row">
              <label class="contact-form__label description" for="email">E-mail:</label>
              <input class="contact-form__input" id="email" type="email" name="email" placeholder="Digite seu e-mail aqui..." required>
            </div>
            <div class="contact-form__row row">
              <label class="contact-form__label description" for="message">Mensagem:</label>
              <textarea class="contact-form__textarea" id="message" name="message" rows="6" placeholder="Digite sua mensagem aqui..." required></textarea>
            </div>
            <div class="contact-form__row row">
              <button class="contact-form__submit button submit-btn btn" type="submit">Enviar</button>
            </div>
          </form>
        </div>
      </section>

      <script>
        document.getElementById('contact-form').addEventListener('submit', function (e) {
          e.preventDefault();

          const form = e.target;
          const submitButton = form.querySelector('button[type="submit"]');
          const originalButtonText = submitButton.textContent;

          const formData = {
            Nome: document.getElementById('name').value,
            "E-mail": document.getElementById('email').value,
            Mensagem: document.getElementById('message').value,
            Telefone: document.getElementById('phone').value
          };

          fetch("https://api.apispreadsheets.com/data/UhmbTZZ3goNiGTYC/", {
            method: "POST",
            body: JSON.stringify({ "data": formData }),
            headers: {
              'Content-Type': 'application/json'
            }
          }).then(res => {
            if (res.status === 201) {
              // SUCCESS
              submitButton.textContent = 'Enviado';
              setTimeout(() => {
                form.reset();  // Limpar o formulário
                submitButton.textContent = originalButtonText;
              }, 2000);  // 2 segundos antes de limpar o formulário
            } else {
              // ERROR
              alert('Houve um erro ao enviar a mensagem.');
            }
          }).catch(error => {
            console.error('Erro:', error);
            alert('Houve um erro ao enviar a mensagem.');
          });
        });
      </script>

      <section class="contact-location">
        <div class="contact-location__container container flex-container">
          <h2 class="contact-location__title title">
            <?php the_field('nossaLocalização_title'); ?>
          </h2>
          <h3 class="contact-location__subtitle subtitle">
            <?php the_field('nossaLocalização_subtitle'); ?>
          </h3>
          <div class="grid__container">
            <div class="contact-location__content" style="text-align: center;">
              <div class="grid__item">
                <div class="contact-location__description description">
                  <a class="contact-location__link link description" href="<?php the_field('nossaLocalização_description_address_link'); ?>" target="_blank">
                    <?php the_field('nossaLocalização_description_address_text'); ?>
                  </a>
                  <p class="contact-location__description description">
                    <?php the_field('nossaLocalização_description_schedules'); ?>
                  </p>
                  <a class="contact-location__link link description" href="<?php the_field('nossaLocalização_description_phone_link'); ?>" target="_blank">
                    <?php the_field('nossaLocalização_description_phone_text'); ?>
                  </a>
                </div>
              </div>
            </div>
            <div class="contact-location__maps" style="display: none!important;">
              <div class="grid__item">
                <?php the_field('nossaLocalização_description_maps'); ?>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>

    <?php include ('cta-section.php'); ?>

  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>