    <?php  get_template_part('sections/home/modal-step'); ?>
	<footer>
		<ul class="footer">
			<li><a href=""><img class="logo-f" src="<?php echo get_template_directory_uri();?>/assets/img/logo-blanco.png"></a></li>
			<li><a href="">Nosotros</a></li>
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
					<a href="" target="_blank" ><i class="fa fa-twitter"></i></a>	
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

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {

    
    var value_ofertar_monto =  document.getElementById("ofertar_monto").value;
    var porcent = ((value_ofertar_monto*0.10);
    var sumat = (porcent+value_ofertar_monto);
    $(".wdgk_donation").val(sumat);
    $('.wdgk_donation').prop('disabled', true);

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


}); 
</script>	
</body>
<?php wp_footer(); ?>
</html>	