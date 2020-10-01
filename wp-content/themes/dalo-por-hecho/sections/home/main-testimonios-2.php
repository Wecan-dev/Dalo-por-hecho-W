	<!-- testimonios 2 -->
	<section id="testimonios" class="container-fluid">
		<div class=" bg-testimonios">
			<div class=" titulo-general text-center">
				<p>Testimonios de nuestros usuarios</p>
				
			</div>
			<div class="main-testimonio ">
				<div class="main-testimonios2__content">
                <?php $i=0;
                  $args = array (
                     'post_type' => 'testimonios',
                     'posts_per_page' => 10000,
                     'post_status' => 'publish'
                  ); 
                $loop = new WP_Query( $args ); 
                while ( $loop->have_posts() ) : $loop->the_post(); ?>				
					<div class="main-testimonios__item">
						<div class="content-tetimonios">
							<div class="row">
								<div class="col-md-2">
									<img src="<?php the_field('imagen_perfil_testimonios') ?>" alt="">
								</div>
								<div class="col-md-10 mb-2 text-justify">
									<p class="name"><?php the_field('name_testimonios') ?></p>
									<span><?php the_field('especialidad_testimonios') ?></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p><?php the_field('contenido_testimonios') ?></p>
								</div>
							</div>
						</div>
					</div>
			    <?php endwhile; ?>
				</div>
			</div>
		</div>
    </section>
 <!-- <div class="card step-progress">
  <?php global $current_user, $wp_roles;?>
    <div class="step-slider">
      <div data-id="step1" class="step-slider-item"></div>
      <div data-id="step2" class="step-slider-item"></div>
      <div data-id="step3" class="step-slider-item"></div>
    </div>
    <form action="<?php echo esc_url( $action ); ?>" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">
      <div class="step-content">
        <div id="step1" class="step-content-body">
        <h4 class="text-center">¿Que necesitas hacer?</h4>

          <div class="start">
            <label for="">Colocale título a tu tarea</label>
            <input type="hidden" id="_wpjm_nonce" name="_wpjm_nonce" value="1ec4662030"><input type="hidden" name="_wp_http_referer" value="/Dalo-por-hecho-W/post-a-job/">

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
              placeholder="Ej, vivo en el 5 piso , no puedo cargar peso por asuntos medicos"></textarea>
          </div>
        </div>
        <div id="step2" class="step-content-body out">
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
        </div>
        <div id="step3" class="step-content-body out">

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
        </div>
      
        <div id="stepLast" class="step-content-body out">

          <h4 class="text-center ">Completado</h4>

          <div class="text-center">
            <img class="mb-3" src="<?php echo get_template_directory_uri();?>/assets/img/Grupo 666.png" alt="">
            <label for="">Ya puedes dar por hecho tu tarea</label> <br>
            <span>Espera a que la comunidad realice sus ofertas para
              escoger</span>
          </div>
        </div>
        <div class="step-content-foot">
          <button type="button" class="active" name="prev">Prev</button>
          <button type="button" class="active" name="next">Next</button>
          <button type="button" class="active out" name="finish">Finalizar</button>
        </div>
      </div>
    </form>
</div>

<style>
  .card {
  position: relative;
  margin-bottom: 24px;
  background-color: #fff;
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
}

.step-progress {
  padding: 16px;
  background-color: #FAFAFA;
  margin: 0 auto;
}

.step-progress .step-slider {
  width: 100%;
}

.step-progress .step-slider .step-slider-item {
  width: 33%;
  height: 1px;
  position: relative;
  float: left;
  background-color: #E0E0E0;
}

.step-progress .step-slider .step-slider-item:after {
  content: "";
  width: 10px;
  height: 10px;
  position: absolute;
  top: -6px;
  right: 0;
  background-color: #FAFAFA;
  border: 1px solid #E0E0E0;
  border-radius: 50%;
  z-index: 2;
  transition: all 0.3s ease-out 0.5s;
  -webkit-transition: all 0.3s ease-out 0.5s;
}

.step-progress .step-slider .step-slider-item:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 0%;
  height: 1px;
  background-color: #B0BEC5;
  z-index: 1;
  -webkit-transition: all 0.5s ease-out;
}

.step-progress .step-slider .step-slider-item.active:before {
  width: 100%;
  background-color: #FF8F00;
}

.step-progress .step-slider .step-slider-item.active:after {
  border-color: #FF8F00;
}

.step-content {
  padding: 16px 0;
}

.step-content .step-content-foot {
  text-align: right;
}

.step-content .step-content-foot button {
  border: 0;
  padding: 8px 16px;
  background-color: #CFD8DC;
  font-size: 14px;
  border-radius: 3px;
  outline: 0;
}

.step-content .step-content-foot button:active {
  background-color: rgba(255, 255, 255, 0.2);
}

.step-content .step-content-foot button.out {
  display: none;
}

.step-content .step-content-foot button.disable {
  background-color: #ECEFF1;
}

.step-content .step-content-foot button.active {
  background-color: #00ACC1;
  color: white;
}

.step-content .step-content-body {
  padding: 16px 0;
  text-align: center;
  font-size: 18px;
}

.step-content .step-content-body.out {
  display: none;
}
</style>

<script>
  // see https://css-tricks.com/forums/topic/back-button-on-multistep-form/
$(function() {
  var step = 0;
  var stepItem = $('.step-progress .step-slider .step-slider-item');

  $('.step-content .step-content-foot button[name="prev"]').addClass('out');
  
  // Step Next
  $('.step-content .step-content-foot button[name="next"]').on('click', function() {
    var instance = $(this);
    if (stepItem.length - 1 < step) {
      return;
    }
    $('.step-content .step-content-foot button[name="prev"]').removeClass('out');
    if (step == (stepItem.length - 2)) {
      instance.addClass('out');
      instance.siblings('button[name="finish"]').removeClass('out');
    }
    $(stepItem[step]).addClass('active');
    $('.step-content-body').addClass('out');
    step++;
    $('#' + stepItem[step].dataset.id).removeClass('out');
  });

  // Step Last
  $('.step-content .step-content-foot button[name="finish"]').on('click', function() {
    if (step == stepItem.length) {
      return;
    }
    $(stepItem[stepItem.length - 1]).addClass('active');
    $('.step-content-body').addClass('out');
    $('#stepLast').removeClass('out');
    step++;
  });

  // Step Previous
  $('.step-content .step-content-foot button[name="prev"]').on('click', function() {
    if (step - 1 < 0) {
      return;
    }
    step--;
    var instance = $(this);
    if (step <= (stepItem.length - 1)) {
      instance.siblings('button[name="next"]').removeClass('out');
      instance.siblings('button[name="finish"]').addClass('out');
    }
    $('.step-content-body').addClass('out');
    $('#' + stepItem[step].dataset.id).removeClass('out');
    if (step === 0) {
      stepItem.removeClass('active');
    } else {
      stepItem.filter(':gt(' + (step - 1) + ')').removeClass('active');
    }
    if (step - 1 < 0) {
      $('.step-content .step-content-foot button[name="prev"]').addClass('out');
    }
  });
});

</script>
-->