	<!-- TAREAS-->
	<section class="main-tareas container" id="down">
		<div class="titulo-general text-center">
			<p><?php echo get_theme_mod('tareas_title'); ?></p>
			<span><?php echo get_theme_mod('tareas_subtitle'); ?></span>
		</div>

		<div class="main-tareas_grid mt-5">
        <?php $product_categories = get_categories( array( 'taxonomy' => 'job_listing_category', 'orderby' => 'menu_order', 'order' => 'asc' ));  ?>
        <?php foreach($product_categories as $category):  global $wpdb;?>
			<div class="main-tareas_item">
				<div class="main-tareas_item-content ">
					<img src="<?php echo termmeta_value_img('image_job_category', $category->term_id );?>" alt="icono">
					<p><?=$category->name ?></p>
				</div>
			</div>
	    <?php endforeach; ?>		
		</div>
	</section>
	<!-- TAREAS-->
