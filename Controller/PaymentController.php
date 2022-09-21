<?php
/**
 * Novalnet payment module
 *
 * This file is used for real time processing of transaction.
 *
 * This is free contribution made by request.
 * If you have found this file useful a small
 * recommendation as well as a comment on merchant form
 * would be greatly appreciated.
 *
 * @author    Novalnet AG
 * @copyright Copyright by Novalnet
 * @license   https://www.novalnet.de/payment-plugins/kostenlos/lizenz
 *
 * Script: PaymentController.php
 */

namespace oe\novalnet\Controller;
use oe\novalnet\Classes\NovalnetUtil;

 /**
 * Class PaymentController.
 */
class PaymentController extends PaymentController_parent {
    /**
     * Session object
     *
     * @var array
     */
    protected $_oNovalnetSession;

    /**
     * Wrapper to get NovalnetUtil object
     *
     * @var object
     */
    protected $_oNovalnetUtil;

    /**
     * Returns payment name
     *
     * @var array
     */
    protected $_aPaymentType = ['novalnetcreditcard' => '"CREDITCARD"', 'novalnetsepa' => '"DIRECT_DEBIT_SEPA", "GUARANTEED_DIRECT_DEBIT_SEPA"', 'novalnetpaypal' => '"PAYPAL"'];

    /**
     * Returns name of template to render
     *
     * @return string
     */
    public function render()
    {
        $this->_oNovalnetSession = $this->getSession();
        $this->_oNovalnetUtil = oxNew(NovalnetUtil::class);
        if ($this->_oNovalnetSession->hasVariable('sNovalnetSession') && $this->_oNovalnetSession->getVariable('sNovalnetSession') != $this->_oNovalnetSession->getId()) {
            $this->_oNovalnetSession->deleteVariable('sNovalnetSession');
            $this->_oNovalnetUtil->clearNovalnetSession();            
            $this->_oNovalnetSession->setVariable('sNovalnetSession', $this->_oNovalnetSession->getId());
        } elseif (!$this->_oNovalnetSession->hasVariable('sNovalnetSession')) {
            $this->_oNovalnetSession->setVariable('sNovalnetSession', $this->_oNovalnetSession->getId());
        }
        return parent::render();
      }

    /**
     * Gets payments to show on the payment page
     *
     * @return array
     */
    public function getPaymentList()
    {
        parent::getPaymentList();
        foreach ($this->_oPaymentList as $oPayment) {
            $sPaymentName = $oPayment->oxpayments__oxid->value;
            // checks the payments are Novalnet payments
            if (preg_match("/novalnet/i", $sPaymentName)) {                
                $sClientKey = $this->getNovalnetConfig('sClientKey'); 
                // validates the time to lock the payment
                if ($this->_validateNovalnetConfig() === false || (in_array($sPaymentName, ['novalnetsepa', 'novalnetinvoice']) && !$this->getGuaranteePaymentStatus($sPaymentName))) {
                    // hides the payment on checkout page if the payment lock time dosen't exceed current time
                    unset($this->_oPaymentList[$sPaymentName]);                    
                } elseif (empty($sClientKey) && $sPaymentName == 'novalnetcreditcard') {
                    unset($this->_oPaymentList['novalnetcreditcard']);
                }
            }
        }

        return $this->_oPaymentList;
    }

    /**
     * Gets Novalnet credential value
     *
     * @param string $sConfig
     *
     * @return string
     */
    public function getNovalnetConfig($sConfig)
    {
        if (empty($aNovalnetConfig = $this->getConfig()->getShopConfVar('aNovalnetConfig', '', 'novalnet')))
            return false;

        $aNovalnetConfig = array_map('trim', $aNovalnetConfig);

        return $aNovalnetConfig[$sConfig];
    }

    /**
     * Gets Novalnet notification message
     *
     * @param string $sPaymentId
     *
     * @return string
     */
    public function getNovalnetNotification($sPaymentId)
    {
        return $this->getNovalnetConfig('sBuyerNotify' . $sPaymentId);
    }

    /**
     * Gets Novalnet test mode status for the Novalnet payments
     *
     * @param string $sPaymentId
     *
     * @return boolean
     */
    public function getNovalnetTestmode($sPaymentId)
    {
        return $this->getNovalnetConfig('blTestmode' . $sPaymentId);
    }

     /**
     * Gets Novalnet test mode status for the Novalnet payments
     *
     * @param string $sPaymentId
     *
     * @return boolean
     */
    public function getNovalnetZeroAmountStatus($sPaymentId)
    {
        return $this->getNovalnetConfig('iShopType' . $sPaymentId);
    }

    /**
     * Get the payment form credentials
     *
     * @param string $sPaymentId
     *
     * @return array
     */
    public function getNovalnetPaymentDetails($sPaymentId)
    {
        $oDb = \OxidEsales\Eshop\Core\DatabaseProvider::getDb(\OxidEsales\Eshop\Core\DatabaseProvider::FETCH_MODE_ASSOC);
        $this->oUser  = $this->getUser();
        $iShopType    = in_array($sPaymentId, ['novalnetcreditcard', 'novalnetsepa', 'novalnetpaypal']) ? $this->getNovalnetConfig('iShopType' . $sPaymentId) : '0';

        // checks the shopping type is one click
        if ($iShopType == '1') {
			$aPaymentDetails['given_details_style']  = 'display:block';
			$aPaymentDetails['new_details_style']    = 'display:none';
            $aResult = $oDb->getRow('SELECT TID, MASKED_DETAILS FROM novalnet_transaction_detail WHERE CUSTOMER_ID = "' . $this->oUser->oxuser__oxcustnr->value . '" AND PAYMENT_TYPE IN (' . $this->_aPaymentType[$sPaymentId] . ') AND REFERENCE_TRANSACTION = "0" AND ZERO_TRANSACTION = "0" AND MASKED_DETAILS <> "" ORDER BY ORDER_NO DESC LIMIT 1');
            if (!empty($aResult['MASKED_DETAILS']) && !empty($aResult['TID'])) {
                $aPaymentDetails['aSavedDetails'] = unserialize($aResult['MASKED_DETAILS']);
                $this->_oNovalnetSession->setVariable('sPaymentRef' . $sPaymentId, $aResult['TID']);
            } else {
				$aPaymentDetails['given_details_style']  = 'display:none';
                $aPaymentDetails['new_details_style']    = 'display:block';
			}   
        } else {
			$aPaymentDetails['given_details_style']  = 'display:none';
            $aPaymentDetails['new_details_style']    = 'display:block';
		}

        return $aPaymentDetails;
    }

     /**
     * Get Shopping type details
     *
     * @param string $sPaymentId
     *
     * @return array
     */
    public function getShoppingTypeDetails($sPaymentId)
    {
        $iShopType    = in_array($sPaymentId, ['novalnetcreditcard', 'novalnetsepa', 'novalnetpaypal']) ? $this->getNovalnetConfig('iShopType' . $sPaymentId) : '0';
        $aShoppingTypeDetails = [];       

        $aShoppingTypeDetails['iShopType']  = $iShopType;        
        return $aShoppingTypeDetails;
    }

    /**
     * Gets the guarantee payment activation status for direct debit sepa and invoice
     *
     * @param string $sPaymentId
     *
     * @return boolean
     */
    public function getGuaranteePaymentStatus($sPaymentId)
    {
        $oBasket = $this->_oNovalnetSession->getBasket();
        $oPrice = $oBasket->getPrice();        
        $dAmount = str_replace(',', '', number_format($oPrice->getBruttoPrice(), 2)) * 100;
        $blGuaranteeActive = $this->getNovalnetConfig('blGuarantee' . $sPaymentId);
        $this->clearNovalnetGuaranteeSession($sPaymentId);

        // checks to enable the guarantee payment
        if (!empty($blGuaranteeActive)) {
            $sOxAddressId = \OxidEsales\Eshop\Core\Registry::getSession()->getVariable('deladrid');
            $blGuaranteeAddressCheck = true;
            if ($sOxAddressId) {
                $oDelAddress  = oxNew(\OxidEsales\Eshop\Application\Model\Address::class);
                $oDelAddress->load($sOxAddressId);
                $oUser        = $this->getUser();
                $aShippingAddress = [$oDelAddress->oxaddress__oxcountryid->value, $oDelAddress->oxaddress__oxzip->value,
                    $oDelAddress->oxaddress__oxcity->value, $oDelAddress->oxaddress__oxstreet->value,
                    $oDelAddress->oxaddress__oxstreetnr->value];

                $aUserAddress = [$oUser->oxuser__oxcountryid->value, $oUser->oxuser__oxzip->value,
                    $oUser->oxuser__oxcity->value, $oUser->oxuser__oxstreet->value, $oUser->oxuser__oxstreetnr->value];

                $blGuaranteeAddressCheck = ($aShippingAddress == $aUserAddress);
            }
            $dGuaranteeMinAmount = trim($this->getNovalnetConfig('dGuaranteeMinAmount' . $sPaymentId)) ? trim($this->getNovalnetConfig('dGuaranteeMinAmount' . $sPaymentId)) : 999;

            $blGuaranteeMinAmtCheck          = ($dAmount >= $dGuaranteeMinAmount);
            $blGuaranteeCurrencyCheck        = $oBasket->getBasketCurrency()->name == 'EUR';
            $blGuaranteeCountryCheck         = in_array($this->_oNovalnetUtil->getCountryISO($this->getUser()->oxuser__oxcountryid->value), ['DE', 'AT', 'CH']);

            if($blGuaranteeMinAmtCheck  && $blGuaranteeCurrencyCheck && $blGuaranteeAddressCheck && $blGuaranteeCountryCheck)
            {
               $this->_oNovalnetSession->setVariable('blGuaranteeEnabled' . $sPaymentId, 1);
            } elseif ($this->getNovalnetConfig('blGuaranteeForce' . $sPaymentId) != '1') {
                $this->_oNovalnetSession->setVariable('blGuaranteeForceDisabled' . $sPaymentId, 1);

                if(empty($blGuaranteeMinAmtCheck))
                {
                    $this->_oNovalnetSession->setVariable('blGuaranteeAmt' . $sPaymentId, 1);
                    if ($dGuaranteeMinAmount >= 999) {
                        $sCurrecny = $oBasket->getBasketCurrency()->name;
                        $sMinAmount = $this->_oNovalnetUtil->oLang->formatCurrency($dGuaranteeMinAmount/100, $this->_oNovalnetUtil->oConfig->getCurrencyObject($sCurrecny));
                        $this->_oNovalnetSession->setVariable('dGetGuaranteeAmount' . $sPaymentId, $sMinAmount);
                        $this->_oNovalnetSession->setVariable('dGetGuaranteeAmt' . $sPaymentId, $dGuaranteeMinAmount);
                    }
                }
                if(empty($blGuaranteeCurrencyCheck))
                    $this->_oNovalnetSession->setVariable('blGuaranteeCurrency' . $sPaymentId, 1);
                if(empty($blGuaranteeAddressCheck))
                    $this->_oNovalnetSession->setVariable('blGuaranteeAddress' . $sPaymentId, 1);
                if(empty($blGuaranteeCountryCheck))
                    $this->_oNovalnetSession->setVariable('blGuaranteeCountry' . $sPaymentId, 1);
            }
        }
        return true;
    }

    /**
     * Get the birth date for guarantee payments
     *
     * @return string
     */
    public function getNovalnetBirthDate()
    {
        $oUser = $this->getUser();
        return  (isset($oUser->oxuser__oxbirthdate->rawValue) && $oUser->oxuser__oxbirthdate->rawValue != '0000-00-00') ? $oUser->oxuser__oxbirthdate->rawValue : '';
    }

    /**
     * Get the Company field value
     *
     * @return string
     */
    public function getCompanyFieldValue()
    {
        $oUser = $this->getUser();
        $oAddress = $oUser->getSelectedAddress();
        return (!empty($oUser->oxuser__oxcompany->value) ? $oUser->oxuser__oxcompany->value : (!empty($oAddress->oxaddress__oxcompany->value) ? $oAddress->oxaddress__oxcompany->value : ''));
    }

    /**
     * Get the Currency value
     *
     * @return string
     */
    public function getCurrencyValue() {
        $oBasket           = $this->_oNovalnetSession->getBasket();
        return $oBasket->getBasketCurrency()->name;
    }

    /**
     * Validates Novalnet credentials
     *
     * @return boolean
     */
    private function _validateNovalnetConfig()
    {
        $sProcessKey = $this->getNovalnetConfig('iActivationKey');
        $sAuthCode = $this->getNovalnetConfig('sAuthCode');

        return !empty($sProcessKey) && !empty($sAuthCode);
    }

    /**
     * Get template folder path
     * 
     * @param string $sFile 
     *
     * @return string
     */
    public function getPaymentTemplatePath($sFile = "")
    {
        $viewConfig = oxNew(\OxidEsales\Eshop\Core\ViewConfig::class);
        $sModulePath = $viewConfig->getModulePath('novalnet');
        $sModulePath = $sModulePath . 'views/blocks/';
        if ($sFile) {
            return $sModulePath.$sFile;
        }
    }

    /**
     * Send customer details to Credit card iframe
     *
     * @param string $oUser user object
     *
     * @return string
     */
    public function sendNovalnetCCFormDetails($oUser)
    {
        $oBasket = $this->_oNovalnetSession->getBasket();

        $aData = [
             'cc_input' => $this->_oNovalnetUtil->getNovalnetConfigValue('sCreditcardDefaultInput'),
             'cc_label' => $this->_oNovalnetUtil->getNovalnetConfigValue('sCreditcardDefaultLabel'),
             'client_key' => $this->_oNovalnetUtil->getNovalnetConfigValue('sClientKey'),
             'inline_form' => $this->_oNovalnetUtil->getNovalnetConfigValue('blCreditcardInlineForm'),
             'test_mode' => $this->_oNovalnetUtil->getNovalnetConfigValue('blTestModenovalnetcreditcard'),
             'first_name' => $oUser->oxuser__oxfname->value,
             'last_name' => $oUser->oxuser__oxlname->value,
             'email' => $oUser->oxuser__oxusername->value,
             'street' => $oUser->oxuser__oxstreet->value,
             'city' => $oUser->oxuser__oxcity->value,
             'zip' => $oUser->oxuser__oxzip->value,
             'country_code' => $this->_oNovalnetUtil->getCountryISO($oUser->oxuser__oxcountryid->value),
             'amount' => ($this->_oNovalnetUtil->getNovalnetConfigValue('iShopTypenovalnetcreditcard') == '2') ? '0' : str_replace(',', '', number_format($oBasket->getPrice()->getBruttoPrice(), 2)) * 100,
             'currency' => $oBasket->getBasketCurrency()->name,
             'lang' => $this->_oNovalnetUtil->oLang->getLanguageAbbr(),
             'enforce_3d' => $this->_oNovalnetUtil->getNovalnetConfigValue('blEnforce3D'),
             ];
        $bShipping = \OxidEsales\Eshop\Core\Registry::getSession()->getVariable('blshowshipaddress');
         if ($bShipping == 0) {
             $aData['same_as_billing'] = 1;
         }

      return json_encode($aData);
    }


    /**
     * Clear Novalnet Guarantee Session
     *
     * @param string $sPaymentId
     */
     public function clearNovalnetGuaranteeSession($sPaymentId)
    {
        $this->_oNovalnetSession->deleteVariable('blGuaranteeEnabled' . $sPaymentId);
        $this->_oNovalnetSession->deleteVariable('blGuaranteeForceDisabled' . $sPaymentId);
        $this->_oNovalnetSession->deleteVariable('blGuaranteeAmt' . $sPaymentId);
        $this->_oNovalnetSession->deleteVariable('blGuaranteeCurrency' . $sPaymentId);
        $this->_oNovalnetSession->deleteVariable('blGuaranteeAddress' . $sPaymentId);
        $this->_oNovalnetSession->deleteVariable('blGuaranteeCountry' . $sPaymentId);
        $this->_oNovalnetSession->deleteVariable('dGetGuaranteeAmt' . $sPaymentId);
        $this->_oNovalnetSession->deleteVariable('dGetGuaranteeAmount' . $sPaymentId);
    }


}
