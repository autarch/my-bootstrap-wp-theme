<?php
/** exhibitor-payment-form.php
 *
 * Template Name: Exhibitor Payment Form
 *
 * @author		Dave Rolsky
 * @package		Exploreveg
 */

get_header(); ?>

      <div class="row">
        <div class="col-sm-9 col-xs-12">
          <?php tha_content_before(); ?>
          <?php tha_content_top(); ?>

<p>
You can pay through PayPal using the form below.
</p>

<form action="https://www.paypal.com/cgi-bin/webscr" id="exhibitor-payment" method="post">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="item_name" value="Twin Cities Veg Fest 2014 Exhibitor Payment">
  <input type="hidden" id="paypal-amount" name="amount" value="">
  <input type="hidden" name="business" value="paypal@exploreveg.org">

  <fieldset>
    <legend>Exhibitor Type</legend>

    <div class="radio">
      <label id="fc-label" for="fc">
        <input id="fc" type="radio" name="type" value="Food court vendor" />
        Food court vendor - $200
      </label>
    </div>

    <div class="radio">    
      <label id="fp-label" for="fp">
        <input id="fp" type="radio" name="type" value="For-profit" />
        For-profit - $150
      </label>
    </div>

    <div class="radio">
      <label id="np-label" for="np">
        <input id="np" type="radio" name="type" value="Non-profit" />
        Non-profit - $100
      </label>
    </div>

    <div class="radio">
      <label id="artist-label" for="artist">
        <input id="artist" type="radio" name="type" value="Artist" />
        Artist - $25
      </label>
    </div>

  </fieldset>

  <fieldset>
    <legend>Extras</legend>

    <div class="form-group">
      <label for="extra-tables">
        <select name="extra-tables" id="extra-tables">
          <option value="0" selected="selected">No extra tables</option>
          <option value="1">1 extra table - $25</option>
          <option value="2">2 extra tables - $50</option>
        </select>
      </label>
      <p class="help-block">
        Food vendors will be given 4 tables total, with 2 facing the attendees
        and 2 behind you.
      </p>
    </div>

    <div class="checkbox">
      <label for="electricity">
        <input id="electricity" type="checkbox" name="electricity" value="1" />
        Electricity - $15
      </label>
      <p class="help-block">
        This is included in the price for food vendors.
      </p>
    </div>

  </fieldset>

  <fieldset>
    <div class="form-group">
      <label><strong>Total: <span id="total">Pick an exhibitor type</span></strong></label>
      <br>
      <input id="paypal-button" type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_SM.gif" name="submit" alt="Pay with PayPal">
      <img alt="" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </div>
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
Compassionate Action for Animals<br>
2100 1st Ave S<br>
Suite 200<br>
Minneapolis, MN 55404
</address>

<p>
  Questions? Feel free to contact
  our <a href="mailto:exhibitors@tcvegfest.com">exhibitor coordinator</a> or
  call us at 612-276-2242.
</p>

<script>
(function () {
     var $ = jQuery;

     var baseCost = {
         "fc": 200,
         "fp": 150,
         "np": 100,
         "artist": 25
     };

     $("#paypal-button").hide();

     var form = $("#exhibitor-payment");

     var updateTotal = function () {
         var selected = $( 'input[name="type"]:checked', form ).attr("id");
         if ( ! selected ) {
             return;
         }

         var total = baseCost[selected];

         if ( selected == "fc" ) {
             $.each(
                 [ "#extra-tables", "#electricity" ],
                 function ( idx, id ) {
                     $( id, form ).removeAttr("checked").attr( "disabled", 1 );
                 }
             );
         }
         else {
             $.each(
                 [ "#extra-tables", "#electricity" ],
                 function ( idx, id ) {
                     var elt = $( id, form );
                     elt.removeAttr("disabled");
                 }
             );

             if ( $("#electricity").attr("checked") ) {
                 total += 15;
             }

             var tables = $("#extra-tables").val();
             total += 25 * tables;
         }

         $("#total").text( "$" + total );
         $("#paypal-amount").val(total);
         $("#paypal-button").show();
     };

     $("#exhibitor-payment input").change(updateTotal);
     $("#extra-tables").change(updateTotal);

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

        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();
