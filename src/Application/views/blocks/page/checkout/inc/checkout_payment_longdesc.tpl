[{*** wenn Modul aktiv und Zahlart nicht in Safe payments ist ***}]
[{d3modcfgcheck modid="d3bonimascore"}][{/d3modcfgcheck}]

[{if $mod_d3bonimascore && false == $oView->d3PaymentIsSafe($sPaymentID)}]
    [{foreach from=$oView->d3GetNotRequestedCombinedMandatoryFields() item="mandatoryFieldName"}]
        [{assign var="sTplName" value="d3_bonimascore_mandatory_"|cat:$mandatoryFieldName|cat:'.tpl'}]
        [{include file=$sTplName}]
    [{/foreach}]
[{/if}]

[{$smarty.block.parent}]