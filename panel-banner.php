<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect("panel/login"); }
if(USER_ROLE!=11){ $oxcakmak->redirect("panel"); }
$oxcakmak->wmMetaTitle($lang['m_banner'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_banner'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_banner'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<!-- Simple Tables -->
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">'.$lang['m_banner'].'</h6>
				<button class="btn btn-success" data-toggle="modal" data-target="#addSkillModal">'.$lang['t_new_banner'].'</button>
			</div>
			<div class="modal fade" id="addSkillModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_new_banner'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="bannerText">'.$lang['t_paragraph'].'</label>
										<input type="text" class="form-control" id="bannerText" placeholder="'.$lang['t_paragraph'].'">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
							<button type="button" class="btn btn-success addBanner">'.$lang['t_send'].'</button>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive" style="border:1px solid #efefef;">
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th>#</th>
							<th>'.$lang['t_paragraph'].'</th>
							<th>'.$lang['t_process'].'</th>
						</tr>
					</thead>
					<tbody>';
					$i = 0;
					$dbh->orderBy("banner_id", "DESC");
					foreach($dbh->get("banner") as $bannerRow){ $i++; echo '
						<tr>
							<td>'.$i.'</a></td>
							<td>'.$bannerRow['banner_text'].'</td>
							<td><button class="btn btn-sm btn-danger removeBanner" onclick="deleteBanner(\''.$bannerRow['banner_hash'].'\')">'.$lang['t_remove'].'</button></td>
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
function deleteBanner(slug){
	$(".removeBanner").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {bannerHash:slug, actionDeleteBanner:"actionDeleteBanner"},
		success: function(response){
			if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".removeBanner").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_banner_delete_failed'].'");
				$(".removeBanner").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_banner_delete_success'].'");
				redirect("'.BASE_URL.'panel/banner",1);
			}
		}
	});
}
$(".addBanner").click(function(e){
	$(".addBanner").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {bannerText:$("#bannerText").val(), actionAddBanner:"actionAddBanner"},
		success: function(response){
			if($.trim(response)=="empty"){
				notify("error", "'.$lang['msg_not_be_empty'].'");
				$(".addBanner").attr("disabled", false);
			}else if($.trim(response)=="exists"){
				notify("error", "'.$lang['msg_exists_record'].'");
				$(".addBanner").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_banner_add_failed'].'");
				$(".addSkill").attr("disabled", false);
			}else if($.trim(response)=="success"){
				$("#bannerText").val("");
				notify("success", "'.$lang['msg_banner_add_success'].'");
				redirect("'.BASE_URL.'panel/banner",2);
			}
		}
	});
});
</script>
';
include("inc-end.php");
?>