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


global $job_manager, $current_user, $wp_roles;
$action = NULL;
$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
if (strpos($url, '?') !== false) {
    $action = $_GET['action'];
}

?>
<?php if ($action == NULL ) { ?>
<style>
	
	input + label { display: inline-block }

	input ~ .tab { display: none }
	#radio1:checked ~ .tab.content1,
	#radio2:checked ~ .tab.content2{ display: block; }
	.input-type__presupuesto{
		margin-top: .4rem;
	}
	.main-type__inputs{
		margin-left: 0.2rem;
		margin-top: 1rem;
	}
	.label-type__presupuesto{
		margin-right: 2rem;
	}
	.close{
		z-index: 99999;
	}
	.close:focus{
		background-color: transparent;
	}
	@media (min-width:0) and (max-width: 767px){
		.label-type__presupuesto{
			margin-right: 1rem;
		}
		#job_clp{
			margin-bottom: 5px;
		}
	}

</style>
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
															placeholder="Ej, cargar maletas en edificio" required/>
													</div>
													<div class="form-group start">
														<label for="exampleFormControlSelect1">Categorías</label>
														<select class="form-control hid" name="job_category[]" id="job_category" required="">
														    
                                                            <?php $product_categories = get_categories( array( 'taxonomy' => 'job_listing_category', 'order' => 'asc' ));  ?>
                                                            <?php foreach($product_categories as $category):  global $wpdb;?>
                                                                <?php if($i<1){ ?>                                                                
                                                               	<option value="" id="job_cat">Seleccionar</option>
														        <?php } ?>
                                                                <option id="<?=$category->term_id ?>" value="<?=$category->term_id ?>"><?=$category->name ?></option>
		                                                    <?php $i=$i+1; endforeach; ?>						
														</select>
													
													</div>
													<div class="form-group start">
														<label for="exampleFormControlTextarea1">Cuales son
															los
															detalles de la
															tarea</label>
														<textarea class="form-control" name="job_description" id="job_description"
															rows="3"
															placeholder="Ej, vivo en el 5 piso , no puedo cargar peso por asuntos medicos" required=""></textarea>
													</div>
													<ul class="list-inline text-center">
														<li class="btn-line">
                                                        <?php if(is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Publicar Tareas"){ ?>
														    <button type="button" class="default-btn next-step">Siguiente</button></li>
														<?php } ?>
                                                        <?php if(is_user_logged_in() == NULL OR meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) != "Publicar Tareas"){ ?>
														    <button type="button" class="next-step" >Siguiente</button></li>
														    <label for="exampleFormControlTextarea1">Para publicar tareas cambia tu rol de perfil <a href="<?php echo get_home_url() ?>/confi-perfil/?tab=conf">aquí </a></label>
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
																   <p class="p-0 m-0 color-blue"><i	class="<?php if($category->name == 'En persona'){ $mens = "Selecciona si necesitas la persona físicamente en el lugar"; echo "fa fa-map-marker";}if($category->name == 'En línea'){ $mens = "Selecciona si la tarea se puede hacer desde casa"; echo "fa fa-globe";} ?>" aria-hidden="true"></i><input name="job_type" id="job_type <?=$category->slug ?>" type="radio" value="<?=$category->term_id ?>"  onclick="block_<?=$category->term_id ?>()"
																	<?=$category->name ?> </p>
																   <span><?php echo $mens; ?></span>
															    </div>                                                                
		                                                    <?php endforeach; ?>						
	
														</div>
													</div>
													<div class="form-group start" id="job_location">
                                                       <!-- <input type="text" name="job_location" id="job_location"  placeholder="e.g. &quot;London&quot;" />-->
                                                        <input class="search_query form-control" type="text" name="job_location" id="job_location" placeholder="Ciudad" required="">
                                                        <div id="suggestions"></div>
													</div>
													
													<div class="form-group start" id="job_direccion">
														<input type="text" name="job_direccion" id="job_direccion" placeholder="Dirección y numero" required="" />

													</div>
													<div class="start">
														<label for="">Cuando necesitas las tareas?</label>
														<input type="date" name="job_expires" id="job_expires"
															placeholder="seleciona una fecha" required="" />
													</div>
													<ul class="list-inline text-center">
														<li class="main-li__back"><button type="button"
																class="default-btn prev-step">Atrás</button></li>
													
														<li class="btn-line"><button type="button"
																class="default-btn next-step">Siguiente</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step3">
													<h4 class="text-center">¿Que necesitas hacer?</h4>
													<label class="text-start mt-4">Cual es tu presupuesto para la tarea?
													</label>
													<span style="font-size: 12px;color: #b3b3b3;" class="list-inline text-center">Cuanto estás dispuesto a pagar por la tarea</span>
													
													<div class="row main-type__inputs mb-3">
														<input class="input-type__presupuesto" type="radio" name="radio1" id="radio1" onclick="quitar();" checked />
														<label class="label-type__presupuesto" for="tab1">Total</label>
														<input class="input-type__presupuesto" type="radio" name="radio1" id="radio2" onclick="quitar();"/>
														<label class="label-type__presupuesto"  for="tab2">Tarifa por horas</label>
														
														<div class="tab content1">
															<div class="row mb-3">
                                                            	<div class="col-md-6">
                                                            		<input type="text"  name="job_total" id="job_total" placeholder="$000" required="" />
                                                            	</div>
														    </div>
														</div>
														<div class="tab content2">
															 <div class="row mb-3">
                                                            	<div class="col-md-6">
                                                            		<input type="text"  name="job_clp" id="job_clp" placeholder="CLP" />
                                                            	</div>
                                                            	<div class="col-md-6">
                                                            		<input type="text" name="job_horas" id="job_horas" placeholder="Horas" />
                                                            	</div>
														    </div>	
															
														</div>
														 <div class="presupuesto">
														        <div class="row">
															        <div class="col-md-8">
																        <label class="text-start m-0">Presupueto estimado
																        </label>
																        <span class="list-inline text-center">El monto tendrá un recargo del 10%
																        </span>
															        </div>
															        <div class="col-md-4 d-flex justify-content-center align-items-center" >
																        <p id="multipli"></p>
																        <input type="text" class="form-control" name="job_salary" id="job_salary" value="" />
															        </div>
														        </div>
													        </div>
													   															
													</div>
                                                  												

													<fieldset class="fieldset-company_logo fieldset-type-file">
														<label for="company_logo">Agregar Imagen <small>(opcional)</small></label>
														<div class="field ">
															<div class="job-manager-uploaded-files">
															</div>

															<input type="file" class="input-text wp-job-manager-file-upload" data-file_types="jpg|jpeg|gif|png" name="company_logo" id="company_logo" placeholder="">
															<small class="description">
																Tamaño máximo del archivo: 10 MB.	</small>
														</div>
													</fieldset>

													<ul class="list-inline text-center">
														<li class="main-li__back"><button type="button"
																class="default-btn prev-step">Atrás</button></li>
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
														  <button class="default-btn" type="submit" name="save_draft" class="button secondary save_draft" value="Save Draft" formnovalidate="" >Siguiente</button></li>
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


<?php if ($action != NULL ) { ?>
<!--<form action="?action=edit&amp;job_id=85" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">-->
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



			<?php foreach ( $job_fields as $key => $field ) : ?>
			<fieldset class="fieldset-<?php echo esc_attr( $key ); ?> fieldset-type-<?php echo esc_attr( $field['type'] ); ?>">
				<label for="<?php echo esc_attr( $key ); ?>"><?php echo wp_kses_post( $field['label'] ) . wp_kses_post( apply_filters( 'submit_job_form_required_label', $field['required'] ? '' : ' <small>' . __( '(optional)', 'wp-job-manager' ) . '</small>', $field ) ); ?></label>
				<div class="field <?php echo $field['required'] ? 'required-field' : ''; ?>">
					<?php get_job_manager_template( 'form-fields/' . $field['type'] . '-field.php', [ 'key' => $key, 'field' => $field ] ); ?>
				</div>
			</fieldset>
		<?php endforeach; ?>

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

	</form>

<?php } ?>	