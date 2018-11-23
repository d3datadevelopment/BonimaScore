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

namespace D3\Bonimascore\setup;

use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ParameterNotFoundException;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Install\d3install_updatebase;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Application\Model\Shop;
use OxidEsales\Eshop\Core\Exception\ConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;

/**
 * Class d3_extsearch_update
 */
class d3bonimascore_update extends d3install_updatebase
{
    public $sModKey = 'd3bonimascore';
    public $sModName = 'BonimaScore';
    public $sModVersion = '3.0.0.0';
    public $sModRevision = '3000';
    public $sBaseConf = 'cc9v2==KzNtb0RwNkp5Z1dwTjFyazZpa3paZUh1MFg3ZmxSWlBCZ0hwL0NtUTJFWmNZSjJyS3ZUM3hwe
UFPNFNXM1Z2RmJmaUMwOTM2TTFLMlBoVUMxSmJtQzdJbDBmQkJ0OCttY281UVV1eUNvUWl5bnJ4VlBYS
Uh2dEZJZzM1TlZnS1FNcjJkRkNPdjJjRzlIaGpzNThNc2JYVklmb0pnV3JQUjFDOVFucXZ3WC9kZW1VQ
TBUcy90RDNHalJVWmFUMnQrREg4WHNpRlp0TERDaGNsNVZDV01FRnMzNndwcVl1SGlYU3IvU3hPTzV5M
2x1SGtOYWNrYlNqcHJMblhOWHRyVFFvbnc3dkRCNVZrbmZyZWY1dDJHVkFvOFJCeTV3dVFxeEJHM0wyd
jRHdUVpL2pjU2VSSGZBWEVhQWVWR2YzOGg0R2EvQTF0MldNbDQyODZISVA0WFNBPT0=';
    public $sRequirements = '';
    public $sBaseValue = 'TyUzQTglM0ElMjJzdGRDbGFzcyUyMiUzQTYlM0ElN0JzJTNBMzMlM0ElMjJkM19jZmdfbW9kX19zRDNCb25pbWFTY29yZUNvdW50cnklMjIlM0JzJTNBMjYlM0ElMjJhN2M0MGY2MzFmYzkyMDY4Ny4yMDE3OTk4NCUyMiUzQnMlM0EzMiUzQSUyMmQzX2NmZ19tb2RfX3NEM0JvbmltYVNjb3JlUHJvZElkJTIyJTNCcyUzQTAlM0ElMjIlMjIlM0JzJTNBMzklM0ElMjJkM19jZmdfbW9kX19zRDNCb25pbWFTY29yZVBvc3RDaGVja1RleHQlMjIlM0JzJTNBMzAlM0ElMjJEM19CT05JTUFTQ09SRV9QQVlDSEVDS19GQUlMRUQlMjIlM0JzJTNBMzAlM0ElMjJkM19jZmdfbW9kX19zRDNCb25pbWFTY29yZVVzZXIlMjIlM0JzJTNBMCUzQSUyMiUyMiUzQnMlM0EzMCUzQSUyMmQzX2NmZ19tb2RfX3NEM0JvbmltYVNjb3JlUGFzcyUyMiUzQnMlM0EwJTNBJTIyJTIyJTNCcyUzQTQzJTNBJTIyZDNfY2ZnX21vZF9fc0QzQm9uaW1hU2NvcmVMaW1pdEV4Y2VlZGVkVGV4dCUyMiUzQnMlM0EzNSUzQSUyMkQzX0JPTklNQVNDT1JFX0NSRURJVExJTUlUX0VYQ0VFREVEJTIyJTNCJTdE';

    public $sMinModCfgVersion = '5.1.1.3';

    protected $_aUpdateMethods = array(
        array('check' => 'checkModCfgItemExist',
              'do'    => 'updateModCfgItemExist'),
        array('check' => 'checkBonimaTableExist',
              'do'    => 'updateBonimaTableExist'),
        array('check' => 'checkBonimaResponseTableExist',
              'do'    => 'updateBonimaResponseTableExist'),
        array('check' => 'checkFields',
              'do'    => 'fixFields'),
        array('check' => 'checkIndizes',
              'do'    => 'fixIndizes'),
        array('check' => 'checkScoreItemsExist',
              'do'    => 'updateScoreItemsExist'),
        array('check' => 'hasUnregisteredFiles',
              'do'    => 'showUnregisteredFiles'),
        array('check' => 'checkModCfgSameRevision',
              'do'    => 'updateModCfgSameRevision'),
    );

    public $aFields = array(
        'oxpayments__d3bonimascoresafe'        => array(
            'sTableName'  => 'oxpayments',
            'sFieldName'  => 'd3bonimascoresafe',
            'sType'       => 'TINYINT(1) UNSIGNED',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'oxuser__d3bonimascoreapproval'        => array(
            'sTableName'  => 'oxuser',
            'sFieldName'  => 'd3bonimascoreapproval',
            'sType'       => 'INT(10) UNSIGNED',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'Boniversum Einwilligungsklausel',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'oxuser__d3bonimascorecreditlimit'        => array(
            'sTableName'  => 'oxuser',
            'sFieldName'  => 'd3bonimascorecreditlimit',
            'sType'       => 'double',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'Boniversum Kreditlimit',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'oxuser__d3bonimacheckthreshold'        => array(
            'sTableName'  => 'oxuser',
            'sFieldName'  => 'd3bonimacheckthreshold',
            'sType'       => 'INT(5)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'Boniversum Warenkorbwert fuer Pruefung',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'oxuser__d3bonimadontcheck'        => array(
            'sTableName'  => 'oxuser',
            'sFieldName'  => 'd3bonimadontcheck',
            'sType'       => 'INT(1)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'Boniversum keine Pruefung',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'oxgroups__d3bonimadontcheck'        => array(
            'sTableName'  => 'oxgroups',
            'sFieldName'  => 'd3bonimadontcheck',
            'sType'       => 'INT(1)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'Boniversum keine Pruefung',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascore__OXID'        => array(
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'OXID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascore__shopid'        => array(
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'shopid',
            'sType'       => 'CHAR(10)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascore__addressreturncode'        => array(
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'addressreturncode',
            'sType'       => "SET('0','1','2','3')",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascore__identreturncode'        => array(
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'identreturncode',
            'sType'       => "SET('0','1')",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascore__scoreconfigurable'        => array(
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'scoreconfigurable',
            'sType'       => "SET('0','1')",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascore__scoreclass'        => array(
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'scoreclass',
            'sType'       => "INT(5) UNSIGNED",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascore__scorefrom'        => array(
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'scorefrom',
            'sType'       => "INT(10) UNSIGNED",
            'blNull'      => false,
            'sDefault'    => 0,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascore__scoreto'        => array(
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'scoreto',
            'sType'       => "INT(10) UNSIGNED",
            'blNull'      => false,
            'sDefault'    => 0,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascore__negativeprobability'        => array(
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'negativeprobability',
            'sType'       => "DOUBLE UNSIGNED",
            'blNull'      => false,
            'sDefault'    => 0,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascore__payments'        => array(
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'payments',
            'sType'       => "TEXT",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascore__creditlimit'        => array(
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'creditlimit',
            'sType'       => "DOUBLE UNSIGNED",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascoreresponse__OXID'        => array(
            'sTableName'  => 'd3bonimascoreresponse',
            'sFieldName'  => 'OXID',
            'sType'       => "CHAR(32)",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascoreresponse__OXUSERID'        => array(
            'sTableName'  => 'd3bonimascoreresponse',
            'sFieldName'  => 'OXUSERID',
            'sType'       => "CHAR(32)",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascoreresponse__response'        => array(
            'sTableName'  => 'd3bonimascoreresponse',
            'sFieldName'  => 'response',
            'sType'       => "TEXT",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascoreresponse__date'        => array(
            'sTableName'  => 'd3bonimascoreresponse',
            'sFieldName'  => 'date',
            'sType'       => "DATETIME",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'd3bonimascoreresponse__d3requesthash'        => array(
            'sTableName'  => 'd3bonimascoreresponse',
            'sFieldName'  => 'd3requesthash',
            'sType'       => "VARCHAR(255)",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
    );

    public $aIndizes = array(
        'PRIMARY' => array(
            'sTableName' => 'd3bonimascore',
            'sType'      => 'PRIMARY',
            'sName'      => 'PRIMARY',
            'aFields'    => array(
                'OXID'   => 'OXID',
            ),
        ),
        'scorefrom' => array(
            'sTableName' => 'd3bonimascore',
            'sType'      => 'INDEX',
            'sName'      => 'scorefrom',
            'aFields'    => array(
                'scorefrom' => 'scorefrom',
            ),
        ),
        'scoreto' => array(
            'sTableName' => 'd3bonimascore',
            'sType'      => 'INDEX',
            'sName'      => 'scoreto',
            'aFields'    => array(
                'scoreto' => 'scoreto',
            ),
        ),
        'shopid' => array(
            'sTableName' => 'd3bonimascore',
            'sType'      => 'INDEX',
            'sName'      => 'shopid',
            'aFields'    => array(
                'shopid' => 'shopid',
            ),
        ),
        'addressreturncode' => array(
            'sTableName' => 'd3bonimascore',
            'sType'      => 'INDEX',
            'sName'      => 'addressreturncode',
            'aFields'    => array(
                'addressreturncode' => 'addressreturncode',
            ),
        ),
        'identreturncode' => array(
            'sTableName' => 'd3bonimascore',
            'sType'      => 'INDEX',
            'sName'      => 'identreturncode',
            'aFields'    => array(
                'identreturncode' => 'identreturncode',
            ),
        ),
        'scoreclass' => array(
            'sTableName' => 'd3bonimascore',
            'sType'      => 'INDEX',
            'sName'      => 'scoreclass',
            'aFields'    => array(
                'scoreclass' => 'scoreclass',
            ),
        ),
        'response__PRIMARY' => array(
            'sTableName' => 'd3bonimascoreresponse',
            'sType'      => 'PRIMARY',
            'sName'      => 'PRIMARY',
            'aFields'    => array(
                'OXID'   => 'OXID',
            ),
        ),
    );

    protected $aScoreConfigs = array(
        array( // row #0
               'd3bonimascore__oxid' => 'valid0',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 0,
               'd3bonimascore__scorefrom' => 0,
               'd3bonimascore__scoreto' => 0,
               'd3bonimascore__negativeprobability' => 0,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 1000,
        ),
        array( // row #1
               'd3bonimascore__oxid' => 'valid1',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 1,
               'd3bonimascore__scorefrom' => 1079,
               'd3bonimascore__scoreto' => 994,
               'd3bonimascore__negativeprobability' => 1.33,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 2000,
        ),
        array( // row #2
               'd3bonimascore__oxid' => 'valid2',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 2,
               'd3bonimascore__scorefrom' => 993,
               'd3bonimascore__scoreto' => 979,
               'd3bonimascore__negativeprobability' => 2.26,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 2000,
        ),
        array( // row #3
               'd3bonimascore__oxid' => 'valid3',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 3,
               'd3bonimascore__scorefrom' => 978,
               'd3bonimascore__scoreto' => 966,
               'd3bonimascore__negativeprobability' => 3.33,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 2000,
        ),
        array( // row #4
               'd3bonimascore__oxid' => 'valid4',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 4,
               'd3bonimascore__scorefrom' => 965,
               'd3bonimascore__scoreto' => 954,
               'd3bonimascore__negativeprobability' => 3.02,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 2000,
        ),
        array( // row #5
               'd3bonimascore__oxid' => 'valid5',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 5,
               'd3bonimascore__scorefrom' => 953,
               'd3bonimascore__scoreto' => 942,
               'd3bonimascore__negativeprobability' => 3.8,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 1500,
        ),
        array( // row #6
               'd3bonimascore__oxid' => 'valid6',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 6,
               'd3bonimascore__scorefrom' => 941,
               'd3bonimascore__scoreto' => 926,
               'd3bonimascore__negativeprobability' => 5.24,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 1500,
        ),
        array( // row #7
               'd3bonimascore__oxid' => 'valid7',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 7,
               'd3bonimascore__scorefrom' => 925,
               'd3bonimascore__scoreto' => 904,
               'd3bonimascore__negativeprobability' => 9.4,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 1000,
        ),
        array( // row #8
               'd3bonimascore__oxid' => 'valid8',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 8,
               'd3bonimascore__scorefrom' => 903,
               'd3bonimascore__scoreto' => 862,
               'd3bonimascore__negativeprobability' => 10.31,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 1000,
        ),
        array( // row #9
               'd3bonimascore__oxid' => 'valid9',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 9,
               'd3bonimascore__scorefrom' => 861,
               'd3bonimascore__scoreto' => 563,
               'd3bonimascore__negativeprobability' => 19.59,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 500,
        ),
        array( // row #10
               'd3bonimascore__oxid' => 'valid9900',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '0',
               'd3bonimascore__scoreclass' => 99000,
               'd3bonimascore__scorefrom' => 0,
               'd3bonimascore__scoreto' => 0,
               'd3bonimascore__negativeprobability' => 0,
               'd3bonimascore__payments' => '["oxidcreditcard","oxidcashondel","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ),
        array( // row #11
               'd3bonimascore__oxid' => 'valid9800',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '0',
               'd3bonimascore__scoreclass' => 98000,
               'd3bonimascore__scorefrom' => 0,
               'd3bonimascore__scoreto' => 0,
               'd3bonimascore__negativeprobability' => 0,
               'd3bonimascore__payments' => '["oxidcreditcard","oxidcashondel","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ),
        array( // row #12
               'd3bonimascore__oxid' => 'valid9700',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '0',
               'd3bonimascore__scoreclass' => 97000,
               'd3bonimascore__scorefrom' => 0,
               'd3bonimascore__scoreto' => 0,
               'd3bonimascore__negativeprobability' => 0,
               'd3bonimascore__payments' => '["oxidcreditcard","oxidcashondel","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ),
        array( // row #13
               'd3bonimascore__oxid' => 'valid9600',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '0',
               'd3bonimascore__scoreclass' => 96000,
               'd3bonimascore__scorefrom' => 0,
               'd3bonimascore__scoreto' => 0,
               'd3bonimascore__negativeprobability' => 0,
               'd3bonimascore__payments' => '["oxidcreditcard","oxidcashondel","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ),
        array( // row #14
               'd3bonimascore__oxid' => 'valid9500',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '0',
               'd3bonimascore__scoreclass' => 95000,
               'd3bonimascore__scorefrom' => 0,
               'd3bonimascore__scoreto' => 0,
               'd3bonimascore__negativeprobability' => 0,
               'd3bonimascore__payments' => '["oxidcreditcard","oxidcashondel","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ),
        array( // row #15
               'd3bonimascore__oxid' => 'valid9400',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '0',
               'd3bonimascore__scoreclass' => 94000,
               'd3bonimascore__scorefrom' => 0,
               'd3bonimascore__scoreto' => 0,
               'd3bonimascore__negativeprobability' => 0,
               'd3bonimascore__payments' => '["oxidcreditcard","oxidcashondel","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ),
        array( // row #16
               'd3bonimascore__oxid' => 'valid9300',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '1',
               'd3bonimascore__scoreconfigurable' => '0',
               'd3bonimascore__scoreclass' => 93000,
               'd3bonimascore__scorefrom' => 0,
               'd3bonimascore__scoreto' => 0,
               'd3bonimascore__negativeprobability' => 0,
               'd3bonimascore__payments' => '["oxidcreditcard","oxidcashondel","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ),
        array( // row #17
               'd3bonimascore__oxid' => 'validunc0',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '0',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 0,
               'd3bonimascore__scorefrom' => 0,
               'd3bonimascore__scoreto' => 0,
               'd3bonimascore__negativeprobability' => 0,
               'd3bonimascore__payments' => '["oxidcreditcard","oxidcashondel","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ),
        array( // row #18
               'd3bonimascore__oxid' => 'validunc1',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '0',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 1,
               'd3bonimascore__scorefrom' => 1079,
               'd3bonimascore__scoreto' => 994,
               'd3bonimascore__negativeprobability' => 1.33,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 1500,
        ),
        array( // row #19
               'd3bonimascore__oxid' => 'validunc2',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '0',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 2,
               'd3bonimascore__scorefrom' => 993,
               'd3bonimascore__scoreto' => 979,
               'd3bonimascore__negativeprobability' => 2.26,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 1500,
        ),
        array( // row #20
               'd3bonimascore__oxid' => 'validunc3',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '0',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 3,
               'd3bonimascore__scorefrom' => 978,
               'd3bonimascore__scoreto' => 966,
               'd3bonimascore__negativeprobability' => 3.33,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 1500,
        ),
        array( // row #21
               'd3bonimascore__oxid' => 'validunc4',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '0',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 4,
               'd3bonimascore__scorefrom' => 965,
               'd3bonimascore__scoreto' => 954,
               'd3bonimascore__negativeprobability' => 3.02,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 1000,
        ),
        array( // row #22
               'd3bonimascore__oxid' => 'validunc5',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '0',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 5,
               'd3bonimascore__scorefrom' => 953,
               'd3bonimascore__scoreto' => 942,
               'd3bonimascore__negativeprobability' => 3.8,
               'd3bonimascore__payments' => '["oxiddebitnote","oxidcreditcard","oxidcashondel","oxidinvoice","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 1000,
        ),
        array( // row #23
               'd3bonimascore__oxid' => 'validunc6',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '0',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 6,
               'd3bonimascore__scorefrom' => 941,
               'd3bonimascore__scoreto' => 926,
               'd3bonimascore__negativeprobability' => 5.24,
               'd3bonimascore__payments' => '["oxidcreditcard","oxidcashondel","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ),
        array( // row #24
               'd3bonimascore__oxid' => 'validunc7',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '0',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 7,
               'd3bonimascore__scorefrom' => 952,
               'd3bonimascore__scoreto' => 904,
               'd3bonimascore__negativeprobability' => 9.4,
               'd3bonimascore__payments' => '["oxidcreditcard","oxidcashondel","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ),
        array( // row #25
               'd3bonimascore__oxid' => 'validunc8',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '0',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 8,
               'd3bonimascore__scorefrom' => 903,
               'd3bonimascore__scoreto' => 862,
               'd3bonimascore__negativeprobability' => 10.31,
               'd3bonimascore__payments' => '["oxidcreditcard","oxidcashondel","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ),
        array( // row #26
               'd3bonimascore__oxid' => 'validunc9',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '0',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 9,
               'd3bonimascore__scorefrom' => 861,
               'd3bonimascore__scoreto' => 563,
               'd3bonimascore__negativeprobability' => 19.59,
               'd3bonimascore__payments' => '["oxidcreditcard","oxidcashondel","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ),
        array( // row #27
               'd3bonimascore__oxid' => 'invalid10',
               'd3bonimascore__addressreturncode' => '0,3',
               'd3bonimascore__identreturncode' => '0,1',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 10,
               'd3bonimascore__scorefrom' => 0,
               'd3bonimascore__scoreto' => 10000,
               'd3bonimascore__negativeprobability' => 0,
               'd3bonimascore__payments' => '["oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ),
    );

    protected $_aRefreshMetaModuleIds = array('d3bonimascore');

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkBonimaTableExist()
    {
        return $this->_checkTableNotExist('d3bonimascore');
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws ConnectionException
     */
    public function updateBonimaTableExist()
    {
        $blRet = false;
        if ($this->checkBonimaTableExist()) {
            $blRet  = $this->_addTable2('d3bonimascore', $this->aFields, $this->aIndizes, '', 'InnoDB');
        }

        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkBonimaResponseTableExist()
    {
        return $this->_checkTableNotExist('d3bonimascoreresponse');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateBonimaResponseTableExist()
    {
        $blRet = false;
        if ($this->checkBonimaResponseTableExist()) {
            $blRet  = $this->_addTable2('d3bonimascoreresponse', $this->aFields, $this->aIndizes, '', 'InnoDB');
        }

        return $blRet;
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkScoreItemsExist()
    {
        $blRet = false;

        foreach ($this->getShopListByActiveModule('d3bonimascore') as $oShop) {
            foreach ($this->aScoreConfigs as $aConfig) {
                /** @var $oShop Shop */
                $aWhere = array(
                    'OXID' => md5($aConfig['d3bonimascore__oxid']." " . $oShop->getId()),
                    'shopid' => $oShop->getId(),
                );
                $blRet = $this->_checkTableItemNotExist('d3bonimascore', $aWhere);

                if ($blRet) {
                    return $blRet;
                }
            }
        }

        return $blRet;
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateScoreItemsExist()
    {
        $blRet = false;

        foreach ($this->getShopListByActiveModule('d3bonimascore') as $oShop) {
            foreach ($this->aScoreConfigs as $aConfig) {
                /** @var $oShop Shop */
                $aWhere = array(
                    'OXID'   => md5( $aConfig['d3bonimascore__oxid']." " . $oShop->getId() ),
                    'shopid' => $oShop->getId(),
                );

                if ($this->_checkTableItemNotExist('d3bonimascore', $aWhere)) {
                    $aWhere        = array();
                    $aInsertFields = array(
                        array(
                            'fieldname'    => 'OXID',
                            'content'      => "md5('".$aConfig['d3bonimascore__oxid']." " . $oShop->getId() . "')",
                            'force_update' => true,
                            'use_quote'    => false,
                        ),
                        array(
                            'fieldname'    => 'shopid',
                            'content'      => $oShop->getId(),
                            'force_update' => true,
                            'use_quote'    => true,
                        ),
                        array(
                            'fieldname'    => 'addressreturncode',
                            'content'      => $aConfig['d3bonimascore__addressreturncode'],
                            'force_update' => true,
                            'use_quote'    => true,
                        ),
                        array(
                            'fieldname'    => 'identreturncode',
                            'content'      => $aConfig['d3bonimascore__identreturncode'],
                            'force_update' => true,
                            'use_quote'    => true,
                        ),
                        array(
                            'fieldname'    => 'scoreconfigurable',
                            'content'      => $aConfig['d3bonimascore__scoreconfigurable'],
                            'force_update' => true,
                            'use_quote'    => true,
                        ),
                        array(
                            'fieldname'    => 'scoreclass',
                            'content'      => $aConfig['d3bonimascore__scoreclass'],
                            'force_update' => true,
                            'use_quote'    => false,
                        ),
                        array(
                            'fieldname'    => 'scorefrom',
                            'content'      => $aConfig['d3bonimascore__scorefrom'],
                            'force_update' => true,
                            'use_quote'    => false,
                        ),
                        array(
                            'fieldname'    => 'scoreto',
                            'content'      => $aConfig['d3bonimascore__scoreto'],
                            'force_update' => true,
                            'use_quote'    => false,
                        ),
                        array(
                            'fieldname'    => 'negativeprobability',
                            'content'      => $aConfig['d3bonimascore__negativeprobability'],
                            'force_update' => true,
                            'use_quote'    => false,
                        ),
                        array(
                            'fieldname'    => 'payments',
                            'content'      => $aConfig['d3bonimascore__payments'],
                            'force_update' => true,
                            'use_quote'    => true,
                        ),
                        array(
                            'fieldname'    => 'creditlimit',
                            'content'      => $aConfig['d3bonimascore__creditlimit'],
                            'force_update' => true,
                            'use_quote'    => false,
                        ),
                    );

                    $this->setInitialExecMethod( __METHOD__ );
                    $blRet = $this->_updateTableItem2('d3bonimascore', $aInsertFields, $aWhere);
                }
            }
        }

        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ParameterNotFoundException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function hasUnregisteredFiles()
    {
        return $this->_hasUnregisteredFiles('d3bonimascore', array('blocks', 'd3FileRegister'));
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
    public function showUnregisteredFiles()
    {
        return $this->_showUnregisteredFiles('d3bonimascore', array('blocks', 'd3FileRegister'));
    }
}
