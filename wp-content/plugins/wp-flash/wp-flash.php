<?php
/*
  Plugin Name: WP Flash & Ruffle
  Version: 3.3
  Author: CyberSEO.net
  Author URI: http://www.cyberseo.net/
  Description: Inserts Adobe Flash animation into WordPress blog posts, pages and RSS feeds. Both Adobe Flash Player and Ruffle Flash Player emulator can be used to play the .swf files.
 */

if (!function_exists("add_filter")) {
    die();
}

function wpFlashParseShortcode($string) {
    @list($url, $width, $height, $bgcolor, $wmode) = explode(" ", $string);
    $obj = '';
    if (isset($bgcolor)) {
        $obj .= ' bgcolor="' . $bgcolor . '"';
    }
    if (isset($wmode)) {
        $obj .= ' wmode="' . $wmode . '"';
    }
    return '<embed type="application/x-shockwave-flash" width="' . $width . '" height="' . $height . '" src="' . $url . '"' . $obj . '></embed>';
}

function wpFlashInsertSwf($content) {
    return preg_replace_callback("/\[swf: ?(.*?)]/i", function($matches) {
        return str_replace('  ', ' ', stripslashes(wpFlashParseShortcode($matches[1])));
    }, $content);
}

function wpFlashMenu() {
    if (isset($_POST['update_wp_flash_settings']) && check_admin_referer('wp_flash_settings')) {
        update_option('wp_flash_use_ruffle', $_POST['wp_flash_use_ruffle']);
    }
    $wp_flash_use_ruffle = get_option('wp_flash_use_ruffle');
    ?>
    <div class="wrap">
        <?php
        // Advertisement
        echo file_get_contents('http://www.cyberseo.net/info/CyberSEO/ad-common.php');
        ?>
        <h1>WP Flash</h1>
        <p>
        <p>
            The WP Flash plugin allows you to easily insert an Adobe flash animation into WordPress blogs, using the following shortcode:
        </p>
        <p>
            <code>[swf:url width height bgcolor wmode]</code>
        </p>
        <p>
            where:
        </p>
        <ul style="list-style-type: square; list-style-position: inside; margin-left: 10pt">
            <li><strong>url</strong>: URL of a SWF file (flash object);</li>
            <li><strong>width</strong>: width of the flash object;</li>
            <li><strong>height</strong>: height of the flash object;</li>
            <li><strong>bgcolor</strong>: background color (optional);</li>
            <li><strong>wmode</strong>: wmode, e.g. transparent (optional).</li>
        </ul>
        <p>
            e.g.:
        </p>
        <p>
            <code>[swf:http://studenthome.nku.edu/~russelljo/flash/dudefalling.swf 640 480]</code>
        </p>
    </p>
    <br />
    <form name="wp_flash_settings" method="post">
        <p>
            <?php
            echo '<input type="checkbox" name="wp_flash_use_ruffle" ' . (($wp_flash_use_ruffle == 'on') ? 'checked ' : '') . '> <label>use <a href="https://ruffle.rs/" target="_blank">Ruffle</a> as an alternative to retired Adobe Flash Player. Please read the <a href="https://ruffle.rs/#usage" target="_blank">manual</a> before activation of this option!</label>';
            ?>
        </p>
        <p>        
            <input class="button-primary" name="update_wp_flash_settings" value="Save settings" type="submit">    
        </p>
        <?php wp_nonce_field('wp_flash_settings'); ?>
    </form>   
    </div>
    <?php
}

function wp_flash_main_menu() {
    if (function_exists('add_options_page')) {
        add_options_page(__('WP Flash'), __('WP Flash'), 'manage_options', 'wp_flash', 'wpFlashMenu');
    }
}

function wpFlashHead() {
    echo apply_filters('wpFlashHead', '<script src="' . get_site_url() . '/wp-content/plugins/wp-flash/ruffle/ruffle.js"></script>' . "\n");
}

if (is_admin()) {
    add_action('admin_menu', 'wp_flash_main_menu');
} else {
    add_filter('the_content', 'wpFlashInsertSwf');
    add_filter('the_excerpt', 'wpFlashInsertSwf');
    if (get_option('wp_flash_use_ruffle') == 'on') {
        add_action('wp_head', 'wpFlashHead');
    }
}
?>