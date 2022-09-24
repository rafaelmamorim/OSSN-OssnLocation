<?php
/**
 * Open Source Social Network
 *
 * @package   Open Source Social Network
 * @author    Rafael Amorim <amorim@rafaelamorim.com.br>
 * @copyright (C) OpenTeknik LLC
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
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
        ossn_register_action('location/admin/settings', __OSSN_LOCATION__ . 'actions/location/admin/settings.php');
    }

    //css and js
    ossn_extend_view('css/ossn.default', 'css/location');
    ossn_extend_view('js/ossn.site', 'js/ossn_location');

    ossn_new_external_js('places.min', '//cdn.jsdelivr.net/places.js/1/places.min.js', false);
}

//initilize ossn wall
ossn_register_callback('ossn', 'init', 'ossn_location');
