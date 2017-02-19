<?php

/*  Initialize the options before anything else.
/* ------------------------------------ */
add_action( 'admin_init', 'custom_theme_options', 1 );


/*  Build the custom settings & update OptionTree.
/* ------------------------------------ */
function custom_theme_options() {
    // Get a copy of the saved settings array.
    $saved_settings = get_option( 'option_tree_settings', array() );

	// Custom settings array that will eventually be passed to the OptionTree Settings API Class.
	$custom_settings = array(

        'sections' => array(
            array(
                'id'    => 'general',
                'title' => 'General',
            ),
            array(
                'id'    => 'styling',
                'title' => 'Styling',
            ),
            array(
                'id'    => 'main-navigation',
                'title' => 'Main Navigation',
            ),
            array(
                'id'    => 'header',
                'title' => 'Header',
            ),
            array(
                'id'    => 'post-list',
                'title' => 'Post List',
            ),
            array(
                'id'    => 'single',
                'title' => 'Single',
            ),
            array(
                'id'    => 'footer',
                'title' => 'Footer',
            ),
        ),
        'settings' => array(
            // General: Favicon
    		array(
    			'id'		=> 'favicon',
    			'label'		=> 'Favicon',
    			'desc'		=> 'Upload a 16x16px Png/Gif image that will be your favicon',
    			'type'		=> 'upload',
    			'section'	=> 'general'
    		),
            // General: Heading
            array(
                'id'		=> 'blog-heading',
                'label'		=> 'Heading',
                'desc'		=> 'Your blog heading',
                'type'		=> 'text',
                'section'	=> 'general'
            ),
            // General: Subheading
            array(
                'id'		=> 'blog-subheading',
                'label'		=> 'Subheading',
                'desc'		=> 'Your blog subheading',
                'type'		=> 'text',
                'section'	=> 'general'
            ),
            // General: Excerpt Length
            array(
                'id'			=> 'excerpt-length',
                'label'			=> 'Excerpt Length',
                'desc'			=> 'Max number of words',
                'std'			=> '34',
                'type'			=> 'numeric-slider',
                'section'		=> 'general',
                'min_max_step'	=> '0,100,1'
            ),
            array(
                'id'            => 'color-primary',
                'label'         => 'Primary Color',
                'desc'          => 'Primary Color of theme',
                'type'          => 'colorpicker',
                'std'           => '#00796B',
                'section'       => 'styling',
            ),
            array(
                'id'            => 'color-primary-dark',
                'label'         => 'Dark Primary Color',
                'desc'          => 'Dark Primary Color of theme',
                'type'          => 'colorpicker',
                'std'           => '#004D40',
                'section'       => 'styling',
            ),
            array(
                'id'            => 'color-accent',
                'label'         => 'Accent Color',
                'desc'          => 'Accent Color of theme',
                'type'          => 'colorpicker',
                'std'           => '#455A64',
                'section'       => 'styling',
            ),
            array(
                'id'            => 'color-accent-dark',
                'label'         => 'Dark Accent Color',
                'desc'          => 'Dark Accent Color of theme',
                'type'          => 'colorpicker',
                'std'           => '#263238',
                'section'       => 'styling',
            ),
            array (
                'id'            => 'button-text-color',
                'label'         => 'Button Text Color',
                'desc'          => 'Button Text Color of theme',
                'type'          => 'colorpicker',
                'std'           => '#ECEFF1',
                'section'       => 'styling',
            ),
            array (
                'id'            => 'custom-css',
                'label'         => 'Custom CSS',
                'desc'          => 'Custom CSS of theme',
                'type'          => 'textarea-simple',
                'section'       => 'styling',
            ),
            array(
                'id'            => 'nav-brand',
                'label'         => 'Brand Logo',
                'desc'          => 'Upload your brand logo of height 48px.',
                'type'          => 'upload',
                'std'           => get_template_directory_uri(). '/img/logo/eightfive-brand.png',
                'section'       => 'main-navigation',
            ),
            array(
                'id'            => 'nav-always-collapsed',
                'label'         => 'Always Collapsed Navigation',
                'desc'          => 'Is the navigation menu always collpased?',
                'type'          => 'on-off',
                'std'           => 'on',
                'section'       => 'main-navigation',
            ),
            array(
                'id'            => 'nav-sidebar-title',
                'label'         => 'Navigation Sidebar Title',
                'desc'          => 'Navigation Sidebar Title of theme',
                'type'          => 'text',
                'std'           => 'Eightfive',
                'section'       => 'main-navigation',
            ),
            array(
                'id'            => 'nav-fg-color',
                'label'         => 'Navigation Text Color',
                'desc'          => 'Navigation Text Color of theme',
                'type'          => 'colorpicker',
                'std'           => '#ECEFF1',
                'section'       => 'main-navigation',
            ),
            array(
                'id'            => 'nav-hover-color',
                'label'         => 'Navigation Link Hover Color',
                'desc'          => 'Navigation Link Hover Color of theme',
                'type'          => 'colorpicker',
                'std'           => '#80CBC4',
                'section'       => 'main-navigation',
            ),
            array(
                'id'            => 'header-bg-img',
                'label'         => 'Header Background Image',
                'desc'          => 'Background image of the header',
                'type'          => 'upload',
                'std'           => get_template_directory_uri() . '/img/header-bg.jpg',
                'section'       => 'header',
            ),
            array(
                'id'            => 'header-bg-overlay',
                'label'         => 'Default Header Background Overlay',
                'desc'          => 'Darkening background image of default header',
                'type'          => 'on-off',
                'std'           => 'on',
                'section'       => 'header',
            ),
            array(
                'id'            => 'header-fg-color',
                'label'         => 'Default Header Foreground Color',
                'desc'          => 'Foreground Color of default header',
                'type'          => 'colorpicker',
                'std'           => '#ECEFF1',
                'section'       => 'header',
            ),
            array(
                'id'		    => 'header-title-home',
                'label'		    => 'Home Header Title',
                'desc'		    => 'The title that appears in the header',
                'type'		    => 'text',
                'std'           => 'Eightyfive',
                'section'	    => 'header',
            ),
            array(
                'id'		    => 'header-description-home',
                'label'		    => 'Home Header Description',
                'desc'		    => 'The description that in the header',
                'type'		    => 'text',
                'std'           => 'A beautiful material theme.',
                'section'	    => 'header',
            ),
            array(
                'id'            => 'header-home-cta-link',
                'label'         => 'Home Header CTA Link',
                'desc'          => 'Call to Action link at header',
                'type'          => 'text',
                'std'           => 'http://amrittwanabasu.com.np',
                'section'       => 'header',
            ),
            array(
                'id'            => 'header-home-cta-text',
                'label'         => 'Home Header CTA Text',
                'desc'          => 'Call to Action button text at header',
                'type'          => 'text',
                'std'           => 'Download Theme',
                'section'       => 'header',
            ),
            array(
                'id'		    => 'header-title-post-list',
                'label'		    => 'Post List Header Title',
                'desc'		    => 'The title that appears in the header of Post List page',
                'type'		    => 'text',
                'std'           => 'A Place for you to discover new stories.',
                'section'	    => 'header',
            ),
            array(
                'id'            => 'show-stats',
                'label'         => 'Show Post List stats',
                'desc'          => 'Turn on to show post stats',
                'type'          => 'on-off',
                'section'       => 'post-list',
            ),
            // General: Single - Related Posts
            array(
                'id'            => 'related-posts',
                'label'         => 'Single &mdash; Related Posts',
                'desc'          => 'Shows randomized related articles below the post',
                'std'           => 'categories',
                'type'          => 'radio',
                'section'       => 'single',
                'choices'       => array(
                    array(
                        'value' => '1',
                        'label' => 'Disable'
                    ),
                    array(
                        'value' => 'categories',
                        'label' => 'Related by categories'
                    ),
                    array(
                        'value' => 'tags',
                        'label' => 'Related by tags'
                    )
                )
            ),
            // Footer: Copyright
    		array(
    			'id'		    => 'footer-copyright',
    			'label'		    => 'Footer Copyright',
    			'desc'		    => 'Replace the footer copyright text',
    			'type'		    => 'text',
                'std'           => 'Amrit Twanabasu © 2017. All Rights Reserved.',
    			'section'	    => 'footer'
    		),
        ),
    );

    /*  Settings are not the same? Update the DB
    /* ------------------------------------ */
	if ( $saved_settings !== $custom_settings ) {
		update_option( 'option_tree_settings', $custom_settings );
	}
}
