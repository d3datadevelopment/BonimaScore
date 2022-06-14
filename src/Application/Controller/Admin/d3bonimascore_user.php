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

namespace D3\Bonimascore\Application\Controller\Admin;

use D3\Bonimascore\Application\Model\d3bonimascore;
use D3\Bonimascore\Application\Model\d3bonimascoreRequest;
use D3\Bonimascore\Application\Model\d3bonimascoreResponse;
use D3\Bonimascore\Core\d3bonimascore_conf;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\d3database;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Application\Controller\Admin\AdminController;
use OxidEsales\Eshop\Application\Model\User;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;

class d3bonimascore_user extends AdminController
{
    /** @var d3bonimascoreResponse */
    public $bonimaresponse;
    /**
     * Current class template.
     *
     * @var string
     */
    protected $_sThisTemplate = 'd3bonimascore_user.tpl';

    /**
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
        parent::render();

        $soxId = $this->_aViewData["oxid"] = $this->getEditObjectId();

        if ($soxId != "-1" && isset($soxId)) {
            $oUser = oxNew(User::class);
            $oUser->load($soxId);
            $this->_aViewData["edit"] = $oUser;

            $oDb = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC);

            $oResponse = oxNew(d3bonimascoreResponse::class);

            $oRequest = oxNew(d3bonimascoreRequest::class);
            $oRequest->buildRequestHash($oUser);

            $oQB = d3database::getInstance()->getQueryBuilder();
            $oQB->select('response')
                ->from($oResponse->getViewName())
                ->where('oxuserid = '.$oQB->createNamedParameter($soxId))
                ->andWhere('d3requesthash ='.$oQB->createNamedParameter($oRequest->d3GetRequestHash()))
                ->orderBy('date', 'DESC')
                ->setMaxResults(1);

            if ($sResponse = $oDb->getOne($oQB->getSQL(), $oQB->getParameters())) {
                $oResponse = oxNew(d3bonimascoreResponse::class);
                $oResponse->assign(
                    [
                        'response'  => $sResponse,
                    ]
                );
                $this->bonimaresponse =  $oResponse;
            }
        }

        return $this->_sThisTemplate;
    }

    public function save()
    {
        parent::save();

        $soxId = $this->getEditObjectId();

        $oUser = oxNew(User::class);
        $oUser->load($soxId);

        if ($this->_allowAdminEdit($soxId) && $oUser->getId()) {
            $aParams = Registry::getRequest()->getRequestEscapedParameter("editval");
            $oUser->assign($aParams);
            $oUser->save();
        }
    }

    /**
     * @return false|d3bonimascore
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws DatabaseErrorException
     * @throws StandardException
     */
    public function getBonimaScoreConfig()
    {
        if (false == $this->bonimaresponse) {
            return false;
        }

        $oBonimaScore = oxNew(d3bonimascore::class);
        $oQB = $oBonimaScore->d3BonimaScoreGetConfigSql($this->bonimaresponse);

        $ConfigId = DatabaseProvider::getDb()->getOne($oQB->getSQL(), $oQB->getParameters());

        $oBonimaScore->load($ConfigId);

        return $oBonimaScore;
    }

    /**
     * @return false|string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getBonimaResponseAddress()
    {
        if (false == $this->bonimaresponse) {
            return false;
        }

        return $this->bonimaresponse->getResponseData()->return->auskunft->module->adresskontrollModul->adresskontrollen->adresskontrolle->adresse;
    }

    /**
     * return string|false
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getBonimaResponsePerson()
    {
        if (false == $this->bonimaresponse) {
            return false;
        }

        return $this->bonimaresponse->getResponseData()->return->auskunft->module->auftragModul->eingabedaten->person;
    }

    /**
     * @return string|false
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getBonimaResponseValidationStatus()
    {
        if (false == $this->bonimaresponse) {
            return false;
        }

        return $this->bonimaresponse->getResponseData()->return->auskunft->module->adresskontrollModul->adresskontrollen->adresskontrolle->adressvalidierungsstatusGrob;
    }

    /**
     * @return string|false
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getBonimaResponsePersonIdentification()
    {
        if (false == $this->bonimaresponse) {
            return false;
        }

        return $this->bonimaresponse->getResponseData()->return->auskunft->module->identModul;
    }

    /**
     * @return array|null
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getBonimaResponseTaskDetails()
    {
        if (false == $this->bonimaresponse) {
            return null;
        }

        $aDetails['datum']            = $this->bonimaresponse->getResponseData()->return->auskunft->module->auftragModul->auftragErstellungsdatum;
        $aDetails['uhrzeit']          = $this->bonimaresponse->getResponseData()->return->auskunft->module->auftragModul->auftragErstellungsuhrzeit;
        $aDetails['auftragnummer']    = $this->bonimaresponse->getResponseData()->return->auskunft->module->auftragModul->auftragNummer;
        $aDetails['scores']           = $this->bonimaresponse->getResponseData()->return->auskunft->module->scoreModul->scores;

        return $aDetails;
    }

    /**
     * @return false|int
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getNextBonimaCheckDatetime()
    {
        if (false == $this->bonimaresponse) {
            return false;
        }

        $iValidPeriod = $this->d3GetSettings()->getLicenseConfigData(d3bonimascore_conf::SERIAL_BIT_PREMIUMEDITION, 1) && $this->d3GetSettings()->getValue('iD3BonimaScoreValidPeriod')
            ? $this->d3GetSettings()->getValue('iD3BonimaScoreValidPeriod')
            : 1;    // response ist 1 Tag gültig
        $aDetails = $this->getBonimaResponseTaskDetails();

        $sLastCheckDatetime = strtotime($aDetails['datum'] . " " . $aDetails['uhrzeit']);

        return strtotime("+$iValidPeriod day", $sLastCheckDatetime);
    }

    /**
     * @return d3_cfg_mod|false
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function d3GetSettings()
    {
        return d3_cfg_mod::get('d3bonimascore');
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
    public function hasPremiumOption()
    {
        return $this->d3GetSettings()->getLicenseConfigData(d3bonimascore_conf::SERIAL_BIT_PREMIUMEDITION, 1);
    }
}
