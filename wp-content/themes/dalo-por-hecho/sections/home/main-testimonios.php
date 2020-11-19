	<!-- testimonios -->
	<?php global $current_user; ?>
	<section id="testimonios">
		<div class="bg-testimonios">
			<div class="main-testimonio ">
				<div class="main-testimonios__content">
                <?php $i=0;
                  $args = array (
                     'post_type' => 'job_listing',
                     'posts_per_page' => 100,
                     'post_status' => array('publish','draft'),
                  ); 
                $loop = new WP_Query( $args ); 
                while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>	
                <a href="<?php the_permalink(); ?>">			
					<div class="main-testimonios__item">
						<div class="content-tetimonios">
							<div class="row">
								<div class="col-md-2">
									<?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 );?> 
								</div>
								<div class="col-md-10 mb-2 text-justify">
									<p class="name"><?php echo $product_categories = wp_get_post_terms( get_the_ID(), 'job_listing_category' )[0]->name; ?></p>
									<span><?php the_author_meta( 'first_name', 1); ?></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<p><?php echo cut_text(get_post_meta( get_the_ID(), '_job_description', true ), 10); ?></p>
								</div>
								<div class="col-md-4">
									<p class="money">$<?php echo str_replace(',', '.' ,number_format(get_post_meta( get_the_ID(), '_job_salary', true ))); ?></p>
								</div>
							</div>
						</div>
					</div>
			    </a>		
				<?php $i = $i+1; endwhile; ?>
				</div>
			</div>
		</div>
	</section>

	