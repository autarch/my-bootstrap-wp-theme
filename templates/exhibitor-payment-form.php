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
  <input type="hidden" name="item_name" value="Twin Cities Veg Fest Exhibitor Payment">
  <input type="hidden" id="paypal-amount" name="amount" value="">
  <input type="hidden" name="business" value="paypal@exploreveg.org">

  <h3>Exhibitor Type</h3>

  <div class="radio">
    <label id="fc-label" for="fc">
      <input id="fc" type="radio" name="type" value="Food court vendor" />
      Food court vendor - $450
    </label>
  </div>

  <div class="radio">    
    <label id="fp-label" for="fp">
      <input id="fp" type="radio" name="type" value="For-profit" />
      For-profit - $225
    </label>
  </div>

  <div class="radio">
    <label id="np-label" for="np">
      <input id="np" type="radio" name="type" value="Non-profit" />
      Non-profit - $150
    </label>
  </div>

  <div class="radio">
    <label id="aa-label" for="aa">
      <input id="aa" type="radio" name="type" value="Animal Advocacy Non-profit" />
      Animal Advocacy Non-profit - $100
    </label>
  </div>

  <div class="radio">
    <label id="artist-label" for="artist">
      <input id="artist" type="radio" name="type" value="Artist" />
      Artist or Student Group - $75
    </label>
  </div>

  <h3>Extras</h3>

  <div class="form-group">
    <label for="extra-spaces">
      <select name="extra-spaces" id="extra-spaces">
        <option value="0" selected="selected">No extra spaces</option>
        <option value="50">1 extra space - $50</option>
        <option value="100">2 extra spaces - $100</option>
      </select>
    </label>
    <p class="help-block">
      Food vendors will be given 4 tent spaces
    </p>
  </div>

  <div class="form-group">
    <label for="electricity">
      <select name="electricity" id="electricity">
        <option value="0" selected="selected">No electricity</option>
        <option value="25">Light use - $25</option>
        <option value="150">Heavy use - $150</option>
      </select>
    </label>
    <p class="help-block">
      Light use is a laptop or other computer equipment. Heavy use is any sort
      of cooking equipment including microwaves, electric grills, warmers,
      etc.
    </p>
  </div>

  <div class="form-group">
    <label><strong>Total: <span id="total">Pick an exhibitor type</span></strong></label>
    <br>
    <input id="paypal-button" type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_SM.gif" name="submit" alt="Pay with PayPal">
    <img alt="" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
  </div>
</form>

<p>
  Your payment constitutes acceptance of
  the <a href="/exhibit-twin-cities-veg-fest/exhibitor-guidelines/">Twin Cities Veg Fest Exhibitor
  Guidelines</a>.
</p>

<p>
  You can also pay by sending a check made out to <strong>Compassionate Action
  for Animals</strong> to:
</p>

<address>
Compassionate Action for Animals<br>
2100 1st Ave S, Suite 200<br>
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
         "fc": 450,
         "fp": 225,
         "np": 150,
         "aa": 100,
         "artist": 75,
     };

     $("#paypal-button").hide();

     var form = $("#exhibitor-payment");

     var updateTotal = function () {
         var type = $( 'input[name="type"]:checked', form ).attr("id");
         if ( ! type ) {
             return;
         }

         var total = baseCost[type];

         if ( type == "fc" ) {
             $("#extra-spaces option[value='0']").prop( "selected", true );
             $("#extra-spaces").attr( "disabled", true );
         }
         else {
             $("#extra-spaces").removeAttr("disabled");

             total += parseInt( $("#extra-spaces option:selected").val() );
         }

         total += parseInt( $("#electricity option:selected").val() );

         $("#total").text( "$" + total );
         $("#paypal-amount").val(total);
         $("#paypal-button").show();
     };

     $("#exhibitor-payment input").change(updateTotal);
     $("#extra-spaces").change(updateTotal);
     $("#electricity").change(updateTotal);

     $("#exhibitor-payment").submit(
         function () {
             if ( ! $("#paypal-amount").val() ) {
                 alert("Please select an exhibitor type");
                 return false;
             }
         }
     );

     updateTotal();
})();
</script>

        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();
