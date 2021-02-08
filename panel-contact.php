<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect("panel/login"); }
if(USER_ROLE!=11){ $oxcakmak->redirect("panel"); }
$oxcakmak->wmMetaTitle($lang['m_contact'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_contact'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_contact'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<!-- Simple Tables -->
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">'.$lang['m_contact'].'</h6></div>
			<div class="table-responsive" style="border:1px solid #efefef;">
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th>#</th>
							<th>'.$lang['t_fullname'].'</th>
							<th>'.$lang['t_email'].'</th>
                            <th>'.$lang['t_message'].'</th>
                            <th>'.$lang['t_ip_address'].'</th>
                            <th>'.$lang['t_date'].'</th>
							<th>'.$lang['t_process'].'</th>
						</tr>
					</thead>
					<tbody>';
					$i = 0;
					$dbh->orderBy("contact_id", "DESC");
					foreach($dbh->get("contact") as $contactRow){ $i++; echo '
						<tr id="'.$contactRow['contact_hash'].'">
							<td>'.$i.'</a></td>
							<td>'.$contactRow['contact_fullname'].'</td>
                            <td>'.$contactRow['contact_email'].'</td>
                            <td>'.$contactRow['contact_message'].'</td>
                            <td>'.$contactRow['contact_address'].'</td>
                            <td>'.$contactRow['contact_date'].'</td>
							<td><button class="btn btn-sm btn-danger deleteContact" onclick="deleteContact(\''.$contactRow['contact_hash'].'\')">'.$lang['t_remove'].'</button></td>
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
function deleteContact(hash){
	$(".deleteContact").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {contactHash:hash, actionDeleteContact:"actionDeleteContact"},
		success: function(response){
			if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".deleteContact").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_counter_delete_failed'].'");
				$(".deleteContact").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_counter_delete_success'].'");
				redirect("'.BASE_URL.'panel/contact",1);
			}
		}
	});
}
</script>
';
include("inc-end.php");
?>