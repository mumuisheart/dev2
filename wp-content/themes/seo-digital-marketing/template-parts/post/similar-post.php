<?php
/**
 * The template for displaying similar posts
 * 
 * @subpackage SEO Digital Marketing
 * @since 1.0
 */

$seo_digital_marketing_post_args = array(
    'posts_per_page'    => '3',
    'orderby'           => 'rand',
    'post__not_in'      => array( get_the_ID() ),
);

$related = wp_get_post_terms( get_the_ID(), 'category' );
$seo_digital_marketing_ids = array();
foreach( $related as $term ) {
    $seo_digital_marketing_ids[] = $term->term_id;
}

$seo_digital_marketing_post_args['category__in'] = $seo_digital_marketing_ids; 

$related_posts = new WP_Query( $seo_digital_marketing_post_args );

if ( $related_posts->have_posts() ) : ?>
    <div id="Category-section" class="similar-post">
        <h3 class="text-center pb-3"><?php echo esc_html(get_theme_mod('seo_digital_marketing_similar_text',__('Explore More','seo-digital-marketing'))); ?></h3>
        <div class="row">
            <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="postbox smallpostimage p-3">
                        <?php $blog_archive_ordering = get_theme_mod('archieve_post_order', array('title', 'image', 'meta','excerpt','btn'));
                        foreach ($blog_archive_ordering as $post_data_order) :
                            if ('title' === $post_data_order) :?>
                                <h3 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                            <?php elseif ('image' === $post_data_order) :?>
                                <?php
                                    if(has_post_thumbnail()) { ?>
                                    <div class="box-content-post text-center">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                <?php }?>
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
            <?php endwhile; ?>
        </div>
    </div>
<?php endif;
wp_reset_postdata();