	<!-- TAREAS-->
	<section class="main-tareas container" id="down">
		<div class="titulo-general text-center">
			<p><?php echo get_theme_mod('tareas_title'); ?></p>
			<span><?php echo get_theme_mod('tareas_subtitle'); ?></span>
		</div>
		
		<div class="main-tareas_grid mt-5">
				<div class="main-tareas_item" data-toggle="modal" data-target="#step" >
					<div class="main-tareas_item-content ">
						<img src="https://daloporhecho.cl/wp-content/uploads/2020/09/Enmascarar-grupo-3.png" alt="icono">
						<p>Aseo domestico</p>
					</div>
				</div>
				<div class="main-tareas_item" data-toggle="modal" data-target="#step" >
					<div class="main-tareas_item-content ">
						<img src="https://daloporhecho.cl/wp-content/uploads/2020/09/Enmascarar-grupo-4.png" alt="icono">
						<p>Fletes y mudanza</p>
					</div>
				</div>
				<div class="main-tareas_item" data-toggle="modal" data-target="#step" >
					<div class="main-tareas_item-content ">
						<img src="https://daloporhecho.cl/wp-content/uploads/2020/09/Enmascarar-grupo-13.png" alt="icono">
						<p>Cuidado de niños</p>
					</div>
				</div>
				<div class="main-tareas_item" data-toggle="modal" data-target="#step" >
					<div class="main-tareas_item-content ">
						<img src="https://daloporhecho.cl/wp-content/uploads/2020/09/Enmascarar-grupo-6.png" alt="icono">
						<p>Armar muebles</p>
					</div>
				</div>
				<div class="main-tareas_item" data-toggle="modal" data-target="#step" >
					<div class="main-tareas_item-content ">
						<img src="https://daloporhecho.cl/wp-content/uploads/2020/10/trabajos-pesados.png" alt="icono">
						<p>Construcción</p>
					</div>
				</div>
				<div class="main-tareas_item" data-toggle="modal" data-target="#step" >
					<div class="main-tareas_item-content ">
						<img src="https://daloporhecho.cl/wp-content/uploads/2020/09/Enmascarar-grupo-12.png" alt="icono">
						<p>Marketing y diseño</p>
					</div>
				</div>
				<div class="main-tareas_item" data-toggle="modal" data-target="#step" >
					<div class="main-tareas_item-content ">
						<img src="https://daloporhecho.cl/wp-content/uploads/2020/09/Enmascarar-grupo-11.png" alt="icono">
						<p>Fiestas o eventos</p>
					</div>
				</div>
				<div class="main-tareas_item" data-toggle="modal" data-target="#step" >
					<div class="main-tareas_item-content ">
						<img src="https://daloporhecho.cl/wp-content/uploads/2020/09/Enmascarar-grupo-10.png" alt="icono">
						<p>Jardinería</p>
					</div>
				</div>
				<div class="main-tareas_item" data-toggle="modal" data-target="#step" >
					<div class="main-tareas_item-content ">
						<img src="https://daloporhecho.cl/wp-content/uploads/2020/09/Enmascarar-grupo-8.png" alt="icono">
						<p>Cocina</p>
					</div>
				</div>
				<a href="<?php echo get_home_url() ?>/categorias"  class="main-tareas_item">
					<div class="main-tareas_item-content ">
						<img src="https://daloporhecho.cl/wp-content/uploads/2020/09/Enmascarar-grupo-9.png" alt="icono">
						<p>Otros</p>
					</div>
				</a>
		        							
	</div>

		<!--<div class="main-tareas_grid mt-5">
		< ?php $product_categories = get_categories( array( 'taxonomy' => 'job_listing_category', 'orderby' => 'menu_order', 'order' => 'asc'));  
		 $category_count = 1;
		?>
        < ?php foreach($product_categories as $category):  global $wpdb; ?>
			< ?php if ($category_count <= 10) { ?>
				<div class="main-tareas_item">
					<div class="main-tareas_item-content ">
						<img src="< ?php echo termmeta_value_img('image_job_category', $category->term_id );?>" alt="icono">
						<p>< ?=$category->name ?></p>
					</div>
				</div>
			< ?  php } ?>

	    < ?php $category_count++; endforeach; ?>	
	</div>
			<center class="mt-4 mb-4">
				<a class="btn-custom-orange " href="< ?php echo get_home_url() ?>/categorias" tabindex="0">Ver más categorías</a>
			</center>	-->
	</section>
	<!-- TAREAS-->
