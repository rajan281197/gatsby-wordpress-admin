<?php
/**
 * Template Name: Custom Captcha Wordpress
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>
<script src='https://www.google.com/recaptcha/api.js' async defer ></script>



<form id="frmContact" action="#" method="POST" novalidate="novalidate">
   <div class="g-recaptcha" data-sitekey="6LfC-KQfAAAAAE-sEi9efosMCJYJl1rNu5Dpj7ph"></div>

   <input type="Submit" name="Submit">

</form>

<?php
if(empty($_POST['g-recaptcha-response']))
{
      $secret = '6LfC-KQfAAAAACatncfjmzthw6aE5kbxJoONaSXL';

        $verifyResponse = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret=". $secret ."&response=". $_POST['g-recaptcha-response']);

      $responseData = json_decode($verifyResponse["body"], true);
      if(true == $response["success"])
          $message = "g-recaptcha varified successfully";
      else
          $message = "Some error in vrifying g-recaptcha";
     echo $message;
 }
?>
<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>