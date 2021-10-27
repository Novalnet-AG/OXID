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
<input type="hidden" name="nn_invoice_birthdate_error" id="nn_invoice_birthdate_error" value="[{oxmultilang ident=NOVALNET_PAYMENT_GUARANTEE_DOB_ERROR_MSG}]">        
<ul class="form" id="novalnet_invoice_form" style="width:100%;">
	[{if !empty($smarty.session.blGuaranteeEnablednovalnetinvoice) && $oView->getCompanyFieldValue() == ''}]
		<li>
			<label>[{ oxmultilang ident="NOVALNET_BIRTH_DATE" }]</label>
			<input type="text" class="form-control" size="20" id="novalnet_invoice_birth_date" name="dynvalue[birthdatenovalnetinvoice]"  value="[{$oView->getNovalnetBirthDate()}]" placeholder=[{ oxmultilang ident="NOVALNET_BIRTH_DATE_FORMAT" }] autocomplete="off" onblur="return validateDateFormat(this)">
		</li>
	[{/if}]
</ul>
[{block name="checkout_payment_longdesc"}]
    <div class="desc">
        [{if !empty($smarty.session.blGuaranteeForceDisablednovalnetinvoice) }]
            <span style="color:red">[{ oxmultilang ident='NOVALNET_GUARANTEE_FORCE_DISABLED_MESSAGE' }]</span><br><br>
        [{/if}]
        [{if !empty($smarty.session.blGuaranteeForceDisablednovalnetinvoice) }]
            [{if !empty($smarty.session.blGuaranteeAmtnovalnetinvoice) && ($smarty.session.dGetGuaranteeAmtnovalnetinvoice >= 999)}]
               <span style="color:red">[{ oxmultilang ident='NOVALNET_GUARANTEE_AMOUNT_ERROR_MESSAGE' }] [{$smarty.session.dGetGuaranteeAmountnovalnetinvoice}] [{$oView->getCurrencyValue()}]</span><br><br>
            [{/if}]
            [{if !empty($smarty.session.blGuaranteeCurrencynovalnetinvoice)}]
            <span style="color:red">[{ oxmultilang ident='NOVALNET_GUARANTEE_CURRENCY_ERROR_MESSAGE' }]</span><br><br>
            [{/if}]
            [{if !empty($smarty.session.blGuaranteeAddressnovalnetinvoice)}]
            <span style="color:red">[{ oxmultilang ident='NOVALNET_GUARANTEE_ADDRESS_MISMATCH_ERROR_MESSAGE' }]</span><br><br>
            [{/if}]
            [{if !empty($smarty.session.blGuaranteeCountrynovalnetinvoice)}]
            <span style="color:red">[{ oxmultilang ident='NOVALNET_GUARANTEE_COUNTRY_ERROR_MESSAGE' }]</span><br><br>
            [{/if}]
        [{/if}]
         [{if $paymentmethod->oxpayments__oxlongdesc->value|trim}]
             [{ $paymentmethod->oxpayments__oxlongdesc->getRawValue()}]<br>
           [{/if}]

        [{if $oView->getNovalnetNotification($sPaymentID) != '' }]
            [{$oView->getNovalnetNotification($sPaymentID)}]<br>
        [{/if}]
        [{if $oView->getNovalnetTestmode($sPaymentID) }]
            <span style="color:red">[{ oxmultilang ident='NOVALNET_TEST_MODE_MESSAGE' }]</span><br>
        [{/if}]
    </div>
[{/block}]
</dd>
</dl>
<script type="application/javascript">
function validateDateFormat(e) {
    var regEx = /(\d{4})-(\d{2})-(\d{2})/;
    var dateformate = e.value;
    if (dateformate) {
        if(!dateformate.match(regEx)) {
           alert($('#nn_invoice_birthdate_error').val());           
        }
    }        
}
</script>
