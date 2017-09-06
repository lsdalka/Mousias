<?php get_header(); ?>

<div id="content">

	<?php $postid = $post->ID; ?>

	<div class="adstrip">
		<img src="<?php bloginfo('template_directory'); ?>/img/adstrip.jpg" />
	</div>

	<?php while ( have_posts() ) : the_post(); ?>
		<div class="fullpost">
			<div class="title">
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			</div>
			<div class="subtitle">
				<span class="time" id="sp"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
				<span class="brp">•</span>
				<span class="countsh">5 shares</span>
				<span class="brp">•</span>
				<span class="countcom"><a href="<?php the_permalink() ?>#disqus_thread"></a></span><br>
				<span class="author">by <?php the_author() ?></span>
			</div>
			<div class="article">	
				<?php the_content(); ?>
			</div>
		</div>		
	<?php endwhile; // end of the loop. ?>
	
	
	<div id="side">
		
		<div class="title" id="pop">
			<a>Popular News</a>
		</div>
		<?php	
			$the_query = new WP_Query(array(
			'posts_per_page' => 6
			));
		while ( $the_query->have_posts() ) : 
			$the_query->the_post();	
		?>
		<div class="sidepop">
			<?php the_post_thumbnail('sidepop');?>
			<h5><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
		</div>
		<?php 
			endwhile; 
			wp_reset_postdata();
		?>

		<div class="adside">
			<img src="<?php bloginfo('template_directory'); ?>/img/adside.jpg" />
		</div>
		
	</div>
	
	
	<div class="top4rec">
		<a>Recommended</a>
	</div>	
	
	<div class="top4">
	<div id="grid4">
	<div id="grid4sub">
		<?php 
			$the_query = new WP_Query(array(
			'post__not_in' => array($postid) ,
			'category_name' => 'top stories' , 
			'posts_per_page' => 4
			)); 
		while ( $the_query->have_posts() ) : 
			$the_query->the_post();
		?>
	<div class="top4item" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
		<?php the_post_thumbnail('featuredmin');?>
		<div class="top4item-caption">
			<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		</div>
	</div>
		<?php 
			endwhile; 
			wp_reset_postdata();
		?>
	</div>
	</div>
	</div>

	<?php disqus_embed('mousias'); ?>
		
</div><!--.content-->

<?php wp_footer(); // Crucial footer hook! ?>
<?php get_footer(); ?>