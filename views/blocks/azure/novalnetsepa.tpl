<dl>
        <dt>
            <input id="payment_[{$sPaymentID}]" type="radio" name="paymentid" value="[{$sPaymentID}]" [{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]checked[{/if}]>
            <label for="payment_[{$sPaymentID}]"><b>[{$paymentmethod->oxpayments__oxdesc->value}]</b></label>
          [{if $oView->getNovalnetConfig('blPaymentLogo')}]
           <span>
            <img src="[{$oViewConf->getModuleUrl('novalnet','out/img/')}][{$sPaymentID}].png" alt="[{$paymentmethod->oxpayments__oxdesc->value}]"/>
           </span>
           [{/if}]
        </dt>
<dd class="[{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]activePayment[{/if}]">
[{assign var="aSepaDetails" value=$oView->getNovalnetPaymentDetails($sPaymentID)}]
[{assign var="aShoppingDetails" value=$oView->getShoppingTypeDetails($sPaymentID)}]
<input type="hidden" name="nn_sepa_birthdate_error" id="nn_sepa_birthdate_error" value="[{oxmultilang ident=NOVALNET_PAYMENT_GUARANTEE_DOB_ERROR_MSG}]">
[{oxscript include=$oViewConf->getModuleUrl('novalnet', 'out/src/js/novalnetsepa.js')}]
[{if $aShoppingDetails.iShopType == 1 && $aSepaDetails.aSavedDetails != ''}]
    <ul class="form" id="nn_given_account_div" style=[{$aSepaDetails.given_details_style}]>
        <li>
            <table>
                    <tr>
                        <td colspan="2"><span id="nn_new_account_link" style="color:blue; text-decoration:underline; cursor:pointer;">[{oxmultilang ident="NOVALNET_NEW_ACCOUNT_DETAILS"}]</span></td>
                    </tr>
                    <tr>
                        <td><label>[{oxmultilang ident="NOVALNET_SEPA_HOLDER_NAME" }]</label></td>
                        <td><label>[{$aSepaDetails.aSavedDetails.bankaccount_holder}]</label></td>
                    </tr>
                    <tr>
                        <td><label>IBAN</label></td>
                        <td><label>[{$aSepaDetails.aSavedDetails.iban}]</label></td>
                    </tr>
                    [{if !empty($smarty.session.blGuaranteeEnablednovalnetsepa) && empty($smarty.session.blGuaranteeForceDisablednovalnetsepa) && $oView->getCompanyFieldValue() == '' }]
                    <tr>
                        <td><label>[{ oxmultilang ident="NOVALNET_BIRTH_DATE" }]</label></td>
                        <td><input type="text" class="js-oxValidate" size="20" id="novalnet_sepa_birth_date" name="dynvalue[birthdatenovalnetsepa_oneclick]" value="[{$oView->getNovalnetBirthDate()}]" placeholder=[{ oxmultilang ident="NOVALNET_BIRTH_DATE_FORMAT" }] autocomplete="off" onblur="return validateDateFormat(this)"></td>
                    </tr>
                    [{/if}]
                </table>
          </li>
      </ul>
  [{/if}]
    <ul class="form" id="nn_new_account_div" style=[{$aSepaDetails.new_details_style}]>
        [{if $aShoppingDetails.iShopType == '1' && $aSepaDetails.aSavedDetails != ''}]
            <li>
                <span id="nn_given_account_link" style="color:blue; text-decoration:underline; cursor:pointer;" >[{oxmultilang ident="NOVALNET_GIVEN_ACCOUNT_DETAILS"}]</span>
            </li>
          [{/if}]
        <li>
            <label>[{ oxmultilang ident="NOVALNET_SEPA_IBAN" }]</label>
            <input type="text" class="js-oxValidate" size="20" id="novalnet_sepa_acc_no" name="dynvalue[novalnet_sepa_iban]" value= "[{$smarty.session.refillSepaiban}]" autocomplete="off" onkeypress="return NovalnetUtility.formatIban(event,'novalnet_sepa_bic_div');" onchange="return NovalnetUtility.formatIban(event,'novalnet_sepa_bic_div');"><span id="novalnet_sepa_iban_span"></span>
            <p class="oxValidateError">
                <span class="js-oxError_notEmpty">[{ oxmultilang ident="ERROR_MESSAGE_INPUT_NOTALLFIELDS" }]</span>
            </p>
        </li>
        <li id="novalnet_sepa_bic_div" style ="display:none;">
            <label>[{ oxmultilang ident="NOVALNET_SEPA_BIC" }]</label>
            <input type="text" class="js-oxValidate" size="20" id="novalnet_sepa_bic" name="dynvalue[novalnet_sepa_bic]" autocomplete="off" onkeypress="return NovalnetUtility.formatBic(event);" onchange="return NovalnetUtility.formatBic(event);">
        </li>
    [{if !empty($smarty.session.blGuaranteeEnablednovalnetsepa) && empty($smarty.session.blGuaranteeForceDisablednovalnetsepa) && $oView->getCompanyFieldValue() == '' }]
      <li>
        <label>[{ oxmultilang ident="NOVALNET_BIRTH_DATE" }]</label>
        <input type="text" size="20" id="novalnet_sepa_birth_date" name="dynvalue[birthdatenovalnetsepa]"
        value="[{$oView->getNovalnetBirthDate()}]" placeholder=[{ oxmultilang ident="NOVALNET_BIRTH_DATE_FORMAT" }] autocomplete="off" onblur="return validateDateFormat(this)">
       </li>
    [{/if}]
        [{if $aShoppingDetails.iShopType == '1' }]
           <li>
                <label>&nbsp;</label>
                    <input type="hidden" size="20" name="dynvalue[novalnet_sepa_save_card]" value="0">
                    <input type="checkbox" size="20" name="dynvalue[novalnet_sepa_save_card]" value="1" [{if $dynvalue.novalnet_sepa_save_card == 1}]checked="checked"[{/if}]>&nbsp;[{ oxmultilang ident="NOVALNET_SEPA_SAVE_CARD_DATA" }]
            </li>
        [{/if}]
 </ul>
[{if $aShoppingDetails.iShopType == '1'}]
     [{if $aSepaDetails.aSavedDetails != ''}]
        [{assign var="bNewcardDetails" value="0"}]
     [{else}]
        [{assign var="bNewcardDetails" value=$aShoppingDetails.iShopType}]
    [{/if}]
[{else}]
    [{assign var="bNewcardDetails" value="1"}]
[{/if}]
<input type="hidden" id="novalnet_sepa_new_details" name="dynvalue[novalnet_sepa_new_details]" value="[{$bNewcardDetails}]">
 [{block name="checkout_payment_longdesc"}]
        <div class="desc">
             [{if $paymentmethod->oxpayments__oxlongdesc->value|trim}]
             [{ $paymentmethod->oxpayments__oxlongdesc->getRawValue()}]<br>
             [{/if}]
             <a style = "cursor:pointer;" id="sepa_mandate">
             [{ oxmultilang ident='NOVALNET_SEPA_DECLARATION' }]
             </a>
             <div id="sepa_mandate_information" style="padding:5px;display:none;">
             [{ oxmultilang ident='NOVALNET_SEPA_AUTHORIZE' }]
             [{ oxmultilang ident='NOVALNET_SEPA_CREDITOR_IDENTIFIER' }]
             [{ oxmultilang ident='NOVALNET_SEPA_CLAIM_NOTES' }]
            </div>
                [{if !empty($smarty.session.blGuaranteeForceDisablednovalnetsepa) }]
                <span style="color:red">[{ oxmultilang ident='NOVALNET_GUARANTEE_FORCE_DISABLED_MESSAGE' }]</span><br><br>
                [{/if}]

                [{if !empty($smarty.session.blGuaranteeForceDisablednovalnetsepa)}]
                    [{if !empty($smarty.session.blGuaranteeAmtnovalnetsepa) && ($smarty.session.dGetGuaranteeAmtnovalnetsepa >= 999)}]
                        <span style="color:red">[{ oxmultilang ident='NOVALNET_GUARANTEE_AMOUNT_ERROR_MESSAGE' }] [{$smarty.session.dGetGuaranteeAmountnovalnetsepa}] [{$oView->getCurrencyValue()}]</span><br><br>
                    [{/if}]
                    [{if !empty($smarty.session.blGuaranteeCurrencynovalnetsepa) }]
                        <span style="color:red">[{ oxmultilang ident='NOVALNET_GUARANTEE_CURRENCY_ERROR_MESSAGE' }]</span><br><br>
                    [{/if}]
                    [{if !empty($smarty.session.blGuaranteeAddressnovalnetsepa) }]
                        <span style="color:red">[{ oxmultilang ident='NOVALNET_GUARANTEE_ADDRESS_MISMATCH_ERROR_MESSAGE' }]</span><br><br>
                    [{/if}]
                    [{if !empty($smarty.session.blGuaranteeCountrynovalnetsepa) }]
                        <span style="color:red">[{ oxmultilang ident='NOVALNET_GUARANTEE_COUNTRY_ERROR_MESSAGE' }]</span><br><br>
                    [{/if}]
                [{/if}]
            [{if $oView->getNovalnetNotification($sPaymentID) != '' }]
                [{$oView->getNovalnetNotification($sPaymentID)}]<br>
            [{/if}]
            [{if $oView->getNovalnetTestmode($sPaymentID) }]
                <span style="color:red">[{ oxmultilang ident='NOVALNET_TEST_MODE_MESSAGE' }]</span><br>
            [{/if}]
             [{if $oView->getNovalnetZeroAmountStatus($sPaymentID) == '2'}]
                [{if empty($smarty.session.blGuaranteeEnablednovalnetsepa)}]
                    <br><span style="color:red">[{ oxmultilang ident='NOVALNET_ZEROAMOUNT_BOOKING_MESSAGE' }]</span>
                [{/if}]
            [{/if}]
        </div>
 [{/block}]
 </dd>
 </dl>
