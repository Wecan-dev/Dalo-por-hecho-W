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
											<div class="tab-content" id="main_form">
												<div class="tab-pane active" role="tabpanel" id="step1">
													<h4 class="text-center">¿Que necesitas hacer?</h4>

													<div class="start">
														<label for="">Colocale título a tu tarea</label>
														<input type="text" name="fname"
															placeholder="Ej, cargar maletas en edificio" />
													</div>
													<div class="form-group start">
														<label for="exampleFormControlSelect1">Categorías</label>
														<select class="form-control" id="exampleFormControlSelect1">
															<option>Seleccionar</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>
														</select>
													</div>
													<div class="form-group start">
														<label for="exampleFormControlTextarea1">Cuales son
															los
															detalles de la
															tarea</label>
														<textarea class="form-control" id="exampleFormControlTextarea1"
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
															<div class="col-md-6 step-content ">
																<p class="p-0 m-0 color-blue"><i
																		class="fa fa-map-marker" aria-hidden="true"></i>
																	En persona </p>
																<span>Lorem ipsum dolor sit amet consectetur
																</span>
															</div>
															<div class="col-md-6 step-content">
																<p class="p-0 m-0 "> <i class="fa fa-globe"
																		aria-hidden="true"></i>
																	En linea </p>
																<span>Lorem ipsum dolor sit amet consectetur
																</span>
															</div>
														</div>
													</div>
													<div class="form-group start">
														<select class="form-control" id="exampleFormControlSelect1">
															<option>Selecciona tu región</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>
														</select>
													</div>
													<div class="row mb-3">
														<div class="col-md-6">

															<input type="text" name="fname" placeholder="Ciudad" />
														</div>
														<div class="col-md-6">

															<input type="text" name="fname" placeholder="Comuna" />
														</div>
													</div>
													<div class="form-group start">
														<input type="text" name="fname"
															placeholder="Dirección y numero" />

													</div>
													<div class="start">
														<label for="">Cuando necesitas las tareas?</label>
														<input type="text" name="fname"
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

															<input type="text" name="fname" placeholder="CLP" />
														</div>
														<div class="col-md-6">

															<input type="text" name="fname" placeholder="Horas" />
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
															<div
																class="col-md-4 d-flex justify-content-center align-items-center">
																<p>00</p>
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
														<li class="btn-line mt-4"><button type="button"
																class="default-btn next-step">Siguiente</button></li>
													</ul>
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
		</div>
	</div>