/*
 * Novalnet Credit Card  script
 *
 * @author    Novalnet AG
 * @copyright Copyright by Novalnet
 * @license   https://www.novalnet.de/payment-plugins/kostenlos/lizenz
 */

function loadCreditcardIframe() {     
   var css_text  = $('#novalnet_cc_default_css').val();
    var novalnetCCFormDetails  = $('#novalnet_cc_form_details').val();
    var ccDetails = JSON.parse(novalnetCCFormDetails);

    // Set your Client key
    NovalnetUtility.setClientKey((ccDetails.client_key !== undefined) ? ccDetails.client_key : '');

     var requestData = {
        'callback': {
          on_success: function (result) {
            var novalnetCCForm = $('#novalnetiframe').closest('form').attr('id');
            $('#novalnet_cc_hash').val(result['hash']);
            $('#novalnet_cc_uniqueid').val(result['unique_id']);
            $('#novalnet_cc_do_redirect').val(result['do_redirect']);
            $('#' + novalnetCCForm).submit();
            return true;
          },
          on_error: function (result) {
           if ( undefined !== result['error_message'] ) {
              alert(result['error_message']);
              return false;
            }
          },

           // Called in case the challenge window Overlay (for 3ds2.0) displays
          on_show_overlay:  function (result) {
            document.getElementById('novalnetiframe').classList.add("novalnet_cc_overlay");
          },

           // Called in case the Challenge window Overlay (for 3ds2.0) hided
          on_hide_overlay:  function (result) {
            document.getElementById('novalnetiframe').classList.remove("novalnet_cc_overlay");
          }
        },
        'iframe': {
          id: "novalnetiframe",
          inline: (ccDetails.inline_form !== undefined) ? ccDetails.inline_form : '0',
          skip_auth:1,

          // Add the style (css) here for either the whole Iframe contanier or for particular label/input field
          style: {
            container: (css_text !== undefined) ? css_text : '',
            input: (ccDetails.cc_input !== undefined) ? ccDetails.cc_input:'' ,
            label: (ccDetails.cc_label !== undefined) ? ccDetails.cc_label:'' ,
          },
         },
         // Add Customer data
        customer: {
          first_name: (ccDetails.first_name !== undefined) ? ccDetails.first_name : '',
          last_name: (ccDetails.last_name !== undefined) ? ccDetails.last_name : ccDetails.first_name,
          email: (ccDetails.email !== undefined) ? ccDetails.email : '',
          // Your End-customer's billing address.
          billing: {
            street: (ccDetails.street !== undefined) ? ccDetails.street : '',
            city: (ccDetails.city !== undefined) ? ccDetails.city : '',
            zip: (ccDetails.zip !== undefined) ? ccDetails.zip : '',
            country_code: (ccDetails.country_code !== undefined) ? ccDetails.country_code : ''
          },
          shipping: {
            same_as_billing: (ccDetails.same_as_billing !== undefined) ? ccDetails.same_as_billing : 0,
          },
        },
         // Add transaction data
        transaction: {
          amount: (ccDetails.amount !== undefined) ? ccDetails.amount : '',
          currency: (ccDetails.currency !== undefined) ? ccDetails.currency : '',
          test_mode: (ccDetails.test_mode !== undefined) ? ccDetails.test_mode : '0',
          enforce_3d: (ccDetails.enforce_3d !== undefined) ? ccDetails.enforce_3d : '0',
        },
        custom: {
           lang: (ccDetails.lang !== undefined) ? ccDetails.lang : 'en',
        }
      };
      NovalnetUtility.createCreditCardForm(requestData);
}

$(document).ready(function() {
    // Display one click given card fields.
    $('#nn_new_card_link').click(function(event){
        $('#nn_given_card_div').hide();
        $('#nn_new_card_div').show();
        $('#novalnet_cc_new_details').val('1');
        loadCreditcardIframe();
        event.stopImmediatePropagation();

    });

    // Display one click new card fields.
    $('#nn_given_card_link').click(function(event){
        $('#nn_new_card_div').hide();
        $('#nn_given_card_div').show();
        $('#novalnet_cc_new_details').val('0');
        event.stopImmediatePropagation();
    });
    var novalnetCCForm      = $('#novalnetiframe').closest('form').attr('id');
    var novalnetCCsubmit    = $('#' + novalnetCCForm).find(':submit');
    var iframe              = $('#novalnetiframe')[0];
    loadCreditcardIframe();

    $("input[name=paymentid]").change(function() {
        var client_key  = $('#client_key').val();
        NovalnetUtility.setClientKey((client_key !== undefined) ? client_key : '');
        NovalnetUtility.setCreditCardFormHeight();
    });
    
    $("input[name=paymentid]").click(function() {
        var payment_name = $(this).val();
        if(payment_name == 'novalnetcreditcard') {          
            var client_key  = $('#client_key').val();
            NovalnetUtility.setClientKey((client_key !== undefined) ? client_key : '');
            NovalnetUtility.setCreditCardFormHeight();
        }
        
    });
   
    $(novalnetCCsubmit).click(function(evt) {
        if ($("input[name=paymentid]:checked").val() == 'novalnetcreditcard' && (jQuery('#nn_given_card_div').css('display') == undefined || jQuery('#nn_given_card_div').css('display') != 'block')) {                      
            if ($('#novalnet_cc_hash').val() == '') {
                NovalnetUtility.getPanHash();
                 evt.preventDefault();
                 evt.stopImmediatePropagation();
            }                 
        }
    });
});
