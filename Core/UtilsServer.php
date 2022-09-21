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
 * Script: UtilsServer.php
 */

namespace oe\novalnet\Core;

use oe\novalnet\Classes\NovalnetUtil;

/**
 * Class UtilsServer.
 */
class UtilsServer extends UtilsServer_parent
{
     /**
     * Returns cookie $sName value.
     * If optional parameter $sName is not set then getCookie() returns whole cookie array
     *
     * @param string $sName cookie param name
     *
     * @return mixed
     */
    public function getOxCookie($sName = null)
    {
        $sValue = null;
        if ($sName && isset($_COOKIE[$sName])) {
            $sValue = \OxidEsales\Eshop\Core\Registry::getConfig()->checkParamSpecialChars($_COOKIE[$sName]);
        } elseif ($sName && !isset($_COOKIE[$sName])) {
            $sValue = isset($this->_sSessionCookies[$sName]) ? $this->_sSessionCookies[$sName] : null;
        } elseif (!$sName && isset($_COOKIE)) {
            $sValue = $_COOKIE;
        }

        $sSid = \OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter('inputval6');
        $sSid = ($sSid) ? $sSid : \OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter('nn_sid');
        if (empty($sValue) && !empty($sSid)) {
            $sValue = $sSid;
        }

        return $sValue;
    }
}

