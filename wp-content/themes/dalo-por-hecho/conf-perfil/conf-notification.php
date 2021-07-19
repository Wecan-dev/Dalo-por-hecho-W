<?php global $current_user, $wp_roles; ?>
                <!--tab notificacion -->
                <div class="tab-pane fade " id="v-pills-notification" role="tabpanel" aria-labelledby="v-pills-tareas-tab">
                    <div id="accordion" role="tablist">
                        <div class="card">
                            <div class="card-header top-headline" role="tab" id="headingOne">
                                <h5>  Notificaciones </h5>
                                <?php 
                                $args = 
                                array(
                                  'post_type' => 'job_listing',
                                  'post_status' => array('publish','draft'),
                                  'author' => $current_user->ID,
                                ); 
                                $loop = new WP_Query( $args ); 
                                while ( $loop->have_posts() ) : $loop->the_post(); $comision = (get_field('ofertar_monto_tarea')*0.10);
                                    $user_tarea = get_the_author_meta( 'ID' ); $title_tarea = get_the_title(); $id_tarea = get_the_ID(); $monto_salary = get_post_meta( get_the_ID(), '_job_salary', true ); $email_empleador = get_the_author_meta( 'user_email' );
                                
                                
                                    $a = 0;
                                    $args3 = array (
                                        'post_type' => 'postulados',
                                        'post_status' =>'publish',
                                        'meta_query' => array(
                                        'relation'=>'AND', // 'AND' 'OR' ...
                                        array(
                                           'key' => 'ofertar_id_tarea_publicada',
                                           'value' => get_the_ID(),
                                       '    operator' => 'IN',
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
                                                                <span><a title="Perfil usuario" href="perfil?post=<?= get_the_author_meta( 'ID' ) ?>">   <?php echo meta_user_value( 'first_name',  get_the_author_meta( 'ID' ) ); ?></a>
                                                                </span>
                                                                <div>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <!-- <p>5.0 (3)</p> -->
                                                                </div>
                                                            </div>
                                                            <p class="ml-auto"><?php the_job_publish_date_postu(); ?> <?php echo $user_tarea; ?></p>
                                                        </div>
                                                        <p><?php the_field('ofertar_message_empleado'); ?></p>
                                                        <div class="cube mb-4"> 
                                                            <p>$ <?php the_field('ofertar_monto_tarea'); ?></p>
                                                        </div>
                                                        <div class="respnse">
                                                            <?php $var_array ="Tarea Publicada: ".$title_tarea."<br>ID Tarea: ".$id_tarea."<br>Usuario Postulado: ".meta_user_value( 'first_name',  get_the_author_meta( 'ID' ) )."<br>ID Postulado: ".get_the_author_meta( 'ID' )."<br>Monto Ofertado: $".get_field('ofertar_monto_tarea')."<br>Porcentaje Comisión: $".$comision."<br>ID Postulación: ".get_the_ID().""; ?>
                                                            <?php                                                   

                                                            $value_var_array = str_replace("<br>",":",$var_array); 
                                                            $sinparametros= explode(':', $value_var_array, 14);
                                                            if ($sinparametros[3] =="124") {
                                                                '<p>'.$sinparametros[3].'</p>';
                                                            } ?> 
                                                  
                                                           <script>
                                                               $(document).ready(function() {
                                                               var array_note = "<?= $var_array ?>"; 
                                                               // $("textarea#w3mission").val(array_note);
                                                               //$('textarea#w3mission').prop('hidden', true);
                                                               }); 
                                                            </script>    
                                                            <a href="">Mostrar menos</a>                     
                                                            <?php if (is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Publicar Tareas" && $user_actual == $user_tarea )
                                                            { 
                                                                $codigo_unico = get_the_author_meta( 'ID' )."".$id_tarea;
                                                                $codigo_unico = str_replace(' ', '', $codigo_unico); ?>
                                                                <?php if (post_asignados($current_user->ID,$codigo_unico,get_the_author_meta( 'ID' )) == 1) 
                                                                { ?>
                                                                <div class="ml-auto">
                                                                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>Oferta respondida
                                                                </div>
                                                                <?php }
                                                                else{ ?>
                                                                   <a href="" class="ml-auto" data-toggle="modal" data-target="#modal_donation" onclick="function_donation('<?php echo get_field('ofertar_monto_tarea') ?>','<?php echo $var_array ?>'), show_data('<?php echo get_field('ofertar_monto_tarea') ?>','<?php echo $var_array ?>','<?php echo $sinparametros[5]; ?>','<?php echo get_post(meta_user_value( '_wpupa_attachment_id', $sinparametros[7] ))->guid; ?>') "><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Responder oferta</a> 
                                                               <?php }
                                                            } ?> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="preguntas mb-4">
                                                    <p>Preguntas (0)</p>
                                                    <textarea name="" id="" cols="37" rows="5" placeholder="Hacer preguntas"></textarea>
                                                </div>
                                            </div>
                                        </div>    
                                    <?php $a = $a+1; endwhile; ?> 
                                <?php endwhile; ?>            
                            </div>                                
                        </div>
                    </div>
                </div>                                            