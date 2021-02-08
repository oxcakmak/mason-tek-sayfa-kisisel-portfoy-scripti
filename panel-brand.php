<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect("panel/login"); }
if(USER_ROLE!=11){ $oxcakmak->redirect("panel"); }
$oxcakmak->wmMetaTitle($lang['m_brand'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_brand'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_brand'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<!-- Simple Tables -->
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">'.$lang['m_brand'].'</h6>
				<a class="btn btn-success" href="#" data-toggle="modal" data-target="#addBrandModal">'.$lang['t_new_brand'].'</a>
			</div>
			<div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_new_brand'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="mbTitle">'.$lang['t_title'].'</label>
										<input type="text" class="form-control" id="mbTitle" placeholder="'.$lang['t_title'].'">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="mbThumbnail">'.$lang['t_thumbnail'].'</label>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="mbThumbnail">
											<label class="custom-file-label" for="mbThumbnail">'.$lang['t_choose_file'].'</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
							<button type="button" class="btn btn-success addBrand">'.$lang['t_send'].'</button>
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
							<th>'.$lang['t_process'].'</th>
						</tr>
					</thead>
					<tbody>';
					$i = 0;
					$dbh->orderBy("brand_id", "DESC");
					foreach($dbh->get("brand") as $brandRow){
					$i++;
					echo '
						<tr id="'.$brandRow['brand_hash'].'">
							<td>'.$i.'</td>
							<td>'.$brandRow['brand_title'].'</td>
							<td><a href="#" class="btn btn-sm btn-warning" onclick="editBrandItem(\''.$brandRow['brand_hash'].'\')">'.$lang['t_edit'].'</a>&nbsp;<button class="btn btn-sm btn-danger actionDeleteBrand" onclick="actionDeleteBrand(\''.$brandRow['brand_hash'].'\')">'.$lang['t_remove'].'</button></td>
						</tr>';
					}
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
<div class="modal fade" id="editBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_edit_brand'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="mebTitle">'.$lang['t_title'].'</label>
							<input type="text" class="form-control" id="mebTitle" placeholder="'.$lang['t_title'].'">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="mebThumbnail">'.$lang['t_thumbnail'].'</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="mebThumbnail">
								<label class="custom-file-label" for="mebThumbnail">'.$lang['t_choose_file'].'</label>
							</div>
						</div>
					</div>
				</div>
				<span id="mbLastHash" style="display:none;"></span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
				<button type="button" class="btn btn-success editBrand">'.$lang['t_send'].'</button>
			</div>
		</div>
	</div>
</div>
<script>
$(".addBrand").click(function(e){
	$(".addBrand").attr("disabled", true);
	var formData = new FormData();
    formData.append("mbTitle", $("#mbTitle").val());
	formData.append("mbThumbnail", $("#mbThumbnail").prop("files")[0]);
    formData.append("actionAddBrand", "actionAddBrand");
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
				$(".addBrand").attr("disabled", false);
			}else if($.trim(response)=="exists"){
				notify("error", "'.$lang['msg_exists_record'].'");
				$(".addBrand").attr("disabled", false);
			}else if($.trim(response) == "extension"){
				notify("error", "'.str_replace("%extension%", "JPG, JPEG, PNG", $lang['msg_upload_file_extension']).'");
				$(".addBrand").attr("disabled", false);
			}else if($.trim(response) == "size"){
				notify("error", "'.str_replace("%size%", "5", $lang['msg_upload_file_size']).'");
				$(".addBrand").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_brand_add_failed'].'");
				$(".addBrand").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_brand_add_success'].'");
				redirect("'.BASE_URL.'panel/brand",1);
			}
		}
	});
});
function editBrandItem(slug){
	var tableRow = document.getElementById(slug);
	$("#mebTitle").val(tableRow.children[1].outerText);
	$("#mbLastHash").attr("value", slug);
	$("#editBrandModal").modal("toggle");
}
$(".editBrand").click(function(e){
	$(".editBrand").attr("disabled", true);
	var formData = new FormData();
    formData.append("mbTitle", $("#mebTitle").val());
	formData.append("mbThumbnail", $("#mebThumbnail").prop("files")[0]);
	formData.append("mbLastHash", $("#mbLastHash").attr("value"));
    formData.append("actionUpdateBrand", "actionUpdateBrand");
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
				$(".editBrand").attr("disabled", false);
			}else if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_exists_record'].'");
				$(".editBrand").attr("disabled", false);
			}else if($.trim(response) == "extension"){
				$(".editBrand").attr("disabled", false);
				notify("error", "'.str_replace("%extension%", "JPG, JPEG, PNG", $lang['msg_upload_file_extension']).'");
			}else if($.trim(response) == "size"){
				$(".editBrand").attr("disabled", false);
				notify("error", "'.str_replace("%size%", "5", $lang['msg_upload_file_size']).'");
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_brand_update_failed'].'");
				$(".editBrand").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_brand_update_success'].'");
				redirect("'.BASE_URL.'panel/brand",1);
			}
		}
	});
});
function actionDeleteBrand(hash){
	$(".actionDeleteBrand").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {hash:hash, actionDeleteBrand:"actionDeleteBrand"},
		success: function(response){
			if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".actionDeleteBrand").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_brand_delete_failed'].'");
				$(".actionDeleteBrand").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_brand_delete_success'].'");
				redirect("'.BASE_URL.'panel/brand",1);
			}
		}
	});
}
</script>
';
include("inc-end.php");
?>