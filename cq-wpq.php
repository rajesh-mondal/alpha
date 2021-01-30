<?php
/**
 * Template Name: Custom Query WPQuery
 */
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part( "/template-parts/common/hero" ); ?>
    <div class="posts text-center">
		<?php
		$paged = get_query_var( "paged" ) ? get_query_var( "paged" ) : 1;
		$posts_per_page = 3;
		$post_ids = array( 12, 25, 28, 19, 16, 1, 8 );
		$_p = new WP_Query( array(
//				'category_name'  => 'Uncategorized',
//				'posts_per_page' => $posts_per_page,
				'tag'       => 'special',
				'paged'     => $paged,
				'tax_query' => array(
				    'relation'=>'OR',
                    array(
                       'taxonomy'=>'category',
                        'field'=>'slug',
                        'terms'=>array('Uncategorized')
                    ),
					array(
						'taxonomy'=>'post_tag',
						'field'=>'slug',
						'terms'=>array('special')
					)
                )
			)
		);
		while ( $_p->have_posts() ) {
		    $_p->the_post();
			?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2></a>
			<?php
		}
		wp_reset_query();
		?>
        <div class="container post-pagination">
            <div class="row">
                <div class="col-md-12">
				    <?php
				    echo paginate_links( array(
					    'total'     => $_p->max_num_pages,
					    'current'   => $paged,
					    'prev_next' => false,
				    ) );
				    ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>