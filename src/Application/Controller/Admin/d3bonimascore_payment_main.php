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

use Doctrine\DBAL\DBALException;
use Exception;
use OxidEsales\Eshop\Application\Model\Payment;
use OxidEsales\Eshop\Core\Registry;

class d3bonimascore_payment_main extends d3bonimascore_matrix_main
{
    protected $_sThisTemplate = 'd3bonimascore_payment_main.tpl';

    /**
     * Speichert sichere Zahlungsarten
     * @throws DBALException
     * @throws Exception
     */
    public function save()
    {
        $aPayments = Registry::getRequest()->getRequestEscapedParameter('safepayments');

        /** @var Payment $oPayment */
        foreach ($this->d3GetPaymentList() as $oPayment) {
            $oPayment->assign(
                [
                   'd3bonimascoresafe' => is_array($aPayments) ?
                       (in_array($oPayment->getId(), $aPayments)) ?
                           1 :
                           0
                       : 0,
                ]
            );
            $oPayment->save();
        }
    }
}
