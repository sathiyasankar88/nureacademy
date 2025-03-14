<?php
$target_qodef_sidebar_sidebar = target_qodef_get_sidebar();
?>
<div class="qodef-column-inner">
    <aside class="qodef-sidebar">
        <?php
            if (is_active_sidebar($target_qodef_sidebar_sidebar)) {
                dynamic_sidebar($target_qodef_sidebar_sidebar);
            }
        ?>
    </aside>
</div>
