<?php echo '<!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="'.BASE_URL.'panel">
        <div class="sidebar-brand-icon"><img src="'.PANEL_ASSETS_FOLDER.'img/logo/logo2.png"></div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel"><i class="fas fa-fw fa-home"></i><span>'.$lang['m_panel'].'</span></a></li>
      <hr class="sidebar-divider">
       <div class="sidebar-heading">'.$lang['m_panel'].'</div>
    <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/banner"><i class="fas fa-fw fa-sliders-h"></i><span>'.$lang['m_banner'].'</span></a></li>
    <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/service"><i class="fas fa-fw fa-th"></i><span>'.$lang['m_services'].'</span></a></li>
    <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/skill"><i class="fas fa-fw fa-newspaper"></i><span>'.$lang['t_skill'].'</span></a></li>
    <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/counter"><i class="fas fa-fw fa-search"></i><span>'.$lang['m_counter'].'</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/portfolio"><i class="fas fa-fw fa-file"></i><span>'.$lang['m_portfolio'].'</span></a></li>
    <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/brand"><i class="fas fa-fw fa-grip-horizontal"></i><span>'.$lang['m_brand'].'</span></a></li>
    <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/contact"><i class="fas fa-fw fa-life-ring"></i><span>'.$lang['m_contact'].'</span></a></li>
    <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/testimonial"><i class="fas fa-fw fa-comment-dots"></i><span>'.$lang['m_testimonial'].'</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/social"><i class="fas fa-fw fa-share-alt"></i><span>'.$lang['m_social_media'].'</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/user"><i class="fas fa-fw fa-user"></i><span>'.$lang['m_user'].'</span></a></li>
	  <!--
	  <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/"><i class="fas fa-fw fa-palette"></i><span>'.$lang['m_home'].'</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/"><i class="fas fa-fw fa-palette"></i><span>'.$lang['m_home'].'</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/"><i class="fas fa-fw fa-palette"></i><span>'.$lang['m_home'].'</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/"><i class="fas fa-fw fa-palette"></i><span>'.$lang['m_home'].'</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/"><i class="fas fa-fw fa-palette"></i><span>'.$lang['m_home'].'</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/"><i class="fas fa-fw fa-palette"></i><span>'.$lang['m_home'].'</span></a></li>
	  -->
	  
	  <!--
	  CIFT
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Forms</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Forms</h6>
            <a class="collapse-item" href="form_basics.html">Form Basics</a>
            <a class="collapse-item" href="form_advanceds.html">Form Advanceds</a>
          </div>
        </div>
      </li>
	  TEK
	  <li class="nav-item"><a class="nav-link" href="ui-colors.html"><i class="fas fa-fw fa-palette"></i><span>'.$lang['m_home'].'</span></a></li>
	  CIZGI 
	   <hr class="sidebar-divider">
      BASLIK
	  <div class="sidebar-heading">Features</div>
	  -->
	  <hr class="sidebar-divider">
       <div class="sidebar-heading">'.$lang['t_other'].'</div>
	    <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/setting"><i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i><span>'.$lang['m_setting'].'</span></a></li>
      <li class="nav-item"><a class="nav-link" href="'.BASE_URL.'panel/logout"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i><span>'.$lang['m_logout'].'</span></a></li>
      <!--
	  <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
	  -->
    </ul>
    <!-- Sidebar -->
	
<div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
           
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="'.PANEL_ASSETS_FOLDER.'img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">'.@USER_USERNAME.'</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
			  <!--
                <a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a>
                <a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>Settings</a>
                <a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>Activity Log</a>
                <div class="dropdown-divider"></div>
				-->
                <a class="dropdown-item" href="'.BASE_URL.'panel/logout"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>'.$lang['m_logout'].'</a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

		<!-- Container Fluid-->
		<div class="container-fluid" id="container-wrapper">'; ?>