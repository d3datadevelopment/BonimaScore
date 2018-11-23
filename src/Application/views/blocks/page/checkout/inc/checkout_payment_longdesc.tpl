[{*** wenn Modul aktiv und Zahlart nicht in Safe payments ist ***}]
[{d3modcfgcheck modid="d3bonimascore"}][{/d3modcfgcheck}]

[{if $mod_d3bonimascore && !$oView->d3PaymentIsSafe($sPaymentID)}]
    [{if isset( $invadr.oxuser__oxbirthdate.month )}]
        [{assign var="iBirthdayMonth" value=$invadr.oxuser__oxbirthdate.month}]
    [{elseif $oxcmp_user->oxuser__oxbirthdate->value && $oxcmp_user->oxuser__oxbirthdate->value != "0000-00-00"}]
        [{assign var="iBirthdayMonth" value=$oxcmp_user->oxuser__oxbirthdate->value|regex_replace:"/^([0-9]{4})[-]/":""|regex_replace:"/[-]([0-9]{1,2})$/":""}]
    [{else}]
        [{assign var="iBirthdayMonth" value=0}]
    [{/if}]

    [{if isset( $invadr.oxuser__oxbirthdate.day )}]
        [{assign var="iBirthdayDay" value=$invadr.oxuser__oxbirthdate.day}]
    [{elseif $oxcmp_user->oxuser__oxbirthdate->value && $oxcmp_user->oxuser__oxbirthdate->value != "0000-00-00"}]
        [{assign var="iBirthdayDay" value=$oxcmp_user->oxuser__oxbirthdate->value|regex_replace:"/^([0-9]{4})[-]([0-9]{1,2})[-]/":""}]
    [{else}]
        [{assign var="iBirthdayDay" value=0}]
    [{/if}]

    [{if isset( $invadr.oxuser__oxbirthdate.year )}]
        [{assign var="iBirthdayYear" value=$invadr.oxuser__oxbirthdate.year}]
    [{elseif $oxcmp_user->oxuser__oxbirthdate->value && $oxcmp_user->oxuser__oxbirthdate->value != "0000-00-00"}]
        [{assign var="iBirthdayYear" value=$oxcmp_user->oxuser__oxbirthdate->value|regex_replace:"/[-]([0-9]{1,2})[-]([0-9]{1,2})$/":""}]
    [{else}]
        [{assign var="iBirthdayYear" value=0}]
    [{/if}]

    <div class="form-group">
        <label class="req control-label col-xs-12 col-lg-3" for="oxDay_[{$sPaymentID}]">[{oxmultilang ident="BIRTHDATE"}]</label>
        <div class="col-xs-3 col-lg-2">
            <input id="oxDay_[{$sPaymentID}]" class="oxDay form-control" name="d3bonimascore_[{$sPaymentID}]_oxbirthdate[day]" type="text" maxlength="2" value="[{if $iBirthdayDay > 0}][{$iBirthdayDay}][{/if}]" placeholder="[{oxmultilang ident="DAY"}]"[{if $oView->isFieldRequired(oxuser__oxbirthdate)}] required=""[{/if}]>
        </div>
        <label for="oxMonth_[{$sPaymentID}]" class="req control-label col-xs-12 col-lg-3" style="position: absolute; left: -9999em">[{oxmultilang ident="BIRTHDATE"}] [{oxmultilang ident="MONTH"}]</label>
        <div class="col-xs-6 col-lg-2">
            <select id="oxMonth_[{$sPaymentID}]" class="oxMonth form-control selectpicker" name="d3bonimascore_[{$sPaymentID}]_oxbirthdate[month]"[{if $oView->isFieldRequired(oxuser__oxbirthdate)}] required=""[{/if}]>
                <option value="" label="-">-</option>
                [{section name="month" start=1 loop=13}]
                    <option value="[{$smarty.section.month.index}]" label="[{$smarty.section.month.index}]" [{if $iBirthdayMonth == $smarty.section.month.index}] selected="selected" [{/if}]>
                        [{oxmultilang ident="MONTH_NAME_"|cat:$smarty.section.month.index}]
                    </option>
                [{/section}]
            </select>
        </div>
        <label class="req control-label col-xs-12 col-lg-3" for="oxYear_[{$sPaymentID}]" style="position: absolute; left: -9999em">[{oxmultilang ident="BIRTHDATE"}] [{oxmultilang ident="YEAR"}]</label>
        <div class="col-xs-3 col-lg-2">
            <input id="oxYear" class="oxYear form-control" name="d3bonimascore_[{$sPaymentID}]_oxbirthdate[year]" type="text" maxlength="4" value="[{if $iBirthdayYear}][{$iBirthdayYear}][{/if}]" placeholder="[{oxmultilang ident="YEAR"}]"[{if $oView->isFieldRequired(oxuser__oxbirthdate)}] required=""[{/if}]>
        </div>
    </div>
[{/if}]

[{$smarty.block.parent}]