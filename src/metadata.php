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

use D3\ModCfg\Application\Model\d3utils;
use OxidEsales\Eshop\Application\Controller as OxidController;
use OxidEsales\Eshop\Application\Model as OxidModel;

$sMetadataVersion = '2.0';
$aModule = array(
    'id'           => 'd3bonimascore',
    'title'        => (class_exists(d3utils::class) ? d3utils::getInstance()->getD3Logo() : 'D&sup3;') . ' BonimaScore',
    'description'  => array(
        'de' => 'Dieses Modul bindet BonimaScoreIdent im Checkout ein.',
        'en' => '',
    ),
    'version'      => '3.0.2.0',
    'author'       => 'D&sup3; Data Development (Inh.: Thomas Dartsch)',
    'email'        => 'support@shopmodule.com',
    'url'          => 'http://www.oxidmodule.com/',
    'events'       => array(
        'onActivate'    => '\D3\Bonimascore\setup\Events::onActivate',
        'onDeactivate'  => '\D3\Bonimascore\setup\Events::onDeactivate',
    ),
    'extend'       => array(
        OxidModel\User::class => \D3\Bonimascore\Modules\Application\Model\d3_oxuser_bonimascore::class,
        OxidModel\Order::class => \D3\Bonimascore\Modules\Application\Model\d3_oxorder_bonimascore::class,
        OxidController\PaymentController::class => \D3\Bonimascore\Modules\Application\Controller\d3_payment_bonimascore::class,
        OxidController\UserController::class => \D3\Bonimascore\Modules\Application\Controller\d3_user_bonimascore::class
    ),
    'controllers'        => array(
        'd3bonimascore_matrix_frame'        => \D3\Bonimascore\Application\Controller\Admin\d3bonimascore_matrix_frame::class,
        'd3bonimascore_matrix_list'         => \D3\Bonimascore\Application\Controller\Admin\d3bonimascore_matrix_list::class,
        'd3bonimascore_matrix_main'         => \D3\Bonimascore\Application\Controller\Admin\d3bonimascore_matrix_main::class,
        'd3bonimascore_config_frame'        => \D3\Bonimascore\Application\Controller\Admin\d3bonimascore_config_frame::class,
        'd3bonimascore_config_list'         => \D3\Bonimascore\Application\Controller\Admin\d3bonimascore_config_list::class,
        'd3bonimascore_config_main'         => \D3\Bonimascore\Application\Controller\Admin\d3bonimascore_config_main::class,
        'd3bonimascore_payment_frame'       => \D3\Bonimascore\Application\Controller\Admin\d3bonimascore_payment_frame::class,
        'd3bonimascore_payment_list'        => \D3\Bonimascore\Application\Controller\Admin\d3bonimascore_payment_list::class,
        'd3bonimascore_payment_main'        => \D3\Bonimascore\Application\Controller\Admin\d3bonimascore_payment_main::class,
        'd3bonimascore_user'                => \D3\Bonimascore\Application\Controller\Admin\d3bonimascore_user::class,
        'd3bonimascore_usergroup'           => \D3\Bonimascore\Application\Controller\Admin\d3bonimascore_usergroup::class,
        'd3bonimascorelog_list'             => \D3\Bonimascore\Application\Controller\Admin\d3bonimascorelog_list::class,
        'd3bonimascorelog'                  => \D3\Bonimascore\Application\Controller\Admin\d3bonimascorelog::class,
        'd3bonimascore_support'             => \D3\Bonimascore\Application\Controller\Admin\support::class,
    ),
    'settings'     => array(),
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
    'templates'    => array(
        'd3bonimascore_frame.tpl'           => 'd3/bonimascore/Application/views/admin/frame.tpl',
        'd3bonimascore_list.tpl'            => 'd3/bonimascore/Application/views/admin/list.tpl',
        'd3bonimascore_config_main.tpl'     => 'd3/bonimascore/Application/views/admin/config_main.tpl',
        'd3bonimascore_matrix_main.tpl'     => 'd3/bonimascore/Application/views/admin/matrix_main.tpl',
        'd3bonimascore_payment_main.tpl'    => 'd3/bonimascore/Application/views/admin/payment_main.tpl',
        'main.payment_box.inc.tpl'          => 'd3/bonimascore/Application/views/admin/main.payment_box.inc.tpl',
        'd3bonimascore_user.tpl'            => 'd3/bonimascore/Application/views/admin/d3bonimascore_user.tpl',
        'd3bonimascore_usergroup.tpl'       => 'd3/bonimascore/Application/views/admin/d3bonimascore_usergroup.tpl',
    )
);