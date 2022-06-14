[{assign var="user" value=$oView->getUser()}]

[{block name="d3_bonimascore_mandatory_street"}]
    <div class="form-group">
        <label class="req control-label [{*flow*}]col-xs-12 [{*wave*}]col-12 col-lg-3 text-md-left text-lg-right" for="oxStreet_[{$sPaymentID}]">[{oxmultilang ident="STREET_AND_STREETNO"}]</label>
        <div class="[{*flow*}]col-xs-8 [{*wave*}]col-8 col-lg-6">
            <input
                   id="oxStreet_[{$sPaymentID}]"
                   class="oxstreet form-control"
                   name="d3bonimascore_[{$sPaymentID}]_oxstreet"
                   type="text"
                   maxlength="255"
                   value="[{if $user->getFieldData('oxstreet')}][{$user->getFieldData('oxstreet')}][{/if}]"
                   [{if $oView->isFieldRequired(oxuser__oxstreet)}] required=""[{/if}]
            >
        </div>
        <label class="req control-label[{*flow*}]col-xs-12 [{*wave*}]col-12 col-lg-3 text-md-left text-lg-right" for="oxStreetNr_[{$sPaymentID}]" style="position: absolute; left: -9999em">[{oxmultilang ident="STREET_AND_STREETNO"}]</label>
        <div class="[{*flow*}]col-xs-4 [{*wave*}]col-4 col-lg-3">
            <input
                   id="oxStreetNr_[{$sPaymentID}]"
                   class="oxstreetnr form-control"
                   name="d3bonimascore_[{$sPaymentID}]_oxstreetnr"
                   type="text"
                   maxlength="16"
                   value="[{if $user->getFieldData('oxstreetnr')}][{$user->getFieldData('oxstreetnr')}][{/if}]"
                   [{if $oView->isFieldRequired(oxuser__oxstreetnr)}] required=""[{/if}]
            >
        </div>
    </div>
[{/block}]