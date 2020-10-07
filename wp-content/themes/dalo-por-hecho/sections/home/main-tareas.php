	<!-- TAREAS-->
	<section class="main-tareas container" id="down">
		<div class="titulo-general text-center">
			<p><?php echo get_theme_mod('tareas_title'); ?></p>
			<span><?php echo get_theme_mod('tareas_subtitle'); ?></span>
		</div>
		
		<div class="main-tareas_grid mt-5">
		<?php $product_categories = get_categories( array( 'taxonomy' => 'job_listing_category', 'orderby' => 'menu_order', 'order' => 'asc'));  
		 $category_count = 1;
		?>
        <?php foreach($product_categories as $category):  global $wpdb; ?>
			<?php if ($category_count <= 10) { ?>
			<a class="main-tareas_item" href="" data-toggle="modal"	data-target="#step" id="send" onclick="enviarDatos('<?=$category->term_id ?>','<?=$category->name ?>');">
				<div class="main-tareas_item">
					<div class="main-tareas_item-content ">
						<img src="<?php echo termmeta_value_img('image_job_category', $category->term_id );?>" alt="icono">
						<p><?=$category->name ?></p>
					</div>
				</div>
			</a>
			<?php } ?>

	    <?php $category_count++; endforeach; ?>			

		        							
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
    <script type="text/javascript">
              
    //$('#send').click( function() {
           //var val_cat_name =  document.getElementById("job_cat_name").value;
           //var val_cat_id =  document.getElementById("job_cat_id").value; 
           //document.getElementById('job_cat').innerHTML=val_cat_name;
           //$("#job_cat").val(val_cat_id);       
      //  }
    //);
    function enviarDatos(id_cat,names_cat){ 
       this.names_cat = names_cat;
       this.id_cat = id_cat;
       document.getElementById('job_cat').innerHTML=this.names_cat;
       $("#job_cat").val(this.id_cat);   

       //$('.hid').prop('id', 'hidd');
    }	
   
    function enviarDatos2(){ 
       this.names_cat = 'Seleccionar';
       this.id_cat = '0';
       document.getElementById('job_cat').innerHTML=this.names_cat;
       $("#job_cat").val(this.id_cat);   

       //$('.hid').prop('id', 'hidd');
    }
    </script>