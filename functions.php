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

// functions.php
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

// array('item1', 'item2') === ['item1', 'item2']
function cmb2_fields_pages()
{
  // Adiciona um bloco
  $cmb = new_cmb2_box([
    'id' => 'main_content_box', // id deve ser único
    'title' => 'Conteúdo principal',
    'object_types' => ['page'], // tipo de post
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
    ], // modelo de página
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
    'id' => 'home_box', // id deve ser único
    'title' => 'Pagina Inicial',
    'object_types' => ['page'], // tipo de post
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-home.php',
    ], // modelo de página
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
    'type' => 'colorpicker',
    'default' => '#ed1a3b',
    'options' => array(
      'alpha' => true, // seletor de cores RGBA permitindo transparência/opacidade
    ),
  ]);
  $cmb->add_group_field($mainHomeBanners, [
    'name' => 'Cor do Subtítulo do Banner',
    'id' => 'main_banner_fontcolor_subtitle',
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

  $aboutSectionNumbers = $cmb->add_field([
    'name' => 'Resumo de acolhimento 2023 (lista)',
    'id' => 'about_numbers_list',
    'type' => 'group',
    'options' => [
      'group_title' => 'Item {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'remove_confirm' => esc_html__('Tem certeza que deseja excluir? Isso pode resultar em perdas irreversíveis.'),
      'sortable' => true,
    ],
  ]);
  $cmb->add_group_field($aboutSectionNumbers, [
    'name' => 'Quantidade',
    'id' => 'about_numbers_list_qty',
    'type' => 'text_small',
    'desc' => 'Ex:  15.000',
  ]);
  $cmb->add_group_field($aboutSectionNumbers, [
    'name' => 'Descrição',
    'id' => 'about_numbers_list_description',
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
}

add_action('cmb2_admin_init', 'estrutura');

function estrutura()
{
}

add_action('cmb2_admin_init', 'cmb2_fields_doacoes');

function cmb2_fields_doacoes()
{
}

add_action('cmb2_admin_init', 'cmb2_fields_doacoes_nota_fiscal');

function cmb2_fields_doacoes_nota_fiscal()
{
}

add_action('cmb2_admin_init', 'cmb2_fields_doacoes_colaboradores');

function cmb2_fields_doacoes_colaboradores()
{
}

add_action('cmb2_admin_init', 'cmb2_fields_doacoes_fale_conosco');

function cmb2_fields_doacoes_fale_conosco()
{
}

?>