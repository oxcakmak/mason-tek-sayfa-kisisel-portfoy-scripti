<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect("panel/login"); }
$oxcakmak->wmMetaTitle($lang['m_panel'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_panel'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item">Pages</li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_panel'].'</li>
	</ol>
</div>
';
include("panel-inc-footer.php");
include("panel-inc-script.php");
include("inc-end.php");
?>