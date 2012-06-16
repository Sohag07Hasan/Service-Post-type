<?php
/**
 * Temple to show the services content
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
						
		</header><!-- .entry-header -->

		
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
		

		<footer class="entry-meta">
			
			<?php
				
				printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>'),
					esc_url( get_permalink() ),
					esc_attr( get_the_time() ),
					esc_attr( get_the_date( 'c' ) ),
					esc_html( get_the_date() ),
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_attr( sprintf( __( 'View all posts by %s' ), get_the_author() ) ),
					get_the_author()
				);
				
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list(',');
				if ( $categories_list ):
			?>
			<br/>
			<span class="cat-links">
				<?php printf( __( '<span class="%1$s">Posted in</span> %2$s'), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
				$show_sep = true; ?>
			</span>
			<?php // End if categories ?>
			<?php endif; ?>
			
			<p>
				affiliation : <?php echo get_post_meta(get_the_ID(), 'services-affiliation', true);  ?> <br/>
				
			</p>
			
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
