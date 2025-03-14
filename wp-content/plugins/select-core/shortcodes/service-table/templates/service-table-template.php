<thead>
<tr>
    <?php
        foreach($table_titles as $title) { ?>
           <th><?php echo esc_attr($title); ?></th>
    <?php } ?>
</tr>
</thead>
<tbody>
    <?php foreach($table_rows as $row) { ?>
        <tr>
            <td class="qodef-service-table-feature-title"><?php echo esc_attr($row['title']) ?></td>
            <?php foreach($row['features_enabled'] as $feature) { ?>
                <td> <?php if($feature == 'yes') { ?>
                    <span class="qodef-mark qodef-checked ion-checkmark"></span>
                <?php } else { ?>
                    <span class="qodef-mark ion-close"></span>
                <?php } ?>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>
</tbody>
<tfoot>
<tr>
    <td colspan=<?php echo esc_attr($enabled_services);?> class="qodef-gradient-border">
        <div class="border"></div>
    </td>
</tr>
<tr>
    <th></th>
    <?php
    foreach($table_buttons as $button) { ?>
        <th><?php echo target_qodef_get_button_html($button); ?></th>
    <?php } ?>
</tr>
</tfoot>