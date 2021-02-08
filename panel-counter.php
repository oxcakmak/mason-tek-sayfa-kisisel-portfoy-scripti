<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect("panel/login"); }
if(USER_ROLE!=11){ $oxcakmak->redirect("panel"); }
$oxcakmak->wmMetaTitle($lang['m_counter'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_counter'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_counter'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<!-- Simple Tables -->
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">'.$lang['m_counter'].'</h6>
				<button class="btn btn-success" data-toggle="modal" data-target="#addCounterModal">'.$lang['t_new_counter'].'</button>
			</div>
			<div class="modal fade" id="addCounterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_new_counter'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="mcTitle">'.$lang['t_title'].'</label>
										<input type="text" class="form-control" id="mcTitle" placeholder="'.$lang['t_title'].'">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="mcIcon">'.$lang['t_icon'].'</label>
										<input type="text" class="form-control" id="mcIcon" placeholder="'.$lang['t_icon'].'">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="mcValue">'.$lang['t_value'].'</label>
										<input type="text" class="form-control" id="mcValue" placeholder="'.$lang['t_value'].'">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
							<button type="button" class="btn btn-success actionAddCounter">'.$lang['t_send'].'</button>
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
							<th>'.$lang['t_value'].'</th>
							<th>'.$lang['t_title'].'</th>
							<th>'.$lang['t_process'].'</th>
						</tr>
					</thead>
					<tbody>';
					$i = 0;
					$dbh->orderBy("counter_id", "DESC");
					foreach($dbh->get("counter") as $counterRow){ $i++; echo '
						<tr id="'.$counterRow['counter_hash'].'">
							<td>'.$i.'</a></td>
							<td>'.$counterRow['counter_icon'].'</td>
							<td>'.$counterRow['counter_value'].'</td>
							<td>'.$counterRow['counter_title'].'</td>
							<td><button class="btn btn-sm btn-danger deleteCounter" onclick="deleteCounter(\''.$counterRow['counter_hash'].'\')">'.$lang['t_remove'].'</button></td>
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
function deleteCounter(hash){
	$(".deleteCounter").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {counterHash:hash, actionDeleteCounter:"actionDeleteCounter"},
		success: function(response){
			if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".deleteCounter").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_counter_delete_failed'].'");
				$(".deleteCounter").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_counter_delete_success'].'");
				redirect("'.BASE_URL.'panel/counter",1);
			}
		}
	});
}

$(".actionAddCounter").click(function(e){
	e.preventDefault();
	$(".actionAddCounter").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {cTitle:$("#mcTitle").val(), cIcon:$("#mcIcon").val(), cValue:$("#mcValue").val(), actionAddCounter:"actionAddCounter"},
		success: function(response){
			if($.trim(response) == "empty"){
				notify("error", "'.$lang['msg_not_be_empty'].'");
				$(".actionAddCounter").attr("disabled", false);
			}else if($.trim(response) == "exists"){
				notify("error", "'.$lang['msg_exists_record'].'");
				$(".actionAddCounter").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				notify("error", "'.$lang['msg_counter_add_failed'].'");
				$(".actionAddCounter").attr("disabled", false);
			}else if($.trim(response) == "success"){
				notify("success", "'.$lang['msg_counter_add_success'].'");
				redirect("'.BASE_URL.'panel/counter",1);
			}
		}
	});
});
</script>
';
include("inc-end.php");
?>