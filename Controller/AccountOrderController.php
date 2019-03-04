<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GNU General Public License
 * that is mentioned with this package in the file Installation_Guide-oxid_6.0.x-6.1.2_novalnet_11.3.0.pdf
 *
 * @author Novalnet <technic@novalnet.de>
 * @copyright Novalnet AG
 * @license GNU General Public License
 *
 */

namespace oe\novalnet\Controller;

use oe\novalnet\Classes\NovalnetUtil;

/**
 * Class AccountOrderController.
 */
class AccountOrderController extends AccountOrderController_parent {

    /**
     * Gets Novalnet payment name for given order
     *
     * @param string $sPaymentType
     *
     * @return string
     */
    public function getNovalnetPaymentName($sPaymentType)
    {
        $oPayment = oxNew(\OxidEsales\Eshop\Application\Model\Payment::class);
        $oPayment->load($sPaymentType);
        return $oPayment->oxpayments__oxdesc->rawValue;
    }

    /**
     * Gets current theme
     *
     * @return string
     */
    public function novalnetGetTheme()
    {
        $oTheme = oxNew('oxTheme');
        return $oTheme->getActiveThemeId();
    }
}
