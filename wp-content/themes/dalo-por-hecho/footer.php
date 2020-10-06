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
</body>
<?php wp_footer(); ?>
</html>	