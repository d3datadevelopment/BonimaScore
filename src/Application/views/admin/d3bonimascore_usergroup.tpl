[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
</form>

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{$oxid}]">


    <table cellspacing="0" cellpadding="0" border="0" width="98%">
        <tr>
            <!-- Anfang linke Seite -->
            <td valign="top" class="edittext" align="left" width="50%">
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td valign="top" width="100%">
                            <table cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td class="edittext" width="90">
                                        <label for="d3bonimadonttreat" style="[{if $oView->hasPremiumOption()}]font-weight: bold;[{/if}]">[{oxmultilang ident="D3_BONIMASCORE_EXCLUDEGROUPFROMTREATMENT"}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="editval[oxgroups__d3bonimadonttreat]" value="0">
                                        <input class="edittext" id="d3bonimadonttreat" type="checkbox" name="editval[oxgroups__d3bonimadonttreat]" value="1" [{if $edit->oxgroups__d3bonimadonttreat->value}]checked="checked"[{/if}] [{if $oView->hasPremiumOption()}][{$readonly}][{else}]disabled[{/if}]>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="edittext" width="90">
                                        <label for="d3bonimadontcheck" style="[{if $oView->hasPremiumOption()}]font-weight: bold;[{/if}]">[{oxmultilang ident="D3_BONIMASCORE_EXCLUDEGROUPFROMCHECK"}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="editval[oxgroups__d3bonimadontcheck]" value="0">
                                        <input class="edittext" id="d3bonimadontcheck" type="checkbox" name="editval[oxgroups__d3bonimadontcheck]" value="1" [{if $edit->oxgroups__d3bonimadontcheck->value}]checked="checked"[{/if}] [{if $oView->hasPremiumOption()}][{$readonly}][{else}]disabled[{/if}]>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="edittext">
                                    </td>
                                    <td class="edittext"><br>
                                        <input type="submit" class="edittext" name="save" value="[{oxmultilang ident="GENERAL_SAVE"}]" onClick="document.myedit.fnc.value='save'"" [{$readonly}]>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            <!-- Anfang rechte Seite -->
            <td valign="top" class="edittext" align="left" width="50%">
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td valign="top" width="100%">
                            <table cellspacing="0" cellpadding="0" border="0">
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>

[{include file="bottomitem.tpl"}]
