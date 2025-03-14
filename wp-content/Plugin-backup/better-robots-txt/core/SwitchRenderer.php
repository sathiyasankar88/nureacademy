<?php
namespace Pagup\BetterRobots\Core;
use Pagup\BetterRobots\Core\Option;

class SwitchRenderer {
    public function twoPremium($name, $label1, $label2, $tooltip_text, $premium_only = false, $extra_text = '') {
        ob_start(); // Start output buffering
        ?>
        <div class="rt-switch-radio dual-btns <?php echo esc_attr($name); ?>">
            <?php if ($premium_only) : ?>
                <input type="radio" id="<?php echo $name; ?>-btn1" name="<?php echo $name; ?>" value="allow" <?php if(Option::get($name) === 'allow') echo 'checked="checked"'; ?> />
                <label for="<?php echo $name; ?>-btn1"><?php echo __($label1, 'better-robots-txt'); ?></label>

                <input type="radio" id="<?php echo $name; ?>-btn2" name="<?php echo $name; ?>" value="disable" <?php if (Option::get($name) === null || empty(Option::get($name)) || Option::get($name) === 'disable') echo 'checked="checked"'; ?> />
                <label for="<?php echo $name; ?>-btn2"><?php echo __($label2, 'better-robots-txt'); ?></label>

            <?php else : ?>

                <input type="radio" id="<?php echo $name; ?>-btn1" name="<?php echo $name; ?>" value="" disabled />
                <label for="<?php echo $name; ?>-btn1"><?php echo __($label1, 'better-robots-txt'); ?></label>

                <input type="radio" id="<?php echo $name; ?>-btn2" name="<?php echo $name; ?>" value="" checked="checked" />
                <label for="<?php echo $name; ?>-btn2"><?php echo __($label2, 'better-robots-txt'); ?></label>

            <?php endif; ?>

                <div class="rt-tooltip">
                    <span class="dashicons dashicons-editor-help"></span>
                    <span class="rt-tooltiptext"><?php echo __($tooltip_text, 'better-robots-txt'); ?></span>
                </div>

            <?php if ($extra_text) {
                echo $extra_text;
            } ?>
        </div>
        <?php
        return ob_get_clean(); // Return the buffered content
    }

    public function three($name, $label1, $label2, $label3, $tooltip_text, $extra_text = '') {
        ob_start(); // Start output buffering
        ?>
        <div class="rt-switch-radio dual-btns <?php echo esc_attr($name); ?>">
            <input type="radio" id="<?php echo $name; ?>-btn1" name="<?php echo $name; ?>" value="allow" <?php checked('allow', Option::get($name)); ?> />
            <label for="<?php echo $name; ?>-btn1"><?php echo esc_html__($label1, 'better-robots-txt'); ?></label>

            <input type="radio" id="<?php echo $name; ?>-btn2" name="<?php echo $name; ?>" value="disallow" <?php checked('disallow', Option::get($name)); ?> />
            <label for="<?php echo $name; ?>-btn2"><?php echo esc_html__($label2, 'better-robots-txt'); ?></label>

            <input type="radio" id="<?php echo $name; ?>-btn3" name="<?php echo $name; ?>" value="disable" <?php if (empty(Option::get($name)) || Option::get($name) === 'disable') echo 'checked="checked"'; ?> />
            <label for="<?php echo $name; ?>-btn3"><?php echo esc_html__($label3, 'better-robots-txt'); ?></label>
            <div class="rt-tooltip">
                <span class="dashicons dashicons-editor-help"></span>
                <span class="rt-tooltiptext"><?php echo esc_html__($tooltip_text, 'better-robots-txt'); ?></span>
            </div>
            <?php if ($extra_text) {
                echo $extra_text;
            } ?>
        </div>
        <?php
        return ob_get_clean(); // Return the buffered content
    }

    public function threePremium($name, $label1, $label2, $label3, $tooltip_text, $premium_only = false, $extra_text = '') {
        ob_start(); // Start output buffering
        ?>
        <div class="rt-switch-radio dual-btns">
            <?php if ($premium_only) : ?>
                <input type="radio" id="<?php echo $name; ?>-btn1" name="<?php echo $name; ?>" value="allow" <?php checked('allow', Option::get($name)); ?> />
                <label for="<?php echo $name; ?>-btn1"><?php echo esc_html__($label1, 'better-robots-txt'); ?></label>
    
                <input type="radio" id="<?php echo $name; ?>-btn2" name="<?php echo $name; ?>" value="disallow" <?php checked('disallow', Option::get($name)); ?> />
                <label for="<?php echo $name; ?>-btn2"><?php echo esc_html__($label2, 'better-robots-txt'); ?></label>
    
                <input type="radio" id="<?php echo $name; ?>-btn3" name="<?php echo $name; ?>" value="disable" <?php if (empty(Option::get($name)) || Option::get($name) === 'disable') echo 'checked="checked"'; ?> />
                <label for="<?php echo $name; ?>-btn3"><?php echo esc_html__($label3, 'better-robots-txt'); ?></label>

            <?php else : ?>

                <input type="radio" id="<?php echo esc_attr($name); ?>-btn1" name="<?php echo esc_attr($name); ?>" value="" disabled />
                <label for="<?php echo esc_attr($name); ?>-btn1"><?php echo esc_html__($label1, 'better-robots-txt'); ?></label>

                <input type="radio" id="<?php echo esc_attr($name); ?>-btn2" name="<?php echo esc_attr($name); ?>" value="" disabled />
                <label for="<?php echo esc_attr($name); ?>-btn2"><?php echo esc_html__($label2, 'better-robots-txt'); ?></label>

                <input type="radio" id="<?php echo esc_attr($name); ?>-btn3" name="<?php echo esc_attr($name); ?>" value="" checked="checked" />
                <label for="<?php echo esc_attr($name); ?>-btn3"><?php echo esc_html__($label3, 'better-robots-txt'); ?></label>
            
            <?php endif; ?>

            <div class="rt-tooltip">
                <span class="dashicons dashicons-editor-help"></span>
                <span class="rt-tooltiptext"><?php echo esc_html__($tooltip_text, 'better-robots-txt'); ?></span>
            </div>
            <?php if ($extra_text) {
                echo $extra_text;
            } ?>
        </div>
        <?php
        return ob_get_clean(); // Return the buffered content
    }
}