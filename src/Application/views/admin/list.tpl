[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign box="list"}]
[{assign var="where" value=$oView->getListFilter()}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
    [{else}]
    [{assign var="readonly" value=""}]
    [{/if}]

<script type="text/javascript">
    <!--
    window.onload = function ()
    {
        top.reloadEditFrame();
        [{if $updatelist == 1}]
            top.oxid.admin.updateList('[{$oxid}]');
        [{/if}]
    }
    //-->
</script>
<div id="liste">
    <form name="search" id="search" action="[{$oViewConf->getSelfLink()}]" method="post">
        [{include file="_formparams.tpl" cl="d3bonimascore_config_list" lstrt=$lstrt actedit=$actedit oxid=$oxid fnc="" language=$actlang editlanguage=$actlang}]
    </form>
</div>

[{include file="pagetabsnippet.tpl"}]


<script type="text/javascript">
    if (parent.parent)
    {   parent.parent.sShopTitle   = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
        parent.parent.sMenuItem    = "[{oxmultilang ident="CONTENT_LIST_MENUITEM"}]";
        parent.parent.sMenuSubItem = "[{oxmultilang ident="CONTENT_LIST_MENUSUBITEM"}]";
        parent.parent.sWorkArea    = "[{$_act}]";
        parent.parent.setTitle();
    }
</script>
</body>
</html>