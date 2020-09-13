<?php 

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
  
} 
add_action('customize_register','theme_customize_register');

/***************** FNT General ************/

require_once trailingslashit( get_template_directory() ) . 'inc/fnc/fnc.php';

/***************** Local field group ************/

//require_once trailingslashit( get_template_directory() ) . 'inc/fnc/local-field-group.php';


/**
 * Plugin Name: WPJM Extra Fields
 * Plugin URI: https://tilcode.blog/wpjm-extra-fields-adds-extra-fields-to-wp-job-manager-job-listings
 * Description: Adds an extra Salary and Important Information fields to WP Job Manager job listings
 * Version: 1.3.0
 * Author: Gabriel Maldonado
 * Author URI: http://tilcode.blog/
 * Text Domain: wpjm-extra-fields
 *
 * License: GPLv2 or later
 */

/**
 * Prevent direct access data leaks
 **/
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

//add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'gma_wpjmef_add_support_link_to_plugin_page' );

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

/**
* Sets the job_salary metadata as a new $column that can be used in the back-end
**/
function gma_wpjmef_retrieve_salary_column($columns){

  $columns['job_salary']         = __( 'Salary', 'wpjm-extra-fields' );
  return $columns;

};

/**
* Adds a new case to WP-Job-Manager/includes/admin/class-wp-job-manager-cpt.php
**/

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

/**
* Hidden
**/
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
/**
* Adds a new optional "Salary" text field at the "Submit a Job" form, generated via the [submit_job_form] shortcode
**/
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
/**
* Adds a new optional "Important Information" text field at the "Submit a Job" form, generated via the [submit_job_form] shortcode
**/
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
    'type'        => 'date',
    'required'    => false,
    'placeholder' => '',
    'description' => '',
    'priority'    => 8,
  );
  
  return $fields;

}

/**
* Adds a text field to the Job Listing wp-admin meta box named “Salary”
**/
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
/**
* Adds a text field to the Job Listing wp-admin meta box named "Important Information"
**/
function gma_wpjmef_admin_add_important_info_field( $fields ) {
  
  $fields['_job_important_info'] = array(
    'label'       => __( 'Important information', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. Work visa required',
    'description' => ''
  );

  return $fields;

}

/**
* Displays "Salary" on the Single Job Page, by checking if meta for "_job_salary" exists and is displayed via do_action( 'single_job_listing_meta_end' ) on the template
**/
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

/**
* Displays the content of the "Important Information" text-field on the Single Job Page, by checking if meta for "_job_important_info" exists and is displayed via do_action( 'single_job_listing_meta_end' ) on the template
**/
function gma_wpjmef_display_important_info_data() {
  
  global $post;

  $important_info = get_post_meta( $post->ID, '_job_important_info', true );

  if ( $important_info ) {
    echo '<li class="wpjmef-field-important-info">' . esc_html( $important_info ) . '</li>';
  }

}

