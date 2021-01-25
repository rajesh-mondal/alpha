<?php
/**
 * Template Name: Custom Query
 */
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part( "/template-parts/common/hero" ); ?>
    <div class="posts text-center">
		<?php
        $_p = get_posts( array(
	        'posts_per_page' => 2,
	        'post__in'       => array( 12, 25, 28, 19, 16 ),
	        'order'          => 'post__in'
        ) );
		foreach ( $_p as $post ) {
			setup_postdata($post);
			?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2></a>
			<?php
		}
		wp_reset_postdata();
		?>
        <div class="container post-pagination">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
				    <?php
				    the_posts_pagination(array(
					    "screen_reader_text"=>' ',
					    "prev_text" => "New Posts",
					    "next_test" => "Old Posts"
				    ));
				    ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>