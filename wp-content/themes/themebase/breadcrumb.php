<?php
global $product;
$breadcrumb = Themebase::setting('breadcrumb');
$page_title = Themebase::setting('page_title');
$breadcrumb_align = Themebase::setting('general_align');
$bg_breadcrumb = Themebase::setting('general_background');
$page_titles = get_post_meta(get_the_ID(), 'page_title', true);
$breadcrumbs = get_post_meta(get_the_ID(), 'breadcrumbs', true);
$bg_breadcrumbs = get_post_meta(get_the_ID(), 'breadcrumbs_bg', true);
$bg_breadcrumb_cate = themebase_get_meta_value('image');
$bg_breadcrumb_cate_post = themebase_get_meta_value('image');
$blog_layout_list_style = Themebase::setting('blog_archive_layout_list_style' );
if(is_category() || is_tax()){
	$blog_layout_list_style = themebase_get_meta_value( 'blog_list_style', false);
	$page_title_cat = themebase_get_meta_value('page_title', true);
	if (!$page_title_cat) {
		$page_title = false;
	}else{
		$page_title = true;
	}
}else{
	if($page_titles === '1'){
		$page_title = false;
	}else{
		if ($page_title === '1') {
			$page_title = true;
		} else {
			$page_title = false;
		}
	}
}
	
if ((is_front_page() && is_home()) || is_front_page() || is_page_template('coming-soon.php')|| is_404()) {
    $breadcrumb = false;
    $page_title = false;
} else {
	if(is_category() || is_tax()){
		$breadcrumb_cat = themebase_get_meta_value('breadcrumb', true);
		if (!$breadcrumb_cat) {
			$breadcrumb = false;
		}
	}else{
		if ($breadcrumbs === '1') {
	        $breadcrumb = false;
	    }
	}
}
if (is_home() && $blog_layout_list_style === 'style_3' ){
    $breadcrumb = false;
    $page_title = false;
} 
$bg_breadcrumb_image = $breadcrumb_align_class = '';
if (is_tax('product_cat') && $bg_breadcrumb_cate !=''){
	$bg_breadcrumb_image = $bg_breadcrumb_cate;
} elseif(is_category() && $bg_breadcrumb_cate_post != ''){
	$bg_breadcrumb_image = $bg_breadcrumb_cate_post;
} else{
	if (isset($bg_breadcrumbs) && $bg_breadcrumbs != '') {
		$bg_breadcrumb_image = $bg_breadcrumbs;
	}else{
		$bg_breadcrumb_image = $bg_breadcrumb["background-image"];
	}
}
if($breadcrumb_align == 'center'){
	$breadcrumb_align_class = 'text-center';
}elseif($breadcrumb_align == 'right'){
	$breadcrumb_align_class = 'text-right';
}else{
	$breadcrumb_align_class = 'text-left';
}
?>
<!-- Page title + breadcrumb -->
<?php if($breadcrumb == true || $page_title == true): ?>
<div class="side-breadcrumb <?php echo esc_attr($breadcrumb_align_class); ?> <?php if($bg_breadcrumb_image){echo 'has-img';} ?>" style="background-image: url(<?php echo esc_url($bg_breadcrumb_image)?>);">
    <div class="container">
        <div class="row align-items-center">
			<div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
        	<?php if($page_title == true) { ?>
				<?php if(is_404() || !is_single()) :?>
					<div class="page-title">
						<h1><?php Themebase_Templates::page_title();?></h1>
					</div>
				<?php endif?>
			<?php } ?>
			<?php if ($breadcrumb):?>
	            <div class="breadcrumbs">
	                <?php Themebase_Templates::breadcrumbs(); ?>
	            </div>
	        <?php endif;?>
	    </div>
        </div>
    </div>
</div>
<?php endif; ?>

