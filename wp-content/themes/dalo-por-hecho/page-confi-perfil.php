<?php if(is_user_logged_in() == NULL)
{ 
  header('Location: '.get_home_url().'');
}?>
    <div class="container perfil m-110">
        <section>
<?php
echo $answer= $_POST["first-name"];

/* Get user info. */
global $current_user, $wp_roles;
//get_currentuserinfo(); //deprecated since 3.1

/* Load the registration file. */
//require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
$error = array();    
/* If profile was saved, update profile. */

$cont1 = 0; $cont2 = 0; $cont3 = 0; $cont4 = 0; $cont5 = 0; $cont6 = 0; $cont7 = 0; $cont8 = 0;
if ( have_posts() ) : while ( have_posts() ) : the_post(); 
if (meta_user_value( 'email', $current_user->ID ) != NULL) $cont1 = $cont1 +1;
if (meta_user_value( 'first_name', $current_user->ID ) != NULL) $cont2 = $cont2 +1;
if (meta_user_value( 'last_name', $current_user->ID ) != NULL) $cont3 = $cont3 +1;
if (meta_user_value( 'description', $current_user->ID ) != NULL) $cont4 = $cont4 +1;
if (meta_user_value( 'direccion_user', $current_user->ID ) != NULL) $cont5 = $cont5 +1;
if (meta_user_value( 'frase_user', $current_user->ID ) != NULL) $cont6 = $cont6 +1;
if (meta_user_value( 'fecha_nac_user', $current_user->ID ) != NULL) $cont7 = $cont7 +1;
if (meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) != NULL) $cont8 = $cont8 +1;

$porcent = (($cont1 + $cont2 + $cont3 + $cont4 + $cont5 + $cont6 + $cont7 + $cont8)/8)*100;

$user_actual = $current_user->ID;  

if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) { ?>

<?php
    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] )
            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        else
            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    }

    /* Update user information. */
    if ( !empty( $_POST['url'] ) )
        wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['url'] ) ) );
    if ( !empty( $_POST['email'] ) ){
        if (!is_email(esc_attr( $_POST['email'] )))
            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->id )
            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
        else{
            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
        }
    }


    if ( !empty( $_POST['first-name'] ) )        
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );    
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
    if ( !empty( $_POST['description'] ) ) 
        update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );

    if ( !empty( $_POST['direccion_user'] ) )
        update_user_meta( $current_user->ID, 'direccion_user', esc_attr( $_POST['direccion_user'] ) );
    if ( !empty( $_POST['frase_user'] ) )
       update_user_meta( $current_user->ID, 'frase_user', esc_attr( $_POST['frase_user'] ) ); 
    if ( !empty( $_POST['fecha_nac_user'] ) )
       update_user_meta( $current_user->ID, 'fecha_nac_user', esc_attr( $_POST['fecha_nac_user'] ) ); 
    if ( !empty( $_POST['user_registration_radio_1600171615'] ) )
       update_user_meta( $current_user->ID, 'user_registration_radio_1600171615', esc_attr( $_POST['user_registration_radio_1600171615'] ) );          
        


    /* Redirect so the page will show updated info.*/
  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect( get_permalink() );
        exit;
    }
}




 get_header();?>
 
            <div class="container vertical-tabs">
                <div class="row">
                    <div class="col-md-3 content-barra-lateral">
                        <div class="perfil-content">
                           <?php if (is_user_logged_in()){ echo get_avatar( $current_user->user_email, 165 );  }?> 
                            <p class="mt-3 mb-4"><?php the_author_meta( 'first_name', $current_user->ID ); ?></p>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab"
                            aria-controls="v-pills-history" aria-selected="false">Hitorial de pagos</a>

                            <a class="nav-link" id="v-pills-method-tab" data-toggle="pill" href="#v-pills-method"
                                role="tab" aria-controls="v-pills-method" aria-selected="false">Método de pago</a>

                           <a class="nav-link" id="v-pills-bancario-tab" data-toggle="pill" href="#v-pills-bancario"
                                role="tab" aria-controls="v-pills-bancario" aria-selected="false">Método de pago</a>                                

                            <a class="nav-link" id="v-pills-recomendar-tab" data-toggle="pill" href="#v-pills-recomendar"
                            role="tab" aria-controls="v-pills-recomendar" aria-selected="false">Recomendar a un
                            amigo</a>

                            <a class="nav-link " id="v-pills-conf-tab" data-toggle="pill" href="#v-pills-conf" role="tab"
                                aria-controls="v-pills-three" aria-selected="false">Configuración de cuenta</a>

                            <a class="nav-link " id="v-pills-aptitudes-tab" data-toggle="pill" href="#v-pills-aptitudes"
                            role="tab" aria-controls="v-pills-aptitudes" aria-selected="true">Mis aptitudes</a>

                            <a class="nav-link" id="v-pills-emblemas-tab" data-toggle="pill" href="#v-pills-emblemas" role="tab"
                                aria-controls="v-pills-three" aria-selected="false">Mis emblemas</a>                                
                        
                            <a class="nav-link" id="v-pills-senales-tab" data-toggle="pill" href="#v-pills-senales" role="tab"
                                aria-controls="v-pills-three" aria-selected="false">Señales de tareas</a>

                            <?php if( meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Publicar Tareas" ){ ?>
                            <a class="nav-link" id="v-pills-tareas-tab" data-toggle="pill" href="#v-pills-tareas" role="tab"
                                aria-controls="v-pills-three" aria-selected="false">Tareas Publicadas</a>                               
                            <?php } ?>  

                            <?php if( meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Publicar Tareas" ){ ?>
                            <a class="nav-link" id="v-pills-notification-tab" data-toggle="pill" href="#v-pills-notification" role="tab"
                                aria-controls="v-pills-three" aria-selected="false">Notificaciones</a>                               
                            <?php } ?>                             
                            <a href="<?php echo wp_logout_url( home_url()); ?>" class="nav-link" 
                                 aria-selected="false">Salir</a>   
                                

                        </div>
                    </div>
                    <div class="col-md-8 main-content__tabs">
                        <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade " id="v-pills-notification" role="tabpanel"
                                aria-labelledby="v-pills-tareas-tab">
                                <div id="accordion" role="tablist">
                                    <div class="card">
                                        <div class="card-header top-headline" role="tab" id="headingOne">
                                            <h5>
                                                
                                                   Notificaciones

                                            
                                            </h5>
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

                                                    <?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 );?> 
                                                    <div class="flex ml-3">
                                                        <span><?php echo meta_user_value( 'first_name',  get_the_author_meta( 'ID' ) ); ?></span>
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
                                                  }
                                                  ?> 
                                                  
                                                  <script>
                                                    $(document).ready(function() {
                                                        var array_note = "<?= $var_array ?>"; 
                                                       // $("textarea#w3mission").val(array_note);
                                                        //$('textarea#w3mission').prop('hidden', true);
                                                    }); 
                                                </script>    

                                                    <a href="">Mostrar menos </a>                                                   
                                                    <?php if (is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Publicar Tareas" && $user_actual == $user_tarea ){ 
                                                        ?>
                                                        <a href="" class="ml-auto" data-toggle="modal" data-target="#modal_donation" onclick="function_donation('<?php echo get_field('ofertar_monto_tarea') ?>','<?php echo $var_array ?>');"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Responder oferta</a> 
                                                    <?php } ?> 

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

                            <div class="tab-pane fade " id="v-pills-tareas" role="tabpanel"
                                aria-labelledby="v-pills-tareas-tab">
                                <div id="accordion" role="tablist">
                                    <div class="card">
                                        <div class="card-header top-headline" role="tab" id="headingOne">
                                            <h5>
                                                
                                                    <?php echo do_shortcode('[job_dashboard]');  ?>

                                            
                                            </h5>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade " id="v-pills-aptitudes" role="tabpanel"
                                aria-labelledby="v-pills-aptitudes-tab">
                                <div id="accordion" role="tablist">
                                    <div class="card">
                                        <div class="card-header top-headline" role="tab" id="headingOne">
                                            <h5>
                                                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    Mis aptitudes
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show mb-5" role="tabpanel"
                                            aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet
                                                    esse dolorem eligendi dolor assumenda dignissimos, quis laudantium
                                                </p>

                                                <div class="form mb-4">
                                                    <label for="">A que te dedicas</label>
                                                    <input type="text" name="fname"
                                                        placeholder="Coloca tus aptitudes separadas por una ," />
                                                </div>
                                                <div class="form">
                                                    <p>Indica tu medio de transporte</p>
                                                    <div class="col-md-12 check-line">
                                                        <div class="custom-control custom-checkbox">
                                                            <label class="custom-control-label" for="customCheck1">
                                                                En linea</label>
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck1" checked>

                                                        </div>

                                                        <div class="custom-control custom-checkbox">
                                                            <label class="custom-control-label" for="customCheck2">
                                                                Caminando</label>
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck2">

                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <label class="custom-control-label" for="customCheck3">
                                                                Bicicleta</label>
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck3">

                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <label class="custom-control-label" for="customCheck4">
                                                                Carro</label>
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck4">

                                                        </div>
                                                    </div>
                                                    <div class="form mb-4">
                                                        <label for="">Cuales idioma maneja?</label>
                                                        <input type="text" name="fname" placeholder="Cuales idiomas" />
                                                    </div>

                                                    <div class="form mb-4">
                                                        <label for="">Certificaciones</label>
                                                        <input type="text" name="fname"
                                                            placeholder="Coloca tus aptitudes" />
                                                    </div>

                                                    <div class="form mb-4">
                                                        <label for="">Mi experiencia</label>
                                                        <input type="text" name="fname"
                                                            placeholder="Donde ha trabajado y el tiempo" />
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="" class="btn-custom-bg  mb-5">Guardar cambios</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-history" role="tabpanel"
                                aria-labelledby="v-pills-history-tab">
                                <?php $pf = 0;
                                 $pedidos = get_posts( array(
                                    'numberposts' => -1,
                                    'meta_key'    => '_customer_user',
                                    'meta_value'  => get_current_user_id(),
                                    'post_type'   => wc_get_order_types(),
                                    'post_status' => "wc-completed",

                                    ) );
                                    foreach ($pedidos as $pedido)
                                    {
                                        $wp_pedido = new WC_Order($pedido->ID);
                                        $cant_pedidos = $cant_pedidos +1;
                                        $gastado = $gastado + $wp_pedido->discount_total;
                                        if ($pf < 1) {
                                            $primera_fecha = $wp_pedido->date_created; 
                                        }
                                        $ultima_fecha = $wp_pedido->date_created;
                                        $pf = $pf + 1;
                                    }
                                    $trans = "".$cant_pedidos." transacciones del ".date_order_new($primera_fecha)." al ".date_order_new($ultima_fecha).""; 
                                    
                                 ?>
                                <div class="content-metodos-pago">
                                    <h5>Historial de pagos</h5>

                                    <div class="container mt-3">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs h-p-nav-tab">
                                            <li class="nav-item">
                                                <a class="nav-link historial-pago-tab active" data-toggle="tab"
                                                    href="#ganado">Ganado</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link historial-pago-tab" data-toggle="tab"
                                                    href="#saliente">Saliente</a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div id="ganado" class="container tab-pane active"><br>
                                                <div class="cont-pago-estado">
                                                    <div class="cont-pago-estado-tab">
                                                        <p>Demostración g</p>
                                                        <div class="cont-pago-estado-form">
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn-d-estado-p dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                    Tiempo
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">Link 1</a>
                                                                    <a class="dropdown-item" href="#">Link 2</a>
                                                                    <a class="dropdown-item" href="#">Link 3</a>
                                                                </div>
                                                            </div>
                                                            <!-- <input class="cont-pago-estado-form_input dropdown-toggle" type="text" placeholder="tiempo"> -->
                                                            <h6>De</h6>
                                                            <input class="cont-pago-estado-form_input" type="date">
                                                            <h6>A</h6>
                                                            <input class="cont-pago-estado-form_input" type="date">
                                                            <div class="cont-pago-estado-form-ganado">
                                                                <h5>Ganado neto</h5>
                                                                <p>000 $</p>
                                                            </div>
                                                        </div>
                                                        <small>1 transacciones del 07 de noviembre del 2020 al 30 de
                                                            noviembre del 2020</small>
                                                        <div class="tabla-pagos">
                                                            <table class="tabla-pagos_table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Fecha de la tarea</th>
                                                                        <th>Nombre de la tarea</th>
                                                                        <th>Valoración dada</th>
                                                                        <th>Pago realizado</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php if ($recibir_pagos != NULL) { ?>

                                                                    <tr>
                                                                        <td class="tabla-pagos_table_td">
                                                                            <p>07/11/20</p>
                                                                        </td>
                                                                        <td class="tabla-pagos_table_td">
                                                                            <p>Ayuda para cargar mobiliario</p>
                                                                        </td>
                                                                        <td class="tabla-pagos_table_td">
                                                                            <p>
                                                                            <div class="tabla-pagos_table-valoracion">
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-g">
                                                                                </div>
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-n">
                                                                                </div>
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-n">
                                                                                </div>
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-n">
                                                                                </div>
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-n">
                                                                                </div>

                                                                            </div>
                                                                            </p>
                                                                        </td>
                                                                        <td class="tabla-pagos_table_td">
                                                                            <p class="n-m">$ 20.000</p>
                                                                        </td>
                                                                    </tr>
                                                                 <?php } ?>   
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="saliente" class="container tab-pane  fade"><br>
                                                <div class="cont-pago-estado">
                                                    <div class="cont-pago-estado-tab">
                                                        <p>Demostración s</p>
                                                        <div class="cont-pago-estado-form">
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn-d-estado-p dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                    Tiempo
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">Link 1</a>
                                                                    <a class="dropdown-item" href="#">Link 2</a>
                                                                    <a class="dropdown-item" href="#">Link 3</a>
                                                                </div>
                                                            </div>
                                                            <!-- <input class="cont-pago-estado-form_input dropdown-toggle" type="text" placeholder="tiempo"> -->
                                                            <h6>De</h6>
                                                            <input class="cont-pago-estado-form_input" type="date">
                                                            <h6>A</h6>
                                                            <input class="cont-pago-estado-form_input" type="date">
                                                            <div class="cont-pago-estado-form-ganado">
                                                                <h5>Gastado neto</h5>
                                                                <p><?php echo $gastado ?> $</p>
                                                            </div>
                                                        </div>
                                                        <small><?php echo $trans ?> </small>
                                                        <div class="tabla-pagos">
                                                            <table class="tabla-pagos_table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Fecha de la tarea</th>
                                                                        <th>Nombre de la tarea</th>
                                                                        <th>Valoración dada</th>
                                                                        <th>Pago realizado</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>                                                                  
                                                                    <?php
                                                                    foreach ($pedidos as $pedido)
                                                                    {
                                                                       $wp_pedido = new WC_Order($pedido->ID);?>
                                                                        <tr>
                                                                            <td class="tabla-pagos_table_td">
                                                                                <p><?php echo date("d/m/y",strtotime(get_post($sinparametros[3])->post_date));?></p>
                                                                            </td>
                                                                            <td class="tabla-pagos_table_td">
                                                                                <p><?php echo descrypt_note(order_itemmeta('Description', $wp_pedido->id),'name_tarea') ?></p>
                                                                            </td>
                                                                            <td class="tabla-pagos_table_td">
                                                                                <p>
                                                                                <div class="tabla-pagos_table-valoracion">
                                                                                    <div
                                                                                        class="tabla-pagos_table-valoracion-div-g">
                                                                                    </div>
                                                                                    <div
                                                                                        class="tabla-pagos_table-valoracion-div-n">
                                                                                    </div>
                                                                                    <div
                                                                                        class="tabla-pagos_table-valoracion-div-n">
                                                                                    </div>
                                                                                    <div
                                                                                        class="tabla-pagos_table-valoracion-div-n">
                                                                                    </div>
                                                                                    <div
                                                                                        class="tabla-pagos_table-valoracion-div-n">
                                                                                    </div>

                                                                                </div>
                                                                                </p>
                                                                            </td>
                                                                            <td class="tabla-pagos_table_td">
                                                                                <p class="n-m">$ <?php if ($wp_pedido->discount_total > 0){echo $wp_pedido->discount_total;}else{ echo "000";} ?></p>
                                                                            </td>
                                                                        </tr>                                                                       

                                                                   <?php } ?>                                                        

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-method" role="tabpanel"
                                aria-labelledby="v-pills-method-tab">
                                <p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur
                                    elit id
                                    dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum
                                    duis
                                    aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi
                                    id do
                                    Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in
                                    aute
                                    tempor commodo eiusmod.
                                </p>
                            </div>
                          <div class="tab-pane fade" id="v-pills-bancario" role="tabpanel"
                                aria-labelledby="v-pills-bancario-tab">
                                <p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur
                                    elit id
                                    dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum
                                    duis
                                    aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi
                                    id do
                                    Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in
                                    aute
                                    tempor commodo eiusmod.
                                </p>
                            </div>                            

                            
                            <div class="tab-pane fade" id="v-pills-recomendar" role="tabpanel"
                                aria-labelledby="v-pills-three-tab">
                                <div class="content-recomendar-amigo">
                                    <h5>Recomendar a un amigo</h5>
                                    <div class="content-recomendar-amigo-creditos">
                                        <div class="content-recomendar-amigo-creditos-inf">
                                            <h4>Obtenga créditos invitando amigos</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor
                                                sit amet consectetur adipisicing elit.</p>
                                            <div class="recomendar-link">
                                                <div class="recomendar-link-copiar">
                                                    <input type="text" placeholder="http://www.daloporhecho.com/nombreuser-2020">
                                                </div>
                                                <div class="recomendar-link_a">
                                                    <a class="btn-a-dl" href="#">Copiar link</a>
                                                </div>

                                            </div>
                                            <div class="compartir-en-rs">
                                                <p>Compartir en redes sociales</p>
                                                <div class="redes-sociales-crs">
                                                    <div class="div-rs"></div>
                                                    <div class="div-rs"></div>
                                                    <div class="div-rs"></div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="recomendar-funcionamiento">
                                        <h4>Como funcionan las referencias</h4>
                                        <div class="container">
                                            <div class="row recomendar-funcionamiento_row">
                                                <div class="col-md-4 col-sm-6 recomendar-funcionamiento-col">
                                                    <div class="recomendar-funcionamiento-num">1</div>
                                                    <h6>Invita a tus amigos</h6>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus
                                                        fuga magni</p>
                                                </div>
                                                <div class="col-md-4 col-sm-6 recomendar-funcionamiento-col">
                                                    <div class="recomendar-funcionamiento-num">2</div>
                                                    <h6>Debe realizar su primera tarea</h6>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus
                                                        fuga magni</p>
                                                </div>
                                                <div class="col-md-4 col-sm-6 recomendar-funcionamiento-col">
                                                    <div class="recomendar-funcionamiento-num">3</div>
                                                    <h6>Obten $ 10 de credito</h6>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus
                                                        fuga magni</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="v-pills-conf" role="tabpanel" aria-labelledby="v-pills-conf-tab">
                                <div id="post-<?php the_ID(); ?>">
                                    <div class="entry-content entry">
                                        <?php the_content(); ?>
                                        <?php if ( !is_user_logged_in() ) : ?>
                                                <p class="warning">
                                                    <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
                                                </p><!-- .warning -->
                                        <?php else : ?>
                                        <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>                                
                                            <div class="card">
                                                <div class="card-header top-headline" role="tab" id="headingOne">
                                                    <h5>
                                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            <div class="cont-top-conf-cuenta">
                                                                <div class="cont-top-conf-cuenta_h4">
                                                                    Cuenta <?php $urlsinparametros= explode('=', $_SERVER['REQUEST_URI'], 2);
$urlsin = $urlsinparametros[1];
echo $_SERVER['REQUEST_URI'];
 ?>
                                                                </div>
                                                                <div class="barra-progreso">
                                                                    <h6>Completa tu perfil para mejorar tus oportunidades de trabajo
                                                                    </h6>
                                                                    <br>
                                                                    <div class="cont-barra-progreso">

                                                                        <div class="progress">
                                                                            <div class="progress-bar" style="width:<?php echo $porcent; ?>%"></div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show mb-5" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="cont-img-conf-cuenta">
                                                        <?php                   
                                                        //if (is_user_logged_in()){
                                                           //echo get_avatar( $current_user->user_email, 100 ); 
                                                        //}?> 
                                                        <?php echo do_shortcode('[user_profile_avatar_upload]');  ?>
                                                         <div class="cont-img-conf-cuenta_a">
                                                            <a class="ver-perfil-publico" href="perfil.html">Ver tu perfil publico</a>
                                                        </div>
                                                    </div>
                                                    <div class="cont-inf-conf-cuenta">
                                                        <h6>Mejora tu perfil y has mas atractivo tu feed?></h6>
                                                        <div class="row cont-row-form">
                                                            <div class="subir-foto col-md-6">
                                                               <?php if(meta_value_img_frm($current_user->ID,7) == NULL){ ?>
                                                                   <h6>Subir foto de portada</h6>
                                                                <?php }else{ ?>   
                                                                    <img src="<?php echo meta_value_img_frm($current_user->ID,7); ?>"> 
                                                                <?php } ?>                                                    
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h6>Subir foto de portada</h6>
                                                                <?php echo do_shortcode('[frm-set-get id_user='.$current_user->ID.'][formidable id=7]');  ?>
                                                            </div>  
                                                        </div>                                          
                                                    </div>
                                                    <div class="form-conf-cuenta">
                                                        <form method="post" id="adduser" action="<?php echo get_home_url(); ?>/confi-perfil/">                                        
                                                            <div class="row cont-row-form">
                                                                <div class="col-md-6">
                                                                    <input class="form-control" placeholder="Nombre y Apellido" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input class="form-control" placeholder="Dirección" name="direccion_user" type="text" id="direccion_user" value="<?php the_author_meta( 'direccion_user', $current_user->ID ); ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="row cont-row-form">
                                                                <div class="col-md-6">
                                                                    <input class="form-control" placeholder="Escribe tu frase" name="frase_user" type="text" id="frase_user" value="<?php the_author_meta( 'frase_user', $current_user->ID ); ?>" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="email" class="form-control" id="email"
                                                            placeholder="Enter email" name="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
                                                                </div>
                                                            </div>                                           
                                                            <h6>Fecha de cumpleaños </h6>
                                                            <div class="form-inline cumple">
                                                                <input type="text" class="form-control" placeholder="DD" name="dia" id="dia" maxlength="2" value="<?php if (meta_user_value( 'fecha_nac_user', $current_user->ID )!=NULL) {echo date('d', strtotime(meta_user_value( 'fecha_nac_user', $current_user->ID ))); }?>">
                                                                <input type="text" class="form-control" placeholder="MM" name="mes" id="mes" min="1" max="12" maxlength="2" value="<?php if (meta_user_value( 'fecha_nac_user', $current_user->ID )!=NULL) {echo date('m', strtotime(meta_user_value( 'fecha_nac_user', $current_user->ID ))); }?>">
                                                                <input type="text" class="form-control" placeholder="AA" name="ano" id="ano" min="1900" maxlength="4" value="<?php if (meta_user_value( 'fecha_nac_user', $current_user->ID )!=NULL) {echo date('Y', strtotime(meta_user_value( 'fecha_nac_user', $current_user->ID ))); }?>">
                                                                <input type="hidden" class="form-control" id="fecha_nac_user" placeholder="Enter email" name="fecha_nac_user" value="<?php echo meta_user_value( 'fecha_nac_user', $current_user->ID ) ?>" />
                                                            </div>
                                                            <h6>Agrega tu descripción</h6>
                                                            <textarea name="description" id="description" rows="10" cols="30" class="textarea-conf"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
                                                            <h6>Que deseas en DALO POR HECHO </h6>
                                                            <div class="opc-conf-cuenta">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="user_registration_radio_1600171615" id="user_registration_radio_1600171615" value="Publicar Tareas"  <?php if( meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Publicar Tareas" ){ echo 'checked="checked"';} ?>>Publicar Tareas
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="user_registration_radio_1600171615" id="user_registration_radio_1600171615" value="Hacer tareas" <?php if( meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Hacer tareas" ){ echo 'checked="checked"';} ?>>Hacer tareas
                                                                </label>
                                                            </div>
                                                            <div class="cont-boton-cambios">
                                                                <input name="updateuser" type="submit" id="updateuser" class="guardar-cambios" value="Guardar cambios" />
                                                                <?php wp_nonce_field( 'update-user' ) ?>
                                                                <input name="action" type="hidden" id="action" value="update-user" />
                                                                <a class="desactivar-cuenta" href="#">Desactivar cuenta</a>                                             
                                                            </div>
                                                            <?php 
                                                                //action hook for plugin and extra fields
                                                            // do_action('edit_user_profile',$current_user); 
                                                            ?>
                                                        </form><!-- #adduser -->
                                                    </div>    
                                                </div>    
                                            </div>    
                                        <?php endif; ?>
                                        <?php endwhile; ?>
                                        <?php else: ?>
                                        <p class="no-data">
                                            <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
                                        </p><!-- .no-data -->
                                        <?php endif; ?>                                      
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="v-pills-emblemas" role="tabpanel" aria-labelledby="v-pills-emblemas-tab">
                                <div class="card">
                                    <div class="card-header top-headline" role="tab" id="headingOne">
                                        <h5>
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Mis emblemas
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show mb-5" role="tabpanel"
                                        aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="content-inf-emblemas">
                                            <div class="content-inf-emblemas_h3">
                                                <h3>Lorem Ipsum es simplemente el texto de relleno de las imprentas y
                                                    archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar
                                                    de las industrias desde el año 1500, cuando un impresor (N. del T.
                                                    persona que se dedica a la imprenta) desconocido usó una galería de
                                                    textos y los mezcló de tal manera que logró hacer un libro de textos
                                                    especimen. No sólo sobrevivió 500 años, sino que tambien ingresó
                                                    como texto de relleno en documentos electrónicos, quedando
                                                    esencialmente igual al original. Fue popularizado en los 60s con la
                                                    creación de las hojas "Letraset", las cuales contenian pasajes de
                                                    Lorem Ipsum, y más recientemente con software de autoedición,Lorem
                                                    Ipsum.</h3>
                                            </div>
                                            <div class="content-inf-emblemas-cont">
                                                <h2 class="mt-3 mb-3">Emblemas Principales</h2>
                                                <div class="row">
                                                    <div class="col-md-6 content-inf-emblemas-cont_col-6">
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 content-inf-emblemas-cont_col-6">
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="content-inf-emblemas-cont">
                                                <h2 class="mt-3 mb-3">Licencia de emblemas</h2>
                                                <div class="row">
                                                    <div class="col-md-6 content-inf-emblemas-cont_col-6">
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 content-inf-emblemas-cont_col-6">
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-senales" role="tabpanel"
                            aria-labelledby="v-pills-senales-tab">
                            <div class="card">
                                <div class="card-header top-headline" role="tab" id="headingOne">
                                    <h5>
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Señales de Tareas
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show mb-5" role="tabpanel"
                                    aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="content-inf-s-tareas">
                                        <div class="content-inf-s-tareas_h3">
                                            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y
                                                archivos de texto. </p>
                                        </div>

                                        <div class="content-card-s-tareas">
                                            <div class="content-card-s-tareas_icon"><img
                                                    src="<?php echo get_template_directory_uri();?>/assets/img/vistobueno.png" alt=""></div>
                                            <div class="content-card-s-tareas_p">
                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis
                                                    laboriosam molestias</p>
                                            </div>
                                        </div>

                                        <div class="s-personalizada_h3">
                                            <h3>AGREGAR SEÑAL PERSONALIZADA</h3>
                                            <h6>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h6>
                                            <input class="s-personalizada_input" type="text"
                                                placeholder="Limpieza, Mecanico, cocina, etc">
                                            <div class="a-btn-n"><a class=" btn-a-dl" href="#">Agregar Señal</a>
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
        </section>

    </div>


<script type="text/javascript">
$(document).ready(function () {
        $("#ano").keyup(function () {
            var valuea =  document.getElementById("dia").value + "/" + document.getElementById("mes").value + "/" + $(this).val();
            $("#fecha_nac_user").val(valuea);
        });
        $("#dia").keyup(function () {
            var valuea =  $(this).val() + "/" + document.getElementById("mes").value + "/" + document.getElementById("ano").value;
            $("#fecha_nac_user").val(valuea);
        });  
        $("#mes").keyup(function () {
            var valuea =  document.getElementById("dia").value + "/" + $(this).val() + "/" + document.getElementById("ano").value;
            $("#fecha_nac_user").val(valuea);
        }); 

        $(".form-table").html(function(serachreplace, replace) {
            return replace.replace('<p>OR Upload Image</p>', '');
        });

        $(".wp_user_profile_avatar_upload").html(function(serachreplace, replace) {
            return replace.replace('Seleccionadr archivo', 'xxxx');
        });  

        $("#wp_user_profile_avatar_add_button_existing").html(function(serachreplace, replace) {
            return replace.replace('Ningún archivo seleccionado', 'xxxx');
        });               
         
        var tab = "<?= $_GET['tab']; ?>";         
        if (tab == "") {
            $("#v-pills-history-tab").addClass("nav-link active");
            $("#v-pills-history").addClass("tab-pane fade  show active");
        };          
        if (tab != "") {
            $("#v-pills-history-tab").addClass("nav-link");
            $("#v-pills-history").addClass("tab-pane fade");

            $("#v-pills-"+tab+"-tab").addClass("nav-link active show");
            $("#v-pills-"+tab).addClass("tab-pane fade  show active");
        }; 
        
});
//
</script>
<?php get_template_part('sections/home/main-modal-step'); ?>
<?php get_footer(); ?>    