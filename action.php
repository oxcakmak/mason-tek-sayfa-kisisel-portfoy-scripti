<?php
require_once('config.php');
if(isset($_SESSION['session'])){ /* Session If Exists */
	if(USER_ROLE==11){/* Role Admin Then */
	if(DEMO_MODE==0){
		/* Action Add Service */
		if(isset($_POST['actionAddService'])){
			$serviceIcon = $oxcakmak->cleanString($_POST['serviceIcon']);
			$serviceTitle = $oxcakmak->cleanString($_POST['serviceTitle']);
			$serviceDescription = $oxcakmak->cleanString($_POST['serviceDescription']);
			$serviceHash = $oxcakmak->specificHash($serviceTitle);
			if(empty($serviceIcon) || empty($serviceTitle) || empty($serviceDescription)){
				echo "empty";
			}else{
				$dbh->where("service_hash", $serviceHash);
				if($dbh->has("service")){
					echo "exists";
				}else{
					$iServiceData = [
						'service_hash' => $serviceHash,
						'service_icon' => $serviceIcon,
						'service_title' => $serviceTitle,
						'service_description' => $serviceDescription
					];
					if($dbh->insert('service', $iServiceData)){
						echo "success";
					}else{ 
						echo 'failed';
					}
				}
			}
		}
	
		/* Action Update Service */
		if(isset($_POST['actionUpdateService'])){
			$serviceIcon = $oxcakmak->cleanString($_POST['serviceIcon']);
			$serviceTitle = $oxcakmak->cleanString($_POST['serviceTitle']);
			$serviceDescription = $oxcakmak->cleanString($_POST['serviceDescription']);
			$serviceHash = $oxcakmak->cleanString($_POST['serviceHash']);
			$dbh->where("service_hash", $serviceHash);
			if($dbh->has("service")){
				$uServiceData = [
					'service_icon' => $serviceIcon,
					'service_title' => $serviceTitle,
					'service_description' => $serviceDescription
				];
				$dbh->where('service_hash', $serviceHash);
				if($dbh->update('service', $uServiceData)){
					echo "success";
				}else{ 
					echo 'failed';
				}
			}else{
				echo "not_exists";
			}
		}
		
		/* Action Delete Service */
		if(isset($_POST['actionDeleteService'])){
			$serviceHash = $oxcakmak->cleanString($_POST['serviceHash']);
			$dbh->where("service_hash", $serviceHash);
			if($dbh->has("service")){
				$dbh->where('service_hash', $serviceHash);
				if(!$dbh->delete('service')){
					echo "success";
				}else{ 
					echo 'failed';
				}
			}else{
				echo "not_exists";
			}
		}
		
		/* Action Add Skill */
		if(isset($_POST['actionAddSkill'])){
			$skillTitle = $oxcakmak->cleanString($_POST['skillTitle']);
			$skillPercentage = $oxcakmak->cleanString($_POST['skillPercentage']);
			$skillHash = $oxcakmak->specificHash($skillTitle);
			if(empty($skillTitle) || empty($skillPercentage)){
				echo "empty";
			}else{
				$dbh->where("skill_hash", $skillHash);
				if($dbh->has("skill")){
					echo "exists";
				}else{
					$iSkillData = [
						'skill_hash' => $skillHash,
						'skill_title' => $skillTitle,
						'skill_pertencage' => $skillPercentage
					];
					if($dbh->insert('skill', $iSkillData)){
						echo "success";
					}else{ 
						echo 'failed';
					}
				}
			}
		}
		
		/* Action Delete Skill */
		if(isset($_POST['actionDeleteSkill'])){
			$skillHash = $oxcakmak->cleanString($_POST['skillHash']);
			$dbh->where("skill_hash", $skillHash);
			if($dbh->has("skill")){
				$dbh->where('skill_hash', $skillHash);
				if(!$dbh->delete('skill')){
					echo "success";
				}else{ 
					echo 'failed';
				}
			}else{
				echo "not_exists";
			}
		}

		/* Action Add Banner */
		if(isset($_POST['actionAddBanner'])){
			$bannerText = $oxcakmak->cleanString($_POST['bannerText']);
			$bannerHash = $oxcakmak->specificHash($bannerText);
			if(empty($bannerText)){
				echo "empty";
			}else{
				$dbh->where("banner_hash", $bannerHash);
				if($dbh->has("banner")){
					echo "exists";
				}else{
					$iBannerData = [
						'banner_hash' => $bannerHash,
						'banner_text' => $bannerText
					];
					if($dbh->insert('banner', $iBannerData)){
						echo "success";
					}else{ 
						echo 'failed';
					}
				}
			}
		}
		
		/* Action Delete Banner */
		if(isset($_POST['actionDeleteBanner'])){
			$bannerHash = $oxcakmak->cleanString($_POST['bannerHash']);
			$dbh->where("banner_hash", $bannerHash);
			if($dbh->has("banner")){
				$dbh->where('banner_hash', $bannerHash);
				if(!$dbh->delete('banner')){
					echo "success";
				}else{ 
					echo 'failed';
				}
			}else{
				echo "not_exists";
			}
		}

		/* Action Add Counter */
		if(isset($_POST['actionAddCounter'])){
			$counterTitle = $oxcakmak->cleanString($_POST['cTitle']);
			$counterIcon = $oxcakmak->cleanString($_POST['cIcon']);
			$counterValue = $oxcakmak->cleanString($_POST['cValue']);
			$counterHash = $oxcakmak->specificHash($counterTitle);
			if(empty($counterTitle) || empty($counterIcon) || empty($counterValue)){
				echo "empty";
			}else{
				$dbh->where("counter_hash", $counterHash);
				if($dbh->has("counter")){
					echo "exist";
				}else{
					$iCounterData = [
						'counter_hash' => $counterHash,
						'counter_icon' => $counterIcon,
						'counter_value' => $counterValue,
						'counter_title' => $counterTitle
					];
					$insertCounter = $dbh->insert("counter", $iCounterData);
					if($insertCounter){
						echo "success";
					}else{
						echo "failed";
					}
				}
			}
		}

		/* Action Delete Counter */
		if(isset($_POST['actionDeleteCounter'])){
			$counterHash = $oxcakmak->cleanString($_POST['counterHash']);
			$dbh->where("counter_hash", $counterHash);
			if($dbh->has("counter")){
				$dbh->where("counter_hash", $counterHash);
				$deleteCounter = $dbh->delete("counter");
				if(!$deleteCounter){
					echo "success";
				}else{
					echo "failed";
				}
			}else{
				echo "not_exist";
			}
		}
		
		/* Action Add Portfolio */
		if(isset($_POST['actionAddPortfolio'])){
			$portfolioTitle = $oxcakmak->cleanString($_POST['mpTitle']);
			$portfolioDescription = $oxcakmak->cleanString($_POST['mpDescription']);
			$portfolioClient = $oxcakmak->cleanString($_POST['mpClient']);
			$portfolioType = $oxcakmak->cleanString($_POST['mpType']);
			$portfolioStartDate = $oxcakmak->cleanString($_POST['mpStartDate']);
			$portfolioFinishDate = $oxcakmak->cleanString($_POST['mpFinishDate']);
			$portfolioLink = $oxcakmak->cleanString($_POST['mpLink']);
			$portfolioSlug = $oxcakmak->slugify($portfolioTitle);
			$fileName = @$_FILES['mpThumbnail']['name'];
			$fileSize = @$_FILES['mpThumbnail']['size'];
			$fileTmpName = @$_FILES['mpThumbnail']['tmp_name'];
			$fileType = @$_FILES['mpThumbnail']['type'];
			$fileExtensions = ['jpeg','jpg','png'];
			$fileExtension = strtolower(end(explode('.',$fileName)));
			$fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
			$uploadPath = "assets/uploaded/portfolio_".$fileNameEncoded;
			if(empty($portfolioTitle) || empty($portfolioDescription) || empty($portfolioClient) || empty($portfolioType) || empty($portfolioStartDate) || empty($portfolioFinishDate) || empty($portfolioLink)){
				echo "empty";
			}else{
				$dbh->where("portfolio_slug", $portfolioSlug);
				if($dbh->has("portfolio")){
					echo "exists";
				}else{
					if(isset($_FILES['mpThumbnail'])){
						if (!in_array($fileExtension,$fileExtensions)){
							echo "extension";
						}else{
							if ($fileSize > 5000000){
								echo "size";
							}else{
								move_uploaded_file($fileTmpName, $uploadPath);
								$iPortfolioData = [
									'portfolio_slug' => $portfolioSlug,
									'portfolio_thumbnail' => $uploadPath,
									'portfolio_title' => $portfolioTitle,
									'portfolio_description' => $portfolioDescription,
									'portfolio_client' => $portfolioClient,
									'portfolio_start_date' => $portfolioStartDate,
									'portfolio_finish_date' => $portfolioFinishDate,
									'portfolio_type' => $portfolioType,
									'portfolio_link' => $portfolioLink
								];
								$insertPortfolio = $dbh->insert("portfolio", $iPortfolioData);
								if($insertPortfolio){
									echo "success";
								}else{
									echo "failed";
								}
							}
						}
					}else{
						$iPortfolioData = [
							'portfolio_slug' => $portfolioSlug,
							'portfolio_title' => $portfolioTitle,
							'portfolio_description' => $portfolioDescription,
							'portfolio_client' => $portfolioClient,
							'portfolio_start_date' => $portfolioStartDate,
							'portfolio_finish_date' => $portfolioFinishDate,
							'portfolio_type' => $portfolioType,
							'portfolio_link' => $portfolioLink
						];
						$insertPortfolio = $dbh->insert("portfolio", $iPortfolioData);
						if($insertPortfolio){
							echo "success";
						}else{
							echo "failed";
						}
					}
				}
			}
		}
		
		/* Action Update Portfolio */
		if(isset($_POST['actionUpdatePortfolio'])){
			$portfolioTitle = $oxcakmak->cleanString($_POST['mpTitle']);
			$portfolioDescription = $oxcakmak->cleanString($_POST['mpDescription']);
			$portfolioClient = $oxcakmak->cleanString($_POST['mpClient']);
			$portfolioType = $oxcakmak->cleanString($_POST['mpType']);
			$portfolioStartDate = $oxcakmak->cleanString($_POST['mpStartDate']);
			$portfolioFinishDate = $oxcakmak->cleanString($_POST['mpFinishDate']);
			$portfolioLink = $oxcakmak->cleanString($_POST['mpLink']);
			$portfolioLastSlug = $oxcakmak->cleanString($_POST['mpLastSlug']);
			$portfolioSlug = $oxcakmak->slugify($portfolioTitle);
			$fileName = @$_FILES['mpThumbnail']['name'];
			$fileSize = @$_FILES['mpThumbnail']['size'];
			$fileTmpName = @$_FILES['mpThumbnail']['tmp_name'];
			$fileType = @$_FILES['mpThumbnail']['type'];
			$fileExtensions = ['jpeg','jpg','png'];
			$fileExtension = strtolower(end(explode('.',$fileName)));
			$fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
			$uploadPath = "assets/uploaded/portfolio_".$fileNameEncoded;
			if(empty($portfolioTitle) || empty($portfolioDescription) || empty($portfolioClient) || empty($portfolioType) || empty($portfolioStartDate) || empty($portfolioFinishDate) || empty($portfolioLink)){
				echo "empty";
			}else{
				$dbh->where("portfolio_slug", $portfolioLastSlug);
				if($dbh->has("portfolio")){
					if(isset($_FILES['portfolioThumbnail'])){
						if (!in_array($fileExtension,$fileExtensions)){
							echo "extension";
						}else{
							if ($fileSize > 5000000){
								echo "size";
							}else{
								move_uploaded_file($fileTmpName, $uploadPath);
								$uPortfolioData = [
									'portfolio_slug' => $portfolioSlug,
									'portfolio_thumbnail' => $uploadPath,
									'portfolio_title' => $portfolioTitle,
									'portfolio_description' => $portfolioDescription,
									'portfolio_client' => $portfolioClient,
									'portfolio_start_date' => $portfolioStartDate,
									'portfolio_finish_date' => $portfolioFinishDate,
									'portfolio_type' => $portfolioType,
									'portfolio_link' => $portfolioLink
								];
								$dbh->where("portfolio_slug", $portfolioLastSlug);
								$updatePortfolio = $dbh->update("portfolio", $uPortfolioData);
								if($updatePortfolio){
									echo "success";
								}else{
									echo "failed";
								}
							}
						}
					}else{
						$uPortfolioData = [
							'portfolio_slug' => $portfolioSlug,
							'portfolio_title' => $portfolioTitle,
							'portfolio_description' => $portfolioDescription,
							'portfolio_client' => $portfolioClient,
							'portfolio_start_date' => $portfolioStartDate,
							'portfolio_finish_date' => $portfolioFinishDate,
							'portfolio_type' => $portfolioType,
							'portfolio_link' => $portfolioLink
						];
						$dbh->where("portfolio_slug", $portfolioLastSlug);
						$updatePortfolio = $dbh->update("portfolio", $uPortfolioData);
						if($updatePortfolio){
							echo "success";
						}else{
							echo "failed";
						}
					}
				}else{
					echo "not_exists";
				}
			}
		}
		
		/* Action Delete Portfolio */
		if(isset($_POST['actionDeletePortfolio'])){
			$slug = $oxcakmak->cleanString($_POST['slug']);
			$dbh->where("portfolio_slug", $slug);
			if($dbh->has("portfolio")){
				$dbh->where('portfolio_slug', $slug);
				if(!$dbh->delete('portfolio')){
					echo "success";
				}else{ 
					echo 'failed';
				}
			}else{
				echo "not_exists";
			}
		}

		/* Action Add Brand */
		if(isset($_POST['actionAddBrand'])){
			$brandTitle = $oxcakmak->cleanString($_POST['mbTitle']);
            $brandHash = $oxcakmak->specificHash($brandTitle);
			$fileName = @$_FILES['mbThumbnail']['name'];
			$fileSize = @$_FILES['mbThumbnail']['size'];
			$fileTmpName = @$_FILES['mbThumbnail']['tmp_name'];
			$fileType = @$_FILES['mbThumbnail']['type'];
			$fileExtensions = ['jpeg','jpg','png'];
			$fileExtension = strtolower(end(explode('.',$fileName)));
			$fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
			$uploadPath = "assets/uploaded/brand_".$fileNameEncoded;
			if(empty($brandTitle)){
				echo "empty";
			}else{
				$dbh->where("brand_hash", $brandHash);
				if($dbh->has("brand")){
					echo "exists";
				}else{
					if(isset($_FILES['mbThumbnail'])){
						if (!in_array($fileExtension,$fileExtensions)){
							echo "extension";
						}else{
							if ($fileSize > 5000000){
								echo "size";
							}else{
								move_uploaded_file($fileTmpName, $uploadPath);
								$iBrandData = [
									'brand_hash' => $brandHash,
									'brand_title' => $brandTitle,
									'brand_image' => $uploadPath
								];
								$insertBrand = $dbh->insert("brand", $iBrandData);
								if($insertBrand){
									echo "success";
								}else{
									echo "failed";
								}
							}
						}
					}else{
						$iBrandData = [
							'brand_hash' => $brandHash,
                            'brand_title' => $brandTitle
						];
						$insertBrand = $dbh->insert("brand", $iBrandData);
						if($insertBrand){
							echo "success";
						}else{
							echo "failed";
						}
					}
				}
			}
		}
		
		/* Action Update Brand */
		if(isset($_POST['actionUpdateBrand'])){
			$brandTitle = $oxcakmak->cleanString($_POST['mbTitle']);
			$brandHash = $oxcakmak->specificHash($brandTitle);
			$brandLastHash = $oxcakmak->cleanString($_POST["mbLastHash"]);
			$fileName = @$_FILES['mbThumbnail']['name'];
			$fileSize = @$_FILES['mbThumbnail']['size'];
			$fileTmpName = @$_FILES['mbThumbnail']['tmp_name'];
			$fileType = @$_FILES['mbThumbnail']['type'];
			$fileExtensions = ['jpeg','jpg','png'];
			$fileExtension = strtolower(end(explode('.',$fileName)));
			$fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
			$uploadPath = "assets/uploaded/brand_".$fileNameEncoded;
			if(empty($brandTitle)){
				echo "empty";
			}else{
				$dbh->where("brand_hash", $brandLastHash);
				if($dbh->has("brand")){
					if(isset($_FILES['mbThumbnail'])){
						if (!in_array($fileExtension,$fileExtensions)){
							echo "extension";
						}else{
							if ($fileSize > 5000000){
								echo "size";
							}else{
								move_uploaded_file($fileTmpName, $uploadPath);
								$uBrandlioData = [
									'brand_hash' => $brandHash,
									'brand_title' => $brandTitle,
									'brand_image' => $uploadPath
								];
								$dbh->where("brand_hash", $brandLastHash);
								$updateBrand = $dbh->update("brand", $uBrandData);
								if($updateBrand){
									echo "success";
								}else{
									echo "failed";
								}
							}
						}
					}else{
						$uBrandData = [
							'brand_hash' => $brandHash,
                            'brand_title' => $brandTitle
						];
						$dbh->where("brand_hash", $brandLastHash);
						$updateBrand = $dbh->update("brand", $uBrandData);
						if($updateBrand){
							echo "success";
						}else{
							echo "failed";
						}
					}
				}else{
					echo "not_exists";
				}
			}
		}
		
		/* Action Delete Brand */
		if(isset($_POST['actionDeleteBrand'])){
			$slug = $oxcakmak->cleanString($_POST['hash']);
			$dbh->where("brand_hash", $slug);
			if($dbh->has("brand")){
				$dbh->where('brand_hash', $slug);
				if(!$dbh->delete('brand')){
					echo "success";
				}else{ 
					echo 'failed';
				}
			}else{
				echo "not_exists";
			}
		}

		/* Action Add Testimonial */
		if(isset($_POST['actionAddTestimonial'])){
			$testimonialFullname = $oxcakmak->cleanString($_POST['mtFullname']);
            $testimonialJob = $oxcakmak->cleanString($_POST['mtJob']);
            $testimonialComment = $oxcakmak->cleanString($_POST['mtComment']);
            $testimonialHash = $oxcakmak->specificHash($testimonialFullname);
			$fileName = @$_FILES['mtPicture']['name'];
			$fileSize = @$_FILES['mtPicture']['size'];
			$fileTmpName = @$_FILES['mtPicture']['tmp_name'];
			$fileType = @$_FILES['mtPicture']['type'];
			$fileExtensions = ['jpeg','jpg','png'];
			$fileExtension = strtolower(end(explode('.',$fileName)));
			$fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
			$uploadPath = "assets/uploaded/testimonial_".$fileNameEncoded;
			if(empty($testimonialFullname) || empty($testimonialJob) || empty($testimonialComment)){
				echo "empty";
			}else{
				$dbh->where("testimonial_hash", $testimonialHash);
				if($dbh->has("testimonial")){
					echo "exists";
				}else{
					if(isset($_FILES['mtPicture'])){
						if (!in_array($fileExtension,$fileExtensions)){
							echo "extension";
						}else{
							if ($fileSize > 5000000){
								echo "size";
							}else{
								move_uploaded_file($fileTmpName, $uploadPath);
								$iTestimonialData = [
									'testimonial_hash' => $testimonialHash,
                                    'testimonial_picture' => $uploadPath,
									'testimonial_fullname' => $testimonialFullname,
									'testimonial_job' => $testimonialJob,
                                    'testimonial_comment' => $testimonialComment
								];
								$insertTestimonial = $dbh->insert("testimonial", $iTestimonialData);
								if($insertTestimonial){
									echo "success";
								}else{
									echo "failed";
								}
							}
						}
					}else{
						$iTestimonialData = [
							'testimonial_hash' => $testimonialHash,
                            'testimonial_fullname' => $testimonialFullname,
                            'testimonial_job' => $testimonialJob,
                            'testimonial_comment' => $testimonialComment
						];
						$insertTestimonial = $dbh->insert("testimonial", $iTestimonialData);
						if($insertTestimonial){
							echo "success";
						}else{
							echo "failed";
						}
					}
				}
			}
		}
		
		/* Action Update Testimonial */
		if(isset($_POST['actionUpdateTestimonial'])){
			$testimonialFullname = $oxcakmak->cleanString($_POST['mtFullname']);
            $testimonialJob = $oxcakmak->cleanString($_POST['mtJob']);
            $testimonialComment = $oxcakmak->cleanString($_POST['mtComment']);
            $testimonialLastHash = $oxcakmak->cleanString($_POST['mtLastHash']);
            $testimonialHash = $oxcakmak->specificHash($testimonialFullname);
			$fileName = @$_FILES['mtPicture']['name'];
			$fileSize = @$_FILES['mtPicture']['size'];
			$fileTmpName = @$_FILES['mtPicture']['tmp_name'];
			$fileType = @$_FILES['mtPicture']['type'];
			$fileExtensions = ['jpeg','jpg','png'];
			$fileExtension = strtolower(end(explode('.',$fileName)));
			$fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
			$uploadPath = "assets/uploaded/testimonial_".$fileNameEncoded;
			if(empty($testimonialFullname) || empty($testimonialJob) || empty($testimonialComment)){
				echo "empty";
			}else{
				$dbh->where("testimonial_hash", $testimonialLastHash);
				if($dbh->has("testimonial")){
					if(isset($_FILES['mtPicture'])){
						if (!in_array($fileExtension,$fileExtensions)){
							echo "extension";
						}else{
							if ($fileSize > 5000000){
								echo "size";
							}else{
								move_uploaded_file($fileTmpName, $uploadPath);
								$uTestimonialData = [
									'testimonial_hash' => $testimonialHash,
                                    'testimonial_picture' => $uploadPath,
									'testimonial_fullname' => $testimonialFullname,
									'testimonial_job' => $testimonialJob,
                                    'testimonial_comment' => $testimonialComment
								];
								$dbh->where("testimonial_hash", $testimonialLastHash);
								$updateTestimonial = $dbh->update("testimonial", $uTestimonialData);
								if($updateTestimonial){
									echo "success";
								}else{
									echo "failed";
								}
							}
						}
					}else{
						$uTestimonialData = [
							'testimonial_hash' => $testimonialHash,
                            'testimonial_fullname' => $testimonialFullname,
                            'testimonial_job' => $testimonialJob,
                            'testimonial_comment' => $testimonialComment
						];
						$dbh->where("testimonial_hash", $testimonialLastHash);
						$updateTestimonial = $dbh->update("testimonial", $uTestimonialData);
						if($updateTestimonial){
							echo "success";
						}else{
							echo "failed";
						}
					}
				}else{
					echo "not_exists";
				}
			}
		}
		
		/* Action Delete Testimonial */
		if(isset($_POST['actionDeleteTestimonial'])){
			$slug = $oxcakmak->cleanString($_POST['hash']);
			$dbh->where("testimonial_hash", $slug);
			if($dbh->has("testimonial")){
				$dbh->where('testimonial_hash', $slug);
				if(!$dbh->delete('testimonial')){
					echo "success";
				}else{ 
					echo 'failed';
				}
			}else{
				echo "not_exists";
			}
		}
		
		/* Action Add Social */
		if(isset($_POST['actionAddSocial'])){
			$socialMedia = $oxcakmak->cleanString($_POST['socialMedia']);
			$socialAddress = $oxcakmak->cleanString($_POST['socialAddress']);
			$socialName = $oxcakmak->slugify($socialMedia);
			if(empty($socialMedia) || empty($socialAddress)){
				echo "empty";
			}else{
				$dbh->where("social_name", $socialName);
				if($dbh->has("social")){
					echo "exists";
				}else{
					$iSocialData = [
						'social_name' => $socialName,
						'social_name' => $socialMedia,
						'social_address' => $socialAddress,
					];
					if($dbh->insert('social', $iSocialData)){
						echo "success";
					}else{ 
						echo 'failed';
					}
				}
			}
		}
	
		/* Action Update Social */
		if(isset($_POST['actionUpdatesocial'])){
			$socialName = $oxcakmak->cleanString($_POST['socialName']);
			$socialMedia = $oxcakmak->cleanString($_POST['socialMedia']);
			$socialAddress = $oxcakmak->cleanString($_POST['socialAddress']);
			$dbh->where("social_name", $socialName);
			if($dbh->has("social")){
				$uSocialData = [
					'social_name' => $socialMedia,
					'social_address' => $socialAddress,
				];
				$dbh->where('social_name', $socialName);
				if($dbh->update('social', $uSocialData)){
					echo "success";
				}else{ 
					echo 'failed';
				}
			}else{
				echo "not_exists";
			}
		}
		
		/* Action Delete Social */
		if(isset($_POST['actiondeleteSocial'])){
			$socialName = $oxcakmak->cleanString($_POST['socialName']);
			$dbh->where("social_name", $socialName);
			if($dbh->has("social")){
				$dbh->where('social_name', $socialName);
				if(!$dbh->delete('social')){
					echo "success";
				}else{ 
					echo 'failed';
				}
			}else{
				echo "not_exists";
			}
		}
		
		/* Action Add User */
		if(isset($_POST['actionAddUser'])){
			$username = $oxcakmak->cleanString($_POST['username']);
			$email = $oxcakmak->cleanString($_POST['email']);
			$password = $oxcakmak->hashPassword($oxcakmak->cleanString($_POST['password']));
			$status = $oxcakmak->cleanString($_POST['status']);
			$role = $oxcakmak->cleanString($_POST['role']);
			if(empty($username) || empty($email) || empty($password)){
				echo "empty";
			}else{
				if($oxcakmak->checkIsMail($email)){
					$dbh->where("user_username", $username);
					$dbh->where("user_email", $email);
					if($dbh->has("user")){
						echo "exists";
					}else{
						$insertUserData = [
							'user_username' => $username,
							'user_email' => $email,
							'user_password' => $password,
							'user_status' => $status,
							'user_role' => $role,
							'user_key' => $oxcakmak->generateLongRandomKey()
						];
						$insertUser = $dbh->insert('user', $insertUserData);
						if($insertUser){
							echo "success";
						}else{
							echo "failed";
						}
					}
				}else{
					echo "not_supported_email";
				}
			}
		}
		
		/* Action Update User Status */
		if(isset($_POST['actionUpdateUserStatus'])){
			$username = $oxcakmak->cleanString($_POST['username']);
			$dbh->where("user_username", $username);
			if($dbh->has("user")){
				$dbh->where("user_username", $username);
				$userRow = $dbh->getOne("user");
				if($userRow['user_status']==1){
					$updateUserStatus = [
						'user_status' => 0
					];
				}else{
					$updateUserStatus = [
						'user_status' => 1
					];
				}
				$updateUser = $dbh->update('user', $updateUserStatus);
				if($updateUser){
					echo "success";
				}else{
					echo "failed";
				}
			}else{
				echo "not_exists";
			}
		}
		
		/* Action Delete Contact */
		if(isset($_POST['actionDeleteContact'])){
			$contactHash = $oxcakmak->cleanString($_POST['contactHash']);
			$dbh->where("contact_hash", $contactHash);
			if($dbh->has("contact")){
				$dbh->where('contact_hash', $contactHash);
				if(!$dbh->delete('contact')){
					echo "success";
				}else{ 
					echo 'failed';
				}
			}else{
				echo "not_exists";
			}
		}

		/* Action Update System Meta */
		if(isset($_POST['actionUpdateSystemMeta'])){
			$stTitle = $oxcakmak->cleanString($_POST['stTitle']);
			$stDescription = $oxcakmak->cleanString($_POST['stDescription']);
			$stKeyword = $oxcakmak->cleanString($_POST['stKeyword']);
			$stStuck = $oxcakmak->cleanString($_POST['stStuck']);
			$stSperator = $oxcakmak->cleanString($_POST['stSperator']);
			$stFooter = $_POST['stFooter'];
			if(empty($stTitle) || empty($stDescription) || empty($stKeyword) || empty($stStuck) || empty($stSperator) || empty($stFooter)){
				echo "empty";
			}else{
				$updateSystemData = [
					'setting_meta_title' => $stTitle,
					'setting_meta_description' => $stDescription,
					'setting_meta_keyword' => $stKeyword,
					'setting_meta_stuck' => $stStuck,
					'setting_meta_sperator' => $stSperator,
					'setting_footer' => $stFooter
				];
				if($dbh->update('setting', $updateSystemData)){
					echo "success";
				}else{
					echo "failed";
				}
			}
		}

		/* Action Update System Contact */
		if(isset($_POST['actionUpdateSystemContact'])){
			$stContactLocation = $oxcakmak->cleanString($_POST['stContactLocation']);
			$stContactPhone = $oxcakmak->cleanString($_POST['stContactPhone']);
			$stContactEmail = $oxcakmak->cleanString($_POST['stContactEmail']);
			if(empty($stContactLocation) || empty($stContactPhone) || empty($stContactEmail)){
				echo "empty";
			}else{
				$updateSystemData = [
					'setting_contact_location' => $stContactLocation,
					'setting_contact_phone' => $stContactPhone,
					'setting_contact_email' => $stContactEmail
				];
				if($dbh->update('setting', $updateSystemData)){
					echo "success";
				}else{
					echo "failed";
				}
			}
		}

		/* Action Update System Banner */
		if(isset($_POST['actionUpdateSystemBanner'])){
			$bannerTitle = $oxcakmak->cleanString($_POST['stBannerTitle']);
			$bannerFirst = $oxcakmak->cleanString($_POST['stBannerFirst']);
			$fileName = @$_FILES['stBannerImage']['name'];
			$fileSize = @$_FILES['stBannerImage']['size'];
			$fileTmpName = @$_FILES['stBannerImage']['tmp_name'];
			$fileType = @$_FILES['stBannerImage']['type'];
			$fileExtensions = ['jpeg','jpg','png'];
			$fileExtension = strtolower(end(explode('.',$fileName)));
			$fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
			$uploadPath = "assets/uploaded/banner_".$fileNameEncoded;
			if(empty($bannerTitle) || empty($bannerFirst)){
				echo "empty";
			}else{
				if(isset($_FILES['stBannerImage'])){
					if (!in_array($fileExtension,$fileExtensions)){
						echo "extension";
					}else{
						if ($fileSize > 5000000){
							echo "size";
						}else{
							move_uploaded_file($fileTmpName, $uploadPath);
							$updateSystemData = [
								'setting_banner_image' => $uploadPath,
								'setting_banner_title' => $bannerTitle,
								'setting_banner_first' => $bannerFirst
							];
							if($dbh->update('setting', $updateSystemData)){
								echo "success";
							}else{
								echo "failed";
							}
						}
					}
				}else{
					$updateSystemData = [
						'setting_banner_title' => $bannerTitle,
						'setting_banner_first' => $bannerFirst
					];
					if($dbh->update('setting', $updateSystemData)){
						echo "success";
					}else{
						echo "failed";
					}
				}
			}
		}

		/* Action Update System About */
		if(isset($_POST['actionUpdateSystemAbout'])){
			$aboutFullname = $oxcakmak->cleanString($_POST['stAboutFullname']);
			$aboutJob = $oxcakmak->cleanString($_POST['stAboutJob']);
			$aboutContent = $oxcakmak->cleanString($_POST['stAboutContent']);
			$fileName = @$_FILES['stAboutImage']['name'];
			$fileSize = @$_FILES['stAboutImage']['size'];
			$fileTmpName = @$_FILES['stAboutImage']['tmp_name'];
			$fileType = @$_FILES['stAboutImage']['type'];
			$fileExtensions = ['jpeg','jpg','png'];
			$fileExtension = strtolower(end(explode('.',$fileName)));
			$fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
			$uploadPath = "assets/uploaded/banner_".$fileNameEncoded;
			if(empty($aboutFullname) || empty($aboutJob) || empty($aboutContent)){
				echo "empty";
			}else{
				if(isset($_FILES['stAboutImage'])){
					if (!in_array($fileExtension,$fileExtensions)){
						echo "extension";
					}else{
						if ($fileSize > 5000000){
							echo "size";
						}else{
							move_uploaded_file($fileTmpName, $uploadPath);
							$updateSystemData = [
								'setting_about_name' => $aboutFullname,
								'setting_about_job' => $aboutJob,
								'setting_about_content' => $aboutContent,
								'setting_about_image' => $uploadPath
							];
							if($dbh->update('setting', $updateSystemData)){
								echo "success";
							}else{
								echo "failed";
							}
						}
					}
				}else{
					$updateSystemData = [
						'setting_about_name' => $aboutFullname,
						'setting_about_job' => $aboutJob,
						'setting_about_content' => $aboutContent
					];
					if($dbh->update('setting', $updateSystemData)){
						echo "success";
					}else{
						echo "failed";
					}
				}
			}
		}

		/* Action Update System Pre */
		if(isset($_POST['actionUpdateSystemPre'])){
			$preLoader = $oxcakmak->cleanString($_POST['preLoader']);
			$preParticles = $oxcakmak->cleanString($_POST['preParticles']);
			if(isset($preParticles) || isset($preLoader)){
				$updateSystemData = [
					'setting_particles_status' => $preParticles,
					'setting_preloader_status' => $preLoader
				];
				if($dbh->update('setting', $updateSystemData)){
					echo "success";
				}else{
					echo "failed";
				}
			}else{
				echo "empty";
				
			}
		}
	
	} /* If Not Demo Mode -^- */

	

	}/* Role Not Admin Then */
	if(DEMO_MODE==0){
	/* Action Update Password */
	if(isset($_POST['actionUpdatePassword'])){
		$lastPassword = $oxcakmak->hashPassword($_POST['pwLast']);
		$newPassword = $oxcakmak->hashPassword($_POST['pwNew']);
		$newRePassword = $oxcakmak->hashPassword($_POST['pwReNew']);
		if(empty($_POST['pwLast']) || empty($_POST['pwNew']) || empty($_POST['pwReNew'])){
			echo "empty";
		}else{
			if($lastPassword == USER_PASSWORD){
				if($newPassword == $newRePassword){
					$updatePasswordData = ['user_password' => $newPassword];
					$dbh->where('user_username', USER_USERNAME);
					$updatePassword = $dbh->update('user', $updatePasswordData);
					if($updatePassword){
						echo "success";
					}else{
						echo "failed";
					}
				}else{
					echo "not_equal_new";
				}
			}else{
				echo "not_equal_last";
			}
		}
	}
	
	
	
	}
}else{ /* Session Not Exists */

	/* Action Login */
	if(isset($_POST['actionLogin'])){
		$user = $oxcakmak->cleanString($_POST['user']);
		$password = $oxcakmak->hashPassword($oxcakmak->cleanString($_POST['password']));
		if(empty($user) || empty($password)){
			echo "empty";
		}else{
			if($oxcakmak->checkIsMail($user)){
				$dbh->where("user_email", $user);
			}else{
				$dbh->where("user_username", $user);
			}
			if($dbh->has("user")){
				$dbh->where("user_password", $password);
				if($dbh->has("user")){
					$_SESSION['session'] = true;
					$_SESSION['user'] = $user;
					echo "success";
				}else{
					echo "false";
				}
			}else{
				echo "not_exists";
			}
		}
	}
}
/*
===[Another-Actions]===
*/
if(DEMO_MODE==0){
	/* Action Contact */
	if(isset($_POST['actionContact'])){
		$contactFullname = $oxcakmak->cleanString($_POST['cFullname']);
		$contactEmail = $oxcakmak->cleanString($_POST['cEmail']);
		$contactMessage = $oxcakmak->cleanString($_POST['cMessage']);
		$contactHash = $oxcakmak->cleanString($contactFullname."-".$contactEmail);
		if(empty($contactFullname) || empty($contactEmail) || empty($contactMessage)){
			echo "empty";
		}else{
			if($oxcakmak->checkIsMail($contactEmail)){
				$dbh->where("contact_hash", $contactHash);
				if($dbh->has("contact")){
					echo "exists";
				}else{
					$iContactData = [
						'contact_hash' => $contactHash,
						'contact_fullname' => $contactFullname,
						'contact_email' => $contactEmail,
						'contact_message' => $contactMessage,
						'contact_address' => $oxcakmak->getIPAddress(),
						'contact_date' => $oxcakmak->latestDateHM()
					];
					$insertContact = $dbh->insert("contact", $iContactData);
					if($insertContact){
						echo "success";
					}else{
						echo "failed";
					}
				}
			}else{
				echo "not_supported_email";
			}
		}
	}
}
?>