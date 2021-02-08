<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect("panel/login"); }
if(USER_ROLE!=11){ $oxcakmak->redirect("panel"); }
$oxcakmak->wmMetaTitle($lang['m_social_media'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_social_media'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_social_media'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<!-- Simple Tables -->
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">'.$lang['m_categories'].'</h6>
				<button class="btn btn-success" data-toggle="modal" data-target="#addSocialMediaModal">'.$lang['t_new_social_media'].'</button>
			</div>
			<div class="modal fade" id="addSocialMediaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_new_social_media'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
						<div class="modal-body">
							<div class="form-group">
								<label for="mSocialMedia">'.$lang['t_social_media'].'</label>
								<select class="form-control" id="mSocialMedia" placeholder="'.$lang['t_choose'].'">
									<option value="" selected disabled>'.$lang['t_choose'].'</option>
									<!-- <option value="deneme">deneme</option> -->
									<option value="facebook">Facebook</option>
									<option value="twitter">Twitter</option>
									<option value="instagram">Instagram</option>
									<option value="youtube">Youtube</option>
									<option value="linked-in">Linked In</option>
									<option value="pinterest">Pinterest</option>
									<option value="reddit">Reddit</option>
									<option value="whatsapp">Whatsapp</option>
									<option value="github">Github</option>
									<option value="tumblr">Tumblr</option>
									<option value="skype">Skype</option>
									
								</select>
							</div>
							<div class="form-group">
								<label for="mSocialAddress">'.$lang['t_link'].'</label>
								<input type="text" class="form-control" id="mSocialAddress" placeholder="'.$lang['t_link'].'">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
							<button type="button" class="btn btn-success addSocial">'.$lang['t_send'].'</button>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive" style="border:1px solid #efefef;">
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th>#</th>
							<th>'.$lang['t_title'].'</th>
							<th>'.$lang['t_description'].'</th>
							<th>'.$lang['t_process'].'</th>
						</tr>
					</thead>
					<tbody>';
					$i = 0;
					$dbh->orderBy("social_name", "ASC");
					foreach($dbh->get("social") as $socialRow){ $i++; echo '
						<tr id="'.$socialRow['social_name'].'">
							<td>'.$i.'</a></td>
							<td>'.$socialRow['social_name'].'</td>
							<td>'.$socialRow['social_address'].'</td>
							<td><button class="btn btn-sm btn-warning editSocialBtn" onclick="editSocial(\''.$socialRow['social_name'].'\')">'.$lang['t_edit'].'</button>&nbsp;<button class="btn btn-sm btn-danger deleteSocial" onclick="deleteSocial(\''.$socialRow['social_name'].'\')">'.$lang['t_remove'].'</button></td>
						</tr>
					'; }
					echo '</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
';
include("panel-inc-footer.php");
include("panel-inc-script.php");
echo '
<div class="modal fade" id="editSocialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_edit_social_media'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
			<div class="modal-body">
				<div class="form-group">
					<label for="mSocialMedia">'.$lang['t_social_media'].'</label>
					<select class="form-control" id="meSocialMedia" placeholder="'.$lang['t_category'].'">
						<option value="" selected>'.$lang['t_choose'].'</option>
						<!-- <option value="deneme">deneme</option> -->
						<option value="facebook">Facebook</option>
						<option value="twitter">Twitter</option>
						<option value="instagram">Instagram</option>
						<option value="youtube">Youtube</option>
						<option value="linked-in">Linked In</option>
						<option value="pinterest">Pinterest</option>
						<option value="reddit">Reddit</option>
						<option value="whatsapp">Whatsapp</option>
						<option value="github">Github</option>
						<option value="tumblr">Tumblr</option>
						<option value="skype">Skype</option>
						
					</select>
				</div>
				<div class="form-group">
					<label for="mSocialAddress">'.$lang['t_link'].'</label>
					<input type="text" class="form-control" id="meSocialAddress" placeholder="'.$lang['t_link'].'">
				</div>
				<span style="display:none;" id="meSocialName"></span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
				<button type="button" class="btn btn-success updateSocial">'.$lang['t_send'].'</button>
			</div>
		</div>
	</div>
</div>
<script>
var catSlug;
function editSocial(slug){
	catSlug = document.getElementById(slug);
	$("#meSocialMedia").val(catSlug.children[1].outerText);
	$("#meSocialAddress").val(catSlug.children[2].outerText);
	$("#meSocialName").attr("value", slug);
	$("#editSocialModal").modal("toggle");
}
function deleteSocial(slug){
	$(".deleteSocial").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {socialName:slug, actiondeleteSocial:"actiondeleteSocial"},
		success: function(response){
			if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".deleteSocial").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_social_delete_failed'].'");
				$(".deleteSocial").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_social_delete_success'].'");
				redirect("'.BASE_URL.'panel/social",1);
			}
		}
	});
}
$(".addSocial").click(function(e){
	$(".addSocial").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {socialMedia:$("#mSocialMedia").val(), socialAddress:$("#mSocialAddress").val(), actionAddSocial:"actionAddSocial"},
		success: function(response){
			if($.trim(response)=="empty"){
				notify("error", "'.$lang['msg_not_be_empty'].'");
				$(".addSocial").attr("disabled", false);
			}else if($.trim(response)=="exists"){
				notify("error", "'.$lang['msg_exists_record'].'");
				$(".addSocial").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_social_add_failed'].'");
				$(".addSocial").attr("disabled", false);
			}else if($.trim(response)=="success"){
				$("#mSocialMedia").val("");
				$("#mSocialAddress").val("");
				notify("success", "'.$lang['msg_social_add_success'].'");
				redirect("'.BASE_URL.'panel/social",2);
			}
		}
	});
});
$(".updateSocial").click(function(e){
	$(".updateSocial").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {socialName:$("#meSocialName").attr("value"), socialMedia:$("#meSocialMedia").val(), socialAddress:$("#meSocialAddress").val(), actionUpdatesocial:"actionUpdatesocial"},
		success: function(response){
			if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".updateSocial").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_social_update_failed'].'");
				$(".updateSocial").attr("disabled", false);
			}else if($.trim(response)=="success"){
				$("#meCatTitle").val("");
				$("#meCatDescription").val("");
				notify("success", "'.$lang['msg_social_update_success'].'");
				redirect("'.BASE_URL.'panel/social",2);
			}
		}
	});
});
</script>
';
include("inc-end.php");
?>