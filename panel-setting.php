<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect("panel/login"); }
$oxcakmak->wmMetaTitle($lang['m_setting'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_setting'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_setting'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">'.$lang['t_password_update'].'</h6></div>
			<div class="card-body">
				<form>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="uPwLast">'.$lang['t_password'].'</label>
								<input type="text" class="form-control" id="uPwLast" placeholder="'.$lang['t_password'].'">
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="uPwNew">'.$lang['t_password'].'</label>
								<input type="text" class="form-control" id="uPwNew" placeholder="'.$lang['t_password'].'">
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="uPwReNew">'.$lang['t_password'].'</label>
								<input type="text" class="form-control" id="uPwReNew" placeholder="'.$lang['t_password'].'">
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
					</div>
					<button class="btn btn-md btn-primary actionUpdatePassword">'.$lang['t_update'].'</button>
				</form>
			</div>
		</div>
	</div>
</div>
';
if(USER_ROLE==11){ echo '
<div class="row">
	<div class="col-md-5">
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">'.$lang['m_home'].'</h6></div>
			<div class="card-body">
				<form>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="stTitle">'.$lang['t_title'].'</label>
								<input type="text" class="form-control" id="stTitle" placeholder="'.$lang['t_title'].'" value="'.ST_META_TITLE.'">
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="stStuck">'.$lang['t_stuck'].'</label>
								<input type="text" class="form-control" id="stStuck" placeholder="'.$lang['t_stuck'].'" value="'.ST_META_STUCK.'">
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="stSperator">'.$lang['t_sperator'].'</label>
								<input type="text" class="form-control" id="stSperator" placeholder="'.$lang['t_sperator'].'" value="'.ST_META_SPERATOR.'">
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="stDescription">'.$lang['t_description'].'</label>
								<textarea type="text" class="form-control" id="stDescription" placeholder="'.$lang['t_description'].'" rows="3">'.ST_META_DESCRIPTION.'</textarea>
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="stKeyword">'.$lang['t_keywords'].'</label>
								<textarea type="text" class="form-control" id="stKeyword" placeholder="'.$lang['t_keyword'].'" rows="3">'.ST_META_KEYWORD.'</textarea>
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="stFooter">'.$lang['t_sperator'].'</label>
								<input type="text" class="form-control" id="stFooter" placeholder="'.$lang['t_sperator'].'" value="'.htmlentities(ST_FOOTER).'">
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
					</div>
					<button class="btn btn-lg btn-primary btn-block actionUpdateSystemMeta">'.$lang['t_update'].'</button>
				</form>
			</div>
		</div>
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">'.$lang['m_contact'].'</h6></div>
			<div class="card-body">
				<form>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="stContactLocation">'.$lang['t_location'].'</label>
								<input type="text" class="form-control" id="stContactLocation" placeholder="'.$lang['t_location'].'" value="'.ST_CONTACT_LOCATION.'">
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="stContactPhone">'.$lang['t_phone'].'</label>
								<input type="text" class="form-control" id="stContactPhone" placeholder="'.$lang['t_phone'].'" value="'.ST_CONTACT_PHONE.'">
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="stContactEmail">'.$lang['t_email'].'</label>
								<input type="text" class="form-control" id="stContactEmail" placeholder="'.$lang['t_email'].'" value="'.ST_CONTACT_EMAIL.'">
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
					</div>
					<button class="btn btn-lg btn-primary btn-block actionUpdateSystemContact">'.$lang['t_update'].'</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">'.$lang['m_banner'].'</h6></div>
			<div class="card-body">
				<form>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="stBannerTitle">'.$lang['t_title'].'</label>
								<input type="text" class="form-control" id="stBannerTitle" placeholder="'.$lang['t_title'].'" value="'.ST_BANNER_TITLE.'">
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="stBannerFirst">'.$lang['t_sub_title'].'</label>
								<input type="text" class="form-control" id="stBannerFirst" placeholder="'.$lang['t_sub_title'].'" value="'.ST_BANNER_FIRST.'">
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="stBannerImage">'.$lang['t_thumbnail_background'].'</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="stBannerImage">
									<label class="custom-file-label" for="stBannerImage">'.$lang['t_choose_file'].'</label>
									<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
								</div>
							</div>
						</div>
					</div>
					<button class="btn btn-lg btn-primary btn-block actionUpdateSystemBanner">'.$lang['t_update'].'</button>
				</form>
			</div>
		</div>
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">'.$lang['t_pre_edit'].'</h6></div>
			<div class="card-body">
				<form>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="stPreParticles">'.$lang['t_particles'].'</label>
								<select class="form-control" id="stPreParticles" placeholder="'.$lang['t_status'].'">
									<option value="" selected disabled>'.$lang['t_choose'].'</option>
									<!-- <option value="deneme">deneme</option> -->
									<option value="1"'; if(ST_PARTICLES_STATUS==1){echo' selected';} echo '>'.$lang['t_active'].'</option>
									<option value="0"'; if(ST_PARTICLES_STATUS==0){echo' selected';} echo '>'.$lang['t_passive'].'</option>
								</select>
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="stPreLoader">'.$lang['t_pre_loader'].'</label>
								<select class="form-control" id="stPreLoader" placeholder="'.$lang['t_status'].'">
									<option value="" selected disabled>'.$lang['t_choose'].'</option>
									<!-- <option value="deneme">deneme</option> -->
									<option value="1"'; if(ST_PRELOADER_STATUS==1){echo' selected';} echo '>'.$lang['t_active'].'</option>
									<option value="0"'; if(ST_PRELOADER_STATUS==0){echo' selected';} echo '>'.$lang['t_passive'].'</option>
								</select>
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
					</div>
					<button class="btn btn-lg btn-primary btn-block actionUpdateSystemPre">'.$lang['t_update'].'</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">'.$lang['m_about'].'</h6></div>
			<div class="card-body">
				<form>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="stAboutFullname">'.$lang['t_fullname'].'</label>
								<input type="text" class="form-control" id="stAboutFullname" placeholder="'.$lang['t_fullname'].'" value="'.ST_ABOUT_NAME.'">
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="stAboutJob">'.$lang['t_job'].'</label>
								<input type="text" class="form-control" id="stAboutJob" placeholder="'.$lang['t_job'].'" value="'.ST_ABOUT_JOB.'">
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="stAboutContent">'.$lang['t_content'].'</label>
								<textarea type="text" class="form-control" id="stAboutContent" placeholder="'.$lang['t_content'].'" rows="3">'.ST_ABOUT_CONTENT.'</textarea>
								<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="stAboutImage">'.$lang['t_thumbnail'].'</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="stAboutImage">
									<label class="custom-file-label" for="stAboutImage">'.$lang['t_choose_file'].'</label>
									<!-- <small id="emailHelp" class="form-text text-muted">Well never share youremail with anyone else.</small> -->
								</div>
							</div>
						</div>
					</div>
					<button class="btn btn-lg btn-primary btn-block actionUpdateSystemAbout">'.$lang['t_update'].'</button>
				</form>
			</div>
		</div>
	</div>
</div>
'; }
include("panel-inc-footer.php");
include("panel-inc-script.php");
echo '
<script>
$(".actionUpdatePassword").click(function(e){
	$(".actionUpdatePassword").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {pwLast: $("#uPwLast").val(), pwNew: $("#st").val(), pwReNew: $("#uPwReNew").val(), actionUpdatePassword:"actionUpdatePassword"},
		success: function(response){
			if($.trim(response) == "empty"){
				notify("error", "'.$lang['msg_not_be_empty'].'");
				$(".actionUpdatePassword").attr("disabled", false);
			}else if($.trim(response) == "not_equal_last"){
				notify("error", "'.$lang['msg_not_equal'].'");
				$(".actionUpdatePassword").attr("disabled", false);
			}else if($.trim(response) == "not_equal_new"){
				notify("error", "'.$lang['msg_not_equal'].'");
				$(".actionUpdatePassword").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				notify("error", "'.$lang['msg_password_update_failed'].'");
				$(".actionUpdatePassword").attr("disabled", false);
			}else if($.trim(response) == "success"){
				$("#uPwLast").val("");
				$("#st").val("");
				$("#uPwReNew").val("");
				notify("success", "'.$lang['msg_password_update_success'].'");
				redirect("'.BASE_URL.'panel/setting",2);
			}
		}
	});
});
';
if(USER_ROLE==11){
echo '
$(".actionUpdateSystemMeta").click(function(e){
	$(".actionUpdateSystemMeta").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {stTitle: $("#stTitle").val(), stDescription: $("#stDescription").val(), stKeyword: $("#stKeyword").val(), stStuck: $("#stStuck").val(), stSperator: $("#stSperator").val(), stFooter: $("#stFooter").val(), actionUpdateSystemMeta:"actionUpdateSystem"},
		success: function(response){
			if($.trim(response) == "empty"){
				notify("error", "'.$lang['msg_not_be_empty'].'");
				$(".actionUpdateSystemMeta").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				notify("error", "'.$lang['msg_system_update_failed'].'");
				$(".actionUpdateSystemMeta").attr("disabled", false);
			}else if($.trim(response) == "success"){
				$("#stTitle").val("");
				$("#stDescription").val("");
				$("#stKeyword").val("");
				$("#stStuck").val("");
				$("#stSperator").val("");
				$("#stFooter").val("");
				notify("success", "'.$lang['msg_system_update_success'].'");
				redirect("'.BASE_URL.'panel/setting",2);
			}
		}
	});
});
$(".actionUpdateSystemContact").click(function(e){
	$(".actionUpdateSystemContact").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {stContactLocation: $("#stContactLocation").val(), stContactEmail: $("#stContactEmail").val(), stContactPhone: $("#stContactPhone").val(), actionUpdateSystemContact:"actionUpdateSystemContact"},
		success: function(response){
			if($.trim(response) == "empty"){
				notify("error", "'.$lang['msg_not_be_empty'].'");
				$(".actionUpdateSystemContact").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				notify("error", "'.$lang['msg_system_update_failed'].'");
				$(".actionUpdateSystemContact").attr("disabled", false);
			}else if($.trim(response) == "success"){
				$("#stContactLocation").val("");
				$("#stContactEmail").val("");
				$("#stContactPhone").val("");
				notify("success", "'.$lang['msg_system_update_success'].'");
				redirect("'.BASE_URL.'panel/setting",2);
			}
		}
	});
});
$(".actionUpdateSystemBanner").click(function(e){
	$(".actionUpdateSystemBanner").attr("disabled", true);
	var formData = new FormData();
    formData.append("stBannerTitle", $("#stBannerTitle").val());
    formData.append("stBannerFirst", $("#stBannerFirst").val());
	formData.append("stBannerImage", $("#stBannerImage").prop("files")[0]);
    formData.append("actionUpdateSystemBanner", "actionUpdateSystemBanner");
    $.ajax({
        type: "POST",
        url: "'.ACTION_URL.'",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
		success: function(response){
			if($.trim(response)=="empty"){
				notify("error", "'.$lang['msg_not_be_empty'].'");
				$(".actionUpdateSystemBanner").attr("disabled", false);
			}else if($.trim(response)=="exists"){
				notify("error", "'.$lang['msg_exists_record'].'");
				$(".actionUpdateSystemBanner").attr("disabled", false);
			}else if($.trim(response) == "extension"){
				notify("error", "'.str_replace("%extension%", "JPG, JPEG, PNG", $lang['msg_upload_file_extension']).'");
				$(".actionUpdateSystemBanner").attr("disabled", false);
			}else if($.trim(response) == "size"){
				notify("error", "'.str_replace("%size%", "5", $lang['msg_upload_file_size']).'");
				$(".actionUpdateSystemBanner").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_system_update_failed'].'");
				$(".actionUpdateSystemBanner").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_system_update_success'].'");
				redirect("'.BASE_URL.'panel/setting",1);
			}
		}
	});
});

$(".actionUpdateSystemAbout").click(function(e){
	$(".actionUpdateSystemAbout").attr("disabled", true);
	var formData = new FormData();
    formData.append("stAboutFullname", $("#stAboutFullname").val());
	formData.append("stAboutJob", $("#stAboutJob").val());
	formData.append("stAboutContent", $("#stAboutContent").val());
	formData.append("stAboutImage", $("#stAboutImage").prop("files")[0]);
    formData.append("actionUpdateSystemAbout", "actionUpdateSystemAbout");
    $.ajax({
        type: "POST",
        url: "'.ACTION_URL.'",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
		success: function(response){
			if($.trim(response)=="empty"){
				notify("error", "'.$lang['msg_not_be_empty'].'");
				$(".actionUpdateSystemAbout").attr("disabled", false);
			}else if($.trim(response)=="exists"){
				notify("error", "'.$lang['msg_exists_record'].'");
				$(".actionUpdateSystemAbout").attr("disabled", false);
			}else if($.trim(response) == "extension"){
				notify("error", "'.str_replace("%extension%", "JPG, JPEG, PNG", $lang['msg_upload_file_extension']).'");
				$(".actionUpdateSystemAbout").attr("disabled", false);
			}else if($.trim(response) == "size"){
				notify("error", "'.str_replace("%size%", "5", $lang['msg_upload_file_size']).'");
				$(".actionUpdateSystemAbout").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_system_update_failed'].'");
				$(".actionUpdateSystemAbout").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_system_update_success'].'");
				redirect("'.BASE_URL.'panel/setting",1);
			}
		}
	});
});
$(".actionUpdateSystemPre").click(function(e){
	$(".actionUpdateSystemPre").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {preParticles: $("#stPreParticles").val(), preLoader: $("#stPreLoader").val(), actionUpdateSystemPre:"actionUpdateSystemPre"},
		success: function(response){
			if($.trim(response) == "empty"){
				notify("error", "'.$lang['msg_not_be_empty'].'");
				$(".actionUpdateSystemPre").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				notify("error", "'.$lang['msg_system_update_failed'].'");
				$(".actionUpdateSystemPre").attr("disabled", false);
			}else if($.trim(response) == "success"){
				$("#stPreParticles").val("");
				$("#stPreLoader").val("");
				notify("success", "'.$lang['msg_system_update_success'].'");
				redirect("'.BASE_URL.'panel/setting",2);
			}
		}
	});
});
'; }
echo '
</script>
';
include("inc-end.php");
?>