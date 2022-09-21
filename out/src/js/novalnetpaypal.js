/*
 * Novalnet PayPal script
 *
 * @author    Novalnet AG
 * @copyright Copyright by Novalnet
 * @license   https://www.novalnet.de/payment-plugins/kostenlos/lizenz
 */
 
$(document).ready(function() {
    // Display one click given card fields.
    $('#nn_new_paypal_link').click(function(event){
        $('#nn_given_paypal_div').hide();
        $('#nn_new_paypal_div').show();
        $('#nn_new_paypal_div_desc').show();
        $('#nn_given_paypal_div_desc').hide();
        $('#novalnet_paypal_new_details').val('1');        
        event.stopImmediatePropagation();
    });

    // Display one click new card fields.
    $('#nn_given_paypal_link').click(function(event){
        $('#nn_new_paypal_div').hide();
        $('#nn_given_paypal_div').show();
        $('#nn_new_paypal_div_desc').hide();
        $('#nn_given_paypal_div_desc').show();
        $('#novalnet_paypal_new_details').val('0');
        event.stopImmediatePropagation();
    });
});
