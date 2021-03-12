[{assign var="user" value=$oView->getUser()}]

[{block name="d3_bonimascore_mandatory_lastname"}]
    <div class="form-group">
        <label class="req control-label [{*flow*}]col-xs-12 [{*wave*}]col-12 col-lg-3 text-md-left text-lg-right" for="oxLName_[{$sPaymentID}]">[{oxmultilang ident="LAST_NAME"}]</label>
        <div class="[{*flow*}]col-xs-12 [{*wave*}]col-12 col-lg-9">
            <input
                   id="oxLName_[{$sPaymentID}]"
                   class="oxlname form-control"
                   name="d3bonimascore_[{$sPaymentID}]_oxlname"
                   type="text"
                   maxlength="255"
                   value="[{if $user->getFieldData('oxlname')}][{$user->getFieldData('oxlname')}][{/if}]"
                   [{if $oView->isFieldRequired(oxuser__oxlname)}] required=""[{/if}]
            >
        </div>
    </div>
[{/block}]