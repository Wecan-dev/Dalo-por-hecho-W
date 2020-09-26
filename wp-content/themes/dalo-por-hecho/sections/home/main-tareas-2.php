	<!-- TAREAS 2-->
	<section class="main-tareas main-tareas-2 container mt-60 ">
		<div class="titulo-general text-center">
			<p><?php echo get_theme_mod('tareas2_title'); ?></p>
			<span><?php echo get_theme_mod('tareas2_subtitle'); ?></span>
		</div>

		<div class="main-tareas_grid mt-5">
        <?php $product_categories = get_categories( array( 'taxonomy' => 'job_listing_category', 'orderby' => 'menu_order', 'order' => 'asc' ));  ?>
        <?php foreach($product_categories as $category):  global $wpdb;?>		
			<div class="main-tareas_item">
				<div class="main-tareas_item-content ">
					<p><?=$category->name ?></p>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</section>
	<!-- TAREAS-->