(function () {
     var $ = jQuery;

     var instrumentWPCF7Form = function (id) {
         var marker = $( "#" + id );
         if ( ! marker.length ) {
             return;
         }

         var container = marker.parent().parent();
         var form = container.find("form");

         form.find(".wpcf7-response-output").detach();

         var modal = $( "#" + id + "-modal" );

         var displayModal = function (title) {
             modal.find("h3").text(title);

             var response = $.parseJSON( form.data("jqxhr").responseText );
             console.log(response);
             modal.find(".modal-body").children().detach();
             modal.find(".modal-body").append( '<p>' + response.message + '</p>' );
             modal.modal("show");
         };

         container.on(
             "mailsent.wpcf7",
             function () {
                 displayModal("Success!");
             }
         ).on(
             "mailfailed.wpcf7",
             function () {
                 displayModal("Error");
             }
         );
     };

     $(document).ready(
         function () {
             $("#front-page-photos").carousel( { interval: false } );

             instrumentWPCF7Form("announce-subscribe");
             $('#announce-subscribe input[name="your-email"]').attr( "placeholder", "Email" );

             instrumentWPCF7Form("vsk-request");
         }
     );

     $(document).bind(
         'em_maps_location_hook',
         function (e, map, infowindow, marker) {
             var address = $("#google-map-address").text().replace(/,\s+(?:,|$)/g, "");
             if ( address && address.length ) {
                 var url = "https://maps.google.com/maps?q=" + encodeURIComponent(address);
                 $("#location-map").append('<a href="' + url + '">View this location on Google Maps</a>');
             }
         }
     );
})();
