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
use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\d3database;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\DBALException;
use Exception;
use OxidEsales\Eshop\Application\Model\Payment;
use OxidEsales\Eshop\Application\Model\PaymentList;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Model\ListModel;
use OxidEsales\Eshop\Core\Registry;
use PDO;

class d3bonimascore_matrix_main extends d3_cfg_mod_main
{
    protected $_sThisTemplate = 'd3bonimascore_matrix_main.tpl';

    /**
     * @var ListModel $oPayments
     */
    protected $oPayments;

    /**
     * Wird ueber 'fnc' abgerufen.
     * Speichert Werte zum Objekt
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws Exception
     */
    public function save()
    {
        parent::save();

        $aConfig = Registry::getRequest()->getRequestEscapedParameter('config');

        foreach ($aConfig as $sConfigId => $aConfigData) {
            $aConfigData['d3bonimascore__shopid']      = Registry::getConfig()->getShopId();
            $aConfigData['d3bonimascore__payments']    = json_encode($aConfigData['payments']);

            $oConfig = oxNew(d3bonimascore::class);
            $oConfig->load($sConfigId);
            $oConfig->assign($aConfigData);
            $oConfig->save();
        }
    }

    /**
     * Liefert die zu konfigurierenden Optionen zurueck
     * @return ListModel
     * @throws DBALException
     */
    public function d3GetConfigOptions(): ListModel
    {
        $sShopId = Registry::getConfig()->getShopId();

        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('*')
            ->from(oxNew(d3bonimascore::class)->getViewName())
            ->where('shopid = '.$oQB->createNamedParameter($sShopId))
            ->addOrderBy('identreturncode', 'DESC')
            ->addOrderBy('scoreclass', 'ASC');

        /** @var ListModel $oList */
        $oList = oxNew(ListModel::class);
        $oList->init(d3bonimascore::class);
        $oList->selectString($oQB->getSQL(), $oQB->getParameters());

        return $oList;
    }

    /**
     * Liefert Liste der aktiven Zahlarten
     * @return PaymentList
     * @throws DBALException
     */
    public function d3GetPaymentList()
    {
        if ($this->oPayments === null) {
            $this->oPayments = $this->_d3GetPaymentList();
        }

        return $this->oPayments;
    }

    /**
     * Laedt Liste der aktiven Zahlungsarten aus dem Backend
     * @return PaymentList
     * @throws DBALException
     */
    protected function _d3GetPaymentList(): PaymentList
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('*')
            ->from(oxNew(Payment::class)->getViewName())
            ->where('oxactive = '.$oQB->createNamedParameter(1, PDO::PARAM_INT))
            ->orderBy('oxdesc');

        /** @var PaymentList $oList */
        $oList = oxNew(PaymentList::class);
        $oList->selectString($oQB->getSQL(), $oQB->getParameters());

        return $oList;
    }

    /**
     * @param $sPaymentId
     *
     * @return bool
     * @throws DBALException
     */
    public function isSafePayment($sPaymentId): bool
    {
        $oList = $this->d3GetPaymentList();
        $oPayment = $oList->offsetGet($sPaymentId);
        return $oPayment->getFieldData('d3bonimascoresafe');
    }
}
