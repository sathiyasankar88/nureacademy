<?php

if(!function_exists('target_qodef_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function target_qodef_is_responsive_on() {
        return target_qodef_options()->getOptionValue('responsiveness') !== 'no';
    }
}