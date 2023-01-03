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

$sLangName  = "English";

$aLang = [
    'charset'                                      => 'UTF-8',
    'd3bonimascore'                                => '<i class="fa fa-balance-scale"></i> BonimaScore',
    'd3bonimascore_manage'                         => 'Decision Matrix',
    'd3bonimascore_matrix'                         => 'Decision Matrix',
    'd3bonimascore_payments'                       => 'Safe payment methods',
    'd3bonimascore_support'                        => 'Support',
    'd3bonimascore_mypayments'                     => 'Safe payment methods',
    'd3bonimascore_config'                         => 'Module Settings',
    'd3bonimascore_myconfig'                       => 'Module Settings',

    'D3BONIMASCORE_TRANSL'                         => 'Boniversum credit rating',

    'D3BONIMASCORE_CONFIGVARS_SADDTITLE'           => 'Module Edition:',
    'D3BONIMASCORE_CONFIGVARS_FEATUREBIT1'         => 'Check after payment type selection:',
    'D3BONIMASCORE_CONFIGVARS_FEATUREBIT2'         => 'Information panel on admins customer account page:',
    'D3BONIMASCORE_CONFIGVARS_FEATUREBIT3'         => 'Check only with minimum purchase sum:',
    'D3BONIMASCORE_CONFIGVARS_FEATUREBIT4'         => 'Customer (group) exclusion from check:',
    'D3BONIMASCORE_CONFIGVARS_FEATUREBIT5'         => 'Customer-specific credit limit:',
    'D3BONIMASCORE_CONFIGVARS_FEATUREBIT6'         => 'rejected payment methods with different delivery address:',
    'D3BONIMASCORE_CONFIGVARS_FEATUREBIT7'         => 'Default value if birth date is missing:',
    'D3BONIMASCORE_CONFIGVARS_FEATUREBIT8'         => 'definable validity of the score:',

    'D3_BONIMASCORE_ADMIN_ADDRVAL'                 => 'Address Validation',
    'D3_BONIMASCORE_ADMIN_PERSIDENT'               => 'Person Identification',
    'D3_BONIMASCORE_ADMIN_SCORECLASS'              => 'Score Class',
    'D3_BONIMASCORE_ADMIN_SCOREFROM'               => 'Score of',
    'D3_BONIMASCORE_ADMIN_SCORETO'                 => 'Score up',
    'D3_BONIMASCORE_ADMIN_NEGPOS'                  => 'Negative probability',
    'D3_BONIMASCORE_ADMIN_PAYMENTTYPE'             => 'additionally available payment methods',
    'D3_BONIMASCORE_ADMIN_PAYMENTTYPE_DESC'        => 'Add or remove additionally marked entries by clicking with the Ctrl key held down.',
    'D3_BONIMASCORE_ADMIN_CREDITLIMIT'             => 'Credit Limit',
    'D3_BONIMASCORE_ADMIN_CREDITLIMIT_DESC'        => '0 = no credit limit is active, Specified in shop standard currency',
    'D3_BONIMASCORE_ADMIN_'                        => 'no validation defined',
    'D3_BONIMASCORE_ADMIN_1,2'                     => 'validated / corrected',
    'D3_BONIMASCORE_ADMIN_0,3'                     => 'not validated',

    'D3_BONIMASCORE_ADMIN_SCORE_'                  => 'no score class defined',
    'D3_BONIMASCORE_ADMIN_SCORE_99000'             => 'negative account information',
    'D3_BONIMASCORE_ADMIN_SCORE_98000'             => 'debt collection',
    'D3_BONIMASCORE_ADMIN_SCORE_97000'             => 'negative account information, debt collection',
    'D3_BONIMASCORE_ADMIN_SCORE_96000'             => 'law court',
    'D3_BONIMASCORE_ADMIN_SCORE_95000'             => 'negative account information, law court',
    'D3_BONIMASCORE_ADMIN_SCORE_94000'             => 'debt collection, law court',
    'D3_BONIMASCORE_ADMIN_SCORE_93000'             => 'negative account information, debt collection, law court',

    'D3_BONIMASCORE_ADMIN_IDENTIFICATION'          => 'missing information',
    'D3_BONIMASCORE_ADMIN_IDENTIFICATION1'         => 'identified',
    'D3_BONIMASCORE_ADMIN_IDENTIFICATION0'         => 'Not identified',
    'D3_BONIMASCORE_ADMIN_IDENTIFICATION0,1'       => 'Identified / Not identified',

    'D3_BONIMASCORE_ADMIN_SAVE'                    => 'save settings',

    'D3_BONIMASCORE_ADMIN_MATRIXINFO'              => 'The payment type lists contain only payment methods that are not stored in the "secure payment methods". Secure payment methods are offered to the customer in each credit rating. <br> For a multiple choice of payment methods, please keep the Ctrl key pressed.',
    'D3_BONIMASCORE_ADMIN_SAFEPAYMENTINFO'         => 'The secure payment methods are taken into account if in the applicable score category the shopping cart value exceeds the credit limit or no check is possible. In addition, they are automatically included in all scores as available payment methods. <br> If you remove payment methods from this list, please check in the decision matrix, if they are assigned there appropriately. Click on entries while holding down the Ctrl key to add or remove their marker.',

    'D3_BONIMASCORE_ADMIN_DEBUGACTIVE_DESC'        => 'The debug mode logs the complete run of the module in the database (table "d3log"). Deactivate this option in live mode, because a lot of data is written here.',
    'D3_BONIMASCORE_ADMIN_HLMAINCONFIG'            => 'basic settings',
    'D3_BONIMASCORE_ADMIN_SOAPCONFIG'              => 'Boniversum SOAP - access data',
    'D3_BONIMASCORE_ADMIN_PRODID'                  => 'ProdID',
    'D3_BONIMASCORE_ADMIN_PRODID_DESC'             => 'Enter the product ID you received from Boniversum here.',
    'D3_BONIMASCORE_ADMIN_USER'                    => 'User name',
    'D3_BONIMASCORE_ADMIN_USER_DESC'               => 'Enter the user name you received from Boniversum here.',
    'D3_BONIMASCORE_ADMIN_PASS'                    => 'Password',
    'D3_BONIMASCORE_ADMIN_PASS_DESC'               => 'Enter here the password, which you received from Boniversum.',
    'D3_BONIMASCORE_ADMIN_COUNTRY_DE'              => 'Country to be checked',
    'D3_BONIMASCORE_ADMIN_COUNTRY_DE_DESC'         => 'Here you can set the country whose users are to be checked by Boniversum. The billing address of the customer is used. Customers from other countries are not checked.',

    'D3_BONIMASCORE_ERROR_1001'                    => 'Parameter "geschaeftszeichen" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_1002'                    => 'Parameter "berechtigtesinteresse" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_1003'                    => 'Parameter "geschlecht" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_1004'                    => 'Parameter "nachname" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_1005'                    => 'Parameter "vorname" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_1006'                    => 'Parameter "strasse" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_1007'                    => 'Parameter "hausnr" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_1008'                    => 'Parameter "plz" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_1009'                    => 'Parameter "ort" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_1010'                    => 'Parameter "einwilligungsklausel" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_1011'                    => 'Parameter "prodid" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_1012'                    => 'Parameter "strasse2" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_1013'                    => 'Parameter "hausnr2" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_1014'                    => 'Parameter "plz2" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_1015'                    => 'Parameter "ort2" not available / unfilled / invalid content',
    'D3_BONIMASCORE_ERROR_UNKNOWN'                 => 'Unknown error code %1$s returned.',

    'D3_BONIMASCORE_ERROR_2000'                    => 'Please resend request or contact Boniversum Helpdesk.',
    'D3_BONIMASCORE_ERROR_3000'                    => 'Please contact Boniversum Helpdesk.',

    "tbcluser_bonimascore"                         => "BonimaScore",
    "tbclusergroup_bonimascore"                    => "BonimaScore",
    "D3_BONIMASCORE_USER_NOTING_FOUND"             => "no Bonima address validation found",
    "D3_BONIMASCORE_USER_TITLE"                    => "Last validation",
    "D3_BONIMASCORE_USER_PERSON_STATUS"            => "Status person",
    "D3_BONIMASCORE_USER_PERSON_EXIST"             => "Existence person",
    "D3_BONIMASCORE_USER_ADRESS_STATUS"            => "Status address",
    "D3_BONIMASCORE_USER_CHECKTIME"                => "time",
    "D3_BONIMASCORE_USER_NEXTCHECK"                => "next check",
    "D3_BONIMASCORE_USER_NEXTCHECK_FROM"           => "at the earliest",
    "D3_BONIMASCORE_USER_HOUR"                     => "",
    "D3_BONIMASCORE_USER_ADRRESSTITLE"             => "Validated address data",
    "D3_BONIMASCORE_USER_SCOREVALUE"               => "Score value",
    "D3_BONIMASCORE_USER_SCORECLASS"               => "Score class",
    "D3_BONIMASCORE_USER_SCORECREDITLIMIT"         => "Credit limit (from Score)",
    "D3_BONIMASCORE_USER_SCOREUSERCREDITLIMIT"     => "Credit limit (customized)",
    "D3_BONIMASCORE_USER_SCOREUSERCREDITLIMIT_DESC"=> "The option is license-dependent. <br> <br> If 0 is entered, the credit limit from the score class is used. Otherwise (regardless of the score), this customer-specific credit limit takes precedence.",

    "D3_BONIMASCORE_ADMIN_HLVALIDPERIOD"           => 'License option "Adjust scores validity period"',
    "D3_BONIMASCORE_ADMIN_VALIDPERIOD"             => "Check creditworthiness again after X days",
    "D3_BONIMASCORE_ADMIN_VALIDPERIOD_DESC"        => "Earlier credit checks are discarded after 1 day and a re-audit is performed. If older checks are to last longer, enter the number of days after which you want to check again. If no value or 0 is entered, the default setting is used.",
    "D3_BONIMASCORE_ADMIN_HLCHECKDELADDR"          => 'License option "restricted payment methods with different delivery address"',
    "D3_BONIMASCORE_ADMIN_CHECKDELADDRFIELDS"      => "Delivery address check active",
    "D3_BONIMASCORE_ADMIN_CHECKDELADDRFIELDS_DESC" => "Only with activating this checkbox will the delivery address be compared with the billing address and, if there are any deviations, the available payment methods will be checked.",
    "D3_BONIMASCORE_ADMIN_DELADDRFIELDS"           => "Check fields (pipe-separated)",
    "D3_BONIMASCORE_ADMIN_DELADDRFIELDS_DESC"      => 'All these fields are checked for different contents. Please note that these fields must be on the customer account and also at the delivery address. <br> <br> Enter the exact field name of the respective input field here (for example "oxfname" for the first name). To define more than one field, separate the names with a pipe character "|". <br> <br> The default setting is the fields <ul> <li> oxcountryid (country) </li> <li> oxstreet (street) </li> <li> oxstreetnr (house number) </li> <li> oxzip (zip code) </li> <li> oxcity (city) </li> </ul> Different spellings (eg "Str." and "Street") are counted as a different address.',
    "D3_BONIMASCORE_ADMIN_DELADDRFORBPAYMENTS"     => "not allowed payment method(s) (pipe-separated)",
    "D3_BONIMASCORE_ADMIN_DELADDRFORBPAYMENTS_DESC"=> 'All the payment methods specified here will not be made available if the delivery address differs. If the delivery address is identical or not set, the Boniversum module decides on the availability. <br> <br> Enter the ID of the respective payment method here. If several payment methods are to be defined, separate the IDs with a pipe character "|".',
    "D3_BONIMASCORE_ADMIN_HLBASKETVALUE"           => 'License option "Query score only from defined shopping cart value"',
    "D3_BONIMASCORE_ADMIN_CHECKBASKETVALUE"        => "Minimum basket value for credit check active",
    "D3_BONIMASCORE_ADMIN_CHECKBASKETVALUE_DESC"   => "If this checkbox is set, the credit check is made for all users and payment methods starting at the defined shopping cart value. The value can be set globally in the following input field. Alternatively, this setting can be overridden with the value on the customer account (Administer Users → Users → BonimaScore → Minimum Shopping Cart Value for Boniversum Rating). The value on the customer account has priority.",
    "D3_BONIMASCORE_ADMIN_CHECKBASKETVALUETHRESHOLD"        => "Minimum value of the shopping cart (global setting)",
    "D3_BONIMASCORE_ADMIN_CHECKBASKETVALUETHRESHOLD_DESC"   => "If no setting is defined on the customer account, this threshold is used.",
    'D3_BONIMASCORE_CHECKBASKETVALUE_THRESHOLD'    => 'Minimum Shopping Cart Value for Boniversum Rating',
    'D3_BONIMASCORE_CHECKBASKETVALUE_THRESHOLD_DESC'        => 'The option is license-dependent. <br> <br> If 0 is entered, the global value is used (can be set under "D3 Modules → BonimaScore → Module Settings → Minimum value of the shopping cart (global setting)"). Otherwise, this custom minimum basket value has priority.',
    "D3_BONIMASCORE_ADMIN_HLEXCLUDEUSERS"          => 'License option "Exclude users or user groups from check"',
    'D3_BONIMASCORE_ADMIN_EXCLUDEUSERS'            => 'Marked customers and customer groups are excluded from credit checks',
    'D3_BONIMASCORE_ADMIN_EXCLUDEUSERS_DESC'       => 'If this checkmark is set, the credit check is excluded for all selected users and customer groups. These customers get all available payment methods. You set the marking on the respective customer account or on the customer group.',
    'D3_BONIMASCORE_ADMIN_TLDTREATMENT'            => 'post score treatment: for mail addresses with these top level domains (pipe-separated)',
    'D3_BONIMASCORE_ADMIN_TLDTREATMENT_DESC'       => 'There are scam attempts where orders are placed to trustworthy addresses with a good score, the delivery may be intercepted beforehand. The most striking feature of these orders is the special top level domain of the customer\'s email address. In the current case, these are .ru addresses. Entries here in the input field are compared with the customer mail address and if they match, the score determined by Boniversum is post-processed. You can exclude trustworthy customers with these addresses from treatment at the customer account or customer group.',
    'D3_BONIMASCORE_ADMIN_TREATEDSCOREVALUE'       => 'post score treatment: score is limited to this maximum value',
    'D3_BONIMASCORE_ADMIN_TREATEDSCOREVALUE_DESC'  => 'In case of signs of fraud, the highest possible score of the customer concerned is limited to this value. Enter here the maximum score you allow these orderers. Make your decisions on the basis of your decision matrix. The worst possible score is 0.',
    'D3_BONIMASCORE_ADMIN_TREATED'                 => 'post-treated',
    'D3_BONIMASCORE_EXCLUDEFROMCHECK'              => 'Customer is not checked by Boniversum',
    'D3_BONIMASCORE_EXCLUDEFROMTREATMENT'          => 'The client\'s score is not treated.',
    'D3_BONIMASCORE_EXCLUDEGROUPFROMCHECK'         => 'all customers in this group are not checked by Boniversum',
    'D3_BONIMASCORE_EXCLUDEGROUPFROMTREATMENT'     => 'the scores of all clients in this group are not treated',
    'D3_BONIMASCORE_ADMIN_HLOPTIONNOTACTIVE'       => '(option not active)',
    'D3_BONIMASCORE_PAYMENTS_PLEASE_CHOOSE'        => 'Please choose',
];
