<?php
echo '<script src="'.PANEL_ASSETS_FOLDER.'vendor/jquery/jquery.min.js"></script>
<script src="'.PANEL_ASSETS_FOLDER.'vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="'.PANEL_ASSETS_FOLDER.'vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="'.PANEL_ASSETS_FOLDER.'js/ruang-admin.min.js"></script>
<script src="'.PANEL_ASSETS_FOLDER.'vendor/notyf/notyf.min.js"></script>
<script>
var notyf = new Notyf({
	duration: 2500,
	position: {
		x: "right",
		y: "top",
	}
});
function notify(nType, nMessage){
	notyf.open({
		type: nType,
		message: nMessage
	});
}
function redirect(address, time){
	setInterval(function(){
		window.location.href=address;
	},time*1000);
}
';
if(DEMO_MODE==1){ echo '
var _send = XMLHttpRequest.prototype.send;
	XMLHttpRequest.prototype.send = function() {
	/* Wrap onreadystaechange callback */
	var callback = this.onreadystatechange;
	this.onreadystatechange = function() {             
		if (this.readyState == 4) { notify("error", "'.$lang['msg_demo_mode'].'"); $("button").attr("disabled", false); }
		callback.apply(this, arguments);
	}
	_send.apply(this, arguments);
}
'; }
echo '</script>';
/*
notify("error", "'.$lang['msg_unsubscribe_failed'].'");
notify("success", "'.$lang['msg_unsubscribe_success'].'");
$(".actionUnsubscribe").attr("disabled", false);
*/
?>