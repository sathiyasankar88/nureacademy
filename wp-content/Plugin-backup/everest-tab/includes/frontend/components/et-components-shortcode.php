<?php defined('ABSPATH') or die("No script kiddies please!");
$external_shortcode = (isset($value['ex_shortcode']) && $value['ex_shortcode'] != '')?$value['ex_shortcode']:'';
?>
<div class="etab-external-sc-wrapper">
	<?php echo do_shortcode($external_shortcode);?>
</div>
