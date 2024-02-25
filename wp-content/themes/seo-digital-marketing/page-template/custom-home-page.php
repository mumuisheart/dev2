<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_option('seo_digital_marketing_hide_show') == '1'){ ?>
    <section id="slider">
      <span class="design-right"></span>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php
          for ( $i = 1; $i <= 4; $i++ ) {
            $mod =  get_theme_mod( 'seo_digital_marketing_post_setting' . $i );
            if ( 'page-none-selected' != $mod ) {
              $seo_digital_marketing_slide_post[] = $mod;
            }
          }
           if( !empty($seo_digital_marketing_slide_post) ) :
          $args = array(
            'post_type' =>array('post'),
            'post__in' => $seo_digital_marketing_slide_post,
            'ignore_sticky_posts'  => true, // Exclude sticky posts by default
          );

          // Check if specific posts are selected
          if (empty($seo_digital_marketing_slide_post) && is_sticky()) {
              $args['post__in'] = get_option('sticky_posts');
          }

          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php if(has_post_thumbnail()){ ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>"/>
            <?php }else { ?><div class="bg-color"></div> <?php } ?>
            <div class="carousel-caption slider-inner">
              <a href="<?php the_permalink(); ?>"><h2 class="slider-title"><?php the_title();?></h2></a>
              <?php if( get_option('seo_digital_marketing_slider_excerpt_show_hide',false) != 'off'){ ?>
                <p class="slider-excerpt mb-0"><?php echo wp_trim_words(get_the_content(), get_theme_mod('seo_digital_marketing_slider_excerpt_count',25) );?></p>
              <?php } ?>
              <div class="home-btn my-4">
                <a class="py-3 px-4" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('seo_digital_marketing_slider_read_more',__('READ MORE','seo-digital-marketing'))); ?><i class="fas fa-chevron-right ml-3"></i></a>
              </div>
            </div>
          </div>
          <?php $i++; endwhile;
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-right"></i></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>
  <?php if( get_option('seo_digital_marketing_skill_enable') == '1'){ ?>
    <section id="skill" class="py-5">
      <div class="container">
        <div class="row pt-5">
          <?php $skill = get_theme_mod('seo_digital_marketing_skill_increament');
          for ($i=1; $i <= $skill; $i++) { ?>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <?php if( get_theme_mod('seo_digital_marketing_skill_box_icon'.$i) != '' || get_theme_mod('seo_digital_marketing_skill_box_number'.$i) || get_theme_mod('seo_digital_marketing_skill_box_title'.$i) || get_theme_mod('seo_digital_marketing_skill_box_image'.$i,'') ){ ?>
                <div class="skill-box mb-4">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 text-center align-self-center">
                      <div class="skill-icon">
                        <?php if( get_theme_mod('seo_digital_marketing_skill_box_icon'.$i) != '' ){ ?>
                          <i class="<?php echo esc_html(get_theme_mod('seo_digital_marketing_skill_box_icon'.$i)); ?>"></i>
                        <?php }?>
                        <?php if( get_theme_mod('seo_digital_marketing_skill_box_number'.$i) != '' ){ ?>
                          <h4 class="mt-3"><?php echo esc_html(get_theme_mod('seo_digital_marketing_skill_box_number'.$i)); ?></h4>
                        <?php }?>
                        <?php if( get_theme_mod('seo_digital_marketing_skill_box_title'.$i) != '' ){ ?>
                          <p class="mb-0"><?php echo esc_html(get_theme_mod('seo_digital_marketing_skill_box_title'.$i)); ?></p>
                        <?php }?>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 text-center text-md-right align-self-center">
                      <?php if( get_theme_mod('seo_digital_marketing_skill_box_image'.$i) != '' ){ ?>
                        <img src="<?php echo esc_url(get_theme_mod('seo_digital_marketing_skill_box_image'.$i,'')); ?>">
                      <?php }?>
                    </div>
                  </div>
                </div>
              <?php }?>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php }?>
  <section id="custom-page-content" <?php if ( have_posts() && trim( get_the_content() ) !== '' ) echo 'class="pt-3"'; ?>>
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
  </section> 
</main>

<?php get_footer(); ?>