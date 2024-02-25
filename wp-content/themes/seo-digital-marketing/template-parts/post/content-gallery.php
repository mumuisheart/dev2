<?php
/**
 * Template part for displaying posts
 *
 * @subpackage SEO Digital Marketing
 * @since 1.0
 */
?>

<div id="Category-section" class="entry-content">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="postbox smallpostimage p-3">
			<?php $blog_archive_ordering = get_theme_mod('archieve_post_order', array('title', 'image', 'meta','excerpt','btn'));
			foreach ($blog_archive_ordering as $post_data_order) :
				if ('title' === $post_data_order) :?>
				    <h3 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
				<?php elseif ('image' === $post_data_order) :?>
					<div class="post-gallery">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						    <div class="carousel-inner" role="listbox">
						      	<?php
							    $gallery_images = get_post_gallery_images();
							      	if (!empty($gallery_images)) {
								        $is_first_item = true;
								        foreach ($gallery_images as $gallery_image) {
								          echo '<div class="carousel-item' . ($is_first_item ? ' active' : '') . '">';
								          echo '<img src="' . esc_url($gallery_image) . '"/>';
								          echo '</div>';
								          $is_first_item = false;
								        }
							      	}
							    ?>
						    </div>
						    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
						    </a>
						    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
						    </a>
						</div>
					</div>
				<?php elseif ('meta' === $post_data_order) :?>
				    <div class="date-box mb-2 text-center">
						<?php if( get_option('seo_digital_marketing_date',false) != 'off'){ ?>
							<span class="mr-2"><i class="<?php echo esc_attr(get_theme_mod('seo_digital_marketing_date_icon','far fa-calendar-alt')); ?> mr-2"></i><?php the_time( get_option( 'date_format' ) ); ?></span>
						<?php } ?>
						<?php if( get_option('seo_digital_marketing_admin',false) != 'off'){ ?>
							<span class="entry-author mr-2"><i class="<?php echo esc_attr(get_theme_mod('seo_digital_marketing_author_icon','fas fa-user')); ?> mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
						<?php }?>
						<?php if( get_option('seo_digital_marketing_comment',false) != 'off'){ ?>
							<span class="entry-comments mr-2"><i class="<?php echo esc_attr(get_theme_mod('seo_digital_marketing_comment_icon','fas fa-comments')); ?> mr-2"></i> <?php comments_number( __('0 Comments','seo-digital-marketing'), __('0 Comments','seo-digital-marketing'), __('% Comments','seo-digital-marketing')); ?></span>
						<?php }?>
						<?php if( get_option('seo_digital_marketing_tag',false) != 'off'){ ?>
							<span class="tags"><i class="<?php echo esc_attr(get_theme_mod('seo_digital_marketing_tag_icon','fas fa-tags')); ?> mr-2"></i> <?php display_post_tag_count(); ?></span>
						<?php }?>
					</div>
				<?php elseif ('excerpt' === $post_data_order) :?>
				    <p class="text-center"><?php seo_digital_marketing_custom_excerpt(); ?></p>
				<?php elseif ('btn' === $post_data_order) :?>
				    <div class="link-more mb-2 text-center">
						<a class="more-link" href="<?php echo esc_url( get_permalink() );?>"><?php echo esc_html(get_theme_mod('seo_digital_marketing_read_more_text',__('Read More','seo-digital-marketing'))); ?><i class="<?php echo esc_attr(get_theme_mod('seo_digital_marketing_read_more_icon','fas fa-arrow-right')); ?> ml-2"></i></a>
			  		</div>
				<?php endif;
			endforeach;
			?>       
		  	<div class="clearfix"></div>
		</div>
	</div>
</div>