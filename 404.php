<?php
include("inc-header.php");
include("inc-hebo.php");
include("inc-navbar.php");
echo '
<!-- Main Section -->
<main class="uk-width-large-7-10 gb-main">
<div class="gb-page-single">

<!-- Article / Page Body -->
<article class="gb-page-single__content">            
<h2>'.$lang['t_error'].'</h2>

<!-- Article / Page Content -->
<div class="page-content"><p>'.$lang['t_not_found'].'</p></div>
<!-- / Article / Page Content -->

</article>
<!-- / Article / Page Body -->

</div>
</main>
<!-- / Main Section -->
';
include("inc-sidebar.php");
include("inc-footer.php");
include("inc-end.php");
?>