define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'ccbill_custompaymentopyion',
                component: 'CCBill_CustomPaymentOption/js/view/payment/method-renderer/custompayments'
            }
        );
