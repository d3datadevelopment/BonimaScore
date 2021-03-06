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

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_licence;

class support extends d3_cfg_mod_licence
{
    protected $_sModId = 'd3bonimascore';

    protected $_hasLicence = true;

    protected $_hasNewsletterForm = false;

    protected $_hasUpdate = true;

    protected $_sLogType = 2;
    protected $_sDefaultHelpLinkAdd = 'Fragen-zu-speziellen-Modulen/';

}
