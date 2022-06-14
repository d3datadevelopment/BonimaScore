[{assign var="user" value=$oView->getUser()}]
[{assign var="salutation" value=$user->getFieldData('oxsal')}]

[{block name="d3_bonimascore_mandatory_salutation"}]
    <div class="form-group">
        <label class="req control-label [{*flow*}]col-xs-12 [{*wave*}]col-12 col-lg-3 text-md-left text-lg-right" for="oxSalutation_[{$sPaymentID}]">[{oxmultilang ident="TITLE"}]</label>
        <div class="[{*flow*}]col-xs-12 [{*wave*}]col-12 col-lg-9">
            <select
                    id="oxSalutation_[{$sPaymentID}]"
                    class="oxMonth form-control selectpicker"
                    name="d3bonimascore_[{$sPaymentID}]_oxsal"
                    [{if $oView->isFieldRequired(oxuser__oxsal)}] required=""[{/if}]
            >
                [{block name="d3_bonimascore_mandatory_salutation_items"}]
                    <option value="" [{if empty($salutation)}]SELECTED[{/if}]>[{oxmultilang ident="D3_BONIMASCORE_SELECT_SALUTATION"}]</option>
                    <option value="MRS" [{if $salutation|lower  == "mrs"}]SELECTED[{/if}]>[{oxmultilang ident="MRS"}]</option>
                    <option value="MR"  [{if $salutation|lower  == "mr"}]SELECTED[{/if}]>[{oxmultilang ident="MR" }]</option>
                [{/block}]
            </select>
        </div>
    </div>
[{/block}]