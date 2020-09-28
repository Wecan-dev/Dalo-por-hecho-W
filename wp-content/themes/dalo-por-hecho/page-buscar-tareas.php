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
                                <p> Categoria 1</p>
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
                            <a class='dropdown-item' href='#'>
                                <p> Categoria 1</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li class='nav-item dropdown dowms'>
                    <a href='#' aria-expanded='false' aria-haspopup='true'
                        class='nav-link dropdown-toggle nav-link-black ' data-toggle='dropdown'>
                        Precios
                    </a>
                    <div aria-labelledby='dropdownMenuButton' class='dropdown-menu'>
                        <div class='content-drop'>
                            <a class='dropdown-item' href='#'>
                                <p> Categoria 1</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li class='nav-item dropdown dowms mr-auto'>
                    <a href='#' aria-expanded='false' aria-haspopup='true'
                        class='nav-link dropdown-toggle nav-link-black ' data-toggle='dropdown'>
                        Sugerencia
                    </a>
                    <div aria-labelledby='dropdownMenuButton' class='dropdown-menu'>
                        <div class='content-drop'>
                            <a class='dropdown-item' href='#'>
                                <p> Categoria 1</p>
                            </a>
                        </div>
                    </div>
                </li>
                <form class="form-inline position-relative">
                    <input class="form-control buscador " type="search" placeholder="Buscar Tarea" aria-label="Search">
                    <i class="fa fa-search" aria-hidden="true"></i>

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
                      $args = array (
                         'post_type' => 'job_listing',
                         'posts_per_page' => 10000,
                         'post_status' => 'publish'

                      ); 
                    $loop = new WP_Query( $args ); 
                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>                     
                            <a class="av-link <?php if($i==0){ echo "active";} ?> card-job" id="v-pills-<?php echo get_the_ID();?>-tab" data-toggle="pill" href="#v-pills-<?php echo get_the_ID();?>" role="tab" aria-controls="v-pills-<?php echo get_the_ID();?>" aria-selected="false">
                                <div class="content-tetimonios admin-card">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 text-center">
                                           <?php if (is_user_logged_in()){ echo get_avatar( $current_user->user_email, 50 );  }?> 
                                        </div>
                                        <div class="col-md-12 col-lg-9 mb-2">
                                            <p class="name"><?php wpjm_the_job_title(); ?></p>
                                            <span> <?php echo $product_categories = wp_get_post_terms( get_the_ID(), 'job_listing_category' )[0]->name; ?></span>
                                        </div>
                                        <!-- datos -->
                                        <div class="datos">
                                            <div class="">
                                                <ul class="datos_card">
                                                   <li> <img class="icons" src="assets/img/ubicacion.png" alt=""><?php the_job_location( false ); ?></li>
                                                   <li> <img class="icons" src="assets/img/calendario.png" alt=""><?php echo date_new(get_post_time( 'Y-m-d' )); ?></li>
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
            <?php $loop = new WP_Query( $args ); $j = 0;
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>    
             <div class="tab-pane fade <?php if($j==0){ echo "show active";} ?>" id="v-pills-<?php echo get_the_ID();?>" role="tabpanel" aria-labelledby="v-pills-<?php echo get_the_ID();?>-tab">        
                    <div class="col-12 ">
                        <h3 class="mb-3"><?php wpjm_the_job_title(); ?></h3>
                        <div class="contenido">
                            <div class="datos_name">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3">
                                        <img src="assets/img/user2.png" alt="">
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
                                        <p> <img class="icons" src="assets/img/ubicacion.png" alt="">
                                            localizacion
                                        </p>
                                        <span><?php the_job_location( false ); ?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <p> <img class="icons" src="assets/img/calendario.png" alt="">Fecha del evento</p><span><?php echo date_new(get_post_time( 'Y-m-d' )); ?></span>
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
                                <div class="ofertas_conetnt">
                                    <div class="datos_name">
                                        <div class="row border-n mb-5">
                                            <div class="col-md-12">
                                                <div class="ofertas_titulos mb-3">
                                                    <img src="assets/img/user2.png" alt="">
                                                    <div class="flex ml-3">
                                                        <span>Nombre de la persona</span>
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
                                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur quas a
                                                    veniam eligendi incidunt voluptatem molestias, eos delectus non, quibusdam
                                                    doloribus ipsum animi modi natus, eveniet atque nobis repellendus quidem?
                                                </p>
                                                <div class="cube mb-4"> 
                                                </div>
                                                <div class="respnse">
                                                    <a href="">Mostrar menos</a>
                                                    <a href="" class="ml-auto"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Responder oferta</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preguntas mb-4">
                                            <p>Preguntas (0)</p>
                                            <textarea name="" id="" cols="37" rows="5" placeholder="Hacer preguntas"></textarea>
                                        </div>
                                    </div>
                                </div>
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
                            <span class="precio">$40</span>

                            <a href="" class="btn-oferta">Ofertar</a>
                        </div>
                    </div>
                </div><!--tab-->

                
            <?php $j = $j+1; endwhile; ?>

        </div><!--tab principal -->
        </div>

        </div>
    </div>
        




    <?php get_footer(); ?>