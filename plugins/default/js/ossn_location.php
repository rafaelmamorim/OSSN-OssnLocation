//<script>
    /**
     * Open Source Social Network
     *
     * @package   Open Source Social Network
     * @author    Rafael Amorim <amorim@rafaelamorim.com.br>
     * @copyright (C) OpenTeknik LLC
     * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
     * @link      https://www.opensource-socialnetwork.org/
     */
    Ossn.register_callback('ossn', 'init', 'ossn_location_init');
    Ossn.register_callback('ossn', 'init', 'ossn_wall_location');

    /**
     * Setup Google Location input
     *
     * Remove google map search API as it requires API #906 
     * 
     * @return void
     */
    function ossn_wall_location() {
        $(document).ready(function() {
            if ($('#ossn-wall-location-input').length) {
                //Location autocomplete not working over https #1043
                //Change to places js
                var placesAutocomplete = places({
                    container: document.querySelector('#ossn-wall-location-input')
                });
                $('#ossn-wall-location-input').on('keypress', function(event) {
                    if (event.keyCode == 13) {
                        event.preventDefault();
                        return false;
                    }
                });
            }
        });
    }

    function ossn_location_init() {
        $(document).ready(function() {
            console.log('here in ossnLocation');
            $('.ossn-wall-photo').before('<li class="ossn-wall-location"><i class="fa fa-map-marker"></i></li>');
            $('#ossn-wall-photo').after('<div id="ossn-wall-location" style="display:none;"><input type="text" placeholder="<?php echo ossn_print('enter:location'); ?>" name="location" id="ossn-wall-location-input"/></div>');

            $('.ossn-wall-container').find('.ossn-wall-friend').on('click', function() {
                $('#ossn-wall-location').hide();
                $('#ossn-wall-photo').hide();
                $('#ossn-wall-friend').show();
            });
            $('.ossn-wall-container').find('.ossn-wall-location').on('click', function() {
                $('#ossn-wall-friend').hide();
                $('#ossn-wall-photo').hide();
                $('#ossn-wall-location').show();
            });
            $('.ossn-wall-container').find('.ossn-wall-photo').on('click', function() {
                $('#ossn-wall-friend').hide();
                $('#ossn-wall-location').hide();
                $('#ossn-wall-photo').show();
            });
        });
    }