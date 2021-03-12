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

use D3\Bonimascore\Application\Model\d3bonimascoreResponse;
use D3\Bonimascore\Core\d3bonimascore_conf;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\DBALException;
use Exception;
use OxidEsales\Eshop\Application\Controller\Admin\AdminController;
use OxidEsales\Eshop\Application\Model\Groups;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;

class d3bonimascore_usergroup extends AdminController
{
	/** @var d3bonimascoreResponse */
	public $bonimaresponse;
    /**
     * Current class template.
     *
     * @var string
     */
    protected $_sThisTemplate = 'd3bonimascore_usergroup.tpl';

	/**
     * @return string
     */
    public function render()
    {
        parent::render();

        $soxId = $this->_aViewData["oxid"] = $this->getEditObjectId();

        if ($soxId != "-1" && isset($soxId)) {
            $oGroups = oxNew( Groups::class);
            $oGroups->load($soxId);
            $this->_aViewData["edit"] = $oGroups;
        }

        return $this->_sThisTemplate;
    }

    /**
     * @throws Exception
     */
    public function save()
    {
        parent::save();

        $soxId = $this->getEditObjectId();

        $oGroups = oxNew(Groups::class);
        $oGroups->load($soxId);

        if ($this->_allowAdminEdit($soxId) && $oGroups->getId()) {
            $aParams = Registry::getRequest()->getRequestEscapedParameter("editval");
            $oGroups->assign($aParams);
            $oGroups->save();
        }
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
