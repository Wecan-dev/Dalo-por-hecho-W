	<!-- TAREAS-->
	<section class="main-tareas container" id="down">
		<div class="titulo-general text-center">
			<p><?php echo get_theme_mod('tareas_title'); ?></p>
			<span><?php echo get_theme_mod('tareas_subtitle'); ?></span>
		</div>
		
		<div class="main-tareas_grid mt-5">

		<?php for ($i=1; $i <= 9; $i++) { ?>
      <?php if(get_theme_mod('tareas_cat'.$i.'')!=NULL) { ?>
        <a class="main-tareas_item" href="" data-toggle="modal"	data-target="#step" id="send" onclick="enviarDatos('<?=get_theme_mod('tareas_cat'.$i.'') ?>','<?=get_term(get_theme_mod('tareas_cat'.$i.''))->name ?>');">
          <div class="main-tareas_item">
            <div class="main-tareas_item-content ">
              <img src="<?php echo termmeta_value_img('image_job_category', get_theme_mod('tareas_cat'.$i.'') );?>" alt="icono">
              <p><?=get_term(get_theme_mod('tareas_cat'.$i.''))->name ?></p>
            </div>
          </div>
        </a>
			<?php } ?>
    <?php } ?>  

            <a class="main-tareas_item" style="margin-top: -3rem;">
                <div class="main-tareas_item-content ">
                <img src="https://daloporhecho.cl/wp-content/uploads/2020/09/Enmascarar-grupo-9.png" alt="icono">
                <p>Otros</p>
                </div>
            </a>

		        							
	</div>

		
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