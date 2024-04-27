<?php
// Template Name: Serviços
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <main class="anac-services" id="anac-services">
      <section class="services-main">
        <div class="services-main__container container">
          <div class="services-main__content grid__container">
            <div class="grid__item--top">
              <h2 class="services-main__title title title--main">
                <!-- <?php the_title(); ?> -->
                <?php the_field('main_title'); ?>
              </h2>
            </div>
            <div class="grid__item--left">
              <h1 class="services-main__subtitle subtitle subtitle--giant">
                <?php the_field('main_subtitle'); ?>
              </h1>
            </div>
            <div class="grid__item--right">
              <p class="services-main__description description">
                <?php the_field('main_description'); ?>
              </p>
            </div>
          </div>
          <figure class="services-main__banners main-banners grid__container">
            <picture>
              <source srcset="https://www.anacar.org.br/wp-content/uploads/2024/03/banner_servicos1-M.webp" media="(max-width: 767px)"><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/banner_servicos1-D.webp" alt="Banner da equipe ANAC" title="Banner principal da página 1">
            </picture>
            <picture>
              <source srcset="https://www.anacar.org.br/wp-content/uploads/2024/03/banner_servicos2-M.webp" media="(max-width: 767px)"><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/banner_servicos2-D.webp" alt="Banner da equipe ANAC" title="Banner principal da página 2">
            </picture>
          </figure>
        </div>
      </section>
      <section class="services-items">
        <div class="services-items__container container">
          <div class="services-items__content content">
            <ul class="services-items__list">
              <li class="services-items__item">
                <div class="services-items__head">
                  <figure class="services-items__icon">
                    <svg>
                      <use xlink:href="../img/sprites/sprite.svg#anac_icon-hospedagem"></use>
                    </svg>
                  </figure>
                  <h4 class="services-items__subtitle subtitle subtitle--big"> Hospedagem</h4>
                </div>
                <div class="services-items__content">
                  <p class="services-items__description description"> Oferecemos acomodações para alojamento aos usuários que, por não possuírem recursos financeiros para permanecer em São Paulo durante o período de tratamento, utilizam as instalações de nossa instituição.</p>
                  <p class="services-items__description description"> A ANAC – Casa do Cardíaco mantém 20 leitos (camas de solteiro) disponíveis, na Rua Caravelas, 257 – Vila Mariana, distribuídos em quartos coletivos.</p>
                </div>
              </li>
              <li class="services-items__item">
                <div class="services-items__head">
                  <figure class="services-items__icon">
                    <svg>
                      <use xlink:href="../img/sprites/sprite.svg#anac_icon-servicos_sociais"></use>
                    </svg>
                  </figure>
                  <h4 class="services-items__subtitle subtitle subtitle--big"> Serviço Social</h4>
                </div>
                <div class="services-items__content">
                  <p class="services-items__description description"> O Serviço Social da ANAC – Casa do Cardíaco tem por finalidade, dar o suporte necessário ao usuário em questões sociais durante o período de permanência em tratamento. É de fundamental importância para seu trabalho, conhecer tanto o diagnóstico como o prognóstico do paciente, por ser um instrumento valioso para o tratamento social a ser realizado, tais como:
                  <ul class="services-items__sublist">
                    <li class="services-items__subitem"> Orientar e informar sobre Regulamentos da Instituição;</li>
                    <li class="services-items__subitem"> Efetuar contato com o serviço de transporte (ambulância); quando necessário;</li>
                    <li class="services-items__subitem"> Planejar traslados dos pacientes para os hospitais,</li>
                    <li class="services-items__subitem"> Efetuar contato com a família, quando necessário;</li>
                    <li class="services-items__subitem"> Encaminhar para outros recursos (saúde, etc.);</li>
                    <li class="services-items__subitem"> Elaborar relatório diário;</li>
                    <li class="services-items__subitem"> Realizar atividades em grupos;</li>
                    <li class="services-items__subitem"> Registrar as ações em prontuários;</li>
                    <li class="services-items__subitem"> Realizar atendimento familiar;</li>
                    <li class="services-items__subitem"> Identificar, discutir e avaliar com a família, possíveis situações sociais e econômicas que estejam interferindo no tratamento, bem como providenciar encaminhamento aos recursos comunitários;</li>
                    <li class="services-items__subitem"> Possibilitar e ou facilitar contato entre equipe médicas e familiares dos pacientes;</li>
                    <li class="services-items__subitem"> Contatar TFD (Tratamento Fora Domicílio) para providenciar deslocamento dos pacientes e acompanhantes.</li>
                  </ul>
                  </p>
                </div>
              </li>
              <li class="services-items__item">
                <div class="services-items__head">
                  <figure class="services-items__icon">
                    <svg>
                      <use xlink:href="../img/sprites/sprite.svg#anac_icon-alimentacao"></use>
                    </svg>
                  </figure>
                  <h4 class="services-items__subtitle subtitle subtitle--big"> Alimentação</h4>
                </div>
                <div class="services-items__content">
                  <p class="services-items__description description"> Fornecemos 4 refeições diárias (Café da manhã, almoço, café da tarde e jantar).</p>
                </div>
              </li>
              <li class="services-items__item" id="item-transporte" style="display: none!important">
                <div class="services-items__head">
                  <figure class="services-items__icon">
                    <svg>
                      <use xlink:href="../img/sprites/sprite.svg#anac_icon-transporte"></use>
                    </svg>
                  </figure>
                  <h4 class="services-items__subtitle subtitle subtitle--big"> Transporte</h4>
                </div>
                <div class="services-items__content">
                  <p class="services-items__description description"> Contamos com uma Van para o transporte gratuito, para os Hospitais da Região, às 8 hs, 11 hs e 16 hs, ou fora destes horários, quando necessário.</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </section>
      <section class="services-bazar">
        <div class="services-bazar__container container">
          <div class="services-bazar__content">
            <h2 class="services-bazar__title title"> Bazar</h2>
            <h3 class="services-bazar__subtitle subtitle"> Veja onde ocorre nosso bazar.</h3>
          </div>
          <div class="services-bazar__content grid__container">
            <div class="grid__item">
              <p class="services-bazar__description description"> Rua Caravelas, 527 – Vila Mariana – São Paulo/SP – CEP 04012-060<br> Horário: Segunda a sexta-feira, das 8h00 às 16:00 hs.<br><a class="services-bazar__link link description" href="tel:+551155790609" target="_blank"> Tel. +55 (11) 5579–0609</a></p>
            </div>
            <div class="grid__item">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14626.277243310577!2d-46.651309!3d-23.583907!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce598d3573ba95%3A0x66d540f5921f256b!2sR.%20Caravelas%2C%20527%20-%20Vila%20Mariana%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2004012-060!5e0!3m2!1spt-BR!2sbr!4v1709053810895!5m2!1spt-BR!2sbr" width="530" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
          <div class="services-bazar__list">
            <div class="services-bazar__item">
              <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_bazar-1.webp" alt="Imagem do bazar: Pulseira" title="Imagem do bazar: Pulseira"></figure>
            </div>
            <div class="services-bazar__item">
              <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_bazar-2.webp" alt="Imagem do bazar: Colar" title="Imagem do bazar: Colar"></figure>
            </div>
            <div class="services-bazar__item">
              <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_bazar-3.webp" alt="Imagem do bazar: Colar" title="Imagem do bazar: Colar"></figure>
            </div>
            <div class="services-bazar__item">
              <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_bazar-4.webp" alt="Imagem do bazar: Colar" title="Imagem do bazar: Colar"></figure>
            </div>
            <div class="services-bazar__item">
              <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_bazar-5.webp" alt="Imagem do bazar: Calçados" title="Imagem do bazar: Calçados"></figure>
            </div>
            <div class="services-bazar__item">
              <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_bazar-6.webp" alt="Imagem do bazar: Bolsas e calçados" title="Imagem do bazar: Bolsas e calçados"></figure>
            </div>
            <div class="services-bazar__item">
              <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_bazar-7.webp" alt="Imagem do bazar: Guirlanda de natal" title="Imagem do bazar: Guirlanda de natal"></figure>
            </div>
            <div class="services-bazar__item">
              <figure><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/anac_bazar-8.webp" alt="Imagem do bazar: Macacão" title="Imagem do bazar: Macacão"></figure>
            </div>
          </div>
        </div>
      </section>
      <section class="services-oficinas bg-blue" style="display: none!important">
        <div class="services-oficinas__container container">
          <div class="services-oficinas__content content">
            <h2 class="services-oficinas__title title not-after"> OFICINAS</h2>
            <h3 class="services-oficinas__subtitle subtitle"> Veja nossas oficinas disponíveis:</h3>
            <div class="grid__container">
              <figure class="services-oficinas__image">
                <picture>
                  <source srcset="https://www.anacar.org.br/wp-content/uploads/2024/03/BANNER_mobile_oficinas1.webp" media="(max-width: 767px)"><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/BANNER_mobile_oficinas1.webp" alt="Banner de oficina: Culinária" title="Culinária">
                </picture>
                <figcaption class="services-oficinas__legend"> Culinária</figcaption>
              </figure>
              <figure class="services-oficinas__image">
                <picture>
                  <source srcset="https://www.anacar.org.br/wp-content/uploads/2024/03/BANNER_mobile_oficinas2.webp" media="(max-width: 767px)"><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/BANNER_mobile_oficinas2.webp" alt="Banner de oficina: Artesanal" title="Artesanal">
                </picture>
                <figcaption class="services-oficinas__legend"> Artesanal</figcaption>
              </figure>
              <figure class="services-oficinas__image">
                <picture>
                  <source srcset="https://www.anacar.org.br/wp-content/uploads/2024/03/BANNER_mobile_oficinas3.webp" media="(max-width: 767px)"><img src="https://www.anacar.org.br/wp-content/uploads/2024/03/BANNER_mobile_oficinas3.webp" alt="Banner de oficina: Atividade de apoio" title="Atividade de apoio">
                </picture>
                <figcaption class="services-oficinas__legend"> Atividade de apoio</figcaption>
              </figure>
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