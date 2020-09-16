	<!-- Modal step -->
	<div class="modal fade" id="step" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="signup-step-container">
						<div class="">
							<div class="row d-flex justify-content-center">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div class="col-md-9">

									<div class="wizard">
										<div class="wizard-inner">
											<div class="connecting-line"></div>
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active">
													<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
														aria-expanded="true"><span class="round-tab"></span> <i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
														aria-expanded="false"><span class="round-tab"></span>
														<i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step3" data-toggle="tab" aria-controls="step3"
														role="tab"><span class="round-tab"></span> <i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step4" data-toggle="tab" aria-controls="step4"
														role="tab"><span class="round-tab"></span> <i></i></a>
												</li>
											</ul>
										</div>
										<div role="form" action="index.html" class="login-box">
										<form action="<?php echo esc_url( $action ); ?>" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">
											<div class="tab-content" id="main_form">
												<div class="tab-pane active" role="tabpanel" id="step1">
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
															placeholder="Ej, vivo en el 5 piso , no puedo cargar peo por asuntos medicos"></textarea>
													</div>
													<ul class="list-inline text-center">
														<li class="btn-line"><button type="button"
																class="default-btn next-step">Siguiente</button></li>
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
      <input type="submit" name="submit_job" class="button" value="Preview">
      <input type="submit" name="save_draft" class="button secondary save_draft" value="Save Draft" formnovalidate="">      
														  <button type="button"
																class="default-btn next-step">Siguiente</button></li>
													</ul>
												</div>
											</div>
										</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
$(document).ready(function () {
        $("#job_clp").keyup(function () {
            var valuea =  document.getElementById("job_horas").value*$(this).val();
            $("#job_salary").val(valuea);
        });    
        $("#job_horas").keyup(function () {
            var valuea =  document.getElementById("job_clp").value*$(this).val();
            $("#job_salary").val(valuea);
        })                   
});

	</script>