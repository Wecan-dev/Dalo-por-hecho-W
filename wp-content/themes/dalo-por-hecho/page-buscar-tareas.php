<?php
/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.27.0
 */
get_header();
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

global $post, $current_user, $wp_roles;

$job_salary   = get_post_meta( get_the_ID(), '_job_salary', true );
$job_featured = get_post_meta( get_the_ID(), '_featured', true );
$company_name = get_post_meta( get_the_ID(), '_company_name', true );
$al=str_replace("%2C%20", ", ", $_GET["location"]);
$args = arg($_GET["cat"],$_GET["tax"],$_GET["search"],$_GET["location"]);    

$user_actual = $current_user->ID;  

?>

    <header>
        <div class="nav_bottom ">
            <ul class="navbar-nav container ">
                <li class='nav-item dropdown dowms'>
                    <a href='#' aria-expanded='false' aria-haspopup='true'
                        class='nav-link dropdown-toggle nav-link-black ' data-toggle='dropdown'>
                        Localización
                       
                    </a>
                    <div aria-labelledby='dropdownMenuButton' class='dropdown-menu'>
                        <div class='content-drop'>
                            <a class='dropdown-item' href='#'>
                                <!--<form class="form-inline" method="post" action="#">-->
                                    <div class="input-group input-group-sm">
                                        <input class="search_query form-control" type="text" name="key" id="key" placeholder="Buscar...">
                                    </div>
                                <!--</form>-->
                                <div id="suggestions"></div> 
                            </a>
                        </div>
                    </div>
                </li>
                <li class='nav-item dropdown dowms'>
                    <a href='#' aria-expanded='false' aria-haspopup='true'
                        class='nav-link dropdown-toggle nav-link-black ' data-toggle='dropdown'>
                        Categorías
                    </a>
                    <div aria-labelledby='dropdownMenuButton' class='dropdown-menu'>
                        <div class='content-drop'>
                            <?php
                            global $wpdb;
                            $product_categories = get_categories( array( 'taxonomy' => 'job_listing_category', 'orderby' => 'menu_order', 'order' => 'asc' ));  
                            ?>                                                        
                            <?php foreach($product_categories as $category): ?>
                                <?php $checked =NULL;  if ($category->slug == $_GET['cat']) { $checked = "checked='checked'"; } $categoria = $category->name; $category_id = $category->term_id; $category_link = get_category_link( $category_id ); ?>                 
                                    <a class='dropdown-item' href='<?php echo get_home_url().'/buscar-tareas/?cat='.$category->slug.'&tax=job_listing_category'?>'>
                                        <p><?= $categoria ?></p>
                                    </a>                                         
                                <?php $i=$i+1;?>
                            <?php endforeach; ?>                             
                        </div>
                    </div>
                </li>
                <li class='nav-item dropdown dowms'>
                    <a href='' aria-expanded='false' aria-haspopup='true'
                        class='nav-link dropdown-toggle nav-link-black ' data-toggle='dropdown'>
                       
                    </a>
                    <div aria-labelledby='dropdownMenuButton' class='dropdown-menu'>
                        <div class='content-drop'>

                        </div>
                    </div>
                </li>
                <li class='nav-item dropdown dowms mr-auto'>
                    <a href='' aria-expanded='false' aria-haspopup='true'
                        class='nav-link dropdown-toggle nav-link-black ' data-toggle='dropdown'>
                       
                    </a>
                    <div aria-labelledby='dropdownMenuButton' class='dropdown-menu'>
                        <div class='content-drop'>
 
                        </div>
                    </div>
                </li>
                <form class="form-inline position-relative" method="get">
                    <input class="form-control buscador " type="search" placeholder="Buscar Tarea" aria-label="Search" name="search">
                    <i class="fa fa-search" aria-hidden="true"><button type="submit"></button></i>

                </form>
            </ul>
        </div>
    </header>

    <div class="container buscar_tareas buscar_tareas-t">
        <div class="row">
            <div class="col-lg-4 col-md-12 scroll-admin order-last-xs ">
                <!-- card -->
                      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                       <?php $i=0;
                       $loop = new WP_Query( $args ); 
                       while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>                     
                            <a class="av-link <?php if($i==0){ echo "active";} ?> card-job" id="v-pills-<?php echo get_the_ID();?>-tab" data-toggle="pill" href="#v-pills-<?php echo get_the_ID();?>" role="tab" aria-controls="v-pills-<?php echo get_the_ID();?>" aria-selected="false">
                                <div class="content-tetimonios admin-card">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 text-center">
                                           <?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 );?> 
                                        </div>
                                        <div class="col-md-12 col-lg-9 mb-2">
                                            <p class="name"><?php wpjm_the_job_title(); ?></p>
                                            <span> <?php echo $product_categories = wp_get_post_terms( get_the_ID(), 'job_listing_category' )[0]->name; ?></span>
                                        </div>
                                        <!-- datos -->
                                        <div class="datos">
                                            <div class="">
                                                <ul class="datos_card">
                                                   <li> <img class="icons" src="<?php echo get_template_directory_uri();?>/assets/img/ubicacion.png" alt=""><?php the_job_location( false ); ?></li>
                                                   <li> <img class="icons" src="<?php echo get_template_directory_uri();?>/assets/img/calendario.png" alt=""><?php echo date_new(get_post_time( 'Y-m-d' )); ?></li>
                                                   <li>Total participantes 12</li>
                                                </ul>
                                            </div>
                                            <div class="">
                                                <ul>
                                                   <li class="price">$<?php echo get_post_meta( get_the_ID(), '_job_salary', true ); ?></li>
                                                   <li class="open">Abierta</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>  
                        
                         <?php $i = $i+1; endwhile; ?>    
                    </div>   
                <!-- card -->
            </div><!-- col-4 -->

            <!-- Tab panes -->
            <div class="col-lg-8 main-content__tabs">
            <div class="tab-content" id="v-pills-tabContent">
            <?php $loop2 = new WP_Query( $args ); $j = 0;
            while ( $loop2->have_posts() ) : $loop2->the_post(); $user_tarea = get_the_author_meta( 'ID' ); $title_tarea = get_the_title(); $id_tarea = get_the_ID(); $monto_salary = get_post_meta( get_the_ID(), '_job_salary', true ); $email_empleador = get_the_author_meta( 'user_email' ); ?>    
             <div class="tab-pane fade <?php if($j==0){ echo "show active";} ?>" id="v-pills-<?php echo get_the_ID();?>" role="tabpanel" aria-labelledby="v-pills-<?php echo get_the_ID();?>-tab">        
                    <div class="col-12 ">
                        <h3 class="mb-3"><?php wpjm_the_job_title(); ?></h3>
                        <div class="contenido">
                            <div class="datos_name">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3">
                                        <?php echo get_avatar( user_value( get_post(get_the_ID())->post_author ), 50 );?> 
                                    </div>
                                    <div class="col-lg-8 col-md-9">
                                        <p class="name">Publicado por</p>
                                        <span><?php echo get_the_author(); ?></span>
                                    </div>
                                </div>
                                <ul>
                                    <li class="mr-4 ml-0"><?php the_job_publish_date2(); ?></li>
                                    <li class="active">Abierto</li>
                                    <li>Asignado</li>
                                    <li>Terminado</li>
                                </ul>
                            </div>
                            <div class="datos_genereal">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <p> <img class="icons" src="<?php echo get_template_directory_uri();?>/assets/img/ubicacion.png" alt="">
                                            localizacion
                                        </p>
                                        <span><?php the_job_location( false ); ?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <p> <img class="icons" src="<?php echo get_template_directory_uri();?>/assets/img/calendario.png" alt="">Fecha del evento</p><span><?php echo date_new(get_post_time( 'Y-m-d' )); ?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- descripcion -->
                            <p class="description"><?php wpjm_the_job_description(); ?></p>
                            <h6 class="">Detalle</h6>
                            <p class="description m-0 border-n"><?php echo meta_value( '_job_important_info', get_the_ID()); ?>
                            </p>
                            <div class="ofertas">
                                <h6 class="mt-4 mb-4">Ofertas</h6>
                                <?php 
                                $args3 = array (
                                    'post_type' => 'postulados',
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
                                                    <p class="ml-auto">Hace 15 minutos</p>
                                                </div>
                                                <p><?php the_field('ofertar_message_empleado'); ?></p>
                                                <div class="cube mb-4"> 
                                                    <p>$ <?php the_field('ofertar_monto_tarea'); ?></p>
                                                </div>
                                                <div class="respnse">
                                                <?php $var_array ="Tarea Publicada: ".$title_tarea."<br>ID Tarea: ".$id_tarea."<br>Usuario Postulado: ".meta_user_value( 'first_name',  $current_user->ID )."<br>ID Postulado: ".get_the_author_meta( 'ID' )."<br>Monto Ofertado: $".get_field('ofertar_monto_tarea')."<br>Porcentaje Comisión: $".$comision."<br>ID Postulación: ".get_the_ID().""; ?>
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
                               <?php endwhile; ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 datos_presupuesto order-last-xs">
                        <ul>
                            <li><a href="">Seguir</a></li>
                            <li><a href="">Ver mapa</a></li>
                        </ul>
                        <div class="presupuesto_minicard">
                            <p>Presupuesto</p>
                            <span class="precio">$<?php echo get_post_meta( $id_tarea, '_job_salary', true ); ?></span>
                            
                            <?php if (is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Hacer tareas" ){ $title_tarea2 = $title_tarea."-".meta_user_value( 'first_name', $current_user->ID ); ?>
                                <a href="" class="btn-oferta" data-toggle="modal" data-target="#publicar" onclick="monto_salary2('<?php echo $title_tarea2 ?>','<?php echo $title_tarea ?>','<?php echo $id_tarea ?>','<?php echo $email_empleador ?>','<?php echo meta_user_value( 'first_name', $current_user->ID ) ?>','<?php echo wp_get_current_user()->ID ?>','<?php echo get_post_meta( $id_tarea, '_job_salary', true ) ?>');" <>Ofertar</a>
                            <?php }else { ?>
                               <a href="" class="btn-oferta" data-toggle="modal" data-target="">Ofertar</a>
                               <label for="exampleFormControlTextarea1">Create una cuenta para hacer tareas <a class="nav-link naranja-color" href="#" data-toggle="modal" data-target="#exampleModal">aquí</a></label>
                            <?php } ?>   
                        </div>
                    </div>
                </div><!--tab-->

                <!-- Modal Inicio de sesion -->
                <div class="modal fade" id="publicar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">  
                      <div class="modal-body">
                         <?php echo do_shortcode('[formidable id=2]');  ?>
                      </div>         
                    </div>
                  </div> 
                </div>                 

       <?php $j = $j+1; endwhile; ?>

        </div><!--tab principal -->
        </div>

        </div>
    </div>       



    <?php get_footer(); ?>