<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect("panel/login"); }
if(USER_ROLE!=11){ $oxcakmak->redirect("panel"); }
$oxcakmak->wmMetaTitle($lang['m_services'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_services'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_services'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<!-- Simple Tables -->
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">'.$lang['m_services'].'</h6>
				<button class="btn btn-success" data-toggle="modal" data-target="#addServiceModal">'.$lang['t_new_service'].'</button>
			</div>
			<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_new_service'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="msIcon">'.$lang['t_icon'].'</label>
										<input type="text" class="form-control" id="msIcon" placeholder="'.$lang['t_icon'].'">
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label for="msTitle">'.$lang['t_title'].'</label>
										<input type="text" class="form-control" id="msTitle" placeholder="'.$lang['t_title'].'">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="msDescription">'.$lang['t_description'].'</label>
								<textarea class="form-control" id="msDescription" placeholder="'.$lang['t_description'].'" rows="3"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
							<button type="button" class="btn btn-success addService">'.$lang['t_send'].'</button>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive" style="border:1px solid #efefef;">
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th>#</th>
							<th>'.$lang['t_icon'].'</th>
							<th>'.$lang['t_title'].'</th>
							<th>'.$lang['t_description'].'</th>
							<th>'.$lang['t_process'].'</th>
						</tr>
					</thead>
					<tbody>';
					$i = 0;
					$dbh->orderBy("service_id", "DESC");
					foreach($dbh->get("service") as $serviceRow){ $i++; echo '
						<tr id="'.$serviceRow['service_hash'].'">
							<td>'.$i.'</a></td>
							<td>'.$serviceRow['service_icon'].'</td>
							<td>'.$serviceRow['service_title'].'</td>
							<td>'.$serviceRow['service_description'].'</td>
							<td><button class="btn btn-sm btn-warning editServiceBtn" onclick="editService(\''.$serviceRow['service_hash'].'\')">'.$lang['t_edit'].'</button>&nbsp;<button class="btn btn-sm btn-danger removeService" onclick="deleteService(\''.$serviceRow['service_hash'].'\')">'.$lang['t_remove'].'</button></td>
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
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_edit_service'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="mesIcon">'.$lang['t_icon'].'</label>
							<input type="text" class="form-control" id="mesIcon" placeholder="'.$lang['t_icon'].'">
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label for="mesTitle">'.$lang['t_title'].'</label>
							<input type="text" class="form-control" id="mesTitle" placeholder="'.$lang['t_title'].'">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="mesDescription">'.$lang['t_description'].'</label>
					<textarea class="form-control" id="mesDescription" placeholder="'.$lang['t_description'].'" rows="3"></textarea>
				</div>
				<span style="display:none;" id="mesHash"></span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
				<button type="button" class="btn btn-success updateService">'.$lang['t_send'].'</button>
			</div>
		</div>
	</div>
</div>
<script>
var catSlug;
function editService(slug){
	catSlug = document.getElementById(slug);
	$("#mesIcon").val(catSlug.children[1].outerText);
	$("#mesTitle").val(catSlug.children[2].outerText);
	$("#mesDescription").val(catSlug.children[3].outerText);
	$("#mesHash").attr("value", slug);
	$("#editServiceModal").modal("toggle");
}
function deleteService(slug){
	$(".removeService").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {serviceHash:slug, actionDeleteService:"actionDeleteService"},
		success: function(response){
			if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".removeService").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_service_delete_failed'].'");
				$(".removeService").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_service_delete_success'].'");
				redirect("'.BASE_URL.'panel/service",1);
			}
		}
	});
}
$(".addService").click(function(e){
	$(".addService").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {serviceIcon:$("#msIcon").val(), serviceTitle:$("#msTitle").val(), serviceDescription:$("#msDescription").val(), actionAddService:"actionAddService"},
		success: function(response){
			if($.trim(response)=="empty"){
				notify("error", "'.$lang['msg_not_be_empty'].'");
				$(".addService").attr("disabled", false);
			}else if($.trim(response)=="exists"){
				notify("error", "'.$lang['msg_exists_record'].'");
				$(".addService").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_service_add_failed'].'");
				$(".addService").attr("disabled", false);
			}else if($.trim(response)=="success"){
				$("#msIcon").val("");
				$("#msTitle").val("");
				$("#msDescription").val("");
				notify("success", "'.$lang['msg_service_add_success'].'");
				redirect("'.BASE_URL.'panel/service",2);
			}
		}
	});
});
$(".updateService").click(function(e){
	$(".updateService").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {serviceHash: $("#mesHash").attr("value"), serviceIcon:$("#mesIcon").val(), serviceTitle:$("#mesTitle").val(), serviceDescription:$("#mesDescription").val(), actionUpdateService:"actionUpdateService"},
		success: function(response){
			if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".updateService").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_service_update_failed'].'");
				$(".updateService").attr("disabled", false);
			}else if($.trim(response)=="success"){
				$("#mesIcon").val("");
				$("#mesTitle").val("");
				$("#mesDescription").val("");
				notify("success", "'.$lang['msg_service_update_success'].'");
				redirect("'.BASE_URL.'panel/service",2);
			}
		}
	});
});
</script>
';
include("inc-end.php");
?>