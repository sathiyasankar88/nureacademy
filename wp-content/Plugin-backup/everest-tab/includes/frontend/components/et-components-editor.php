<?php defined('ABSPATH') or die("No script kiddies please!");
$html_text = (isset($value['html_text']) && $value['html_text'] != '')?$value['html_text']:''; ?>
<div class="etab-editor-content clearfix">
<?php echo do_shortcode(wptexturize(wpautop($html_text)));?>
</div>