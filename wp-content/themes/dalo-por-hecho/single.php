<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dalo por hecho
 */

get_header();

?>
<?php
/**
 * Single view job meta box.
 *
 * Hooked into single_job_listing_start priority 20
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-single-job_listing-meta.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.14.0
 * @version     1.28.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;?>



<div class="container " style="margin-top:120px">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<article id="post-74" class="post-74 job_listing type-job_listing status-publish has-post-thumbnail hentry job_listing_type-health-care job-type-health-care">
				<header class="entry-header">
					<h1 class="entry-title"><?php wpjm_the_job_title(); ?></h1>
					<div class="job-type"> <span class="btn health-care"><?php echo $product_categories = wp_get_post_terms( get_the_ID(), 'job_listing_type' )[0]->name; ?></span>	</div> 
				</header>
				<div class="entry-content" itemprop="text">
					<div class="single_job_listing">

							<ul class="job-listing-meta meta">


								<li class="job-type health-care"><?php echo $product_categories = wp_get_post_terms( get_the_ID(), 'job_listing_category' )[0]->name; ?></li>


								<li class="location"><a class="google_map_link" href=""><?php the_job_location( false ); ?></a></li>

								<li class="date-posted"><time datetime="2019-01-23"><?php echo date_new(get_post_time( 'Y-m-d' )); ?></time></li>


								<li class="wpjmef-field-salary">Salario: $<?php echo get_post_meta( get_the_ID(), '_job_salary', true ); ?></li><li class="wpjmef-field-important-info"><?php echo meta_value( '_job_important_info', get_the_ID()); ?></li></ul>

								<div class="company"> 
									<?php echo get_avatar(user_value(get_post(get_the_ID())->post_author), 50 ); ?> 
									<p class="name"> 
					                    <a class="website" href="" rel="nofollow">Web</a>
				                        <strong><?php the_author_meta( 'first_name', 1); ?></strong>	
				                    </p>
	                                <p class="tagline"><?php the_author_meta( 'description', 1); ?></p>	
		                        </div>

										<div class="job_description">
											<p><?php wpjm_the_job_description(); ?></p>
											</div>

											<div class="job_application application">
												
													<?php if (is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Hacer tareas" ){ ?>
													<a href="" class="" data-toggle="modal" data-target="#publicar"><input type="button" class="application_button button" value="Ofertar"></a>
													<?php }else { ?>
													<a href="" class="" data-toggle="modal" data-target=""><input type="button" class="application_button button" value="Ofertar"></a>
													<label for="exampleFormControlTextarea1">Create una cuenta para hacer tareas <a class="nav-link naranja-color" href="#" data-toggle="modal" data-target="#exampleModal">aquí</a></label>
													<?php } ?>												
												
											</div>

										</div>
									</div><!-- .entry-content -->
								</article> <!-- #article -->		</main><!-- #main -->
							</div><!-- #primary -->


						</div>
                <!-- Modal Inicio de sesion -->
                <div class="modal fade" id="publicar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">  
                      <div class="modal-body">
                         <?php echo do_shortcode('[frm-set-get ofertar_title_tarea_publicada='.get_the_title().'][frm-set-get ofertar_name_tarea_publicada='.get_the_title().'][frm-set-get ofertar_id_tarea_publicada='.get_the_ID().'][frm-set-get ofertar_email_empleador='.get_the_author_meta( 'user_email' ).'][frm-set-get ofertar_monto_tarea='.get_post_meta( get_the_ID(), '_job_salary', true ).'][frm-set-get ofertar_id_empleado='.wp_get_current_user()->ID.'][frm-set-get ofertar_name_empleado='.meta_user_value( 'first_name', $current_user->ID ).'][formidable id=2]');  ?>
                      </div>         
                    </div>
                  </div> 
                </div>  
<?php //get_footer(); ?>