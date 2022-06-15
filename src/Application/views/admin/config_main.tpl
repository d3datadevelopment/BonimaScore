[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]
<link rel="stylesheet" type="text/css" href="[{$oViewConf->getModuleUrl('d3bonimascore', 'out/Css/admin_bonimascore.css')}]" />

<script type="text/javascript">
    <!--
    function editThis( sID )
    {
        let oTransfer = top.basefrm.edit.document.getElementById( "transfer" );
        oTransfer.oxid.value = sID;
        oTransfer.cl.value = top.basefrm.list.sDefClass;

        //forcing edit frame to reload after submit
        top.forceReloadingEditFrame();

        let oSearch = top.basefrm.list.document.getElementById( "search" );
        oSearch.oxid.value = sID;
        oSearch.actedit.value = 0;
        oSearch.submit();
    }
    [{if !$oxparentid}]
        window.onload = function ()
        {
            [{if $updatelist == 1}]
            top.oxid.admin.updateList('[{$oxid}]');
            [{/if}]
            let oField = top.oxid.admin.getLockTarget();
            oField.onchange = oField.onkeyup = oField.onmouseout = top.oxid.admin.unlockSave;
        }
    [{/if}]
    //-->
</script>

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="oxidCopy" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oView->getClassName()}]">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>

[{assign var='config' value=$oView->d3GetSettings()}]
[{assign var='oxConfig' value=$oView->getConfig()}]
<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post" style="padding: 0; margin: 0; height:0;" enctype="multipart/form-data">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oView->getClassName()}]">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{$oxid}]">

    <h1>[{oxmultilang ident='D3_BONIMASCORE_ADMIN_SOAPCONFIG'}]</h1>

    <table style="width: 100%;">
        <tbody>
            <tr>
                <td colspan="2">
                    [{include file="d3_cfg_mod_active.tpl"}]
                </td>
            </tr>
        </tbody>
    </table>

    <table class="d3bonimascore">
      <tbody>
        <tr class="headings">
            <th>[{oxmultilang ident="D3_BONIMASCORE_ADMIN_HLMAINCONFIG"}]</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td>
                <strong><label for="sD3BonimaScoreProdId">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_PRODID'}]</label></strong>
            </td>
            <td>
                <input type="text" name="config[sD3BonimaScoreProdId]" id="sD3BonimaScoreProdId" value="[{$config->getValue('sD3BonimaScoreProdId')}]" />
            </td>
            <td>
                [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_PRODID_DESC"}]
            </td>
        </tr>
        <tr>
            <td>
                <strong><label for="sD3BonimaScoreUser">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_USER'}]</label></strong>
            </td>
            <td>
                <input type="text" name="config[sD3BonimaScoreUser]" id="sD3BonimaScoreUser" value="[{$config->getValue('sD3BonimaScoreUser')}]" />
            </td>
            <td>
                [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_USER_DESC"}]
            </td>
        </tr>
        <tr>
            <td>
                <strong><label for="sD3BonimaScorePass">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_PASS'}]</label></strong>
            </td>
            <td>
                <input type="text" name="config[sD3BonimaScorePass]" id="sD3BonimaScorePass" value="[{$config->getValue('sD3BonimaScorePass')}]" />
            </td>
            <td>
                [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_PASS_DESC"}]
            </td>
        </tr>
        <tr>
            <td>
                <strong><label for="sD3BonimaScoreCountry">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_COUNTRY_DE'}]</label></strong>
            </td>
            <td>
                <select name="config[sD3BonimaScoreCountry]" id="sD3BonimaScoreCountry">
                    [{foreach from=$oView->d3GetCountryList() item='oCountry'}]
                        <option [{if $oCountry->getId() == $config->getValue('sD3BonimaScoreCountry')}]selected=""[{/if}] value="[{$oCountry->getId()}]">[{$oCountry->getFieldData('oxtitle')}]</option>
                    [{/foreach}]
                </select>
            </td>
            <td>
                [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_COUNTRY_DE_DESC"}]
            </td>
        </tr>


        <tr class="headings">
            <th>[{oxmultilang ident="D3_BONIMASCORE_ADMIN_HLVALIDPERIOD"}] [{if false == $oView->hasPremiumOption()}][{oxmultilang ident="D3_BONIMASCORE_ADMIN_HLOPTIONNOTACTIVE"}][{/if}]</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td>
                <strong><label for="iD3BonimaScoreValidPeriod">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_VALIDPERIOD'}]</label></strong>
            </td>
            <td>
                <input type="text" name="config[iD3BonimaScoreValidPeriod]" id="iD3BonimaScoreValidPeriod" value="[{$config->getValue('iD3BonimaScoreValidPeriod')}]" [{if false == $oView->hasPremiumOption()}] disabled[{/if}] />
            </td>
            <td>
                [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_VALIDPERIOD_DESC"}]
            </td>
        </tr>


        <tr class="headings">
            <th>[{oxmultilang ident="D3_BONIMASCORE_ADMIN_HLCHECKDELADDR"}] [{if false == $oView->hasPremiumOption()}][{oxmultilang ident="D3_BONIMASCORE_ADMIN_HLOPTIONNOTACTIVE"}][{/if}]</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td>
                <strong><label for="bD3BonimaScoreDelAddrCheck">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_CHECKDELADDRFIELDS'}]</label></strong>
            </td>
            <td>
                <input type="hidden" name="config[bD3BonimaScoreDelAddrCheck]" value="0">
                <input type="checkbox" name="config[bD3BonimaScoreDelAddrCheck]" id="bD3BonimaScoreDelAddrCheck" value="1" [{if $config->getValue('bD3BonimaScoreDelAddrCheck')}]checked="checked"[{/if}] [{if false == $oView->hasPremiumOption()}] disabled[{/if}] />
            </td>
            <td>
                [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_CHECKDELADDRFIELDS_DESC"}]
            </td>
        </tr>
        <tr>
            <td>
                <strong><label for="sD3BoniScoreDelAddrFields">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_DELADDRFIELDS'}]</label></strong>
            </td>
            <td>
                <input type="text" name="config[sD3BoniScoreDelAddrFields]" id="sD3BoniScoreDelAddrFields" value="[{$config->getValue('sD3BoniScoreDelAddrFields')}]" [{if false == $oView->hasPremiumOption()}] disabled[{/if}] />
            </td>
            <td>
                [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_DELADDRFIELDS_DESC"}]
            </td>
        </tr>
        <tr>
            <td>
                <strong><label for="sD3BoniScoreDelAddrForbPayments">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_DELADDRFORBPAYMENTS'}]</label></strong>
            </td>
            <td>
                <input type="text" name="config[sD3BoniScoreDelAddrForbPayments]" id="sD3BoniScoreDelAddrForbPayments" value="[{$config->getValue('sD3BoniScoreDelAddrForbPayments')}]" [{if false == $oView->hasPremiumOption()}] disabled[{/if}] />
            </td>
            <td>
                [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_DELADDRFORBPAYMENTS_DESC"}]
            </td>
        </tr>


        <tr class="headings">
            <th>[{oxmultilang ident="D3_BONIMASCORE_ADMIN_HLBASKETVALUE"}] [{if false == $oView->hasPremiumOption()}][{oxmultilang ident="D3_BONIMASCORE_ADMIN_HLOPTIONNOTACTIVE"}][{/if}]</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td>
                <strong><label for="bD3BonimaScoreCheckBasketValue">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_CHECKBASKETVALUE'}]</label></strong>
            </td>
            <td>
                <input type="hidden" name="config[bD3BonimaScoreCheckBasketValue]" value="0">
                <input type="checkbox" name="config[bD3BonimaScoreCheckBasketValue]" id="bD3BonimaScoreCheckBasketValue" value="1" [{if $config->getValue('bD3BonimaScoreCheckBasketValue')}]checked="checked"[{/if}] [{if false == $oView->hasPremiumOption()}] disabled[{/if}] />
            </td>
            <td>
                [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_CHECKBASKETVALUE_DESC"}]
            </td>
        </tr>
        <tr>
            <td>
                <strong><label for="d3bonimacheckthreshold">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_CHECKBASKETVALUETHRESHOLD'}]</label></strong>
            </td>
            <td>
                <input type="text" name="config[d3bonimacheckthreshold]" id="d3bonimacheckthreshold" value="[{$config->getValue('d3bonimacheckthreshold')}]" [{if false == $oView->hasPremiumOption()}] disabled[{/if}] />
            </td>
            <td>
                [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_CHECKBASKETVALUETHRESHOLD_DESC"}]
            </td>
        </tr>


        <tr class="headings">
            <th>[{oxmultilang ident="D3_BONIMASCORE_ADMIN_HLEXCLUDEUSERS"}] [{if false == $oView->hasPremiumOption()}][{oxmultilang ident="D3_BONIMASCORE_ADMIN_HLOPTIONNOTACTIVE"}][{/if}]</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td>
                <strong><label for="bD3BonimaScoreExcludeUsersFromCheck">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_EXCLUDEUSERS'}]</label></strong>
            </td>
            <td>
                <input type="hidden" name="config[bD3BonimaScoreExcludeUsersFromCheck]" value="0">
                <input type="checkbox" name="config[bD3BonimaScoreExcludeUsersFromCheck]" id="bD3BonimaScoreExcludeUsersFromCheck" value="1" [{if $config->getValue('bD3BonimaScoreExcludeUsersFromCheck')}]checked="checked"[{/if}] [{if false == $oView->hasPremiumOption()}] disabled[{/if}] />
            </td>
            <td>
                [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_EXCLUDEUSERS_DESC"}]
            </td>
        </tr>
        <tr>
            <td>
                <strong><label for="sD3BoniScoreTLDTreatment">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_TLDTREATMENT'}]</label></strong>
            </td>
            <td>
                <input type="text" name="config[sD3BoniScoreTLDTreatment]" id="sD3BoniScoreTLDTreatment" value="[{$config->getValue('sD3BoniScoreTLDTreatment')}]" [{if false == $oView->hasPremiumOption()}] disabled[{/if}] />
            </td>
            <td>
                [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_TLDTREATMENT_DESC"}]
            </td>
        </tr>
        <tr>
            <td>
                <strong><label for="sD3BoniScoreTreatedScoreValue">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_TREATEDSCOREVALUE'}]</label></strong>
            </td>
            <td>
                <input type="text" name="config[sD3BoniScoreTreatedScoreValue]" id="sD3BoniScoreTreatedScoreValue" value="[{$config->getValue('sD3BoniScoreTreatedScoreValue')}]" [{if false == $oView->hasPremiumOption()}] disabled[{/if}] />
            </td>
            <td>
                [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_TREATEDSCOREVALUE_DESC"}]
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input onclick="document.myedit.fnc.value='save';" type="submit" value="[{oxmultilang ident='D3_BONIMASCORE_ADMIN_SAVE'}]" />
            </td>
            <td></td>
        </tr>
        </tbody>
    </table>
</form>

[{include file="d3_cfg_mod_inc.tpl"}]