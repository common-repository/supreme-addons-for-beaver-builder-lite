<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example: 
 */


?>
<div class="sabb-qrcode">	
<?php echo do_shortcode( '[auto_qrcodesabb qrcode="'.$settings->Qrcode_field.'" qrwidth = "'.$settings->Qr_code_width.'"  qrheight = "'.$settings->Qr_code_height.'" ]'  ); ?>
</div>