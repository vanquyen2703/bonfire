<?php
function themebase_pingback_header() {
	echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
}
add_action( 'wp_head', 'themebase_pingback_header' );
// Customs icon markers
if ( class_exists( 'WP_Store_locator' ) ) {
    add_filter( 'wpsl_admin_marker_dir', 'themebase_custom_admin_marker_dir' );
    add_filter( 'wpsl_marker_props', 'themebase_custom_marker_props' );
    function themebase_custom_admin_marker_dir() {
        $admin_marker_dir = get_stylesheet_directory() . '/wpsl-markers/';
        return $admin_marker_dir;
    }
    function themebase_custom_marker_props( $marker_props ) {
        $marker_props['scaledSize'] = '36,53'; // Set this to 50% of the original size
        $marker_props['origin'] = '0,0';
        $marker_props['anchor'] = '18,35';
        
        return $marker_props;
    }
    define( 'WPSL_MARKER_URI', dirname( get_bloginfo( 'stylesheet_url') ) . '/wpsl-markers/' );
}

if ( ! function_exists( 'themebase_get_search_form' ) ) {
    function themebase_get_search_form() {
        $template = get_search_form(false);  
        $output = '';
        ob_start();
        ?>
       <?php echo wp_kses($template,themebase_allow_html()); ?>     
        <?php
        $output .= ob_get_clean();
        return $output;
    }
}

if( defined( 'YITH_WCWL' ) && ! function_exists( 'themebase_yith_wcwl_ajax_update_count' ) ){
function themebase_yith_wcwl_ajax_update_count(){
wp_send_json( array(
'count' => yith_wcwl_count_all_products()
) );
}
add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'themebase_yith_wcwl_ajax_update_count' );
add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'themebase_yith_wcwl_ajax_update_count' );
}
function categories_postcount_filter ($variable) {
   $variable = str_replace('(', '<span class="post_count"> ', $variable);
   $variable = str_replace(')', ' </span>', $variable);
   return $variable;
}
add_filter('wp_list_categories','categories_postcount_filter');
function archive_postcount_filter ($variable) {
   $variable = str_replace('(', '<span class="post_count"> ', $variable);
   $variable = str_replace(')', ' </span>', $variable);
   return $variable;
}
add_filter('get_archives_link','archive_postcount_filter');
function themebase_get_meta_value($meta_key, $boolean = false) {
    global $wp_query, $themebase_settings;

    $value = '';
    if (is_category()) {
        $cat = $wp_query->get_queried_object();
        $value = get_metadata('category', $cat->term_id, $meta_key, true);     
    } elseif(is_tax('product_cat')){
        $cat = $wp_query->get_queried_object();
        $value = get_metadata('product_cat', $cat->term_id, $meta_key, true);        
    } elseif(is_tax()){
        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
        if ($term) {
            $value = get_metadata($term->taxonomy, $term->term_id, $meta_key, true);
        }   
    }elseif (is_archive()) {
        if (function_exists('is_shop') && is_shop())  {
            $value = get_post_meta(wc_get_page_id( 'shop' ), $meta_key, true);
        } else {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if ($term) {
                $value = get_metadata($term->taxonomy, $term->term_id, $meta_key, true);
            }

        }
    } else {
        if (is_singular()) {
            $value = get_post_meta(get_the_id(), $meta_key, true);
        } else {
            if (!is_home() && is_front_page()) {
                if (isset($themebase_settings[$meta_key]))
                    $value = $themebase_settings[$meta_key];
            } elseif (is_home() && !is_front_page()) {

                if (isset($themebase_settings['blog-'.$meta_key])){
                    $value = $themebase_settings['blog-'.$meta_key];
                }else{
                    $value = get_post_meta(get_queried_object_id(), $meta_key, true);
                }
            } elseif (is_home() || is_front_page()) {
                if (isset($themebase_settings[$meta_key]))
                    $value = $themebase_settings[$meta_key];
            }
        }
    }

    if ($boolean) {
        $value = ($value != $meta_key) ? true : false;
    }

    return $value;
}
    
if (!function_exists('themebase_is_woocommerce_activated')) {
    /**
     * Query WooCommerce activation
     */
    function themebase_is_woocommerce_activated()
    {
        return class_exists('WooCommerce') ? true : false;
    }
}
if( !function_exists('themebase_get_layout_class')){
    /**
     * Return layout class when sidebar displays
     * 
     * @return [string] [themebase_class]
     */
    function themebase_get_layout_class(){
        $themebase_class = '';
        $themebase_layout = Themebase_Helper::get_post_meta('layout');
        $themebase_sidebar_left =  Themebase_Global::get_left_sidebar();
        $themebase_sidebar_right =  Themebase_Global::get_right_sidebar();
        /** Sidebar left & right  */
        if ($themebase_sidebar_left && $themebase_sidebar_right && is_active_sidebar($themebase_sidebar_left) && is_active_sidebar($themebase_sidebar_right)){
            $themebase_class .= 'col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 main-sidebar has-sidebar';
        /** Only sidebar left  */
        }elseif($themebase_sidebar_left && (!$themebase_sidebar_right|| $themebase_sidebar_right=="none") && is_active_sidebar($themebase_sidebar_left)){
            $themebase_class .= 'f-right col-lg-9 col-md-12 col-sm-12 col-xs-12 main-sidebar has-sidebar';
        /** Only sidebar right  */
        }elseif((!$themebase_sidebar_left || $themebase_sidebar_left=="none") && $themebase_sidebar_right && is_active_sidebar($themebase_sidebar_right)){
            $themebase_class .= 'col-lg-9 col-md-12 col-sm-12 col-xs-12 main-sidebar has-sidebar';
        /** No sidebar  */
        }else {
            $themebase_class .= 'col-lg-12 col-md-12 col-sm-12 col-xs-12 main-sidebar';
            if($themebase_layout == 'fullwidth'){
                $themebase_class .= ' col-md-12';
            }
        }
        return $themebase_class;
    }
}
if(!function_exists('themebase_allow_html')){
    function themebase_allow_html(){
        return array(
            'form'=>array(
                'role' => array(),
                'method'=> array(),
                'class'=> array(),
                'action'=>array(),
                'id'=>array(),
                ),
            'input' => array(
                'type' => array(),
                'name'=> array(),
                'class'=> array(),
                'title'=>array(),
                'id'=>array(), 
                'value'=> array(), 
                'placeholder'=>array(), 
                'autocomplete' => array(),
                'data-number' => array(),
                'data-keypress' => array(),                        
                ),
            'button' => array(
                'type' => array(),
                'name'=> array(),
                'class'=> array(),
                'title'=>array(),
                'id'=>array(),                            
                ),  
            'img'=> array(
                'src' => array(),
                'alt' => array(),
                'class'=> array(),
                ),                      
            'div'=>array(
                'class'=> array(),
                ),
            'h4'=>array(
                'class'=> array(),
                ),
            'a'=>array(
                'class'=> array(),
                'href'=>array(),
                'onclick' => array(),
                'aria-expanded' => array(),
                'aria-haspopup' => array(),
                'data-toggle' => array(),
                ),
            'i' => array(
                'class'=> array(),
            ),
            'p' => array(
                'class'=> array(),
            ), 
            'br' => array(),
            'span' => array(
                'class'=> array(),
                'onclick' => array(),
                'style' => array(),
            ), 
            'strong' => array(
                'class'=> array(),
            ),  
            'ul' => array(
                'class'=> array(),
            ),  
            'li' => array(
                'class'=> array(),
            ), 
            'del' => array(),
            'ins' => array(),
            'select'=> array(
                'class' => array(),
                'name' => array(),
            ),
            'option'=> array(
                'class' => array(),
                'value' => array(),
            ),        
        );
    }
}

function themebase_ajax_qty_cart() {

    // Set item key as the hash found in input.qty's name
    $cart_item_key = $_POST['hash'];

    // Get the array of values owned by the product we're updating
    $threeball_product_values = WC()->cart->get_cart_item( $cart_item_key );

    // Get the quantity of the item in the cart
    $threeball_product_quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( "/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT)) ), $cart_item_key );

    // Update cart validation
    $passed_validation  = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $threeball_product_values, $threeball_product_quantity );

    // Update the quantity of the item in the cart
    if ( $passed_validation ) {
        WC()->cart->set_quantity( $cart_item_key, $threeball_product_quantity, true );
    }

    // Refresh the page
    $result = ['html'=>wc_get_template_html( '../woocommerce/cart/mini-cart.php' ),'count'=>WC()->cart->cart_contents_count];
    echo json_encode($result);
    die();

}
add_action('wp_ajax_qty_cart', 'themebase_ajax_qty_cart');
add_action('wp_ajax_nopriv_qty_cart', 'themebase_ajax_qty_cart');
function themebase_posts_per_page( $query ) {
    global $wp_query;
    $themebase_post_per_page = $themebase_portfolio_per_page_cate ='';
    $themebase_product_per_page = Themebase::setting('shop_archive_number_item');
    $themebase_portfolio_per_page = Themebase::setting('portfolio_archive_number_item');
    $single_post_related_number = Themebase::setting('single_post_related_number');
    if (is_category()){
        $category = $wp_query->get_queried_object();
        if(isset($category)){
            $cat_id = $category->term_id;
            if(get_metadata('category', $cat_id, 'post_per_page', true) != ''){
                $themebase_post_per_page = get_metadata('category', $cat_id, 'post_per_page', true);
                $query->set( 'posts_per_page', $themebase_post_per_page );
            }
        }
    }
    if (is_tax('product_cat')){
        $cat = $wp_query->get_queried_object();
        if(get_metadata('product_cat', $cat->term_id, 'product_per_page', true)  != 'default'){
            $themebase_product_per_page = get_metadata('product_cat', $cat->term_id, 'product_per_page', true);
        }
    }
    if(isset($themebase_product_per_page) && $themebase_product_per_page != ''){
        if ( !is_admin() && $query->is_main_query() && (is_post_type_archive( 'product' ) || is_tax('product_cat') ) ) {
            $query->set( 'posts_per_page', $themebase_product_per_page );
        }
    }
    if(is_tax('portfolio_cat')){
        $cate = $wp_query->get_queried_object();
        if(isset($cate)){
            $cat_id = $cate->term_id;
            if(get_metadata('portfolio_cat', $cat_id, 'post_per_page_portfolio', true)  != ' '){
                $themebase_portfolio_per_page_cate = get_metadata('portfolio_cat', $cat_id, 'post_per_page_portfolio', true);
                $query->set( 'posts_per_page', $themebase_portfolio_per_page_cate );
            }
        }
    }
    if(isset($themebase_portfolio_per_page) && $themebase_portfolio_per_page != ''){
        if ( !is_admin() && $query->is_main_query() && (is_post_type_archive( 'portfolio' ) || is_tax('portfolio_cat') ) ) {
            $query->set( 'posts_per_page', $themebase_portfolio_per_page );
        }
    }

    if(isset($single_post_related_number) && $single_post_related_number != ''){
        if ( is_single() && 'post' == get_post_type() && $query->is_main_query() && !is_admin()) {
            $query->set( 'posts_per_page', $single_post_related_number );
        }
    }
}
add_action( 'pre_get_posts', 'themebase_posts_per_page' );

function themebase_get_save_template(){
    $block_options = array();
    $args = array(
        'numberposts' => -1,
        'post_type' => 'elementor_library',
        'post_status' => 'publish',
    );
    $posts = get_posts($args);
    $block_options[0] = 'Please Select Option';
    foreach( $posts as $_post ){
        $block_options[$_post->ID] = $_post->post_title;
    }
    return $block_options;
}
function themebase_get_featured_post(){
    $block_options = array();
    $args = array(
        'numberposts' => -1,
        'post_type' => 'post',
        'post_status' => 'publish',
    );
    $posts = get_posts($args);
    $block_options[0] = 'Please Select Post'; 
    foreach( $posts as $_post ){

        $block_options[$_post->ID]  = $_post->post_title;
    }
    return $block_options;
}
function themebase_get_headers_post_type(){
    $header_type= [];
    $args = array(
        'post_type'      => 'header',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    );
    $header =get_posts( $args );
    $header_type[0] = 'Please Select Header';
    foreach( $header as $header ){
        $header_type[$header->post_name] = $header->post_title;
    }
    return $header_type;
}
function themebase_get_id_by_slug_cm($slug){
    $id='';
    $args = array(
        'name'           => $slug,
        'post_type'      => 'elementor_library',
        'post_status'    => 'publish',
        'posts_per_page' => 1
    );
    $my_posts = get_posts( $args );
    if( $my_posts ) {
        $id = $my_posts[0]->ID;
    }
    return $id;
}
function themebase_get_icon_coming_soon(){
    $icon_coming_soon= [];
    $args = array(
        'post_type'      => 'elementor_library',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    );
    $icon_cm =get_posts( $args );
    $icon_coming_soon[0] = 'Please Select Option';
    foreach( $icon_cm as $icon_cm ){
        $icon_coming_soon[$icon_cm->post_name] = $icon_cm->post_title;
    }
    return $icon_coming_soon;
}

function themebase_get_template(){
    $template_type= [];
    $args = array(
        'post_type'      => 'elementor_library',
        'post_status'    => 'publish',
        'posts_per_page' => -1
    );
    $template =get_posts( $args );
    $template_type[0] = 'Please Select Template';
    foreach( $template as $template){
        $template_type[$template->ID] = $template->post_title;
    }
    return $template_type;
}

function themebase_get_footers_post_type(){
    $footer_type= [];
    $args = array(
        'post_type'      => 'footer',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    );
    $footer =get_posts( $args );
    $footer_type[0] = 'Please Select Footer';
    foreach( $footer as $footer ){
        $footer_type[$footer->post_name] = $footer->post_title;
    }
    return $footer_type;
}
function themebase_get_id_by_slug($slug){
    $id='';
    $args = array(
        'name'           => $slug,
        'post_type'      => 'header',
        'post_status'    => 'publish',
        'posts_per_page' => 1
    );
    $my_posts = get_posts( $args );
    if( $my_posts ) {
        $id = $my_posts[0]->ID;
    }
    return $id;
}
function themebase_get_id_by_slug_footer($slug){
    $id='';
    $args = array(
        'name'           => $slug,
        'post_type'      => 'footer',
        'post_status'    => 'publish',
        'posts_per_page' => 1
    );
    $my_posts = get_posts( $args );
    if( $my_posts ) {
        $id = $my_posts[0]->ID;
    }
    return $id;
}
function themebase_get_post_media(){
    $gallery = get_post_meta(get_the_ID(), 'gallery_metabox', true);
    $blog_layout = Themebase::setting( 'blog_archive_layout' );
    $blog_layout_list_style = Themebase::setting( 'blog_archive_layout_list_style' );  
	$blog_meta_enable = Themebase::setting('blog_archive_meta_enable');
	$blog_meta = Themebase::setting('blog_archive_meta');
    if (is_category()){
        $blog_layout = themebase_get_meta_value( 'blog_layout', false);
        $blog_layout_list_style = themebase_get_meta_value( 'blog_layout_list_style', false);
    }
    $blog_id =  'blog_id-'.wp_rand();
    ?>
    <?php if ( get_post_format() === 'video') : ?>
        <?php $video = get_post_meta(get_the_ID(), 'post_video', true); ?>
        <?php if ($video && $video != ''): ?>
             <?php if(is_singular()):?>
                <div class="blog-video blog-img ">
                    <a class="fancybox" data-fancybox href="<?php echo esc_url($video); ?>">
                    <?php if ( has_post_thumbnail() ) { ?>
                        <?php
                        $full_image_size = get_the_post_thumbnail_url( null, 'full' );
                         $image_url       = Themebase_Helper::aq_resize( array(
                            'url'    => $full_image_size,
                            'width'  => 1170,
                            'height' => 600,
                        ) );
                        ?>
                        <img  src="<?php echo esc_url( $image_url ); ?>"
                             alt="<?php the_title_attribute(); ?>"/>
                        <?php
                    }
                    ?>
                    <span class="btn-video"><i class="fa fa-play" aria-hidden="true"></i></span></a>
                </div>
            <?php else: ?>
                <div class="blog-video blog-img">
					<?php
						if ($blog_meta_enable):
							if (!empty($blog_meta)) {
								?>
								<div class="category-post">
									<?php foreach ($blog_meta as $value) {
										if (in_array($value, $blog_meta, true)) { ?>
											<?php if ($value === 'categories'): ?>
												<div class="info cate-post">
													<?php
													$cate = get_the_term_list($post->ID, 'category', '', ' ');
													if (!empty($cate)) {
														echo get_the_term_list($post->ID, 'category', '', '', '');
													}
													?>
												</div>
											<?php endif; ?>
											<?php
										}
									}
									?>
								</div>
								<?php
							}
						endif; ?>
                    <a class="fancybox" data-fancybox href="<?php echo esc_url($video); ?>">
                    <?php if ( has_post_thumbnail() ) { 
                        $full_image_size = get_the_post_thumbnail_url( null, 'full' );
                        if($blog_layout  === 'grid' || $blog_layout  === 'masonry'  ) {
                            $image_url       = Themebase_Helper::aq_resize( array(
                                'url'    => $full_image_size,
                                'width'  => 570,
                                'height' => 570,
                            ) );
                        }else if($blog_layout  === 'list' && $blog_layout_list_style === 'style_2'){
							$image_url       = Themebase_Helper::aq_resize( array(
								'url'    => $full_image_size,
								'width'  => 1170,
								'height' => 570,
							) );
						}else {
                             $image_url       = Themebase_Helper::aq_resize( array(
								'url'    => $full_image_size,
								'width'  => 618,
								'height' => 496
							) );
                        } ?> 
                        <img <?php if ($blog_layout  === 'masonry') {echo 'class="no-lazyload"';} ?> src="<?php echo esc_url( $image_url ); ?>"
                             alt="<?php the_title_attribute(); ?>"/>
                        <?php
                    }
                    ?>
                <span class="btn-video"><i class="fa fa-play" aria-hidden="true"></i></span></a>      
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php elseif ( get_post_format() == 'audio') : ?>
        <?php $audio = get_post_meta(get_the_ID(), 'post_audio', true); ?>
        <?php if ($audio && $audio != ''): ?>
            <?php if(is_singular()):?>
                <div class="blog-audio">
                        <?php if(get_post_format() == 'audio'){
                            echo '<div class="audio_container">';
                        }
                        ?>                    
                            <?php echo Themebase_Helper::w3c_iframe( wp_oembed_get( $audio,  array('height'=>300 ) )); ?>
                        <?php if(get_post_format() == 'audio'){
                            echo '</div>';
                        }
                        ?>                 
                </div>
            <?php else:?>
                <div class="blog-audio">
                        <?php if(get_post_format() == 'audio'){
                            echo '<div class="audio_container">';
                        }
                        ?>                    
                            <?php echo Themebase_Helper::w3c_iframe( wp_oembed_get( $audio,  array('height'=>230 ) )); ?>
                        <?php if(get_post_format() == 'audio'){
                            echo '</div>';
                        }
                        ?>                 
                </div>
            <?php endif;?>
        <?php endif; ?>
    <?php elseif (get_post_format() =='link'):?>
        <?php 
            $link = get_post_meta(get_the_ID(), 'post_link', true); 
            $link_title = get_post_meta(get_the_ID(), 'post_link', true);
        ?>
         <?php if(is_singular()):?>
            <?php if($link && $link != ''):?>
                <div class="blog-img">
                    <?php if ( has_post_thumbnail() ) { ?>
                    <?php
                        $full_image_size = get_the_post_thumbnail_url( null, 'full' );
                         $image_url       = Themebase_Helper::aq_resize( array(
                            'url'    => $full_image_size,
                            'width'  => 1170,
                            'height' => 600,
                        ) );
                    ?>
					<?php
						if ($blog_meta_enable):
							if (!empty($blog_meta)) {
								?>
								<div class="category-post">
									<?php foreach ($blog_meta as $value) {
										if (in_array($value, $blog_meta, true)) { ?>
											<?php if ($value === 'categories'): ?>
												<div class="info cate-post">
													<?php
													$cate = get_the_term_list($post->ID, 'category', '', ' ');
													if (!empty($cate)) {
														echo get_the_term_list($post->ID, 'category', '', '', '');
													}
													?>
												</div>
											<?php endif; ?>
											<?php
										}
									}
									?>
								</div>
								<?php
							}
						endif; ?>
                        <img src="<?php echo esc_url( $image_url ); ?>"
                             alt="<?php the_title_attribute(); ?>"/>
                        <?php
                     } ?>
                      <div class="link_section clearfix">
                        <div class="link-icon">
                            <a class="link-post"  href="<?php echo esc_url(is_ssl() ? str_replace( 'http://', 'https://', $link ) : $link);?>">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                    </div>                    
                </div> 
               
            <?php endif;?>
        <?php else:?>
            <?php if($link && $link != ''):?>
                <div class="link_section clearfix">
                    <div class="link-icon">
                        <a class="link-post"  href="<?php echo esc_url(is_ssl() ? str_replace( 'http://', 'https://', $link ) : $link);?>">
                            <i class="fa fa-link"></i>
                        </a>
                    </div>
                </div>
            <?php endif;?> 
        <?php endif;?>
    <?php elseif(get_post_format() =='quote'):?>
        <?php 
            $quote_text = get_post_meta(get_the_ID(), 'post_quote_text', true); 
        ?>
        <?php if(is_singular()):?>
            <?php if($quote_text && $quote_text != ''):?>
                <div class="quote_section">
                    <blockquote class="var3">
                        <p><?php echo wp_kses($quote_text,array());?></p>
                    </blockquote>
                </div>
            <?php endif;?>  
        <?php else: ?>
            <?php if($quote_text && $quote_text != ''):?>
                    <div class="quote_section">
                        <blockquote class="var3">
                             <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php echo wp_kses( $quote_text ,array());?></a>
                        </blockquote>
                    </div>
            <?php endif;?>    
        <?php endif; ?>  
    <?php elseif(get_post_format() == 'gallery'): ?>
        <?php if (is_array($gallery) && count($gallery) > 1) : ?>   
            <?php if(is_singular()):?>
                <div class="blog-gallery-single blog-img slider"> 
                    <?php
                    $index = 0;
                    foreach ($gallery as $key => $value) :
                        $full_image_size = wp_get_attachment_image_src($value, 'full');
                        $alt = get_post_meta($value, '_wp_attachment_image_alt', true);
                        $image_url       = Themebase_Helper::aq_resize( array(
                                'url'    => $full_image_size[0],
                                'width'  => 1170,
                                'height' => 600,
                            ) );
                        ?>
                        <div class ="img-gallery">
                            <img src="<?php echo esc_url( $image_url ); ?>"
                                 alt="<?php echo esc_attr( $alt ); ?>"/>
                        </div>
                        <?php
                        $index++;
                    endforeach;
                    ?>
                </div> 
            <?php else:?>   
				<div class="blog-slider">
					<?php
						if ($blog_meta_enable):
							if (!empty($blog_meta)) {
								?>
								<div class="category-post">
									<?php foreach ($blog_meta as $value) {
										if (in_array($value, $blog_meta, true)) { ?>
											<?php if ($value === 'categories'): ?>
												<div class="info cate-post">
													<?php
													$cate = get_the_term_list($post->ID, 'category', '', ' ');
													if (!empty($cate)) {
														echo get_the_term_list($post->ID, 'category', '', '', '');
													}
													?>
												</div>
											<?php endif; ?>
											<?php
										}
									}
									?>
								</div>
								<?php
							}
						endif; ?>
						<div id="<?php echo esc_attr($blog_id); ?>" class="slider blog-gallery blog-img">
						<?php
						$index = 0;
						foreach ($gallery as $key => $value) :
							$full_image_size = wp_get_attachment_image_src($value, 'full');
							$alt = get_post_meta($value, '_wp_attachment_image_alt', true);
							if($blog_layout  === 'grid' || $blog_layout  === 'masonry'  ) {
								$image_url   = Themebase_Helper::aq_resize( array(
									'url'    => $full_image_size[0],
									'width'  => 570,
									'height' => 570,
								) );
							}elseif($blog_layout  === 'list' && $blog_layout_list_style === 'style_2'){
								$image_url       = Themebase_Helper::aq_resize( array(
									'url'    => $full_image_size[0],
									'width'  => 1170,
									'height' => 570,
								) );
							}else{
								$image_url       = Themebase_Helper::aq_resize( array(
									'url'    => $full_image_size[0],
									'width'  => 618,
									'height' => 496
								) );
							}?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
								<img class="no-lazyload" src="<?php echo esc_url( $image_url ); ?>"
								 alt="<?php echo esc_attr( $alt ); ?>"/>
							</a>
							<?php
							$index++;
						endforeach;
						?>
					</div>
				</div>
            <?php endif; ?> 
        <?php endif; ?>
     <?php elseif(get_post_format() == 'image'): ?>
        <?php if (has_post_thumbnail()): ?>
            <?php if(is_singular()): ?>
                <div class="blog-img">
                    <?php
                    $full_image_size = get_the_post_thumbnail_url( null, 'full' );
                    $image_url       = Themebase_Helper::aq_resize( array(
                        'url'    => $full_image_size,
                        'width'  => 1170,
                        'height' => 600,
                    ) );
                    ?>
                    <img class="no-lazyload" alt="<?php the_title_attribute(); ?>"/>
                </div>
            <?php else: ?>
                 <?php
                    $full_image_size = get_the_post_thumbnail_url( null, 'full' );
                    if($blog_layout  === 'grid' || $blog_layout  === 'masonry') {
                        if($blog_layout  === 'masonry'){
                            $image_url       = Themebase_Helper::aq_resize( array(
                                'url'    => $full_image_size,
                                'width'  => 600,
                                'height' => 767,
                            ) );
                        }else{
                            $image_url       = Themebase_Helper::aq_resize( array(
                                'url'    => $full_image_size,
                                'width'  => 570,
                                'height' => 570,
                            ) );
                        }
                    }else if($blog_layout  === 'list' && $blog_layout_list_style === 'style_2'){
						$image_url       = Themebase_Helper::aq_resize( array(
							'url'    => $full_image_size,
							'width'  => 1170,
							'height' => 570,
						) );
					} else {
                        $image_url       = Themebase_Helper::aq_resize( array(
							'url'    => $full_image_size,
							'width'  => 618,
							'height' => 496
						) );
                    }?>
                <div class="blog-img ">
					<?php
					if ($blog_meta_enable):
						if (!empty($blog_meta)) {
							?>
							<div class="category-post">
								<?php foreach ($blog_meta as $value) {
									if (in_array($value, $blog_meta, true)) { ?>
										<?php if ($value === 'categories'): ?>
											<div class="info cate-post">
												<?php
												$cate = get_the_term_list($post->ID, 'category', '', ' ');
												if (!empty($cate)) {
													echo get_the_term_list($post->ID, 'category', '', '', '');
												}
												?>
											</div>
										<?php endif; ?>
										<?php
									}
								}
								?>
							</div>
							<?php
						}
					endif; ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                        <img <?php if ($blog_layout  === 'masonry') {echo 'class="no-lazyload"';} ?> src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>"/>
                    </a>
                </div>
            <?php endif; ?>
        <?php endif;?>
    <?php else: ?>
        <?php if (has_post_thumbnail()): ?>
            <?php if(is_singular()): ?>
                <div class="blog-img">
                    <?php
                    $full_image_size = get_the_post_thumbnail_url( null, 'full' );
                    $image_url       = Themebase_Helper::aq_resize( array(
                        'url'    => $full_image_size,
                        'width'  => 1170,
                        'height' => 600,
                    ) );
                    ?>
                    <img src="<?php echo esc_url( $image_url ); ?>"
                         alt="<?php the_title_attribute(); ?>"/>
                </div>
            <?php else: ?>
                <div class="blog-img">
					<?php
					if ($blog_meta_enable):
						if (!empty($blog_meta)) {
							?>
							<div class="category-post">
								<?php foreach ($blog_meta as $value) {
									if (in_array($value, $blog_meta, true)) { ?>
										<?php if ($value === 'categories'): ?>
											<div class="info cate-post">
												<?php
												$cate = get_the_term_list($post->ID, 'category', '', ' ');
												if (!empty($cate)) {
													echo get_the_term_list($post->ID, 'category', '', '', '');
												}
												?>
											</div>
										<?php endif; ?>
										<?php
									}
								}
								?>
							</div>
							<?php
						}
					endif; ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                        <?php
                        $full_image_size = get_the_post_thumbnail_url( null, 'full' );
                        if($blog_layout  === 'grid' || $blog_layout  === 'masonry'  ) {
                            $image_url       = Themebase_Helper::aq_resize( array(
                                'url'    => $full_image_size,
                                'width'  => 570,
                                'height' => 570,
                            ) );
                        }else if($blog_layout  === 'list' && $blog_layout_list_style === 'style_2'){
							$image_url       = Themebase_Helper::aq_resize( array(
								'url'    => $full_image_size,
								'width'  => 1170,
								'height' => 570,
							) );
						}else {
                            $image_url       = Themebase_Helper::aq_resize( array(
								'url'    => $full_image_size,
								'width'  => 618,
								'height' => 496
							) );
                        }?>
                        <img <?php if ($blog_layout  === 'masonry') {echo 'class="no-lazyload"';} ?> src="<?php echo esc_url( $image_url ); ?>"
                             alt="<?php the_title_attribute(); ?>"/>

                    </a>
                    <?php if(is_sticky( ) && $blog_layout_list_style === 'style_2'){ ?>
                        <div class="icon-sticky"><i class="theme-icon-ray"></i></div>
                    <?php }
                    ?>
                </div>
            <?php endif; ?>
        <?php endif;?>
    <?php endif;
}

/**
 * [themebase_arrowpress_maintenance_mode description]
 * Enable coming soon mode for theme.
 */
if(!function_exists('themebase_arrowpress_maintenance_mode')){
    function themebase_arrowpress_maintenance_mode(){
        $coming_soon_enable = Themebase::setting('coming_soon_enable');
        global $themebase_settings;
        if(isset($coming_soon_enable) && $coming_soon_enable && (!current_user_can('edit_themes') || !is_user_logged_in())){
            add_filter( 'template_include', function() {
                return get_stylesheet_directory() . '/coming-soon.php';
            });
        }
    }
    add_action('template_redirect', 'themebase_arrowpress_maintenance_mode');
}

function themebase_resizeImage($width, $height){
    $full_image_size = wp_get_attachment_url( get_post_thumbnail_id() );
    $image_url       = Themebase_Helper::aq_resize( array(
        'url'    => $full_image_size,
        'width'  => $width,
        'height' => $height,
        'crop'   => true,
    ) );
    return $image_url;
}
/**
 * Get related posts
 *
 * @param     $post_id
 * @param int $number_posts
 *
 * @return WP_Query
 */
function themebase_get_related_posts( $post_id, $number_posts = - 1 ) {
    $query = new WP_Query();
    $args  = '';
    if ( $number_posts == 0 ) {
        return $query;
    }
    $args  = wp_parse_args( $args, array(
        'posts_per_page'      => $number_posts,
        'post__not_in'        => array( $post_id ),
        'ignore_sticky_posts' => 0,
        'category__in'        => wp_get_post_categories( $post_id )
    ) );
    $query = new WP_Query( $args );
    return $query;
}
/**
 * Get related posts
 *
 * @param     $post_id
 * @param int $number_posts
 *
 * @return WP_Query
 */
function themebase_get_related_portfolio( $post_id, $number_posts = - 1 ) {
    $query = new WP_Query();
    $args  = '';
    if ( $number_posts == 0 ) {
        return $query;
    }
    $args  = wp_parse_args( $args , array(
            'post_type'          =>'portfolio',
        'posts_per_page'      => $number_posts,
        'post__not_in'        => array( $post_id ),
        'ignore_sticky_posts' => 0,
        'category__in'        => wp_get_post_categories( $post_id )
    ) );
    $query = new WP_Query( $args );
    return $query;
}

/* Displays the class names for the #page element. */
function themebase_page_class( $class = '' ) {
    // Separates class names with a single space, collates class names for body element
    echo 'class="' . join( ' ', themebase_get_page_class( $class ) ) . '"';
}
/* Retrieves an array of the class names for the #page element. */
function themebase_get_page_class( $class = '' ){
    $classes = array();
    $classes[] = 'hfeed';
    $classes[] = 'site';
    /* Page layout */
    $themebase_site_layout = get_post_meta(get_the_ID(), 'site_layout', true);
    if(($themebase_site_layout !== '') && ($themebase_site_layout == 'wide')){
        $classes[] = 'wide';
    }elseif(($themebase_site_layout !== '') && ($themebase_site_layout == 'full-width')){

        $classes[] = 'full-width';
    }elseif(($themebase_site_layout !== '') && ($themebase_site_layout == 'boxed')){
        $classes[] = 'boxed';
    }else{
        $classes[] = Themebase_Global::check_layout_type();
    }
    /* Gradient - class */
    $general_gradient = Themebase::setting('general_gradient');
    if ($general_gradient == 1){
        $classes[] = 'page-gradient';
    }else{
        $classes[] = '';
    }
    /* Site width */
    $themebase_width = get_post_meta(get_the_ID(), 'site_width', true);
    if($themebase_width){
        $classes[] = 'site-width';
    }
    if (get_post_meta(get_the_ID(), 'fixed_header',true)==''){
        if (Themebase::setting('fixed_header')){
            $classes[] = 'header-fixed';
        }
    }elseif (get_post_meta(get_the_ID(), 'fixed_header', true) == 'on'){
        $classes[] = 'header-fixed';
    }else{
        $classes[] = '';
    }
    /* Remove padding top */
    $themebase_remove_space_top = get_post_meta(get_the_ID(), 'remove_space_top', true);
    if($themebase_remove_space_top){
        $classes[] = 'remove_space_top';
    }
    /* Remove padding bottom */
    $themebase_remove_space_bottom = get_post_meta(get_the_ID(), 'remove_space_bottom', true);
    if($themebase_remove_space_bottom){
        $classes[] = 'remove_space_bottom';
    }
    if ( ! empty( $class ) ) {
        if ( ! is_array( $class ) ) {
            $class = preg_split( '#\s+#', $class );
        }
        $classes = array_merge( $classes, $class );
    } else {
        $class = array();
    }
    $classes = apply_filters( 'themebase_page_class', $classes, $class );
    return array_unique( $classes );
}
function themebase_resize_image($width, $height){
    $full_image_size = wp_get_attachment_url( get_post_thumbnail_id() );
    $image_url       = Themebase_Helper::aq_resize( array(
        'url'    => $full_image_size,
        'width'  => $width,
        'height' => $height,
        'crop'   => true,
    ) );
    return $image_url;
}

function themebase_limit_title($numberlimit)
{
    $tit = the_title('', '', FALSE);
    echo substr($tit, 0, $numberlimit);
    if (strlen($tit) > $numberlimit) echo esc_html__('...', 'themebase');
}

function themebase_limit_excerpt($numberlimit)
{
    $tit = get_the_excerpt('', '', FALSE);
    echo substr($tit, 0, $numberlimit);
    if (strlen($tit) > $numberlimit) echo esc_html__('...', 'themebase');
}

function themebase_crop_images_custom($url_image,$custom_dimension=array())
{
    $image_cr = array();
    $size_wh['width'] = $size_wh['height'] = 'full';
    if (!empty($custom_dimension['width']) && !empty($custom_dimension['height'])) {
        $args = array(
            'url' => $url_image,
            'width' => $custom_dimension['width'],
            'height' => $custom_dimension['height'],
            'crop' => true,
            'single' => true,
            'upscale' => false,
        );
        $size_wh['width'] = $args['width'];
        $size_wh['height'] = $args['height'];
        $image_cr['url_img'] = aq_resize($args['url'], $args['width'], $args['height'], $args['crop'], $args['single'], $args['upscale']);
    } elseif (!empty($custom_dimension['width']) && empty($custom_dimension['height'])) {
        $args = array(
            'url' => $url_image,
            'width' => $custom_dimension['width'],
            'height' => null,
            'crop' => true,
            'single' => true,
            'upscale' => false,
        );
        $size_wh['width'] = $args['width'];
        $size_wh['height'] = 'auto';
        $image_cr['url_img'] = aq_resize($args['url'], $args['width'], $args['height'], $args['crop'], $args['single'], $args['upscale']);
    } elseif (empty($custom_dimension['width']) && !empty($custom_dimension['height'])) {
        $args = array(
            'url' => $url_image,
            'width' => null,
            'height' => $custom_dimension['height'],
            'crop' => true,
            'single' => true,
            'upscale' => false,
        );
        $size_wh['height'] = $args['height'];
        $size_wh['width'] = 'auto';
        $image_cr['url_img'] = aq_resize($args['url'], $args['width'], $args['height'], $args['crop'], $args['single'], $args['upscale']);
    }else{
        $image_cr['url_img']= $url_image;
    }
    $image_cr['width_height']=$size_wh;
    return $image_cr;
}

add_action('wp_ajax_load_product_by_catslug', 'themebase_load_product_by_catslug');
add_action('wp_ajax_nopriv_load_product_by_catslug', 'themebase_load_product_by_catslug');
function themebase_load_product_by_catslug() {
    global $woocommerce_loop, $post;
    $posts_per_page = $_POST['posts_per_page'];
    $product_cat = $_POST['product_cat'];
    $shortcodes = $_POST['filter_by'];
    $orderby  =   $_POST['orderby'];
    $order     =   $_POST['order'];
    $columns     =   $_POST['columns'];
    $woocommerce_loop['show_attribute_on_title'] = $_POST['show_attribute_on_title'];
    $woocommerce_loop['product_attr'] = $_POST['product_attr'];
    $woocommerce_loop['show_compare'] = $_POST['show_compare'];
    $woocommerce_loop['show_wishlist'] = $_POST['show_wishlist'];
    $woocommerce_loop['show_quickview'] = $_POST['show_quickview'];
    if($_POST['show_custom_image']==='yes'){
        $custom_dimension=array();
        $custom_dimension['width']= $_POST['custom_dimension_width'];
        $custom_dimension['height']= $_POST['custom_dimension_height'];
        $woocommerce_loop['custom_dimension'] = $custom_dimension;
    }
    $woocommerce_loop['show_custom_image'] = $_POST['show_custom_image'];
    $woocommerce_loop['product_type'] = $_POST['product_type'];
	echo do_shortcode('['.$shortcodes.' category="'.$product_cat.'"  per_page="'.$posts_per_page.'" columns="'.$columns.'" orderby="'.$orderby.'" order="'.$order.'"]');
    die();
}

/**
 * Changes the redirect URL for the Return To Shop button in the cart.
 *
 * @return string
 */
// check for empty-cart get param to clear the cart
add_action( 'init', 'themebase_woocommerce_clear_cart_url' );
function themebase_woocommerce_clear_cart_url() {
    global $woocommerce;
    if ( isset( $_GET['empty-cart'] ) ) {
        $woocommerce->cart->empty_cart();
    }
}
add_action( 'woocommerce_cart_actions', 'themebase_patricks_add_clear_cart_button', 20 );
function themebase_patricks_add_clear_cart_button() {
    echo "<a class='button' href='?empty-cart=true'>" . __( 'Clear cart', 'themebase' ) . "</a>";
}
function themebase_purchase_theme_button() {
    $purchase_theme_enable = Themebase::setting( 'purchase_theme_enable' );
    $price_theme = Themebase::setting( 'price_theme' );
    $link_theme = Themebase::setting( 'link_theme' );
    ?>
    <?php if ($purchase_theme_enable && $link_theme !== '') { ?>
        <a href="<?php echo esc_url($link_theme); ?>" class="purchase-theme site-2" target="_blank" rel="noreferrer">
            <span class="icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/envato.png" alt="Buy Now at Envato" width="16" height="18" />
            </span>
            <span class="caption"><?php  echo __( 'Buy Theme', 'themebase' ); ?></span> 
            <?php if($price_theme !== ''): ?>
                <span class="price">
                    <span class="sign"><?php  echo __( '$', 'themebase' ); ?></span>
                    <span class="amount"><?php echo esc_html__($price_theme); ?></span>
                </span>
            <?php endif; ?>
        </a>
    <?php 
    }
}
