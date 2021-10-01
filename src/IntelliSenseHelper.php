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

namespace D3\Bonimascore\Modules\Application\Controller
{
    class d3_payment_bonimascore_parent extends \OxidEsales\Eshop\Application\Controller\PaymentController {}

    class d3_user_bonimascore_parent extends \OxidEsales\Eshop\Application\Controller\UserController {}
}

namespace D3\Bonimascore\Modules\Application\Model
{
    class d3_oxuser_bonimascore_parent extends \OxidEsales\Eshop\Application\Model\User {}

    class d3_oxorder_bonimascore_parent extends \OxidEsales\Eshop\Application\Model\Order {}
}