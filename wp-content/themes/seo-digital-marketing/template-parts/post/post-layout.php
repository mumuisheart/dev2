<?php
/**
 * Template part for post layout
 *
 * @subpackage SEO Digital Marketing
 * @since 1.0
 */
?>
<?php
$seo_digital_marketing_post_option = get_theme_mod( 'seo_digital_marketing_post_option','right_sidebar');
if($seo_digital_marketing_post_option == 'right_sidebar'){ ?>
<div class="content_area col-lg-8 col-md-8">
    <section id="post_section">
        <div class="row">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/post/content',get_post_format()  );
                    endwhile;
                else :
                    get_template_part( 'template-parts/post/content', 'none' );
                endif;
            ?>
        </div>
        <div class="navigation">
            <?php
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'seo-digital-marketing' ),
                'next_text'          => __( 'Next page', 'seo-digital-marketing' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'seo-digital-marketing' ) . ' </span>',
            ) );
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
</div>
<div id="sidebar" class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
<?php }
else if($seo_digital_marketing_post_option == 'left_sidebar'){ ?>
<div id="sidebar" class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
<div class="content_area col-lg-8 col-md-8">
    <section id="post_section">
        <div class="row">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/post/content',get_post_format()  );
                    endwhile;
                else :
                    get_template_part( 'template-parts/post/content', 'none' );
                endif;
            ?>
        </div>
        <div class="navigation">
            <?php
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'seo-digital-marketing' ),
                'next_text'          => __( 'Next page', 'seo-digital-marketing' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'seo-digital-marketing' ) . ' </span>',
            ) );
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
</div>
<?php } 
else if($seo_digital_marketing_post_option == 'one_column'){ ?>
<div class="content_area col-lg-12 col-md-12">
    <section id="post_section">
        <div class="row">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/post/content',get_post_format()  );
                    endwhile;
                else :
                    get_template_part( 'template-parts/post/content', 'none' );
                endif;
            ?>
        </div>
        <div class="navigation">
            <?php
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'seo-digital-marketing' ),
                'next_text'          => __( 'Next page', 'seo-digital-marketing' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'seo-digital-marketing' ) . ' </span>',
            ) );
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
</div>
<?php }
else if($seo_digital_marketing_post_option == 'three_column'){ ?>
<div id="sidebar" class="col-lg-3 col-md-3 custom-sidebar-class"><?php dynamic_sidebar('sidebar-3'); ?></div>
<div class="content_area col-lg-6 col-md-6">
    <section id="post_section">
        <div class="row">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/post/content',get_post_format()  );
                    endwhile;
                else :
                    get_template_part( 'template-parts/post/content', 'none' );
                endif;
            ?>
        </div>
        <div class="navigation">
            <?php
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'seo-digital-marketing' ),
                'next_text'          => __( 'Next page', 'seo-digital-marketing' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'seo-digital-marketing' ) . ' </span>',
            ) );
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
</div>
<div id="sidebar" class="col-lg-3 col-md-3 custom-sidebar-class"><?php get_sidebar(); ?></div>
<?php }
else if($seo_digital_marketing_post_option == 'four_column'){ ?>
<div id="sidebar" class="col-lg-3 col-md-3 custom-sidebar-class"><?php dynamic_sidebar('sidebar-3'); ?></div>
<div class="content_area col-lg-3 col-md-3">
    <section id="post_section">
        <div class="row">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/post/content',get_post_format()  );
                    endwhile;
                else :
                    get_template_part( 'template-parts/post/content', 'none' );
                endif;
            ?>
        </div>
        <div class="navigation">
            <?php
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'seo-digital-marketing' ),
                'next_text'          => __( 'Next page', 'seo-digital-marketing' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'seo-digital-marketing' ) . ' </span>',
            ) );
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
</div>
<div id="sidebar" class="col-lg-3 col-md-3 custom-sidebar-class"><?php dynamic_sidebar('sidebar-2'); ?></div>
<div id="sidebar" class="col-lg-3 col-md-3 custom-sidebar-class"><?php get_sidebar(); ?></div>
<?php }
else if($seo_digital_marketing_post_option == 'grid_sidebar'){ ?>
<div class="content_area col-lg-8 col-md-8">
    <section id="post_section">
        <div class="row">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/post/grid',get_post_format()  );
                    endwhile;
                else :
                    get_template_part( 'template-parts/post/content', 'none' );
                endif;
            ?>
        </div>
        <div class="navigation">
            <?php
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'seo-digital-marketing' ),
                'next_text'          => __( 'Next page', 'seo-digital-marketing' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'seo-digital-marketing' ) . ' </span>',
            ) );
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
</div>
<div id="sidebar" class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
<?php }
else if($seo_digital_marketing_post_option == 'grid_left_sidebar'){ ?>
<div id="sidebar" class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
<div class="content_area col-lg-8 col-md-8">
    <section id="post_section">
        <div class="row">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/post/grid',get_post_format()  );
                    endwhile;
                else :
                    get_template_part( 'template-parts/post/content', 'none' );
                endif;
            ?>
        </div>
        <div class="navigation">
            <?php
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'seo-digital-marketing' ),
                'next_text'          => __( 'Next page', 'seo-digital-marketing' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'seo-digital-marketing' ) . ' </span>',
            ) );
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
</div>
<?php }
if($seo_digital_marketing_post_option == 'grid_post'){ ?>
<div class="content_area col-lg-12 col-md-12">
    <section id="post_section">
        <div class="row">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/post/grid',get_post_format()  );
                    endwhile;
                else :
                    get_template_part( 'template-parts/post/content', 'none' );
                endif;
            ?>
        </div>
        <div class="navigation">
            <?php
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'seo-digital-marketing' ),
                'next_text'          => __( 'Next page', 'seo-digital-marketing' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'seo-digital-marketing' ) . ' </span>',
            ) );
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
</div>
<?php }