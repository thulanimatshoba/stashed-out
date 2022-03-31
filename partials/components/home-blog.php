<h2 class="widget-title uk-text-center uk-padding-small"><?php _e('Latest Blog'); ?> </h2>

<div uk-slider="autoplay: false; autoplay-interval: 9000">
    <div class="uk-position-relative uk-visible-toggle">
        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-3@m uk-grid">
            <?php
            if (is_page()) {
                $cat = get_cat_ID('Uncategorized'); //use page title to get a category ID
                $posts = get_posts("cat=$cat&showposts=4");

                if ($posts) {
                    foreach ($posts as $post) :
                        setup_postdata($post); ?>
                        <li class="blog-item">
                            <div class="blog-header">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
                                        the_post_thumbnail('featured-thumb', ['class' => 's']);
                                    } else {
                                        stashed_out_default_image();
                                    } ?>
                                </a>

                                <div class="uk-meta">
                                    <span class="date"><?php the_time('j.F.Y') ?></span>
                                    <span class="uk-margin-small-right"><i class="fa fa-eye"></i>
                                        <?php $views = stashed_out_get_post_views(get_the_ID());
                                        if (stashed_out_get_post_views(get_the_ID()) == 1) {
                                            printf(__('%d View', 'stashed_out'), $views);
                                        } else {
                                            printf(__('%d views', 'stashed_out'), $views);
                                        }
                                        ?>
                                        | <span class="post-comments">
                                            <i class="fa fa-comments"> <?php comments_number(0, 1, '%'); ?></i>
                                        </span>
                                </div>
                            </div>

                            <div class="blog-content">
                                <?php if (strlen(the_title('', '', FALSE)) > 16) {
                                    $title_short = substr(the_title('', '', FALSE), 0, 16);
                                    preg_match('/^(.*)\s/s', $title_short, $matches);
                                    if ($matches[1]) $title_short = $matches[1];
                                    $title_short = $title_short . ' ...';
                                } else {
                                    $title_short = the_title('', '', FALSE);
                                } ?>

                                <a class="the-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <h4><?php the_title(); ?></h4>
                                </a>
                                <p><?php //echo wp_trim_excerpt();
                                    ?></p>
                            </div>
                        </li>
            <?php endforeach;

                    wp_reset_postdata();
                }
            }
            ?>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>