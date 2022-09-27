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
     * Setup Location input
     * 
     * Using mapbox API to solve <https://github.com/opensource-socialnetwork/opensource-socialnetwork/issues/2184>
     * 
     * @return void
     */
    function ossn_wall_location() {
        $(document).ready(function() {
            if ($('.ossn-wall-location').length) {
                mapboxgl.accessToken = '<?php echo ossn_location_api_key(); ?>';
                const geocoder = new MapboxGeocoder({
                    accessToken: mapboxgl.accessToken,
                    language: '<?php echo ossn_site_settings('language');?>',
                    types: 'country,region,place,postcode,locality,neighborhood'
                });

                geocoder.addTo('#ossn-wall-location');

                // Clear results container when search is cleared.
                geocoder.on('clear', () => {
                    //results.innerText = '';
                });

                $('.mapboxgl-ctrl-geocoder--input').attr('id', 'ossn-wall-location-input');
                $('.mapboxgl-ctrl-geocoder--input').attr('name', 'location');
                $('.mapboxgl-ctrl-geocoder--input').attr('autocomplete', 'off');
                $('.mapboxgl-ctrl-geocoder--input').attr('placeholder', '<?php echo ossn_print('enter:location'); ?>');
                $('.mapboxgl-ctrl-geocoder--input').attr('aria-label', '<?php echo ossn_print('enter:location'); ?>');
            }
        });
    }

    function ossn_location_init() {
        $(document).ready(function() {
            if ($('.ossn-wall-location').length) {
                //remove original button and div from OssnWall component
                $('.ossn-wall-location').remove();
                $('#ossn-wall-location').remove();

                $('.ossn-wall-photo').before('<li class="ossn-wall-location ossn-wall-container-control-menu-location"><i class="fa fa-map-marker-alt"></i></li> ');
                $('#ossn-wall-photo').after('<div id="ossn-wall-location" style="display:none;"></div>');

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
            }
        });
    }

    function ossn_wall_clear_form() {
        var $file = $("#ossn-wall-form").find("input[type='file']");
        $file.replaceWith($file.val('').clone(true));
        $('#ossn-wall-photo').hide();

        $("#ossn-wall-location-input").val('');
        $('#ossn-wall-location').hide();

        $('#ossn-wall-friend-input').val('');
        if ($('#ossn-wall-friend-input').length) {
            $("#ossn-wall-friend-input").tokenInput("clear");
            $('#ossn-wall-friend').hide();
        }

        $('#ossn-wall-form').find('input[type=submit]').show();
        $('#ossn-wall-form').find('.ossn-loading').addClass('ossn-hidden');
        $('#ossn-wall-form').find('textarea').val("");

        $('.ossn-wall-container-data textarea').removeClass('postbg-container');
        $('.ossn-wall-container-data textarea').attr('style', '');
        $('#ossn-wall-postbg').attr('data-toggle', 0);
        $('#ossn-wall-postbg').hide();
    }

    function places() {
        // prevent javascript errors
        // by dummy replacement of original places function
        // called in OssnWall's javascript
        // Source: AutoLocationWorkaround by Michael Zülsdorff (https://www.opensource-socialnetwork.org/component/view/6097)
    }