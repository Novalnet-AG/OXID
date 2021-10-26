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
[{assign var="aPaypalDetails" value=$oView->getNovalnetPaymentDetails($sPaymentID)}]
[{assign var="aShoppingDetails" value=$oView->getShoppingTypeDetails($sPaymentID)}]
[{oxscript include=$oViewConf->getModuleUrl('novalnet', 'out/src/js/novalnetpaypal.js')}]
[{if $aShoppingDetails.iShopType == '1' && $aPaypalDetails.aSavedDetails != ''}]
 <ul class="form" id="nn_given_paypal_div" style=[{$aPaypalDetails.given_details_style}]>        
        <li>
            <table>
                <tr>
                    <td colspan="2"><span id="nn_new_paypal_link" style="color:blue; text-decoration:underline; cursor:pointer;" >[{ oxmultilang ident="NOVALNET_PAYPAL_NEW_ACCOUNT_DETAILS" }]</span></td>
                </tr>
                [{if $smarty.session.sPaymentRefnovalnetpaypal}]
                <tr>
                    <td><label>[{ oxmultilang ident="NOVALNET_REFERENCE_TID" }]</label></td>
                    <td><label>[{$smarty.session.sPaymentRefnovalnetpaypal}]</label></td>
                </tr>
                [{/if}]
                 [{if $aPaypalDetails.aSavedDetails.paypal_transaction_id}]
                    <tr>
                        <td><label>[{ oxmultilang ident="NOVALNET_PAYPAL_REFERENCE_TID" }]</label></td>
                        <td><label>[{$aPaypalDetails.aSavedDetails.paypal_transaction_id}]</label></td>
                    </tr>
                [{/if}]
            </table>
        </li>
      </ul>
[{/if}]
<ul class="form" id="nn_new_paypal_div" style=[{$aPaypalDetails.new_details_style}]>
		[{if $aShoppingDetails.iShopType == '1' && $aPaypalDetails.aSavedDetails != ''}]
			<li>
				<span id="nn_given_paypal_link" style="color:blue; text-decoration:underline; cursor:pointer;">[{ oxmultilang ident="NOVALNET_PAYPAL_GIVEN_ACCOUNT_DETAILS" }]</span>            
			</li>	
        [{/if}]
		 [{if $aShoppingDetails.iShopType == '1'}]			
			   <li>
				<input type="hidden" size="20" name="dynvalue[novalnet_paypal_save_card]" value="0">
				<input type="checkbox" size="20" name="dynvalue[novalnet_paypal_save_card]" value="1" id="novalnet_paypal_save_card" [{if $dynvalue.novalnet_paypal_save_card == 1}]checked="checked"[{/if}]>&nbsp;[{ oxmultilang ident="NOVALNET_PAYPAL_SAVE_CARD_DATA" }]
			  </li>      
		 [{/if}]
 </ul>
[{if $aShoppingDetails.iShopType == '1'}]
     [{if $aPaypalDetails.aSavedDetails != ''}]
        [{assign var="bNewcardDetails" value="0"}]
     [{else}]
        [{assign var="bNewcardDetails" value=$aShoppingDetails.iShopType}]
    [{/if}]
[{else}]
    [{assign var="bNewcardDetails" value="1"}]
[{/if}]
<input type="hidden" id="novalnet_paypal_new_details" name="dynvalue[novalnet_paypal_new_details]" value="[{$bNewcardDetails}]">

[{block name="checkout_payment_longdesc"}]
    <div class="desc">
        [{if $aShoppingDetails.iShopType == 1}]
				<span id="nn_given_paypal_div_desc" style=[{$aPaypalDetails.given_details_style}]>[{ oxmultilang ident='NOVALNET_PAYPAL_REFERENCE_DESCRIPTION_MESSAGE' }]<br></span>
                
                <span id="nn_new_paypal_div_desc" style=[{$aPaypalDetails.new_details_style}]><br>[{ $paymentmethod->oxpayments__oxlongdesc->getRawValue() }]<br></span>
        [{else}]        
          [{ $paymentmethod->oxpayments__oxlongdesc->getRawValue() }]<br>
        [{/if}]
        
        [{if $oView->getNovalnetNotification($sPaymentID) != '' }]
            <br>[{$oView->getNovalnetNotification($sPaymentID)}]<br>
        [{/if}]
        [{if $oView->getNovalnetTestmode($sPaymentID) }]
            <span style="color:red">[{ oxmultilang ident='NOVALNET_TEST_MODE_MESSAGE' }]</span><br>
        [{/if}]
        [{if $oView->getNovalnetZeroAmountStatus($sPaymentID) == '2'}]
             <br><span style="color:red">[{ oxmultilang ident='NOVALNET_ZEROAMOUNT_BOOKING_MESSAGE' }]</span>
        [{/if}]
    </div>
[{/block}]
</dd>
</dl>
