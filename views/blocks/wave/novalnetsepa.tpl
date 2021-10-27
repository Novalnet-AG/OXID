<dl>
        <dt>
            <input id="payment_[{$sPaymentID}]" type="radio" name="paymentid" value="[{$sPaymentID}]" [{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]checked[{/if}]>
            <label for="payment_[{$sPaymentID}]"><b>[{$paymentmethod->oxpayments__oxdesc->value}]</b></label>
          [{if $oView->getNovalnetConfig('blPaymentLogo')}]
           <span>
            &nbsp;<img src="[{$oViewConf->getModuleUrl('novalnet','out/img/')}][{$sPaymentID}].png" alt="[{$paymentmethod->oxpayments__oxdesc->value}]"/>
           </span>
           [{/if}]
        </dt>
<dd class="payment-option[{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}] activePayment[{/if}]">
[{assign var="aSepaDetails" value=$oView->getNovalnetPaymentDetails($sPaymentID)}]
[{assign var="aShoppingDetails" value=$oView->getShoppingTypeDetails($sPaymentID)}]
<input type="hidden" name="nn_sepa_birthdate_error" id="nn_sepa_birthdate_error" value="[{oxmultilang ident=NOVALNET_PAYMENT_GUARANTEE_DOB_ERROR_MSG}]">
[{oxscript include=$oViewConf->getModuleUrl('novalnet', 'out/src/js/novalnetsepa.js')}]
[{if $aShoppingDetails.iShopType == '1' && $aSepaDetails.aSavedDetails != ''}]
    <div id="nn_given_account_div" style=[{$aSepaDetails.given_details_style}]>
		 <div class="form-group">
			<label class="control-label col-lg-3"><span id="nn_new_account_link" style="color:blue; text-decoration:underline; cursor:pointer;">[{oxmultilang ident="NOVALNET_NEW_ACCOUNT_DETAILS"}]</span></label>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">[{oxmultilang ident="NOVALNET_SEPA_HOLDER_NAME"}]</label>
			<div class="col-lg-9">
				<label class="control-label" style="padding-left:0">[{$aSepaDetails.aSavedDetails.bankaccount_holder}]</label>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">IBAN</label>
			<div class="col-lg-9">
				<label class="control-label">[{$aSepaDetails.aSavedDetails.iban}]</label>
			</div>
		</div>
		[{if !empty($smarty.session.blGuaranteeEnablednovalnetsepa) && empty($smarty.session.blGuaranteeForceDisablednovalnetsepa) && $oView->getCompanyFieldValue() == '' }]
			<div class="form-group">
				<label class="control-label col-lg-3">[{ oxmultilang ident="NOVALNET_BIRTH_DATE" }]</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" size="20" id="novalnet_sepa_birth_date" name="dynvalue[birthdatenovalnetsepa_oneclick]" value="[{$oView->getNovalnetBirthDate()}]" placeholder=[{ oxmultilang ident="NOVALNET_BIRTH_DATE_FORMAT" }] autocomplete="off" onblur="return validateDateFormat(this)">
				</div>
			</div>
		[{/if}]	
    </div>
[{/if}]
<div id="nn_new_account_div" style=[{$aSepaDetails.new_details_style}]>
	<div class="form-group">
      [{if $aShoppingDetails.iShopType == '1' && $aSepaDetails.aSavedDetails != ''}]
            <label class="control-label col-lg-3"><span id="nn_given_account_link" style="color:blue; text-decoration:underline; cursor:pointer;">[{ oxmultilang ident="NOVALNET_GIVEN_CARD_DETAILS" }]</span></label>
        [{/if}]
       </div>    
       
    <div class="form-group">
		<label class="req control-label col-lg-3">[{ oxmultilang ident="NOVALNET_SEPA_IBAN" }]</label>
		<div class="col-lg-9">
			<input type="text" class="form-control js-oxValidate js-oxValidate_notEmpty" size="20" id="novalnet_sepa_acc_no" name="dynvalue[novalnet_sepa_iban]" value= "[{$smarty.session.refillSepaiban}]" autocomplete="off"><span id="novalnet_sepa_iban_span"></span>
		</div>
	</div>
	[{if !empty($smarty.session.blGuaranteeEnablednovalnetsepa) && empty($smarty.session.blGuaranteeForceDisablednovalnetsepa) && $oView->getCompanyFieldValue() == '' }]
	<div class="form-group">
        <label class="req control-label col-lg-3">[{ oxmultilang ident="NOVALNET_BIRTH_DATE" }]</label>
        <div class="col-lg-9">
            <input type="text" class="form-control" size="20" id="novalnet_sepa_birth_date" name="dynvalue[birthdatenovalnetsepa]" value="[{$oView->getNovalnetBirthDate()}]" placeholder=[{ oxmultilang ident="NOVALNET_BIRTH_DATE_FORMAT" }] autocomplete="off" onblur="return validateDateFormat(this)">
        </div>
	</div>
	[{/if}]	
     [{if $aShoppingDetails.iShopType == '1'}]
          <div class="form-group">
			  <label class="req control-label col-lg-3">&nbsp;</label>
                <div class="col-lg-9" style="margin-left: 25%;">
                    <input type="hidden" size="20" name="dynvalue[novalnet_sepa_save_card]" value="0">
                    <input type="checkbox" name="dynvalue[novalnet_sepa_save_card]" value="1" [{if $dynvalue.novalnet_sepa_save_card == 1}]checked="checked"[{/if}]>&nbsp;[{ oxmultilang ident="NOVALNET_SEPA_SAVE_CARD_DATA" }]
                </div>
            </div>
        [{/if}]
</div>
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
        <div class="alert alert-info desc">
            [{if $paymentmethod->oxpayments__oxlongdesc->value|trim}]
             [{ $paymentmethod->oxpayments__oxlongdesc->getRawValue()}]<br>
           [{/if}]

             <a data-toggle="collapse" style = "cursor:pointer;" data-target="#sepa_mandate_message">
             [{ oxmultilang ident='NOVALNET_SEPA_DECLARATION' }]
             </a>
             <div class="collapse panel panel-default" id="sepa_mandate_message" style="padding:5px;">
             [{ oxmultilang ident='NOVALNET_SEPA_AUTHORIZE' }]
             [{ oxmultilang ident='NOVALNET_SEPA_CREDITOR_IDENTIFIER' }]
             [{ oxmultilang ident='NOVALNET_SEPA_CLAIM_NOTES' }]
            </div>
                [{if !empty($smarty.session.blGuaranteeForceDisablednovalnetsepa) }]
                <span style="color:red">[{ oxmultilang ident='NOVALNET_GUARANTEE_FORCE_DISABLED_MESSAGE' }]</span><br>
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
