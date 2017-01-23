<?php

/**
 * Add a 'Delete confirmation dialgue box' for removing ACF Flexible Content Row
 * @author Ben Bankley (this is incredible, thank you Ben!)
 * https://acfextras.com/flexible-content-page-builder/
 */
add_action( 'acf/input/admin_head', 'redblue_sections_delete_dialogue' );
function redblue_sections_delete_dialogue() {
    ?>
    <script type="text/javascript">
        (function($) {

            acf.add_action('ready', function(){

                $('body').on('click', 'li.acf-fc-show-on-hover a.acf-icon.-minus.small', function( e ){

                    return confirm("Do you really want to delete this?");
                });
            });
        })(jQuery);
    </script>
    <?php
}

/**
 * Start with all boxes closed, for a less intimidating UI and to avoid accidentally editing the wrong box.
 */
add_action('acf/input/admin_head', 'redblue_sections_acf_input_admin_head');
function redblue_sections_acf_input_admin_head() {
    ?>
        <script type="text/javascript">
        jQuery(document).ready(function( $ ) {

            $( '.layout' ).addClass( '-collapsed' );
            $( '.acf-row' ).addClass( '-collapsed' );

        });
        </script>
    <?php
}
