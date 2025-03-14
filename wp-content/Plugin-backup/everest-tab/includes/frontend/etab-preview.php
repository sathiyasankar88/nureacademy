<?php defined('ABSPATH') or die("No script kiddies please!"); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
         <title><?php wp_title( '|', true, 'right' ); ?></title>
          <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
         <?php wp_head(); ?>
            <style>
        body {
        background: #ffffff !important;
      }
    </style>
</head>
<body <?php body_class(); ?>>
    <div id="content" class="site-content ">
<h1 id="logo" style="text-align: center">
<img src='#' alt="plugin-logo" />
</h1>
<h2 style="text-align: center">Preview Mode</h2>
<p style="text-align: center">You are simply viewing this preview page.</p>

<div class="etab-review-preview">
    <?php 
    if(isset($_GET['tab_id'])){
    $id = intval(sanitize_text_field($_GET['tab_id']));
    echo do_shortcode("[etabs id='".$id."']"); 
    }
    ?>
</div>
    </div>

<?php wp_footer();?>
</body>
</html>
