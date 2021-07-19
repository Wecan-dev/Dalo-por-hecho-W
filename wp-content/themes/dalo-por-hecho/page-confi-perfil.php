<?php if(is_user_logged_in() == NULL)
{ 
  header('Location: '.get_home_url().'');
}?>

<?php

/* Get user info. */
global $current_user, $wp_roles;
//get_currentuserinfo(); //deprecated since 3.1

/* Load the registration file. */
//require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
$error = array();    
/* If profile was saved, update profile. */


$cont1 = 0; $cont2 = 0; $cont3 = 0; $cont4 = 0; $cont5 = 0; $cont6 = 0; $cont7 = 0; $cont8 = 0;

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

get_header();?>
 
<div class="container perfil m-110">
   <section> 
        <div class="container vertical-tabs">
            <div class="row">
                <div class="col-md-4 content-barra-lateral">
                    <div class="perfil-content">
                        <?php if (is_user_logged_in()){ echo get_avatar( $current_user->user_email, 165 );  }?> 
                        <p class="mt-3 mb-4"><?php the_author_meta( 'first_name', $current_user->ID ); ?></p>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                        <a class="nav-link" onclick="formconfi()" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab"
                            aria-controls="v-pills-history" aria-selected="false">Historial de pagos</a>

                        <!--<a class="nav-link" onclick="formconfi()" id="v-pills-method-tab" data-toggle="pill" href="#v-pills-method"
                                role="tab" aria-controls="v-pills-method" aria-selected="false">Método de pago</a>-->

                        <a class="nav-link" onclick="formconfi()" id="v-pills-bancario-tab" data-toggle="pill" href="#v-pills-bancario"
                                role="tab" aria-controls="v-pills-bancario" aria-selected="false">Datos Bancarios</a>                                

                        <a class="nav-link" onclick="formconfi()" id="v-pills-recomendar-tab" data-toggle="pill" href="#v-pills-recomendar"
                            role="tab" aria-controls="v-pills-recomendar" aria-selected="false">Recomendar a un
                            amigo</a>

                        <a class="nav-link " onclick="formconfi()" id="v-pills-conf-tab" data-toggle="pill" href="#v-pills-conf" role="tab"
                                aria-controls="v-pills-three" aria-selected="false">Configuración de cuenta</a>

                        <a class="nav-link " onclick="formconfi()" id="v-pills-aptitudes-tab" data-toggle="pill" href="#v-pills-aptitudes"
                            role="tab" aria-controls="v-pills-aptitudes" aria-selected="true">Mis aptitudes</a>

                        <a class="nav-link" onclick="formconfi()" id="v-pills-emblemas-tab" data-toggle="pill" href="#v-pills-emblemas" role="tab"
                                aria-controls="v-pills-three" aria-selected="false">Mis emblemas</a>          
                        
                        <!--<a class="nav-link" onclick="formconfi()" id="v-pills-senales-tab" data-toggle="pill" href="#v-pills-senales" role="tab"
                                aria-controls="v-pills-three" aria-selected="false">Señales de tareas</a>-->

                        <?php if( meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Publicar Tareas" )
                        { ?>
                            <a class="nav-link" onclick="form_confi()" id="v-pills-tareas-tab" data-toggle="pill" href="#v-pills-tareas" role="tab" aria-controls="v-pills-three" aria-selected="false">Tareas Publicadas</a>                               
                        <?php } ?>  
                        <?php if( meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Publicar Tareas" )
                        { ?>
                            <a class="nav-link" onclick="formconfi()" id="v-pills-notification-tab" data-toggle="pill" href="#v-pills-notification" role="tab"
                                aria-controls="v-pills-three" aria-selected="false">Notificaciones</a>

                            <a class="nav-link" onclick="formconfi()" id="v-pills-asignados-tab" data-toggle="pill" href="#v-pills-asignados" role="tab"
                                aria-controls="v-pills-three" aria-selected="false">Tareas Asignadas</a>                                                               
                        <?php } ?>                             
                        <a href="<?php echo wp_logout_url( home_url()); ?>" class="nav-link" 
                                 aria-selected="false">Salir</a>
                    </div>
                </div>
                <div class="col-md-8 main-content__tabs">
                    <div class="tab-content" id="v-pills-tabContent">

                        <?php get_template_part('conf-perfil/conf-history'); ?>
                        <?php get_template_part('conf-perfil/conf-method'); ?>
                        <?php get_template_part('conf-perfil/conf-bancario'); ?>
                        <?php get_template_part('conf-perfil/conf-recomendar'); ?>         
                        <?php get_template_part('conf-perfil/conf-conf-cuenta'); ?>
                        <?php get_template_part('conf-perfil/conf-aptitudes'); ?>
                        <?php get_template_part('conf-perfil/conf-emblemas'); ?>            
                        <?php get_template_part('conf-perfil/conf-senales'); ?>
                        <?php get_template_part('conf-perfil/conf-tareas'); ?>
                        <?php get_template_part('conf-perfil/conf-notification'); ?>
                        <?php get_template_part('conf-perfil/conf-asignados'); ?>                  
                    </div>
                </div>
            </div>  
        </div>
    </section>
</div>



<script type="text/javascript">
$(document).ready(function () {

///Validation fields
var nombre_bancario = document.getElementsByName("nombre_bancario")[0].value;


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