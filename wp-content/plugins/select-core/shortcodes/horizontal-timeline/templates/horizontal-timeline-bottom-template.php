<div class="qodef-events-content">
    <ol>
        <?php echo do_shortcode($content); ?>
    </ol>
</div> <!-- .events-content -->
<div class="qodef-timeline">
    <div class="qodef-events-wrapper">
        <div class="qodef-events">
            <ol>
                <?php foreach($timeline_params as $key=>$value) { ?>
                    <li><a href="javascript:void(0)" data-date="<?php echo esc_attr($key) ?>"><span class="qodef-event-text"><?php echo esc_html($value); ?></span><span class="circle-outer"><span class="circle-inner"></span></span></a></li>
                <?php } ?>
            </ol>
            <span class="qodef-filling-line" aria-hidden="true"></span>
            <div class="qodef-dots"></div>
        </div> <!-- .events -->
    </div> <!-- .events-wrapper -->

    <ul class="qodef-timeline-navigation">
        <li><a href="#0" class="qodef-prev inactive"></a></li>
        <li><a href="#0" class="qodef-next"></a></li>
    </ul> <!-- .cd-timeline-navigation -->
</div> <!-- .timeline -->