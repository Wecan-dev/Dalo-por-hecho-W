<?php 
///Redirigir al chekcout sin pasar por el carrito
add_filter ('add_to_cart_redirect', 'redirect_to_checkout');

function redirect_to_checkout() {
  global $woocommerce;
  $checkout_url = $woocommerce->cart->get_checkout_url();
  return $checkout_url;
}


/****************** Styles *****************/
function dalo_por_hecho_styles(){
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css' );
  wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/assets/css/slick.css' );
  wp_enqueue_style('googleapis', "https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;700;900&display=swap" );
  wp_enqueue_style('animate', "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" );
  wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/assets/css/slick-theme.css' );
  wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css' );  
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/main.css' );  
  wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css' ); 
  wp_enqueue_style('custom-responsive', get_stylesheet_directory_uri() . '/assets/css/custom-responsive.css' ); 

  wp_enqueue_script( 'jquerymin',get_bloginfo('stylesheet_directory') . '/assets/js/jquery.min.js', array( 'jquery' ) ); 
  wp_enqueue_script( 'wow','https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js');
  wp_enqueue_script( 'blazy','https://cdnjs.cloudflare.com/ajax/libs/blazy/1.8.2/blazy.min.js');
  wp_enqueue_script( 'bootstrap-min',get_bloginfo('stylesheet_directory') . '/assets/js/bootstrap.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'slick-min',get_bloginfo('stylesheet_directory') . '/assets/js/slick.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'setting-slick',get_bloginfo('stylesheet_directory') . '/assets/js/setting-slick.js', array( 'jquery' ) );
  wp_enqueue_script( 'easing','https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'); 
  wp_enqueue_script( 'main-js',get_bloginfo('stylesheet_directory') . '/assets/js/main.js', array( 'jquery' ) );
}

add_action('wp_enqueue_scripts', 'dalo_por_hecho_styles');

/***************Functions theme ********************/

function theme_customize_register($wp_customize){

  $wp_customize->add_panel('panel1',
        array(
            'title' => 'Secciones Home',
            'priority' => 1,
            )
        );
  require_once trailingslashit( get_template_directory() ) . 'inc/home/customizer-main-banner.php';
  require_once trailingslashit( get_template_directory() ) . 'inc/home/customizer-main-tareas.php';
  require_once trailingslashit( get_template_directory() ) . 'inc/home/customizer-main-cta.php';
  require_once trailingslashit( get_template_directory() ) . 'inc/home/customizer-main-funciona.php';
  require_once trailingslashit( get_template_directory() ) . 'inc/home/customizer-main-container.php';
  
} 
add_action('customize_register','theme_customize_register');

/***************** FNT General ************/

require_once trailingslashit( get_template_directory() ) . 'inc/fnc/fnc.php';

/***************** Local field group ************/

require_once trailingslashit( get_template_directory() ) . 'inc/fnc/local-field-group.php';

/*********** Testimonios ***********/
function custom_post_type_Testimonios() {

  $labels = array(
    'name'                  => _x( 'Testimonios', 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( 'Testimonios', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'             => __( 'Testimonios', 'text_domain' ),
    'name_admin_bar'        => __( 'Testimonios', 'text_domain' ),
    'archives'              => __( 'Archives', 'text_domain' ),
    'attributes'            => __( 'Atributos', 'text_domain' ),
    'parent_item_colon'     => __( 'Testimonios', 'text_domain' ),
    'all_items Testimonios'             => __( 'All Testimonios', 'text_domain' ),
    'add_new_item'          => __( 'Añadir nuevo Testimonios', 'text_domain' ),
    'add_new'               => __( 'Añadir nuevo', 'text_domain' ),
    'new_item'              => __( 'Nuevo Testimonios', 'text_domain' ),
    'edit_item'             => __( 'Editar Testimonios', 'text_domain' ),
    'update_item'           => __( 'Actualizar Testimonios', 'text_domain' ),
    'view_items Testimonios'            => __( 'See Testimonios', 'text_domain' ),
    'search_items Testimonios'          => __( 'Search Testimonios', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'It is not in the trash', 'text_domain' ),
    'featured_image'        => __( 'Featured Image', 'text_domain' ),
    'set_featured_image'    => __( 'Set Featured Image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove Featured Image', 'text_domain' ),
    'use_featured_image'    => __( 'Use Featured Image', 'text_domain' ),
    'insert_into_item'      => __( 'Insert Into Item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
    'items Testimoios_list'            => __( 'Testimonios List', 'text_domain' ),
    'items Testimoios_list_navigation' => __( 'Testimonios List Navigation', 'text_domain' ),
    'filter_items Testimoios_list'     => __( 'filter Items Testimonios List', 'text_domain' ),
  );
  $args = array(
    'label'                 => __( 'Testimonios', 'text_domain' ),
    'description'           => __( 'Testimonios image', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'custom-fields' ),
    'taxonomies'            => array( '' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-groups',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page', 
  );
  register_post_type( 'Testimonios', $args );

}
add_action( 'init', 'custom_post_type_Testimonios', 0 );

/*********** Postulados ***********/
function custom_post_type_postulados() {

  $labels = array(
    'name'                  => _x( 'Postulados', 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( 'Postulados', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'             => __( 'Postulados', 'text_domain' ),
    'name_admin_bar'        => __( 'Postulados', 'text_domain' ),
    'archives'              => __( 'Archivos del artículo', 'text_domain' ),
    'attributes'            => __( 'Atributos del artículo', 'text_domain' ),
    'parent_item_colon'     => __( 'Artículo principal:', 'text_domain' ),
    'all_items'             => __( 'Postulados', 'text_domain' ),
    'add_new_item'          => __( 'Añadir artículo nuevo', 'text_domain' ),
    'add_new'               => __( 'Añadir nuevo', 'text_domain' ),
    'new_item'              => __( 'Nuevo artículo', 'text_domain' ),
    'edit_item'             => __( 'Editar artículo', 'text_domain' ),
    'update_item'           => __( 'Actualizar artículo', 'text_domain' ),
    'view_items'            => __( 'Ver artículos', 'text_domain' ),
    'search_items'          => __( 'Buscar artículo', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'No se encuentra en la basura', 'text_domain' ),
    'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
    'set_featured_image'    => __( 'Establecer imagen destacada', 'text_domain' ),
    'remove_featured_image' => __( 'Eliminar imagen destacada', 'text_domain' ),
    'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
    'insert_into_item'      => __( 'Insertar en el artículo', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Subido a este artículo', 'text_domain' ),
    'items_list'            => __( 'Lista de artículos', 'text_domain' ),
    'items_list_navigation' => __( 'Lista de artículos de navegación', 'text_domain' ),
    'filter_items_list'     => __( 'Filtro lista artículos', 'text_domain' ),
  );
  $args = array(
    'label'                 => __( 'Postulados', 'text_domain' ),
    'description'           => __( 'Postulados image', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title', '', '', 'custom-fields' ),
    'taxonomies'            => array( ''),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => 'edit.php?post_type=job_listing',
    'menu_position'         => 2,
    'menu_icon'             => 'dashicons-groups',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'postulados', $args );

}
add_action( 'init', 'custom_post_type_postulados', 0 );

// cuestionarios Entrenamientos
function my_theme_columns_head_postulados($defaults) {
  unset($defaults['tags']);
  unset($defaults['categories']);
  $defaults['Postulado'] = 'Postulado';
    $defaults['Estado'] = 'Estado';
    $defaults['Oferta'] = 'Oferta';    
    return $defaults;
}
add_filter('manage_postulados_posts_columns', 'my_theme_columns_head_postulados');

 
function fill_postulados_posts_columns( $column_name, $post_id ) {
    
    $publicacion_meta = get_post_meta($post_id);    
    $plan_entrenamiento1= NULL;
    $post_id_entrenamiento = NULL;
    $post_id3 = NULL;
    switch( $column_name ):  

        case 'Postulado':
            
            $post_id1 = $publicacion_meta['ofertar_id_empleado'][0];
            $post_id3 = meta_value( 'entrenador',  $post_id1 );
            $queried_post_entrenador = get_post($post_id3);
            $entrenador = $queried_post_entrenador->post_title;  
            if (  $post_id1 != NULL) {
              echo  $post_id1; 
            }
            if (  $post_id1 == NULL) {
              echo "Ninguno"; 
            }                     
            break;                

        case 'Estado':
            $post_id_estado = $publicacion_meta['estado_entre'][0];
            if($post_id_estado == NULL){ $post_id_estado = "POR REVISAR"; }
            echo "$post_id_estado";
           break;

        case 'Oferta':
            
            $post_id_entrenamiento = $publicacion_meta['archivo_plan_de_entrenamiento'][0];
            $queried_id_entrenamiento = get_post($post_id_entrenamiento);
            $plan_entrenamiento = $queried_id_entrenamiento->guid;
            if ($post_id_entrenamiento != NULL) {
              $plan_entrenamiento1 = "Ver Plan";
            }
            echo "<a href='$plan_entrenamiento' target='_blank'>$plan_entrenamiento1</a>";            
            break;         

    endswitch;    
}
add_action( 'manage_postulados_posts_custom_column', 'fill_postulados_posts_columns', 10, 2 );



/***************** Form fields job *****************/
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

// Submit form filters
add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_salary_field');
add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_important_info_field');

add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_job_direccion_field');
add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_job_clp_field');
add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_job_horas_field');
add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_job_expires_field');
// Text fields filters
add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_salary_field' ); // #
add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_important_info_field' );
add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_job_expires_field' ); //

add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_job_direccion_field' ); 
add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_job_clp_field' );
add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_job_horas_field' );

add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_application_field' );
add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_company_website_field' );
add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_company_twitter_field' );
add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_company_name_field' );
add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_company_tagline_field' );
add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_company_video_field' );
// Single Job page filters
add_action( 'single_job_listing_meta_end', 'gma_wpjmef_display_job_salary_data' );
add_action( 'single_job_listing_meta_end', 'gma_wpjmef_display_important_info_data' );

// Dashboard: Job Listings > Jobs filters
add_filter( 'manage_edit-job_listing_columns', 'gma_wpjmef_retrieve_salary_column' );
add_filter( 'manage_job_listing_posts_custom_column', 'gma_wpjmef_display_salary_column' );


function gma_wpjmef_retrieve_salary_column($columns){

  $columns['job_salary']         = __( 'Salary', 'wpjm-extra-fields' );
  return $columns;

};

function gma_wpjmef_display_salary_column($column){
  
  global $post;

  switch ($column) {    
    case 'job_salary':
      
      $salary = get_post_meta( $post->ID, '_job_salary', true );
      
      if ( !empty($salary)) {
        echo $salary;
      } else {
        echo '-';
      
      }
    break;
  }

  return $column;

};

/********* Hidden 
********/
function gma_wpjmef_admin_add_company_website_field( $fields ) {
  $fields['_company_website'] = array(
    'type'        => 'hidden',
    'priority'    => 0,
  );
  return $fields;
}
function gma_wpjmef_admin_add_application_field( $fields ) {
  $fields['_application'] = array(
    'type'        => 'hidden',
    'priority'    => 0,
  );
  return $fields;
}
function gma_wpjmef_admin_add_company_twitter_field( $fields ) {
  $fields['_company_twitter'] = array(
    'type'        => 'hidden',
    'priority'    => 0,
  );
  return $fields;
}
function gma_wpjmef_admin_add_company_name_field( $fields ) {
  $fields['_company_name'] = array(
    'type'        => 'hidden',
    'priority'    => 0,
  );
  return $fields;
}
function gma_wpjmef_admin_add_company_tagline_field( $fields ) {
  $fields['_company_tagline'] = array(
    'type'        => 'hidden',
    'priority'    => 0,
  );
  return $fields;
}
function gma_wpjmef_admin_add_company_video_field( $fields ) {
  $fields['_company_video'] = array(
    'type'        => 'hidden',
    'priority'    => 0,
  );
  return $fields;
}

/********** Adds fields 
*************/
function gma_wpjmef_frontend_add_salary_field( $fields ) {
  
  $fields['job']['job_salary'] = array(
    'label'       => __( 'Salary', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => false,
    'placeholder' => 'e.g. USD$ 20.000',
    'description' => '',
    'priority'    => 7,
  );

  return $fields;

}

function gma_wpjmef_frontend_add_job_direccion_field( $fields ) {
  
  $fields['job']['job_direccion'] = array(
    'label'       => __( 'Dirección', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => false,
    'placeholder' => 'Calle #',
    'description' => '',
    'priority'    => 9,
  );

  return $fields;

}

function gma_wpjmef_frontend_add_job_clp_field( $fields ) {
  
  $fields['job']['job_clp'] = array(
    'label'       => __( 'CLP', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => false,
    'placeholder' => '',
    'description' => '',
    'priority'    => 9,
  );

  return $fields;

}

function gma_wpjmef_frontend_add_job_horas_field( $fields ) {
  
  $fields['job']['job_horas'] = array(
    'label'       => __( 'Horas', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => false,
    'placeholder' => '',
    'description' => '',
    'priority'    => 9,
  );

  return $fields;

}

function gma_wpjmef_frontend_add_important_info_field( $fields ) {
  
  $fields['job']['job_important_info'] = array(
    'label'       => __( 'Important information: ', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => false,
    'placeholder' => 'e.g. Work visa required',
    'description' => '',
    'priority'    => 8,
  );
  
  return $fields;

}
function gma_wpjmef_frontend_add_job_expires_field( $fields ) {
  
  $fields['job']['job_expires'] = array(
    'label'       => __( 'Date: ', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => false,
    'placeholder' => '',
    'description' => '',
    'priority'    => 8,
  );
  
  return $fields;

}

function gma_wpjmef_admin_add_job_expires_field( $fields ) {
  
  $fields['_job_expires'] = array(
    'label'       => __( 'ex', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. USD$ 20.000',
    'description' => ''
  );

  return $fields;

}

function gma_wpjmef_admin_add_salary_field( $fields ) {
  
  $fields['_job_salary'] = array(
    'label'       => __( 'Salary', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. USD$ 20.000',
    'description' => ''
  );

  return $fields;

}

function gma_wpjmef_admin_add_job_direccion_field( $fields ) {
  
  $fields['_job_direccion'] = array(
    'label'       => __( 'Direccion', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => '',
    'description' => ''
  );

  return $fields;

}

function gma_wpjmef_admin_add_job_clp_field( $fields ) {
  
  $fields['_job_clp'] = array(
    'label'       => __( 'CLP', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => '',
    'description' => ''
  );

  return $fields;

}

function gma_wpjmef_admin_add_job_horas_field( $fields ) {
  
  $fields['_job_horas'] = array(
    'label'       => __( 'Horas', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => '',
    'description' => ''
  );

  return $fields;

}

function gma_wpjmef_admin_add_important_info_field( $fields ) {
  
  $fields['_job_important_info'] = array(
    'label'       => __( 'Important information', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. Work visa required',
    'description' => ''
  );

  return $fields;

}

function gma_wpjmef_display_job_salary_data() {
  
  global $post;

  $salary = get_post_meta( $post->ID, '_job_salary', true );
  $important_info = get_post_meta( $post->ID, '_job_important_info', true );
  $job_direccion = get_post_meta( $post->ID, '_job_direccion', true );
  $job_clp = get_post_meta( $post->ID, '_job_clp', true );
  $job_horas = get_post_meta( $post->ID, '_job_horas', true );
  $job_expires = get_post_meta( $post->ID, '_job_expires', true );

  if ( $salary ) {
    echo '<li class="wpjmef-field-salary">' . __( 'Salary: ' ) . esc_html( $salary ) . '</li>';
  }

}


function gma_wpjmef_display_important_info_data() {
  
  global $post;

  $important_info = get_post_meta( $post->ID, '_job_important_info', true );

  if ( $important_info ) {
    echo '<li class="wpjmef-field-important-info">' . esc_html( $important_info ) . '</li>';
  }

}

