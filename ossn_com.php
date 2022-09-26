<?php
/**
 * Open Source Social Network
 *
 * @package   Open Source Social Network
 * @author    Rafael Amorim <amorim@rafaelamorim.com.br>
 * @copyright (C) OpenTeknik LLC
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 * 
 */

define('__OSSN_LOCATION__', ossn_route()->com . 'OssnLocation/'); 

/**
 * Initialize Ossn Location Component
 *
 * @return void
 * @access private
 */
function ossn_location() {
    ossn_register_com_panel('OssnLocation', 'settings');

    if(ossn_isAdminLoggedin()) {
        ossn_register_action('location/admin/settings', __OSSN_LOCATION__ . 'actions/settings.php');
    }
    
    if (ossn_location_api_key()){
        //unloading old Algolia places. 
        //Source: AutoLocationWorkaround by Michael Zülsdorff (https://www.opensource-socialnetwork.org/component/view/6097)
        ossn_unlink_external_js('places.min');    
    
        //css and js
        ossn_extend_view('css/ossn.default', 'css/location');
        ossn_extend_view('js/ossn.site', 'js/ossn_location');

        ossn_new_external_css('mapbox-gl.css','//api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.css',false);
        ossn_new_external_js('mapbox-gl.js','//api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.js',false);
        
        ossn_new_external_js('mapbox-gl-geocoder.min.js','//api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js',false);
        ossn_new_external_css('mapbox-gl-geocoder.css','//api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css',false);
        
        ossn_load_external_js('mapbox-gl.js');
        ossn_load_external_css('mapbox-gl.css');
        
        ossn_load_external_js('mapbox-gl-geocoder.min.js');
        ossn_load_external_css('mapbox-gl-geocoder.css');
    }
}

/**
 * Location API key
 *
 * @return boolean|string
 */
function ossn_location_api_key(){
    $component = new OssnComponents();
    $settings  = $component->getComSettings('OssnLocation');
    if($settings && isset($settings->api_key) && !empty($settings->api_key)){
            return $settings->api_key;
    }
    return false;
}

//initilize ossn location
ossn_register_callback('ossn', 'init', 'ossn_location');
