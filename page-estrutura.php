<?php
// Template Name: Estrutura
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>
    <main class="anac-structure" id="anac-structure">
      <section class="structure-main">
        <div class="structure-main__container container">
          <div class="structure-main__content grid">
            <div class="grid__top">
              <h2 class="structure-main__title title title--main">
                <!-- <?php the_title(); ?> -->
                <?php the_field('main_title'); ?>
              </h2>
            </div>
            <div class="grid__left grid__top">
              <h1 class="structure-main__subtitle subtitle subtitle--giant">
                <?php the_field('main_subtitle'); ?>
              </h1>
            </div>
          </div>
          <figure class="structure-main__banners main-banners grid__container">
            <picture>
              <source srcset="https://www.anacar.org.br/wp-content/uploads/2024/03/banner_servicos1-M.webp" media="(max-width: 767px)"><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/banner_servicos1-D.webp" alt="Banner da equipe ANAC" title="Banner principal da página 1">
            </picture>
          </figure>
        </div>
      </section>
      <section class="structure-supportHouse" style="display: none!important">
        <div class="structure-supportHouse__container container">
          <div class="structure-supportHouse__content grid__container">
            <div class="grid__item flex-container">
              <h2 class="structure-supportHouse__title title not-before"> Casa de apoio</h2>
              <h3 class="structure-supportHouse__subtitle subtitle"> Conheça nossa casa de apoio.</h3>
              <p class="structure-supportHouse__description description"> Rua Caravelas, 257– Vila Mariana – São Paulo/SP –<br> CEP 04021-001<br><a class="structure-supportHouse__link link description" href="tel:+551150822437" target="_blank"> Tel. +55 (11) 5082-2437</a></p>
              <div class="structure-supportHouse__maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.30543026531!2d-46.64765818989346!3d-23.593376678689275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5a26952d2929%3A0x9b2cc6ee9dbe068c!2zUi4gU2VuYSBNYWR1cmVpcmEsIDkzMCAtIOODtOOCo-ODvOODqeODu-ODnuODquOCouODiiBTw6NvIFBhdWxvIC0gU1AsIDA0MDIxLTAwMQ!5e0!3m2!1spt-BR!2sbr!4v1709215481257!5m2!1spt-BR!2sbr" width="530" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
            <div class="grid__item">
              <div class="structure-supportHouse__list list structure__slick">
                <div class="structure-supportHouse__item">
                  <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_casaderepouso-frente.webp" alt="Imagem da casa de repouso: Entrada" title="Imagem da casa de repouso: Entrada"></figure>
                </div>
                <div class="structure-supportHouse__item">
                  <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_casaderepouso-sala_de_estar.webp" alt="Imagem da casa de repouso: Sala de estar" title="Imagem da casa de repouso: Sala de estar"></figure>
                </div>
                <div class="structure-supportHouse__item">
                  <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_casaderepouso-cozinha.webp" alt="Imagem da casa de repouso: Cozinha" title="Imagem da casa de repouso: Cozinha"></figure>
                </div>
                <div class="structure-supportHouse__item">
                  <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_casaderepouso-dormitorios.webp" alt="Imagem da casa de repouso: Dormitórios" title="Imagem da casa de repouso: Dormitórios"></figure>
                </div>
                <div class="structure-supportHouse__item">
                  <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_casaderepouso-sala_de_oficinas.webp" alt="Imagem da casa de repouso: Sala de oficinas" title="Imagem da casa de repouso: Sala de oficinas"></figure>
                </div>
                <div class="structure-supportHouse__item">
                  <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_casaderepouso-lavanderia.webp" alt="Imagem da casa de repouso: Lavanderia" title="Imagem da casa de repouso: Lavanderia"></figure>
                </div>
                <div class="structure-supportHouse__item">
                  <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_casaderepouso-sala_de_jantar.webp" alt="Imagem da casa de repouso: Sala de jantar" title="Imagem da casa de repouso: Sala de jantar"></figure>
                </div>
                <div class="structure-supportHouse__item">
                  <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_casaderepouso-capela_1.webp" alt="Imagem da casa de repouso: Capela" title="Imagem da casa de repouso: Capela"></figure>
                </div>
                <div class="structure-supportHouse__item">
                  <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_casaderepouso-brinquedoteca_1.webp" alt="Imagem da casa de repouso: Brinquedoteca" title="Imagem da casa de repouso: Brinquedoteca"></figure>
                </div>
                <div class="structure-supportHouse__item">
                  <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_casaderepouso-brinquedoteca_2.webp" alt="Imagem da casa de repouso: Brinquedoteca" title="Imagem da casa de repouso: Brinquedoteca"></figure>
                </div>
                <div class="structure-supportHouse__item">
                  <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_casaderepouso-banheiro.webp" alt="Imagem da casa de repouso: Banheiros" title="Imagem da casa de repouso: Banheiros"></figure>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="structure-headquarters bg-blue">
        <div class="structure-headquarters__container container">
          <div class="structure-headquarters__content grid__container">
            <div class="grid__item grid-row-2">
              <div class="structure-headquarters__list list structure__slick">
                <div class="structure-headquarters__item">
                  <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_sede_caravelas.webp" alt="Imagem da sede Caravelas: Entrada" title="Imagem da sede Caravelas: Entrada"></figure>
                </div>
                <div class="structure-headquarters__item">
                  <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_sede_caravelas-1.webp" alt="Imagem da sede Caravelas: Entrada" title="Imagem da sede Caravelas: Entrada"></figure>
                </div>
              </div>
            </div>
            <div class="grid__item flex-container">
              <h2 class="structure-headquarters__title title not-after"> Sede</h2>
              <h3 class="structure-headquarters__subtitle subtitle"> Nossa sede.</h3>
              <p class="structure-headquarters__description description"> Rua Caravelas, 527 – Vila Mariana – São Paulo/SP –<br> CEP 04012-060<br><a class="structure-headquarters__link link description" href="tel:+551155790609" target="_blank"> Tel. +55 (11) 5579–0609</a></p>
              <div class="structure-headquarters__maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14626.277243310577!2d-46.651309!3d-23.583907!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce598d3573ba95%3A0x66d540f5921f256b!2sR.%20Caravelas%2C%20527%20-%20Vila%20Mariana%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2004012-060!5e0!3m2!1spt-BR!2sbr!4v1709053810895!5m2!1spt-BR!2sbr" width="500" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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