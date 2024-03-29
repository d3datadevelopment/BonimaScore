[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
</form>

[{d3modcfgcheck modid="d3bonimascore"}][{/d3modcfgcheck}]

[{assign var="aAdresse" value=$oView->getBonimaResponseAddress()}]
[{assign var="aPerson"  value=$oView->getBonimaResponsePerson()}]
[{assign var="aStatus"  value=$oView->getBonimaResponseValidationStatus()}]
[{assign var="aIdent"   value=$oView->getBonimaResponsePersonIdentification()}]
[{assign var="aDetails" value=$oView->getBonimaResponseTaskDetails()}]
[{assign var="sNextCheckDatetime" value=$oView->getNextBonimaCheckDatetime()}]
[{assign var="oBonimaConfig" value=$oView->getBonimaScoreConfig()}]

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{$oxid}]">


    <table cellspacing="0" cellpadding="0" border="0" width="98%">
        <tr>
            <!-- Anfang linke Seite -->
            <td valign="top" class="edittext" align="left" width="50%">
                [{if false == $oBonimaConfig}]
                    [{oxmultilang ident="D3_BONIMASCORE_USER_NOTING_FOUND"}]
                [{else}]
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td class="edittext">
                                [{oxmultilang ident="D3_BONIMASCORE_USER_TITLE"}]:
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" width="100%">
                                <table cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <td class="edittext">
                                            <label for="identifizierung">[{oxmultilang ident="D3_BONIMASCORE_USER_PERSON_STATUS"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" id="identifizierung" class="editinput" size="60" value="[{$aIdent->identifizierung->value}]" readonly disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="edittext">
                                            <label for="existenz">[{oxmultilang ident="D3_BONIMASCORE_USER_PERSON_EXIST"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" class="editinput" size="10" id="existenz" value="[{if $aIdent->existenz == "true"}]ja[{else}]nein[{/if}]" readonly disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="edittext">
                                            <label for="status">[{oxmultilang ident="D3_BONIMASCORE_USER_ADRESS_STATUS"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" id="status" class="editinput" size="60" value="[{$aStatus->value}]" readonly disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="edittext">
                                            <label for="date">[{oxmultilang ident="D3_BONIMASCORE_USER_CHECKTIME"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" class="editinput" id="date" size="37" value="[{$aDetails.datum}], [{$aDetails.uhrzeit}] Uhr" readonly disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="edittext">
                                            [{oxmultilang ident="D3_BONIMASCORE_USER_NEXTCHECK"}]
                                        </td>
                                        <td class="edittext">
                                            &nbsp;[{oxmultilang ident="D3_BONIMASCORE_USER_NEXTCHECK_FROM"}] [{$sNextCheckDatetime|date_format:"%d.%m.%Y, %H:%M"}] [{oxmultilang ident="D3_BONIMASCORE_USER_HOUR"}]
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="edittext" colspan="2">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="edittext" colspan="2">
                                            [{oxmultilang ident="D3_BONIMASCORE_USER_ADRRESSTITLE"}]:
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="edittext">
                                            <label for="anrede">[{oxmultilang ident="GENERAL_BILLSAL"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" class="editinput" id="anrede" size="10" value="[{$aPerson->anrede->value}]" readonly disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="edittext">
                                            <label for="prename">[{oxmultilang ident="GENERAL_NAME"}]</label>
                                            <label for="name" style="position: absolute; left: -9999em">[{oxmultilang ident="GENERAL_NAME"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" id="prename" class="editinput" size="16" value="[{$aPerson->vorname}]" readonly disabled>
                                            <input type="text" class="editinput" id="name" size="16" value="[{$aPerson->name}]" readonly disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="edittext">
                                            <label for="birthdate">[{oxmultilang ident="GENERAL_BIRTHDATE"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" class="editinput" size="37" id="birthdate" value="[{$aPerson->geburtsdatum}]" readonly disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="edittext">
                                            <label for="street">[{oxmultilang ident="GENERAL_STREETNUM"}]</label>
                                            <label for="streetno" style="position: absolute; left: -9999em">[{oxmultilang ident="GENERAL_STREETNUM"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" class="editinput" id="street" size="28" value="[{$aAdresse->strasse}]" readonly disabled>
                                            <input type="text" class="editinput" id="streetno" size="5" value="[{$aAdresse->hausnummer}]" readonly disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="edittext">
                                            <label for="ort">[{oxmultilang ident="GENERAL_ZIPCITY"}]</label>
                                            <label for="zip" style="position: absolute; left: -9999em">[{oxmultilang ident="GENERAL_ZIPCITY"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" class="editinput" id="zip" size="5" value="[{$aAdresse->plz}]" readonly disabled>
                                            <input type="text" class="editinput" id="ort" size="28" value="[{$aAdresse->ort}]" readonly disabled>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="edittext">
                                            <label for="land">[{oxmultilang ident="GENERAL_COUNTRY"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" class="editinput" id="land" size="5" value="[{$aAdresse->laenderkennzeichen}]" readonly disabled>
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                [{/if}]
            </td>
            <!-- Anfang rechte Seite -->
            <td valign="top" class="edittext" align="left" width="50%">
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td valign="top" width="100%">
                            <table cellspacing="0" cellpadding="0" border="0">
                                [{if $aAdresse}]
                                    <tr>
                                        <td class="edittext">
                                            <label for="scorevalue">[{oxmultilang ident="D3_BONIMASCORE_USER_SCOREVALUE"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" class="editinput" id="scorevalue" size="37" value="[{$oView->getBonimaScoreValue(true)}] ([{$aDetails.scores->score->scoreTyp->value}]) [{if $oView->getBonimaScoreValue() != $oView->getBonimaScoreValue(true)}] -> [{$oView->getBonimaScoreValue()}] ([{oxmultilang ident="D3_BONIMASCORE_ADMIN_TREATED"}])[{/if}]" readonly disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="edittext">
                                            <label for="scoreclass">[{oxmultilang ident="D3_BONIMASCORE_USER_SCORECLASS"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" class="editinput" id="scoreclass" size="37" value="[{$oBonimaConfig->getFieldData('scoreclass')}]" readonly disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="edittext">
                                            <label for="creditlimit">[{oxmultilang ident="D3_BONIMASCORE_USER_SCORECREDITLIMIT"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" class="editinput" id="creditlimit" size="37" value="[{$oBonimaConfig->getFieldData('creditlimit')}]" readonly disabled>
                                        </td>
                                    </tr>
                                [{/if}]
                                [{if $oView->hasPremiumOption()}]
                                    <tr>
                                        <td class="edittext">
                                            <strong><label for="usercreditlimit">[{oxmultilang ident="D3_BONIMASCORE_USER_SCOREUSERCREDITLIMIT"}]</label></strong>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" class="editinput" id="usercreditlimit" size="37" name="editval[oxuser__d3bonimascorecreditlimit]" value="[{$edit->getFieldData('d3bonimascorecreditlimit')}]" [{$readonly}]>
                                            [{oxinputhelp ident="D3_BONIMASCORE_USER_SCOREUSERCREDITLIMIT_DESC"}]
                                        </td>
                                    </tr>
                                [{else}]
                                    <tr>
                                        <td class="edittext">
                                            <label for="usercreditlimit">[{oxmultilang ident="D3_BONIMASCORE_USER_SCOREUSERCREDITLIMIT"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="text" class="editinput" id="usercreditlimit" size="37" name="editval[oxuser__d3bonimascorecreditlimit]" value="[{$edit->getFieldData('d3bonimascorecreditlimit')}]" disabled>
                                            [{oxinputhelp ident="D3_BONIMASCORE_USER_SCOREUSERCREDITLIMIT_DESC"}]
                                        </td>
                                    </tr>
                                [{/if}]
                                [{if $oView->hasPremiumOption()}]
                                    <tr>
                                        <td class="edittext">
                                            <strong><label for="d3bonimacheckthreshold">[{oxmultilang ident="D3_BONIMASCORE_CHECKBASKETVALUE_THRESHOLD"}]</label></strong>
                                        </td>
                                        <td class="edittext">
                                            <input class="edittext" type="text" size="37" name="editval[oxuser__d3bonimacheckthreshold]" id="d3bonimacheckthreshold" value="[{$edit->getFieldData('d3bonimacheckthreshold')}]" [{$readonly}]>
                                            [{oxinputhelp ident="D3_BONIMASCORE_CHECKBASKETVALUE_THRESHOLD_DESC"}]
                                        </td>
                                    </tr>
                                [{else}]
                                    <tr>
                                        <td class="edittext">
                                            <label for="d3bonimacheckthreshold">[{oxmultilang ident="D3_BONIMASCORE_CHECKBASKETVALUE_THRESHOLD"}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input class="edittext" type="text" size="37" name="editval[oxuser__d3bonimacheckthreshold]" id="d3bonimacheckthreshold" value="[{$edit->getFieldData('d3bonimacheckthreshold')}]" disabled>
                                            [{oxinputhelp ident="D3_BONIMASCORE_CHECKBASKETVALUE_THRESHOLD_DESC"}]
                                        </td>
                                    </tr>
                                [{/if}]
                                <tr>
                                    <td class="edittext" width="90">
                                        <label for="d3bonimadonttreat" style="[{if $oView->hasPremiumOption()}]font-weight: bold;[{/if}]">[{oxmultilang ident="D3_BONIMASCORE_EXCLUDEFROMTREATMENT"}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="editval[oxuser__d3bonimadonttreat]" value="0">
                                        <input class="edittext" type="checkbox" id="d3bonimadonttreat" name="editval[oxuser__d3bonimadonttreat]" value="1" [{if $edit->getFieldData('d3bonimadonttreat')}]checked="checked"[{/if}] [{if $oView->hasPremiumOption()}][{$readonly}][{else}]disabled[{/if}]>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="edittext" width="90">
                                        <label for="d3bonimadontcheck" style="[{if $oView->hasPremiumOption()}]font-weight: bold;[{/if}]">[{oxmultilang ident="D3_BONIMASCORE_EXCLUDEFROMCHECK"}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="editval[oxuser__d3bonimadontcheck]" value="0">
                                        <input class="edittext" type="checkbox" id="d3bonimadontcheck" name="editval[oxuser__d3bonimadontcheck]" value="1" [{if $edit->getFieldData('d3bonimadontcheck')}]checked="checked"[{/if}] [{if $oView->hasPremiumOption()}][{$readonly}][{else}]disabled[{/if}]>
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
        </tr>
    </table>
</form>

[{include file="bottomitem.tpl"}]
