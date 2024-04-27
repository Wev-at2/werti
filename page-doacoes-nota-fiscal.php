<?php
// Template Name: Doações Nota Fiscal
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <main class="anac-donationsNF" id="anac-donationsNF">
      <section class="donationsNF-main">
        <div class="donationsNF-main__container container">
          <div class="donationsNF-main__content grid__container">
            <div class="grid__item--top">
              <h2 class="donationsNF-main__title title title--main">
                <!-- <?php the_title(); ?> -->
                <?php the_field('main_title'); ?>
              </h2>
            </div>
            <div class="grid__item--left grid__item--top">
              <h1 class="donationsNF-main__subtitle subtitle subtitle--giant">
                <?php the_field('main_subtitle'); ?>
              </h1>
            </div>
          </div>
          <figure class="donationsNF-main__banners main-banners grid__container">
            <picture>
              <source srcset="https://www.anacar.org.br/wp-content/uploads/2024/03/banner_doacaoNF-M.webp" media="(max-width: 767px)"><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/banner_doacaoNF-D.webp" alt="Banner principal da página de doações com Nota Fiscal Paulista" title="Banner principal da página de doações com Nota Fiscal Paulista">
            </picture>
          </figure>
        </div>
      </section>
      <section class="donationsNF-stepByStep">
        <div class="donationsNF-stepByStep__container container">
          <div class="donationsNF-stepByStep__content">
            <h2 class="donationsNF-stepByStep__subtitle subtitle">Como doar a sua Nota Fiscal Paulista</h2>
            <p class="donationsNF-stepByStep__description description">Agora, toda vez que realizar um pagamento ou compra, informe seu CPF e você terá a oportunidade de doar o valor para a Associação Nacional de Assistência ao Cardíaco – ANAC! Você pode vincular seu CPF à associação e permitir a doação automaticamente, e mesmo fazendo a doação você continuará concorrendo aos sorteios.</p>
            <p class="donationsNF-stepByStep__description description">Há duas formas de você vincular seu CPF e permitir a doação automática, através do sistema da Nota Fiscal Paulista, no Portal da Fazenda, ou pelo aplicativo para smartphones e tablets. Ao permitir a doação para a ANAC o repasse passará a ser mensal, podendo definir o período para indeterminado. Lembre-se de sempre informar seu CPF no momento da compra para destinar suas doações à associação!</p>
          </div>
        </div>
        <div class="donationsNF-stepByStep__container bg-blue">
          <div class="donationsNF-stepByStep__content container grid__container">
            <div class="grid__item">
              <h2 class="donationsNF-stepByStep__subtitle subtitle text-align-left">Pelo aplicativo</h2>
              <ol class="donactionsNF-stepByStep__list list">
                <li class="donationsNF-stepByStep__item description text-align-left">Após baixar o aplicativo da Nota Fiscal Paulista para Android ou IOS e fazer o cadastro como consumidor, selecione no Menu ao lado esquerdo a opção “Doação Cupom com CPF;</li>
                <li class="donationsNF-stepByStep__item description text-align-left">Selecione a Associação Nacional de Assistência ao Cardíaco ANAC;</li>
                <li class="donationsNF-stepByStep__item description text-align-left">Defina o período de doação;</li>
                <li class="donationsNF-stepByStep__item description text-align-left">Aperte OK e pronto!</li>
              </ol>
            </div>
            <div class="grid__item">
              <h2 class="donationsNF-stepByStep__subtitle subtitle text-align-left">Pelo site na nota fiscal</h2>
              <ol class="donactionsNF-stepByStep__list list">
                <li class="donationsNF-stepByStep__item description text-align-left">Acesse sistema da Nota Fiscal Paulista com login e senha;</li>
                <li class="donationsNF-stepByStep__item description text-align-left">Selecione a opção de “Doação automática com CPF;</li>
                <li class="donationsNF-stepByStep__item description text-align-left">Pesquise a Associação Nacional de Assistência ao Cardíaco – ANAC “CNPJ: 62.569.835/0001-14</li>
                <li class="donationsNF-stepByStep__item description text-align-left">Determine por quanto tempo deseja realizar a doação;</li>
                <li class="donationsNF-stepByStep__item description text-align-left">Confirme seus dados para finalizar.</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
    </main>

  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>