<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect("panel/login"); }
if(USER_ROLE!=11){ $oxcakmak->redirect("panel"); }
$oxcakmak->wmMetaTitle($lang['m_category'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_category'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_category'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<!-- Simple Tables -->
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">'.$lang['m_categories'].'</h6></div>
			<div class="table-responsive" style="border:1px solid #efefef;">
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th>Order ID</th>
							<th>Customer</th>
							<th>Item</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><a href="#">RA0449</a></td>
							<td>Udin Wayang</td>
							<td>Nasi Padang</td>
							<td><span class="badge badge-success">Delivered</span></td>
							<td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="card-footer text-center">
				<a class="btn btn-light" href=""><i class="fa fa-angle-double-left"></i></a>
				<a class="btn btn-light" href=""><i class="fa fa-angle-left"></i></a>
				<a class="btn btn-primary" href="">1</a>
				<a class="btn btn-light" href="">2</a>
				<a class="btn btn-light" href=""><i class="fa fa-angle-right"></i></a>
				<a class="btn btn-light" href=""><i class="fa fa-angle-double-right"></i></a>
			</div>
		</div>
	</div>
</div>
';
include("panel-inc-footer.php");
include("panel-inc-script.php");
include("inc-end.php");
?>