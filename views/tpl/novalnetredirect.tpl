<script type="text/javascript">
setTimeout(function(){ document.getElementById('novalnet_button_submit').click(); }, 500);
var beforeSubmitted = false;
function checkBeforeSubmit(){
  if (!beforeSubmitted) {
	beforeSubmitted = true;
	return beforeSubmitted;
  }
  return false;
}
document.addEventListener("keydown", keydownFunction);
function keydownFunction(e) {
	if (e.which && e.keyCode == 116) {	e.preventDefault();	}
	if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {e.preventDefault();}
	if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {e.preventDefault();}
	if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {	e.preventDefault();}
	if (e.ctrlKey && e.keyCode == 85) {	e.preventDefault();}
	if (e.keyCode == 123) {e.preventDefault();}
	if (e.which && e.ctrlKey && e.keyCode == 82) {e.preventDefault();}
}
</script>

[{if in_array($oViewConf->getActiveTheme(), array('flow', 'wave'))}]
[{capture append="oxidBlock_pageBody"}]
    [{include file="layout/header.tpl"}]
        <div id="wrapper" style="height:420px;padding:2em;">
            <label>[{ oxmultilang ident="NOVALNET_REDIRECT_MESSAGE" }]</label>
                 <form action="[{$sNovalnetFormAction}]" id="novalnet_redirect_form" method="post" onsubmit="return checkBeforeSubmit()">
                    [{foreach key=sNovalnetKey from=$aNovalnetFormData item=sNovalnetValue}]
                    <input type="hidden" name="[{$sNovalnetKey}]" value="[{$sNovalnetValue}]" />
                    [{/foreach}]
                    <input type="submit" id="novalnet_button_submit" class="btn btn-primary" value="[{oxmultilang ident='NOVALNET_REDIRECT_SUBMIT'}]" />
                    </form>
                    
        </div>
    [{include file="layout/footer.tpl"}]
[{/capture}]
[{include file="layout/base.tpl"}]
[{else}]
<style>
	#novalnet_button_submit {
		height:32px;
	}
</style>
[{capture append="oxidBlock_pageBody"}]
<div id="page">
    [{include file="layout/header.tpl"}]
        <div id="wrapper" style="height:420px;padding:2em;">
            <label>[{ oxmultilang ident="NOVALNET_REDIRECT_MESSAGE" }]</label>
                 <form action="[{$sNovalnetFormAction}]" id="novalnet_redirect_form" method="post" onsubmit="return checkBeforeSubmit()">
                    [{foreach key=sNovalnetKey from=$aNovalnetFormData item=sNovalnetValue}]
                    <input type="hidden" name="[{$sNovalnetKey}]" value="[{$sNovalnetValue}]" />
                    [{/foreach}]
                    
                    <button type="submit" id="novalnet_button_submit" class="submitButton largeButton">[{oxmultilang ident='NOVALNET_REDIRECT_SUBMIT'}]</button>
                    
                    </form>
                    
        </div>
    [{include file="layout/footer.tpl"}]
    </div>
[{/capture}]
[{include file="layout/base.tpl"}]
[{/if}]

