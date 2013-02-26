<?php
/** exhibitor-payment-form.php
 *
 * Template Name: Exhibitor Payment Form
 *
 * @author		Dave Rolsky
 * @package		VegFest 2013
 */

get_header(); ?>

<section id="primary" class="span8">

	<?php tha_content_before(); ?>
	<div id="content" role="main">
		<?php tha_content_top(); ?>

<!-- FORMBUILDER CSS CUSTOMIZATION -->
<!-- END FORMBUILDER CSS CUSTOMIZATION -->
<style type="text/css">

</style>

<p>
You can pay through PayPal using the form below.
</p>

<form action="https://www.paypal.com/cgi-bin/webscr" id="exhibitor-payment" method="post">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="item_name" value="Veg Fest 2013 Exhibitor Payment">
  <input type="hidden" id="paypal-amount" name="amount" value="">
  <input type="hidden" name="business" value="paypal@exploreveg.org">

  <fieldset>
    <legend>Exhibitor Type</legend>

    <label id="fc-label" for="fc" class="checkbox">
      <input id="fc" type="radio" name="type" value="Food court vendor" />
      Food court vendor - $150
    </label>

    <label id="fp-label" for="fp" class="checkbox">
      <input id="fp" type="radio" name="type" value="For-profit" />
      For-profit - $100
    </label>

    <label id="np-label" for="np" class="checkbox">
      <input id="np" type="radio" name="type" value="Non-profit" />
      Non-profit - $50
    </label>

    <label id="artist-label" for="artist" class="checkbox">
      <input id="artist" type="radio" name="type" value="Artist" />
      Artist - $10
    </label>

  </fieldset>

  <fieldset>
    <legend>Extras</legend>

    <label for="extra-table" class="checkbox">
      <input id="extra-table" type="checkbox" name="extra-table" value="1" />
      Second table - $25
    </label>
    <span class="help-block">
      This is included in the price for food vendors.
    </span>

    <label for="electricity" class="checkbox">
      <input id="electricity" type="checkbox" name="electricity" value="1" />
      Electricity - $25
    </label>
    <span class="help-block">
      This is included in the price for food vendors.
    </span>

  </fieldset>

  <fieldset>
    <label><strong>Total: <span id="total"></span></strong></label>

    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="Pay with PayPal">
    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
  </fieldset>
</form>

<p>
  Your payment constitutes acceptance of
  the <a href="/exhibitor-guidelines/">Twin Cities Veg Fest Exhibitor
  Guidelines</a>.
</p>

<p>
  You can also pay by sending a check made out to <strong>Compassionate Action
  for Animals</strong> to:
</p>

<address>
Compassionate Action for Animals<br />
PO Box 13149<br />
Minneapolis, MN 55414
</address>

<p>
  Questions? Feel free to contact
  our <a href="mailto:exhibitors@tcvegfest.com">exhibitor coordinator</a> or
  call us at 612-276-2242.
</p>
		
		<?php tha_content_bottom(); ?>
	</div><!-- #content -->
	<?php tha_content_after(); ?>
</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>

<script>
(function () {
     var $ = jQuery;

     var baseCost = {
         "fc": 150,
         "fp": 100,
         "np": 50,
         "artist": 10
     };

     var form = $("#exhibitor-payment");

     var updateTotal = function () {
         var selected = $( 'input[name="type"]:checked', form ).attr("id");
         if ( ! selected ) {
             return;
         }

         var total = baseCost[selected];

         if ( selected == "fc" ) {
             $.each(
                 [ "#extra-table", "#electricity" ],
                 function ( idx, id ) {
                     $( id, form ).removeAttr("checked").attr( "disabled", 1 );
                 }
             );
         }
         else {
             $.each(
                 [ "#extra-table", "#electricity" ],
                 function ( idx, id ) {
                     var elt = $( id, form );
                     elt.removeAttr("disabled");
                     if ( elt.attr("checked") ) {
                         total += 25;
                     }
                 }
             );
         }

         $("#total").text( "$" + total );
         $("#paypal-amount").val(total);
     };

     $("#exhibitor-payment input").change(updateTotal);

     $("#exhibitor-payment").submit(
         function () {
             if ( ! $("#paypal-amount").val() ) {
                 alert("Please select an exhibitor type");
                 return false;
             }
         }
     );
})();
</script>

/* End of file index.php */
/* Location: ./wp-content/themes/the-bootstrap/category.php */
