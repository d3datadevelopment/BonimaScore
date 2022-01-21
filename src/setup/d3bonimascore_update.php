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

use D3\Bonimascore\Application\Model\d3bonimascore;
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
use OxidEsales\EshopCommunity\Core\DatabaseProvider;

/**
 * Class d3_extsearch_update
 */
class d3bonimascore_update extends d3install_updatebase
{
    public $sModKey = 'd3bonimascore';
    public $sModName = 'BonimaScore';
    public $sModVersion = '4.0.1.0';
    public $sModRevision = '4010';
    public $sBaseConf = 'AHDv2==UmEwOEI3Y29WTlpBZWlCdTRnYWtvN2Nxd1NGaHpzS1ZoWWlRbWY1aVZQTFZKZk1adHA1c2hub
WJudDVpYjRPNDl0MnR1R29VbE5LSmQvSFE2VTljenA3VXZRN2pRUUtOV1NsMHlUN1FVanExQTVWZ3l6W
HB2S1pCTkwwc3RQSW5iWTVHZFpJVktFTDRCb2oyaDB6REkrcFFKK0kxcXB5eUY3OGFaR0hOdC92TmVvc
G9JTTQySEp1ZHpHYWR3QktmQnFzT2FBaGMzU0lWelNLa3VLemZDU0NBZTJpeG9LT0M1NnRDS0NpUHNnb
XpQQjVGUFZzSVY5aUlsQUVIU0hFZ1dqVnZQYm9mUHd4OVQ2RXoyUk5VZDRqTGVHZFYvSU4yREVqa0s2T
UNZMHhpWkdOTWR2aHkyejRqTWVTYVdkc2h1cllvWVNZNG90eUhkV0FTa3dMWnZnPT0=';
    public $sRequirements = '';
    public $sBaseValue = 'TyUzQTglM0ElMjJzdGRDbGFzcyUyMiUzQTYlM0ElN0JzJTNBMzMlM0ElMjJkM19jZmdfbW9kX19zRDNCb25pbWFTY29yZUNvdW50cnklMjIlM0JzJTNBMjYlM0ElMjJhN2M0MGY2MzFmYzkyMDY4Ny4yMDE3OTk4NCUyMiUzQnMlM0EzMiUzQSUyMmQzX2NmZ19tb2RfX3NEM0JvbmltYVNjb3JlUHJvZElkJTIyJTNCcyUzQTAlM0ElMjIlMjIlM0JzJTNBMzklM0ElMjJkM19jZmdfbW9kX19zRDNCb25pbWFTY29yZVBvc3RDaGVja1RleHQlMjIlM0JzJTNBMzAlM0ElMjJEM19CT05JTUFTQ09SRV9QQVlDSEVDS19GQUlMRUQlMjIlM0JzJTNBMzAlM0ElMjJkM19jZmdfbW9kX19zRDNCb25pbWFTY29yZVVzZXIlMjIlM0JzJTNBMCUzQSUyMiUyMiUzQnMlM0EzMCUzQSUyMmQzX2NmZ19tb2RfX3NEM0JvbmltYVNjb3JlUGFzcyUyMiUzQnMlM0EwJTNBJTIyJTIyJTNCcyUzQTQzJTNBJTIyZDNfY2ZnX21vZF9fc0QzQm9uaW1hU2NvcmVMaW1pdEV4Y2VlZGVkVGV4dCUyMiUzQnMlM0EzNSUzQSUyMkQzX0JPTklNQVNDT1JFX0NSRURJVExJTUlUX0VYQ0VFREVEJTIyJTNCJTdE';

    public $sMinModCfgVersion = '6.0.0.0';

    protected $_aUpdateMethods = [
        ['check' => 'checkModCfgItemExist',
              'do'    => 'updateModCfgItemExist', ],
        ['check' => 'checkBonimaTableExist',
              'do'    => 'updateBonimaTableExist', ],
        ['check' => 'checkBonimaResponseTableExist',
              'do'    => 'updateBonimaResponseTableExist', ],
        ['check' => 'checkFields',
              'do'    => 'fixFields', ],
        ['check' => 'checkIndizes',
              'do'    => 'fixIndizes', ],
        ['check' => 'checkScoreItemsExist',
              'do'    => 'updateScoreItemsExist', ],
        ['check' => 'checkValidunc7FromValue',
              'do'    => 'updateValidunc7FromValue', ],
        ['check' => 'checkInvalid10Values',
              'do'    => 'updateInvalid10Values', ],
        ['check' => 'hasUnregisteredFiles',
              'do'    => 'showUnregisteredFiles', ],
        ['check' => 'checkModCfgSameRevision',
              'do'    => 'updateModCfgSameRevision', ],
    ];

    public $aFields = [
        'oxpayments__d3bonimascoresafe'        => [
            'sTableName'  => 'oxpayments',
            'sFieldName'  => 'd3bonimascoresafe',
            'sType'       => 'TINYINT(1) UNSIGNED',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'oxuser__d3bonimascoreapproval'        => [
            'sTableName'  => 'oxuser',
            'sFieldName'  => 'd3bonimascoreapproval',
            'sType'       => 'INT(10) UNSIGNED',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'Boniversum Einwilligungsklausel',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'oxuser__d3bonimascorecreditlimit'        => [
            'sTableName'  => 'oxuser',
            'sFieldName'  => 'd3bonimascorecreditlimit',
            'sType'       => 'double',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'Boniversum Kreditlimit',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'oxuser__d3bonimacheckthreshold'        => [
            'sTableName'  => 'oxuser',
            'sFieldName'  => 'd3bonimacheckthreshold',
            'sType'       => 'INT(5)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'Boniversum Warenkorbwert fuer Pruefung',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'oxuser__d3bonimadontcheck'        => [
            'sTableName'  => 'oxuser',
            'sFieldName'  => 'd3bonimadontcheck',
            'sType'       => 'INT(1)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'Boniversum keine Pruefung',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'oxgroups__d3bonimadontcheck'        => [
            'sTableName'  => 'oxgroups',
            'sFieldName'  => 'd3bonimadontcheck',
            'sType'       => 'INT(1)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'Boniversum keine Pruefung',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascore__OXID'        => [
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'OXID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascore__shopid'        => [
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'shopid',
            'sType'       => 'CHAR(10)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascore__addressreturncode'        => [
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'addressreturncode',
            'sType'       => "SET('0','1','2','3')",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascore__identreturncode'        => [
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'identreturncode',
            'sType'       => "SET('0','1')",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascore__scoreconfigurable'        => [
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'scoreconfigurable',
            'sType'       => "SET('0','1')",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascore__scoreclass'        => [
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'scoreclass',
            'sType'       => "INT(5) UNSIGNED",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascore__scorefrom'        => [
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'scorefrom',
            'sType'       => "INT(10) UNSIGNED",
            'blNull'      => false,
            'sDefault'    => 0,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascore__scoreto'        => [
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'scoreto',
            'sType'       => "INT(10) UNSIGNED",
            'blNull'      => false,
            'sDefault'    => 0,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascore__negativeprobability'        => [
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'negativeprobability',
            'sType'       => "DOUBLE UNSIGNED",
            'blNull'      => false,
            'sDefault'    => 0,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascore__payments'        => [
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'payments',
            'sType'       => "TEXT",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascore__creditlimit'        => [
            'sTableName'  => 'd3bonimascore',
            'sFieldName'  => 'creditlimit',
            'sType'       => "DOUBLE UNSIGNED",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascoreresponse__OXID'        => [
            'sTableName'  => 'd3bonimascoreresponse',
            'sFieldName'  => 'OXID',
            'sType'       => "CHAR(32)",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascoreresponse__OXUSERID'        => [
            'sTableName'  => 'd3bonimascoreresponse',
            'sFieldName'  => 'OXUSERID',
            'sType'       => "CHAR(32)",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascoreresponse__response'        => [
            'sTableName'  => 'd3bonimascoreresponse',
            'sFieldName'  => 'response',
            'sType'       => "TEXT",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascoreresponse__date'        => [
            'sTableName'  => 'd3bonimascoreresponse',
            'sFieldName'  => 'date',
            'sType'       => "DATETIME",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'd3bonimascoreresponse__d3requesthash'        => [
            'sTableName'  => 'd3bonimascoreresponse',
            'sFieldName'  => 'd3requesthash',
            'sType'       => "VARCHAR(255)",
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
    ];

    public $aIndizes = [
        'PRIMARY' => [
            'sTableName' => 'd3bonimascore',
            'sType'      => 'PRIMARY',
            'sName'      => 'PRIMARY',
            'aFields'    => [
                'OXID'   => 'OXID',
            ],
        ],
        'scorefrom' => [
            'sTableName' => 'd3bonimascore',
            'sType'      => 'INDEX',
            'sName'      => 'scorefrom',
            'aFields'    => [
                'scorefrom' => 'scorefrom',
            ],
        ],
        'scoreto' => [
            'sTableName' => 'd3bonimascore',
            'sType'      => 'INDEX',
            'sName'      => 'scoreto',
            'aFields'    => [
                'scoreto' => 'scoreto',
            ],
        ],
        'shopid' => [
            'sTableName' => 'd3bonimascore',
            'sType'      => 'INDEX',
            'sName'      => 'shopid',
            'aFields'    => [
                'shopid' => 'shopid',
            ],
        ],
        'addressreturncode' => [
            'sTableName' => 'd3bonimascore',
            'sType'      => 'INDEX',
            'sName'      => 'addressreturncode',
            'aFields'    => [
                'addressreturncode' => 'addressreturncode',
            ],
        ],
        'identreturncode' => [
            'sTableName' => 'd3bonimascore',
            'sType'      => 'INDEX',
            'sName'      => 'identreturncode',
            'aFields'    => [
                'identreturncode' => 'identreturncode',
            ],
        ],
        'scoreclass' => [
            'sTableName' => 'd3bonimascore',
            'sType'      => 'INDEX',
            'sName'      => 'scoreclass',
            'aFields'    => [
                'scoreclass' => 'scoreclass',
            ],
        ],
        'response__PRIMARY' => [
            'sTableName' => 'd3bonimascoreresponse',
            'sType'      => 'PRIMARY',
            'sName'      => 'PRIMARY',
            'aFields'    => [
                'OXID'   => 'OXID',
            ],
        ],
    ];

    protected $aScoreConfigs = [
        [ // row #0
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
        ],
        [ // row #1
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
        ],
        [ // row #2
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
        ],
        [ // row #3
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
        ],
        [ // row #4
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
        ],
        [ // row #5
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
        ],
        [ // row #6
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
        ],
        [ // row #7
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
        ],
        [ // row #8
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
        ],
        [ // row #9
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
        ],
        [ // row #10
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
        ],
        [ // row #11
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
        ],
        [ // row #12
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
        ],
        [ // row #13
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
        ],
        [ // row #14
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
        ],
        [ // row #15
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
        ],
        [ // row #16
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
        ],
        [ // row #17
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
        ],
        [ // row #18
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
        ],
        [ // row #19
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
        ],
        [ // row #20
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
        ],
        [ // row #21
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
        ],
        [ // row #22
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
        ],
        [ // row #23
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
        ],
        [ // row #24
               'd3bonimascore__oxid' => 'validunc7',
               'd3bonimascore__addressreturncode' => '1,2',
               'd3bonimascore__identreturncode' => '0',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 7,
               'd3bonimascore__scorefrom' => 925,
               'd3bonimascore__scoreto' => 904,
               'd3bonimascore__negativeprobability' => 9.4,
               'd3bonimascore__payments' => '["oxidcreditcard","oxidcashondel","oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ],
        [ // row #25
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
        ],
        [ // row #26
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
        ],
        [ // row #27
               'd3bonimascore__oxid' => 'invalid10',
               'd3bonimascore__addressreturncode' => '0,3',
               'd3bonimascore__identreturncode' => '0,1',
               'd3bonimascore__scoreconfigurable' => '1',
               'd3bonimascore__scoreclass' => 10,
               'd3bonimascore__scorefrom' => 10000,
               'd3bonimascore__scoreto' => 0,
               'd3bonimascore__negativeprobability' => 0,
               'd3bonimascore__payments' => '["oxidpayadvance"]',
               'd3bonimascore__creditlimit' => 0,
        ],
    ];

    protected $_aRefreshMetaModuleIds = ['d3bonimascore'];

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
                $aWhere = [
                    'OXID' => md5($aConfig['d3bonimascore__oxid']." " . $oShop->getId()),
                    'shopid' => $oShop->getId(),
                ];
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
                $aWhere = [
                    'OXID'   => md5($aConfig['d3bonimascore__oxid']." " . $oShop->getId()),
                    'shopid' => $oShop->getId(),
                ];

                if ($this->_checkTableItemNotExist('d3bonimascore', $aWhere)) {
                    $aWhere        = [];
                    $aInsertFields = [
                        [
                            'fieldname'    => 'OXID',
                            'content'      => "md5('".$aConfig['d3bonimascore__oxid']." " . $oShop->getId() . "')",
                            'force_update' => true,
                            'use_quote'    => false,
                        ],
                        [
                            'fieldname'    => 'shopid',
                            'content'      => $oShop->getId(),
                            'force_update' => true,
                            'use_quote'    => true,
                        ],
                        [
                            'fieldname'    => 'addressreturncode',
                            'content'      => $aConfig['d3bonimascore__addressreturncode'],
                            'force_update' => true,
                            'use_quote'    => true,
                        ],
                        [
                            'fieldname'    => 'identreturncode',
                            'content'      => $aConfig['d3bonimascore__identreturncode'],
                            'force_update' => true,
                            'use_quote'    => true,
                        ],
                        [
                            'fieldname'    => 'scoreconfigurable',
                            'content'      => $aConfig['d3bonimascore__scoreconfigurable'],
                            'force_update' => true,
                            'use_quote'    => true,
                        ],
                        [
                            'fieldname'    => 'scoreclass',
                            'content'      => $aConfig['d3bonimascore__scoreclass'],
                            'force_update' => true,
                            'use_quote'    => false,
                        ],
                        [
                            'fieldname'    => 'scorefrom',
                            'content'      => $aConfig['d3bonimascore__scorefrom'],
                            'force_update' => true,
                            'use_quote'    => false,
                        ],
                        [
                            'fieldname'    => 'scoreto',
                            'content'      => $aConfig['d3bonimascore__scoreto'],
                            'force_update' => true,
                            'use_quote'    => false,
                        ],
                        [
                            'fieldname'    => 'negativeprobability',
                            'content'      => $aConfig['d3bonimascore__negativeprobability'],
                            'force_update' => true,
                            'use_quote'    => false,
                        ],
                        [
                            'fieldname'    => 'payments',
                            'content'      => $aConfig['d3bonimascore__payments'],
                            'force_update' => true,
                            'use_quote'    => true,
                        ],
                        [
                            'fieldname'    => 'creditlimit',
                            'content'      => $aConfig['d3bonimascore__creditlimit'],
                            'force_update' => true,
                            'use_quote'    => false,
                        ],
                    ];

                    $this->setInitialExecMethod(__METHOD__);
                    $blRet = $this->_updateTableItem2('d3bonimascore', $aInsertFields, $aWhere);
                }
            }
        }

        return $blRet;
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DatabaseConnectionException
     */
    public function checkValidunc7FromValue()
    {
        $score = oxNew(d3bonimascore::class);

        foreach ($this->getShopListByActiveModule('d3bonimascore') as $oShop) {
            $query = "SELECT count(*) FROM " . $score->getViewName() . " WHERE oxid = MD5(CONCAT('validunc7', ' ', ".$oShop->getId().")) AND scorefrom = '952'";
            if ((bool) DatabaseProvider::getDb()->getOne($query)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateValidunc7FromValue()
    {
        $score = oxNew(d3bonimascore::class);

        $blRet = false;

        foreach ($this->getShopListByActiveModule('d3bonimascore') as $oShop) {
            $query = "SELECT oxid FROM " . $score->getViewName() . " WHERE oxid = MD5(CONCAT('validunc7', ' ', ".$oShop->getId().")) AND scorefrom = '952'";
            foreach (DatabaseProvider::getDb()->getAll($query) as $fields) {
                $fields = array_change_key_case($fields, CASE_UPPER);
                $blRet = $this->_updateTableItem2(
                    $score->getCoreTableName(),
                    [
                        [
                            'fieldname'    => 'scorefrom',
                            'content'      => 925,
                            'force_update' => true,
                            'use_quote'    => false,
                        ],
                    ],
                    ['OXID'    => $fields['OXID']]
                );
                if ($blRet == false) {
                    break;
                }
            }
        }

        return $blRet;
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DatabaseConnectionException
     */
    public function checkInvalid10Values()
    {
        $score = oxNew(d3bonimascore::class);

        foreach ($this->getShopListByActiveModule('d3bonimascore') as $oShop) {
            $query = "SELECT count(*) FROM " . $score->getViewName() . " WHERE oxid = MD5(CONCAT('invalid10', ' ', ".$oShop->getId().")) AND scorefrom = '0' AND scoreto = '10000'";
            if ((bool) DatabaseProvider::getDb()->getOne($query)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateInvalid10Values()
    {
        $score = oxNew(d3bonimascore::class);

        $blRet = false;

        foreach ($this->getShopListByActiveModule('d3bonimascore') as $oShop) {
            $query = "SELECT oxid FROM " . $score->getViewName() . " WHERE oxid = MD5(CONCAT('invalid10', ' ', ".$oShop->getId().")) AND scorefrom = '0' AND scoreto = '10000'";
            foreach (DatabaseProvider::getDb()->getAll($query) as $fields) {
                $fields = array_change_key_case($fields, CASE_UPPER);
                $blRet = $this->_updateTableItem2(
                    $score->getCoreTableName(),
                    [
                        [
                            'fieldname'    => 'scorefrom',
                            'content'      => 10000,
                            'force_update' => true,
                            'use_quote'    => false,
                        ],
                        [
                            'fieldname'    => 'scoreto',
                            'content'      => 0,
                            'force_update' => true,
                            'use_quote'    => false,
                        ],
                    ],
                    ['OXID'    => $fields['OXID']]
                );
                if ($blRet == false) {
                    break;
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
        return $this->_hasUnregisteredFiles('d3bonimascore', ['blocks', 'd3FileRegister']);
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
        return $this->_showUnregisteredFiles('d3bonimascore', ['blocks', 'd3FileRegister']);
    }
}
