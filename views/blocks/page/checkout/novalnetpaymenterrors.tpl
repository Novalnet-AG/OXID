[{$smarty.block.parent}]
[{assign var="iPayError" value=$oView->getPaymentError()}]

[{if $iPayError == -50}]    
    [{if method_exists($oViewConf, 'getActiveTheme') && in_array($oViewConf->getActiveTheme(), array('flow','wave'))}]
        <div class="alert alert-danger">[{$oView->getPaymentErrorText()}]</div>    
    [{else}]
        <div class="status error">[{$oView->getPaymentErrorText()}]</div>
    [{/if}]
[{/if}]
