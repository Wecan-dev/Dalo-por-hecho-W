<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">

<head>
	<meta charset="UTF-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<title><?php wp_title('|', true, 'right'); ?></title>
	<link rel="icon" type="image/png" sizes="32x32" href="https://daloporhecho.cl/wp-content/uploads/2020/09/favicon-32x32-1.png">
    <?php wp_head(); global $current_user, $wp_roles;?>
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-md fixed-top navbar-fixed-js">
			<div class="container">
				<div class="main-brand">
					<div class="main-brand">
						<a class="navbar-brand" href="<?php echo get_home_url() ?>">
							<img class="iso-desk" src="<?php echo get_template_directory_uri();?>/assets/img/logo-blanco.png">
						</a>

					</div>
					<button class="navbar-toggler p-0 border-0" data-toggle="offcanvas" type="button">
						<span class="navbar-toggler-icon fa fa-bars"></span>
					</button>
				</div>
				<div class="navbar-collapse offcanvas-collapse">
					<div class="main-brand">
						<a class="navbar-brand" href="<?php echo get_home_url() ?>">
							<img id="iso" src="<?php echo get_template_directory_uri();?>/assets/img/logo-blanco.png">
						</a>

					</div>

					<ul class="navbar-nav ">
						<li class="nav-item">
							<a class="nav-link btn-custom-nav mr-3" href="<?php echo get_home_url() ?>/buscar-tareas">Buscar tarea</a>
						</li>
						<li class="nav-item">
							<a class="nav-link btn-custom-nav  btn-custom-transparent-nav" href="" data-toggle="modal"
								data-target="#step">Publicar
								tarea</a>
						</li>

					</ul>

					<ul class="navbar-nav ">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo get_home_url() ?>/confi-perfil">Soporte</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo get_home_url() ?>/about">Como funciona</a>
						</li>
						<li class="nav-item">
							<?php if( is_user_logged_in() != NULL):?>
							<a class="nav-link naranja-color" href="<?php echo get_home_url() ?>/confi-perfil"> 
							<?php else: ?>
							<a class="nav-link naranja-color" href="#" data-toggle="modal" data-target="#exampleModal"> 
							<?php endif; ?>
							
                        <?php if (is_user_logged_in()){
                        	echo "Mi cuenta";
                            echo get_avatar( $current_user->user_email, 30 ); 
                        }else{ ?>
                            ingresa
                            <img class="user avatar" src="<?php echo get_template_directory_uri();?>/assets/img/user.png" alt=""></a>
                        <?php } ?>
							</a>
						</li>

					</ul>
				</div>
			</div>
		</nav>
	</header>



<!-- Modal Inicio de sesion -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
  
      <div class="modal-body">
        <div class="container buscar_tareas perfil m-110">
        <div class="row">
            <div class="col-lg-12 col-md-12 scroll-admin order-last-xs ">



<div class="grid-woocommerce">
    <div class="padding-left-right padding-top-bottom">
 
<?php           
do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="u-columns col2-set" id="customer_login">

    <div class="u-column1 col-12 flex-login">

<?php endif; ?>

    <?php if ($create != 'account') { ?>
        <form class="woocommerce-form form-custom woocommerce-form-login login" method="post">
            <div class="login-img">

                <img class="" src="<?php echo get_template_directory_uri();?>/assets/img/user.png">
            </div>
            <h2 class="text-center">Iniciar sesión</h2>
            <?php do_action( 'woocommerce_login_form_start' ); ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="username" class="label-user" >
                <img class="" src="<?php echo get_template_directory_uri();?>/assets/img/usergray.png">
                Ingresa tu email
                <input type="text" placeholder="" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="off" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
            </label>
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="password">
                <img class="" src="<?php echo get_template_directory_uri();?>/assets/img/pass.png">
                Ingresa tu clave
                <input placeholder="" class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="off" />
            </label>
            </p>

            <?php do_action( 'woocommerce_login_form' ); ?>

            <p class="form-row">
                <!-- <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Recuerdame', 'woocommerce' ); ?></span>
                </label> -->
                <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                <button type="submit" class="main-general__button woocommerce-button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Iniciar sesión', 'woocommerce' ); ?></button>
            </p>
            <div class="form-login__register text-center" >
                <p class="woocommerce-LostPassword lost_password">
                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( '¿Se te olvidó tu contraseña?', 'woocommerce' ); ?></a>
                    <p class="woocommerce-in-account"><a href="?create=account"><?='Crea una cuenta' ?></a></p>
                </p>
            </div>


            <?php do_action( 'woocommerce_login_form_end' ); ?>

        </form>
    <?php } ?> 



<?php if ($create == 'account') { ?>

    <div class="u-column2 col-12 flex-login">
        <div class="form-custom form-register">
        <div class="login-img">
            <img class="" src="<?php echo get_template_directory_uri();?>/assets/img/user.png">
        </div>
        Registrarse

        <h2><?php esc_html_e( $la, 'woocommerce' ); ?></h2>

        <?php echo do_shortcode('[user_registration_form id="96"]');?>

            <div class="form-login__register" >
                <p class="woocommerce-LostPassword lost_password">                  
                    
                    <a href="?"><?='Iniciar sesión' ?></a>
                    <p class="woocommerce-in-account"><a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Perdiste tu contraseña', 'woocommerce' ); ?></a></p>
                </p>
            </div>              
            </div>
    </div>
<?php } ?>

</div>


<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

    </div>
</div>

                
            </div>
        </div>    
    </div>
      </div>
      
    </div>
  </div>
</div>