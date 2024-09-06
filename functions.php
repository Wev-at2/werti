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
        'page-servicos.php',
        'page-estrutura.php',
        'page-doacoes.php',
        'page-doacoes-nota-fiscal.php',
        'page-colaboradores.php',
        'page-fale-conosco.php',
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

  $mainHomeBanners = $cmb->add_field([
    'name' => 'Banners principais',
    'id' => 'main_banners',
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
  $cmb->add_group_field($mainHomeBanners, [
    'name' => 'Arquivo do Banner Desktop',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'id' => 'main_banner_image_desktop',
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
  $cmb->add_group_field($mainHomeBanners, [
    'name' => 'Arquivo do Banner Mobile',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'id' => 'main_banner_image_mobile',
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
  $cmb->add_group_field($mainHomeBanners, [
    'name' => 'Título do Banner',
    'id' => 'main_banner_title',
    'type' => 'text',
  ]);
  $cmb->add_group_field($mainHomeBanners, [
    'name' => 'Subtítulo do Banner',
    'id' => 'main_banner_subtitle',
    'type' => 'text',
  ]);
  $cmb->add_group_field($mainHomeBanners, [
    'name' => 'Cor do Título do Banner',
    'id' => 'main_banner_fontcolor_title',
    'desc' => 'Cores padrões: Vermelho: #ed1a3b / Azul: #333280',
    'type' => 'colorpicker',
    'default' => '#ed1a3b',
    'options' => array(
      'alpha' => true, // seletor de cores RGBA permitindo transparência/opacidade
    ),
  ]);
  $cmb->add_group_field($mainHomeBanners, [
    'name' => 'Cor do Subtítulo do Banner',
    'id' => 'main_banner_fontcolor_subtitle',
    'desc' => 'Cores padrões: Vermelho: #ed1a3b / Azul: #333280',
    'type' => 'colorpicker',
    'default' => '#333280',
    'options' => array(
      'alpha' => true, // seletor de cores RGBA permitindo transparência/opacidade
    ),
  ]);
  $cmb->add_group_field($mainHomeBanners, [
    'name' => 'Call to Action Link',
    'id' => 'main_banner_cta_link',
    'type' => 'text_url',
  ]);
  $cmb->add_group_field($mainHomeBanners, [
    'name' => 'Call to Action Text',
    'id' => 'main_banner_cta_text',
    'type' => 'text',
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
    'name' => 'Título principal (Sobre nós)',
    'id' => 'home_about_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo principal (Sobre nós)',
    'id' => 'home_about_subtitle',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Descrição principal (Sobre nós)',
    'id' => 'home_about_description',
    'type' => 'textarea',
  ]);
  $cmb->add_field([
    'name' => 'Link principal (Sobre nós)',
    'id' => 'home_about_link',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Título principal (Serviços)',
    'id' => 'home_services_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo principal (Serviços)',
    'id' => 'home_services_subtitle',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Descrição principal (Serviços)',
    'id' => 'home_services_description',
    'type' => 'textarea',
  ]);

  $cmb->add_field([
    'name' => 'SERVIÇO 1: Título',
    'id' => 'home_services_one_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'SERVIÇO 1: Descrição',
    'id' => 'home_services_one_description',
    'type' => 'textarea',
  ]);
  $cmb->add_field([
    'name' => 'SERVIÇO 2: Título',
    'id' => 'home_services_two_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'SERVIÇO 2: Descrição',
    'id' => 'home_services_two_description',
    'type' => 'textarea',
  ]);
  $cmb->add_field([
    'name' => 'SERVIÇO 3: Título',
    'id' => 'home_services_three_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'SERVIÇO 3: Descrição',
    'id' => 'home_services_three_description',
    'type' => 'textarea',
  ]);
  $cmb->add_field([
    'name' => 'SERVIÇO 4: Título',
    'id' => 'home_services_four_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'SERVIÇO 4: Descrição',
    'id' => 'home_services_four_description',
    'type' => 'textarea',
  ]);

  $cmb->add_field([
    'name' => 'Seção Bazar: Título',
    'id' => 'bazar_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Seção Bazar: Subtítulo',
    'id' => 'bazar_subtitle',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Bazar: URL do Endereço',
    'id' => 'bazar_description_address_link',
    'type' => 'text_url',
  ]);
  $cmb->add_field([
    'name' => 'Bazar: Texto do endereço',
    'id' => 'bazar_description_address_text',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Bazar: Horários de funcionamento',
    'id' => 'bazar_description_schedules',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Bazar: URL do telefone',
    'id' => 'bazar_description_phone_link',
    'type' => 'text_url',
  ]);
  $cmb->add_field([
    'name' => 'Bazar: Texto do telefone',
    'id' => 'bazar_description_phone_text',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Bazar: Mapa  (iframe)',
    'desc' => 'Inserir o iframe daqui:',
    'id' => 'bazar_description_maps',
    'type' => 'textarea_code',
  ]);

  $servicosBazarImages = $cmb->add_field([
    'name' => 'Imagens do bazar',
    'id' => 'servicos_bazar_image_list',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Imagem do bazar {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($servicosBazarImages, [
    'name' => 'Imagem do bazar',
    'desc' => 'Faça upload de uma imagem ou insira um URL. *Imagem 4x3 horizontal',
    'id' => 'servicos_bazar_item_file',
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
    'name' => 'Título principal (Doações)',
    'id' => 'home_donations_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo principal (Doações)',
    'id' => 'home_donations_subtitle',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Descrição principal (Doações)',
    'id' => 'home_donations_description',
    'type' => 'textarea',
  ]);

  $homeDonationsChart = $cmb->add_field([
    'name' => 'Gráfico: Divisão feita com as doações',
    'id' => 'home_donations_chart',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Dados {#} do gráfico',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($homeDonationsChart, [
    'name' => 'Título do item do gráfico',
    'id' => 'home_donations_chart_label',
    'type' => 'text',
  ]);
  $cmb->add_group_field($homeDonationsChart, [
    'name' => 'Cor do item do gráfico',
    'id' => 'home_donations_chart_value',
    'type' => 'text_small',
  ]);
  $cmb->add_group_field($homeDonationsChart, [
    'name' => 'Valor do item do gráfico (digite apenas números)',
    'id' => 'home_donations_chart_color',
    'type' => 'colorpicker',
    'default' => '#FFFFFF',
    'options' => array(
      'alpha' => true, // seletor de cores RGBA permitindo transparência/opacidade
    ),
  ]);

  $cmb->add_field([
    'name' => 'Título principal (Colaboradores)',
    'id' => 'home_employees_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo principal (Colaboradores)',
    'id' => 'home_employees_subtitle',
    'type' => 'textarea_small',
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
  ]);

  $cmb->add_field([
    'name' => 'Título principal (Instagram)',
    'id' => 'home_instagram_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Subtítulo principal (Instagram)',
    'id' => 'home_instagram_subtitle',
    'type' => 'textarea_small',
  ]);

}

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
    'name' => 'Título da seção HISTÓRICO',
    'id' => 'about_history_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Subítulo da seção HISTÓRICO',
    'id' => 'about_history_subtitle',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Descrição da seção HISTÓRICO',
    'id' => 'about_history_description',
    'type' => 'textarea',
  ]);

  $cmb->add_field([
    'name' => 'Título da seção MISSÃO, VISÃO E VALORES',
    'id' => 'about_mission_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Subítulo da seção MISSÃO, VISÃO E VALORES',
    'id' => 'about_mission_subtitle',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Missão (Título)',
    'id' => 'about_mission_title_mission',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Missão (Descrição)',
    'id' => 'about_mission_description_mission',
    'type' => 'textarea',
  ]);
  $cmb->add_field([
    'name' => 'Visão (Título)',
    'id' => 'about_mission_title_vision',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Visão (Descrição)',
    'id' => 'about_mission_description_vision',
    'type' => 'textarea',
  ]);
  $cmb->add_field([
    'name' => 'Valores (Título)',
    'id' => 'about_mission_title_value',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Valores (Descrição)',
    'id' => 'about_mission_description_value',
    'type' => 'textarea',
  ]);

  $cmb->add_field([
    'name' => 'Nossos números (Título principal)',
    'id' => 'about_numbers_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Nossos números (Subtítulo principal)',
    'id' => 'about_numbers_subtitle',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Nossos números (Título da primeira lista/grupo)',
    'id' => 'about_numbers_list_subtitle_first',
    'type' => 'textarea_small',
  ]);

  $aboutNumbersTableLast = $cmb->add_field([
    'name' => 'Resumo de acolhimento 2023 (lista)',
    'id' => 'about_numbers_list_lastyear',
    'type' => 'group',
    'options' => [
      'group_title' => 'Item {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($aboutNumbersTableLast, [
    'name' => 'Quantidade',
    'id' => 'about_numbers_item_qty_lastyear',
    'type' => 'text_small',
    'desc' => 'Ex:  15.000',
  ]);
  $cmb->add_group_field($aboutNumbersTableLast, [
    'name' => 'Descrição',
    'id' => 'about_numbers_item_description_lastyear',
    'type' => 'textarea_small',
  ]);

  $aboutNumbersTableLastBefore = $cmb->add_field([
    'name' => 'Resumo de acolhimento 2022 (lista)',
    'id' => 'about_numbers_list_lastyear_before',
    'type' => 'group',
    'options' => [
      'group_title' => 'Item {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($aboutNumbersTableLastBefore, [
    'name' => 'Quantidade',
    'id' => 'about_numbers_item_qty_lastyear_before',
    'type' => 'text_small',
    'desc' => 'Ex:  15.000',
  ]);
  $cmb->add_group_field($aboutNumbersTableLastBefore, [
    'name' => 'Descrição',
    'id' => 'about_numbers_item_description_lastyear_before',
    'type' => 'textarea_small',
  ]);

  $cmb->add_field([
    'name' => 'Título da seção NOSSA EQUIPE',
    'id' => 'about_team_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Subítulo da seção NOSSA EQUIPE',
    'id' => 'about_team_subtitle',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Título de cargo 1',
    'id' => 'about_team_list_one_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Título de cargo 2',
    'id' => 'about_team_list_two_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Título de cargo 3',
    'id' => 'about_team_list_three_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Título de cargo 4',
    'id' => 'about_team_list_four_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Título de cargo 5',
    'id' => 'about_team_list_five_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Título de cargo 6',
    'id' => 'about_team_list_six_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Título de cargo 7',
    'id' => 'about_team_list_seven_title',
    'type' => 'text',
  ]);

  $aboutTeamListOne = $cmb->add_field([
    'name' => 'Lista de colaboradores 1',
    'id' => 'about_team_list_one',
    'type' => 'group',
    'options' => [
      'group_title' => 'Colaborador {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($aboutTeamListOne, [
    'name' => 'Nome do colaborador',
    'id' => 'about_team_list_one_name',
    'type' => 'text',
  ]);
  $cmb->add_group_field($aboutTeamListOne, [
    'name' => 'Cargo do colaborador',
    'id' => 'about_team_list_one_position',
    'type' => 'text',
  ]);

  $aboutTeamListTwo = $cmb->add_field([
    'name' => 'Lista de colaboradores 2',
    'id' => 'about_team_list_two',
    'type' => 'group',
    'options' => [
      'group_title' => 'Colaborador {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($aboutTeamListTwo, [
    'name' => 'Nome do colaborador',
    'id' => 'about_team_list_two_name',
    'type' => 'text',
  ]);
  $cmb->add_group_field($aboutTeamListTwo, [
    'name' => 'Cargo do colaborador',
    'id' => 'about_team_list_two_position',
    'type' => 'text',
  ]);

  $aboutTeamListThree = $cmb->add_field([
    'name' => 'Lista de colaboradores 3',
    'id' => 'about_team_list_three',
    'type' => 'group',
    'options' => [
      'group_title' => 'Colaborador {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($aboutTeamListThree, [
    'name' => 'Nome do colaborador',
    'id' => 'about_team_list_three_name',
    'type' => 'text',
  ]);
  $cmb->add_group_field($aboutTeamListThree, [
    'name' => 'Cargo do colaborador',
    'id' => 'about_team_list_three_position',
    'type' => 'text',
  ]);

  $aboutTeamListFour = $cmb->add_field([
    'name' => 'Lista de colaboradores 4',
    'id' => 'about_team_list_four',
    'type' => 'group',
    'options' => [
      'group_title' => 'Colaborador {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($aboutTeamListFour, [
    'name' => 'Nome do colaborador',
    'id' => 'about_team_list_four_name',
    'type' => 'text',
  ]);
  $cmb->add_group_field($aboutTeamListFour, [
    'name' => 'Cargo do colaborador',
    'id' => 'about_team_list_four_position',
    'type' => 'text',
  ]);

  $aboutTeamListFive = $cmb->add_field([
    'name' => 'Lista de colaboradores 5',
    'id' => 'about_team_list_five',
    'type' => 'group',
    'options' => [
      'group_title' => 'Colaborador {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($aboutTeamListFive, [
    'name' => 'Nome do colaborador',
    'id' => 'about_team_list_five_name',
    'type' => 'text',
  ]);
  $cmb->add_group_field($aboutTeamListFive, [
    'name' => 'Cargo do colaborador',
    'id' => 'about_team_list_five_position',
    'type' => 'text',
  ]);

  $aboutTeamListSix = $cmb->add_field([
    'name' => 'Lista de colaboradores 6',
    'id' => 'about_team_list_six',
    'type' => 'group',
    'options' => [
      'group_title' => 'Colaborador {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($aboutTeamListSix, [
    'name' => 'Nome do colaborador',
    'id' => 'about_team_list_six_name',
    'type' => 'text',
  ]);
  $cmb->add_group_field($aboutTeamListSix, [
    'name' => 'Cargo do colaborador',
    'id' => 'about_team_list_six_position',
    'type' => 'text',
  ]);

  $aboutTeamListSeven = $cmb->add_field([
    'name' => 'Lista de colaboradores 7',
    'id' => 'about_team_list_seven',
    'type' => 'group',
    'options' => [
      'group_title' => 'Colaborador {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($aboutTeamListSeven, [
    'name' => 'Nome do colaborador',
    'id' => 'about_team_list_seven_name',
    'type' => 'text',
  ]);
  $cmb->add_group_field($aboutTeamListSeven, [
    'name' => 'Cargo do colaborador',
    'id' => 'about_team_list_seven_position',
    'type' => 'text',
  ]);

}

add_action('cmb2_admin_init', 'cmb2_fields_servicos');
function cmb2_fields_servicos()
{
  $cmb = new_cmb2_box([
    'id' => 'servicos_box',
    'title' => 'Seções da página',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-servicos.php',
    ],
  ]);
  $cmb->add_field([
    'name' => 'Serviço 1: Título',
    'id' => 'services_item_title_first',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Serviço 1: Descrição',
    'id' => 'services_item_description_first',
    'type' => 'textarea',
  ]);
  $cmb->add_field([
    'name' => 'Serviço 2: Título',
    'id' => 'services_item_title_second',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Serviço 2: Descrição',
    'id' => 'services_item_description_second',
    'type' => 'textarea',
  ]);
  $cmb->add_field([
    'name' => 'Serviço 3: Título',
    'id' => 'services_item_title_third',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Serviço 3: Descrição',
    'id' => 'services_item_description_third',
    'type' => 'textarea',
  ]);
  $cmb->add_field([
    'name' => 'Serviço 4: Título',
    'id' => 'services_item_title_fourth',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Serviço 4: Descrição',
    'id' => 'services_item_description_fourth',
    'type' => 'textarea',
  ]);
}

add_action('cmb2_admin_init', 'estrutura');
function estrutura()
{
  $cmb = new_cmb2_box([
    'id' => 'estrutura_box',
    'title' => 'Seções da página',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-estrutura.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'Seção Casa de apoio: Título',
    'id' => 'structure_supportHouse_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Seção Casa de apoio: Subtítulo',
    'id' => 'structure_supportHouse_subtitle',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Casa de apoio: URL do Endereço',
    'id' => 'structure_supportHouse_description_address_link',
    'type' => 'text_url',
  ]);
  $cmb->add_field([
    'name' => 'Casa de apoio: Texto do endereço',
    'id' => 'structure_supportHouse_description_address_text',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Casa de apoio: URL do telefone',
    'id' => 'structure_supportHouse_description_phone_link',
    'type' => 'text_url',
  ]);
  $cmb->add_field([
    'name' => 'Casa de apoio: Texto do telefone',
    'id' => 'structure_supportHouse_description_phone_text',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Casa de apoio: Mapa  (iframe)',
    'desc' => 'Inserir o iframe daqui:',
    'id' => 'structure_supportHouse_description_maps',
    'type' => 'textarea_code',
  ]);

  $estructureSupportHouseImages = $cmb->add_field([
    'name' => 'Imagens do bazar',
    'id' => 'structure_supportHouse_image_list',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Imagem do bazar {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($estructureSupportHouseImages, [
    'name' => 'Imagem do bazar',
    'desc' => 'Faça upload de uma imagem ou insira um URL. *Imagem quadrada 1x1',
    'id' => 'structure_supportHouse_item_file',
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
    'name' => 'Seção Nossa Sede: Título',
    'id' => 'structure_headquarters_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Seção Nossa Sede: Subtítulo',
    'id' => 'structure_headquarters_subtitle',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Nossa sede: URL do Endereço',
    'id' => 'structure_headquarters_description_address_link',
    'type' => 'text_url',
  ]);
  $cmb->add_field([
    'name' => 'Nossa sede: Texto do endereço',
    'id' => 'structure_headquarters_description_address_text',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Nossa sede: URL do telefone',
    'id' => 'structure_headquarters_description_phone_link',
    'type' => 'text_url',
  ]);
  $cmb->add_field([
    'name' => 'Nossa sede: Texto do telefone',
    'id' => 'structure_headquarters_description_phone_text',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Nossa sede: Mapa  (iframe)',
    'desc' => 'Inserir o iframe daqui:',
    'id' => 'structure_headquarters_description_maps',
    'type' => 'textarea_code',
  ]);

  $estructureHeadquartersImages = $cmb->add_field([
    'name' => 'Imagens do bazar',
    'id' => 'structure_headquarters_image_list',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Imagem do bazar {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($estructureHeadquartersImages, [
    'name' => 'Imagem do bazar',
    'desc' => 'Faça upload de uma imagem ou insira um URL. *Imagem 4x3 horizontal',
    'id' => 'structure_headquarters_item_file',
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

add_action('cmb2_admin_init', 'cmb2_fields_doacoes');
function cmb2_fields_doacoes()
{
  $cmb = new_cmb2_box([
    'id' => 'doacoes_box',
    'title' => 'Seções da página',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-doacoes.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'Seção QR Code Pix: Subtítulo',
    'id' => 'doacoes_pix_subtitle',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Seção QR Code Pix: Descrição',
    'id' => 'doacoes_pix_description',
    'type' => 'textarea_small',
  ]);

  $cmb->add_field([
    'name' => 'Seção Doações de materiais: Título',
    'id' => 'doacoes_materials_title',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Seção Doações de materiais: Subtítulo',
    'id' => 'doacoes_materials_subtitle',
    'type' => 'textarea_small',
  ]);

  $cmb->add_field([
    'name' => 'Lista de materiais 1: Título',
    'id' => 'doacoes_materiais_list_title_first',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Lista de materiais 1: Descrição',
    'id' => 'doacoes_materiais_list_description_first',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Lista de materiais 2: Título',
    'id' => 'doacoes_materiais_list_title_second',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Lista de materiais 2: Descrição',
    'id' => 'doacoes_materiais_list_description_second',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Lista de materiais 3: Título',
    'id' => 'doacoes_materiais_list_title_third',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Lista de materiais 3: Descrição',
    'id' => 'doacoes_materiais_list_description_third',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Lista de materiais 4: Título',
    'id' => 'doacoes_materiais_list_title_fourth',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Lista de materiais 4: Descrição',
    'id' => 'doacoes_materiais_list_description_fourth',
    'type' => 'textarea_small',
  ]);
}

add_action('cmb2_admin_init', 'cmb2_fields_doacoes_nota_fiscal');
function cmb2_fields_doacoes_nota_fiscal()
{
  $cmb = new_cmb2_box([
    'id' => 'doacoesNf_box',
    'title' => 'Seções da página',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-doacoes-nota-fiscal.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'Seção Como doar: Subtítulo',
    'id' => 'doacoesNf_comoDoar_subtitle',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Seção Como doar: Descrição',
    'id' => 'doacoesNf_comoDoar_description',
    'type' => 'textarea',
  ]);

  $cmb->add_field([
    'name' => 'Passo a passo App: Subtítulo',
    'id' => 'doacoesNf_list_app_subtitle',
    'type' => 'text',
  ]);
  $doacoesNfListApp = $cmb->add_field([
    'name' => 'Passo a passo App',
    'id' => 'doacoesNf_list_app',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Imagem do bazar {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($doacoesNfListApp, [
    'name' => 'Item do passo a passo',
    // 'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'id' => 'doacoesNf_list_app_item',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Passo a passo Site: Subtítulo',
    'id' => 'doacoesNf_list_site_subtitle',
    'type' => 'text',
  ]);
  $doacoesNfListSite = $cmb->add_field([
    'name' => 'Passo a passo: Site',
    'id' => 'doacoesNf_list_site',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Item do passo a passo {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($doacoesNfListSite, [
    'name' => 'Item do passo a passo',
    // 'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'id' => 'doacoesNf_list_site_item',
    'type' => 'text',
  ]);
}

add_action('cmb2_admin_init', 'cmb2_fields_colaboradores');
function cmb2_fields_colaboradores()
{
  $cmb = new_cmb2_box([
    'id' => 'colaboradores_box',
    'title' => 'Seções da página',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-colaboradores.php',
    ],
  ]);

  $employeesList = $cmb->add_field([
    'name' => 'Lista de colaboradores',
    'id' => 'employees_list',
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
  $cmb->add_group_field($employeesList, [
    'name' => 'Imagem do colaborador',
    'desc' => 'Faça upload de uma imagem ou insira um URL.',
    'id' => 'employees_item_imagem',
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
  $cmb->add_group_field($employeesList, [
    'name' => 'Descrição do colaborador',
    'id' => 'employees_item_description',
    'type' => 'text',
  ]);
  $cmb->add_group_field($employeesList, [
    'name' => 'Link/Site do colaborador',
    'id' => 'employees_item_link',
    'type' => 'text_url',
  ]);
}

add_action('cmb2_admin_init', 'cmb2_fields_fale_conosco');
function cmb2_fields_fale_conosco()
{
  $cmb = new_cmb2_box([
    'id' => 'faleConosco_box',
    'title' => 'Seções da página',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-fale-conosco.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'Seção Nossa Localização: Título',
    'id' => 'nossaLocalização_title',
    'type' => 'text',
  ]);
  $cmb->add_field([
    'name' => 'Seção Nossa Localização: Subtítulo',
    'id' => 'nossaLocalização_subtitle',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Nossa Localização: URL do Endereço',
    'id' => 'nossaLocalização_description_address_link',
    'type' => 'text_url',
  ]);
  $cmb->add_field([
    'name' => 'Nossa Localização: Texto do endereço',
    'id' => 'nossaLocalização_description_address_text',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Nossa Localização: Horários de funcionamento',
    'id' => 'nossaLocalização_description_schedules',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Nossa Localização: URL do telefone',
    'id' => 'nossaLocalização_description_phone_link',
    'type' => 'text_url',
  ]);
  $cmb->add_field([
    'name' => 'Nossa Localização: Texto do telefone',
    'id' => 'nossaLocalização_description_phone_text',
    'type' => 'textarea_small',
  ]);
  $cmb->add_field([
    'name' => 'Nossa Localização: Mapa  (iframe)',
    'desc' => 'Inserir o iframe daqui:',
    'id' => 'nossaLocalização_description_maps',
    'type' => 'textarea_code',
  ]);
}

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
    'name' => 'CTA: Descrição',
    'id' => 'cta_description',
    'type' => 'textarea',
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

?>