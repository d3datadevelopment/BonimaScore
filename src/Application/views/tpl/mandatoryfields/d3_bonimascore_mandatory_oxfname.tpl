[{assign var="user" value=$oView->getUser()}]

[{block name="d3_bonimascore_mandatory_firstname"}]
    <div class="form-group">
        <label class="req control-label [{*flow*}]col-xs-12 [{*wave*}]col-12 col-lg-3 text-md-left text-lg-right" for="oxFName_[{$sPaymentID}]">[{oxmultilang ident="FIRST_NAME"}]</label>
        <div class="[{*flow*}]col-xs-12 [{*wave*}]col-12 col-lg-9">
            <input
                   id="oxFName_[{$sPaymentID}]"
                   class="oxfname form-control"
                   name="d3bonimascore_[{$sPaymentID}]_oxfname"
                   type="text"
                   maxlength="255"
                   value="[{if $user->getFieldData('oxfname')}][{$user->getFieldData('oxfname')}][{/if}]"
                   [{if $oView->isFieldRequired(oxuser__oxfname)}] required=""[{/if}]
            >
        </div>
    </div>
[{/block}]