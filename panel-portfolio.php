<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect("panel/login"); }
if(USER_ROLE!=11){ $oxcakmak->redirect("panel"); }
$page = @intval($_GET['page']); if(!$page){ $page = 1; }
$totalDataCount = $dbh->getValue("portfolio", "COUNT(*)");
$pageLimit = 10;
$pageNumber = ceil($totalDataCount/$pageLimit); if($page > $pageNumber){ $page = 1;}
$viewData = $page * $pageLimit - $pageLimit;
$viewPerPage = 10;
$oxcakmak->wmMetaTitle($lang['m_portfolio'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_portfolio'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_portfolio'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<!-- Simple Tables -->
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">'.$lang['m_portfolio'].'</h6>
				<a class="btn btn-success" href="#" data-toggle="modal" data-target="#addPortfolioModal">'.$lang['t_new_portfolio'].'</a>
			</div>
			<div class="modal fade" id="addPortfolioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_new_portfolio'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="mpTitle">'.$lang['t_title'].'</label>
										<input type="text" class="form-control" id="mpTitle" placeholder="'.$lang['t_title'].'">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="mpThumbnail">'.$lang['t_thumbnail'].'</label>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="mpThumbnail">
											<label class="custom-file-label" for="mpThumbnail">'.$lang['t_choose_file'].'</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="mpDescription">'.$lang['t_description'].'</label>
										<textarea rows="3" class="form-control" id="mpDescription" placeholder="'.$lang['t_description'].'"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="mpClient">'.$lang['t_client'].'</label>
										<input type="text" class="form-control" id="mpClient" placeholder="'.$lang['t_client'].'">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="mpType">'.$lang['t_category'].'</label>
										<input type="text" class="form-control" id="mpType" placeholder="'.$lang['t_category'].'">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="mpStartDate">'.$lang['t_start_date'].'</label>
										<input type="text" class="form-control" id="mpStartDate" placeholder="'.$lang['t_start_date'].'">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="mpFinishDate">'.$lang['t_finish_date'].'</label>
										<input type="text" class="form-control" id="mpFinishDate" placeholder="'.$lang['t_finish_date'].'">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="mpLink">'.$lang['t_link'].'</label>
										<input type="text" class="form-control" id="mpLink" placeholder="'.$lang['t_link'].'">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
							<button type="button" class="btn btn-success addPortfolio">'.$lang['t_send'].'</button>
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
							<th style="display:none;">'.$lang['t_description'].'</th>
							<th>'.$lang['t_client'].'</th>
							<th>'.$lang['t_start_date'].'</th>
							<th>'.$lang['t_finish_date'].'</th>
							<th>'.$lang['t_category'].'</th>
							<th>'.$lang['t_link'].'</th>
							<th>'.$lang['t_process'].'</th>
						</tr>
					</thead>
					<tbody>';
					$i = 0;
					$dbh->orderBy("portfolio_id", "DESC");
					foreach($dbh->rawQuery('SELECT * FROM portfolio ORDER BY portfolio_id DESC LIMIT ?, ?', [$viewData, $pageLimit]) as $portfolioRow){
					$i++;
					echo '
						<tr id="'.$portfolioRow['portfolio_slug'].'">
							<td>'.$i.'</td>
							<td>'.$portfolioRow['portfolio_title'].'</td>
							<td style="display:none;">'.$portfolioRow['portfolio_description'].'</td>
							<td>'.$portfolioRow['portfolio_client'].'</td>
							<td><span class="badge badge-warning">'.$portfolioRow['portfolio_start_date'].'</span></td>
							<td><span class="badge badge-primary">'.$portfolioRow['portfolio_finish_date'].'</span></td>
							<td>'.$portfolioRow['portfolio_type'].'</td>
							<td>'.$portfolioRow['portfolio_link'].'</td>
							<td><a href="#" class="btn btn-sm btn-warning" onclick="editPortfolioItem(\''.$portfolioRow['portfolio_slug'].'\')">'.$lang['t_edit'].'</a>&nbsp;<button class="btn btn-sm btn-danger actionDeletePortfolio" onclick="actionDeletePortfolio(\''.$portfolioRow['portfolio_slug'].'\')">'.$lang['t_remove'].'</button></td>
						</tr>';
					}
					echo '</tbody>
				</table>
			</div>';
			if($totalDataCount > 0){
				echo '<div class="card-footer text-center">';
				if($page > 1){ echo '
					<!-- Previous -->
					<a class="btn btn-light" href="'.BASE_URL.'panel/portfolio?page=1"><i class="fa fa-angle-double-left"></i></a>
					<a class="btn btn-light" href="'.BASE_URL.'panel/portfolio?page='.($page - 1).'"><i class="fa fa-angle-left"></i></a>
					<!-- / Previous -->';
				}
				for($i = $page - $viewPerPage; $i < $page + $viewPerPage +1; $i++){ 
					if($i > 0 && $i <= $pageNumber){
						if($i == $page){
							echo '<a class="btn btn-primary" href="'.BASE_URL.'panel/portfolio?page='.$i.'">'.$i.'</a>';
						}else{
							echo '<a class="btn btn-light" href="'.BASE_URL.'panel/portfolio?page='.$i.'">'.$i.'</a></li>';
						}
					}
				}
				if($page != $pageNumber){
					echo '<!-- Next -->
					<a class="btn btn-light" href="'.BASE_URL.'panel/portfolio?page='.($page + 1).'"><i class="fa fa-angle-right"></i></a>
					<a class="btn btn-light" href="'.BASE_URL.'panel/portfolio?page='.$pageNumber.'"><i class="fa fa-angle-double-right"></i></a>
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
<div class="modal fade" id="editPortfolioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_new_portfolio'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="mepTitle">'.$lang['t_title'].'</label>
							<input type="text" class="form-control" id="mepTitle" placeholder="'.$lang['t_title'].'">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="mepThumbnail">'.$lang['t_thumbnail'].'</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="mepThumbnail">
								<label class="custom-file-label" for="mepThumbnail">'.$lang['t_choose_file'].'</label>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="mepDescription">'.$lang['t_description'].'</label>
							<textarea rows="3" class="form-control" id="mepDescription" placeholder="'.$lang['t_description'].'"></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mepClient">'.$lang['t_client'].'</label>
							<input type="text" class="form-control" id="mepClient" placeholder="'.$lang['t_client'].'">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mepType">'.$lang['t_category'].'</label>
							<input type="text" class="form-control" id="mepType" placeholder="'.$lang['t_category'].'">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mepStartDate">'.$lang['t_start_date'].'</label>
							<input type="text" class="form-control" id="mepStartDate" placeholder="'.$lang['t_start_date'].'">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mepFinishDate">'.$lang['t_finish_date'].'</label>
							<input type="text" class="form-control" id="mepFinishDate" placeholder="'.$lang['t_finish_date'].'">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="mepLink">'.$lang['t_link'].'</label>
							<input type="text" class="form-control" id="mepLink" placeholder="'.$lang['t_link'].'">
						</div>
					</div>
				</div>
				<span id="mepSlug" style="display:none;"></span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
				<button type="button" class="btn btn-success editPortfolio">'.$lang['t_send'].'</button>
			</div>
		</div>
	</div>
</div>
<script>
$(".addPortfolio").click(function(e){
	$(".addPortfolio").attr("disabled", true);
	var formData = new FormData();
    formData.append("mpTitle", $("#mpTitle").val());
	formData.append("mpThumbnail", $("#mpThumbnail").prop("files")[0]);
	formData.append("mpDescription", $("#mpDescription").val());
	formData.append("mpClient", $("#mpClient").val());
	formData.append("mpType", $("#mpType").val());
	formData.append("mpStartDate", $("#mpStartDate").val());
	formData.append("mpFinishDate", $("#mpFinishDate").val());
	formData.append("mpLink", $("#mpLink").val());
    formData.append("actionAddPortfolio", "actionAddPortfolio");
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
				$(".addPortfolio").attr("disabled", false);
			}else if($.trim(response)=="exists"){
				notify("error", "'.$lang['msg_exists_record'].'");
				$(".addPortfolio").attr("disabled", false);
			}else if($.trim(response) == "extension"){
				notify("error", "'.str_replace("%extension%", "JPG, JPEG, PNG", $lang['msg_upload_file_extension']).'");
				$(".addPortfolio").attr("disabled", false);
			}else if($.trim(response) == "size"){
				notify("error", "'.str_replace("%size%", "5", $lang['msg_upload_file_size']).'");
				$(".addPortfolio").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_portfolio_add_failed'].'");
				$(".addPortfolio").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_portfolio_add_success'].'");
				redirect("'.BASE_URL.'panel/portfolio",1);
			}
		}
	});
});
function editPortfolioItem(slug){
	var tableRow = document.getElementById(slug);
	$("#mepTitle").val(tableRow.children[1].outerText);
	$("#mepDescription").val(tableRow.children[2].outerText);
	$("#mepClient").val(tableRow.children[3].outerText);
	$("#mepStartDate").val(tableRow.children[4].outerText);
	$("#mepFinishDate").val(tableRow.children[5].outerText);
	$("#mepType").val(tableRow.children[6].outerText);
	$("#mepLink").val(tableRow.children[7].outerText);
	$("#mepSlug").attr("value", slug);
	$("#editPortfolioModal").modal("toggle");
}
$(".editPortfolio").click(function(e){
	$(".editPortfolio").attr("disabled", true);
	var formData = new FormData();
    formData.append("mpTitle", $("#mepTitle").val());
	formData.append("mpThumbnail", $("#mepThumbnail").prop("files")[0]);
	formData.append("mpDescription", $("#mepDescription").val());
	formData.append("mpClient", $("#mepClient").val());
	formData.append("mpType", $("#mepType").val());
	formData.append("mpStartDate", $("#mepStartDate").val());
	formData.append("mpFinishDate", $("#mepFinishDate").val());
	formData.append("mpLink", $("#mepLink").val());
	formData.append("mpLastSlug", $("#mepSlug").attr("value"));
    formData.append("actionUpdatePortfolio", "actionUpdatePortfolio");
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
				$(".editPortfolio").attr("disabled", false);
			}else if($.trim(response)=="exists"){
				notify("error", "'.$lang['msg_exists_record'].'");
				$(".editPortfolio").attr("disabled", false);
			}else if($.trim(response) == "extension"){
				$(".editPortfolio").attr("disabled", false);
				notify("error", "'.str_replace("%extension%", "JPG, JPEG, PNG", $lang['msg_upload_file_extension']).'");
			}else if($.trim(response) == "size"){
				$(".editPortfolio").attr("disabled", false);
				notify("error", "'.str_replace("%size%", "5", $lang['msg_upload_file_size']).'");
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_portfolio_update_failed'].'");
				$(".editPortfolio").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_portfolio_update_success'].'");
				redirect("'.BASE_URL.'panel/portfolio",1);
			}
		}
	});
});
function actionDeletePortfolio(slug){
	$(".actionDeletePortfolio").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.ACTION_URL.'",
		data: {slug:slug, actionDeletePortfolio:"actionDeletePortfolio"},
		success: function(response){
			if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists_record'].'");
				$(".actionDeletePortfolio").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_portfolio_delete_failed'].'");
				$(".actionDeletePortfolio").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_portfolio_delete_success'].'");
				redirect("'.BASE_URL.'panel/portfolio",1);
			}
		}
	});
}
</script>
';
include("inc-end.php");
?>