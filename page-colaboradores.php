<?php
// Template Name: Colaboradores
?>
<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <main class="anac-employees" id="anac-employees">
      <section class="employees-main">
        <div class="employees-main__container container">
          <div class="employees-main__content grid__container">
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
        <div class="employees-items__list list employees-items__slick">
          <div class="employees-items__item"><a href="https://www.hcor.com.br" target="_blank">
              <figure><img src="http://www.anacar.org.br/wp-content/uploads/2024/03/anac_employees-hcor-x.webp" alt="Logotipo da Hcor" title="Hcor - Associação Benificente Síria">
                <figcaption class="employees__figcap description" hidden> Hcor - Associação Benificente Síria.</figcaption>
              </figure>
            </a></div>
          <div class="employees-items__item"><a href="https://www.idpc.org.br" target="_blank">
              <figure><img src="http://www.anacar.org.br/wp-content/uploads/2024/03/anac_employees-dante_pazzanese-x.webp" alt="Logotipo da Dante Pazzanese" title="Dante Pazzanese">
                <figcaption class="employees__figcap description" hidden> Dante Pazzanese.</figcaption>
              </figure>
            </a></div>
          <div class="employees-items__item"><a href="https://www.novonordisk.com.br" target="_blank">
              <figure><img src="http://www.anacar.org.br/wp-content/uploads/2024/03/anac_employees-novo_nordisk-x.webp" alt="Logotipo da Novo Nordisk Farmacêutica" title="Novo Nordisk Farmacêutica">
                <figcaption class="employees__figcap description" hidden> Novo Nordisk Farmacêutica.</figcaption>
              </figure>
            </a></div>
          <div class="employees-items__item"><a href="https://ceagesp.gov.br/bca-2/" target="_blank">
              <figure><img src="http://www.anacar.org.br/wp-content/uploads/2024/03/anac_employees-ceagesp_bca-x.webp" alt="Logotipo da BCA - Banco CEAGESP de Alimentos" title="BCA - Banco CEAGESP de Alimentos">
                <figcaption class="employees__figcap description" hidden> BCA - Banco CEAGESP de Alimentos.</figcaption>
              </figure>
            </a></div>
          <div class="employees-items__item"><a href="https://www.mobonline.com.br" target="_blank">
              <figure><img src="http://www.anacar.org.br/wp-content/uploads/2024/03/anac_employees-mob-x.webp" alt="Logotipo da MOB Roupas femininas" title="MOB Roupas femininas">
                <figcaption class="employees__figcap description" hidden> MOB Roupas femininas.</figcaption>
              </figure>
            </a></div>
          <div class="employees-items__item"><a href="https://www.bauducco.com.br/bauducco" target="_blank">
              <figure><img src="http://www.anacar.org.br/wp-content/uploads/2024/03/anac_employees-bauducco-x.webp" alt="Logotipo da Bauducco" title="Bauducco">
                <figcaption class="employees__figcap description" hidden> Bauducco.</figcaption>
              </figure>
            </a></div>
          <div class="employees-items__item"><a href="http://casasuica.com.br/" target="_blank">
              <figure><img src="http://www.anacar.org.br/wp-content/uploads/2024/03/anac_employees-casa_suica-x.webp" alt="Logotipo da Casa Suiça" title="Casa Suiça">
                <figcaption class="employees__figcap description" hidden> Casa Suiça.</figcaption>
              </figure>
            </a></div>
          <div class="employees-items__item"><a href="https://www.instagram.com/padariabellamariana/" target="_blank">
              <figure><img src="http://www.anacar.org.br/wp-content/uploads/2024/03/anac_employees-bella_mariana_padaria-x.webp" alt="Logotipo da Bella Mariana Padaria" title="Bella Mariana Padaria">
                <figcaption class="employees__figcap description" hidden> Bella Mariana Padaria.</figcaption>
              </figure>
            </a></div>
          <div class="employees-items__item"><a href="https://www.extra.com.br" target="_blank">
              <figure><img src="http://www.anacar.org.br/wp-content/uploads/2024/03/anac_employees-extra_supermercado-x.webp" alt="Logotipo da Extra Supermercados" title="Extra Supermercados">
                <figcaption class="employees__figcap description" hidden> Extra Supermercados.</figcaption>
              </figure>
            </a></div>
          <div class="employees-items__item"><a href="https://www.paodeacucar.com" target="_blank">
              <figure><img src="http://www.anacar.org.br/wp-content/uploads/2024/03/anac_employees-pao_de_acucar_supermercado-x.webp" alt="Logotipo da Pão de Açúcar Supermercados" title="Pão de Açúcar Supermercados">
                <figcaption class="employees__figcap description" hidden> Pão de Açúcar Supermercados.</figcaption>
              </figure>
            </a></div>
          <div class="employees-items__item"><a href="https://www.facebook.com/people/Página-do-Lar-Espírita-Chico-Xavier/100072543302540" target="_blank">
              <figure><img src="http://www.anacar.org.br/wp-content/uploads/2024/03/anac_employees-lar_espirita_chico_xavier-x.webp" alt="Logotipo da Lar Espírita Chico Xavier" title="Lar Espírita Chico Xavier">
                <figcaption class="employees__figcap description" hidden> Lar Espírita Chico Xavier.</figcaption>
              </figure>
            </a></div>
        </div>
      </section>
    </main>

  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>