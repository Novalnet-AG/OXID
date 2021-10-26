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
<dd class="[{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]activePayment[{/if}]">
[{if !empty($smarty.session.blGuaranteeEnablednovalnetinvoice) && $oView->getCompanyFieldValue() == ''}]
	<div class="form-group">
		<label class="req control-label col-lg-3">[{ oxmultilang ident="NOVALNET_BIRTH_DATE" }]</label>
		<div class="col-lg-9">
			<input type="text" class="form-control" size="20" id="novalnet_invoice_birth_date" name="dynvalue[birthdatenovalnetinvoice]"  value="[{$oView->getNovalnetBirthDate()}]" placeholder=[{ oxmultilang ident="NOVALNET_BIRTH_DATE_FORMAT" }] autocomplete="off">
		</div>
	</div>
[{/if}]
        
[{block name="checkout_payment_longdesc"}]
    <div class="alert alert-info desc">
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
            <br>[{$oView->getNovalnetNotification($sPaymentID)}]<br>
        [{/if}]
        [{if $oView->getNovalnetTestmode($sPaymentID) }]
            <br><span style="color:red">[{ oxmultilang ident='NOVALNET_TEST_MODE_MESSAGE' }]</span><br>
        [{/if}]
    </div>
[{/block}]
</dd>
</dl>
