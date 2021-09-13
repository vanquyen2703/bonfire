<?php
global $wp_query;
$blog_archive_layout = Themebase_Post::blog_layout();
$blog_column = Themebase_Post::blog_columns();
$current_page = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
$animation = Themebase::setting('blog_css_animation');
$blog_meta_enable = Themebase::setting('blog_archive_meta_enable');
$blog_meta = Themebase::setting('blog_archive_meta');
$blog_meta_list_style_2 = Themebase::setting('blog_archive_meta_list_style_2');
$desc_enable = Themebase::setting('blog_archive_desc_enable');
$blog_pagination = Themebase::setting('blog_archive_pagination');
$blog_layout = Themebase::setting('blog_archive_layout');
$blog_layout_list_style = Themebase::setting('blog_archive_layout_list_style');
$limit_desc = Themebase::setting('limit_desc');
$i = 1;
if (is_category()) {
    $blog_layout = themebase_get_meta_value('blog_layout', false);
    $blog_layout_list_style = themebase_get_meta_value('blog_list_style', false);
    if ($blog_layout === '') {
        $blog_layout = 'list';
    }
    if (isset($blog_pagination) || $blog_pagination == 'default') {
        $blog_pagination = Themebase::setting('blog_archive_pagination');
    } else {
        $blog_pagination = themebase_get_meta_value('post_pagination', false);
    }
}
$blog_layout_list_style_class = '';
if ($blog_layout_list_style === 'style_2' && $blog_layout === 'list') {
    $blog_layout_list_style_class = 'blog-list-style-2';
} else {
    $blog_layout_list_style_class = '';
}

?>
    <div class="row load-item blog-entries-wrap <?php echo esc_attr($blog_archive_layout); ?> <?php echo esc_attr($blog_layout_list_style_class); ?>">
        <?php while (have_posts()) : the_post(); ?>
            <?php
            $format_class = '';
            if (get_post_format() === 'quote') {
                $format_class = 'post-quote';
            } elseif (get_post_format() === 'link') {
                $format_class = 'post-link';
            } elseif (get_post_format() === 'audio') {
                $format_class = 'post-audio';
            } elseif (get_post_format() === 'video') {
                $format_class = 'post-video';
            } elseif (get_post_format() === 'image') {
                $format_class = 'post-image blog-has-img';
            } elseif (has_post_thumbnail()) {
                $format_class = 'blog-has-img';
            } else {
                $format_class = "";
            }
            ?>
            <div class="item animate-top <?php echo esc_attr($blog_column); ?> item-page<?php echo esc_attr($current_page); ?>">
                <div class="blog-item  <?php echo esc_attr($format_class); ?>  <?php if (!has_post_thumbnail() && get_post_format() !== 'quote' && get_post_format() !== 'link' && get_post_format() !== 'audio') {
                    echo 'no-image';
                } ?> <?php if (get_post_format() === 'gallery') {
                    echo 'item-gallery';
                } ?> <?php if (is_sticky()) {
                    echo 'post_sticky';
                } ?>">
                    <?php themebase_get_post_media(); ?>
                    <div class="blog-post-info">
                        <?php if (is_sticky()): ?>
                            <div class="icon-sticky"><i class="theme-icon-ray"></i></div>
                        <?php endif; ?>
                        <?php if ($blog_layout_list_style === 'style_2' && $blog_layout === 'list') : ?>
                            <h4 class="post-name"><a href="<?php the_permalink(); ?>"
                                                     title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <?php
                            if ($blog_meta_enable):
                                if (!empty($blog_meta_list_style_2)) {
                                    ?>
                                    <div class="info-post">
                                        <?php foreach ($blog_meta_list_style_2 as $value) {
                                            if (in_array($value, $blog_meta_list_style_2, true)) { ?>
                                                <?php if ($value === 'date'): ?>
                                                    <div class="info default-date">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php echo get_the_date(); ?>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($value === 'author'): ?>
                                                    <div class="info author-post">
                                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>">
                                                            <?php the_author(); ?>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($value === 'comment'): ?>
                                                    <div class="info info-comment">
                                                        <?php comments_popup_link(esc_html__('Comment (0)', 'themebase'), esc_html__('Comment (1)', 'themebase'), esc_html__('Comments (%)', 'themebase')); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($value === 'tags'): ?>
                                                    <?php
                                                    $tag = get_the_tag_list(' ', ', ', ' ');
                                                    if (!empty($tag)) {
                                                        echo '<div class="info info-tag">&nbsp;';
                                                        echo get_the_tag_list(' ', ',&nbsp;', ' ');
                                                        echo '</div>';
                                                    }
                                                    ?>
                                                <?php endif; ?>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                            endif; ?>
                        <?php endif; ?>
                        <?php if ($blog_layout === 'list') : ?>
                        <div class="content-info">
                            <?php endif; ?>
                            <?php if (($blog_layout !== 'list') || ($blog_layout_list_style !== 'style_2' && $blog_layout === 'list')) : ?>
                                <?php
                                if ($blog_meta_enable):
                                    if (!empty($blog_meta)) {
                                        ?>
                                        <div class="info-post">
                                            <?php foreach ($blog_meta as $value) {
                                                if (in_array($value, $blog_meta, true)) { ?>
                                                    <?php if ($value === 'date'): ?>
                                                        <div class="info default-date">
                                                            <i class="theme-icon-calendar"></i> <a
                                                                    href="<?php the_permalink(); ?>">
                                                                <?php echo get_the_date(); ?>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($value === 'author'): ?>
                                                        <div class="info author-post">
                                                            <i class="theme-icon-user1"></i>
                                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>">
                                                                <?php the_author(); ?>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($value === 'comment'): ?>
                                                        <div class="info info-comment">
                                                            <?php if ($blog_layout_list_style === 'style_1' && $blog_layout === 'list') : ?>
                                                                <?php comments_popup_link(esc_html__('Comment (0)', 'themebase'), esc_html__('Comment (1)', 'themebase'), esc_html__('Comments (%)', 'themebase')); ?>
                                                            <?php else: ?>
                                                                <i class="theme-icon-comment"></i>  <?php comments_popup_link(esc_html__('(0)', 'themebase'), esc_html__('(1)', 'themebase'), esc_html__('(%)', 'themebase')); ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($value === 'tags'): ?>
                                                        <?php
                                                        $tag = get_the_tag_list(' ', ', ', ' ');
                                                        if (!empty($tag)) {
                                                            echo '<div class="info info-tag">&nbsp;';
                                                            echo '<i class="theme-icon-tag"></i>';
                                                            echo get_the_tag_list(' ', ',&nbsp;', ' ');
                                                            echo '</div>';
                                                        }
                                                        ?>
                                                    <?php endif; ?>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                endif;
                                ?>
                                <h4 class="post-name"><a href="<?php the_permalink(); ?>"
                                                         title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                </h4>
                            <?php endif; ?>
                            <?php if (($blog_layout !== 'list') || ($blog_layout_list_style !== 'style_2' && $blog_layout === 'list')) : ?>
                                <?php
                                $excerpt = get_the_excerpt();
                                if ($desc_enable && !empty($excerpt)) {
                                    echo '<div class= "blog_post_desc">';
                                    themebase_limit_excerpt($limit_desc);
                                    echo '</div>';
                                    wp_link_pages(array(
                                        'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'themebase') . '</span>',
                                        'after' => '</div>',
                                        'link_before' => '<span>',
                                        'link_after' => '</span>',
                                        'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'themebase') . ' </span>%',
                                        'separator' => '<span class="screen-reader-text">, </span>',
                                    ));
                                }
                                ?>
                                <div class="read_more">
                                    <a href="<?php the_permalink(); ?>"><?php echo esc_html__('Read more', 'themebase'); ?></a>
                                </div>
                            <?php endif; ?>
                            <?php if ($blog_layout === 'list') : ?>
                        </div>
                    <?php endif; ?>
                    </div>

                    <?php if ($blog_layout_list_style === 'style_2' && $blog_layout === 'list') : ?>
                        <?php
                        $excerpt = get_the_excerpt();
                        if ($desc_enable && !empty($excerpt)) {
                            echo '<div class= "blog_post_desc">';
                            themebase_limit_excerpt($limit_desc);
                            echo '</div>';
                            wp_link_pages(array(
                                'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'themebase') . '</span>',
                                'after' => '</div>',
                                'link_before' => '<span>',
                                'link_after' => '</span>',
                                'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'themebase') . ' </span>%',
                                'separator' => '<span class="screen-reader-text">, </span>',
                            ));
                        }
                        ?>
                        <div class="read_more">
                            <a href="<?php the_permalink(); ?>"><?php echo esc_html__('Continue reading', 'themebase'); ?></a>
                        </div>
                        <?php if (Themebase::setting('blog_archive_share_enable') === '1') : ?>
                            <div class="action">
                                <?php Themebase_Templates::blog_sharing(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php $i++; ?>
        <?php endwhile; ?>
    </div>

	<?php if ($blog_pagination === "load_more"): ?>
		<?php if (get_next_posts_link()) { ?>
			<div class="pagination-content type-loadmore load_more_button text-center"
				 rel="<?php echo esc_attr($wp_query->max_num_pages); ?>" data-paged="<?php echo esc_attr($current_page) ?>"
				 data-totalpage="<?php echo esc_attr($wp_query->max_num_pages) ?>">
				<?php echo get_next_posts_link(esc_html__('Load More', 'themebase')); ?>

			</div>
		<?php } ?>
	<?php endif; ?>
	<?php if ($blog_pagination === "next_prev"): ?>
		<?php if (get_previous_posts_link() || get_next_posts_link()): ?>
			<ul class="pagination-content type-arrow">
				<?php if (get_previous_posts_link()): ?>
					<li class="pagination_button_prev"><?php previous_posts_link('<button class="btn-next"><span class="theme-icon-back"></span></button>'); ?></li>
				<?php endif; ?>
				<?php if (get_next_posts_link()): ?>
					<li class="pagination_button_next"><?php next_posts_link('<button class="btn-next"><span class="theme-icon-next"></span></button>'); ?></li>
				<?php endif; ?>
			</ul>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ($blog_pagination === "number"): ?>
		<div class="pagination-content type-number text-center">
			<?php Themebase_Templates::paging_nav(); ?>
		</div>
	<?php endif; ?>