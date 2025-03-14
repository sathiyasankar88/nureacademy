/**
 * Plugin for linking multiple owl instances
 * @version 1.0.0
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function ($, window, document, undefined) {
    /**
     * Creates the Linked plugin.
     * @class The Linked Plugin
     * @param {Owl} carousel - The Owl Carousel
     */
    var Linked = function (carousel) {
        /**
         * Reference to the core.
         * @protected
         * @type {Owl}
         */
        this._core = carousel;

        /**
         * All event handlers.
         * @protected
         * @type {Object}
         */
        this._handlers = {
            'dragged.owl.carousel changed.owl.carousel': $.proxy(function (e) {
                if (e.namespace && this._core.settings.linked) {
                    this.update(e);
                }
            }, this),
            'linked.to.owl.carousel': $.proxy(function (e, index, speed, standard, propagate) {
                if (e.namespace && this._core.settings.linked) {
                    this.toSlide(index, speed, propagate);
                }
            }, this)
        };

        // register event handlers
        this._core.$element.on(this._handlers);

        // set default options
        this._core.options = $.extend({}, Linked.Defaults, this._core.options);
    };

    /**
     * Default options.
     * @public
     */
    Linked.Defaults = {
        linked: false
    };

    /**
     * Updated linked instances
     */
    Linked.prototype.update = function (e) {
        this.toSlide(e.relatedTarget.relative(e.item.index));
    };

    /**
     * Carry out the to.owl.carousel proxy function
     * @param {int} index
     * @param {int} speed
     * @param {bool} propagate
     */
    Linked.prototype.toSlide = function (index, speed, propagate) {
        var id = this._core.$element.attr('id'),
            linked = this._core.settings.linked.split(',');

        if (typeof propagate == 'undefined') {
            propagate = true;
        }

        index = index || 0;

        if (propagate) {
            $.each(linked, function (i, el) {
                $(el).trigger('linked.to.owl.carousel', [index, 300, true, false]);
            });
        } else {
            this._core.$element.trigger('to.owl.carousel', [index, 300, true]);

            if (this._core.settings.current) {
                this._core._plugins.current.switchTo(index);
            }
        }
    };

    /**
     * Destroys the plugin.
     * @protected
     */
    Linked.prototype.destroy = function () {
        var handler, property;

        for (handler in this._handlers) {
            this.$element.off(handler, this._handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };

    $.fn.owlCarousel.Constructor.Plugins.linked = Linked;

})(window.Zepto || window.jQuery, window, document);

/**
 * Hash Plugin
 * @version 2.0.0
 * @author Artus Kolanowski
 * @license The MIT License (MIT)
 */
;(function ($, window, document, undefined) {
    'use strict';

    /**
     * Creates the hash plugin.
     * @class The Hash Plugin
     * @param {Owl} carousel - The Owl Carousel
     */
    var Hash = function (carousel) {
        /**
         * Reference to the core.
         * @protected
         * @type {Owl}
         */
        this._core = carousel;

        /**
         * Hash table for the hashes.
         * @protected
         * @type {Object}
         */
        this._hashes = {};

        /**
         * The carousel element.
         * @type {jQuery}
         */
        this.$element = this._core.$element;

        /**
         * All event handlers.
         * @protected
         * @type {Object}
         */
        this._handlers = {
            'initialized.owl.carousel': $.proxy(function () {
                if (this._core.settings.startPosition == 'URLHash') {
                    $(window).trigger('hashchange.owl.navigation');
                }
            }, this),
            'prepared.owl.carousel': $.proxy(function (e) {
                var hash = $(e.content).find('[data-hash]').andSelf('[data-hash]').attr('data-hash');
                this._hashes[hash] = e.content;
            }, this)
        };

        // set default options
        this._core.options = $.extend({}, Hash.Defaults, this._core.options);

        // register the event handlers
        this.$element.on(this._handlers);

        // register event listener for hash navigation
        $(window).on('hashchange.owl.navigation', $.proxy(function () {
            var hash = window.location.hash.substring(1),
                items = this._core.$stage.children(),
                position = this._hashes[hash] && items.index(this._hashes[hash]) || 0;

            if (!hash) {
                return false;
            }

            this._core.to(position, false, true);
        }, this));
    }

    /**
     * Default options.
     * @public
     */
    Hash.Defaults = {
        URLhashListener: false
    }

    /**
     * Destroys the plugin.
     * @public
     */
    Hash.prototype.destroy = function () {
        var handler, property;

        $(window).off('hashchange.owl.navigation');

        for (handler in this._handlers) {
            this._core.$element.off(handler, this._handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    }

    $.fn.owlCarousel.Constructor.Plugins.Hash = Hash;

})(window.Zepto || window.jQuery, window, document);
