/*// block.js
( function( blocks, element ) {
    var el = element.createElement,
        source = blocks.source;

    function RandomImage( props ) {
        var src = 'http://lorempixel.com/400/200/' + props.category;

        return el( 'img', {
            src: src,
            alt: props.category
        } );
    }

    blocks.registerBlockType( 'myplugin/random-image', {
        title: 'Random Image',

        icon: 'format-image',

        category: 'common',

        attributes: {
            category: {
                type: 'string',
                source: 'attribute',
                attribute: 'alt',
                selector: 'img',
            }
        },

        edit: function( props ) {
            var category = props.attributes.category,
                children;

            function setCategory( event ) {
                var selected = event.target.querySelector( 'option:checked' );
                props.setAttributes( { category: selected.value } );
                event.preventDefault();
            }

            children = [];
            if ( category ) {
                children.push( RandomImage( { category: category } ) );
            }

            children.push(
                el( 'select', { value: category, onChange: setCategory },
                    el( 'option', null, '- Select -' ),
                    el( 'option', { value: 'sports' }, 'Sports' ),
                    el( 'option', { value: 'animals' }, 'Animals' ),
                    el( 'option', { value: 'nature' }, 'Nature' )
                )
            );

            return el( 'form', { onSubmit: setCategory }, children );
        },

        save: function( props ) {
            return RandomImage( { category: props.attributes.category } );
        }
    } );
} )(
    window.wp.blocks,
    window.wp.element
);*/
"use strict";
! function() {
    var n = wp.element.Fragment,
        c = wp.editor.BlockControls,
        t = wp.components,
        r = t.SVG,
        i = t.Path,
        e = function t(o) {
            return function(e) {
                return -1 === SUBlockEditorTabSettings.supportedtabBlocks.indexOf(e.name) ? React.createElement(o, e) : React.createElement(n, null, React.createElement(o, e), React.createElement(c, {
                    controls: [{
                        icon: React.createElement(r, {
                            viewBox: "0 0 20 20",
                            xmlns: "http://www.w3.org/2000/svg"
                        }, React.createElement(i, {
                            d: "m3 3h5.833v2.333h-3.5v9.334h3.5v2.333h-5.833zm8.167 0h5.833v14h-5.833v-2.333h3.5v-9.334h-3.5z"
                        })),
                        title: SUBlocktabEditorL10n.insertTabShortcode,
                        onClick: function t() {
                            SUG.App.insert("block", {
                                props: e
                            })
                        }
                    }]
                }))
            }
        };
    wp.hooks.addFilter("editor.BlockEdit", "shortcodes-ultimate/with-insert-shortcode-button", e)
}();
//# sourceMappingURL=index.js.map
//# sourceMappingURL=index.js.map