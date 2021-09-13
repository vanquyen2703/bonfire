
<?php
	$footer_layout = Themebase::setting('footer_layout');
  	if ($footer_layout === 'wide'){
    	$f_container ='container-fluid';
	}elseif ($footer_layout === 'full_width'){
	    $f_container ='container';
	}else{
	    $f_container ='container-fluid boxed';
	}
?>
<footer  id="page-footer" class="footer-default">
	<div class="<?php echo esc_attr($f_container); ?>">
		<div class="row">
			<div class="col-md-12">
			<?php if (is_active_sidebar('footer')) { ?>
				<div class="footer-top">
					<?php dynamic_sidebar('footer'); ?>	
				</div>
			<?php } ?>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="row">
				<div class="col-md-12 ">
					<?php echo  Themebase::setting( 'footer_copyright' ); ?>
				</div>	 
			</div>
		</div> 
	</div>
</footer>
