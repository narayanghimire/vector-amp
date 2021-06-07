<?php 
/*
*
*	***** Vector Map  *****
*
*	Shortcodes
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
/*
*
*  Build The Custom Plugin Form
*
*  Display Anywhere Using Shortcode: [vm_custom_plugin_form]
*
*/
function vm_custom_plugin_form_display(){?>
    <section class="KBmap" id="KBtestmap"></section>
    <script>
        <?php
        global $wpdb;
         $prefix = $wpdb->prefix;
        $table_name = $prefix."vector_map";
        $json_object = null;
        $popups = $wpdb->get_results ("SELECT * FROM $table_name");
        $baseurl  = wp_get_upload_dir();
        if(count($popups) > 0) {
            foreach ($popups as $i => $popup) {
                $i = $i+1;
                $path = $baseurl['baseurl'].'/map-image/'.$popup->marker_image;
                $profile = $baseurl['baseurl'].'/map-image/'.$popup->image;
                $mapMarker["mapMarker$i"] = [
                    'cordX'=>"$popup->coordinate_x",
                    'cordY'=>"$popup->coordinate_y",
                    'icon'=> $path,
                    'modal'=>[
                        "title" => "$popup->company_name",
                        "content" =>"
                            <img src='".$profile."' width='200px' height='173px'>
                            <p style='font-size: 12px !important;'>
                            $popup->name<br>
                            $popup->designation<br>
                            $popup->company_name<br>
                            $popup->website<br>
                            $popup->location_name<br>
                            $popup->phone<br>
                            $popup->fax<br>
                            $popup->email<br>
                            $popup->description<br>
                            </p>"
                    ],
                ];
            }
        }

        ?>
        var json = <?php echo json_encode($mapMarker)?>;

        (function($) {

            $(document).ready(function(){
                var map_name = "<?php echo plugins_url( '../img/', __FILE__ )?>";
                createKBmap('KBtestmap', map_name+'/map.png');

                KBtestmap.importJSON(json);

                KBtestmap.showAllMapMarkers();

            });

        })(jQuery);

    </script>
    <?php
}
/*
Register All Shorcodes At Once
*/
add_action( 'init', 'vm_register_shortcodes');
function vm_register_shortcodes(){
	// Registered Shortcodes
	add_shortcode ('vm_map', 'vm_custom_plugin_form_display' );
};
