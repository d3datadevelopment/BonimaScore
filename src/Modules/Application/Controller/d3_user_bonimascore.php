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

namespace D3\Bonimascore\Modules\Application\Controller;

use OxidEsales\Eshop\Core\Registry;

class d3_user_bonimascore extends d3_user_bonimascore_parent
{
    /**
     * Returns array of fields which must be filled during registration
     *
     * @return array | bool
     */
    public function getMustFillFields()
    {
        $aMustFillFields = parent::getMustFillFields();
        $aMustFillFieldsLower = array_map('strtolower', array_keys($aMustFillFields));

        $mandatoryFields = Registry::getSession()->getVariable('d3BonimaScoreRequiredFields');

        if ($mandatoryFields) {
            foreach ($mandatoryFields as $field) {
                if (false === in_array($field, $aMustFillFieldsLower)) {
                    $aMustFillFields[$field] = true;
                }
            }
        }

        return $aMustFillFields;
    }
}