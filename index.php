<?php
require_once("config.php");
echo '
<!doctype html>
<html>
<head>
    <!--meta tags-->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="portfolio template based on HTML5">
    <meta name="keywords" content="onepage, developer, resume, cv, personal, portfolio, personal resume, clean, modern">
    <meta name="author" content="MouriTheme">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--template title-->
    <title>MASON - Personal Portfolio HTML Template</title>

    <!--==========Favicon==========-->

    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--========== Theme Fonts ==========-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,600,700,800" rel="stylesheet">

    <!--Font Awesome css-->
    <link rel="stylesheet" href="'.INDEX_ASSETS_FOLDER.'css/font-awesome.min.css">

    <!--Bootstrap css-->
    <link rel="stylesheet" href="'.INDEX_ASSETS_FOLDER.'css/bootstrap.min.css">

    <!--Animate css-->
    <link rel="stylesheet" href="'.INDEX_ASSETS_FOLDER.'css/animate.css">

    <!--Animated headline css-->
    <link rel="stylesheet" href="'.INDEX_ASSETS_FOLDER.'css/jquery.animatedheadline.css">
    
	<!--Owl carousel css-->
	<link rel="stylesheet" href="'.INDEX_ASSETS_FOLDER.'css/owl.carousel.css">
	<link rel="stylesheet" href="'.INDEX_ASSETS_FOLDER.'css/owl.theme.default.css">
    
	<!--Magnific popup css-->
	<link rel="stylesheet" href="'.INDEX_ASSETS_FOLDER.'css/magnific-popup.css">
    
	<!--Normalizer css-->
	<link rel="stylesheet" href="'.INDEX_ASSETS_FOLDER.'css/normalize.css">

    <!--Theme css-->
    <link rel="stylesheet" href="'.INDEX_ASSETS_FOLDER.'css/style.css">

    <!--Responsive css-->
    <link rel="stylesheet" href="'.INDEX_ASSETS_FOLDER.'css/responsive.css">

    <!--Notfy css-->
    <link href="'.PANEL_ASSETS_FOLDER.'vendor/notyf/notyf.min.css" rel="stylesheet" type="text/css">
</head>
<body>';
    if(ST_PRELOADER_STATUS==1){echo '<!--preloader starts-->
        <div class="loader_bg"><div class="loader"></div></div>
        <!--preloader ends-->'; }
    echo '
    <!--navigation area starts-->

    <header class="nav-area navbar-fixed-top">
        <div class="container">
            <div class="row">
                <!--main menu starts-->

                <div class="col-md-12">
                    <div class="main-menu">
                        <div class="navbar navbar-cus">
                            <div class="navbar-header">
                                <a href="index.html" class="navbar-brand"><span class="logo">mason</span></a> <!--edit site name here-->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse">
                                <nav>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active"><a class="smooth-menu" href="#home">'.$lang['m_home'].'</a></li>
                                        <li><a class="smooth-menu" href="#about">'.$lang['m_about'].'</a></li>
                                        <li><a class="smooth-menu" href="#services">'.$lang['m_services'].'</a></li>
                                        <li><a class="smooth-menu" href="#portfolio">'.$lang['m_portfolio'].'</a></li>
                                        <li><a class="smooth-menu" href="#testimonial">'.$lang['m_testimonial'].'</a></li>
                                        <li><a class="smooth-menu" href="#contact">'.$lang['m_contact'].'</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!--main menu ends-->
            </div>
        </div>
    </header>

    <!--navigation area ends-->

    <!--Banner area starts-->

    <div class="banner-area" id="home" style="background-image: url('.ST_BANNER_IMAGE.');">';
    if(ST_PARTICLES_STATUS==1){echo '<div id="particles-js"></div>'; }
    echo '<div class="banner-table">
            <div class="banner-table-cell">
                <div class="welcome-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="intro animate-scale">

                                    <h3>'.ST_BANNER_TITLE.'</h3>

                                    <h1 class="ah-headline">

                                        <span class="ah-words-wrapper">
                                            <b class="is-visible">'.ST_BANNER_FIRST.'</b> <!--edit the name to your name-->';
                                            $dbh->orderBy("banner_id", "DESC"); 
                                            foreach($dbh->get("banner") as $bannerRow){ echo '<b>'.$bannerRow['banner_text'].'</b> <!--edit the designation if you are in different profession-->'; }
                                        echo '</span>
                                    </h1>

                                    <a href="#contact" class="banner-btn">'.$lang['m_contact'].'</a>


                                </section>

                                <div class="clearfix"></div>

                                <a class="mouse-scroll hidden-xs" href="#about"><span class="mouse"><span class="mouse-movement"></span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Banner area ends-->

    <!--about area starts-->

    <div class="about-area section-padding" id="about">
        <div class="container">

            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                    <div class="about-text-left">
                        <h2>'.ST_ABOUT_NAME.'</h2> <!--edit name-->
                        <h3>'.ST_ABOUT_JOB.'</h3> <!--edit designation-->
                        <p>'.ST_ABOUT_CONTENT.'</p>
                        <!-- <a href="'.INDEX_ASSETS_FOLDER.'images/about/demo-cv.png" download>Download CV &nbsp; &nbsp;<i class="fa fa-download"></i></a> -->
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <img src="'.BASE_URL.ST_ABOUT_IMAGE.'"  class="img-responsive" alt="'.ST_ABOUT_NAME.'"> <!--add your image here-->
                </div>

                <div class="col-md-4 col-xs-12 col-sm-12 col-lg-4">
                    <div class="about-text-right">

                        <div id="skills">

                            <h3>'.$lang['t_my_skills'].'</h3>

                            <div class="row">';
							$dbh->orderBy("skill_title", "ASC"); 
							foreach($dbh->get("skill") as $skillRow){ echo '
                                <!-- skillbar -->
                                <div class="col-md-12">
                                    <div class="skillbar" data-percent="'.$skillRow['skill_pertencage'].'%"> <!--edit percentage-->
                                        <h6 class="skillbar-title">'.$skillRow['skill_title'].'</h6> <!--edit skills-->
                                        <h6 class="skillbar-percent">'.$skillRow['skill_pertencage'].'%</h6> <!--edit percentage-->
                                        <div class="skillbar-bar"><div class="skillbar-child"></div></div>
                                    </div>
                                </div>
								<!-- end skillbar -->
							'; }
                            echo '</div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <!--about area ends-->
    
    <!--Services Area Starts-->

    <div id="services" class="services-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header wow fadeInDown" data-wow-delay="0.2s">
                        <p class="line-one"></p>
                        <h2>'.$lang['t_my_services'].'</h2>
                        <p class="line-one"></p>

                    </div>
                </div>
            </div>
            <div class="row">
                <div id="services-carousel" class="owl-carousel owl-theme">';
					$dbh->orderBy("service_id", "ASC");
					foreach($dbh->get("service") as $serviceRow){
					echo '
                    <div class="single-services text-center item">
                        <div class="services-icon"><i class="fa fa-'.$serviceRow['service_icon'].'"></i></div>
						
                        <div class="services-content">
                            <h3>'.$serviceRow['service_title'].'</h3> <!--edit the service you give-->
                            <p>'.$serviceRow['service_description'].'</p>
                        </div>

                    </div>
					'; }					
                echo '</div>

            </div>
        </div>
    </div>

    <!--Services Area Ends-->
    
	<!--number area starts-->

	<div class="number-area section-padding">
		<div class="container">
			<div class="row">';
            $dbh->orderBy("counter_id", "DESC");
            foreach($dbh->get("counter") as $counterRow){ echo '
				<div class="col-md-3 col-xs-6">
					<div class="single-number text-center">
						<i class="fa fa-'.$counterRow['counter_icon'].'"></i>
						<h2 class="counter">'.$counterRow['counter_value'].'</h2> <!--edit-->
						<p>'.$counterRow['counter_title'].'</p>
					</div>
                </div>'; }
			echo '</div>
		</div>
	</div>

	<!--number area ends-->
   
	<!--Portfolio Area Starts-->

	<div id="portfolio" class="portfolio-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header wow fadeInDown" data-wow-delay="0.2s">
						<p class="line-one"></p>
						<h2>'.$lang['t_my_works'].'</h2>
						<p class="line-one"></p>
					</div>
				</div>
			</div>

			<div class="row">

                <div class="portfolio-items">';
					$dbh->orderBy("portfolio_id", "DESC");
					foreach($dbh->get("portfolio") as $portfolioRow){ echo '
                    <div class="col-md-4 col-sm-6 col-xs-12 no-pad">
                        <div id="inline-popups" class="port-box">
                            <a href="#test-popup" data-effect="mfp-zoom-out">
                                <div class="hovereffect">
                                    <img src="'.BASE_URL.$portfolioRow['portfolio_thumbnail'].'" alt="'.$portfolioRow['portfolio_title'].'" class="img-responsive"> <!--edit image-->
                                    <div class="overlay">
                                        <h2>'.$portfolioRow['portfolio_title'].'</h2> <!--your project name-->
                                        <p>'.$portfolioRow['portfolio_description'].'</p>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div id="test-popup" class="white-popup mfp-with-anim mfp-hide">
                            <div class="row">
                                <div class="col-md-7 col-xs-12">
                                    <div class="por-img">
                                        <img src="'.BASE_URL.$portfolioRow['portfolio_thumbnail'].'" alt="'.$portfolioRow['portfolio_title'].'" class="img-responsive"> <!--edit image-->
                                    </div>
                                </div>
                                <div class="col-md-5 col-xs-12">
                                    <div class="por-text">
                                        <h2>'.$portfolioRow['portfolio_title'].'</h2> <!--your project title-->
                                        <p>'.$portfolioRow['portfolio_description'].'</p>
                                        <div class="por-text-details">
                                            <div class="row">
                                                <div class="col-xs-5" style="color: #E91E63;font-weight:bold;">
                                                    <p>'.$lang['t_client'].':</p>
                                                    <p>'.$lang['t_start_date'].':</p>
                                                    <p>'.$lang['t_finish_date'].':</p>
                                                    <p>Type:</p>
                                                    <p>link:</p>
                                                </div>
                                                <div class="col-xs-offset-1 col-xs-6">
                                                    <p>'.$portfolioRow['portfolio_client'].'</p>
                                                    <p>'.$portfolioRow['portfolio_start_date'].'</p>
                                                    <p>'.$portfolioRow['portfolio_finish_date'].'</p>
                                                    <p>'.$portfolioRow['portfolio_type'].'</p>
                                                    <p><a href="'.$portfolioRow['portfolio_link'].'">'.$portfolioRow['portfolio_link'].'</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
					'; }
                    

                echo '</div> <!--end portfolio grid -->

            </div>


		</div>
	</div>

	<!--Portfolio Area Ends-->
   
	<!--Testimonial Section Starts-->

	<div id="testimonial" class="testimonial-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header wow fadeInDown" data-wow-delay="0.2s">
						<p class="line-one"></p>
						<h2>'.$lang['t_what_say_clients'].'</h2>
						<p class="line-one"></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="review-area">
						<div id="testimonial-carousel" class="owl-carousel owl-theme">';
                        $dbh->orderBy("testimonial_id", "DESC");
                        foreach($dbh->get("testimonial") as $testimonialRow){ echo '
							<div class="single-testi text-center item">
								<div class="testi-img"><img src="'.BASE_URL.$testimonialRow['testimonial_picture'].'" alt="'.$testimonialRow['testimonial_fullname'].'"> <!--edit image--></div>
								<div class="block-quote">
									<p>'.$testimonialRow['testimonial_comment'].'</p> <!--edit here-->
									<h2>'.$testimonialRow['testimonial_fullname'].'</h2> <!--edit here-->
									<h3>'.$testimonialRow['testimonial_job'].'</h3> <!--edit here-->
								</div>
                            </div>'; }
						echo '</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Testimonial Section Ends-->

    <!--contact area starts-->

    <div class="contact-area section-padding" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header wow fadeInDown" data-wow-delay="0.2s">
                        <p class="line-one"></p>
                        <h2>'.$lang['m_contact'].'</h2>
                        <p class="line-one"></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-contact text-center wow fadeInDown" data-wow-delay="0.4s">
                        <i class="fa fa-home"></i>
                        <h2>'.$lang['t_location'].'</h2>
                        <p>'.ST_CONTACT_LOCATION.'</p> <!--edit here-->
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-contact text-center wow fadeInDown" data-wow-delay="0.6s">
                        <i class="fa fa-phone"></i>
                        <h2>'.$lang['t_phone'].'</h2>
                        <p>'.ST_CONTACT_PHONE.'</p> <!--edit here-->
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-contact text-center wow fadeInDown" data-wow-delay="0.8s">
                        <i class="fa fa-envelope-o"></i>
                        <h2>'.$lang['t_email'].'</h2>
                        <p>'.ST_CONTACT_EMAIL.'</p> <!--edit here-->
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-contact text-center wow fadeInDown" data-wow-delay="1s">
                        <i class="fa fa-gg"></i>
                        <h2>Social Media: </h2>
                        <div class="socials">';
						$dbh->orderBy("social_id", "DESC"); foreach($dbh->get("social") as $socialRow){ echo '<a href="'.$socialRow['social_address'].'" target="_blank"><i class="fa fa-'.$socialRow['social_name'].'"></i></a>'; }
                        echo '</div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-10 col-md-offset-1">
                    <form id="contact-form" class="wow fadeInDown" data-wow-delay="1.2s">

                        <div class="messages"></div> <!--you can change the message in contact.php file -->

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="cFullname" type="text" name="name" class="form-control" placeholder="'.$lang['t_fullname'].'" required="required">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="cEmail" type="email" name="email" class="form-control" placeholder="'.$lang['t_email'].'" required="required">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea id="cMessage" name="message" class="form-control" rows="4"  placeholder="'.$lang['t_message_our'].'" required="required"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-send actionContact">'.$lang['t_send'].'</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <!--contact area ends-->

    <!--Brand area starts-->

    <div class="brand-area section-padding">
        <div class="container">
            <div class="row">';
            $dbh->orderBy("brand_id", "DESC");
            foreach($dbh->get("brand") as $brandRow){ echo '
                <div class="col-md-3 col-xs-6 col-sm-3">
                    <div class="brand-logo-img wow fadeInDown" data-wow-delay="0.2s">
                        <img src="'.BASE_URL.$brandRow['brand_image'].'" alt="'.$brandRow['brand_title'].'"> <!--edit image-->
                    </div>
                </div>
                <br>'; }
            echo '</div>
        </div>
    </div>

    <!--Brand area ends-->

    <!--Footer Area Starts-->

    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <p>'.str_replace(array("%date%", "%link%", "%stuck%"), array(date("Y"), BASE_URL, ST_META_STUCK), ST_FOOTER).'</p> <!--edit here-->
                </div>
            </div>
        </div>

    </div>

    <!--Footer Area Ends-->

    



    <!--Latest version JQuery-->
    <script src="'.INDEX_ASSETS_FOLDER.'js/jquery-3.2.1.min.js"></script>

    <!--Bootstrap js-->
    <script src="'.INDEX_ASSETS_FOLDER.'js/bootstrap.min.js"></script>

	<!--Magnific popup js-->
	<script src="'.INDEX_ASSETS_FOLDER.'js/jquery.magnific-popup.js"></script>

	<!--Owl Carousel js-->
	<script src="'.INDEX_ASSETS_FOLDER.'js/owl.carousel.js"></script>

	<!--wow js-->
	<script src="'.INDEX_ASSETS_FOLDER.'js/wow.min.js"></script>

    <!--Animated headline js-->
    <script src="'.INDEX_ASSETS_FOLDER.'js/jquery.animatedheadline.js"></script>
    
    <!--Validator js-->
    <script src="'.INDEX_ASSETS_FOLDER.'js/jquery.waypoints.js"></script>
    
	<!--counter up js-->
	<script src="'.INDEX_ASSETS_FOLDER.'js/jquery.counterup.min.js"></script>

    <!--Validator js-->
    <script src="'.INDEX_ASSETS_FOLDER.'js/validator.js"></script>
    
    <!--Notfy js-->
    <script src="'.PANEL_ASSETS_FOLDER.'vendor/notyf/notyf.min.js"></script>
    <script>
    var notyf = new Notyf({
        duration: 2500,
        position: {
            x: "right",
            y: "top",
        }
    });
    function notify(nType, nMessage){
        notyf.open({
            type: nType,
            message: nMessage
        });
    }
    function redirect(address, time){
        setInterval(function(){
            window.location.href=address;
        },time*1000);
    }
    $(".actionContact").click(function(e){
        e.preventDefault();
        $(".actionContact").attr("disabled", true);
        $.ajax({
            type: "POST",
            url: "'.ACTION_URL.'",
            data: {cFullname: $("#cFullname").val(), cEmail: $("#cEmail").val(), cMessage: $("#cMessage").val(), actionContact:"actionContact"},
            success: function(response){
                if($.trim(response) == "empty"){
                    notify("error", "'.$lang['msg_not_be_empty'].'");
                    $(".actionContact").attr("disabled", false);
                }else if($.trim(response) == "exists"){
                    notify("error", "'.$lang['msg_not_be_empty'].'");
                    $(".actionContact").attr("disabled", false);
                }else if($.trim(response) == "not_supported_email"){
                    notify("error", "'.$lang['msg_not_supported_email'].'");
                    $(".actionContact").attr("disabled", false);
                }else if($.trim(response) == "failed"){
                    notify("error", "'.$lang['msg_contact_add_failed'].'");
                    $(".actionContact").attr("disabled", false);
                }else if($.trim(response) == "success"){
                    $("#cFullname").val("");
                    $("#cEmail").val("");
                    $("#cMessage").val("");
                    notify("success", "'.$lang['msg_contact_add_success'].'");
                    redirect("'.BASE_URL.'",1);
                }
            }
        });
    });
    </script>

    <!--Contact js
    <script src="'.INDEX_ASSETS_FOLDER.'js/contact.js"></script>
    -->
    <!--Main js-->
    <script src="'.INDEX_ASSETS_FOLDER.'js/main.js"></script>';
    if(ST_PARTICLES_STATUS==1){echo '
    <!--particles js-->
    <script src="'.INDEX_ASSETS_FOLDER.'js/particles.js"></script>
    <script src="'.INDEX_ASSETS_FOLDER.'js/app.js"></script>
    ';}
include("inc-end.php");
?>