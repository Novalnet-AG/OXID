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
 * Script: PaymentGateway.php
 */

namespace oe\novalnet\Model;

use oe\novalnet\Classes\NovalnetUtil;

 /**
 * Class PaymentGateway.
 */
class PaymentGateway extends PaymentGateway_parent
{
    /**
     * Get Util class
     *
     * @var string
     */
    protected $_oNovalnetUtil;

    /**
     * Get Error message
     *
     * @var string
     */
    protected $_sLastError;

    /**
     * Executes payment, returns true on success.
     *
     * @param double $dAmount
     * @param object &$oOrder
     *
     * @return boolean
     */
    public function executePayment($dAmount, &$oOrder)
    {
        $this->sCurrentPayment = $oOrder->sCurrentPayment;
        // checks the current payment method is not a Novalnet payment. If yes then skips the execution of this function
        if (!preg_match("/novalnet/i", $this->sCurrentPayment))
            return parent::executePayment($dAmount, $oOrder);

        $this->_oNovalnetUtil    = oxNew(NovalnetUtil::class);

        if ($this->_oNovalnetUtil->oConfig->getRequestParameter('tid') && $this->_oNovalnetUtil->oConfig->getRequestParameter('status')) {

            // checks to validate the redirect response
            if ($this->_validateNovalnetRedirectResponse() === false)
                return false;

        } else {
             // performs the transaction call
             $aResponse = $this->_oNovalnetUtil->doPayment($oOrder);

             $oOrdrId  = $oOrder->oxorder__oxid->value;
             if ($aResponse['status'] != '100') {
                $oOrder = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
                $oOrder->delete($oOrdrId);
                $this->_oNovalnetUtil->setNovalnetPaygateError($aResponse);
                return false;
            }
        }

        return true;
    }

    /**
     * Validates Novalnet redirect payment's response
     *
     * @return boolean
     */
    private function _validateNovalnetRedirectResponse()
    {
        $aNovalnetResponse = $_REQUEST;


        $aResponse = $this->_oNovalnetUtil->getDecodeData($aNovalnetResponse);

        // checks the transaction status is success
        if (in_array($aResponse['status'], ['100','90'])) {

            // checks the hash value validation for redirect payments
            if ($this->_oNovalnetUtil->checkHash($aNovalnetResponse) === false) {
                $this->_sLastError = $this->_oNovalnetUtil->oLang->translateString('NOVALNET_CHECK_HASH_FAILED_ERROR');
                return false;
            }
            $this->_oNovalnetUtil->oSession->setVariable('aNovalnetGatewayResponse', $aResponse);
        } else {

            $aVendorData = ['vendor' => $aResponse['vendor'],
                            'product' => $aResponse['product'],
                            'auth_code' => $aResponse['auth_code'],
                            'tariff' => $aResponse['tariff'],
                            'test_mode' => $aResponse['test_mode']
                        ];
            $sOrderId = $this->_oNovalnetUtil->oSession->getVariable('blSave');
            $this->_oNovalnetUtil->oSession->deleteVariable('ordrem');
            $this->_oNovalnetUtil->oSession->deleteVariable('sess_challenge');
            $oDb              = \OxidEsales\Eshop\Core\DatabaseProvider::getDb();
            $oDb->execute("UPDATE oxorder SET OXFOLDER = 'ORDER_STATE_PAYMENTERROR' WHERE oxid = '{$sOrderId}'");
            $sMessage = $this->_oNovalnetUtil->oLang->translateString('NOVALNET_TRANSACTION_DETAILS');
            $sMessage .= $this->_oNovalnetUtil->oLang->translateString('NOVALNET_TRANSACTION_ID') . $aResponse['tid'];
            $sMessage .= !empty($aResponse['test_mode']) ? $this->_oNovalnetUtil->oLang->translateString('NOVALNET_TEST_ORDER') : '';
            $sMessage .= '<br>'.$this->_oNovalnetUtil->oLang->translateString('NOVALNET_PAYMENT_FAILED') . ' - ' . $this->_oNovalnetUtil->setPaygateError($aResponse);
            $oDb->execute('INSERT INTO novalnet_transaction_detail ( TID, ORDER_NO, PAYMENT_ID, PAYMENT_TYPE, AMOUNT, GATEWAY_STATUS, CUSTOMER_ID, ORDER_DATE, TOTAL_AMOUNT, MASKED_DETAILS, REFERENCE_TRANSACTION, ZERO_TRXNDETAILS, ZERO_TRXNREFERENCE, ZERO_TRANSACTION, ADDITIONAL_DATA) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$aResponse['tid'], $aResponse['order_no'], $aResponse['key'], $aResponse['payment_type'], $aResponse['amount'], $aResponse['tid_status'], $aResponse['customer_no'], date('Y-m-d H:i:s'), $aResponse['amount'], '', '', '', '', '', serialize($aVendorData)]);
            $oDb->execute('UPDATE oxorder SET NOVALNETCOMMENTS = CONCAT(IF(NOVALNETCOMMENTS IS NULL, "", NOVALNETCOMMENTS), "' . $sMessage . '") WHERE oxid = "' . $sOrderId . '"');
            $this->_updateArticleStock();
            $this->_sLastError = $this->_oNovalnetUtil->setNovalnetPaygateError($aResponse);
            $this->_oNovalnetUtil->clearNovalnetRedirectSession();
            return false;
        }
        return true;
    }

    private function _updateArticleStock() {
        $aOrderArticles = $this->_oNovalnetUtil->oSession->getVariable('aOrderArticles');
        foreach ($aOrderArticles as $oOrderArticle) {
                $oOrderArticle->updateArticleStock($oOrderArticle->oxorderarticles__oxamount->value, $this->_oNovalnetUtil->oConfig->getConfigParam('blAllowNegativeStock'));
         }
    }
}
?>
