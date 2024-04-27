<?php
// Template Name: Doações
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>
    <main class="anac-donations" id="anac-donations">
      <section class="donations-main">
        <div class="donations-main__container container">
          <div class="donations-main__content grid__container">
            <div class="grid__item--top">
              <h2 class="donations-main__title title title--main">
                <!-- <?php the_title(); ?> -->
                <?php the_field('main_title'); ?>
              </h2>
            </div>
            <div class="grid__item--left grid__item--top">
              <h1 class="donations-main__subtitle subtitle subtitle--giant">
                <?php the_field('main_subtitle'); ?>
              </h1>
            </div>
          </div>
          <figure class="donations-main__banners main-banners grid__container">
            <picture>
              <source srcset="https://www.anacar.org.br/wp-content/uploads/2024/03/banner_doacao-M.webp" media="(max-width: 767px)"><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/banner_doacao-D.webp" alt="Banner principal da página de doações" title="Banner principal da página de doações">
            </picture>
          </figure>
        </div>
      </section>
      <section class="donations-qrcodePix">
        <div class="donations-qrcodePix__container container grid__container">
          <div class="grid__item--left">
            <figure class="donations-qrcodePix__figure qr-figure">
              <svg>
                <use xlink:href="../img/sprites/sprite.svg#anac_qrcode_pix"></use>
              </svg>
            </figure>
          </div>
          <div class="grid__item--right donations-qrcodePix__content">
            <h2 class="donations-qrcodePix__subtitle subtitle">Juntos, construímos corações mais fortes!</h2>
            <p class="donations-qrcodePix__description description">Escaneie o QR code ao lado ou copie o código abaixo e faça sua doação agora!</p>
            <div class="donations-qrcodePix__data">
              <p class="donations-qrcodePix__description description description--bold" id="qrcode-link">00020126360014br.gov.bcb.pix0114625698350001145204000053039865802BR5925ASSOCIACAO NACIONAL DE AS6008BRASILIA62070503***6304F909</p>
              <button class="donations-qrcodePix__btn btn" id="copy-link-btn">
                <figure class="donations-qrcodePix__btn-icon">
                  <svg>
                    <use xlink:href="../img/sprites/sprite.svg#icon_copy"></use>
                  </svg>
                </figure><span>Copiar Link</span>
              </button>
            </div>
          </div>
        </div>
      </section>
      <section class="donations-materials">
        <div class="donations-materials__container container flex-container">
          <h2 class="donations-materials__title title not-before">DOAÇÕES DE MATERIAIS</h2>
          <h3 class="donations-materials__subtitle subtitle">Veja quais materiais em geral você pode doar!</h3>
          <ul class="donations-materials__card-list grid__container">
            <li class="donations-materials__card-item item-first bg-blue">
              <h4 class="title not-before not-after">Produtos de limpeza e higiene pessoal</h4>
              <p class="donations-materials__description description">Papel higiênico, Sabonete para banho, Detergente liquido, Esponja dupla face, Sabão em pó, Panos de prato, Panos de chão.</p>
            </li>
            <li class="donations-materials__card-item item-second">
              <h4 class="title not-before not-after">Produtos de cama/mesa/banho</h4>
              <p class="donations-materials__description description">Lençóis brancos sem elástico Solteiro, Fronhas brancas, Cobertores de solteiro, Toalhas de banho.</p>
            </li>
            <li class="donations-materials__card-item item-third">
              <h4 class="title not-before not-after">Alimentos</h4>
              <p class="donations-materials__description description">Arroz, Feijão, Macarrão, Açúcar, Óleo, Café, Vinagre, Sal, Margarina.</p>
            </li>
            <li class="donations-materials__card-item item-fourth bg-blue">
              <h4 class="title not-before not-after">Itens diversos</h4>
              <p class="donations-materials__description description">Roupas diversas - usadas, em boas condições de uso e/ou novas, Calçados diversos – usados, em boas condições de uso e/ou novas, e brinquedos.</p>
            </li>
          </ul>
        </div>
      </section>
    </main>

  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>