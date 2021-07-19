<?php global $current_user, $wp_roles; ?>
                <!-- asignados -->
                <div class="tab-pane fade " id="v-pills-asignados" role="tabpanel"
                                aria-labelledby="v-pills-asignados-tab">
                    <div id="accordion" role="tablist">
                        <div class="card">
                            <div class="card-header top-headline" role="tab" id="headingOne">
                                <h5> Tareas Asignadas </h5>
                                <?php 
                                $args = 
                                array(
                                  'post_type' => 'job_listing',
                                  'post_status' => array('publish','draft','expired'),
                                  'author' => $current_user->ID,
                                ); 
                                $loop = new WP_Query( $args ); 
                                while ( $loop->have_posts() ) : $loop->the_post(); $comision = (get_field('ofertar_monto_tarea')*0.10);
                                $user_tarea = get_the_author_meta( 'ID' ); $title_tarea = get_the_title(); $id_tarea = get_the_ID(); $monto_salary = get_post_meta( get_the_ID(), '_job_salary', true ); $email_empleador = get_the_author_meta( 'user_email' );
                                
                                
                                    $a = 0; 
                                    $args3 = array (
                                        'post_type' => 'asignados',
                                        'post_status' =>'publish',
                                        'meta_query' => array(
                                        'relation'=>'AND', // 'AND' 'OR' ...
                                        array(
                                           'key' => 'asignar_id_tarea_publicada',
                                           'value' => get_the_ID(),
                                           'operator' => 'IN',
                                        )),                     
                                    ); 
                                    $loop3 = new WP_Query( $args3 ); 
                                    while ( $loop3->have_posts() ) : $loop3->the_post(); $comision = (get_field('ofertar_monto_tarea')*0.10); ?>
                                        <?php if ($a == 0) {echo '<p class="nav-link active show">'.$title_tarea.'</p>';} ?>
                                        <div class="ofertas_conetnt">
                                            <div class="datos_name">
                                                <div class="row border-n mb-5">
                                                    <div class="col-md-12">
                                                        <div class="ofertas_titulos mb-3">
                                                            <a title="Perfil usuario" href="perfil?post=<?= get_the_author_meta( 'ID' ) ?>">
                                                                <?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 );?> 
                                                            </a> 
                                                            <div class="flex ml-3">
                                                                 <span><a title="Perfil usuario" href="perfil?post=<?= get_the_author_meta( 'ID' ) ?>"><?php echo meta_user_value( 'first_name',  get_the_author_meta( 'ID' ) ); ?></a></span>
                                                                 <div>
                                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                                 <!-- <p>5.0 (3)</p> -->
                                                                 </div>
                                                            </div>
                                                            <p class="ml-auto"><?php the_job_publish_date_postu(); ?> </p>
                                                        </div>
                                                        <p><?php the_field('ofertar_message_empleado'); ?></p>
                                                        <div class="cube mb-4"> 
                                                           <p>$ <?php the_field('asignar_monto_tarea');  ?></p>
                                                        </div>
                                                        <?php if ( $_GET['masig'] == 'save' ) {  ?>         
                                                            <div class="woocommerce-notices-wrapper">
                                                               <div class="woocommerce-message" role="alert">
                                                                   “Sus datos han sido guardados correctamente.
                                                               </div> 
                                                            </div>
                                                        <?php } ?>                                                         
                                                        <form method="post" id="adduser" action="<?php echo get_home_url(); ?>/save"
                                                            <label for="male">Estatus Asignacion</label><br>
                                                            <input type="hidden" name="name_form" value="asignados" />
                                                            <?php if (get_field('asignar_status') == "En curso") { ?>
                                                               <input type="radio" id="asignar_status" name="asignar_status" value="En curso" checked="checked">En curso
                                                            <?php }else{ ?>
                                                               <input type="radio" id="asignar_status" name="asignar_status" value="En curso">En curso
                                                           <?php } ?>  
                                                           <?php if (get_field('asignar_status') == "Completado") { ?>  
                                                              <input type="radio" id="asignar_status" name="asignar_status" value="Completado" checked="checked">Completado
                                                           <?php }else{ ?>
                                                              <input type="radio" id="asignar_status" name="asignar_status" value="Completado" >Completado
                                                           <?php } ?>   
                                                             <input type="hidden" id="asignar_id_status" name="asignar_id_status" value="<?php echo get_the_ID() ?>">
                                                            <button type="submit">Cambiar</button>
                                                        </form>
                                                    </div>
                                                 </div>
                                            </div>                                        
                                         </div>   
                                    <?php $a = $a+1; endwhile; ?>  
                                <?php endwhile; ?>        
                            </div>
                        </div>                                
                    </div>
                </div>    