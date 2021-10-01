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

use OxidEsales\Eshop\Application\Controller\Admin\AdminListController;

class d3bonimascore_matrix_list extends AdminListController
{
    /**
     * Forces main frame update is set TRUE
     * @var boolean
     */
    protected $_blUpdateMain = true;

    /**
     * Default SQL sorting parameter (default null).
     * @var string
     */
    protected $_sDefSortField = '';

    /**
     * Name of chosen object class (default null).
     * @var string
     */
    protected $_sListClass = '';

    /**
     * Template-Pfad
     * @var string
     */
    protected $_sThisTemplate = 'd3bonimascore_list.tpl';

}