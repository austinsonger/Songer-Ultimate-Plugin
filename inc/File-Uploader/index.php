<?php
/*
  Sub-Plugin -  SONGER File Uploader
  Description: Automatically convert file fields into multi file uploaders.
  Version: 1.0
  License: GPLv2 or later
 */

class SONGER_File_Uploader {
    /* Include neccessary actions and filters to initialize the plugin.
    * @param  -
    * @return -
    */
    public function __construct() {
        add_action( 'admin_enqueue_scripts', array( $this, 'include_scripts' ) );
        add_filter( 'upload_mimes', array( $this, 'filter_mime_types' ) );
    }
    /* Modify the allowed mime types for specific post type.
    * @param  array List of mime types generated from WordPress core and through plugins
    * @return array List of updated mime types */
    function filter_mime_types( $mimes ) {
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
        );
        do_action_ref_array( 'SONGER_custom_mimes', array(&$mimes) );
        return $mimes;
    }
    /*
    * Include neccessary scripts for media uploader integration.
    * @param  -
    * @return -
    */
    public function include_scripts() {
        global $post;
        wp_enqueue_script('jquery');

        if (function_exists('wp_enqueue_media')) {
            wp_enqueue_media();
        } else {
            wp_enqueue_style('thickbox');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
        }
        wp_register_script('SONGER_file_upload', plugins_url('js/SONGER-file-uploader.js', __FILE__), array('jquery'));
        wp_enqueue_script('SONGER_file_upload');
    }
}
$file_uploader = new SONGER_File_Uploader();
/*
 * Extending the plugin with the same file.
 * Ideally you should be using a seperate plugin to extend the
 * features of core plugins.
 */
function SONGER_custom_mimes(&$mimes) {
        $mimes['png'] = 'image/png';    
}
add_action("SONGER_custom_mimes", "SONGER_custom_mimes");
?>
