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
 * Script: InputValidator.php
 */

namespace oe\novalnet\Core;

use oe\novalnet\Classes\NovalnetUtil;

/**
 * Class InputValidator.
 */
class InputValidator extends InputValidator_parent
{

    /**
     * Required fields for Novalnet CC payment
     *
     * @var array
     */
    protected $_aRequiredCCFields = ['novalnet_cc_hash', 'novalnet_cc_uniqueid' ];

    /**
     * Wrapper to get NovalnetUtil object
     *
     * @var object
     */
    protected $_oNovalnetUtil;

   /**
     * Wrapper to get utils object
     *
     * @var object
     */
    protected $_oNovalnetOxUtils;

    /**
     * Required fields for getting current payment name
     *
     * @var array
     */
    protected $_sCurrentPayment;


    /**
     * Validates payments input data from payment page
     *
     * @param string $sPaymentId
     * @param array  &$aDynValue
     *
     * @return boolean
     */
    public function validatePaymentInputData($sPaymentId, & $aDynValue)
    {
         if (preg_match("/novalnet/i", $sPaymentId)) {
            $this->_oNovalnetUtil = oxNew(NovalnetUtil::class);
            $this->_oNovalnetOxUtils = \OxidEsales\Eshop\Core\Registry::getUtils();

            $oUser  = $this->getUser();

            list($sFirstName, $sLastName) = $this->_oNovalnetUtil->retriveName($oUser);

            if (empty($sFirstName) || empty($sLastName) || !oxNew(\OxidEsales\Eshop\Core\MailValidator::class)->isValidEmail($oUser->oxuser__oxusername->value))
                $this->_oNovalnetOxUtils->redirect($this->_oNovalnetUtil->setRedirectURL($this->_oNovalnetUtil->oLang->translateString('NOVALNET_INVALID_NAME_EMAIL')));

            $this->_sCurrentPayment = $sPaymentId;

            $blOk                  = true;

            if (is_array($aDynValue))
                $aDynValue = array_map('trim', $aDynValue);

            // validate age for guaranteed payments - invoice and direct debit sepa
            if ($this->_oNovalnetUtil->oSession->getVariable('blGuaranteeEnabled' . $sPaymentId) && $this->_oNovalnetUtil->oSession->getVariable('blGuaranteeForceDisabled' . $sPaymentId) != '1') {
                    $oUser = $this->getUser();
                    $oAddress = $oUser->getSelectedAddress();
                    $sCompany = (!empty($oUser->oxuser__oxcompany->value) ? $oUser->oxuser__oxcompany->value : (!empty($oAddress->oxaddress__oxcompany->value) ? $oAddress->oxaddress__oxcompany->value : ''));
                    $sNovalnetBirthDate = $aDynValue['birthdate' . $sPaymentId];
                    if ($sPaymentId == 'novalnetsepa') {
                        if (isset($aDynValue['novalnet_sepa_new_details']) && $aDynValue['novalnet_sepa_new_details'] == 0) {
                            $sNovalnetBirthDate = $aDynValue['birthdate' . $sPaymentId. '_oneclick'];
                        }                    
                    }
                    $sFormatBirthDate = date('Y-m-d', strtotime($sNovalnetBirthDate));

                    $sErrorMessage = '';
                    if ($sCompany == '') {
                        if ($sNovalnetBirthDate == '') {
                            $sErrorMessage = $this->_oNovalnetUtil->oLang->translateString('NOVALNET_EMPTY_BIRTHDATE_ERROR');
                        } elseif ($sNovalnetBirthDate != $sFormatBirthDate) {
                            $sErrorMessage = $this->_oNovalnetUtil->oLang->translateString('NOVALNET_INVALID_DATE_ERROR');
                        } elseif (time() < strtotime('+18 years', strtotime($sNovalnetBirthDate))) {
                            $sErrorMessage = $this->_oNovalnetUtil->oLang->translateString('NOVALNET_INVALID_BIRTHDATE_ERROR');
                        } 
                    }
                    if ($sErrorMessage != '') {
                        if ($this->_oNovalnetUtil->getNovalnetConfigValue('blGuaranteeForce' . $this->_sCurrentPayment) != '1') {
                            $this->_oNovalnetOxUtils->redirect($this->_oNovalnetUtil->setRedirectURL($sErrorMessage));
                        } else {
                            $this->_oNovalnetUtil->oSession->deleteVariable('blGuaranteeEnabled' . $sPaymentId);
                        }
                    }
                } elseif ($this->_oNovalnetUtil->oSession->getVariable('blGuaranteeForceDisabled' . $sPaymentId)) {
                    $sErrorMessage = $this->_oNovalnetUtil->oLang->translateString('NOVALNET_GUARANTEE_FORCE_DISABLED_MESSAGE');
                    $this->_oNovalnetOxUtils->redirect($this->_oNovalnetUtil->setRedirectURL($sErrorMessage));
                }
                $this->_oNovalnetUtil->oSession->setVariable('anovalnetdynvalue', $aDynValue);

                // checks to validate credit card or sepa account details
                if ($sPaymentId == 'novalnetcreditcard') {
                    $blOk = $this->_validateCreditCardInputData($aDynValue);
                } elseif ($sPaymentId == 'novalnetsepa') {
                    $blOk = $this->_validateSepaInputData($aDynValue);
                }
                return $blOk;
            } else {
                parent::validatePaymentInputData($sPaymentId, $aDynValue);
        }
    }

    /**
     * Validates credit card details
     *
     * @param array $aDynValue
     *
     * @return boolean
     */
    private function _validateCreditCardInputData($aDynValue)
    {
        if (!isset($aDynValue['novalnet_cc_new_details']) || $aDynValue['novalnet_cc_new_details'] == 1) {
            foreach ($this->_aRequiredCCFields as $sRequiredFields) {
                if (empty($aDynValue[$sRequiredFields])) {
                    $sErrorMessage = $this->_oNovalnetUtil->oLang->translateString('NOVALNET_CC_INVALID_DETAILS');
                    $this->_oNovalnetOxUtils->redirect($this->_oNovalnetUtil->setRedirectURL($sErrorMessage));
                }
            }
        }
        
        return true;
    }

    /**
     * Validates direct debit sepa details
     *
     * @param array $aDynValue
     *
     * @return boolean
     */
    private function _validateSepaInputData($aDynValue)
    {
        if (!isset($aDynValue['novalnet_sepa_new_details']) || $aDynValue['novalnet_sepa_new_details'] == 1) {
            if (empty($aDynValue['novalnet_sepa_iban'])) {
                $sErrorMessage = $this->_oNovalnetUtil->oLang->translateString('NOVALNET_SEPA_INVALID_DETAILS');
                $this->_oNovalnetOxUtils->redirect($this->_oNovalnetUtil->setRedirectURL($sErrorMessage));
            }
        }
        
        return true;
    }
}
?>
