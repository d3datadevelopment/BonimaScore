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

use D3\Bonimascore\Core\d3bonimascore_conf;
use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\d3database;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Application\Model\Country;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Model\ListModel;
use OxidEsales\Eshop\Core\Registry;
use PDO;

class d3bonimascore_config_main extends d3_cfg_mod_main
{
    protected $_sModId = 'd3bonimascore';

    protected $_sBoniversumDebugHelpTextIdent = 'D3_BONIMASCORE_ADMIN_DEBUGACTIVE_DESC';

    protected $_sThisTemplate = 'd3bonimascore_config_main.tpl';

    /**
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     */
    public function save()
    {
        parent::save();

        $aData = Registry::getRequest()->getRequestEscapedParameter('oxconfig');
        if (is_array($aData) && count($aData)) {
            foreach ($aData as $sName => $sValue) {
                Registry::getConfig()->saveShopConfVar('str', $sName, $sValue);
            }
        }

        foreach (Registry::getRequest()->getRequestEscapedParameter('config') as $key => $value) {
            $this->d3GetSettings()->setValue($key, $value);
        }
        $this->d3GetSettings()->save();
    }

    /**
     * @return d3_cfg_mod|false
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function d3GetSettings()
    {
        return d3_cfg_mod::get($this->d3getModId());
    }

    /**
     * Gibt Liste aktiver Laender zurueck
     * @return ListModel
     * @throws DBALException
     */
    public function d3GetCountryList(): ListModel
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('*')
            ->from(oxNew(Country::class)->getViewName())
            ->where('oxactive='.$oQB->createNamedParameter(1, PDO::PARAM_INT));

        /** @var ListModel $oList */
        $oList = oxNew(ListModel::class);
        $oList->init(Country::class);
        $oList->selectString($oQB->getSQL(), $oQB->getParameters());

        return $oList;
    }

    public function getHasDebugSwitch(): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function getDebugHelpTextIdent(): string
    {
        return $this->_sBoniversumDebugHelpTextIdent;
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
    public function hasPremiumOption(): bool
    {
        return $this->d3GetSettings()->getLicenseConfigData(d3bonimascore_conf::SERIAL_BIT_PREMIUMEDITION, 1);
    }
}
