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
 * Script: Events.php
 */

namespace oe\novalnet\Core;

/**
 * Class Events.
 */
class Events
{
    /**
     * Executes action on activate event
     *
     */
    public static function onActivate()
    {
        $oDbMetaDataHandler = oxNew(\OxidEsales\Eshop\Core\DbMetaDataHandler::class);
        self::addNovalnetTables(); // creates Novalnet tables if not exists
        self::alterNovalnetColumns($oDbMetaDataHandler); // alters shop table and adds new field to manage the Novalnet comments
        self::addNovalnetPaymentMethods(); // inserts Novalnet payment methods

        // to update the smarty tpl file in tmp folder
        $oUtils = \OxidEsales\Eshop\Core\Registry::getUtils();
        $oUtils->resetTemplateCache(['novalnetredirect.tpl']);
        $aFiles = glob($oUtils->getCacheFilePath(null, true) . '*');
        if (is_array($aFiles)) {
            // delete the cached file with tables field name
            $aFiles = preg_grep('/oxorder_allfields_/', $aFiles);
            foreach ($aFiles as $sFile) {
                if (file_exists($sFile))
                    @unlink($sFile);
            }
        }
    }

    /**
     * Executes action on deactivate event
     *
     */
    public static function onDeactivate()
    {
        $oPayment = oxNew(\OxidEsales\Eshop\Application\Model\Payment::class);
        $aPayments = ['novalnetcreditcard', 'novalnetsepa', 'novalnetinvoice', 'novalnetprepayment', 'novalnetonlinetransfer', 'novalnetideal', 'novalnetpaypal', 'novalneteps', 'novalnetgiropay', 'novalnetprzelewy24','novalnetbarzahlen','novalnetalipay','novalnetwechatpay','novalnettrustly','novalnetonlinebanktransfer'];

        $oDb = \OxidEsales\Eshop\Core\DatabaseProvider::getDb();
        $oDb->execute('DELETE FROM oxconfig where OXVARNAME = "aNovalnetConfig"');

        // deactivates the payment while uninstalling our module
        foreach ($aPayments as $aPayment) {
            if ($oPayment->load($aPayment)) {
                $oPayment->oxpayments__oxactive = new \OxidEsales\Eshop\Core\Field(0);
                $oPayment->save();
            }
        }
    }

    /**
     * Add Novalnet column to shop table for storing Novalnet comments
     *
     */
    public static function alterNovalnetColumns($oDbMetaDataHandler)
    {
        $oDb = \OxidEsales\Eshop\Core\DatabaseProvider::getDb();

        if ($oDbMetaDataHandler->fieldExists('PROCESS_KEY', 'novalnet_transaction_detail'))
             $oDb->execute('ALTER TABLE novalnet_transaction_detail DROP VENDOR_ID, DROP PRODUCT_ID, DROP AUTH_CODE, DROP TARIFF_ID, DROP TEST_MODE, DROP PROCESS_KEY, DROP SUBS_ID, DROP STATUS, DROP CURRENCY');
        
        if (!$oDbMetaDataHandler->fieldExists('ADDITIONAL_DATA', 'novalnet_transaction_detail'))
            $oDb->execute('ALTER TABLE novalnet_transaction_detail ADD ADDITIONAL_DATA TEXT DEFAULT NULL COMMENT "Stored Novalnet bank account details"');     
            
        if (!$oDbMetaDataHandler->fieldExists('NOVALNETCOMMENTS', 'oxorder'))
            $oDb->execute('ALTER TABLE oxorder ADD NOVALNETCOMMENTS TEXT');

        if ($oDbMetaDataHandler->fieldExists('DATE', 'novalnet_callback_history'))
            $oDb->execute('ALTER TABLE novalnet_callback_history CHANGE DATE CALLBACK_DATE datetime');

        if ($oDbMetaDataHandler->fieldExists('PRODUCT_ID', 'novalnet_callback_history'))
            $oDb->execute('ALTER TABLE novalnet_callback_history DROP PAYMENT_TYPE, DROP STATUS, DROP CURRENCY, DROP PRODUCT_ID');

        if ($oDbMetaDataHandler->fieldExists('AFF_AUTHCODE', 'novalnet_aff_account_detail'))
            $oDb->execute('ALTER TABLE novalnet_aff_account_detail CHANGE VENDOR_AUTHCODE VENDOR_AUTHCODE varchar(40) COMMENT "Authentication Code",
                            CHANGE AFF_AUTHCODE AFF_AUTHCODE varchar(40) COMMENT "Affiliate Authentication Code"');

    }

    /**
     * Adds Novalnet payment methods
     *
     */
    public static function addNovalnetPaymentMethods()
    {
        $aPayments = [      'novalnetcreditcard'     => ['OXID'          => 'novalnetcreditcard',
                                                                'OXDESC_DE'     => 'Kredit- / Debitkarte',
                                                                'OXDESC_EN'     => 'Credit/Debit Cards',
                                                                'OXLONGDESC_DE' => ' Ihre Karte wird nach Bestellabschluss sofort belastet',
                                                                'OXLONGDESC_EN' => 'Your credit/debit card will be charged immediately after the order is completed'
                                                             ],
                            'novalnetsepa'           => ['OXID'          => 'novalnetsepa',
                                                                'OXDESC_DE'     => 'SEPA-Lastschrift',
                                                                'OXDESC_EN'     => 'Direct Debit SEPA',
                                                                'OXLONGDESC_DE' => 'Der Betrag wird durch Novalnet von Ihrem Konto abgebucht',
                                                                'OXLONGDESC_EN' => 'The amount will be debited from your account by Novalnet'
                                                             ],
                            'novalnetinvoice'        => ['OXID'          => 'novalnetinvoice',
                                                                'OXDESC_DE'     => 'Rechnung',
                                                                'OXDESC_EN'     => 'Invoice',
                                                                'OXLONGDESC_DE' => ' Sie erhalten eine E-Mail mit den Bankdaten von Novalnet, um die Zahlung abzuschließen ',
                                                                'OXLONGDESC_EN' => 'You will receive an e-mail with the Novalnet account details to complete the payment'
                                                             ],
                            'novalnetprepayment'     => ['OXID'          => 'novalnetprepayment',
                                                                'OXDESC_DE'     => 'Vorkasse',
                                                                'OXDESC_EN'     => 'Prepayment',
                                                                'OXLONGDESC_DE' => ' Sie erhalten eine E-Mail mit den Bankdaten von Novalnet, um die Zahlung abzuschließen ',
                                                                'OXLONGDESC_EN' => 'You will receive an e-mail with the Novalnet account details to complete the payment'
                                                             ],
                            'novalnetonlinetransfer' => ['OXID'          => 'novalnetonlinetransfer',
                                                                'OXDESC_DE'     => ' Sofortüberweisung',
                                                                'OXDESC_EN'     => 'Sofort',
                                                                'OXLONGDESC_DE' => 'Sie werden zu Sofortüberweisung weitergeleitet. Um eine erfolgreiche Zahlung zu gewährleisten, darf die Seite nicht geschlossen oder neu geladen werden, bis die Bezahlung abgeschlossen ist ',
                                                                'OXLONGDESC_EN' => 'You will be redirected to Sofort. Please don\'t close or refresh the browser until the payment is completed'
                                                             ],
                            'novalnetideal'          => ['OXID'          => 'novalnetideal',
                                                                'OXDESC_DE'     => 'iDEAL',
                                                                'OXDESC_EN'     => 'iDEAL',
                                                                'OXLONGDESC_DE' => ' Sie werden zu iDEAL weitergeleitet. Um eine erfolgreiche Zahlung zu gewährleisten, darf die Seite nicht geschlossen oder neu geladen werden, bis die Bezahlung abgeschlossen ist. ',
                                                                'OXLONGDESC_EN' => 'You will be redirected to iDEAL. Please don\'t close or refresh the browser until the payment is completed'
                                                             ],
                            'novalnetpaypal'         => ['OXID'          => 'novalnetpaypal',
                                                                'OXDESC_DE'     => 'PayPal',
                                                                'OXDESC_EN'     => 'PayPal',
                                                                'OXLONGDESC_DE' => ' Sie werden zu PayPal weitergeleitet. Um eine erfolgreiche Zahlung zu gewährleisten, darf die Seite nicht geschlossen oder neu geladen werden, bis die Bezahlung abgeschlossen ist ',
                                                                'OXLONGDESC_EN' => 'You will be redirected to PayPal. Please don\'t close or refresh the browser until the payment is completed'
                                                             ],
                            'novalneteps'            => ['OXID'          => 'novalneteps',
                                                                'OXDESC_DE'     => 'eps',
                                                                'OXDESC_EN'     => 'eps',
                                                                'OXLONGDESC_DE' => ' Sie werden zu eps weitergeleitet. Um eine erfolgreiche Zahlung zu gewährleisten, darf die Seite nicht geschlossen oder neu geladen werden, bis die Bezahlung abgeschlossen ist',
                                                                'OXLONGDESC_EN' => 'You will be redirected to eps. Please don\'t close or refresh the browser until the payment is completed'
                                                             ],
                            'novalnetgiropay'        => ['OXID'          => 'novalnetgiropay',
                                                                'OXDESC_DE'     => 'giropay',
                                                                'OXDESC_EN'     => 'giropay',
                                                                'OXLONGDESC_DE' => 'Sie werden zu giropay weitergeleitet. Um eine erfolgreiche Zahlung zu gewährleisten, darf die Seite nicht geschlossen oder neu geladen werden, bis die Bezahlung abgeschlossen ist ',
                                                                'OXLONGDESC_EN' => 'You will be redirected to giropay. Please don\'t close or refresh the browser until the payment is completed'
                                                             ],
                            'novalnetprzelewy24'     => ['OXID'          => 'novalnetprzelewy24',
                                                                'OXDESC_DE'     => 'Przelewy24',
                                                                'OXDESC_EN'     => 'Przelewy24',
                                                                'OXLONGDESC_DE' => 'Sie werden zu Przelewy24 weitergeleitet. Um eine erfolgreiche Zahlung zu gewährleisten, darf die Seite nicht geschlossen oder neu geladen werden, bis die Bezahlung abgeschlossen ist',
                                                                'OXLONGDESC_EN' => 'You will be redirected to Przelewy24. Please don\'t close or refresh the browser until the payment is completed'
                                                             ],
                             'novalnetalipay'     => ['OXID'          => 'novalnetalipay',
                                                                'OXDESC_DE'     => 'Alipay',
                                                                'OXDESC_EN'     => 'Alipay',
                                                                'OXLONGDESC_DE' => 'Sie werden zu Alipay weitergeleitet. Um eine erfolgreiche Zahlung zu gewährleisten, darf die Seite nicht geschlossen oder neu geladen werden, bis die Bezahlung abgeschlossen ist',
                                                                'OXLONGDESC_EN' => 'You will be redirected to Alipay. Please don\'t close or refresh the browser until the payment is completed'
                                                             ],
                             'novalnetwechatpay'     => ['OXID'          => 'novalnetwechatpay',
                                                                'OXDESC_DE'     => 'WeChat Pay',
                                                                'OXDESC_EN'     => 'WeChat Pay',
                                                                'OXLONGDESC_DE' => 'Sie werden zu WeChat Pay weitergeleitet. Um eine erfolgreiche Zahlung zu gewährleisten, darf die Seite nicht geschlossen oder neu geladen werden, bis die Bezahlung abgeschlossen ist',
                                                                'OXLONGDESC_EN' => 'You will be redirected to WeChat Pay. Please don\'t close or refresh the browser until the payment is completed'
                                                             ],
                             'novalnettrustly'     => ['OXID'          => 'novalnettrustly',
                                                                'OXDESC_DE'     => 'Trustly',
                                                                'OXDESC_EN'     => 'Trustly',
                                                                'OXLONGDESC_DE' => 'Sie werden zu Trustly weitergeleitet. Um eine erfolgreiche Zahlung zu gewährleisten, darf die Seite nicht geschlossen oder neu geladen werden, bis die Bezahlung abgeschlossen ist',
                                                                'OXLONGDESC_EN' => 'You will be redirected to Trustly. Please don\'t close or refresh the browser until the payment is completed'
                                                             ],
                            'novalnetonlinebanktransfer'     => ['OXID'          => 'novalnetonlinebanktransfer',
                                                                'OXDESC_DE'     => 'Online bank transfer',
                                                                'OXDESC_EN'     => 'Online bank transfer',
                                                                'OXLONGDESC_DE' => 'Sie werden auf die Banking-Seite weitergeleitet. Bitte schließen oder aktualisieren Sie den Browser nicht, bis die Zahlung abgeschlossen ist',
                                                                'OXLONGDESC_EN' => 'You will be redirected to banking page. Please don’t close or refresh the browser until the payment is completed
'
                                                             ],                                                          
                                                             
                            'novalnetbarzahlen'      => ['OXID'          => 'novalnetbarzahlen',
                                                                'OXDESC_DE'     => 'Barzahlen/viacash',
                                                                'OXDESC_EN'     => 'Barzahlen/viacash',
                                                                'OXLONGDESC_DE' => 'Nach erfolgreichem Bestellabschluss erhalten Sie einen Zahlschein bzw. eine SMS. Damit können Sie Ihre Online-Bestellung bei einem unserer Partner im Einzelhandel (z.B. Drogerie, Supermarkt etc.) bezahlen',
                                                                'OXLONGDESC_EN' => 'On successful checkout, you will receive a payment slip/SMS to pay your online purchase at one of our retail partners (e.g. supermarket)'
                                                             ]
                            ];
        $oLangArray = \OxidEsales\Eshop\Core\Registry::getLang()->getLanguageArray();
        $oPayment = oxNew(\OxidEsales\Eshop\Application\Model\Payment::class);
        foreach ($oLangArray as $oLang) {
            foreach ($aPayments as $aPayment) {
                $oPayment->setId($aPayment['OXID']);
                $oPayment->setLanguage($oLang->id);
                $sLangAbbr = in_array($oLang->abbr, ['de', 'en']) ? $oLang->abbr : 'en';
                $oPayment->oxpayments__oxid          = new \OxidEsales\Eshop\Core\Field($aPayment['OXID']);
                $oPayment->oxpayments__oxaddsumrules = new \OxidEsales\Eshop\Core\Field('31');
                $oPayment->oxpayments__oxtoamount    = new \OxidEsales\Eshop\Core\Field('1000000');
                $oPayment->oxpayments__oxtspaymentid = new \OxidEsales\Eshop\Core\Field('');
                $oPayment->oxpayments__oxdesc     = new \OxidEsales\Eshop\Core\Field($aPayment['OXDESC_'. strtoupper($sLangAbbr)]);
                $oPayment->oxpayments__oxlongdesc = new \OxidEsales\Eshop\Core\Field($aPayment['OXLONGDESC_'. strtoupper($sLangAbbr)]);
                $oPayment->save();
            }
        }
        unset( $oPayment);
    }

    /**
     * Executes queries for creating Novalnet payments
     *
     */
    public static function addNovalnetTables()
    {
        $oDb  = \OxidEsales\Eshop\Core\DatabaseProvider::getDb();
        $sSql = 'CREATE TABLE IF NOT EXISTS novalnet_callback_history (
                ID int(11) unsigned AUTO_INCREMENT COMMENT "Auto increment ID",               
                ORDER_NO int(11) unsigned COMMENT "Order number in shop",
                AMOUNT int(11) DEFAULT NULL COMMENT "Amount in cents",               
                CALLBACK_TID bigint(20) DEFAULT NULL COMMENT "Callback reference ID",
                ORG_TID bigint(20) unsigned DEFAULT NULL COMMENT "Original transaction ID",                
                CALLBACK_DATE datetime COMMENT "Callback DATE TIME",
                PRIMARY KEY (ID),
                KEY ORDER_NO (ORDER_NO)
                ) COMMENT="Novalnet Callback History"';
        $oDb->execute($sSql);

        $sSql = 'CREATE TABLE IF NOT EXISTS novalnet_transaction_detail (
                ID int(11) unsigned AUTO_INCREMENT COMMENT "Auto increment ID",               
                TID bigint(20) COMMENT "Novalnet transaction reference ID",
                ORDER_NO int(11) unsigned COMMENT "Order ID from shop",               
                PAYMENT_ID int(11) unsigned COMMENT "Payment ID",
                PAYMENT_TYPE varchar(30) COMMENT "Executed payment type of this order",
                AMOUNT int(11) DEFAULT "0" COMMENT "Transaction amount",
                GATEWAY_STATUS varchar(9) NULL COMMENT "Novalnet transaction status",
                CUSTOMER_ID int(11) unsigned DEFAULT NULL COMMENT "Customer ID from shop",
                ORDER_DATE datetime COMMENT "Transaction Date for reference",
                REFUND_AMOUNT int(11) DEFAULT "0" COMMENT "Refund amount",
                TOTAL_AMOUNT int(11) DEFAULT "0" COMMENT "Customer refund the amount",                
                MASKED_DETAILS TEXT DEFAULT NULL COMMENT "Masked account details of customer",
                ZERO_TRXNDETAILS TEXT DEFAULT NULL COMMENT "Zero amount transaction details",
                ZERO_TRXNREFERENCE bigint(20) DEFAULT NULL COMMENT "Zero transaction TID",
                ZERO_TRANSACTION ENUM("0", "1") DEFAULT "0" COMMENT "Notify the zero amount order",
                REFERENCE_TRANSACTION ENUM("0", "1") DEFAULT "0" COMMENT "Notify the referenced order",
                ADDITIONAL_DATA TEXT DEFAULT NULL COMMENT "Stored Novalnet bank account details",
                PRIMARY KEY (ID),
                KEY TID (TID),
                KEY ORDER_NO (ORDER_NO)
                ) COMMENT="Novalnet Transaction History"';
        $oDb->execute($sSql);

        $sSql = 'CREATE TABLE IF NOT EXISTS novalnet_aff_account_detail (
                ID int(11) unsigned AUTO_INCREMENT COMMENT "Auto increment ID",
                VENDOR_ID int(11) unsigned COMMENT "Vendor ID",
                VENDOR_AUTHCODE varchar(40) COMMENT "Authorisation ID",
                PRODUCT_ID int(11) unsigned COMMENT "Project ID",
                PRODUCT_URL varchar(200) DEFAULT NULL COMMENT "Product URL",
                ACTIVATION_DATE datetime DEFAULT NULL COMMENT "Affiliate activation date",
                AFF_ID int(11) unsigned COMMENT "Affiliate vendor ID",
                AFF_AUTHCODE varchar(40) COMMENT "Affiliate authorisation ID",
                AFF_ACCESSKEY varchar(40) COMMENT "Affiliate access Key",
                PRIMARY KEY (ID),
                KEY AFF_ID (AFF_ID)
                ) COMMENT="Novalnet merchant / affiliate account information"';
        $oDb->execute($sSql);

        $sSql = 'CREATE TABLE IF NOT EXISTS novalnet_aff_user_detail (
                ID int(11) unsigned AUTO_INCREMENT COMMENT "Auto increment ID",
                AFF_ID int(11) unsigned COMMENT "Affiliate vendor ID",
                CUSTOMER_ID int(11) unsigned COMMENT "Affiliate customer ID",
                AFF_ORDER_NO int(11) unsigned COMMENT "Affiliate order Number",
                PRIMARY KEY (ID),
                KEY CUSTOMER_ID (CUSTOMER_ID),
                KEY AFF_ORDER_NO (AFF_ORDER_NO)
                ) COMMENT="Novalnet merchant / affiliate user details"';
        $oDb->execute($sSql);
    }  
}
?>
