					</div><!-- End row-->
				</div><!-- End container-->
			</div> <!-- End main-->

			<?php
				$themebase_footer_type = Themebase_Global::instance()->set_footer_type();
				$themebase_hide_footer = get_post_meta(get_the_ID(), 'hide_footer', true);
				if(is_category() || is_tax()){
				    $themebase_hide_footer_cat = themebase_get_meta_value('hide_footer', true);
				    if (!$themebase_hide_footer_cat) {
				        $themebase_hide_footer = true;
				    }
				}
				if(!$themebase_hide_footer && $themebase_footer_type != 'none' && !is_404()) {
					Themebase::get_footer_type();
				}
			?>
			<?php do_action('themebase_render_footer'); ?>
        </div> <!-- End page-->
        <?php themebase_purchase_theme_button(); ?>
        
        <?php wp_footer(); ?>
    </body>
</html>


