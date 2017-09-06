<div id="container">

<?php get_header(); ?>

<div id="content">

	<div class="adstrip">
		<img src="<?php bloginfo('template_directory'); ?>/img/adstrip.jpg" />
	</div>

	<div class="title">
		<a>Top Stories</a>
	</div>
	
	<?php get_sidebar('carousel'); ?>
		
	<div class="top4">
	<div id="grid4">
	<div id="grid4sub">
		<?php 
			$the_query = new WP_Query(array(
			'category_name' => 'top stories', 
			'posts_per_page' => 4, 
			'offset' => 5 
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
	
	
	<div class="title" id="anon">
		<a>Latest News</a>
	</div>
	
	<div id="col2">
	<div id="grid2">
	<div id="grid2sub">
		<?php 
			$the_query = new WP_Query(array(
			'cat' => -9 ,
			'posts_per_page' => 4  
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
	
	<div class="subscript">
		<div class="subscriptwrap">
		<p><strong>- MOUSIAS MAGAZINE -</strong></p>
		<p class="periodic">Λάβετε τα <strong>καλύτερα</strong> άρθρα του Μούσια κάθε Κυριακή!</p>
		<div class="subscriptform">
			<form action="subscribe.php">
				<input type="text" name="email" class="subscribeinput" value="Δώσε το email σου και πάτα οκ">
				<input type="submit" class="subscribesubmmit" value="ΟΚ">
			</form>
		</div>
		</div>
	</div>
	
	
	<div class="main_side">
	
	<div class="title" id="anon">
		<a>Rest of News</a>
	</div>
	
	<div id="col1">
		<?php 
			$the_query = new WP_Query(array(
			'cat' => -9 ,
			'posts_per_page' => 5 ,
			'offset' => 4
			)); 
		while ( $the_query->have_posts() ) : 
			$the_query->the_post();
		?>
		<div class="col1post">
			<?php the_post_thumbnail('col1');?>			
			<div class="col1post_title">
				<div class="catime">
					<span class="cat"><?php the_category( '' ); ?></span>&nbsp 
					<span class="brp">•</span>
					<span class="time"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
				</div>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="count">
					<span class="countsh">5 shares</span>
					<span class="brp">•</span>
					<span class="countcom"><a href="<?php the_permalink() ?>#disqus_thread"></a></span>
				</div>
			</div>
		</div>
		<?php 
			endwhile; 
			wp_reset_postdata();
		?>
	</div>
	
	<div id="side">
	
		<div class="adside">
			<img src="<?php bloginfo('template_directory'); ?>/img/adside.jpg" />
		</div>
		
		<div class="title" id="pop">
			<a>Events</a>
		</div>
		<?php	
			$the_query = new WP_Query(array(
			'posts_per_page' => 4 ,
			'tag' => 'events'
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
		
		<div class="tags">
			<?php wp_tag_cloud(''); ?>
		</div>
		
		<div class="sidebar">
		<?php get_sidebar(); ?>
		</div>
	
	</div>
	
	</div>
	
</div>

<?php wp_footer(); // Crucial footer hook! ?>
<?php get_footer(); ?>

</div>