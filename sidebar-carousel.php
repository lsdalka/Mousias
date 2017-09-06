<div id="myCarousel" class="carousel slide">
	<div class="carousel-inner">
		
		<?php 
			$the_query = new WP_Query(array(
			'category_name' => 'top stories', 
			'posts_per_page' => 1 
			)); 
		while ( $the_query->have_posts() ) : 
			$the_query->the_post();
		?>
	<div class="item active">
		<?php the_post_thumbnail('featured');?>
		<div class="carousel-caption">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		</div>
	</div>
		<?php 
		endwhile; 
		wp_reset_postdata();
		?>
		
		<?php 
			$the_query = new WP_Query(array(
			'category_name' => 'top stories', 
			'posts_per_page' => 4, 
			'offset' => 1 
			)); 
		while ( $the_query->have_posts() ) : 
			$the_query->the_post();
		?>
	<div class="item">
		<?php the_post_thumbnail('featured');?>
		<div class="carousel-caption">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		</div>
	</div>
		<?php 
		endwhile; 
		wp_reset_postdata();
		?>
		
	</div>
	<a class="left_cc" href="#myCarousel" data-slide="prev"><</a>
	<a class="right_cc" href="#myCarousel" data-slide="next">></a>
</div>