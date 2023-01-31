<?php
/**
 * Template Name: Get Captcha By Custom RP
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
function recaptcha_validated()
{
    if (empty($_POST['g-recaptcha-response'])) {
        // echo "working fine first";
        return false;
    }

    $response = wp_remote_get(add_query_arg(array(
        'secret' => '6LfC-KQfAAAAACatncfjmzthw6aE5kbxJoONaSXL',
        'response' => isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '',
        'remoteip' => isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'],
    ), 'https://www.google.com/recaptcha/api/siteverify'));

    if (is_wp_error($response) || empty($response['body']) || !($json = json_decode($response['body'])) || !$json->success) {
        return new WP_Error( 'validation-error',  __('working fine. Please try again.' ) );
        return false;
    }
    echo "working fine third";
    return true;
}

// reCAPTCHA data was POSTed, let's validate it!
if (!empty($_POST['DO_STEP_1'])) {

    if (recaptcha_validated() === false) {
        $recaptcha_error = true;
        print '<div class="error message">' . __('reCAPTCHA failed, please try again.') . '</div>';
    }

}

// Because we want to show the form again if there was an error, we first check if error var is set OR if DO_STEP_1 and token-id are empty
if (isset($recaptcha_error) || (empty($_POST['DO_STEP_1']) && empty($_GET['token-id']))) {
    print '<h2 class="pad">Invoice Details</h2>
        <form method="post">
          <table>
          <tr><td><input type="text" name="shipping-address-first-name" placeholder="First Name" ></td></tr>
          <tr><td><input type="text" name="shipping-address-last-name" placeholder="Last Name" ></td></tr>
          <tr><td><input type="text" name="shipping-address-company" placeholder="Company" ></td></tr>
          <tr><td><input type="text" name="billing-address-phone" placeholder="Phone Number" ></td></tr>
          <tr><td><input type="text" name="billing-address-email" placeholder="Email Address" ></td></tr>
          <tr><td><input type="text" name="billing-invoice" placeholder="Invoice or Customer Number"></td></tr>
          <tr><td><input type="text" name="billing-amount" placeholder="Total Amount" ></td></tr>

          <tr><td><h4><br />Payment Information</h4></td></tr>

          <tr><td><input type="text" name="billing-address-first-name" placeholder="Cardholder First Name" ></td></tr>
          <tr><td><input type="text" name="billing-address-last-name" placeholder="Cardholder Last Name" ></td></tr>
          <tr><td><input type="text" name="billing-address-address1" placeholder="Address" ></td></tr>
          <tr><td><input type="text" name="billing-address-address2" placeholder="Address 2"></td></tr>
          <tr><td><input type="text" name="billing-address-city" placeholder="City" ></td></tr>
          <tr><td><input type="text" name="billing-address-state" placeholder="State" ></td></tr>
          <tr><td><input type="text" name="billing-address-zip" placeholder="Zip/Postal Code" ></td></tr>
          <tr><td><input type="text" name="billing-address-country" placeholder="Country" value="US" ></td></tr>
       <tr><td><div class="g-recaptcha" data-sitekey="6LfC-KQfAAAAAE-sEi9efosMCJYJl1rNu5Dpj7ph"></div></td></tr>
          <tr><td><input type="submit" class="btn pad" value="Continue"><input type="hidden" name="DO_STEP_1" value="true"></td></tr>
          </table>
        </form>

    ';
}
?>
<?php get_template_part('template-parts/footer-menus-widgets');?>

<?php get_footer();?>