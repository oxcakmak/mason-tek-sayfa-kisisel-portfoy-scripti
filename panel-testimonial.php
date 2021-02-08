<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect("panel/login"); }
if(USER_ROLE!=11){ $oxcakmak->redirect("panel"); }
$oxcakmak->wmMetaTitle($lang['m_testimonial'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_testimonial'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_testimonial'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<!-- Simple Tables -->
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">'.$lang['m_testimonial'].'</h6>
				<a class="btn btn-success" href="#" data-toggle="modal" data-target="#addBrandModal">'.$lang['t_new_testimonial'].'</a>
			</div>
			<div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_new_testimonial'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
						<div class="modal-body">
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mtFullname">'.$lang['t_fullname'].'</label>
                                        <input type="text" class="form-control" id="mtFullname" placeholder="'.$lang['t_fullname'].'">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mtJob">'.$lang['t_job'].'</label>
                                        <input type="text" class="form-control" id="mtJob" placeholder="'.$lang['t_job'].'">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="mtPicture">'.$lang['t_thumbnail'].'</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="mtPicture">
                                            <label class="custom-file-label" for="mtPicture">'.$lang['t_choose_file'].'</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="mtComment">'.$lang['t_comment'].'</label>
                                        <textarea rows="3" class="form-control" id="mtComment" placeholder="'.$lang['t_comment'].'" maxlength="250"></textarea>
                                    </div>
                                </div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
							<button type="button" class="btn btn-success addTestimonial">'.$lang['t_send'].'</button>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive" style="border:1px solid #efefef;">
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th>#</th>
                            <th>'.$lang['t_fullname'].'</th>
                            <th>'.$lang['t_job'].'</th>
                            <th>'.$lang['t_comment'].'</th>
							<th>'.$lang['t_process'].'</th>
						</tr>
					</thead>
					<tbody>';
					$i = 0;
					$dbh->orderBy("testimonial_id", "DESC");
					foreach($dbh->get("testimonial") as $testimonialRow){
					$i++;
					echo '
						<tr id="'.$testimonialRow['testimonial_hash'].'">
							<td>'.$i.'</td>
                            <td>'.$testimonialRow['testimonial_fullname'].'</td>
                            <td>'.$testimonialRow['testimonial_job'].'</td>
                            <td>'.$testimonialRow['testimonial_comment'].'</td>
							<td><a href="#" class="btn btn-sm btn-warning" onclick="editTestimonialItem(\''.$testimonialRow['testimonial_hash'].'\')">'.$lang['t_edit'].'</a>&nbsp;<button class="btn btn-sm btn-danger actionTestimonialBrand" onclick="actionDeleteTestimonial(\''.$testimonialRow['testimonial_hash'].'\')">'.$lang['t_remove'].'</button></td>
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
<div class="modal fade" id="editTestimonialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_edit_testimonial'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="metFullname">'.$lang['t_title'].'</label>
							<input type="text" class="form-control" id="metFullname" placeholder="'.$lang['t_title'].'">
						</div>
                    </div>
                    <div class="col-md-6">
						<div class="form-group">
							<label for="metJob">'.$lang['t_job'].'</label>
							<input type="text" class="form-control" id="metJob" placeholder="'.$lang['t_job'].'">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="metPicture">'.$lang['t_thumbnail'].'</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="metPicture">
								<label class="custom-file-label" for="metPicture">'.$lang['t_choose_file'].'</label>
							</div>
						</div>
                    </div>
                    <div class="col-md-12">
						<div class="form-group">
							<label for="metComment">'.$lang['t_comment'].'</label>
							<textarea rows="3" class="form-control" id="metComment" placeholder="'.$lang['t_comment'].'" maxlength="250"></textarea>
						</div>
					</div>
				</div>
				<span id="metLastHash" style="display:none;"></span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
				<button type="button" class="btn btn-success editTestimonial">'.$lang['t_send'].'</button>
			</div>
		</div>
	</div>
</div>
<script>
$(".addTestimonial").click(function(e){
	$(".addTestimonial").attr("disabled", true);
	var formData = new FormData();
    formData.append("mtFullname", $("#mtFullname").val());
    formData.append("mtJob", $("#mtJob").val());
    formData.append("mtPicture", $("#mtPicture").prop("files")[0]);
    formData.append("mtComment", $("#mtComment").val());
    formData.append("actionAddTestimonial", "actionAddTestimonial");
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
				$(".addTestimonial").attr("disabled", false);
			}else if($.trim(response)=="exists"){
				notify("error", "'.$lang['msg_exists_record'].'");
				$(".addTestimonial").attr("disabled", false);
			}else if($.trim(response) == "extension"){
				notify("error", "'.str_replace("%extension%", "JPG, JPEG, PNG", $lang['msg_upload_file_extension']).'");
				$(".addTestimonial").attr("disabled", false);
			}else if($.trim(response) == "size"){
				notify("error", "'.str_replace("%size%", "5", $lang['msg_upload_file_size']).'");
				$(".addTestimonial").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_testimonial_add_failed'].'");
				$(".addTestimonial").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_testimonial_add_success'].'");
				redirect("'.BASE_URL.'panel/testimonial",1);
			}
		}
	});
});
function editTestimonialItem(hash){
	var tableRow = document.getElementById(hash);
	$("#metFullname").val(tableRow.children[1].outerText);
	$("#metJob").val(tableRow.children[2].outerText);
	$("#metComment").val(tableRow.children[3].outerText);
	$("#metLastHash").attr("value", hash);
	$("#editTestimonialModal").modal("toggle");
}
$(".editTestimonial").click(function(e){
	$(".editTestimonial").attr("disabled", true);
	var formData = new FormData();
    formData.append("mtFullname", $("#metFullname").val());
    formData.append("mtJob", $("#metJob").val());
    formData.append("mtPicture", $("#metPicture").prop("files")[0]);
	formData.append("mtComment", $("#metComment").val());
	formData.append("mtLastHash", $("#metLastHash").attr("value"));
    formData.append("actionUpdateTestimonial", "actionUpdateTestimonial");
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
				$(".editTestimonial").attr("disabled", false);
			}else if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".editTestimonial").attr("disabled", false);
			}else if($.trim(response) == "extension"){
				$(".editTestimonial").attr("disabled", false);
				notify("error", "'.str_replace("%extension%", "JPG, JPEG, PNG", $lang['msg_upload_file_extension']).'");
			}else if($.trim(response) == "size"){
				$(".editTestimonial").attr("disabled", false);
				notify("error", "'.str_replace("%size%", "5", $lang['msg_upload_file_size']).'");
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_testimonial_update_failed'].'");
				$(".editTestimonial").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_testimonial_update_success'].'");
				redirect("'.BASE_URL.'panel/testimonial",1);
			}
		}
	});
});
function actionDeleteTestimonial(hash){
	$(".actionDeleteTestimonial").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {hash:hash, actionDeleteTestimonial:"actionDeleteTestimonial"},
		success: function(response){
			if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".actionDeleteTestimonial").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_testimonial_delete_failed'].'");
				$(".actionDeleteTestimonial").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_testimonial_delete_success'].'");
				redirect("'.BASE_URL.'panel/testimonial",1);
			}
		}
	});
}
</script>
';
include("inc-end.php");
?>