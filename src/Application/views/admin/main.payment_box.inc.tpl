<div class="input-box">
    <label for="[{$sPaymentId}]_safepayments" style="position: absolute; left: -9999em">[{oxmultilang ident="d3bonimascore_mypayments"}]</label>
    <select name="config[[{$sConfigId}]][payments][]" size="4" multiple="multiple" id="[{$sPaymentId}]_safepayments">
        [{foreach from=$oPaymentList key='sPaymentId' item='oPayment'}]
            [{if false == $oView->isSafePayment($sPaymentId)}]
                <option value="[{$sPaymentId}]" [{if $sPaymentId|@in_array:$aSelectedPayments}]selected="selected"[{/if}]>[{$oPayment->getFieldData('oxdesc')}]</option>
            [{/if}]
        [{/foreach}]
    </select>
</div>