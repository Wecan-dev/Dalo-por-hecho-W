    <?php  get_template_part('sections/home/modal-step'); ?>
	<footer>
		<ul class="footer">
			<li><a href=""><img class="logo-f" src="<?php echo get_template_directory_uri();?>/assets/img/logo-blanco.png"></a></li>
			<li><a href="">Nosotros</a></li>
			<li><a href="">Categorías Populares</a></li>
		</ul>
		<div class="text-center">
			<a href="" class="border-b">Ingresar</a>
			<a href="" class="rrss"><i class="fa fa-facebook"></i></a>
			<a href="" class="rrss"><i class="fa fa-twitter"></i></a>
			<a href="" class="rrss"><i class="fa fa-instagram"></i></a>
			<a href="" class="border-b">Soporte</a>
		</div>
	</footer>
    <script src="<?php echo get_template_directory_uri();?>/assets/js/setting-slick.js"></script>
	<script>
		new WOW().init();
	</script>
</body>
<?php wp_footer(); ?>
</html>	