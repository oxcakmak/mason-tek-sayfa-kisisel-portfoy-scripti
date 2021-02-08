<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect("panel/login"); }
if(USER_ROLE!=11){ $oxcakmak->redirect("panel"); }
$page = @intval($_GET['page']); if(!$page){ $page = 1; }
$totalDataCount = $dbh->getValue("user", "COUNT(*)");
$pageLimit = 10;
$pageNumber = ceil($totalDataCount/$pageLimit); if($page > $pageNumber){ $page = 1;}
$viewData = $page * $pageLimit - $pageLimit;
$viewPerPage = 10;
$oxcakmak->wmMetaTitle($lang['m_user'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_user'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_user'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<!-- Simple Tables -->
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">'.$lang['m_user'].'</h6>
				<button class="btn btn-success" data-toggle="modal" data-target="#addUserModal">'.$lang['t_new_user'].'</button>
			</div>
			<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_new_user'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
						<div class="modal-body">
							<div class="form-group">
								<label for="mUserUsername">'.$lang['t_username'].'</label>
								<input type="text" class="form-control" id="mUserUsername" placeholder="'.$lang['t_username'].'">
							</div>
							<div class="form-group">
								<label for="mUserEmail">'.$lang['t_email'].'</label>
								<input type="text" class="form-control" id="mUserEmail" placeholder="'.$lang['t_email'].'">
							</div>
							<div class="form-group">
								<label for="mUserPassword">'.$lang['t_password'].'</label>
								<input type="text" class="form-control" id="mUserPassword" placeholder="'.$lang['t_password'].'">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="mUserStatus">'.$lang['t_status'].'</label>
										<select class="form-control" id="mUserStatus" placeholder="'.$lang['t_status'].'">
											<option value="" selected disabled>'.$lang['t_choose'].'</option>
											<!-- <option value="deneme">deneme</option> -->
											<option value="1">'.$lang['t_active'].'</option>
											<option value="0">'.$lang['t_passive'].'</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="mUserRole">'.$lang['t_role'].'</label>
										<select class="form-control" id="mUserRole" placeholder="'.$lang['t_role'].'">
											<option value="" selected disabled>'.$lang['t_choose'].'</option>
											<!-- <option value="deneme">deneme</option> -->
											<option value="1">'.$lang['t_role_user'].'</option>
											<option value="11">'.$lang['t_role_admin'].'</option>
										</select>
									</div>
								</div>
							</div>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
							<button type="button" class="btn btn-success actionAddUser">'.$lang['t_send'].'</button>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive" style="border:1px solid #efefef;">
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th>#</th>
							<th>'.$lang['t_username'].'</th>
							<th>'.$lang['t_email'].'</th>
							<th>'.$lang['t_status'].'</th>
							<th>'.$lang['t_role'].'</th>
							<th>'.$lang['t_key'].'</th>
							<th>'.$lang['t_process'].'</th>
						</tr>
					</thead>
					<tbody>';
					$i = 0;
					foreach($dbh->rawQuery('SELECT * FROM user WHERE user_role != 11 ORDER BY user_id DESC LIMIT ?, ?', [$viewData, $pageLimit]) as $userRow){
					$i++;
					echo '
						<tr>
							<td>'.$i.'</td>
							<td>'.$userRow['user_username'].'</td>
							<td>'.$userRow['user_email'].'</td>
							<td>'; if($userRow['user_status']==1){ echo '<span class="badge badge-success">'.$lang['t_active'].'</span>'; }else{ echo '<span class="badge badge-danger">'.$lang['t_passive'].'</button>'; } echo '</td>
							<td>'; if($userRow['user_role']==11){ echo '<span class="badge badge-danger">'.$lang['t_role_admin'].'</button>'; }else{ echo '<span class="badge badge-success">'.$lang['t_role_user'].'</span>'; } echo '</td>
							<td>'.$userRow['user_key'].'</td>
							<td><button onclick="actionUpdateUserStatus(\''.$userRow['user_username'].'\')" class="btn btn-sm btn-primary actionUpdateUserStatus">'.$lang['t_update'].'</button></td>
						</tr>';
					}
					echo '</tbody>
				</table>
			</div>';
			if($totalDataCount > 0){
				echo '<div class="card-footer text-center">';
				if($page > 1){ echo '
					<!-- Previous -->
					<a class="btn btn-light" href="'.BASE_URL.'panel/user?page=1"><i class="fa fa-angle-double-left"></i></a>
					<a class="btn btn-light" href="'.BASE_URL.'panel/user?page='.($page - 1).'"><i class="fa fa-angle-left"></i></a>
					<!-- / Previous -->';
				}
				for($i = $page - $viewPerPage; $i < $page + $viewPerPage +1; $i++){ 
					if($i > 0 && $i <= $pageNumber){
						if($i == $page){
							echo '<a class="btn btn-primary" href="'.BASE_URL.'panel/user?page='.$i.'">'.$i.'</a>';
						}else{
							echo '<a class="btn btn-light" href="'.BASE_URL.'panel/user?page='.$i.'">'.$i.'</a></li>';
						}
					}
				}
				if($page != $pageNumber){
					echo '<!-- Next -->
					<a class="btn btn-light" href="'.BASE_URL.'panel/user?page='.($page + 1).'"><i class="fa fa-angle-right"></i></a>
					<a class="btn btn-light" href="'.BASE_URL.'panel/user?page='.$pageNumber.'"><i class="fa fa-angle-double-right"></i></a>
					<!-- / Next -->';
				}
				echo '</div>';
			}
		echo '</div>
	</div>
</div>
';
include("panel-inc-footer.php");
include("panel-inc-script.php");
echo '
<script>
$(".actionAddUser").click(function(){
	$(".actionAddUser").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {username: $("#mUserUsername").val(), email: $("#mUserEmail").val(), password: $("#mUserPassword").val(), status: $("#mUserStatus").val(), role: $("#mUserRole").val(), actionAddUser:"actionAddUser"},
		success: function(response){
			if($.trim(response)=="empty"){
				notify("error", "'.$lang['msg_not_be_empty'].'");
				$(".actionAddUser").attr("disabled", false);
			}else if($.trim(response)=="exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".actionAddUser").attr("disabled", false);
			}else if($.trim(response)=="not_supported_email"){
				notify("error", "'.$lang['msg_not_supported_email'].'");
				$(".actionAddUser").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_user_add_failed'].'");
				$(".actionAddUser").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_user_add_success'].'");
				redirect("'.BASE_URL.'panel/user",1);
			}
		}
	});
});
function actionUpdateUserStatus(username){
	$(".actionUpdateUserStatus").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {username:username, actionUpdateUserStatus:"actionUpdateUserStatus"},
		success: function(response){
			if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".actionUpdateUserStatus").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_user_update_failed'].'");
				$(".actionUpdateUserStatus").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_user_update_success'].'");
				redirect("'.BASE_URL.'panel/user",1);
			}
		}
	});
}
</script>
';
include("inc-end.php");
?>