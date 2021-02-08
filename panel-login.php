<?php
include("panel-inc-header.php");
$oxcakmak->wmMetaTitle($lang['t_login'], ST_META_SPERATOR, ST_META_STUCK);
if(isset($_SESSION['session'])){ $oxcakmak->redirect("/"); }
echo '
</head>
<body class="bg-gradient-login">
<!-- Login Content -->
<div class="container-login">
<div class="row justify-content-center">
<div class="col-xl-6 col-lg-12 col-md-9">
<div class="card shadow-sm my-5">
<div class="card-body p-0">
<div class="row">
<div class="col-lg-12">
<div class="login-form">
<div class="text-center"><h1 class="h4 text-gray-900 mb-4">'.$lang['t_login'].'</h1></div>
<form class="user">
<div class="form-group"><input type="text" class="form-control" id="user" placeholder="'.$lang['t_username_or_email'].'" value="admin"></div>
<div class="form-group"><input type="password" class="form-control" id="password" placeholder="'.$lang['t_password'].'" value="admin"></div>
<!--
<div class="form-group"><div class="custom-control custom-checkbox small" style="line-height: 1.5rem;"><input type="checkbox" class="custom-control-input" id="customCheck"><label class="custom-control-label" for="customCheck">RememberMe</label>/div></div>
-->
<div class="form-group"><button class="btn btn-primary btn-block actionLogin">'.$lang['t_login'].'</button></div>
<!--
<hr>
<a href="index.html" class="btn btn-google btn-block"><i class="fab fa-google fa-fw"></i> Login with Google</a>
<a href="index.html" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f fa-fw"></i> Login with Facebook</a>
-->
</form>
<!-- <hr> -->
<div class="text-center">'.$lang['t_dont_have_a_account'].'&nbsp;<a class="font-weight-bold small" href="'.BASE_URL.'register">'.$lang['t_register'].'</a></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Login Content -->
';
include("panel-inc-script.php");
echo '
<script>
$(".actionLogin").click(function(e){
	$(".actionLogin").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {user:$("#user").val(), password:$("#password").val(), actionLogin:"actionLogin"},
		success: function(response){
			if($.trim(response)=="empty"){
				notify("error", "'.$lang['msg_not_be_empty'].'");
				$(".actionLogin").attr("disabled", false);
			}else if($.trim(response)=="not_supported_email"){
				notify("error", "'.$lang['msg_not_supported_email'].'");
				$(".actionLogin").attr("disabled", false);
			}else if($.trim(response)=="false"){
				notify("error", "'.$lang['msg_login_false'].'");
				$(".actionLogin").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_login_failed'].'");
				$(".actionLogin").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_login_success'].'");
				$(".actionLogin").attr("disabled", false);
				$("#user").val("");
				$("#password").val("");
				redirect("'.BASE_URL.'panel",3);
			}else if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".actionLogin").attr("disabled", false);
			}
		}
	});
});
</script>
';
include("inc-end.php");
?>