<div id="container">

<?php get_header(); ?>

<div id="content">

	<?php $catname = single_cat_title( '', false ); ?>

	<div class="adstrip">
		<img src="<?php bloginfo('template_directory'); ?>/img/adstrip.jpg" />
	</div>
		
	<div class="title" id="catname">
		<a><?php single_cat_title()?></a>
	</div>
	
	<?php get_sidebar('carousel-category'); ?>
	
	
	<div class="title" id="anoncat">
		<a></a>
	</div>
	
	<div id="col2">
	<div id="grid2">
	<div id="grid2sub">
		<?php 
			$the_query = new WP_Query(array(
			'cat' => -9 ,
			'category_name' => $catname ,
			'posts_per_page' => 10  
			)); 
		while ( $the_query->have_posts() ) : 
			$the_query->the_post();
		?>
		<div class="col2post">
			<?php the_post_thumbnail('col2');?>
			<div class="catime2">
				<span class="cat2"><?php the_category( '' ); ?></span>&nbsp 
				<span class="brp2">•</span>
				<span class="time2"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
			</div>
			<div class="col2post_title">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			</div>
			<div class="count2">
				<span class="countsh2">5 shares</span>
				<span class="brp2">•</span>
				<span class="countcom2"><a href="<?php the_permalink() ?>#disqus_thread"></a></span>
			</div>
		</div>
		<?php 
			endwhile; 
			wp_reset_postdata();
		?>
	</div>
	</div>
	</div>
	
</div>


<?php wp_footer(); // Crucial footer hook! ?>
<?php get_footer(); ?>

</div>