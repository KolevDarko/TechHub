<?php
/*
Template Name: Blog page
*/ 
get_header(); ?> 

              <ul class="mcol">
              <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
              	<li class="article" id="post-<?php the_ID(); ?>">
                
			<?php
			if ( has_post_thumbnail() ) { ?>
                    	<?php 
                    	$imgsrcparam = array(
						'alt'	=> trim(strip_tags( $post->post_excerpt )),
						'title'	=> trim(strip_tags( $post->post_title )),
						);
                    	$thumbID = get_the_post_thumbnail( $post->ID, 'background', $imgsrcparam ); ?>
                        <div class="preview"><a href="<?php the_permalink() ?>"><?php echo "$thumbID"; ?></a></div>
                    
                    <?php } else {?>
                        <div class="preview"><a href="<?php the_permalink() ?>"><img src="<?php bloginfo('template_url'); ?>/images/default-thumbnail.jpg" alt="<?php the_title(); ?>" /></a></div>
                    <?php } ?>
                    
                    <div class="article-over">
                      <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                      <?php the_excerpt(); ?>
                      <div class="postmetadata">
                          Posted: <?php the_time(__('F jS, Y', 'kubrick')) ?>&nbsp;&#721;&nbsp;
                          <?php comments_popup_link(__('Нема Коментари'), __('1 Коментар'), __('% Коментари'), '', __('Коментарите се забранети') ); ?><br />
                          <?php printf(__('Категорија: %s'), get_the_category_list(', ')); ?>
                      </div>
                    </div>
                </li> <?php ?>
            <?php endwhile; ?>
            <?php else : ?>
            <?php endif; ?>
            </ul>

            <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
            <?php endwhile; ?>
            <?php else : ?>
                <h1 id="error"><?php _e("Нема резултати."); ?></h1>
            <?php endif; ?>


            <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

<?php get_footer(); ?>
