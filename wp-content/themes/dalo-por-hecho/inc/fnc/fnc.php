<?php

/************* General wordpress ************/

the_post_thumbnail();
the_post_thumbnail('thumbnail');       
the_post_thumbnail('medium');          
the_post_thumbnail('large');           
the_post_thumbnail('full');            

add_theme_support( 'post-thumbnails' );
the_post_thumbnail( array(100,100) ); 
set_post_thumbnail_size( 1568, 9999 );

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'title-tag' );

add_theme_support( 'post-thumbnails' );

register_nav_menus( array(
  'primary' => __( 'Primary Menu', 'store' ),
  'top' => __( 'Top Menu', 'store' ),
) );

add_theme_support( 'html5', array(
  'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
) );

add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'quote', 'link',
) );

add_theme_support( 'custom-background', apply_filters( 'store_custom_background_args', array(
    'default-color' => 'f7f5ee',
    'default-image' => '',
) ) );

add_image_size('store-sq-thumb', 600,600, true );
add_image_size('store-thumb', 540,450, true );
add_image_size('pop-thumb',542, 340, true );

add_theme_support('woocommerce');
add_theme_support( 'wc-product-gallery-lightbox' );


/*********** Woocommerce **********************/
function my_theme_setup() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'my_theme_setup' );

add_action( 'after_setup_theme', 'yourtheme_setup' );

function yourtheme_setup() {
add_theme_support( 'wc-product-gallery-slider' );
} 

/***************** Widget ************************/
function dalo_por_hecho_widgets_init() {

  register_sidebar(
    array(
      'name'          => __( 'Sidebar Header', 'Dalo por hecho' ),
      'id'            => 'sidebar-1',
      'description'   => __( 'Add widgets here to appear in your header.', 'Dalo por hecho' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );  

}
add_action( 'widgets_init', 'dalo_por_hecho_widgets_init' );

/***************** Termmeta IMG *****************/
function termmeta_value_img( $meta_key, $post_id ){
            global $wpdb;  
            $value = NULL; $value_img = NULL;
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."termmeta WHERE meta_key = '$meta_key' and term_id = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              $result_link1 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE ID = '$value'"); 
              foreach($result_link1 as $r1)
               {
                      $value_img = $r1->guid;                      
              }              
              return $value_img;

}

/***************** Format Date *****************/
function the_job_publish_date2( $post = null ) {
  $date_format = get_option( 'job_manager_date_format' );

  if ( 'default' === $date_format ) {
    $display_date = esc_html__( 'Posted on ', 'wp-job-manager' ) . date_i18n( get_option( 'date_format' ), get_post_time( 'U' ) );
  } else {
    // translators: Placeholder %s is the relative, human readable time since the job listing was posted.
    $display_date = sprintf( esc_html__( 'Hace %s ', 'wp-job-manager' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) );
  }

  echo '<time datetime="' . esc_attr( get_post_time( 'Y-m-d' ) ) . '">' . wp_kses_post( $display_date ) . '</time>';
}

/***************** Format Date pPostulados*****************/
function the_job_publish_date_postu( $post = null ) {
  $date_format = get_post(get_the_ID())->post_date;
  //$date_format = get_option( 'job_manager_date_format' );

  if ( 'default' === $date_format ) {
    $display_date = esc_html__( 'Posted on ', 'wp-job-manager' ) . date_i18n( get_option( 'date_format' ), get_post_time( 'U' ) );
  } else {
    // translators: Placeholder %s is the relative, human readable time since the job listing was posted.
    $display_date = sprintf( esc_html__( 'Hace %s ', 'wp-job-manager' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) );
  }

//echo get_the_ID();
  echo '<time datetime="' . esc_attr( get_post_time( 'Y-m-d' ) ) . '">' . wp_kses_post( $display_date ) . '</time>';
}


/***************** Date *****************/
function date_new($fecha){
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $dia.' '.$num.', '.$mes;
}

/***************** Date Order *****************/
function date_order_new($fecha){
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('d', strtotime($fecha))];
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $dia.' '.$num.' de '.$mes. ' del '.$anno;
}

/***************** Meta *****************/
function meta_value( $meta_key, $post_id ){
            global $wpdb;  
            $value = NULL;
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '$meta_key' and post_id = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              $value = str_replace("\n", "<br>", $value); 
              return $value;

}


/***************** Meta IMG *****************/
function meta_value_img( $meta_key, $post_id ){
            global $wpdb; 
            $value = NULL; $value_img = NULL;
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '$meta_key' and post_id = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              $result_link1 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE ID = '$value'"); 
              foreach($result_link1 as $r1)
               {
                      $value_img = $r1->guid;                      
              }              
              return $value_img;

}

/***************** Meta JOB IMG *****************/
function job_meta_value_img($post_id ){
            global $wpdb; 
            $value = NULL; $value_img = NULL;
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '_thumbnail_id' and post_id = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              $result_link1 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '_wp_attached_file' and post_id = '$value'"); 
              foreach($result_link1 as $r1)
               {
                      $value_img = $r1->meta_value;                       
              }              
              return $value_img;

}


/***************** User *****************/
function user_value( $post_id ){
            global $wpdb; 
            $value = NULL; 
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."users WHERE ID = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->user_email;                      
              }
              return $value;

}

/***************** Meta User *****************/
function meta_user_value( $meta_key, $post_id ){
            global $wpdb; 
            $value = NULL; 
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."usermeta WHERE meta_key = '$meta_key' and user_id = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              return $value;

}
/***************** Meta IMG FRM *****************/
function meta_value_img_frm($user,$form_id){
            global $wpdb;
            $value_frm = NULL; $value_post = NULL; $value_img = NULL;
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."frm_items WHERE user_id = '$user' and form_id = '$form_id' "); 
              foreach($result_link as $r)
              {
                      $value_frm = $r->id;                      
              }
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."frm_item_metas WHERE item_id = '$value_frm' "); 
              foreach($result_link as $r)
              {
                      $value_post = $r->meta_value;                      
              }

              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_author = '$user' and ID = '$value_post' "); 
              foreach($result_link as $r)
              {
                      $value_img = $r->guid;                      
              }
              return $value_img;
}

/******************Excerp Cut*****************/
function cut_text($text, $le) 
{ 
   $points = "...";
   $words = explode(' ', $text); 
   if (count($words) > $le) 
   { 
     return implode(' ', array_slice($words, 0, $le)) ." ". $points; 
   } else
         {
           return $text; 
         } 
}

/********************Arg **********************/

function arg($cat,$tax,$search,$location){ 

  if ($cat == NULL && $search == NULL) {
    $args = 
    array(
      'post_type' => 'job_listing',
      'post_status' => 'publish',
     // 'paged' => $paged,
      //'posts_per_page' =>12,
    );
  }

  if ($cat != NULL) {
    $args = 
    array(
      'post_type' => 'job_listing',
     // 'paged' => $paged,
     // 'posts_per_page' => 12,        
      'post_status' => 'publish',
      'tax_query' => array(
      'relation'=>'AND', // 'AND' 'OR' ...
        array(
        'taxonomy'        => $tax,
        'field'           => 'slug',
        'terms'           => array($cat),
        'operator'        => 'IN',
        )),
    );
  } 
        
  if ($search != NULL) {
    $args = 
    array(
      'post_type' => 'job_listing',
      'post_status' => 'publish',
      's' => $search,
    );
  }

  if ($location != NULL) {
    $args = 
    array(
      'post_type' => 'job_listing',
      'post_status' => 'publish',
      'meta_query' => array(
      'relation'=>'AND', // 'AND' 'OR' ...
        array(
        'key' => '_job_location',
        'value' => $location,
        'compare' => 'LIKE',
        )),
    );    
  }

  return $args; 
} 

/********************Order Itemmeta **********************/

function order_itemmeta($key,$id){ 
            global $wpdb; 
            $value = NULL; 
            $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_id = '$id' and order_item_type = 'line_item' "); 
            foreach($result_link as $r)
            {
                     $order_item_id = $r->order_item_id; 
                     $result_link2 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_itemmeta WHERE meta_key = '$key' and order_item_id = '$order_item_id' "); 
                    foreach($result_link2 as $r2)
                    {
                            $value = $r2->meta_value;                      
                    }                                           
            }
            return $value;
}  

/*********************Crypt Array Note ******************/

function descrypt_note($array_note,$wp_pedido_id,$key){
  $value_var_array = str_replace("<br>",":",$array_note); 
  $sinparametros= explode(':', $value_var_array, 14);
  if ($key == "name_tarea") {
    return $sinparametros[1];
  }
  
}