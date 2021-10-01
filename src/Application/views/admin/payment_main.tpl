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

[{block name="d3_bonimascore_safepayments_outerform"}]
    <form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post" style="padding: 0; margin: 0; height:0;" enctype="multipart/form-data">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="cl" value="[{$oView->getClassName()}]">
        <input type="hidden" name="fnc" value="">
        <input type="hidden" name="oxid" value="[{$oxid}]">

        [{block name="d3_bonimascore_safepayments_innerform"}]
            <div class="d3Info"><label for="safepayments">[{oxmultilang ident='D3_BONIMASCORE_ADMIN_SAFEPAYMENTINFO'}]</label></div>
            <table cellspacing="0" class="d3bonimascore">
                <tbody>
                    [{block name="d3_bonimascore_safepayments_innertable"}]
                        <tr>
                            <td>
                                <select multiple="" size="[{$oView->d3GetPaymentList()|@count}]" name="safepayments[]" id="safepayments">
                                    [{foreach from=$oView->d3GetPaymentList() key='sPaymentId' item='oPayment'}]
                                        [{block name="d3_bonimascore_safepayments_select"}]
                                            <option [{if $oPayment->oxpayments__d3bonimascoresafe->value}]selected=""[{/if}] value="[{$sPaymentId}]">[{$oPayment->oxpayments__oxdesc->value}]</option>
                                        [{/block}]
                                    [{/foreach}]
                                </select>
                            </td>
                        </tr>
                    [{/block}]
                <tr>
                    <td>
                        <input onclick="document.myedit.fnc.value='save';" type="submit" value="[{oxmultilang ident='D3_BONIMASCORE_ADMIN_SAVE'}]" />
                    </td>
                </tr>
                </tbody>
            </table>
        [{/block}]
    </form>
[{/block}]

[{include file="bottomnaviitem.tpl"}]
[{include file="bottomitem.tpl"}]