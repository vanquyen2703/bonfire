<?php
    if (class_exists('SitePress')) {
        Themebase_WPML::show_language_dropdown();
    }else{
        Themebase_WPML::show_language_dropdown_demo();
    }
