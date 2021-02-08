<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect("panel/login"); }
if(USER_ROLE!=11){ $oxcakmak->redirect("panel"); }
$oxcakmak->wmMetaTitle($lang['t_skill'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['t_skill'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['t_skill'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<!-- Simple Tables -->
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">'.$lang['t_skill'].'</h6>
				<button class="btn btn-success" data-toggle="modal" data-target="#addSkillModal">'.$lang['t_new_skill'].'</button>
			</div>
			<div class="modal fade" id="addSkillModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_new_skill'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="msTitle">'.$lang['t_title'].'</label>
										<input type="text" class="form-control" id="msTitle" placeholder="'.$lang['t_title'].'">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="msPercentage">'.$lang['t_percentage'].'</label>
										<input type="text" class="form-control" id="msPercentage" placeholder="'.$lang['t_percentage'].'">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
							<button type="button" class="btn btn-success addSkill">'.$lang['t_send'].'</button>
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
							<th>'.$lang['t_percentage'].'</th>
							<th>'.$lang['t_process'].'</th>
						</tr>
					</thead>
					<tbody>';
					$i = 0;
					$dbh->orderBy("skill_id", "DESC");
					foreach($dbh->get("skill") as $skillRow){ $i++; echo '
						<tr id="'.$skillRow['skill_hash'].'">
							<td>'.$i.'</a></td>
							<td>'.$skillRow['skill_title'].'</td>
							<td>'.$skillRow['skill_pertencage'].'</td>
							<td><button class="btn btn-sm btn-danger removeSkill" onclick="deleteSkill(\''.$skillRow['skill_hash'].'\')">'.$lang['t_remove'].'</button></td>
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
<script>
function deleteSkill(slug){
	$(".removeSkill").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {skillHash:slug, actionDeleteSkill:"actionDeleteSkill"},
		success: function(response){
			if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".Skill").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_skill_delete_failed'].'");
				$(".Skill").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_skill_delete_success'].'");
				redirect("'.BASE_URL.'panel/skill",1);
			}
		}
	});
}
$(".addSkill").click(function(e){
	$(".addSkill").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {skillTitle:$("#msTitle").val(), skillPercentage:$("#msPercentage").val(), actionAddSkill:"actionAddSkill"},
		success: function(response){
			if($.trim(response)=="empty"){
				notify("error", "'.$lang['msg_not_be_empty'].'");
				$(".addSkill").attr("disabled", false);
			}else if($.trim(response)=="exists"){
				notify("error", "'.$lang['msg_exists_record'].'");
				$(".addSkill").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_skill_add_failed'].'");
				$(".addSkill").attr("disabled", false);
			}else if($.trim(response)=="success"){
				$("#msTitle").val("");
				$("#msPercentage").val("");
				notify("success", "'.$lang['msg_skill_add_success'].'");
				redirect("'.BASE_URL.'panel/skill",2);
			}
		}
	});
});
</script>
';
include("inc-end.php");
?>