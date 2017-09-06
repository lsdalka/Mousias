<div id="container">

<?php get_header(); ?>

<div id="content">

	<?php $tagname = single_tag_title( '', false ); ?>

	<div class="adstrip">
		<img src="<?php bloginfo('template_directory'); ?>/img/adstrip.jpg" />
	</div>
		
	<div class="title" id="tagname">
		<a><?php single_tag_title(); ?></a>
	</div>


	<div id="tag-res">
	
		<?php 
			$the_query = new WP_Query(array(
			'tag' => $tagname 
			)); 
		while ( $the_query->have_posts() ) : 
			$the_query->the_post();
		?>
		
		<div class="search-post">
		
		<div class="search-thumb"> 
			<?php if ( function_exists( 'add_theme_support' ) ) { the_post_thumbnail( 'search' ); } ?>
		</div>
				
		<div class="search-title">
		<h4 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h4>
		</div>
		
		<div class="search-date">
		<?php the_time('l, F jS, Y') ?>
		</div>
		
		<div class="search-cat">
		Posted in <?php the_category(', ') ?>
		</div>
		
		</div>
		
		<?php 
			endwhile; 
			wp_reset_postdata();
		?>

	</div>	
		
</div>


<?php wp_footer(); // Crucial footer hook! ?>
<?php get_footer(); ?>

</div>