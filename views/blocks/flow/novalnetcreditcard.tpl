<dl>
        <dt>
            <input id="payment_[{$sPaymentID}]" type="radio" name="paymentid" value="[{$sPaymentID}]" [{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]checked[{/if}]>
            <label for="payment_[{$sPaymentID}]"><b>[{$paymentmethod->oxpayments__oxdesc->value}]</b></label>
              [{if $oView->getNovalnetConfig('blPaymentLogo')}]
                  <span>
                &nbsp;<img src="[{$oViewConf->getModuleUrl('novalnet','out/img/')}]novalnet_cc_visa.png" alt="[{$paymentmethod->oxpayments__oxdesc->value}]"/>&nbsp;<img src="[{$oViewConf->getModuleUrl('novalnet','out/img/')}]novalnet_cc_mastercard.png" alt="[{$paymentmethod->oxpayments__oxdesc->value}]"/>&nbsp;<img src="[{$oViewConf->getModuleUrl('novalnet','out/img/')}]novalnet_cc_amex.png" alt="[{$paymentmethod->oxpayments__oxdesc->value}]"/>&nbsp;<img src="[{$oViewConf->getModuleUrl('novalnet','out/img/')}]novalnet_cc_maestro.png" alt="[{$paymentmethod->oxpayments__oxdesc->value}]"/>&nbsp;<img src="[{$oViewConf->getModuleUrl('novalnet','out/img/')}]novalnet_cc_cartasi.png" alt="[{$paymentmethod->oxpayments__oxdesc->value}]"/>&nbsp;<img src="[{$oViewConf->getModuleUrl('novalnet','out/img/')}]novalnet_cc_unionpay.png" alt="[{$paymentmethod->oxpayments__oxdesc->value}]"/>&nbsp;<img src="[{$oViewConf->getModuleUrl('novalnet','out/img/')}]novalnet_cc_discover.png" alt="[{$paymentmethod->oxpayments__oxdesc->value}]"/>&nbsp;<img src="[{$oViewConf->getModuleUrl('novalnet','out/img/')}]novalnet_cc_diners.png" alt="[{$paymentmethod->oxpayments__oxdesc->value}]"/>&nbsp;<img src="[{$oViewConf->getModuleUrl('novalnet','out/img/')}]novalnet_cc_jcb.png" alt="[{$paymentmethod->oxpayments__oxdesc->value}]"/>&nbsp;<img src="[{$oViewConf->getModuleUrl('novalnet','out/img/')}]novalnet_cc_carte-bleue.png" alt="[{$paymentmethod->oxpayments__oxdesc->value}]"/>
                 </span>
            [{/if}]
        </dt>
<dd class="[{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]activePayment[{/if}]">
[{oxstyle  include=$oViewConf->getModuleUrl('novalnet', 'out/src/css/novalnet.css')}]
[{oxscript include=$oViewConf->getModuleUrl('novalnet', 'out/src/js/novalnetcreditcard.js')}]
<script type="text/javascript" src="https://cdn.novalnet.de/js/v2/NovalnetUtility.js"></script>
[{assign var="aCCDetails" value=$oView->getNovalnetPaymentDetails($sPaymentID)}]
[{assign var="aShoppingDetails" value=$oView->getShoppingTypeDetails($sPaymentID)}]
[{assign var="aCCFormDetails" value=$oView->sendNovalnetCCFormDetails($oxcmp_user)}]
<input type="hidden" id="client_key" value="[{$oView->getNovalnetConfig('sClientKey')}]">
[{if $aShoppingDetails.iShopType == '1' && $aCCDetails.aSavedDetails != ''}]
    <div id="nn_given_card_div" style=[{$aCCDetails.given_details_style}]>
        <div class="form-group">
            <label class="control-label col-lg-3"><span id="nn_new_card_link" style="color:blue; text-decoration:underline; cursor:pointer;" >[{ oxmultilang ident="NOVALNET_NEW_CARD_DETAILS" }]</span></label>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">[{ oxmultilang ident="NOVALNET_CREDITCARD_TYPE" }]</label>
            <div class="col-lg-9">
                <label class="control-label">[{$aCCDetails.aSavedDetails.cc_type}]</label>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">[{ oxmultilang ident="NOVALNET_CREDITCARD_HOLDER_NAME" }]</label>
            <div class="col-lg-9">
                <label class="control-label">[{$aCCDetails.aSavedDetails.cc_holder}]</label>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">[{ oxmultilang ident="NOVALNET_CREDITCARD_NUMBER" }]</label>
            <div class="col-lg-9">
                <label class="control-label">[{$aCCDetails.aSavedDetails.cc_no}]</label>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">[{ oxmultilang ident="NOVALNET_CREDITCARD_EXPIRY_DATE" }]</label>
            <div class="col-lg-9">
                <label class="control-label">[{$aCCDetails.aSavedDetails.cc_exp_month}]/[{$aCCDetails.aSavedDetails.cc_exp_year}]</label>
            </div>
        </div>
    </div>
[{/if}]
<div id="nn_new_card_div" style=[{$aCCDetails.new_details_style}]>
    <div class="form-group">
      [{if $aShoppingDetails.iShopType == '1' && $aCCDetails.aSavedDetails != ''}]
            <label class="control-label col-lg-3"><span id="nn_given_card_link" style="color:blue; text-decoration:underline; cursor:pointer;">[{ oxmultilang ident="NOVALNET_GIVEN_CARD_DETAILS" }]</span></label>
        [{/if}]
       </div>
        <iframe id="novalnetiframe" scrolling="no" style="border-style:none !important;margin-left:7%;" width="50%" height="100% !important"></iframe>
        [{* Iframe default style *}]

        <input type="hidden" id="novalnet_cc_form_details"   value='[{$aCCFormDetails}]'>
        <input type="hidden" id="novalnet_cc_default_css" value="[{$oView->getNovalnetConfig('sCreditcardDefaultCss')}]">
        [{* Novalnet Variables *}]
        <input type="hidden" id="novalnet_cc_hash" name="dynvalue[novalnet_cc_hash]">
        <input type="hidden" id="novalnet_cc_uniqueid" name="dynvalue[novalnet_cc_uniqueid]">
        <input type="hidden" id="novalnet_cc_do_redirect" name="dynvalue[novalnet_cc_do_redirect]">

         [{if $aShoppingDetails.iShopType == '1'}]
          <div class="form-group" style="margin-left:6%;">
                <div class="col-lg-9">
                    <input type="hidden" size="20" name="dynvalue[novalnet_cc_save_card]" value="0">
                    <input type="checkbox" size="20" name="dynvalue[novalnet_cc_save_card]" value="1" [{if $dynvalue.novalnet_cc_save_card == 1}]checked="checked"[{/if}]>&nbsp;[{ oxmultilang ident="NOVALNET_CC_SAVE_CARD_DATA" }]
                </div>
            </div>
        [{/if}]
</div>
[{if $aShoppingDetails.iShopType == '1'}]
     [{if $aCCDetails.aSavedDetails != ''}]
        [{assign var="bNewcardDetails" value="0"}]
     [{else}]
        [{assign var="bNewcardDetails" value=$aShoppingDetails.iShopType}]
    [{/if}]
[{else}]
    [{assign var="bNewcardDetails" value="1"}]
[{/if}]
<input type="hidden" id="novalnet_cc_new_details" name="dynvalue[novalnet_cc_new_details]" value="[{$bNewcardDetails}]">

[{block name="checkout_payment_longdesc"}]
        <div class="alert alert-info desc">
            [{if $paymentmethod->oxpayments__oxlongdesc->value|trim}]
                [{ $paymentmethod->oxpayments__oxlongdesc->getRawValue()}]<br>
            [{/if}]
            [{if $oView->getNovalnetNotification($sPaymentID) != '' }]
                <br>[{$oView->getNovalnetNotification($sPaymentID)}]
            [{/if}]
            [{if $oView->getNovalnetTestmode($sPaymentID) }]
                <br><span style="color:red">[{ oxmultilang ident='NOVALNET_TEST_MODE_MESSAGE' }]</span><br>
            [{/if}]
            [{if $oView->getNovalnetZeroAmountStatus($sPaymentID) == '2'}]
                <br><span style="color:red">[{ oxmultilang ident='NOVALNET_ZEROAMOUNT_BOOKING_MESSAGE' }]</span>
            [{/if}]
        </div>
    [{/block}]
   </dd>
</dl>

