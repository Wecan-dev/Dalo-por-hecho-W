	<footer>
		<ul class="footer">
			<li><a href=""><img class="logo-f" src="<?php echo get_template_directory_uri();?>/assets/img/logo-blanco.png"></a></li>
			<!--<li><a href="">Nosotros</a></li>-->
			<li><a href="<?php echo get_home_url() ?>/categorias">Categorías Populares</a></li>
		</ul>
		
		<div class=" d-flex justify-content-center align-items-center text-center mr-4">
			<?php if( is_user_logged_in() != NULL):?>
							<a class="border-b" href="<?php echo get_home_url() ?>/confi-perfil"> 
							<?php else: ?>
							<a class="border-b" href="#" data-toggle="modal" data-target="#exampleModal"> 
							<?php endif; ?>
							
                        <?php if (is_user_logged_in()){
                        	echo "Mi cuenta";
                        }else{ ?>
                            ingresa
                            </a>
                        <?php } ?>
							</a>
			<!--<a href="" class="border-b">Ingresar</a>-->
			<div class="d-flex">
				<div class="rrss">
					<a href="https://www.facebook.com/Daloporhechocl-105957037944444" target="_blank" ><i class="fa fa-facebook"></i></a>	
				</div>
				
				<div class="rrss">
					<a href="https://www.instagram.com/daloporhecho/" target="_blank"><i class="fa fa-instagram"></i></a>		
				</div>
			
			</div>
		
		
			<a href="<?php echo get_home_url() ?>/soporte" class="border-b">Soporte</a>
		</div>
	</footer>
    <script src="<?php echo get_template_directory_uri();?>/assets/js/setting-slick.js"></script>
	<script>
		new WOW().init();
	</script>	


<script>
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


$(document).ready(function() {     
                   
    $('#key').on('keyup', function() {
        var key = $(this).val();        
        var dataString = 'key='+key;
        var url = "<?= get_home_url() ?>"; 
    $.ajax({
            type: "POST",
            url: url+"/ajax/",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#key').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(1000);
                        //alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                        return true;
                });
            }
        });
    });


    $('#job_location').on('keyup', function() {
        var job_location = $(this).val();        
        var dataString = 'job_location='+job_location;
        var url = "<?= get_home_url() ?>"; 
    $.ajax({
            type: "POST",
            url: url+"/ajax/",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        //$('#job_location').val(data);
                         //$("#job_location").val(data1);
                        $('#job_location').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(1000);
                        //alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                       // $("#job_location").val(data);
                        return false;
                });
            }
        });
    });
    


$('#note_description').appendTo('.variation');
    
}); 

    function monto_salary2(name_tarea,title_tarea,id_tarea,email_empleador,name_empleado,id_empleado,salary){ 
       //$("input#field_ccdeo").val(name_tarea);
       //$("input#field_vqrer").val(tile_tarea);
       //$("input#field_a9ti0").val(id_tarea);
       //$("input#field_gvep8").val(email_empleador);
       //$("input#field_urvk3").val(name_empleado);
       //$("input#field_xjqxf").val(id_empleado);
       //$("input#field_41hfd").val(salary);

       $("input#field_name_tarea").val(name_tarea);
       $("input#field_title_tarea").val(title_tarea);
       $("input#field_id_tarea").val(id_tarea);
       $("input#field_email_empleador").val(email_empleador);
       $("input#field_name_empleado").val(name_empleado);
       $("input#field_id_empleado").val(id_empleado);
       $("input#field_salary_ofertado").val(salary)       
    } 

    function function_donation(salary_donation,array_note){

       $('.wdgk_donation').prop('disabled', true);
       var value_ofertar_monto =  salary_donation;
       var porcent = (value_ofertar_monto*0.10);
       var suma = parseFloat(porcent)+parseFloat(value_ofertar_monto);
       $("input.wdgk_donation").val(suma);

       $("textarea#w3mission").val(array_note);
       $('textarea#w3mission').prop('hidden', true);       

       //$("input#field_41hfd").val(salary);
    }    

//
</script>
 <!-- Modal Donation-->
<div class="modal fade" id="modal_donation2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
    <div class="modal-content">  
        <div class="modal-body">
           <h3 class="mb-3 main-task__title">Pagar Oferta2 <?php echo $id_postulado; ?></h3>
                            <div class="contenido">
                                <div class="datos_name">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3">
                                            <?php echo get_avatar( user_value( get_post($var_array[7])->post_author ), 50 ); echo $var_array[7]; echo "dasdasdsad";?> 
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
                                          <div class="main-content__localization">

                                            <img class="icons" src="<?php echo get_template_directory_uri();?>/assets/img/ubicacion.png" alt="">    
                                            <div class="main-content__localizationtext">
                                              <p> 
                                                Localización
                                              </p>
                                              <span><?php the_job_location( false ); ?></span>
                                            </div>
                                          </div>


                                        </div>
                                        <div class="col-md-6">
                                          <div class="main-content__localization">
                                            <img class="icons" src="<?php echo get_template_directory_uri();?>/assets/img/calendario.png" alt="">
                                            <div class="main-content__localizationtext">
                                              <p> 
                                                Fecha del evento
                                              </p>
                                              <span><?php echo date_new(get_post_time( 'Y-m-d' )); ?></span>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


         <?php  echo do_shortcode('[wdgk_donation]');  ?>
        </div>         
    </div>
 </div> 
</div>	

</body>
<?php wp_footer(); ?>
</html>	