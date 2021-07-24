<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

//Load any external files you have here
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'feed_links_extra');
remove_action( 'wp_head', 'rel_canonical');

remove_action( 'wp_head', 'feed_links' );
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'index_rel_link');
remove_action( 'wp_head', 'parent_post_rel_link');
remove_action( 'wp_head', 'start_post_rel_link');
remove_action( 'wp_head', 'adjacent_posts_rel_link');
remove_action( 'wp_head', 'wp_generator');


//remove wordpress admin title
add_filter('admin_title', 'my_admin_title', 10, 2);
function my_admin_title($admin_title, $title)
{
    return get_bloginfo('name').' &bull; '.$title;
}


function fb_disable_feed() {  
wp_die(__('No feed available,please visit our <a href="'.get_bloginfo('url').'">homepage</a>!') );
}  
add_action('do_feed', 'fb_disable_feed', 1);  
add_action('do_feed_rdf', 'fb_disable_feed', 1);  
add_action('do_feed_rss', 'fb_disable_feed', 1);  
add_action('do_feed_rss2', 'fb_disable_feed', 1);  
add_action('do_feed_atom', 'fb_disable_feed', 1);

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


function disable_rss() {
	return null;
}
add_filter('default_feed', 'disable_rss');

// Removes from user menu profile
add_action( 'admin_menu', 'my_remove_profile_admin_menus' );
function my_remove_profile_admin_menus() {
    remove_menu_page( 'profile.php' );
}



 
function meks_disable_srcset( $sources ) {
    return false;
}
 
add_filter( 'wp_calculate_image_srcset', 'meks_disable_srcset' );


//** changing default wordpres email settings */
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');
 
function new_mail_from($old) {
 return 'noreply@aais.edu.sg';
}
function new_mail_from_name($old) {
 return 'Ascensia International School';
}

//disable auto-save and post revision completely
define('AUTOSAVE_INTERVAL', 300 ); // seconds
define('WP_MEMORY_LIMIT', '256M');
define('DISALLOW_FILE_EDIT', true );

//hide the menu function 

function custom_colors() {
   echo '<style type="text/css">
           .nav-menus-php h2.nav-tab-wrapper { display: none !important;}
           span.add-new-menu-action { display: none !important;}
		   #menu-management .menu-settings { display: none !important;}
		   #nav-menu-footer span.delete-action {display: none !important;}
		   .nav-menus-php .hide-if-no-customize {display: none !important;}
         </style>';
}

add_action('admin_head', 'custom_colors');




//Facilities Shortcode
function facilities($atts){
	$postid = get_the_ID();
	extract(shortcode_atts(array( 
		"postid" => get_the_ID()
		), $atts));
		$ret=""; ?>
		
	<?php if( have_rows('facilities') ): ?>
		<div class="facility-slider owl-carousel owl-theme">
		<?php while( have_rows('facilities') ): the_row(); 
			// vars
			$facilities_img = get_sub_field('facility_image');
			$facilities_name = get_sub_field('facility_name');
			$size = 'faci-thumb';
			$facilities_thumb = $facilities_img[ $size ];
		?>
			
			<div class="item">
				<div class="facilities-wrapper text-center">
					<a href="<?php echo $facilities_img['url']; ?>" data-fancybox="facilities">
						<div class="facilities-overlay">
							<i class="fa fa-search"></i>
							<img src="<?php echo $facilities_img['sizes'][$size]; ?>">
						</div>
						<h4 class="merriweather"><?php echo $facilities_name; ?></h4>
					</a>
				</div>
			 </div>

		<?php endwhile; ?>
		</div>
		
		<script>
		jQuery(document).ready(function (){
			// Declare Carousel jquery object
			var fac = jQuery('.facility-slider');

			// Carousel initialization
			fac.owlCarousel({
				loop:true,
				margin:30,
				navSpeed:500,
				dots:false,
				nav:false,
				autoplay: false,
				responsive:{
					0:{
						items:1
					},
					580:{
						items:3
					}
				}
			});
			jQuery('.fac-next').click(function() {
				fac.trigger('next.owl.carousel');
			});
			jQuery('.fac-prev').click(function() {
				fac.trigger('prev.owl.carousel');
			});
		});
		</script>
	<?php endif; ?>
		
<?php
		return $ret;
		}
add_shortcode('facilities','facilities');

//Facility Navigation
function facilities_nav($atts){
	$postid = get_the_ID();
	extract(shortcode_atts(array( 
		"postid" => get_the_ID()
		), $atts));
		$ret=""; ?>
		
		<div class="fac-nav-wrapper">
			<div class="fac-prev"><img src="<?php echo get_template_directory_uri(); ?>/img/aais-icon-arrow-left.png"></div>
			<div class="fac-next"><img src="<?php echo get_template_directory_uri(); ?>/img/aais-icon-arrow-right.png"></div> 
		</div>
		
<?php
		return $ret;
		}
add_shortcode('facilities_nav','facilities_nav');


//Academic and Examination Shortcode
function examination_board($atts){
	$postid = get_the_ID();
	extract(shortcode_atts(array( 
		"postid" => get_the_ID()
		), $atts));
		$ret=""; ?>
		
	<?php if( have_rows('examination_board') ): ?>
		<div class="examination-slider owl-carousel owl-theme">
		<?php while( have_rows('examination_board') ): the_row(); 
			// vars
			$examination_img = get_sub_field('examination_image');
			$examination_name = get_sub_field('examination_name');
			$exasize = 'faci-thumb';
			$examination_thumb = $examination_img[$exasize];
		?>
			
			<div class="item">
				<div class="facilities-wrapper text-center">
						<img src="<?php echo $examination_img['sizes'][$exasize]; ?>">
					<h4 class="merriweather"><?php echo $examination_name; ?></h4>
				</div>
			 </div>

		<?php endwhile; ?>
		</div>
		
		<script>
		jQuery(document).ready(function (){
			// Declare Carousel jquery object
			var exa = jQuery('.examination-slider');

			// Carousel initialization
			exa.owlCarousel({
				loop:true,
				margin:30,
				navSpeed:500,
				dots:false,
				nav:false,
				autoplay: false,
				responsive:{
					0:{
						items:1
					},
					580:{
						items:3
					},
					768:{
						items:4
					}
				}
			});
			jQuery('.fac-next').click(function() {
				exa.trigger('next.owl.carousel');
			});
			jQuery('.fac-prev').click(function() {
				exa.trigger('prev.owl.carousel');
			});
		});
		</script>
	<?php endif; ?>
		
<?php
		return $ret;
		}
add_shortcode('examination_board','examination_board');


//Academic and Examination Navigation Shortcode
function examination_board_nav($atts){
	$postid = get_the_ID();
	extract(shortcode_atts(array( 
		"postid" => get_the_ID()
		), $atts));
		$ret=""; ?>
		
		<div class="fac-nav-wrapper">
			<div class="fac-prev"><img src="<?php echo get_template_directory_uri(); ?>/img/aais-icon-arrow-left.png"></div>
			<div class="fac-next"><img src="<?php echo get_template_directory_uri(); ?>/img/aais-icon-arrow-right.png"></div> 
		</div>
		
<?php
		return $ret;
		}
add_shortcode('examination_board_nav','examination_board_nav');


//Accolades Shortcode
function accolades($atts){
	$postid = get_the_ID();
	extract(shortcode_atts(array( 
		"postid" => get_the_ID()
		), $atts));
		$ret=""; ?>
		
		<?php if( have_rows('accoloades') ): ?>
		<div class="accolades-wrapper">
			<?php while( have_rows('accoloades') ): the_row(); 
				// vars
				$accolades_year = get_sub_field('accolades_year');
				$accolades_content = get_sub_field('accolades_content');
			?>
							
				<div class="accolades-list">
					<h4><?php echo $accolades_year; ?></h4>
					<div class="accolades-hr text-center"> 
						<div class="accolades-outter-dots">
							<div class="accolades-dots"></div>
						</div>
						<hr class="accolades-line">
					</div>
					<p><?php echo $accolades_content; ?></p>
				</div>

			<?php endwhile; ?>
		</div>
		<?php endif; ?>
		
<?php
		return $ret;
		}
add_shortcode('accolades','accolades');

//Latest News Shortcode
function latest_and_featured_news($atts){
	$postid = get_the_ID();
	extract(shortcode_atts(array( 
		"postid" => get_the_ID()
		), $atts));
		$ret=""; ?>
		
		<?php $now_id = get_the_ID(); ?>
		<div class="latest-news-wrapper">
			<div class="row">
				<!-- Latest News -->
				<div class="col-md-8">
					<?php 
						$args = array (
						'post_type'              => 'events',
						'pagination'             => false,
						'posts_per_page'         => '3'
						);

						$query = new WP_Query( $args );
						if($query->have_posts()) : 
							/* Start The Looping */
							while($query->have_posts()) : $query->the_post();?>
							
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="row">
									<div class="col-sm-3">
										<?php the_post_thumbnail(array(600,400)); ?>
									</div>
									<div class="col-sm-7">
									<?php $newsttl = get_the_title(); ?>
										<h2 class="underline-title merriweather"><a href="<?php echo get_permalink();?>"><?php echo $newsttl; ?></a></h2>
										<p><?php $content = get_the_content();
												if($content == '') { echo 'No description'; } else {
												echo wp_trim_words($content,16); } ?></p>
										<span class="date"><?php the_time('F j, Y'); ?></span>
									</div>
									<div class="col-sm-2">
										<div class="aais-calendar no-margin text-center">
											<div class="calendar-month"><?php echo get_the_date('M'); ?></div>
											<div class="calendar-date"><?php echo get_the_date('d'); ?></div>
										</div>
									</div>
								</div>
								
							</article>
								
							<?php endwhile; wp_reset_query(); ?>
						<?php endif; ?>
				</div>
				<!-- /LAtest News-->
				<!-- Featured News -->
				<div class="col-md-4">
					<?php
					$featured_post = get_field('featured_news',$now_id);
					$featured_thumb_url = get_the_post_thumbnail_url($featured_post->ID);
					if( $featured_post ): 
						// override $post
						$post2 = $featured_post;
						setup_postdata( $post2 ); 
						?>
						<?php $featured_ID = $post2->ID; ?>
						<div class="featured-image-wrapper">
							<div class="featured-img-wrapper relative">
								<img src="<?php echo get_template_directory_uri(); ?>/img/aais-featured-ribbon.png" class="featured-ribbon">
								<img class="featured-img" src="<?php echo $featured_thumb_url; ?>">
								<div class="aais-calendar no-margin text-center">
									<div class="calendar-month"><?php echo get_the_date('M',$featured_ID); ?></div>
									<div class="calendar-date"><?php echo get_the_date('d',$featured_ID); ?></div>
								</div>
							</div>
							<h2 class="merriweather underline-title">
								<a href="<?php echo $post2->guid; ?>">
									<?php echo $post2->post_title;?>
								</a>
							</h2>
							<p><?php $featured_content = $post2->post_content;
										if($featured_content == '') { echo 'No description'; } else {
										echo wp_trim_words($featured_content,15); } ?></p>
						</div>
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
					
					
				</div>
				<!-- /Featured News -->
			</div>
		<div>
		
<?php
		return $ret;
		}
add_shortcode('latest_and_featured_news','latest_and_featured_news');


//Mobile Toggle Shortcode
function mobile_toggle_menu($atts){
	$postid = get_the_ID();
	extract(shortcode_atts(array( 
		"postid" => get_the_ID()
		), $atts));
		$ret=""; ?>
		
		MENU
		
<?php
		return $ret;
		}
add_shortcode('mobile_toggle_menu','mobile_toggle_menu');

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail 
	add_image_size('faci-thumb', 700, 560, true); //Facility Size
	add_image_size('course-thumb', 700, 350, true); //Courses Size
	add_image_size('news-thumb', 600, 300, true); //News and Events Size
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('html5-blank', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
            'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
            'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
            'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
            'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
            'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
            'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
            'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

?>
