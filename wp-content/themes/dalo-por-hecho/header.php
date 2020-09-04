<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">

<head>
	<meta charset="UTF-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
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
							<a class="nav-link btn-custom-nav mr-3" href="<?php echo get_home_url() ?>/buscar_tareas">Buscar tarea</a>
						</li>
						<li class="nav-item">
							<a class="nav-link btn-custom-nav  btn-custom-transparent-nav" href="" data-toggle="modal"
								data-target="#step">Publicar
								tarea</a>
						</li>

					</ul>

					<ul class="navbar-nav ">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo get_home_url() ?>/confi_perfil">Soporte</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo get_home_url() ?>/about">Como funciona</a>
						</li>
						<li class="nav-item">
							<a class="nav-link naranja-color" href="<?php echo get_home_url() ?>/confi_perfil">ingresa <img class="user"
									src="<?php echo get_template_directory_uri();?>/assets/img/user.png" alt=""></a>
						</li>

					</ul>
				</div>
			</div>
		</nav>
	</header>