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

// for sepa bic 
$( document ).ready(function() {
    $('#novalnet_sepa_acc_no').on('keyup keypress blur change', function(event) {
        var iban = $(this).val(),
        iban = iban.substring(0,2),
        iban = iban.toUpperCase(),
        allowedCountries = NovalnetUtility.bicAllowedCountries;        
        NovalnetUtility.formatIban(event, 'novalnet_sepa_bic_div');        
        if (allowedCountries.includes(iban)) {
            $("#novalnet_sepa_bic").prop('required',true);
            $("#novalnet_sepa_bic_div").css('display', 'flex');
        } else {
            $("#novalnet_sepa_bic").prop('required',false);
        }
    });
    
    $('#novalnet_sepa_bic').on('keyup keypress blur change', function(event) {
        return NovalnetUtility.formatBic(event);
    });
});



$("#sepa_mandate").click(function() {
    $("#sepa_mandate_information").toggle();
});

function validateDateFormat(e) {
    var regEx = /(\d{4})-(\d{2})-(\d{2})/;
    var dateformate = e.value;
    if (dateformate) {
        if(!dateformate.match(regEx)) {
           alert($('#nn_sepa_birthdate_error').val());
        }
    }
}
