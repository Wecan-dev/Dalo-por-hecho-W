<?php
/**
 * Content for job submission (`[submit_job_form]`) shortcode.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-submit.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.34.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $job_manager;
?>
<?php if ($_GET['action'] == NULL ) { ?>
<form action="<?php echo esc_url( $action ); ?>" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">

	<?php
	if ( isset( $resume_edit ) && $resume_edit ) {
		printf( '<p><strong>' . esc_html__( "You are editing an existing job. %s", 'wp-job-manager' ) . '</strong></p>', '<a href="?job_manager_form=submit-job&new=1&key=' . esc_attr( $resume_edit ) . '">' . esc_html__( 'Create A New Job', 'wp-job-manager' ) . '</a>' );
	}
	?>

	<?php do_action( 'submit_job_form_start' ); ?>

	<?php if ( apply_filters( 'submit_job_form_show_signin', true ) ) : ?>

		<?php get_job_manager_template( 'account-signin.php' ); ?>

	<?php endif; ?>

	<?php if ( job_manager_user_can_post_job() || job_manager_user_can_edit_job( $job_id ) ) : ?>

		<!-- Job Information Fields -->
		<?php do_action( 'submit_job_form_job_fields_start' ); ?>

<div class="tab-content" id="main_form">
												<div class="tab-pane active" role="tabpanel" id="step1">
													<h4 class="text-center">¿Que necesitas hacer?</h4>
											

													<div class="start">
														<label for="">Colocale título a tu tarea</label>

														<input type="text" name="job_title" id="job_title"
															placeholder="Ej, cargar maletas en edificio" />
													</div>
													<div class="form-group start">
														<label for="exampleFormControlSelect1">Categorías</label>
														<select class="form-control" name="job_category[]" id="job_category">
														    <option>Seleccionar</option>
                                                            <?php $product_categories = get_categories( array( 'taxonomy' => 'job_listing_category', 'orderby' => 'menu_order', 'order' => 'asc' ));  ?>
                                                            <?php foreach($product_categories as $category):  global $wpdb;?>		
                                                                <option value="<?=$category->term_id ?>"><?=$category->name ?></option>
		                                                    <?php endforeach; ?>						
														</select>
													</div>
													<div class="form-group start">
														<label for="exampleFormControlTextarea1">Cuales son
															los
															detalles de la
															tarea</label>
														<textarea class="form-control" name="job_description" id="job_description"
															rows="3"
															placeholder="Ej, vivo en el 5 piso , no puedo cargar peo por asuntos medicos"></textarea>
													</div>
													<ul class="list-inline text-center">
														<li class="btn-line">
                                                        <?php if(is_user_logged_in() != NULL){ ?>
														    <button type="button" class="default-btn next-step">Siguiente</button></li>
														<?php } ?>
                                                        <?php if(is_user_logged_in() == NULL){ ?>
														    <button type="button" class="next-step" >Siguiente</button></li>
														    <label for="exampleFormControlTextarea1">Create una cuenta <a href="ingresar">aquí</a></label>
														<?php } ?>														
                                                        
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step2">
													<h4 class="text-center">¿Donde y cuando?</h4>
													<div>
														<h3 class="text-start">Donde se realizara la tarea</h3>
														<div class="content-row">
                                                            <?php $product_categories = get_categories( array( 'taxonomy' => 'job_listing_type', 'orderby' => 'menu_order', 'order' => 'asc' ));  ?>
                                                            <?php foreach($product_categories as $category):  global $wpdb;?>		
                                                                <div class="col-md-6 step-content ">
																   <p class="p-0 m-0 color-blue"><i	class="<?php if($category->name == 'En persona'){ echo "fa fa-map-marker";}if($category->name == 'En línea'){ echo "fa fa-globe";} ?>" aria-hidden="true"></i><input name="job_type" id="job_type" type="radio" value="<?=$category->term_id ?>">
																	<?=$category->name ?> </p>
																   <span>Lorem ipsum dolor sit amet consectetur </span>
															    </div>                                                                
		                                                    <?php endforeach; ?>						
	
														</div>
													</div>
													<div class="form-group start">
                                                        <input type="text" name="job_location" id="job_location"  placeholder="e.g. &quot;London&quot;" />
													</div>
													
													<div class="form-group start">
														<input type="text" name="job_direccion" id="job_direccion"
															placeholder="Dirección y numero" />

													</div>
													<div class="start">
														<label for="">Cuando necesitas las tareas?</label>
														<input type="date" name="_job_expires" id="_job_expires"
															placeholder="seleciona una fecha" />
													</div>
													<ul class="list-inline text-center">
														<!-- <li><button type="button"
																class="default-btn prev-step">Back</button></li>
														<li><button type="button"
																class="default-btn next-step skip-btn">Skip</button>
														</li> -->
														<li class="btn-line"><button type="button"
																class="default-btn next-step">Siguiente</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step3">
													<h4 class="text-center">¿Que necesitas hacer?</h4>
													<label class="text-start mt-4">Cual es tu presupuesto para la tarea?
													</label>
													<span style="font-size: 12px;color: #b3b3b3;" class="list-inline text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
														Reiciendis voluptates nobis </span>
													<div class="row mb-3">
														<div class="col-md-6">

															<input type="text"  name="job_clp" id="job_clp" placeholder="CLP" />
														</div>
														<div class="col-md-6">

															<input type="text" name="job_horas" id="job_horas" placeholder="Horas" />
														</div>
													</div>
													<div class="presupuesto">
														<div class="row">
															<div class="col-md-8">
																<label class="text-start m-0">Presupueto estimado
																</label>
																<span class="list-inline text-center">Lorem ipsum dolor
																	sit amet
																	consectetur adipisicing
																	elit.
																</span>
															</div>
															<div class="col-md-4 d-flex justify-content-center align-items-center" >
																<p id="multipli"></p>
																<input type="text" class="form-control" name="job_salary" id="job_salary" value="" />
															</div>
														</div>
													</div>
													<ul class="list-inline text-center">
														<!-- <li><button type="button"
																class="default-btn prev-step">Back</button></li>
														<li><button type="button"
																class="default-btn next-step skip-btn">Skip</button>
														</li> -->
														<li class="btn-line"><button type="button"
																class="default-btn next-step">Siguiente</button></li>
													</ul>
												</div>
												<div class="tab-pane completado" role="tabpanel" id="step4">
													<h4 class="text-center ">Completado</h4>

													<div class="text-center">
														<img class="mb-3" src="<?php echo get_template_directory_uri();?>/assets/img/Grupo 666.png" alt="">
														<label for="">Ya puedes dar por hecho tu tarea</label> <br>
														<span>Espera a que la comunidad realice sus ofertas para
															escoger</span>
													</div>
													<ul class="list-inline text-center ">
														<!-- <li><button type="button"
																class="default-btn prev-step">Back</button></li> -->
														<li class="btn-line mt-4">
                                                          <input type="hidden" name="job_manager_form" value="submit-job">
                                                          <input type="hidden" name="job_id" value="0">
                                                          <input type="hidden" name="step" value="0">
                                                          <input type="hidden" name="submit_job" class="button" value="Preview">
														  <button class="default-btn next-step" type="submit" name="save_draft" class="button secondary save_draft" value="Save Draft" formnovalidate="" >Siguiente</button></li>
													</ul>
												</div>
											</div>

		<?php do_action( 'submit_job_form_job_fields_end' ); ?>

		<!-- Company Information Fields -->
		<?php if ( $company_fields ) : ?>
			<!--<h2><?php esc_html_e( 'Company Details', 'wp-job-manager' ); ?></h2>-->

			<?php do_action( 'submit_job_form_company_fields_start' ); ?>



			<?php do_action( 'submit_job_form_company_fields_end' ); ?>
		<?php endif; ?>

		<?php do_action( 'submit_job_form_end' ); ?>


	<?php else : ?>

		<?php do_action( 'submit_job_form_disabled' ); ?>

	<?php endif; ?>
</form>

<?php } ?>


<?php if ($_GET['action'] != NULL ) { ?>
<form action="<?php echo esc_url( $action ); ?>" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">

	<?php
	if ( isset( $resume_edit ) && $resume_edit ) {
		printf( '<p><strong>' . esc_html__( "You are editing an existing job. %s", 'wp-job-manager' ) . '</strong></p>', '<a href="?job_manager_form=submit-job&new=1&key=' . esc_attr( $resume_edit ) . '">' . esc_html__( 'Create A New Job', 'wp-job-manager' ) . '</a>' );
	}
	?>

	<?php do_action( 'submit_job_form_start' ); ?>

	<?php if ( apply_filters( 'submit_job_form_show_signin', true ) ) : ?>

		<?php get_job_manager_template( 'account-signin.php' ); ?>

	<?php endif; ?>

	<?php if ( job_manager_user_can_post_job() || job_manager_user_can_edit_job( $job_id ) ) : ?>

		<!-- Job Information Fields -->
		<?php do_action( 'submit_job_form_job_fields_start' ); ?>

		<?php foreach ( $job_fields as $key => $field ) : ?>
			<fieldset class="fieldset-<?php echo esc_attr( $key ); ?> fieldset-type-<?php echo esc_attr( $field['type'] ); ?>">
				<label for="<?php echo esc_attr( $key ); ?>"><?php echo wp_kses_post( $field['label'] ) . wp_kses_post( apply_filters( 'submit_job_form_required_label', $field['required'] ? '' : ' <small>' . __( '(optional)', 'wp-job-manager' ) . '</small>', $field ) ); ?></label>
				<div class="field <?php echo $field['required'] ? 'required-field' : ''; ?>">
					<?php get_job_manager_template( 'form-fields/' . $field['type'] . '-field.php', [ 'key' => $key, 'field' => $field ] ); ?>
				</div>
			</fieldset>
		<?php endforeach; ?>

		<?php do_action( 'submit_job_form_job_fields_end' ); ?>

		<!-- Company Information Fields -->
		

		<?php do_action( 'submit_job_form_end' ); ?>

		<p>
			<input type="hidden" name="job_manager_form" value="<?php echo esc_attr( $form ); ?>" />
			<input type="hidden" name="job_id" value="<?php echo esc_attr( $job_id ); ?>" />
			<input type="hidden" name="step" value="<?php echo esc_attr( $step ); ?>" />
			<input type="submit" name="submit_job" class="button" value="<?php echo esc_attr( $submit_button_text ); ?>" />
			<?php
			if ( isset( $can_continue_later ) && $can_continue_later ) {
				echo '<input type="submit" name="save_draft" class="button secondary save_draft" value="' . esc_attr__( 'Save Draft', 'wp-job-manager' ) . '" formnovalidate />';
			}
			?>
			<span class="spinner" style="background-image: url(<?php echo esc_url( includes_url( 'images/spinner.gif' ) ); ?>);"></span>
		</p>

	<?php else : ?>

		<?php do_action( 'submit_job_form_disabled' ); ?>

	<?php endif; ?>
</form>

<?php } ?>	