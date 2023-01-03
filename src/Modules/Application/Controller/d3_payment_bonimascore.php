<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\Bonimascore\Modules\Application\Controller;

use D3\Bonimascore\Application\Model\d3bonima;
use D3\Bonimascore\Application\Model\d3bonimascore;
use D3\Bonimascore\Core\d3bonimascore_conf;
use D3\Bonimascore\Modules\Application\Model\d3_oxuser_bonimascore;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Log\d3log;
use DateTime;
use Doctrine\DBAL\DBALException;
use Exception;
use OxidEsales\Eshop\Application\Model\Payment;
use OxidEsales\Eshop\Application\Model\PaymentList;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;

class d3_payment_bonimascore extends d3_payment_bonimascore_parent
{
    private $_sModId = 'd3bonimascore';

    /**
     * Rendert View
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function render()
    {
        $sReturn = parent::render();

        if (!$this->_d3GetSettings()->isActive()) {
            $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'module not active or license not valid');
            return $sReturn;
        }

        /** @var d3bonima $oBonima */
        $oBonima = oxNew(d3bonima::class);

        if ($oBonima->d3DontCheckUser()) {
            $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'user is excluded from bonima check');
            return $sReturn;
        }

        if ($oBonima->d3BasketAmountDontRequiresCheck()) {
            $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'basket amount is excluded from bonima check');
            return $sReturn;
        }

        if ($this->_d3GetSettings()->getLicenseConfigData(d3bonimascore_conf::SERIAL_BIT_PREMIUMEDITION, 1)) {
            if ($oBonima->d3BonimaScoreCreditLimitExceeded()) {
                $this->_oPaymentList = $this->_d3BonimaScoreGetWhitelistedPaymentList($this->_d3BonimaScoreGetSafePaymentsIdList());
                $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'set safe payments because of exceeded credit limit');
                return $sReturn;
            }
        }

        $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'score checks started');

        // get payment list after unvalid payment selection redirect
        if ($this->d3RequirePreCheck()) {
            $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'start pre check');
            $this->_d3BonimaScorePreCheckPayments();
            $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'pre checks finished');
        }

        $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'score checks finished');

        return $sReturn;
    }

    /**
     * Wird ueber 'fnc' aufgerufen.
     * Fuehrt die BonimaScore-Pruefung aus.
     * @return mixed|string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws StandardException
     */
    public function validatepayment()
    {
        $mReturn = parent::validatePayment();

        if (!$this->_d3GetSettings()->isActive()) {
            return $mReturn;
        }

        /** @var d3bonima $oBonima */
        $oBonima = oxNew(d3bonima::class);

        if ($oBonima->d3DontCheckUser()) {
            $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'user is excluded from bonima check');
            return $mReturn;
        }

        if ($oBonima->d3BasketAmountDontRequiresCheck()) {
            $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'basket amount is excluded from bonima check');
            return $mReturn;
        }

        /** @var d3_oxuser_bonimascore $oUser */
        $oUser = $this->getUser();
        if (!$this->d3PaymentIsSafe($oBonima->d3GetRequestedPaymentId()) && !$oUser->isLoaded()) {
            $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'no user loaded');
            $mReturn = $this->d3GetNoMandatoryFieldValueReturn();
        } elseif (false === $this->d3PaymentIsSafe($oBonima->d3GetRequestedPaymentId()) && false === $oUser->d3HasMandatoryFieldValues()) {
            $mReturn = $this->d3GetNoMandatoryFieldValueReturn();
        } elseif (false === $oBonima->hasValidPaymentSelected()) {
            $mReturn = $this->d3GetNoValidPaymentReturn();
        }

        return $mReturn;
    }

    public function d3GetNoValidMandatoryValueController()
    {
        return "user";
    }

    /**
     * @return string[]
     */
    public function d3GetNotRequestedMandatoryFields()
    {
        /** @var d3_oxuser_bonimascore $user */
        $user = $this->getUser();
        return $user->d3GetNotRequestedMandatoryFields();
    }

    /**
     * combine oxstreet + oxstreetnr
     * @return string[]
     */
    public function d3GetNotRequestedCombinedMandatoryFields()
    {
        $replaces = [
            'oxuser__oxstreetnr' => 'oxuser__oxstreet',
            'oxuser__oxcity'     => 'oxuser__oxzip',
        ];

        $fields = $this->d3GetNotRequestedMandatoryFields();
        foreach ($replaces as $search => $replace) {
            if (false !== $fieldIdent = array_search($search, $fields)) {
                $fields[ $fieldIdent ] = $replace;
            }
        }

        return array_unique($fields);
    }

    /**
     * @return string
     */
    public function d3GetNoMandatoryFieldValueReturn()
    {
        $sReturnController = $this->d3GetNoValidMandatoryValueController();

        /** @var d3_oxuser_bonimascore $user */
        $user = $this->getUser();
        Registry::getSession()->setVariable('d3BonimaScoreRequiredFields', $user->d3GetNotRequestedMandatoryFields());

        return $sReturnController;
    }

    /**
     * @return string
     */
    public function d3GetNoValidPaymentReturn()
    {
        return 'payment';
    }

    /**
     * @return d3_cfg_mod
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    private function _d3GetSettings()
    {
        return d3_cfg_mod::get($this->_sModId);
    }

    /**
     * Checkt Pyments und entfernt diese ggf. aus der Liste
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _d3BonimaScorePreCheckPayments()
    {
        $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'preCheck', 'execute pre check');

        Registry::getSession()->deleteVariable('d3BonimaScorePaymentFailed');
        Registry::getSession()->deleteVariable('d3BonimaScoreDelAddrFailed');
        Registry::getSession()->deleteVariable('d3BonimaScoreRequiredFields');

        /** @var d3bonima $oBonima */
        $oBonima = oxNew(d3bonima::class);

        /** @var d3_oxuser_bonimascore $oUser */
        $oUser = $this->getUser();
        $oResponse = $oUser->d3BonimaScoreGetSavedResponse();

        $oConfig = null;
        $oPaymentList = null;

        if ($oResponse) {
            $oConfig = $oBonima->d3BonimaScoreGetConfig($oResponse);

            if ($oConfig) {
                $oPaymentList = $this->_d3BonimaScoreRemovePaymentsByConfig($oConfig);
            }
        }

        $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'hasResponse', is_object($oResponse));

        $blHasPaymentListByScore = $oResponse && $oConfig && $oPaymentList;

        $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'hasScorePaymentList', $blHasPaymentListByScore);
        $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, $blHasPaymentListByScore ? 'setActivePayments' : 'useSafePayments');

        $this->_oPaymentList = $blHasPaymentListByScore
            ? $oPaymentList
            : $this->_d3BonimaScoreGetWhitelistedPaymentList($this->_d3BonimaScoreGetSafePaymentsIdList());
    }

    /**
     * Liefert Liste der sicheren Bezahlarten zurueck
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _d3BonimaScoreGetSafePayments()
    {
        $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'getSafePayments');

        /** @var array $aPaymentList */
        $aPaymentList = $this->getPaymentList();

        /** @var Payment $oPayment */
        foreach ($aPaymentList as $sIndex => $oPayment) {
            if (!$oPayment->getFieldData('d3bonimascoresafe')) {
                unset($aPaymentList[$sIndex]);
            }
        }

        $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'safePayments', serialize(array_keys($aPaymentList)));

        return $aPaymentList;
    }

    /**
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _d3BonimaScoreGetSafePaymentsIdList()
    {
        return array_keys($this->_d3BonimaScoreGetSafePayments());
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3RequirePreCheck()
    {
        /** @var d3_oxuser_bonimascore $oUser */
        $oUser = $this->getUser();
        return Registry::getSession()->getVariable('d3BonimaScorePaymentFailed')
            || $oUser->d3BonimaScoreGetSavedResponse();
    }

    /**
     * Entfernt alle nicht erlaubten Zahlarten
     * @param d3bonimascore $oConfig
     * @return PaymentList
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _d3BonimaScoreRemovePaymentsByConfig(d3bonimascore $oConfig)
    {
        $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'removePayments', 'apply config ' . $oConfig->getId());

        Registry::getSession()->setVariable('oD3BonimaScoreConfig_'.$this->getUser()->getId(), $oConfig->getId());

        $oBonima = oxNew(d3bonima::class);

        $aAllowedPayments       = array_merge($oConfig->d3GetPayments(), $this->_d3BonimaScoreGetSafePaymentsIdList());

        if ($this->_d3GetSettings()->getLicenseConfigData(d3bonimascore_conf::SERIAL_BIT_PREMIUMEDITION, 1)
            && $this->_d3GetSettings()->getValue('bD3BonimaScoreDelAddrCheck')
            && $oBonima->d3HasDifferentDelAddr()
        ) {
            $sUnAllowedPayments = trim($this->_d3GetSettings()->getValue('sD3BoniScoreDelAddrForbPayments'));

            $aUnAllowedPayments = [];
            if (strlen($sUnAllowedPayments)) {
                $aUnAllowedPayments = explode('|', $sUnAllowedPayments);
            }

            if (count($aUnAllowedPayments)) {
                foreach ($aUnAllowedPayments as $sUnAllowedPaymentId) {
                    $sKey = array_search(trim($sUnAllowedPaymentId), $aAllowedPayments);
                    if ($sKey !== false) {
                        unset($aAllowedPayments[$sKey]);
                    }
                }
            }
        }

        return ($oBonima->d3BonimaScoreCreditLimitExceeded($oConfig))
                ? $this->_d3BonimaScoreGetWhitelistedPaymentList($this->_d3BonimaScoreGetSafePaymentsIdList())
                : $this->_d3BonimaScoreGetWhitelistedPaymentList($aAllowedPayments);
    }

    /**
     * Liefert eine Liste der ausschlieslich erlaubten Zahlarten zurueck
     * @param array $aAllowedPayments
     * @return PaymentList
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _d3BonimaScoreGetWhitelistedPaymentList(array $aAllowedPayments)
    {
        /** @var PaymentList $oPaymentList */
        $oPaymentList = $this->getPaymentList();

        /** @var Payment $oPayment */
        foreach ($oPaymentList as $sIndex => $oPayment) {
            if (!in_array($oPayment->getId(), $aAllowedPayments)) {
                $this->_d3GetSettings()->d3getLog()->log(d3log::DEBUG, __CLASS__, __FUNCTION__, __LINE__, 'getWhitelistedPayments', 'remove payment '.$oPayment->getFieldData('oxdesc'));
                unset($oPaymentList[$sIndex]);
            }
        }

        return $oPaymentList;
    }

    /**
     * @param $sPaymentId
     *
     * @return bool
     */
    public function d3PaymentIsSafe($sPaymentId)
    {
        $oPayment = oxNew(Payment::class);
        $oPayment->load($sPaymentId);

        return (bool) $oPayment->getFieldData('d3bonimascoresafe');
    }

    /**
     * @return array
     * @throws Exception
     */
    public function d3GetUserBirthdate()
    {
        $birthdate = (string) Registry::getSession()->getUser()->getFieldData('oxbirthdate');

        // because of DateTime bug with zero date
        if ($birthdate === '0000-00-00') {
            return [
                'year'  => '0000',
                'month' => '00',
                'day'   => '00',
            ];
        }

        $date = new DateTime($birthdate);

        return [
            'year'  => $date->format('Y'),
            'month' => $date->format('m'),
            'day'   => $date->format('d'),
        ];
    }
}
