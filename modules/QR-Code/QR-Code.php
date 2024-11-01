<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class FLBasicExampleModule
 */
class SABBQrCodeModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Auto Generate QR Code ', 'Sabb'),
            'description'   => __('An QRCode Module Generate Qr Code.', 'Sabb'),
            'category'		=> __('Supreme Modules', 'Sabb'),
            'dir'           => BB_SUPREME_ADDON_DIR . 'modules/QR-Code',
            'url'           => BB_SUPREME_ADDON_URL . 'modules/QR-Code',
			'group'         => 'Sabb',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
    }
}


/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('SABBQrCodeModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'Sabb'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('QR Code', 'Sabb'), // Section Title
                'fields'        => array( // Section Fields
            
                    'Qrcode_field' => array(
                        'type'          => 'textarea',
                        'label'         => __('Enter  Your Qr Code', 'Sabb'),
                        'default'       => 'Supreme',
                        'placeholder'   => __('Enter Your QR Code', 'Sabb'),
                        'rows'          => '6',
                        'preview'         => array(
                            'type'             => 'text',
                            'selector'         => '.fl-example-text'  
                        )
                    ),  'Qr_code_width' => array(
                        'type' => 'text',
                        'label' => __('Widht', 'fl-builder'),
                        'description' => 'px',
                         'default'       => '100',
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.fl-example-text',
                            'property' => 'font-size',
                            'unit' => 'px'
                        )
                    ), 'Qr_code_height' => array(
                        'type' => 'text',
                        'label' => __('Height', 'fl-builder'),
                          'default'       => '120',
                        'description' => 'px',
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.fl-example-text',
                            'property' => 'font-size',
                            'unit' => 'px'
                        )
                    )
                )
            )
        )
    )
));



if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
if (!class_exists('QRcode')) {
    include(BB_SUPREME_ADDON_DIR .'/assets/lib/qrlib.php');
}

function sabbqrcode_func($atts) {
	autoqrcode_sabb();
    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = $upload_dir . '/autoqrcode/';
    if(!file_exists($upload_dir . $atts['qrcode'] . '.png')){
        QRcode::png($atts['qrcode'], $upload_dir . $atts['qrcode'] . '.png');
    }
    $width = isset($atts['qrwidth'])?$atts['qrwidth'].'px;':'';
    $height = isset($atts['qrheight'])?$atts['qrheight'].'px;':'';
    
    $get_img = $upload['baseurl'] . '/autoqrcode/' . $atts['qrcode'] . '.png';
    return "<img src=$get_img  style='height:$height width:$width >";
}

add_shortcode('auto_qrcodesabb', 'sabbqrcode_func');
function autoqrcode_sabb() {
    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = $upload_dir . '/autoqrcode';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0700);
    }
}

