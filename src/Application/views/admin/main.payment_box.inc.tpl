<div class="input-box">
    <label for="[{$sPaymentId}]_safepayments" style="position: absolute; left: -9999em">[{oxmultilang ident="d3bonimascore_mypayments"}]</label>
    <select name="config[[{$sConfigId}]][payments][]" size="4" multiple="multiple" id="[{$sPaymentId}]_safepayments">
        <option>[{oxmultilang ident="D3_BONIMASCORE_PAYMENTS_PLEASE_CHOOSE"}]</option>
        [{foreach from=$oPaymentList key='sPaymentId' item='oPayment'}]
            [{if false == $oView->isSafePayment($sPaymentId)}]
                [{block name="d3_bonimascore_matrix_paymentitem"}]
                    <option value="[{$sPaymentId}]" [{if $sPaymentId|@in_array:$aSelectedPayments}]selected="selected"[{/if}]>[{$oPayment->getFieldData('oxdesc')}]</option>
                [{/block}]
            [{/if}]
        [{/foreach}]
    </select>
</div>