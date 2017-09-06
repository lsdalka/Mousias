<div id="container">

<?php get_header(); ?>

<div id="content">

	<div class="adstrip">
		<img src="<?php bloginfo('template_directory'); ?>/img/adstrip.jpg" />
	</div>
	
	<div class="title" id="searchname">
		<a><?php echo wp_specialchars($s); ?></a>
	</div>

	<div id="search-res">

	<?php if (have_posts()) : ?>	
	<?php while (have_posts()) : the_post(); ?>
    
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
	
	<?php endwhile; ?>
	
	
	<?php else : ?>
		<h3 class="nopost">No posts found. Try a different search?</h3>
	<?php endif; ?>
	
	</div>
	
</div>

<?php get_footer(); ?>

</div>


