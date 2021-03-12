[{assign var="birthday" value=$oView->d3GetUserBirthdate()}]

<div class="form-group">
    <label class="req control-label [{*flow*}]col-xs-12 [{*wave*}]col-12 col-lg-3 text-md-left text-lg-right" for="oxDay_[{$sPaymentID}]">[{oxmultilang ident="BIRTHDATE"}]</label>
    <div class="[{*flow*}]col-xs-3 [{*wave*}]col-3 col-lg-3">
        <input id="oxDay_[{$sPaymentID}]" class="oxDay form-control" name="d3bonimascore_[{$sPaymentID}]_oxbirthdate[day]" type="text" maxlength="2" value="[{if $birthday.day > 0}][{$birthday.day}][{/if}]" placeholder="[{oxmultilang ident="DAY"}]"[{if $oView->isFieldRequired(oxuser__oxbirthdate)}] required=""[{/if}]>
    </div>
    <label for="oxMonth_[{$sPaymentID}]" class="req control-label [{*flow*}]col-xs-12 [{*wave*}]col-12 col-lg-3 text-md-left text-lg-right" style="position: absolute; left: -9999em">[{oxmultilang ident="BIRTHDATE"}] [{oxmultilang ident="MONTH"}]</label>
    <div class="[{*flow*}]col-xs-6 [{*wave*}]col-6 col-lg-3">
        <select id="oxMonth_[{$sPaymentID}]" class="oxMonth form-control selectpicker" name="d3bonimascore_[{$sPaymentID}]_oxbirthdate[month]"[{if $oView->isFieldRequired(oxuser__oxbirthdate)}] required=""[{/if}]>
            <option value="" label="-">-</option>
            [{section name="month" start=1 loop=13}]
                <option value="[{$smarty.section.month.index}]" label="[{oxmultilang ident="MONTH_NAME_"|cat:$smarty.section.month.index}]" [{if $birthday.month == $smarty.section.month.index}] selected="selected" [{/if}]>
                    [{oxmultilang ident="MONTH_NAME_"|cat:$smarty.section.month.index}]
                </option>
            [{/section}]
        </select>
    </div>
    <label class="req control-label [{*flow*}]col-xs-12 [{*wave*}]col-12 col-lg-3 text-md-left text-lg-right" for="oxYear_[{$sPaymentID}]" style="position: absolute; left: -9999em">[{oxmultilang ident="BIRTHDATE"}] [{oxmultilang ident="YEAR"}]</label>
    <div class="[{*flow*}]col-xs-3 [{*wave*}]col-3 col-lg-3">
        <input id="oxYear_[{$sPaymentID}]" class="oxYear form-control" name="d3bonimascore_[{$sPaymentID}]_oxbirthdate[year]" type="text" maxlength="4" value="[{if $birthday.year > 0}][{$birthday.year}][{/if}]" placeholder="[{oxmultilang ident="YEAR"}]"[{if $oView->isFieldRequired(oxuser__oxbirthdate)}] required=""[{/if}]>
    </div>
</div>