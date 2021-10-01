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

use D3\Bonimascore\Modules\Application\Controller\d3_payment_bonimascore;
use D3\Bonimascore\Modules\Application\Controller\d3_user_bonimascore;
use D3\Bonimascore\Modules\Application\Model\d3_oxorder_bonimascore;
use D3\Bonimascore\Modules\Application\Model\d3_oxuser_bonimascore;
use OxidEsales\Eshop\Application\Controller as OxidController;
use OxidEsales\Eshop\Application\Model as OxidModel;
use D3\Bonimascore\Application\Controller\Admin as ModuleControllerAdmin;

$sMetadataVersion = '2.1';
$sLogo = '<img src="https://logos.oxidmodule.com/d3logo.svg" alt="(D3)" style="height:1em;width:1em"> ';

$aModule = [
    'id'           => 'd3bonimascore',
    'title'        => $sLogo . 'BonimaScore',
    'description'  => [
        'de' => 'Dieses Modul bindet BonimaScoreIdent im Checkout ein.',
        'en' => '',
    ],
    'version'      => '4.0.0.0',
    'author'       => 'D&sup3; Data Development (Inh.: Thomas Dartsch)',
    'email'        => 'support@shopmodule.com',
    'url'          => 'http://www.oxidmodule.com/',
    'events'       => [
        'onActivate'    => '\D3\Bonimascore\setup\Events::onActivate',
        'onDeactivate'  => '\D3\Bonimascore\setup\Events::onDeactivate',
    ],
    'extend'       => [
        OxidModel\User::class => d3_oxuser_bonimascore::class,
        OxidModel\Order::class => d3_oxorder_bonimascore::class,
        OxidController\PaymentController::class => d3_payment_bonimascore::class,
        OxidController\UserController::class => d3_user_bonimascore::class
    ],
    'controllers'        => [
        'd3bonimascore_matrix_frame'        => ModuleControllerAdmin\d3bonimascore_matrix_frame::class,
        'd3bonimascore_matrix_list'         => ModuleControllerAdmin\d3bonimascore_matrix_list::class,
        'd3bonimascore_matrix_main'         => ModuleControllerAdmin\d3bonimascore_matrix_main::class,
        'd3bonimascore_config_frame'        => ModuleControllerAdmin\d3bonimascore_config_frame::class,
        'd3bonimascore_config_list'         => ModuleControllerAdmin\d3bonimascore_config_list::class,
        'd3bonimascore_config_main'         => ModuleControllerAdmin\d3bonimascore_config_main::class,
        'd3bonimascore_payment_frame'       => ModuleControllerAdmin\d3bonimascore_payment_frame::class,
        'd3bonimascore_payment_list'        => ModuleControllerAdmin\d3bonimascore_payment_list::class,
        'd3bonimascore_payment_main'        => ModuleControllerAdmin\d3bonimascore_payment_main::class,
        'd3bonimascore_user'                => ModuleControllerAdmin\d3bonimascore_user::class,
        'd3bonimascore_usergroup'           => ModuleControllerAdmin\d3bonimascore_usergroup::class,
        'd3bonimascorelog_list'             => ModuleControllerAdmin\d3bonimascorelog_list::class,
        'd3bonimascorelog'                  => ModuleControllerAdmin\d3bonimascorelog::class,
        'd3bonimascore_support'             => ModuleControllerAdmin\support::class,
    ],
    'settings'     => [],
    'blocks'      => [
        [
            'template'  => 'page/checkout/inc/payment_other.tpl',
            'block'     => 'checkout_payment_longdesc',
            'file'      => 'Application/views/blocks/page/checkout/inc/checkout_payment_longdesc.tpl',
        ],
        [
            'template'  => 'page/checkout/inc/payment_oxidcashondel.tpl',
            'block'     => 'checkout_payment_longdesc',
            'file'      => 'Application/views/blocks/page/checkout/inc/checkout_payment_longdesc.tpl',
        ],
        [
            'template'  => 'page/checkout/inc/payment_oxidcreditcard.tpl',
            'block'     => 'checkout_payment_longdesc',
            'file'      => 'Application/views/blocks/page/checkout/inc/checkout_payment_longdesc.tpl',
        ],
        [
            'template'  => 'page/checkout/inc/payment_oxiddebitnote.tpl',
            'block'     => 'checkout_payment_longdesc',
            'file'      => 'Application/views/blocks/page/checkout/inc/checkout_payment_longdesc.tpl',
        ]
    ],
    'templates'    => [
        'd3bonimascore_frame.tpl'        => 'd3/bonimascore/Application/views/admin/frame.tpl',
        'd3bonimascore_list.tpl'         => 'd3/bonimascore/Application/views/admin/list.tpl',
        'd3bonimascore_config_main.tpl'  => 'd3/bonimascore/Application/views/admin/config_main.tpl',
        'd3bonimascore_matrix_main.tpl'  => 'd3/bonimascore/Application/views/admin/matrix_main.tpl',
        'd3bonimascore_payment_main.tpl' => 'd3/bonimascore/Application/views/admin/payment_main.tpl',
        'main.payment_box.inc.tpl'       => 'd3/bonimascore/Application/views/admin/main.payment_box.inc.tpl',
        'd3bonimascore_user.tpl'         => 'd3/bonimascore/Application/views/admin/d3bonimascore_user.tpl',
        'd3bonimascore_usergroup.tpl'    => 'd3/bonimascore/Application/views/admin/d3bonimascore_usergroup.tpl',

        'd3_bonimascore_mandatory_oxuser__oxsal.tpl'       => 'd3/bonimascore/Application/views/tpl/mandatoryfields/d3_bonimascore_mandatory_oxsal.tpl',
        'd3_bonimascore_mandatory_oxuser__oxlname.tpl'     => 'd3/bonimascore/Application/views/tpl/mandatoryfields/d3_bonimascore_mandatory_oxlname.tpl',
        'd3_bonimascore_mandatory_oxuser__oxfname.tpl'     => 'd3/bonimascore/Application/views/tpl/mandatoryfields/d3_bonimascore_mandatory_oxfname.tpl',
        'd3_bonimascore_mandatory_oxuser__oxstreet.tpl'    => 'd3/bonimascore/Application/views/tpl/mandatoryfields/d3_bonimascore_mandatory_oxstreet.tpl',
        'd3_bonimascore_mandatory_oxuser__oxzip.tpl'       => 'd3/bonimascore/Application/views/tpl/mandatoryfields/d3_bonimascore_mandatory_oxzip.tpl',
        'd3_bonimascore_mandatory_oxuser__oxbirthdate.tpl' => 'd3/bonimascore/Application/views/tpl/mandatoryfields/d3_bonimascore_mandatory_oxbirthdate.tpl',
    ]
];