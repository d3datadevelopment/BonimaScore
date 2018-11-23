[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]
<link rel="stylesheet" type="text/css" href="[{$oViewConf->getModuleUrl('d3bonimascore', 'out/Css/admin_bonimascore.css')}]" />

<script type="text/javascript">
    <!--
    function editThis( sID )
    {
        var oTransfer = top.basefrm.edit.document.getElementById( "transfer" );
        oTransfer.oxid.value = sID;
        oTransfer.cl.value = top.basefrm.list.sDefClass;

        //forcing edit frame to reload after submit
        top.forceReloadingEditFrame();

        var oSearch = top.basefrm.list.document.getElementById( "search" );
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
            var oField = top.oxid.admin.getLockTarget();
            oField.onchange = oField.onkeyup = oField.onmouseout = top.oxid.admin.unlockSave;
        }
    [{/if}]
    //-->
</script>

[{assign var='oxConfig' value=$oView->getConfig()}]
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

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post" style="padding: 0; margin: 0; height:0;" enctype="multipart/form-data">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oView->getClassName()}]">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <div class="d3Info">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_MATRIXINFO'}]</div>
    <table cellspacing="0" class="d3bonimascore">
      <tbody>

        <tr>
            <td colspan="8" align="right" style="border:0">
                <input onclick="document.myedit.fnc.value='save';" type="submit" value="[{oxmultilang ident='D3_BONIMASCORE_ADMIN_SAVE'}]" />
            </td>
        </tr>

          <tr class="headings">
              <th>[{oxmultilang ident='D3_BONIMASCORE_ADMIN_ADDRVAL'}] [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_ADDRVAL_DESC"}]</th>
              <th>[{oxmultilang ident='D3_BONIMASCORE_ADMIN_PERSIDENT'}] [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_PERSIDENT_DESC"}]</th>
              <th>[{oxmultilang ident='D3_BONIMASCORE_ADMIN_SCORECLASS'}] [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_SCORECLASS_DESC"}]</th>
              <th>[{oxmultilang ident='D3_BONIMASCORE_ADMIN_SCOREFROM'}] [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_SCOREFROM_DESC"}]</th>
              <th>[{oxmultilang ident='D3_BONIMASCORE_ADMIN_SCORETO'}] [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_SCORETO_DESC"}]</th>
              <th>[{oxmultilang ident='D3_BONIMASCORE_ADMIN_NEGPOS'}] [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_NEGPOS_DESC"}]</th>
              <th>[{oxmultilang ident='D3_BONIMASCORE_ADMIN_PAYMENTTYPE'}] [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_PAYMENTTYPE_DESC"}]</th>
              <th>[{oxmultilang ident='D3_BONIMASCORE_ADMIN_CREDITLIMIT'}] [{oxinputhelp ident="D3_BONIMASCORE_ADMIN_CREDITLIMIT_DESC"}]</th>
          </tr>

        [{foreach from=$oView->d3GetConfigOptions() key='sConfigId' item='oConfig'}]
          <tr class="even pointer" id="1" style="vertical-align:middle;background:[{cycle values='#F6F6F6,#FFFFFF'}]">
              <td>
                [{oxmultilang ident='D3_BONIMASCORE_ADMIN_'|cat:$oConfig->getFieldData('addressreturncode')}]
            </td>
              <td>
                [{oxmultilang ident='D3_BONIMASCORE_ADMIN_IDENTIFICATION'|cat:$oConfig->getFieldData('identreturncode')}]
            </td>
              <td>[{$oConfig->getFieldData('scoreclass')}]</td>
            [{if $oConfig->getFieldData('scoreconfigurable')}]
                <td>
                    <label for="[{$sConfigId}]_scorefrom" style="position: absolute; left: -9999em">[{oxmultilang ident="D3_BONIMASCORE_ADMIN_SCOREFROM"}]</label>
                    <input type="text" id="[{$sConfigId}]_scorefrom" name="config[[{$sConfigId}]][scorefrom]" value="[{$oConfig->getFieldData('scorefrom')|@intval}]" />
                </td>
                <td>
                    <label for="[{$sConfigId}]_scoreto" style="position: absolute; left: -9999em">[{oxmultilang ident="D3_BONIMASCORE_ADMIN_SCORETO"}]</label>
                    <input type="text" id="[{$sConfigId}]_scoreto" name="config[[{$sConfigId}]][scoreto]" value="[{$oConfig->getFieldData('scoreto')|@intval}]" />
                </td>
            [{else}]
                <td align="center" colspan="2">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_SCORE_'|cat:$oConfig->getFieldData('scoreclass')}]</td>
            [{/if}]
              <td align="center">
                [{if $oConfig->getFieldData('negativeprobability')}]
                    [{$oConfig->getFieldData('negativeprobability')|@number_format:2:',':'.'}]%
                [{/if}]
           </td>

            <td class="paymentcell">
                [{include file='main.payment_box.inc.tpl' oPaymentList=$oView->d3GetPaymentList() sConfigId=$sConfigId aSelectedPayments=$oConfig->d3GetPayments()}]
            </td>
            <td>
                <label for="[{$sConfigId}]_creditlimit" style="position: absolute; left: -9999em">[{oxmultilang ident="D3_BONIMASCORE_ADMIN_CREDITLIMIT"}]</label>
                <input type="text" id="[{$sConfigId}]_creditlimit" name="config[[{$sConfigId}]][creditlimit]" value="[{$oConfig->getFieldData('creditlimit')|@floatval}]" />
            </td>
        </tr>
        [{/foreach}]
        <tr>
            <td colspan="8" align="right" style="border:0">
                <input onclick="document.myedit.fnc.value='save';" type="submit" value="[{oxmultilang ident='D3_BONIMASCORE_ADMIN_SAVE'}]" />
            </td>
        </tr>
        </tbody>
    </table>
</form>

[{include file="bottomnaviitem.tpl"}]
[{include file="bottomitem.tpl"}]