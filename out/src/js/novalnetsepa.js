/*
 * Novalnet SEPA script
 *
 * @author    Novalnet AG
 * @copyright Copyright by Novalnet
 * @license   https://www.novalnet.de/payment-plugins/kostenlos/lizenz
 */

$( document ).ready(function() {
	// Display one click given card fields.
    $('#nn_new_account_link').click(function(event){
        $('#nn_given_account_div').hide();
        $('#nn_new_account_div').show();
        $('#novalnet_sepa_new_details').val('1');        
        event.stopImmediatePropagation();

    });

    // Display one click new card fields.
    $('#nn_given_account_link').click(function(event){
        $('#nn_new_account_div').hide();
        $('#nn_given_account_div').show();
        $('#novalnet_sepa_new_details').val('0');
        event.stopImmediatePropagation();
    });    
});

$("#sepa_mandate").click(function() {
	$("#sepa_mandate_information").toggle();
});

$('#novalnet_sepa_acc_no').keyup(function (event) {
                           this.value = this.value.toUpperCase();
                           var field = this.value;
                           var value = "";
                           for(var i = 0; i < field.length;i++){
                                   if(i <= 1){
                                           if(field.charAt(i).match(/^[A-Za-z]/)){
                                                   value += field.charAt(i);
                                           }
                                   }
                                   if(i > 1){
                                           if(field.charAt(i).match(/^[0-9]/)){
                                                   value += field.charAt(i);
                                           }
                                   }
                           }
                           field = this.value = value;
          });
