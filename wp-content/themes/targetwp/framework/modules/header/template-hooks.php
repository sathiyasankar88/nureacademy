<?php

//top header bar
add_action('target_qodef_before_page_header', 'target_qodef_get_header_top');

//mobile header
add_action('target_qodef_after_page_header', 'target_qodef_get_mobile_header');