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
 ?>
 <div>
	<label>API</label>
    <input type="text" value="<?php echo ossn_location_api_key();?>" name="mapbox_api_key" autocomplete="off"/>
</div>
<div>
	<p><?php echo ossn_print('save');?></p>
</div>
<div>
	<input type="submit" value="<?php echo ossn_print('save');?>" class="btn btn-success btn-sm" />
</div>