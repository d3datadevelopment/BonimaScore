[{assign var="user" value=$oView->getUser()}]

[{block name="d3_bonimascore_mandatory_zip"}]
    <div class="form-group">
        <label class="req control-label [{*flow*}]col-xs-12 [{*wave*}]col-12 col-lg-3 text-md-left text-lg-right" for="oxZip_[{$sPaymentID}]">[{oxmultilang ident="POSTAL_CODE_AND_CITY"}]</label>
        <div class="[{*flow*}]col-xs-5 [{*wave*}]col-5 col-lg-3">
            <input
                   id="oxZip_[{$sPaymentID}]"
                   class="oxzip form-control"
                   name="d3bonimascore_[{$sPaymentID}]_oxzip"
                   type="text"
                   maxlength="50"
                   value="[{if $user->getFieldData('oxzip')}][{$user->getFieldData('oxzip')}][{/if}]"
                   [{if $oView->isFieldRequired(oxuser__oxzip)}] required=""[{/if}]
            >
        </div>
        <label class="req control-label [{*flow*}]col-xs-12 [{*wave*}]col-12 col-lg-3 text-md-left text-lg-right" for="oxCity_[{$sPaymentID}]" style="position: absolute; left: -9999em">[{oxmultilang ident="POSTAL_CODE_AND_CITY"}]</label>
        <div class="[{*flow*}]col-xs-7 [{*wave*}]col-7 col-lg-6">
            <input
                   id="oxCity_[{$sPaymentID}]"
                   class="oxcity form-control"
                   name="d3bonimascore_[{$sPaymentID}]_oxcity"
                   type="text"
                   maxlength="255"
                   value="[{if $user->getFieldData('oxcity')}][{$user->getFieldData('oxcity')}][{/if}]"
                   [{if $oView->isFieldRequired(oxuser__oxcity)}] required=""[{/if}]
            >
        </div>
    </div>
[{/block}]