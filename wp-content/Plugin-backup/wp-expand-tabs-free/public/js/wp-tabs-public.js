(function( $ ) {
	'use strict';

	$(document).ready(function () {
		$('div[id^="sp-wp-tabs-wrapper_"]').each(function () {
			var _this         = $(this);
			var tabsID        = _this.attr('id');
			var preloader     = $('#' + tabsID).data('preloader');
			var activemode    = $('#' + tabsID).data('activemode');

			// Preloader
			if (preloader){
				// $(window).on("load", function () {
					$(".sp-tab__preloader").fadeOut();
				// });
			}

			// Tabs On Hover
			if ('tabs-activator-event-hover' == activemode) {
				$('#' + tabsID).on('mouseenter.sp.tab.data-api', '[data-sptoggle="tab"], [data-hover="tab"]', function () {
					$(this).tab('show');
				});
			}
			$('#' + tabsID + ' iframe').wrap("<div class='wp-tab-iframe-container'></div>");
			
			// Tab #anchoring
			$(function () {
				// check if there is a hash in the url
				if (window.location.hash != '') {
					$('#' + tabsID + ' .sp-tab__nav-tabs > li [for="' + window.location.hash + '"]').trigger('click');
					$('#' + tabsID + '.sp-tab__default-accordion .sp-tab__tab-pane' + window.location.hash + ' > label').trigger('click');
				}
			});

			var $tabs = $('#' + tabsID + ' .sp-tab__nav-item');
			$('label', $tabs).on('click', function (e) {
				e.preventDefault();
				// Add hash url
				window.location.hash = $(this).attr('for');
			});

			// tab accordion mode hashing in mobile.
			$('#' + tabsID + '.sp-tab__default-accordion .sp-tab__tab-pane').on('click', function (e) {
				e.preventDefault();
				// Add hash url
				window.location.hash = '#' + $(this).attr('id');
			});
		});
	});

})( jQuery );