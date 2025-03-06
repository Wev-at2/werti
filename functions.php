<?php
// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Habilitar Menus
add_theme_support('menus');
add_theme_support('post-thumbnails');

// Obtém o valor de um campo personalizado de um post no WordPress.
// @param string $key A chave do campo personalizado.
// @param int $page_id (Opcional) O ID da página. Se não fornecido, será usado o ID do post atual.
// @return mixed O valor do campo personalizado, ou null se não encontrado.
function get_field($key, $page_id = 0)
{
  $id = $page_id !== 0 ? $page_id : get_the_ID();
  return get_post_meta($id, $key, true);
}

function the_field($key, $page_id = 0)
{
  echo get_field($key, $page_id);
}

add_action('cmb2_admin_init', 'cmb2_fields_pages');
function cmb2_fields_pages()
{
  // Adiciona um bloco
  $cmb = new_cmb2_box([
    'id' => 'main_content_box',
    'title' => 'Conteúdo principal',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => [
        'page-sobre-nos.php',
        'page-solucoes.php',
        'page-blog.php',
        'page-contato.php',
      ],
    ],
  ]);

  $cmb->add_field([
    'name' => 'Descrição de SEO',
    'id' => 'description_seo',
    'type' => 'textarea',
    'description' => 'Use entre 140 e 160 caracteres para que o Google possa exibir toda a sua mensagem. Não se esqueça de incluir sua palavra-chave!',
  ]);
  $cmb->add_field([
    'name' => 'Título Principal',
    'id' => 'main_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo Principal',
    'id' => 'main_subtitle',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Descrição Principal',
    'id' => 'main_description',
    'type' => 'textarea',
  ]);
  // $cmb->add_field([
  //   'name' => 'Header CTA: URL',
  //   'id' => 'header_cta_link',
  //   'type' => 'text_URL',
  // ]);
  // $cmb->add_field([
  //   'name' => 'Header CTA: Descrição',
  //   'id' => 'header_cta_description',
  //   'type' => 'text',
  // ]);

  $mainPageBanners = $cmb->add_field([
    'name' => 'Banners principais da página',
    'id' => 'main_banner_page',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Banner Principal {#}',
      'add_button' => 'Adicionar banner',
      'remove_button' => 'Remover banner',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($mainPageBanners, [
    'name' => 'Banner Principal: Desktop',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'id' => 'main_banner_page_desktop',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Add File'
    ),
    'query_args' => array(
      'type' => array(
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ),
    ),
  ]);
  $cmb->add_group_field($mainPageBanners, [
    'name' => 'Banner Principal: Mobile',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'id' => 'main_banner_page_mobile',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Add File'
    ),
    'query_args' => array(
      'type' => array(
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ),
    ),
  ]);
}

// Metaboxes personalizados para PAGINA INICIAL
add_action('cmb2_admin_init', 'cmb2_fields_home');
function cmb2_fields_home()
{
  $cmb = new_cmb2_box([
    'id' => 'home_box',
    'title' => 'Pagina Inicial',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-home.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'Título Pricipal da Página',
    'id' => 'main_home_title',
    'type' => 'text',
    'default' => '+ DE 1.000 CLIENTES',
  ]);

  $cmb->add_field([
    'name' => 'Imagem de cliente: Título principal',
    'id' => 'maintitle_client_img1',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Add File'
    ),
    'query_args' => array(
      'type' => array(
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ),
    ),
  ]);
  $cmb->add_field([
    'name' => 'Imagem de cliente: Título principal',
    'id' => 'maintitle_client_img2',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Add File'
    ),
    'query_args' => array(
      'type' => array(
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ),
    ),
  ]);
  $cmb->add_field([
    'name' => 'Imagem de cliente: Título principal',
    'id' => 'maintitle_client_img3',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Add File'
    ),
    'query_args' => array(
      'type' => array(
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ),
    ),
  ]);

  $cmb->add_field([
    'name' => 'Subtítulo Pricipal da Página',
    'id' => 'main_home_subtitle',
    'type' => 'textarea_small',
    'default' => 'Eleve o nível
do seu Datacenter',
  ]);
  $cmb->add_field([
    'name' => 'Descrição Pricipal da Página',
    'id' => 'main_home_description',
    'type' => 'textarea',
    'default' => 'O quão preparado você está para enfrentar um ataque cibernético?
Fortaleça sua posturade resiliência cibernética e minimize o impacto de incidentes cibernéticos ao ter especialistas à disposição.',
  ]);
  $cmb->add_field([
    'name' => 'Call to Action Link',
    'id' => 'main_home_cta_link',
    'type' => 'text_url',
    'default' => '/',
  ]);
  $cmb->add_field([
    'name' => 'Call to Action Text',
    'id' => 'main_home_cta_text',
    'type' => 'text',
    'default' => 'Cotar Agora',
  ]);

  $cmb->add_field([
    'name' => 'Título principal (Colaboradores)',
    'id' => 'home_employees_title',
    'type' => 'text',
    'default' => 'Nossos Parceiros',
  ]);
  $homeSectionEmployeesList = $cmb->add_field([
    'name' => 'Lista de colaboradores',
    'id' => 'home_employees_list',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Colaborador {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($homeSectionEmployeesList, [
    'name' => 'Imagem do colaborador',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'id' => 'home_employees_item_imagem',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Add File'
    ),
    'query_args' => array(
      'type' => array(
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ),
    ),
  ]);
  $cmb->add_group_field($homeSectionEmployeesList, [
    'name' => 'Descrição do colaborador',
    'id' => 'home_employees_item_description',
    'type' => 'text',
    'description' => 'Nome do parceiro. Ex.: Codecom',
  ]);

  $cmb->add_field([
    'name' => 'Título principal (Sobre nós)',
    'id' => 'home_about_title',
    'type' => 'text',
    'default' => 'Especialistas',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo principal (Sobre nós)',
    'id' => 'home_about_subtitle',
    'type' => 'textarea_small',
    'default' => 'Apresentando a W.E.R.',
  ]);
  $cmb->add_field([
    'name' => 'Descrição principal (Sobre nós)',
    'id' => 'home_about_description',
    'type' => 'textarea',
    'default' => 'A W.E.R oferece soluções em infraestrutura para TI, telecomunicações e Datacenters. Com mais de 15 anos de experiência, garantimos qualidade, segurança e redução de custos para o sucesso do seu negócio.',
  ]);
  $cmb->add_field([
    'name' => 'CTA (Sobre nós) 1 link',
    'id' => 'home_about_cta1_link',
    'type' => 'text_url',
    'default' => '/',
  ]);
  $cmb->add_field([
    'name' => 'CTA (Sobre nós) 1 Texto',
    'id' => 'home_about_cta1_texto',
    'type' => 'text',
    'default' => 'Cotar Agora!',
  ]);
  $cmb->add_field([
    'name' => 'CTA (Sobre nós) 2 link',
    'id' => 'home_about_cta2_link',
    'type' => 'text_url',
    'default' => '/sobre-nos',
  ]);
  $cmb->add_field([
    'name' => 'CTA (Sobre nós) 2 texto',
    'id' => 'home_about_cta2_texto',
    'type' => 'text',
    'default' => 'Quem Somos',
  ]);
  $cmb->add_field([
    'name' => 'Banner Desktop (Sobre nós)',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'id' => 'home_about_image_desktop',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Add File'
    ),
    'query_args' => array(
      'type' => array(
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ),
    ),
  ]);
  $cmb->add_field([
    'name' => 'Banner Mobile (Sobre nós)',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'id' => 'home_about_image_mobile',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Add File'
    ),
    'query_args' => array(
      'type' => array(
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ),
    ),
  ]);

  $cmb->add_field([
    'name' => 'Título principal (Serviços)',
    'id' => 'home_services_title',
    'type' => 'text',
    'default' => 'Serviços',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo principal (Serviços)',
    'id' => 'home_services_subtitle',
    'type' => 'textarea_small',
    'default' => 'Nossas Soluções',
  ]);

  $cmb->add_field([
    'name' => 'SERVIÇO 1: Título',
    'id' => 'home_services_one_title',
    'type' => 'text',
    'default' => 'Tendências de Redes',
  ]);
  $cmb->add_field([
    'name' => 'SERVIÇO 1: Descrição',
    'id' => 'home_services_one_description',
    'type' => 'textarea',
    'default' => 'Novos designs de rede em data centers precisam ser flexíveis para superar limitações e requisitos modernos.',
  ]);
  $cmb->add_field([
    'name' => 'SERVIÇO 2: Título',
    'id' => 'home_services_two_title',
    'type' => 'text',
    'default' => 'Consolidação de Infraestrutura',
  ]);
  $cmb->add_field([
    'name' => 'SERVIÇO 2: Descrição',
    'id' => 'home_services_two_description',
    'type' => 'textarea',
    'default' => 'oferecemos soluções avançadas que aumentam a eficiência e atendem às necessidades específicas dos data centers.',
  ]);
  $cmb->add_field([
    'name' => 'SERVIÇO 3: Título',
    'id' => 'home_services_three_title',
    'type' => 'text',
    'default' => 'Flexibilidade na Infraestrutura',
  ]);
  $cmb->add_field([
    'name' => 'SERVIÇO 3: Descrição',
    'id' => 'home_services_three_description',
    'type' => 'textarea',
    'default' => 'Soluções de cabeamento flexíveis são essenciais para a eficiência e futuras migrações em data centers.',
  ]);
  $cmb->add_field([
    'name' => 'SERVIÇO 4: Título',
    'id' => 'home_services_four_title',
    'type' => 'text',
    'default' => 'Gerenciamento de Espaço',
  ]);
  $cmb->add_field([
    'name' => 'SERVIÇO 4: Descrição',
    'id' => 'home_services_four_description',
    'type' => 'textarea',
    'default' => 'Maximizar o uso do espaço é essencial para a eficiência dos data centers. Soluções de layout ajudam a otimizar recursos.',
  ]);

  $cmb->add_field([
    'name' => 'Banner Desktop (Segurança)',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'id' => 'home_security_image_desktop',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Add File'
    ),
    'query_args' => array(
      'type' => array(
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ),
    ),
  ]);
  $cmb->add_field([
    'name' => 'Banner Mobile (Segurança)',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'id' => 'home_security_image_mobile',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Add File'
    ),
    'query_args' => array(
      'type' => array(
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ),
    ),
  ]);
  $cmb->add_field([
    'name' => 'Título principal (Segurança)',
    'id' => 'home_security_title',
    'type' => 'text',
    'default' => 'Segurança',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo principal (Segurança)',
    'id' => 'home_security_subtitle',
    'type' => 'textarea_small',
    'default' => 'Controle e Monitoramento em Tempo Real',
  ]);
  $cmb->add_field([
    'name' => 'Descrição principal (Segurança)',
    'id' => 'home_security_description',
    'type' => 'textarea',
    'default' => 'Soluções integradas de hardware e software para gerenciar e monitorar conexões de rede, otimizando a eficiência e reduzindo o down-time com alertas automáticos e documentação precisa.',
  ]);
  $cmb->add_field([
    'name' => 'CTA (Segurança) link',
    'id' => 'home_security_cta_link',
    'type' => 'text_url',
    'default' => '/',
  ]);
  $cmb->add_field([
    'name' => 'CTA (Segurança) Texto',
    'id' => 'home_security_cta_text',
    'type' => 'text',
    'default' => 'Cotar Agora!',
  ]);

  $cmb->add_field([
    'name' => 'Título principal (Por que nós?)',
    'id' => 'home_whyus_title',
    'type' => 'text',
    'default' => 'Por que nós?',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo principal (Por que nós?)',
    'id' => 'home_whyus_subtitle',
    'type' => 'textarea_small',
    'default' => '5 Razões para escolher a WER',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo - Razão 1',
    'id' => 'home_whyus1_subtitle',
    'type' => 'text',
    'default' => 'Vasta Experiência',
  ]);
  $cmb->add_field([
    'name' => 'Descrição - Razão 1',
    'id' => 'home_whyus1_description',
    'type' => 'textarea_small',
    'default' => '13 anos projetando e implantando soluções de data Center para hiperscalers, Colocations, Privado,empresas de tecnologia líderes em todo o mundo. Trabalhar com a W.E.R Engenharia e Tecnologia permite que você alcance uma visão compartilhada e de longo prazo que foi construída para as demandas mais altas de hoje e continuará por muito tempo no futuro.',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo - Razão 2',
    'id' => 'home_whyus2_subtitle',
    'type' => 'text',
    'default' => 'Cabeamento no centro',
  ]);
  $cmb->add_field([
    'name' => 'Descrição - Razão 2',
    'id' => 'home_whyus2_description',
    'type' => 'textarea_small',
    'default' => 'Muitas vezes negligenciado no planejamento orçamentário, o cabeamento deve ser considerado igual à energia e refrigeração. Cabeamento inferiores podem custar mais a longo prazo devido a reajustes e atualizações extrass.',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo - Razão 3',
    'id' => 'home_whyus3_subtitle',
    'type' => 'text',
    'default' => 'Parceiro End to End',
  ]);
  $cmb->add_field([
    'name' => 'Descrição - Razão 3',
    'id' => 'home_whyus3_description',
    'type' => 'textarea_small',
    'default' => 'Nossas equipes internas, altamente treinadas e com segurança verificada dão suporte a todo o seu projeto de cabeamento estruturado. Pedidos, faturamento, alterações de PROJETOS e preparação eficientes - tudo gerenciado pela W.E.R Engenharia e Tecnologia.',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo - Razão 4',
    'id' => 'home_whyus4_subtitle',
    'type' => 'text',
    'default' => 'Capacidade',
  ]);
  $cmb->add_field([
    'name' => 'Descrição - Razão 4',
    'id' => 'home_whyus4_description',
    'type' => 'textarea_small',
    'default' => 'Uma empresa altamente capacitada e especializada em gerenciamento de data centers em ambientes críticos e ambientes de Telecomunicações de alta complexidade, oferecendo soluções especializadas para garantir a segurança, confiabilidade e eficiência operacional dos sistemas de tecnologia da informação, promovendo a continuidade dos negócios.',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo - Razão 5',
    'id' => 'home_whyus5_subtitle',
    'type' => 'text',
    'default' => 'Transparência e Sustentabilidade',
  ]);
  $cmb->add_field([
    'name' => 'Descrição - Razão 5',
    'id' => 'home_whyus5_description',
    'type' => 'textarea_small',
    'default' => 'A W.E.R Engenharia e Tecnologia promove o uso sustentável dos recursos naturais. Nossos parceiros estratégicos são escolhidos por sua tecnologia inovadora, engenharia inteligente e projetos energeticamente eficientes – permitindo dados transparentes para apoiar seus relatórios de escopo.',
  ]);
}
// Metaboxes personalizados para PÁGINA SOBRE NÓS
add_action('cmb2_admin_init', 'cmb2_fields_sobre_nos');
function cmb2_fields_sobre_nos()
{
  $cmb = new_cmb2_box([
    'id' => 'sobre_nos_box',
    'title' => 'Seções da página',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-sobre-nos.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'Título da seção MISSÃO, VISÃO E VALORES',
    'id' => 'about_mission_title',
    'type' => 'text',
    'default' => 'Nossos valores'
  ]);
  $cmb->add_field([
    'name' => 'Subítulo da seção MISSÃO, VISÃO E VALORES',
    'id' => 'about_mission_subtitle',
    'type' => 'textarea_small',
    'default' => 'Missão, Visão e Valores'
  ]);
  $cmb->add_field([
    'name' => 'Descrição da seção MISSÃO, VISÃO E VALORES',
    'id' => 'about_mission_description',
    'type' => 'textarea_small',
    'default' => 'Acreditamos na evolução constante e na adoção das últimas tecnologias para ficar à frente da curva. Nossa equipe está comprometida em ultrapassar os limites.'
  ]);
  $cmb->add_field([
    'name' => 'Missão (Título)',
    'id' => 'about_mission_title_mission',
    'type' => 'text',
    'default' => 'Missão',
  ]);
  $cmb->add_field([
    'name' => 'Missão (Descrição)',
    'id' => 'about_mission_description_mission',
    'type' => 'textarea',
    'default' => 'Aumentar de forma mensurável a produtividade de nossos clientes por meio de soluções inovadoras e eficientes.',
  ]);
  $cmb->add_field([
    'name' => 'Visão (Título)',
    'id' => 'about_mission_title_vision',
    'type' => 'text',
    'default' => 'Visão',
  ]);
  $cmb->add_field([
    'name' => 'Visão (Descrição)',
    'id' => 'about_mission_description_vision',
    'type' => 'textarea',
    'default' => 'Ser a melhor integradora e desenvolvedora de soluções de aumento de produtividade, levando nossos clientes ao próximo nível.',
  ]);
  $cmb->add_field([
    'name' => 'Valores (Título)',
    'id' => 'about_mission_title_value',
    'type' => 'text',
    'default' => 'Valores',
  ]);
  $cmb->add_field([
    'name' => 'Valores (Descrição)',
    'id' => 'about_mission_description_value',
    'type' => 'textarea',
    'default' => 'Competência, comprometimento, espírito de equipe e foco no cliente são os pilares que guiam todas as nossas ações.',
  ]);

  $cmb->add_field([
    'name' => 'Título da seção NOSSA EQUIPE',
    'id' => 'about_team_title',
    'type' => 'text',
    'default' => 'Nossa equipe'
  ]);
  $cmb->add_field([
    'name' => 'Subítulo da seção NOSSA EQUIPE',
    'id' => 'about_team_subtitle',
    'type' => 'text',
    'default' => 'Conheça nosso time'
  ]);
  $cmb->add_field([
    'name' => 'Descrição da seção NOSSA EQUIPE',
    'id' => 'about_team_description',
    'type' => 'textarea_small',
    'default' => 'Acreditamos na evolução constante e na adoção das últimas tecnologias para ficar à frente da curva. Nossa equipe está comprometida em ultrapassar os limites.'
  ]);

  $aboutTeamList = $cmb->add_field([
    'name' => 'Lista de colaboradores 1',
    'id' => 'about_team_list',
    'type' => 'group',
    'options' => [
      'group_title' => 'Colaborador {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($aboutTeamList, [
    'name' => 'Nome do colaborador',
    'id' => 'about_team_list_photo',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Add File'
    ),
    'query_args' => array(
      'type' => array(
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ),
    ),
  ]);
  $cmb->add_group_field($aboutTeamList, [
    'name' => 'Nome do colaborador',
    'id' => 'about_team_list_name',
    'type' => 'text',
  ]);
  $cmb->add_group_field($aboutTeamList, [
    'name' => 'Cargo do colaborador',
    'id' => 'about_team_list_position',
    'type' => 'text',
  ]);

}
// Metaboxes personalizados para PÁGINA DE SERVIÇOS
add_action('cmb2_admin_init', 'cmb2_fields_servicos');
function cmb2_fields_servicos()
{
  $cmb = new_cmb2_box([
    'id' => 'servicos_box',
    'title' => 'Seções da página',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-solucoes.php',
    ],
  ]);
  $cmb->add_field([
    'name' => 'Serviço 1: Título',
    'id' => 'services_item_title_first',
    'type' => 'text',
    'default' => 'Tendências de Redes',
  ]);
  $cmb->add_field([
    'name' => 'Serviço 1: Descrição',
    'id' => 'services_item_description_first',
    'type' => 'textarea',
    'default' => 'Novos designs de rede em data centers precisam ser flexíveis para superar limitações e requisitos modernos.',
  ]);
  $cmb->add_field([
    'name' => 'Serviço 2: Título',
    'id' => 'services_item_title_second',
    'type' => 'text',
    'default' => 'Consolidação de Infraestrutura',
  ]);
  $cmb->add_field([
    'name' => 'Serviço 2: Descrição',
    'id' => 'services_item_description_second',
    'type' => 'textarea',
    'default' => 'Oferecemos soluções avançadas que aumentam a eficiência e atendem às necessidades específicas dos data centers.',
  ]);
  $cmb->add_field([
    'name' => 'Serviço 3: Título',
    'id' => 'services_item_title_third',
    'type' => 'text',
    'default' => 'Flexibilidade na Infraestrutura',
  ]);
  $cmb->add_field([
    'name' => 'Serviço 3: Descrição',
    'id' => 'services_item_description_third',
    'type' => 'textarea',
    'default' => 'Soluções de cabeamento flexíveis são essenciais para a eficiência e futuras migrações em data centers.',
  ]);
  $cmb->add_field([
    'name' => 'Serviço 4: Título',
    'id' => 'services_item_title_fourth',
    'type' => 'text',
    'default' => 'Gerenciamento de Espaço',
  ]);
  $cmb->add_field([
    'name' => 'Serviço 4: Descrição',
    'id' => 'services_item_description_fourth',
    'type' => 'textarea',
    'default' => 'Maximizar o uso do espaço é essencial para a eficiência dos data centers. Soluções de layout ajudam a otimizar recursos',
  ]);
}

// Metaboxes personalizados para PÁGINA DE CONTATO
add_action('cmb2_admin_init', 'cmb2_fields_fale_conosco');
function cmb2_fields_fale_conosco()
{
  $cmb = new_cmb2_box([
    'id' => 'faleConosco_box',
    'title' => 'Seções da página',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-contato.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'Seção FAQ: Título',
    'id' => 'faq_title',
    'type' => 'text',
    'default' => 'FAQ',
  ]);
  $cmb->add_field([
    'name' => 'Seção FAQ: Subtítulo',
    'id' => 'faq_subtitle',
    'type' => 'text',
    'default' => 'Perguntas frequentes',
  ]);
  $cmb->add_field([
    'name' => 'Seção FAQ: Descrição',
    'id' => 'faq_description',
    'type' => 'textarea_small',
    'default' => 'Encontre respostas para as dúvidas mais comuns sobre nossos serviços e soluções de infraestrutura de TI.',
  ]);

  $faqList = $cmb->add_field([
    'name' => 'Lista de perguntas frequentes',
    'id' => 'faq_list',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Pergunta {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($faqList, [
    'name' => 'Pergunta',
    'id' => 'faq_item_question',
    'type' => 'textarea_small',
  ]);
  $cmb->add_group_field($faqList, [
    'name' => 'Resposta',
    'id' => 'faq_item_answer',
    'type' => 'textarea',
  ]);
}
// Metaboxes personalizados para SEÇÃO DE CTA
add_action('cmb2_admin_init', 'cmb2_fields_cta');
function cmb2_fields_cta()
{
  $cmb = new_cmb2_box([
    'id' => 'cta_box',
    'title' => 'Call to Action',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'cta-section.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'CTA: Subtítulo',
    'id' => 'cta_subtitle',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'CTA: Descrição',
    'id' => 'cta_description',
    'type' => 'textarea',
  ]);
  $cmb->add_field([
    'name' => 'CTA: Título',
    'id' => 'cta_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'CTA: Imagem de cliente',
    'id' => 'cta_client_img1',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Add File'
    ),
    'query_args' => array(
      'type' => array(
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ),
    ),
  ]);
  $cmb->add_field([
    'name' => 'CTA: Imagem de cliente',
    'id' => 'cta_client_img2',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Add File'
    ),
    'query_args' => array(
      'type' => array(
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ),
    ),
  ]);
  $cmb->add_field([
    'name' => 'CTA: Imagem de cliente',
    'id' => 'cta_client_img3',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Add File'
    ),
    'query_args' => array(
      'type' => array(
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ),
    ),
  ]);
  $cmb->add_field([
    'name' => 'CTA: Link do Botão',
    'id' => 'cta_button_link',
    'type' => 'text_url',
  ]);
  $cmb->add_field([
    'name' => 'CTA: Texto do Botão',
    'id' => 'cta_button_text',
    'type' => 'text',
  ]);
}
// Metaboxes personalizados para SEÇÃO DE CONTATO
add_action('cmb2_admin_init', 'cmb2_fields_contactsection');
function cmb2_fields_contactsection()
{
  $cmb = new_cmb2_box([
    'id' => 'contactsection_box',
    'title' => 'Formulário de contato',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'contact-section.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'Título principal da seção',
    'id' => 'contactsection_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo principal da seção',
    'id' => 'contactsection_subtitle',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Descrição principal da seção',
    'id' => 'contactsection_description',
    'type' => 'textarea',
  ]);

  $cmb->add_field([
    'name' => 'Link E-mail: URL',
    'id' => 'contactsection_link_email',
    'type' => 'text_url',
  ]);
  $cmb->add_field([
    'name' => 'Link E-mail: Texto 1',
    'id' => 'contactsection_link_email_text1',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Link E-mail: Texto 2',
    'id' => 'contactsection_link_email_text2',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Link Telefone: URL',
    'id' => 'contactsection_link_phone',
    'type' => 'text_url',
  ]);
  $cmb->add_field([
    'name' => 'Link Telefone: Texto 1',
    'id' => 'contactsection_link_phone_text1',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Link Telefone: Texto 2',
    'id' => 'contactsection_link_phone_text2',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Link Endereço: URL',
    'id' => 'contactsection_link_address',
    'type' => 'text_url',
  ]);
  $cmb->add_field([
    'name' => 'Link Endereço: Texto 1',
    'id' => 'contactsection_link_address_text1',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Link Endereço: Texto 2',
    'id' => 'contactsection_link_address_text2',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Formulário: Subtitle',
    'id' => 'contactforms_subtitle',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Formulário: Descrição',
    'id' => 'contactforms_description',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Formulário: Descrição',
    'id' => 'contactforms_description',
    'type' => 'text',
  ]);

}

// Metaboxes personalizados para a página de blogs
add_action('cmb2_admin_init', 'cmb2_pageblogs');
function cmb2_pageblogs()
{
  $cmb = new_cmb2_box([
    'id' => 'page_blog_metabox',
    'title' => 'Detalhes da Página de Blogs',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-blog.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'Blog: Título',
    'id' => 'blog_title',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Blog: Subtítulo',
    'id' => 'blog_subtitle',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Blog: Descrição',
    'id' => 'blog_description',
    'type' => 'textarea',
  ]);
}

// Metaboxes personalizados para posts individuais
add_action('cmb2_admin_init', 'cmb2_sample_blog');
function cmb2_sample_blog()
{
  $cmb = new_cmb2_box([
    'id' => 'blog_metabox',
    'title' => 'Detalhes do Blog',
    'object_types' => ['post']
  ]);

  $cmb->add_field([
    'name' => __('Texto Repetido', 'cmb2'),
    'id' => 'blog_texto_repetido',
    'type' => 'textarea',
    'default' => 'Explore o blog da W.E.R para acessar artigos e insights sobre tecnologia, infraestrutura de TI e inovações em telecomunicações. Atualize-se com as últimas tendências e impulsione o sucesso do seu negócio.'
  ]);

  $cmb->add_field([
    'name' => __('Foto do Autor', 'cmb2'),
    'id' => 'blog_autor_foto',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
    'text' => [
      'add_upload_file_text' => 'Add File'
    ],
    'query_args' => [
      'type' => [
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
      ],
    ],
  ]);

  $cmb->add_field([
    'name' => __('Nome do Autor', 'cmb2'),
    'id' => 'blog_autor_nome',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => __('Data da Publicação', 'cmb2'),
    'id' => 'blog_data_post',
    'type' => 'text_date',
    'default' => 'today'
  ]);
}
function custom_content_filter($content)
{
  if (is_single()) {
    // Adiciona uma classe aos parágrafos
    $content = preg_replace('/<p>/', '<p class="description">', $content);

    // Adiciona uma classe aos títulos H2
    $content = preg_replace('/<h1>/', '<h1 class="subtitle">', $content);
    $content = preg_replace('/<h2>/', '<h2 class="subtitle">', $content);
    $content = preg_replace('/<h3>/', '<h3 class="subtitle">', $content);
    $content = preg_replace('/<h4>/', '<h4 class="subtitle">', $content);
    $content = preg_replace('/<h5>/', '<h5 class="subtitle">', $content);
    $content = preg_replace('/<h6>/', '<h6 class="subtitle">', $content);
    $content = preg_replace('/<img/', '<img class="single-blog__mainBanner"', $content);
  }

  return $content;
}
add_filter('the_content', 'custom_content_filter');

?>