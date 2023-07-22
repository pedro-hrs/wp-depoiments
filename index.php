<?php 
  /*
Plugin Name: Depoimentos
Plugin URI:  https://www.prodrigues.com.br
Description: Plugin wordpress para exibição de depoimentos
Version:     0.1.0
Author:      Pedro Rodrigues
Author URI:  https://www.prodrigues.com.br
*/
function wp_depoiments_scripts(){

  wp_enqueue_script('slick-script','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js', array('jquery'), NULL, true);
  wp_enqueue_style( 'wp-depoiments-style', plugin_dir_url( __FILE__ ) . 'public/css/style.css',false,'1.1','all');
  wp_enqueue_script( 'wp-depoiments-script', plugin_dir_url( __FILE__ ) . 'public/js/script.js',array('jquery'),'1.1','all');
}
add_action('wp_enqueue_scripts', 'wp_depoiments_scripts');


function register_depoimentos_post_type() {

	$labels = array(
		'name'                  => _x( 'Depoimentos', 'Post Type General Name', 'iconiko' ),
		'singular_name'         => _x( 'Depoimento', 'Post Type Singular Name', 'iconiko' ),
		'menu_name'             => __( 'Depoimentos', 'iconiko' ),
		'name_admin_bar'        => __( 'Depoimentos', 'iconiko' ),
		'archives'              => __( 'Depoimentos arquivadas', 'iconiko' ),
		'attributes'            => __( 'Atributos', 'iconiko' ),
		'parent_item_colon'     => __( 'Parent Item:', 'iconiko' ),
		'all_items'             => __( 'Ver todos', 'iconiko' ),
		'add_new_item'          => __( 'Adicionar', 'iconiko' ),
		'add_new'               => __( 'Adicionar', 'iconiko' ),
		'new_item'              => __( 'Nova depoimento', 'iconiko' ),
		'edit_item'             => __( 'Editar depoimento', 'iconiko' ),
		'update_item'           => __( 'Atualizar depoimento', 'iconiko' ),
		'view_item'             => __( 'Visualizar depoimento', 'iconiko' ),
		'view_items'            => __( 'Visualizar depoimento', 'iconiko' ),
		'search_items'          => __( 'Buscar Depoimentos', 'iconiko' ),
		'not_found'             => __( 'Não encontrado', 'iconiko' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'iconiko' ),
		'featured_image'        => __( 'Foto do cliente', 'iconiko' ),
		'title'        => __( 'Foto do cliente', 'iconiko' ),
		'set_featured_image'    => __( 'Selecionar imagem principal', 'iconiko' ),
		'remove_featured_image' => __( 'Remover imagem principal', 'iconiko' ),
		'use_featured_image'    => __( 'Usar imagem principal', 'iconiko' ),
		'insert_into_item'      => __( 'Insert into item', 'iconiko' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'iconiko' ),
		'items_list'            => __( 'Items list', 'iconiko' ),
		'items_list_navigation' => __( 'Items list navigation', 'iconiko' ),
		'filter_items_list'     => __( 'Filter items list', 'iconiko' ),
	);
	$args = array(
		'label'                 => __( 'Depoimento', 'iconiko' ),
		'description'           => __( 'Depoimentos disponíves', 'iconiko' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields'),
		'hierarchical'          => true,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
    'menu_icon'             => 'dashicons-format-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'depoimentos', $args );
}

add_action('init', 'register_depoimentos_post_type',0);
function obter_depoimentos($atts) {
    // Definir os atributos padrão do shortcode e mesclar com os atributos recebidos
    $atts = shortcode_atts(
        array(
            'color' => '#FF0000', // Cor padrão é preto (caso não seja informada)
            'align' => 'left', // Alinhamento padrão à esquerda (caso não seja informada)
        ),
        $atts
    );

    // Argumentos da consulta para obter os depoimentos
    $query_args = array(
        'post_type' => 'depoimentos',
    );

    query_posts($query_args);
    echo '<div class="wp-depoiments slider" style="text-align:'.esc_attr( $atts['align'] ).'">';
    if (have_posts()) : while (have_posts()) : the_post();
        echo '<div class="wp-depoiments-wrapper">';
        echo '<p class="wp-depoiments-content">' . get_the_content() . '<p>';
        echo '<h5 class="wp-depoiments-title" style="color: ' . esc_attr($atts['color']) . ';">' . get_the_title() . '</h5>';
        echo '</div>';
      endwhile; else:
      endif;
      echo '</div>';
      wp_reset_query();
      echo '<style>ul.wp-depoiments-dots>li.slick-active {background-color:' . esc_attr($atts['color']) . ';border: 1.5px solid ' . esc_attr($atts['color']) . ';}</style>';
}

add_shortcode('depoimentos', 'obter_depoimentos');



?>